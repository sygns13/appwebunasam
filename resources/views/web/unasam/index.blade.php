<!DOCTYPE html>

@if($unasam != null && $unasam->tipo_vista != null)
	@if($unasam->tipo_vista =='1')
		<html lang="es">
	@elseif($unasam->tipo_vista =='2')
		<html lang="es">
	@elseif($unasam->tipo_vista =='3')
		<html lang="es" class="boxed">
	@else
	<html lang="es">
	@endif
@else
	<html lang="es">
@endif


@include('web/unasam/partials/head')

	<body data-plugin-page-transition>
		<div class="body">

			@include('web/unasam/partials/header')

			<div role="main" class="main">

				@if($unasam != null && $unasam->tipo_vista != null)
					@if($unasam->tipo_vista =='2')
						<div class="container">
					@endif
				@endif

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

							@if($key%2 == 0)

							<div class="owl-item position-relative">
								<div class="background-image-wrapper position-absolute top-0 left-0 right-0 bottom-0" data-appear-animation="kenBurnsToRight" data-appear-animation-duration="30s" data-plugin-options="{'minWindowWidth': 0}" data-carousel-onchange-show style="background-image: url({{ asset('/web/bannerunasam/'.$dato->url) }}); background-size: cover; background-position: center;"></div>

									<div class="container position-relative z-index-1 h-100">
										@if($dato->nombre != null && strlen(trim($dato->nombre)) > 0)
										
										@if($unasam != null && $unasam->tipo_vista != null)
											@if($unasam->tipo_vista =='2' || $unasam->tipo_vista =='3')
											<p class="position-absolute bottom-15 right-0 text-color-light font-weight-bold text-5-5 line-height-3 text-end pb-0 pb-lg-5 mb-0 d-none d-sm-block" style="padding-right: 100px;">
											@else
												<p class="position-absolute bottom-15 right-0 text-color-light font-weight-bold text-5-5 line-height-3 text-end pb-0 pb-lg-5 mb-0 d-none d-sm-block" {{-- style="padding-right: 50px;" --}}>
											@endif
										@else
											<p class="position-absolute bottom-15 right-0 text-color-light font-weight-bold text-5-5 line-height-3 text-end pb-0 pb-lg-5 mb-0 d-none d-sm-block" {{-- style="padding-right: 50px;" --}}>
										@endif
										
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

										@if($unasam != null && $unasam->tipo_vista != null)
											@if($unasam->tipo_vista =='2' || $unasam->tipo_vista =='3')
											<p class="position-absolute bottom-15 right-0 text-color-light font-weight-bold text-5-5 line-height-3 text-end pb-0 pb-lg-5 mb-0 d-none d-sm-block" style="padding-right: 100px;">
											@else
												<p class="position-absolute bottom-15 right-0 text-color-light font-weight-bold text-5-5 line-height-3 text-end pb-0 pb-lg-5 mb-0 d-none d-sm-block" {{-- style="padding-right: 50px;" --}}>
											@endif
										@else
											<p class="position-absolute bottom-15 right-0 text-color-light font-weight-bold text-5-5 line-height-3 text-end pb-0 pb-lg-5 mb-0 d-none d-sm-block" {{-- style="padding-right: 50px;" --}}>
										@endif

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

			@if($unasam != null && $unasam->tipo_vista != null)
				@if($unasam->tipo_vista =='2')
					</div>
				@endif
			@endif
				

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
									<a href="#" title="">
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
												@if($unasam != null && $unasam->telefono != null)
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
											@if($unasam != null && $unasam->horario_lu_vier != null)
												{{$unasam->horario_lu_vier}}
											@endif
										</span>
									</div>
									<div class="info custom-info">
										<span>Sabados</span>
										<span>
											@if($unasam != null && $unasam->horario_sabado != null)
												{{$unasam->horario_sabado}}
											@endif
										</span>
									</div>
									<div class="info custom-info">
										<span>Domingos</span>
										<span>
											@if($unasam != null && $unasam->horario_domingo != null)
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
									<div style="height: 100px; overflow: hidden;"> 
									{!! $presentacion->descripcion !!}
									</div>
									{{-- <p>La Universidad Nacional Santiago Antúnez de Mayolo les da la bienvenida a su nuevo Portal Web Institucional donde podrá encontrar toda la información que requiera...</p> --}}
									@endif

									
									<a class="btn btn-outline btn-quaternary custom-button text-uppercase mt-4 mb-4 mb-md-0 font-weight-bold" href="presentacion">Leer más</a>
									
								</div>
								@if($presentacion->tieneimagen != null && $presentacion->tieneimagen == 1 && $presentacion->url != null)
								<div class="col-md-4">
									{{-- <img src="{{ asset('/web/presentacionunasam/'.$presentacion->url)}}" alt class="img-fluid box-shadow-custom" style="width:100%; height:300px;"/>  --}}

									<a class="img-thumbnail d-block lightbox" href="{{ asset('/web/presentacionunasam/'.$presentacion->url) }}"  data-plugin-options="{'type':'image'}">
                                        <img class="img-fluid" src="{{ asset('/web/presentacionunasam/'.$presentacion->url) }}" alt="Actividad" style="width: 100%; max-height: 320px;;">
                                    </a>
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
											<a href="noticia/{{$dato->hash}}" class="text-decoration-none">
												@if($dato->imagennoticia != null && $dato->imagennoticia->url != null)
												<img src="{{ asset('/web/noticiaunasam/'.$dato->imagennoticia->url) }}" class="img-fluid img-thumbnail d-block hover-effect-2 mb-3" alt="" style="width:100%; height:250px;"/>
												@else
												<img src="{{ asset('/img/Login-Background.jpg') }}" class="img-fluid img-thumbnail d-block hover-effect-2 mb-3" alt="" style="width:100%; height:250px;"/>
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
												<a href="noticia/{{$dato->hash}}" class="text-light">
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
											<a href="noticia/{{$dato->hash}}" class="read-more text-color-light font-weight-semibold text-2">leer más <i class="fas fa-chevron-right text-1 ms-1"></i></a>
										</div>
									</div>
								</article>
							</div>
							@endforeach
						</div>

						<div class="row mb-5">
							<div class="col-lg-12 text-center" style="padding-top: 50px;">
								<a href="noticias" class="btn btn-dark btn-px-5 btn-py-2 font-weight-bold text-color-light rounded-0 text-2">VER TODAS LAS NOTICIAS</a>
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
									<a href="evento/{{$dato->hash}}">
										<article>
											<div class="thumb-info thumb-info-no-borders thumb-info-bottom-info thumb-info-bottom-info-dark thumb-info-bottom-info-show-more thumb-info-no-zoom border-radius-0">
												<div class="thumb-info-wrapper thumb-info-wrapper-opacity-6">
													@if($dato->eventoimagen != null && $dato->eventoimagen->url != null)
														<img src="{{ asset('/web/eventounasam/'.$dato->eventoimagen->url) }}" class="img-fluid" alt=" @if($dato->titulo != null)
														{{$dato->titulo}}
														@endif" style="width:100%; height:300px;">
													@else
														<img src="{{ asset('/webvendor/img/blog/default/blog-46.jpg') }}" class="img-fluid" alt=" @if($dato->titulo != null)
														{{$dato->titulo}}
														@endif" style="width:100%; height:300px;">
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

							<center><a class="btn btn-outline btn-quaternary custom-button text-uppercase mt-4 mb-4 mb-md-0 font-weight-bold" href="eventos">Ver Todos los Comunicados</a></center>
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
														<a href="actividad/{{$dato->hash}}">
															@if($dato->imagenactividad != null && $dato->imagenactividad->url != null)
																<img src="{{ asset('/web/comunicadounasam/'.$dato->imagenactividad->url) }}" class="border-radius-0" width="50" height="50" alt=" @if($dato->titulo != null)
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
														<a href="actividad/{{$dato->hash}}" class="text-dark">
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
														<a href="actividad/{{$dato->hash}}">
															@if($dato->imagenactividad != null && $dato->imagenactividad->url != null)
																<img src="{{ asset('/web/comunicadounasam/'.$dato->imagenactividad->url) }}" class="border-radius-0" width="50" height="50" alt=" @if($dato->titulo != null)
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
														<a href="actividad/{{$dato->hash}}" class="text-dark">
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
											<a href="actividad/{{$dato->hash}}">
												<article>
													<div class="thumb-info thumb-info-no-borders thumb-info-bottom-info thumb-info-bottom-info-dark thumb-info-bottom-info-show-more thumb-info-no-zoom border-radius-0">
														<div class="thumb-info-wrapper thumb-info-wrapper-opacity-6">
															@if($dato->imagenactividad != null && $dato->imagenactividad->url != null)
																<img src="{{ asset('/web/comunicadounasam/'.$dato->imagenactividad->url) }}" class="img-fluid" alt=" @if($dato->titulo != null)
																{{$dato->titulo}}
																@endif" style="width:100%; height:350px;">
															@else
																<img src="{{ asset('/webvendor/img/blog/default/blog-46.jpg') }}" class="img-fluid" alt=" @if($dato->titulo != null)
																{{$dato->titulo}}
																@endif" style="width:100%; height:350px;">
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

						<center><a class="btn btn-outline btn-quaternary custom-button text-uppercase mt-4 mb-4 mb-md-0 font-weight-bold" href="actividades">Ver Todas las Actividades</a></center>
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
						<div class="owl-carousel owl-theme mb-0" data-plugin-options="{'responsive': {'0': {'items': 2}, '476': {'items': 2}, '768': {'items': 5}, '992': {'items': 7}, '1200': {'items': 7}}, 'autoplay': true, 'autoplayTimeout': 2000, 'dots': false, 'margin': 10}">
							@foreach($linkinteres as  $key => $dato)
								<div >
									<a  href="{{$dato->nombre}}" target="_blank">
										<img {{-- style="border: groove #8080807d 1px" --}} class="img-fluid opacity-10  img-thumbnail d-block" src="{{ asset('/web/linkinteresunasam/'.$dato->url) }}" 
										alt="" style="width:150px; height:90px;">
									</a>
								</div>
							@endforeach
						</div>

					</div>
				</div>
			</div>
				
        </section>



			</div>

			@include('web/unasam/partials/footer')
		</div>

		@include('web/unasam/partials/scripts')
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
