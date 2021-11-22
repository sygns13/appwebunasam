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

				
				<div class="container py-4">

					<div class="row">
						<div class="col">
							<div class="blog-posts single-post">
                                <article class="post post-large blog-single-post border-0 m-0 p-0">


									<div class="post-date ms-0">
										<span class="day">
											@if($noticia->dia != null)
												{{$noticia->dia}}
											@endif
										</span>
										<span class="month">
											@if($noticia->iniNombreMes != null)
												{{$noticia->iniNombreMes}}
											@endif
										</span>
									</div>

                                    <div class="post-content ms-0">
										<h2 class="font-weight-semi-bold" style="color:#0088CC">
                                            @if($noticia != null && $noticia->titular != null)
                                                {{$noticia->titular}}
                                            @endif
                                        </h2>
                                    </div>

									<span><i class="far fa-calendar-alt"></i> 
                                            
										@if($noticia->nombreMes != null)
										{{$noticia->dia}} de {{$noticia->nombreMes}} , {{$noticia->anio}} - {{$noticia->hora}}
										@endif
									</span>

									

                                    @if($noticia != null && $noticia->imagennoticias != null &&  $noticia->imagennoticias->count() > 0)
                                    @php
                                        $image1 = $noticia->imagennoticias[0];
                                    @endphp
                                        @if($image1 != null && $image1->url != null)
                                            <div class="post-image ms-0">
												<center>
                                                    <img src="{{ asset('/web/noticiafacultad/'.$image1->url) }}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" style="max-height: 500px"/>
												</center>
                                            </div>
                                        @endif
                                    @endif

									<div class="post-content ms-0">
                                        @if($noticia != null && $noticia->desarrollo != null)
                                                {!!$noticia->desarrollo!!}
                                            @endif
                                    </div>

                                    
                                </article>
                            </div>
						</div>
					</div>
				</div>







				@if($noticia != null && $noticia->imagennoticias != null &&  $noticia->imagennoticias->count() > 1)
                <div class="container">

                    @foreach($noticia->imagennoticias as  $key => $dato)

                    @if($key > 0)
                        @if($key%2 != 0)
                            <div class="row align-items-center pt-4 appear-animation" data-appear-animation="fadeInLeftShorter">
                                <div class="col-md-4 mb-4 mb-md-0">
                                    <img class="img-fluid scale-2 pe-5 pe-md-0 my-4" src="{{ asset('/web/noticiafacultad/'.$dato->url) }}" alt="{{$dato->nombre}}" />
                                </div>
                                <div class="col-md-8 ps-md-5">
                                    @if($dato->nombre != null)
                                        <h2 class="font-weight-normal text-6 mb-3"><strong class="font-weight-extra-bold">{{$dato->nombre}}</strong></h2>
                                    @endif
                                    @if($dato->descripcion != null)
                                        <p class="text-4">{!! $dato->descripcion !!}</p>
                                    @endif
                                </div>
                            </div>
                        @else
                            <div class="row align-items-center py-5 appear-animation" data-appear-animation="fadeInRightShorter">
                                <div class="col-md-8 pe-md-5 mb-5 mb-md-0">
                                    @if($dato->nombre != null)
                                        <h2 class="font-weight-normal text-6 mb-3"><strong class="font-weight-extra-bold">{{$dato->nombre}}</strong></h2>
                                    @endif
                                    @if($dato->descripcion != null)
                                        <p class="text-4">{!! $dato->descripcion !!}</p>
                                    @endif
                                </div>
                                <div class="col-md-4 px-5 px-md-3">
                                    <img class="img-fluid scale-2 pe-5 pe-md-0 my-4" src="{{ asset('/web/noticiafacultad/'.$dato->url) }}" alt="{{$dato->nombre}}" />
                                </div>
                            </div>
                        @endif
                    @endif

                        <hr class="solid my-5">

                    @endforeach
                </div>
                @endif





		@include('web/facultad/partials/footer')
		</div>
	</div>

	@include('web/facultad/partials/scripts')

	</body>
</html>
