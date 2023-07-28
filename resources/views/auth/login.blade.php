<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>

		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<link rel="canonical" href="{{ url()->current() }}" />
		<meta name="description" content="Pekan Paralympic Provinsi (Peparprov) ke-IV Jawa Tengah Tahun 2023 di kota Pati" />
		<meta name="keywords" content="Pekan Paralympic Provinsi, Peparprov, Jawa Tengah, Pati"/>
		<meta property="bb:client_area" content="{{ url()->current() }}">
		<meta name="robots" content="index, follow, noodp">
		<meta property="og:url" content="{{ url()->current() }}" />
		<meta property="og:title" content="Peparprov ke-IV Jawa Tengah Tahun 2023" />
		<meta property="og:description" content="Pekan Paralympic Provinsi (Peparprov) ke-IV Jawa Tengah Tahun 2023 di kota Pati" />
		<meta property="og:image" content="{{ asset('images/logo-peparprov-2023.jpg')}}" />
		<meta property="og:site_name" content="Kartunikah" />
		<meta property="og:locale" content="id_ID" />
		<meta property="og:type" content="website" />
		<meta name="twitter:card" content="summary" />
		<meta name="twitter:site" content="@seven_pion" />
		<meta name="twitter:title" content="Peparprov ke-IV Jawa Tengah Tahun 2023" />
		<meta name="twitter:description" content="Pekan Paralympic Provinsi (Peparprov) ke-IV Jawa Tengah Tahun 2023 di kota Pati" />
		<meta name="twitter:image" content="{{ asset('images/logo-peparprov-2023.jpg')}}" />
		<meta itemprop="description" content="Pekan Paralympic Provinsi (Peparprov) ke-IV Jawa Tengah Tahun 2023 di kota Pati">
		<meta content="NPCI Jawa Tengah" name="author">

		<!-- Title -->
		<title>Login Users</title>

		<!--Favicon -->
		<link rel="icon" href="{{ asset('images/simple-peparpov-2023.png')}}" type="image/x-icon"/>

		<!-- Bootstrap css -->
		<link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet" />

		<!-- Style css -->
		<link href="{{ asset('assets/css/style.css')}}" rel="stylesheet" />

		<!-- Dark css -->
		<link href="{{ asset('assets/css/dark.css')}}" rel="stylesheet" />

		<!-- Skins css -->
		<link href="{{ asset('assets/css/skins.css')}}" rel="stylesheet" />

		<!-- Animate css -->
		<link href="{{ asset('assets/css/animated.css')}}" rel="stylesheet" />

		<!---Icons css-->
		<link href="{{ asset('assets/plugins/web-fonts/icons.css')}}" rel="stylesheet" />
		<link href="{{ asset('assets/plugins/web-fonts/font-awesome/font-awesome.min.css')}}" rel="stylesheet">
		<link href="{{ asset('assets/plugins/web-fonts/plugin.css')}}" rel="stylesheet" />
		<style>
			.page-style1:before {
				position: absolute;
				content: '';
				width: 100%;
				height: 100%;
				background: linear-gradient(rgba(68, 84, 195, 0.25), rgba(68, 84, 195, 0.18)), url(/images/bg-login.png);
				background-repeat: no-repeat;
				background-size: cover;
				background-position: top;
				opacity: 0.8;
			}
			.title-style img {
				position: absolute;
				width: 40%;
				background: #fff;
				display: block;
				left: 0;
				right: 0;
				width: fit-content;
				margin: 0 auto;
				display: block;
				top: 26px;
				padding: 0 20px;
			}
		</style>
	</head>

	<body class="h-100vh page-style1  light-mode">
		<div class="page">
			<div class="page-single">
				<div class="container">
					<div class="row">
						<div class="col mx-auto">
							<div class="row justify-content-center">
								<div class="col-md-7 col-lg-5">
									<div class="card card-group mb-0">
										<div class="card p-4">
											<div class="card-body">
												<div class="text-center title-style mb-6">
													<h1 class="mb-2">
														Login
													</h1>
													<hr>
													<br>
													<p class="text-muted mt-4">Masuk dengan akun User</p>
												</div>
                                                <form method="POST" action="{{ route('login') }}">
                                                    @csrf
													<div class="input-group mb-3">
														<span class="input-group-addon"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 16c-2.69 0-5.77 1.28-6 2h12c-.2-.71-3.3-2-6-2z" opacity=".3"/><circle cx="12" cy="8" opacity=".3" r="2"/><path d="M12 14c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4zm-6 4c.22-.72 3.31-2 6-2 2.7 0 5.8 1.29 6 2H6zm6-6c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0-6c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2z"/></svg></span>
														<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email"  autocomplete="email"  autofocus>
	
															@error('email')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
															@enderror
													</div>
													<div class="input-group mb-4">
														<span class="input-group-addon"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><g fill="none"><path d="M0 0h24v24H0V0z"/><path d="M0 0h24v24H0V0z" opacity=".87"/></g><path d="M6 20h12V10H6v10zm6-7c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2z" opacity=".3"/><path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zM9 6c0-1.66 1.34-3 3-3s3 1.34 3 3v2H9V6zm9 14H6V10h12v10zm-6-3c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z"/></svg></span>
														<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="current-password" placeholder="Password">
													</div>
													<div class="row">
														<div class="col-12">
															<button type="submit" id="submit" class="btn btn-lg btn-primary btn-block"><i class="fe fe-arrow-right"></i>{{ __('Login') }}</button>
														</div>
													</div>
                                                </form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Jquery js-->
		<script src="{{ asset('assets/js/vendors/jquery-3.5.1.min.js')}}"></script>

		<!-- Bootstrap4 js-->
		<script src="{{ asset('assets/plugins/bootstrap/popper.min.js')}}"></script>
		<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

		<!--Othercharts js-->
		<script src="{{ asset('assets/plugins/othercharts/jquery.sparkline.min.js')}}"></script>

		<!-- Circle-progress js-->
		<script src="{{ asset('assets/js/vendors/circle-progress.min.js')}}"></script>

		<!-- Jquery-rating js-->
		<script src="{{ asset('assets/plugins/rating/jquery.rating-stars.js')}}"></script>

	</body>
</html>