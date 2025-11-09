@extends('layouts.app')

@section('title', 'Edit Makanan | EatnNoteIT')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-center">✏️ Edit Makanan</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('makanan.update', $makanan->id) }}" method="POST" class="card p-4 shadow-sm">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Makanan</label>
            <input type="text" name="nama_makanan" class="form-control" value="{{ $makanan->nama_makanan }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Kalori</label>
            <input type="number" name="kalori" class="form-control" value="{{ $makanan->kalori }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Waktu Makan</label>
            <select name="waktu_makan" class="form-select" required>
                <option value="Pagi" {{ $makanan->waktu_makan == 'Pagi' ? 'selected' : '' }}>Pagi</option>
                <option value="Siang" {{ $makanan->waktu_makan == 'Siang' ? 'selected' : '' }}>Siang</option>
                <option value="Malam" {{ $makanan->waktu_makan == 'Malam' ? 'selected' : '' }}>Malam</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $makanan->tanggal }}" required>
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-success">💾 Simpan Perubahan</button>
            <a href="{{ route('makanan.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>
@endsection
