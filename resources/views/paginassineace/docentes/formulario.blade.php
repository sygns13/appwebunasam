<form v-on:submit.prevent="create">
  <div class="box-body" style="font-size: 14px;">


    <div class="col-md-12" style="padding-top: 15px;">

      <div class="form-group">

          <label for="cbutipo_documento" class="col-sm-2 control-label">Tipo de Documento de Identidad:<spam style="color:red;">*</spam></label>

          <div class="col-sm-2">
              <select class="form-control" id="cbutipo_documento" name="cbutipo_documento" v-model="tipo_documento">
                <option value="1">DNI</option>
                <option value="2">RUC</option>
                <option value="3">Carnet de Extranjería</option>
                <option value="4">Pasaporte</option>
                <option value="5">Partida de Nacimiento</option>
              </select>
            </div>



        <label for="txtdocumento" class="col-sm-1 control-label">Documento:<spam style="color:red;">*</spam></label>

        <div class="col-sm-2">
          <input type="text" class="form-control" id="txtdocumento" name="txtdocumento" placeholder="N° de Documento" maxlength="20" required @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" :disabled="validated == 1"
            v-model="documento">
        </div>
      </div>

    </div>


      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="txtnombre" class="col-sm-2 control-label">Nombre del Docente:<spam style="color:red;">*</spam></label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="txtnombre" name="txtnombre" placeholder="Nombre"
              maxlength="500" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="nombre" onkeypress="return soloLetras(event);">
          </div>
        </div>
      </div>

      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="txtespecialidad" class="col-sm-2 control-label">Especialidad:<spam style="color:red;">*</spam></label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="txtespecialidad" name="txtespecialidad" placeholder="Especialidad"
              maxlength="500" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="especialidad">
          </div>
        </div>
      </div>


      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">

            <label for="cbucondicion" class="col-sm-2 control-label">Condición:<spam style="color:red;">*</spam></label>
            <div class="col-sm-4">
                <select class="form-control" id="cbucondicion" name="cbucondicion" v-model="condicion">
                  <option value="Nombrado">Nombrado</option>
                  <option value="Ordinario">Ordinario</option>
                  <option value="Contratado a plazo determinado">Contratado a plazo determinado</option>
                  <option value="Contratado a plazo determinado –a">Contratado a plazo determinado –a</option>
                  <option value="Contratado a plazo determinado –b">Contratado a plazo determinado –b</option>
                  <option value="Contratado a plazo indeterminado">Contratado a plazo indeterminado</option>
                  <option value="CAS">CAS</option>
                  <option value="Locación de servicios">Locación de servicios</option>
                  <option value="Extraordinario">Extraordinario</option>
                  <option value="Ninguno">Ninguno</option>

                </select>
              </div>

                <label for="cbucategoria" class="col-sm-2 control-label">Categoría:<spam style="color:red;">*</spam></label>
                <div class="col-sm-4">
                    <select class="form-control" id="cbucategoria" name="cbucategoria" v-model="categoria">
                      <option value="Auxiliar">Auxiliar</option>
                      <option value="Asociado">Asociado</option>
                      <option value="Principal">Principal</option>
                    </select>
              </div>
          </div>
        </div>




      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="cburegimen" class="col-sm-2 control-label">Régimen de Dedicación:<spam style="color:red;">*</spam></label>
          <div class="col-sm-4">
              <select class="form-control" id="cburegimen" name="cburegimen" v-model="regimen">
                <option value="Tiempo completo">Tiempo completo</option>
                <option value="Tiempo parcial">Tiempo parcial</option>
                <option value="Dedicación exclusiva">Dedicación exclusiva</option>
              </select>
            </div>
        <label for="txtfecha" class="col-sm-2 control-label">Fecha de Ingreso a la Universidad:<spam style="color:red;">*</spam></label>
            <div class="col-sm-2">
                <input type="date" class="form-control" id="txtfecha" name="txtfecha" placeholder="dd/mm/aaaa"
                maxlength="10" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="fecha">
            </div>
        </div>
      </div>

      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">

          <label for="txttelefono" class="col-sm-2 control-label">Teléfono del Departamento Académico: (Opcional)</label>
          <div class="col-sm-2">
            <input type="text" class="form-control" id="txttelefono" name="txttelefono" placeholder="Telef / Cell"
              maxlength="20" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="telefono">
          </div> 

          <label for="txtemail" class="col-sm-2 control-label">Email del Departamento Académico: (Opcional)</label>
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
            <label for="txtdesarrollo1" class="col-sm-2 control-label">Descripción de Grados Académicos: (Opcional)</label>
            <div class="col-sm-10">
              <ckeditor1 v-model="content1"></ckeditor1>

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