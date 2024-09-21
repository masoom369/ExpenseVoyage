@extends('layouts.guest')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="card card-authentication1 mt-3" style="width: 50%;">
            <div class="card-body">
                <div class="text-center">
                    <x-authentication-card-logo />
                    <h5 class="card-title text-uppercase py-1">Forgot Password</h5>
                </div>

                <div class="mb-4 text-sm text-gray-600 text-center">
                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </div>

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <x-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="form-group">
                        <label for="email">{{ __('Email') }}</label>
                        <div class="position-relative has-icon-right">
                            <x-input id="email" class="form-control input-shadow" type="email" name="email"
                                :value="old('email')" required autofocus autocomplete="username"
                                placeholder="Enter Your Email" />
                            <div class="form-control-position">
                                <i class="icon-envelope-open"></i>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-2">
                        <x-button class="ms-4">
                            {{ __('Email Password Reset Link') }}
                        </x-button>
                    </div>
                </form>
            </div>

            <div class="card-footer text-center py-1">
                <p class="text-warning">Remembered your password? <a href="{{ route('login') }}">Log in here</a></p>
            </div>
        </div>
    </div>
@endsection
