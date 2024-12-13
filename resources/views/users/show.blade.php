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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Detail User</title>
  </head>
  <body style="background: rgb(41, 40, 40); color: white;">
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h4>Detail User</h4>
                        <table class="table table-bordered">
                            <tr>
                                <th>Email</th>
                                <td>{{ $user->user_email }}</td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>{{ $user->user_nama }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>{{ $user->user_alamat }}</td>
                            </tr>
                            <tr>
                                <th>No. HP</th>
                                <td>{{ $user->user_hp }}</td>
                            </tr>
                            <tr>
                                <th>Kode Pos</th>
                                <td>{{ $user->user_pos }}</td>
                            </tr>
                            <tr>
                                <th>Role</th>
                                <td>{{ $user->user_role == 1 ? 'Admin' : 'User' }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{ $user->user_aktif == 1 ? 'Aktif' : 'Tidak Aktif' }}</td>
                            </tr>
                        </table>
                        <a href="{{ route('users.index') }}" class="btn btn-md btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  </body>
</html>
@endsection