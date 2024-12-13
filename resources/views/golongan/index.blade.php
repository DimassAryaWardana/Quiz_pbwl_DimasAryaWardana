@extends('layouts.app')

@section('title', 'Home')

@section('content')

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Daftar Golongan</title>
  </head>
  <body style="background: rgb(41, 40, 40); color: white;">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-header bg-primary text-white">
                        <h3 class="text-center my-4 text-white">Daftar Golongan</h3>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('golongan.create') }}" class="btn btn-success mb-3">Tambah Golongan</a>

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Kode Golongan</th>
                                    <th>Nama Golongan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($golongan as $gol)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $gol->gol_kode }}</td>
                                        <td>{{ $gol->gol_nama }}</td>
                                        <td>
                                            <a href="{{ route('golongan.edit', $gol->gol_id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('golongan.destroy', $gol->gol_id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Tidak ada data.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-center">
                            {{ $golongan->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
@endsection