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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Edit Data User</title>
  </head>
  <body style="background: rgb(41, 40, 40)">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('users.update', $user->user_id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="user_email" class="font-weight-bold">Email</label>
                                <input type="email" class="form-control @error('user_email') is-invalid @enderror" id="user_email" name="user_email" value="{{ old('user_email', $user->user_email) }}" placeholder="Masukkan Email" required>
                                @error('user_email')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="user_nama" class="font-weight-bold">Nama</label>
                                <input type="text" class="form-control @error('user_nama') is-invalid @enderror" id="user_nama" name="user_nama" value="{{ old('user_nama', $user->user_nama) }}" placeholder="Masukkan Nama" required>
                                @error('user_nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="user_alamat" class="font-weight-bold">Alamat</label>
                                <textarea class="form-control @error('user_alamat') is-invalid @enderror" id="user_alamat" name="user_alamat" placeholder="Masukkan Alamat" required>{{ old('user_alamat', $user->user_alamat) }}</textarea>
                                @error('user_alamat')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="user_hp" class="font-weight-bold">No. HP</label>
                                <input type="text" class="form-control @error('user_hp') is-invalid @enderror" id="user_hp" name="user_hp" value="{{ old('user_hp', $user->user_hp) }}" placeholder="Masukkan No. HP">
                                @error('user_hp')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="user_pos" class="font-weight-bold">Kode Pos</label>
                                <input type="text" class="form-control @error('user_pos') is-invalid @enderror" id="user_pos" name="user_pos" value="{{ old('user_pos', $user->user_pos) }}" placeholder="Masukkan Kode Pos">
                                @error('user_pos')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="user_role" class="font-weight-bold">Role</label>
                                <select name="user_role" id="user_role" class="form-select @error('user_role') is-invalid @enderror" required>
                                    <option value="">Pilih Role</option>
                                    <option value="1" {{ old('user_role', $user->user_role) == 1 ? 'selected' : '' }}>Admin</option>
                                    <option value="2" {{ old('user_role', $user->user_role) == 2 ? 'selected' : '' }}>User</option>
                                </select>
                                @error('user_role')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="user_aktif" class="font-weight-bold">Status</label>
                                <select name="user_aktif" id="user_aktif" class="form-select @error('user_aktif') is-invalid @enderror" required>
                                    <option value="">Pilih Status</option>
                                    <option value="1" {{ old('user_aktif', $user->user_aktif) == 1 ? 'selected' : '' }}>Aktif</option>
                                    <option value="0" {{ old('user_aktif', $user->user_aktif) == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                                </select>
                                @error('user_aktif')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">Update</button>
                            <a href="{{ route('users.index') }}" class="btn btn-md btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </body>
</html>
@endsection