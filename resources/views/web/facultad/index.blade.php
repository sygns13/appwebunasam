<!DOCTYPE html>

@if($facultad != null && $facultad->tipo_vista != null)
	@if($facultad->tipo_vista =='1')
		<html lang="es">
	@elseif($facultad->tipo_vista =='2')
		<html lang="es">
	@elseif($facultad->tipo_vista =='3')
		<html lang="es" class="boxed">
	@else
	<html lang="es">
	@endif
@else
	<html lang="es">
@endif

@include('web/facultad/partials/head')
	<body>

		<div class="body">

			@include('web/facultad/partials/header')

			<div role="main" class="main">

				@if($facultad != null && $facultad->tipo_vista != null)
					@if($facultad->tipo_vista =='2')
						<div class="container">
					@endif
				@endif

				<div class="owl-carousel owl-carousel-light owl-carousel-light-init-fadeIn owl-theme manual dots-inside dots-vertical-center dots-align-right dots-orientation-portrait custom-dots-style-1 show-dots-hover show-dots-xs nav-style-1 nav-inside nav-inside-plus nav-dark nav-lg nav-font-size-lg show-nav-hover mb-0" data-plugin-options="{'autoplayTimeout': 7000}" data-dynamic-height="['500px','500px','500px','400px','350px']" style="height: 500px;">
					<div class="owl-stage-outer">
						<div class="owl-stage">

							@foreach($banners as  $key => $dato)

							<div class="owl-item position-relative overlay overlay-show overlay-op-3" style="background-image: url({{asset('/web/bannerfacultad/'.$dato->url) }}); background-size: cover; background-position: center;">
								<div class="container position-relative z-index-3 h-100">
									<div class="row align-items-center h-100">
										<div class="col pb-4">
			{{-- 								<h1 class="text-color-light font-weight-extra-bold text-13 line-height-2 mb-2 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500" data-plugin-options="{'minWindowWidth': 0}">SPECIALISTS</h1> --}}
											<h2 class="text-color-light font-weight-extra-bold text-4-5 line-height-2 mb-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="750" data-plugin-options="{'minWindowWidth': 0}">{{$dato->nombre}}</h2>
{{-- 											<div class="d-inline-block">
												<p class="text-color-light custom-border-bottom-1 font-weight-light text-4-5 mb-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000" data-plugin-options="{'minWindowWidth': 0}">We are located in New York</p>
											</div> --}}
										</div>
									</div>
								</div>
							</div>

							@endforeach


						</div>
					</div>
					<div class="owl-dots mb-5">
						<button role="button" class="owl-dot active"><span></span></button>
						<button role="button" class="owl-dot"><span></span></button>
					</div>
				</div>
				
				@if($facultad != null && $facultad->tipo_vista != null)
				@if($facultad->tipo_vista =='2')
					</div>
				@endif
			@endif

















			{{-- <section class="section bg-color-light-scale-2 border-0 m-0"> --}}
			<section class="section bg-color-light border-0 m-0">

				<div class="container">
{{-- 					<div class="row">
						<div class="col appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
							<h2 class="font-weight-semibold mb-0">Presentación</h2>
						</div>
					</div><br> --}}

					<div class="row mb-5 pb-3">
						@if($presentacion != null)
						<div class="col-md-6 col-lg-4 mb-5 mb-lg-0 appear-animation" data-appear-animation="fadeInUpShorter">

							<div class="row">
								<div class="col appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
									<h2 class="font-weight-semibold mb-0">Presentación</h2>
								</div>
							</div><br>

							<div>
								@if($presentacion->titulo != null)
									<h4 class="font-weight-normal line-height-1" style="color:#2d529f;"><b>{{$presentacion->titulo}}</b> </h4>
								@endif

								@if($presentacion->subtitulo != null)
									<p class="lead" style="color:#212529">{{$presentacion->subtitulo}}</p>
								@endif

							
								<p style="color:#212529">
									@if($presentacion->descripcion != null)
										<div style="height: 300px; overflow: hidden; color: #212529" id="idcuerpoPresentacion"> 
											{!! $presentacion->descripcion !!}
										</div>
									@endif
								</p>
								<a class="btn btn-outline btn-quaternary custom-button text-uppercase mt-4 mb-4 mb-md-0 font-weight-bold" href="presentacion/{{$facultad->hash}}">Ingresar</a>
							</div>
						</div>
						@endif
		

						<div class="col-sm-8 col-lg-8 mb-8 pb-2">
							<div class="row">
								<div class="col appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
									<a href="noticias/{{$facultad->hash}}"><h2 class="font-weight-semibold mb-0"><center>Noticias</center></h2></a>
								</div>
							</div><br>
							<div class="row">
						@foreach($noticias as  $key => $dato)


							<div class="col-md-6 col-lg-6 mb-6 mb-lg-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200"
							style="background-color: #2d529f; border: 1px solid white; padding-bottom:10px; padding-top:10px;">
								<a href="noticia/{{$dato->hash}}/{{$facultad->hash}}">
									<h5 class="mb-4" style="color:white;">
										@if($dato->titular != null)
											{{$dato->titular}}
										@endif
									</h5>
								</a>

								<div class="card">
									<a href="noticia/{{$dato->hash}}/{{$facultad->hash}}" class="text-decoration-none">
										@if($dato->imagennoticia != null && $dato->imagennoticia->url != null)
											<img class="card-img-top" src="{{ asset('/web/noticiafacultad/'.$dato->imagennoticia->url) }}" alt="Card Image" style="height: 200px;">
										@else
											<img class="card-img-top" src="{{ asset('/img/Login-Background.jpg') }}" alt="Card Image" style="height: 200px;">
										@endif
									</a>
									<div class="card-body">
										<h4 class="card-title mb-1 text-4 font-weight-bold">
											<a href="noticia/{{$dato->hash}}/{{$facultad->hash}}">
												@if($dato->dia != null)
													{{$dato->dia}} de {{$dato->nombreMes}}, de {{$dato->anio}}
												@endif
											</a>
										</h4>
										<p class="card-text mb-2 pb-1">
											<div style="height: 100px; overflow: hidden; color:white!important; " id="noticia-{{$dato->id}}"> 
												@if($dato->desarrollo != null)
													{!!$dato->desarrollo !!}
												@endif
											</div>
										</p>
										<a href="noticia/{{$dato->hash}}/{{$facultad->hash}}" class="read-more text-color-primary font-weight-semibold text-2">Leer Más <i class="fas fa-angle-right position-relative top-1 ms-1"></i></a>
									</div>
								</div>
							</div>
						@endforeach
					</div>
					</div>
					</div>
					
				</div>
			</section>










			<section class="section bg-color-light-scale-2 border-0 m-0">
				<div class="container" >
					<div class="row">
						<div class="col appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
							<a href="eventos/{{$facultad->hash}}"><h2 class="font-weight-semibold mb-0">Eventos</h2></a>
						</div>
					</div>

					<div class="row">
					<div class="col-sm-8 col-lg-8 mb-8 pb-2">

						<div class="row">
						@foreach($eventos as  $key => $dato)
							<div class="col-sm-6 col-lg-6 mb-6 pb-2">
								<a href="evento/{{$dato->hash}}/{{$facultad->hash}}">
									<article>
										<div class="thumb-info thumb-info-no-borders thumb-info-bottom-info thumb-info-bottom-info-dark thumb-info-bottom-info-show-more thumb-info-no-zoom border-radius-0">
											<div class="thumb-info-wrapper thumb-info-wrapper-opacity-6">
												@if($dato->eventoimagen != null && $dato->eventoimagen->url != null)
													<img src="{{ asset('/web/eventofacultad/'.$dato->eventoimagen->url) }}" class="img-fluid" alt=" @if($dato->titulo != null)
													{{$dato->titulo}}
													@endif" style="height: 200px;">
												@else
													<img src="{{ asset('/webvendor/img/blog/default/blog-46.jpg') }}" class="img-fluid" alt=" @if($dato->titulo != null)
													{{$dato->titulo}}
													@endif" style="height: 200px;">
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
						</div>

						<center><a class="btn btn-outline btn-quaternary custom-button text-uppercase mt-4 mb-4 mb-md-0 font-weight-bold" href="eventos/{{$facultad->hash}}">Ver Todos los Eventos</a></center>
					</div>


					<div class="col-sm-4 col-lg-4 mb-4 pb-2">
					
					<a href="comunicados/{{$facultad->hash}}"><h3 class="font-weight-bold text-3 mt-4 mt-md-0">Ver Comunicados</h3></a>

					<div class="owl-carousel owl-theme" data-plugin-options="{'items': 1, 'margin': 10, 'loop': true, 'nav': false, 'dots': false, 'autoplay': true, 'autoplayTimeout': 5000}">

						@foreach($comunicados as  $key => $dato)
							@if($key < 3)
								<div>
									<a href="comunicado/{{$dato->hash}}/{{$facultad->hash}}">
										<article>
											<div class="thumb-info thumb-info-no-borders thumb-info-bottom-info thumb-info-bottom-info-dark thumb-info-bottom-info-show-more thumb-info-no-zoom border-radius-0">
												<div class="thumb-info-wrapper thumb-info-wrapper-opacity-6">
													@if($dato->imagencomunicado != null && $dato->imagencomunicado->url != null)
														<img src="{{ asset('/web/comunicadofacultad/'.$dato->imagencomunicado->url) }}" class="img-fluid" alt=" @if($dato->titulo != null)
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

			</section>













			<section class="section bg-color-light border-0 m-0">
				<div class="container" >
					<div class="row">
						<div class="col appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
							<h2 class="font-weight-semibold mb-0">Plataformas Web</h2>
						</div>
					</div>
					<div class="row">

						<div class="featured-boxes featured-boxes-style-4">
							<div class="row">
								@foreach($plataformas as  $key => $dato)
									@if($key%2 == 0)	
									<div class="col-lg-2" style="padding-left: 0px; padding-right:0px;">
										<div class="featured-box featured-box-primary featured-box-effect-5">
											<div class="box-content" style="padding-left: 5px; padding-right:5px;">
												<a href="{{$dato->url}}" target="_blank"><i class="icon-featured far fa-file-alt"></i></a>
												<a href="{{$dato->url}}" target="_blank"><h4 class="font-weight-normal text-5 mt-3"><strong class="font-weight-extra-bold">{{$dato->nombre}} </strong></h4></a>
											</div>
										</div>
									</div>
									@else
									<div class="col-lg-2" style="padding-left: 0px; padding-right:0px;">
										<div class="featured-box featured-box-secondary featured-box-effect-5">
											<div class="box-content" style="padding-left: 5px; padding-right:5px;">
												<a href="{{$dato->url}}" target="_blank"><i class="icon-featured far fa-file-alt"></i></a>
												<a href="{{$dato->url}}" target="_blank"><h4 class="font-weight-normal text-5 mt-3"><strong class="font-weight-extra-bold">{{$dato->nombre}} </strong></h4></a>
											</div>
										</div>
									</div>
									@endif
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</section>

			<hr style="margin:0px;"> 
            <section class="section bg-color-light-scale-2 border-0 m-0">

			<div class="container">
				<div class="row">
					<div class="col appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
						<h2 class="font-weight-semibold mb-0">Enlaces de Interés</h2>
					</div>
				</div>
				<div class="row py-4 my-5">
					<div class="col py-3">
						<div class="owl-carousel owl-theme mb-0" data-plugin-options="{'responsive': {'0': {'items': 1}, '476': {'items': 1}, '768': {'items': 5}, '992': {'items': 8}, '1200': {'items': 8}}, 'autoplay': true, 'autoplayTimeout': 2000, 'dots': false, 'margin': 10}">
							@foreach($linkinteres as  $key => $dato)
								<div >
									<a  href="{{$dato->nombre}}" target="_blank"><img {{-- style="border: groove #8080807d 1px" --}} class="img-fluid opacity-10" src="{{ asset('/web/linkinteresfacultad/'.$dato->url) }}" alt=""></a>
								</div>
							@endforeach
						</div>

					</div>
				</div>
			</div>
				
        </section>








		@include('web/facultad/partials/footer')


			
		</div>
	</div>

	@include('web/facultad/partials/scripts')

		<script>
			$("#idcuerpoPresentacion p").css("color", "#212529");
		/* 	$(document).ready(function () {
				alert("hoa");
			}); */
		</script>

	</body>
</html>
