<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
  </head>
  <body class="d-flex" style="height: 100vh; overflow: hidden;">
    <input type="checkbox" id="sidebarToggle" style="display: none;">
    
    <div class="sidebar bg-dark text-white d-flex flex-column p-3" style="width: 250px; position: fixed; top: 0; bottom: 0;">
      <h1 class="text-center mb-3">Aplikasi Toko</h1>
      <div class="profile mb-3 text-center">
        <img src="{{ asset('img/pfp.jpg') }}" alt="Profile Picture" class="rounded-circle" style="width: 80px; height: 80px;">
        <div class="profile-info text-white">
          <p class="m-0">{{ Auth::user()->name }}</p>
        </div>
      </div>
      <div class="nav flex-column mb-auto">
        <a href="{{route('kategori.index')}}" class="btn btn-outline-light text-start mb-2"><i class="bi bi-file-text-fill"></i> Kategori</a>
        <a href="{{route('admin.barang.index')}}" class="btn btn-outline-light text-start mb-2"><i class="bi bi-box-seam-fill"></i> Barang</a>
        <a href="{{route('admin.jenis.index')}}" class="btn btn-outline-light text-start mb-2"><i class="bi bi-receipt-cutoff"></i> Jenis Barang</a>
        <a href="{{route('admin.barang-masuk.index')}}" class="btn btn-outline-light text-start mb-2"><i class="bi bi-dropbox"></i> Barang Masuk</a>
        <a href="{{route('admin.retur-barang.index')}}" class="btn btn-outline-light text-start mb-2"><i class="bi bi-box2-fill"></i> Retur Barang</a>
        <a href="{{route('admin.user.index')}}" class="btn btn-outline-light text-start mb-2"><i class="bi bi-person-circle"></i> User</a>
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
        <a class="navbar-brand">Admin Dashboard</a>
      </nav>
      <h1 class="font-weight-bold">Welcome Back, {{ Auth::user()->name }}!</h1>

      <!-- Card container with multiple cards -->
      <div class="row g-3">
        <div class="col-6 col-md-4 col-lg-3">
          <div class="card shadow">
            <img src="img/kategorii.png" class="card-img-top" alt="Kategori">
            <div class="card-body text-center">
              <h5 class="card-title">Kategori</h5>
              <a class="btn btn-primary">
                {{ $jumlahKategori }}
              </a>
            </div>
          </div>
        </div>        

        <div class="col-6 col-md-4 col-lg-3">
          <div class="card shadow">
            <img src="img/kardus-tersedia.png" class="card-img-top" alt="Barang">
            <div class="card-body text-center">
              <h5 class="card-title">Barang</h5>
              <a class="btn btn-primary">
                {{ $jumlahBarang }}
              </a>
            </div>
          </div>
        </div>

        <div class="col-6 col-md-4 col-lg-3">
          <div class="card shadow">
            <img src="img/kardus-tersedia.png" class="card-img-top" alt="Jenis Barang">
            <div class="card-body text-center">
              <h5 class="card-title">Jenis Barang</h5>
              <a class="btn btn-primary">
                {{ $jumlahJenis }}
              </a>
            </div>
          </div>
        </div>

        <div class="col-6 col-md-4 col-lg-3">
          <div class="card shadow">
            <img src="img/kardus.png" class="card-img-top" alt="Barang Masuk">
            <div class="card-body text-center">
              <h5 class="card-title">Barang Masuk</h5>
              <a class="btn btn-primary">
                {{ $jumlahBarangM }}
              </a>
            </div>
          </div>
        </div>

        <div class="col-6 col-md-4 col-lg-3">
          <div class="card shadow">
            <img src="img/retur-barang.png" class="card-img-top" alt="Retur Barang">
            <div class="card-body text-center">
              <h5 class="card-title">Retur Barang</h5>
              <a class="btn btn-primary">
                {{ $jumlahBarangR }}
              </a>
            </div>
          </div>
        </div>

        <div class="col-6 col-md-4 col-lg-3">
          <div class="card shadow">
            <img src="img/user.png" class="card-img-top" alt="User">
            <div class="card-body text-center">
              <h5 class="card-title">User</h5>
              <a class="btn btn-primary">
                {{ $jumlahUser }}
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
