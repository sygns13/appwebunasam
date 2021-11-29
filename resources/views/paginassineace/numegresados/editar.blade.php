<form method="post" v-on:submit.prevent="update(fillobject.id)">
  <div class="box-body" style="font-size: 14px;">


    <div class="col-md-12" style="padding-top: 15px;">

      <div class="form-group">
          <label for="txtanioE" class="col-sm-2 control-label">Año:*</label>
          <div class="col-sm-4">
            <input type="number" v-model.number="fillobject.anio"  class="form-control" id="txtanioE" name="txtanioE" placeholder="N°" onKeyUp="if(this.value.length>4){this.value='9999';}else if(this.value<0){this.value='0';}" placeholder="N°">
          </div>
      </div>
    </div>

  <div class="col-md-12" style="padding-top: 15px;">
    <div class="form-group">
      <label for="txtcantidadE" class="col-sm-2 control-label">Número de Alumnos Egresados:*</label>
      <div class="col-sm-4">
        <input type="number" v-model.number="fillobject.cantidad"  class="form-control" id="txtcantidadE" name="txtcantidadE" placeholder="N°" onKeyUp="if(this.value.length>4){this.value='9999';}else if(this.value<0){this.value='0';}" placeholder="N°">
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