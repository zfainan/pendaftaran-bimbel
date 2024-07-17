@extends('layouts.guest')

@section('page-header')
    <div class="page-header">
        <h3 class="page-title"> Tambah Data Siswa </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('students.index') }}">Data Siswa</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Data Siswa</li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')

    <div class="content-wrapper d-flex align-items-center auth">
        <div class="row flex-grow">
            <div class="col-lg-8 mx-auto">
                <div class="auth-form-light p-5 text-left">
                    <div class="brand-logo">
                        <img src="/assets/images/logo.svg" alt="">
                    </div>
                    <h4>Selesaikan Pendaftaran</h4>
                    <h6 class="font-weight-light">Fill the form to continue.</h6>

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

                    <form class="pt-3" action="{{ route('login') }}" method="POST">
                        @csrf

                        <div class="form-group row">
                            <label for="inputTempatLahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-9">
                                <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}"
                                    class="form-control @error('tempat_lahir') is-invalid @enderror" id="inputTempatLahir"
                                    placeholder="Tempat Lahir" required />

                                @error('tempat_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputTglLahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-9">
                                <input type="date" name="tgl_lahir" value="{{ old('tgl_lahir') }}"
                                    class="form-control @error('tgl_lahir') is-invalid @enderror" id="inputTglLahir"
                                    placeholder="Tanggal Lahir" required>

                                @error('tgl_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputGender" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input name="gender" type="radio" class="form-check-input"
                                                name="optionsRadios" id="optionsRadios1" value="L"
                                                @checked(old('gender') == 'L') required> Laki-laki
                                            <i class="input-helper"></i></label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input name="gender" type="radio" class="form-check-input"
                                                name="optionsRadios" id="optionsRadios2" value="P"
                                                @checked(old('gender') == 'P') required> Perempuan
                                            <i class="input-helper"></i></label>
                                    </div>
                                </div>

                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputKelas" class="col-sm-3 col-form-label">Kelas</label>
                            <div class="col-sm-9">
                                <input type="number" name="kelas" value="{{ old('kelas') }}"
                                    class="form-control @error('kelas') is-invalid @enderror" id="inputKelas"
                                    placeholder="Kelas" required>

                                @error('kelas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputAsalSekolah" class="col-sm-3 col-form-label">Asal Sekolah</label>
                            <div class="col-sm-9">
                                <input type="text" name="asal_sekolah" value="{{ old('asal_sekolah') }}"
                                    class="form-control @error('asal_sekolah') is-invalid @enderror" id="inputAsalSekolah"
                                    placeholder="Asal Sekolah" required>

                                @error('asal_sekolah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputNoTelp" class="col-sm-3 col-form-label">No. Telepon</label>
                            <div class="col-sm-9">
                                <input type="text" name="no_telp" value="{{ old('no_telp') }}"
                                    class="form-control @error('no_telp') is-invalid @enderror" id="inputNoTelp"
                                    placeholder="No. Telepon" required>

                                @error('no_telp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputNamaOrtu" class="col-sm-3 col-form-label">Nama Orang Tua</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama_ortu" value="{{ old('nama_ortu') }}"
                                    class="form-control @error('nama_ortu') is-invalid @enderror" id="inputNamaOrtu"
                                    placeholder="Nama Orang Tua" required>

                                @error('nama_ortu')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPekerjaanOrtu" class="col-sm-3 col-form-label">Pekerjaan Orang Tua</label>
                            <div class="col-sm-9">
                                <input type="text" name="pekerjaan_ortu" value="{{ old('pekerjaan_ortu') }}"
                                    class="form-control @error('pekerjaan_ortu') is-invalid @enderror"
                                    id="inputPekerjaanOrtu" placeholder="Pekerjaan Orang Tua" required>

                                @error('pekerjaan_ortu')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputNoTelpOrtu" class="col-sm-3 col-form-label">No. Telepon Orang Tua</label>
                            <div class="col-sm-9">
                                <input type="text" name="no_telp_ortu" value="{{ old('no_telp_ortu') }}"
                                    class="form-control @error('no_telp_ortu') is-invalid @enderror" id="inputNoTelpOrtu"
                                    placeholder="No. Telepon Orang Tua" required>

                                @error('no_telp_ortu')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-3 d-flex">
                            <button class="ms-auto mb-auto btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn"
                                type="submit">Lanjut</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection