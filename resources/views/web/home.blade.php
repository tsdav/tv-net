@extends('web.base')
@section('content')
    <div class="home-content-container">
        <div class="home-background">

        </div>
        <div class="home-services">
            <h1>Ծառայություններ</h1>
            <div class="services-container">
                @forelse($services as $service)
                <div class="single-service">
                    <img src="{{asset('/images/service.png')}}" alt="logo">
                    <h3>{{ $service->service_name }}</h3>
                    <h4>{{ $service->service_description }}</h4>
                </div>
                @empty
                    <div class="single-service">
                        <img src="{{asset('/images/service.png')}}" alt="logo">
                        <h3>TV + Internet</h3>
                        <h4>Fixed Internet & Digital Channels</h4>
                        <button>Details</button>
                    </div>
                @endforelse
            </div>
        </div>
        <div class="home-achievements">
            <h1>Մեր հաջողությունները</h1>
            <div class="achievements-container">
                <div class="achievements-column-container">
                    <h2>100+</h2>
                    <h4>TV ալիք</h4>
                </div>
                <div class="achievements-column-container">
                    <h2>100MB/s</h2>
                    <h4>Ինտերնետ</h4>
                </div>
                <div class="achievements-column-container">
                    <h2>IPTV</h2>
                    <h4>CatchUp հնարավորություն</h4>
                </div>
            </div>
        </div>
        <div class="home-choose">
            <h1>Ինչու՞ ընտրել մեզ</h1>
            <div class="choose-container">
                <div class="single-choose">
                    <img src="{{asset('/images/service.png')}}" alt="logo">
                    <h2>Մատչելիություն</h2>
                    <h3>Մինչև 3 հեռուստացույց ընդհամենը 3000դր․</h3>
                </div>
                <div class="single-choose">
                    <img src="{{asset('/images/service.png')}}" alt="logo">
                    <h2>Գերարագ ինտերնետ</h2>
                    <h3>Մենք մատակարարում ենք մինչև 100MB/s ինտերնետ</h3>
                </div>
                <div class="single-choose">
                    <img src="{{asset('/images/service.png')}}" alt="logo">
                    <h2>IPTV</h2>
                    <h3>Նորույթ! CatchUp + TimeShift հնարավորություն</h3>
                </div>
            </div>
        </div>
        <div class="home-available">
            <h1>Հասանելիության քարտեզ</h1>
            <div class="available-container">
                <div class="locations-container">
                    <div class="locations-block">
                        <div class="locations-block-items" style="padding-left: 0 !important;">
                            <button>Երևան</button>
                        </div>
                        <div class="icons-container locations-block-items">
                            <i class="fa fa-map-marker fa-2x"></i>
                            <i class="fa fa-map-marker fa-2x"></i>
                            <i class="fa fa-map-marker fa-2x"></i>
                        </div>
                        <div class="locations-block-items">
                            <h4>Աջափնյակ</h4>
                            <h4>Դավթաշեն</h4>
                            <h4>Զովունի</h4>
                        </div>
                    </div>
                    <div class="customer-container">
                        <h1>Մեր կոնտակտները:</h1>
                        <h4>Էստոնական 12/1</h4>
                        <h4>
                            <i class='fa fa-phone'></i>
                            <a href="tel:+37494374737">+374 94 374737</a>
                        </h4>
                        <h4>
                            <i class='fa fa-phone'></i>
                            <a href="tel:+37410370808">+374 10 370808</a>
                        </h4>
                        <h4>
                            <i class='fa fa-phone'></i>
                            <a href="tel:+37499370808">+374 99 370808</a>
                        </h4>
                        <h4>
                            <i class='fa fa-phone'></i>
                            <a href="tel:+37455370808">+374 55 370808</a>
                        </h4>
                        <h4>
                            <i class='fa fa-phone'></i>
                            <a href="tel:+37460370808">+374 60 370808</a>
                        </h4>
                        <h4>
                            <a href="mailto:@">Գրել նամակ</a>
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
