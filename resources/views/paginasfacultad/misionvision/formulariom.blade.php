<form v-on:submit.prevent="createM">
  <div class="box-body" style="font-size: 14px;">


      <div class="col-md-12" style="padding-top: 15px;">

        <div class="form-group">
            <label for="txtdescripcionM" class="col-sm-2 control-label">Descripción de la Misión:*</label>
            <div class="col-sm-10">
              <ckeditor1 v-model="content1"></ckeditor1>

            </div>
        </div>
      </div>

      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="cbutieneimagenM" class="col-sm-2 control-label">¿Incluye imagen?:*</label>
          <div class="col-sm-4">
            <select class="form-control" id="cbutieneimagenM" name="cbutieneimagenM" v-model="tieneimagenM">
              <option value="1">Si</option>
              <option value="0">No</option>
            </select>
          </div>
        </div>
      </div>

  <div class="col-md-12" style="padding-top: 15px;" v-if="tieneimagenM==1">

    <div class="form-group">
      <label for="cbuarchivoM" class="col-sm-2 control-label">Imagen de la Misión</label>

      <div class="col-sm-10">
         <input name="archivoM" type="file" id="archivoM" class="archivo form-control" @change="getImageM"  v-if="uploadReadyM"
accept=".png, .jpg, .jpeg, .gif, .jpe, .PNG, .JPG, .JPEG, .GIF, .JPE"/>
<span style="color:red">Ingrese una Imagen o un archivo adjunto solo si va a editar la Imagen del Banner</span>

       </div>
    </div>

</div>


  </div>

  <!-- /.box-body -->
  <div class="box-footer">
    <button type="submit" class="btn btn-info" id="btnGuardarM"><span
      class="fa fa-floppy-o"></span> Guardar</button>

{{--   <button type="reset" class="btn btn-warning" id="btnCancel"
    @click="cancelForm()"><span class="fa fa-rotate-left"></span> Cancelar</button> --}}

    <button type="button" class="btn btn-danger" id="btnCloseM" @click.prevent="cerrarFormM()"><span
        class="fa fa-power-off"></span> Cerrar</button>

    <div class="sk-circle" v-show="divloaderNuevoM">
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