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

                        @if (!$payment || !$payment->is_paid)
                            <p>Anda belum membayar biaya pendaftaran, segera lakukan pembayaran untuk dapat mengikuti kelas.
                            </p>

                            @if ($payment && !$payment->is_paid && now()->lessThanOrEqualTo($payment->valid_until))
                                <p>Link pembayaran: <a href="{{ $payment->payment_url }}" target="_blank"
                                        rel="noopener noreferrer">{{ $payment->payment_url }}</a></p>
                            @endif

                            @if (($program && !$payment) || (!$payment->is_paid && !now()->lessThanOrEqualTo($payment->valid_until)))
                                <form action="{{ route('student.recreate-payment-link') }}" method="POST">
                                    @csrf
                                    <button class="btn btn-primary">
                                        Buat Link Pembayaran Baru
                                    </button>
                                </form>
                            @endif
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
