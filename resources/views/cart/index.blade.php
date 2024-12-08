<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-10">
        <h1 class="text-3xl font-bold text-center mb-10">Keranjang Belanja</h1>
        
        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded-md mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if (!empty($cart))
            <table class="table-auto w-full bg-white rounded-lg shadow-md">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Foto</th>
                        <th class="px-4 py-2">Nama Produk</th>
                        <th class="px-4 py-2">Harga</th>
                        <th class="px-4 py-2">Jumlah</th>
                        <th class="px-4 py-2">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $id => $item)
                        <tr class="border-b">
                            <td class="px-4 py-2">
                                <img src="{{ asset('images/' . $item['photo']) }}" alt="{{ $item['name'] }}" class="w-16 h-16 object-cover">
                            </td>
                            <td class="px-4 py-2">{{ $item['name'] }}</td>
                            <td class="px-4 py-2">Rp{{ number_format($item['price'], 0, ',', '.') }}</td>
                            <td class="px-4 py-2">{{ $item['quantity'] }}</td>
                            <td class="px-4 py-2">Rp{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center text-gray-600">Keranjang kosong!</p>
        @endif

        <form action="{{ route('cart.checkout') }}" method="POST" class="mt-5">
            @csrf
            <button
                type="submit"
                class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg"
            >
                Checkout
            </button>
        </form>
        
    </div>
</body>
</html>
