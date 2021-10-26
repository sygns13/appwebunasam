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
                                    <strong><a href="tel:8001234567">Directorio Institucional</a></strong>
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
                                                <a class="dropdown-item dropdown-toggle {{$menusActivos->menu1}}" href="/">
                                                    LA UNASAM
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item" href="historia">
                                                            Reseña Histórica
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="misionvision">
                                                            Misión y Visión {{-- <span class="tip tip-dark">hot</span> --}}
                                                        </a>
                                                    </li>
                                                    <li class="dropdown-submenu">
                                                        <a class="dropdown-item" href="#">Órganos de Gobierno</a>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="rector">Rectorado</a></li>
                                                            <li><a class="dropdown-item" href="vicerrectoracademico">Vicerrector Académico</a></li>
                                                            <li><a class="dropdown-item" href="vicerrectorinvestigacion">Vicerrector Administrativo</a></li>
                                                            <li><a class="dropdown-item" href="asambleauniversitaria">Asamblea Universitaria</a></li>
                                                            <li><a class="dropdown-item" href="concejouniversitario">Consejo Universitario</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="index.html">
                                                            Objetivos Estratégicos
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="index.html#demos">
                                                            Estatuto
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="index.html#demos">
                                                            Acreditación Institucional
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="index.html#demos">
                                                            Licnciamiento Institucional
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="index.html#demos">
                                                            Himno Institucional
                                                        </a>
                                                    </li>
                                                    
                                                </ul>
                                            </li>
                                            <li class="dropdown">
                                                <a class="dropdown-item dropdown-toggle {{$menusActivos->menu2}}" href="#">
                                                    Admisión
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li class="dropdown-submenu">
                                                        <a class="dropdown-item" href="#">Pregrado</a>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="contact-us-advanced.php">Portal Admisión Pregrado</a></li>
                                                            <li><a class="dropdown-item" href="contact-us.html">Modalidades de Admisión</a></li>
                                                            <li><a class="dropdown-item" href="contact-us-recaptcha.html">Costos de Admisión</a></li>
                                                            <li><a class="dropdown-item" href="contact-us-recaptcha.html">Cronograma de Admisión</a></li>
                                                            <li><a class="dropdown-item" href="contact-us-recaptcha.html">Vacantes y Plazas</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="dropdown-submenu">
                                                        <a class="dropdown-item" href="#">Postgrado</a>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="about-us-advanced.html">Datos de Admisión</a></li>
                                                            <li><a class="dropdown-item" href="about-us.html">Costos de Admisión</a></li>
                                                            <li><a class="dropdown-item" href="contact-us-recaptcha.html">Cronograma de Admisión</a></li>
                                                            <li><a class="dropdown-item" href="contact-us-recaptcha.html">Vacantes y Plazas</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>

                                            <li class="dropdown dropdown-mega">
                                                <a class="dropdown-item dropdown-toggle {{$menusActivos->menu3}}" href="elements.html">
                                                    Pregrado
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <div class="dropdown-mega-content">
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    {{-- <span class="dropdown-mega-sub-title">Elements 1</span> --}}
                                                                    <ul class="dropdown-mega-sub-nav">
                                                                        <li><a class="dropdown-item" href="elements-accordions.html">Facultad de Ciencias del Ambiente</a></li>
                                                                        <li><a class="dropdown-item" href="elements-toggles.html">Ingeniería Ambiental</a></li>
                                                                        <li><a class="dropdown-item" href="elements-tabs.html">Ingeniería Sanitaria</a></li>
                                                                        <li><a class="dropdown-item" href="elements-icons.html">Icons</a></li>
                                                                        <li><a class="dropdown-item" href="elements-icon-boxes.html">Icon Boxes</a></li>
                                                                        <li><a class="dropdown-item" href="elements-carousels.html">Carousels</a></li>
                                                                        <li><a class="dropdown-item" href="elements-modals.html">Modals</a></li>
                                                                        <li><a class="dropdown-item" href="elements-lightboxes.html">Lightboxes</a></li>
                                                                        <li><a class="dropdown-item" href="elements-word-rotator.html">Word Rotator</a></li>
                                                                        <li><a class="dropdown-item" href="elements-tooltips-popovers.html">Tooltips &amp; Popovers</a></li>
                                                                        <li><a class="dropdown-item" href="elements-buttons.html">Buttons</a></li>
                                                                        <li><a class="dropdown-item" href="elements-badges.html">Badges</a></li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    <span class="dropdown-mega-sub-title">Elements 2</span>
                                                                    <ul class="dropdown-mega-sub-nav">
                                                                        <li><a class="dropdown-item" href="elements-lists.html">Lists</a></li>
                                                                        <li><a class="dropdown-item" href="elements-cards.html">Cards</a></li>
                                                                        <li><a class="dropdown-item" href="elements-image-gallery.html">Image Gallery</a></li>
                                                                        <li><a class="dropdown-item" href="elements-image-frames.html">Image Frames</a></li>
                                                                        <li><a class="dropdown-item" href="elements-image-hotspots.html">Image Hotspots</a></li>
                                                                        <li><a class="dropdown-item" href="elements-before-after.html">Before / After</a></li>
                                                                        <li><a class="dropdown-item" href="elements-360-image-viewer.html">360º Image Viewer</a></li>
                                                                        <li><a class="dropdown-item" href="elements-cascading-images.html">Cascading Images</a></li>
                                                                        <li><a class="dropdown-item" href="elements-random-images.html">Random Images</a></li>
                                                                        <li><a class="dropdown-item" href="elements-testimonials.html">Testimonials</a></li>
                                                                        <li><a class="dropdown-item" href="elements-blockquotes.html">Blockquotes</a></li>							
                                                                        <li><a class="dropdown-item" href="elements-sticky-elements.html">Sticky Elements</a></li>							
                                                                    </ul>
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    <span class="dropdown-mega-sub-title">Elements 3</span>
                                                                    <ul class="dropdown-mega-sub-nav">
                                                                        <li><a class="dropdown-item" href="elements-typography.html">Typography</a></li>
                                                                        <li><a class="dropdown-item" href="elements-read-more.html">Read More</a></li>
                                                                        <li><a class="dropdown-item" href="elements-call-to-action.html">Call to Action</a></li>
                                                                        <li><a class="dropdown-item" href="elements-pricing-tables.html">Pricing Tables</a></li>
                                                                        <li><a class="dropdown-item" href="elements-tables.html">Tables</a></li>
                                                                        <li><a class="dropdown-item" href="elements-progressbars.html">Progress Bars</a></li>
                                                                        <li><a class="dropdown-item" href="elements-process.html">Process</a></li>
                                                                        <li><a class="dropdown-item" href="elements-counters.html">Counters</a></li>
                                                                        <li><a class="dropdown-item" href="elements-countdowns.html">Countdowns</a></li>
                                                                        <li><a class="dropdown-item" href="elements-sections.html">Sections</a></li>
                                                                        <li><a class="dropdown-item" href="elements-parallax.html">Parallax</a></li>
                                                                        <li><a class="dropdown-item" href="elements-shape-dividers.html">Shape Dividers</a></li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    <span class="dropdown-mega-sub-title">Elements 4</span>
                                                                    <ul class="dropdown-mega-sub-nav">
                                                                        <li><a class="dropdown-item" href="elements-headings.html">Headings</a></li>
                                                                        <li><a class="dropdown-item" href="elements-dividers.html">Dividers</a></li>
                                                                        <li><a class="dropdown-item" href="elements-animations.html">Animations</a></li>
                                                                        <li><a class="dropdown-item" href="elements-particles.html">Particles</a></li>
                                                                        <li><a class="dropdown-item" href="elements-medias.html">Medias</a></li>
                                                                        <li><a class="dropdown-item" href="elements-maps.html">Maps</a></li>
                                                                        <li><a class="dropdown-item" href="elements-arrows.html">Arrows</a></li>
                                                                        <li><a class="dropdown-item" href="elements-star-ratings.html">Star Ratings</a></li>
                                                                        <li><a class="dropdown-item" href="elements-alerts.html">Alerts</a></li>
                                                                        <li><a class="dropdown-item" href="elements-posts.html">Posts</a></li>
                                                                        <li><a class="dropdown-item" href="elements-forms.html">Forms</a></li>
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
                                                        <a class="dropdown-item" href="index.html#demos">
                                                            Escuela de Postgrado
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="index.html#demos">
                                                            Maestrías
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="index.html#demos">
                                                            Doctorados
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>

                                            <li class="dropdown">
                                                <a class="dropdown-item {{$menusActivos->menu5}}" href="#">
                                                    Investigación
                                                </a>
                                            </li>

                                            <li class="dropdown" >
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

                                            <li class="dropdown">
                                                <a class="dropdown-item dropdown-toggle {{$menusActivos->menu7}}" href="#">
                                                    Publicaciones
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item" href="index.html#demos">
                                                            Fondo Editorial
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="index.html#demos">
                                                            Repositorio Institucional
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="index.html#demos">
                                                            Revista UNASAM
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
                                                        <a class="dropdown-item" href="index.html#demos">
                                                            Portal de Transparencia
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="index.html#demos">
                                                            Documentos Normativos
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="index.html#demos">
                                                            Transparencia Institucional
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>

                                            <li class="dropdown">
                                                <a class="dropdown-item dropdown-toggle {{$menusActivos->menu9}}" href="#">
                                                    Noticias
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item" href="index.html#demos">
                                                            Noticias
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="index.html#demos">
                                                            Eventos
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="index.html#demos">
                                                            Comunicados
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