<form method="post" v-on:submit.prevent="update(fillobject.id)">
  <div class="box-body" style="font-size: 14px;">

 
    <div class="col-md-12" style="padding-top: 15px;">
      <div class="form-group">
        <label for="txttitularE" class="col-sm-2 control-label">Título de la Actividad:*</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="txttitularE" name="txttitularE" placeholder="Titular de l la Actividad"
            maxlength="500" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="fillobject.titular">
        </div>
      </div>
    </div>

    <div class="col-md-12" style="padding-top: 15px;">
      <div class="form-group">
        <label for="txtfechaE" class="col-sm-2 control-label">Fecha de la Actividad:<spam style="color:red;">*</spam></label>
        <div class="col-sm-2">
            <input type="date" class="form-control" id="txtfechaE" name="txtfechaE" placeholder="dd/mm/aaaa"
            maxlength="10" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="fillobject.fecha">
        </div>

        <label for="txthoraE" class="col-sm-2 control-label">Hora de la Actividad:<spam style="color:red;">*</spam></label>
        <div class="col-sm-2">
            <input type="time" class="form-control" id="txthoraE" name="txthoraE" placeholder="00:00:00"
            maxlength="8" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="fillobject.hora">
        </div>
      </div>
    </div>

    <div class="col-md-12" style="padding-top: 15px;">

      <div class="form-group">
          <label for="txtdesarrollo" class="col-sm-2 control-label">Desarrollo de la Actividad:*</label>
          <div class="col-sm-10">
            <ckeditor2 v-model="content2"></ckeditor2>

          </div>
      </div>
    </div>

    <div class="col-md-12" style="padding-top: 15px;">
    
                    <div class="form-group">
                      <label for="archivoE" class="col-sm-2 control-label">Imagen Principal: (Opcional)</label>
    
                      <div class="col-sm-10" v-if="uploadReadyE">
                         <input  name="archivoE" type="file" id="archivoE" class="archivo form-control" @change="getImageE"
              accept=".png, .jpg, .jpeg, .gif, .jpe, .PNG, .JPG, .JPEG, .GIF, .JPE"/>
              <span style="color:red">Ingrese una Imagen o un archivo adjunto solo si va a editar la Imagen</span>
    
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