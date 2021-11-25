<form method="post" v-on:submit.prevent="update(fillobject.id)">
  <div class="box-body" style="font-size: 14px;">


    <div class="col-md-12" style="padding-top: 15px;">
      <div class="form-group">
        <label for="txttituloE" class="col-sm-2 control-label">Titulo:*</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="txttituloE" name="txttituloE" placeholder="Titulo"
            maxlength="500" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="fillobject.titulo">
        </div>
      </div>
    </div>


    <div class="col-md-12" style="padding-top: 15px;">

      <div class="form-group">
          <label for="descripcionE" class="col-sm-2 control-label">Descripción:</label>
          <div class="col-sm-10">
            <ckeditor2 v-model="content2"></ckeditor2>

          </div>
      </div>
    </div>



    <div class="col-md-12" style="padding-top: 15px;">
    
                    <div class="form-group">
                      <label for="archivoE" class="col-sm-2 control-label">Imagen: (Opcional)</label>
    
                      <div class="col-sm-10" v-if="uploadReadyE">
                         <input  name="archivoE" type="file" id="archivoE" class="archivo form-control" @change="getImageE"
              accept=".png, .jpg, .jpeg, .gif, .jpe, .PNG, .JPG, .JPEG, .GIF, .JPE"/>
              <span style="color:red">Ingrese una Imagen  adjunto solo si va a editar la Imagen</span>
    
            </div>
          
        </div>
    </div>


    <div class="col-md-12" style="padding-top: 15px;">

      <div class="form-group">
        <label for="txtArchivoAdjuntoE" class="col-sm-2 control-label">Archivo Adjunto: (Opcional: pdf, docx, xlsx, pptx)</label>

        <div class="col-sm-8">
          <input type="text" class="form-control" id="txtnombrefile" name="txtnombrefile" placeholder="Nombre del Archivo" maxlength="500"  v-model="fillobject.nombrefile">
        </div> 

        <div class="col-sm-8" v-if="uploadReadyE">
           <input  name="archivo2E" type="file" id="archivo2E" class="archivo form-control" @change="getArchivoE" 
accept=".pdf, .doc, .docx, .xls, .xlsx, ppt, .pptx, .PDF, .DOC, .DOCX, .XLS, .XLSX, .PPT, .PTTX"/>
<span style="color:red">Ingrese un Archivo adjunto solo si va a editar o agregar un archivo</span>




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