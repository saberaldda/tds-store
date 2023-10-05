<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="{{ App::currentLocale() }}" dir="{{ App::currentLocale() == 'ar'? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ @$title ? __(@$title) : __("Dashboard") }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="icon" href="{{ asset('assets/admin/img/tds.png') }}">
    <!-- Theme style -->
    @if (App::currentLocale() == 'ar')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/adminlte.rtl.min.css') }}">
    @else
    <link rel="stylesheet" href="{{ asset('assets/admin/css/adminlte.min.css') }}">
    @endif
    <!-- Table zepra coloring -->
    <style> tr:nth-child(odd) {background: #dddddd} </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('dashboard') }}" class="nav-link">{{ __('Home') }}</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('contact.index') }}" class="nav-link">{{ __('Contact') }}</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                @yield('search')

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}"  role="button">
                        {{ config('app.name'); }} <i class="fas fa-globe"></i>
                    </a>
                </li>

                <!-- language switcher -->
                <x-lang-switcher/>

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-dollar-sign"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <form action="{{ route('currency.store') }}" method="post" id="currencyUSD">
                            @csrf
                            <a class="dropdown-item" href="" onclick="event.preventDefault(); document.getElementById('currencyUSD').submit();">
                                <input type="hidden" name="currency_code" value="USD" @selected('USD' == session('currency_code'))>
                                $ {{ __('USD') }}
                            </a>
                        </form>
                        <form action="{{ route('currency.store') }}" method="post" id="currencyILS">
                            @csrf
                            <a class="dropdown-item" href="" onclick="event.preventDefault(); document.getElementById('currencyILS').submit();">
                                <input type="hidden" name="currency_code" value="ILS" @selected('ILS' == session('currency_code'))>
                                ₪ {{ __('ILS') }}
                            </a>
                        </form>
                        <form action="{{ route('currency.store') }}" method="post" id="currencyJOD">
                            @csrf
                            <a class="dropdown-item" href="" onclick="event.preventDefault(); document.getElementById('currencyJOD').submit();">
                                <input type="hidden" name="currency_code" value="JOD" @selected('JOD' == session('currency_code'))>
                                د.أ {{ __('JOD') }}
                            </a>
                        </form>
                        <form action="{{ route('currency.store') }}" method="post" id="currencySAR">
                            @csrf
                            <a class="dropdown-item" href="" onclick="event.preventDefault(); document.getElementById('currencySAR').submit();">
                                <input type="hidden" name="currency_code" value="SAR" @selected('SAR' == session('currency_code'))>
                                ر.س {{ __('SAR') }}
                            </a>
                        </form>
                    </div>
                </li>

                <!-- Notifications Dropdown Menu -->
                <x-notifications-menu />

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <img src="{{ asset(Auth::user()->image_url) }}" width="35" class="img-circle elevation-2" alt="User Image">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        <img src="{{ asset(Auth::user()->image_url) }}" width="35" alt class="rounded-circle" />
                                    </div>
                                </div>
                                <div class="ml-4 flex-grow-1">
                                    <span class="fw-semibold d-block">{{ Auth::user()->name }}</span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">
                                <i class="fas fa-power-off"></i>
                                <span class="align-middle ml-2">{{ __('Log Out') }}</span>
                            </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('dashboard') }}" class="brand-link">
                <img src="{{ asset('assets/admin/img/tds.png') }}" alt="TheDarkSaber Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    @if ('user' !== Auth::user()->type)
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                                with font-awesome or any other icon font library -->
                            <li class="nav-item menu-open">
                                <a href="{{ route('dashboard') }}" class="nav-link @if (URL::current() == route('dashboard')) active @endif">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        {{ __('Dashboard') }}
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('viewAny', App\Models\User::class)
                                    <li class="nav-item">
                                        <a href="{{ route('users.index') }}" class="nav-link @if (URL::current() == route('users.index')) active @endif">
                                            <i class="nav-icon fas fa-users"></i>
                                            <p>
                                                {{ __('Users') }}
                                            </p>
                                        </a>
                                    </li>
                                    @endcan
                                    @can('viewAny', App\Models\Category::class)
                                    <li class="nav-item">
                                        <a href="{{ route('categories.index') }}" class="nav-link @if (URL::current() == route('categories.index')) active @endif">
                                            <i class="nav-icon fas fa-folder"></i>
                                            <p>
                                                {{ __('Categories') }}
                                            </p>
                                        </a>
                                    </li>
                                    @endcan
                                    @can('viewAny', App\Models\Product::class)
                                    <li class="nav-item">
                                        <a href="{{ route('products.index') }}" class="nav-link @if (URL::current() == route('products.index')) active @endif">
                                            <i class="nav-icon fas fa-shopping-cart"></i>
                                            <p>
                                                {{ __('Products') }}
                                            </p>
                                        </a>
                                    </li>
                                    @endcan
                                    @can('viewAny', App\Models\Role::class)
                                    <li class="nav-item">
                                        <a href="{{ route('roles.index') }}" class="nav-link @if (URL::current() == route('roles.index')) active @endif">
                                            <i class="nav-icon fas fa-unlock-alt"></i>
                                            <p>
                                                {{ __('Roles') }}
                                            </p>
                                        </a>
                                    </li>
                                    @endcan
                                    @can('viewAny', App\Models\Country::class)
                                    <li class="nav-item">
                                        <a href="{{ route('countries.index') }}" class="nav-link @if (URL::current() == route('countries.index')) active @endif">
                                            <i class="nav-icon fas fa-city"></i>
                                            <p>
                                                {{ __('Countries') }}
                                            </p>
                                        </a>
                                    </li>
                                    @endcan
                                    <li class="nav-item">
                                        <a href="{{ route('ratings.index') }}" class="nav-link @if (URL::current() == route('ratings.index')) active @endif">
                                            <i class="fas fa-star-half-alt"></i>
                                            <p>
                                                {{ __('Ratings') }}
                                            </p>
                                        </a>
                                    </li>
                                    @can('viewAny', App\Models\Order::class)
                                    <li class="nav-item">
                                        <a href="{{ route('orders.index') }}" class="nav-link @if (URL::current() == route('orders.index')) active @endif">
                                            <i class="fas fa-truck"></i>
                                            <p>
                                                {{ __('Orders') }}
                                            </p>
                                        </a>
                                    </li>
                                    @endcan
                                    <li class="nav-item">
                                        <a href="{{ route('notifications') }}" class="nav-link @if (URL::current() == route('notifications')) active @endif">
                                            <i class="fas fa-bell"></i>
                                            <p>
                                                {{ __('Notifications') }}
                                            </p>
                                        </a>
                                    </li>
                                    @if ('super-admin' == Auth::user()->type)
                                    <li class="nav-item">
                                        <a href="{{ route('log-viewer::dashboard') }}" class="nav-link @if (URL::current() == route('log-viewer::dashboard')) active @endif">
                                            <i class="fas fa-archive"></i>
                                            <p>
                                                {{ __('Logs') }}
                                            </p>
                                        </a>
                                    </li>
                                    @endif
                                </ul>
                            </li>
                        </ul>
                    @endif
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <div class="ml-5 font-weight-bold">
                            @yield('title')
                            </div>
                        </div><!-- /.col -->
                        <div class="col-sm-6">

                            @yield('breadcrumb')

                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <x-alert />
                            @yield('content')
                            @if (URL::current() == route('dashboard'))
                                <div class="d-flex">
                                    <div class="col-lg-3 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-info">
                                            <div class="inner">
                                                {{-- Count The Number Of Current Guests In Last 60m --}}
                                                <h3>{{ App\Models\Active::users(60)->get()->count() +
                                                        App\Models\Active::guests(60)->get()->count() }}</h3>
                                
                                                <p>{{ __('Live Guests') }}</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-users"></i>
                                            </div>
                                            @isset($link)
                                                <a href="{{ $link }}" class="small-box-footer">{{ __('More info') }}<i class="fas fa-arrow-circle-right"></i></a>
                                            @endisset
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-success">
                                            <div class="inner">
                                                {{-- Count The Number Of Current Auth Users In Last 60m --}}
                                                <h3>{{ App\Models\Active::users(60)->get()->count() }}</h3>
                                
                                                <p>{{ __('Current Registered Users') }}</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-user-plus"></i>
                                            </div>
                                            @isset($link)
                                                <a href="{{ $link }}" class="small-box-footer">{{ __('More info') }} <i class="fas fa-arrow-circle-right"></i></a>
                                            @endisset
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-warning">
                                            <div class="inner">
                                                <h3>{{ App\Models\Product::active()->get()->count() }}</h3>
                                
                                                <p>{{ __('Active Products Number') }}</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-tags"></i>
                                            </div>
                                            @isset($link)
                                                <a href="{{ $link }}" class="small-box-footer">{{ __('More info') }} <i class="fas fa-arrow-circle-right"></i></a>
                                            @endisset
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-danger">
                                            <div class="inner">
                                                <h3>{{ App\Models\Order::where('created_at', '>=', \Carbon\Carbon::now()->subDay())->get()->count() }}</h3>
                                
                                                <p>{{ __('New Orders Last 24 Hours') }}</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-shopping-bag"></i>
                                            </div>
                                            @isset($link)
                                                <a href="{{ $link }}" class="small-box-footer">{{ __('More info') }} <i class="fas fa-arrow-circle-right"></i></a>
                                            @endisset
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline text-primary">
                    <h6 id='ct7' style="font-weight: bold"></h6>
            </div>
            <!-- Default to the left -->
            <div style="text-align: center">
                <strong>Copyright &copy; {{ date('Y') }} <a href="">TheDarkSaber</a>.</strong> All rights reserved.
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('assets/admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/admin/js/adminlte.min.js') }}"></script>

    <script>
        const userId = "{{ Auth::id() }}"
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/firebase.js') }}"></script>
    <!-- Time Format And View -->
    <script>function display_ct7() {
        var x = new Date()
        var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';
        hours = x.getHours( ) % 12;
        hours = hours ? hours : 12;
        hours=hours.toString().length==1? 0+hours.toString() : hours;
        
        var minutes=x.getMinutes().toString()
        minutes=minutes.length==1 ? 0+minutes : minutes;
        
        var seconds=x.getSeconds().toString()
        seconds=seconds.length==1 ? 0+seconds : seconds;
        
        var month=(x.getMonth() +1).toString();
        month=month.length==1 ? 0+month : month;
        
        var dt=x.getDate().toString();
        dt=dt.length==1 ? 0+dt : dt;
        
        var x1=dt + "/" + month + "/" + x.getFullYear(); 
        x1 = x1 + " - " +  hours + ":" +  minutes + ":" +  seconds + " " + ampm;
        document.getElementById('ct7').innerHTML = x1;
        display_c7();
        }
        function display_c7(){
        var refresh=1000; // Refresh rate in milli seconds
        mytime=setTimeout('display_ct7()',refresh)
        }
        display_c7()
    </script>
</body>

</html>
