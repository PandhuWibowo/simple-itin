<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Atourin</title>

    <!-- Bootstrap core CSS -->
    <link href="{!! asset('asset_portal/vendor/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{!! asset('asset_portal/vendor/fontawesome-free/css/all.min.css') !!}" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="{!! asset('asset_portal/css/clean-blog.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/explo.style.css') !!}" rel="stylesheet">

    <style>
        .bottom-right{
            position: absolute;
            bottom: 45px;
            right: 45px;
        }


        .grid figure {
            position: relative;
            float: left;
            overflow: hidden;
            background: #3085a3;
            text-align: center;
            cursor: pointer;
        }

        .grid figure img {
            position: relative;
            display: block;
            min-height: 100%;
            max-width: 100%;
            opacity: 0.8;
            margin: 0;
        }

        .grid figure figcaption {
            padding: 2em;
            color: #fff;
            text-transform: uppercase;
            font-size: 1.25em;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
        }

        .grid figure figcaption::before,
        .grid figure figcaption::after {
            pointer-events: none;
        }

        .grid figure figcaption,
        .grid figure figcaption>a {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .grid figure figcaption>a {
            z-index: 1000;
            text-indent: 200%;
            white-space: nowrap;
            font-size: 0;
            opacity: 0;
        }

        .grid figure h2 {
            word-spacing: -0.15em;
            font-weight: 300;
        }

        .grid figure h2 span {
            font-weight: 800;
        }

        .grid figure h2,
        .grid figure p {
            margin: 0;
        }

        .grid figure p {
            letter-spacing: 1px;
            font-size: 68.5%;
        }



        figure.effect-ravi {
            background: #303fa9;
            margin: 0;
        }

        .grid [class^="col"] {
            padding: 2px;
        }

        figure.effect-ravi h2 {
            font-size: 158.75%;
        }

        figure.effect-ravi h2,
        figure.effect-ravi p {
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
            transition: opacity 0.35s, transform 0.35s;
            -webkit-transform: translate3d(-50%, -50%, 0);
            transform: translate3d(-50%, -50%, 0);
            -webkit-transform-origin: 50%;
            transform-origin: 50%;
        }

        figure.effect-ravi figcaption::before {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 120px;
            height: 120px;
            border: 2px solid #fff;
            content: '';
            opacity: 0;
            -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
            transition: opacity 0.35s, transform 0.35s;
            -webkit-transform: translate3d(-50%, -50%, 0) rotate3d(0, 0, 1, -45deg) scale3d(0, 0, 1);
            transform: translate3d(-50%, -50%, 0) rotate3d(0, 0, 1, -45deg) scale3d(0, 0, 1);
            -webkit-transform-origin: 50%;
            transform-origin: 50%;
        }

        figure.effect-ravi p {
            width: 100px;
            text-transform: none;
            font-size: 121%;
            line-height: 2;
        }

        figure.effect-ravi p a {
            color: #fff;
        }

        figure.effect-ravi p a:hover,
        figure.effect-ravi p a:focus {
            opacity: 0.6;
        }

        figure.effect-ravi p a i {
            opacity: 0;
            -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
            transition: opacity 0.35s, transform 0.35s;
        }

        figure.effect-ravi p a:first-child i {
            -webkit-transform: translate3d(-60px, -60px, 0);
            transform: translate3d(-60px, -60px, 0);
        }

        figure.effect-ravi p a:nth-child(2) i {
            -webkit-transform: translate3d(60px, -60px, 0);
            transform: translate3d(60px, -60px, 0);
        }

        figure.effect-ravi p a:nth-child(3) i {
            -webkit-transform: translate3d(-60px, 60px, 0);
            transform: translate3d(-60px, 60px, 0);
        }

        figure.effect-ravi p a:nth-child(4) i {
            -webkit-transform: translate3d(60px, 60px, 0);
            transform: translate3d(60px, 60px, 0);
        }

        figure.effect-ravi:hover figcaption::before {
            opacity: 1;
            -webkit-transform: translate3d(-50%, -50%, 0) rotate3d(0, 0, 1, -45deg) scale3d(1, 1, 1);
            transform: translate3d(-50%, -50%, 0) rotate3d(0, 0, 1, -45deg) scale3d(1, 1, 1);
        }

        figure.effect-ravi:hover h2 {
            opacity: 0;
            -webkit-transform: translate3d(-50%, -50%, 0) scale3d(0.8, 0.8, 1);
            transform: translate3d(-50%, -50%, 0) scale3d(0.8, 0.8, 1);
        }

        figure.effect-ravi:hover p i:empty {
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
            /* just because it's stronger than nth-child */
            opacity: 1;
        }
    </style>
</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="{{url("/")}}">Atourin</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                {{--                <li class="nav-item">--}}
                {{--                    <a class="nav-link" href="{{ url('/categories') }}">Tourist Attraction</a>--}}
                {{--                </li>--}}
                {{--                <li class="nav-item">--}}
                {{--                    <a class="nav-link" href="post.html">Sample Post</a>--}}
                {{--                </li>--}}
                {{--                <li class="nav-item">--}}
                {{--                    <a class="nav-link" href="contact.html">Contact</a>--}}
                {{--                </li>--}}
            </ul>
        </div>
    </div>
</nav>

<!-- Page Header -->
<header class="masthead" style="background-image: url('/image/wisata/<?php echo $objekWisata->image;?>')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>{{$objekWisata->nama_wisata}}</h1>
                    <span class="subheading">Atourin - Indonesia Trip Planner</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="grid">
        <div class="row">



        </div>
    </div>
</div>

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <ul class="list-inline text-center">
                    {{--                    <li class="list-inline-item">--}}
                    {{--                        <a href="#">--}}
                    {{--                            <span class="fa-stack fa-lg">--}}
                    {{--                              <i class="fas fa-circle fa-stack-2x"></i>--}}
                    {{--                              <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>--}}
                    {{--                            </span>--}}
                    {{--                        </a>--}}
                    {{--                    </li>--}}
                    {{--                    <li class="list-inline-item">--}}
                    {{--                        <a href="#">--}}
                    {{--                            <span class="fa-stack fa-lg">--}}
                    {{--                              <i class="fas fa-circle fa-stack-2x"></i>--}}
                    {{--                              <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>--}}
                    {{--                            </span>--}}
                    {{--                        </a>--}}
                    {{--                    </li>--}}
                    {{--                    <li class="list-inline-item">--}}
                    {{--                        <a href="#">--}}
                    {{--                            <span class="fa-stack fa-lg">--}}
                    {{--                              <i class="fas fa-circle fa-stack-2x"></i>--}}
                    {{--                              <i class="fab fa-github fa-stack-1x fa-inverse"></i>--}}
                    {{--                            </span>--}}
                    {{--                        </a>--}}
                    {{--                    </li>--}}
                </ul>
                <p class="copyright text-muted">Made by &hearts; 2019</p>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{!! asset('asset_portal/vendor/jquery/jquery.min.js') !!}"></script>
<script src="{!! asset('asset_portal/vendor/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>

<!-- Custom scripts for this template -->
<script src="{!! asset('asset_portal/js/clean-blog.min.js') !!}"></script>

</body>

</html>
