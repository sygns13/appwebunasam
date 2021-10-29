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
								<h1 class="text-dark font-weight-bold text-8">Eventos y Comunicados</h1>
								<span class="sub-title text-dark">Atento a los próximos eventos</span>
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
                                                <li class="page-item"><a class="page-link" href="eventos?page=1">Inicio</a></li>
                                                <li class="page-item"><a class="page-link" href="eventos?page={{$pagination->current_page-1}}"><i class="fas fa-angle-left"></i></a></li>
                                            @endif

                                            @foreach($pagesNumber as  $page)
                                                @if($page == $pagination->current_page)
                                                    <li class="page-item active"><a class="page-link" href="#">{{$page}}</a></li>
                                                @else
                                                    <li class="page-item"><a class="page-link" href="eventos?page={{$page}}">{{$page}}</a></li>
                                                @endif
                                            @endforeach

                                            @if($pagination->current_page < $pagination->last_page)
                                                <li class="page-item"><a class="page-link" href="eventos?page={{$pagination->current_page+1}}"><i class="fas fa-angle-right"></i></a></li>
                                                <li class="page-item"><a class="page-link" href="eventos?page={{$pagination->last_page}}">Final</a></li>
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

                        @foreach($eventos as  $key => $dato)
                        @if($key%2 == 0)

                        <article class="post post-medium">
                            <div class="row mb-3">
                                <div class="col-lg-5">
                                    <div class="post-image">
                                        <a href="evento/{{$dato->hash}}">
                                            @if($dato->imageneventos != null && $dato->imageneventos->count() >0 && $dato->imageneventos[0]->url != null)
                                                <img src="{{ asset('/web/eventounasam/'.$dato->imageneventos[0]->url) }}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" id="imgEvento-{{$dato->id}}" />
                                            @else
                                                <img src="{{ asset('/img/Login-Background.jpg') }}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" id="imgEvento-{{$dato->id}}" />
                                            @endif

                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="post-content">
                                        <h2 class="font-weight-semibold pt-4 pt-lg-0 text-5 line-height-4 mb-2">
                                            <a href="evento/{{$dato->hash}}">
                                                @if($dato->titulo != null)
                                                    {{$dato->titulo}}
                                                @endif
                                            </a>
                                        </h2>

                                        <span><i class="far fa-calendar-alt"></i> 
                                            
                                            @if($dato->nombreMes != null)
                                            {{$dato->dia}} de {{$dato->nombreMes}} , {{$dato->anio}} - {{$dato->hora}}
                                            @endif
                                        </span>

                                        <div style="overflow: hidden; color:white!important; " id="evento-{{$dato->id}}"> 
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

                                        <span class="d-block d-sm-inline-block float-sm-end mt-3 mt-sm-0"><a href="evento/{{$dato->hash}}" class="btn btn-xs btn-light text-1 text-uppercase">Leer más</a></span>
                                    </div>
                                </div>
                            </div>
                        </article>

                        @else

                        <article class="post post-medium">
                            <div class="row mb-3">
                                <div class="col-lg-7">
                                    <div class="post-content">
                                        <h2 class="font-weight-semibold pt-4 pt-lg-0 text-5 line-height-4 mb-2">
                                            <a href="evento/{{$dato->hash}}">
                                                @if($dato->titulo != null)
                                                    {{$dato->titulo}}
                                                @endif
                                            </a>
                                        </h2>

                                        <span><i class="far fa-calendar-alt"></i> 
                                            
                                            @if($dato->nombreMes != null)
                                            {{$dato->dia}} de {{$dato->nombreMes}} , {{$dato->anio}} - {{$dato->hora}}
                                            @endif
                                        </span>

                                        <div style="overflow: hidden; color:white!important; " id="evento-{{$dato->id}}"> 
                                            <p class="mb-0">
                                                @if($dato->desarrollo != null)
                                                    {!!$dato->desarrollo !!}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-5">
                                    <div class="post-image">
                                        <a href="evento/{{$dato->hash}}">
                                            @if($dato->imageneventos != null && $dato->imageneventos->count() >0 && $dato->imageneventos[0]->url != null)
                                                <img src="{{ asset('/web/eventounasam/'.$dato->imageneventos[0]->url) }}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" id="imgEvento-{{$dato->id}}" />
                                            @else
                                                <img src="{{ asset('/img/Login-Background.jpg') }}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" id="imgEvento-{{$dato->id}}" />
                                            @endif

                                        </a>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="post-meta">
{{--                                             <span><i class="far fa-user"></i> By <a href="#">John Doe</a> </span>
                                        <span><i class="far fa-folder"></i> <a href="#">Lifestyle</a>, <a href="#">Design</a> </span>
                                        <span><i class="far fa-comments"></i> <a href="#">12 Comments</a></span> --}}
                                        <span class="d-block d-sm-inline-block float-sm-end mt-3 mt-sm-0"><a href="evento/{{$dato->hash}}" class="btn btn-xs btn-light text-1 text-uppercase">Leer más</a></span>
                                    </div>
                                </div>
                            </div>
                        </article>
                        @endif
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
                                                <li class="page-item"><a class="page-link" href="eventos?page=1">Inicio</a></li>
                                                <li class="page-item"><a class="page-link" href="eventos?page={{$pagination->current_page-1}}"><i class="fas fa-angle-left"></i></a></li>
                                            @endif

                                            @foreach($pagesNumber as  $page)
                                                @if($page == $pagination->current_page)
                                                    <li class="page-item active"><a class="page-link" href="#">{{$page}}</a></li>
                                                @else
                                                    <li class="page-item"><a class="page-link" href="eventos?page={{$page}}">{{$page}}</a></li>
                                                @endif
                                            @endforeach

                                            @if($pagination->current_page < $pagination->last_page)
                                                <li class="page-item"><a class="page-link" href="eventos?page={{$pagination->current_page+1}}"><i class="fas fa-angle-right"></i></a></li>
                                                <li class="page-item"><a class="page-link" href="eventos?page={{$pagination->last_page}}">Final</a></li>
                                            @endif
                                        </ul>
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

        @foreach($eventos as  $key => $dato)
        <script>
            var alto = $("#imgEvento-{{$dato->id}}").height();

            $("#evento-{{$dato->id}}").css("height", alto+"px");
        /* 	$(document).ready(function () {
                alert("hoa");
            }); */
        </script>
    @endforeach

	</body>
</html>
