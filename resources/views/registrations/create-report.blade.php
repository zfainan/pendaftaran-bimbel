@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css">
@endsection

@section('page-header')
    <div class="page-header">
        <h3 class="page-title"> Generate Laporan Pendaftaran </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('registrations.index') }}">Data Pendaftaran</a></li>
                <li class="breadcrumb-item active" aria-current="page">Generate Laporan Pendaftaran</li>
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
                action="{{ route('registrations.generate-report') }}">
                @csrf

                <div class="form-group row">
                    <label for="inputProgram" class="col-sm-3 col-form-label">Program</label>
                    <div class="col-sm-9">
                        <select name="program_id" id="inputProgram"
                            class="form-select @error('program_id') is-invalid @enderror">
                            <option value disabled selected>Pilih program</option>
                            @foreach ($programs as $item)
                                <option @selected(old('program_id') == $item->id) value="{{ $item->id }}">{{ $item->nama }}
                                </option>
                            @endforeach
                        </select>

                        @error('program_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputBranch" class="col-sm-3 col-form-label">Cabang</label>
                    <div class="col-sm-9">
                        <select name="branch_id" id="inputBranch"
                            class="form-select @error('branch_id') is-invalid @enderror">
                            <option value disabled selected>Pilih cabang</option>
                            @foreach ($branches as $item)
                                <option @selected(old('branch_id') == $item->id) value="{{ $item->id }}">{{ $item->nama }}
                                </option>
                            @endforeach
                        </select>

                        @error('branch_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputSince" class="col-sm-3 col-form-label">Dari</label>
                    <div class="col-sm-9">
                        <input type="datetime-local" name="since" value="{{ old('since') }}"
                            class="form-control @error('since') is-invalid @enderror" id="inputSince">

                        @error('since')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputUntil" class="col-sm-3 col-form-label">Sampai</label>
                    <div class="col-sm-9">
                        <input type="datetime-local" name="until" value="{{ old('until') }}"
                            class="form-control @error('until') is-invalid @enderror" id="inputUntil">

                        @error('until')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-9 ms-auto">
                        <button type="submit" class="btn btn-gradient-primary mr-2">Cetak</button>
                        <a href="{{ route('registrations.index') }}" class="btn btn-light">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
