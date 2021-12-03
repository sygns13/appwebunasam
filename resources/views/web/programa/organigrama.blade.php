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
								<h1 class="text-light font-weight-bold text-8">Organigrama</h1>
								<span class="sub-title text-light">Programa de Estudio de {{$escuela->nombre}}</span>
							</div>
						</div>
					</div>
				</section>


                <div class="container py-2">
					<div class="row">
						<div class="col">
                            <div class="row mb-3">
                                <div class="col">

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <iframe  src="{{ asset('/web/organigramaprograma/'.$escuela->url_organigrama) }}" style="width:100%; height: 900px;" frameborder="0"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>







			</div>

			@include('web/programa/partials/footer')
		</div>

		@include('web/programa/partials/scripts')

	</body>
</html>