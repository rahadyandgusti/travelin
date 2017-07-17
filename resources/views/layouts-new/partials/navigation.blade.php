<nav class="navbar navbar-success navbar-transparent navbar-fixed-top navbar-color-on-scroll no-padding">
	<div class="container">
        <div class="navbar-header">
            
            <a href="{{ url('/') }}" class="navbar-left"> 
                <div class="logo-container">
                    <div class="brand">
                        <img src="{{ url('') }}/images/logo_thumb.png" class="hidden-xs" alt="Creative Tim Logo" rel="tooltip" title="<b>Material Kit</b> was Designed & Coded with care by the staff from <b>Creative Tim</b>" data-placement="bottom" data-html="true" width="120px">

                        <img src="{{ url('') }}/images/logo_thumbnail.png" class="visible-xs" alt="Creative Tim Logo" rel="tooltip" title="<b>Material Kit</b> was Designed & Coded with care by the staff from <b>Creative Tim</b>" data-placement="bottom" data-html="true" width="22px">
                    </div>


                </div>
            </a>
            <form class="navbar-form navbar-left col-xs-8">
                <div class="col-xs-10">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <div class="col-xs-2">
                    <button type="submit" class="btn btn-primary btn-simple no-padding">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </form>
        	@if(Auth::user())
        		<a href="#" type="button" class="navbar-toggle pull-right"  data-toggle="collapse" data-target="#navigation-user">
                        <img src="{{url('')}}/assets-new/img/logo.png" class="img-circle flat" alt="admin@bootstrapmaster.com" width="30px"> 
                    </a>
            @else
            	<button href="#" type="button" class="navbar-toggle pull-right"  data-toggle="modal" data-target="#myModal" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-lock"></i>
                    </button>
            @endif
        </div>

	    
    	<ul class="dropdown-menu dropdown-menu-right" id="navigation-user">
        	<li>
        		<a class="dropdown-item" href="{{ url('/logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                <i class="fa fa-lock"></i> Logout
            	</a>
            </li>
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </ul>

	    <div class="collapse navbar-collapse" id="navigation-index">
	    	<ul class="nav navbar-nav navbar-right">
				@if(Auth::user())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                         <img src="{{url('')}}/assets-new/img/logo.png" class="img-circle flat" alt="admin@bootstrapmaster.com" width="30px"> 
                        
                        <span class="hidden-md-down">{{(Auth::user()->name)}}</span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right">
                    	<li>
                    		<a class="dropdown-item" href="{{ url('/logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            <i class="fa fa-lock"></i> Logout
                        	</a>
                        </li>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </ul>
                </li>
                @else
                <li class="nav-item dropdown">
                    <a href="#"class="nav-link dropdown-toggle nav-link"  data-toggle="modal" data-target="#login-modal" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="hidden-md-down">Login</span>
                    </a>
                </li>
                @endif

	    	</ul>
	    </div>
	</div>
</nav>
<!-- End Navbar -->

<!-- Sart Modal -->
<div class="modal fade" id="signup-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            
            <div class="modal-body no-padding">
                <div class="card card-signup">
                    <form class="form" method="" action="">
                        <div class="header header-primary text-center">
                            <h4>Sign Up</h4>
                            <div class="social-line">
                                <a href="{{ route('social.redirect', ['provider' => 'facebook']) }}" class="btn btn-simple btn-just-icon">
                                    <i class="fa fa-facebook-square"></i>
                                </a>
                                <a href="{{ route('social.redirect', ['provider' => 'google']) }}" class="btn btn-simple btn-just-icon">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </div>
                        </div>
                        <p class="text-divider">Or 
                            <button class="btn btn-simple btn-primary btn-lg login-btn" type="button" >Login</button>
                        </p>
                        <div class="content">

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">face</i>
                                </span>
                                <input type="text" class="form-control" placeholder="First Name...">
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">email</i>
                                </span>
                                <input type="text" class="form-control" placeholder="Email...">
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">lock_outline</i>
                                </span>
                                <input type="password" placeholder="Password..." class="form-control" />
                            </div>

                            <!-- If you want to add a checkbox to this form, uncomment this code

                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="optionsCheckboxes" checked>
                                    Subscribe to newsletter
                                </label>
                            </div> -->
                        </div>
                        <div class="footer text-center">
                            <a href="#pablo" class="btn btn-simple btn-primary btn-lg">Get Started</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  End Modal -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="LoginModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            
            <div class="modal-body no-padding">
                <div class="card card-signup">
                    <form class="form" method="" action="">
                        <div class="header header-primary text-center">
                            <h4>Login</h4>
                            <div class="social-line">
                                <a href="{{ route('social.redirect', ['provider' => 'facebook']) }}" class="btn btn-simple btn-just-icon">
                                    <i class="fa fa-facebook-square"></i>
                                </a>
                                <a href="{{ route('social.redirect', ['provider' => 'google']) }}" class="btn btn-simple btn-just-icon">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </div>
                        </div>
                        <p class="text-divider">Or 
                            <button class="btn btn-simple btn-primary btn-lg signup-btn" type="button" >Sign Up</button>
                        </p>
                        <div class="content">

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">email</i>
                                </span>
                                <input type="text" class="form-control" placeholder="Email...">
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">lock_outline</i>
                                </span>
                                <input type="password" placeholder="Password..." class="form-control" />
                            </div>

                            <!-- If you want to add a checkbox to this form, uncomment this code

                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="optionsCheckboxes" checked>
                                    Subscribe to newsletter
                                </label>
                            </div> -->
                        </div>
                        <div class="footer text-center">
                            <a href="#pablo" class="btn btn-simple btn-primary btn-lg">Get Started</a>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  End Modal -->