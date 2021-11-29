{{--         <div class="box box-success" style="border: 1px solid #00a65a;">
          <div class="box-header with-border" style="border: 1px solid #00a65a;background-color: #00a65a; color: white;"> --}}

            <div class="panel panel-primary" v-if="mostrarPalenIni && programa_id ==0">
              <div class="panel-heading" style="padding-bottom: 15px;" >
            <h3 class="panel-title" id="tituloAgregar">Seleccione Programa de Estudio <a style="float: right; padding: all; color: black;" type="button" class="btn btn-default btn-sm" href="{{URL::to('home')}}"><i class="fa fa-reply-all" aria-hidden="true"></i> 
                Volver</a>
            </h3>
          </div>
      
          <div class="panel-body">
            <div class="col-md-12">
      
              <div class="col-md-12">
                <div class="form-group">
                  <label for="cbuprograma_id" class="col-sm-2 control-label">Programa de Estudio:*</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="cbuprograma_id" name="cbuprograma_id" v-model="programa_id" @change="cambioPrograma">
                      <option disabled value="0">Seleccione un Programa de Estudio</option>
                      @foreach ($programas as $dato)
                        <option value="{{$dato->id}}">{{$dato->nombre}}</option> 
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>

              </div>

              @if($programas == null || count($programas) == 0)
              <div class="col-md-12" style="padding-top: 15px;">
                <span style="color:red"><b>Nota:</b> el Usuario tiene acceso al módulo pero no tiene ningún Programa de Estudio asignado, por favor comuníquese con el administrador del sistema</span>
              </div>
              @endif
          </div>
      

      </div>


<div class="panel panel-primary" v-if="mostrarPalenIni && programa_id!=0">
  <div class="panel-heading" style="padding-bottom: 15px;">
    <h3 class="panel-title">Gestión de la Resumen del Programa de Estudio de @{{programa}} <a style="float: right; padding: all; color: black;" type="button" class="btn btn-default btn-sm" href="#"  @click.prevent="irAtras()"><i class="fa fa-reply-all" aria-hidden="true"></i> 
      Ir Atrás</a></h3>
    
  </div>

  <div class="panel-body">
    <div class="col-md-12" style="padding-top: 15px;">
      <div class="form-group">
        <button type="button" class="btn btn-primary btn-sm" id="btncrear" style="font-size: 14px;" @click.prevent="nuevo()"><i class="fa fa-edit" aria-hidden="true" ></i> Gestionar el Resumen</button>

        <button type="button" class="btn bg-teal btn-sm" id="btnimages" style="font-size: 14px;" @click.prevent="gestionarImages()"><i class="fa fa-file-text-o"></i> Gestionar Imágenes</a>
      </div>
    </div>
  </div>
</div>



<div class="box box-success" v-if="divNuevo && programa_id!=0">
  <div class="box-header with-border" style="border: 1px solid rgb(0, 166, 90); background-color: rgb(0, 166, 90); color: white;">
    <h3 class="box-title" id="tituloAgregar">Gestión del Resumen
    </h3>
  </div>
  @include('paginassineace.resumen.formulario')  
</div>



<div class="panel panel-primary" v-if="programa_id!=0">
  <div class="panel-heading" style="padding-bottom: 15px;">
    <h3 class="panel-title">Vista del Resumen:</h3>
    
  </div>

    <div class="panel-body">
    <center><h4 style="text-decoration: underline;">@{{fillobject.titulo}}</h4></center>
    <br>


    <div v-html="fillobject.resumen">
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


@include('paginassineace.resumen.detalleimagenes')  