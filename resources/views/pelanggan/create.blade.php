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
    <title>Tambah Data Pelanggan</title>
  </head>
  <body style="background: rgb(41, 40, 40)">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('pelanggan.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="pel_id_gol" class="font-weight-bold">Golongan</label>
                                <input type="text" class="form-control @error('pel_id_gol') is-invalid @enderror" id="pel_id_gol" name="pel_id_gol" value="{{ old('pel_id_gol') }}" placeholder="Masukkan ID Golongan">
                                @error('pel_id_gol')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="pel_id_user" class="font-weight-bold">User ID</label>
                                <input type="text" class="form-control @error('pel_id_user') is-invalid @enderror" id="pel_id_user" name="pel_id_user" value="{{ old('pel_id_user') }}" placeholder="Masukkan User ID">
                                @error('pel_id_user')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="pel_no" class="font-weight-bold">Nomor Pelanggan</label>
                                <input type="text" class="form-control @error('pel_no') is-invalid @enderror" id="pel_no" name="pel_no" value="{{ old('pel_no') }}" placeholder="Masukkan Nomor Pelanggan">
                                @error('pel_no')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="pel_nama" class="font-weight-bold">Nama Pelanggan</label>
                                <input type="text" class="form-control @error('pel_nama') is-invalid @enderror" id="pel_nama" name="pel_nama" value="{{ old('pel_nama') }}" placeholder="Masukkan Nama Pelanggan">
                                @error('pel_nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="pel_alamat" class="font-weight-bold">Alamat</label>
                                <textarea class="form-control @error('pel_alamat') is-invalid @enderror" id="pel_alamat" name="pel_alamat" rows="3" placeholder="Masukkan Alamat">{{ old('pel_alamat') }}</textarea>
                                @error('pel_alamat')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="pel_hp" class="font-weight-bold">Nomor HP</label>
                                <input type="text" class="form-control @error('pel_hp') is-invalid @enderror" id="pel_hp" name="pel_hp" value="{{ old('pel_hp') }}" placeholder="Masukkan Nomor HP">
                                @error('pel_hp')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="pel_ktp" class="font-weight-bold">Nomor KTP</label>
                                <input type="text" class="form-control @error('pel_ktp') is-invalid @enderror" id="pel_ktp" name="pel_ktp" value="{{ old('pel_ktp') }}" placeholder="Masukkan Nomor KTP">
                                @error('pel_ktp')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="pel_seri" class="font-weight-bold">Seri</label>
                                <input type="text" class="form-control @error('pel_seri') is-invalid @enderror" id="pel_seri" name="pel_seri" value="{{ old('pel_seri') }}" placeholder="Masukkan Seri">
                                @error('pel_seri')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="pel_meteran" class="font-weight-bold">Meteran</label>
                                <input type="number" class="form-control @error('pel_meteran') is-invalid @enderror" id="pel_meteran" name="pel_meteran" value="{{ old('pel_meteran') }}" placeholder="Masukkan Meteran">
                                @error('pel_meteran')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="pel_aktif" class="font-weight-bold">Aktif</label>
                                <select class="form-control @error('pel_aktif') is-invalid @enderror" id="pel_aktif" name="pel_aktif">
                                    <option value="Y" {{ old('pel_aktif') == 'Y' ? 'selected' : '' }}>Ya</option>
                                    <option value="N" {{ old('pel_aktif') == 'N' ? 'selected' : '' }}>Tidak</option>
                                </select>
                                @error('pel_aktif')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-md btn-warning">Reset</button>
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