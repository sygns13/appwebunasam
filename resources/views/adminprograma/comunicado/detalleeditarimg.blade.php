<form method="post" v-on:submit.prevent="updateImg(fillobjectImg.id)">
    <div class="box-body" style="font-size: 14px;">


        <div class="col-md-12" style="padding-top: 15px;">
            <div class="form-group">
              <label for="txtnombreImgE" class="col-sm-2 control-label">Nombre de la Imagen:*</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="txtnombreImgE" name="txtnombreImgE" placeholder="Nombre de la Imagen"
                  maxlength="100" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="fillobjectImg.nombre">
              </div>
            </div>
          </div>
  
   
          <div class="col-md-12" style="padding-top: 15px;">

            <div class="form-group">
                <label for="txtposicionE" class="col-sm-2 control-label">Posición de la Imagen:*</label>
                <div class="col-sm-4">
                  <input type="number" v-model.number="fillobjectImg.posicion"  class="form-control" id="txtposicionE" name="txtposicionE" placeholder="N°" onKeyUp="if(this.value.length>4){this.value='9999';}else if(this.value<0){this.value='0';}" placeholder="N°">
                </div>
            </div>
          </div>
    
  
    
    
          <div class="col-md-12" style="padding-top: 15px;">
    
            <div class="form-group">
                <label for="txtdescripcionImgE" class="col-sm-2 control-label">Descripción de la Imagen: (opcional)</label>
                <div class="col-sm-10">
                  <ckeditor4 v-model="content4"></ckeditor3>
    
                </div>
            </div>
          </div>



          <div class="col-md-12" style="padding-top: 15px;">
    
            <div class="form-group">
              <label for="imagenEDetalle" class="col-sm-2 control-label">Imagen: (Opcional)</label>

              <div class="col-sm-10" v-if="uploadReadyEDetalle">
                 <input  name="imagenEDetalle" type="file" id="imagenEDetalle" class="archivo form-control" @change="getImageDetalleE"
      accept=".png, .jpg, .jpeg, .gif, .jpe, .PNG, .JPG, .JPEG, .GIF, .JPE"/>
      <span style="color:red">Ingrese una Imagen o un archivo adjunto solo si va a editar la Imagen</span>

        </div>
  
        </div>
        </div>
    

  
      
  
  
    </div>
  
    <!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-primary" id="btnSaveEImg"><i class="fa fa-floppy-o" aria-hidden="true"></i>
        Modificar</button>
  
      <button type="button" class="btn btn-default" id="btnCloseEImg" @click.prevent="cerrarFormEImg()">Cancelar</button>
  
      <div class="sk-circle" v-show="divloaderEditImg">
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