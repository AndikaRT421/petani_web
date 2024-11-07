@extends('layouts.master')

@section('content')

<div class="container mx-auto p-4">
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
        <!-- Sample Product Card -->
        <div class="border rounded-lg shadow-lg p-4">
            <img src="product-image.jpg" alt="Product" class="w-full h-48 object-cover rounded-md mb-4">
            <h2 class="text-lg font-semibold mb-2">Nama Produk</h2>
            <p class="text-gray-600 mb-2">Rp4.792.000</p>
            <button
                class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg"
            >
                Tambahkan ke Keranjang
            </button>
        </div>
        <!-- Sample Product Card -->
        <div class="border rounded-lg shadow-lg p-4">
            <img src="product-image.jpg" alt="Product" class="w-full h-48 object-cover rounded-md mb-4">
            <h2 class="text-lg font-semibold mb-2">Nama Produk</h2>
            <p class="text-gray-600 mb-2">Rp4.792.000</p>
            <button
                class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg"
            >
                Tambahkan ke Keranjang
            </button>
        </div>
        <div class="border rounded-lg shadow-lg p-4">
            <img src="product-image.jpg" alt="Product" class="w-full h-48 object-cover rounded-md mb-4">
            <h2 class="text-lg font-semibold mb-2">Nama Produk</h2>
            <p class="text-gray-600 mb-2">Rp4.792.000</p>
            <button
                class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg"
            >
                Tambahkan ke Keranjang
            </button>
        </div>
        <div class="border rounded-lg shadow-lg p-4">
            <img src="product-image.jpg" alt="Product" class="w-full h-48 object-cover rounded-md mb-4">
            <h2 class="text-lg font-semibold mb-2">Nama Produk</h2>
            <p class="text-gray-600 mb-2">Rp4.792.000</p>
            <button
                class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg"
            >
                Tambahkan ke Keranjang
            </button>
        </div>
        <div class="border rounded-lg shadow-lg p-4">
            <img src="product-image.jpg" alt="Product" class="w-full h-48 object-cover rounded-md mb-4">
            <h2 class="text-lg font-semibold mb-2">Nama Produk</h2>
            <p class="text-gray-600 mb-2">Rp4.792.000</p>
            <button
                class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg"
            >
                Tambahkan ke Keranjang
            </button>
        </div>
    </div>

    <button
        id="cartButton"
        class="fixed bottom-4 right-4 bg-green-400 hover:bg-green-600 text-white w-15 h-15 rounded-full flex items-center justify-center shadow-lg z-50 md:w-16 md:h-16"
        onclick="toggleCartSection()"
    >
        <img src="/assets/trolley.png" alt="" style="width: 80%; height: 80%">
    </button>

    <!-- Cart Section -->
    <div
        id="cartSection"
        class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden"
    >
        <div class="bg-white border rounded-lg shadow-lg p-4 w-72 max-w-xs z-50">
            <h2 class="text-lg font-semibold mb-2 text-center">Keranjang Belanja</h2>
            <ul class="divide-y divide-gray-200 mb-4">
                <li class="flex justify-between py-2">
                    <span>Produk 1</span>
                    <span>Rp2.000.000</span>
                </li>
                <li class="flex justify-between py-2">
                    <span>Produk 2</span>
                    <span>Rp1.500.000</span>
                </li>
            </ul>
            <div class="flex justify-between text-gray-700 font-semibold">
                <span>Total:</span>
                <span>Rp3.500.000</span>
            </div>
            <button
                class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg mt-4"
            >
                Lanjut ke Pembayaran
            </button>
            <button
                class="w-full bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg mt-4"
                onclick="toggleCartSection()"
            >
                Kembali
            </button>
        </div>
    </div>
</div>

@endsection

@section('footer')
<script>
    function toggleCartSection() {
        const cartSection = document.getElementById('cartSection');
        cartSection.classList.toggle('hidden');
    }
</script>