@extends('layouts.master_mitra')
<!-- Hero Section -->
@section('content')

<section class="bg-gray-100 py-12">
    <div class="container mx-auto text-center">
        <h1 class="text-3xl font-bold mb-4">Mitra Dashboard</h1>
        <p class="text-lg mb-8">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet nulla auctor, vestibulum magna sed, convallis ex.</p>
        <button class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded">Shop Now</button>
    </div>
</section>

<!-- Product Grid -->
<section class="py-12">
    <div class="container mx-auto">
        <h2 class="text-2xl font-bold mb-4" style="margin-left: 2vh;">Our Products</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Product Card -->
            <div class="bg-white shadow-md rounded p-4">
                <img src="https://via.placeholder.com/200x200" alt="Product Image" class="w-full h-64 object-cover mb-4">
                <h3 class="text-lg font-bold mb-2">Product Title</h3>
                <p class="text-sm mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <button class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded">Add to Cart</button>
            </div>
            <!-- Product Card -->
            <div class="bg-white shadow-md rounded p-4">
                <img src="https://via.placeholder.com/200x200" alt="Product Image" class="w-full h-64 object-cover mb-4">
                <h3 class="text-lg font-bold mb-2">Product Title</h3>
                <p class="text-sm mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <button class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded">Add to Cart</button>
            </div>
            <!-- Product Card -->
            <div class="bg-white shadow-md rounded p-4">
                <img src="https://via.placeholder.com/200x200" alt="Product Image" class="w-full h-64 object-cover mb-4">
                <h3 class="text-lg font-bold mb-2">Product Title</h3>
                <p class="text-sm mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <button class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded">Add to Cart</button>
            </div>
        </div>
    </div>
</section>

@endsection

<!-- Footer -->
@section('footer')