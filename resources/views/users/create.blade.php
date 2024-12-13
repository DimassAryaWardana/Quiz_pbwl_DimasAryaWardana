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
    <title>Tambah User</title>
  </head>
  <body style="background: rgb(41, 40, 40); color: white;">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-header bg-primary text-white">
                        <h3 class="text-center my-4">Tambah User</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('users.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="user_email" class="form-label">Email</label>
                                <input type="email" name="user_email" id="user_email" class="form-control @error('user_email') is-invalid @enderror" value="{{ old('user_email') }}" maxlength="50" required>
                                @error('user_email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="user_password" class="form-label">Password</label>
                                <input type="password" name="user_password" id="user_password" class="form-control @error('user_password') is-invalid @enderror" maxlength="100" required>
                                @error('user_password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="user_nama" class="form-label">Nama</label>
                                <input type="text" name="user_nama" id="user_nama" class="form-control @error('user_nama') is-invalid @enderror" value="{{ old('user_nama') }}" maxlength="100" required>
                                @error('user_nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="user_alamat" class="form-label">Alamat</label>
                                <textarea name="user_alamat" id="user_alamat" class="form-control @error('user_alamat') is-invalid @enderror" required>{{ old('user_alamat') }}</textarea>
                                @error('user_alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="user_hp" class="form-label">No. HP</label>
                                <input type="text" name="user_hp" id="user_hp" class="form-control @error('user_hp') is-invalid @enderror" value="{{ old('user_hp') }}" maxlength="25">
                                @error('user_hp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="user_pos" class="form-label">Kode Pos</label>
                                <input type="text" name="user_pos" id="user_pos" class="form-control @error('user_pos') is-invalid @enderror" value="{{ old('user_pos') }}" maxlength="5">
                                @error('user_pos')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="user_role" class="form-label">Role</label>
                                <select name="user_role" id="user_role" class="form-select @error('user_role') is-invalid @enderror" required>
                                    <option value="">Pilih Role</option>
                                    <option value="1" {{ old('user_role') == 1 ? 'selected' : '' }}>Admin</option>
                                    <option value="2" {{ old('user_role') == 2 ? 'selected' : '' }}>User</option>
                                </select>
                                @error('user_role')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="user_aktif" class="form-label">Status</label>
                                <select name="user_aktif" id="user_aktif" class="form-select @error('user_aktif') is-invalid @enderror" required>
                                    <option value="">Pilih Status</option>
                                    <option value="1" {{ old('user_aktif') == 1 ? 'selected' : '' }}>Aktif</option>
                                    <option value="0" {{ old('user_aktif') == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                                </select>
                                @error('user_aktif')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  </body>
</html>
@endsection