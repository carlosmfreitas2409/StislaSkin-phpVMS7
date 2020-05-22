@extends('auth.login_layout')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                <div class="login-brand">
                    <img src="{{ public_asset('/assets/frontend/img/logo.svg') }}" alt="logo" width="100" class="shadow-light rounded-circle">
                </div>

                <div class="card card-primary">
                    <div class="card-header">
                        {{ __('Verify Your Email Address') }}
                    </div>
                    <div class="card-body">
                        @if (session('resent'))
                          <div class="alert alert-primary" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                          </div>
                        @endif

                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }},

                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
                                {{ __('click here to request another') }}
                            </button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
