<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kasir Dashboard</title>
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
        justify-content: space-between; /* Push content to top and button to bottom */
      }
      .sidebar.collapsed {
        transform: translateX(-100%);
      }
      .sidebar a {
        color: #adb5bd;
        text-decoration: none;
        display: block;
        padding: 0.5rem 1rem;
      }
      .sidebar a:hover {
        background-color: #495057;
        color: #fff;
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
        flex-wrap: wrap; /* Allows wrapping of cards on smaller screens */
      }
      .collapse-button {
        border: none;
        background: none;
        color: #fff;
        font-size: 1.5em;
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
        margin-bottom: 1rem; /* Space between profile and navigation */
      }
      .sidebar .profile img {
        border-radius: 50%;
        width: 50px; /* Adjusted size for better fit */
        height: 50px;
        margin-right: 0.5rem;
      }
      .sidebar .profile .profile-info {
        color: #adb5bd;
      }
      .sidebar .profile .profile-info p {
        margin: ;
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
        margin-bottom: 10px; /* Added margin to create space between buttons */
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
        text-align: center; /* Center text horizontally */
        margin-top: auto; /* Pushes the button to the bottom */
        padding: 0.5rem 1rem; /* Add padding to ensure button height is sufficient */
        display: flex;
        align-items: center; /* Center text vertically */
        justify-content: center; /* Center text horizontally */
      }
      .sidebar .btn-logout:hover {
        background-color: #c82333;
        color: #fff;
      }
    </style>
  </head>
  <body>
    <div class="sidebar p-3" id="sidebar">
      <div>
        <h1>Qasir</h1>
        <div class="profile mb-3">
          <img src="img/user.png" alt="Profile Picture" class="img-fluid rounded-circle" style="width: 60px; height: 60px;">
          <div class="profile-info ms-2">
            <p class="mb-0">Rizky</p>
            {{-- <small>Kasir</small> --}}
          </div>
        </div>
        <div class="divider"></div>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="btn btn-primary" href="#">Dashboard</a>
          </li>
        </ul>
      </div>
      <div class="logout-container">
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button class="btn btn-logout">Log Out</button> 
        </form>
      </div>
    </div>
    <div class="content" id="content">
      <nav class="navbar navbar-custom">
        <button class="collapse-button" id="collapseButton">&#9776;</button>
        <a class="navbar-brand" href="#">KepalaToko Dashboard</a>
      </nav>
      <h1>Hallo, KepalaToko</h1>

      <div class="card-container">
        <div class="card" style="width: 18rem;">
          <img src="img/penjualan.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Laporan Penjualan</h5>
            <a href="{{route('laporan-penjualan')}}" class="btn btn-primary">Click</a>
          </div>
        </div>

        <div class="card" style="width: 18rem;">
          <img src="img/kardus.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Laporan Barang Masuk</h5>
            <a href="{{route('laporan-barang-masuk')}}" class="btn btn-primary">Click</a>
          </div>
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
