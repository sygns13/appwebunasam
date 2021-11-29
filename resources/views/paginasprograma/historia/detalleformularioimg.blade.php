<form v-on:submit.prevent="createImg">
    <div class="box-body" style="font-size: 14px;">
  
  
  
        <div class="col-md-12" style="padding-top: 15px;">
          <div class="form-group">
            <label for="txtnombreImg" class="col-sm-2 control-label">Nombre de la Imagen:*</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="txtnombreImg" name="txtnombreImg" placeholder="Nombre de la Imagen"
                maxlength="100" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="nombreImg">
            </div>
          </div>
        </div>

        <div class="col-md-12" style="padding-top: 15px;">

          <div class="form-group">
              <label for="txtposicion" class="col-sm-2 control-label">Posición de la Imagen:*</label>
              <div class="col-sm-4">
                <input type="number" v-model.number="posicion"  class="form-control" id="txtposicion" name="txtposicion" placeholder="N°" onKeyUp="if(this.value.length>4){this.value='9999';}else if(this.value<0){this.value='0';}" placeholder="N°">
              </div>
          </div>
        </div>
  

  
  
        <div class="col-md-12" style="padding-top: 15px;">
  
          <div class="form-group">
              <label for="txtdescripcionImg" class="col-sm-2 control-label">Descripción de la Imagen: (opcional)</label>
              <div class="col-sm-10">
                <ckeditor3 v-model="content3"></ckeditor3>
  
              </div>
          </div>
        </div>
  
  
        <div class="col-md-12" style="padding-top: 15px;">
          <div class="form-group">
            <label for="imagenDetalle" class="col-sm-2 control-label">Seleccione Imagen:</label>
            <div class="col-sm-10">
              <input name="imagenDetalle" type="file" id="imagenDetalle" class="archivo form-control" @change="getImageDetalle"  v-if="uploadReadyDetalle" accept=".png, .jpg, .jpeg, .gif, .jpe, .PNG, .JPG, .JPEG, .GIF, .JPE"/>
            </div>
            </div>
        </div>  
  
    </div>
  
    <!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-info" id="btnGuardarImg"><span
        class="fa fa-floppy-o"></span> Guardar</button>
  
    <button type="reset" class="btn btn-warning" id="btnCancelImg"
      @click="cancelFormImg()"><span class="fa fa-rotate-left"></span> Cancelar</button>
  
      <button type="button" class="btn btn-danger" id="btnCloseImg" @click.prevent="cerrarFormImg()"><span
          class="fa fa-power-off"></span> Cerrar</button>
  
      <div class="sk-circle" v-show="divloaderNuevoImg">
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