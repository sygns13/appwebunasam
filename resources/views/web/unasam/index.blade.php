<!DOCTYPE html>
<html lang="es" {{-- class="boxed" --}}>
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">	

		<title>Portal Web Universidad Nacional Santiago Antúnez de Mayolo</title>	

		<meta name="keywords" content="universidad, Huaraz, Ancash, Perú, UNASAM, Universidad Nacional, universidad Huaraz, Santiago Antúnez, Santiago Antúnez de Mayolo, Antúnez de Mayolo" />
		<meta name="description" content="Universidad Nacional Santiago Antunez de Mayolo ubicada en la ciudad de Huaraz Ancash-Perú">
		<meta name="author" content="UNASAM, Universidad Nacional Santiago Antunez de Mayolo">

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

		<!-- Current Page CSS -->
		<link rel="stylesheet" href="{{ asset('/webvendor/vendor/circle-flip-slideshow/css/component.css') }}">
		<link rel="stylesheet" href="{{ asset('/webvendor/css/demos/demo-medical.css') }}">

		<!-- Skin CSS -->
		{{-- <link rel="stylesheet" href="{{ asset('/webvendor/css/demos/demo-construction.css') }}"> --}}
		<link id="skinCSS" rel="stylesheet" href="{{ asset('/webvendor/css/skins/default.css') }}">
		{{-- <link id="skinCSS" rel="stylesheet" href="{{ asset('/webvendor/css/skins/skin-auto-services.css') }}"> --}}
		{{-- <link id="skinCSS" rel="stylesheet" href="{{ asset('/webvendor/css/skins/skin-finance.css') }}"> --}}
	{{-- 	<link id="skinCSS" rel="stylesheet" href="{{ asset('/webvendor/css/skins/skin-it-services.css') }}"> --}}

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="{{ asset('/webvendor/css/custom.css') }}">

		<!-- Head Libs -->
		<script src="{{ asset('/webvendor/vendor/modernizr/modernizr.min.js') }}"></script>

	</head>
	<body data-plugin-page-transition>

		<div class="body">


			<header id="header" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyStartAt': 145, 'stickySetTop': '-145px', 'stickyChangeLogo': false}">
				<div class="header-body border-0 box-shadow-none">
					<div class="header-top header-top-borders">
						<div class="container h-100">
							<div class="header-row h-100">
								<div class="header-column justify-content-start">
									<div class="header-row">
										<nav class="header-nav-top">
											<ul class="nav nav-pills">
												<li class="nav-item nav-item-anim-icon d-none d-md-block">
													<a class="nav-link ps-0" href="about-us.html"><i class="fas fa-angle-right"></i> Campus Virtual</a>
												</li>
												<li class="nav-item nav-item-anim-icon d-none d-md-block">
													<a class="nav-link" href="contact-us.html"><i class="fas fa-angle-right"></i> Guías Home Office</a>
												</li>
												{{-- <li class="nav-item dropdown nav-item-left-border d-none d-sm-block nav-item-left-border-remove nav-item-left-border-md-show">
													<a class="nav-link" href="#" role="button" id="dropdownLanguage" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														<img src="/webvendor/img/blank.gif" class="flag flag-es" alt="Espaniol" /> Español
														<i class="fas fa-angle-down"></i>
													</a>
													<div class="dropdown-menu" aria-labelledby="dropdownLanguage">
														<a class="dropdown-item" href="#"><img src="{{ asset('/webvendor/img/blank.gif') }}" class="flag flag-es" alt="Espaniol" /> Español</a>
														<a class="dropdown-item" href="#"><img src="{{ asset('/webvendor/img/blank.gif') }}" class="flag flag-us" alt="Ingles" /> English</a>
														<a class="dropdown-item" href="#"><img src="{{ asset('/webvendor/img/blank.gif') }}" class="flag flag-fr" alt="Frances" /> Française</a>
													</div>
												</li> --}}
												<li class="nav-item nav-item-left-border nav-item-left-border-remove nav-item-left-border-sm-show">
													<span class="ws-nowrap"><i class="fas fa-desktop"></i> Office 365</span>
												</li>
												<li class="nav-item nav-item-left-border nav-item-left-border-remove nav-item-left-border-sm-show">
													<span class="ws-nowrap"><i class="fas fa-phone"></i>
														@if($unasam != null && $unasam->telefono)
														{{$unasam->telefono}}
														@endif
													</span>
												</li>
											</ul>
										</nav>
									</div>
								</div>
								<div class="header-column justify-content-end">
									<div class="header-row">
										<ul class="header-social-icons social-icons">
                                        
                                            @foreach($redsocials as  $key => $dato)
                                                <li style="box-shadow:none!important;"><a href="{{$dato->urlredsocial}}" target="_blank"><img  src="{{ asset('/web/redsocialunasam/'.$dato->url) }}" style="max-height: 28px; max-width:28px;"/></a></li>
                                            @endforeach
											{{-- <li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook" ><i class="fab fa-facebook-f"></i></a></li>
											<li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
											<li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li> --}}
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="header-container container">
						<div class="header-row py-2">
							<div class="header-column">
								<div class="header-row">
									<div class="header-logo">
										<a href="/">
											<img alt="UNASAM" height="60"   data-sticky-height="50" data-sticky-top="110"    src="{{ asset('/webvendor/img/logo_unasam_2.png') }}">
									{{-- 		<img alt="Porto" width="100" height="48" data-sticky-width="69" data-sticky-height="34" data-sticky-top="86" src="{{ asset('/webvendor/img/logo-default-slim.png') }}"> --}}
										</a>
									</div>
								</div>
							</div>
							<div class="header-column justify-content-end">
								<div class="header-row">
									<ul class="header-extra-info d-flex align-items-center">
										<li class="d-none d-sm-inline-flex">
											<div class="header-extra-info-text">
												<label>Acceder</label>
												<strong><a href="mailto:mail@example.com">Mesa de Partes</a></strong>
											</div>
										</li>
										<li>
											<div class="header-extra-info-text">
												<label>Comuníquese</label>
												<strong><a href="tel:8001234567">Directorio Institucional</a></strong>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>					
					<div class="header-nav-bar bg-color-light-scale-1 z-index-0" data-sticky-header-style="{'minResolution': 991}" data-sticky-header-style-active="{'background-color': 'transparent'}" data-sticky-header-style-deactive="{'background-color': '#f7f7f7'}">
						<div class="container">
							<div class="header-row">
								<div class="header-column">
									<div class="header-row justify-content-end">
										<div class="header-nav header-nav-stripe justify-content-start">
											<div class="header-nav-main header-nav-main-square header-nav-main-effect-1 header-nav-main-sub-effect-1">
												<nav class="collapse">
													<ul class="nav nav-pills" id="mainNav" data-sticky-header-style="{'minResolution': 991}" data-sticky-header-style-active="{'margin-left': '50px'}" data-sticky-header-style-deactive="{'margin-left': '0'}">
														<li class="dropdown" style="margin-left:0px;">
															<a class="dropdown-item dropdown-toggle active" href="index.html">
																La UNASAM
															</a>
															<ul class="dropdown-menu">
																<li>
																	<a class="dropdown-item" href="index.html">
																		Reseña Histórica
																	</a>
																</li>
																<li>
																	<a class="dropdown-item" href="index.html#demos">
																		Misión y Visión {{-- <span class="tip tip-dark">hot</span> --}}
																	</a>
																</li>
																<li class="dropdown-submenu">
																	<a class="dropdown-item" href="#">Órganos de Gobierno</a>
																	<ul class="dropdown-menu">
																		<li><a class="dropdown-item" href="index-classic.html">Rectorado</a></li>
																		<li><a class="dropdown-item" href="index-classic-color.html">Vicerrector Académico</a></li>
																		<li><a class="dropdown-item" href="index-classic-light.html">Vicerrector Administrativo</a></li>
																		<li><a class="dropdown-item" href="index-classic-video.html">Asamblea Universitaria</a></li>
																		<li><a class="dropdown-item" href="index-classic-video-light.html">Consejo Universitario</a></li>
																	</ul>
																</li>
																<li>
																	<a class="dropdown-item" href="index.html">
																		Objetivos Estratégicos
																	</a>
																</li>
																<li>
																	<a class="dropdown-item" href="index.html#demos">
																		Estatuto
																	</a>
																</li>
																<li>
																	<a class="dropdown-item" href="index.html#demos">
																		Acreditación Institucional
																	</a>
																</li>
																<li>
																	<a class="dropdown-item" href="index.html#demos">
																		Licnciamiento Institucional
																	</a>
																</li>
																<li>
																	<a class="dropdown-item" href="index.html#demos">
																		Himno Institucional
																	</a>
																</li>
																
															</ul>
														</li>
														<li class="dropdown">
															<a class="dropdown-item dropdown-toggle" href="#">
																Admisión
															</a>
															<ul class="dropdown-menu">
																<li class="dropdown-submenu">
																	<a class="dropdown-item" href="#">Pregrado</a>
																	<ul class="dropdown-menu">
																		<li><a class="dropdown-item" href="contact-us-advanced.php">Portal Admisión Pregrado</a></li>
																		<li><a class="dropdown-item" href="contact-us.html">Modalidades de Admisión</a></li>
																		<li><a class="dropdown-item" href="contact-us-recaptcha.html">Costos de Admisión</a></li>
																		<li><a class="dropdown-item" href="contact-us-recaptcha.html">Cronograma de Admisión</a></li>
																		<li><a class="dropdown-item" href="contact-us-recaptcha.html">Vacantes y Plazas</a></li>
																	</ul>
																</li>
																<li class="dropdown-submenu">
																	<a class="dropdown-item" href="#">Postgrado</a>
																	<ul class="dropdown-menu">
																		<li><a class="dropdown-item" href="about-us-advanced.html">Datos de Admisión</a></li>
																		<li><a class="dropdown-item" href="about-us.html">Costos de Admisión</a></li>
																		<li><a class="dropdown-item" href="contact-us-recaptcha.html">Cronograma de Admisión</a></li>
																		<li><a class="dropdown-item" href="contact-us-recaptcha.html">Vacantes y Plazas</a></li>
																	</ul>
																</li>
															</ul>
														</li>

														<li class="dropdown dropdown-mega">
															<a class="dropdown-item dropdown-toggle" href="elements.html">
																Pregrado
															</a>
															<ul class="dropdown-menu">
																<li>
																	<div class="dropdown-mega-content">
																		<div class="row">
																			<div class="col-lg-3">
																				{{-- <span class="dropdown-mega-sub-title">Elements 1</span> --}}
																				<ul class="dropdown-mega-sub-nav">
																					<li><a class="dropdown-item" href="elements-accordions.html">Facultad de Ciencias del Ambiente</a></li>
																					<li><a class="dropdown-item" href="elements-toggles.html">Ingeniería Ambiental</a></li>
																					<li><a class="dropdown-item" href="elements-tabs.html">Ingeniería Sanitaria</a></li>
																					<li><a class="dropdown-item" href="elements-icons.html">Icons</a></li>
																					<li><a class="dropdown-item" href="elements-icon-boxes.html">Icon Boxes</a></li>
																					<li><a class="dropdown-item" href="elements-carousels.html">Carousels</a></li>
																					<li><a class="dropdown-item" href="elements-modals.html">Modals</a></li>
																					<li><a class="dropdown-item" href="elements-lightboxes.html">Lightboxes</a></li>
																					<li><a class="dropdown-item" href="elements-word-rotator.html">Word Rotator</a></li>
																					<li><a class="dropdown-item" href="elements-tooltips-popovers.html">Tooltips &amp; Popovers</a></li>
																					<li><a class="dropdown-item" href="elements-buttons.html">Buttons</a></li>
																					<li><a class="dropdown-item" href="elements-badges.html">Badges</a></li>
																				</ul>
																			</div>
																			<div class="col-lg-3">
																				<span class="dropdown-mega-sub-title">Elements 2</span>
																				<ul class="dropdown-mega-sub-nav">
																					<li><a class="dropdown-item" href="elements-lists.html">Lists</a></li>
																					<li><a class="dropdown-item" href="elements-cards.html">Cards</a></li>
																					<li><a class="dropdown-item" href="elements-image-gallery.html">Image Gallery</a></li>
																					<li><a class="dropdown-item" href="elements-image-frames.html">Image Frames</a></li>
																					<li><a class="dropdown-item" href="elements-image-hotspots.html">Image Hotspots</a></li>
																					<li><a class="dropdown-item" href="elements-before-after.html">Before / After</a></li>
																					<li><a class="dropdown-item" href="elements-360-image-viewer.html">360º Image Viewer</a></li>
																					<li><a class="dropdown-item" href="elements-cascading-images.html">Cascading Images</a></li>
																					<li><a class="dropdown-item" href="elements-random-images.html">Random Images</a></li>
																					<li><a class="dropdown-item" href="elements-testimonials.html">Testimonials</a></li>
																					<li><a class="dropdown-item" href="elements-blockquotes.html">Blockquotes</a></li>							
																					<li><a class="dropdown-item" href="elements-sticky-elements.html">Sticky Elements</a></li>							
																				</ul>
																			</div>
																			<div class="col-lg-3">
																				<span class="dropdown-mega-sub-title">Elements 3</span>
																				<ul class="dropdown-mega-sub-nav">
																					<li><a class="dropdown-item" href="elements-typography.html">Typography</a></li>
																					<li><a class="dropdown-item" href="elements-read-more.html">Read More</a></li>
																					<li><a class="dropdown-item" href="elements-call-to-action.html">Call to Action</a></li>
																					<li><a class="dropdown-item" href="elements-pricing-tables.html">Pricing Tables</a></li>
																					<li><a class="dropdown-item" href="elements-tables.html">Tables</a></li>
																					<li><a class="dropdown-item" href="elements-progressbars.html">Progress Bars</a></li>
																					<li><a class="dropdown-item" href="elements-process.html">Process</a></li>
																					<li><a class="dropdown-item" href="elements-counters.html">Counters</a></li>
																					<li><a class="dropdown-item" href="elements-countdowns.html">Countdowns</a></li>
																					<li><a class="dropdown-item" href="elements-sections.html">Sections</a></li>
																					<li><a class="dropdown-item" href="elements-parallax.html">Parallax</a></li>
																					<li><a class="dropdown-item" href="elements-shape-dividers.html">Shape Dividers</a></li>
																				</ul>
																			</div>
																			<div class="col-lg-3">
																				<span class="dropdown-mega-sub-title">Elements 4</span>
																				<ul class="dropdown-mega-sub-nav">
																					<li><a class="dropdown-item" href="elements-headings.html">Headings</a></li>
																					<li><a class="dropdown-item" href="elements-dividers.html">Dividers</a></li>
																					<li><a class="dropdown-item" href="elements-animations.html">Animations</a></li>
																					<li><a class="dropdown-item" href="elements-particles.html">Particles</a></li>
																					<li><a class="dropdown-item" href="elements-medias.html">Medias</a></li>
																					<li><a class="dropdown-item" href="elements-maps.html">Maps</a></li>
																					<li><a class="dropdown-item" href="elements-arrows.html">Arrows</a></li>
																					<li><a class="dropdown-item" href="elements-star-ratings.html">Star Ratings</a></li>
																					<li><a class="dropdown-item" href="elements-alerts.html">Alerts</a></li>
																					<li><a class="dropdown-item" href="elements-posts.html">Posts</a></li>
																					<li><a class="dropdown-item" href="elements-forms.html">Forms</a></li>
																				</ul>
																			</div>
																		</div>
																	</div>
																</li>
															</ul>
														</li>

														<li class="dropdown">
															<a class="dropdown-item dropdown-toggle" href="#">
																Postgrado
															</a>
															<ul class="dropdown-menu">
																<li>
																	<a class="dropdown-item" href="index.html#demos">
																		Escuela de Postgrado
																	</a>
																</li>
																<li>
																	<a class="dropdown-item" href="index.html#demos">
																		Maestrías
																	</a>
																</li>
																<li>
																	<a class="dropdown-item" href="index.html#demos">
																		Doctorados
																	</a>
																</li>
															</ul>
														</li>

														<li class="dropdown">
															<a class="dropdown-item" href="#">
																Investigación
															</a>
														</li>

														<li class="dropdown" >
															<a class="dropdown-item dropdown-toggle" href="#">
																Responsabilidad Social
															</a>
															<ul class="dropdown-menu">
																<li>
																	<a class="dropdown-item" href="index.html#demos">
																		Portal de Responsabilidad Social
																	</a>
																</li>
																<li>
																	<a class="dropdown-item" href="index.html#demos">
																		Bolsa de Trabajo
																	</a>
																</li>
															</ul>
														</li>

														<li class="dropdown">
															<a class="dropdown-item dropdown-toggle" href="#">
																Publicaciones
															</a>
															<ul class="dropdown-menu">
																<li>
																	<a class="dropdown-item" href="index.html#demos">
																		Fondo Editorial
																	</a>
																</li>
																<li>
																	<a class="dropdown-item" href="index.html#demos">
																		Repositorio Institucional
																	</a>
																</li>
																<li>
																	<a class="dropdown-item" href="index.html#demos">
																		Revista UNASAM
																	</a>
																</li>
															</ul>
														</li>

														<li class="dropdown">
															<a class="dropdown-item dropdown-toggle" href="#">
																Transparencia
															</a>
															<ul class="dropdown-menu">
																<li>
																	<a class="dropdown-item" href="index.html#demos">
																		Portal de Transparencia
																	</a>
																</li>
																<li>
																	<a class="dropdown-item" href="index.html#demos">
																		Documentos Normativos
																	</a>
																</li>
																<li>
																	<a class="dropdown-item" href="index.html#demos">
																		Transparencia Institucional
																	</a>
																</li>
															</ul>
														</li>

														<li class="dropdown">
															<a class="dropdown-item dropdown-toggle" href="#">
																Noticias
															</a>
															<ul class="dropdown-menu">
																<li>
																	<a class="dropdown-item" href="index.html#demos">
																		Noticias
																	</a>
																</li>
																<li>
																	<a class="dropdown-item" href="index.html#demos">
																		Eventos
																	</a>
																</li>
																<li>
																	<a class="dropdown-item" href="index.html#demos">
																		Comunicados
																	</a>
																</li>
															</ul>
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
				</div>
			</header>

			<div role="main" class="main">

				{{-- <div class="container"> --}}

				<div class="owl-carousel owl-carousel-light owl-carousel-light-init-fadeIn owl-theme manual dots-inside dots-horizontal-center dots-light show-dots-hover nav-inside nav-inside-plus nav-dark nav-md nav-font-size-md show-nav-hover mb-0" data-plugin-options="{'autoplay': true, 'autoplayTimeout': 7000, 'autoplayHoverPause': true, 'rewind': true}" data-dynamic-height="['500px','500px','500px','400px','350px']" style="height: 500px;">
					<div class="owl-stage-outer">
						<div class="owl-stage">

							@foreach($banners as  $key => $dato)

							@php
							$color = "svg-fill-color-dark appear-animation";
							if($key%2 == 0)	{
								$color = "svg-fill-color-primary mt-1 appear-animation";
							}
							@endphp

							@if($key == 0)

							<div class="owl-item position-relative">
								<div class="background-image-wrapper position-absolute top-0 left-0 right-0 bottom-0" data-appear-animation="kenBurnsToRight" data-appear-animation-duration="30s" data-plugin-options="{'minWindowWidth': 0}" data-carousel-onchange-show style="background-image: url({{ asset('/web/bannerunasam/'.$dato->url) }}); background-size: cover; background-position: center;"></div>

									<div class="container position-relative z-index-1 h-100">
										@if($dato->nombre != null && strlen(trim($dato->nombre)) > 0)
										<p class="position-absolute bottom-15 right-0 text-color-light font-weight-bold text-5-5 line-height-3 text-end pb-0 pb-lg-5 mb-0 d-none d-sm-block" {{-- style="padding-right: 50px;" --}}>
											<span class="d-block line-height-1 position-relative z-index-1 pb-5 ps-lg-3 mb-5-5 appear-animation" data-appear-animation="fadeInLeftShorterPlus" data-appear-animation-delay="2200">{{$dato->nombre}}</span>
											<span class="custom-svg-position-1">
												<svg class="{{$color}}" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="1600" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 859.45 88.44" xml:space="preserve" preserveAspectRatio="none">
													<polyline points="7.27,84.78 855.17,84.78 855.17,4.79 84.74,4.79 "/>
												</svg>
											</span>
										</p>
										@endif
									</div>
								</div> 
							@else
							<div class="owl-item position-relative" style="background-image: url({{ asset('/web/bannerunasam/'.$dato->url) }}); background-size: cover; background-position: center;">
									@if($dato->nombre != null && strlen(trim($dato->nombre)) > 0)
									<div class="container position-relative z-index-1 h-100">
										<p class="position-absolute bottom-15 right-0 text-color-light font-weight-bold text-5-5 line-height-3 text-end pb-0 pb-lg-5 mb-0 d-none d-sm-block" {{-- style="padding-right: 50px;" --}}>
											<span class="d-block line-height-1 position-relative z-index-1 pb-5 ps-lg-3 mb-5-5 appear-animation" data-appear-animation="fadeInLeftShorterPlus" data-appear-animation-delay="2200">{{$dato->nombre}}</span>
											<span class="custom-svg-position-1">
												<svg class="{{$color}}" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="1600" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 859.45 88.44" xml:space="preserve" preserveAspectRatio="none">
													<polyline points="7.27,84.78 855.17,84.78 855.17,4.79 84.74,4.79 "/>
												</svg>
											</span>
										</p>
									</div>
										@endif
								</div>
							@endif
							@endforeach

						</div>
					</div>
					<div class="owl-nav">
						<button type="button" role="presentation" class="owl-prev"></button>
						<button type="button" role="presentation" class="owl-next"></button>
					</div>
					<div class="owl-dots mb-5">
						@foreach($banners as  $key => $dato)
							@if($key == 0)
								<button role="button" class="owl-dot active"><span></span></button>
							@else
								<button role="button" class="owl-dot"><span></span></button>
							@endif
						@endforeach
					</div>
				</div>

			{{-- </div> --}}
				

				<section class="section-custom-medical">
					<div class="container">
						<div class="row medical-schedules">
							<div class="col-xl-3 box-one bg-color-primary appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="0" style="background-color: #008fe2 !important;">
								<div class="feature-box feature-box-style-2 align-items-center p-4">
									<div class="feature-box-icon">
										<i class="icon-people icons"></i>
									</div>
									<div class="feature-box-info">
										<h4 class="m-0 p-0">Bienestar Social</h4>
									</div>
								</div>
							</div>
							<div class="col-xl-3 box-two bg-color-tertiary appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="600">
								<h5 class="m-0">
									<a href="demo-medical-doctors.html" title="">
										Atención Permanente
										<i class="icon-arrow-right-circle icons"></i>
									</a>
								</h5>
							</div>
							
							<div class="col-xl-3 box-four bg-color-secondary p-0 appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="1800">
								<a href="tel:+008001234567" class="text-decoration-none">
									<div class="feature-box feature-box-style-2 m-0">
										<div class="feature-box-icon">
											<i class="icon-call-out icons"></i>
										</div>
										<div class="feature-box-info">
											<label class="font-weight-light">Atención a Alumnos</label>
											<strong class="font-weight-normal">
												@if($unasam != null && $unasam->telefono)
													{{$unasam->telefono}}
												@endif
											</strong>
										</div>
									</div>
								</a>
							</div>

							<div class="col-xl-3 box-three bg-color-primary appear-animation" data-appear-animation="fadeInLeft" data-appear-animation-delay="1200" style="background-color: #008fe2 !important">
								<div class="expanded-info p-4 bg-color-primary">
									<div class="info custom-info">
										<span>Lun-Vie</span>
										<span>
											@if($unasam != null && $unasam->horario_lu_vier)
												{{$unasam->horario_lu_vier}}
											@endif
										</span>
									</div>
									<div class="info custom-info">
										<span>Sabados</span>
										<span>
											@if($unasam != null && $unasam->horario_sabado)
												{{$unasam->horario_sabado}}
											@endif
										</span>
									</div>
									<div class="info custom-info">
										<span>Domingos</span>
										<span>
											@if($unasam != null && $unasam->horario_domingo)
												{{$unasam->horario_domingo}}
											@endif
										</span>
									</div>
								</div>
								<h5 class="m-0">
									Horarios de Atención
									<i class="icon-arrow-right-circle icons"></i>
								</h5>
							</div>
						</div>
						@if($presentacion != null)
							<div class="row mt-5 mb-5 pt-3 pb-3">
								<div class="col-md-8">
									@if($presentacion->titulo != null)
									<h2 class="font-weight-semibold mb-0">{{$presentacion->titulo}}</h2>
									@endif

									@if($presentacion->subtitulo != null)
									<p class="lead font-weight-normal">{{$presentacion->subtitulo}}</p>
									@endif

									@if($presentacion->descripcion != null)
									{!! $presentacion->descripcion !!}
									{{-- <p>La Universidad Nacional Santiago Antúnez de Mayolo les da la bienvenida a su nuevo Portal Web Institucional donde podrá encontrar toda la información que requiera...</p> --}}
									@endif

									
									<a class="btn btn-outline btn-quaternary custom-button text-uppercase mt-4 mb-4 mb-md-0 font-weight-bold">Leer más</a>
									
								</div>
								@if($presentacion->tieneimagen != null && $presentacion->tieneimagen == 1 && $presentacion->url != null)
								<div class="col-md-4">
									<img src="{{ asset('/web/presentacionunasam/'.$presentacion->url)}}" alt class="img-fluid box-shadow-custom" /> 
								</div>
								@endif
							</div>
						@endif
					</div>
				</section>



				<section class="section section-height-3 bg-primary border-0 m-0 appear-animation" data-appear-animation="fadeIn" style="padding-top: 60px; padding-bottom: 20px;">
					<div class="container">
						<div class="row">
							<div class="col appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
								<h2 class="font-weight-bold text-color-light text-6 mb-4">Ultimas Noticias</h2>
							</div>
						</div>
						<div class="row recent-posts appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">

							@foreach($noticias as  $key => $dato)

							<div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
								<article>
									<div class="row">
										<div class="col">
											<a href="blog-post.html" class="text-decoration-none">
												@if($dato->imagennoticia != null && $dato->imagennoticia->url != null)
												<img src="{{ asset('/web/noticiaunasam/'.$dato->imagennoticia->url) }}" class="img-fluid hover-effect-2 mb-3" alt="" />
												@else
												<img src="{{ asset('/img/Login-Background.jpg') }}" class="img-fluid hover-effect-2 mb-3" alt="" />
												@endif
											</a>
										</div>
									</div>
									<div class="row">
										<div class="col-auto pe-0">
											<div class="date">
												<span class="day bg-color-light text-color-dark font-weight-extra-bold">
													@if($dato->dia != null)
														{{$dato->dia}}
													@endif
												</span>
												<span class="month bg-color-light font-weight-semibold text-color-primary text-1">
													@if($dato->iniNombreMes != null)
														{{$dato->iniNombreMes}}
													@endif
												</span>
											</div>
										</div>
										<div class="col ps-1">
											<h4 class="line-height-3 text-4">
												<a href="blog-post.html" class="text-light">
													@if($dato->titular != null)
														{{$dato->titular}}
													@endif
												</a></h4>
											<p class="text-color-light line-height-5 opacity-6 pe-4 mb-1"> 
												<div style="height: 100px; overflow: hidden; color:white!important; " id="noticia-{{$dato->id}}"> 
													@if($dato->desarrollo != null)
														{!!$dato->desarrollo !!}
													@endif
												</div>
											</p>
											<a href="/" class="read-more text-color-light font-weight-semibold text-2">leer más <i class="fas fa-chevron-right text-1 ms-1"></i></a>
										</div>
									</div>
								</article>
							</div>
							@endforeach
						</div>

						<div class="row mb-5">
							<div class="col-lg-12 text-center" style="padding-top: 50px;">
								<a href="#" class="btn btn-dark btn-px-5 btn-py-2 font-weight-bold text-color-light rounded-0 text-2">VER TODAS LAS NOTICIAS</a>
							</div>
						</div>

					</div>
				</section>


				<section class="section border-0 m-0 pb-3">
					<div class="container">
						<div class="row">
							<div class="col appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
								<h2 class="font-weight-semibold mb-0">Eventos y Comunicados</h2>
							</div>
						</div>
						<div class="row pb-1">

							@foreach($eventos as  $key => $dato)
								<div class="col-sm-6 col-lg-4 mb-4 pb-2">
									<a href="blog-post.html">
										<article>
											<div class="thumb-info thumb-info-no-borders thumb-info-bottom-info thumb-info-bottom-info-dark thumb-info-bottom-info-show-more thumb-info-no-zoom border-radius-0">
												<div class="thumb-info-wrapper thumb-info-wrapper-opacity-6">
													@if($dato->eventoimagen != null && $dato->eventoimagen->url != null)
														<img src="{{ asset('/web/eventounasam/'.$dato->eventoimagen->url) }}" class="img-fluid" alt=" @if($dato->titulo != null)
														{{$dato->titulo}}
														@endif">
													@else
														<img src="{{ asset('/webvendor/img/blog/default/blog-46.jpg') }}" class="img-fluid" alt=" @if($dato->titulo != null)
														{{$dato->titulo}}
														@endif">
													@endif
													
													<div class="thumb-info-title bg-transparent p-4">
														<div class="thumb-info-type bg-color-primary px-2 mb-1">Ver más</div>
														<div class="thumb-info-inner mt-1">
															<h2 class="text-color-light line-height-2 text-4 font-weight-bold mb-0">
																@if($dato->titulo != null)
																	{{$dato->titulo}}
																@endif
															</h2>
														</div>
														<div class="thumb-info-show-more-content">
															<p class="mb-0 text-1 line-height-9 mb-1 mt-2 text-light opacity-5">
																<div style="height: 80px; overflow: hidden;"> 
																	@if($dato->desarrollo != null)
																		{!!$dato->desarrollo !!}
																	@endif
																</div>
															</p>
														</div>
													</div>
												</div>
											</div>
										</article>
									</a>
								</div>
							@endforeach

							<center><a class="btn btn-outline btn-quaternary custom-button text-uppercase mt-4 mb-4 mb-md-0 font-weight-bold">Ver Todos los Comunicados</a></center>
						</div>
					</div>
				</section>


			<section class="section bg-color-light border-0 m-0">

				<div class="container" >
					<div class="row">
						<div class="col appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
							<h2 class="font-weight-semibold mb-0">Calendario de Actividades</h2>
						</div>
					</div>
					<div class="row py-5">
						<div class="col-md-6 col-lg-4">



							<ul class="simple-post-list">

								@foreach($actividades as  $key => $dato)
									@if($key < 5)
										<li>
											<article>
												<div class="post-image">
													<div class="img-thumbnail img-thumbnail-no-borders d-block">
														<a href="blog-post.html">
															@if($dato->imagenactividad != null && $dato->imagenactividad->url != null)
																<img src="{{ asset('/web/comunicadoUNASAM/'.$dato->imagenactividad->url) }}" class="border-radius-0" width="50" height="50" alt=" @if($dato->titulo != null)
																{{$dato->titulo}}
																@endif">
															@else
																<img src="{{ asset('/webvendor/img/blog/default/blog-46.jpg') }}" class="border-radius-0" width="50" height="50" alt=" @if($dato->titulo != null)
																{{$dato->titulo}}
																@endif">
															@endif							
														</a>
													</div>
												</div>
												<div class="post-info">
													<h4 class="font-weight-normal text-3 line-height-4 mb-0">
														<a href="blog-post.html" class="text-dark">
															@if($dato->titulo != null)
																{{$dato->titulo}}
															@endif
														</a>
													</h4>
													<div class="post-meta">
														@if($dato->nombreMes != null)
															{{$dato->nombreMes}} {{$dato->dia}}, {{$dato->year}}
														@endif
													</div>
												</div>
											</article>
										</li>
									@endif
								@endforeach
							</ul>

						</div>
						<div class="col-md-6 col-lg-4">



							<ul class="simple-post-list">

								@foreach($actividades as  $key => $dato)
									@if($key >= 5)
										<li>
											<article>
												<div class="post-image">
													<div class="img-thumbnail img-thumbnail-no-borders d-block">
														<a href="blog-post.html">
															@if($dato->imagenactividad != null && $dato->imagenactividad->url != null)
																<img src="{{ asset('/web/comunicadoUNASAM/'.$dato->imagenactividad->url) }}" class="border-radius-0" width="50" height="50" alt=" @if($dato->titulo != null)
																{{$dato->titulo}}
																@endif">
															@else
																<img src="{{ asset('/webvendor/img/blog/default/blog-46.jpg') }}" class="border-radius-0" width="50" height="50" alt=" @if($dato->titulo != null)
																{{$dato->titulo}}
																@endif">
															@endif							
														</a>
													</div>
												</div>
												<div class="post-info">
													<h4 class="font-weight-normal text-3 line-height-4 mb-0">
														<a href="blog-post.html" class="text-dark">
															@if($dato->titulo != null)
																{{$dato->titulo}}
															@endif
														</a>
													</h4>
													<div class="post-meta">
														@if($dato->nombreMes != null)
															{{$dato->nombreMes}} {{$dato->dia}}, {{$dato->year}}
														@endif
													</div>
												</div>
											</article>
										</li>
									@endif
								@endforeach
							</ul>

						</div>

						<div class="col-lg-4">

							<h3 class="font-weight-bold text-3 mt-4 mt-md-0">Publicación Destacada</h3>

							<div class="owl-carousel owl-theme" data-plugin-options="{'items': 1, 'margin': 10, 'loop': true, 'nav': false, 'dots': false, 'autoplay': true, 'autoplayTimeout': 5000}">

								@foreach($actividades as  $key => $dato)
									@if($key < 2)
										<div>
											<a href="blog-post.html">
												<article>
													<div class="thumb-info thumb-info-no-borders thumb-info-bottom-info thumb-info-bottom-info-dark thumb-info-bottom-info-show-more thumb-info-no-zoom border-radius-0">
														<div class="thumb-info-wrapper thumb-info-wrapper-opacity-6">
															@if($dato->imagenactividad != null && $dato->imagenactividad->url != null)
																<img src="{{ asset('/web/comunicadoUNASAM/'.$dato->imagenactividad->url) }}" class="img-fluid" alt=" @if($dato->titulo != null)
																{{$dato->titulo}}
																@endif">
															@else
																<img src="{{ asset('/webvendor/img/blog/default/blog-46.jpg') }}" class="img-fluid" alt=" @if($dato->titulo != null)
																{{$dato->titulo}}
																@endif">
															@endif	
															<div class="thumb-info-title bg-transparent p-4">
																<div class="thumb-info-type bg-color-primary px-2 mb-1">
																	@if($dato->nombreMes != null)
																		{{$dato->nombreMes}} {{$dato->dia}}, {{$dato->year}}
																	@endif
																</div>
																<div class="thumb-info-inner mt-1">
																	<h2 class="text-color-light line-height-2 text-4 font-weight-bold mb-0">
																		@if($dato->titulo != null)
																			{{$dato->titulo}}
																		@endif
																	</h2>
																</div>
																<div class="thumb-info-show-more-content">
																	<p class="mb-0 text-1 line-height-9 mb-1 mt-2 text-light opacity-5">
																		<div style="max-height: 200px; overflow: hidden;"> 
																			@if($dato->desarrollo != null)
																				{!!$dato->desarrollo !!}
																			@endif
																		</div>
																	</p>
																</div>
															</div>
														</div>
													</div>
												</article>
											</a>
										</div>
									@endif
								@endforeach
							</div>
						</div>

						<center><a class="btn btn-outline btn-quaternary custom-button text-uppercase mt-4 mb-4 mb-md-0 font-weight-bold">Ver Todas las Actividades</a></center>
					</div>
				</div>
			</section>


			<section class="section border-0 m-0 pb-3">
				<div class="container">
					<div class="row">
						<div class="col appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
							<h2 class="font-weight-semibold mb-0">Nuestras Plataformas Web</h2>
						</div>
					</div>
					<div class="row pb-1">

							<div class="row">
								<div class="col">
								<div class="owl-carousel owl-theme show-nav-hover" data-plugin-options="{'items': 4, 'margin': 20, 'autoplay': true, 'autoplayTimeout': 3000, 'nav': true, 'dots': true, 'loop': true}">
								@foreach($plataformas as  $key => $dato)
								<div>
									<div class="col-lg-12 col-sm-12">
										@if($key%2 == 0)	
										<div class="featured-box featured-box-tertiary featured-box-effect-1">
										{{-- <div class="featured-box featured-box-primary featured-box-effect-1"> --}}
										@else
										<div class="featured-box featured-box-dark featured-box-effect-1">
										@endif
											<div class="box-content ">
												<a href="{{$dato->url}}" target="_blank"><i class="icon-featured far icon-screen-desktop"></i></a>
												
												<h3 class="text-color-primary font-weight-bold text-3 mb-2 mt-3">
													@if($dato->nombre != null)
													<a href="{{$dato->url}}" target="_blank">{{$dato->nombre}} <i class="fas fa-chevron-right ms-2"></i></a>
													@endif
												</h3>
{{-- 												<p class="px-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> --}}
												{{-- <p><a href="{{$dato->url}}" class="text-dark learn-more font-weight-bold text-2" target="_blank">INGRESAR <i class="fas fa-chevron-right ms-2"></i></a></p> --}}
											</div>
										</div>
									</div>
									</div>
								@endforeach
							</div>
							</div>
								
							</div>
					</div>
				</div>
			</section>




			<hr style="margin:0px;"> 
            <section class="section border-0 m-0 pb-3">

			<div class="container">
				<div class="row">
					<div class="col appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
						<h2 class="font-weight-semibold mb-0">Enlaces de Interés</h2>
					</div>
				</div>
				<div class="row py-4 my-5">
					<div class="col py-3">
						<div class="owl-carousel owl-theme mb-0" data-plugin-options="{'responsive': {'0': {'items': 1}, '476': {'items': 1}, '768': {'items': 5}, '992': {'items': 8}, '1200': {'items': 8}}, 'autoplay': true, 'autoplayTimeout': 2000, 'dots': false, 'margin': 10}">
							<div >
								<img {{-- style="border: groove #8080807d 1px" --}} class="img-fluid opacity-10" src="{{ asset('/img/slider/minedu.jpg') }}" alt="">
							</div>
							<div >
								<img {{-- style="border: groove #8080807d 1px" --}} class="img-fluid opacity-10" src="{{ asset('/img/slider/sunedu.jpg') }}" alt="">
							</div>
							<div >
								<img {{-- style="border: groove #8080807d 1px" --}} class="img-fluid opacity-10" src="{{ asset('/img/slider/sineace.jpg') }}" alt="">
							</div>
							<div >
								<img {{-- style="border: groove #8080807d 1px" --}} class="img-fluid opacity-10" src="{{ asset('/img/slider/concytec.jpg') }}" alt="">
							</div>
							<div >
								<img {{-- style="border: groove #8080807d 1px" --}} class="img-fluid opacity-10" src="{{ asset('/img/slider/dina.jpg') }}" alt="">
							</div>
							<div >
								<img {{-- style="border: groove #8080807d 1px" --}} class="img-fluid opacity-10" src="{{ asset('/img/slider/beca18.jpg') }}" alt="">
							</div>
							<div >
								<img {{-- style="border: groove #8080807d 1px" --}} class="img-fluid opacity-10" src="{{ asset('/img/slider/jovenes.jpg') }}" alt="">
							</div>
							<div >
								<img {{-- style="border: groove #8080807d 1px" --}} class="img-fluid opacity-10" src="{{ asset('/img/slider/mef.jpg') }}" alt="">
							</div>
							<div >
								<img {{-- style="border: groove #8080807d 1px" --}} class="img-fluid opacity-10" src="{{ asset('/img/slider/inaigem.jpg') }}" alt="">
							</div>
							<div >
								<img {{-- style="border: groove #8080807d 1px" --}} class="img-fluid opacity-10" src="{{ asset('/img/slider/rnsdd.jpg') }}" alt="">
							</div>
						</div>

					</div>
				</div>
			</div>
				
        </section>



			</div>

			<footer id="footer" class="bg-color-primary border-top-0" style="margin-top:0px">
				<div class="container py-4">
					<div class="row py-5" style="padding-bottom:0px!important; padding-top:20px!important;">
						<div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
							<h5 class="text-3 mb-3 opacity-7">Nosotros</h5>
							<a href="#"><p class="pe-1 text-color-light" style="margin-bottom: 0px;">Misión y Visión</p></a>
							<a href="#"><p class="pe-1 text-color-light" style="margin-bottom: 0px;">Himno Institucional</p></a>
							<a href="#"><p class="pe-1 text-color-light" style="margin-bottom: 0px;">Organigrama Institucional</p></a>
							<a href="#"><p class="pe-1 text-color-light" style="margin-bottom: 0px;">Directorio Institucional</p></a>
							<div class="alert alert-success d-none" id="newsletterSuccess">
								<strong>Success!</strong> You've been added to our email list.
							</div>
							<div class="alert alert-danger d-none" id="newsletterError"></div>
						</div>
						<div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
							<h5 class="text-3 mb-3 opacity-7">Servicios</h5>
							<a href="#"><p class="pe-1 text-color-light" style="margin-bottom: 0px;"><i class="fa fa-paper-plane text-color-light"></i> SVA Campus Virtual</p></a>
							<a href="#"><p class="pe-1 text-color-light" style="margin-bottom: 0px;"><i class="fa fa-paper-plane text-color-light"></i> SGA UNASAM</p></a>
							<a href="#"><p class="pe-1 text-color-light" style="margin-bottom: 0px;"><i class="fa fa-paper-plane text-color-light"></i> SGA Postgrado</p></a>
							<a href="#"><p class="pe-1 text-color-light" style="margin-bottom: 0px;"><i class="fa fa-paper-plane text-color-light"></i> Repositorio Institucional</p></a>
							<a href="#"><p class="pe-1 text-color-light" style="margin-bottom: 0px;"><i class="fa fa-paper-plane text-color-light"></i> Sistema de Actas y Resoluciones</p></a>	
						</div>
						<div class="col-md-6 col-lg-3 mb-4 mb-md-0">
							<h5 class="text-3 mb-3 opacity-7">CONTÁCTENOS</h5>
							<ul class="list list-icons list-icons-lg">
								<li class="mb-1"><i class="far fa-dot-circle text-color-light"></i>
									<p class="m-0 text-color-light">
										@if($unasam != null && $unasam->direccion)
											{{$unasam->direccion}}
										@endif
									</p>
								</li>
								<li class="mb-1"><i class="fab fa-whatsapp text-color-light"></i>
									<p class="m-0">
										<a class="text-color-light" href="tel:@if($unasam != null && $unasam->telefono)
											{{$unasam->telefono}}
											@endif">
											@if($unasam != null && $unasam->telefono)
												{{$unasam->telefono}}
											@endif
										</a>
									</p></li>
								<li class="mb-1"><i class="far fa-envelope text-color-light"></i>
									<p class="m-0">
										<a class="text-color-light" href="mailto:@if($unasam != null && $unasam->email)
											{{$unasam->email}}
											@endif">
											@if($unasam != null && $unasam->email)
												{{$unasam->email}}
											@endif
										</a>
									</p>
								</li>
								<li class="mb-1"><i class="far fa-id-card text-color-light"></i>
									<p class="m-0 text-color-light">
										@if($unasam != null && $unasam->ruc)
											RUC: {{$unasam->ruc}}
										@endif
									</p>
								</li>
								
							</ul>
						</div>
						<div class="col-md-6 col-lg-2">
							<h5 class="text-3 mb-3 opacity-7">SÍGANOS</h5>
							<ul class="header-social-icons social-icons">
								{{-- <li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f text-2"></i></a></li>
								<li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter text-2"></i></a></li>
								<li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in text-2"></i></a></li> --}}
                                @foreach($redsocials as  $key => $dato)
                                <li style="box-shadow:none!important;"><a href="{{$dato->urlredsocial}}" target="_blank" style="background:none!important;"><img  src="{{ asset('/web/redsocialunasam/'.$dato->url) }}" style="max-height: 28px; max-width:28px;"/></a></li>
                            @endforeach
							</ul>
						</div>
					</div>
				</div>
				<div class="footer-copyright bg-color-primary bg-color-scale-overlay bg-color-scale-overlay-1">
					<div class="bg-color-scale-overlay-wrapper">
						<div class="container py-2">
							<div class="row py-4">
								<div class="col-lg-1 d-flex align-items-center justify-content-center justify-content-lg-start mb-2 mb-lg-0">
									<a href="index.html" class="logo pe-0 pe-lg-3">
										<img alt="Porto Website Template" src="{{ asset('/img/unasam.png') }}" class="opacity-9" height="40">
									</a>
								</div>
								<div class="col-lg-7 d-flex align-items-center justify-content-center justify-content-lg-start mb-4 mb-lg-0">
									<p class="text-color-light">© Copyright 2021. UNASAM Todos los Derechos Reservados.</p>
								</div>
								<div class="col-lg-4 d-flex align-items-center justify-content-center justify-content-lg-end">
									<nav id="sub-menu">
										<ul>
											<li class="border-0"><i class="fas fa-angle-right text-color-light"></i><a href="page-faq.html" class="ms-1 text-decoration-none text-color-light"> Preguntas</a></li>
											<li class="border-0"><i class="fas fa-angle-right text-color-light"></i><a href="sitemap.html" class="ms-1 text-decoration-none text-color-light"> Mapa del Sitio</a></li>
											<li class="border-0"><i class="fas fa-angle-right text-color-light"></i><a href="contact-us.html" class="ms-1 text-decoration-none text-color-light"> Contáctenos</a></li>
										</ul>
									</nav>
								</div>
							</div>
						</div>
					</div>
				</div>
			</footer>
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

		<!-- Theme Custom -->
		<script src="{{ asset('/webvendor/js/custom.js') }}"></script>

		<!-- Theme Initialization Files -->
		<script src="{{ asset('/webvendor/js/theme.init.js') }}"></script>
		@foreach($noticias as  $key => $dato)
			<script>
				$("#noticia-{{$dato->id}} p").css("color", "#FFF");
			/* 	$(document).ready(function () {
					alert("hoa");
				}); */
			</script>
		@endforeach

	</body>
</html>
