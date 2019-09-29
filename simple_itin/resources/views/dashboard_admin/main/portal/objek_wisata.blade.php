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

        .gallery-wrap .img-big-wrap img {
            height: 450px;
            width: auto;
            display: inline-block;
            cursor: zoom-in;
        }


        .gallery-wrap .img-small-wrap .item-gallery {
            width: 60px;
            height: 60px;
            border: 1px solid #ddd;
            margin: 7px 2px;
            display: inline-block;
            overflow: hidden;
        }

        .gallery-wrap .img-small-wrap {
            text-align: center;
        }
        .gallery-wrap .img-small-wrap img {
            max-width: 100%;
            max-height: 100%;
            object-fit: cover;
            border-radius: 4px;
            cursor: zoom-in;
        }

        .deskripsi{
            text-align: justify;
            text-justify: inter-word;
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
<div class="card">
    <div class="row">
        <aside class="col-sm-5 border-right">
            <article class="gallery-wrap">
                <div class="img-big-wrap">
                    <div> <a href="{{ asset('image/wisata/'. $objekWisata->image) }}"><img src="{{ asset('image/wisata/'. $objekWisata->image) }}" alt="{{$objekWisata->alt}}" class="img-fluid"></a></div>
                </div> <!-- slider-product.// -->
{{--                <div class="img-small-wrap">--}}
{{--                    <div class="item-gallery"> <img src="https://s9.postimg.org/tupxkvfj3/image.jpg"> </div>--}}
{{--                    <div class="item-gallery"> <img src="https://s9.postimg.org/tupxkvfj3/image.jpg"> </div>--}}
{{--                    <div class="item-gallery"> <img src="https://s9.postimg.org/tupxkvfj3/image.jpg"> </div>--}}
{{--                    <div class="item-gallery"> <img src="https://s9.postimg.org/tupxkvfj3/image.jpg"> </div>--}}
{{--                </div> <!-- slider-nav.// -->--}}
            </article> <!-- gallery-wrap .end// -->
        </aside>
        <aside class="col-sm-7">
            <article class="card-body p-5">
                <h3 class="title mb-3">{{$objekWisata->nama_wisata}}</h3>
                @foreach($objekWisata->getTag as $row)
                    <span class="badge badge-primary">{{$row->nama_tag}}</span>
                @endforeach
{{--                <p class="price-detail-wrap">--}}
{{--                    <span class="price h3 text-warning">--}}
{{--                        <span class="currency">US $</span><span class="num">1299</span>--}}
{{--                    </span>--}}
{{--                    <span>/per kg</span>--}}
{{--                </p> <!-- price-detail-wrap .// -->--}}
                <dl class="item-property">
                    <dt>Description</dt>
                    <dd class="deskripsi">{{$objekWisata->deskripsi}}</dd>
                </dl>
                <dl class="param param-feature">
                    <dt>Contact</dt>
                    <dd>{{$objekWisata->kontak}}</dd>
                </dl>  <!-- item-property-hor .// -->
                <dl class="param param-feature">
                    <dt>Address</dt>
                    <dd>
                        <button type="button" class="btn btn-info btn-md" id="lookModal" data-maps="{{$objekWisata->alamat}}" data-toggle="modal" data-target="#modalMaps">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            View
                        </button>
                        <!-- Modal -->
                        <div id="modalMaps" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Address</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="place"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </dd>
                </dl>  <!-- item-property-hor .// -->
                <dl class="param param-feature">
                    <dt>Office Hours</dt>
                    <dd>{{\Carbon\Carbon::parse($objekWisata->waktu_operasional)->format('H:i')}} {{$objekWisata->waktu_bagian}}</dd>
                </dl>  <!-- item-property-hor .// -->

                <dl class="param param-feature">
                    <dt>Website</dt>
                    <dd>
                        <a href="{{$objekWisata->website}}">
                            {{$objekWisata->alt}}
                        </a>
                    </dd>
                </dl>  <!-- item-property-hor .// -->

{{--                <hr>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-sm-5">--}}
{{--                        <dl class="param param-inline">--}}
{{--                            <dt>Quantity: </dt>--}}
{{--                            <dd>--}}
{{--                                <select class="form-control form-control-sm" style="width:70px;">--}}
{{--                                    <option> 1 </option>--}}
{{--                                    <option> 2 </option>--}}
{{--                                    <option> 3 </option>--}}
{{--                                </select>--}}
{{--                            </dd>--}}
{{--                        </dl>  <!-- item-property .// -->--}}
{{--                    </div> <!-- col.// -->--}}
{{--                    <div class="col-sm-7">--}}
{{--                        <dl class="param param-inline">--}}
{{--                            <dt>Size: </dt>--}}
{{--                            <dd>--}}
{{--                                <label class="form-check form-check-inline">--}}
{{--                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">--}}
{{--                                    <span class="form-check-label">SM</span>--}}
{{--                                </label>--}}
{{--                                <label class="form-check form-check-inline">--}}
{{--                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">--}}
{{--                                    <span class="form-check-label">MD</span>--}}
{{--                                </label>--}}
{{--                                <label class="form-check form-check-inline">--}}
{{--                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">--}}
{{--                                    <span class="form-check-label">XXL</span>--}}
{{--                                </label>--}}
{{--                            </dd>--}}
{{--                        </dl>  <!-- item-property .// -->--}}
{{--                    </div> <!-- col.// -->--}}
{{--                </div> <!-- row.// -->--}}
{{--                <hr>--}}
{{--                <a href="#" class="btn btn-lg btn-primary text-uppercase"> Buy now </a>--}}
{{--                <a href="#" class="btn btn-lg btn-outline-primary text-uppercase"> <i class="fas fa-shopping-cart"></i> Add to cart </a>--}}
            </article> <!-- card-body.// -->
        </aside> <!-- col.// -->
    </div> <!-- row.// -->
</div> <!-- card.// -->


</div>
<!--container.//-->

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
<script>
    $(document).ready( function(){
        $("#lookModal").on("click", function(){
            let maps = $(this).data("maps");
            // var addr = 'Any Street 670, Any City';

            var embed= "<iframe width='100%' height='350' frameborder='0' scrolling='no' marginheight='0' marginwidth='0' src='https://maps.google.com/maps?&amp;q="+encodeURIComponent( maps ) +"&amp;output=embed'></iframe>";
            $('.place').html(embed);

        });

    });
</script>
</body>

</html>
