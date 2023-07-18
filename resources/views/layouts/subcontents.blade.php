<?php
if(empty(!BAR_TITLE)) {
 $bar = ' | '.BAR_TITLE;
}
else {
 $bar = '';
}
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}<?php echo $bar; ?></title>
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <!--<script src="{{ asset('js/bootstrap.min.js') }}" defer></script>-->
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}" defer></script>
    <script src="{{ asset('js/gototop.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/site.css') }}" rel="stylesheet">
</head>
<body>
    <div id="" class="wrapper">
        <!-- header -->
        <header>
            <!-- header nav -->
            <nav class="navbar">
                <div class="toplogoarea">
                    <div id="logo">
                        <a class="" href="{{ url('/') }}">
                            <!--<span><img class="logo_h" src="{{ asset('images/home-white.svg') }}"  alt="見積システム"></span>-->
                            <span>スムーズシステム － 見積 －</span>
                        </a>
                    </div>
                </div>

                <ul class="header_login_info">
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
                            <li>{{ Auth::user()->name }}</li>
                            <li>
                                <div>
                                    <a href="{{ route('logout') }}"
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
                    </ul>

            </nav>
            <!-- /header nav -->


        </header>
        <!-- /header -->

		<!-- .container-fluid -->
		<div class="itembox">
                @yield('content')
                    <!-- .panel -->
                    <div id="footer">
                        <div class="foot_cnt">
                            <small>© 2022 M System</small>
                        </div>
                    </div>
                    <!-- /.panel -->
                </div>
		</div>
		<!-- /.container-fluid -->
    </div><!--end id="app" class="wrapper"-->
</body>
</html>
