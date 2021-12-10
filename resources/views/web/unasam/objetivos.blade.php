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
                                            Objetivos Estratégicos UNASAM
                                        </h2>
                                    </div>
                                </article>
                            </div>
						</div>
					</div>
				</div>


                <div class="container">

                    @foreach($objetivos as  $key => $dato)

                    @if($key >= 0)
                        @if($key%2 != 0)
                            <div class="row align-items-center pt-4 appear-animation" data-appear-animation="fadeInLeftShorter">
                                <div class="col-md-5 mb-4 mb-md-0">
                                    {{-- <img class="img-fluid scale-2 pe-5 pe-md-0 my-4" src="{{ asset('/web/objetivounasam/'.$dato->url) }}" alt="{{$dato->titulo}}" /> --}}

                                    <a class="lightbox" href="{{ asset('/web/objetivounasam/'.$dato->url) }}" data-plugin-options="{'type':'image'}">
                                        <img class="img-fluid" src="{{ asset('/web/objetivounasam/'.$dato->url) }}" alt="Objetivo" style="width: 100%; height: 280px;">
                                    </a>
                                </div>
                                <div class="col-md-7 ps-md-5">
                                    @if($dato->titulo != null)
                                        <h2 class="font-weight-normal text-6 mb-3"><strong class="font-weight-extra-bold">{{$dato->titulo}}</strong></h2>
                                    @endif
                                    @if($dato->descripcion != null)
                                        <p class="text-4">{!! $dato->descripcion !!}</p>
                                    @endif
                                </div>
                            </div>
                        @else
                            <div class="row align-items-center py-5 appear-animation" data-appear-animation="fadeInRightShorter">
                                <div class="col-md-7 pe-md-5 mb-5 mb-md-0">
                                    @if($dato->titulo != null)
                                        <h2 class="font-weight-normal text-6 mb-3"><strong class="font-weight-extra-bold">{{$dato->titulo}}</strong></h2>
                                    @endif
                                    @if($dato->descripcion != null)
                                        <p class="text-4">{!! $dato->descripcion !!}</p>
                                    @endif
                                </div>
                                <div class="col-md-5 px-5 px-md-3">
                                    {{-- <img class="img-fluid scale-2 pe-5 pe-md-0 my-4" src="{{ asset('/web/objetivounasam/'.$dato->url) }}" alt="{{$dato->titulo}}" /> --}}

                                    <a class="lightbox" href="{{ asset('/web/objetivounasam/'.$dato->url) }}" data-plugin-options="{'type':'image'}">
                                        <img class="img-fluid" src="{{ asset('/web/objetivounasam/'.$dato->url) }}" alt="Objetivo" style="width: 100%; height: 280px;">
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endif

                        <hr class="solid my-5">

                    @endforeach
                </div>

			

			@include('web/unasam/partials/footer')
		</div>

		@include('web/unasam/partials/scripts')

	</body>
</html>
