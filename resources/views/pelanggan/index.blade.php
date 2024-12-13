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
    <title>Daftar Pelanggan</title>
  </head>
  <body style="background: rgb(41, 40, 40); color: white;">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-header bg-primary text-white">
                        <h3 class="text-center my-4 text-white">Daftar Pelanggan</h3>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('pelanggan.create') }}" class="btn btn-success mb-3">Tambah Pelanggan</a>

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Golongan</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Nomor HP</th>
                                    <th>KTP</th>
                                    <th>Seri</th>
                                    <th>Meteran</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pelanggan as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->pel_id_gol }}</td>
                                        <td>{{ $data->pel_nama }}</td>
                                        <td>{{ $data->pel_alamat }}</td>
                                        <td>{{ $data->pel_hp }}</td>
                                        <td>{{ $data->pel_ktp }}</td>
                                        <td>{{ $data->pel_seri }}</td>
                                        <td>{{ $data->pel_meteran }}</td>
                                        <td>{{ $data->pel_aktif == 'Y' ? 'Aktif' : 'Tidak Aktif' }}</td>
                                        <td>
                                            <a href="{{ route('pelanggan.edit', $data->pel_id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('pelanggan.destroy', $data->pel_id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center">Tidak ada data.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-center">
                            {{ $pelanggan->links() }}
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