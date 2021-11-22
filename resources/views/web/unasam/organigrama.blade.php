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

                <section class="page-header page-header-modern bg-color-light-scale-2 page-header-md">
					<div class="container">
						<div class="row">
							<div class="col-md-12 align-self-center p-static order-2 text-center">
								<h1 class="text-dark font-weight-bold text-8">{{$unasam->nombre_organigrama}}</h1>
								{{-- <span class="sub-title text-dark">Revisa las últimas noticias</span> --}}
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
                                            <iframe  src="{{ asset('/web/organigramaunasam/'.$unasam->url_organigrama) }}" style="width:100%; height: 900px;" frameborder="0"></iframe>
                                        </div>
                                    </div>
                                </div>
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
