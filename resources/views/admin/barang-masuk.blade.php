<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Barang Masuk</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        link {
          display: none;
        }
        body {
            display: flex;
            height: 100vh;
            overflow: hidden;
        }
        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: #000000;
            position: fixed;
            top: 0;
            bottom: 0;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s;
        }

        .sidebar.collapsed {
            transform: translateX(-100%);
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #eadddd;
        }

        .content {
            flex-grow: 1;
            padding: 20px;
            margin-left: 250px;
            transition: margin-left 0.3s;
        }

        .content.shift {
            margin-left: 0;
        }

        .navbar-custom {
            background-color: #343a40;
        }

        .navbar-custom .navbar-brand {
            color: #fff;
        }

        .card-container {
            display: flex;
            gap: 2rem;
            flex-wrap: wrap;
        }

        .collapse-button {
            border: none;
            background: none;
            color: #fff;
            font-size: 1.5em;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .sidebar h1 {
            text-align: center;
            margin-bottom: 1rem;
            font-family: 'Roboto', sans-serif;
            font-weight: bold;
            color: #e9ecef;
            font-size: 1.75rem;
            letter-spacing: 1px;
        }

        .sidebar .profile {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 1rem;
            border-bottom: 1px solid #495057;
            margin-bottom: 1rem;
        }

        .sidebar .profile img {
            border-radius: 50%;
            width: 80px;
            height: 80px;
            margin-bottom: 0.5rem;
        }

        .sidebar .profile .profile-info {
            color: #adb5bd;
            text-align: center;
        }

        .sidebar .profile .profile-info p {
            margin: 0;
            font-size: 1.1rem;
            font-weight: 500;
        }

        .sidebar .profile .profile-info small {
            display: block;
            color: #6c757d;
        }

        .sidebar .btn-primary {
            background-color: #adb5bd;
            border: none;
            color: #343a40;
            width: 100%;
            text-align: left;
            margin-bottom: 10px;
        }

        .sidebar .btn-primary:hover {
            background-color: #0d6efd;
            color: #fff;
        }

        .sidebar .btn-logout {
            background-color: #dc3545;
            border: none;
            color: #fff;
            width: 100%;
            text-align: center;
            padding: 0.5rem 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: auto;
        }

        .sidebar .btn-logout:hover {
            background-color: #c82333;
            color: #fff;
        }

        .alert-icon {
            font-size: 3rem;
            color: #dc3545;
            display: inline-block;
            margin-bottom: 1rem;
        }

        .shake {
            animation: shake 0.5s ease-in-out;
        }

        @keyframes shake {
            0% {
                transform: translateX(0);
            }

            25% {
                transform: translateX(-5px);
            }

            50% {
                transform: translateX(0);
            }

            75% {
                transform: translateX(5px);
            }

            100% {
                transform: translateX(0);
            }
        }

        .modal-body p {
            font-size: 1.1rem;
            font-weight: 500;
            color: #333;
            margin-top: 0;
        }
    </style>
</head>
<body>
    <div class="sidebar p-3" id="sidebar">
        <div class="profile">
            <img src="{{ asset('img/pfp.jpg') }}" alt="Profile Picture">
            <div class="profile-info">
              <p>{{ Auth::user()->name }}</p>
            </div>
        </div>
      <div class="divider mb-3"></div>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="btn btn-primary bi bi-clipboard-fill" href="{{route('dasboard-admin')}}"> Dashboard Admin</a>
        </li>
      </ul>
      <!-- Log Out Button -->
      <button class="btn btn-logout mt-auto">Log Out</button>
    </div>

    <div class="content" id="content">
      <nav class="navbar navbar-custom">
        <button class="collapse-button" id="collapseButton">&#9776;</button>
        <a class="navbar-brand">Barang Dashboard</a>
      </nav>


      <div class="d-flex justify-content-between align-items-center mb-3">
      </div>

      <div class="container mb-3">
        <!-- Tambah Data button -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahBarangMModal">
        Tambah <i class="bi bi-plus-circle"></i>
        </button>

        <div class="search-bar">
          <div>
            <form action="/barang-masuk"  class="input-group">
              <input class="form-control form-control-sm" type="search" name="search" id="search" placeholder="Cari..." aria-label="Search">
              <button class="btn btn-outline-success btn-sm" type="submit"><i class="bi bi-search"></i></button>
            </form>
          </div>
        </div>
      </div>

      <!-- Tambah Data -->
      <div class="modal fade" id="tambahBarangMModal" tabindex="-1" aria-labelledby="tambahBarangMModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahBarangMModalLabel">Tambah Barang Masuk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="tambahBarangMForm" method="POST" action="{{ route('admin.barang-masuk.store') }}">
                        @csrf
                        <input type="hidden" name="jenis_transaksi" value="Barang Masuk">
                        <div class="mb-3">
                            <label for="nama_barangi" class="form-label">Nama Barang</label>
                            <select class="form-select" aria-label="Default select example" id="nama_barang" name="nama_barang" required>
                                <option value="" disabled selected>Pilih Kategori</option>
                                @foreach($barangs as $item)
                                    <option value="{{ $item->nama_barang }}">{{ $item->nama_barang }}</option>
                                @endforeach
                             </select>
                        </div>
                        <div class="mb-3">
                            <label for="stok" class="form-label">Stok</label>
                            <input type="text" class="form-control" id="stok" name="stok" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama_supplier" class="form-label">Nama Supplier</label>
                            <input type="text" step="0.01" class="form-control" id="nama_supplier" name="nama_supplier" required>
                        </div>
                        <div class="mb-3">
                            <label for="waktu_transaksi" class="form-label">Waktu Transaksi</label>
                            <input type="datetime-local" class="form-control" id="waktu_transaksi" name="waktu_transaksi" required>
                        </div>                        
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
      </div>

      @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <table class="table table-hover">
      <thead>
          <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Barang</th>
              <th scope="col">Stok</th>
              <th scope="col">Nama Supplier</th>
              <th scope="col">Waktu Transaksi</th>
          </tr>
      </thead>
      <tbody class="table-group-divider">
          @forelse($barangms as $index => $product)
              <tr>
                  <td>{{ ($barangms->currentPage() - 1) * $barangms->perPage() + $index + 1 }}</td>
                  <td>{{ $product->nama_barang }}</td>
                  <td>{{ $product->stok }}</td>
                  <td>{{ $product->nama_supplier }}</td>
                  <td>{{ $product->waktu_transaksi }}</td>
              </tr>
          @empty
              <tr>
                  <td colspan="5" class="text-center">Tidak ada data.</td>
              </tr>
          @endforelse
      </tbody>
    </table>
      <div class="d-flex justify-content-end">
          {{$barangms->links()}}
      </div>
      <div class="d-flex justify-content-between align-items-center ">
        <a href="{{ route('dasboard-admin') }}" class="btn btn-primary">
            <i class="bi bi-arrow-left-circle"></i> Kembali
        </a>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
      document.getElementById('collapseButton').addEventListener('click', function() {
        var sidebar = document.getElementById('sidebar');
        var content = document.getElementById('content');
        if (sidebar.classList.contains('collapsed')) {
          sidebar.classList.remove('collapsed');
          content.classList.remove('shift');
        } else {
          sidebar.classList.add('collapsed');
          content.classList.add('shift');
        }
      });
    </script>    
  </body>
</html>
