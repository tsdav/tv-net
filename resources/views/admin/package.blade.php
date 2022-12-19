@extends('admin.admin')
@section('page')
    <div class="create-package">
        <a href="{{ route($formRoute) }}" class="create-package-link">Ավելացնել նորը</a>
    </div>
    @forelse($items as $item)
    <div class="services-container flip-card">
        <div class="flip-card-inner">
            <div class="single-service flip-card-front">
                <img src="{{ asset('/images/service.png') }}" alt="logo">
                <h3>{{ $item['itemName'] }}</h3>
                <h4>{{ $item['itemDescription'] }}</h4>
            </div>
            <a href="{{ route($detailRoute, $item['itemId'] ?? '') }}" class="create-package-link">Մանրամասներ</a>
        </div>
    </div>
    @empty
        <li>Empty</li>
    @endforelse
@endsection
