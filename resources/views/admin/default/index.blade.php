@extends('admin.layouts.app')

@section('style')
  <link rel="stylesheet" href="{{url('/')}}/plugins/datatables/jquery.dataTables.min.css">
  <link rel="stylesheet" href="{{url('/')}}/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="{!! asset('plugins/sweet-alert/sweetalert.min.css') !!}"/>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="pull-right">
                      <a class="btn btn-info" href="{{route($url.'.create')}}">Add {{ $title }}</a>
                    </div>
                    <h3>List of {{ $title }}</h3>
                    <hr/>
                    {!! $dataTable->table(['class' => 'table table-bordered table-striped table-condensed']) !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
  <script src="{{url('/')}}/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="{{url('/')}}/plugins/datatables/dataTables.bootstrap.min.js"></script>
  <script src="{!! asset('plugins/sweet-alert/sweetalert.min.js') !!} "></script>
  <script src="{!! asset('js/swal-index.js') !!} "></script>
  {!! $dataTable->scripts() !!}
@stop
