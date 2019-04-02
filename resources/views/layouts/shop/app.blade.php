<!DOCTYPE HTML>
<html>
<head>
    <title>Photo-Hub an Photo Gallery Category Flat Bootstarp responsive Website Template| Home :: w3layouts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Photo-Hub Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design"/>

    <link href="{{ asset('css/bootstrap.css') }}" rel='stylesheet' type='text/css'/>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Custom Theme files -->
    <link href="{{ asset('css/style.css') }}" rel='stylesheet' type='text/css'/>
    <!-- Custom Theme files -->
    <!--webfont-->
    <link href='http://fonts.googleapis.com/css?family=Quicksand:300,400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800' rel='stylesheet' type='text/css'>

</head>
<body>
<div class="header">
    <div class="container">
        <div class="logo">
            <h1><a href="/">Photo Hub</a></h1>
        </div>
        <div class="top_right">
            <ul>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
                <li><a href="register.html">Register</a></li>
                |
                <li class="login">
                    <div id="loginContainer"><a href="#" id="loginButton"><span>Login</span></a>
                        <div id="loginBox">
                            <form id="loginForm">
                                <fieldset id="body">
                                    <fieldset>
                                        <label for="email">Email Address</label>
                                        <input type="text" name="email" id="email">
                                    </fieldset>
                                    <fieldset>
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password">
                                    </fieldset>
                                    <input type="submit" id="login" value="Sign in">
                                    <label for="checkbox"><input type="checkbox" id="checkbox"> <i>Remember
                                            me</i></label>
                                </fieldset>
                                <span><a href="#">Forgot your password?</a></span>
                            </form>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="{{ route('shop.cart') }}">Cart <span>(@if($cart) {{ $cart->count() }} @else 0 @endif)</span></a>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
@php
    /** @var \Illuminate\Support\ViewErrorBag $errors */
@endphp
@if($errors->any())
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        </div>
    </div>
@endif

@if(session('success'))
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        </div>
    </div>
@endif
@yield('content')

<div class="grid_2">
    <div class="container">
        <div class="col-md-3 col_2">
            <h3>Stock Photo<br>Categories</h3>
        </div>
        <div class="col-md-9 col_5">
            @if (!empty($categories))
                <div class="col_1_of_5 span_1_of_5">
                    <ul class="list1">
                        @php $iter = 0; @endphp
                        @foreach($categories as $category)
                            <li><a href="{{ route('shop.category', $category->slug) }}">{{ $category->title }}</a></li>
                            @php $iter++; @endphp
                            @if($iter > 5)
                    </ul>
                </div>
                <div class="col_1_of_5 span_1_of_5">
                    <ul class="list1">
                        @php $iter = 0; @endphp
                        @endif
                        @endforeach
                    </ul>
                </div>
            @else
                Тут сейчас пусто
            @endif
            {{--<div class="col_1_of_5 span_1_of_5">
                <ul class="list1">
                    <li><a href="stock.html">Abstract</a></li>
                    <li><a href="stock.html">Animals/Wildlife</a></li>
                    <li><a href="stock.html">The Arts</a></li>
                    <li><a href="stock.html">Backgrounds/Textures</a></li>
                    <li><a href="stock.html">Beauty/Fashion</a></li>
                    <li><a href="stock.html">Buildings/Landmarks</a></li>
                </ul>
            </div>
            <div class="col_1_of_5 span_1_of_5">
                <ul class="list1">
                    <li><a href="stock.html">Business/Finance</a></li>
                    <li><a href="stock.html">Celebrities</a></li>
                    <li><a href="stock.html">Editorial</a></li>
                    <li><a href="stock.html">Education</a></li>
                    <li><a href="stock.html">Food and Drink</a></li>
                    <li><a href="stock.html">Healthcare/Medical</a></li>
                </ul>
            </div>
            <div class="col_1_of_5 span_1_of_5">
                <ul class="list1">
                    <li><a href="stock.html">Holidays</a></li>
                    <li><a href="stock.html">Illustrations/Clip-Art</a></li>
                    <li><a href="stock.html">Industrial</a></li>
                    <li><a href="stock.html">Interiors</a></li>
                    <li><a href="stock.html">Miscellaneous</a></li>
                    <li><a href="stock.html">Model Released Only</a></li>
                </ul>
            </div>
            <div class="col_1_of_5 span_1_of_5">
                <ul class="list1">
                    <li><a href="stock.html">Nature</a></li>
                    <li><a href="stock.html">Objects</a></li>
                    <li><a href="stock.html">Parks/Outdoor</a></li>
                    <li><a href="stock.html">People</a></li>
                    <li><a href="stock.html">Religion</a></li>
                    <li><a href="stock.html">Science</a></li>
                </ul>
            </div>--}}
            <div class="clearfix"></div>
        </div>


        <div class="clearfix"></div>
    </div>
</div>
<div class="grid_3">
    <div class="container">
        <ul id="footer-links">
            <li><a href="#">Terms of Use</a></li>
            <li><a href="#">Royalty Free License</a></li>
            <li><a href="#">Extended License</a></li>
            <li><a href="#">Privacy</a></li>
            <li><a href="support.html">Support</a></li>
            <li><a href="about.html">About Us</a></li>
            <li><a href="faq.html">FAQ</a></li>
            <li><a href="#">Categories</a></li>
        </ul>
        <p>Copyright © 2015 Photo-Hub. All Rights Reserved.Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a>
        </p>
    </div>
</div>
</body>
<script type="application/x-javascript"> addEventListener("load", function () {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    } </script>
<script src="//code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="{{ asset('js/easyResponsiveTabs.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true   // 100% fit in a container
        });
    });
</script>
<script src="{{ asset('js/menu_jquery.js') }}"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
</html>
