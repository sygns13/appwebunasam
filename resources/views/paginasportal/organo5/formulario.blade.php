<form v-on:submit.prevent="create">
  <div class="box-body" style="font-size: 14px;">



      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="txttitulo" class="col-sm-2 control-label">Nombre:*</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="txttitulo" name="txttitulo" placeholder="Nombre"
              maxlength="500" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="tituloF">
          </div>
        </div>
      </div>

      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="txtsubtitulo" class="col-sm-2 control-label">Descripción corta del Concejo Universitario</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="txtsubtitulo" name="txtsubtitulo" placeholder=""
              maxlength="500" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="subtitulo">
          </div>
        </div>
      </div>

      <div class="col-md-12" style="padding-top: 15px;">

        <div class="form-group">
            <label for="txtpresentacion" class="col-sm-2 control-label">Descripción del Concejo Universitario:*</label>
            <div class="col-sm-10">
              <ckeditor1 v-model="content1"></ckeditor1>

            </div>
        </div>
      </div>

      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="cbutieneimagen" class="col-sm-2 control-label">¿Incluye imagen?:*</label>
          <div class="col-sm-4">
            <select class="form-control" id="cbutieneimagen" name="cbutieneimagen" v-model="tieneimagen">
              <option value="1">Si</option>
              <option value="0">No</option>
            </select>
          </div>
        </div>
      </div>

  <div class="col-md-12" style="padding-top: 15px;" v-if="tieneimagen==1">

    <div class="form-group">
      <label for="cbuarchivo" class="col-sm-2 control-label">Imagen del Concejo Universitario</label>

      <div class="col-sm-10">
         <input name="archivo" type="file" id="archivo" class="archivo form-control" @change="getImage"  v-if="uploadReady"
accept=".png, .jpg, .jpeg, .gif, .jpe, .PNG, .JPG, .JPEG, .GIF, .JPE"/>
<span style="color:red">Ingrese una Imagen o un archivo adjunto solo si va a editar la Imagen del Banner</span>

       </div>
    </div>

</div>


  </div>

  <!-- /.box-body -->
  <div class="box-footer">
    <button type="submit" class="btn btn-info" id="btnGuardar"><span
      class="fa fa-floppy-o"></span> Guardar</button>

{{--   <button type="reset" class="btn btn-warning" id="btnCancel"
    @click="cancelForm()"><span class="fa fa-rotate-left"></span> Cancelar</button> --}}

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