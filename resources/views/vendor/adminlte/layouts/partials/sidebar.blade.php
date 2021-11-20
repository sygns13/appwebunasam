<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        

                

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p style="overflow: hidden;text-overflow: ellipsis;max-width: 160px;" data-toggle="tooltip" title="{{ Auth::user()->name }}">{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        {{-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form> --}}
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">

            <li v-bind:class="classMenu0"><a href="{{ URL::to('home') }}"><i class='fa fa-home'></i> <span>Inicio</span></a></li>



            @if(accesoUser([1,2,3]))
            <li class="header">Gestión del Portal UNASAM</li>
            @endif
          
            {{-- Módulo I Portal UNASAM --}}


            @if(accesoUser([1,2]))
            <li class="treeview" v-bind:class="classMenu10">
                <a href="#"><i class='fa fa-list-alt'></i> <span>Página de Inicio UNASAM</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{URL::to('intranet/configportal')}}"><i class='fa fa-paper-plane'></i> Configuraciones Principales</a></li>
                    <li><a href="{{URL::to('intranet/bannerportal')}}"><i class='fa fa-paper-plane'></i> Gestión de Banners</a></li>
                    <li><a href="{{URL::to('intranet/presentacionportal')}}"><i class='fa fa-paper-plane'></i> Gestión de Presentación</a></li>
                    <li><a href="{{URL::to('intranet/datosportal')}}"><i class='fa fa-paper-plane'></i> Gestión de Datos Generales</a></li>
                    <li><a href="{{URL::to('intranet/noticiasportal')}}"><i class='fa fa-paper-plane'></i> Gestión de Noticias</a></li>
                    <li><a href="{{URL::to('intranet/eventosportal')}}"><i class='fa fa-paper-plane'></i> Gestión de Eventos</a></li> 
                    <li><a href="{{URL::to('intranet/calendarioportal')}}"><i class='fa fa-paper-plane'></i> Gestión de Actividades</a></li> 
                    <li><a href="{{URL::to('intranet/plataformaportal')}}"><i class='fa fa-paper-plane'></i> Gestión de Plataformas</a></li> 
                    <li><a href="{{URL::to('intranet/redessolicalesportal')}}"><i class='fa fa-paper-plane'></i> Gestión de Redes Sociales</a></li> 
                    <li><a href="{{URL::to('intranet/linkinteresportal')}}"><i class='fa fa-paper-plane'></i> Gestión de Links de Interés</a></li>
                </ul>
            </li>
            @endif

            @if(accesoUser([3]))

            <li class="treeview" v-bind:class="classMenu10">
                <a href="#"><i class='fa fa-list-alt'></i> <span>Página de Inicio UNASAM</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    
                    @foreach ($permisos as $permiso)
                        @if($permiso->nivel == 0 && $permiso->roles == 1)
                            <li><a href="{{URL::to('intranet/configportal')}}"><i class='fa fa-paper-plane'></i> Configuraciones Principales</a></li>
                            <li><a href="{{URL::to('intranet/bannerportal')}}"><i class='fa fa-paper-plane'></i> Gestión de Banners</a></li>
                            <li><a href="{{URL::to('intranet/presentacionportal')}}"><i class='fa fa-paper-plane'></i> Gestión de Presentación</a></li>
                            <li><a href="{{URL::to('intranet/datosportal')}}"><i class='fa fa-paper-plane'></i> Gestión de Datos Generales</a></li>
                            <li><a href="{{URL::to('intranet/noticiasportal')}}"><i class='fa fa-paper-plane'></i> Gestión de Noticias</a></li>
                            <li><a href="{{URL::to('intranet/eventosportal')}}"><i class='fa fa-paper-plane'></i> Gestión de Eventos</a></li> 
                            <li><a href="{{URL::to('intranet/calendarioportal')}}"><i class='fa fa-paper-plane'></i> Gestión de Actividades</a></li> 
                            <li><a href="{{URL::to('intranet/plataformaportal')}}"><i class='fa fa-paper-plane'></i> Gestión de Plataformas</a></li> 
                            <li><a href="{{URL::to('intranet/redessolicalesportal')}}"><i class='fa fa-paper-plane'></i> Gestión de Redes Sociales</a></li> 
                            <li><a href="{{URL::to('intranet/linkinteresportal')}}"><i class='fa fa-paper-plane'></i> Gestión de Links de Interés</a></li>

                        @elseif($permiso->nivel == 0 && $permiso->roles == 0)
                            @foreach ($rolModulos as $rolModulo)
                                @if($rolModulo->modulo_id == 1 && $rolModulo->nivel == 0 && $rolModulo->rolessub == 1)
                                    <li><a href="{{URL::to('intranet/configportal')}}"><i class='fa fa-paper-plane'></i> Configuraciones Principales</a></li>
                                    <li><a href="{{URL::to('intranet/bannerportal')}}"><i class='fa fa-paper-plane'></i> Gestión de Banners</a></li>
                                    <li><a href="{{URL::to('intranet/presentacionportal')}}"><i class='fa fa-paper-plane'></i> Gestión de Presentación</a></li>
                                    <li><a href="{{URL::to('intranet/datosportal')}}"><i class='fa fa-paper-plane'></i> Gestión de Datos Generales</a></li>
                                    <li><a href="{{URL::to('intranet/noticiasportal')}}"><i class='fa fa-paper-plane'></i> Gestión de Noticias</a></li>
                                    <li><a href="{{URL::to('intranet/eventosportal')}}"><i class='fa fa-paper-plane'></i> Gestión de Eventos</a></li> 
                                    <li><a href="{{URL::to('intranet/calendarioportal')}}"><i class='fa fa-paper-plane'></i> Gestión de Actividades</a></li> 
                                    <li><a href="{{URL::to('intranet/plataformaportal')}}"><i class='fa fa-paper-plane'></i> Gestión de Plataformas</a></li> 
                                    <li><a href="{{URL::to('intranet/redessolicalesportal')}}"><i class='fa fa-paper-plane'></i> Gestión de Redes Sociales</a></li> 
                                    <li><a href="{{URL::to('intranet/linkinteresportal')}}"><i class='fa fa-paper-plane'></i> Gestión de Links de Interés</a></li>
                                
                                @elseif($rolModulo->modulo_id == 1 && $rolModulo->nivel == 0 && $rolModulo->rolessub == 0)
                                    @foreach ($rolSubModulos as $rolSubModulo)
                                        @if($rolSubModulo->modulo_id == 1 && $rolSubModulo->nivel == 0 && $rolSubModulo->submodulo_id == 1)
                                            <li><a href="{{URL::to('intranet/configportal')}}"><i class='fa fa-paper-plane'></i> Configuraciones Principales</a></li>
                                        @elseif($rolSubModulo->modulo_id == 1 && $rolSubModulo->nivel == 0 && $rolSubModulo->submodulo_id == 2)
                                            <li><a href="{{URL::to('intranet/bannerportal')}}"><i class='fa fa-paper-plane'></i> Gestión de Banners</a></li>
                                        @elseif($rolSubModulo->modulo_id == 1 && $rolSubModulo->nivel == 0 && $rolSubModulo->submodulo_id == 3)
                                            <li><a href="{{URL::to('intranet/presentacionportal')}}"><i class='fa fa-paper-plane'></i> Gestión de Presentación</a></li>
                                        @elseif($rolSubModulo->modulo_id == 1 && $rolSubModulo->nivel == 0 && $rolSubModulo->submodulo_id == 4)
                                            <li><a href="{{URL::to('intranet/datosportal')}}"><i class='fa fa-paper-plane'></i> Gestión de Datos Generales</a></li>
                                        @elseif($rolSubModulo->modulo_id == 1 && $rolSubModulo->nivel == 0 && $rolSubModulo->submodulo_id == 5)
                                            <li><a href="{{URL::to('intranet/noticiasportal')}}"><i class='fa fa-paper-plane'></i> Gestión de Noticias</a></li>
                                        @elseif($rolSubModulo->modulo_id == 1 && $rolSubModulo->nivel == 0 && $rolSubModulo->submodulo_id == 6)
                                            <li><a href="{{URL::to('intranet/eventosportal')}}"><i class='fa fa-paper-plane'></i> Gestión de Eventos</a></li>
                                        @elseif($rolSubModulo->modulo_id == 1 && $rolSubModulo->nivel == 0 && $rolSubModulo->submodulo_id == 7) 
                                            <li><a href="{{URL::to('intranet/calendarioportal')}}"><i class='fa fa-paper-plane'></i> Gestión de Actividades</a></li>
                                        @elseif($rolSubModulo->modulo_id == 1 && $rolSubModulo->nivel == 0 && $rolSubModulo->submodulo_id == 8)
                                            <li><a href="{{URL::to('intranet/plataformaportal')}}"><i class='fa fa-paper-plane'></i> Gestión de Plataformas</a></li>
                                        @elseif($rolSubModulo->modulo_id == 1 && $rolSubModulo->nivel == 0 && $rolSubModulo->submodulo_id == 9)
                                            <li><a href="{{URL::to('intranet/redessolicalesportal')}}"><i class='fa fa-paper-plane'></i> Gestión de Redes Sociales</a></li>
                                        @elseif($rolSubModulo->modulo_id == 1 && $rolSubModulo->nivel == 0 && $rolSubModulo->submodulo_id == 10)
                                            <li><a href="{{URL::to('intranet/linkinteresportal')}}"><i class='fa fa-paper-plane'></i> Gestión de Links de Interés</a></li>
                                        @endif

                                    @endforeach
                                @endif
                            @endforeach
                        @endif
                    @endforeach
  
                </ul>
            </li>
            @endif


            {{-- Módulo II Portal UNASAM --}}


            @if(accesoUser([1,2]))
            <li class="treeview" v-bind:class="classMenu11">
                <a href="#"><i class='fa fa-list-alt'></i> <span>Páginas Portal UNASAM</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{URL::to('intranet/historiaportal')}}"><i class='fa fa-paper-plane'></i> Gestión de Historia</a></li>
                    <li><a href="{{URL::to('intranet/misionvisionportal')}}"><i class='fa fa-paper-plane'></i> Gestión de Misión / Visión</a></li>
                    <li><a href="{{URL::to('intranet/rector')}}"><i class='fa fa-paper-plane'></i> Gestión del Rector</a></li>
                    <li><a href="{{URL::to('intranet/vicerrectoracademico')}}"><i class='fa fa-paper-plane'></i> Vicerrector Académico</a></li>
                    <li><a href="{{URL::to('intranet/vicerrectorinvestigacion')}}"><i class='fa fa-paper-plane'></i> Vicerrector de Investigación</a></li>
                    <li><a href="{{URL::to('intranet/asambleauniversitaria')}}"><i class='fa fa-paper-plane'></i> Asamblea Universitaria</a></li>
                    <li><a href="{{URL::to('intranet/concejouniversitario')}}"><i class='fa fa-paper-plane'></i> Concejo Universitario</a></li>
                    <li><a href="{{URL::to('intranet/objetivosunasam')}}"><i class='fa fa-paper-plane'></i> Objetivos Estratégicos</a></li>
                    <li><a href="{{URL::to('intranet/estatuto')}}"><i class='fa fa-paper-plane'></i> Gestión del Estatuto</a></li>
                    <li><a href="{{URL::to('intranet/licenciamiento')}}"><i class='fa fa-paper-plane'></i> Gestión de Licenciamiento</a></li>
                    <li><a href="{{URL::to('intranet/acreditacion')}}"><i class='fa fa-paper-plane'></i> Gestión de Acreditación</a></li>
                    <li><a href="{{URL::to('intranet/himno')}}"><i class='fa fa-paper-plane'></i> Gestión del Himno Institucional</a></li>
                    <li><a href="{{URL::to('intranet/documentosnormativosportal')}}"><i class='fa fa-paper-plane'></i> Documentos Normativos</a></li>
                    <li><a href="{{URL::to('intranet/informesportal')}}"><i class='fa fa-paper-plane'></i> Informes y Publicaciones</a></li>
                </ul>
            </li>
            @endif


            @if(accesoUser([3]))

            <li class="treeview" v-bind:class="classMenu10">
                <a href="#"><i class='fa fa-list-alt'></i> <span>Páginas Portal UNASAM</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    
                    @foreach ($permisos as $permiso)
                        @if($permiso->nivel == 0 && $permiso->roles == 1)
                            <li><a href="{{URL::to('intranet/historiaportal')}}"><i class='fa fa-paper-plane'></i> Gestión de Historia</a></li>
                            <li><a href="{{URL::to('intranet/misionvisionportal')}}"><i class='fa fa-paper-plane'></i> Gestión de Misión / Visión</a></li>
                            <li><a href="{{URL::to('intranet/rector')}}"><i class='fa fa-paper-plane'></i> Gestión del Rector</a></li>
                            <li><a href="{{URL::to('intranet/vicerrectoracademico')}}"><i class='fa fa-paper-plane'></i> Vicerrector Académico</a></li>
                            <li><a href="{{URL::to('intranet/vicerrectorinvestigacion')}}"><i class='fa fa-paper-plane'></i> Vicerrector de Investigación</a></li>
                            <li><a href="{{URL::to('intranet/asambleauniversitaria')}}"><i class='fa fa-paper-plane'></i> Asamblea Universitaria</a></li>
                            <li><a href="{{URL::to('intranet/concejouniversitario')}}"><i class='fa fa-paper-plane'></i> Concejo Universitario</a></li>
                            <li><a href="{{URL::to('intranet/objetivosunasam')}}"><i class='fa fa-paper-plane'></i> Objetivos Estratégicos</a></li>
                            <li><a href="{{URL::to('intranet/estatuto')}}"><i class='fa fa-paper-plane'></i> Gestión del Estatuto</a></li>
                            <li><a href="{{URL::to('intranet/licenciamiento')}}"><i class='fa fa-paper-plane'></i> Gestión de Licenciamiento</a></li>
                            <li><a href="{{URL::to('intranet/acreditacion')}}"><i class='fa fa-paper-plane'></i> Gestión de Acreditación</a></li>
                            <li><a href="{{URL::to('intranet/himno')}}"><i class='fa fa-paper-plane'></i> Gestión del Himno Institucional</a></li>
                            <li><a href="{{URL::to('intranet/documentosnormativosportal')}}"><i class='fa fa-paper-plane'></i> Documentos Normativos</a></li>
                            <li><a href="{{URL::to('intranet/informesportal')}}"><i class='fa fa-paper-plane'></i> Informes y Publicaciones</a></li>

                        @elseif($permiso->nivel == 0 && $permiso->roles == 0)
                            @foreach ($rolModulos as $rolModulo)
                                @if($rolModulo->modulo_id == 2 && $rolModulo->nivel == 0 && $rolModulo->rolessub == 1)
                                    <li><a href="{{URL::to('intranet/historiaportal')}}"><i class='fa fa-paper-plane'></i> Gestión de Historia</a></li>
                                    <li><a href="{{URL::to('intranet/misionvisionportal')}}"><i class='fa fa-paper-plane'></i> Gestión de Misión / Visión</a></li>
                                    <li><a href="{{URL::to('intranet/rector')}}"><i class='fa fa-paper-plane'></i> Gestión del Rector</a></li>
                                    <li><a href="{{URL::to('intranet/vicerrectoracademico')}}"><i class='fa fa-paper-plane'></i> Vicerrector Académico</a></li>
                                    <li><a href="{{URL::to('intranet/vicerrectorinvestigacion')}}"><i class='fa fa-paper-plane'></i> Vicerrector de Investigación</a></li>
                                    <li><a href="{{URL::to('intranet/asambleauniversitaria')}}"><i class='fa fa-paper-plane'></i> Asamblea Universitaria</a></li>
                                    <li><a href="{{URL::to('intranet/concejouniversitario')}}"><i class='fa fa-paper-plane'></i> Concejo Universitario</a></li>
                                    <li><a href="{{URL::to('intranet/objetivosunasam')}}"><i class='fa fa-paper-plane'></i> Objetivos Estratégicos</a></li>
                                    <li><a href="{{URL::to('intranet/estatuto')}}"><i class='fa fa-paper-plane'></i> Gestión del Estatuto</a></li>
                                    <li><a href="{{URL::to('intranet/licenciamiento')}}"><i class='fa fa-paper-plane'></i> Gestión de Licenciamiento</a></li>
                                    <li><a href="{{URL::to('intranet/acreditacion')}}"><i class='fa fa-paper-plane'></i> Gestión de Acreditación</a></li>
                                    <li><a href="{{URL::to('intranet/himno')}}"><i class='fa fa-paper-plane'></i> Gestión del Himno Institucional</a></li>
                                    <li><a href="{{URL::to('intranet/documentosnormativosportal')}}"><i class='fa fa-paper-plane'></i> Documentos Normativos</a></li>
                                    <li><a href="{{URL::to('intranet/informesportal')}}"><i class='fa fa-paper-plane'></i> Informes y Publicaciones</a></li>
                                
                                @elseif($rolModulo->modulo_id == 2 && $rolModulo->nivel == 0 && $rolModulo->rolessub == 0)
                                    @foreach ($rolSubModulos as $rolSubModulo)
                                        @if($rolSubModulo->modulo_id == 2 && $rolSubModulo->nivel == 0 && $rolSubModulo->submodulo_id == 11)
                                            <li><a href="{{URL::to('intranet/historiaportal')}}"><i class='fa fa-paper-plane'></i> Gestión de Historia</a></li>
                                        @elseif($rolSubModulo->modulo_id == 2 && $rolSubModulo->nivel == 0 && $rolSubModulo->submodulo_id == 12)
                                            <li><a href="{{URL::to('intranet/misionvisionportal')}}"><i class='fa fa-paper-plane'></i> Gestión de Misión / Visión</a></li>
                                        @elseif($rolSubModulo->modulo_id == 2 && $rolSubModulo->nivel == 0 && $rolSubModulo->submodulo_id == 13)
                                            <li><a href="{{URL::to('intranet/rector')}}"><i class='fa fa-paper-plane'></i> Gestión del Rector</a></li>
                                        @elseif($rolSubModulo->modulo_id == 2 && $rolSubModulo->nivel == 0 && $rolSubModulo->submodulo_id == 14)
                                            <li><a href="{{URL::to('intranet/vicerrectoracademico')}}"><i class='fa fa-paper-plane'></i> Vicerrector Académico</a></li>
                                        @elseif($rolSubModulo->modulo_id == 2 && $rolSubModulo->nivel == 0 && $rolSubModulo->submodulo_id == 15)
                                            <li><a href="{{URL::to('intranet/vicerrectorinvestigacion')}}"><i class='fa fa-paper-plane'></i> Vicerrector de Investigación</a></li>
                                        @elseif($rolSubModulo->modulo_id == 2 && $rolSubModulo->nivel == 0 && $rolSubModulo->submodulo_id == 16)
                                            <li><a href="{{URL::to('intranet/asambleauniversitaria')}}"><i class='fa fa-paper-plane'></i> Asamblea Universitaria</a></li>
                                        @elseif($rolSubModulo->modulo_id == 2 && $rolSubModulo->nivel == 0 && $rolSubModulo->submodulo_id == 17)
                                            <li><a href="{{URL::to('intranet/concejouniversitario')}}"><i class='fa fa-paper-plane'></i> Concejo Universitario</a></li>
                                        @elseif($rolSubModulo->modulo_id == 2 && $rolSubModulo->nivel == 0 && $rolSubModulo->submodulo_id == 18)
                                            <li><a href="{{URL::to('intranet/objetivosunasam')}}"><i class='fa fa-paper-plane'></i> Objetivos Estratégicos</a></li>
                                        @elseif($rolSubModulo->modulo_id == 2 && $rolSubModulo->nivel == 0 && $rolSubModulo->submodulo_id == 19)
                                            <li><a href="{{URL::to('intranet/estatuto')}}"><i class='fa fa-paper-plane'></i> Gestión del Estatuto</a></li>
                                        @elseif($rolSubModulo->modulo_id == 2 && $rolSubModulo->nivel == 0 && $rolSubModulo->submodulo_id == 20)
                                            <li><a href="{{URL::to('intranet/licenciamiento')}}"><i class='fa fa-paper-plane'></i> Gestión de Licenciamiento</a></li>
                                        @elseif($rolSubModulo->modulo_id == 2 && $rolSubModulo->nivel == 0 && $rolSubModulo->submodulo_id == 21)
                                            <li><a href="{{URL::to('intranet/acreditacion')}}"><i class='fa fa-paper-plane'></i> Gestión de Acreditación</a></li>
                                        @elseif($rolSubModulo->modulo_id == 2 && $rolSubModulo->nivel == 0 && $rolSubModulo->submodulo_id == 22)
                                            <li><a href="{{URL::to('intranet/himno')}}"><i class='fa fa-paper-plane'></i> Gestión del Himno Institucional</a></li>
                                        @elseif($rolSubModulo->modulo_id == 2 && $rolSubModulo->nivel == 0 && $rolSubModulo->submodulo_id == 23)                                        
                                            <li><a href="{{URL::to('intranet/documentosnormativosportal')}}"><i class='fa fa-paper-plane'></i> Documentos Normativos</a></li>
                                        @elseif($rolSubModulo->modulo_id == 2 && $rolSubModulo->nivel == 0 && $rolSubModulo->submodulo_id == 24)
                                            <li><a href="{{URL::to('intranet/informesportal')}}"><i class='fa fa-paper-plane'></i> Informes y Publicaciones</a></li>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </ul>
            </li>
            @endif

            @if(accesoUser([1]))
            <li class="treeview" v-bind:class="classMenu12">
                <a href="#"><i class='fa fa-list-alt'></i> <span>Gestión de Facultades</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{URL::to('intranet/facultades')}}"><i class='fa fa-paper-plane'></i> Gestión de Facultades</a></li>
                    <li><a href="{{URL::to('intranet/programasprogesionales')}}"><i class='fa fa-paper-plane'></i> Programas de Estudios</a></li>
                </ul>
            </li>
            @endif


            @if(accesoUser([1,2,3,4]))
            <li class="header">Gestión de Páginas Facultad</li>
            @endif
          
            @if(accesoUser([1,2]))
            <li class="treeview" v-bind:class="classMenu1">
                <a href="#"><i class='fa fa-list-alt'></i> <span>Inicio Facultad</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{URL::to('intranet/configlogo')}}"><i class='fa fa-paper-plane'></i> Logo Principal</a></li>
                    <li><a href="{{URL::to('intranet/banner')}}"><i class='fa fa-paper-plane'></i> Gestión de Banners</a></li>
                    <li><a href="{{URL::to('intranet/presentacion')}}"><i class='fa fa-paper-plane'></i> Gestión de Presentación</a></li>
                    <li><a href="{{URL::to('intranet/datosfacultad')}}"><i class='fa fa-paper-plane'></i> Gestión de Datos Facultad</a></li>
                    <li><a href="{{URL::to('intranet/noticias')}}"><i class='fa fa-paper-plane'></i> Gestión de Noticias</a></li>
                    <li><a href="{{URL::to('intranet/eventos')}}"><i class='fa fa-paper-plane'></i> Gestión de Eventos</a></li> 
                    <li><a href="{{URL::to('intranet/comunicados')}}"><i class='fa fa-paper-plane'></i> Gestión de Comunicados</a></li> 
                    <li><a href="{{URL::to('intranet/redessolicales')}}"><i class='fa fa-paper-plane'></i> Gestión de Redes Sociales</a></li>
                </ul>
            </li>
            @endif


            @if(accesoUser([3,4]))

            <li class="treeview" v-bind:class="classMenu10">
                <a href="#"><i class='fa fa-list-alt'></i> <span>Inicio Facultad</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    
                    @foreach ($permisos as $permiso)
                        @if($permiso->nivel == 1 && $permiso->roles == 1)
                        <li><a href="{{URL::to('intranet/configlogo')}}"><i class='fa fa-paper-plane'></i> Logo Principal</a></li>
                        <li><a href="{{URL::to('intranet/banner')}}"><i class='fa fa-paper-plane'></i> Gestión de Banners</a></li>

                        @php
                            break;
                        @endphp

                        @elseif($permiso->nivel == 0 && $permiso->roles == 0)
                            @foreach ($rolModulos as $rolModulo)
                                @if($rolModulo->modulo_id == 4 && $rolModulo->nivel == 1 && $rolModulo->rolessub == 1)
                                    <li><a href="{{URL::to('intranet/configlogo')}}"><i class='fa fa-paper-plane'></i> Logo Principal</a></li>
                                    <li><a href="{{URL::to('intranet/banner')}}"><i class='fa fa-paper-plane'></i> Gestión de Banners</a></li>

                                    @php
                                        break 2;
                                    @endphp
                                
                                @elseif($rolModulo->modulo_id == 4 && $rolModulo->nivel == 1 && $rolModulo->rolessub == 0)

                                @php
                                    $submodulo27 = false;
                                    $submodulo28 = false;
                                @endphp
                                    @foreach ($rolSubModulos as $rolSubModulo)
                                        @if($rolSubModulo->modulo_id == 4 && $rolSubModulo->nivel == 1 && $rolSubModulo->submodulo_id == 27 && !$submodulo27)
                                            <li><a href="{{URL::to('intranet/configlogo')}}"><i class='fa fa-paper-plane'></i> Logo Principal</a></li>
                                            @php
                                                $submodulo27 = true;
                                            @endphp
                                        @elseif($rolSubModulo->modulo_id == 4 && $rolSubModulo->nivel == 1 && $rolSubModulo->submodulo_id == 28 && !$submodulo28)
                                            <li><a href="{{URL::to('intranet/banner')}}"><i class='fa fa-paper-plane'></i> Gestión de Banners</a></li>
                                            @php
                                                $submodulo28 = true;
                                            @endphp
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </ul>
            </li>
            @endif



            @if(accesoUser([1,2]))
            <li class="treeview" v-bind:class="classMenu2">
                <a href="#"><i class='fa fa-list-alt'></i> <span>Portal Facultad</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
{{--                     <li><a href="{{URL::to('intranet/historia')}}"><i class='fa fa-paper-plane'></i> Gestión de Historia</a></li>
                    <li><a href="{{URL::to('intranet/misionvision')}}"><i class='fa fa-paper-plane'></i> Gestión de Misión / Visión</a></li>
                    <li><a href="{{URL::to('intranet/politicas')}}"><i class='fa fa-paper-plane'></i> Gestión de Políticas de Calidad</a></li>
                    <li><a href="{{URL::to('intranet/objetivos')}}"><i class='fa fa-paper-plane'></i> Gestión de Objetivos</a></li>
                    <li><a href="{{URL::to('intranet/directorio')}}"><i class='fa fa-paper-plane'></i> Gestión de Directorio</a></li> 
                    <li><a href="{{URL::to('intranet/documentosnormativos')}}"><i class='fa fa-paper-plane'></i> Documentos Normativos</a></li> 
                    <li><a href="{{URL::to('intranet/gestioncalidad')}}"><i class='fa fa-paper-plane'></i> Gestión de Calidad</a></li> 
                    <li><a href="{{URL::to('intranet/revistas')}}"><i class='fa fa-paper-plane'></i> Gestión de Revistas</a></li> 
                    <li><a href="{{URL::to('intranet/basedatos')}}"><i class='fa fa-paper-plane'></i> Gestión de Base de Datos</a></li> 
                    <li><a href="{{URL::to('intranet/antiplagio')}}"><i class='fa fa-paper-plane'></i> Gestión de Antiplagio</a></li> 
                    <li><a href="{{URL::to('intranet/galeria')}}"><i class='fa fa-paper-plane'></i> Gestión de Galería</a></li> 
                    <li><a href="{{URL::to('intranet/estudiantesfec')}}"><i class='fa fa-paper-plane'></i> Gestión de Estudiantes FEC</a></li> 
                    <li><a href="{{URL::to('intranet/docentesfec')}}"><i class='fa fa-paper-plane'></i> Gestión de Docentes FEC</a></li> 
                    <li><a href="{{URL::to('intranet/resoluciones')}}"><i class='fa fa-paper-plane'></i> Resoluciones y Actas</a></li> 
                    <li><a href="{{URL::to('intranet/tupa')}}"><i class='fa fa-paper-plane'></i> Gestión del TUPA</a></li>  --}}
                </ul>
            </li>
            @endif



            @if(accesoUser([1]))
            <li class="header">Gestión de Programas de Estudios</li>
            @endif

            @if(accesoUser([1]))
            <li class="treeview" v-bind:class="classMenu3">
                <a href="#"><i class='fa fa-list-alt'></i> <span>Inicio Programa de Estudio</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
{{--                     <li><a href="{{URL::to('intranet/bannerprograma')}}"><i class='fa fa-paper-plane'></i> Gestión de Banners</a></li>
                    <li><a href="{{URL::to('intranet/presentacionprograma')}}"><i class='fa fa-paper-plane'></i> Gestión de Presentación</a></li>
                    <li><a href="{{URL::to('intranet/organigramaprograma')}}"><i class='fa fa-paper-plane'></i> Gestión de Organigrama</a></li>
                    <li><a href="{{URL::to('intranet/datosprograma')}}"><i class='fa fa-paper-plane'></i> Gestión de Datos de Contacto</a></li>
                    <li><a href="{{URL::to('intranet/estadisticosprograma')}}"><i class='fa fa-paper-plane'></i> Gestión de Datos Estadísticos</a></li> --}}
                </ul>
            </li>
            @endif

            @if(accesoUser([1]))
            <li class="treeview" v-bind:class="classMenu4">
                <a href="#"><i class='fa fa-list-alt'></i> <span>Portal Programa de Estudio</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
{{--                     <li><a href="{{URL::to('intranet/historiaprograma')}}"><i class='fa fa-paper-plane'></i> Gestión de Historia</a></li>
                    <li><a href="{{URL::to('intranet/misionvisionprograma')}}"><i class='fa fa-paper-plane'></i> Gestión de Misión / Visión</a></li>
                    <li><a href="{{URL::to('intranet/objetivosprograma')}}"><i class='fa fa-paper-plane'></i> Gestión de Objetivos</a></li>
                    <li><a href="{{URL::to('intranet/perfilingresoprograma')}}"><i class='fa fa-paper-plane'></i> Gestión de Perfiles de Ingreso</a></li> 
                    <li><a href="{{URL::to('intranet/perfilegresoprograma')}}"><i class='fa fa-paper-plane'></i> Gestión de Perfiles de Egreso</a></li> 
                    <li><a href="{{URL::to('intranet/competenciasprograma')}}"><i class='fa fa-paper-plane'></i> Gestión de Competencias</a></li> 
                    <li><a href="{{URL::to('intranet/camposocupacionalesprograma')}}"><i class='fa fa-paper-plane'></i> Campos Ocupacionales</a></li> 
                    <li><a href="{{URL::to('intranet/planestudiosprograma')}}"><i class='fa fa-paper-plane'></i> Gestión de Planes de Estudios</a></li> 
                    <li><a href="{{URL::to('intranet/gradosprograma')}}"><i class='fa fa-paper-plane'></i> Gestión de Grados y Títulos</a></li> 
                    <li><a href="{{URL::to('intranet/docentesprograma')}}"><i class='fa fa-paper-plane'></i> Gestión de Docentes</a></li> 
                    <li><a href="{{URL::to('intranet/infraestructuraprograma')}}"><i class='fa fa-paper-plane'></i> Gestión de Infraestructura</a></li>  --}}
                </ul>
            </li>
            @endif


            <li class="header">MENÚ CONFIGURACIONES</li>
            <!-- Optionally, you can add icons to the links -->


            <li class="treeview" v-bind:class="classMenu9">
                <a href="#"><i class='fa fa-cogs'></i> <span>Configuraciones</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                        @if(accesoUser([1]))
                            <li><a href="{{URL::to('usuarios')}}"><i class='fa fa-paper-plane'></i> Gestión de Usuarios</a></li>                        
                        @endif
                    <li><a href="{{URL::to('miperfil')}}"><i class='fa fa-paper-plane'></i> Mi Perfil</a></li>
                    <li><a href="{{URL::to('salir')}}" ><i class='fa fa-paper-plane'></i> <b>Cerrar Sesión</b></a></li>
                </ul>
            </li>


        </ul><!-- /.sidebar-menu -->


        <hr style="border-top: 1px solid #4d4d4d;">

            <div class="no-print user-panel-unasam">
                <div class="no-print image" style="text-align: center;">
                    <img src="{{asset('/img/unasam.png')}}"  alt="User Image" style="margin-top: 15px;height: 150px;" />
                    <ul class="no-print sidebar-menu">
                    <li class="no-print stroke treeview" style="font-family: Monotype Corsiva;font-size: 21px;color: #f9c52c;margin-top: 5px;">"Una Nueva Universidad<br>Para el Desarrollo"</li>
                    </ul>
                </div>
            </div>
    </section>
    <!-- /.sidebar -->
</aside>
