<form>

  <div class="box-body" style="font-size: 14px;">

    <div class="col-md-12" style="padding-top: 15px;">
      <div class="form-group">
        <label for="txtruc" class="col-sm-2 control-label">RUC de la UNASAM:*</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="txtruc" name="txtruc" placeholder="RUC"
            maxlength="11" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="ruc">
        </div>
        <div class="col-sm-1">
          <button type="button" class="btn btn-info" id="btnGuardar2" @click.prevent="grabar(0)"><span
            class="fa fa-floppy-o"></span> Guardar</button>
        </div>
      </div>
    </div>
    
      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="txtdireccion" class="col-sm-2 control-label">Direccion del Local Central de la UNASAM:*</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="txtdireccion" name="txtdireccion" placeholder="Dirección"
              maxlength="500" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="direccion">
          </div>
          <div class="col-sm-1">
            <button type="button" class="btn btn-info" id="btnGuardar1" @click.prevent="grabar(3)"><span
              class="fa fa-floppy-o"></span> Guardar</button>
          </div>
        </div>
      </div>

      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="txttelefono" class="col-sm-2 control-label">Teléfono de la UNASAM:*</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="txttelefono" name="txttelefono" placeholder="Teléfono"
              maxlength="100" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="telefono">
          </div>
          <div class="col-sm-1">
            <button type="button" class="btn btn-info" id="btnGuardar2" @click.prevent="grabar(4)"><span
              class="fa fa-floppy-o"></span> Guardar</button>
          </div>
        </div>
      </div>

      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="txtemail" class="col-sm-2 control-label">Correo electrónico de la UNASAM:*</label>
          <div class="col-sm-9">
            <input type="email" class="form-control" id="txtemail" name="txtemail" placeholder="Email"
              maxlength="100" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="email">
          </div>
          <div class="col-sm-1">
            <button type="button" class="btn btn-info" id="btnGuardar3" @click.prevent="grabar(5)"><span
              class="fa fa-floppy-o"></span> Guardar</button>
          </div>
        </div>
      </div>

      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="txthorario_lu_vier" class="col-sm-2 control-label">Horario de Atención de Lunes a Viernes:*</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="txthorario_lu_vier" name="txthorario_lu_vier" placeholder="Horario Lu - Vie"
              maxlength="50" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="horario_lu_vier">
          </div>
          <div class="col-sm-1">
            <button type="button" class="btn btn-info" id="btnGuardar2" @click.prevent="grabar(6)"><span
              class="fa fa-floppy-o"></span> Guardar</button>
          </div>
        </div>
      </div>


      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="txthorario_sabado" class="col-sm-2 control-label">Horario de Atención Sábados:*</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="txthorario_sabado" name="txthorario_sabado" placeholder="Horario Sabados"
              maxlength="50" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="horario_sabado">
          </div>
          <div class="col-sm-1">
            <button type="button" class="btn btn-info" id="btnGuardar2" @click.prevent="grabar(7)"><span
              class="fa fa-floppy-o"></span> Guardar</button>
          </div>
        </div>
      </div>

      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="txthorario_domingo" class="col-sm-2 control-label">Horario de Atención Sábados:*</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="txthorario_domingo" name="txthorario_domingo" placeholder="Horario Sabados"
              maxlength="50" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="horario_domingo">
          </div>
          <div class="col-sm-1">
            <button type="button" class="btn btn-info" id="btnGuardar2" @click.prevent="grabar(8)"><span
              class="fa fa-floppy-o"></span> Guardar</button>
          </div>
        </div>
      </div>







  </div>

  <!-- /.box-body -->
  <div class="box-footer">


{{--   <button type="reset" class="btn btn-warning" id="btnCancel"
    @click="cancelForm()"><span class="fa fa-rotate-left"></span> Cancelar</button> --}}

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