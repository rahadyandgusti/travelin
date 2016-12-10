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
    <meta name="description" content="CoreUI Bootstrap 4 Admin Template">
    <meta name="author" content="Lukasz Holeczek">
    <meta name="keyword" content="CoreUI Bootstrap 4 Admin Template">
    <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->

    <title>Authentication Admin</title>

    <!-- Icons -->
    <link href="{!! asset('assets/dist') !!}/css/font-awesome.min.css" rel="stylesheet">
    <link href="{!! asset('assets/dist') !!}/css/simple-line-icons.css" rel="stylesheet">

    <!-- Main styles for this application -->
    <link href="{!! asset('assets/dist') !!}/css/style.css" rel="stylesheet">

</head>

<body>
    <div class="container d-table">
        <div class="d-100vh-va-middle">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card-group">
                        <div class="card p-2">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                                {{ csrf_field() }}
                                <div class="card-block">
                                    <h1>Login</h1>
                                    <p class="text-muted">Sign In to your account</p>
                                    <div class="input-group mb-1{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <span class="input-group-addon"><i class="icon-user"></i>
                                        </span>
                                        <input type="text" id="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="input-group mb-2{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <span class="input-group-addon"><i class="icon-lock"></i>
                                        </span>
                                        <input id="password" type="password" class="form-control" name="password" required placeholder="Password">
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <button type="submit" class="btn btn-primary px-2">Login</button>
                                        </div>
                                        <div class="col-xs-6 text-xs-right">
                                            <a class="btn btn-link px-0" href="{{ url('/password/reset') }}">
                                                Forgot Your Password?
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card card-inverse card-primary py-3 hidden-md-down" style="width:44%">
                            <div class="card-block text-xs-center">
                                <div>
                                    <!-- <h2>Sign up</h2> -->
                                    <img src="{{asset('images/logo-pln.png')}}" width="100%">
                                    <p></p>
                                    <p style="font-size:22px">Aplikasi Monitoring Tagihan</p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap and necessary plugins -->
    <script src="{!! asset('assets/dist') !!}/plugins/jquery/dist/jquery.min.js"></script>
    <script src="{!! asset('assets/dist') !!}/plugins/tether/dist/js/tether.min.js"></script>
    <script src="{!! asset('assets/dist') !!}/plugins/bootstrap/dist/js/bootstrap.min.js"></script>



</body>

</html>