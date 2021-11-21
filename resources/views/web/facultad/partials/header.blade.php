<header id="header" class="header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyChangeLogo': true, 'stickyStartAt': 120, 'stickyHeaderContainerHeight': 70}">
    <div class="header-body border-top-0">
        <div class="header-top header-top-default header-top-borders border-bottom-0 bg-quaternary" style="background: #34383d!important;">
            <div class="container h-100">
                <div class="header-row h-100">
                    <div class="header-column justify-content-end">
                        <div class="header-row">
                            <nav class="header-nav-top">
                                <ul class="nav nav-pills">

                                    <li class="nav-item-borders py-2 d-none d-sm-inline-flex">
                                        <a class="nav-link" href="/"><span class="ws-nowrap"><i class="fas fa-university text-4 {{-- text-color-primary --}}" style="top: 0"></i> Ir al Portal UNASAM</span></a>
                                    </li>


                                    <li class="nav-item nav-item-borders py-2 d-none d-sm-inline-flex">
                                        <span class="ps-0"><i class="far fa-dot-circle text-4 {{-- text-color-primary --}}" style="top: 1px;"></i>
                                            @if($facultad != null && $facultad->direccion != null)
                                                {{$facultad->direccion}}
                                            @endif
                                        </span>
                                    </li>
                                    <li class="nav-item nav-item-borders py-2">
                                        @if($facultad != null && $facultad->telefono != null)
                                            <a href="tel:{{$facultad->telefono}}"><i class="fab fa-whatsapp text-4 {{-- text-color-primary --}}" style="top: 0;"></i> {{$facultad->telefono}}</a>
                                        @endif
                                    </li>
                                    <li class="nav-item nav-item-borders py-2 pe-1 d-none d-md-inline-flex">
                                        @if($facultad != null && $facultad->email != null)
                                            <a href="mailto:{{$facultad->email}}"><i class="far fa-envelope text-4 {{-- text-color-primary --}}" style="top: 1px;"></i> {{$facultad->email}}</a>
                                        @endif
                                        
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-container container">
            <div class="header-row">
                <div class="header-column">
                    <div class="header-row">
                        <div class="header-logo">
                            <a href="/facultad/{{$facultad->hash}}">
                            {{-- 	<img alt="Porto" width="143" height="40" src="img/demos/medical/logo-medical.png"> --}}

                                @if($facultad != null && $facultad->logourl != null)
                                    <img alt="Facultad" height="100"   data-sticky-height="50" data-sticky-top="0"    src="{{ asset('/web/logofacultad/'.$facultad->logourl) }}">
                                @else
                                    <img alt="Facultad" height="100"   data-sticky-height="50" data-sticky-top="0"    src="{{ asset('/webvendor/img/logo_unasam_2.png') }}">
                                @endif

                            </a>
                        </div>
                    </div>
                </div>
                <div class="header-column justify-content-end">
                    <div class="header-row">
                        <div class="header-nav order-2 order-lg-1">
                            <div class="header-nav-main header-nav-main-square header-nav-main-effect-1 header-nav-main-sub-effect-1">
                                <nav class="collapse">
                                    <ul class="nav nav-pills" id="mainNav">
                                        <li class="dropdown-full-color dropdown-secondary">
                                            <a class="nav-link {{$menusActivos->menu1}}" href="demo-medical.html">
                                                Inicio
                                            </a>
                                        </li>
                                        <li class="dropdown dropdown-full-color dropdown-secondary">
                                            <a class="nav-link dropdown-toggle" class="dropdown-toggle" href="#">
                                                La Facultad
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="presentacion/{{$facultad->hash}}">Presentación</a></li>
                                                <li><a class="dropdown-item" href="historia/{{$facultad->hash}}">Historia</a></li>
                                                <li><a class="dropdown-item" href="misionvision/{{$facultad->hash}}">Misión y Visión</a></li>
                                                <li><a class="dropdown-item" href="objetivos/{{$facultad->hash}}">Objetivos Institucionales</a></li>
                                                <li><a class="dropdown-item" href="organigrama/{{$facultad->hash}}">Organigrama</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown dropdown-full-color dropdown-secondary">
                                            <a class="nav-link dropdown-toggle" class="dropdown-toggle" href="#">
                                                Programas de Estudio
                                            </a>
                                            <ul class="dropdown-menu">
                                                @foreach ($escuelas as  $key => $dato)
                                                <li><a class="dropdown-item" href="/escuela/{{$dato->hash}}">{{$dato->nombre}}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li class="dropdown dropdown-full-color dropdown-secondary">
                                            <a class="nav-link dropdown-toggle" class="dropdown-toggle" href="#">
                                                Autoridades
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="decano/{{$facultad->hash}}">Decanatura</a></li>
                                                <li><a class="dropdown-item" href="consejofacultad/{{$facultad->hash}}">Consejo de Facultad</a></li>
                                                <li><a class="dropdown-item" href="directores/{{$facultad->hash}}">Directores de Escuela</a></li>
                                                <li><a class="dropdown-item" href="jefesdepartamentos/{{$facultad->hash}}">Jefes de Departamentos Académicos</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown dropdown-full-color dropdown-secondary">
                                            <a class="nav-link dropdown-toggle" class="dropdown-toggle" href="#">
                                                Eventos
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="noticias/{{$facultad->hash}}">Noticias</a></li>
                                                <li><a class="dropdown-item" href="eventos/{{$facultad->hash}}">Eventos</a></li>
                                                <li><a class="dropdown-item" href="comunicados/{{$facultad->hash}}">Comunicados</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown dropdown-full-color dropdown-secondary">
                                            <a class="nav-link dropdown-toggle" class="dropdown-toggle" href="#">
                                                Transparencia
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="servicios/{{$facultad->hash}}">Servicios</a></li>
                                                <li><a class="dropdown-item" href="docentes/{{$facultad->hash}}">Plana Docente</a></li>
                                                <li><a class="dropdown-item" href="documentos/{{$facultad->hash}}">Documentos Normativos</a></li>
                                                
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <ul class="header-social-icons social-icons d-none d-sm-block">
{{-- 											<li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                <li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                <li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
--}}
                                @foreach($redsocials as  $key => $dato)
                                <li style="box-shadow:none!important;"><a href="{{$dato->urlredsocial}}" target="_blank"><img  src="{{ asset('/web/redsocialfacultad/'.$dato->url) }}" style="max-height: 28px; max-width:28px;"/></a></li>
                            @endforeach
                            </ul>
                            <button class="btn header-btn-collapse-nav" data-bs-toggle="collapse" data-bs-target=".header-nav-main nav">
                                <i class="fas fa-bars"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>