@include('layouts.sidebar')
        <!DOCTYPE HTML>
<html>
<head>
    <meta charset=utf-8">
    <title>Heartbeat and chain</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body>
<div class="header">
    <a href="/">
        <img class="head_logo" src="{{asset('images/logo/small_logo.png')}}">
    </a>
    <div class="away_and_register">
        <div class="away">
            <a href=""><img class="away_logo" src="{{asset('images/away/facebook_logo.png')}}"></a>
            <a href=""><img class="away_logo" src="{{asset('images/away/inst_logo.png')}}"></a>
            <a href="" target="_blank"><img class="away_logo" src="{{asset('images/away/vkcom_logo.png')}}"></a>
            <a href=""><img class="away_logo" src="{{asset('images/away/telegram_logo.png')}}"></a>
            <a href=""><img class="away_logo" src="{{asset('images/away/twitter_logo.png')}}"></a>
        </div>
        @include('layouts.registerBar')
    </div>
    <div class="head_name">
        <h1><span>heartbeat</span> and chain <br> bikeshop</h1>
    </div>
</div>

<div class="content">
    <div class="upper_menu">
        <nav>
            {{--<a href="/"> <span>M</span>AIN </a>--}}
            <a href="{{url('latest')}}"> <span>L</span>ATEST </a>
            <a href="{{url('items')}}"> <span>S</span>HOP </a>
            <a href="{{url('articles')}}"> <span>A</span>RTICLES </a>
            <a href="{{url('reviews')}}"> <span>R</span>EVIEWS </a>
            <a href="{{url('delivery')}}"> <span>D</span>ELIVERY </a>
            <a href="{{url('about')}}"> <span>A</span>BOUT US</a>
        </nav>
    </div>
    <div class="container">
        @yield('sidebar')
        <div class="inner_container">
            @yield('content')
        </div>
    </div>
</div>

<div class="footer">
    Copyright © "Heartbeat and chain" 2018
</div>
</body>
</html>