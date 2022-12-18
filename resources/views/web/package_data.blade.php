<div class="services-container flip-card">
    <div class="flip-card-inner">
        <div class="single-service flip-card-front">
            <img src="{{asset('/images/service.png')}}" alt="logo">
            <h3>{{ $package->package_name }}</h3>
            <h4>{{ $package->package_description }}</h4>
            <button>Details</button>
        </div>
        <div class="flip-card-back">
            <h1>Description Card</h1>
        </div>
    </div>
</div>
