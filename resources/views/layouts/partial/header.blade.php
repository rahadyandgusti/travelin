<header class="navbar bg-green">
    <div class="container container-fluid">
        <div class="row">
            <a class="navbar-brand-travelin pull-left col-lg-2" href="{{url('/')}}" style="">
                <img src="{{asset('images/logo.png')}}" width="100px">
            </a>
            <form action="{{url('search')}}" class="form-inline pull-left col-lg-8 col-sm-10" method="get">
                <div class="form-group col-md-3 no-padding-left">
                    <!-- <input type="text" class="form-control"> -->
                        <select class="search-kota select2" name="city" >
                            @if(isset($city))
                                <option value="{{$city->id}}" selected="selected">{{$city->name}}</option>
                            @endif
                        </select>
                </div>
                <div class="form-group col-md-7 no-padding-left">
                    <input type="text" class="form-control" name="search" placeholder="Where do you want to go?"
                    value="{{(isset($search)?$search:'')}}">
                </div>
                <div class="form-group col-md-2 no-padding-left">
                <button type="submit" class="btn-xs btn btn-secondary">
                    <i class="icon-magnifier icons"></i>
                </button>
                </div>
            </form>
            <div class=" col-lg-2 pull-right">
            <ul class="nav navbar-nav float-xs-right hidden-md-down" style="margin-right: 10px">
                @if(Auth::user())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        {{-- <img src="{!! asset('assets/dist/img/avatars/4.jpg') !!}" class="img-avatar" alt="admin@bootstrapmaster.com"> --}}
                        <span class="hidden-md-down">{{(Auth::user()->name)}}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" style="margin-right:10px">
                        <a class="dropdown-item" href="{{ url('/logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            <i class="fa fa-lock"></i> Logout
                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>
                @else
                <li class="nav-item dropdown">
                    <a href="#"class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="hidden-md-down">Login</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" style="margin-right:10px">
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST">
                        <div class="login-form">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="email / username" />
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="password" />
                            </div>
                            <a href="#" class="pull-right">Register</a>
                            <button class="btn btn-info btn-xs">Login</button>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <a href="{{ route('social.redirect', ['provider' => 'google']) }}" class="btn btn-lg waves-effect waves-light btn-block google">Google+</a>
                            </div>
                        </div>
                        </form>

                    </div>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link aside-toggle" href="#">☰</a>
                </li>
            </ul>
            </div>
        </div>
    </div>
</header>