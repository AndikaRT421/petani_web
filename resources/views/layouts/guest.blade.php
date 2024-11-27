<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>

        <style>
            body {
                background-image: url('/assets/background_login.jpg');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-color: rgba(0, 0, 0, 0.6);
                background-blend-mode: darken;
            }
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-100 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <!-- Header Section -->
            <div class="w-full flex justify-center mb-6">
                <div class="flex space-x-4 bg-gray-900 bg-opacity-70 rounded-full p-3 shadow-lg">
                    <a href="/" 
                        class="px-8 py-2 text-lg font-bold text-gray-100 bg-indigo-600 rounded-full shadow-lg hover:bg-indigo-500 hover:shadow-indigo-600/50 transition-transform duration-300 transform hover:scale-105">
                        USER
                    </a>
                    <a href="{{ route('mitra.login') }}" 
                        class="px-8 py-2 text-lg font-bold text-gray-100 bg-red-600 rounded-full shadow-lg hover:bg-red-500 hover:shadow-red-600/50 transition-transform duration-300 transform hover:scale-105">
                        MITRA
                    </a>
                </div>
            </div>

            <!-- Card Container -->
            <div class="w-full sm:max-w-md px-8 py-10 bg-white bg-opacity-90 backdrop-blur-lg shadow-2xl rounded-xl border border-gray-200">
                <!-- Logo -->
                <div class="text-center mb-8">
                    <a href="/">
                        <img src="/assets/logo.png" class="w-36 mx-auto" alt="Logo">
                    </a>
                </div>

                <!-- Slot for Form Content -->
                <div>
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
