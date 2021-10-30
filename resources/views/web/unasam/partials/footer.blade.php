<footer id="footer" class="bg-color-primary border-top-0" style="margin-top:0px">
    <div class="container py-4">
        <div class="row py-5" style="padding-bottom:0px!important; padding-top:20px!important;">
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                <h5 class="text-3 mb-3 opacity-7">Nosotros</h5>
                <a href="/misionvision"><p class="pe-1 text-color-light" style="margin-bottom: 0px;">Misión y Visión</p></a>
                <a href="/himno"><p class="pe-1 text-color-light" style="margin-bottom: 0px;">Himno Institucional</p></a>
                <a href="https://www.unasam.edu.pe/img/file/organigrama.pdf"><p class="pe-1 text-color-light" style="margin-bottom: 0px;">Organigrama Institucional</p></a>
                <a href="https://www.gob.pe/institucion/unasam/funcionarios"><p class="pe-1 text-color-light" style="margin-bottom: 0px;">Directorio Institucional</p></a>
                <div class="alert alert-success d-none" id="newsletterSuccess">
                    <strong>Success!</strong> You've been added to our email list.
                </div>
                <div class="alert alert-danger d-none" id="newsletterError"></div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                <h5 class="text-3 mb-3 opacity-7">Servicios</h5>
                <a href="http://campus.unasam.edu.pe/"><p class="pe-1 text-color-light" style="margin-bottom: 0px;"><i class="fa fa-paper-plane text-color-light"></i> SVA Campus Virtual</p></a>
                <a href="http://sga.unasam.edu.pe/login"><p class="pe-1 text-color-light" style="margin-bottom: 0px;"><i class="fa fa-paper-plane text-color-light"></i> SGA UNASAM</p></a>
                <a href="http://sgapg.unasam.edu.pe/login"><p class="pe-1 text-color-light" style="margin-bottom: 0px;"><i class="fa fa-paper-plane text-color-light"></i> SGA Postgrado</p></a>
                <a href="http://repositorio.unasam.edu.pe/"><p class="pe-1 text-color-light" style="margin-bottom: 0px;"><i class="fa fa-paper-plane text-color-light"></i> Repositorio Institucional</p></a>
                <a href="http://sisres.unasam.edu.pe/"><p class="pe-1 text-color-light" style="margin-bottom: 0px;"><i class="fa fa-paper-plane text-color-light"></i> Sistema de Actas y Resoluciones</p></a>	
                <a href="http://sisres.unasam.edu.pe/ResolucionFacultad"><p class="pe-1 text-color-light" style="margin-bottom: 0px;"><i class="fa fa-paper-plane text-color-light"></i> SISRES Facultades</p></a>	
                <a href="/login"><p class="pe-1 text-color-light" style="margin-bottom: 0px;"><i class="fa fa-paper-plane text-color-light"></i> Sistema Integral de Gestión ADMWEB</p></a>	
            </div>
            <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
                <h5 class="text-3 mb-3 opacity-7">CONTÁCTENOS</h5>
                <ul class="list list-icons list-icons-lg">
                    <li class="mb-1"><i class="far fa-dot-circle text-color-light"></i>
                        <p class="m-0 text-color-light">
                            @if($unasam != null && $unasam->direccion != null)
                                {{$unasam->direccion}}
                            @endif
                        </p>
                    </li>
                    <li class="mb-1"><i class="fab fa-whatsapp text-color-light"></i>
                        <p class="m-0">
                            <a class="text-color-light" href="tel:@if($unasam != null && $unasam->telefono != null)
                                {{$unasam->telefono}}
                                @endif">
                                @if($unasam != null && $unasam->telefono != null)
                                    {{$unasam->telefono}}
                                @endif
                            </a>
                        </p></li>
                    <li class="mb-1"><i class="far fa-envelope text-color-light"></i>
                        <p class="m-0">
                            <a class="text-color-light" href="mailto:@if($unasam != null && $unasam->email != null)
                                {{$unasam->email}}
                                @endif">
                                @if($unasam != null && $unasam->email != null)
                                    {{$unasam->email}}
                                @endif
                            </a>
                        </p>
                    </li>
                    <li class="mb-1"><i class="far fa-id-card text-color-light"></i>
                        <p class="m-0 text-color-light">
                            @if($unasam != null && $unasam->ruc != null)
                                RUC: {{$unasam->ruc}}
                            @endif
                        </p>
                    </li>
                    
                </ul>
            </div>
            <div class="col-md-6 col-lg-2">
                <h5 class="text-3 mb-3 opacity-7">SÍGANOS</h5>
                <ul class="header-social-icons social-icons">
                    {{-- <li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f text-2"></i></a></li>
                    <li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter text-2"></i></a></li>
                    <li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in text-2"></i></a></li> --}}
                    @foreach($redsocials as  $key => $dato)
                    <li style="box-shadow:none!important;"><a href="{{$dato->urlredsocial}}" target="_blank" style="background:none!important;"><img  src="{{ asset('/web/redsocialunasam/'.$dato->url) }}" style="max-height: 28px; max-width:28px;"/></a></li>
                @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright bg-color-primary bg-color-scale-overlay bg-color-scale-overlay-1">
        <div class="bg-color-scale-overlay-wrapper">
            <div class="container py-2">
                <div class="row py-4">
                    <div class="col-lg-1 d-flex align-items-center justify-content-center justify-content-lg-start mb-2 mb-lg-0">
                        <a href="/" class="logo pe-0 pe-lg-3">
                            <img alt="Porto Website Template" src="{{ asset('/img/unasam.png') }}" class="opacity-9" height="40">
                        </a>
                    </div>
                    <div class="col-lg-7 d-flex align-items-center justify-content-center justify-content-lg-start mb-4 mb-lg-0">
                        <p class="text-color-light">© Copyright 2021. Universidad Nacional Santiago Antúnez de Mayolo -  Todos los Derechos Reservados.</p>
                    </div>
                  {{--   <div class="col-lg-4 d-flex align-items-center justify-content-center justify-content-lg-end">
                        <nav id="sub-menu">
                            <ul>
                                <li class="border-0"><i class="fas fa-angle-right text-color-light"></i><a href="/" class="ms-1 text-decoration-none text-color-light"> Preguntas</a></li>
                                <li class="border-0"><i class="fas fa-angle-right text-color-light"></i><a href="/" class="ms-1 text-decoration-none text-color-light"> Mapa del Sitio</a></li>
                                <li class="border-0"><i class="fas fa-angle-right text-color-light"></i><a href="/" class="ms-1 text-decoration-none text-color-light"> Contáctenos</a></li>
                            </ul>
                        </nav>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</footer>