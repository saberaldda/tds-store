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
    <style> tr:nth-child(odd) {background: #CCC} </style>
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
                    <a href="#" class="nav-link">{{ __('Contact') }}</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                @yield('search')

                <!-- language switcher -->
                <x-lang-switcher/>

                {{-- <!-- Notifications Dropdown Menu -->
                <x-notifications-menu /> --}}

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
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
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset(Auth::user()->image_url) }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="{{ route('profile.show', Auth::id()) }}" class="d-block">{{ Auth::user()->name }}</a>
                        <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-primary mt-4 ml-4 font-weight-bold">{{ __('Logout') }}</button>
                        </form>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
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
                                <li class="nav-item">
                                    <a href="{{ route('users.index') }}" class="nav-link @if (URL::current() == route('users.index')) active @endif">
                                        <i class="nav-icon fas fa-users"></i>
                                        <p>
                                            {{ __('Users') }}
                                            <span class="right badge badge-danger">{{ __('New') }}</span>
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('categories.index') }}" class="nav-link @if (URL::current() == route('categories.index')) active @endif">
                                        <i class="nav-icon fas fa-folder"></i>
                                        <p>
                                            {{ __('Categories') }}
                                            <span class="right badge badge-danger">{{ __('New') }}</span>
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('products.index') }}" class="nav-link @if (URL::current() == route('products.index')) active @endif">
                                        <i class="nav-icon fas fa-shopping-cart"></i>
                                        <p>
                                            {{ __('Products') }}
                                            <span class="right badge badge-danger">{{ __('New') }}</span>
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('roles.index') }}" class="nav-link @if (URL::current() == route('roles.index')) active @endif">
                                        <i class="nav-icon fas fa-unlock-alt"></i>
                                        <p>
                                            {{ __('Roles') }}
                                            <span class="right badge badge-danger">{{ __('New') }}</span>
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('countries.index') }}" class="nav-link @if (URL::current() == route('countries.index')) active @endif">
                                        <i class="nav-icon fas fa-city"></i>
                                        <p>
                                            {{ __('Countries') }}
                                            <span class="right badge badge-danger">{{ __('New') }}</span>
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('ratings.index') }}" class="nav-link @if (URL::current() == route('ratings.index')) active @endif">
                                        <i class="fas fa-star-half-alt"></i>
                                        <p>
                                            {{ __('Ratings') }}
                                            <span class="right badge badge-danger">{{ __('New') }}</span>
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                    </ul>
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
                                                <h3>{{ App\Models\Product::get()->count() }}</h3>
                                
                                                <p>{{ __('Active Products Number') }}</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-shopping-bag"></i>
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
                                                <h3>{{ App\Models\Category::get()->count() }}</h3>
                                
                                                <p>{{ __('Active Categories Number') }}</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-tags"></i>
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
                {{ now(+3)->format('Y-m-d // H:i') }}
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2022 <a href="">TheDarkSaber</a>.</strong> All rights reserved.
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
</body>

</html>