@extends('layouts.guest')

@section('content')

    <div class="d-flex justify-content-center">
        <div class="card card-authentication1 mt-3" style="width: 50%;">
            <div class="card-body">
                <div class="text-center">
                    <x-authentication-card-logo />
                    <h5 class="card-title text-uppercase py-1">Sign In</h5>
                </div>

                <x-validation-errors class="mb-1" />

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <label for="email">Email ID</label>
                        <div class="position-relative has-icon-right">
                            <x-input id="email" class="form-control input-shadow" type="email" name="email" :value="old('email')" required autofocus placeholder="Enter Your Email ID" />
                            <div class="form-control-position">
                                <i class="icon-envelope-open"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="position-relative has-icon-right">
                            <x-input id="password" class="form-control input-shadow" type="password" name="password" required autocomplete="current-password" placeholder="Enter Your Password" />
                            <div class="form-control-position">
                                <i class="icon-lock"></i>
                            </div>
                        </div>
                    </div>

                    <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-checkbox id="remember_me" name="remember" />
                            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="text-center mt-2">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </div>

                    <div class="text-center mt-2">
                        <x-button class="ms-4">
                            {{ __('Log in') }}
                        </x-button>
                    </div>
                </form>
            </div>

            <div class="card-footer text-center py-1">
                <p class="text-warning">Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
            </div>
        </div>
    </div>

@endsection
