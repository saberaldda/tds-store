<!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7"><![endif]-->
<!--[if IE 8]><html class="ie ie8"><![endif]-->
<!--[if IE 9]><html class="ie ie9"><![endif]-->
<html lang="{{ App::currentLocale() }}" dir="{{ App::currentLocale() == 'ar'? 'rtl' : 'ltr' }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">
    <link rel="icon" href="{{ asset('assets/admin/img/tds.png') }}">
    <meta name="author" content="Nghia Minh Luong">
    <meta name="keywords" content="Default Description">
    <meta name="description" content="Default keyword">
    <title>{{ __($title) }}</title>
    <!-- Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Archivo+Narrow:300,400,700%7CMontserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/front/plugins/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/plugins/ps-icon/style.css') }}">
    <!-- CSS Library-->
    @if (App::currentLocale() == 'ar')
    <link rel="stylesheet" href="{{ asset('assets/front/plugins/bootstrap/dist/css/bootstrap.min.rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/plugins/owl-carousel/assets/owl.carousel.rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/plugins/slick/slick/slick.rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/plugins/bootstrap-select/dist/css/bootstrap-select.min.rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/plugins/Magnific-Popup/dist/magnific-popup.rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/plugins/jquery-ui/jquery-ui.min.rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/plugins/revolution/css/settings.rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/plugins/revolution/css/layers.rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/plugins/revolution/css/navigation.rtl.css') }}">
    @else
    <link rel="stylesheet" href="{{ asset('assets/front/plugins/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/plugins/owl-carousel/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/plugins/slick/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/plugins/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/plugins/Magnific-Popup/dist/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/plugins/jquery-ui/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/plugins/revolution/css/settings.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/plugins/revolution/css/layers.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/plugins/revolution/css/navigation.css') }}">
    @endif
    <!-- Custom-->
    @if (App::currentLocale() == 'ar')
    <link rel="stylesheet" href="{{ asset('assets/front/css/style.rtl.css') }}">
    @else
    <link rel="stylesheet" href="{{ asset('assets/front/css/style.css') }}">
    @endif
  </head>
  <!--[if IE 7]><body class="ie7 lt-ie8 lt-ie9 lt-ie10"><![endif]-->
  <!--[if IE 8]><body class="ie8 lt-ie9 lt-ie10"><![endif]-->
  <!--[if IE 9]><body class="ie9 lt-ie10"><![endif]-->
  <body class="ps-loading">
    <div class="header--sidebar"></div>
    <header class="header">
      <div class="header__top">
        <div class="container-fluid">
          <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-6 col-xs-12 ">
                  <p>{{ __('Gaza, Palestine  -  Hotline: saberaldda@gmail.com') }}</p>
                </div>
                <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 ">
                  <div class="header__actions">
                    @auth
                    <a href="{{ route('profile.show', Auth::id()) }}"><i class="fa fa-user"></i>{{ ' '.Auth::user()->name }}</a>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout').submit()">{{ __('Log Out') }}</a>
                    <form action="{{ route('logout') }}" method="post" id="logout" style="display: none">
                    @csrf
                    </form>
                    @else
                    <a href="{{ route('login') }}">{{ __('Login') }}</a>
                    <a href="{{ route('register') }}">{{ __('Regiser') }}</a>
                    @endauth
                    <div class="btn-group ps-dropdown">
                      {{-- onclick="event.preventDefault(); document.getElementById('currency').submit()" --}}
                      <a href="" onclick="event.preventDefault();">
                        <form action="{{ route('currency.store') }}" method="post">
                          @csrf
                          <select name="currency_code"  onchange="this.form.submit()" style="border: none">
                            <option value="USD" @selected('USD' == session('currency_code'))>$ {{ __('USD') }}</option>
                            <option value="ILS" @selected('ILS' == session('currency_code'))>₪ {{ __('ILS') }}</option>
                            <option value="JOD" @selected('JOD' == session('currency_code'))>د.أ {{ __('JOD') }}</option>
                            <option value="SAR" @selected('SAR' == session('currency_code'))>ر.س {{ __('SAR') }}</option>
                          </select>
                        </form>
                      </a>
                    </div>
                    <div class="btn-group ps-dropdown">
                      <a href="" onclick="event.preventDefault();">
                        <form action="" method="get">
                          <select name="lang" onchange="this.form.submit()" style="border: none">
                            <option value="en" @selected('en' == app()->getLocale())>{{ __('English') }}</option>
                            <option value="ar" @selected('ar' == app()->getLocale())>{{ __('العربية') }}</option>
                          </select>
                        </form>
                      </a>
                    </div>
                  </div>
                </div>
          </div>
        </div>
      </div>
      <nav class="navigation">
        <div class="container-fluid">
          <div class="navigation__column left">
            <div class="header__logo"><a class="ps-logo" href="/"><img src="{{ asset('assets/front/images/logo.png') }}" alt=""></a></div>
          </div>
          <div class="navigation__column center">
                <ul class="main-menu menu">
                  <li class="menu-item menu-item-has-children dropdown"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                  <li class="menu-item menu-item-has-children has-mega-menu"><a href="{{ route('products') }}">{{ __('Products') }}</a>
                    <div class="mega-menu">
                      <div class="mega-wrap">
                        @php $j=0 @endphp
                        @foreach ($categories->sortByDesc('products_count') as $category)
                        @if ($j<5)
                          <div class="mega-column">
                            <a href="{{ route('products') }}?category={{ $category->id }}"><h4 class="mega-heading"><img class="rounded-circle" width="40px" src="{{ $category->image_url }}" alt=""> {{ $category->name }}</h4></a>
                            <ul class="mega-item">
                              @php $i=0 @endphp
                              @foreach ($category->products as $c_product)
                                @if ($i<7)
                                  <li><a href="{{ route('product.details', $c_product->slug) }}">{{ $c_product->name }}</a></li>
                                @endif
                                @php $i++ @endphp
                              @endforeach
                            </ul>
                          </div>
                          @endif
                          @php $j++ @endphp
                        @endforeach
                      </div>
                    </div>
                  </li>
                  <li class="menu-item"><a href="{{ route('wishlist') }}">{{ __('Wishlist') }}</a></li>
                  <li class="menu-item"><a href="#">{{ __('About Us') }}</a></li>
                  <li class="menu-item"><a href="#">{{ __('Contact') }}</a></ul>
                  </li>
                </ul>
          </div>
          <div class="navigation__column right">
            <form class="ps-search--header" action="{{ route('products') }}" method="get">
              <input class="form-control" type="text" name="search" placeholder="Search Product…">
              <button><i class="ps-icon-search"></i></button>
            </form>
            
            <x-cart-menu />

            <div class="menu-toggle"><span></span></div>
          </div>
        </div>
      </nav>
    </header>
    <div class="header-services">
      <div class="ps-services owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="7000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="false" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Free delivery</strong>: Get free standard delivery on every order with The Dark Saber Store</p>
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Free delivery</strong>: Get free standard delivery on every order with The Dark Saber Store</p>
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Free delivery</strong>: Get free standard delivery on every order with The Dark Saber Store</p>
      </div>
    </div>
    <main class="ps-main">

      <x-alert/>

      {{ $slot }}

      <div class="ps-subscribe">
        <div class="ps-container">
          <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 ">
                  <h3><i class="fa fa-envelope"></i>{{ __('Sign up to Newsletter') }}</h3>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12 col-xs-12 ">
                  <form class="ps-subscribe__form" action="{{ route('subsmail.store') }}" method="post">
                    @csrf
                    <input class="form-control" type="email" name="email" type="text" placeholder="Email" required>
                    <button type="submit">{{ __('Sign up now') }}</button>
                  </form>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 ">
                  <p>...and receive  <span>$20</span>  coupon for first shopping.</p>
                </div>
          </div>
        </div>
      </div>
      <div class="ps-footer bg--cover" data-background="images/background/parallax.jpg">
        <div class="ps-footer__content">
          <div class="ps-container">
            <div class="row">
                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                    <aside class="ps-widget--footer ps-widget--info">
                      <header><a class="ps-logo" href="{{ route('home') }}"><img src="{{ asset('assets/front/images/logo.png') }}" alt="The Dark Saber"></a>
                        <h3 class="ps-widget__title">{{ __('Contact') }}</h3>
                      </header>
                      <footer>
                        <p><strong>{{ __('Abasan al-Kabira, Khan Yunis, GAZA STRIP') }}</strong></p>
                        <p>{{ __('Email') }}: <a href='mailto:saberaldda@gmial.com'>saberaldda@gmial.com</a></p>
                        <p>{{ __('Phone') }}: <a href='https://wa.me/+970592105521'>+970 592 105 521</a></p>
                      </footer>
                    </aside>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                    <aside class="ps-widget--footer ps-widget--info second">
                      <header>
                        <h3 class="ps-widget__title">{{ __('Our Links') }}</h3>
                      </header>
                      <footer>
                        <p><a href='#'><i class="fa fa-youtube-square fa-2x"> </i> {{ __('Youtube') }}</a></p>
                        <p><a href='#'><i class="fa fa-facebook-square fa-2x"> </i> {{ __('Facebook') }}</a></p>
                        <p><a href='#'><i class="fa fa-instagram fa-2x"> </i> {{ __('Instagram') }}</a></p>
                        <p><a href='#'><i class="fa fa-twitter-square fa-2x"> </i> {{ __('Twitter') }}</a></p>
                      </footer>
                    </aside>
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 ">
                    <aside class="ps-widget--footer ps-widget--link">
                      <header>
                        <h3 class="ps-widget__title">Find Our store</h3>
                      </header>
                      <footer>
                        <ul class="ps-list--link">
                          <li><a href="#">Coupon Code</a></li>
                          <li><a href="#">SignUp For Email</a></li>
                          <li><a href="#">Site Feedback</a></li>
                          <li><a href="#">Careers</a></li>
                        </ul>
                      </footer>
                    </aside>
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 ">
                    <aside class="ps-widget--footer ps-widget--link">
                      <header>
                        <h3 class="ps-widget__title">Get Help</h3>
                      </header>
                      <footer>
                        <ul class="ps-list--line">
                          <li><a href="#">Order Status</a></li>
                          <li><a href="#">Shipping and Delivery</a></li>
                          <li><a href="#">Returns</a></li>
                          <li><a href="#">Payment Options</a></li>
                          <li><a href="#">Contact Us</a></li>
                        </ul>
                      </footer>
                    </aside>
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 ">
                    <aside class="ps-widget--footer ps-widget--link">
                      <header>
                        <h3 class="ps-widget__title">{{ __('Categories') }}</h3>
                      </header>
                      <footer>
                        <ul class="ps-list--line">
                          @php $j=0 @endphp
                          @foreach ($categories->sortByDesc('products_count') as $category)
                            @if ($j<5)
                            <li><a href="#">{{ $category->name }}</a></li>
                            @endif
                            @php $j++ @endphp
                          @endforeach
                        </ul>
                      </footer>
                    </aside>
                  </div>
            </div>
          </div>
        </div>
        <div class="ps-footer__copyright">
          <div class="ps-container">
            <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                    <p>&copy; <a href="#">THEDARKSABER</a>, Inc. {{ __('All rights Resevered') }}. {{ __('Design by') }} <a href="https://wa.me/+970592105521"> {{ __('Saber Ahmad Al-Dada') }}</a></p>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                    <ul class="ps-social">
                      <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                      <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                      <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                  </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- JS Library-->
    <script type="text/javascript" src="{{ asset('assets/front/plugins/jquery/dist/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/front/plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/front/plugins/jquery-bar-rating/dist/jquery.barrating.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/front/plugins/owl-carousel/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/front/plugins/gmap3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/front/plugins/imagesloaded.pkgd.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/front/plugins/isotope.pkgd.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/front/plugins/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/front/plugins/jquery.matchHeight-min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/front/plugins/slick/slick/slick.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/front/plugins/elevatezoom/jquery.elevatezoom.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/front/plugins/Magnific-Popup/dist/jquery.magnific-popup.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/front/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAx39JFH5nhxze1ZydH-Kl8xXM3OK4fvcg&amp;region=GB"></script><script type="text/javascript" src="plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/front/plugins/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/front/plugins/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/front/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/front/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/front/plugins/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/front/plugins/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/front/plugins/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
    <!-- Custom scripts-->
    <script type="text/javascript" src="{{ asset('assets/front/js/main.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/cart.js') }}"></script>
  </body>
</html>