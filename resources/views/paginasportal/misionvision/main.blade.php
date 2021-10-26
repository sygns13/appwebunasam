<div class="panel panel-primary" v-if="mostrarPalenIni">
  <div class="panel-heading" style="padding-bottom: 15px;">
    <h3 class="panel-title">Gestión de la Misión y Visión de la UNASAM  <a style="float: right; padding: all; color: black;" type="button" class="btn btn-default btn-sm" href="{{URL::to('home')}}"><i class="fa fa-reply-all" aria-hidden="true"></i> 
    Volver</a></h3>
    
  </div>

  <div class="panel-body">
    <div class="col-md-12" style="padding-top: 15px;">
      <div class="form-group">
        <button type="button" class="btn btn-primary btn-sm" id="btncrearM" style="font-size: 14px;" @click.prevent="nuevoM()"><i class="fa fa-edit" aria-hidden="true" ></i> Gestionar la Misión</button>
        <button type="button" class="btn btn-primary btn-sm" id="btncrearV" style="font-size: 14px;" @click.prevent="nuevoV()"><i class="fa fa-edit" aria-hidden="true" ></i> Gestionar la Visión</button>
      </div>
    </div>
  </div>
</div>



<div class="box box-success" v-if="divNuevoM">
  <div class="box-header with-border" style="border: 1px solid rgb(0, 166, 90); background-color: rgb(0, 166, 90); color: white;">
    <h3 class="box-title" id="tituloAgregarM">Gestión de la Misión
    </h3>
  </div>
  @include('paginasportal.misionvision.formulariom')  
</div>

<div class="box box-success" v-if="divNuevoV">
  <div class="box-header with-border" style="border: 1px solid rgb(0, 166, 90); background-color: rgb(0, 166, 90); color: white;">
    <h3 class="box-title" id="tituloAgregarV">Gestión de la Visión
    </h3>
  </div>
  @include('paginasportal.misionvision.formulariov')  
</div>



<div class="panel panel-primary">
  <div class="panel-heading" style="padding-bottom: 15px;">
    <h3 class="panel-title">Vista de la Misión:</h3>
    
  </div>

    <div class="panel-body">
    <center><h4 style="text-decoration: underline;">@{{fillobjectM.titulo}}</h4></center>
    <br>


    <div v-html="fillobjectM.descripcion">
    </div>


    <div class="form-group">

      <div class="col-sm-12" v-if="fillobjectM.tieneimagen==1">
        <center>
        <img src="" style="max-height: 300px;" class="img-responsive" alt="Imagen del Contenido Informativo" id="imgInformacionM">
        </center>
      </div>
    </div>
</div>

</div>


<div class="panel panel-primary">
  <div class="panel-heading" style="padding-bottom: 15px;">
    <h3 class="panel-title">Vista de la Visión:</h3>
    
  </div>

    <div class="panel-body">
    <center><h4 style="text-decoration: underline;">@{{fillobjectV.titulo}}</h4></center>
    <br>


    <div v-html="fillobjectV.descripcion">
    </div>


    <div class="form-group">

      <div class="col-sm-12" v-if="fillobjectV.tieneimagen==1">
        <center>
        <img src="" style="max-height: 300px;" class="img-responsive" alt="Imagen del Contenido Informativo" id="imgInformacionV">
        </center>
      </div>
    </div>
</div>

</div>