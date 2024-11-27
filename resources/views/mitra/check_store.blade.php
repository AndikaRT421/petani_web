@extends('layouts.master_mitra')

@section('content')

<div class="container mx-auto p-4" style="padding-bottom: 5rem;">
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
        @forelse ($farmingNeeds as $product)
        <div class="border rounded-lg shadow-lg p-4">
            <img 
                src="{{ $product->photo ? asset('images/' . $product->photo) : asset('images/default.jpg') }}" 
                alt="{{ $product->item_name }}" 
                class="w-full h-48 object-contain rounded-md mb-4">
            <h2 class="text-lg font-semibold mb-2">{{ $product->item_name }}</h2>
            <p class="text-gray-600 mb-2">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
            <a 
                href="{{ route('farming_needs.detail', ['id' => $product->id]) }}" 
                class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg text-center block mt-2"
            >
                Detail
            </a>
            <form action="{{ route('mitra.delete_product', ['id' => $product->id]) }}" method="POST" class="delete-form w-full mt-2">
                @csrf
                @method('DELETE')
                <button 
                    type="button" 
                    class="delete-button w-full bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg text-center block"
                >
                    Delete
                </button>
            </form>
        </div>
        @empty
        <p class="col-span-4 text-center text-gray-500">Tidak ada produk untuk toko ini.</p>
        @endforelse
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.delete-button');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault();
                const form = this.closest('form');
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Anda tidak akan dapat mengembalikan ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: 'green',
                    cancelButtonColor: 'red',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
</script>

@endsection