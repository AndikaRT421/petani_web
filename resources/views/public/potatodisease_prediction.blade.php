@extends('layouts.master')

@section('content')

<div class="min-h-screen flex items-center justify-center py-10">
    <div class="w-full max-w-3xl bg-gradient-to-r from-green-200 to-yellow-100 border border-gray-200 shadow-lg rounded-lg p-8 dark:bg-gray-900">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center dark:text-white">Deteksi Penyakit Kentang</h2>
        <form action="/cek_tanaman/hasil" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div class="flex flex-col items-center">
                <label for="image" class="text-gray-700 dark:text-gray-200 text-sm font-medium mb-2">Upload Gambar Tanaman</label>
                <input 
                    type="file" 
                    name="image" 
                    id="image" 
                    class="block w-full text-sm text-gray-700 bg-gray-50 border border-gray-300 rounded-lg shadow-sm p-2 cursor-pointer focus:outline-none focus:ring-2 focus:ring-green-500 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600" 
                    required
                    onchange="previewImage(event)"
                >
                <img id="imagePreview" class="mt-4 max-w-xs rounded-lg shadow-md" style="display: none;">
            </div>
            <div class="flex justify-center">
                <button 
                    type="submit" 
                    class="px-6 py-3 bg-green-500 text-white font-semibold text-sm rounded-lg shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-offset-2 dark:bg-green-600 dark:hover:bg-green-700"
                >
                    Detect
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function(){
            const output = document.getElementById('imagePreview');
            output.src = reader.result;
            output.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

@endsection

@section('footer')
