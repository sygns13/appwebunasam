<!DOCTYPE html>
@if($escuela != null && $escuela->tipo_vista != null)
	@if($escuela->tipo_vista =='1')
		<html lang="es">
	@elseif($escuela->tipo_vista =='2')
		<html lang="es">
	@elseif($escuela->tipo_vista =='3')
		<html lang="es" class="boxed">
	@else
	<html lang="es">
	@endif
@else
	<html lang="es">
@endif
	
	@include('web/programa/partials/head')

	<body>
		<div class="body">
			
			@include('web/programa/partials/header')

			<div role="main" class="main">


				@if($escuela != null && $escuela->tipo_vista != null)
					@if($escuela->tipo_vista =='2')
						<div class="container">
					@endif
				@endif


				<div class="owl-carousel owl-carousel-light owl-carousel-light-init-fadeIn owl-theme manual dots-inside dots-horizontal-center show-dots-hover show-dots-xs show-dots-sm show-dots-md nav-style-1 nav-inside nav-inside-plus nav-dark nav-lg nav-font-size-lg show-nav-hover bg-color-quaternary custom-slider-container mb-0" data-plugin-options="{'autoplay': true, 'autoplayTimeout': 7000}" data-dynamic-height="['500px','500px','500px','400px','400px']" style="height: 500px;">
					<div class="owl-stage-outer">
						<div class="owl-stage">

							@foreach($banners as  $key => $dato)

							@if($key%2 == 0)
							<!-- Carousel Slide 1 -->
							<div class="owl-item position-relative overflow-hidden">
								<div class="background-image-wrapper position-absolute top-0 left-0 right-0 bottom-0" data-appear-animation="kenBurnsToLeft" data-appear-animation-duration="30s" data-plugin-options="{'minWindowWidth': 0}" data-carousel-onchange-show style="background-image: url({{ asset('/web/bannerprograma/'.$dato->url) }}); background-size: cover; background-position: center;"></div>
								<div class="container position-relative z-index-3 pb-5 h-100">
									<div class="row justify-content-center justify-content-lg-start align-items-center pb-5 h-100">
										<div class="col-sm-9 col-lg-7 text-center text-lg-start pb-5 mb-5">
											{{-- <h2 class="text-color-primary font-weight-bold text-uppercase text-4 line-height-3 mb-2 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500" data-plugin-options="{'minWindowWidth': 0}"><span class="line-pre-title bg-color-primary d-none d-lg-inline-block"></span>Business Consulting services located in Los Angeles, CA</h2> --}}
											<h1 class="text-color-secondary font-weight-extra-bold text-10 line-height-2 pe-lg-5 me-lg-5 mb-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="750" data-plugin-options="{'minWindowWidth': 0}">{{$dato->nombre}}</h1>
											{{-- <p class="text-4 text-color-dark font-weight-light mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000" data-plugin-options="{'minWindowWidth': 0}">Professional helping you design success!</p> --}}
											{{-- <a href="#" class="btn btn-primary btn-modern font-weight-bold text-2 btn-py-3 px-5 mt-2 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1250" data-plugin-options="{'minWindowWidth': 0}">GET STARTED</a> --}}
										</div>
									</div>
								</div>
							</div>

							@else
							<!-- Carousel Slide 2 -->
							<div class="owl-item position-relative overflow-hidden">
								<div class="background-image-wrapper position-absolute top-0 left-0 right-0 bottom-0" data-appear-animation="kenBurnsToRight" data-appear-animation-duration="30s" data-plugin-options="{'minWindowWidth': 0}" data-carousel-onchange-show style="background-image: url({{ asset('/web/bannerprograma/'.$dato->url) }}); background-size: cover; background-position: center;"></div>
								<div class="container position-relative z-index-3 pb-5 h-100">
									<div class="row align-items-center justify-content-center justify-content-lg-end pb-5 h-100">
										<div class="col-sm-9 col-lg-7 text-center text-lg-start pb-5 mb-5">
											{{-- <h3 class="text-color-primary font-weight-bold text-uppercase text-4 line-height-3 mb-2 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500" data-plugin-options="{'minWindowWidth': 0}"><span class="line-pre-title bg-color-primary d-none d-lg-inline-block"></span>Business Consulting services located in Los Angeles, CA</h3> --}}
											<h2 class="text-color-secondary font-weight-extra-bold text-10 line-height-2 pe-lg-5 me-lg-5 mb-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="750" data-plugin-options="{'minWindowWidth': 0}">{{$dato->nombre}}</h2>
											{{-- <p class="text-4 text-color-dark font-weight-light mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000" data-plugin-options="{'minWindowWidth': 0}">Professional helping you design success!</p> --}}
											{{-- <a href="#" class="btn btn-primary btn-modern font-weight-bold text-2 btn-py-3 px-5 mt-2 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1250" data-plugin-options="{'minWindowWidth': 0}">GET STARTED</a> --}}
										</div>
									</div>
								</div>
							</div>

							@endif
							@endforeach

						</div>
					</div>
					<div class="owl-nav">
						<button type="button" role="presentation" class="owl-prev"></button>
						<button type="button" role="presentation" class="owl-next"></button>
					</div>
				</div>


				@if($escuela != null && $escuela->tipo_vista != null)
				@if($escuela->tipo_vista =='2')
					</div>
				@endif
			@endif

				{{-- <section class="bg-color-light p-relative z-index-2" style="top:100px;">
					<div class="cards custom-cards custom-cards-slider h-auto pt-5 pb-4 container appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">
						<div class="row bg-color-light cards-container d-flex justify-content-center justify-content-xl-between w-100 mb-5 mx-0 box-shadow-1 p-relative top-0">
							<div class="col-sm-12 col-md-6 col-xl-4 bg-light p-0 shadow-none">
								<div class="card border-radius-0 border-0 shadow-none">
									<div class="card-body d-flex align-items-center justify-content-between flex-column z-index-1">
										<img src="{{ asset('/webvendor/img/demos/business-consulting-2/icons/strategic.png') }}" alt="Strategic Planning" class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="100">
										<h4 class="card-title mb-1 font-weight-semibold text-color-secondary appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">Strategic Planning</h4>
										<p class="card-text text-center pt-2 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra erat orci, ac auctor lacus tincidunt ut...</p>
										<a href="#" class="font-weight-bold text-uppercase text-decoration-none mt-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400">read more +</a>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-md-6 col-xl-4 bg-light p-0 shadow-none">
								<div class="card border-radius-0 border-0 shadow-none">
									<div class="card-body d-flex align-items-center justify-content-between flex-column z-index-1">
										<img src="{{ asset('/webvendor/img/demos/business-consulting-2/icons/financial.png') }}" alt="Financial Clean-Up" class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500">
										<h4 class="card-title mb-1 font-weight-semibold text-color-secondary appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600">Financial Clean-Up</h4>
										<p class="card-text text-center pt-2 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra erat orci, ac auctor lacus tincidunt ut...</p>
										<a href="#" class="font-weight-bold text-uppercase text-decoration-none mt-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="800">read more +</a>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-md-6 col-xl-4 bg-light p-0 shadow-none">
								<div class="card border-radius-0 border-0 shadow-none">
									<div class="card-body d-flex align-items-center justify-content-between flex-column z-index-1 border-end-0">
										<img src="{{ asset('/webvendor/img/demos/business-consulting-2/icons/cash.png') }}" alt="Cash Flow Planning" class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="900">
										<h4 class="card-title mb-1 font-weight-semibold text-color-secondary appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000">Cash Flow Planning</h4>
										<p class="card-text text-center pt-2 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1100">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra erat orci, ac auctor lacus tincidunt ut...</p>
										<a href="#" class="font-weight-bold text-uppercase text-decoration-none mt-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1200">read more +</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section> --}}

				@if($presentacion != null)
				<section class="our-services d-flex p-relative z-index-1 bg-color-light lazyload" data-bg-src="{{ asset('/web/presentacionprograma/'.$presentacion->url)}}" style=" background-repeat: no-repeat;
					background-size: contain; background-size: auto 500px; min-height: 0px; padding-top: 25px;">
					<div class="col-img-our-services p-absolute overflow-hidden w-50 h-100"></div>
					<div class="container">
						<div class="row justify-content-end align-items-center h-100">
							<div class="col-lg-6 position-relative bg-color-light z-index-1 col-our-services-text">
								<p class="text-uppercase font-weight-semibold mb-1 text-color-primary appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="100"><span class="line-pre-title bg-color-primary"></span>Presentación</p>
								<h2 class="text-color-secondary font-weight-bold text-capitalize mb-4 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="200">
									@if($presentacion->titulo != null)
									{{$presentacion->titulo}}
									@endif
								</h2>
								<p class="font-weight-semibold mb-4 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="300">
									@if($presentacion->subtitulo != null)
									{{$presentacion->subtitulo}}
									@endif
								</p>
								<p class="mb-4 pb-2 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="400">
									
									@if($presentacion->descripcion != null)
									<div style="height: 200px; overflow: hidden;">
									{!!$presentacion->descripcion!!} 
									</div>
									@endif

								</p>
								{{-- <div class="accordion accordion-sm appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="500" id="accordionServices">
									<div class="border-radius mb-1 border-0 card-accordion-our-services-container">
										<div class="card-header py-2 bg-color-quaternary">
											<h4 class="card-title m-0">
												<a class="accordion-toggle text-color-tertiary font-weight-semibold" data-bs-toggle="collapse" data-bs-parent="#accordionServices" href="#collapse3One">
													Management Consulting
												</a>
											</h4>
										</div>
										<div id="collapse3One" class="collapse card-accordion-our-services show">
											<div class="card-body">
												<p class="mb-0">Cras a elit sit amet leo accumsan volutpat. Suspendisse hendrerit vehicula leo, vel efficitur felis ultrices non. Integer aliquet ullamcorper dolor, quis sollicitudin.</p>
												<a href="demo-business-consulting-2-services.html" class="font-weight-bold text-uppercase text-decoration-none d-block mt-3">read more +</a>
											</div>
										</div>
									</div>
									<div class="border-radius mb-1 border-0 card-accordion-our-services-container">
										<div class="card-header py-2 bg-color-quaternary">
											<h4 class="card-title m-0">
												<a class="accordion-toggle text-color-tertiary font-weight-semibold" data-bs-toggle="collapse" data-bs-parent="#accordionServices" href="#collapse3Two">
													Business Coaching
												</a>
											</h4>
										</div>
										<div id="collapse3Two" class="collapse card-accordion-our-services">
											<div class="card-body">
												<p class="mb-0">Cras a elit sit amet leo accumsan volutpat. Suspendisse hendrerit vehicula leo, vel efficitur felis ultrices non. Integer aliquet ullamcorper dolor, quis sollicitudin.</p>
												<a href="demo-business-consulting-2-services.html" class="font-weight-bold text-uppercase text-decoration-none d-block mt-3">read more +</a>
											</div>
										</div>
									</div>
									<div class="border-radius mb-1 border-0 card-accordion-our-services-container">
										<div class="card-header py-2 bg-color-quaternary">
											<h4 class="card-title m-0">
												<a class="accordion-toggle text-color-tertiary font-weight-semibold" data-bs-toggle="collapse" data-bs-parent="#accordionServices" href="#collapse3Three">
													Performance Consulting and Coaching
												</a>
											</h4>
										</div>
										<div id="collapse3Three" class="collapse card-accordion-our-services">
											<div class="card-body">
												<p class="mb-0">Cras a elit sit amet leo accumsan volutpat. Suspendisse hendrerit vehicula leo, vel efficitur felis ultrices non. Integer aliquet ullamcorper dolor, quis sollicitudin.</p>
												<a href="demo-business-consulting-2-services.html" class="font-weight-bold text-uppercase text-decoration-none d-block mt-3">read more +</a>
											</div>
										</div>
									</div>
									<div class="border-radius mb-1 border-0 card-accordion-our-services-container">
										<div class="card-header py-2 bg-color-quaternary">
											<h4 class="card-title m-0">
												<a class="accordion-toggle text-color-tertiary font-weight-semibold" data-bs-toggle="collapse" data-bs-parent="#accordionServices" href="#collapse3Four">
													Strategy and Marketing
												</a>
											</h4>
										</div>
										<div id="collapse3Four" class="collapse card-accordion-our-services">
											<div class="card-body">
												<p class="mb-0">Cras a elit sit amet leo accumsan volutpat. Suspendisse hendrerit vehicula leo, vel efficitur felis ultrices non. Integer aliquet ullamcorper dolor, quis sollicitudin.</p>
												<a href="demo-business-consulting-2-services.html" class="font-weight-bold text-uppercase text-decoration-none d-block mt-3">read more +</a>
											</div>
										</div>
									</div>
									<div class="border-radius mb-1 border-0 card-accordion-our-services-container">
										<div class="card-header py-2 bg-color-quaternary">
											<h4 class="card-title m-0">
												<a class="accordion-toggle text-color-tertiary font-weight-semibold" data-bs-toggle="collapse" data-bs-parent="#accordionServices" href="#collapse3Five">
													Service Benchmarking
												</a>
											</h4>
										</div>
										<div id="collapse3Five" class="collapse card-accordion-our-services">
											<div class="card-body">
												<p class="mb-0">Cras a elit sit amet leo accumsan volutpat. Suspendisse hendrerit vehicula leo, vel efficitur felis ultrices non. Integer aliquet ullamcorper dolor, quis sollicitudin.</p>
												<a href="demo-business-consulting-2-services.html" class="font-weight-bold text-uppercase text-decoration-none d-block mt-3">read more +</a>
											</div>
										</div>
									</div>
								</div> --}}

								<a href="/programadeestudio/presentacion/{{$escuela->hash}}" class="btn btn-primary custom-btn text-center text-uppercase text-decoration-none border-0 py-0 px-5 font-weight-semibold mt-4 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="600">LEER MÁS</a>
							</div>	
						</div>
					</div>
				</section>
				@endif

				{{-- <section class="coaching-consulting d-flex p-relative bg-color-light pt-3 pb-3 pt-lg-5 pb-lg-4">
					<div class="container">
						<div class="row justify-content-end py-5">
							<div class="col-lg-6">
								<p class="text-uppercase font-weight-semibold mb-1 text-color-primary appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="100"><span class="line-pre-title bg-color-primary"></span>Eventos del Programa de Estudio</p>
								<h2 class="text-color-secondary font-weight-bold text-capitalize mb-4 custom-letter-spacing-2 custom-text-1 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="200">Experienced Team</h2>
								<p class="font-weight-semibold mb-4 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="300">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras a elit sit amet leo accumsan volutpat. Suspendisse hendrerit vehicula leo, vel efficitur felis ultrices non. Integer aliquet ullamcorper dolor, quis sollicitudin.</p>
								<p class="mb-4 pb-2 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="400">Cras a elit sit amet leo accumsan volutpat. Suspendisse hendrerit vehicula leo, vel efficitur felis ultrices non. Integer aliquet ullamcorper dolor, quis sollicitudin.</p>
								<div class="d-flex align-items-center justify-content-start appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="600">
									<div class="circular-bar custom-circular-bar m-0">
										<div class="circular-bar-chart" data-percent="89" data-plugin-options="{'barColor': '#e8465f'}">
											<strong class="text-5 text-color-tertiary">89%</strong>
										</div>
									</div>
									<h4 class="font-weight-bold text-color-tertiary m-0 ms-3">Successful cases<br/>in 15 years.</h4>
								</div>
							</div>
							<div class="col-lg-6 col-coaching-consulting-imgs p-relative">
								<div class="card border-radius-0 box-shadow-1 border-0 p-3 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="300">
									<img src="{{ asset('/webvendor/img/demos/business-consulting-2/coaching/coaching-1.jpg') }}" class="img-fluid border-radius-0" alt="">
								</div>
								<div class="card border-radius-0 box-shadow-1 border-0 p-3 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="300">
									<img src="{{ asset('/webvendor/img/demos/business-consulting-2/coaching/coaching-2.jpg') }}" class="img-fluid border-radius-0" alt="">
								</div>
								<div class="card border-radius-0 box-shadow-1 border-0 p-3 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="300">
									<img src="{{ asset('/webvendor/img/demos/business-consulting-2/coaching/coaching-3.jpg') }}" class="img-fluid border-radius-0" alt="">
								</div>								
							</div>
						</div>
					</div>
				</section> --}}

				<section class="real-word-stories bg-color-quaternary overflow-hidden p-relative pb-4">
					<div class="container py-xl-5">
						<div class="row justify-content-between  pt-5 py-xl-5 mt-3">
							<div class="col-xl-6 mb-5 pb-5 mb-xl-0 pb-xl-0"><a href="/programadeestudio/{{$facultad->hash}}/eventos">
								<p class="text-uppercase font-weight-semibold mb-1 text-color-primary appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="300"><span class="line-pre-title bg-color-primary"></span>EVENTOS DEL PROGRAMA DE ESTUDIO</p></a>
								<div class="appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="100">
									<div class="owl-carousel owl-theme m-0" data-plugin-options="{'items': 1, 'autoplay': false, 'animateOut': 'fadeOut', 'autoHeight': true}">
										@foreach($eventos as  $key => $dato)
											<div class="custom-testimonial-container bg-color-light">
												<div class="testimonial custom-testimonial testimonial-style-2 mb-0">
													<div class="d-none d-sm-flex align-items-center justify-content-center custom-testimonial-right bg-color-light p-absolute z-index-1">
														

														@if($dato->eventoimagen != null && $dato->eventoimagen->url != null)
															{{-- <img src="{{ asset('/web/eventoprograma/'.$dato->eventoimagen->url) }}" alt=" @if($dato->titulo != null)
															{{$dato->titulo}}
															@endif" style="height: 150px; width:150px;"> --}}

															<a class="img-thumbnail d-block lightbox" href="{{ asset('/web/eventoprograma/'.$dato->eventoimagen->url) }}"  data-plugin-options="{'type':'image'}">
																<img class="img-fluid" src="{{ asset('/web/eventoprograma/'.$dato->eventoimagen->url) }}" alt="Evento" style="height: 130px; width:150px;">
															</a>
														@else
															{{-- <img src="{{ asset('/webvendor/img/blog/default/blog-46.jpg') }}" alt=" @if($dato->titulo != null)
															{{$dato->titulo}}
															@endif" style="height: 150px; width:150px;"> --}}

															<a class="img-thumbnail d-block lightbox" href="{{ asset('/webvendor/img/blog/default/blog-46.jpg') }}"  data-plugin-options="{'type':'image'}">
																<img class="img-fluid" src="{{ asset('/webvendor/img/blog/default/blog-46.jpg') }}" alt="Evento" style="height: 130px; width:150px;">
															</a>
														@endif



														<a href="/programadeestudio/evento/{{$dato->hash}}/{{$escuela->hash}}" class="d-block btn btn-primary custom-button-testimonial-right text-center text-uppercase text-decoration-none border-0 p-0 font-weight-semibold p-absolute">Leer más</a>
													</div>
													<blockquote class="px-0 pb-5">
														<h4 class="text-color-secondary font-weight-bold text-start">
															@if($dato->titulo != null)
																{{$dato->titulo}}
															@endif
														</h4>
														<p class="mb-0 text-start text-3">

															<div style="height: 80px; overflow: hidden;"> 
																@if($dato->desarrollo != null)
																	{!!$dato->desarrollo !!}
																@endif
															</div>
															
															<a href="/programadeestudio/evento/{{$dato->hash}}/{{$escuela->hash}}" class="font-weight-bold text-uppercase text-decoration-none d-block d-sm-none mt-3">Leer más</a></p>
													</blockquote>
													<div class="testimonial-arrow-down"></div>
													{{-- <div class="testimonial-author d-flex flex-row justify-content-start align-items-center">
														<img src="{{ asset('/webvendor/img/avatars/avatar-3.jpg') }}" class="img-fluid rounded-circle m-0 me-3" alt="">
														<p><strong class="font-weight-extra-bold text-start text-color-secondary mb-1">John Smith</strong><span class="text-uppercase text-start">Manager</span></p>
													</div> --}}
												</div>
											</div>
										@endforeach
									</div>
								</div>
							</div>
							<div class="col-xl-5 mb-5 mb-xl-0">
								<a href="/programadeestudio/{{$escuela->hash}}/comunicados">
								<p class="text-uppercase font-weight-semibold mb-1 text-color-primary appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="300"><span class="line-pre-title bg-color-primary"></span>Comunicados</p></a>
								{{-- <h2 class="text-color-secondary font-weight-bold text-capitalize mb-4 custom-letter-spacing-2 custom-text-1 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="400">Sucessful Cases</h2>
								<p class="font-weight-semibold mb-4 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="500">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras a elit sit amet leo accumsan volutpat.</p>
								<p class="mb-4 pb-2 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="600">Cras a elit sit amet leo accumsan volutpat. Suspendisse hendrerit vehicula leo, vel efficitur felis ultrices non. Integer aliquet ullamcorper dolor, quis sollicitudin.</p>
								<div class="counters custom-counters d-flex">
									<div class="counter counter-primary appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000">
										<strong data-to="240" data-append="+">0</strong>
										<label class="text-color-primary font-weight-bold">Satisfied Clients</label>
									</div>
									<div class="counter counter-primary appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1200">
										<strong data-to="2000" data-append="+">0</strong>
										<label class="text-color-primary font-weight-bold">Successfull Cases</label>
									</div>
								</div> --}}

								<div class="owl-carousel owl-theme" data-plugin-options="{'items': 1, 'margin': 10, 'loop': true, 'nav': false, 'dots': false, 'autoplay': true, 'autoplayTimeout': 5000}">

									@foreach($comunicados as  $key => $dato)
										@if($key < 3)
											<div>
												<a href="/programadeestudio/comunicado/{{$dato->hash}}/{{$escuela->hash}}">
													<article>
														<div class="thumb-info thumb-info-no-borders thumb-info-bottom-info thumb-info-bottom-info-dark thumb-info-bottom-info-show-more thumb-info-no-zoom border-radius-0">
															<div class="thumb-info-wrapper thumb-info-wrapper-opacity-6" style="height: 350px;">
																@if($dato->imagencomunicado != null && $dato->imagencomunicado->url != null)
																	<img src="{{ asset('/web/comunicadoprograma/'.$dato->imagencomunicado->url) }}" class="img-fluid" alt=" @if($dato->titulo != null)
																	{{$dato->titulo}}
																	@endif" style="height: 350px; width:100%;">
																@else
																	<img src="{{ asset('/webvendor/img/blog/default/blog-46.jpg') }}" class="img-fluid" alt=" @if($dato->titulo != null)
																	{{$dato->titulo}}
																	@endif" style="height: 350px; width:100%;">
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
						</div>
					</div>
				</section>

				<section class="are-you-looking-for bg-color-secondary">
					<div class="container">
						<div class="row justify-content-between">
							<div class="col-xl-5">
								<p class="text-uppercase font-weight-semibold mb-1 text-color-light appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="100"><span class="line-pre-title bg-color-primary appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="200" style="background-color:#2a3deb!important;"></span>Resumen del programa de Estudio</p>
								<h2 class="text-color-light font-weight-bold text-capitalize mb-1 letter-spacing-08 font-size-32 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="200">{{$escuela->nombre}}</h2>
								{{-- <p class="font-weight-semibold text-color-light mb-0 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="300">Visualizar</p> --}}
							</div>
							<div class="col-xl-6 d-flex align-items-start align-items-sm-center justify-content-start justify-content-xl-start mt-4 mt-xl-0 flex-column flex-sm-row">
								{{-- <span class="are-you-looking-for-phone py-2 d-flex align-items-center text-color-light font-weight-semibold text-uppercase text-4 mb-4 mb-md-0 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="500">
									<span>
										<img width="18" height="25" src="{{ asset('/webvendor/img/demos/business-consulting-2/icons/phone.svg') }}" alt="Phone">
									</span>
									<a class="text-color-light text-decoration-none" href="tel:123-456-7890">(800) 123-4567</a>
								</span> --}}
								<a href="/programadeestudio/resumen/{{$escuela->hash}}" class="btn btn-primary custom-btn text-center text-uppercase text-decoration-none border-0 py-0 px-5 font-weight-semibold appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="600" style="background-color:#2a3deb!important;">Visualizar</a>
							</div>
						</div>
					</div>
				</section>

				<section class="our-blog">
					<div class="container">
						<div class="row mt-3 pt-5">
							<div class="col"><a href="/programadeestudio/{{$facultad->hash}}/noticias">
								<p class="text-uppercase font-weight-semibold mb-1 text-color-primary appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="100"><span class="line-pre-title bg-color-primary"></span>Nuestras Noticias</p></a>
								<h2 class="text-color-secondary font-weight-bold text-capitalize mb-4 custom-letter-spacing-2 custom-text-1 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="200">Novedades</h2>
							</div>
						</div>
						<div class="row mb-3 pb-5">
							<div class="col">
								<div class="row">

									@foreach($noticias as  $key => $dato)

									<div class="col-lg-6 mb-4 mb-lg-0">
										<article>
											<div class="card border-0 border-radius-0 box-shadow-1 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500">
												<div class="card-body p-4 z-index-1">
													<a href="/programadeestudio/noticia/{{$dato->hash}}/{{$escuela->hash}}">

														@if($dato->imagennoticia != null && $dato->imagennoticia->url != null)
															<img class="card-img-top border-radius-0 img-thumbnail d-block" src="{{ asset('/web/noticiaprograma/'.$dato->imagennoticia->url) }}" alt="Card Image" style="height: 200px; width:100%;">
														@else
															<img class="card-img-top border-radius-0 img-thumbnail d-block" src="{{ asset('/img/Login-Background.jpg') }}" alt="Card Image" style="height: 200px; width:100%;">
														@endif

													</a>
													<p class="text-uppercase text-1 mb-3 pt-1 text-color-default">
														<time pubdate datetime="2021-01-10">
															@if($dato->dia != null)
																{{$dato->dia}} de {{$dato->nombreMes}}, de {{$dato->anio}}
															@endif
														</time>
														 {{-- <span class="opacity-3 d-inline-block px-2">|</span> 3 Comments <span class="opacity-3 d-inline-block px-2">|</span> John Doe</p> --}}
													<div class="card-body p-0">
														<h4 class="card-title mb-3 text-5 font-weight-bold">
															<a class="text-color-secondary" href="/programadeestudio/noticia/{{$dato->hash}}/{{$escuela->hash}}">
																@if($dato->titular != null)
																	{{$dato->titular}}
																@endif
															</a>
														</h4>
														<div style="height: 200px; overflow: hidden;" id="noticia-{{$dato->id}}"> 
															<p class="card-text mb-3">
																@if($dato->desarrollo != null)
																	{!!$dato->desarrollo !!}
																@endif
															</p>
														</div>
														<a href="/programadeestudio/noticia/{{$dato->hash}}/{{$escuela->hash}}" class="font-weight-bold text-uppercase text-decoration-none d-block mt-3">Ver más</a>
													</div>
												</div>
											</div>
										</article>
									</div>
									@endforeach




									{{-- <div class="col-lg-6 mb-4 mb-lg-0">
										<article>
											<div class="card border-0 border-radius-0 box-shadow-1 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500">
												<div class="card-body p-4 z-index-1">
													<a href="demo-business-consulting-2-blog-post.html">
														<img class="card-img-top border-radius-0" src="{{ asset('/webvendor/img/demos/business-consulting-2/blog/blog-1.png') }}" alt="Card Image">
													</a>
													<p class="text-uppercase text-1 mb-3 pt-1 text-color-default"><time pubdate datetime="2021-01-10">10 Jan 2021</time> <span class="opacity-3 d-inline-block px-2">|</span> 3 Comments <span class="opacity-3 d-inline-block px-2">|</span> John Doe</p>
													<div class="card-body p-0">
														<h4 class="card-title mb-3 text-5 font-weight-bold"><a class="text-color-secondary" href="demo-business-consulting-2-blog-post.html">An Interview with John Doe</a></h4>
														<p class="card-text mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra lorem ipsum erat orci, ac auctor lacus tincidunt ut...</p>
														<a href="demo-business-consulting-2-blog-post.html" class="font-weight-bold text-uppercase text-decoration-none d-block mt-3">Read More +</a>
													</div>
												</div>
											</div>
										</article>
									</div>
									<div class="col-lg-6">
										<article>
											<div class="card border-0 border-radius-0 box-shadow-1 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="700">
												<div class="card-body p-4 z-index-1">
													<a href="demo-business-consulting-2-blog-post.html">
														<img class="card-img-top border-radius-0" src="{{ asset('/webvendor/img/demos/business-consulting-2/blog/blog-2.png') }}" alt="Card Image">
													</a>
													<p class="text-uppercase text-1 mb-3 pt-1 text-color-default"><time pubdate datetime="2021-01-10">10 Jan 2021</time> <span class="opacity-3 d-inline-block px-2">|</span> 3 Comments <span class="opacity-3 d-inline-block px-2">|</span> John Doe</p>
													<div class="card-body p-0">
														<h4 class="card-title mb-3 text-5 font-weight-bold"><a class="text-color-secondary" href="demo-business-consulting-2-blog-post.html">How to Grow your Business</a></h4>
														<p class="card-text mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra lorem ipsum erat orci, ac auctor lacus tincidunt ut...</p>
														<a href="demo-business-consulting-2-blog-post.html" class="font-weight-bold text-uppercase text-decoration-none d-block mt-3">Read More +</a>
													</div>
												</div>
											</div>
										</article>
									</div> --}}									
								</div>
							</div>
						</div>
					</div>
				</section>

			</div>

			@include('web/programa/partials/footer')
		</div>

		@include('web/programa/partials/scripts')

	</body>
</html>