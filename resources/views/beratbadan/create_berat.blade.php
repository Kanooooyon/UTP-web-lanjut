@extends('layouts.app')

@section('title', 'Tambah Catatan Berat')

@section('content')
<h2 class="mb-3">Tambah Catatan Berat Badan</h2>

<form action="{{ route('beratbadan.store') }}" method="POST">
  @csrf
  <div class="mb-3">
    <label>Tanggal:</label>
    <input type="date" name="tanggal" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Berat Badan (kg):</label>
    <input type="number" step="0.1" name="berat_badan" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Catatan:</label>
    <textarea name="catatan" class="form-control"></textarea>
  </div>
  <button type="submit" class="btn btn-success">Simpan</button>
  <a href="{{ route('beratbadan.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
