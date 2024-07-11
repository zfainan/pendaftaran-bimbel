@extends('layouts.app')

@section('page-header')
    <div class="page-header">
        <h3 class="page-title"> Ubah Data Siswa {{ $student->nama }} </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('students.index') }}">Data Siswa</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Data Siswa</li>
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
                action="{{ route('students.update', $student) }}">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label for="inputName" class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-9">
                        <input type="text" name="nama" value="{{ old('nama') ?? $student->nama }}"
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
                    <label for="inputTempatLahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
                    <div class="col-sm-9">
                        <input type="text" name="tempat_lahir"
                            value="{{ old('tempat_lahir') ?? $student->tempat_lahir }}"
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
                        <input type="date" name="tgl_lahir" value="{{ old('tgl_lahir') ?? $student->tgl_lahir }}"
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
                                    <input name="gender" type="radio" class="form-check-input" name="optionsRadios"
                                        id="optionsRadios1" value="L" @checked((old('gender') ?? $student->gender) == 'L') required> Laki-laki
                                    <i class="input-helper"></i></label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input name="gender" type="radio" class="form-check-input" name="optionsRadios"
                                        id="optionsRadios2" value="P" @checked((old('gender') ?? $student->gender) == 'P') required> Perempuan
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
                        <input type="number" name="kelas" value="{{ old('kelas') ?? $student->kelas }}"
                            class="form-control @error('kelas') is-invalid @enderror" id="inputKelas" placeholder="Kelas"
                            required>

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
                        <input type="text" name="asal_sekolah" value="{{ old('asal_sekolah') ?? $student->asal_sekolah }}"
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
                        <input type="text" name="no_telp" value="{{ old('no_telp') ?? $student->no_telp }}"
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
                        <input type="text" name="nama_ortu" value="{{ old('nama_ortu') ?? $student->no_telp_ortu }}"
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
                        <input type="text" name="pekerjaan_ortu" value="{{ old('pekerjaan_ortu') ?? $student->pekerjaan_ortu }}"
                            class="form-control @error('pekerjaan_ortu') is-invalid @enderror" id="inputPekerjaanOrtu"
                            placeholder="Pekerjaan Orang Tua" required>

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
                        <input type="text" name="no_telp_ortu" value="{{ old('no_telp_ortu') ?? $student->no_telp_ortu }}"
                            class="form-control @error('no_telp_ortu') is-invalid @enderror" id="inputNoTelpOrtu"
                            placeholder="No. Telepon Orang Tua" required>

                        @error('no_telp_ortu')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" name="email" value="{{ old('email') ?? $student->user->email }}"
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
                    <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" name="password"
                            class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword2"
                            placeholder="Password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Konfirmasi Password</label>
                    <div class="col-sm-9">
                        <input type="password" name="password_confirmation"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            id="exampleInputConfirmPassword2" placeholder="Password">

                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-9 ms-auto">
                        <button type="submit" class="btn btn-gradient-primary mr-2">Simpan</button>
                        <a href="{{ route('students.index') }}" class="btn btn-light">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
