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
								<h1 class="text-light font-weight-bold text-8">Director de Escuela</h1>
								<span class="sub-title text-light">{{$escuela->nombre}}</span>
							</div>
						</div>
					</div>
				</section>

                <div class="container pt-5">

					<div class="row py-4 mb-2">
						<div class="col-md-7 order-2">
							<div class="overflow-hidden">
								<h2 class="text-color-dark font-weight-bold text-12 mb-2 pt-0 mt-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="300">
                                    @if($organo != null && $organo->titulo != null)
                                    {{$organo->titulo}}
                                    @endif
                                </h2>
							</div>
                            
							<div class="overflow-hidden mb-3">
								<p class="font-weight-bold text-primary text-uppercase mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="500">
                                    @if($organo != null && $organo->subtitulo != null)
                                    {{$organo->subtitulo}}
                                    @endif
                                </p>
							</div>
						{{--	 <p class="lead appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam <a href="#">vehicula</a> sit amet enim ac sagittis. Curabitur eget leo varius, elementum mauris eget, egestas quam. Donec ante risus, dapibus sed lectus non, lacinia vestibulum nisi. Morbi vitae augue quam. Nullam ac laoreet libero.</p>
							<p class="pb-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="800">Consectetur adipiscing elit. Aliquam iaculis sit amet enim ac sagittis. Curabitur eget leo varius, elementum mauris eget, egestas quam.</p> --}}
                            <div class="lead appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="700">
                                @if($organo != null && $organo->descripcion != null)
                                    {!! $organo->descripcion !!}
                                @endif
                            </div>

							<hr class="solid my-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="900">
							<div class="row align-items-center appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000">
								<div class="col-lg-6">
									<a href="#" class="btn btn-modern btn-dark mt-3">Volver arriba</a>
								{{-- 	<a href="#" class="btn btn-modern btn-primary mt-3">Hire Me</a> --}}
								</div>
								{{-- <div class="col-sm-6 text-lg-end my-4 my-lg-0">
									<strong class="text-uppercase text-1 me-3 text-dark">follow me</strong>
									<ul class="social-icons float-lg-end">
										<li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
										<li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
										<li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
									</ul>
								</div> --}}
							</div>
						</div>
						<div class="col-md-5 order-md-2 mb-4 mb-lg-0 appear-animation" data-appear-animation="fadeInRightShorter">
                            @if($organo != null && $organo->tieneimagen == 1 && $organo->url != null)
							    {{-- <img src="{{ asset('/web/organoprograma/'.$organo->url) }}" class="img-fluid mb-2" alt=""> --}}

								<a class="img-thumbnail d-block lightbox" href="{{ asset('/web/organoprograma/'.$organo->url) }}"  data-plugin-options="{'type':'image'}">
                                    <img class="img-fluid" src="{{ asset('/web/organoprograma/'.$organo->url) }}" alt="Visión" style="width: 100%; height: 280px;">
                                </a>
                            @endif
						</div>
					</div>
				</div>





		@include('web/facultad/partials/footer')
		</div>
	</div>

	@include('web/facultad/partials/scripts')

	</body>
</html>
