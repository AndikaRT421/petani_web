<nav class="sticky top-0 bg-white py-4 shadow-md fixed w-full z-50 border-b border-gray-200">
    <div class="container mx-auto px-6 md:px-12 flex justify-between items-center">
        <!-- Logo -->
        <a href="{{ route('mitra.dashboard') }}" class="flex items-center space-x-3 pl-4">
            <img src="/assets/logo.png" class="h-12" alt="Logo" />
        </a>

        <!-- Navigation Links (Centered) -->
        <div class="absolute left-1/2 transform -translate-x-1/2">
            <div class="flex space-x-8">
                <a href="{{ route('mitra.dashboard') }}" class="nav-link text-gray-800 font-semibold hover:text-black transition hover:underline">Beranda</a>
                <a href="{{ route('mitra.add_product') }}" class="nav-link text-gray-800 font-semibold hover:text-black transition hover:underline">Tambah Produk</a>
                <a href="{{ route('mitra.check_store') }}" class="nav-link text-gray-800 font-semibold hover:text-black transition hover:underline">Cek Toko</a>
                <a href="#" class="nav-link text-gray-800 font-semibold hover:text-black transition hover:underline">Chat Pembeli</a>
            </div>
        </div>

        <!-- User Menu -->
        <div class="flex items-center space-x-4 pr-4">
            <!-- Dropdown Menu Button -->
            <button
                type="button"
                class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                id="mitra-menu-button"
                aria-expanded="false"
                data-dropdown-toggle="mitra-dropdown"
                data-dropdown-placement="bottom"
            >
                <span class="sr-only">Open mitra menu</span>
                <img class="w-10 h-10 rounded-full" src="/assets/shop.png" alt="mitra photo">
            </button>

            <!-- Dropdown Menu -->
            <div
                class="hidden absolute right-6 mt-2 w-48 bg-white rounded-lg shadow-lg dark:bg-gray-800"
                id="mitra-dropdown"
            >
                <div class="px-4 py-3">
                    <span class="block text-sm font-semibold text-gray-800 dark:text-white">{{ Auth::user()->name }}</span>
                    <span class="block text-sm text-gray-500 dark:text-gray-400 truncate">{{ Auth::user()->email }}</span>
                    <span class="block text-sm text-gray-500 dark:text-gray-400 truncate">{{ Auth::user()->profit }}</span>
                </div>
                <ul class="py-2">
                    <li>
                        <a href="{{ route('mitra.add_product') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600">Tambah Produk</a>
                    </li>
                    <li>
                        <a href="{{ route('mitra.check_store') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600">Cek Toko</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600">Chat Pembeli</a>
                    </li>
                    <li>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-2 text-sm text-red-600 hover:bg-red-100 dark:text-red-400 dark:hover:bg-red-600">Keluar</a>
                        <form id="logout-form" action="{{ route('mitra.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
