@extends('layouts.auth')

@section('content')
    <form class="row g-1 p-0 p-4" method="POST" action="{{ route('login') }}">
        <div class="col-12 text-center mb-5">
            <h1>Sign in</h1>
            <span>Free access to our dashboard.</span>
        </div>
        <div class="col-12 text-center mb-4">
            <a class="btn btn-lg btn-outline-secondary btn-block" href="#">
                <span class="d-flex justify-content-center align-items-center">
                    
                    Sign in with Google
                </span>
            </a>
            <span class="dividers text-muted mt-4">OR</span>
        </div>
        @csrf

        <div class="col-12">
            <label for="email" class="form-label">{{ __('Email Address') }}</label>
            <div class="mb-2">
                <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-12">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <div class="mb-2">
                <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @if (Route::has('password.request'))
                    <a class="text-secondary" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
        </div>
                       
        <div class="row mb-0">
            <div class="col-12 text-center mt-4">
                <button type="submit" class="btn btn-lg btn-block btn-light lift text-uppercase">
                    {{ __('Login') }}
                </button>
            </div>
        </div>
        <div class="col-12 text-center mt-4">
            <span class="text-muted">Don't have an account yet? <a href="{{ route('register') }}" class="text-secondary">Sign up here</a></span>
        </div>
    </form>
@endsection
