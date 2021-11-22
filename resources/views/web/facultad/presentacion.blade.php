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

                <section class="section bg-color-light border-0 m-0" style="padding-top:20px;">
					<div class="container">

						@if($presentacion != null)

						<section class="page-header page-header-modern bg-color-light-scale-2 page-header-md" style="background: #2d529f!important;">
							<div class="container">
								<div class="row">
									<div class="col-md-12 align-self-center p-static order-2 text-center">
										@if($presentacion->titulo != null)
										<h1 class="text-light font-weight-bold text-8">{{$presentacion->titulo}}</h1>
										@endif
									</div>
								</div>
							</div>
						</section>

						

							<div class="row mt-5 mb-5 pt-3 pb-3">
								<div class="col-md-8">
								{{-- 	@if($presentacion->titulo != null)
									<h2 class="font-weight-semibold mb-0">{{$presentacion->titulo}}</h2>
									@endif --}}

									@if($presentacion->subtitulo != null)
									<p class="lead font-weight-normal">{{$presentacion->subtitulo}}</p>
									@endif

									@if($presentacion->descripcion != null)
									{!! $presentacion->descripcion !!}
									{{-- <p>La Universidad Nacional Santiago Antúnez de Mayolo les da la bienvenida a su nuevo Portal Web Institucional donde podrá encontrar toda la información que requiera...</p> --}}
									@endif

																	
								</div>
								@if($presentacion->tieneimagen != null && $presentacion->tieneimagen == 1 && $presentacion->url != null)
								<div class="col-md-4">
									<img src="{{ asset('/web/presentacionfacultad/'.$presentacion->url)}}" alt class="img-fluid box-shadow-custom" /> 
								</div>
								@endif
							</div>
						@endif
					</div>
				</section>




		@include('web/facultad/partials/footer')
		</div>
	</div>

	@include('web/facultad/partials/scripts')

	</body>
</html>
