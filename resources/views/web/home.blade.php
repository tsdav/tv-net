@extends('web.base')
@section('content')
    <div class="home-content-container">
        <div class="home-background">
            <div class='home-texts'>
                <h1>Get Ready For Ultra Speed Internet</h1>
                <h4>We Provide fast and quality internet</h4>
            </div>
        </div>
        <div class="home-services">
            <h1>Services</h1>
            <div class="services-container">
                <div class="single-service">
                    <img src="{{asset('/images/service.png')}}" alt="logo">
                    <h3>TV + Internet</h3>
                    <h4>Fixed Internet & Digital Channels</h4>
                    <button>Details</button>
                </div>
                <div class="single-service">
                    <img src="{{asset('/images/service.png')}}" alt="logo">
                    <h3>TV + Internet</h3>
                    <h4>Fixed Internet & Digital Channels</h4>
                    <button>Details</button>
                </div>
                <div class="single-service">
                    <img src="{{asset('/images/service.png')}}" alt="logo">
                    <h3>TV + Internet</h3>
                    <h4>Fixed Internet & Digital Channels</h4>
                    <button>Details</button>
                </div>
                <div class="single-service">
                    <img src="{{asset('/images/service.png')}}" alt="logo">
                    <h3>TV + Internet</h3>
                    <h4>Fixed Internet & Digital Channels</h4>
                    <button>Details</button>
                </div>
            </div>
        </div>
        <div class="home-achievements">
            <h1>Our Achievements</h1>
            <div class="achievements-container">
                <div class="achievements-column-container">
                    <h2>100+</h2>
                    <h4>TV Channels</h4>
                </div>
                <div class="achievements-column-container">
                    <h2>100+</h2>
                    <h4>TV Channels</h4>
                </div>
                <div class="achievements-column-container">
                    <h2>100+</h2>
                    <h4>TV Channels</h4>
                </div>
            </div>
        </div>
        <div class="home-choose">
            <h1>Why choose us</h1>
            <div class="choose-container">
                <div class="single-choose">
                    <img src="{{asset('/images/service.png')}}" alt="logo">
                    <h2>High Quality</h2>
                    <h3>We Provide a high quality internet TV and Digital Channels</h3>
                </div>
                <div class="single-choose">
                    <img src="{{asset('/images/service.png')}}" alt="logo">
                    <h2>High Quality</h2>
                    <h3>We Provide a high quality internet TV and Digital Channels</h3>
                </div>
                <div class="single-choose">
                    <img src="{{asset('/images/service.png')}}" alt="logo">
                    <h2>High Quality</h2>
                    <h3>We Provide a high quality internet TV and Digital Channels</h3>
                </div>
            </div>
        </div>
        <div class="home-available">
            <h1>We available in</h1>
            <div class="available-container">
                <div class="locations-container">
                    <div class="locations-block">
                        <div class="locations-block-items" style="padding-left: 0 !important;">
                            <button>Yerevan</button>
                        </div>
                        <div class="icons-container locations-block-items">
                            <i class="fa fa-map-marker fa-2x"></i>
                            <i class="fa fa-map-marker fa-2x"></i>
                        </div>
                        <div class="locations-block-items">
                            <h4>Ajapnyak</h4>
                            <h4>Davtashen</h4>
                        </div>
                    </div>
                    <div class="customer-container">
                        <h1>Our Customer Center:</h1>
                        <h4>Estonakan 12/1</h4>
                        <h4>
                            <i class='fa fa-phone'></i>
                            <a href="tel:+37455101281">+374 55 101281</a>
                        </h4>
                        <h4>
                            <a href="mailto:@">Mail Here</a>
                        </h4>
                    </div>
                </div>
                <div class="map-container">
                    <img src="{{ asset('images/Yerevan.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection
