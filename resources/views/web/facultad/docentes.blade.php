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
								<h1 class="text-light font-weight-bold text-8">Plana Docente</h1>
								<span class="sub-title text-light">{{$facultad->nombre}}</span>
							</div>
						</div>
					</div>
				</section>

                <section class="section section-with-shape-divider bg-transparent border-0 pb-4 m-0" style="padding-top: 0%;">

                    <div class="container py-4">

                        @foreach ($departamentos as $key0 => $dato0)
                            

                        <div class="row justify-content-center pb-2 mb-3">
							<div class="col-md-9 col-lg-12 text-center">
								<h2 class="text-color-secondary font-weight-bold line-height-6 mb-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
                                    {{$dato0->nombre}}
                                </h2>
								<p class="custom-font-secondary text-4 mb-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400">
                                    Jefe del Departamento Académico: {{$dato0->director}}</p>
							</div>
						</div>

					<div class="row pt-5" style="padding-bottom: 50px; padding-top: 0px!important;">


                        @foreach($docentes as  $key => $dato)

                        @if($dato->departamentoacademico_id == $dato0->id)
                        <div class="col-lg-4 col-md-6 pb-2">
                                         
                            <div class="card custom-card-style-1 custom-card-style-1-variation" style="border: 1px solid rgb(0 0 0 / 25%);">
                                <div class="card-body text-center bg-color-light-scale-1 py-5">
                                    <div class="custom-card-style-1-image-wrapper bg-primary rounded-circle d-inline-block mb-3">
                                        <a href="#">
                                            
                                            @if($dato->tieneimagen != null && $dato->tieneimagen == 1 && $dato->urlimagen != null)
                                                {{-- <img src="{{ asset('/web/docentefacultad/'.$dato->urlimagen) }}" class="img-fluid rounded-circle" alt="" style="width: 216px; height:216px;"> --}}

                                                <a class="img-thumbnail d-block lightbox rounded-circle" href="{{ asset('/web/docentefacultad/'.$dato->urlimagen) }}" data-plugin-options="{'type':'image'}">
                                                    <img class="img-fluid rounded-circle" src="{{ asset('/web/docentefacultad/'.$dato->urlimagen) }}" style="width: 216px; height:216px;" alt="Project Image">
                                                </a>
                                            @else
                                            {{-- <img src="{{ asset('/webvendor/img/demos/cleaning-services/team/team-1.jpg') }}" class="img-fluid rounded-circle" alt="" /> --}}

                                            <a class="img-thumbnail d-block lightbox rounded-circle" href="{{ asset('/webvendor/img/demos/cleaning-services/team/team-1.jpg') }}" data-plugin-options="{'type':'image'}">
                                                <img class="img-fluid rounded-circle" src="{{ asset('/webvendor/img/demos/cleaning-services/team/team-1.jpg') }}" style="width: 216px; height:216px;" alt="Project Image">
                                            </a>
                                            @endif
                                        </a>
                                    </div>
                                    <h4 class="text-color-secondary font-weight-bold line-height-1 text-5 mb-0">
                                        <a href="/facultad/docente/{{$dato->hash}}" class="text-color-secondary text-color-hover-primary text-decoration-none">
                                            @if($dato != null && $dato->nombre != null)
                                                {{$dato->nombre}}
                                            @endif
                                        </a>
                                    </h4>
                                    <p class="text-2 pb-1 mb-2"><b>Especialidad:</b> {{$dato->especialidad}}<br>
                                    <b>Condición:</b> {{$dato->condicion}}<br>
                                    <b>Categoría:</b> {{$dato->categoria}}<br>
                                    <b>Regimen:</b> {{$dato->regimen}}
                                </p>

                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach

					</div>

                    @endforeach



					</div>
				</section>





		@include('web/facultad/partials/footer')
		</div>
	</div>

	@include('web/facultad/partials/scripts')

	</body>
</html>
