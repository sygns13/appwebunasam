<header id="header" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyStartAt': 145, 'stickySetTop': '-145px', 'stickyChangeLogo': false}">
    <div class="header-body border-0 box-shadow-none">
        <div class="header-top header-top-borders">
            <div class="container h-100">
                <div class="header-row h-100">
                    <div class="header-column justify-content-start">
                        <div class="header-row">
                            <nav class="header-nav-top">
                                <ul class="nav nav-pills">
                                    <li class="nav-item nav-item-anim-icon d-none d-md-block">
                                        <a class="nav-link ps-0" href="http://campus.unasam.edu.pe/"><i class="fas fa-angle-right"></i> Campus Virtual</a>
                                    </li>
                                    <li class="nav-item nav-item-anim-icon d-none d-md-block">
                                        <a class="nav-link" href="http://guias.unasam.edu.pe/"><i class="fas fa-angle-right"></i> Guías Home Office</a>
                                    </li>
                                    {{-- <li class="nav-item dropdown nav-item-left-border d-none d-sm-block nav-item-left-border-remove nav-item-left-border-md-show">
                                        <a class="nav-link" href="#" role="button" id="dropdownLanguage" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <img src="/webvendor/img/blank.gif" class="flag flag-es" alt="Espaniol" /> Español
                                            <i class="fas fa-angle-down"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownLanguage">
                                            <a class="dropdown-item" href="#"><img src="{{ asset('/webvendor/img/blank.gif') }}" class="flag flag-es" alt="Espaniol" /> Español</a>
                                            <a class="dropdown-item" href="#"><img src="{{ asset('/webvendor/img/blank.gif') }}" class="flag flag-us" alt="Ingles" /> English</a>
                                            <a class="dropdown-item" href="#"><img src="{{ asset('/webvendor/img/blank.gif') }}" class="flag flag-fr" alt="Frances" /> Française</a>
                                        </div>
                                    </li> --}}
                                    <li class="nav-item nav-item-left-border nav-item-left-border-remove nav-item-left-border-sm-show">
                                        <a class="nav-link" href="https://www.office.com/"><span class="ws-nowrap"><i class="fas fa-desktop"></i> Office 365</span></a>
                                    </li>
                                    <li class="nav-item nav-item-left-border nav-item-left-border-remove nav-item-left-border-sm-show">
                                        <span class="ws-nowrap"><i class="fas fa-phone"></i>
                                            @if($unasam != null && $unasam->telefono != null)
                                            {{$unasam->telefono}}
                                            @endif
                                        </span>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="header-column justify-content-end">
                        <div class="header-row">
                            <ul class="header-social-icons social-icons">
                            
                                @foreach($redsocials as  $key => $dato)
                                    <li style="box-shadow:none!important;"><a href="{{$dato->urlredsocial}}" target="_blank"><img  src="{{ asset('/web/redsocialunasam/'.$dato->url) }}" style="max-height: 28px; max-width:28px;"/></a></li>
                                @endforeach
                                {{-- <li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook" ><i class="fab fa-facebook-f"></i></a></li>
                                <li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                <li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-container container">
            <div class="header-row py-2">
                <div class="header-column">
                    <div class="header-row">
                        <div class="header-logo">
                            <a href="/">
                                <img alt="UNASAM" height="60"   data-sticky-height="50" data-sticky-top="110"    src="{{ asset('/webvendor/img/logo_unasam_2.png') }}">
                        {{-- 		<img alt="Porto" width="100" height="48" data-sticky-width="69" data-sticky-height="34" data-sticky-top="86" src="{{ asset('/webvendor/img/logo-default-slim.png') }}"> --}}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="header-column justify-content-end">
                    <div class="header-row">
                        <ul class="header-extra-info d-flex align-items-center">
                            <li class="d-none d-sm-inline-flex">
                                <div class="header-extra-info-text">
                                    <label>Acceder</label>
                                    <strong><a href="mailto:mesadepartesdigital@unasam.edu.pe">Mesa de Partes</a></strong>
                                </div>
                            </li>
                            <li>
                                <div class="header-extra-info-text">
                                    <label>Comuníquese</label>
                                    <strong><a href="https://www.gob.pe/institucion/unasam/funcionarios">Directorio Institucional</a></strong>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>					
        <div class="header-nav-bar bg-color-light-scale-1 z-index-0" data-sticky-header-style="{'minResolution': 991}" data-sticky-header-style-active="{'background-color': 'transparent'}" data-sticky-header-style-deactive="{'background-color': '#f7f7f7'}">
            <div class="container">
                <div class="header-row">
                    <div class="header-column">
                        <div class="header-row justify-content-end">
                            <div class="header-nav header-nav-stripe justify-content-start">
                                <div class="header-nav-main header-nav-main-square header-nav-main-effect-1 header-nav-main-sub-effect-1">
                                    <nav class="collapse">
                                        <ul class="nav nav-pills" id="mainNav" data-sticky-header-style="{'minResolution': 991}" data-sticky-header-style-active="{'margin-left': '50px'}" data-sticky-header-style-deactive="{'margin-left': '0'}">
                                            <li class="dropdown" style="margin-left:0px;">
                                                <a class="dropdown-item dropdown-toggle {{$menusActivos->menu1}}" href="#">
                                                    LA UNASAM
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item" href="/">
                                                            Inicio <i class="fas fa-home"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="/historia">
                                                            Reseña Histórica
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="/misionvision">
                                                            Misión y Visión {{-- <span class="tip tip-dark">hot</span> --}}
                                                        </a>
                                                    </li>
                                                    <li class="dropdown-submenu">
                                                        <a class="dropdown-item" href="#">Órganos de Gobierno</a>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="/rector">Rectorado</a></li>
                                                            <li><a class="dropdown-item" href="/vicerrectoracademico">Vicerrector Académico</a></li>
                                                            <li><a class="dropdown-item" href="/vicerrectorinvestigacion">Vicerrector Administrativo</a></li>
                                                            <li><a class="dropdown-item" href="/asambleauniversitaria">Asamblea Universitaria</a></li>
                                                            <li><a class="dropdown-item" href="/concejouniversitario">Consejo Universitario</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="/objetivos">
                                                            Objetivos Estratégicos
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="/estatuto">
                                                            Estatuto
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="/acreditacion">
                                                            Acreditación Institucional
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="/licenciamiento">
                                                            Licenciamiento Institucional
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="/himno">
                                                            Himno Institucional
                                                        </a>
                                                    </li>
                                                    
                                                </ul>
                                            </li>
                                            <li class="dropdown">
                                                <a class="dropdown-item dropdown-toggle {{$menusActivos->menu2}}" href="javascript:void(0);">
                                                    Admisión
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li class="dropdown-submenu">
                                                        <a class="dropdown-item" href="#">Pregrado</a>
                                                        <ul class="dropdown-menu">
                                                            <li><a target="_blank" class="dropdown-item" href="https://www.admisionunasam.com/">Portal Admisión Pregrado</a></li>
                                                            <li><a target="_blank" class="dropdown-item" href="https://www.admisionunasam.com/carreras">Programas Profesionales</a></li>
                                                            <li><a target="_blank" class="dropdown-item" href="https://www.admisionunasam.com/requisitos/pagos">Costos de Admisión</a></li>
                                                            <li><a target="_blank" class="dropdown-item" href="https://www.admisionunasam.com/requisitos/cronograma">Cronograma de Admisión</a></li>
                                                            <li><a target="_blank" class="dropdown-item" href="https://www.admisionunasam.com/requisitos/vacante">Vacantes y Plazas</a></li>
                                                            <li><a target="_blank" class="dropdown-item" href="https://www.admisionunasam.com/resultados">Resultados de Admisión</a></li>
                                                            <li><a target="_blank" class="dropdown-item" href="https://www.admisionunasam.com/reglamento-pregrado">Reglamento de Admisión</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="dropdown-submenu">
                                                        <a class="dropdown-item" href="#">Postgrado</a>
                                                        <ul class="dropdown-menu">
                                                            <li><a target="_blank" class="dropdown-item" href="http://postgrado.unasam.edu.pe/admision">Portal Admisión Postgrado</a></li>
                                                            <li><a target="_blank" class="dropdown-item" href="https://www.admisionunasam.com/reglamento-postgrado">Reglamento de Admisión</a></li>
                                                          {{--   <li><a class="dropdown-item" href="about-us.html">Costos de Admisión</a></li>
                                                            <li><a class="dropdown-item" href="contact-us-recaptcha.html">Cronograma de Admisión</a></li>
                                                            <li><a class="dropdown-item" href="contact-us-recaptcha.html">Vacantes y Plazas</a></li> --}}
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>

                                            <li class="dropdown dropdown-mega">
                                                <a class="dropdown-item dropdown-toggle {{$menusActivos->menu3}}" href="#">
                                                    Pregrado
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <div class="dropdown-mega-content">
                                                            <div class="row">

                                                                @php
                                                                    /* $val1 = intval($totalRegistros/4);
                                                                    $val2 = $val1 * 2;
                                                                    $val3 = $val1 * 3;
                                                                    $val4 = $totalRegistros - $val3; */

                                                                    $val1 = 0;
                                                                    $val2 = 0;
                                                                    $val3 = 0;
                                                                    $val4 = 0;

                                                                    $pivot = 0;
                                                                    for ($i=0; $i < $totalRegistros ; $i++) { 
                                                                        switch ($pivot) {
                                                                            case 0:
                                                                                $val1++;
                                                                                $pivot++;
                                                                            break;
                                                                            case 1:
                                                                                $val2++;
                                                                                $pivot++;
                                                                            break;
                                                                            case 2:
                                                                                $val3++;
                                                                                $pivot++;
                                                                            break;
                                                                            case 3:
                                                                                $val4++;
                                                                                $pivot = 0;
                                                                            break;
                                                                            
                                                                            default:
                                                                                $pivot = 0;
                                                                            break;
                                                                        }
                                                                    }

                                                                    $limit1 = $val1;
                                                                    $limit2 = $limit1 + $val2;
                                                                    $limit3 = $limit2 + $val3;
                                                                    $limit4 = $limit3 + $val4;
                                                                @endphp

                                                                <div class="col-md-3">
                                                                    <ul class="dropdown-mega-sub-nav">
                                                                        @foreach($FacultadesEscuelas as  $key => $dato)
                                                                            @if($key <$limit1)
                                                                                <li>
                                                                                    @if($dato->nivel == 1)
                                                                                        <a class="dropdown-item" href="/facultad/{{$dato->hash}}">
                                                                                        <div style="white-space: break-spaces;"><b>{{$dato->nombre}}</b></div>
                                                                                        </a>
                                                                                    @elseif($dato->nivel == 2)
                                                                                        <a class="dropdown-item" href="/escuela/{{$dato->hash}}">
                                                                                        <div style="white-space: break-spaces;">{{$dato->nombre}}</div>
                                                                                        </a>
                                                                                    @endif
                                                                                </li>
                                                                            @endif
                                                                        @endforeach
                                                                    </ul>
                                                                </div>

                                                                <div class="col-md-3">
                                                                    <ul class="dropdown-mega-sub-nav">
                                                                        @foreach($FacultadesEscuelas as  $key => $dato)
                                                                            @if($key >= $limit1 && $key < $limit2)
                                                                                <li>
                                                                                    @if($dato->nivel == 1)
                                                                                        <a class="dropdown-item" href="/facultad/{{$dato->hash}}">
                                                                                        <div style="white-space: break-spaces;"><b>{{$dato->nombre}}</b></div>
                                                                                        </a>
                                                                                    @elseif($dato->nivel == 2)
                                                                                        <a class="dropdown-item" href="/escuela/{{$dato->hash}}">
                                                                                        <div style="white-space: break-spaces;">{{$dato->nombre}}</div>
                                                                                        </a>
                                                                                    @endif
                                                                                </li>
                                                                            @endif
                                                                        @endforeach
                                                                    </ul>
                                                                </div>

                                                                <div class="col-md-3">
                                                                    <ul class="dropdown-mega-sub-nav">
                                                                        @foreach($FacultadesEscuelas as  $key => $dato)
                                                                            @if($key >= $limit2 && $key < $limit3)
                                                                                <li>
                                                                                    @if($dato->nivel == 1)
                                                                                        <a class="dropdown-item" href="/facultad/{{$dato->hash}}">
                                                                                        <div style="white-space: break-spaces;"><b>{{$dato->nombre}}</b></div>
                                                                                        </a>
                                                                                    @elseif($dato->nivel == 2)
                                                                                        <a class="dropdown-item" href="/escuela/{{$dato->hash}}">
                                                                                        <div style="white-space: break-spaces;">{{$dato->nombre}}</div>
                                                                                        </a>
                                                                                    @endif
                                                                                </li>
                                                                            @endif
                                                                        @endforeach
                                                                    </ul>
                                                                </div>

                                                                <div class="col-md-3">
                                                                    <ul class="dropdown-mega-sub-nav">
                                                                        @foreach($FacultadesEscuelas as  $key => $dato)
                                                                            @if($key >= $limit3 && $key < $limit4)
                                                                                <li >
                                                                                    @if($dato->nivel == 1)
                                                                                        <a class="dropdown-item" href="/facultad/{{$dato->hash}}">
                                                                                        <div style="white-space: break-spaces;"><b>{{$dato->nombre}}</b></div>
                                                                                        </a>
                                                                                    @elseif($dato->nivel == 2)
                                                                                        <a class="dropdown-item" href="/escuela/{{$dato->hash}}">
                                                                                        <div style="white-space: break-spaces;">{{$dato->nombre}}</div>
                                                                                        </a>
                                                                                    @endif
                                                                                </li>
                                                                            @endif
                                                                        @endforeach
                                                                    </ul>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>

                                            <li class="dropdown">
                                                <a class="dropdown-item dropdown-toggle {{$menusActivos->menu4}}" href="#">
                                                    Postgrado
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item" target="_blank" href="http://postgrado.unasam.edu.pe/">
                                                            Escuela de Postgrado
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" target="_blank" href="http://sgapg.unasam.edu.pe/login">
                                                            Sistema de Gestión Académica
                                                        </a>
                                                    </li>
                                                   {{--  <li>
                                                        <a class="dropdown-item" href="index.html#demos">
                                                            Doctorados
                                                        </a>
                                                    </li> --}}
                                                </ul>
                                            </li>

                                            <li class="dropdown">
                                                <a class="dropdown-item {{$menusActivos->menu5}}" target="_blank" href="http://investigacion.unasam.edu.pe/">
                                                    Investigación
                                                </a>
                                            </li>

                                           {{--  <li class="dropdown" >
                                                <a class="dropdown-item dropdown-toggle {{$menusActivos->menu6}}" href="#">
                                                    Responsabilidad Social
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item" href="index.html#demos">
                                                            Portal de Responsabilidad Social
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="index.html#demos">
                                                            Bolsa de Trabajo
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
 --}}
                                            <li class="dropdown">
                                                <a class="dropdown-item dropdown-toggle {{$menusActivos->menu7}}" href="#">
                                                    Publicaciones
                                                </a>
                                                <ul class="dropdown-menu">
   {{--                                                  <li>
                                                        <a class="dropdown-item" href="index.html#demos">
                                                            Fondo Editorial
                                                        </a>
                                                    </li> --}}
                                                    <li>
                                                        <a class="dropdown-item" target="_blank" href="http://repositorio.unasam.edu.pe/">
                                                            Repositorio Institucional
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" target="_blank" href="http://revistas.unasam.edu.pe/">
                                                            Revistas UNASAM
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>

                                            <li class="dropdown">
                                                <a class="dropdown-item dropdown-toggle {{$menusActivos->menu8}}" href="#">
                                                    Transparencia
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item" target="_blank" href="https://www.transparencia.gob.pe/enlaces/pte_transparencia_enlaces.aspx?id_entidad=10403#.YXyaXJ7MJPY">
                                                            Portal de Transparencia
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" target="_blank" href="http://licenciamiento.unasam.edu.pe/">
                                                            Transparencia Institucional
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="documentos">
                                                            Documentos Normativos
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="informes">
                                                            Informes y Publicaciones
                                                        </a>
                                                    </li>
                                                    
                                                    <li>
                                                        <a class="dropdown-item" target="_blank" href="http://sga.unasam.edu.pe/reportes">
                                                            Reportes Académicos
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>

                                            <li class="dropdown">
                                                <a class="dropdown-item dropdown-toggle {{$menusActivos->menu9}}" href="#">
                                                    Noticias y Eventos
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item" href="/noticias">
                                                            Noticias
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="/eventos">
                                                            Eventos
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="/actividades">
                                                            Actividades Programadas
                                                        </a>
                                                    </li>
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
                </div>
            </div>
        </div>
    </div>
</header>