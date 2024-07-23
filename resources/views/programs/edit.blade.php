@extends('layouts.app')

@section('page-header')
    <div class="page-header">
        <h3 class="page-title"> Ubah Data Program {{ $program->nama }} </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('programs.index') }}">Data Program</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ubah Data Program</li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    @session('success')
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $value }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endsession

    @session('error')
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ $value }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endsession

    <div class="card">
        <div class="card-body">
            <form class="forms-sample" data-bitwarden-watching="1" method="POST"
                action="{{ route('programs.update', $program) }}">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label for="inputName" class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-9">
                        <input type="text" name="nama" value="{{ old('nama') ?? $program->nama }}"
                            class="form-control @error('nama') is-invalid @enderror" id="inputName" placeholder="Nama"
                            required>

                        @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="harga" class="col-sm-3 col-form-label">Harga Program</label>
                    <div class="col-sm-9">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Rp</span>
                            <input type="number" name="harga" value="{{ old('harga') ?? $program->harga }}" class="form-control @error('harga') is-invalid @enderror" placeholder="Harga"
                                aria-describedby="basic-addon1" required>

                            @error('harga')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-9 ms-auto">
                        <button type="submit" class="btn btn-gradient-primary mr-2">Simpan</button>
                        <a href="{{ route('programs.index') }}" class="btn btn-light">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
