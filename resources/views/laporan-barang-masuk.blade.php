<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kepala Toko Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      body {
        display: flex;
        height: 100vh;
        overflow: hidden;
      }
      .sidebar {
        width: 250px;
        background-color: #343a40;
        color: #fff;
        position: fixed;
        top: 0;
        bottom: 0;
        transition: transform 0.3s;
        display: flex;
        flex-direction: column;
      }
      .sidebar.collapsed {
        transform: translateX(-100%);
      }
      .sidebar a {
        color: #fff;
        text-decoration: none;
      }
      .sidebar a:hover {
        background-color: #495057;
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
      .collapse-button {
        border: none;
        background: none;
        color: #fff;
        font-size: 1.5em;
      }
      .form-row {
        margin-bottom: 1rem;
      }
      .form-group label {
        margin-bottom: 0.5rem;
      }
      .btn {
        height: 38px;
        font-size: 0.875em;
      }
      .card {
        border: 1px solid #dee2e6;
        border-radius: 0.25rem;
        padding: 1rem;
        background-color: #f8f9fa;
      }
      .sidebar h1 {
        text-align: center;
        margin-bottom: 1rem;
      }
      .sidebar .profile {
        display: flex;
        align-items: center;
        padding: 0.5rem 1rem;
        border-bottom: 1px solid #495057;
        margin-bottom: 1rem;
      }
      .sidebar .profile img {
        border-radius: 50%;
        width: 50px;
        height: 50px;
        margin-right: 0.5rem;
      }
      .sidebar .profile .profile-info {
        color: #adb5bd;
      }
      .sidebar .profile .profile-info p {
        margin: 0;
      }
      .sidebar .profile .profile-info small {
        display: block;
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
        margin-top: auto;
        padding: 0.5rem 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .sidebar .btn-logout:hover {
        background-color: #c82333;
        color: #fff;
      }
    </style>
  </head>
  <body>
    <div class="sidebar p-3" id="sidebar">
      <h1>Qasir</h1>
      <div class="profile">
        <img src="img/user.png" alt="Profile Picture">
        <div class="profile-info">
          <p class="mb-0">Rizky</p>
          <small>Kepala Toko</small>
        </div>
      </div>
      <div class="divider"></div>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="btn btn-primary" href="{{route('dasboard-kepalatoko')}}">Dashboard</a>
        </li>
      </ul>
      <!-- Log Out Button -->
      <button class="btn btn-logout">Log Out</button>
    </div>
    <div class="content" id="content">
      <nav class="navbar navbar-custom">
        <button class="collapse-button" id="collapseButton">&#9776;</button>
        <a class="navbar-brand" href="#">KepalaToko Dashboard</a>
      </nav>

      <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Laporan Barang Masuk</h3>
      </div>

      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center mb-4">
            <h5 class="card-title mb-0">Pilih Tanggal</h5>
          </div>
          <form>
            <div class="form-row">
              <div class="form-group col-md-6">
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="dariTanggal">Dari:</label>
                    <input type="date" class="form-control" id="dariTanggal">
                  </div>
                  <div class="col-md-6 mb-3 d-flex align-items-end">
                    <div class="w-100">
                      <label for="sampaiTanggal">Sampai:</label>
                      <input type="date" class="form-control" id="sampaiTanggal">
                    </div>
                    <button type="submit" class="btn btn-primary ms-2">Search</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>

      <!-- Table Container -->
      <div class="card">
        <div class="card-body">
          <table class="table table-hover mb-0">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">ID Pemasukan</th>
                <th scope="col">Tanggal</th>
                <th scope="col">ID Barang</th>
                <th scope="col">Jumlah Item</th>
                <th scope="col">Harga Awal</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>PM3571</td>
                <td>24/12/2024</td>
                <td>BR111</td>
                <td>15</td>
                <td>Rp.22000</td>
              </tr>
            </tbody>
          </table>
        </div>
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
