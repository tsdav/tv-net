@extends('web.base')
@section('content')
    <div class="service-packages-content-container">
        <div class="service-package-content">
            <h1>Packages</h1>
            <div class="services-packages packages">
            @forelse($packages as $package)
                @include('web.package_data')
            @empty
            <li>Empty</li>
            @endforelse
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
