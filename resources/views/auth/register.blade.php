@extends('layouts.guest')
@section('content')
    <div class="d-flex justify-content-center">
        <div class="card card-authentication1 mt-3" style="width: 50%;">
            <div class="card-body">
                <div class="text-center">
                    <x-authentication-card-logo />
                    <h5 class="card-title text-uppercase py-1">Sign Up</h5>
                </div>

                <x-validation-errors class="mb-1" />

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group">
                        <label for="name">Name</label>
                        <div class="position-relative has-icon-right">
                            <x-input id="name" class="form-control input-shadow" type="text" name="name"
                                :value="old('name')" required autofocus placeholder="Enter Your Name" />
                            <div class="form-control-position">
                                <i class="icon-user"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email ID</label>
                        <div class="position-relative has-icon-right">
                            <x-input id="email" class="form-control input-shadow" type="email" name="email"
                                :value="old('email')" required placeholder="Enter Your Email ID" />
                            <div class="form-control-position">
                                <i class="icon-envelope-open"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="currency">Currency</label>
                        <div class="position-relative has-icon-right">
                            <select id="currency" name="currency" class="form-control input-shadow" required>
                                <option value="USD" {{ old('currency') == 'USD' ? 'selected' : '' }}>USD</option>
                                <option value="EUR" {{ old('currency') == 'EUR' ? 'selected' : '' }}>EUR</option>
                                <option value="GBP" {{ old('currency') == 'GBP' ? 'selected' : '' }}>GBP</option>
                                <option value="MYR" {{ old('currency') == 'MYR' ? 'selected' : '' }}>MYR</option>
                                <option value="PKR" {{ old('currency') == 'PKR' ? 'selected' : '' }}>PKR</option>
                            </select>
                            <div class="form-control-position">
                                <i class="icon-money"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="position-relative has-icon-right">
                            <x-input id="password" class="form-control input-shadow" type="password" name="password"
                                required placeholder="Choose Password" />
                            <div class="form-control-position">
                                <i class="icon-lock"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <div class="position-relative has-icon-right">
                            <x-input id="password_confirmation" class="form-control input-shadow" type="password"
                                name="password_confirmation" required placeholder="Confirm Password" />
                            <div class="form-control-position">
                                <i class="icon-lock"></i>
                            </div>
                        </div>
                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="form-group">
                            <div class="icheck-material-white">
                                <x-checkbox name="terms" id="terms" required />
                                <label for="terms">I Agree With Terms & Conditions</label>
                            </div>
                        </div>
                    @endif

                    <div class="text-center mt-2">
                        <x-button>
                            {{ __('Register') }}
                        </x-button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center py-1">
                <p class="text-warning">Already have an account? <a href="{{ route('login') }}">Sign In here</a></p>
            </div>
        </div>
    </div>
@endsection
