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
								<h1 class="text-light font-weight-bold text-8">Comunicados</h1>
								<span class="sub-title text-light">Visualizar los últimos comunicados</span>
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
                                                <li class="page-item"><a class="page-link" href="/facultad/{{$facultad->hash}}/comunicados?page=1">Inicio</a></li>
                                                <li class="page-item"><a class="page-link" href="/facultad/{{$facultad->hash}}/comunicados?page={{$pagination->current_page-1}}"><i class="fas fa-angle-left"></i></a></li>
                                            @endif

                                            @foreach($pagesNumber as  $page)
                                                @if($page == $pagination->current_page)
                                                    <li class="page-item active"><a class="page-link" href="#">{{$page}}</a></li>
                                                @else
                                                    <li class="page-item"><a class="page-link" href="/facultad/{{$facultad->hash}}/comunicados?page={{$page}}">{{$page}}</a></li>
                                                @endif
                                            @endforeach

                                            @if($pagination->current_page < $pagination->last_page)
                                                <li class="page-item"><a class="page-link" href="/facultad/{{$facultad->hash}}/comunicados?page={{$pagination->current_page+1}}"><i class="fas fa-angle-right"></i></a></li>
                                                <li class="page-item"><a class="page-link" href="/facultad/{{$facultad->hash}}/comunicados?page={{$pagination->last_page}}">Final</a></li>
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

                <div class="row">
                    <div class="col">
                        <div class="blog-posts">


                            @foreach($comunicados as  $key => $dato)
                            <article class="post post-large">
                                {{-- <div class="post-image">
                                    <a href="/facultad/comunicado/{{$dato->hash}}/{{$facultad->hash}}">
                                        <img src="img/blog/wide/blog-11.jpg" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" />
                                    </a>
                                </div> --}}

                                @if($dato->nombreMes != null)
                                    <div class="post-date">
                                        <span class="day">{{$dato->dia}}</span>
                                        <span class="month">{{$dato->iniNombreMes}}</span>
                                    </div>
                                @endif
                                

                                <div class="post-content">

                                    <h2 class="font-weight-semibold text-6 line-height-3 mb-3">
                                        <a href="/facultad/comunicado/{{$dato->hash}}/{{$facultad->hash}}">
                                            @if($dato->titulo != null)
                                                {{$dato->titulo}}
                                            @endif
                                        </a>
                                    </h2>
                                    
                                    
                                    <div style="overflow: hidden; color:white!important; " id="noticia-{{$dato->id}}"> 
                                        @if($dato->desarrollo != null)
                                            {!!$dato->desarrollo !!}
                                        @endif
                                    </div>

                                    <div class="post-meta">
                                        <span class="d-block d-sm-inline-block float-sm-end mt-3 mt-sm-0"><a href="/facultad/comunicado/{{$dato->hash}}/{{$facultad->hash}}" class="btn btn-xs btn-light text-1 text-uppercase">Ver Más</a></span>
                                    </div>

                                </div>
                            </article>
                            @endforeach



                        </div>
                    </div>
                </div>
            </div>







		@include('web/facultad/partials/footer')
		</div>
	</div>

	@include('web/facultad/partials/scripts')

	</body>
</html>
