@extends('auth.login_layout')
@section('title', __('auth.registrationpending'))

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                <div class="login-brand">
                    <img src="{{ public_asset('/assets/frontend/img/logo.svg') }}" alt="logo" width="100" class="shadow-light rounded-circle">
                </div>

                <div class="card card-primary">
                    <div class="card-body">
                        <div class="alert alert-primary" role="alert">
                            @lang('auth.pendingmessage')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()
