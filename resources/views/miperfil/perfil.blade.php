<div class="box-body" style="font-size: 14px;">
        
    <center>
      <h4>Datos Personales del Usuario</h4>
    </center>

    <div class="col-md-12" style="padding-top: 15px;">
      <div class="form-group">
        <label for="txtdni" class="col-sm-2 control-label">DNI:*</label>
        <div class="col-sm-2">
          <input type="text" class="form-control" id="txtdni" name="txtdni" placeholder="N° de DNI" maxlength="20"
            autofocus v-model="filluser.dni" 
            onkeypress="return noEscribe(event);" readonly="true" disabled="true">
        </div>
      </div>
    </div>

    <div class="col-md-12" style="padding-top: 15px;">
      <div class="form-group">
        <label for="txtnombre" class="col-sm-2 control-label">Nombres y Apellidos:*</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="txtnombre" name="txtnombre" placeholder="Nombres y Apellidos"
            maxlength="500" 
            v-model="filluser.nombres"  onkeypress="return noEscribe(event);" readonly="true" disabled="true">
        </div>
      </div>
    </div>

    <div class="col-md-12" style="padding-top: 15px;">
      <div class="form-group">
        <label for="txtcargo" class="col-sm-2 control-label">Cargo:*</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="txtcargo" name="txtcargo" placeholder="Cargo"
            maxlength="500" 
            v-model="filluser.cargo"  onkeypress="return noEscribe(event);" readonly="true" disabled="true">
        </div>
      </div>
    </div>

    <div class="col-md-12" style="padding-top: 15px;">
      <div class="form-group">
        <label for="txttelefono" class="col-sm-2 control-label">Teléfono:</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" id="txttelefono" name="txttelefono" placeholder="Teléfono"
            maxlength="50" 
            v-model="filluser.telefono"  onkeypress="return noEscribe(event);" readonly="true" disabled="true">
        </div>

        <label for="txtDirE" class="col-sm-1 control-label">Dirección:</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" id="txtDirE" name="txtDirE" placeholder="Av. Jr. Psje."
            maxlength="500" 
            v-model="filluser.direccion"  onkeypress="return noEscribe(event);" readonly="true" disabled="true">
        </div>
      </div>
    </div>

    <div class="col-md-12">
      <hr>
    </div>

    <center>
      <h4>Datos de Usuario</h4>
    </center>

    <div class="col-md-12" style="padding-top: 15px; color: black;">
      <div class="form-group">
        <label for="cbuTipoUser" class="col-sm-2 control-label">Tipo de Usuario:*</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="cbuTipoUser" name="cbuTipoUser" placeholder="Tipo de Usuario"
            maxlength="225" 
            v-model="filluser.tipouser"  onkeypress="return noEscribe(event);" readonly="true" disabled="true">
        </div>
      </div>
    </div>


    <div class="col-md-12" style="padding-top: 15px; color: black;" v-if="filluser.idtipouser==4">
      <div class="form-group">
        <label for="cbuprogramaestudio" class="col-sm-2 control-label">Programa de Estudio Asignado:*</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="cbuprogramaestudio" name="cbuprogramaestudio" placeholder="Nombres"
            maxlength="500" 
            v-model="filluser.programaestudio"  onkeypress="return noEscribe(event);" readonly="true" disabled="true">
        </div>
      </div>
    </div>

    <div class="col-md-12" style="padding-top: 15px;">
      <div class="form-group">
        <label for="txtuserE" class="col-sm-2 control-label">Username:*</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" id="txtuserE" name="txtuserE" placeholder="Username" maxlength="255"
             v-model="filluser.name"  onkeypress="return noEscribe(event);" readonly="true" disabled="true">
        </div>
      </div>
    </div>

    <div class="col-md-12" style="padding-top: 15px;">
      <div class="form-group">
        <label for="txtmailE" class="col-sm-2 control-label">Correo:*</label>
        <div class="col-sm-4">
          <input type="email" class="form-control" id="txtmailE" name="txtmailE" placeholder="example@mail.com"
            maxlength="500"  v-model="filluser.email"  onkeypress="return noEscribe(event);" readonly="true" disabled="true">
        </div>
      </div>
    </div>






  </div>

  <!-- /.box-body -->
  <div class="box-footer">

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


