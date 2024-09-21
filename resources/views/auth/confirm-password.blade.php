@extends('layouts.guest')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="card card-authentication1 mt-3" style="width: 50%;">
            <div class="card-body">
                <div class="text-center">
                    <x-authentication-card-logo />
                    <h5 class="card-title text-uppercase py-1">Confirm Password</h5>
                </div>

                <div class="mb-4 text-sm text-gray-600 text-center">
                    {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                </div>

                <x-validation-errors class="mb-1" />

                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="position-relative has-icon-right">
                            <x-input id="password" class="form-control input-shadow" type="password" name="password"
                                required autocomplete="current-password" placeholder="Enter Your Password" autofocus />
                            <div class="form-control-position">
                                <i class="icon-lock"></i>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-2">
                        <x-button class="ms-4">
                            {{ __('Confirm') }}
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
