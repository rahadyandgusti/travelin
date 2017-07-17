<!--   Core JS Files   -->
	<script src="{{ url('') }}/assets-new/js/jquery.min.js" type="text/javascript"></script>
	<script src="{{ url('') }}/assets-new/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="{{ url('') }}/assets-new/js/material.min.js"></script>

	<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
	<script src="{{ url('') }}/assets-new/js/nouislider.min.js" type="text/javascript"></script>

	<!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
	<script src="{{ url('') }}/assets-new/js/bootstrap-datepicker.js" type="text/javascript"></script>

	<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
	<script src="{{ url('') }}/assets-new/js/material-kit.js" type="text/javascript"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('.login-btn').on('click',function(){
				$('#login-modal').modal('show');
				$('#signup-modal').modal('hide');
			});
			
			$('.signup-btn').on('click',function(){
				$('#login-modal').modal('hide');
				$('#signup-modal').modal('show');
			});
		})
	</script>
    
    @stack('callFoot')
</html>