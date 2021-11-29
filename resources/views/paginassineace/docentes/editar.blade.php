<form method="post" v-on:submit.prevent="update(fillobject.id)">
  <div class="box-body" style="font-size: 14px;">



    <div class="col-md-12" style="padding-top: 15px;">

      <div class="form-group">

          <label for="cbutipo_documentoE" class="col-sm-2 control-label">Tipo de Documento de Identidad:<spam style="color:red;">*</spam></label>

          <div class="col-sm-2">
              <select class="form-control" id="cbutipo_documentoE" name="cbutipo_documentoE" v-model="fillobject.tipo_documento">
                <option value="1">DNI</option>
                <option value="2">RUC</option>
                <option value="3">Carnet de Extranjería</option>
                <option value="4">Pasaporte</option>
                <option value="5">Partida de Nacimiento</option>
              </select>
            </div>



        <label for="txtdocumentoE" class="col-sm-1 control-label">Documento:<spam style="color:red;">*</spam></label>

        <div class="col-sm-2">
          <input type="text" class="form-control" id="txtdocumentoE" name="txtdocumentoE" placeholder="N° de Documento" maxlength="20" required @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" :disabled="validated == 1"
            v-model="fillobject.documento">
        </div>
      </div>

    </div>


      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="txtnombreE" class="col-sm-2 control-label">Nombre del Docente:<spam style="color:red;">*</spam></label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="txtnombreE" name="txtnombreE" placeholder="Nombre"
              maxlength="500" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="fillobject.nombre">
          </div>
        </div>
      </div>

      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="txtespecialidadE" class="col-sm-2 control-label">Especialidad:<spam style="color:red;">*</spam></label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="txtespecialidadE" name="txtespecialidadE" placeholder="Especialidad"
              maxlength="500" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="fillobject.especialidad">
          </div>
        </div>
      </div>


      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">

            <label for="cbucondicionE" class="col-sm-2 control-label">Condición:<spam style="color:red;">*</spam></label>
            <div class="col-sm-4">
                <select class="form-control" id="cbucondicionE" name="cbucondicionE" v-model="fillobject.condicion">
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

                <label for="cbucategoriaE" class="col-sm-2 control-label">Categoría:<spam style="color:red;">*</spam></label>
                <div class="col-sm-4">
                    <select class="form-control" id="cbucategoriaE" name="cbucategoriaE" v-model="fillobject.categoria">
                      <option value="Auxiliar">Auxiliar</option>
                      <option value="Asociado">Asociado</option>
                      <option value="Principal">Principal</option>
                    </select>
              </div>
          </div>
        </div>




      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">
          <label for="cburegimenE" class="col-sm-2 control-label">Régimen de Dedicación:<spam style="color:red;">*</spam></label>
          <div class="col-sm-4">
              <select class="form-control" id="cburegimenE" name="cburegimenE" v-model="fillobject.regimen">
                <option value="Tiempo completo">Tiempo completo</option>
                <option value="Tiempo parcial">Tiempo parcial</option>
                <option value="Dedicación exclusiva">Dedicación exclusiva</option>
              </select>
            </div>
        <label for="txtfechaE" class="col-sm-2 control-label">Fecha de Ingreso a la Universidad:<spam style="color:red;">*</spam></label>
            <div class="col-sm-2">
                <input type="date" class="form-control" id="txtfechaE" name="txtfechaE" placeholder="dd/mm/aaaa"
                maxlength="10" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="fillobject.fecha">
            </div>
        </div>
      </div>

      <div class="col-md-12" style="padding-top: 15px;">
        <div class="form-group">

          <label for="txttelefonoE" class="col-sm-2 control-label">Teléfono del Departamento Académico: (Opcional)</label>
          <div class="col-sm-2">
            <input type="text" class="form-control" id="txttelefonoE" name="txttelefonoE" placeholder="Telef / Cell"
              maxlength="100" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="fillobject.telefono">
          </div> 

          <label for="txtemailE" class="col-sm-2 control-label">Email del Departamento Académico: (Opcional)</label>
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
            <label for="txtdesarrollo1E" class="col-sm-2 control-label">Descripción de Grados Académicos: (Opcional)</label>
            <div class="col-sm-10">
              <ckeditor5 v-model="content5"></ckeditor5>

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