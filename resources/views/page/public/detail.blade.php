@extends('layouts.app-public')

@section('content')
	<div class="row margin-top">
		<div class="col-xs-12">
			<h4>
			{{$data->name}}
			</h4>
			<label class="title">{{$data->cityName}}</label>
			<img src="{{asset('uploads/image/wisata/original/'.$data->image)}}" width="100%">
			{!!$data->description!!}
		</div>
    </div>
@stop

@push('callHead')
@endpush

@push('callFoot')
@endpush