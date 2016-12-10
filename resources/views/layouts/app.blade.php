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

    <title>PLN UPB Sumbagteng</title>

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
    </style>

    @stack('callHead')

</head>

<!-- BODY options, add following classes to body to change options
		1. 'compact-nav'     	  - Switch sidebar to minified version (width 50px)
		2. 'sidebar-nav'		  - Navigation on the left
			2.1. 'sidebar-off-canvas'	- Off-Canvas
				2.1.1 'sidebar-off-canvas-push'	- Off-Canvas which move content
				2.1.2 'sidebar-off-canvas-with-shadow'	- Add shadow to body elements
		3. 'fixed-nav'			  - Fixed navigation
		4. 'navbar-fixed'		  - Fixed navbar
		5. 'footer-fixed'		  - Fixed navbar
	-->

<body class="navbar-fixed  fixed-nav">
    
    @include('layouts.partial.header')     

    <!-- Main content -->
    <main class="main">
        
        <!-- Breadcrumb -->
        <ol class="breadcrumb">
        @if(isset($breadCumb) && count($breadCumb))
            @foreach($breadCumb as $i => $brcmb)
                @if(count($breadCumb)-1 != $i)
                <li class="breadcrumb-item"><a href="{{$brcmb['link']}}">{{$brcmb['name']}}</a>
                </li>
                @else
                <li class="breadcrumb-item active">{{$brcmb['name']}}</li>
                @endif
            @endforeach 
            @endif
        </ol>
        


        <div class="container-fluid">

            @yield('content')

        </div>
        <!-- /.conainer-fluid -->
    </main>

    {{-- @include('layouts.partial.righttabpanel') --}}

    <footer class="footer">
        <span class="text-center">
            Developed with &hearts; by <a href="http://tlab.co.id">T'lab</a> &copy; 2016  
            <!--  © 2016. -->
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
        });

    </script>

    <!-- Plugins and scripts required by this views -->
    @stack('callFoot')

    
    
    
</body>

</html>