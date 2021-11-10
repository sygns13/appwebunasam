<!DOCTYPE html>
<html>
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">	

		<title>Portal de la {{$facultad->nombre}}</title>	

		<meta name="keywords" content="facultad, {{$facultad->nombre}} ,universidad, Huaraz, Ancash, Perú, UNASAM, Universidad Nacional, universidad Huaraz, Santiago Antúnez, Santiago Antúnez de Mayolo, Antúnez de Mayolo" />
		<meta name="description" content="{{$facultad->nombre}} de la Universidad Nacional Santiago Antunez de Mayolo ubicada en la ciudad de Huaraz Ancash-Perú">
		<meta name="author" content="Ing. Cristian Chávez - Construyendo Soluciones Informáticas E.I.R.L.">

		<!-- Favicon -->
		<link rel="shortcut icon" href="{{ asset('/img/icon.png') }}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{ asset('/img/icon.png') }}">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

		<!-- Web Fonts  -->
		<link id="googleFonts" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800%7CShadows+Into+Light&display=swap" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{ asset('/webvendor/vendor/bootstrap/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('/webvendor/vendor/fontawesome-free/css/all.min.css') }}">
		<link rel="stylesheet" href="{{ asset('/webvendor/vendor/animate/animate.compat.css') }}">
		<link rel="stylesheet" href="{{ asset('/webvendor/vendor/simple-line-icons/css/simple-line-icons.min.css') }}">
		<link rel="stylesheet" href="{{ asset('/webvendor/vendor/owl.carousel/assets/owl.carousel.min.css') }}">
		<link rel="stylesheet" href="{{ asset('/webvendor/vendor/owl.carousel/assets/owl.theme.default.min.css') }}">
		<link rel="stylesheet" href="{{ asset('/webvendor/vendor/magnific-popup/magnific-popup.min.css') }}">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="{{ asset('/webvendor/css/theme.css') }}">
		<link rel="stylesheet" href="{{ asset('/webvendor/css/theme-elements.css') }}">
		<link rel="stylesheet" href="{{ asset('/webvendor/css/theme-blog.css') }}">
		<link rel="stylesheet" href="{{ asset('/webvendor/css/theme-shop.css') }}">

		<!-- Demo CSS -->
		<link rel="stylesheet" href="{{ asset('/webvendor/css/demos/demo-medical.css') }}">

		<!-- Skin CSS -->
		<link id="skinCSS" rel="stylesheet" href="{{ asset('/webvendor/css/skins/skin-medical.css') }}">

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="{{ asset('/webvendor/css/custom.css') }}">

		<!-- Head Libs -->
		<script src="{{ asset('/webvendor/vendor/modernizr/modernizr.min.js') }}"></script>

	</head>
	<body>

		<div class="body">

			<header id="header" class="header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyChangeLogo': true, 'stickyStartAt': 120, 'stickyHeaderContainerHeight': 70}">
				<div class="header-body border-top-0">
					<div class="header-top header-top-default header-top-borders border-bottom-0">
						<div class="container h-100">
							<div class="header-row h-100">
								<div class="header-column justify-content-end">
									<div class="header-row">
										<nav class="header-nav-top">
											<ul class="nav nav-pills">
												<li class="nav-item nav-item-borders py-2 d-none d-sm-inline-flex">
													<span class="ps-0"><i class="far fa-dot-circle text-4 text-color-primary" style="top: 1px;"></i>
														@if($facultad != null && $facultad->direccion != null)
															{{$facultad->direccion}}
														@endif
													</span>
												</li>
												<li class="nav-item nav-item-borders py-2">
													@if($facultad != null && $facultad->telefono != null)
														<a href="tel:{{$facultad->telefono}}"><i class="fab fa-whatsapp text-4 text-color-primary" style="top: 0;"></i> {{$facultad->telefono}}</a>
													@endif
												</li>
												<li class="nav-item nav-item-borders py-2 pe-1 d-none d-md-inline-flex">
													@if($facultad != null && $facultad->email != null)
														<a href="mailto:{{$facultad->email}}"><i class="far fa-envelope text-4 text-color-primary" style="top: 1px;"></i> {{$facultad->email}}</a>
													@endif
													
												</li>
											</ul>
										</nav>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="header-container container">
						<div class="header-row">
							<div class="header-column">
								<div class="header-row">
									<div class="header-logo">
										<a href="demo-medical.html">
											<img alt="Porto" width="143" height="40" src="img/demos/medical/logo-medical.png">
										</a>
									</div>
								</div>
							</div>
							<div class="header-column justify-content-end">
								<div class="header-row">
									<div class="header-nav order-2 order-lg-1">
										<div class="header-nav-main header-nav-main-square header-nav-main-effect-1 header-nav-main-sub-effect-1">
											<nav class="collapse">
												<ul class="nav nav-pills" id="mainNav">
													<li class="dropdown-full-color dropdown-secondary">
														<a class="nav-link active" href="demo-medical.html">
															Home
														</a>
													</li>
													<li class="dropdown-full-color dropdown-secondary">
														<a class="nav-link" href="demo-medical-about-us.html">
															About Us
														</a>
													</li>
													<li class="dropdown dropdown-full-color dropdown-secondary">
														<a class="nav-link dropdown-toggle" class="dropdown-toggle" href="demo-medical-departments.html">
															Departments
														</a>
														<ul class="dropdown-menu">
															<li><a class="dropdown-item" href="demo-medical-departments-detail.html">Cardiology</a></li>
															<li><a class="dropdown-item" href="demo-medical-departments-detail.html">Gastroenterology</a></li>
															<li><a class="dropdown-item" href="demo-medical-departments-detail.html">Pulmonology</a></li>
															<li><a class="dropdown-item" href="demo-medical-departments-detail.html">Dental</a></li>
															<li><a class="dropdown-item" href="demo-medical-departments-detail.html">Gynecology</a></li>
															<li><a class="dropdown-item" href="demo-medical-departments-detail.html">Hepatology</a></li>
														</ul>
													</li>
													<li class="dropdown-full-color dropdown-secondary">
														<a class="nav-link" href="demo-medical-doctors.html">
															Doctors
														</a>
													</li>
													<li class="dropdown-full-color dropdown-secondary">
														<a class="nav-link" href="demo-medical-resources.html">
															Resources
														</a>
													</li>
													<li class="dropdown-full-color dropdown-secondary">
														<a class="nav-link" href="demo-medical-insurance.html">
															Insurance
														</a>
													</li>
													<li class="dropdown-full-color dropdown-secondary">
														<a class="nav-link" href="demo-medical-contact.html">
															Contact
														</a>
													</li>
												</ul>
											</nav>
										</div>
										<button class="btn header-btn-collapse-nav" data-bs-toggle="collapse" data-bs-target=".header-nav-main nav">
											<i class="fas fa-bars"></i>
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>

			<div role="main" class="main">

				{{$facultad->nombre}}
				
			</div>

			
		</div>

		<!-- Vendor -->
		<script src="{{ asset('/webvendor/vendor/jquery/jquery.min.js') }}"></script>
		<script src="{{ asset('/webvendor/vendor/jquery.appear/jquery.appear.min.js') }}"></script>
		<script src="{{ asset('/webvendor/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
		<script src="{{ asset('/webvendor/vendor/jquery.cookie/jquery.cookie.min.js') }}"></script>
		<script src="{{ asset('/webvendor/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
		<script src="{{ asset('/webvendor/vendor/jquery.validation/jquery.validate.min.js') }}"></script>
		<script src="{{ asset('/webvendor/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
		<script src="{{ asset('/webvendor/vendor/jquery.gmap/jquery.gmap.min.js') }}"></script>
		<script src="{{ asset('/webvendor/vendor/lazysizes/lazysizes.min.js') }}"></script>
		<script src="{{ asset('/webvendor/vendor/isotope/jquery.isotope.min.js') }}"></script>
		<script src="{{ asset('/webvendor/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
		<script src="{{ asset('/webvendor/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
		<script src="{{ asset('/webvendor/vendor/vide/jquery.vide.min.js') }}"></script>
		<script src="{{ asset('/webvendor/vendor/vivus/vivus.min.js') }}"></script>

		<!-- Theme Base, Components and Settings -->
		<script src="{{ asset('/webvendor/js/theme.js') }}"></script>

		<!-- Current Page Vendor and Views -->
		<script src="{{ asset('/webvendor/js/views/view.contact.js') }}"></script>

		<!-- Demo -->
		<script src="{{ asset('/webvendor/js/demos/demo-medical.js') }}"></script>

		<!-- Theme Custom -->
		<script src="{{ asset('/webvendor/js/custom.js') }}"></script>

		<!-- Theme Initialization Files -->
		<script src="{{ asset('/webvendor/js/theme.init.js') }}"></script>

	</body>
</html>
