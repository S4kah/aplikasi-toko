<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body style="height: 100vh; overflow: hidden;">
    <!-- Sidebar -->
    <div class="sidebar bg-dark text-white d-flex flex-column p-3" style="width: 250px; position: fixed; top: 0; bottom: 0;">
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
    <div class="content" style="margin-left: 250px; padding: 20px; overflow-y: auto;">
        <nav class="navbar navbar-dark bg-dark mb-3">
            <div class="container-fluid">
                <button class="btn btn-outline-light" id="sidebarToggle">
                    <i class="bi bi-list"></i>
                </button>
                <a class="navbar-brand">User</a>
            </div>
        </nav>

        <body style="height: 100vh; display: flex; justify-content: center; align-items: center; background-color: #f8f9fa;">
          <div class="container">
              <div class="card" style="max-width: 600px; margin: auto;">
                  <div class="card-body">
                      <h2 class="text-center mb-4">Tambah User</h2>

                      @if($errors->any())
                      <div class="alert alert-danger">
                          @foreach($errors->all() as $error)
                              <p>{{ $error }}</p>
                          @endforeach
                      </div>
                      @endif

                      <form method="POST" action="{{ route('admin.user.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="Name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="Name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="Email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="Email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="Password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="Password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" id="role" name="role" required>
                                <option value="" disabled selected>Pilih Role</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role }}">{{ ucfirst($role) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">Kembali</a>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
