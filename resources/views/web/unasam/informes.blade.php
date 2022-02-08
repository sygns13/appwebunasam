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


                <div class="container py-4">

					<div class="row">
						<div class="col">
							<div class="blog-posts single-post">
                                <article class="post post-large blog-single-post border-0 m-0 p-0">

                                    <div class="post-content ms-0">
										<h2 class="font-weight-semi-bold" style="color:#0088CC">
                                            Informes y Publicaciones
                                        </h2>
                                    </div>
                                </article>
                            </div>
						</div>
					</div>
				</div>

            <div id="examples" class="container py-2">
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <div class="col pb-3">
                                
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10%;">
                                #
                            </th>
                            <th style="width: 90%;">
                                Informe o Publicación
                            </th>
                           {{--  <th style="width: 40%;">
                                descripcion
                            </th>
                            <th style="width: 10%;">
                                Fecha
                            </th>
                            <th style="width: 10%;">
                                Descargar
                            </th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($informes as  $key => $dato)
                            <tr>
                                <td style="color: #2d529f!important">
                                    {{$key+1}}
                                </td>
                                <td>
                                    <a href="{{$dato->url}}" target="_blank"><h5 style="color: #2d529f!important">{{$dato->nombre}}</h5></a>
                                </td>
                                {{-- <td>
                                    {!! $dato->descripcion !!}
                                </td>
                                <td>
                                    {{pasFechaVista($dato->fecha)}}
                                </td>
                                <td> 
                                    <center>
                                    <a href="{{ asset('/web/documentounasam/'.$dato->url) }}" download class="btn btn-primary btn-sm">
                                        <i class="fa fa-download"></i>
                                    </a> 
                                    </center>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


			

			@include('web/unasam/partials/footer')
		</div>

		@include('web/unasam/partials/scripts')

	</body>
</html>
