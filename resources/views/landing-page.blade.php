<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <title>Qasir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand">
                <img src="img/qasirr.png" alt="Qasir Logo" width="80" height="60">
                <a href="#features" class="btn btn-outline-light">Detail</a>
            </a>
            <div class="ms-auto">
                <a href="{{route('login')}}" class="btn btn-outline-light">Login</a>
            </div>
        </div>
    </nav>

    <!-- Landing Section -->
    <section class="text-center py-5 bg-light">
        <div class="container">
            <h1 class="display-4">Selamat Datang di Aplikasi Toko</h1>
            <p class="lead">Kelola transaksi Anda dengan mudah dan efisien menggunakan Kasir Digital. Solusi lengkap untuk manajemen penjualan, inventaris, dan laporan.</p>
        </div>
    </section>

  <!-- Fitur Section -->
  <section id="features" class="container my-5">
    <h2 class="text-center mb-5">Fitur Aplikasi Kami</h2>
    <div class="row mb-4 align-items-center">
        <div class="col-md-6 order-md-2">
            <img src="img/kardus.png" class="img-fluid" alt="Manajemen Stok Barang">
        </div>
        <div class="col-md-6 order-md-1">
            <h5 class="card-title">Manajemen Stok Barang</h5>
            <p class="card-text">Manajemen Stok Barang adalah salah satu fitur utama di aplikasi kasir digital yang berfungsi untuk mengelola dan memantau persediaan barang. 
                Fitur ini membantu pengguna memastikan ketersediaan barang secara real-time dan memudahkan dalam pengambilan keputusan terkait stok.</p>
        </div>
    </div>
    <div class="row mb-4 align-items-center">
        <div class="col-md-6">
            <img src="img/kategorii.png" class="img-fluid" alt="Laporan">
        </div>
        <div class="col-md-6">
            <h5 class="card-title">Laporan</h5>
            <p class="card-text">Laporan adalah fitur penting yang memberikan pengguna wawasan menyeluruh tentang kinerja bisnis mereka.
                 Fitur ini mempermudah analisis penjualan, pemasukan, dan pengeluaran, sehingga membantu dalam pengambilan keputusan yang lebih baik.</p>
        </div>
    </div>
    <div class="row mb-4 align-items-center">
        <div class="col-md-6 order-md-2">
            <img src="img/penjualan.png" class="img-fluid" alt="Point Of Sale">
        </div>
        <div class="col-md-6 order-md-1">
            <h5 class="card-title">Point Of Sale</h5>
            <p class="card-text">Point of Sale (POS) adalah fitur yang dirancang untuk memudahkan proses penjualan di toko.
                 Fitur ini menyediakan antarmuka yang intuitif dan efisien untuk menangani transaksi, 
                 sehingga pelanggan mendapatkan pengalaman berbelanja yang cepat dan menyenangkan..</p>
        </div>
    </div>
</section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Tentang Kami</h5>
                    <p>Kasir Digital adalah solusi yang mempermudah proses penjualan dengan laporan yang akurat.</p>
                </div>
                <div class="col-md-4">
                    <h5>Link Cepat</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Home</a></li>
                        <li><a href="#" class="text-white">About</a></li>
                        <li><a href="#" class="text-white">Services</a></li>
                        <li><a href="#" class="text-white">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Kontak Kami</h5>
                    <p>Alamat: 123 Nama Jalan, Kota, Negara</p>
                    <p>Email: info@aplikasitoko.com</p>
                    <p>Telepon: +123 456 7890</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
