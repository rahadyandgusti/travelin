<!--
 * CoreUI - Open Source Bootstrap Admin Template
 * @version v1.0.0-alpha.2
 * @link http://coreui.io
 * Copyright (c) 2016 creativeLabs Łukasz Holeczek
 * @license MIT
 -->
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,AngularJS,Angular,Angular2,jQuery,CSS,HTML,RWD,Dashboard">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>{{config('app.name','travelin')}}</title>

    <!-- Icons -->
    <link href="{!! asset('assets/dist/css/font-awesome.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('assets/dist/css/simple-line-icons.css') !!}" rel="stylesheet">

    <!-- datatables -->
    <link href="{!! asset('assets/dist/plugins/datatable/css/dataTables.bootstrap4.min.css') !!}" rel="stylesheet">

    <!-- bootstrap -->
    <link href="{!! asset('assets/dist/plugins/bootstrap/dist/css/bootstrap.min.css') !!}" rel="stylesheet">
    <!-- <link href="{!! asset('assets/dist/plugins/bootstrap/dist/css/bootstrap-grid.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('assets/dist/plugins/bootstrap/dist/css/bootstrap-reboot.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('assets/dist/plugins/bootstrap/dist/css/bootstrap-flex.min.css') !!}" rel="stylesheet"> -->

    <!-- bootstrap select2 -->
    <link href="{!! asset('assets/dist/plugins/select2/dist/css/select2.min.css') !!}" rel="stylesheet">
    
    <!-- PNotify -->
    <link href="{!! asset('vendor/pnotify/dist/pnotify.css') !!}" rel="stylesheet">
    <link href="{!! asset('vendor/pnotify/dist/pnotify.buttons.css') !!}" rel="stylesheet">
    <link href="{!! asset('vendor/pnotify/dist/pnotify.nonblock.css') !!}" rel="stylesheet">

    <!-- Main styles for this application -->
    <link href="{!! asset('assets/dist/css/style.css') !!}" rel="stylesheet">
    <link href="{!! asset('assets/dist/css/style-travelin.css') !!}" rel="stylesheet">
    <style type="text/css">
        .breadcrumb, .navbar{
            border-radius: 0px !important;
        }
        footer{
            text-align: center;
        }
        .margin-bottom{
            margin-bottom: 15px !important;
        }

        .option{
            width: 100%;
            clear: both;
        }
        .option .image{
            width: 30px;
            float: left
        }
        .option .image img{
            width: 100%;
        }
        .option .info{
            margin-left: 30px;
            padding:5px;
        }
        .option .info .province-name{
            font-size: 11px;
        }
        .option .info .city-name{
            font-weight: bold;
        }
    </style>

    @stack('callHead')

</head>

<body class="navbar-fixed  fixed-nav">
    
    @include('layouts.partial.header')     

    <!-- Main content -->
    <main class="main">
        
        <!-- Breadcrumb -->
<!--         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="coba">coba</a>
            </li>
            <li class="breadcrumb-item active">coba aktif</li>
        </ol> -->
        


        <div class="container-fluid">

            @yield('content')

        </div>
        <!-- /.conainer-fluid -->
    </main>

    @include('layouts.partial.aside')


    <footer class="footer">
        <span class="text-center">
            Developed with &hearts; by <a href="http://tlab.co.id">T'lab</a> &copy; 2016  
        </span>
    </footer>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    
    <!-- Bootstrap and necessary plugins -->
    <script src="{!! asset('assets/dist/plugins/jquery/dist/jquery.min.js') !!}"></script>
    <script src="{!! asset('assets/dist/plugins/tether/dist/js/tether.min.js') !!}"></script>
    <script src="{!! asset('assets/dist/plugins/bootstrap/dist/js/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('assets/dist/plugins/pace/pace.min.js') !!}"></script>

    <!-- datatable Bootstrap plugins -->
    <script src="{!! asset('assets/dist/plugins/datatable/js/jquery.dataTables.min.js') !!}"></script>
    <script src="{!! asset('assets/dist/plugins/datatable/js/dataTables.bootstrap4.min.js') !!}"></script>

    <!-- bootstrap select2 -->
    <script src="{!! asset('assets/dist/plugins/select2/dist/js/select2.full.min.js') !!}"></script>

    <!-- PNotify -->
    <script src="{!! asset('vendor/pnotify/dist/pnotify.js') !!}"></script>
    <script src="{!! asset('vendor/pnotify/dist/pnotify.buttons.js') !!}"></script>
    <script src="{!! asset('vendor/pnotify/dist/pnotify.nonblock.js') !!}"></script>

    <!-- Plugins and scripts required by all views -->
    <script src="{!! asset('assets/dist/plugins/chart.js/dist/Chart.min.js') !!}"></script>

    <script src="{!! asset('assets/dist/js/app.js') !!}"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('.select2').select2();    

            var arrNotif = {'success':'Sukses','error':'Terjadi Kesalahan','warning':'Peringatan'};
            @if((Session::has('notif')))
                @foreach(Session::get('notif') as $ind => $sess)
                    @foreach($sess as $val)
                        new PNotify({
                            title: arrNotif['{{$ind}}'],
                            text: '{{$val['text']}}',
                            type: '{{$ind}}',
                            styling: 'bootstrap3',
                        });
                    @endforeach
                @endforeach
            @endif

            $(".search-kota").select2({
                ajax: {
                    url: "{{url('search/get/city')}}",
                    dataType: 'json',
                    quietMillis: 250,
                    data: function (params) {
                        return {
                          q: params.term, // search term
                        };
                    },
                    processResults:function (data, page) {
                    // parse the results into the format expected by Select2.
                    // since we are using custom formatting functions we do not need to
                    // alter the remote JSON data
                    // console.log(data);
                    return {results:data};
                    },
                    cache: true
                },
                allowClear: true,
                placeholder:"All",
                minimumInputLength: 2,
                templateResult: formatRepo, // omitted for brevity, see the source of this page
                // templateSelection: formatRepo, // omitted for brevity, see the source of this page
                // dropdownCssClass: "bigdrop", // apply css that makes the dropdown taller
                escapeMarkup: function (m) { return m; }
            });

            function formatRepo (repo) {
                 console.log(repo);
                 var markup = "";
                
                    if (repo.loading) return repo.text;
                    markup += "<div class='option'>" +
                    "<div class='image'><img src='{{asset('uploads/logo/city/thumb')}}/" + repo.logo + "' /></div>" +
                    "<div class='info'>" +
                      "<div class='city-name'>" + 
                      repo.text 
                      + "</div>";
                      if(repo.name)
                    markup += "<div class='province-name'>" + repo.name + "</div>";
                    markup += 
                    "</div>"+
                    '<div class="clearfix"></div>'+
                    "</div>";
                // console.log(markup);
                return markup;
            }

        });
        
</script>

    <!-- Plugins and scripts required by this views -->
    @stack('callFoot')

</body>
<footer class="footer">
    <span class="">
        Developed by Rahadyan D Gusti  
    </span>
</footer>

</html>