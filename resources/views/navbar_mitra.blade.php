<nav class="sticky top-0 bg-gradient-to-r from-green-500 to-yellow-400 border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="{{ route('mitra.dashboard') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="/assets/logo.png" class="h-12" alt="Logo" />
        </a>
        <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="mitra-menu-button" aria-expanded="false" data-dropdown-toggle="mitra-dropdown" data-dropdown-placement="bottom">
                <span class="sr-only">Open mitra menu</span>
                <img class="w-10 h-10 rounded-full" src="/assets/shop.png" alt="mitra photo">
            </button>
            <!-- Dropdown menu -->
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="mitra-dropdown">
                <div class="px-4 py-3">
                    <span class="block text-sm text-gray-900 dark:text-white">Bonnie Green</span>
                    <span class="block text-sm text-gray-500 truncate dark:text-gray-400">name@flowbite.com</span>
                </div>
                <ul class="py-2" aria-labelledby="mitra-menu-button">
                    <li>
                        <a href="{{ route('mitra.add_product') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Tambah Produk</a>
                    </li>
                    <li>
                        <a href="{{ route('mitra.check_store') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Cek Toko</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Chat Pembeli</a>
                    </li>
                    <li>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Keluar</a>
                        <form id="logout-form" action="{{ route('mitra.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-mitra">
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border-4 border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-transparent dark:border-gray-700">
                <li>
                    <a href="{{ route('mitra.dashboard') }}" class="block py-2 px-3 text-black rounded hover:text-white hover:underline md:bg-transparent md:text-black md:p-0">Beranda</a>
                </li>
                <li>
                    <a href="{{ route('mitra.add_product') }}" class="block py-2 px-3 text-black rounded hover:text-white hover:underline md:bg-transparent md:text-black md:p-0">Tambah Produk</a>
                </li>
                <li>
                    <a href="{{ route('mitra.check_store') }}" class="block py-2 px-3 text-black rounded hover:text-white hover:underline md:bg-transparent md:text-black md:p-0">Cek Toko</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-3 text-black rounded hover:text-white hover:underline md:bg-transparent md:text-black md:p-0">Chat Pembeli</a>
                </li>
            </ul>
        </div>
    </div>
</nav>