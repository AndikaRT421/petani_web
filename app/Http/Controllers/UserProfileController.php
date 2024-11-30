<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\FarmingNeed;

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
}
