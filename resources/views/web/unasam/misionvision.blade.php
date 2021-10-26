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

                
                <div class="container">

                    <div class="row align-items-center pt-4 appear-animation" data-appear-animation="fadeInLeftShorter">
                        <div class="col-md-4 mb-4 mb-md-0">
                            @if($mision != null && $mision->url)
                                <img class="img-fluid scale-2 pe-5 pe-md-0 my-4" src="{{ asset('/web/misionvisionunasam/'.$mision->url) }}" alt="Mision" />
                            @endif
                        </div>
                        <div class="col-md-8 ps-md-5">
                            @if($mision != null && $mision->titulo)
                                <h2 class="font-weight-normal text-6 mb-3"><strong class="font-weight-extra-bold">{{$mision->titulo}}</strong></h2>
                            @endif
                            @if($mision != null && $mision->descripcion)
                                <p class="text-4">{!! $mision->descripcion !!}</p>
                            @endif
                        </div>
                    </div>

                    <hr class="solid my-5">

                    <div class="row align-items-center py-5 appear-animation" data-appear-animation="fadeInRightShorter">
                        <div class="col-md-8 pe-md-5 mb-5 mb-md-0">
                            @if($vision != null && $vision->titulo)
                                <h2 class="font-weight-normal text-6 mb-3"><strong class="font-weight-extra-bold">{{$vision->titulo}}</strong></h2>
                            @endif
                            @if($vision != null && $vision->descripcion)
                                <p class="text-4">{!! $vision->descripcion !!}</p>
                            @endif
                        </div>
                        <div class="col-md-4 px-5 px-md-3">
                            @if($vision != null && $vision->url)
                                <img class="img-fluid scale-2 pe-5 pe-md-0 my-4" src="{{ asset('/web/misionvisionunasam/'.$vision->url) }}" alt="Visión" />
                            @endif
                        </div>
                    </div>

                <hr class="solid my-5">

                </div>









			</div>

			@include('web/unasam/partials/footer')
		</div>

		@include('web/unasam/partials/scripts')

	</body>
</html>
