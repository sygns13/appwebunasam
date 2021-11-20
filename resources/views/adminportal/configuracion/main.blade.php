<div class="panel panel-primary" v-if="mostrarPalenIni">
  <div class="panel-heading" style="padding-bottom: 15px;">
    <h3 class="panel-title">Configuraciones principales del Portal Web UNASAM <a style="float: right; padding: all; color: black;" type="button" class="btn btn-default btn-sm" href="{{URL::to('home')}}"><i class="fa fa-reply-all" aria-hidden="true"></i> 
    Volver</a></h3>
    
  </div>

  <div class="panel-body">
    <div class="col-md-12" style="padding-top: 15px;">
      <div class="form-group">
        <button type="button" class="btn btn-primary btn-sm" id="btncrear" style="font-size: 14px;" @click.prevent="nuevo()"><i class="fa fa-edit" aria-hidden="true" ></i> Diseño del Portal UNASAM</button>
        <button type="button" class="btn btn-primary btn-sm" id="btncrear" style="font-size: 14px;" @click.prevent="nuevoLogo()"><i class="fa fa-edit" aria-hidden="true" ></i> Logo del Portal UNASAM</button>
      </div>
    </div>
  </div>
</div>



<div class="box box-success" v-if="divNuevo">
  <div class="box-header with-border" style="border: 1px solid rgb(0, 166, 90); background-color: rgb(0, 166, 90); color: white;">
    <h3 class="box-title" id="tituloAgregar">Gestión del Diseño del Portal
    </h3>
  </div>
  @include('adminportal.configuracion.formulario')  
</div>

<div class="box box-success" v-if="divNuevoLogo">
  <div class="box-header with-border" style="border: 1px solid rgb(0, 166, 90); background-color: rgb(0, 166, 90); color: white;">
    <h3 class="box-title" id="tituloAgregar">Gestión del Logo del Portal UNASAM
    </h3>
  </div>
  @include('adminportal.configuracion.formulariologo')  
</div>





<div class="panel panel-primary">
  <div class="panel-heading" style="padding-bottom: 15px;">
    <h3 class="panel-title">Configuraciones Actuales:</h3>
    
  </div>

    <div class="panel-body">

    <div class="form-group">

      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="txttitulo" class="col-sm-2 control-label">Tipo de Diseño Portal:</label>
          <div class="col-sm-10">
            <label for="txttitulo" style="font-size: 15px; font-weight: normal;" v-if="fillobject.tipo_vista=='1' ">Diseño Full Screen</label>
            <label for="txttitulo" style="font-size: 15px; font-weight: normal;" v-if="fillobject.tipo_vista=='2' ">Diseño normal</label>
            <label for="txttitulo" style="font-size: 15px; font-weight: normal;" v-if="fillobject.tipo_vista=='3' ">Diseño Boxed Enmarcado</label>
          </div>
        </div>
      </div>

      <div class="col-md-12" style="padding-top: 15px;">
        <hr style="border-top: 1px solid #bdbdbd;">
      </div>

      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="txttitulo" class="col-sm-2 control-label">Logo del Portal:</label>
          <div class="col-sm-10">
            <template  v-if="fillobject.logourl != null && fillobject.logourl.trim()!=''">
              <img src="" style="max-height: 100px;" class="img-responsive" alt="Imagen del Logo" id="imgInformacion">
            </template>
            <template v-else>
              No registrado
            </template>
          </div>
        </div>
      </div>
</div>

</div>
