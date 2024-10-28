<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Page</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    html, body {
      height: 100%;
    }
    .register-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100%;
    }
    .register-box {
      width: 100%;
      max-width: 400px;
      padding: 15px;
      border: 1px solid #ccc;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      background-color: white;
    }
    .profile {
      text-align: center;
      margin-bottom: 15px;
    }
    .profile img {
      border-radius: 50%;
      width: 80px;
      height: 80px;
    }
    .alert {
      margin-top: 15px;
    }
  </style>
</head>
<body>

  <div class="register-container">
    <div class="register-box">
      <!-- Profil Section -->
      <div class="profile">
        <img src="img/user.png" alt="Profile Picture">
      </div>

      <!-- Register Form -->
      <h2 class="text-center">Register</h2>

      <!-- Error Messages -->
      @if($errors->any())
        <div class="alert alert-danger">
          @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
          @endforeach
        </div>
      @endif

      <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nama:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
    
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
    
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
    
        <div class="form-group">
            <label for="password_confirmation">Konfirmasi Password:</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
        </div>
    
        <div class="form-group">
            <label for="role">Peran:</label>
            <select class="form-control" id="role" name="role" required>
                <option value="kasir">Kasir</option>
                <option value="admin">Admin</option>
                <option value="kepala_toko">Kepala Toko</option>
            </select>
        </div>
    
        <button type="submit" class="btn btn-primary btn-block">Register</button>
    </form>
    
    <div class="text-center mt-3">
        <a class="small" href="{{ route('login') }}">Sudah punya akun? Login di sini</a>
      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
