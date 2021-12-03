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
                                            {{-- <img src="{{ asset('/web/organounasam/'.$organo->url) }}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" /> --}}

                                            <a class="img-thumbnail d-block lightbox" href="{{ asset('/web/organounasam/'.$organo->url) }}"  data-plugin-options="{'type':'image'}">
                                                <img class="img-fluid" src="{{ asset('/web/organounasam/'.$organo->url) }}" alt="Project Image" style="width: 100%; height: 500px;">
                                            </a>
                                    </div>
                            @endif
                                </article>
                            </div>
						</div>
					</div>
				</div>



			@include('web/unasam/partials/footer')
		</div>

		@include('web/unasam/partials/scripts')

	</body>
</html>
