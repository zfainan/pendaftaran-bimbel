@extends('layouts.guest')

@section('content')
    <div class="content-wrapper d-flex align-items-center auth">
        <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
                <div class="auth-form-light p-5 text-left">
                    <div class="brand-logo">
                        <img src="/assets/images/logo.svg" alt="">
                    </div>
                    <h4>New here?</h4>
                    <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                    <form class="pt-3" action="{{ route('register') }}" method="POST">
                        @csrf

                        <input type="hidden" name="program_id" value="{{ request()->input('program_id') }}">

                        <div class="form-group">
                            <input type="text" name="name"
                                class="form-control form-control-lg @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                id="exampleInputName1" placeholder="Fullname">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="email" name="email"
                                class="form-control form-control-lg @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                id="exampleInputEmail1" placeholder="Email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="password" name="password"
                                class="form-control form-control-lg @error('password') is-invalid @enderror"
                                id="exampleInputPassword1" placeholder="Password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="password" name="password_confirmation" class="form-control form-control-lg"
                                id="exampleInputPassword2" placeholder="Confirm password">
                        </div>

                        <div class="mb-4">
                            <div class="form-check">
                                <label class="form-check-label text-muted">
                                    <input type="checkbox" required class="form-check-input"> I agree to all Terms &
                                    Conditions
                                </label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="submit"
                                class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">SIGN
                                UP</button>
                        </div>
                        <div class="font-weight-light mt-4 text-center"> Already have an account? <a
                                href="{{ route('login') }}" class="text-primary">Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
