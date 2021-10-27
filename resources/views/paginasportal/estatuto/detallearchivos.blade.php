    <div class="modal fade bs-example-modal-lg" id="modalDetalles"  role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog modal-lg" role="document" id="modaltamanio">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="boxTituloModal" style="font-weight: bold;text-decoration: underline;">GESTION DE MODIFICATORIAS DEL ESTATUTO UNASAM</h4>
    
          </div> 
          <div class="modal-body">
    
    
          <div class="row">
    
          <div class="box" id="o" style="border:0px; box-shadow:none;" >
               {{--  <div class="box-header with-border">
                  <h3 class="box-title" id="boxTituloModalDetalles">Historia:</h3>
                </div> --}}
                <!-- /.box-header -->
                <!-- form start -->
                
                  
                <div class="box-body" v-if="!divNuevaImagen && !divEditImagen">
                    <div class="col-md-12">
                        <div class="form-group">
                          <button type="button" class="btn btn-success btn-sm" id="btncrear" style="font-size: 14px;" @click.prevent="nuevaImg()"><i class="fa fa-plus-circle" aria-hidden="true" ></i> Agregar Modificatoria</button>
                        </div>
                      </div>
                </div>

                      <div class="box box-success" v-if="divNuevaImagen">
                        <div class="box-header with-border" style="border: 1px solid rgb(0, 166, 90); background-color: rgb(0, 166, 90); color: white;">
                            <h3 class="box-title" id="tituloAgregar">Nueva Modificatoria
                            </h3>
                          </div>
                       
                        @include('paginasportal.estatuto.detalleformulariofile')  
                      </div>

                      <div class="box box-warning" v-if="divEditImagen">
                        <div class="box-header with-border" style="border: 1px solid #f39c12; background-color: #f39c12; color: white;">
                          <h3 class="box-title" id="tituloAgregar">Editar Modificatoria: @{{ fillobjectImg.nombre }}
                          </h3>
                        </div>
                      
                        @include('paginasportal.estatuto.detalleeditarfile')  
                      
                      </div>

                <div class="box-body" >

                    <div class="box-body table-responsive">
                        <table class="table table-hover table-bordered" >
                          <tbody><tr>
                            <th style="border:1px solid #ddd; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 13px; padding: 5px; width: 5%;">#</th>
                            <th style="border:1px solid #ddd; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 13px; padding: 5px; width: 20%;">Nombre de la Modificatoria</th>
                            <th style="border:1px solid #ddd; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 13px; padding: 5px; width: 35%;">Descripción</th>
                            <th style="border:1px solid #ddd; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 13px; padding: 5px; width: 5%;">Posición</th>
                            <th style="border:1px solid #ddd; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 13px; padding: 5px; width: 25%;">Archivo</th>
                            <th style="border:1px solid #ddd; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 13px; padding: 5px; width: 10%;">Gestión</th>
                          </tr>
                          <tr v-for="documento, key in documentoEstatuto">
                            <td style="border:1px solid #ddd;font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 12px; padding: 5px;">@{{key+1}}</td>
                            <td style="border:1px solid #ddd;font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 12px; padding: 5px;">@{{ documento.nombre }}</td>
                            <td style="border:1px solid #ddd;font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 12px; padding: 5px;" v-html="documento.descripcion"></td>
                            <td style="border:1px solid #ddd;font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 12px; padding: 5px;">@{{ documento.posicion }}</td>
                            <td style="border:1px solid #ddd;font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 12px; padding: 5px;">
                                <center>
                                    <a download v-bind:href="'{{ asset('/web/estatutounasam/')}}'+'/'+documento.url" class="btn btn-warning btn-sm" ><i class="fa fa-file-pdf-o"></i> Descargar Archivo</a>
                                </center>
                            </td>
                           <td style="border:1px solid #ddd; font-size: 11px; padding: 5px;">
                                      <center>
                            <a href="#" class="btn btn-warning btn-sm" v-on:click.prevent="editImg(documento)" data-placement="top" data-toggle="tooltip" title="Editar Archivo"><i class="fa fa-edit"></i></a>
                            <a href="#" class="btn btn-danger btn-sm" v-on:click.prevent="borrarImg(documento)" data-placement="top" data-toggle="tooltip" title="Borrar Archivo"><i class="fa fa-trash"></i></a>
                          </center>
                          </td>
                        </tr>
                    
                      </tbody></table>
                    
                    </div>
    
    
    
    
          </div>
          </div>
          <div class="modal-footer">

    
          <button type="button" id="btnCancelModal" class="btn btn-default" data-dismiss="modal"><i class="fa fa-sign-out" aria-hidden="true"></i> Cerrar</button>

    
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>

    