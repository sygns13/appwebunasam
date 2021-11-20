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
  <div class="panel-heading" style="padding-bottom: 15px;">
    <h3 class="panel-title">Gestión de Datos de Contacto de la @{{facultad}} <a style="float: right; padding: all; color: black;" type="button" class="btn btn-default btn-sm" href="#"  @click.prevent="irAtras()"><i class="fa fa-reply-all" aria-hidden="true"></i> 
      Ir Atrás</a></h3>
    
  </div>

  {{-- <div class="panel-body">
    <div class="col-md-12" style="padding-top: 15px;">
      <div class="form-group">
        <button type="button" class="btn btn-primary btn-sm" id="btncrear" style="font-size: 14px;" @click.prevent="nuevo()"><i class="fa fa-edit" aria-hidden="true" ></i> Gestionar la Presentación</button>
      </div>
    </div>
  </div> --}}
</div>



<div class="box box-success" v-if="facultad_id!=0">
  <div class="box-header with-border" style="border: 1px solid rgb(0, 166, 90); background-color: rgb(0, 166, 90); color: white;">
    <h3 class="box-title" id="tituloAgregar">Gestión de Datos de Contacto de la @{{facultad}}
    </h3>
  </div>
  @include('adminfacultad.datosfacultad.formulario')  
</div>


{{-- <div class="box box-warning" v-if="divEdit">
  <div class="box-header with-border" style="border: 1px solid #f39c12; background-color: #f39c12; color: white;">
    <h3 class="box-title" id="tituloAgregar">Editar Banner: @{{ fillobject.nombre }}


    </h3>
  </div>

  @include('adminfacultad.banner.editar')  

</div> --}}

{{-- <div class="panel panel-primary">
  <div class="panel-heading" style="padding-bottom: 15px;">
    <h3 class="panel-title">Vista de la Presentación:</h3>
    
  </div>

    <div class="panel-body">
    <center><h4 style="text-decoration: underline;">@{{fillobject.titulo}}</h4></center>
    <br>


    <div v-html="fillobject.descripcion">
    </div>


    <div class="form-group" v-if="titulo">

      <div class="col-sm-12" v-if="fillobject.tieneimagen==1">
        <center>
        <img src="" style="max-height: 300px;" class="img-responsive" alt="Imagen del Contenido Informativo" id="imgInformacion">
        </center>
      </div>
    </div>
</div>

</div> --}}
