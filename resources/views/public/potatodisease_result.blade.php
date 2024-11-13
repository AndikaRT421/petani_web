@extends('layouts.master')

@section('content')

<div class="min-h-screen flex items-center justify-center py-10">
    <div class="w-full max-w-3xl bg-gradient-to-r from-green-200 to-yellow-100 border border-gray-200 shadow-lg rounded-lg p-8 dark:bg-gray-900">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center dark:text-white">Hasil Deteksi Penyakit Kentang</h2>
        
        <div class="relative">
            <!-- Tampilkan gambar -->
            <img src="{{ $image_url }}" alt="Detected Image" class="w-1/2 mx-auto rounded-lg shadow-md">
        </div>
        <div class="mt-6 text-center">
            <a href="/cek_tanaman" 
               class="px-6 py-3 bg-blue-500 text-white font-semibold text-sm rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 dark:bg-blue-600 dark:hover:bg-blue-700">
                Kembali
            </a>
        </div>
    </div>
</div>

@endsection
