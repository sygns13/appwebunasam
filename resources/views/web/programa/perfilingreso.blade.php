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
								<h1 class="text-light font-weight-bold text-8">Perfil de Ingreso del</h1>
								<span class="sub-title text-light">Programa de Estudio de {{$escuela->nombre}}</span>
							</div>
						</div>
					</div>
				</section>



                @foreach ($perfilingreso as $dato)
                
                <section class="section bg-color-light border-0 m-0" style="padding-top:20px;">
					<div class="container">

						@if($dato != null)
{{-- 
						<section class="page-header page-header-modern bg-color-light-scale-2 page-header-md" style="background: #2d529f!important;">
							<div class="container">
								<div class="row">
									<div class="col-md-12 align-self-center p-static order-2 text-center">
										@if($dato->titulo != null)
										<h1 class="text-light font-weight-bold text-8">{{$dato->titulo}}</h1>
										@endif
									</div>
								</div>
							</div>
						</section> --}}

                        <h2 class="font-weight-semi-bold" style="color:#0088CC">
                            @if($dato != null && $dato->titulo != null)
                                {{$dato->titulo}}
                            @endif
                        </h2>

						

							<div class="row mt-5 mb-5 pt-3 pb-3">
								<div class="col-md-8">
								{{-- 	@if($dato->titulo != null)
									<h2 class="font-weight-semibold mb-0">{{$dato->titulo}}</h2>
									@endif --}}

									{{-- @if($dato->subtitulo != null)
									<p class="lead font-weight-normal">{{$dato->subtitulo}}</p>
									@endif --}}

									@if($dato->descripcion != null)
									{!! $dato->descripcion !!}
									{{-- <p>La Universidad Nacional Santiago Antúnez de Mayolo les da la bienvenida a su nuevo Portal Web Institucional donde podrá encontrar toda la información que requiera...</p> --}}
									@endif

																	
								</div>
								@if($dato->tieneimagen != null && $dato->tieneimagen == 1 && $dato->url != null)
								<div class="col-md-4">
									<img src="{{ asset('/web/indicadorsineaceprograma/'.$dato->url)}}" alt class="img-fluid box-shadow-custom" /> 
								</div>
								@endif

                                @if($dato->tienearchivo != null && $dato->tienearchivo == 1 && $dato->urlfile != null)
                                    <div class="col-sm-12">
                                        <a download href="{{ asset('/web/indicadorsineaceprograma/'.$dato->urlfile)}}">
                                            <button type="button" class="btn btn-dark btn-lg rounded-0 mb-2"><i class="fas fa-download"></i> Descargar {{$dato->nombrefile}}</button>
                                        </a>
                                    </div>
                                @endif
							</div>
						@endif
					</div>
				</section>
                    
                @endforeach
              






			</div>

			@include('web/programa/partials/footer')
		</div>

		@include('web/programa/partials/scripts')

	</body>
</html>