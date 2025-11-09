@extends('layouts.app')

@section('title', 'Edit Catatan Berat Badan')

@section('content')
<div class="container">
    <h2 class="mb-4 text-center">Edit Catatan Berat Badan</h2>

    <form action="{{ route('beratbadan.update', $berat->id) }}" method="POST" class="card p-4 shadow-sm">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $berat->tanggal }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Berat Badan (kg)</label>
            <input type="number" name="berat_badan" class="form-control" value="{{ $berat->berat_badan }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Catatan</label>
            <textarea name="catatan" class="form-control" rows="3">{{ $berat->catatan }}</textarea>
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
            <a href="{{ route('beratbadan.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
