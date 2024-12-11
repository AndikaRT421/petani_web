<nav class="sticky top-0 bg-white py-4 shadow-md fixed w-full z-50 border-b border-gray-200">
    <div class="container mx-auto px-6 md:px-12 flex justify-between items-center">
        <!-- Logo -->
        <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 pl-4">
            <img src="/assets/logo.png" class="h-12" alt="Logo" />
        </a>

        <!-- Mobile Menu Button -->
        <div class="md:hidden">
            <button id="mobile-menu-button" class="text-gray-800 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>

        <!-- Navigation Links (Centered) -->
        <div class="hidden md:flex absolute left-1/2 transform -translate-x-1/2">
            <div class="flex space-x-8">
                <a href="{{ route('dashboard') }}" class="nav-link text-gray-800 font-semibold hover:text-black transition hover:underline">Beranda</a>
                <a href="{{ route('belanja') }}" class="nav-link text-gray-800 font-semibold hover:text-black transition hover:underline">Belanja</a>
                <a href="{{ route('cek_tanaman') }}" class="nav-link text-gray-800 font-semibold hover:text-black transition hover:underline">Cek Tanaman</a>
                <a href="{{ route('chatbot') }}" class="nav-link text-gray-800 font-semibold hover:text-black transition hover:underline">Tanya Emilia</a>
            </div>
        </div>

        <!-- User Menu -->
        <div class="flex items-center space-x-4 pr-4">
            <!-- Dropdown Menu Button -->
            <button
                type="button"
                class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                id="user-menu-button"
                aria-expanded="false"
                data-dropdown-toggle="user-dropdown"
                data-dropdown-placement="bottom"
            >
                <span class="sr-only">Open user menu</span>
                <img class="w-10 h-10 rounded-full" src="/assets/user.png" alt="User photo">
            </button>

            <!-- Dropdown Menu -->
            <div
                class="hidden absolute right-6 mt-2 w-48 bg-white rounded-lg shadow-lg dark:bg-gray-800"
                id="user-dropdown"
            >
                <div class="px-4 py-3">
                    <span class="block text-sm font-semibold text-gray-800 dark:text-white">{{ Auth::user()->name }}</span>
                    <span class="block text-sm text-gray-500 dark:text-gray-400 truncate">{{ Auth::user()->email }}</span>
                    <span class="block text-sm text-gray-500 dark:text-gray-400 truncate">{{ Auth::user()->balance }}</span>
                </div>
                <ul class="py-2">
                    <li class="border-t border-gray-200">
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-1 text-sm text-center text-red-600 hover:text-black transition">Keluar</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="hidden md:hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="{{ route('dashboard') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-800 hover:text-black hover:bg-gray-100">Beranda</a>
            <a href="{{ route('belanja') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-800 hover:text-black hover:bg-gray-100">Belanja</a>
            <a href="{{ route('cek_tanaman') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-800 hover:text-black hover:bg-gray-100">Cek Tanaman</a>
            <a href="{{ route('chatbot') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-800 hover:text-black hover:bg-gray-100">Tanya Emilia</a>
        </div>
    </div>
</nav>

<script>
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        var menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });
</script>
