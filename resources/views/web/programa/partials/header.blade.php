<header id="header" class="header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyChangeLogo': true, 'stickyStartAt': 120, 'stickyHeaderContainerHeight': 70}">
    <div class="header-body border-top-0">
        <div class="header-top header-top-default header-top-borders border-bottom-0 bg-color-light">
            <div class="container h-100">
                <div class="header-row h-100">
                    <div class="header-column justify-content-between">
                        <div class="header-row">
                            <nav class="header-nav-top w-100">
                                <ul class="nav nav-pills justify-content-between w-100 h-100">
                                    <li class="nav-item py-2 d-inline-flex">
                                        <span class="header-top-phone py-2 d-flex align-items-center text-color-secondary font-weight-semibold text-uppercase" style="font-size: 14px !important;">
                                            <span>
                                                <img width="15" height="18" src="{{ asset('/webvendor/img/demos/business-consulting-2/icons/phone.svg') }}" alt="Phone">
                                            </span>
                                            @if($escuela != null && $escuela->telefono != null)
                                                <a class="text-color-secondary text-color-hover-primary text-decoration-none" href="tel:{{$escuela->telefono}}">{{$escuela->telefono}}</a>
                                            @endif
                                        </span>
                                        <span class="header-top-email px-0 font-weight-normal align-items-center d-none d-xl-flex">
                                            <span>
                                                <img width="25" height="18" src="{{ asset('/webvendor/img/demos/business-consulting-2/icons/mail.svg') }}" alt="Mail">
                                            </span>
                                            @if($escuela != null && $escuela->email != null)
                                                <a class="text-color-secondary text-color-hover-primary text-decoration-none" href="mailto:{{$escuela->email}}">{{$escuela->email}}</a>
                                            @endif
                                        </span>
                                        {{-- <span class="header-top-opening-hours px-0 font-weight-normal align-items-center text-color-secondary d-none d-xl-flex">
                                            <span>
                                                
                                                <i class="far fa-dot-circle text-4  " style="top: 1px;"></i>
                                            </span>
                                            @if($escuela != null && $escuela->direccion != null)
                                                {{$escuela->direccion}}&nbsp;&nbsp;
                                            @endif
                                        </span> --}}

                                        <span class="header-top-opening-hours px-0 font-weight-normal align-items-center text-color-secondary d-none d-xl-flex">
                                            <span>
                                                <i class="fas fa-home text-4 {{-- text-color-primary --}}" style="top: 1px; left: 2px;"></i>
                                            </span>
                                            <a class="text-color-secondary text-color-hover-primary text-decoration-none" href="/">Ir al Portal UNASAM</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                        </span>

                                        <span class="header-top-opening-hours px-0 font-weight-normal align-items-center text-color-secondary d-none d-xl-flex">
                                            <span>
                                                <i class="fas fa-university text-4 {{-- text-color-primary --}}" style="top: 1px; left: 2px;"></i>
                                            </span>
                                            <a class="text-color-secondary text-color-hover-primary text-decoration-none" href="/facultad/{{$facultad->hash}}">Ir a {{$facultad->nombre}}</a>
                                        </span>
                                    </li>
                                    <li class="nav-item nav-item-header-top-socials d-none d-md-flex justify-content-between h-100">
                                        <span class="header-top-button-make-as-appoitment d-inline-flex align-items-center justify-content-center h-100 p-0 align-top">
                                            <a href="/programadeestudio/{{$facultad->hash}}" class="btn-primary d-flex align-items-center justify-content-center h-100 w-100 text-color-light font-weight-semibold text-decoration-none text-uppercase custom-button-header-top" style="padding-left: 10px; padding-right: 10px;">Programa de Estudio : {{$escuela->nombre}}</a>
                                        </span>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-container container bg-color-light">
            <div class="header-row">
                <div class="header-column header-column-logo">
                    <div class="header-row">
                        <div class="header-logo">
                            <a href="/programadeestudio/{{$facultad->hash}}">
                                

                                @if($escuela != null && $escuela->logourl != null)                                              
                                    <img alt="Programa de Estudio" height="65" src="{{ asset('/web/logoprograma/'.$escuela->logourl) }}">
                                @else
                                    <img alt="Programa de Estudio" height="65" src="{{ asset('/webvendor/img/logo_unasam_2.png') }}">
                                @endif


                            </a>
                        </div>
                    </div>
                </div>
                <div class="header-column header-column-nav-menu justify-content-end">
                    <div class="header-row">
                        <div class="header-nav header-nav-links order-2 order-lg-1">
                            <div class="header-nav-main header-nav-main-square header-nav-main-effect-1 header-nav-main-sub-effect-1">
                                <nav class="collapse">
                                    <ul class="nav nav-pills" id="mainNav">
                                        <li class="dropdown-secondary">
                                            <a class="nav-link {{$menusActivos->menu1}}" href="/programadeestudio/{{$escuela->hash}}">
                                                Inicio
                                            </a>
                                        </li>
                                        <li class="dropdown-secondary dropdown">
                                            <a class="nav-link dropdown-toggle  {{$menusActivos->menu2}}"  href="#">
                                                El programa de Estudio
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="/programadeestudio/presentacion/{{$escuela->hash}}">Presentación</a></li>
                                                <li><a class="dropdown-item" href="/programadeestudio/resumen/{{$escuela->hash}}">Resumen</a></li>
                                                <li><a class="dropdown-item" href="/programadeestudio/campolaboral/{{$escuela->hash}}">Campo Laboral</a></li>
                                                <li><a class="dropdown-item" href="/programadeestudio/historia/{{$escuela->hash}}">Historia</a></li>
                                                <li><a class="dropdown-item" href="/programadeestudio/misionvision/{{$escuela->hash}}">Misión y Visión</a></li>
                                                <li><a class="dropdown-item" href="/programadeestudio/objetivos/{{$escuela->hash}}">Objetivos Educacionales</a></li>
                                                <li><a class="dropdown-item" href="/programadeestudio/organigrama/{{$escuela->hash}}">Organigrama</a></li>
                                                
                                            </ul>
                                        </li>
                                        <li class="dropdown-secondary dropdown">
                                            <a class="nav-link dropdown-toggle {{$menusActivos->menu3}}"  href="#">
                                                Competencias
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="/programadeestudio/competenciasespecificas/{{$escuela->hash}}">Competencias Específicas</a></li>
                                                <li><a class="dropdown-item" href="/programadeestudio/competenciasgenerales/{{$escuela->hash}}">Competencias Generales</a></li>
                                                
                                            </ul>
                                        </li>
                                        <li class="dropdown-secondary dropdown">
                                            <a class="nav-link dropdown-toggle {{$menusActivos->menu4}}"  href="#">
                                                Planes de Estudio
                                            </a>
                                            <ul class="dropdown-menu">
                                                @foreach ($planesestudios as $dato)
                                                    <li><a class="dropdown-item" href="/programadeestudio/planesestudio/{{$dato->hash}}">{{$dato->titulo}}</a></li>
                                                    
                                                @endforeach															
                                            </ul>
                                        </li>
                                        <li class="dropdown-secondary dropdown">
                                            <a class="nav-link dropdown-toggle {{$menusActivos->menu5}}"  href="#">
                                                Perfiles
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="/programadeestudio/perfilingreso/{{$escuela->hash}}">Perfil de Ingreso</a></li>
                                                <li><a class="dropdown-item" href="/programadeestudio/perfilegreso/{{$escuela->hash}}">Perfil de Egreso</a></li>
                                                
                                            </ul>
                                        </li>
                                        <li class="dropdown-secondary dropdown">
                                            <a class="nav-link dropdown-toggle {{$menusActivos->menu6}}"  href="#">
                                                Estadísticas
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="/programadeestudio/matriculados/{{$escuela->hash}}">Número de Matriculados</a></li>
                                                <li><a class="dropdown-item" href="/programadeestudio/egresados/{{$escuela->hash}}">Número de Egresados</a></li>
                                                <li><a class="dropdown-item" href="/programadeestudio/graduados/{{$escuela->hash}}">Número de Graduados</a></li>
                                                <li><a class="dropdown-item" href="/programadeestudio/titulados/{{$escuela->hash}}">Número de Titulados</a></li>
                                                
                                            </ul>
                                        </li>
                                        <li class="dropdown-secondary dropdown">
                                            <a class="nav-link dropdown-toggle {{$menusActivos->menu7}}"  href="#">
                                                Transparencia
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="/programadeestudio/documentos/{{$escuela->hash}}">Documentos Normativos</a></li>
                                                <li><a class="dropdown-item" href="/programadeestudio/docentes/{{$escuela->hash}}">Personal Docente</a></li>
                                                <li><a class="dropdown-item" href="/programadeestudio/{{$escuela->hash}}/noticias">Noticias</a></li>
                                                <li><a class="dropdown-item" href="/programadeestudio/{{$escuela->hash}}/eventos">Eventos</a></li>
                                                <li><a class="dropdown-item" href="/programadeestudio/{{$escuela->hash}}/comunicados">Comunicados</a></li>
                                                
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <button class="btn header-btn-collapse-nav" data-bs-toggle="collapse" data-bs-target=".header-nav-main nav">
                                <i class="fas fa-bars"></i>
                            </button>
                        </div>
                    </div>
                </div>
                {{-- <div class="header-column header-column-search justify-content-center align-items-end">
                    <div class="header-nav-features">
                        <div class="header-nav-feature header-nav-features-search d-inline-flex">
                            <a href="#" class="header-nav-features-toggle" data-focus="headerSearch">
                                <i class="fas fa-search header-nav-top-icon text-color-secondary text-3"></i>
                            </a>
                            <div class="header-nav-features-dropdown header-nav-features-dropdown-mobile-fixed border-radius-0" id="headerTopSearchDropdown">
                                <form role="search" action="page-search-results.html" method="get">			
                                    <div class="simple-search input-group">
                                        <input class="form-control text-1" id="headerSearch" name="q" type="search" value="" placeholder="Search...">
                                        <button class="btn" type="submit">
                                            <i class="fa fa-search header-nav-top-icon text-color-secondary"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</header>