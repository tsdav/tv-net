@extends('web.base')
@section('content')
    <div class="service-packages-content-container">
        <div class="service-package-content">
            <h1>Services</h1>
            <div class="services-packages">
                @include('web.service_data')
                @include('web.service_data')
                @include('web.service_data')
                @include('web.service_data')
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
