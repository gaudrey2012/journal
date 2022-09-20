@extends('layouts.auth')

@section('content')
    <form class="row g-1 p-0 p-4" method="POST" action="{{ route('password.update') }}">
        <div class="col-12 text-center mb-5">
            <h1>Forgot password?</h1>
            <span>Enter the email address you used when you joined and we'll send you instructions to reset your password.</span>
        </div>
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="col-12">
            <div class="mb-2">
                <label class="form-label">Email address</label>
                <input type="email" id="password" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
            </div>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="col-12">
            <div class="mb-2">
                <label class="form-label">Password</label>
                <input type="password" id="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            </div>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="col-12">
            <div class="mb-2">
                <label class="form-label">Confirm password</label>
                <input type="password" id="password-confirm" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>
        <div class="col-12 text-center mt-4">
            <button type="submit" class="btn btn-lg btn-block btn-light lift text-uppercase">
                {{ __('Reset Password') }}
            </button>
        </div>
    </form>
@endsection
