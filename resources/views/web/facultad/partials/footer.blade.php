<footer id="footer" class="m-0">
    <div class="container">
        <div class="row pt-5 pb-4">
            <div class="col-md-4 col-lg-3 mb-2">
                <h4 class="mb-4">Facultad</h4>
                <p>
                    {{$facultad->nombre}}<br>
                    UNASAM
                    <br>
                    Huaraz, Perú<br>
{{-- 							@if($facultad != null && $facultad->telefono != null)
                    Teléfono : {{$facultad->telefono}}
                    @endif --}}
                </p>
            </div>
            <div class="col-md-4 col-lg-3">
                <h4 class="mb-4">Datos</h4>
                <div class="info custom-info">
                    @if($facultad != null && $facultad->direccion != null)
                        <span>Dirección</span>
                        <span>{{$facultad->direccion}}</span>
                    @endif
                </div>
                <div class="info custom-info">
                    @if($facultad != null && $facultad->telefono != null)
                        <span>Teléfono</span>
                        <span>{{$facultad->telefono}}</span>
                    @endif
                </div>
                <div class="info custom-info">
                    @if($facultad != null && $facultad->email != null)
                        <span>Correo</span>
                        <span>{{$facultad->email}}</span>
                    @endif
                </div>

            </div>
            <div class="col-md-4 col-lg-3">
                <div class="contact-details">
                    <h4 class="mb-4">Escuelas Profesionales</h4>
                    @foreach ($escuelas as  $key => $dato)
                    <a class="text-decoration-none" href="/escuela/{{$dato->hash}}">
                        <span>{{$dato->nombre}}</span>
                    </a><br>
                    @endforeach
                    
                </div>
            </div>
            <div class="col-lg-2 text-md-center text-lg-start ms-lg-auto">
                <h4 class="mb-4">Redes Sociales</h4>
                <ul class="social-icons">
                    {{-- <li class="social-icons-facebook">
                        <a href="http://www.facebook.com/" target="_blank" title="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li class="social-icons-twitter">
                        <a href="http://www.twitter.com/" target="_blank" title="Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li class="social-icons-linkedin">
                        <a href="http://www.linkedin.com/" target="_blank" title="Linkedin">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </li> --}}
                    @foreach($redsocials as  $key => $dato)
                        <li style="box-shadow:none!important;"><a href="{{$dato->urlredsocial}}" target="_blank" style="background:none!important;"><img  src="{{ asset('/web/redsocialfacultad/'.$dato->url) }}" style="max-height: 28px; max-width:28px;"/></a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright pt-3 pb-3">
        <div class="container">
            <div class="row">
                <div class="row py-4">
                    

                    <div class="col-lg-1 d-flex align-items-center justify-content-center justify-content-lg-start mb-2 mb-lg-0">
                        <a href="/" class="logo pe-0 pe-lg-3">
                            <img alt="Porto Website Template" src="{{ asset('/img/unasam.png') }}" class="opacity-9" height="40">
                        </a>
                    </div>
                    <div class="col-lg-7 d-flex align-items-center justify-content-center justify-content-lg-start mb-4 mb-lg-0">
                        <p class="text-color-light">© Copyright 2021. Universidad Nacional Santiago Antúnez de Mayolo -  Todos los Derechos Reservados.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>