<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'EatnNoteIT')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f4f6f5;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }
    main { flex: 1; }

    /* Navbar Modern */
    .navbar-modern {
      background-color: #1E5631; /* hijau gelap */
      border-radius: 0.5rem;
      padding: 0.5rem 1rem;
    }
    .navbar-modern .navbar-brand {
      font-weight: 700;
      color: #CFFFB0;
      font-size: 1.3rem;
    }
    .navbar-modern .nav-link {
      color: #fff;
      margin-right: 1rem;
      font-weight: 500;
      transition: 0.2s;
    }
    .navbar-modern .nav-link:hover {
      color: #CFFFB0;
    }

    .navbar-modern .btn-logout {
      background-color: #e74c3c;
      border: none;
      color: #fff;
      border-radius: 50px;
      padding: 0.3rem 0.8rem;
      font-size: 0.9rem;
      transition: 0.2s;
    }
    .navbar-modern .btn-logout:hover {
      background-color: #c0392b;
    }

    /* Footer Modern */
    .footer-modern {
      background-color: #1E5631;
      color: #fff;
      text-align: center;
      padding: 1rem 0;
      margin-top: auto;
      border-radius: 0.5rem 0.5rem 0 0;
      font-size: 0.9rem;
    }

    /* Card & Button Modern */
    .card-modern {
      border-radius: 1rem;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    .btn-modern {
      border-radius: 50px;
      font-weight: 500;
      transition: 0.2s;
    }
    .btn-modern:hover {
      opacity: 0.85;
    }

    /* Table Hijau */
    .table-modern thead {
      background-color: #1E5631;
      color: #fff;
    }
    .table-modern tbody tr:nth-child(even) {
      background-color: #dff0d8;
    }
  </style>
</head>
<body>

@if (!in_array(Route::currentRouteName(), ['login', 'register']))
<nav class="navbar navbar-expand-lg navbar-modern mb-4">
  <div class="container">
    <a class="navbar-brand" href="{{ route('dashboard') }}">🍱 EatnNoteIT</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav align-items-center">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('dashboard') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('makanan.index') }}">Makanan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('beratbadan.index') }}">Berat Badan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('profil.index') }}">Profil</a>
        </li>
        @if(Auth::check())
        <li class="nav-item ms-2">
          <form action="{{ route('logout') }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah kamu yakin ingin keluar?')">
            @csrf
            <button type="submit" class="btn btn-logout">Logout</button>
          </form>
        </li>
        @endif
      </ul>
    </div>
  </div>
</nav>
@endif

<main class="container">
  @yield('content')
</main>

<footer class="footer-modern">
  <small>© 2025 EatnNoteIT - Catatan Makanan & Berat Badan</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
