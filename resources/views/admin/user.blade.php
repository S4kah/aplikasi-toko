<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User</title>
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
        <a href="{{ route('kategori.index') }}" class="btn btn-outline-light text-start mb-2"><i class="bi bi-file-text-fill"></i> Kategori</a>
        <a href="{{ route('admin.barang.index') }}" class="btn btn-outline-light text-start mb-2"><i class="bi bi-box-seam-fill"></i> Barang</a>
        <a href="{{ route('admin.jenis.index') }}" class="btn btn-outline-light text-start mb-2"><i class="bi bi-receipt-cutoff"></i> Jenis Barang</a>
        <a href="{{ route('admin.barang-masuk.index') }}" class="btn btn-outline-light text-start mb-2"><i class="bi bi-dropbox"></i> Barang Masuk</a>
        <a href="{{ route('admin.retur-barang.index') }}" class="btn btn-outline-light text-start mb-2"><i class="bi bi-box2-fill"></i> Retur Barang</a>
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
        <a class="navbar-brand">Users</a>
      </nav>

      <div class="d-flex justify-content-between align-items-center mt-3">
        <!-- Button Tambah di sebelah kiri -->
        <a href="{{ route('admin.user.create') }}" class="btn btn-primary bi bi-plus-circle"> Tambah</a>
    
        <!-- Form Search di sebelah kanan -->
        <div class="search-bar ml-auto">
            <form action="/user" class="input-group" style="width: 300px;">
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
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
        <tr>
          <th scope="row">{{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
            <td>
                          <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                          <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" class="d-inline">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus Barang ini?');"><i class="bi bi-trash"></i> Hapus</button>
                          </form>
                      </td>
                  </tr>
              @endforeach
          </tbody>
      </table>
      <div class="d-flex justify-content-between align-items-center mt-3">
        <a href="{{ route('dasboard-admin') }}" class="btn btn-primary">
            <i class="bi bi-arrow-left-circle"></i> Kembali
        </a>
    
        {{-- Pagination --}}
        <nav aria-label="Page navigation example">
            <ul class="pagination mt-2">
                {{-- Link Previous Page --}}
                @if ($users->onFirstPage())
                    <li class="page-item disabled"><span class="page-link">Previous</span></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $users->previousPageUrl() }}">Previous</a></li>
                @endif
    
                {{-- Pagination Elements --}}
                @foreach ($users->links()->elements as $element)
                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $users->currentPage())
                                <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
    
                {{-- Link Next Page --}}
                @if ($users->hasMorePages())
                    <li class="page-item"><a class="page-link" href="{{ $users->nextPageUrl() }}">Next</a></li>
                @else
                    <li class="page-item disabled"><span class="page-link">Next</span></li>
                @endif
            </ul>
        </nav>
    </div>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
