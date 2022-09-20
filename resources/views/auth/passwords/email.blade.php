@extends('layouts.auth')

@section('content')
    <div class="col-12 text-center mb-5">
        <h1>Forgot password?</h1>
        <span>Enter the email address you used when you joined and we'll send you instructions to reset your password.</span>
    </div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="col-12">
                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                <div class="mb-2">
                    <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-12 text-center mt-4">
                <button type="submit" class="btn btn-lg btn-block btn-light lift text-uppercase">
                    {{ __('Send Password Reset Link') }}
                </button>
            </div>

        </form>
    </div>
@endsection
