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

    public function addToCart(Request $request, $id)
    {
        $item = FarmingNeed::find($id); 
        
        if (!$item) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan!');
        }
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $item->item_name,
                "photo" => $item->photo,
                "price" => $item->price,
                "quantity" => 1,
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


    public function checkout()
    {
        $cart = session()->get('cart', []);
        // dd($cart);
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Keranjang kosong!');
        }

        DB::beginTransaction();
        try {
            $user = auth()->user();
            
            foreach ($cart as $id => $item) {
                $product = FarmingNeed::find($id);

                if (!$product || $product->stock < $item['quantity']) {
                    throw new \Exception("Stok tidak mencukupi untuk barang: {$item['name']}");
                }

                $product->stock -= $item['quantity'];
                $product->save();

                $total_price = $item['price'] * $item['quantity'];
                if ($user->balance < $total_price) {
                    throw new \Exception("Saldo tidak mencukupi untuk barang: {$item['name']}");
                }
                $user->balance -= $total_price;
                $user->save();

                $mitra = $product->mitra;
                $mitra->profit += $total_price;
                $mitra->save();
            }

            session()->forget('cart');
            DB::commit();
            return redirect()->route('cart')->with('success', 'Transaksi berhasil!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('cart')->with('error', $e->getMessage());
        }
    }
}
