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
        </div>
        <div class="home-available">
            <h1>We available in</h1>
        </div>
        <div class="home-blog">
            <h1>Blog</h1>
        </div>
    </div>
@endsection
