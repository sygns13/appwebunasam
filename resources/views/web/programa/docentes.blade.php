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
								<h1 class="text-light font-weight-bold text-8">Listado de Docentes del</h1>
								<span class="sub-title text-light">Programa de Estudio de {{$escuela->nombre}}</span>
							</div>
						</div>
					</div>
				</section>

                <div class="container py-4">

				</div>

            <div id="examples" class="container py-2">
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <div class="col pb-3">
                                
                                <div class="table-responsive">
                <table class="table  table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 5%;">
                                Nro.
                            </th>
                            <th style="width: 25%;">
                                Apellidos y Nombres
                            </th>
                            <th style="width: 25%;">
                                Grados
                            </th>
                            <th style="width: 20%;">
                                Especialidad
                            </th>
                            <th style="width: 25%;">
                                Correo
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($docentes as  $key => $dato)
                            <tr>
                                <td>
                                    {{$key+1}}
                                </td>
                                <td>
                                    <a href="/programadeestudio/docente/{{$dato->hash}}" class="text-color-secondary text-color-hover-primary text-decoration-none">
                                    <h5>{{$dato->nombre}}</h5>
                                    </a>
                                </td>
                                <td>
                                    {!! $dato->grados !!}
                                </td>
                                <td>
                                    {{$dato->especialidad}}
                                </td>
                                <td> 
                                    {{$dato->email}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table> </div>
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