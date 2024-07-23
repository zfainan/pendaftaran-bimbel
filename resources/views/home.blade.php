@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Halo, {{ auth()->user()->userable->nama }}</div>

                    <div class="card-body">
                        <p>
                            @if ($program)
                                Anda terdaftar pada
                                <strong>{{ $program->nama }}</strong>
                            @else
                                Anda tidak terdaftar pada program apapun
                            @endif
                        </p>

                        @if (!$payment)
                            <p>Anda belum membayar biaya pendaftaran, segera lakukan pembayaran untuk dapat mengikuti kelas.</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
