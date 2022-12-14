@extends('web.base')
@section('content')
    <div class="service-packages-content-container">
        <div class="service-package-content">
            <h1>Ծառայություններ</h1>
            <div class="services-packages">
                @forelse($services as $service)
                    @include('web.service_data')
                @empty
                    <div class="services-container flip-card">
                        <div class="flip-card-inner">
                            <div class="single-service flip-card-front">
                                <img src="{{asset('/images/service.png')}}" alt="logo">
                                <h3>TV + Internet</h3>
                                <h4>Fixed Internet & Digital Channels</h4>
                                <button>Details</button>
                            </div>
                            <div class="flip-card-back">
                                <h1>Description Card</h1>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
