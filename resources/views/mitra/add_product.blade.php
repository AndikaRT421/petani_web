@extends('layouts.master_mitra')

@section('content')

<div class="max-w-4xl mx-auto mt-10 p-8 bg-gradient-to-r from-green-200 to-yellow-100 border-gray-200 dark:bg-gray-900 rounded-xl shadow-md">
    <h2 class="text-3xl font-extrabold text-gray-800 mb-6 text-center">Tambah Produk</h2>
    <form id="product-form" action="#" method="POST" enctype="multipart/form-data">
        @csrf <!-- Ensure to include CSRF token for security -->
        <div class="lg:flex lg:space-x-8">
            <!-- Bagian Detail Produk -->
            <div class="w-full lg:w-2/3 mb-6 lg:mb-0">
                <!-- Nama Produk -->
                <div class="mb-5">
                    <label class="block text-gray-700 text-sm font-semibold mb-2" for="nama-produk">
                        Nama Produk
                    </label>
                    <input type="text" id="nama-produk" name="nama_produk" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Nama produk" required>
                </div>

                <!-- Jenis Produk -->
                <div class="mb-5">
                    <label class="block text-gray-700 text-sm font-semibold mb-2" for="jenis-produk">
                        Jenis Produk
                    </label>
                    <select id="jenis-produk" name="jenis_produk" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                        <option value="">Pilih Jenis Produk</option>
                        <option value="Pupuk dan Vitamin">Pupuk dan Vitamin</option>
                        <option value="Benih">Benih</option>
                        <option value="Alat Tani">Alat Tani</option>
                        <option value="Obat Tanaman">Obat Tanaman</option>
                    </select>
                </div>

                <!-- Harga -->
                <div class="mb-5">
                    <label class="block text-gray-700 text-sm font-semibold mb-2" for="harga">
                        Harga (Rp)
                    </label>
                    <input type="number" id="harga" name="harga" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Harga produk" required>
                    <span id="formattedHarga" class="block text-gray-700 mt-2"></span>
                </div>

                <!-- Stok -->
                <div class="mb-5">
                    <label class="block text-gray-700 text-sm font-semibold mb-2" for="stok">
                        Stok
                    </label>
                    <input type="number" id="stok" name="stok" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Jumlah stok" required>
                </div>

                <!-- Satuan -->
                <div class="mb-5">
                    <label class="block text-gray-700 text-sm font-semibold mb-2" for="satuan">
                        Satuan
                    </label>
                    <input type="text" id="satuan" name="satuan" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Satuan produk (contoh: kg, liter)" required>
                </div>

                <!-- Deskripsi -->
                <div class="mb-5">
                    <label class="block text-gray-700 text-sm font-semibold mb-2" for="deskripsi">
                        Deskripsi Produk
                    </label>
                    <textarea id="deskripsi" name="deskripsi" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Deskripsi produk" rows="4" required></textarea>
                </div>
            </div>

            <!-- Bagian Foto Produk -->
            <div class="w-full lg:w-1/3 mb-6 lg:mb-0">
                <div class="mb-5">
                    <label class="block text-black text-sm font-semibold mb-2" for="foto-produk">
                        Foto Produk
                    </label>
                    <input type="file" id="foto-produk" name="foto_produk" class="w-full px-4 py-2 border border-gray-500 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400" accept="image/*" required>
                </div>

                <!-- Preview Foto (Optional) -->
                <div class="mb-6" id="preview-container">
                    <label class="block text-black text-sm font-semibold mb-2">
                        Preview Foto Produk
                    </label>
                    <div class="w-full h-80 border-2 border-dashed border-black rounded-lg flex items-center justify-center text-black">
                        <span id="preview-text">Foto belum diunggah</span>
                        <img id="preview-image" src="#" alt="Preview Produk" class="hidden w-full h-full object-cover rounded-lg">
                    </div>
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit" class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow-lg transition-all focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Tambah Produk
            </button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.getElementById('foto-produk').addEventListener('change', function(event) {
        const file = event.target.files[0];
        
        // Pengecekan format gambar
        if (!file.type.startsWith('image/')) {
            alert('Silakan unggah file gambar yang valid.');
            return;
        }
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const previewImage = document.getElementById('preview-image');
                const previewText = document.getElementById('preview-text');

                previewImage.src = e.target.result;
                previewImage.classList.remove('hidden');
                previewText.classList.add('hidden');
            }
            reader.readAsDataURL(file);
        }
    });

    document.getElementById('product-form').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Assuming that your form is validated and the product upload is successful
        Swal.fire({
            title: 'Produk Berhasil Ditambahkan!',
            text: 'Produk Anda telah berhasil ditambahkan ke sistem.',
            icon: 'success',
            confirmButtonText: 'Kembali ke Dashboard',
            confirmButtonColor: '#0000FF'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/mitra/dashboard';
            }
        });
    });

    const hargaInput = document.getElementById('harga');
    const formattedHarga = document.getElementById('formattedHarga');

    hargaInput.addEventListener('input', function (e) {
        let value = this.value;
        let formattedValue = new Intl.NumberFormat('id-ID').format(value); // Format angka dengan pemisah titik
        formattedHarga.textContent = `Rp ${formattedValue}`;
    });
</script>

@endsection

@section('footer')
