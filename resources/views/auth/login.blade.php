@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
  <div class="col-md-4">
    <div class="card border-success shadow-sm p-4">
      <h2 class="mb-3 text-center">Login</h2>

      @if($errors->any())
        <div class="alert alert-danger text-center">{{ $errors->first() }}</div>
      @endif

      <form action="{{ url('/login') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label class="form-label">Email:</label>
          <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Password:</label>
          <input type="password" name="password" class="form-control" required>
        </div>
        <button class="btn btn-success w-100">Login</button>
      </form>

      <p class="mt-3 text-center">
        Belum punya akun? <a href="{{ route('register') }}">Daftar</a>
      </p>
    </div>
  </div>
</div>
@endsection
