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
                                            @if($estatuto != null && $estatuto->titulo != null)
                                                {{$estatuto->titulo}}
                                            @endif
                                        </h2>
                                    </div>

                                    <div class="post-content ms-0">
                                        @if($estatuto != null && $estatuto->descripcion != null)
                                            {!!$estatuto->descripcion!!}
                                        @endif
                                    </div>

                                    @if($estatuto != null && $estatuto->url != null)
                                        <div class="post-image ms-0">
                                            <center>
                                                <embed src="{{ asset('/web/estatutounasam/'.$estatuto->url) }}" type="application/pdf" width="100%" height="600px" id="fileInformacion"/>
                                            </center>
                                        </div>
                                    @endif

                                    
                                </article>
                            </div>
						</div>
					</div>
				</div>

                @if($estatuto != null && $estatuto->documentoestatuto != null &&  $estatuto->documentoestatuto->count() > 0)
                <div class="container">
                    <div class="row">
                        <div class="col appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
                            <h2 class="font-weight-semibold mb-0">Modificatorias</h2>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="toggle toggle-primary" data-plugin-toggle>
                                @foreach($estatuto->documentoestatuto as  $key => $dato)

                                <section class="toggle">
									<a class="toggle-title">
                                        @if($dato != null && $dato->nombre != null)
                                            {{$dato->nombre}}
                                        @endif
                                    </a>
                                    <div class="toggle-content">
                                    @if($dato != null && $dato->descripcion != null)
                                        {!!$dato->descripcion!!}
                                    @endif

                                    
                                    <div class="col-sm-9">
                                        <a download href="{{ asset('/web/estatutounasam/'.$dato->url)}}">
                                            <button type="button" class="btn btn-dark btn-lg rounded-0 mb-2"><i class="fas fa-file-pdf"></i> Descargar Documento</button>
                                        </a>
                                    </div>


                                </div>
								</section>

                                
                                @endforeach
                            </div>
                        </div>







                    </div>
                </div>


                @endif









			</div>

			@include('web/unasam/partials/footer')
		</div>

		@include('web/unasam/partials/scripts')

	</body>
</html>
