<div class="panel panel-primary" v-if="mostrarPalenIni">
  <div class="panel-heading" style="padding-bottom: 15px;">
    <h3 class="panel-title">Gestión de la Historia de la UNASAM <a style="float: right; padding: all; color: black;" type="button" class="btn btn-default btn-sm" href="{{URL::to('home')}}"><i class="fa fa-reply-all" aria-hidden="true"></i> 
    Volver</a></h3>
    
  </div>

  <div class="panel-body">
    <div class="col-md-12" style="padding-top: 15px;">
      <div class="form-group">
        <button type="button" class="btn btn-primary btn-sm" id="btncrear" style="font-size: 14px;" @click.prevent="nuevo()"><i class="fa fa-edit" aria-hidden="true" ></i> Gestionar la Historia</button>

        <button type="button" class="btn bg-teal btn-sm" id="btnimages" style="font-size: 14px;" @click.prevent="gestionarImages()"><i class="fa fa-file-text-o"></i> Gestionar Imágenes</a>
      </div>
    </div>
  </div>
</div>



<div class="box box-success" v-if="divNuevo">
  <div class="box-header with-border" style="border: 1px solid rgb(0, 166, 90); background-color: rgb(0, 166, 90); color: white;">
    <h3 class="box-title" id="tituloAgregar">Gestión de la Historia
    </h3>
  </div>
  @include('paginasportal.historia.formulario')  
</div>



<div class="panel panel-primary">
  <div class="panel-heading" style="padding-bottom: 15px;">
    <h3 class="panel-title">Vista de la Historia:</h3>
    
  </div>

    <div class="panel-body">
    <center><h4 style="text-decoration: underline;">@{{fillobject.titulo}}</h4></center>
    <br>


    <div v-html="fillobject.historia">
    </div>


    <div class="form-group" v-if="titulo">

      <div class="col-sm-12" v-if="fillobject.tieneimagen==1">
       {{--  <center>
        <img src="" style="max-height: 300px;" class="img-responsive" alt="Imagen del Contenido Informativo" id="imgInformacion">
        </center> --}}
      </div>
    </div>
</div>

</div>


@include('paginasportal.historia.detalleimagenes')  