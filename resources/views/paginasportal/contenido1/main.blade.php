<div class="panel panel-primary" v-if="mostrarPalenIni">
  <div class="panel-heading" style="padding-bottom: 15px;">
    <h3 class="panel-title">Gestión del Himno de la UNASAM <a style="float: right; padding: all; color: black;" type="button" class="btn btn-default btn-sm" href="{{URL::to('home')}}"><i class="fa fa-reply-all" aria-hidden="true"></i> 
    Volver</a></h3>
    
  </div>

  <div class="panel-body">
    <div class="col-md-12" style="padding-top: 15px;">
      <div class="form-group">
        <button type="button" class="btn btn-primary btn-sm" id="btncrear" style="font-size: 14px;" @click.prevent="nuevo()"><i class="fa fa-edit" aria-hidden="true" ></i> Gestión</button>
      </div>
    </div>
  </div>
</div>



<div class="box box-success" v-if="divNuevo">
  <div class="box-header with-border" style="border: 1px solid rgb(0, 166, 90); background-color: rgb(0, 166, 90); color: white;">
    <h3 class="box-title" id="tituloAgregar">Gestión del Himno
    </h3>
  </div>
  @include('paginasportal.contenido1.formulario')  
</div>



<div class="panel panel-primary">
  <div class="panel-heading" style="padding-bottom: 15px;">
    <h3 class="panel-title">Vista del Himno de la UNASAM:</h3>
    
  </div>

    <div class="panel-body">
    <center><h3 style="text-decoration: underline;">@{{fillobject.titulo}}</h3></center>
    <br>


    <div v-html="fillobject.descripcion">
    </div>

    <div class="form-group">

      <div class="col-sm-12" style="padding-bottom: 20px;">
    <template v-if="fillobject.mediaurl != null && fillobject.mediaurl.trim().length > 0">
      {{-- <div class="embed-responsive embed-responsive-4by3" id="videoYoutube" style="min-height: 250px; min-width: auto; ">
        <iframe width="700" height="500" v-bind:src="fillobject.mediaurl" frameborder="0" allowfullscreen id="contenidoID"></iframe>
      </div> --}}


    <center>  
      <div v-html="fillobject.mediaurl"></div>
    </center>
      {{-- @{{fillobject.mediaurl}} --}}
    </template>
  </div>   </div>


    


    <div class="form-group">

      <div class="col-sm-12" v-if="fillobject.tieneimagen==1">
        <center>
        <img src="" style="max-height: 300px;" class="img-responsive" alt="Imagen del Rector" id="imgInformacion">
        </center>
      </div>
    </div>
</div>

</div>
