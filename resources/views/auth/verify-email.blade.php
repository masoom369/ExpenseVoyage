@extends('layouts.guest')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="card card-authentication1 mt-3" style="width: 50%;">
            <div class="card-body">
                <div class="text-center">
                    <x-authentication-card-logo />
                    <h5 class="card-title text-uppercase py-1">Email Verification</h5>
                </div>

                <div class="mb-4 text-sm text-gray-600 text-center">
                    {{ __('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                </div>

                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-sm text-green-600 text-center">
                        {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
                    </div>
                @endif

                <div class="mt-4 flex items-center justify-between">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <div>
                            <x-button type="submit">
                                {{ __('Resend Verification Email') }}
                            </x-button>
                        </div>
                    </form>

                    <div>
                        <a href="{{ route('profile.show') }}"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Edit Profile') }}</a>

                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf

                            <button type="submit"
                                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ms-2">
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card-footer text-center py-1">
                <p class="text-warning">Need further assistance? <a href="{{ route('support') }}">Contact support</a></p>
            </div>
        </div>
    </div>
@endsection
