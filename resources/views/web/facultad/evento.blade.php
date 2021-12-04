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
								<h1 class="text-light font-weight-bold text-8">Evento</h1>
								{{-- <span class="sub-title text-light">Visualizar los últimos comunicados</span> --}}
							</div>
						</div>
					</div>
				</section>

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
                                            @if($evento != null && $evento->titulo != null)
                                                {{$evento->titulo}}
                                            @endif
                                        </h2>

										<span><i class="far fa-calendar-alt"></i> 
                                            
											@if($evento->nombreMes != null)
											{{$evento->dia}} de {{$evento->nombreMes}} , {{$evento->anio}} - {{$evento->hora}}
											@endif
										</span>



                                        @if($evento != null && $evento->imageneventos != null &&  $evento->imageneventos->count() > 0)
                                    @php
                                        $image1 = $evento->imageneventos[0];
                                    @endphp
                                        @if($image1 != null && $image1->url != null)
											<div class="col-md-7 px-8 px-md-6">
                                                {{-- <img src="{{ asset('/web/eventofacultad/'.$image1->url) }}"  class="img-fluid float-start me-4 mt-2" alt=""/> --}}

                                                <a class="img-thumbnail d-block lightbox float-start me-4 mt-2" href="{{ asset('/web/eventofacultad/'.$image1->url) }}"  data-plugin-options="{'type':'image'}">
                                                    <img class="img-fluid" src="{{ asset('/web/eventofacultad/'.$image1->url) }}" alt="Evento" style="width: 100%; max-height: 500px;">
                                                </a>
											</div>
                                        @endif
                                    @endif

									@if($evento->desarrollo != null)
										{!! $evento->desarrollo !!}
									@endif

                                    </div>
                                </article>

                            </div>
                        </div>
                    </div>

                </div>



				@if($evento != null && $evento->imageneventos != null &&  $evento->imageneventos->count() > 1)
                <div class="container py-4">

                    @foreach($evento->imageneventos as  $key => $dato)

                    @if($key > 0)
                        @if($key%2 != 0)
                            <div class="row align-items-center pt-4 appear-animation" data-appear-animation="fadeInLeftShorter">
                                <div class="col-md-5 mb-5 mb-md-0">
                                    {{-- <img class="img-fluid scale-2 pe-5 pe-md-0 my-4" src="{{ asset('/web/eventofacultad/'.$dato->url) }}" alt="{{$dato->nombre}}" /> --}}

                                    <a class="img-thumbnail d-block lightbox" href="{{ asset('/web/eventofacultad/'.$dato->url) }}"  data-plugin-options="{'type':'image'}">
                                        <img class="img-fluid" src="{{ asset('/web/eventofacultad/'.$dato->url) }}" alt="Evento" style="width: 100%; max-height: 360px;;">
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
                                    {{-- <img class="img-fluid scale-2 pe-5 pe-md-0 my-4" src="{{ asset('/web/eventofacultad/'.$dato->url) }}" alt="{{$dato->nombre}}" /> --}}

                                    <a class="img-thumbnail d-block lightbox" href="{{ asset('/web/eventofacultad/'.$dato->url) }}"  data-plugin-options="{'type':'image'}">
                                        <img class="img-fluid" src="{{ asset('/web/eventofacultad/'.$dato->url) }}" alt="Evento" style="width: 100%; max-height: 360px;;">
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
