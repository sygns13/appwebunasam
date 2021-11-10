<form v-on:submit.prevent="createLogo">
    <div class="box-body" style="font-size: 14px;">
  



    <div class="col-md-12" >
  
      <div class="form-group">
        <label for="cbuarchivo" class="col-sm-2 control-label">Logo del Portal UNASAM</label>
  
        <div class="col-sm-10">
           <input name="archivo" type="file" id="archivo" class="archivo form-control" @change="getImage"  v-if="uploadReady"
  accept=".png, .jpg, .jpeg, .gif, .jpe, .PNG, .JPG, .JPEG, .GIF, .JPE"/>
  <span style="color:red">Tamaño recomendado de la imagen: (500px x 100px) </span>
  
         </div>
      </div>
  
  </div>
  
  
    </div>
  
    <!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-info" id="btnGuardarLogo"><span
        class="fa fa-floppy-o"></span> Guardar</button>
  
  {{--   <button type="reset" class="btn btn-warning" id="btnCancel"
      @click="cancelForm()"><span class="fa fa-rotate-left"></span> Cancelar</button> --}}
  
      <button type="button" class="btn btn-danger" id="btnCloseLogo" @click.prevent="cerrarFormLogo()"><span
          class="fa fa-power-off"></span> Cerrar</button>
  
      <div class="sk-circle" v-show="divloaderNuevoLogo">
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