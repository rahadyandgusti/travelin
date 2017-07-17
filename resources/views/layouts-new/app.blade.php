@include('layouts-new.partials.header')

<body class="index-page">
<!-- Navbar -->
@include('layouts-new.partials.navigation')

<div class="wrapper">
	@yield('content')
    <footer class="footer">
	    <div class="container">
	        <nav class="pull-left">
	            <ul>
					<!-- <li>
						<a href="http://www.creative-tim.com">
							Creative Tim
						</a>
					</li>
					<li>
						<a href="http://presentation.creative-tim.com">
						   About Us
						</a>
					</li>
					<li>
						<a href="http://blog.creative-tim.com">
						   Blog
						</a>
					</li>
					<li>
						<a href="http://www.creative-tim.com/license">
							Licenses
						</a>
					</li> -->
	            </ul>
	        </nav>
	        <div class="copyright pull-right">
	            &copy; 2017, made with <i class="material-icons">favorite</i> by Rahadyan D Gusti
	        </div>
	    </div>
	</footer>
</div>




</body>
@include('layouts-new.partials.footer')
