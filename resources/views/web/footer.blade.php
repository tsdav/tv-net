@php
    $menuArray = [
        'service' => 'Ծառայություններ',
        'web.reports' =>  'Հաշվետվություններ'
    ];

    $menuArray2 = [
        'about' => 'Հետադարձ կապ',
        'packages' =>  'Փաթեթներ'
    ];

    $subscribe = 'Բաժանորդագրվեք նորությունների համար';
    $subscribeButton = 'Բաժանորդագրվել';
    $contact = 'Կապ';
@endphp

<div class="footer-container">
    <div class="footer-items-container">
        <div class="footer-container-link-names link-containers">
            <div class="footer-columns-container">
                <h2>TvNet</h2>
                @foreach($menuArray as $route => $singleMenu)
                    <li>
                        <a href="{{route($route)}}">
                            {{$singleMenu}}
                        </a>
                    </li>
                @endforeach
            </div>
            <div class="footer-columns-container">
                <h2>{{$contact}}</h2>
                @foreach($menuArray2 as $route => $singleMenu)
                    <li>
                        <a href="{{route($route)}}">
                            {{$singleMenu}}
                        </a>
                    </li>
                @endforeach
                <li>
                    <a href="mailto:@">
                        Գրել նամակ
                    </a>
                </li>
            </div>
            <div class="footer-columns-container footer-subscriber">
                <h3>{{$subscribe}}</h3>
                <div class="footer-subscriber-container">
                    <input type="email" class="subscriber-email" placeholder="Email">
                    <button type="submit" id="subscriber_submit">{{$subscribeButton}}</button>
                </div>
                <div>
                    <a href="https://www.instagram.com" class="home_href" target="_blank">
                        <img src="{{asset('/images/instagram.png')}}" alt="logo">
                    </a>
                    <a href="https://www.facebook.com/tvnet.am/" class="home_href" target="_blank">
                        <img src="{{asset('/images/facebook.png')}}" alt="logo">
                    </a>
                </div>
            </div>
        </div>
        <div class="footer-container-logo">
            <a href="{{route('home')}}" class="home_href">
                <img src="{{asset('/images/logo.png')}}" alt="logo">
            </a>
        </div>
        <div class="footer-container-copy-rights">
            <span class="footer-copyRight">© 2022  TvNet.am</span>
        </div>
    </div>
</div>
