<header class="navbar">
        <div class="container-fluid">
            <button class="navbar-toggler mobile-toggler hidden-lg-up" type="button">☰</button>
            <a class="navbar-brand" href="{{url('/')}}" style="background-size: 225px auto !important;background-image: url('{{asset('images/PLN-home.png')}}') !important;width: 240px">
                <img src="" width="100px">
            </a>
            <ul class="nav navbar-nav hidden-md-down">
                <!-- <li class="nav-item">
                    <a class="nav-link " href="#">&nbsp</a>
                </li> -->
                
            </ul>
            <ul class="nav navbar-nav float-xs-right hidden-md-down" style="margin-right: 10px">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        {{-- <img src="{!! asset('assets/dist/img/avatars/4.jpg') !!}" class="img-avatar" alt="admin@bootstrapmaster.com"> --}}
                        <span class="hidden-md-down">{{ (Auth::user()?Auth::user()->name:'') }}</span>
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

            </ul>
        </div>
    </header>