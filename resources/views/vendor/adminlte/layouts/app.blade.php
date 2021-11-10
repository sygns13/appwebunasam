<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="es">

@section('htmlheader')
    @include('adminlte::layouts.partials.htmlheader')
@show

<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="skin-blue sidebar-mini">
<div id="app" v-cloak>
    <div class="wrapper">

    @include('adminlte::layouts.partials.mainheader')

    @include('adminlte::layouts.partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="background-image: url(../img/fondo_gris2.gif);">

        @include('adminlte::layouts.partials.contentheader')

        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            @yield('main-content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    @include('adminlte::layouts.partials.controlsidebar')

    @include('adminlte::layouts.partials.footer')

</div><!-- ./wrapper -->
</div>
@section('scripts')
    @include('adminlte::layouts.partials.scripts')
@show

</body>
</html>


@if($modulo=="inicioAdmin")
@include('inicio.vueAdmin')

@elseif($modulo=="usuario")
@include('usuario.vue')

@elseif($modulo=="miperfil")
@include('miperfil.vue')

{{-- //Main Portal Web--}}

@elseif($modulo=="configuracion")
@include('adminportal.configuracion.vue')

@elseif($modulo=="bannerportal")
@include('adminportal.banner.vue')

@elseif($modulo=="presentacionportal")
@include('adminportal.presentacion.vue')

@elseif($modulo=="datosunasam")
@include('adminportal.datosunasam.vue')

@elseif($modulo=="noticiaportal")
@include('adminportal.noticia.vue')

@elseif($modulo=="eventoportal")
@include('adminportal.evento.vue')

@elseif($modulo=="comunicadoportal")
@include('adminportal.comunicado.vue')

@elseif($modulo=="plataforma")
@include('adminportal.plataforma.vue')

@elseif($modulo=="redsocialportal")
@include('adminportal.redsocial.vue')

@elseif($modulo=="linkinteresportal")
@include('adminportal.linkinteres.vue')

{{-- //Paginas Portal Web--}}

@elseif($modulo=="historiaportal")
@include('paginasportal.historia.vue')

@elseif($modulo=="misionvisionportal")
@include('paginasportal.misionvision.vue')

@elseif($modulo=="rector")
@include('paginasportal.organo1.vue')

@elseif($modulo=="vicerrector1")
@include('paginasportal.organo2.vue')

@elseif($modulo=="vicerrector2")
@include('paginasportal.organo3.vue')

@elseif($modulo=="asambleau")
@include('paginasportal.organo4.vue')

@elseif($modulo=="concejou")
@include('paginasportal.organo5.vue')

@elseif($modulo=="objetivosportal")
@include('paginasportal.objetivos.vue')

@elseif($modulo=="estatutoportal")
@include('paginasportal.estatuto.vue')

@elseif($modulo=="licenciamientoportal")
@include('paginasportal.licenciamiento.vue')

@elseif($modulo=="acreditacionportal")
@include('paginasportal.acreditacion.vue')

@elseif($modulo=="himno")
@include('paginasportal.contenido1.vue')

@elseif($modulo=="documentoportal")
@include('paginasportal.documento.vue')

@elseif($modulo=="informeportal")
@include('paginasportal.informe.vue')

{{-- //Paginas Gestionar Facultades y Programas de Estudios--}}

@elseif($modulo=="facultad")
@include('facultad.vue')

@elseif($modulo=="escuela")
@include('escuela.vue')


{{-- //Paginas Portales Facultades--}}

@elseif($modulo=="configuracion")
@include('adminfacultad.configuracion.vue')

@elseif($modulo=="bannerfacultad")
@include('adminfacultad.banner.vue')

@elseif($modulo=="presentacionfacultad")
@include('adminfacultad.presentacion.vue')

@elseif($modulo=="datosfacultad")
@include('adminfacultad.datosfacultad.vue')

@elseif($modulo=="noticiafacultad")
@include('adminfacultad.noticia.vue')

@elseif($modulo=="eventofacultad")
@include('adminfacultad.evento.vue')

@elseif($modulo=="comunicadofacultad")
@include('adminfacultad.comunicado.vue')

@elseif($modulo=="redsocialfacultad")
@include('adminfacultad.redsocial.vue')

@elseif($modulo=="historiafacultad")
@include('adminfacultad.historia.vue')

@elseif($modulo=="misionvisionfec")
@include('adminfacultad.misionvision.vue')


@endif

<script type="text/javascript">

function redondear(num) {
    return +(Math.round(num + "e+2")  + "e-2");
}

function recorrertb(idtb){

    var cont=1;
        $("#"+idtb+" tbody tr").each(function (index)
        {

            $(this).children("td").each(function (index2)
            {
               //alert(index+'-'+index2);

               if(index2==0){
                  $(this).text(cont);
                  cont++;
               }


            })

        })
  }

  function isImage(extension)
{
    switch(extension.toLowerCase()) 
    {
        case 'jpg': case 'gif': case 'png': case 'jpeg': case 'JPG': case 'GIF': case 'PNG': case 'JPEG': case 'jpe': case 'JPE':
            return true;
        break;
        default:
            return false;
        break;
    }
}

function soloNumeros(e){
  var key = window.Event ? e.which : e.keyCode
  return ((key >= 48 && key <= 57) || (key==8) || (key==35) || (key==34) || (key==46));
}

function noEscribe(e){
  var key = window.Event ? e.which : e.keyCode
  return (key==null);
}

function EscribeLetras(e,ele){
  var text=$(ele).val();
  text=text.toUpperCase();
   var pos=posicionCursor(ele);
  $(ele).val(text);

  ponCursorEnPos(pos,ele);
}


function ponCursorEnPos(pos,laCaja){  
    if(typeof document.selection != 'undefined' && document.selection){        //método IE 
        var tex=laCaja.value; 
        laCaja.value='';  
        laCaja.focus(); 
        var str = document.selection.createRange();  
        laCaja.value=tex; 
        str.move("character", pos);  
        str.moveEnd("character", 0);  
        str.select(); 
    } 
    else if(typeof laCaja.selectionStart != 'undefined'){                    //método estándar 
        laCaja.setSelectionRange(pos,pos);  
        //forzar_focus();            //debería ser focus(), pero nos salta el evento y no queremos 
    } 
}  

function posicionCursor(element)
{
       var tb = element;
        var cursor = -1;

        // IE
        if (document.selection && (document.selection != 'undefined'))
        {
            var _range = document.selection.createRange();
            var contador = 0;
            while (_range.move('character', -1))
                contador++;
            cursor = contador;
        }
       // FF
        else if (tb.selectionStart >= 0)
            cursor = tb.selectionStart;

       return cursor;
}

function pad (n, length) {
    var  n = n.toString();
    while(n.length < length)
         n = "0" + n;
    return n;
}

    </script>