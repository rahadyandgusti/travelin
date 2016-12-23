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
						<a href="{{url('wisata/'.$d->id)}}">
							<div class="card flat">
								<img src="{{asset('uploads/image/wisata/original/'.$d->image)}}" width="100%">
								<div class="card-block">
									<div class="information">
										<label class="title">{{$d->name}}</label>
										<label class="title">{{$d->cityName}}</label>
										{!!$d->description!!}
									</div>
								</div>
							</div>
						</div>
					@endforeach
				
		</div>
    </div>
@stop

@push('callHead')
@endpush

@push('callFoot')
@endpush