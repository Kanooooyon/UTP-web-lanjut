@extends('layouts.app')

@section('content')
<h2>Daftar Makanan</h2>
<table class="table table-bordered">
  <tr><th>Nama</th><th>Kalori</th><th>Waktu</th><th>Tanggal</th></tr>
  @foreach($makanans as $m)
  <tr>
    <td>{{ $m->nama_makanan }}</td>
    <td>{{ $m->kalori }}</td>
    <td>{{ $m->waktu_makan }}</td>
    <td>{{ $m->tanggal }}</td>
  </tr>
  @endforeach
</table>
@endsection
