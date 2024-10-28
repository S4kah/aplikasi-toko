<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css"
        rel="stylesheet">
</head>

<body style="height: 100vh; overflow: hidden;">
    <div class="sidebar bg-dark text-white d-flex flex-column p-3"
        style="width: 250px; position: fixed; top: 0; bottom: 0;">
        <h1 class="text-center mb-3">Aplikasi Toko</h1>
        <div class="profile mb-3 text-center">
            <img src="{{ asset('img/pfp.jpg') }}" alt="Profile Picture" class="rounded-circle"
                style="width: 80px; height: 80px;">
            <div class="profile-info text-white">
                <p class="m-0">{{ Auth::user()->name }}</p>
            </div>
        </div>
        <div class="nav flex-column mb-auto">
            <a href="{{ route('transaksi') }}" class="btn btn-outline-light text-start mb-2"><i
                    class="bi bi-file-text-fill"></i> Transaksi</a>
        </div>
        <div class="mt-auto">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-danger w-100">
                    <i class="bi bi-box-arrow-left"></i> Log Out
                </button>
            </form>
        </div>
    </div>

    <div class="content" style="margin-left: 250px; padding: 20px; overflow-y: auto;">
        <nav class="navbar navbar-dark bg-dark">
            <button class="btn btn-outline-light" id="sidebarToggle">
                <i class="bi bi-list"></i>
            </button>
            <a class="navbar-brand">Barang</a>
        </nav>
        <div class="search-bar ml-auto">
            <form action="/barang" class="input-group" style="width: 300px;">
                <input class="form-control form-control-sm" type="search" name="search" id="search"
                    placeholder="Cari..." aria-label="Search">
                <button class="btn btn-outline-success btn-sm" type="submit"><i class="bi bi-search"></i></button>
            </form>
        </div>

        @if (session('success'))
            <div class="alert alert-success mt-3" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-hover mt-3">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Jenis</th>
                    <th scope="col">Harga Awal</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @forelse($items as $product)
                    <tr>
                        <th scope="row">{{ ($items->currentPage() - 1) * $items->perPage() + $loop->iteration }}</th>
                        <td>{{ $product->kode_barang }}</td>
                        <td>{{ $product->nama_barang }}</td>
                        <td>{{ $product->kategori }}</td>
                        <td>{{ $product->jenis }}</td>
                        <td>Rp. {{ number_format($product->harga_awal, 0, ',', '.') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="d-flex justify-content-between align-items-center mt-3">
            <a href="{{ route('dasboard-kasir') }}" class="btn btn-primary">
                <i class="bi bi-arrow-left-circle"></i> Kembali
            </a>

            {{-- Pagination --}}
            <div>
                {{ $items->links() }}
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
