
{{--         <div class="box box-success" style="border: 1px solid #00a65a;">
          <div class="box-header with-border" style="border: 1px solid #00a65a;background-color: #00a65a; color: white;"> --}}

            <div class="panel panel-primary" v-if="mostrarPalenIni && facultad_id ==0">
              <div class="panel-heading" style="padding-bottom: 15px;" >
            <h3 class="panel-title" id="tituloAgregar">Seleccione Facultad <a style="float: right; padding: all; color: black;" type="button" class="btn btn-default btn-sm" href="{{URL::to('home')}}"><i class="fa fa-reply-all" aria-hidden="true"></i> 
                Volver</a>
            </h3>
          </div>
      
          <div class="panel-body">
            <div class="col-md-12">
      
              <div class="col-md-12">
                <div class="form-group">
                  <label for="cbufacultad_id" class="col-sm-2 control-label">Facultad:*</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="cbufacultad_id" name="cbufacultad_id" v-model="facultad_id" @change="cambioFacultad">
                      <option disabled value="0">Seleccione un Facultad</option>
                      @foreach ($facultads as $dato)
                        <option value="{{$dato->id}}">{{$dato->nombre}}</option> 
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>

              </div>

              @if($facultads == null || count($facultads) == 0)
              <div class="col-md-12" style="padding-top: 15px;">
                <span style="color:red"><b>Nota:</b> el Usuario tiene acceso al módulo pero no tiene ninguna facultad asignada, por favor comuníquese con el administrador del sistema</span>
              </div>
              @endif
          </div>
      

      </div>




<div class="panel panel-primary" v-if="mostrarPalenIni && facultad_id!=0">
  <div class="panel-heading" style="padding-bottom: 15px;" >
    <h3 class="panel-title">Configuraciones principales de la @{{facultad}} <a style="float: right; padding: all; color: black;" type="button" class="btn btn-default btn-sm" href="#"  @click.prevent="irAtras()"><i class="fa fa-reply-all" aria-hidden="true"></i> 
      Ir Atrás</a>
    </h3>
    
  </div>

  <div class="panel-body">
    <div class="col-md-12" style="padding-top: 15px;">
      <div class="form-group">
        <button type="button" class="btn btn-primary btn-sm" id="btncrear" style="font-size: 14px;" @click.prevent="nuevo()"><i class="fa fa-edit" aria-hidden="true" ></i> Diseño del Portal de la Facultad</button>
        <button type="button" class="btn btn-primary btn-sm" id="btncrear" style="font-size: 14px;" @click.prevent="nuevoLogo()"><i class="fa fa-edit" aria-hidden="true" ></i> Logo del Portal de la Facultad</button>
      </div>
    </div>
  </div>
</div>



<div class="box box-success" v-if="divNuevo && facultad_id!=0">
  <div class="box-header with-border" style="border: 1px solid rgb(0, 166, 90); background-color: rgb(0, 166, 90); color: white;">
    <h3 class="box-title" id="tituloAgregar">Gestión del Diseño de la @{{facultad}}
    </h3>
  </div>
  @include('adminfacultad.configuracion.formulario')  
</div>

<div class="box box-success" v-if="divNuevoLogo && facultad_id!=0">
  <div class="box-header with-border" style="border: 1px solid rgb(0, 166, 90); background-color: rgb(0, 166, 90); color: white;">
    <h3 class="box-title" id="tituloAgregar">Gestión del Logo de la @{{facultad}}
    </h3>
  </div>
  @include('adminfacultad.configuracion.formulariologo')  
</div>





<div class="panel panel-primary" v-if="facultad_id!=0">
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
</div>

