@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css">
@endsection

@section('page-header')
    <div class="page-header">
        <h3 class="page-title"> Detail Data Pendaftaran {{ $registration->student->nama }} </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('registrations.index') }}">Data Pendaftaran</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail Data Pendaftaran</li>
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
            <div class="forms-sample">
                <div class="d-flex my-3">
                    <h4 class="mb-3">Detail Pendaftaran</h4>

                    <a href="{{ route('registrations.edit', $registration) }}" type="button" class="btn btn-outline-info mb-auto ms-auto">Edit Data Pembayaran</a>
                </div>

                <div class="card mb-4 border">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Siswa</label>
                            <div class="col-sm-9">
                                <input type="text"
                                    value="{{ $registration->student->nama . ' - ' . $registration->student->asal_sekolah . ' - Kelas ' . $registration->student->kelas }}"
                                    class="form-control" readonly disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Program</label>
                            <div class="col-sm-9">
                                <input type="text" value="{{ $registration->program->nama }}" class="form-control"
                                    readonly disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Tanggal</label>
                            <div class="col-sm-9">
                                <input type="date" value="{{ $registration->tanggal }}" class="form-control" readonly
                                    disabled>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex my-3">
                    <h4 class="my-auto">Detail Pembayaran</h4>

                    @if (!$registration->payment)
                        <button type="button" class="btn btn-primary mb-auto ms-auto" data-bs-toggle="modal"
                            data-bs-target="#paymentModal">Tambah Data Pembayaran</button>
                    @else
                        <form action="{{ route('payments.destroy', $registration->payment) }}" method="POST"
                            class="mb-auto ms-auto" onsubmit="return confirm('Are you sure you want to delete payment?');">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-outline-danger" type="submit">Hapus Data
                                Pembayaran</button>
                        </form>
                    @endif
                </div>

                <div class="card mb-4 border">
                    <div class="card-body">
                        @if ($registration->payment)
                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Tanggal Pembayaran</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{ $registration->payment?->tanggal }}"
                                        class="form-control" readonly disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Jumlah</label>
                                <div class="col-sm-9">
                                    <input type="text" value="Rp {{ $registration->payment?->jumlah }}" class="form-control"
                                        readonly disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{ $registration->payment?->status }}"
                                        class="form-control" readonly disabled>
                                </div>
                            </div>
                        @else
                            <p class="text-center">Belum ada data pembayaran</p>
                        @endif
                    </div>
                </div>

                <a href="{{ route('registrations.index') }}" class="btn btn-light">Kembali</a>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="paymentModalLabel">Tambah Pembayaran</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('payments.store') }}" method="post">
                    <div class="modal-body">
                        @csrf

                        <input type="hidden" name="registration_id" value="{{ $registration->id }}">

                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Jumlah</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon-rp">Rp</span>
                                    <input type="number" name="jumlah" class="form-control" placeholder="Jumlah"
                                        aria-label="Jumlah" aria-describedby="basic-addon-rp">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Tanggal</label>
                            <div class="col-sm-9">
                                <input type="datetime-local" name="tanggal" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <input type="text" name="status" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
