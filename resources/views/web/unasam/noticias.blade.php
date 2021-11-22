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
								<h1 class="text-dark font-weight-bold text-8">Noticias de Actualidad</h1>
								<span class="sub-title text-dark">Revisa las últimas noticias</span>
							</div>
						</div>
					</div>
				</section>

                @php
                    $offset = 9;

                    $pagesNumber = [];

                    //inicio Algoritmo de Paginacion
                    if($pagination != null && $pagination->to != null){
                        //$offset = $pagination->perPage() * ($pagination->currentPage() - 1);
                        $from=$pagination->current_page - $offset;
                        $from2=$pagination->current_page - $offset;
                        
                        if($from<1){
                            $from=1;
                        }

                        $to= $from2 + ($offset*2);
                        if($to>=$pagination->last_page){
                            $to=$pagination->last_page;
                        }

                        while($from<=$to){
                            $pagesNumber[] = ($from);
                            $from++;
                        }
                    }
                    //final Algoritmo de Paginacion
                @endphp


                <div class="container py-2">
					<div class="row">
						<div class="col">
                            <div class="row mb-3">
                                <div class="col">

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <ul class="pagination" style="float:right;">
                                                @if($pagination->current_page > 1)
                                                    <li class="page-item"><a class="page-link" href="noticias?page=1">Inicio</a></li>
                                                    <li class="page-item"><a class="page-link" href="noticias?page={{$pagination->current_page-1}}"><i class="fas fa-angle-left"></i></a></li>
                                                @endif

                                                @foreach($pagesNumber as  $page)
                                                    @if($page == $pagination->current_page)
                                                        <li class="page-item active"><a class="page-link" href="#">{{$page}}</a></li>
                                                    @else
                                                        <li class="page-item"><a class="page-link" href="noticias?page={{$page}}">{{$page}}</a></li>
                                                    @endif
                                                @endforeach

                                                @if($pagination->current_page < $pagination->last_page)
                                                    <li class="page-item"><a class="page-link" href="noticias?page={{$pagination->current_page+1}}"><i class="fas fa-angle-right"></i></a></li>
                                                    <li class="page-item"><a class="page-link" href="noticias?page={{$pagination->last_page}}">Final</a></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="container py-4">
                    <div class="col-lg-12">
                        <div class="blog-posts">

                            @foreach($noticias as  $key => $dato)
                            <article class="post post-medium">
                                <div class="row mb-3">
                                    <div class="col-lg-5">
                                        <div class="post-image">
                                            <a href="noticia/{{$dato->hash}}">
                                                @if($dato->imagennoticias != null && $dato->imagennoticias->count() >0 && $dato->imagennoticias[0]->url != null)
												    <img src="{{ asset('/web/noticiaunasam/'.$dato->imagennoticias[0]->url) }}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" id="imgNoticia-{{$dato->id}}" />
												@else
												    <img src="{{ asset('/img/Login-Background.jpg') }}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" id="imgNoticia-{{$dato->id}}" />
												@endif

                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="post-content">
                                            <span><i class="far fa-calendar-alt"></i> 
                                            
                                                @if($dato->nombreMes != null)
                                                {{$dato->dia}} de {{$dato->nombreMes}} , {{$dato->anio}} - {{$dato->hora}}
                                                @endif
                                            </span>
                                            
                                            <h2 class="font-weight-semibold pt-4 pt-lg-0 text-5 line-height-4 mb-2">
                                                <a href="noticia/{{$dato->hash}}">
                                                    @if($dato->titular != null)
														{{$dato->titular}}
													@endif
                                                </a>

                                                
                                            </h2>

                                            <div style="overflow: hidden; color:white!important; " id="noticia-{{$dato->id}}"> 
                                                <p class="mb-0">
                                                    @if($dato->desarrollo != null)
                                                        {!!$dato->desarrollo !!}
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="post-meta">
                                            <span><i class="far fa-calendar-alt"></i> 
                                                
                                                @if($dato->nombreMes != null)
                                                {{$dato->dia}} de {{$dato->nombreMes}} , {{$dato->anio}} - {{$dato->hora}}
                                                @endif
                                            </span>
{{--                                             <span><i class="far fa-user"></i> By <a href="#">John Doe</a> </span>
                                            <span><i class="far fa-folder"></i> <a href="#">Lifestyle</a>, <a href="#">Design</a> </span>
                                            <span><i class="far fa-comments"></i> <a href="#">12 Comments</a></span> --}}
                                            <span class="d-block d-sm-inline-block float-sm-end mt-3 mt-sm-0"><a href="noticia/{{$dato->hash}}" class="btn btn-xs btn-light text-1 text-uppercase">Leer más</a></span>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            @endforeach

                        </div>
                    </div>
                </div>



                <div class="container py-2">
					<div class="row">
						<div class="col">
                            <div class="row mb-3">
                                <div class="col">

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <ul class="pagination" style="float:right;">
                                                @if($pagination->current_page > 1)
                                                    <li class="page-item"><a class="page-link" href="noticias?page=1">Inicio</a></li>
                                                    <li class="page-item"><a class="page-link" href="noticias?page={{$pagination->current_page-1}}"><i class="fas fa-angle-left"></i></a></li>
                                                @endif

                                                @foreach($pagesNumber as  $page)
                                                    @if($page == $pagination->current_page)
                                                        <li class="page-item active"><a class="page-link" href="#">{{$page}}</a></li>
                                                    @else
                                                        <li class="page-item"><a class="page-link" href="noticias?page={{$page}}">{{$page}}</a></li>
                                                    @endif
                                                @endforeach

                                                @if($pagination->current_page < $pagination->last_page)
                                                    <li class="page-item"><a class="page-link" href="noticias?page={{$pagination->current_page+1}}"><i class="fas fa-angle-right"></i></a></li>
                                                    <li class="page-item"><a class="page-link" href="noticias?page={{$pagination->last_page}}">Final</a></li>
                                                @endif
                                            </ul>
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

        @foreach($noticias as  $key => $dato)
			<script>
				var alto = $("#imgNoticia-{{$dato->id}}").height();

                $("#noticia-{{$dato->id}}").css("height", alto+"px");
			/* 	$(document).ready(function () {
					alert("hoa");
				}); */
			</script>
		@endforeach

	</body>
</html>
