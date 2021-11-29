<form v-on:submit.prevent="create">
  <div class="box-body" style="font-size: 14px;">



      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="txttitular" class="col-sm-2 control-label">Título del Evento:*</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="txttitular" name="txttitular" placeholder="Titulo del Evento"
              maxlength="500" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="titular">
          </div>
        </div>
      </div>

      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="txtfecha" class="col-sm-2 control-label">Fecha del Evento:<spam style="color:red;">*</spam></label>
          <div class="col-sm-2">
              <input type="date" class="form-control" id="txtfecha" name="txtfecha" placeholder="dd/mm/aaaa"
              maxlength="10" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="fecha">
          </div>

          <label for="txthora" class="col-sm-2 control-label">Hora del Evento:<spam style="color:red;">*</spam></label>
          <div class="col-sm-2">
              <input type="time" class="form-control" id="txthora" name="txthora" placeholder="00:00:00"
              maxlength="8" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="hora">
          </div>
        </div>
      </div>


      <div class="col-md-12" style="padding-top: 15px;">

        <div class="form-group">
            <label for="txtdesarrollo" class="col-sm-2 control-label">Desarrollo del Evento:*</label>
            <div class="col-sm-10">
              <ckeditor1 v-model="content1"></ckeditor1>

            </div>
        </div>
      </div>


      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="cbuestado" class="col-sm-2 control-label">Imagen Principal (Recomendado 1000 x 900 px)</label>
          <div class="col-sm-10">
            <input name="archivo" type="file" id="archivo" class="archivo form-control" @change="getImage"  v-if="uploadReady" accept=".png, .jpg, .jpeg, .gif, .jpe, .PNG, .JPG, .JPEG, .GIF, .JPE"/>
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