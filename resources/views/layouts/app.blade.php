<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container">
    <a class="navbar-brand" href="/">🍱 Sistem Pencatat</a>

    <div class="d-flex align-items-center">
      <a href="/makanan" class="btn btn-outline-light btn-sm me-2">Makanan</a>
      <a href="/beratbadan" class="btn btn-outline-light btn-sm me-2">Berat Badan</a>
      <a href="/profil" class="btn btn-outline-light btn-sm me-2">Profil</a>

      {{-- 🔒 Tombol Logout hanya muncul kalau user sudah login --}}
      @if(Auth::check())
      <form action="{{ route('logout') }}" method="POST" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-danger btn-sm">Logout</button>
      </form>
      @endif
    </div>
  </div>
</nav>

<div class="container">
  @yield('content')
</div>

<footer class="bg-dark text-light text-center p-2 mt-5">
  <small>© 2025 Sistem Pencatat Makanan dan Berat Badan</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
