@extends('layouts.app')

@section('content')

    <div class="col-xs-12">
        <div class="card">
            <div class="card-block">
                {{-- Form --}}
                {!! form_start($form) !!}
                {!! form_rest($form) !!}
                
                @if(isset($formButton))
                    @include($formButton)
                @else
                    @include('page.defaultForm.buttonFormDefault')
                @endif

                {!! form_end($form) !!}
                {{-- End Form --}}  
            </div>
        </div>
    </div>

    
@stop

@push('callHead')
    @if(isset($withDatePicker))
    <link href="{!! url('assets/dist/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') !!} "rel="stylesheet" type="text/css"/>
            
    @endif
@endpush

@push('callFoot')
    @if(isset($withDatePicker))
    <script type="text/javascript" src="{!! url('assets/dist/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') !!}"></script>
    <script type="text/javascript" src="{!! url('assets/dist/plugins/bootstrap-datepicker/dist/locales/bootstrap-datepicker.id.min.js') !!}"></script>
    @endif

    <script>
    	$(document).ready(function() {

    	});
        @if(isset($withDatePicker))
            $(function () {
                $('.datePicker').datepicker({
                    format: "yyyy-mm-dd",
                    language: "id",
                    todayBtn:'linked',
                    templates:{
                        leftArrow: '<i class="fa fa-chevron-left"></i>',
                        rightArrow: '<i class="fa fa-chevron-right"></i>'
                    }
                    
                });
            });
        @endif
    </script>
@endpush
