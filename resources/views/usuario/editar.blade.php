<form method="post" v-on:submit.prevent="updateUsuario(filluser.id)">
  <div class="box-body" style="font-size: 14px;">

 

    <div class="col-md-12">

      <div class="form-group">




        <label for="txtdniE" class="col-sm-1 control-label">DNI:*</label>

        <div class="col-sm-2">
          <input type="text" class="form-control" id="txtdniE" name="txtdniE" placeholder="N° de DNI" maxlength="20"
            autofocus v-model="filluser.dni" required
            @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" :disabled="validated == 1"
           >
        </div>

      </div>



    </div>


    <template v-if="1==1">


      <div class="col-md-12">
        <hr style="border-top: 3px solid rgb(208, 211, 51);">
      </div>

      <center>
        <h4>Datos Personales</h4>
      </center>

      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="txtapellidosE" class="col-sm-2 control-label">Apellidos:*</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="txtapellidosE" name="txtapellidosE" placeholder="Apellidos"
              maxlength="500" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="filluser.apellidos">
          </div>

          <label for="txtnombresE" class="col-sm-2 control-label">Nombres:*</label>
          <div class="col-sm-4">
              <input type="text" class="form-control" id="txtnombresE" name="txtnombresE" placeholder="Nombres"
                maxlength="500" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="filluser.nombres">
            </div>
        </div>
      </div>

      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="txtcargoE" class="col-sm-2 control-label">Cargo:*</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="txtcargoE" name="txtcargoE" placeholder="Cargo del Usuario"
              maxlength="500" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="filluser.cargo">
          </div>
        </div>
      </div>




        <div class="col-md-12" style="padding-top: 15px;">
            <div class="form-group">

                <label for="txtdireccionE" class="col-sm-2 control-label">Dirección:</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="txtdireccionE" name="txtdireccionE" placeholder="Av. Jr. Psje."
                    maxlength="500" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="filluser.direccion">
                </div>

                <label for="txttelefonoE" class="col-sm-2 control-label">Teléfono:*</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" id="txttelefonoE" name="txttelefonoE" placeholder="Telef / Cell"
                      maxlength="100" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="filluser.telefono">
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
          <label for="cbutipouser_idE" class="col-sm-2 control-label">Tipo de Usuario:*</label>
          <div class="col-sm-4">
            <select class="form-control" id="cbutipouser_idE" name="cbutipouser_idE" v-model="filluser.tipouser_id" @change="modifTipoUserE">
              <option disabled value="">Seleccione un Tipo de Usuario</option>
              @foreach ($tipousers as $dato)
                <option value="{{$dato->id}}">{{$dato->nombre}}</option> 
              @endforeach
            </select>
          </div>
        </div>
      </div>


      <div class="col-md-12" style="padding-top: 15px;" v-if="filluser.tipouser_id==4 && filluser.tipouser_id!=filluser.tipouser_id_ori">
        <div class="form-group">
          <label for="cbufacultad_idE" class="col-sm-2 control-label">Facultad Asignada:*</label>
          <div class="col-sm-4">
            <select class="form-control" id="cbufacultad_idE" name="cbufacultad_idE" v-model="filluser.facultad_id" >
              <option disabled value="0">Seleccione un Facultad</option>
              @foreach ($facultads as $dato)
                <option value="{{$dato->id}}">{{$dato->nombre}}</option> 
              @endforeach
            </select>
          </div>
        </div>
      </div>

      <div class="col-md-12" style="padding-top: 15px;" v-if="filluser.tipouser_id==5 && filluser.tipouser_id!=filluser.tipouser_id_ori">
        <div class="form-group">
          <label for="cbuprogramaestudio_idE" class="col-sm-2 control-label">Programa de Estudio Asignado:*</label>
          <div class="col-sm-4">
            <select class="form-control" id="cbuprogramaestudio_idE" name="cbuprogramaestudio_idE" v-model="filluser.programaestudio_id" >
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

          <label for="txtemailE" class="col-sm-2 control-label">Email:</label>
          <div class="col-sm-4">
            <input type="email" class="form-control" id="txtemailE" name="txtemailE" placeholder="example@domain.com"
              maxlength="500" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="filluser.email">
          </div>

            

        </div>
      </div>


      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="txtnameE" class="col-sm-2 control-label">Username:*</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="txtnameE" name="txtnameE" placeholder="Username" maxlength="500"
              @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="filluser.name">
          </div>
        </div>
      </div>


      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="cbumodifpassword" class="col-sm-2 control-label">¿Modificar Password?:*</label>
          <div class="col-sm-4">
            <select class="form-control" id="cbumodifpassword" name="cbumodifpassword" v-model="filluser.modifpassword" @change="modifclave">
              <option value="0">No</option>
              <option value="1">Si</option>
            </select>
          </div>
        </div>
      </div>
      

      <div class="col-md-12" style="padding-top: 15px;" v-if="parseInt(filluser.modifpassword)==2">
        <div class="form-group">
          <label for="txtpasswordE" class="col-sm-2 control-label">Password:*</label>
          <div class="col-sm-4">
            <input type="password" class="form-control" id="txtpasswordE" name="txtpasswordE" placeholder="********"
              maxlength="500" v-model="filluser.password">
          </div>
        </div>
      </div>

      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="cbuactivoE" class="col-sm-2 control-label">Estado:*</label>
          <div class="col-sm-4">
            <select class="form-control" id="cbuactivoE" name="cbuactivoE" v-model="filluser.activo">
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
    <button type="submit" class="btn btn-primary" id="btnSaveE"><i class="fa fa-floppy-o" aria-hidden="true"></i>
      Modificar</button>

    <button type="button" class="btn btn-default" id="btnCloseE" @click.prevent="cerrarFormUsuarioE()">Cancelar</button>

    <div class="sk-circle" v-show="divloaderEdit">
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