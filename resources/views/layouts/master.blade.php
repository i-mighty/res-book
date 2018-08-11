<!DOCTYPE html>
<html class="full-height" lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{getenv('APP_NAME')}}</title>
        <meta name="description" content="Material design landing page template built by TemplateFlip.com"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
        <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
        <link href="{{asset('css/mdb.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/main.css')}}" rel="stylesheet">
        <link href="{{asset('css/date_time.css')}}" rel="stylesheet">
        @yield('moreStyles')
        <script type="text/javascript" src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    </head>
    <body id="top">
        <header>
            <!-- Navbar-->
            <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar" id="navbar">
                <div class="container"><a class="navbar-brand" href="#"><strong>{{getenv('APP_NAME')}}</strong></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item"><a class="nav-link active" id="uRes" href="{{url('/ures')}}">Your reservations</a></li>
                            <li class="nav-item"><a class="nav-link active" id="" href="{{url('/reservations')}}">View Tables</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Intro Section-->
            <section class="view hm-gradient"  id="intro">
                <div class="full-bg-img d-flex align-items-center">
                    <div class="container" style="padding-top: 100px;">
                        <div class="row no-gutters">
                            <div class="col-md-12 align-items-center col-lg-6 text-center text-md-left margins">
                                <div class="white-text" id="header" >
                                    @yield('header')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </header>
        <div id="content">
            @yield('content')
        </div>
        <footer class="page-footer indigo darken-2 center-on-small-only pt-0 mt-0">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-5 flex-center"><a class="px-3"><i class="fa fa-facebook fa-lg white-text"></i></a><a class="px-3"><i class="fa fa-twitter fa-lg white-text"></i></a><a class="px-3"><i class="fa fa-google-plus fa-lg white-text"></i></a><a class="px-3"><i class="fa fa-linkedin fa-lg white-text"></i></a></div>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container-fluid">
                    <p>&copy; <a href="/">Material Landing</a> - Design: <a href="https://templateflip.com/" target="_blank">TemplateFlip</a></p>
                </div>
            </div>
        </footer>
        <script src="{{asset('/js/manifest.js')}}"></script>
        <script src="{{asset('/js/vendor.js')}}"></script>
        <script src="{{asset('/js/app.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>
        @yield('moreScripts')
        <script>new WOW().init();</script>
    </body>
</html>