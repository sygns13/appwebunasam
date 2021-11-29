<form method="post" v-on:submit.prevent="update(fillobject.id)">
  <div class="box-body" style="font-size: 14px;">

 


    <div class="col-md-12" style="padding-top: 15px;">
      <div class="form-group">
        <label for="txtnombreE" class="col-sm-2 control-label">URL del Link de Interés:*</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="txtnombreE" name="txtnombreE" placeholder="URL"
            maxlength="500" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="fillobject.nombre">
        </div>
      </div>
    </div>


    <div class="col-md-12" style="padding-top: 15px;">

      <div class="form-group">
          <label for="txtposisionE" class="col-sm-2 control-label">Orden de Publicación:*</label>
          <div class="col-sm-4">
            <input type="number" v-model.number="fillobject.posision"  class="form-control" id="txtposisionE" name="txtposisionE" placeholder="N°" onKeyUp="if(this.value.length>4){this.value='9999';}else if(this.value<0){this.value='0';}" placeholder="N°">
          </div>
      </div>
    </div>



    <div class="col-md-12" style="padding-top: 15px;">
    
                    <div class="form-group">
                      <label for="archivoE" class="col-sm-2 control-label">Imagen: (Opcional)</label>
    
                      <div class="col-sm-10" v-if="uploadReadyE">
                         <input  name="archivoE" type="file" id="archivoE" class="archivo form-control" @change="getImageE"
              accept=".png, .jpg, .jpeg, .gif, .jpe, .PNG, .JPG, .JPEG, .GIF, .JPE"/>
              <span style="color:red">Ingrese una Imagen o un archivo adjunto solo si va a editar la Imagen del Link</span>
    
            </div>
          
        </div>
    </div>

      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="cbuactivoE" class="col-sm-2 control-label">Estado:*</label>
          <div class="col-sm-4">
            <select class="form-control" id="cbuactivoE" name="cbuactivoE" v-model="fillobject.activo">
              <option value="1">Activado</option>
              <option value="0">Desactivado</option>
            </select>
          </div>
        </div>
      </div>

    


  </div>

  <!-- /.box-body -->
  <div class="box-footer">
    <button type="submit" class="btn btn-primary" id="btnSaveE"><i class="fa fa-floppy-o" aria-hidden="true"></i>
      Modificar</button>

    <button type="button" class="btn btn-default" id="btnCloseE" @click.prevent="cerrarFormE()">Cancelar</button>

    <div class="sk-circle" v-show="divloaderEdit">
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