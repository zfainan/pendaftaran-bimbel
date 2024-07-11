@extends('layouts.app')

@section('page-header')
    <div class="page-header">
        <h3 class="page-title"> Ubah Data Admin {{ $admin->nama }} </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admins.index') }}">Data Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ubah Data Admin</li>
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
                action="{{ route('admins.update', $admin) }}">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label for="inputName" class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-9">
                        <input type="text" name="nama" value="{{ old('nama') ?? $admin->nama }}"
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
                    <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" name="email" value="{{ old('email') ?? $admin->user->email }}"
                            class="form-control @error('email') is-invalid @enderror" id="inputEmail" placeholder="Email"
                            required>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleInputMobile" class="col-sm-3 col-form-label">No. Telepon</label>
                    <div class="col-sm-9">
                        <input type="text" name="no_telp" value="{{ old('no_telp') ?? $admin->no_telp }}"
                            class="form-control @error('no_telp') is-invalid @enderror" id="exampleInputMobile"
                            placeholder="Mobile number" required>

                        @error('no_telp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            id="exampleInputPassword2" placeholder="Password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div id="exampleInputPassword2Help" class="form-text pt-1">Kosongkan jika tidak ingin mengubah
                            password</div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Re Password</label>
                    <div class="col-sm-9">
                        <input type="password" name="password_confirmation"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            id="exampleInputConfirmPassword2" placeholder="Password">

                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div id="exampleInputConfirmPassword2Help" class="form-text pt-1">Kosongkan jika tidak ingin
                            mengubah password</div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-9 ms-auto">
                        <button type="submit" class="btn btn-gradient-primary mr-2">Simpan</button>
                        <a href="{{ route('admins.index') }}" class="btn btn-light">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
