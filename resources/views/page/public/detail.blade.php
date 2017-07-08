@extends('layouts.app-public')

@section('content')
	<div class="row margin-top">
		<div class="col-md-9">
			<h1 class="text-capitalize">
				{{$data->name}}
			</h1>
			<label class="small text-muted"> <span class="text-capitalize">{{ucfirst($data->cityName)}}</span>, <span class="text-capitalize">{{ucfirst($data->provinceName)}}</span> Updated At {{\GlobalHelper::getDate($data->date)}}</label>
			<div class="row no-margin">
				<img class="img-thumbnail flat margin-right " src="{{asset('uploads/image/wisata/big/'.$data->image)}}" style="max-width:100%; float: left;">
				{!! ($data->description) !!}
			</div>
		</div>
		<div class="col-md-3">
		
		</div>
    </div>
@stop

@push('callHead')
@endpush

@push('callFoot')
@endpush