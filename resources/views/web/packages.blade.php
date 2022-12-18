@extends('web.base')
@section('content')
    <div class="service-packages-content-container">
        <div class="service-package-content">
            <h1>Packages</h1>
            {{--     TV part       --}}
            <div class="services-packages packages">
                @include('web.package_data')
                @include('web.package_data')
                @include('web.package_data')
            </div>
            {{--     Internet       --}}
            <div class="services-packages packages">
                @include('web.package_data')
                @include('web.package_data')
                @include('web.package_data')
            </div>
            {{--     TV + Internet       --}}
            <div class="services-packages packages">
                @include('web.package_data')
                @include('web.package_data')
                @include('web.package_data')
            </div>
            {{--     chem hishum    --}}
            <div class="services-packages packages">
                @include('web.package_data')
                @include('web.package_data')
                @include('web.service_data')
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
