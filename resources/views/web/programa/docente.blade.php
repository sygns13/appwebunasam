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
								<h1 class="text-light font-weight-bold text-8">Programa de Estudio</h1>
								<span class="sub-title text-light">{{$escuela->nombre}}</span>
							</div>
						</div>
					</div>
				</section>

                <div class="container">
                <a  href="{{ asset('/programadeestudio/docentes/'.$escuela->hash)}}">
                    <button type="button" class="btn btn-modern btn-dark mt-3"><i class="fas fa-arrow-left"></i> Volver al Listado de Docentes</button>
                </a>
                </div>


                <div class="container pt-5">

					<div class="row py-4 mb-2">
						<div class="col-md-9 order-2">
							<div class="overflow-hidden">
								<h2 class="text-color-dark font-weight-bold text-12 mb-2 pt-0 mt-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="300">
                                    @if($docente != null && $docente->nombre != null)
                                    {{$docente->nombre}}
                                    @endif
                                </h2>
							</div>

                            <div class="overflow-hidden mb-3">
								<p class="font-weight-bold text-primary text-uppercase mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="500">
                                    @if($docente != null && $docente->especialidad != null)
                                    Especialidad {{$docente->especialidad}}
                                    @endif
                                </p>
							</div>


                            <div class="row">
                                <div class="col-lg-3">
                                    <blockquote style="height: 120px;" class="blockquote-primary">
                                        <p>CATEGORÍA
                                            <br>
                                            <b>{{$docente->categoria}}</b>
                                        </p>
                                        
                                        
                                    </blockquote>
                                </div>
                                <div class="col-lg-3">
                                    <blockquote style="height: 120px;" class="blockquote-secondary">
                                        <p>RÉGIMEN
                                        <br>
                                            <b>{{$docente->regimen}}</b>
                                        </p>
                                    </blockquote>
                                </div>
                                <div class="col-lg-3">
                                    <blockquote style="height: 120px;" class="blockquote-primary">
                                        <p>CONDICIÓN
                                            <br>
                                            <b>{{$docente->condicion}}</b>
                                        </p>
                                    </blockquote>
                                </div>
                                <div class="col-lg-3">
                                    <blockquote style="height: 120px;" class="blockquote-secondary">
                                        <p>FECHA DE INGRESO
                                            <br>
                                            <b>{{pasFechaVista($docente->fecha)}}</b>
                                        </p>
                                    </blockquote>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="tabs">
                                        <ul class="nav nav-tabs nav-justified flex-column flex-md-row">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#grados" data-bs-toggle="tab" class="text-center">Grados Académicos</a>
                                            </li>
                                            {{-- <li class="nav-item">
                                                <a class="nav-link" href="#experiencia" data-bs-toggle="tab" class="text-center">Experiencia Profesional</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#publicaciones" data-bs-toggle="tab" class="text-center">Publicaciones</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#investigacion" data-bs-toggle="tab" class="text-center">Investigación</a>
                                            </li> --}}
                                        </ul>
                                        <div class="tab-content">
                                            <div id="grados" class="tab-pane active">
                                                {!! $docente->grados !!}
                                            </div>
                                            {{-- <div id="experiencia" class="tab-pane">
                                                {!! $docente->experiencia !!}
                                            </div>
                                            <div id="publicaciones" class="tab-pane">
                                                {!! $docente->publicaciones !!}
                                            </div>
                                            <div id="investigacion" class="tab-pane">
                                                {!! $docente->investigaciones !!}
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
							
						{{--	 <p class="lead appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam <a href="#">vehicula</a> sit amet enim ac sagittis. Curabitur eget leo varius, elementum mauris eget, egestas quam. Donec ante risus, dapibus sed lectus non, lacinia vestibulum nisi. Morbi vitae augue quam. Nullam ac laoreet libero.</p>
							<p class="pb-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="800">Consectetur adipiscing elit. Aliquam iaculis sit amet enim ac sagittis. Curabitur eget leo varius, elementum mauris eget, egestas quam.</p> --}}
                            {{-- <div class="lead appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="700">
                                @if($organo != null && $organo->descripcion != null)
                                    {!! $organo->descripcion !!}
                                @endif
                            </div> --}}

							<hr class="solid my-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="900">
							<div class="row align-items-center appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000">
								<div class="col-lg-6">
									<a href="#" class="btn btn-modern btn-dark mt-3"><i class="fas fa-arrow-up"></i> Volver arriba</a>

							{{-- 	<a href="#" class="btn btn-modern btn-primary mt-3">Hire Me</a> --}}
								</div>
								{{-- <div class="col-sm-6 text-lg-end my-4 my-lg-0">
									<strong class="text-uppercase text-1 me-3 text-dark">follow me</strong>
									<ul class="social-icons float-lg-end">
										<li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
										<li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
										<li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
									</ul>
								</div> --}}
							</div>
						</div>
						<div class="col-md-3 order-md-2 mb-4 mb-lg-0 appear-animation" data-appear-animation="fadeInRightShorter">
                            @if($docente != null && $docente->tieneimagen == 1 && $docente->urlimagen != null)
							    {{-- <img src="{{ asset('/web/organoprograma/'.$organo->url) }}" class="img-fluid mb-2" alt=""> --}}

								<a class="img-thumbnail d-block lightbox" href="{{ asset('/web/docenteprograma/'.$docente->urlimagen) }}"  data-plugin-options="{'type':'image'}">
                                    <img class="img-fluid" src="{{ asset('/web/docenteprograma/'.$docente->urlimagen) }}" alt="Visión" style="width: 100%; height: 280px;">
                                </a>
                            @endif

                            <div class="table-responsive">
                                <table class="table  table-bordered">
                                    <tbody>
                                        @if($docente != null && $docente->email != null)
                                            <tr>
                                                <td>
                                                    <i class="far fa-envelope text-color-secondary"></i> {{$docente->email}}
                                                </td>
                                            </tr>
                                        @endif
                                        @if($docente != null && $docente->telefono != null)
                                            <tr>
                                                <td>
                                                    <i class="fab fa-whatsapp text-color-secondary"></i> {{$docente->telefono}}
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
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