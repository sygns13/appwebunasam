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
    <h3 class="panel-title">Gestión de Departamentos Académicos de la @{{facultad}} <a style="float: right; padding: all; color: black;" type="button" class="btn btn-default btn-sm" href="#"  @click.prevent="irAtras()"><i class="fa fa-reply-all" aria-hidden="true"></i> 
      Ir Atrás</a></h3>
    
  </div>

  <div class="panel-body">
    <div class="col-md-12" style="padding-top: 15px;">
      <div class="form-group">
        <button type="button" class="btn btn-primary btn-sm" id="btncrear" style="font-size: 14px;" @click.prevent="nuevo()"><i class="fa fa-plus-circle" aria-hidden="true" ></i> Nuevo Departamento Académico</button>
      </div>
    </div>
  </div>
</div>



<div class="box box-success" v-if="divNuevo && facultad_id!=0">
  <div class="box-header with-border" style="border: 1px solid rgb(0, 166, 90); background-color: rgb(0, 166, 90); color: white;">
    <h3 class="box-title" id="tituloAgregar">Nuevo Departamento Académico
    </h3>
  </div>
  @include('paginasfacultad.departamentoacademico.formulario')  
</div>


<div class="box box-warning" v-if="divEdit && facultad_id!=0">
  <div class="box-header with-border" style="border: 1px solid #f39c12; background-color: #f39c12; color: white;">
    <h3 class="box-title" id="tituloAgregar">Editar Departamento Académico: @{{ fillobject.nombre }}


    </h3>
  </div>

  @include('paginasfacultad.departamentoacademico.editar')  

</div>

<div class="panel panel-primary" v-if="facultad_id!=0">
  <div class="panel-heading" style="padding-bottom: 20px;">
    <h3 class="panel-title">Listado de Departamentos Académicos de la @{{facultad}} 

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
        <th style="border:1px solid #ddd; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 13px; padding: 5px; width: 4%;">#</th>
        <th style="border:1px solid #ddd; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 13px; padding: 5px; width: 10%;">Nombre</th>
        <th style="border:1px solid #ddd; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 13px; padding: 5px; width: 15%;">Descripción</th>
        <th style="border:1px solid #ddd; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 13px; padding: 5px; width: 10%;">Datos</th>
        <th style="border:1px solid #ddd; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 13px; padding: 5px; width: 10%;">Imagen Principal</th>
        <th style="border:1px solid #ddd; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 13px; padding: 5px; width: 10%;">Jefe del Departamento</th>
        <th style="border:1px solid #ddd; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 13px; padding: 5px; width: 15%;">Descripción del Jefe</th>
        <th style="border:1px solid #ddd; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 13px; padding: 5px; width: 10%;">Imagen del Director</th>
        <th style="border:1px solid #ddd; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 13px; padding: 5px; width: 6%;">Estado</th>
        <th style="border:1px solid #ddd; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 13px; padding: 5px; width: 10%;">Gestión</th>
      </tr>
      <tr v-for="departamento, key in departamentos">
        <td style="border:1px solid #ddd;font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 12px; padding: 5px;">@{{key+pagination.from}}</td>
        <td style="border:1px solid #ddd;font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 12px; padding: 5px;">@{{ departamento.nombre }}</td>
        <td style="border:1px solid #ddd;font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 12px; padding: 5px;" v-html="departamento.descripcion"></td>
        <td style="border:1px solid #ddd;font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 12px; padding: 5px;">
          <template v-if="departamento.direccion != null && departamento.direccion.length > 0">
            <b>Dirección: </b> @{{ departamento.direccion }}<br>
          </template>
          <template v-if="departamento.telefono != null && departamento.telefono.length > 0">
            <b>Teléfono: </b> @{{ departamento.telefono }}<br>
          </template>
          <template v-if="departamento.email != null && departamento.email.length > 0">
            <b>Correo: </b> @{{ departamento.email }}
          </template>
        </td>
        <td style="border:1px solid #ddd;font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 12px; padding: 5px;">
            <center v-if="departamento.tieneimagen == 1 && departamento.url != null && departamento.url.length > 0">
              <img v-bind:src="'{{ asset('/web/departamentofacultad/')}}'+'/'+departamento.url" style="max-height: 200px;border: solid 1px black;" class="img-responsive" alt="Imagen del Departamento Académico" id="imgDepartamento">
            </center>
        </td>
        <td style="border:1px solid #ddd;font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 12px; padding: 5px;">@{{ departamento.director}}<br>@{{ departamento.descripcion_corta_director}}
        </td>
        <td style="border:1px solid #ddd;font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 12px; padding: 5px;" v-html="departamento.descripcion_director"></td>
        <td style="border:1px solid #ddd;font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 12px; padding: 5px;">
          <center v-if="departamento.tieneimagen_director == 1 && departamento.url != null && departamento.url.length > 0">
            <img v-bind:src="'{{ asset('/web/jefedeparfacultad/')}}'+'/'+departamento.url_director" style="max-height: 200px;border: solid 1px black;" class="img-responsive" alt="Imagen del Jefe del Departamento Académico" id="imgJefeDepartamento">
          </center>
        </td>
        <td style="border:1px solid #ddd;font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 12px; padding: 5px; text-align: center;">
         <span class="label label-success" v-if="departamento.activo=='1'">Activo</span>
         <span class="label label-warning" v-if="departamento.activo=='0'">Inactivo</span>
       </td>
       <td style="border:1px solid #ddd; font-size: 11px; padding: 5px;">

        <center>

        <a href="#" v-if="departamento.activo=='1'" class="btn bg-navy btn-sm" v-on:click.prevent="baja(departamento)" data-placement="top" data-toggle="tooltip" title="Desactivar Departamento Académico"><i class="fa fa-arrow-circle-down"></i></a>
        <a href="#" v-if="departamento.activo=='0'" class="btn btn-success btn-sm" v-on:click.prevent="alta(departamento)" data-placement="top" data-toggle="tooltip" title="Activar Departamento Académico"><i class="fa fa-check-circle"></i></a>


        <a href="#" class="btn btn-warning btn-sm" v-on:click.prevent="edit(departamento)" data-placement="top" data-toggle="tooltip" title="Editar Departamento Académico"><i class="fa fa-edit"></i></a>
        <a href="#" class="btn btn-danger btn-sm" v-on:click.prevent="borrar(departamento)" data-placement="top" data-toggle="tooltip" title="Borrar Departamento Académico"><i class="fa fa-trash"></i></a>

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