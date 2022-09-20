@extends('layouts.auth')

@section('content')

                    <form method="POST" class="row g-1 p-0 p-4" action="{{ route('register') }}">
                        @csrf
                        <div class="col-12 text-center mb-5">
                            <h1>Sign in</h1>
                            <span>Free access to our dashboard.</span>
                        </div>

                        <div class="col-12">
                            <label for="name" class="form-label">{{ __('Name') }}</label>

                            <div class="mb-2">
                                <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>

                            <div class="mb-2">
                                <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>

                            <div class="mb-2">
                                <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-12 text-center mt-4">
                                <button type="submit" class="btn btn-lg btn-block btn-light lift text-uppercase">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                        <div class="col-12 text-center mt-4">
                            <span class="text-muted">Already have an account? <a href="{{ route('login') }}" title="Sign in" class="text-secondary">Sign in here</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
