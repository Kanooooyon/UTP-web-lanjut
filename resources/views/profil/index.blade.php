@extends('layouts.app')

@section('title', 'Profil Saya | EatnNoteIT')

@section('content')
<div class="container mt-4">

    <h2 class="mb-4 text-center">Profil Pengguna</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive w-100">
                <table class="table table-bordered table-striped mb-0 align-middle">
                    <tbody>
                        <tr>
                            <th width="30%">Nama</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>Umur</th>
                            <td>{{ $user->umur ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Tinggi Badan</th>
                            <td>{{ $user->tinggi_badan ?? '-' }} cm</td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>{{ $user->jenis_kelamin ?? '-' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="text-end mt-3">
                <a href="{{ route('profil.edit') }}" class="btn btn-warning">Edit Profil</a>
            </div>
        </div>
    </div>

</div>
@endsection
