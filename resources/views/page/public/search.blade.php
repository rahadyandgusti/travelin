@extends('layouts.app-public')

@section('content')
	<div class="row margin-top">
		<div class="col-xs-12">
			<h4>
			@if(count($data)) 
				Yeeay!!! we found it... 
			@else 
				I'm Sorry, We dont found it. Perhaps, Would you like to <a href="#">help</a> us? 
			@endif
			</h4>
			@foreach($data as $d)
				<div class="col-md-4">
				<a href="{{url('wisata/'.$d->id)}}" class="search-link">
					<div class="card flat">
						<img class="img-thumbnail flat" src="{{asset('uploads/image/wisata/big/'.$d->image)}}" width="100%">
						<div class="card-block">
							<div class="information">
								<label class="title">{{ucfirst($d->name)}}</label>
								<label class="small text-muted">{{ucfirst($d->cityName)}}, {{ucfirst($d->provinceName)}}</label>
								{!!str_limit($d->description)!!}
							</div>
						</div>
					</div>
				</div>
			@endforeach
				
		</div>
    </div>
@stop

@push('callHead')
<style type="text/css">
	.search-link{
		text-decoration: none;
	}
	.search-link:hover{
		text-decoration: none;
	}
	.information{
		color: #263238;
	}
	.information .title{
		font-weight: bold;
		font-size: 18px;
	}
</style>
@endpush

@push('callFoot')
@endpush