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
								<h1 class="text-light font-weight-bold text-8">Consejo de Facultad</h1>
								<span class="sub-title text-light">{{$facultad->nombre}}</span>
							</div>
						</div>
					</div>
				</section>


                <div class="container py-4">

					<div class="row">
						<div class="col">
							<div class="blog-posts single-post">
                                <article class="post post-large blog-single-post border-0 m-0 p-0">

                                    <div class="post-content ms-0">
										<h2 class="font-weight-semi-bold" style="color:#0088CC">
                                            @if($organo != null && $organo->titulo != null)
                                                {{$organo->titulo}}
                                            @endif
                                        </h2>
                                    </div>

                                    <div class="post-content ms-0">
                                        
                                        @if($organo != null && $organo->subtitulo != null)
                                            <div class="col appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
                                                <h3 class="font-weight-semibold mb-0">{{$organo->subtitulo}}</h3>
                                            </div>
                                        @endif
                                        @if($organo != null && $organo->descripcion != null)
                                            {!!$organo->descripcion!!}
                                        @endif
                                    </div>

                                    @if($organo != null && $organo->tieneimagen == 1 && $organo->url != null)
                                    <div class="post-image ms-0">
                                            <img src="{{ asset('/web/organofacultad/'.$organo->url) }}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" />
                                    </div>
                            @endif
                                </article>
                            </div>
						</div>
					</div>
				</div>





		@include('web/facultad/partials/footer')
		</div>
	</div>

	@include('web/facultad/partials/scripts')

	</body>
</html>
