<form v-on:submit.prevent="createUsuario">
    <div class="box-body" style="font-size: 14px;">
  
      <div class="col-md-12">
        <div class="form-group">
          <label for="nombre" class="col-sm-2 control-label">Usuario:</label>
          <label for="nombre" class="col-sm-4 control-label" style="font-weight: normal;">@{{filluser.name}}</label>

          <label for="nombre" class="col-sm-2 control-label">Tipo de usuario:</label>
          <label for="nombre" class="col-sm-4 control-label" style="font-weight: normal;">@{{filluser.tipouser}}</label>
        </div>
      </div>

      <div class="col-md-12">
        <div class="form-group">
          <label for="nombre" class="col-sm-2 control-label">Apellidos y Nombres:</label>
          <label for="nombre" class="col-sm-4 control-label" style="font-weight: normal;">@{{filluser.apellidos}} @{{filluser.nombres}}</label>

          <label for="nombre" class="col-sm-2 control-label">DNI:</label>
          <label for="nombre" class="col-sm-4 control-label" style="font-weight: normal;">@{{filluser.dni}}</label>
        </div>
      </div>

      <div class="col-md-12">
        <div class="form-group">
          <label for="nombre" class="col-sm-2 control-label">Cargo:</label>
          <label for="nombre" class="col-sm-10 control-label" style="font-weight: normal;">@{{filluser.cargo}}</label>
        </div>
      </div>

      <br>
      <br>


      <template v-if="filluser.tipouser_id == '1'">
        <div class="col-md-12" style="padding-top: 15px;">
          <div class="form-group">
            <label for="nombre" class="col-sm-2 control-label">Nivel de Acceso:</label>
                <h3>Acceso Total</h3>
          </div>
        </div>
      </template>

      <template v-if="filluser.tipouser_id == '2'">
        <div class="col-md-12" style="padding-top: 15px;">
          <div class="form-group">
            <label for="nombre" class="col-sm-2 control-label">Nivel de Acceso:</label>

            <div class="col-sm-10">
                <ul>
                    <li>Todos los Módulos Administrables del Portal Web UNASAM</li>
                    <li>Todos los Módulos Administrables de los Portales Web Facultades</li>
                    <li>Todos los Módulos Administrables de los Portales Web Escuelas</li>
                </ul>
            </div>
          </div>
        </div>
      </template>

      <template v-if="filluser.tipouser_id >= '3'">
        <div class="col-md-12" style="padding-top: 15px;">
          <div class="form-group">
            <label for="nombre" class="col-sm-2 control-label">Nivel de Acceso:</label>

            <div class="col-sm-10">
                <ul>
                    <li v-if="filluser.tipouser_id == '3'">Módulos Administrables del Portal Web UNASAM</li>
                    <li v-if="filluser.tipouser_id == '4'">Módulos Administrables de los Portales Web Facultades</li>
                    <li v-if="filluser.tipouser_id >= '4'">Módulos Administrables de los Portales Web Escuelas</li>
                </ul>
            </div>
          </div>
        </div>

       {{--  <div class="col-md-12" style="padding-top: 15px;">
            <div class="form-group">
              <button type="button" class="btn btn-primary btn-sm" id="btnNuevoRegistro" style="font-size: 14px;" @click.prevent="nuevaCredencial()"><i class="fa fa-plus-circle" aria-hidden="true" ></i> Nuevo Registro</button>
            </div>
          </div> --}}

 {{--        <div class="col-md-12" style="padding-top: 15px;" v-if="formularioCredenciales">

            
            <form v-on:submit.prevent="ActualizarCredenciales">
            

                    <div class="col-md-12" style="padding-top: 15px;">
                        <div class="form-group">
                          <label for="cbumodulo" class="col-sm-2 control-label">Módulo:*</label>
                          <div class="col-sm-4">
                            <select class="form-control" id="cbumodulo" name="cbumodulo" v-model="idmodulo"  @change="cambioModulo">
                              <option disabled value="0">Seleccione un Módulo</option>
                              @foreach ($modulos as $dato)
                                <option value="{{$dato->id}}">{{$dato->modulo}}</option> 
                              @endforeach
                            </select>
                          </div>
                        </div>
                      </div>


                      <div class="col-md-12" style="padding-top: 15px;" v-if="parseInt(idmodulo)>0">
                          <div class="form-group">
                            <label for="cbusubmodulo" class="col-sm-2 control-label">Submódulo:*</label>
                            <div class="col-sm-4">
                              <select class="form-control" id="cbusubmodulo" name="cbusubmodulo" v-model="idsubmodulo" >
                                <option disabled value="0">Acceso a Todos los Submódulos</option>
                                @foreach ($submodulos as $dato)
                              <option value="{{$dato->id}}" v-if="parseInt(idmodulo)=={{$dato->modulo_id}}">{{$dato->submodulo}}</option> 
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>


                      

                      <div class="col-md-12" style="padding-top: 15px;">
                          <button type="submit" class="btn btn-info" id="btnGuardarCred"><span
                            class="fa fa-floppy-o"></span> Guardar</button>
                      
                        <button type="reset" class="btn btn-warning" id="btnCancelCred" @click="cancelFormCred()"><span class="fa fa-rotate-left"></span> Cancelar</button>
                      
                          <button type="button" class="btn btn-danger" id="btnCloseCred" @click.prevent="cerrarFormCred()"><span
                              class="fa fa-power-off"></span> Cerrar</button>
                      
                          <div class="sk-circle" v-show="divloaderCredencial">
                            <div class="sk-circle1 sk-child"></div>
                            <div class="sk-circle2 sk-child"></div>
                            <div class="sk-circle3 sk-child"></div>
                            <div class="sk-circle4 sk-child"></div>
                            <div class="sk-circle5 sk-child"></div>
                            <div class="sk-circle6 sk-child"></div>
                            <div class="sk-circle7 sk-child"></div>
                            <div class="sk-circle8 sk-child"></div>
                            <div class="sk-circle9 sk-child"></div>
                            <div class="sk-circle10 sk-child"></div>
                            <div class="sk-circle11 sk-child"></div>
                            <div class="sk-circle12 sk-child"></div>
                          </div>
                      
                        </div>

            </form>
            
            
            
          </div> --}}
            

          <div class="col-md-12">
              <hr style="border-top: 3px solid #1b5f43;">
            </div>
            
            
            
          <div class="col-md-12" style="padding-top: 15px;">
            
            <h4>Listado de Credenciales Portal Web UNASAM</h4>
            <div class="box-body table-responsive">
                <table class="table table-hover table-bordered" >
                  <tbody><tr>   
                    <th style="padding: 5px; width: 40%;">Módulo</th>
                    <th style="padding: 5px; width: 45%;">Submódulos</th>
                    <th style="padding: 5px; width: 15%;">Gestión</th>
                  </tr>
                  <template v-for="(perModulo, index) in permisoModulos" v-if="parseInt(perModulo.user_id)==parseInt(filluser.id)">

                      <template v-if="parseInt(perModulo.tipo)==2">

                        <tr>
                          <td style="font-size: 11px; padding: 5px;"> <b>Módulo: @{{perModulo.modulo}}</b></td>
                          <td style="font-size: 11px; padding: 5px;"> - Acceso a Todos los Submódulos
                            </td>

                            <td style="font-size: 11px; padding: 5px;">
                                <center>  <a href="#" class="btn btn-danger btn-sm" v-on:click.prevent="borrarCredencial1(perModulo)" data-placement="top" data-toggle="tooltip" title="Borrar Credencial de Acceso"><i class="fa fa-trash"></i></a>
                            </center>
                           </td>
                          </tr>
                        </template>

                        <template v-if="parseInt(perModulo.tipo)==1">
                            <template v-for="(perSubModulo, index) in permisoSubModulos" v-if="parseInt(perSubModulo.user_id)==parseInt(filluser.id) && parseInt(perSubModulo.modulo_id)==parseInt(perModulo.idmodulo)">
                                <tr>
                                <td style="font-size: 11px; padding: 5px;"> <b>Módulo: @{{perModulo.modulo}}</b></td>
                                <td style="font-size: 11px; padding: 5px;">  - Acceso al Submódulo:  @{{perSubModulo.submodulo}}  </td>
                                <td style="font-size: 11px; padding: 5px;">
<center> 
                                    <a href="#" class="btn btn-danger btn-sm" v-on:click.prevent="borrarCredencial2(perModulo,perSubModulo)" data-placement="top" data-toggle="tooltip" title="Borrar Credencial de Acceso"><i class="fa fa-trash"></i></a>
                                  </center>
                                  </td>
                                </tr>
                            </template>
                          </template>


                  </template>
              
                </tbody></table>
              
              </div>


          </div>
        
          
      </template>


      tem
  
    </div>
  
    <!-- /.box-body -->
    <div class="box-footer">

    </div>
    <!-- /.box-footer -->
  
  </form>