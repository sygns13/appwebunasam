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
								<h1 class="text-light font-weight-bold text-8">Comunicado</h1>
								{{-- <span class="sub-title text-light">Visualizar los últimos comunicados</span> --}}
							</div>
						</div>
					</div>
				</section>

				<div class="container pt-5">

					<div class="row py-4 mb-2">
						<div class="col-md-7 order-2">
							<div class="overflow-hidden">
								<h2 class="text-color-dark font-weight-bold text-12 mb-2 pt-0 mt-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="300">
                                    @if($comunicado != null && $comunicado->titulo != null)
                                    {{$comunicado->titulo}}
                                    @endif
                                </h2>
							</div>
							<div class="overflow-hidden mb-3">
								<p class="font-weight-bold text-primary text-uppercase mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="500">
									<i class="far fa-calendar-alt"></i> 
									@if($comunicado->nombreMes != null)
									{{$comunicado->dia}} de {{$comunicado->nombreMes}} , {{$comunicado->anio}}
									@endif
								</p>
							</div>
							{{-- <p class="lead appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam <a href="#">vehicula</a> sit amet enim ac sagittis. Curabitur eget leo varius, elementum mauris eget, egestas quam. Donec ante risus, dapibus sed lectus non, lacinia vestibulum nisi. Morbi vitae augue quam. Nullam ac laoreet libero.</p>
							<p class="pb-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="800">Consectetur adipiscing elit. Aliquam iaculis sit amet enim ac sagittis. Curabitur eget leo varius, elementum mauris eget, egestas quam.</p> --}}
                            <div class="lead appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="700">
                                @if($comunicado != null && $comunicado->desarrollo != null)
                                    {!! $comunicado->desarrollo !!}
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

						@if($comunicado != null && $comunicado->imagencomunicados != null &&  $comunicado->imagencomunicados->count() > 0)
							@php
								$image1 = $comunicado->imagencomunicados[0];
							@endphp
								@if($image1 != null && $image1->url != null)
								{{-- <img src="{{ asset('/web/comunicadofacultad/'.$image1->url) }}" class="img-fluid mb-2" alt=""> --}}

								<a class="img-thumbnail d-block lightbox float-start me-4 mt-2" href="{{ asset('/web/comunicadofacultad/'.$image1->url) }}"  data-plugin-options="{'type':'image'}">
									<img class="img-fluid" src="{{ asset('/web/comunicadofacultad/'.$image1->url) }}" alt="Actividad" style="width: 100%; max-height: 500px;">
								</a>
								@endif
						@endif

					</div>
				</div>







				@if($comunicado != null && $comunicado->imagencomunicados != null &&  $comunicado->imagencomunicados->count() > 1)
                <div class="container py-4">

                    @foreach($comunicado->imagencomunicados as  $key => $dato)

                    @if($key > 0)
                        @if($key%2 != 0)
                            <div class="row align-items-center pt-4 appear-animation" data-appear-animation="fadeInLeftShorter">
                                <div class="col-md-5 mb-5 mb-md-0">
                                    {{-- <img class="img-fluid scale-2 pe-5 pe-md-0 my-4" src="{{ asset('/web/comunicadofacultad/'.$dato->url) }}" alt="{{$dato->nombre}}" /> --}}

									<a class="img-thumbnail d-block lightbox" href="{{ asset('/web/comunicadofacultad/'.$dato->url) }}"  data-plugin-options="{'type':'image'}">
                                        <img class="img-fluid" src="{{ asset('/web/comunicadofacultad/'.$dato->url) }}" alt="Actividad" style="width: 100%; max-height: 360px;;">
                                    </a>
                                </div>
                                <div class="col-md-7 ps-md-5">
                                    @if($dato->nombre != null)
                                        <h2 class="font-weight-normal text-6 mb-3"><strong class="font-weight-extra-bold">{{$dato->nombre}}</strong></h2>
                                    @endif
                                    @if($dato->descripcion != null)
                                        <p class="text-4">{!! $dato->descripcion !!}</p>
                                    @endif
                                </div>
                            </div>
                        @else
                            <div class="row align-items-center py-5 appear-animation" data-appear-animation="fadeInRightShorter">
                                <div class="col-md-7 pe-md-5 mb-5 mb-md-0">
                                    @if($dato->nombre != null)
                                        <h2 class="font-weight-normal text-6 mb-3"><strong class="font-weight-extra-bold">{{$dato->nombre}}</strong></h2>
                                    @endif
                                    @if($dato->descripcion != null)
                                        <p class="text-4">{!! $dato->descripcion !!}</p>
                                    @endif
                                </div>
                                <div class="col-md-5 px-5 px-md-3">
                                    {{-- <img class="img-fluid scale-2 pe-5 pe-md-0 my-4" src="{{ asset('/web/comunicadofacultad/'.$dato->url) }}" alt="{{$dato->nombre}}" /> --}}

									<a class="img-thumbnail d-block lightbox" href="{{ asset('/web/comunicadofacultad/'.$dato->url) }}"  data-plugin-options="{'type':'image'}">
                                        <img class="img-fluid" src="{{ asset('/web/comunicadofacultad/'.$dato->url) }}" alt="Actividad" style="width: 100%; max-height: 360px;;">
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endif

                        <hr class="solid my-5">

                    @endforeach

                </div>
                @endif





		@include('web/facultad/partials/footer')
		</div>
	</div>

	@include('web/facultad/partials/scripts')

	</body>
</html>
