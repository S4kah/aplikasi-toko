<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tranasksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body style="height: 100vh; overflow: hidden;">
    <div class="sidebar bg-dark text-white d-flex flex-column p-3" style="width: 250px; position: fixed; top: 0; bottom: 0;">
      <h1 class="text-center mb-3">Aplikasi Toko</h1>
      <div class="profile mb-3 text-center">
        <img src="{{ asset('img/pfp.jpg') }}" alt="Profile Picture" class="rounded-circle" style="width: 80px; height: 80px;">
        <div class="profile-info text-white">
          <p class="m-0">{{ Auth::user()->name }}</p>
        </div>
      </div>
      <div class="nav flex-column mb-auto">
        <a href="{{ route('barang.index') }}" class="btn btn-outline-light text-start mb-2"><i class="bi bi-box-seam-fill"></i> Barang</a>
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
        <a class="navbar-brand">Kategori</a>
      </nav>

      <div class="d-flex justify-content-between align-items-center mt-3">
        <a href="{{ route('kategori.create') }}" class="btn btn-primary bi bi-plus-circle"> Tambah</a>
    
        <div class="search-bar ml-auto">
            <form action="/kategori" class="input-group" style="width: 300px;">
                <input class="form-control form-control-sm" type="search" name="search" id="search"
                    placeholder="Cari..." aria-label="Search">
                <button class="btn btn-outline-success btn-sm" type="submit"><i class="bi bi-search"></i></button>
            </form>
        </div>
    </div>

      @if(session('success'))
      <div class="alert alert-success mt-3" role="alert">
          {{ session('success') }}
      </div>
      @endif

      <table class="table table-hover">
          <thead>
              <tr>
                  <th>No</th>
                  <th>Kode Barang</th>
                  <th>Nama</th>
                  <th>Jumlah</th>
                  <th>Harga</th>
                  <th>Aksi</th>
              </tr>
          </thead>
          {{-- <tbody class="table-group-divider">
              @forelse ($kategoris as $kategori)
                  <tr>
                    <th scope="row">{{ ($kategoris->currentPage() - 1) * $kategoris->perPage() + $loop->iteration }}</th>
                      <td>{{ $kategori->nama_kategori }}</td>
                      <td>
                          <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                          <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" class="d-inline">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');"><i class="bi bi-trash"></i> Hapus</button>
                          </form>
                      </td>
                  </tr>
                  @empty
              <tr>
                  <td colspan="9" class="text-center">Tidak ada data.</td>
              </tr>
              @endforelse
          </tbody> --}}
      </table>
      
    
        {{-- Pagination --}}

        <div class="container mt-5">
          <form action="" class="row">
              <!-- Total Harga -->
              <div class="col-md-4">
                  <label for="total_harga" class="form-label">Total Harga</label>
                  <input type="number" class="form-control" id="total_harga" readonly>
              </div>
  
              <!-- Total Bayar -->
              <div class="col-md-4">
                  <label for="total_bayar" class="form-label">Total Bayar</label>
                  <input type="number" class="form-control" id="total_bayar">
              </div>
  
              <!-- Kembalian -->
              <div class="col-md-4">
                  <label for="kembalian" class="form-label">Kembalian</label>
                  <input type="number" class="form-control" id="kembalian" readonly>
              </div>
          </form>
      </div>
      <div class="d-flex justify-content-between align-items-center mt-3">
        <a href="" class="btn btn-primary">
            <i class="bi "></i> Bayar
        </a>
      </div>

      <div class="d-flex justify-content-between align-items-center mt-3">
        <a href="{{ route('dasboard-kasir') }}" class="btn btn-primary">
            <i class="bi bi-arrow-left-circle"></i> Kembali
        </a>
      </div>
       
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
