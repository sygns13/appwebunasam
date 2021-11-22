<form v-on:submit.prevent="create">
    <div class="box-body" style="font-size: 14px;">
  

      <div class="col-md-12" >
        <div class="form-group">
          <label for="txtnombre_organigrama" class="col-sm-2 control-label">Título:*</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="txtnombre_organigrama" name="txtnombre_organigrama" placeholder="Título del Organigrama"
              maxlength="500" @keydown="$event.keyCode === 13 ? $event.preventDefault() : false" v-model="nombre_organigrama">
          </div>
        </div>
      </div>


    <div class="col-md-12" style="padding-top: 15px;">
      <div class="form-group">
        <label for="cbuarchivo" class="col-sm-2 control-label">Archivo PDF del Organigrama</label>
  
        <div class="col-sm-10">
          
            <input v-if="uploadReady" name="archivo2" type="file" id="archivo2" class="archivo form-control" @change="getArchivo" 
     accept=".pdf, .PDF"/>
  <span style="color:red">Ingrese un archivo solo si va a actializar el PDF </span>
  
         
      </div>
  
  </div>
  
  
    </div>
    </div>
  
    <!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-info" id="btnGuardar"><span
        class="fa fa-floppy-o"></span> Guardar</button>
  
  {{--   <button type="reset" class="btn btn-warning" id="btnCancel"
      @click="cancelForm()"><span class="fa fa-rotate-left"></span> Cancelar</button> --}}
  
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