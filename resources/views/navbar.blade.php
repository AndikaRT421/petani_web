<nav class="bg-white py-4 shadow-md fixed w-full z-50">
    <div class="container mx-auto px-6 md:px-12 flex justify-between items-center space-x-4">
        <!-- Left: Account Icon -->
        <div class="relative flex items-center space-x-6">
            <button
                type="button"
                class="flex items-center text-gray-800 font-semibold focus:outline-none"
                id="user-menu-button"
                aria-expanded="false"
                data-dropdown-toggle="user-dropdown"
            >
                <img src="/assets/user.png" alt="Account Icon" class="h-10 w-10 rounded-full">
            </button>
            
            <!-- Dropdown menu -->
            <div
                id="user-dropdown"
                class="hidden absolute top-full mt-2 right-0 z-50 w-90 bg-white rounded-lg shadow divide-y divide-gray-100 dark:bg-gray-700 dark:divide-gray-600"
            >
                <div class="px-4 py-3">
                    <span class="block text-sm font-semibold text-gray-800 dark:text-white">{{ Auth::user()->name }}</span>
                    <span class="block text-sm text-gray-500 dark:text-gray-400 truncate">{{ Auth::user()->email }}</span>
                    <span class="block text-sm text-gray-500 dark:text-gray-400 truncate">{{ Auth::user()->balance }}</span>
                </div>
                <ul class="py-2">
                    <li>
                        <a href="{{ route('belanja') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white">Belanja</a>
                    </li>
                    <li>
                        <a href="{{ route('panen') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white">Prediksi Panen</a>
                    </li>
                    <li>
                        <a href="{{ route('cek_tanaman') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white">Cek Tanaman</a>
                    </li>
                    <li>
                        <a
                            href="#"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:text-red-400 dark:hover:bg-gray-600"
                        >
                            Keluar
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Center: Logo -->
        <div class="flex-1 flex justify-center items-center">
            <a href="{{ route('dashboard') }}">
                <img src="/assets/logo.png" alt="Logo" class="h-10 w-auto">
            </a>
        </div>

        <!-- Right: Cart Icons -->
        <div class="flex items-center space-x-6">
            <button
                id="navbarCartButton"
                class="flex items-center focus:outline-none"
                onclick="location.href='{{ route('cart') }}'"
            >
                <img src="/assets/shopping-cart.png" alt="Cart Icon" class="h-6 w-6">
            </button>
        </div>
    </div>

    <!-- Cart Section -->
    <div
        id="cartSection"
        class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50"
    >
        <div class="bg-gradient-to-r from-green-200 to-yellow-100 border border-gray-300 shadow-2xl rounded-xl p-6 w-full max-w-md dark:bg-gray-800 dark:border-gray-600">
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-6 dark:text-white">
                Keranjang Belanja
            </h2>
            <ul class="divide-y divide-gray-200 mb-6 dark:divide-gray-600">
                <li class="flex justify-between items-center py-3 text-gray-700 dark:text-gray-300">
                    <span>Produk 1</span>
                    <span class="font-medium">Rp2.000.000</span>
                </li>
                <li class="flex justify-between items-center py-3 text-gray-700 dark:text-gray-300">
                    <span>Produk 2</span>
                    <span class="font-medium">Rp1.500.000</span>
                </li>
            </ul>
            <div class="flex justify-between items-center text-lg font-semibold text-gray-800 mb-6 dark:text-gray-200">
                <span>Total:</span>
                <span>Rp3.500.000</span>
            </div>
            <div class="space-y-4">
                <button
                    class="w-full px-6 py-3 bg-green-500 text-white font-semibold text-base rounded-lg shadow-md hover:bg-green-600 focus:outline-none focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-500"
                >
                    Lanjut ke Pembayaran
                </button>
                <button
                    class="w-full px-6 py-3 bg-gray-500 text-white font-semibold text-base rounded-lg shadow-md hover:bg-gray-600 focus:outline-none focus:ring-4 focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-500"
                    onclick="toggleCartSection()"
                >
                    Kembali
                </button>
            </div>
        </div>
    </div>

    <!-- Bottom Section: Navigation Links -->
    <div>
        <nav class="container mx-auto px-6 md:px-12 flex justify-center space-x-6 py-2">
            <a href="{{ route('dashboard') }}" class="nav-link text-gray-800 font-semibold hover:text-black transition hover:underline">
                Beranda
            </a>
            <a href="{{ route('belanja') }}" class="nav-link text-gray-800 font-semibold hover:text-black transition hover:underline">
                Belanja
            </a>
            <a href="{{ route('panen') }}" class="nav-link text-gray-800 font-semibold hover:text-black transition hover:underline">
                Prediksi Panen
            </a>
            <a href="{{ route('cek_tanaman') }}" class="nav-link text-gray-800 font-semibold hover:text-black transition hover:underline">
                Cek Tanaman
            </a>
        </nav>
    </div>
</nav>

<script>
    function toggleCartSection() {
        const cartSection = document.getElementById('cartSection');
        if (cartSection) {
            cartSection.classList.toggle('hidden');
        }
    }
</script>
