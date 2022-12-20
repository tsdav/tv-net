@extends('web.base')
@section('content')
    <div class="service-packages-content-container">
        <div class="service-package-content">
            <h1>Packages</h1>
            @forelse($packages as $key => $serviceName)
                <h2>{{ $key }}</h2>
                <div class="services-packages packages">
                    @foreach($serviceName as $package)
                        @include('web.package_data')
                    @endforeach
                </div>
            @empty
            <li>Empty</li>
            @endforelse
        </div>
    </div>
@endsection
@section('scripts')
@endsection
