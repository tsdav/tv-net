@php
    $menuArray = [
        'service' => 'Ծառայություններ',
        'packages' =>  'Փաթեթներ',
        'about' =>  'Մեր մասին',
        'web.reports' =>  'Հաշվետվություններ'
    ];

    $currentRoute = \Illuminate\Support\Facades\Route::currentRouteName();
@endphp
<div class="menu-container">
    <div class="menu-container-items">
        <div class="left-menu-item">
            <div class="logo-container">
                <a href="{{route('home')}}" class="home_href">
                    <img src="{{asset('/images/logo.png')}}" alt="logo">
                </a>
            </div>
            <div class="mainMenu-items-container link-containers">
                @foreach($menuArray as $route => $singleMenu)
                    <li {{$currentRoute === $route ? 'class=active' : ''}}>
                        <a href="{{route($route)}}">
                            {{$singleMenu}}
                        </a>
                    </li>
                @endforeach
            </div>
        </div>
        <div class="phone-container">
            <i class='fa fa-phone'></i>
            <a href="tel:+37455101281">
                +374 55 101281
            </a>
        </div>
    </div>
</div>
