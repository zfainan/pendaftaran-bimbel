@extends('layouts.app')

@section('page-header')
    <div class="page-header">
        <h3 class="page-title"> Data Pendaftaran </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Data Pendaftaran</li>
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
        <div class="card-body p-4">
            <div class="d-flex mb-3">
                <a href="{{ route('registrations.create') }}" class="btn btn-primary my-auto ms-auto">Tambah Data</a>
            </div>

            <div class="table-responsive">
                <table class="table-hover table">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Nama</th>
                            <th>Program</th>
                            <th>Tanggal</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->student->nama }}</td>
                                <td>{{ $item->program->nama }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('registrations.show', $item) }}"
                                            class="btn btn-sm btn-outline-info me-2"><i class="mdi mdi-eye"></i></a>

                                        <a href="{{ route('registrations.edit', $item) }}"
                                            class="btn btn-sm btn-outline-warning me-2"><i class="mdi mdi-pen"></i></a>

                                        <form action="{{ route('registrations.destroy', $item) }}" method="POST"
                                            onsubmit="return confirm ('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger"><i
                                                    class="mdi mdi-delete"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="p-4">
                {{ $data->links() }}
            </div>
        </div>
    </div>
@endsection
