@extends('layouts.guest')

@section('content')
    <div class="content-wrapper d-flex align-items-center auth">
        <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
                <div class="auth-form-light p-5 text-left">
                    <div class="brand-logo">
                        <span class="fs-3 fw-bold text-primary">Smartgama</span>
                    </div>
                    <h4>Hello! let's get started</h4>
                    <h6 class="font-weight-light">Sign in to continue.</h6>
                    <form class="pt-3" action="{{ route('login') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <input type="email" name="email"
                                class="form-control form-control-lg @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" id="exampleInputEmail1" placeholder="Email">

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
                        <div class="mt-3">
                            <button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn"
                                type="submit">SIGN IN</button>
                        </div>
                        <div class="d-flex justify-content-between align-items-center my-2">
                            <div class="form-check">
                                <label class="form-check-label text-muted">
                                    <input type="checkbox" name="remember" @checked(old('remember'))
                                        class="form-check-input"> Keep me signed in
                                </label>
                            </div>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="auth-link text-black">Forgot password?</a>
                            @endif
                        </div>

                        @if (Route::has('register'))
                            <div class="font-weight-light mt-4 text-center"> Don't have an account? <a href="register.html"
                                    class="text-primary">Create</a>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
