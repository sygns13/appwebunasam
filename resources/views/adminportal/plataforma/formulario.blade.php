<form v-on:submit.prevent="create">
  <div class="box-body" style="font-size: 14px;">
      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="txtnombre" class="col-sm-2 control-label">Nombre de la Plataforma:*</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="txtnombre" name="txtnombre" placeholder="Nombre"
              maxlength="500" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="nombre">
          </div>
        </div>
      </div>

      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="txturl" class="col-sm-2 control-label">URL de la Plataforma:*</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="txturl" name="txturl" placeholder="URL"
              maxlength="500" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="url">
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
  </div>

  <!-- /.box-body -->
  <div class="box-footer">
    <button type="submit" class="btn btn-info" id="btnGuardar"><span
      class="fa fa-floppy-o"></span> Guardar</button>

  <button type="reset" class="btn btn-warning" id="btnCancel"
    @click="cancelForm()"><span class="fa fa-rotate-left"></span> Cancelar</button>

    <button type="button" class="btn btn-danger" id="btnClose" @click.prevent="cerrarForm()"><span
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