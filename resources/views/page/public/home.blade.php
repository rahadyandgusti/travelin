@extends('layouts.app-public')

@section('content')
	<div class="margin-bottom" style="margin-left: -30px; margin-right: -30px">
        <div class="slider">
            <div id="slideshow" class="owl-carousel owl-theme">
                @foreach($slides as $slide)
                <div class="item">
                    <img class="lazyOwl" data-src="{{\GlobalHelper::getImage($slide->slide,'uploads/slide/city/')}}" alt="Lazy Owl Image">
                    <a href="{{url('search?city='.$slide->id)}}">
                        <label class="title margin-left padding">
                            <span class="title-info">{{ucfirst($slide->name)}}</span>
                        </label>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
		<!-- <nav class="navbar">
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
        </nav> -->
	</div>
    <section class="information row ">
        <div class="col-md-4">
            <div class="card ">
                <div class="card-block">
                    <div class="col-md-12 information-icon">
                        <i class="icons icon-direction"></i>
                    </div>
                    <p class="information-label no-margin">
                        pick city
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card ">
                <div class="card-block">
                    <div class="col-md-12 information-icon">
                        <i class="icons icon-speech"></i>
                    </div>
                    <p class="information-label no-margin">
                        type your search 
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card ">
                <div class="card-block">
                    <div class="col-md-12 information-icon">
                        <i class="icons icon-magnifier"></i>
                    </div>
                    <p class="information-label no-margin">
                        search
                    </p>
                </div>
            </div>
        </div>
    </section>
    <h3 class="row card card-inverse card-danger padding flat col-lg-4 margin-top">Top Viewed</h3>
	<div class="row">
		<div class="col-xs-12">
			<div class="flat row no-margin">
                @if(isset($viewed[0]))
                <div class="col-md-6 bg-green no-padding item" style="">
                    <img class="img-thumbnail flat" src="{{\GlobalHelper::getImage($viewed[0]->image,'uploads/image/wisata/big/')}}">
                    <a href="{{url('wisata/'.$viewed[0]->id)}}">
                        <label class="title margin-left padding">
                            <span class="title-info">{{ucfirst($viewed[0]->name)}}</span>
                        </label>
                    </a>
                </div>
                @endif
                @if(isset($viewed[1]))
                <div class="col-md-3 bg-red no-padding item item-small" style="">
                    <img class="img-thumbnail flat" src="{{\GlobalHelper::getImage($viewed[1]->image,'uploads/image/wisata/big/')}}">
                    <a href="{{url('wisata/'.$viewed[1]->id)}}">
                        <label class="title margin-left padding">
                            <span class="title-info">{{ucfirst($viewed[1]->name)}}</span>
                        </label>
                    </a>
                </div>
                @endif
                @if(isset($viewed[2]))
                <div class="col-md-3 bg-yellow no-padding item item-small" style="">
                    <img class="img-thumbnail flat" src="{{\GlobalHelper::getImage($viewed[2]->image,'uploads/image/wisata/big/')}}">
                    <a href="{{url('wisata/'.$viewed[2]->id)}}">
                        <label class="title margin-left padding">
                            <span class="title-info">{{ucfirst($viewed[2]->name)}}</span>
                        </label>
                    </a>
                </div>
                @endif
                @if(isset($viewed[3]))
                <div class="col-md-6 bg-brown no-padding item item-small" style="">
                    <img class="img-thumbnail flat" src="{{\GlobalHelper::getImage($viewed[3]->image,'uploads/image/wisata/big/')}}">
                    <a href="{{url('wisata/'.$viewed[3]->id)}}">
                        <label class="title margin-left padding">
                            <span class="title-info">{{ucfirst($viewed[3]->name)}}</span>
                        </label>
                    </a>
                </div>
                @endif
			</div>
		</div>
    </div>
    <h3 class="row card card-inverse card-danger padding flat col-lg-4 margin-top">Top Rated</h3>
    <div class="row">
        <div class="col-xs-12">
            <div class="margin-bottom flat">
                <div class="row no-margin">
                    <section class="col-md-6 no-padding">
                        @if(isset($rated[3]))
                        <div class="col-md-12 bg-green no-padding item item-small" style="">
                            <img class="img-thumbnail flat" src="{{\GlobalHelper::getImage($rated[3]->image,'uploads/image/wisata/big/')}}">
                            <a href="{{url('wisata/'.$rated[3]->id)}}">
                                <label class="title margin-left padding">
                                    <span class="title-info">{{ucfirst($rated[3]->name)}}</span>
                                </label>
                            </a>
                        </div>
                        @endif
                        @if(isset($rated[2]))
                        <div class="col-md-6 bg-green no-padding item item-small" style="">
                            <img class="img-thumbnail flat" src="{{\GlobalHelper::getImage($rated[2]->image,'uploads/image/wisata/big/')}}">
                            <a href="{{url('wisata/'.$rated[2]->id)}}">
                                <label class="title margin-left padding">
                                    <span class="title-info">{{ucfirst($rated[2]->name)}}</span>
                                </label>
                            </a>
                        </div>
                        @endif      
                        @if(isset($rated[1]))
                        <div class="col-md-6 bg-green no-padding item item-small" style="">
                            <img class="img-thumbnail flat" src="{{\GlobalHelper::getImage($rated[1]->image,'uploads/image/wisata/big/')}}">
                            <a href="{{url('wisata/'.$rated[1]->id)}}">
                                <label class="title margin-left padding">
                                    <span class="title-info">{{ucfirst($rated[1]->name)}}</span>
                                </label>
                            </a>
                        </div>
                        @endif      
                    </section>
                    <section class="col-md-6 no-padding">
                        @if(isset($rated[0]))
                        <div class="col-md-12 bg-green no-padding item" style="">
                            <img class="img-thumbnail flat" src="{{\GlobalHelper::getImage($rated[0]->image,'uploads/image/wisata/big/')}}">
                            <a href="{{url('wisata/'.$rated[0]->id)}}">
                                <label class="title margin-left padding">
                                    <span class="title-info">{{ucfirst($rated[0]->name)}}</span>
                                </label>
                            </a>
                        </div>
                        @endif
                    </section>
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
    .item img{
        display: block;
        width: 100%;
        height: auto;
    }
    #slider{
        width: 960px;
        min-height: 350px;
    }
    .item .title{
        position: absolute;
        bottom:0px;
        font-weight: bolder;
        font-size: 36px;
        text-shadow: 0 0 3px rgba(0, 0, 0, 0.8);
        color:#fff;
        cursor: pointer;
        /*background-color: rgba(0, 0, 0, 0.8);*/
    }
    .item.item-small .title{font-size: 20px;}
    .information-icon .icons{
        font-size: 36px;
    }
    .information-icon, .information-label{
        text-align: center;
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