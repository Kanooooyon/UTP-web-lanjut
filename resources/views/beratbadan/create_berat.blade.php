@extends('layouts.app')

@section('title', 'Tambah Catatan Berat Badan')

@section('content')
<div class="container">
    <h2 class="mb-4 text-center">Tambah Catatan Berat Badan</h2>

    <form action="{{ route('beratbadan.store') }}" method="POST" class="card p-4 shadow-sm">
        @csrf

        <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Berat Badan (kg)</label>
            <input type="number" step="0.1" name="berat_badan" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Catatan</label>
            <textarea name="catatan" class="form-control" rows="3"></textarea>
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('beratbadan.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
