@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-xs-12">
			<div class="card">
				<div class="card-block">
					@if(isset($urlNew))
	                    @include('page.defaultForm.buttonNew')
	                @endif
					
					{!! $dataTable->table(['class' => 'table table-bordered table-hover']) !!}		
				</div>
			</div>
		</div>
    </div>
@endsection

@push('callHead')
<link href="{!! url('assets/dist/plugins/sweet-alert/sweet-alert.css') !!} "rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="{{url('js/form.js')}}"></script>
@endpush

@push('callFoot')
<script src="{!! url('assets/dist/plugins/sweet-alert/sweet-alert.js') !!} " type="text/javascript"></script>
{!! $dataTable->scripts() !!}
@endpush