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
								<h1 class="text-light font-weight-bold text-8">Misión y Visión</h1>
								<span class="sub-title text-light">Programa de Estudio de {{$escuela->nombre}}</span>
							</div>
						</div>
					</div>
				</section>

				<div class="container">

                    <div class="row align-items-center pt-4 appear-animation" data-appear-animation="fadeInLeftShorter">
                        <div class="col-md-5 mb-5 mb-md-0">
                            @if($mision != null && $mision->url)
                                {{-- <img class="img-fluid scale-2 pe-5 pe-md-0 my-4" src="{{ asset('/web/misionvisionprograma/'.$mision->url) }}" alt="Mision" /> --}}

                                <a class="img-thumbnail d-block lightbox" href="{{ asset('/web/misionvisionprograma/'.$mision->url) }}"  data-plugin-options="{'type':'image'}">
                                    <img class="img-fluid" src="{{ asset('/web/misionvisionprograma/'.$mision->url) }}" alt="Mision" style="width: 100%; height: 280px;">
                                </a>
                            @endif
                        </div>
                        <div class="col-md-7 ps-md-5">
                            @if($mision != null && $mision->titulo)
                                <h2 class="font-weight-normal text-6 mb-3"><strong class="font-weight-extra-bold">{{$mision->titulo}}</strong></h2>
                            @endif
                            @if($mision != null && $mision->descripcion)
                                <p class="text-4">{!! $mision->descripcion !!}</p>
                            @endif
                        </div>
                    </div>

                    <hr class="solid my-5" style="background: #2d529f">

                    <div class="row align-items-center py-5 appear-animation" data-appear-animation="fadeInRightShorter">
                        <div class="col-md-7 pe-md-5 mb-5 mb-md-0">
                            @if($vision != null && $vision->titulo)
                                <h2 class="font-weight-normal text-6 mb-3"><strong class="font-weight-extra-bold">{{$vision->titulo}}</strong></h2>
                            @endif
                            @if($vision != null && $vision->descripcion)
                                <p class="text-4">{!! $vision->descripcion !!}</p>
                            @endif
                        </div>
                        <div class="col-md-5 px-5 px-md-3">
                            @if($vision != null && $vision->url)
                                {{-- <img class="img-fluid scale-2 pe-5 pe-md-0 my-4" src="{{ asset('/web/misionvisionprograma/'.$vision->url) }}" alt="Visión" /> --}}

                                <a class="img-thumbnail d-block lightbox" href="{{ asset('/web/misionvisionprograma/'.$vision->url) }}"  data-plugin-options="{'type':'image'}">
                                    <img class="img-fluid" src="{{ asset('/web/misionvisionprograma/'.$vision->url) }}" alt="Visión" style="width: 100%; height: 280px;">
                                </a>
                            @endif
                        </div>
                    </div>

                <hr class="solid my-5">

                </div>


				







			</div>

			@include('web/programa/partials/footer')
		</div>

		@include('web/programa/partials/scripts')

	</body>
</html>