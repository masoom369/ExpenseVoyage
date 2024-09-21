@extends('layouts.guest')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="card card-authentication1 mt-3" style="width: 50%;">
            <div class="card-body">
                <div class="text-center">
                    <x-authentication-card-logo />
                    <h5 class="card-title text-uppercase py-1">Reset Password</h5>
                </div>

                <x-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="form-group">
                        <label for="email">{{ __('Email') }}</label>
                        <div class="position-relative has-icon-right">
                            <x-input id="email" class="form-control input-shadow" type="email" name="email"
                                :value="old('email', $request->email)" required autofocus autocomplete="username"
                                placeholder="Enter Your Email" />
                            <div class="form-control-position">
                                <i class="icon-envelope-open"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <label for="password">{{ __('Password') }}</label>
                        <div class="position-relative has-icon-right">
                            <x-input id="password" class="form-control input-shadow" type="password" name="password"
                                required autocomplete="new-password" placeholder="Enter New Password" />
                            <div class="form-control-position">
                                <i class="icon-lock"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                        <div class="position-relative has-icon-right">
                            <x-input id="password_confirmation" class="form-control input-shadow" type="password"
                                name="password_confirmation" required autocomplete="new-password"
                                placeholder="Confirm Your Password" />
                            <div class="form-control-position">
                                <i class="icon-lock"></i>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-2">
                        <x-button class="ms-4">
                            {{ __('Reset Password') }}
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
