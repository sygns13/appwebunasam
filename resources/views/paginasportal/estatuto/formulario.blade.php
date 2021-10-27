<form v-on:submit.prevent="create">
  <div class="box-body" style="font-size: 14px;">



      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="txttitulo" class="col-sm-2 control-label">Título del Estatuto:*</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="txttitulo" name="txttitulo" placeholder="Título"
              maxlength="500" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="tituloF">
          </div>
        </div>
      </div>

      <div class="col-md-12" style="padding-top: 15px;">

        <div class="form-group">
            <label for="txtpresentacion" class="col-sm-2 control-label">Descripción del Estatuto:*</label>
            <div class="col-sm-10">
              <ckeditor1 v-model="content1"></ckeditor1>

            </div>
        </div>
      </div>


  <div class="col-md-12" style="padding-top: 15px;" v-if="tieneimagen==1">

    <div class="form-group">
      <label for="cbuarchivo" class="col-sm-2 control-label">Estatuto (Opcional)</label>

      <div class="col-sm-10">
         <input name="archivo" type="file" id="archivo" class="archivo form-control" @change="getArchivo"  v-if="uploadReady"
accept=".pdf, .PDF"/>
<span style="color:red">Ingrese un archivo adjunto en formato PDF solo si va a modificar el Estatuto</span>

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