<div class="js-modal_holder"></div>
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1
    </div>
    <strong>Copyright &copy; 2018 <a href="#">St. John Academy</a>.</strong> 
                        
  </footer>

  

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="{{ asset('cms/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>

<script src="{{ asset('cms/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>

<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('cms/bootstrap/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('cms/plugins/select2/select2.min.js') }}"></script>

<!-- FastClick -->
<script src="{{ asset('cms/plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('cms/dist/js/app.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('cms/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('cms/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('cms/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- SlimScroll 1.3.0 -->
<script src="{{ asset('cms/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- ChartJS 1.0.1 -->
<script src="{{ asset('cms/plugins/chartjs/Chart.min.js') }}"></script>

<script src="{{ asset('cms/plugins/bootbox/bootbox.min.js') }}"></script>

<script src="{{ asset('cms/plugins/alertifyjs/alertify.min.js') }}"></script>
<!-- jquery-toast-plugin -->
<script src="{{ asset('cms/plugins/jquery-toast-plugin/jquery.toast.min.js') }}"></script>
<!-- alertifyjs -->
<script src="{{ asset('cms/plugins/alertifyjs/alertify.min.js') }}"></script>
@yield('scripts')

<script>
    function loader_overlay($target_class = '') {
		if (!$target_class) {
			if ($('#js-loader-overlay').hasClass('hidden')) {
				$('#js-loader-overlay').removeClass('hidden')
			} else {
				$('#js-loader-overlay').addClass('hidden')
			}
		} else {
			if ($('#' + $target_class).hasClass('hidden')) {
				$('#' + $target_class).removeClass('hidden')
			} else {
				$('#' + $target_class).addClass('hidden')
			}
		}
    }
        
		/*
		 * @Function 	: show_toast_alert
		 * @Params  	: data - Object
		 *
		 * @Possible Param Object Content 
		 *		heading - a text that appears on the top of toast message, message - message body of toast,
		 *		type - type of message to be displayed (error, success, warning, info)
		 *	
		 * @Desc 		: this function will send request to server to save data
		 *
		 * {{-- @Created by : Paul Belga --}}
		 */
		function show_toast_alert(data) {
			$.toast({
				heading: data.heading,
				text: data.message,
				icon: data.type,
				showHideTransition: 'fade',
				loader: false,        // Change it to false to disable loader
				loaderBg: '#9EC600'  // To change the background
			})
		}
</script>
</body>
</html>