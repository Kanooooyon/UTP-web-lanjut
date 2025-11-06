@extends('layouts.app')

@section('title', 'Catatan Berat Badan')

@section('content')
<h2 class="mb-3">Catatan Berat Badan</h2>
<a href="{{ route('beratbadan.create') }}" class="btn btn-primary mb-3">Tambah Catatan</a>

<table class="table table-bordered">
  <thead class="table-dark">
    <tr>
      <th>Tanggal</th>
      <th>Berat Badan</th>
      <th>Catatan</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($berats as $b)
    <tr>
      <td>{{ $b->tanggal }}</td>
      <td>{{ $b->berat_badan }} kg</td>
      <td>{{ $b->catatan }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
