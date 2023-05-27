<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>

		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta content="Dashtic - Bootstrap Webapp Responsive Dashboard Simple Admin Panel Premium HTML5 Template" name="description">
		<meta content="Spruko™ Technologies Private Limited" name="author">
		<meta name="keywords" content="Admin, Admin Template, Dashboard, Responsive, Admin Dashboard, Bootstrap, Bootstrap 4, Clean, Backend, Jquery, Modern, Web App, Admin Panel, Ui, Premium Admin Templates, Flat, Admin Theme, Ui Kit, Bootstrap Admin, Responsive Admin, Application, Template, Admin Themes, Dashboard Template"/>

		<!-- Title -->
		<title>@yield('title')</title>

		<!--Favicon -->
		<link rel="icon" href="{{asset('assets/images/brand/favicon.ico')}}" type="image/x-icon"/>

		<!-- Bootstrap css -->
		<link href="{{asset('assets/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet" />

		<!-- Style css -->
		<link href="{{asset('assets/css/style.css')}}" rel="stylesheet" />

		<!-- Dark css -->
		<link href="{{asset('assets/css/dark.css')}}" rel="stylesheet" />

		<!-- Skins css -->
		<link href="{{asset('assets/css/skins.css')}}" rel="stylesheet" />

		<!-- Animate css -->
		<link href="{{asset('assets/css/animated.css')}}" rel="stylesheet" />

		<!-- P-scroll bar css-->
		<link href="{{asset('assets/plugins/p-scrollbar/p-scrollbar.css')}}" rel="stylesheet" />

		<!---Icons css-->
		<link href="{{asset('assets/plugins/web-fonts/icons.css')}}" rel="stylesheet" />
		<link href="{{asset('assets/plugins/web-fonts/font-awesome/font-awesome.min.css')}}" rel="stylesheet">
		<link href="{{asset('assets/plugins/web-fonts/plugin.css')}}" rel="stylesheet" />

		<!-- News-Ticker css-->
		<link href="{{asset('assets/plugins/newsticker/newsticker.css')}}" rel="stylesheet" />

		<!-- Select2 css -->
		<link href="{{asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet" />

		<!--Daterangepicker css-->
		<link href="{{asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet" />

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" />

	</head>

	<body class="light-mode">

		<!---Global-loader-->
		<div id="global-loader" >
			<img src="{{asset('assets/images/svgs/loader.svg')}}" alt="loader">
		</div>

		<div class="page">
			<div class="page-main">

				<!--app header-->
				@include('templates.header')
				<!--/app header-->
				<!-- Horizontal-menu -->
				@include('templates.navbar')
				<!-- Horizontal-menu end -->

				@yield('main')<!-- end app-content-->
			</div>

				<!--Footer-->
				@include('templates.footer')
				<!-- End Footer-->

		</div>

		<!-- Back to top -->
		<a href="#top" id="back-to-top">
			<svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M4 12l1.41 1.41L11 7.83V20h2V7.83l5.58 5.59L20 12l-8-8-8 8z"/></svg>
		</a>

		<!-- Jquery js-->
		<script src="{{asset('assets/js/vendors/jquery-3.5.1.min.js')}}"></script>

		<!-- Bootstrap4 js-->
		<script src="{{asset('assets/plugins/bootstrap/popper.min.js')}}"></script>
		<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

		<!-- Circle-progress js-->
		<script src="{{asset('assets/js/vendors/circle-progress.min.js')}}"></script>

		<!-- Jquery-rating js-->
		<script src="{{asset('assets/plugins/rating/jquery.rating-stars.js')}}"></script>

		<!--Horizontal js-->
		<script src="{{asset('assets/plugins/horizontal-menu/horizontal.js')}}"></script>

		<!--Moment js-->
		<script src="{{asset('assets/plugins/moment/moment.js')}}"></script>

		<!-- Daterangepicker js-->
		<script src="{{asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
		<script src="{{asset('assets/js/daterange.js')}}"></script>

		<!--Newsticker js-->
		<script src="{{asset('assets/plugins/newsticker/newsticker.js')}}"></script>
		<script src="{{asset('assets/js/newsticker.js')}}"></script>

		<!--Select2 js -->
		<script src="{{asset('assets/plugins/select2/select2.full.min.js')}}"></script>
		<script src="{{asset('assets/js/select2.js')}}"></script>
		
		<!-- P-scroll js-->
		<script src="{{asset('assets/plugins/p-scrollbar/p-scrollbar.js')}}"></script>
		
		<!-- Index js-->
		<script src="{{asset('assets/js/index5.js')}}"></script>

		<!-- Custom js-->
		<script src="{{asset('assets/js/custom.js')}}"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js" integrity="sha512-jNDtFf7qgU0eH/+Z42FG4fw3w7DM/9zbgNPe3wfJlCylVDTT3IgKW5r92Vy9IHa6U50vyMz5gRByIu4YIXFtaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	</body>
	@yield('js')
</html>