@extends('layouts.app-public')

@section('content')
	<div class="row margin-top">
		<div class="col-md-9">
			<h1 class="text-capitalize">
				{{$data->name}}
			</h1>
			<label class="small text-muted"> <span class="text-capitalize">{{ucfirst($data->cityName)}}</span>, <span class="text-capitalize">{{ucfirst($data->provinceName)}}</span> Updated At {{\GlobalHelper::getDate($data->date)}}</label>
			<img class="img-thumbnail flat" src="{{asset('uploads/image/wisata/original/'.$data->image)}}" width="100%">
			{!! ($data->description) !!}
		</div>
		<div class="col-md-3">
		
		</div>
    </div>
@stop

@push('callHead')
@endpush

@push('callFoot')
@endpush