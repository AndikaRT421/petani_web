<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\FarmingNeed;
use Illuminate\Support\Facades\DB;


class UserProfileController extends Controller
{
    public function index()
    {
        $files = FarmingNeed::all();
        // dd($files);
        return view('public.shopping', compact('files'));
    }

    public function search(Request $request)
    {
        $query = $request->input('search'); 
        $sortPrice = $request->input('sort_price', 'terendah'); 

        $products = FarmingNeed::query()
            ->where('item_name', 'LIKE', "%{$query}%");
        if ($sortPrice === 'terendah') {
            $products = $products->orderBy('price', 'asc');
        } else {
            $products = $products->orderBy('price', 'desc');
        }

        $products = $products->get();

        return view('public.shopping', ['files' => $products]);
    }

    public function addToCart(Request $request, $id)
{
    $item = FarmingNeed::find($id);

    if (!$item) {
        return redirect()->back()->with('error', 'Produk tidak ditemukan!');
    }

    // Ambil kuantitas dari request, default ke 1 jika tidak ada
    $quantity = $request->input('quantity', 1);

    // Validasi kuantitas
    if ($quantity < 1) {
        return redirect()->back()->with('error', 'Kuantitas tidak valid!');
    }

    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        // Jika produk sudah ada di keranjang, tambahkan kuantitas
        $cart[$id]['quantity'] += $quantity;
    } else {
        // Jika produk belum ada di keranjang, tambahkan produk baru
        $cart[$id] = [
            "name" => $item->item_name,
            "photo" => $item->photo,
            "price" => $item->price,
            "discount" => $item->discount,
            "quantity" => $quantity,
               
        ];
    }

    session()->put('cart', $cart);

    return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
}


    public function viewCart()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }


    // public function checkout()
    // {
    //     $cart = session()->get('cart', []);
    //     // dd($cart);
    //     if (empty($cart)) {
    //         return redirect()->back()->with('error', 'Keranjang kosong!');
    //     }

    //     DB::beginTransaction();
    //     try {
    //         $user = auth()->user();
            
    //         foreach ($cart as $id => $item) {
    //             $product = FarmingNeed::find($id);

    //             if (!$product || $product->stock < $item['quantity']) {
    //                 throw new \Exception("Stok tidak mencukupi untuk barang: {$item['name']}");
    //             }

    //             $product->stock -= $item['quantity'];
    //             $product->sold += $item['quantity'];
    //             $product->save();

    //             $total_price = ($item['price'] * $product->discount / 100) * $item['quantity'];
    //             if ($user->balance < $total_price) {
    //                 throw new \Exception("Saldo tidak mencukupi untuk barang: {$item['name']}");
    //             }
    //             $user->balance -= $total_price;
    //             $user->save();

    //             $mitra = $product->mitra;
    //             $mitra->profit += $total_price;
    //             $mitra->save();
    //         }

    //         session()->forget('cart');
    //         DB::commit();
    //         return redirect()->route('cart')->with('success', 'Transaksi berhasil!');
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         return redirect()->route('cart')->with('error', $e->getMessage());
    //     }
    // }
    public function checkout()
{
    $cart = session()->get('cart', []);

    // Cek jika keranjang kosong
    if (empty($cart)) {
        return redirect()->route('cart')->with('error', 'Keranjang kosong!');
    }

    DB::beginTransaction();
    try {
        $user = auth()->user(); // Dapatkan user yang sedang login

        foreach ($cart as $id => $item) {
            $product = FarmingNeed::find($id);

            // Validasi produk dan stok
            if (!$product) {
                throw new \Exception("Produk tidak ditemukan: {$item['name']}");
            }
            if ($product->stock < $item['quantity']) {
                throw new \Exception("Stok tidak mencukupi untuk barang: {$item['name']}");
            }

            // Hitung harga total dengan diskon
            $total_price = ($item['price'] - ($item['price'] * $product->discount / 100)) * $item['quantity'];

            // Validasi saldo pengguna
            if ($user->balance < $total_price) {
                throw new \Exception("Saldo tidak mencukupi untuk barang: {$item['name']}");
            }

            // Kurangi stok barang dan tambahkan ke jumlah terjual
            $product->stock -= $item['quantity'];
            $product->sold += $item['quantity'];
            $product->save();

            // Kurangi saldo user
            $user->balance -= $total_price;
            $user->save();

            // Tambahkan profit ke mitra
            $mitra = $product->mitra;
            $mitra->profit += $total_price;
            $mitra->save();
        }

        // Hapus keranjang dari session
        session()->forget('cart');

        // Commit transaksi
        DB::commit();
        return redirect()->route('cart')->with('success', 'Transaksi berhasil!');
    } catch (\Exception $e) {
        // Rollback jika ada kesalahan
        DB::rollBack();
        return redirect()->route('cart')->with('error', $e->getMessage());
    }
}

    


    public function updateCart(Request $request, $id)
{
    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        $quantity = $request->input('quantity', $cart[$id]['quantity']);

        if ($request->input('action') === 'increase') {
            $cart[$id]['quantity']++;
        } elseif ($request->input('action') === 'decrease' && $cart[$id]['quantity'] > 1) {
            $cart[$id]['quantity']--;
        } else {
            $cart[$id]['quantity'] = $quantity;
        }

        session()->put('cart', $cart);
    }

    return redirect()->back()->with('success', 'Keranjang berhasil diperbarui!');
}

public function removeFromCart($id)
{
    $cart = session()->get('cart', []);
    unset($cart[$id]);
    session()->put('cart', $cart);

    return redirect()->back()->with('success', 'Item berhasil dihapus dari keranjang!');
}

}
