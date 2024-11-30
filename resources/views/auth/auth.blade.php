@extends('layout')

@section('content')
    <div class="col-12">
        @include('components.success-alert')
        @include('components.errors')
        <div class="row">
            <div class="col-6">
                @include('auth.register')
            </div>

            <div class="col-6">
                @include('auth.login')
            </div>
        </div>
    </div>


@endsection
