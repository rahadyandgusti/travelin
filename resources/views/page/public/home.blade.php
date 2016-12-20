@extends('layouts.app-public')

@section('content')
	<div class="margin-bottom" style="margin-left: -30px; margin-right: -30px">
        <div class="slider">
            <div id="slideshow" class="owl-carousel owl-theme">
                @foreach($slides as $slide)
                <div class="item">
                    <img class="lazyOwl" data-src="{{\GlobalHelper::getImage($slide->slide,'uploads/slide/city/')}}" alt="Lazy Owl Image">
                    <label class="title margin-left">{{$slide->name}}</label>
                </div>
                @endforeach
            </div>
        </div>
		<nav class="navbar">
            <div class="container container-fluid">
                <ul class="nav navbar-nav hidden-md-down">
                    <li class="nav-item">
                        <a href="#">coba 1</a>
                    </li>
                    <li class="nav-item">
                        <a href="#">coba 2</a>
                    </li>
                    <li class="nav-item">
                        <a href="#">coba 3</a>
                    </li>
                </ul>
            </div>
        </nav>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="card flat">
				<div class="card-block">
					coba
				</div>
			</div>
		</div>
    </div>
@endsection

@push('callHead')
    <!-- owl-carousel -->
    <link href="{!! asset('assets/dist/plugins/owl-carousel/owl.carousel.css') !!}" rel="stylesheet">
    <link href="{!! asset('assets/dist/plugins/owl-carousel/owl.theme.css') !!}" rel="stylesheet">
    <link href="{!! asset('assets/dist/plugins/owl-carousel/owl.transitions.css') !!}" rel="stylesheet">
    <style type="text/css">
    #slideshow .item img{
        display: block;
        width: 100%;
        height: auto;
    }
    #slider{
        width: 960px;
        min-height: 350px;
    }
    #slideshow .item .title{
        position: absolute;
        bottom:0px;
        font-weight: bolder;
        font-size: 36px;
        text-shadow: 0 0 3px rgba(0, 0, 0, 0.8);
        color:#fff;
    }
    </style>
@endpush

@push('callFoot')
    <!-- owl-carousel -->
    <script src="{!! asset('assets/dist/plugins/owl-carousel/owl.carousel.min.js') !!}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            var owl = $("#slideshow");
            owl.owlCarousel({
                navigationText : false,
                singleItem : true,
                transitionStyle : "fadeUp",
                autoPlay:true,
                lazyLoad : true,
            });
        })
    </script>
@endpush