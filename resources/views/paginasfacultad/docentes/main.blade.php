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
    <h3 class="panel-title">Gestión de Docentes de la @{{facultad}} <a style="float: right; padding: all; color: black;" type="button" class="btn btn-default btn-sm" href="#"  @click.prevent="irAtras()"><i class="fa fa-reply-all" aria-hidden="true"></i> 
      Ir Atrás</a></h3>
    
  </div>

  <div class="panel-body">
    <div class="col-md-12" style="padding-top: 15px;">
      <div class="form-group">
        <button type="button" class="btn btn-primary btn-sm" id="btncrear" style="font-size: 14px;" @click.prevent="nuevo()"><i class="fa fa-plus-circle" aria-hidden="true" ></i> Nuevo Docente</button>
      </div>
    </div>
  </div>
</div>



<div class="box box-success" v-if="divNuevo && facultad_id!=0">
  <div class="box-header with-border" style="border: 1px solid rgb(0, 166, 90); background-color: rgb(0, 166, 90); color: white;">
    <h3 class="box-title" id="tituloAgregar">Nuevo Docente
    </h3>
  </div>
  @include('paginasfacultad.docentes.formulario')  
</div>


<div class="box box-warning" v-if="divEdit && facultad_id!=0">
  <div class="box-header with-border" style="border: 1px solid #f39c12; background-color: #f39c12; color: white;">
    <h3 class="box-title" id="tituloAgregar">Editar Docente: @{{ fillobject.nombre }}


    </h3>
  </div>

  @include('paginasfacultad.docentes.editar')  

</div>

<div class="panel panel-primary" v-if="facultad_id!=0">
  <div class="panel-heading" style="padding-bottom: 20px;">
    <h3 class="panel-title">Listado de Docentes de la @{{facultad}} 

      <div class="box-tools" style="float: right;">
        <div class="input-group input-group-sm" style="width: 300px;">
          <input type="text" name="table_search" class="form-control pull-right" placeholder="Buscar" v-model="buscar" @keyup.enter="buscarBtn()">
  
          <div class="input-group-btn">
            <button type="submit" class="btn btn-default" @click.prevent="buscarBtn()"><i class="fa fa-search"></i></button>
          </div>
  
  
        </div>
      </div>
    </h3>

    
    
  </div>

  <!-- /.box-header -->
  <div class="box-body table-responsive">
    <table class="table table-hover table-bordered" >
      <tbody><tr>
        <th style="border:1px solid #ddd; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 12px; padding: 3px; width: 3%;">#</th>
        <th style="border:1px solid #ddd; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 12px; padding: 3px; width: 8%;">Departamento Académico</th>
        <th style="border:1px solid #ddd; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 12px; padding: 3px; width: 8%;">Nombre</th>
        <th style="border:1px solid #ddd; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 12px; padding: 3px; width: 7%;">Datos de Contacto</th>
        <th style="border:1px solid #ddd; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 12px; padding: 3px; width: 6%;">Categoría</th>
        <th style="border:1px solid #ddd; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 12px; padding: 3px; width: 6%;">Regimen</th>
        <th style="border:1px solid #ddd; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 12px; padding: 3px; width: 6%;">Condición</th>
        <th style="border:1px solid #ddd; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 12px; padding: 3px; width: 5%;">Fecha de Ingreso</th>
        <th style="border:1px solid #ddd; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 12px; padding: 3px; width: 6%;">Imagen</th>
        <th style="border:1px solid #ddd; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 12px; padding: 3px; width: 8%;">Descripción de Grados Académicos</th>
        <th style="border:1px solid #ddd; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 12px; padding: 3px; width: 8%;">Experiencia Personal</th>
        <th style="border:1px solid #ddd; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 12px; padding: 3px; width: 8%;">Publicaciones</th>
        <th style="border:1px solid #ddd; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 12px; padding: 3px; width: 8%;">Investigaciones</th>
        <th style="border:1px solid #ddd; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 12px; padding: 3px; width: 4%;">Estado</th>
        <th style="border:1px solid #ddd; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 12px; padding: 3px; width: 9%;">Gestión</th>
      </tr>
      <tr v-for="docente, key in docentes">
        <td style="border:1px solid #ddd;font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 11px; padding: 3px;">@{{key+pagination.from}}</td>
        <td style="border:1px solid #ddd;font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 11px; padding: 3px;">@{{ docente.departamento }}</td>
        <td style="border:1px solid #ddd;font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 11px; padding: 3px;">@{{ docente.nombre }}</td>

        <td style="border:1px solid #ddd;font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 11px; padding: 3px;">

          <template v-if="docente.tipo_documento != null && docente.tipo_documento == '1'">
            <b>DNI: </b> @{{ docente.documento }} <br>
          </template>
          <template v-if="docente.tipo_documento != null && docente.tipo_documento == '2'">
            <b>RUC: </b> @{{ docente.documento }} <br>
          </template>
          <template v-if="docente.tipo_documento != null && docente.tipo_documento == '3'">
            <b>Carnet de Extranjería: </b> @{{ docente.documento }} <br>
          </template>
          <template v-if="docente.tipo_documento != null && docente.tipo_documento == '4'">
            <b>Pasaporte: </b> @{{ docente.documento }} <br>
          </template>
          <template v-if="docente.tipo_documento != null && docente.tipo_documento == '5'">
            <b>Partida de Nacimiento: </b> @{{ docente.documento }} <br>
          </template>

          <template v-if="docente.especialidad != null && docente.especialidad.length > 0">
            <b>Especialidad: </b> @{{ docente.especialidad }}<br>
          </template>

          <template v-if="docente.telefono != null && docente.telefono.length > 0">
            <b>Teléfono: </b> @{{ docente.telefono }}<br>
          </template>
          <template v-if="docente.email != null && docente.email.length > 0">
            <b>Correo: </b> @{{ docente.email }}
          </template>
        </td>

        <td style="border:1px solid #ddd;font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 11px; padding: 3px;">@{{ docente.categoria }}</td>
        <td style="border:1px solid #ddd;font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 11px; padding: 3px;">@{{ docente.regimen }}</td>
        <td style="border:1px solid #ddd;font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 11px; padding: 3px;">@{{ docente.condicion }}</td>
        <td style="border:1px solid #ddd;font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 11px; padding: 3px;">@{{ docente.fecha | pasfechaVista }}</td>

        <td style="border:1px solid #ddd;font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 11px; padding: 3px;">
          <center v-if="docente.tieneimagen == 1 && docente.urlimagen != null && docente.urlimagen.length > 0">
            <img v-bind:src="'{{ asset('/web/docentefacultad/')}}'+'/'+docente.urlimagen" style="max-width: 100px; max-height: 100px;border: solid 1px black;" class="img-responsive" alt="Imagen del Dicente" id="imgDocente">
          </center>
      </td>

        <td style="border:1px solid #ddd;font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 11px; padding: 3px;" v-html="docente.grados"></td>
        <td style="border:1px solid #ddd;font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 11px; padding: 3px;" v-html="docente.experiencia"></td>
        <td style="border:1px solid #ddd;font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 11px; padding: 3px;" v-html="docente.publicaciones"></td>
        <td style="border:1px solid #ddd;font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 11px; padding: 3px;" v-html="docente.investigaciones"></td>
        
        <td style="border:1px solid #ddd;font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 11px; padding: 3px; text-align: center;">
         <span class="label label-success" v-if="docente.activo=='1'">Activo</span>
         <span class="label label-warning" v-if="docente.activo=='0'">Inactivo</span>
       </td>
       <td style="border:1px solid #ddd; font-size: 11px; padding: 3px;">

        <center>

        <a href="#" v-if="docente.activo=='1'" class="btn bg-navy btn-sm" v-on:click.prevent="baja(docente)" data-placement="top" data-toggle="tooltip" title="Desactivar Docente"><i class="fa fa-arrow-circle-down"></i></a>
        <a href="#" v-if="docente.activo=='0'" class="btn btn-success btn-sm" v-on:click.prevent="alta(docente)" data-placement="top" data-toggle="tooltip" title="Activar Docente"><i class="fa fa-check-circle"></i></a>


        <a href="#" class="btn btn-warning btn-sm" v-on:click.prevent="edit(docente)" data-placement="top" data-toggle="tooltip" title="Editar Docente"><i class="fa fa-edit"></i></a>
        <a href="#" class="btn btn-danger btn-sm" v-on:click.prevent="borrar(docente)" data-placement="top" data-toggle="tooltip" title="Borrar Docente"><i class="fa fa-trash"></i></a>

      </center>
      </td>
    </tr>

  </tbody></table>

</div>
<!-- /.box-body -->
<div style="padding: 15px;">
 <div><h5>Registros por Página: @{{ pagination.per_page }}</h5></div>
 <nav aria-label="Page navigation example">
   <ul class="pagination">
    <li class="page-item" v-if="pagination.current_page>1">
     <a class="page-link" href="#" @click.prevent="changePage(1)">
      <span><b>Inicio</b></span>
    </a>
  </li>

  <li class="page-item" v-if="pagination.current_page>1">
   <a class="page-link" href="#" @click.prevent="changePage(pagination.current_page-1)">
    <span>Atras</span>
  </a>
</li>
<li class="page-item" v-for="page in pagesNumber" v-bind:class="[page=== isActived ? 'active' : '']">
 <a class="page-link" href="#" @click.prevent="changePage(page)">
  <span>@{{ page }}</span>
</a>
</li>
<li class="page-item" v-if="pagination.current_page< pagination.last_page">
 <a class="page-link" href="#" @click.prevent="changePage(pagination.current_page+1)">
  <span>Siguiente</span>
</a>
</li>
<li class="page-item" v-if="pagination.current_page< pagination.last_page">
 <a class="page-link" href="#" @click.prevent="changePage(pagination.last_page)">
  <span><b>Ultima</b></span>
</a>
</li>
</ul>
</nav>
<div><h5>Registros Totales: @{{ pagination.total }}</h5></div>
</div>
</div>