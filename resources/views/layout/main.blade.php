<!doctype html>
<html class="no-js" lang="en" dir="ltr">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="x-ua-compatible" content="ie=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>
            @yield('title','Online Shop')
        </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="{{asset('dist/css/foundation.css')}}"/>
        <link rel="stylesheet" href="{{asset('dist/css/app.css')}}"/>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css" rel="stylesheet">


    </head>
    <body>
        <div  class="top-bar">
            <div style="color:white" class="top-bar-left">
                <h4 class="brand-title">
                    <a href="{{route('home')}}">
                        <i class="fa fa-home fa-lg" aria-hidden="true">
                        </i>
                        Hackathon's Kitchen
                    </a>
                </h4>
            </div>
            <div class="top-bar-right">
                <ol class="menu">
                    <li>
                        <a href="{{route('products')}}">
                            DAILY MENUS
                        </a>
                    </li>
                    <li>
                        <a href="{{route('alternatives')}}">
                            ALTERNATIVE MENUS
                        </a>
                    </li>
                    <li>
                        <a href="{{route('cart.index')}}">
                            <i class="fa fa-shopping-cart fa-2x" aria-hidden="true">
                            </i>
                            CART
                            <span class="alert badge">
                                {{Cart::count()}}
                            </span>
                        </a>
                    </li>
                    @guest
                    <li>
                        <a href="{{route('login')}}">
                            LOGIN
                        </a>
                    </li>
                    <li>
                        <a href="{{route('register')}}">
                            SIGN UP
                        </a>
                    <li>
                    @else
                    <li>       
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                        </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>    
                    @endguest
                    </li>
                </ol>
            </div>
        </div>
        
@yield('content')
<footer class="footer">
  <div class="row full-width">
    <div class="small-12 medium-4 large-4 columns">
      <i class="fi-laptop"></i>
      <p>Coded by Siphiwe Mohale for demonstration purpose only</p>
    </div>
    <div class="small-12 medium-4 large-4 columns">
      <i class="fi-html5"></i>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit impedit consequuntur at! Amet sed itaque nostrum, distinctio eveniet odio, id ipsam fuga quam minima cumque nobis veniam voluptates deserunt!</p>
    </div>
    
    <div class="small-6 medium-4 large-4 columns">
      <h4>Follow Us</h4>
      <ul class="footer-links">
        <li><a href="#">GitHub</a></li>
        <li><a href="#">Facebook</a></li>
        <li><a href="#">Twitter</a></li>
      <ul>
    </div>
  </div>
</footer>

    <script src="{{asset('dist/js/vendor/jquery.js')}}"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{asset('dist/js/app.js')}}"></script>
    </body>
</html>
