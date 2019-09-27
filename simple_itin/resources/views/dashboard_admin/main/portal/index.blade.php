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
<header class="masthead" style="background-image: url('asset_portal/img/back.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Atourin</h1>
                    <span class="subheading">Indonesia Trip Planner</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        @if(count($kota) > 0)
            @foreach($kota as $row)
                <div class="col-sm-4 py-2">
                    <div class="card text-white bg-primary shadow-lg">
                        <div class="card-body">
                            <h3 class="card-title">{{$row->nama_kota}}</h3>
                            {{--                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>--}}
                            <a href="{{ url("categories/place/@".$row->nama_kota) }}" class="btn btn-outline-light">Check it out</a>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="col-sm-4">
                {{--                <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>--}}
                {{$kota->links()}}
            </div>

        @else
            <div class="col-sm-12 py-2">
                <div class="card text-white bg-primary">
                    <div class="card-body text-center">
                        There is no categories
                    </div>
                </div>
            </div>
        @endif
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
