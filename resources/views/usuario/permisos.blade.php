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

         <div class="col-md-12" style="padding-top: 15px;">
            <div class="form-group">
              <button v-if="filluser.tipouser_id == '3'" type="button" class="btn btn-primary btn-sm" id="btnNuevoRegistro" style="font-size: 14px;" @click.prevent="nuevaCredencial0()"><i class="fa fa-plus-circle" aria-hidden="true" ></i> Nuevo Registro Portal UNASAM</button>
              <button v-if="filluser.tipouser_id == '3' || filluser.tipouser_id == '4'" type="button" class="btn btn-primary btn-sm" id="btnNuevoRegistro" style="font-size: 14px;" @click.prevent="nuevaCredencial1()"><i class="fa fa-plus-circle" aria-hidden="true" ></i> Nuevo Registro Facultades</button>
              <button v-if="filluser.tipouser_id == '3' || filluser.tipouser_id == '4' || filluser.tipouser_id == '5'" type="button" class="btn btn-primary btn-sm" id="btnNuevoRegistro" style="font-size: 14px;" @click.prevent="nuevaCredencial2()"><i class="fa fa-plus-circle" aria-hidden="true" ></i> Nuevo Registro Programas de Estudio</button>
            </div>
          </div> 


          <div class="col-md-12" v-if="formularioCredenciales0 || formularioCredenciales1 || formularioCredenciales2">
            <hr style="border-top: 3px solid #1b5f43;">
          </div>

          

        <div class="col-md-12" style="padding-top: 15px;" v-if="formularioCredenciales0">
            <form v-on:submit.prevent="ActualizarCredenciales0">

              <h5><center><b>Registro de Credenciales Portal Web UNASAM</b></center></h5>

                    <div class="col-md-12" style="padding-top: 15px;">
                        <div class="form-group">
                          <label for="cbumodulo0" class="col-sm-2 control-label">Módulo:*</label>
                          <div class="col-sm-6">
                            <select class="form-control" id="cbumodulo0" name="cbumodulo0" v-model="idmodulo0"  @change="cambioModulo0">
                              <option value="0">Acceso a Todos los Módulos</option>
                              @foreach ($modulos as $dato)
                                <option value="{{$dato->id}}" v-if="0=={{$dato->nivel}}">{{$dato->modulo}}</option> 
                              @endforeach
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12" style="padding-top: 15px;" v-if="parseInt(idmodulo0)>0">
                          <div class="form-group">
                            <label for="cbusubmodulo" class="col-sm-2 control-label">Submódulo:*</label>
                            <div class="col-sm-6">
                              <select class="form-control" id="cbusubmodulo" name="cbusubmodulo" v-model="idsubmodulo0" >
                                <option value="0">Acceso a Todos los Submódulos del Módulo seleccionado</option>
                                @foreach ($submodulos as $dato)
                              <option value="{{$dato->id}}" v-if="parseInt(idmodulo0)=={{$dato->modulo_id}}">{{$dato->submodulo}}</option> 
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>

                      <div class="col-md-12" style="padding-top: 15px;">
                          <button type="submit" class="btn btn-info" id="btnGuardarCred0"><span
                            class="fa fa-floppy-o"></span> Guardar</button>
                      
                        <button type="reset" class="btn btn-warning" id="btnCancelCred0" @click="cancelFormCred0()"><span class="fa fa-rotate-left"></span> Cancelar</button>
                      
                          <button type="button" class="btn btn-danger" id="btnCloseCred0" @click.prevent="cerrarFormCred0()"><span
                              class="fa fa-power-off"></span> Cerrar</button>
                      
                          <div class="sk-circle" v-show="divloaderCredencial0">
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
          </div>
















          <div class="col-md-12" style="padding-top: 15px;" v-if="formularioCredenciales1">
            <form v-on:submit.prevent="ActualizarCredenciales1">

              <h5><center><b>Registro de Credenciales Facultades UNASAM</b></center></h5>


              <div class="col-md-12" style="padding-top: 15px;">
                <div class="form-group">
                  <label for="cbufacultad_id1" class="col-sm-2 control-label">Facultad:*</label>
                  <div class="col-sm-6">
                    <select class="form-control" id="cbufacultad_id1" name="cbufacultad_id1" v-model="facultad_id1" >
                      <option disabled value="0">Seleccione un Facultad</option>
                      @foreach ($facultads as $dato)
                        <option value="{{$dato->id}}">{{$dato->nombre}}</option> 
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>

                    <div class="col-md-12" style="padding-top: 15px;">
                        <div class="form-group">
                          <label for="cbumodulo1" class="col-sm-2 control-label">Módulo:*</label>
                          <div class="col-sm-6">
                            <select class="form-control" id="cbumodulo1" name="cbumodulo1" v-model="idmodulo1"  @change="cambioModulo1">
                              <option value="0">Acceso a Todos los Módulos</option>
                              @foreach ($modulos as $dato)
                                <option value="{{$dato->id}}" v-if="1=={{$dato->nivel}}">{{$dato->modulo}}</option> 
                              @endforeach
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12" style="padding-top: 15px;" v-if="parseInt(idmodulo1)>0">
                          <div class="form-group">
                            <label for="cbusubmodulo1" class="col-sm-2 control-label">Submódulo:*</label>
                            <div class="col-sm-6">
                              <select class="form-control" id="cbusubmodulo1" name="cbusubmodulo1" v-model="idsubmodulo1" >
                                <option value="0">Acceso a Todos los Submódulos del Módulo seleccionado</option>
                                @foreach ($submodulos as $dato)
                              <option value="{{$dato->id}}" v-if="parseInt(idmodulo1)=={{$dato->modulo_id}}">{{$dato->submodulo}}</option> 
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>

                      <div class="col-md-12" style="padding-top: 15px;">
                          <button type="submit" class="btn btn-info" id="btnGuardarCred1"><span
                            class="fa fa-floppy-o"></span> Guardar</button>
                      
                        <button type="reset" class="btn btn-warning" id="btnCancelCred1" @click="cancelFormCred1()"><span class="fa fa-rotate-left"></span> Cancelar</button>
                      
                          <button type="button" class="btn btn-danger" id="btnCloseCred1" @click.prevent="cerrarFormCred1()"><span
                              class="fa fa-power-off"></span> Cerrar</button>
                      
                          <div class="sk-circle" v-show="divloaderCredencial1">
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
          </div>









          <div class="col-md-12" style="padding-top: 15px;" v-if="formularioCredenciales2">
            <form v-on:submit.prevent="ActualizarCredenciales2">

              <h5><center><b>Registro de Credenciales Programas de Estudio UNASAM</b></center></h5>


              <div class="col-md-12" style="padding-top: 15px;">
                <div class="form-group">
                  <label for="cbuprogramaestudio_id2" class="col-sm-2 control-label">Programa de Estudio:*</label>
                  <div class="col-sm-6">
                    <select class="form-control" id="cbuprogramaestudio_id2" name="cbuprogramaestudio_id2" v-model="programaestudio_id2" >
                      <option disabled value="0">Seleccione un Programa de Estudio</option>
                      @foreach ($programaestudios as $dato)
                        <option value="{{$dato->id}}">{{$dato->nombre}}</option> 
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>

                    <div class="col-md-12" style="padding-top: 15px;">
                        <div class="form-group">
                          <label for="cbumodulo2" class="col-sm-2 control-label">Módulo:*</label>
                          <div class="col-sm-6">
                            <select class="form-control" id="cbumodulo2" name="cbumodulo2" v-model="idmodulo2"  @change="cambioModulo2">
                              <option value="0">Acceso a Todos los Módulos</option>
                              @foreach ($modulos as $dato)
                                <option value="{{$dato->id}}" v-if="2=={{$dato->nivel}}">{{$dato->modulo}}</option> 
                              @endforeach
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12" style="padding-top: 15px;" v-if="parseInt(idmodulo2)>0">
                          <div class="form-group">
                            <label for="cbusubmodulo2" class="col-sm-2 control-label">Submódulo:*</label>
                            <div class="col-sm-6">
                              <select class="form-control" id="cbusubmodulo2" name="cbusubmodulo2" v-model="idsubmodulo2" >
                                <option value="0">Acceso a Todos los Submódulos del Módulo seleccionado</option>
                                @foreach ($submodulos as $dato)
                              <option value="{{$dato->id}}" v-if="parseInt(idmodulo2)=={{$dato->modulo_id}}">{{$dato->submodulo}}</option> 
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>

                      <div class="col-md-12" style="padding-top: 15px;">
                          <button type="submit" class="btn btn-info" id="btnGuardarCred2"><span
                            class="fa fa-floppy-o"></span> Guardar</button>
                      
                        <button type="reset" class="btn btn-warning" id="btnCancelCred2" @click="cancelFormCred2()"><span class="fa fa-rotate-left"></span> Cancelar</button>
                      
                          <button type="button" class="btn btn-danger" id="btnCloseCred2" @click.prevent="cerrarFormCred2()"><span
                              class="fa fa-power-off"></span> Cerrar</button>
                      
                          <div class="sk-circle" v-show="divloaderCredencial2">
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
          </div>





            

          <div class="col-md-12">
              <hr style="border-top: 3px solid #1b5f43;">
            </div>
            
            
            
          <div class="col-md-12" style="padding-top: 15px;" v-if="filluser.tipouser_id == '3'">
            
            <h4>Listado de Credenciales Portal Web UNASAM</h4>
            <div class="box-body table-responsive">
                <table class="table table-hover table-bordered" >
                  <tbody><tr>   
                    <th style="padding: 5px; width: 40%;">Módulo</th>
                    <th style="padding: 5px; width: 45%;">Submódulos</th>
                    <th style="padding: 5px; width: 15%;">Gestión</th>
                  </tr>
                  <template v-for="(permisoPortalWeb, index) in filluser.permisos1">

                      <template v-if="parseInt(permisoPortalWeb.roles)==1">

                        <tr>
                          <td style="font-size: 11px; padding: 5px;"> <b>Acceso a Todos los Módulos</b></td>
                          <td style="font-size: 11px; padding: 5px;"> - Acceso a Todos los Submódulos
                            </td>

                            <td style="font-size: 11px; padding: 5px;">
                                <center>  <a href="#" class="btn btn-danger btn-sm" v-on:click.prevent="borrarPermiso(permisoPortalWeb)" data-placement="top" data-toggle="tooltip" title="Borrar Acceso General"><i class="fa fa-trash"></i></a>
                            </center>
                           </td>
                          </tr>
                        </template>

                        <template v-if="parseInt(permisoPortalWeb.roles)==0">
                            <template v-for="(rolModulo, index) in filluser.rolmodulos" v-if="parseInt(rolModulo.nivel)==0">
                                <tr>
                                <td style="font-size: 11px; padding: 5px;"> <b>Módulo: @{{rolModulo.modulo}}</b></td>
                                <td style="font-size: 11px; padding: 5px;">  
                                  <template v-if="parseInt(rolmodulos.rolessub) == 0">
                                    - Acceso a Todos los Submódulos
                                  </template>
                                  <template v-else>
                                      - Acceso a los siguientes Submódulos:<br>
                                      <table class="table table-hover table-bordered">
                                        <tr>
                                          <th style="padding: 5px; width: 70%;">Submódulos</th>
                                          <th style="padding: 5px; width: 30%;">Gestión</th>
                                        </tr>
                                        <tr v-for="(rolSubmodulo, index) in filluser.rolsubmodulos" v-if="rolModulo.modulo_id == rolSubmodulo.modulo_id">
                                          <td>
                                            @{{rolSubmodulo.submodulo}}
                                          </td>
                                          <td>
                                            <center>
                                              <a href="#" class="btn btn-danger btn-sm" v-on:click.prevent="borrarSubmodulo(rolSubmodulo)" data-placement="top" data-toggle="tooltip" title="Borrar Acceso al Submódulo"><i class="fa fa-trash"></i></a>
                                            </center>
                                          </td>
                                        </tr>
                                      </table>
                                  </template>
                                </td>
                                <td style="font-size: 11px; padding: 5px;">
                                  <center> 
                                    <a href="#" class="btn btn-danger btn-sm" v-on:click.prevent="borrarModulo(rolModulo)" data-placement="top" data-toggle="tooltip" title="Borrar Acceso al Módulo"><i class="fa fa-trash"></i></a>
                                  </center>
                                  </td>
                                </tr>
                            </template>
                          </template>
                  </template>
              
                </tbody></table>
              
              </div>
          </div>













          <div class="col-md-12" style="padding-top: 15px;" v-if="filluser.tipouser_id == '3' || filluser.tipouser_id == '4'">
            
            <h4>Listado de Credenciales Facultades UNASAM</h4>
            <div class="box-body table-responsive">
                <table class="table table-hover table-bordered" >
                  <tbody><tr>  
                    <th style="padding: 5px; width: 30%;">Facultad</th> 
                    <th style="padding: 5px; width: 30%;">Módulo</th>
                    <th style="padding: 5px; width: 30%;">Submódulos</th>
                    <th style="padding: 5px; width: 10%;">Gestión</th>
                  </tr>
                  <template v-for="(permisoFacultad, index) in filluser.permisos2">

                      <template v-if="parseInt(permisoFacultad.roles)==1">

                        <tr>
                          <td style="font-size: 11px; padding: 5px;"> @{{permisoFacultad.facultad}}</td>
                          <td style="font-size: 11px; padding: 5px;"> <b>Acceso a Todos los Módulos</b></td>
                          <td style="font-size: 11px; padding: 5px;"> - Acceso a Todos los Submódulos
                            </td>

                            <td style="font-size: 11px; padding: 5px;">
                                <center>  <a href="#" class="btn btn-danger btn-sm" v-on:click.prevent="borrarPermiso(permisoFacultad)" data-placement="top" data-toggle="tooltip" title="Borrar Acceso General de Facultad"><i class="fa fa-trash"></i></a>
                            </center>
                           </td>
                          </tr>
                        </template>

                        <template v-if="parseInt(permisoFacultad.roles)==0">
                            <template v-for="(rolModulo, index) in filluser.rolmodulos" v-if="parseInt(rolModulo.nivel) == 1 && parseInt(rolModulo.facultad_id) == parseInt(permisoFacultad.facultad_id)">
                                <tr>
                                <td style="font-size: 11px; padding: 5px;"> @{{permisoFacultad.facultad}}</td>
                                <td style="font-size: 11px; padding: 5px;"> <b>Módulo: @{{rolModulo.modulo}}</b></td>
                                <td style="font-size: 11px; padding: 5px;">  
                                  <template v-if="parseInt(rolmodulos.rolessub) == 0">
                                    - Acceso a Todos los Submódulos
                                  </template>
                                  <template v-else>
                                      - Acceso a los siguientes Submódulos:<br>
                                      <table class="table table-hover table-bordered">
                                        <tr>
                                          <th style="padding: 5px; width: 70%;">Submódulos</th>
                                          <th style="padding: 5px; width: 30%;">Gestión</th>
                                        </tr>
                                        <tr v-for="(rolSubmodulo, index) in filluser.rolsubmodulos" v-if="rolModulo.modulo_id == rolSubmodulo.modulo_id && parseInt(rolModulo.facultad_id) == parseInt(permisoFacultad.facultad_id)">
                                          <td>
                                            @{{rolSubmodulo.submodulo}}
                                          </td>
                                          <td>
                                            <center>
                                              <a href="#" class="btn btn-danger btn-sm" v-on:click.prevent="borrarSubmodulo(rolSubmodulo)" data-placement="top" data-toggle="tooltip" title="Borrar Acceso al Submódulo"><i class="fa fa-trash"></i></a>
                                            </center>
                                          </td>
                                        </tr>
                                      </table>
                                  </template>
                                </td>
                                <td style="font-size: 11px; padding: 5px;">
                                  <center> 
                                    <a href="#" class="btn btn-danger btn-sm" v-on:click.prevent="borrarModulo(rolModulo)" data-placement="top" data-toggle="tooltip" title="Borrar Acceso al Módulo"><i class="fa fa-trash"></i></a>
                                  </center>
                                  </td>
                                </tr>
                            </template>
                          </template>
                  </template>
              
                </tbody></table>
              
              </div>
          </div>







          


          <div class="col-md-12" style="padding-top: 15px;" v-if="filluser.tipouser_id == '3' || filluser.tipouser_id == '4' || filluser.tipouser_id == '5'">
            
            <h4>Listado de Credenciales programas de Estudio UNASAM</h4>
            <div class="box-body table-responsive">
                <table class="table table-hover table-bordered" >
                  <tbody><tr>  
                    <th style="padding: 5px; width: 30%;">Programa de Estudio</th> 
                    <th style="padding: 5px; width: 30%;">Módulo</th>
                    <th style="padding: 5px; width: 30%;">Submódulos</th>
                    <th style="padding: 5px; width: 10%;">Gestión</th>
                  </tr>
                  <template v-for="(permisoProgramaEstudio, index) in filluser.permisos3">

                      <template v-if="parseInt(permisoProgramaEstudio.roles)==1">

                        <tr>
                          <td style="font-size: 11px; padding: 5px;"> @{{permisoProgramaEstudio.programa}}</td>
                          <td style="font-size: 11px; padding: 5px;"> <b>Acceso a Todos los Módulos</b></td>
                          <td style="font-size: 11px; padding: 5px;"> - Acceso a Todos los Submódulos
                            </td>

                            <td style="font-size: 11px; padding: 5px;">
                                <center>  <a href="#" class="btn btn-danger btn-sm" v-on:click.prevent="borrarPermiso(permisoProgramaEstudio)" data-placement="top" data-toggle="tooltip" title="Borrar Acceso General de Programa de Estudio"><i class="fa fa-trash"></i></a>
                            </center>
                           </td>
                          </tr>
                        </template>

                        <template v-if="parseInt(permisoProgramaEstudio.roles)==0">
                            <template v-for="(rolModulo, index) in filluser.rolmodulos" v-if="parseInt(rolModulo.nivel) == 1 && parseInt(rolModulo.programaestudio_id) == parseInt(permisoProgramaEstudio.programaestudio_id)">
                                <tr>
                                <td style="font-size: 11px; padding: 5px;"> @{{permisoProgramaEstudio.programa}}</td>
                                <td style="font-size: 11px; padding: 5px;"> <b>Módulo: @{{rolModulo.modulo}}</b></td>
                                <td style="font-size: 11px; padding: 5px;">  
                                  <template v-if="parseInt(rolmodulos.rolessub) == 0">
                                    - Acceso a Todos los Submódulos
                                  </template>
                                  <template v-else>
                                      - Acceso a los siguientes Submódulos:<br>
                                      <table class="table table-hover table-bordered">
                                        <tr>
                                          <th style="padding: 5px; width: 70%;">Submódulos</th>
                                          <th style="padding: 5px; width: 30%;">Gestión</th>
                                        </tr>
                                        <tr v-for="(rolSubmodulo, index) in filluser.rolsubmodulos" v-if="rolModulo.modulo_id == rolSubmodulo.modulo_id && parseInt(rolModulo.programaestudio_id) == parseInt(permisoProgramaEstudio.programaestudio_id)">
                                          <td>
                                            @{{rolSubmodulo.submodulo}}
                                          </td>
                                          <td>
                                            <center>
                                              <a href="#" class="btn btn-danger btn-sm" v-on:click.prevent="borrarSubmodulo(rolSubmodulo)" data-placement="top" data-toggle="tooltip" title="Borrar Acceso al Submódulo"><i class="fa fa-trash"></i></a>
                                            </center>
                                          </td>
                                        </tr>
                                      </table>
                                  </template>
                                </td>
                                <td style="font-size: 11px; padding: 5px;">
                                  <center> 
                                    <a href="#" class="btn btn-danger btn-sm" v-on:click.prevent="borrarModulo(rolModulo)" data-placement="top" data-toggle="tooltip" title="Borrar Acceso al Módulo"><i class="fa fa-trash"></i></a>
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


    
  
    </div>
  
    <!-- /.box-body -->
    <div class="box-footer">

    </div>
    <!-- /.box-footer -->
  
  </form>