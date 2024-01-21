@extends('frontend.layouts.master')
@section('section')
    <div class="custom-container">
        <div class="custom-content">

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <div class="mb-4 text-sm text-gray-600" style="max-width:1140px">
                    {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                </div>

                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4" style="color: green;font-weight:600">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </div>
                @endif

                <div class="row mt-4 flex items-center justify-between">
                    <div class="col-6">
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf

                            <div>
                                <x-primary-button style="background: #08C">
                                    {{ __('Resend Verification Email') }}
                                </x-primary-button>
                            </div>
                        </form>

                    </div>
                    <div class="col-6">
                        <form method="POST" action="{{ route('logout') }}" style="    text-align: -webkit-right;">
                            @csrf
                            <input type="submit" value="Log Out">

                            {{-- <button type="$user$userbmit"
                                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ __('Log Out') }}
                            </button> --}}
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
