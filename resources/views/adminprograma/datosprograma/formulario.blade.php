<form>
  <div class="box-body" style="font-size: 14px;">
      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="txtdireccion" class="col-sm-2 control-label">Direccion del Programa de Estudio:*</label>
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
          <label for="txttelefono" class="col-sm-2 control-label">Teléfono del Programa de Estudio:*</label>
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
          <label for="txtemail" class="col-sm-2 control-label">Correo electrónico del Programa de Estudio:*</label>
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