<form method="post" v-on:submit.prevent="update(fillobject.id)">
  <div class="box-body" style="font-size: 14px;">

 
    <div class="col-md-12" style="padding-top: 15px;">
      <div class="form-group">
        <label for="txtnombreE" class="col-sm-2 control-label">Nombre del Departamento Académico:*</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="txtnombreE" name="txtnombreE" placeholder="Nombre"
            maxlength="500" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="fillobject.nombre">
        </div>
      </div>
    </div>

    <div class="col-md-12" style="padding-top: 15px;">

      <div class="form-group">
          <label for="txtdesarrolloE" class="col-sm-2 control-label">Descripción del Departamento Académico:*</label>
          <div class="col-sm-10">
            <ckeditor3 v-model="content3"></ckeditor3>

          </div>
      </div>
    </div>

    <div class="col-md-12" style="padding-top: 15px;">
      <div class="form-group">
        <label for="txtdireccionE" class="col-sm-2 control-label">Dirección del Departamento Académico:*</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="txtdireccionE" name="txtdireccionE" placeholder="Dirección"
            maxlength="500" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="fillobject.direccion">
        </div>
      </div>
    </div>

    <div class="col-md-12" style="padding-top: 15px;">
      <div class="form-group">

        <label for="txttelefonoE" class="col-sm-2 control-label">Teléfono del Departamento Académico:</label>
        <div class="col-sm-2">
          <input type="text" class="form-control" id="txttelefonoE" name="txttelefonoE" placeholder="Telef / Cell"
            maxlength="100" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="fillobject.telefono">
        </div> 

        <label for="txtemailE" class="col-sm-2 control-label">Email del Departamento Académico:</label>
        <div class="col-sm-6">
          <input type="email" class="form-control" id="txtemailE" name="txtemailE" placeholder="example@domain.com"
            maxlength="500" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="fillobject.email">
        </div>

      </div>
    </div>


    <div class="col-md-12" style="padding-top: 15px;">
      <div class="form-group">
        <label for="cbutieneimagenE" class="col-sm-2 control-label">¿Incluye imagen Principal?:*</label>
        <div class="col-sm-4">
          <select class="form-control" id="cbutieneimagenE" name="cbutieneimagenE" v-model="fillobject.tieneimagen">
            <option value="1">Si</option>
            <option value="0">No</option>
          </select>
        </div>
      </div>
    </div>


    <div class="col-md-12" style="padding-top: 15px;" v-if="fillobject.tieneimagen==1">
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
        <label for="txtdirectorE" class="col-sm-2 control-label">Nombre del Jefe de Departamento:*</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="txtdirectorE" name="txtdirectorE" placeholder="Jefe de Departamento"
            maxlength="500" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="fillobject.director">
        </div>
      </div>
    </div>

    <div class="col-md-12" style="padding-top: 15px;">
      <div class="form-group">
        <label for="txtdescripcion_corta_directorE" class="col-sm-2 control-label">Descripción corta del Jefe de Departamento</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="txtdescripcion_corta_directorE" name="txtdescripcion_corta_directorE" placeholder=""
            maxlength="500" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="fillobject.descripcion_corta_director">
        </div>
      </div>
    </div>

    <div class="col-md-12" style="padding-top: 15px;">

      <div class="form-group">
          <label for="txtdesarrollo2" class="col-sm-2 control-label">Descripción del Jefe de Departamento:*</label>
          <div class="col-sm-10">
            <ckeditor4 v-model="content4"></ckeditor4>

          </div>
      </div>
    </div>

    <div class="col-md-12" style="padding-top: 15px;">
      <div class="form-group">
        <label for="cbutieneimagen_directorE" class="col-sm-2 control-label">¿Incluye imagen del Jefe de Departamento?:*</label>
        <div class="col-sm-4">
          <select class="form-control" id="cbutieneimagen_directorE" name="cbutieneimagen_directorE" v-model="fillobject.tieneimagen_director">
            <option value="1">Si</option>
            <option value="0">No</option>
          </select>
        </div>
      </div>
    </div>

    <div class="col-md-12" style="padding-top: 15px;" v-if="fillobject.tieneimagen_director==1">
      <div class="form-group">
        <label for="archivo2E" class="col-sm-2 control-label">Imagen Jefe de Práctica: (Opcional)</label>

        <div class="col-sm-10" v-if="uploadReady2E">
           <input  name="archivo2E" type="file" id="archivo2E" class="archivo form-control" @change="getImage2E"
accept=".png, .jpg, .jpeg, .gif, .jpe, .PNG, .JPG, .JPEG, .GIF, .JPE"/>
<span style="color:red">Ingrese una Imagen o un archivo adjunto solo si va a editar la Imagen</span>

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