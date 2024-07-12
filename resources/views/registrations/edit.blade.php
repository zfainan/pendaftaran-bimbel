@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css">
@endsection

@section('page-header')
    <div class="page-header">
        <h3 class="page-title"> Edit Data Pendaftaran {{ $registration->student->nama }} </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('registrations.index') }}">Data Pendaftaran</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Data Pendaftaran</li>
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
                action="{{ route('registrations.update', $registration) }}">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Siswa</label>
                    <div class="col-sm-9">
                        <div class="d-flex gap-3">
                            <input type="hidden" name="student_id" value="{{ $registration->student->id }}">

                            <input type="text"
                                value="{{ $registration->student->nama . ' - ' . $registration->student->asal_sekolah . ' - Kelas ' . $registration->student->kelas }}"
                                class="form-control" readonly disabled>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputProgram" class="col-sm-3 col-form-label">Program</label>
                    <div class="col-sm-9">
                        <div class="d-flex gap-3">
                            <div class="flex-grow">
                                <input type="hidden" name="program_id"
                                    value="{{ $selectedProgram?->id ?? $registration->program->id }}">

                                <input type="text" value="{{ $selectedProgram?->nama }}"
                                    class="form-control @error('program_id') is-invalid @enderror" id="inputProgram"
                                    readonly required>

                                @error('program_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="button" class="btn btn-primary text-nowrap mb-auto" data-bs-toggle="modal"
                                data-bs-target="#programsModal">Pilih Program</button>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputDate" class="col-sm-3 col-form-label">Tanggal</label>
                    <div class="col-sm-9">
                        <input type="date" name="tanggal" value="{{ old('tanggal') ?? $registration->tanggal }}"
                            class="form-control @error('tanggal') is-invalid @enderror" id="inputDate" required>

                        @error('tanggal')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-9 ms-auto">
                        <button type="submit" class="btn btn-gradient-primary mr-2">Simpan</button>
                        <a href="{{ route('registrations.index') }}" class="btn btn-light">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Pilih Program -->
    <div class="modal fade" id="programsModal" tabindex="-1" aria-labelledby="programsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="programsModalLabel">Pilih Program</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table id="programs" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama Program</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($programs as $program)
                                <tr>
                                    <td>{{ $program->nama }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('registrations.edit', ['registration' => $registration->id, 'program_id' => $program->id]) }}"
                                            class="btn btn-primary">Pilih</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script>
        new DataTable('#students');
        new DataTable('#programs');
    </script>
@endsection
