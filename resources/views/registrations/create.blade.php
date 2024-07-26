@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css">
@endsection

@section('page-header')
    <div class="page-header">
        <h3 class="page-title"> Tambah Data Pendaftaran </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('registrations.index') }}">Data Pendaftaran</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Data Pendaftaran</li>
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
                action="{{ route('registrations.store') }}">
                @csrf

                <div class="form-group row">
                    <label for="inputStudent" class="col-sm-3 col-form-label">Siswa</label>
                    <div class="col-sm-9">
                        <div class="d-flex gap-3">
                            <div class="flex-grow">
                                <input type="hidden" name="student_id" value="{{ $selectedStudent?->id }}">

                                <input type="text"
                                    value="{{ $selectedStudent ? $selectedStudent?->nama . ' - ' . $selectedStudent?->asal_sekolah . ' - Kelas ' . $selectedStudent?->kelas : null }}"
                                    class="form-control @error('student_id') is-invalid @enderror" id="inputStudent"
                                    readonly required>

                                @error('student_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="button" class="btn btn-primary text-nowrap mb-auto" data-bs-toggle="modal"
                                data-bs-target="#studentsModal">Pilih Siswa</button>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputProgram" class="col-sm-3 col-form-label">Program</label>
                    <div class="col-sm-9">
                        <div class="d-flex gap-3">
                            <div class="flex-grow">
                                <input type="hidden" name="program_id" value="{{ $selectedProgram?->id }}">

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
                    <label for="inputDate" class="col-sm-3 col-form-label">Tanggal</label>
                    <div class="col-sm-9">
                        <input type="date" name="tanggal" value="{{ old('tanggal') ?? today() }}"
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

    <!-- Modal Pilih Siswa -->
    <div class="modal fade" id="studentsModal" tabindex="-1" aria-labelledby="studentsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="studentsModalLabel">Pilih Siswa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table id="students" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Kelas</th>
                                <th>Asal Sekolah</th>
                                <th>Nama Ortu</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $student->nama }}</td>
                                    <td>{{ $student->kelas }}</td>
                                    <td>{{ $student->asal_sekolah }}</td>
                                    <td>{{ $student->nama_ortu }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('registrations.create', [
                                            'student_id' => $student->id,
                                            'program_id' => $selectedProgram?->id,
                                        ]) }}"
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

    <!-- Modal Pilih Program -->
    <div class="modal fade" id="programsModal" tabindex="-1" aria-labelledby="programsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
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
                                        <a href="{{ route('registrations.create', [
                                            'student_id' => $selectedStudent?->id,
                                            'program_id' => $program->id,
                                        ]) }}"
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
