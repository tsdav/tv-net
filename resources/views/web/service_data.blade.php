<div class="services-container flip-card">
    <div class="flip-card-inner">
        <div class="single-service flip-card-front">
            <img src="{{asset('/images/service.png')}}" alt="logo">
            <h3>{{ $service->service_name }}</h3>
            <h4>{{ $service->service_description }}</h4>
        </div>
        <div class="flip-card-back">
            <h1>{{ $service->service_details }}</h1>
        </div>
    </div>
</div>
