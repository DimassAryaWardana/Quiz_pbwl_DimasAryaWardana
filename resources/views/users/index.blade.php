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
    <title>Daftar User</title>
  </head>
  <body style="background: rgb(41, 40, 40); color: white;">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-header bg-primary text-white">
                        <h3 class="text-center my-4 text-white">Daftar User</h3>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('users.create') }}" class="btn btn-success mb-3">Tambah User</a>

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Email</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>No. HP</th>
                                    <th>Kode Pos</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->user_email }}</td>
                                        <td>{{ $user->user_nama }}</td>
                                        <td>{{ $user->user_alamat }}</td>
                                        <td>{{ $user->user_hp }}</td>
                                        <td>{{ $user->user_pos }}</td>
                                        <td>{{ $user->user_role == 1 ? 'Admin' : 'User' }}</td>
                                        <td>{{ $user->user_aktif == 1 ? 'Aktif' : 'Tidak Aktif' }}</td>
                                        <td>
                                            <a href="{{ route('users.edit', $user->user_id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('users.destroy', $user->user_id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center">Tidak ada data.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-center">
                            {{ $users->links() }}
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