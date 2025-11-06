@extends('layouts.app')

@section('title', 'Profil Saya')

@section('content')
<h2>Profil Pengguna</h2>

<table class="table table-bordered w-50">
  <tr><th>Nama</th><td>{{ $user->name }}</td></tr>
  <tr><th>Email</th><td>{{ $user->email }}</td></tr>
  <tr><th>Umur</th><td>{{ $user->umur }}</td></tr>
  <tr><th>Tinggi Badan</th><td>{{ $user->tinggi_badan }} cm</td></tr>
  <tr><th>Jenis Kelamin</th><td>{{ $user->jenis_kelamin }}</td></tr>
</table>

<a href="{{ route('profil.edit') }}" class="btn btn-warning">Edit Profil</a>
@endsection
