@extends('app')
@section('title', __('home.welcome.title'))

@section('content')
    <div class="section-header">
        <h1>@lang('common.newestpilots')</h1>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="row">
                @foreach($users as $user)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="empty-state" style="padding: 35px;">
                                    @if ($user->avatar == null)
                                        <img class="rounded-circle" style="width: 100px; height: 100px" src="{{ $user->gravatar(123) }}">
                                    @else
                                        <img src="{{ $user->avatar->url }}" style="width: 123px;">
                                    @endif

                                    <a href="{{ route('frontend.profile.show', [$user->id]) }}" style="color: inherit; text-decoration: none;"><h2>{{ $user->name_private }}</h2></a>
                                    <h3 class="lead">
                                        @if(filled($user->home_airport))
                                            {{ $user->home_airport->icao }}
                                        @endif
                                    </h3>

                                    <a href="{{ route('frontend.profile.show', [$user->id]) }}" class="btn btn-primary mt-2">@lang('common.profile')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
