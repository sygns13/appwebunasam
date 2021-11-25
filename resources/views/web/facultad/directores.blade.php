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
								<h1 class="text-light font-weight-bold text-8">Directores de Escuela</h1>
								<span class="sub-title text-light">{{$facultad->nombre}}</span>
							</div>
						</div>
					</div>
				</section>


                <section id="blog" class="section section-no-border bg-color-light m-0">
					<div class="container">
						<div class="row">
							<div class="col">
								{{-- <h2 class="text-color-quaternary font-weight-extra-bold text-uppercase">My Blog</h2> --}}

								<div class="row">

                                    @foreach($escuelas as  $key => $dato)

                                    @if($dato->director != null)
{{--                                         <div class="col-lg-6 mb-5 mb-lg-0" style="padding-bottom:30px;">
                                            <article class="thumb-info custom-thumb-info-2 custom-box-shadow-1 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="0" data-appear-animation-duration="1s" style="border: 10px outset rgb(64 116 219);">
                                                <div class="thumb-info-wrapper">
                                                    <a href="/facultad/director/{{$dato->hash}}/{{$facultad->hash}}">
                                                        

                                                        @if($dato->director->tieneimagen != null && $dato->director->tieneimagen == 1 && $dato->director->url != null)
                                                            <img src="{{ asset('/web/organoprograma/'.$dato->director->url) }}" alt class="img-fluid" style="width: 555px; height:300px;" />
                                                        @else
                                                            <img src="{{ asset('/webvendor/img/demos/resume/blog/blog-1.jpg') }}" alt class="img-fluid" />
                                                        @endif
                                                    </a>
                                                </div>
                                                <div class="thumb-info-caption">
                                                    <div class="thumb-info-caption-text">
                                                        <h4 class="mb-2">
                                                            <a href="/facultad/director/{{$dato->hash}}/{{$facultad->hash}}" class="text-decoration-none text-color-dark font-weight-semibold">
                                                                @if($dato->director->titulo != null)
                                                                    {{$dato->director->titulo}}
                                                                @endif
                                                            </a>
                                                        </h4>
                                                        <p class="custom-text-color-2" style="font-size: 17px;">
                                                            @if($dato->director->subtitulo != null)
                                                                {{$dato->director->subtitulo}}
                                                            @endif
                                                        </p>
                                                    </div>

                                                </div>
                                            </article>
                                        </div> --}}








                                        <div class="col-lg-6 mb-4 mb-lg-0">
                                            <article>
                                                <div class="card border-0 border-radius-0 box-shadow-1">
                                                    <div class="card-body p-4 z-index-1" style="border: 10px outset rgb(64, 116, 219);">
                                                        <a href="/facultad/director/{{$dato->hash}}/{{$facultad->hash}}">
                                                            
                                                            @if($dato->director->tieneimagen != null && $dato->director->tieneimagen == 1 && $dato->director->url != null)
                                                                <img src="{{ asset('/web/organoprograma/'.$dato->director->url) }}" alt class="img-fluid" style="width: 555px; height:300px;" />
                                                            @else
                                                                <img src="{{ asset('/webvendor/img/demos/seo-2/blog/blog-1.jpg') }}" alt class="card-img-top border-radius-0" style="width: 555px; height:300px;" />
                                                            @endif
                                                        </a>
                                                        {{-- <p class="text-uppercase text-1 mb-3 pt-1 text-color-default"><time pubdate datetime="2021-01-10">10 Jan 2021</time> <span class="opacity-3 d-inline-block px-2">|</span> 3 Comments <span class="opacity-3 d-inline-block px-2">|</span> John Doe</p> --}}
                                                        <div class="card-body p-0">
                                                            <h4 class="card-title mb-3 text-5 font-weight-semibold"><a class="text-color-dark" href="/facultad/director/{{$dato->hash}}/{{$facultad->hash}}">
                                                                @if($dato->director->titulo != null)
                                                                    {{$dato->director->titulo}}
                                                                @endif    
                                                            </a></h4>
                                                            <p class="card-text mb-3">
                                                                @if($dato->director->subtitulo != null)
                                                                    {{$dato->director->subtitulo}}
                                                                @endif 
                                                            </p>
                                                            <a href="/facultad/director/{{$dato->hash}}/{{$facultad->hash}}" class="font-weight-bold text-uppercase text-decoration-none d-block mt-3">Ver más</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                    @endif
                                    @endforeach

								</div>
							</div>
							{{-- <div class="col-lg-12 col-sm-12 pt-4 mt-4 text-center">
								<a class="btn btn-primary btn-outline custom-btn-style-2 font-weight-bold custom-border-radius-1 text-uppercase">View All</a>
							</div> --}}
						</div>
					</div>
				</section>





		@include('web/facultad/partials/footer')
		</div>
	</div>

	@include('web/facultad/partials/scripts')

	</body>
</html>
