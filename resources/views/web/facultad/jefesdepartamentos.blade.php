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

                <section class="page-header page-header-modern bg-color-light-scale-2 page-header-md" style="background: #2d529f!important;">
					<div class="container">
						<div class="row">
							<div class="col-md-12 align-self-center p-static order-2 text-center">
								<h1 class="text-light font-weight-bold text-8">Jefes de Departamento Académico</h1>
								<span class="sub-title text-light">{{$facultad->nombre}}</span>
							</div>
						</div>
					</div>
				</section>


                <section class="our-blog section bg-color-light position-relative border-0 m-0">

					<div class="container position-relative z-index-1 pb-5 mb-lg-5">
						<div class="row justify-content-center mb-4">

						</div>
						<div class="row mb-3 pb-5">
							<div class="col">
								<div class="row">

                                    @foreach($jefeDepartamentos as  $key => $dato)
									<div class="col-lg-6 mb-4 mb-lg-0">
										<article>
											<div class="card border-0 border-radius-0 box-shadow-1">
												<div class="card-body p-4 z-index-1" style="border: 10px outset rgb(64, 116, 219);">
													<a href="/facultad/jefedepartamento/{{$dato->hash}}/{{$facultad->hash}}">
														
                                                        @if($dato->tieneimagen_director != null && $dato->tieneimagen_director == 1 && $dato->url_director != null)
                                                            <img src="{{ asset('/web/jefedeparfacultad/'.$dato->url_director) }}" alt class="img-fluid" style="width: 555px; height:300px;" />
                                                        @else
                                                            <img src="{{ asset('/webvendor/img/demos/seo-2/blog/blog-1.jpg') }}" alt class="card-img-top border-radius-0" style="width: 555px; height:300px;" />
                                                        @endif
													</a>
													{{-- <p class="text-uppercase text-1 mb-3 pt-1 text-color-default"><time pubdate datetime="2021-01-10">10 Jan 2021</time> <span class="opacity-3 d-inline-block px-2">|</span> 3 Comments <span class="opacity-3 d-inline-block px-2">|</span> John Doe</p> --}}
													<div class="card-body p-0">
														<h4 class="card-title mb-3 text-5 font-weight-semibold"><a class="text-color-dark" href="/facultad/jefedepartamento/{{$dato->hash}}/{{$facultad->hash}}">
                                                            @if($dato->director != null)
                                                                {{$dato->director}}
                                                            @endif    
                                                        </a></h4>
														<p class="card-text mb-3">
                                                            @if($dato->descripcion_corta_director != null)
                                                                {{$dato->descripcion_corta_director}}
                                                            @endif 
                                                        </p>
														<a href="/facultad/jefedepartamento/{{$dato->hash}}/{{$facultad->hash}}" class="font-weight-bold text-uppercase text-decoration-none d-block mt-3">Ver más</a>
													</div>
												</div>
											</div>
										</article>
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

	</body>
</html>
