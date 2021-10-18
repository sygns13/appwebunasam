<form v-on:submit.prevent="createUsuario">
  <div class="box-body" style="font-size: 14px;">

    <div class="col-md-12">

      <div class="form-group">


        <label for="txtdni" class="col-sm-1 control-label">DNI:*</label>

        <div class="col-sm-2">
          <input type="text" class="form-control" id="txtdni" name="txtdni" placeholder="N° de DNI" maxlength="20"
            autofocus v-model="dni" @keyup.enter="pressNuevoDNI()" required
            @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" :disabled="validated == 1"
           >
        </div>
        <div class="col-sm-6">
          <a href="#" class="btn btn-success btn-sm" v-on:click.prevent="pressNuevoDNI()"><span
              class="  fa fa-check-square-o"></span> Validar</a>
        </div>
      </div>



    </div>

    <template v-if="formularioCrear">


      <div class="col-md-12">
        <hr style="border-top: 3px solid #1b5f43;">
      </div>

      <center>
        <h4>Datos Personales</h4>
      </center>

      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="txtapellidos" class="col-sm-2 control-label">Apellidos:*</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="txtapellidos" name="txtapellidos" placeholder="Apellidos"
              maxlength="500" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="apellidos">
          </div>

          <label for="txtnombres" class="col-sm-2 control-label">Nombres:*</label>
          <div class="col-sm-4">
              <input type="text" class="form-control" id="txtnombres" name="txtnombres" placeholder="Nombres"
                maxlength="500" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="nombres">
            </div>
        </div>
      </div>

      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="txtcargo" class="col-sm-2 control-label">Cargo:*</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="txtcargo" name="txtcargo" placeholder="Cargo del Usuario"
              maxlength="500" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="cargo">
          </div>
        </div>
      </div>




        <div class="col-md-12" style="padding-top: 15px;">
            <div class="form-group">

                <label for="txtdireccion" class="col-sm-2 control-label">Dirección:</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="txtdireccion" name="txtdireccion" placeholder="Av. Jr. Psje."
                    maxlength="500" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="direccion">
                </div>

                <label for="txttelefono" class="col-sm-2 control-label">Teléfono:</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" id="txttelefono" name="txttelefono" placeholder="Telef / Cell"
                      maxlength="100" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="telefono">
                  </div> 

            </div>
          </div>


      <div class="col-md-12">
        <hr>
      </div>

 
      <center>
        <h4>Datos del Usuario</h4>
      </center>


      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="cbutipouser_id" class="col-sm-2 control-label">Tipo de Usuario:*</label>
          <div class="col-sm-4">
            <select class="form-control" id="cbutipouser_id" name="cbutipouser_id" v-model="tipouser_id" @change="modifTipoUser">
              <option disabled value="0">Seleccione un Tipo de Usuario</option>
              @foreach ($tipousers as $dato)
                <option value="{{$dato->id}}">{{$dato->nombre}}</option> 
              @endforeach
            </select>
          </div>
        </div>
      </div>


      <div class="col-md-12" style="padding-top: 15px;" v-if="tipouser_id==4">
        <div class="form-group">
          <label for="cbuprogramaestudio_id" class="col-sm-2 control-label">Programa de Estudio Asignado:*</label>
          <div class="col-sm-4">
            <select class="form-control" id="cbuprogramaestudio_id" name="cbuprogramaestudio_id" v-model="programaestudio_id" >
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

          <label for="txtemail" class="col-sm-2 control-label">Email:</label>
          <div class="col-sm-4">
            <input type="email" class="form-control" id="txtemail" name="txtemail" placeholder="example@domain.com"
              maxlength="500" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="email">
          </div>

            

        </div>
      </div>


      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="txtname" class="col-sm-2 control-label">Username:*</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="txtname" name="txtname" placeholder="Username" maxlength="500"
              @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="name">
          </div>
        </div>
      </div>

      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="txtpassword" class="col-sm-2 control-label">Password:*</label>
          <div class="col-sm-4">
            <input type="password" class="form-control" id="txtpassword" name="txtpassword" placeholder="********"
              maxlength="500" v-model="password">
          </div>
        </div>
      </div>

      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="cbuactivo" class="col-sm-2 control-label">Estado:*</label>
          <div class="col-sm-4">
            <select class="form-control" id="cbuactivo" name="cbuactivo" v-model="activo">
              <option value="1">Activado</option>
              <option value="0">Desactivado</option>
            </select>
          </div>
        </div>
      </div>

    </template>

  </div>

  <!-- /.box-body -->
  <div class="box-footer">
    <button v-if="formularioCrear" type="submit" class="btn btn-info" id="btnGuardar"><span
      class="fa fa-floppy-o"></span> Guardar</button>

  <button v-if="formularioCrear" type="reset" class="btn btn-warning" id="btnCancel"
    @click="cancelFormUsuario()"><span class="fa fa-rotate-left"></span> Cancelar</button>

    <button type="button" class="btn btn-danger" id="btnClose" @click.prevent="cerrarFormUsuario()"><span
        class="fa fa-power-off"></span> Cerrar</button>

    <div class="sk-circle" v-show="divloaderNuevo">
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
  <!-- /.box-footer -->

</form>