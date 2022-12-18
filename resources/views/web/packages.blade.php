@extends('web.base')
@section('content')
    <div class="service-packages-content-container">
        <div class="service-package-content">
            <h1>Packages</h1>
            @forelse($packages as $package)
            <div class="services-packages packages">
                @include('web.package_data')
            </div>
            @empty
            <li>Empty</li>
            @endforelse
        </div>
    </div>
@endsection
@section('scripts')
@endsection
