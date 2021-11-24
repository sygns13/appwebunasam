<form v-on:submit.prevent="create">
  <div class="box-body" style="font-size: 14px;">



      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="txtnombre" class="col-sm-2 control-label">Nombre del Departamento Académico:*</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="txtnombre" name="txtnombre" placeholder="Nombre"
              maxlength="500" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="nombre">
          </div>
        </div>
      </div>

      <div class="col-md-12" style="padding-top: 15px;">

        <div class="form-group">
            <label for="txtdesarrollo" class="col-sm-2 control-label">Descripción del Departamento Académico:*</label>
            <div class="col-sm-10">
              <ckeditor1 v-model="content1"></ckeditor1>

            </div>
        </div>
      </div>

      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="txtdireccion" class="col-sm-2 control-label">Dirección del Departamento Académico:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="txtdireccion" name="txtdireccion" placeholder="Dirección"
              maxlength="500" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="direccion">
          </div>
        </div>
      </div>

      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">

          <label for="txttelefono" class="col-sm-2 control-label">Teléfono del Departamento Académico:</label>
          <div class="col-sm-2">
            <input type="text" class="form-control" id="txttelefono" name="txttelefono" placeholder="Telef / Cell"
              maxlength="100" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="telefono">
          </div> 

          <label for="txtemail" class="col-sm-2 control-label">Email del Departamento Académico:</label>
          <div class="col-sm-6">
            <input type="email" class="form-control" id="txtemail" name="txtemail" placeholder="example@domain.com"
              maxlength="500" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="email">
          </div>

        </div>
      </div>


      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="cbutieneimagen" class="col-sm-2 control-label">¿Incluye imagen Principal?:*</label>
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
          <label for="cbuestado" class="col-sm-2 control-label">Imagen Principal (Recomendado 1000 x 900 px)</label>
          <div class="col-sm-10">
            <input name="archivo" type="file" id="archivo" class="archivo form-control" @change="getImage"  v-if="uploadReady" accept=".png, .jpg, .jpeg, .gif, .jpe, .PNG, .JPG, .JPEG, .GIF, .JPE"/>
          </div>
          </div>
      </div>


      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="txtdirector" class="col-sm-2 control-label">Nombre del Jefe de Departamento:*</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="txtdirector" name="txtdirector" placeholder="Jefe de Departamento"
              maxlength="500" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="director">
          </div>
        </div>
      </div>

      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="txtdescripcion_corta_director" class="col-sm-2 control-label">Descripción corta del Jefe de Departamento:*</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="txtdescripcion_corta_director" name="txtdescripcion_corta_director" placeholder=""
              maxlength="500" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="descripcion_corta_director">
          </div>
        </div>
      </div>

      <div class="col-md-12" style="padding-top: 15px;">

        <div class="form-group">
            <label for="txtdesarrollo2" class="col-sm-2 control-label">Descripción del Jefe de Departamento:*</label>
            <div class="col-sm-10">
              <ckeditor2 v-model="content2"></ckeditor2>

            </div>
        </div>
      </div>

      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="cbutieneimagen_director" class="col-sm-2 control-label">¿Incluye imagen del Jefe de Departamento?:*</label>
          <div class="col-sm-4">
            <select class="form-control" id="cbutieneimagen_director" name="cbutieneimagen_director" v-model="tieneimagen_director">
              <option value="1">Si</option>
              <option value="0">No</option>
            </select>
          </div>
        </div>
      </div>

      <div class="col-md-12" style="padding-top: 15px;" v-if="tieneimagen_director==1">
        <div class="form-group">
          <label for="cbuestado2" class="col-sm-2 control-label">Imagen Jefe de Práctica (Recomendado 1000 x 900 px)</label>
          <div class="col-sm-10">
            <input name="archivo2" type="file" id="archivo2" class="archivo form-control" @change="getImage2"  v-if="uploadReady2" accept=".png, .jpg, .jpeg, .gif, .jpe, .PNG, .JPG, .JPEG, .GIF, .JPE"/>
          </div>
          </div>
      </div>



      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="cbuactivo" class="col-sm-2 control-label">Estado:*</label>
          <div class="col-sm-4">
            <select class="form-control" id="cbuactivo" name="cbuactivo" v-model="activo">
              <option value="1">Activado</option>
              <option value="0">Desactivado</option>
            </select>
          </div>
        </div>
      </div>


  </div>

  <!-- /.box-body -->
  <div class="box-footer">
    <button type="submit" class="btn btn-info" id="btnGuardar"><span
      class="fa fa-floppy-o"></span> Guardar</button>

  <button type="reset" class="btn btn-warning" id="btnCancel"
    @click="cancelForm()"><span class="fa fa-rotate-left"></span> Cancelar</button>

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