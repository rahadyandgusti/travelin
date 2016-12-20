@extends('layouts.app-public')

@section('content')
	<div class="row margin-top">
		<div class="col-xs-12">
			<div class="card flat">
				<div class="card-block">
					<?php print_r($search);?>
				</div>
			</div>
		</div>
    </div>
@stop

@push('callHead')
@endpush

@push('callFoot')
@endpush