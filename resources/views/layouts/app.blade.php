<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Book Application')</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  
  {{-- Font awesome --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-p1K7I4Vk8HNYGJ4v8LclvmTj1j9B0EtjT13f2HH4EwGjP7SJX9D75iw9hv5u04/jOAt63eGPeHEBZcS3yP3F8A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>

<!-- Custom CSS -->
  <style>
    html, body {
      height: 100%;
      margin: 0;
    }
    body {
      display: flex;
      flex-direction: column;
      background-color: #eef2f5;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      padding-top: 50px;
    }
    .content-section {
      flex: 1;
    }
    .navbar {
      background: linear-gradient(90deg, #2C3E50, #4CA1AF);
    }
    .navbar-brand {
      font-size: 1.8rem;
      font-weight: bold;
    }
    .hero {
      margin-top: 30px;
      background: url('https://source.unsplash.com/random/1920x500?books') no-repeat center center;
      background-size: cover;
      height: 400px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #fff;
      text-shadow: 2px 2px 4px rgba(0,0,0,0.7);
    }
    .hero h1 {
      font-size: 3rem;
    }
    footer {
      background-color: #2C3E50;
      color: #fff;
      padding: 1rem 0;
    }
    footer a {
      color: #fff;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top shadow">
    <div class="container">
      <a class="navbar-brand" href="{{ route('books.index') }}">Book App</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
              aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="{{ route('books.index') }}">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('books.create') }}">Add Book</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <header class="hero">
    <div class="container text-center">
      <h1>@yield('hero-title')</h1>
      <p class="lead">@yield('hero-subtitle')</p>
    </div>
  </header>

  <!-- Main Content -->
  <div class="content-section">
    <div class="container">
      @yield('content')
    </div>
  </div>

  <!-- Footer -->
  <footer>
    <div class="container text-center">
      <p class="mb-0">&copy; {{ date('Y') }} Book Application. create by Eka Setiawan</p>
      
    </div>
  </footer>

  <!-- Bootstrap JS Bundle (termasuk Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: "{{ session('success') }}",
            timer: 2000,
            showConfirmButton: false
        });
    </script>
    @endif
</body>
</html>
