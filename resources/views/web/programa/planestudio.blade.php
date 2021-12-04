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


                {{-- <section class="page-header page-header-modern bg-color-light-scale-2 page-header-md" style="background: #2d529f!important;">
					<div class="container">
						<div class="row">
							<div class="col-md-12 align-self-center p-static order-2 text-center">
								<h1 class="text-light font-weight-bold text-8">Programa de Estudio de {{$escuela->nombre}}</h1>
								<span class="sub-title text-light">Programa de Estudio de {{$escuela->nombre}}</span>
							</div>
						</div>
					</div>
				</section> --}}



                <section class="section bg-color-light border-0 m-0" style="padding-top:20px;">
					<div class="container">

						@if($planestudio != null)

						<section class="page-header page-header-modern bg-color-light-scale-2 page-header-md" style="background: #2d529f!important;">
							<div class="container">
								<div class="row">
									<div class="col-md-12 align-self-center p-static order-2 text-center">
										@if($planestudio->titulo != null)
										<h1 class="text-light font-weight-bold text-8">{{$planestudio->titulo}}</h1>
										@endif
									</div>
								</div>
							</div>
						</section>

						

							<div class="row mt-5 mb-5 pt-3 pb-3">
								<div class="col-md-7">
								{{-- 	@if($planestudio->titulo != null)
									<h2 class="font-weight-semibold mb-0">{{$planestudio->titulo}}</h2>
									@endif --}}

									{{-- @if($planestudio->subtitulo != null)
									<p class="lead font-weight-normal">{{$planestudio->subtitulo}}</p>
									@endif --}}

									@if($planestudio->descripcion != null)
									{!! $planestudio->descripcion !!}
									{{-- <p>La Universidad Nacional Santiago Antúnez de Mayolo les da la bienvenida a su nuevo Portal Web Institucional donde podrá encontrar toda la información que requiera...</p> --}}
									@endif

																	
								</div>
								@if($planestudio->tieneimagen != null && $planestudio->tieneimagen == 1 && $planestudio->url != null)
								<div class="col-md-5">
									{{-- <img src="{{ asset('/web/indicadorsineaceprograma/'.$planestudio->url)}}" alt class="img-fluid box-shadow-custom" />  --}}

									<a class="img-thumbnail d-block lightbox float-start me-4 mt-2" href="{{ asset('/web/indicadorsineaceprograma/'.$planestudio->url) }}" data-plugin-options="{'type':'image'}">
										<img class="img-fluid" src="{{ asset('/web/indicadorsineaceprograma/'.$planestudio->url) }}" alt="Objetivo" style="width: 100%; height: 290px;">
									</a>
								</div>
								@endif

                                @if($planestudio->tienearchivo != null && $planestudio->tienearchivo == 1 && $planestudio->urlfile != null)
                                    <div class="col-sm-12">
                                        <a download href="{{ asset('/web/indicadorsineaceprograma/'.$planestudio->urlfile)}}">
                                            <button type="button" class="btn btn-dark btn-lg rounded-0 mb-2"><i class="fas fa-download"></i> Descargar {{$planestudio->nombrefile}}</button>
                                        </a>
                                    </div>
                                @endif
							</div>
						@endif
					</div>
				</section>

				







			</div>

			@include('web/programa/partials/footer')
		</div>

		@include('web/programa/partials/scripts')

	</body>
</html>