@extends('layouts.app')

@section('title', 'Catatan Berat Badan | EatnNoteIT')

@section('content')
<div class="container mt-4">

    <h2 class="mb-4 text-center">Catatan Berat Badan</h2>

    {{-- Notifikasi sukses / error --}}
    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger text-center">{{ session('error') }}</div>
    @endif

    {{-- Tombol tambah catatan --}}
    <div class="text-end mb-3">
        <a href="{{ route('beratbadan.create') }}" class="btn btn-success">+ Tambah Catatan</a>
    </div>

    {{-- Tabel catatan --}}
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered table-striped mb-0 text-center align-middle">
                    <thead class="table-success">
                        <tr>
                            <th width="20%">Tanggal</th>
                            <th width="20%">Berat Badan (kg)</th>
                            <th width="40%">Catatan</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($berats as $b)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($b->tanggal)->format('d M Y') }}</td>
                                <td>{{ $b->berat_badan }}</td>
                                <td class="text-start">{{ $b->catatan ?? '-' }}</td>
                                <td>
                                    <a href="{{ route('beratbadan.edit', $b->id) }}" class="btn btn-warning btn-sm me-1">Edit</a>
                                    <form action="{{ route('beratbadan.destroy', $b->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin mau hapus catatan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-3">Belum ada catatan berat badan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
