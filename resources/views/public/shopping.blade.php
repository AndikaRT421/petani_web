@extends('layouts.master')

@section('content')
<div class="container mx-auto p-4" style="padding-top: 9rem; padding-bottom: 5rem;">
    <div class="flex justify-between items-center mb-4">
        <!-- Search Bar -->
        <form action="{{ route('belanja.search') }}" method="GET" class="w-full md:w-1/2">
            <input
                type="text"
                name="search"
                placeholder="Cari barang..."
                value="{{ request('search') }}"
                class="w-full p-2 border rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-blue-500"
            />
            <button type="submit" class="hidden">Cari</button>
        </form>
        
        
        <!-- Sort By Price -->
        <div class="ml-4">
            <form action="{{ route('belanja.search') }}" method="GET" class="flex items-center">
                <select
                    class="ml-4 p-2 border rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-blue-500"
                    id="sort-price"
                    name="sort_price"
                    onchange="this.form.submit()"
                >
                    <option value="terendah" {{ request('sort_price') === 'terendah' ? 'selected' : '' }}>Harga: Terendah</option>
                    <option value="tertinggi" {{ request('sort_price') === 'tertinggi' ? 'selected' : '' }}>Harga: Tertinggi</option>
                </select>
            </form>
            
        </div>
    </div>
    <script>
        function sortProducts(value) {
            const url = new URL(window.location.href);
            url.searchParams.set('sort_price', value);
            window.location.href = url.toString();
        }
    </script>
    
    <!-- Product Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @php
            $sortedFiles = $files;
    
            // Sorting based on query parameter
            $sortPrice = request()->query('sort_price') ?? 'terendah';
            if ($sortPrice === 'terendah') {
                $sortedFiles = $sortedFiles->sortBy('price');
            } else {
                $sortedFiles = $sortedFiles->sortByDesc('price');
            }
        @endphp
    
        @foreach ($sortedFiles as $file)
        <div class="p-4 border border-gray-300 rounded-lg shadow-lg bg-white">
            <img src="{{ asset('images/' . $file->photo) }}" 
                 alt="{{ $file->item_name }}" 
                 class="w-full h-48 object-cover rounded-md mb-4"

            <h2 class="mt-4 text-lg font-semibold text-gray-800">
                {{ $file->item_name ?? 'Nama Produk' }}
            </h2>
            <div class="text-xl font-bold text-gray-800 mt-2">Rp{{ number_format($file->price ?? 0, 0, ',', '.') }} <span class="text-sm text-gray-500 line-through">Rp 229.900</span> <span class="text-red-600 font-semibold">57%</span></div>
            <div class="text-yellow-500 mb-0.5">Rating: ★★★★★ ({{ $file->sold ?? '0' }} terjual)</div>
            <div class="text-sm text-green-600 mb-2">Dijual oleh: {{ $file->mitra->name ?? 'Nama Toko' }}</div>
            <form action="{{ route('cart.add', $file->id) }}" method="POST">
                @csrf
                <button
                    type="submit"
                    class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg">
                    Tambahkan ke Keranjang
                </button>
            </form>
        </div>
        @endforeach
    </div>
</div>

@endsection
