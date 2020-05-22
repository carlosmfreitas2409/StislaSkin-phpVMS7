@extends('app')
@section('title', __('common.livemap'))

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            {{ Widget::liveMap() }}
        </div>
    </div>
@endsection
