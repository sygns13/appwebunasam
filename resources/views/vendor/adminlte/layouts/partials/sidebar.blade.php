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



            @if(accesoUser([1]))
            <li class="header">Gestión del Portal UNASAM</li>
            @endif
          
            @if(accesoUser([1]))
            <li class="treeview" v-bind:class="classMenu10">
                <a href="#"><i class='fa fa-list-alt'></i> <span>Portal de Inicio UNASAM</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{URL::to('intranet/bannerportal')}}"><i class='fa fa-paper-plane'></i> Gestión de Banners</a></li>
                    <li><a href="{{URL::to('intranet/presentacionportal')}}"><i class='fa fa-paper-plane'></i> Gestión de Presentación</a></li>
                    <li><a href="{{URL::to('intranet/datosfec')}}"><i class='fa fa-paper-plane'></i> Gestión de Datos Facultad</a></li>
                    <li><a href="{{URL::to('intranet/noticias')}}"><i class='fa fa-paper-plane'></i> Gestión de Noticias</a></li>
                    <li><a href="{{URL::to('intranet/eventos')}}"><i class='fa fa-paper-plane'></i> Gestión de Eventos</a></li> 
                    <li><a href="{{URL::to('intranet/comunicados')}}"><i class='fa fa-paper-plane'></i> Gestión de Comunicados</a></li> 
                    <li><a href="{{URL::to('intranet/redessolicales')}}"><i class='fa fa-paper-plane'></i> Gestión de Redes Sociales</a></li> 
                </ul>
            </li>
            @endif



            

            @if(accesoUser([1]))
            <li class="header">Gestión de Páginas Facultad</li>
            @endif
          
            @if(accesoUser([1]))
            <li class="treeview" v-bind:class="classMenu1">
                <a href="#"><i class='fa fa-list-alt'></i> <span>Portal de Inicio FEC</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{URL::to('intranet/banner')}}"><i class='fa fa-paper-plane'></i> Gestión de Banners</a></li>
                    <li><a href="{{URL::to('intranet/presentacion')}}"><i class='fa fa-paper-plane'></i> Gestión de Presentación</a></li>
                    <li><a href="{{URL::to('intranet/datosfec')}}"><i class='fa fa-paper-plane'></i> Gestión de Datos Facultad</a></li>
                    <li><a href="{{URL::to('intranet/noticias')}}"><i class='fa fa-paper-plane'></i> Gestión de Noticias</a></li>
                    <li><a href="{{URL::to('intranet/eventos')}}"><i class='fa fa-paper-plane'></i> Gestión de Eventos</a></li> 
                    <li><a href="{{URL::to('intranet/comunicados')}}"><i class='fa fa-paper-plane'></i> Gestión de Comunicados</a></li> 
                    <li><a href="{{URL::to('intranet/redessolicales')}}"><i class='fa fa-paper-plane'></i> Gestión de Redes Sociales</a></li> 
                </ul>
            </li>
            @endif

            @if(accesoUser([1]))
            <li class="treeview" v-bind:class="classMenu2">
                <a href="#"><i class='fa fa-list-alt'></i> <span>Páginas FEC</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{URL::to('intranet/historia')}}"><i class='fa fa-paper-plane'></i> Gestión de Historia</a></li>
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
                    <li><a href="{{URL::to('intranet/tupa')}}"><i class='fa fa-paper-plane'></i> Gestión del TUPA</a></li> 
                </ul>
            </li>
            @endif

            @if(accesoUser([1]))
            <li class="header">Gestión de Programas de Estudios</li>
            @endif

            @if(accesoUser([1]))
            <li class="treeview" v-bind:class="classMenu3">
                <a href="#"><i class='fa fa-list-alt'></i> <span>Gestión de Portal de Inicio</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{URL::to('intranet/bannerprograma')}}"><i class='fa fa-paper-plane'></i> Gestión de Banners</a></li>
                    <li><a href="{{URL::to('intranet/presentacionprograma')}}"><i class='fa fa-paper-plane'></i> Gestión de Presentación</a></li>
                    <li><a href="{{URL::to('intranet/organigramaprograma')}}"><i class='fa fa-paper-plane'></i> Gestión de Organigrama</a></li>
                    <li><a href="{{URL::to('intranet/datosprograma')}}"><i class='fa fa-paper-plane'></i> Gestión de Datos de Contacto</a></li>
                    <li><a href="{{URL::to('intranet/estadisticosprograma')}}"><i class='fa fa-paper-plane'></i> Gestión de Datos Estadísticos</a></li>
                </ul>
            </li>
            @endif

            @if(accesoUser([1]))
            <li class="treeview" v-bind:class="classMenu4">
                <a href="#"><i class='fa fa-list-alt'></i> <span>Gestión de Páginas Web</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{URL::to('intranet/historiaprograma')}}"><i class='fa fa-paper-plane'></i> Gestión de Historia</a></li>
                    <li><a href="{{URL::to('intranet/misionvisionprograma')}}"><i class='fa fa-paper-plane'></i> Gestión de Misión / Visión</a></li>
                    <li><a href="{{URL::to('intranet/objetivosprograma')}}"><i class='fa fa-paper-plane'></i> Gestión de Objetivos</a></li>
                    <li><a href="{{URL::to('intranet/perfilingresoprograma')}}"><i class='fa fa-paper-plane'></i> Gestión de Perfiles de Ingreso</a></li> 
                    <li><a href="{{URL::to('intranet/perfilegresoprograma')}}"><i class='fa fa-paper-plane'></i> Gestión de Perfiles de Egreso</a></li> 
                    <li><a href="{{URL::to('intranet/competenciasprograma')}}"><i class='fa fa-paper-plane'></i> Gestión de Competencias</a></li> 
                    <li><a href="{{URL::to('intranet/camposocupacionalesprograma')}}"><i class='fa fa-paper-plane'></i> Campos Ocupacionales</a></li> 
                    <li><a href="{{URL::to('intranet/planestudiosprograma')}}"><i class='fa fa-paper-plane'></i> Gestión de Planes de Estudios</a></li> 
                    <li><a href="{{URL::to('intranet/gradosprograma')}}"><i class='fa fa-paper-plane'></i> Gestión de Grados y Títulos</a></li> 
                    <li><a href="{{URL::to('intranet/docentesprograma')}}"><i class='fa fa-paper-plane'></i> Gestión de Docentes</a></li> 
                    <li><a href="{{URL::to('intranet/infraestructuraprograma')}}"><i class='fa fa-paper-plane'></i> Gestión de Infraestructura</a></li> 
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





            @if(accesoUser([2]))

            @endif



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
