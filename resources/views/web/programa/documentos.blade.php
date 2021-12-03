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
								<h1 class="text-light font-weight-bold text-8">Documentos Normativos del</h1>
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
                                #
                            </th>
                            <th style="width: 35%;">
                                Documento
                            </th>
                            <th style="width: 50%;">
                                descripcion
                            </th>
                            <th style="width: 10%;">
                                Fecha
                            </th>
                            <th style="width: 10%;">
                                Descargar
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($documentos as  $key => $dato)
                            <tr>
                                <td>
                                    {{$key+1}}
                                </td>
                                <td>
                                    <h5>{{$dato->nombre}}</h5>
                                </td>
                                <td>
                                    {!! $dato->descripcion !!}
                                </td>
                                <td>
                                    {{pasFechaVista($dato->fecha)}}
                                </td>
                                <td> 
                                    <center>
                                    <a href="{{ asset('/web/documentoprograma/'.$dato->url) }}" download class="btn btn-primary btn-sm">
                                        <i class="fa fa-download"></i>
                                    </a> 
                                    </center>
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