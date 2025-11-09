@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container mt-5">

    <h2 class="mb-4 text-center">Selamat datang, {{ $user->name }}!</h2>

    <div class="row g-4">
        <div class="col-lg-6 col-md-12">
            <div class="card shadow-sm border-success h-100">
                <div class="card-body">
                    <h4 class="card-title mb-3">📋 Daftar Makananmu</h4>

                    @if($makanan->isEmpty())
                        <p class="text-muted">Belum ada makanan yang tercatat.</p>
                    @else
                        <table class="table table-bordered align-middle">
                            <thead style="background-color: #1E5631; color: #fff;">
                                <tr>
                                    <th>Nama Makanan</th>
                                    <th>Kalori (kcal)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($makanan as $m)
                                    <tr style="background-color: #CFFFB0;">
                                        <td>{{ $m->nama_makanan }}</td>
                                        <td>{{ $m->kalori }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                    <a href="{{ route('makanan.create') }}" class="btn btn-success mt-3 w-100 btn-modern">+ Tambah Makanan</a>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-12">
            <div class="card shadow-sm border-success h-100">
                <div class="card-body">
                    <h4 class="card-title mb-3">📅 Catatan Berat Badan</h4>

                    @if($beratBadan->isEmpty())
                        <p class="text-muted">Belum ada catatan berat badan.</p>
                    @else
                        <table class="table table-bordered align-middle">
                            <thead style="background-color: #1E5631; color: #fff;">
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Berat (kg)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($beratBadan as $b)
                                    <tr style="background-color: #CFFFB0;">
                                        <td>{{ \Carbon\Carbon::parse($b->tanggal)->format('d M Y') }}</td>
                                        <td>{{ $b->berat_badan }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                    <a href="{{ route('beratbadan.create') }}" class="btn btn-success mt-3 w-100 btn-modern">Tambah Catatan</a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('styles')
<style>
    .navbar, footer {
        background-color: #1E5631 !important; 
    }

    .navbar-brand {
        font-weight: bold;
        font-size: 1.3rem;
    }

    .btn-modern {
        border-radius: 50px;
        font-weight: 500;
        transition: all 0.2s ease-in-out;
    }

    .btn-modern:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }

    table.table-bordered th, table.table-bordered td {
        text-align: center;
        vertical-align: middle;
    }
</style>
@endsection
