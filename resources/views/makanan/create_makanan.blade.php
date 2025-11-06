@extends('layouts.app')

@section('title', 'Tambah Makanan')

@section('content')
<h2 class="mb-3">Tambah Data Makanan</h2>

<form action="{{ route('makanan.store') }}" method="POST">
  @csrf
  <div class="mb-3">
    <label>Nama Makanan:</label>
    <input type="text" name="nama_makanan" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Kalori:</label>
    <input type="number" name="kalori" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Waktu Makan:</label>
    <select name="waktu_makan" class="form-select" required>
      <option value="Pagi">Pagi</option>
      <option value="Siang">Siang</option>
      <option value="Malam">Malam</option>
    </select>
  </div>
  <div class="mb-3">
    <label>Tanggal:</label>
    <input type="date" name="tanggal" class="form-control" required>
  </div>
  <button type="submit" class="btn btn-success">Simpan</button>
  <a href="{{ route('makanan.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
