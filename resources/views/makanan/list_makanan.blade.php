@extends('layouts.app')

@section('title', 'Daftar Makanan | EatnNoteIT')

@section('content')
<div class="container mt-4">

    <h3 class="mb-4 text-center">Daftar Makanan</h3>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger text-center">{{ session('error') }}</div>
    @endif

    <div class="text-end mb-3">
        <a href="{{ route('makanan.create') }}" class="btn btn-success">+ Tambah Makanan</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered table-striped mb-0 text-center align-middle">
                    <thead class="table-success">
                        <tr>
                            <th>Nama Makanan</th>
                            <th>Kalori</th>
                            <th>Waktu Makan</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($makanan as $item)
                            <tr>
                                <td class="text-start">{{ $item->nama_makanan }}</td>
                                <td>{{ $item->kalori }}</td>
                                <td>{{ ucfirst($item->waktu_makan) }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</td>
                                <td>
                                    <a href="{{ route('makanan.edit', $item->id) }}" class="btn btn-warning btn-sm me-1">Edit</a>
                                    <form action="{{ route('makanan.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-3">Belum ada data makanan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
