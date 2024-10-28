<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body>
    <!-- Sidebar -->
    <div class="d-flex">
        <div class="sidebar bg-dark text-white d-flex flex-column p-3" style="width: 250px; height: 100vh; position: fixed; top: 0; bottom: 0;">
            <h1 class="text-center mb-3">Aplikasi Toko</h1>
            <div class="profile mb-3 text-center">
                <img src="{{ asset('img/pfp.jpg') }}" alt="Profile Picture" class="rounded-circle" style="width: 80px; height: 80px;">
                <div class="profile-info text-white">
                    <p class="m-0">{{ Auth::user()->name }}</p>
                </div>
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

        <!-- Content -->
        <div class="content flex-grow-1 overflow-auto" style="margin-left: 250px;">
            <nav class="navbar navbar-dark bg-dark mb-3">
                <div class="container-fluid">
                    <button class="btn btn-outline-light" id="sidebarToggle">
                        <i class="bi bi-list"></i>
                    </button>
                    <a class="navbar-brand">Barang</a>
                </div>
            </nav>

            <div class="container">
                <div class="card" style="max-width: 600px; margin: auto;">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Edit Barang</h2>

                        @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                        @endif      

                        <form method="POST" action="{{ route('admin.barang.update', $barangs->id) }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" id="editBarangId" name="id" value="{{ $barangs->id }}">
                            <div class="mb-3">
                              <label for="editkode_barang" class="form-label">ID Barang</label>
                              <input type="text" class="form-control" id="editkode_barang" name="kode_barang" required>
                            </div>
                            <div class="mb-3">
                                <label for="editnama_barang" class="form-label">Nama barang</label>
                                <input type="text" class="form-control" id="editnama_barang" name="nama_barang" required>
                            </div>
                            <div class="mb-3">
                              <label for="editkategori" class="form-label">Kategori</label>
                              <select class="form-select" aria-label="Default select example" id="editkategori" name="kategori" required>
                                  <option value="" disabled selected>Pilih Kategori</option>
                                  @if($kategoris->isEmpty())
                                        <option value="" disabled>Tidak ada kategori tersedia</option>
                                    @else
                                    @foreach($kategoris as $kategori)
                                        <option value="{{ $kategori->nama_kategori }}" {{ $kategori->nama_kategori == $barangs->kategori ? 'selected' : '' }}>{{ $kategori->nama_kategori }}</option>
                                    @endforeach
                                  @endif
                              </select>
                            </div>
                            <div class="mb-3">
                              <label for="editjenis" class="form-label">Jenis</label>
                              <select class="form-select" aria-label="Default select example" id="editjenis" name="jenis" required>
                                <option value="" disabled selected>Pilih jenis</option>
                                    @if($jenis->isEmpty())
                                        <option value="" disabled>Tidak ada kategori tersedia</option>
                                    @else
                                    @foreach($jenis as $jeniss)
                                        <option value="{{ $jeniss->name_jenis }}" {{ $jeniss->name_jenis == $barangs->jenis ? 'selected' : '' }}>{{ $jeniss->name_jenis }}</option>
                                    @endforeach
                                @endif
                              </select>
                            </div>
                            <div class="mb-3">
                                <label for="editharga_awal" class="form-label">Harga Awal</label>
                                <input type="text" step="0.01" class="form-control" id="editharga_awal" name="harga_awal" required>
                            </div>
                              <div class="d-flex justify-content-between align-items-center mt-3">
                                  <a href="{{ route('admin.barang.index') }}" class="btn btn-secondary">Kembali</a>
                                  <button type="submit" class="btn btn-primary">Simpan</button>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>

            @if(session('success'))
                <div class="alert alert-success mt-3" role="alert">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>