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

                <section class="section bg-color-light border-0 m-0">
					<div class="container">
						@if($presentacion != null)
							<div class="row mt-5 mb-5 pt-3 pb-3">
								<div class="col-md-8">
									@if($presentacion->titulo != null)
									<h2 class="font-weight-semibold mb-0">{{$presentacion->titulo}}</h2>
									@endif

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
