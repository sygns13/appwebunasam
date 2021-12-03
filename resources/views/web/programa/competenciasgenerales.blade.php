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


				<section class="page-header page-header-modern bg-color-light-scale-2 page-header-md" style="background: #2d529f!important;">
					<div class="container">
						<div class="row">
							<div class="col-md-12 align-self-center p-static order-2 text-center">
								<h1 class="text-light font-weight-bold text-8">Competencias Generales del</h1>
								<span class="sub-title text-light">Programa de Estudio de {{$escuela->nombre}}</span>
							</div>
						</div>
					</div>
				</section>


                @foreach($competenciasgenerales as  $key => $dato)

                <div class="container py-4">

					<div class="row">
						<div class="col">
							<div class="blog-posts single-post">

                                <article class="post post-large blog-single-post border-0 m-0 p-0">

{{-- 									<div class="post-date ms-0">
										<span class="day">10</span>
										<span class="month">Jan</span>
									</div> --}}

									<div class="post-content ms-0">
                                        <h2 class="font-weight-semi-bold" style="color:#0088CC">
                                            @if($dato != null && $dato->titulo != null)
                                                {{$dato->titulo}}
                                            @endif
                                        </h2>

                                        {{-- <div class="post-meta">
											<span><i class="far fa-user"></i> By <a href="#">John Doe</a> </span>
											<span><i class="far fa-folder"></i> <a href="#">Lifestyle</a>, <a href="#">Design</a> </span>
											<span><i class="far fa-comments"></i> <a href="#">12 Comments</a></span>
										</div> --}}


                                        @if($dato != null && $dato->tieneimagen != null &&  $dato->tieneimagen == '1' && $dato->url != null)
                                        <div class="col-md-6 px-7 px-md-5">
                                            <img src="{{ asset('/web/indicadorsineaceprograma/'.$dato->url) }}" class="img-fluid float-start me-4 mt-2" alt="" />
                                        </div>
                                        @endif

                                        @if($dato->descripcion != null)
                                            {!! $dato->descripcion !!}
                                        @endif

                                        @if($dato != null && $dato->tienearchivo != null &&  $dato->tienearchivo == '1' && $dato->urlfile != null)
                                        <div class="col-sm-9">
                                            <a download href="{{ asset('/web/indicadorsineaceprograma/'.$dato->urlfile)}}">
                                                <button type="button" class="btn btn-dark btn-lg rounded-0 mb-2"><i class="fas fa-download"></i> Descargar {{$dato->nombrefile}}</button>
                                            </a>
                                        </div>
                                        @endif
                                    </div>
                                </article>

                            </div>
                        </div>
                    </div>

                    <hr class="solid my-5">
                </div>

                @endforeach








			</div>

			@include('web/programa/partials/footer')
		</div>

		@include('web/programa/partials/scripts')

	</body>
</html>