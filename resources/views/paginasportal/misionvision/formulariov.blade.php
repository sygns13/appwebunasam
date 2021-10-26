<form v-on:submit.prevent="createV">
  <div class="box-body" style="font-size: 14px;">


      <div class="col-md-12" style="padding-top: 15px;">

        <div class="form-group">
            <label for="txtdescripcionV" class="col-sm-2 control-label">Descripción de la Visión:*</label>
            <div class="col-sm-10">
              <ckeditor2 v-model="content2"></ckeditor2>

            </div>
        </div>
      </div>

      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="cbutieneimagenV" class="col-sm-2 control-label">¿Incluye imagen?:*</label>
          <div class="col-sm-4">
            <select class="form-control" id="cbutieneimagenV" name="cbutieneimagenV" v-model="tieneimagenV">
              <option value="1">Si</option>
              <option value="0">No</option>
            </select>
          </div>
        </div>
      </div>

  <div class="col-md-12" style="padding-top: 15px;" v-if="tieneimagenV==1">

    <div class="form-group">
      <label for="cbuarchivoV" class="col-sm-2 control-label">Imagen de la Visión</label>

      <div class="col-sm-10">
         <input name="archivoV" type="file" id="archivoV" class="archivo form-control" @change="getImageV"  v-if="uploadReadyV"
accept=".png, .jpg, .jpeg, .gif, .jpe, .PNG, .JPG, .JPEG, .GIF, .JPE"/>
<span style="color:red">Ingrese una Imagen o un archivo adjunto solo si va a editar la Imagen del Banner</span>

       </div>
    </div>

</div>


  </div>

  <!-- /.box-body -->
  <div class="box-footer">
    <button type="submit" class="btn btn-info" id="btnGuardarV"><span
      class="fa fa-floppy-o"></span> Guardar</button>

{{--   <button type="reset" class="btn btn-warning" id="btnCancel"
    @click="cancelForm()"><span class="fa fa-rotate-left"></span> Cancelar</button> --}}

    <button type="button" class="btn btn-danger" id="btnCloseV" @click.prevent="cerrarFormV()"><span
        class="fa fa-power-off"></span> Cerrar</button>

    <div class="sk-circle" v-show="divloaderNuevoV">
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