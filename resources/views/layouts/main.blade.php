<?php
$action_msg = "message!!<br>\n";

$requesturi = $_SERVER['REQUEST_URI'];
$action_msg .= "REQUEST_URI = ".$requesturi."<br>\n";

$searchstr = "/quotations";
if(strpos($requesturi,$searchstr) !== false){
    $action_msg .= "A match was found.".$requesturi." in ".$searchstr."<br>\n";
    $html_menu = "layouts.quomenu";
} else {
    $action_msg .= "A match was not found.".$requesturi." in ".$searchstr."<br>\n";
    $html_menu = "layouts.sidemenu";
}
$action_msg = ""; //動作メッセージ利用時はコメントアウト


?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!--<script src="{{ asset('js/bootstrap.min.js') }}" defer></script>-->
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}" defer></script>
    <script src="{{ asset('js/gototop.js') }}" defer></script>
    <script src="{{ asset('js/offcanvas.js') }}" defer></script>
    <script src="{{ asset('js/btn01.js') }}"></script>
    <!--<script src="{{ asset('js/popper.min.js') }}" defer></script>-->
    <!-- Fonts -->
    <!--
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    -->
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/design02.css') }}" rel="stylesheet">
</head>
<body>
    <div id="" class="wrapper">
        <!-- header -->
        <header>
            <!-- header nav -->
            <nav class="navbar print-none">
                <div class="toplogoarea ">
                    <button type="button" class="menu_btn" type="button" data-toggle="offcanvas-left">
                        <span class="menu_btn_style" ><img class="" src="{{ asset('images/round-menu-w.svg') }}" alt=""></span>
                    </button>
                    <div class="logozone">
                        <a class="" href="{{ url('/') }}">
                            <!--<span><img class="logo_h" src="{{ asset('images/home-white.svg') }}"  alt="見積システム"></span>-->
                            <span>Simple Quotation System － 見積 －</span>
                        </a>
                    </div>
                </div>

                <div class="topinfoarea">

                    <ul class="header_login_info ">
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
                </div>

            </nav>
            <!-- /header nav -->
        </header>
        <!-- /header -->

		<!-- .container-fluid -->
		<div class="itembox">
            <div class="layout2">
                @include($html_menu)

                @yield('content')
                </div>

            </div>


            <div id="footer" class="print-none">
                <div class="foot_cnt">
                    <small>© 2022 M System</small>
                </div>
            </div><!-- end footer-->

		</div>
		<!-- /.container-fluid -->
        <!-- offcanvas- -->
        <div class="offcanvas-collapse offcanvas-collapse-from-right side-base">
            <aside>
            </aside>
        </div>
        <!-- /offcanvas- -->
    </div><!--end id="app" class="wrapper"-->
<?php echo $action_msg; ?>
</body>
</html>
