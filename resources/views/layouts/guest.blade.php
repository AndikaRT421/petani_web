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
                background-image: url('/assets/background.jpg');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                height: 100vh;
                background-color: rgba(255, 255, 255, 0.3);
                background-blend-mode: overlay;
            }
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-gray-100 dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg" style="background: linear-gradient(45deg, #62f67d, #fffb7d);">
            <div>
                <a href="/">
                    <img src="/assets/logo.png" class="w-80 h-50 mx-auto" alt="Logo">
                </a>
            </div>
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
