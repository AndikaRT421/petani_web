@extends('layouts.master_mitra')
<!-- Hero Section -->
@section('content')

<section class="bg-gray-100 py-12 relative" 
         style="background: url('{{ asset('assets/background_user_dashboard.jpg') }}') no-repeat center center; background-size: cover; height: 300px;">
    <!-- Optional overlay for better text visibility -->
    <div class="absolute inset-0 bg-black opacity-40 pointer-events-none"></div> 
    <!-- Text container -->
    <div class="container mx-auto flex items-center justify-center h-full relative z-10">
        <h1 class="text-4xl md:text-5xl font-bold text-white">Selamat Datang</h1>
    </div>
</section>

<!-- Product Grid -->
<section class="py-12 bg-gray-50 mb-12">
    <div class="container mx-auto px-6">
        <!-- Header -->
        <h2 class="text-3xl font-bold text-gray-800 mb-8">Laporan Penjualan Bulanan</h2>

        <!-- Filter Section -->
        <div class="bg-white p-6 rounded-lg shadow-lg mb-8">
            <h3 class="text-xl font-semibold text-gray-700 mb-4">Filter Laporan</h3>
            <form class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-4">
                <!-- Month Filter -->
                <div class="w-full md:w-1/3">
                    <label for="month" class="block text-sm font-medium text-gray-700">Bulan</label>
                    <select id="month" name="month" class="mt-1 block w-full bg-gray-100 border border-gray-300 rounded-md py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Pilih Bulan</option>
                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                </div>
                <!-- Year Filter -->
                <div class="w-full md:w-1/3">
                    <label for="year" class="block text-sm font-medium text-gray-700">Tahun</label>
                    <select id="year" name="year" class="mt-1 block w-full bg-gray-100 border border-gray-300 rounded-md py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Pilih Tahun</option>
                        <option value="2024">2024</option>
                        <option value="2023">2023</option>
                        <option value="2022">2022</option>
                        <option value="2021">2021</option>
                    </select>
                </div>
                <!-- Filter Button -->
                <div class="w-full md:w-auto">
                    <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">Terapkan Filter</button>
                </div>
            </form>
        </div>

        <!-- Sales Summary Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Total Sales -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold text-gray-700">Total Penjualan</h3>
                <p class="text-3xl font-bold text-green-500 mt-2">{{ Auth::user()->profit }}</p>
                <span class="text-sm text-gray-500">+10% dari bulan lalu</span>
            </div>
            <!-- Total Orders -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold text-gray-700">Total Pesanan</h3>
                <p class="text-3xl font-bold text-blue-500 mt-2">250</p>
                <span class="text-sm text-gray-500">+5% dari bulan lalu</span>
            </div>
            <!-- Total Customers -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold text-gray-700">Total Pelanggan</h3>
                <p class="text-3xl font-bold text-purple-500 mt-2">180</p>
                <span class="text-sm text-gray-500">+15% dari bulan lalu</span>
            </div>
        </div>

        <!-- Sales Table -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden mb-8">
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 text-left">
                            <th class="py-3 px-4">Produk</th>
                            <th class="py-3 px-4">Jumlah Terjual</th>
                            <th class="py-3 px-4">Pendapatan</th>
                            <th class="py-3 px-4">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <tr class="border-b">
                            <td class="py-3 px-4">Produk A</td>
                            <td class="py-3 px-4">50</td>
                            <td class="py-3 px-4">Rp 5.000.000</td>
                            <td class="py-3 px-4">2024-09-15</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-3 px-4">Produk B</td>
                            <td class="py-3 px-4">30</td>
                            <td class="py-3 px-4">Rp 3.000.000</td>
                            <td class="py-3 px-4">2024-09-20</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-3 px-4">Produk C</td>
                            <td class="py-3 px-4">20</td>
                            <td class="py-3 px-4">Rp 2.000.000</td>
                            <td class="py-3 px-4">2024-09-28</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Sales Chart -->
    <div class="container mx-auto px-6">
        <!-- Header -->
        <h2 class="text-3xl font-bold text-gray-800 mb-8 hidden md:block">Laporan Pendapatan Tahunan</h2>

        <!-- Filter Section for Sales Chart -->
        <div class="bg-white p-6 rounded-lg shadow-lg mb-8 hidden md:block">
            <h3 class="text-xl font-semibold text-gray-700 mb-4">Filter Grafik Penjualan</h3>
            <form id="chartFilterForm" class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-4">
                <!-- Year Filter -->
                <div class="w-full md:w-1/3">
                    <label for="chartYear" class="block text-sm font-medium text-gray-700">Tahun</label>
                    <select id="chartYear" name="year" class="mt-1 block w-full bg-gray-100 border border-gray-300 rounded-md py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="2024">2024</option>
                        <option value="2023">2023</option>
                        <option value="2022">2022</option>
                        <option value="2021">2021</option>
                    </select>
                </div>
                <!-- Filter Button -->
                <div class="w-full md:w-auto">
                    <button type="button" id="applyFilter" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">Terapkan Filter</button>
                </div>
            </form>
        </div>

        <!-- Sales Chart -->
        <div class="bg-white p-6 rounded-lg shadow-lg hidden md:block">
            <h3 class="text-xl font-semibold text-gray-700 mb-4">Grafik Penjualan</h3>
            <canvas id="salesChart" class="w-full h-64"></canvas> <!-- Canvas for Chart -->
        </div>
    </div>
</section>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Script for Chart.js and Filter -->
    <script>
    // Dummy data for different years
    const salesData = {
        2024: [1000000, 2000000, 3000000, 2500000, 4000000, 5000000, 6000000, 5500000, 7000000, 8000000, 9000000, 10000000],
        2023: [1200000, 2200000, 3200000, 2700000, 4100000, 5200000, 6300000, 5600000, 7100000, 8200000, 9300000, 10400000],
        2022: [1100000, 2100000, 2900000, 2600000, 4300000, 5300000, 6300000, 5400000, 7100000, 8100000, 9200000, 10300000],
        2021: [900000, 1800000, 2700000, 2400000, 3800000, 4900000, 5800000, 5300000, 6800000, 7700000, 8600000, 9600000]
    };

    // Create the initial chart
    const ctx = document.getElementById('salesChart').getContext('2d');
    let salesChart = new Chart(ctx, {
        type: 'line', // Line chart
        data: {
            labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'], // Month labels
            datasets: [{
                label: 'Pendapatan (Rp)',
                data: salesData[2024], // Initial data for the year 2024
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 2,
                fill: true,
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return 'Rp ' + value.toLocaleString(); // Format to Rupiah
                        }
                    }
                }
            }
        }
    });

    // Filter Logic
    document.getElementById('applyFilter').addEventListener('click', function() {
        const selectedYear = document.getElementById('chartYear').value;
        salesChart.data.datasets[0].data = salesData[selectedYear]; // Update chart data
        salesChart.update(); // Redraw chart
    });
    </script>

@endsection

<!-- Footer -->
@section('footer')