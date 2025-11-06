@extends('layouts.app')

@section('title', 'Edit Profil')

@section('content')
<h2>Edit Profil</h2>

@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<form action="{{ route('profil.update') }}" method="POST">
  @csrf

  <div class="mb-3">
    <label>Nama</label>
    <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
  </div>

  <div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
  </div>

  <div class="mb-3">
    <label>Umur</label>
    <input type="number" name="umur" class="form-control" value="{{ $user->umur }}">
  </div>

  <div class="mb-3">
    <label>Tinggi Badan (cm)</label>
    <input type="number" name="tinggi_badan" class="form-control" value="{{ $user->tinggi_badan }}">
  </div>

  <div class="mb-3">
    <label>Jenis Kelamin</label>
    <select name="jenis_kelamin" class="form-control">
      <option value="">Pilih</option>
      <option value="Laki-laki" {{ $user->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
      <option value="Perempuan" {{ $user->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
    </select>
  </div>

  <button type="submit" class="btn btn-success">Simpan</button>
  <a href="{{ route('profil.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
