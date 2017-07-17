@extends('layouts-new.app')

@section('content')
<div class="slider">
    <div id="slideshow" class="owl-carousel owl-theme">
        {{--
        @foreach($slides as $slide)
        <div class="item">
            <img class="lazyOwl" src="{{\GlobalHelper::getImage($slide->slide,'uploads/slide/city/')}}" alt="Lazy Owl Image" height1="100%">
        </div>
        @endforeach
        --}}
    </div>
</div>

<div class="main main-raised">
	<div class="section section-basic">
    	<div class="container">
    		<div id="city">
	            <div class="title no-margin">
	                <h2 class="text-center">Favorite City</h2>
	            </div>
	                <p class="text-center">ini hanya percobaan</p>

	            <div class="row container" id="fav-city">
                    {{--
		            @if(count($slides))
		            @foreach($slides as $view)
		            <div class="col-sm-6 col-sm-12 bg-green item" style="">
		                <a href="{{url('wisata/'.$view->id)}}">
			            	<div class="row no-margin" style="height: 197px;overflow:hidden">
			                	<img class=" img-responsive img-raised col-xs-12 no-padding" src="{{\GlobalHelper::getImage($view->slide,'uploads/slide/city/')}}">
			                </div>
			                <div class="row no-margin">
			                    <label class="title margin-left padding">
			                        <span class="title-info">{{ucfirst($view->name)}}</span>
			                    </label>
			                </div>

		                </a>
		            </div>
		            @endforeach
		            @endif
                    --}}
                </div>
            </div>

    		<div id="most-viewed">
	            <div class="title">
	                <h2>Most Viewed</h2>
	            </div>
	            
	            <div class="row" id="view-destination">
                    {{--
		            @if(count($viewed))
		            @foreach($viewed as $view)
		            <div class="col-lg-4 col-md-6 col-sm-6 col-sm-12 bg-green item" style="">
		                <a href="{{url('wisata/'.$view->id)}}">
			            	<div class="row no-margin">
			                	<img class=" img-responsive img-raised col-xs-12 no-padding" src="{{\GlobalHelper::getImage($view->image,'uploads/image/wisata/big/')}}">
			                </div>
			                <div class="row no-margin">
			                    <label class="title margin-left padding">
			                        <span class="title-info">{{ucfirst($view->name)}}</span>
			                    </label>
			                </div>

		                </a>
		            </div>
		            @endforeach
		            @endif
                    --}}
                </div>
            </div>

    		<div id="most-rated">
	            <div class="title">
	                <h2>Most Rated</h2>
	            </div>
	            
	            <div class="row" id="rate-destination">
                    {{--
		            @if(count($rated))
		            @foreach($rated as $rate)
		            <div class="col-lg-4 col-md-6 col-sm-6 col-sm-12 bg-green item" style="">
		                <a href="{{url('wisata/'.$rate->id)}}">
			            	<div class="row no-margin">
			                	<img class="img-responsive img-raised col-xs-12 no-padding" src="{{\GlobalHelper::getImage($rate->image,'uploads/image/wisata/big/')}}">
			                </div>
			                <div class="row no-margin">
			                    <label class="title margin-left padding">
			                        <span class="title-info">{{ucfirst($rate->name)}}</span>
			                    </label>
			                </div>
		                </a>
		            </div>
		            @endforeach
		            @endif
                    --}}
                </div>
            </div>

    	</div>
    </div>
</div>
@endsection


@push('callHead')
    <link href="{!! asset('assets/dist/plugins/animate/animate.min.css') !!}" rel="stylesheet">
    <!-- owl-carousel -->
    <link href="{!! asset('assets/dist/plugins/owl-carousel/assets/owl.carousel.css') !!}" rel="stylesheet">
    <link href="{!! asset('assets/dist/plugins/owl-carousel/assets/owl.theme.default.css') !!}" rel="stylesheet">
    <link href="{!! asset('assets/dist/plugins/animate/animate.min.css') !!}">
    <style type="text/css">
    .item{
        margin-bottom: 30px;
    }
    /*.item img{
        display: block;
        width: auto;
        height: auto;
        min-height: 100px;
    }*/
    #slider{
        width: 960px;
        min-height: 350px;
    }
    .item .title{
        position: absolute;
        bottom:20px;
        left:20px;
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
    .navbar li img{
        margin-top: -8px;
        margin-bottom: -7px;
    }
    .brand img {
        margin-top: 5px;
    }
    .brand {
        width: auto !important;
    }
    .navbar-form{
        margin-top: 10px !important;
    }
    </style>
@endpush

@push('callFoot')
    <!-- owl-carousel -->
    <script src="{!! asset('assets/dist/plugins/owl-carousel/owl.carousel.min.js') !!}"></script>
    <script type="text/javascript">
        function sendAjax(url, type, to, callback){
            $.get(url,function(data){
                $.each(data, function(i,v){
                    var tmpData = templateData(v,type);
                    $('#'+to).append(tmpData);
                });
                if(type == 'slide'){
                    var owl = $("#slideshow");
                    owl.owlCarousel({
                        // navigationText : false,
                        // singleItem : true,
                        items:1,
                        // transitionStyle : "fadeUp",
                        // animateIn: 'fadeInRight',
                        // animateOut: 'flipOut',
                        autoplay:true,
                        autoplayTimeout: 5000,
                        autoplayHoverPause: false,
                        loop:true,
                        // lazyLoad : true,
                        nav:false,
                        dots:false
                    });
                }
            })
        }

        function templateData(data,type){
            var tmpText = '';
            if(type == 'slide'){
                tmpText = ''+
                    '<div class="item">'+
                        '<img class="lazyOwl" src="{{asset("uploads/slide/city")}}/'+data.slide+'" alt="'+data.name+'" height1="100%">'+
                    '</div>';
            } else if(type == 'destination'){
                tmpText = ''+
                    '<div class="col-lg-4 col-md-6 col-sm-6 col-sm-12 bg-green item" style="">'+
                        '<a href="{{url("wisata")}}/'+data.id+'">'+
                            '<div class="row no-margin">'+
                                '<img class="img-responsive img-raised col-xs-12 no-padding" src="{{url("uploads/image/wisata/big")}}/'+data.image+'">'+
                            '</div>'+
                            '<div class="row no-margin">'+
                                '<label class="title margin-left padding">'+
                                    '<span class="title-info">'+data.name+'</span>'+
                                '</label>'+
                            '</div>'+
                        '</a>'+
                    '</div>';
            } else {
                tmpText = ''+
                    '<div class="col-sm-6 col-sm-12 bg-green item" style="">'+
                        '<a href="{{url("wisata")}}/'+data.id+'">'+
                            '<div class="row no-margin" style="height: 197px;overflow:hidden">'+
                                '<img class=" img-responsive img-raised col-xs-12 no-padding" src="{{asset("uploads/slide/city")}}/'+data.slide+'">'+
                            '</div>'+
                            '<div class="row no-margin">'+
                                '<label class="title margin-left padding">'+
                                    '<span class="title-info">'+data.name+'</span>'+
                                '</label>'+
                            '</div>'+
                        '</a>'+
                    '</div>';
            }

            return tmpText;
        }

        function initData(){
            var url = "{{url('api/home')}}";
            sendAjax(url+'/slide-list', 'slide', 'slideshow');
            sendAjax(url+'/city-list', 'city', 'fav-city');
            sendAjax(url+'/viewed-list', 'destination', 'view-destination');
            sendAjax(url+'/rated-list', 'destination', 'rate-destination');
        }

        $(document).ready(function(){
       //      var owl = $("#slideshow");
       //      owl.owlCarousel({
       //          // navigationText : false,
       //          // singleItem : true,
       //          items:1,
       //          // transitionStyle : "fadeUp",
       //          animateIn: 'fadeInRight',
    			// animateOut: 'flipOut',
       //          autoplay:true,
       //          autoplayTimeout: 5000,
       //          autoplayHoverPause: false,
       //          loop:true,
       //          // lazyLoad : true,
       //          nav:false,
       //          dots:false
       //      });

            initData();
        })
    </script>
@endpush