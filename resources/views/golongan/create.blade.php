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
    <title>Tambah Golongan</title>
  </head>
  <body style="background: rgb(41, 40, 40); color: white;">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-header bg-primary text-white">
                        <h3 class="text-center my-4">Tambah Golongan</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('golongan.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="gol_kode" class="form-label">Kode Golongan</label>
                                <input type="text" name="gol_kode" id="gol_kode" class="form-control @error('gol_kode') is-invalid @enderror" value="{{ old('gol_kode') }}" maxlength="10" required>
                                @error('gol_kode')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="gol_nama" class="form-label">Nama Golongan</label>
                                <input type="text" name="gol_nama" id="gol_nama" class="form-control @error('gol_nama') is-invalid @enderror" value="{{ old('gol_nama') }}" maxlength="50" required>
                                @error('gol_nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a href="{{ route('golongan.index') }}" class="btn btn-secondary">Kembali</a>
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