@extends('layouts.master')

@section('content')
<!-- Hero Section -->
<section 
    class="relative w-full h-screen text-center flex items-center justify-center" 
    style="
        background-image: url('assets/background_user_dashboard.jpg'); 
        background-size: cover; 
        background-position: center; 
        background-repeat: no-repeat;"
>
    <!-- Dark overlay -->
    <div class="absolute inset-0 bg-black opacity-60"></div>

    <!-- Content -->
    <div class="relative z-10 flex flex-col items-center justify-center text-center max-w-lg mx-auto">
        <h1 class="text-5xl font-bold mb-4 text-white">
            PETANI
        </h1>
        <p class="text-lg text-white mb-6">
            Pengelolaan Ekosistem Teknologi Agrikultur dengan Navigasi Intelektual
        </p>
        <div class="flex justify-center space-x-4">
            <a 
                href="{{ route('belanja') }}" 
                class="bg-white text-black font-semibold py-3 px-8 rounded-lg hover:bg-gray-200 transition"
                style="min-width: 150px;"
            >
                Belanja Sekarang
            </a>
            <a 
                href="{{ route('cek_tanaman') }}" 
                class="bg-transparent border-2 border-white text-white font-semibold py-3 px-8 rounded-lg hover:bg-white hover:text-black transition"
                style="min-width: 150px;"
            >
                Cek Tanaman
            </a>
        </div>
    </div>
</section>
@endsection
