@extends('layouts.master')

@section('content')

<div class="container mx-auto p-4" style="padding-top: 9rem; padding-bottom: 5rem;">
    <div class="flex justify-between items-center mb-4">
        <!-- Search Bar -->
        <div class="w-full md:w-1/2">
            <input
                type="text"
                placeholder="Cari barang..."
                class="w-full p-2 border rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-blue-500"
            />
        </div>
        
        <!-- Sort By Price -->
        <div class="ml-4">
            <select
                class="p-2 border rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
                <option value="terendah">Harga: Terendah</option>
                <option value="tertinggi">Harga: Tertinggi</option>
            </select>
        </div>
    </div>

    <!-- Product Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach ($files as $file) 
        <div class="border rounded-lg shadow-lg p-4">
            <img 
                    src="{{ asset('images/' . $file->photo) }}" 
                    alt="{{ $file->item_name }}" 
                    class="w-full h-48 object-cover rounded-md mb-4"
                >
                <h2 class="text-lg font-semibold mb-2">{{ $file->item_name ?? 'Nama Produk' }}</h2>
                <p class="text-gray-600 mb-2">Rp{{ number_format($file->price ?? 0, 0, ',', '.') }}</p>
            <button
                class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg"
            >
                Tambahkan ke Keranjang
            </button>
        </div>
        @endforeach
    </div>
</div>

@endsection
