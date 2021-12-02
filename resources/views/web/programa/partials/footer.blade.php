<footer id="footer" class="m-0 border-0 bg-color-secondary overflow-hidden">
    <div class="container">
        <div class="row py-5 custom-row-footer">
            <div class="col-12 col-sm-12 col-lg-3 d-flex align-items-center flex-column footer-column custom-footer-column-logo">
                <img height="50" src="{{ asset('/img/unasam.png') }}" alt="Logo UNASAM">
                <p class="d-block m-0 text-color-light">Programa Profesional: {{$escuela->nombre}}</p>
            </div>
            <div class="col-12 col-sm-12 col-lg-9 footer-column">
                <div class="d-flex align-items-start align-sm-items-end justify-content-between flex-column h-100 mt-4 mt-sm-0">
                    <div class="d-flex flex-nowrap flex-lg-wrap justify-content-start justify-content-lg-end align-items-start align-items-lg-center w-100 flex-column flex-lg-row mt-4 mt-lg-0 custom-container-info-socials">
                        <ul class="nav nav-pills justify-content-between h-100 mb-4 mb-lg-0">
                            <li class="nav-item d-inline-flex flex-column flex-lg-row">
                                <span class="footer-nav-phone py-2 d-flex align-items-center text-color-light font-weight-semibold text-uppercase justify-content-start mb-2 mb-lg-0">
                                    <span>
                                        <img width="15" height="18" src="{{ asset('/webvendor/img/demos/business-consulting-2/icons/phone.svg') }}" alt="Phone">
                                    </span>
                                    @if($escuela != null && $escuela->telefono != null)
                                        <a class="font-weight-bold text-color-light text-color-hover-primary text-decoration-none" href="tel:{{$escuela->telefono}}">{{$escuela->telefono}}</a>
                                    @endif
                                </span>
                                <span class="footer-nav-email px-0 font-weight-normal d-flex align-items-center justify-content-start mb-2 mb-lg-0">
                                    <span>
                                        <img width="25" height="18" src="{{ asset('/webvendor/img/demos/business-consulting-2/icons/mail.svg') }}" alt="Mail">
                                    </span>
                                    @if($escuela != null && $escuela->email != null)
                                        <a class="text-color-light text-color-hover-primary text-decoration-none" href="mailto:{{$escuela->email}}">{{$escuela->email}}</a>
                                    @endif
                                </span>
                                <span class="footer-nav-opening-hours px-0 font-weight-normal d-flex align-items-center text-color-light justify-content-start mb-2 mb-lg-0">
                                    <span>
                                        <img width="19" height="18" src="{{ asset('/webvendor/img/demos/business-consulting-2/icons/calendar.svg') }}" alt="Calendar">
                                    </span>
                                    Redes Sociales:
                                </span>
                            </li>
                        </ul>
                        <ul class="social-icons custom-social-icons">
                            {{-- <li class="social-icons-instagram">
                                <a class="custom-bg-color-light-grey" href="http://www.instagram.com/" target="_blank" title="Instagram">
                                    <i class="fab fa-instagram text-4 font-weight-semibold text-color-secondary"></i>
                                </a>
                            </li>
                            <li class="social-icons-twitter">
                                <a class="custom-bg-color-light-grey" href="http://www.twitter.com/" target="_blank" title="Twitter">
                                    <i class="fab fa-twitter text-4 font-weight-semibold text-color-secondary"></i>
                                </a>
                            </li>
                            <li class="social-icons-facebook">
                                <a class="custom-bg-color-light-grey" href="http://www.facebook.com/" target="_blank" title="Facebook">
                                    <i class="fab fa-facebook-f text-4 font-weight-semibold text-color-secondary"></i>
                                </a>
                            </li> --}}
                            @foreach($redsocials as  $key => $dato)
                                <li style="box-shadow:none!important;"><a href="{{$dato->urlredsocial}}" target="_blank" style="background:none!important;"><img  src="{{ asset('/web/redsocialprograma/'.$dato->url) }}" style="max-height: 28px; max-width:28px;"/></a></li>
                            @endforeach
                        </ul>
                    </div>
                    <nav class="nav-footer w-100 d-none d-lg-block">
                        <ul class="nav nav-pills justify-content-end" id="mainNav">
                            <li class="dropdown-secondary">
                                <a class="nav-link text-color-light font-weight-bold letter-spacing-05 text-color-hover-primary" href="/programadeestudio/resumen/{{$escuela->hash}}">
                                    Resumen del Programa
                                </a>
                            </li>
                            <li class="dropdown-secondary">
                                <a class="nav-link text-color-light font-weight-bold letter-spacing-05 text-color-hover-primary" href="/programadeestudio/misionvision/{{$escuela->hash}}">
                                    Misión y Visión
                                </a>
                            </li>
                            <li class="dropdown-secondary">
                                <a class="nav-link text-color-light font-weight-bold letter-spacing-05 text-color-hover-primary" href="/programadeestudio/campolaboral/{{$escuela->hash}}">
                                    Campo Laboral
                                </a>
                            </li>
                            <li class="dropdown-secondary">
                                <a class="nav-link text-color-light font-weight-bold letter-spacing-05 text-color-hover-primary" href="/programadeestudio/objetivos/{{$escuela->hash}}">
                                    Objetivos Educacionales
                                </a>
                            </li>
                            <li class="dropdown-secondary">
                                <a class="nav-link text-color-light font-weight-bold letter-spacing-05 text-color-hover-primary" href="/programadeestudio/documentos/{{$escuela->hash}}">
                                    Documentos Normativos
                                </a>
                            </li>
                            {{-- <li class="dropdown-secondary">
                                <a class="nav-link text-color-secondary font-weight-bold letter-spacing-05 text-color-hover-primary" href="demo-business-consulting-2-blog.html">
                                    Blog
                                </a>
                            </li>
                            <li class="dropdown-secondary">
                                <a class="nav-link text-color-secondary font-weight-bold letter-spacing-05 text-color-hover-primary" href="demo-business-consulting-2-contact-us.html">
                                    Contact Us
                                </a>
                            </li> --}}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright container bg-color-secondary">
        <div class="row">
            <div class="col-lg-12 text-center m-0">
                <p class="text-color-light">© Copyright 2021. Universidad Nacional Santiago Antúnez de Mayolo -  Todos los Derechos Reservados.</p>
            </div>
        </div>
    </div>
</footer>