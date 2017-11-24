@extends('admin.layouts.app')

@section('style')
  {{--<link rel="stylesheet" href="{{url('/')}}/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="{!! asset('plugins/sweet-alert/sweet-alert.css') !!}"/>--}}
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                  <div class="pull-right">
                    <a href="{{route($url .'.index')}}" class="btn btn-default"> 
                      <i class="fa fa-arrow-left"></i> Back 
                    </a>
                  </div>
                  <h3>{!! (is_numeric(\Request::segment(2))? 'Edit ': 'Create ').$title !!}</h3>
                  <hr/>
                    {{-- Form --}}
                    {!! form_start($form) !!}
                    {!! form_rest($form) !!}

                    @include('admin.partials.formButton')
                    {!! form_end($form) !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
  {{--<script src="{{url('/')}}/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="{{url('/')}}/plugins/datatables/dataTables.bootstrap.min.js"></script>
  <script src="{!! asset('plugins/sweet-alert/sweet-alert.js') !!} "></script>
  {!! $dataTable->scripts() !!}--}}
@stop
