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
								<h1 class="text-light font-weight-bold text-8">Objetivos Institucionales</h1>
								<span class="sub-title text-light">{{$facultad->nombre}}</span>
							</div>
						</div>
					</div>
				</section>



                <div class="container">

                    @foreach($objetivos as  $key => $dato)

                    @if($key >= 0)
                        @if($key%2 != 0)
                            <div class="row align-items-center pt-4 appear-animation" data-appear-animation="fadeInLeftShorter">
                                <div class="col-md-4 mb-4 mb-md-0">
                                    <img class="img-fluid scale-2 pe-5 pe-md-0 my-4" src="{{ asset('/web/objetivofacultad/'.$dato->url) }}" alt="{{$dato->titulo}}" />
                                </div>
                                <div class="col-md-8 ps-md-5">
                                    @if($dato->titulo != null)
                                        <h2 class="font-weight-normal text-6 mb-3"><strong class="font-weight-extra-bold">{{$dato->titulo}}</strong></h2>
                                    @endif
                                    @if($dato->descripcion != null)
                                        <p class="text-4">{!! $dato->descripcion !!}</p>
                                    @endif
                                </div>
                            </div>
                        @else
                            <div class="row align-items-center py-5 appear-animation" data-appear-animation="fadeInRightShorter">
                                <div class="col-md-8 pe-md-5 mb-5 mb-md-0">
                                    @if($dato->titulo != null)
                                        <h2 class="font-weight-normal text-6 mb-3"><strong class="font-weight-extra-bold">{{$dato->titulo}}</strong></h2>
                                    @endif
                                    @if($dato->descripcion != null)
                                        <p class="text-4">{!! $dato->descripcion !!}</p>
                                    @endif
                                </div>
                                <div class="col-md-4 px-5 px-md-3">
                                    <img class="img-fluid scale-2 pe-5 pe-md-0 my-4" src="{{ asset('/web/objetivofacultad/'.$dato->url) }}" alt="{{$dato->titulo}}" />
                                </div>
                            </div>
                        @endif
                    @endif

                        <hr class="solid my-5">

                    @endforeach
                </div>





		@include('web/facultad/partials/footer')
		</div>
	</div>

	@include('web/facultad/partials/scripts')

	</body>
</html>
