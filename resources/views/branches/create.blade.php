@extends('layouts.app')

@section('page-header')
    <div class="page-header">
        <h3 class="page-title"> Tambah Data Cabang </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admins.index') }}">Data Cabang</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Data Cabang</li>
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
            <form class="forms-sample" data-bitwarden-watching="1" method="POST" action="{{ route('branches.store') }}">
                @csrf

                <div class="form-group row">
                    <label for="Nama" class="col-sm-3 col-form-label">Nama Cabang</label>
                    <div class="col-sm-9">
                        <input type="text" name="nama" value="{{ old('nama') }}"
                            class="form-control @error('nama') is-invalid @enderror" id="Nama" placeholder="Nama"
                            required>

                        @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                    <div class="col-sm-9">
                        <div class="input-group mb-3">
                            <input type="text" name="alamat" value="{{ old('alamat') }}"
                                class="form-control @error('alamat') is-invalid @enderror" id="Nama" placeholder="Alamat"
                                required>

                            @error('alamat')
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
                        <a href="{{ route('branches.index') }}" class="btn btn-light">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
