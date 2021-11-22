<script type="text/javascript">

Vue.component('ckeditor1', {
  template: `<div class="ckeditor"><textarea :id="id" :value="value"></textarea></div>`,
  props: {
      value: {
        type: String
      },
      id: {
        type: String,
        default: 'editor1'
      },
      height: {
        type: String,
        default: '450px',
      },
      toolbar: {
        type: Array,
        default: () => [
          [ 'Styles', 'Format', 'Font', 'FontSize' ],
          ['Link'],
          ['Bold','Italic','Underline','Strike'],
          ['NumberedList','BulletedList'],
          ['Cut','Copy','Paste'],
          ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
          [ 'TextColor', 'BGColor' ],
          ['Undo','Redo']
        ]
      },
      language: {
        type: String,
        default: 'es'
      },
      extraplugins: {
        type: String,
        default: ''
      }
        },
        beforeUpdate () {
      const ckeditorId = this.id
      if (this.value !== CKEDITOR.instances[ckeditorId].getData()) {
        CKEDITOR.instances[ckeditorId].setData(this.value)
      }
        },
        mounted () {
      const ckeditorId = this.id
      //console.log(this.value)
      const ckeditorConfig = {
        toolbar: this.toolbar,
        language: this.language,
        height: this.height,
        extraPlugins: this.extraplugins
      }
      CKEDITOR.replace(ckeditorId, ckeditorConfig)
      CKEDITOR.instances[ckeditorId].setData(this.value)
      /*CKEDITOR.instances[ckeditorId].on('change', () => {
        let ckeditorData = CKEDITOR.instances[ckeditorId].getData()
        if (ckeditorData !== this.value) {
          this.$emit('input', ckeditorData)
        }
      })*/
        },
        destroyed () {
      const ckeditorId = this.id
      if (CKEDITOR.instances[ckeditorId]) {
        CKEDITOR.instances[ckeditorId].destroy()
      }
        }
  
});


Vue.component('ckeditor3', {
  template: `<div class="ckeditor"><textarea :id="id" :value="value"></textarea></div>`,
  props: {
      value: {
        type: String
      },
      id: {
        type: String,
        default: 'editor3'
      },
      height: {
        type: String,
        default: '150px',
      },
      toolbar: {
        type: Array,
        default: () => [
          [ 'Styles', 'Format', 'Font', 'FontSize' ],
          ['Link'],
          ['Bold','Italic','Underline','Strike'],
          ['NumberedList','BulletedList'],
          ['Cut','Copy','Paste'],
          ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
          [ 'TextColor', 'BGColor' ],
          ['Undo','Redo']
        ]
      },
      language: {
        type: String,
        default: 'es'
      },
      extraplugins: {
        type: String,
        default: ''
      }
        },
        beforeUpdate () {
      const ckeditorId = this.id
      if (this.value !== CKEDITOR.instances[ckeditorId].getData()) {
        CKEDITOR.instances[ckeditorId].setData(this.value)
      }
        },
        mounted () {
      const ckeditorId = this.id
      //console.log(this.value)
      const ckeditorConfig = {
        toolbar: this.toolbar,
        language: this.language,
        height: this.height,
        extraPlugins: this.extraplugins
      }
      CKEDITOR.replace(ckeditorId, ckeditorConfig)
      CKEDITOR.instances[ckeditorId].setData(this.value)
      /*CKEDITOR.instances[ckeditorId].on('change', () => {
        let ckeditorData = CKEDITOR.instances[ckeditorId].getData()
        if (ckeditorData !== this.value) {
          this.$emit('input', ckeditorData)
        }
      })*/
        },
        destroyed () {
      const ckeditorId = this.id
      if (CKEDITOR.instances[ckeditorId]) {
        CKEDITOR.instances[ckeditorId].destroy()
      }
        }
  
});


Vue.component('ckeditor4', {
  template: `<div class="ckeditor"><textarea :id="id" :value="value"></textarea></div>`,
  props: {
      value: {
        type: String
      },
      id: {
        type: String,
        default: 'editor4'
      },
      height: {
        type: String,
        default: '150px',
      },
      toolbar: {
        type: Array,
        default: () => [
          [ 'Styles', 'Format', 'Font', 'FontSize' ],
          ['Link'],
          ['Bold','Italic','Underline','Strike'],
          ['NumberedList','BulletedList'],
          ['Cut','Copy','Paste'],
          ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
          [ 'TextColor', 'BGColor' ],
          ['Undo','Redo']
        ]
      },
      language: {
        type: String,
        default: 'es'
      },
      extraplugins: {
        type: String,
        default: ''
      }
        },
        beforeUpdate () {
      const ckeditorId = this.id
      if (this.value !== CKEDITOR.instances[ckeditorId].getData()) {
        CKEDITOR.instances[ckeditorId].setData(this.value)
      }
        },
        mounted () {
      const ckeditorId = this.id
      //console.log(this.value)
      const ckeditorConfig = {
        toolbar: this.toolbar,
        language: this.language,
        height: this.height,
        extraPlugins: this.extraplugins
      }
      CKEDITOR.replace(ckeditorId, ckeditorConfig)
      CKEDITOR.instances[ckeditorId].setData(this.value)
      /*CKEDITOR.instances[ckeditorId].on('change', () => {
        let ckeditorData = CKEDITOR.instances[ckeditorId].getData()
        if (ckeditorData !== this.value) {
          this.$emit('input', ckeditorData)
        }
      })*/
        },
        destroyed () {
      const ckeditorId = this.id
      if (CKEDITOR.instances[ckeditorId]) {
        CKEDITOR.instances[ckeditorId].destroy()
      }
        }
  
});


 let app = new Vue({
    el: '#app',
    data:{
        titulo:"Páginas Facultades",
        subtitulo: "Gestión de la Historia",
        subtitulo2: "Principal",

        subtitle2:false,
        subtitulo2:"",

        tipouserPerfil:'{{ $tipouser->nombre }}',
        userPerfil:'{{ Auth::user()->name }}',
        mailPerfil:'{{ Auth::user()->email }}',


        divloader0:true,
        divloader1:false,
        divloader2:false,
        divloader3:false,
        divloader4:false,
        divloader5:false,
        divloader6:false,
        divloader7:false,
        divloader8:false,
        divloader9:false,
        divloader10:false,
        divtitulo:true,
        classTitle:'fa fa-list-alt',
        classMenu0:'',
        classMenu1:'',
        classMenu2:'active',
        classMenu3:'',
        classMenu4:'',
        classMenu5:'',
        classMenu6:'',
        classMenu7:'',
        classMenu8:'',
        classMenu9:'',
        classMenu10:'',
        classMenu11:'',
        classMenu12:'',


        errors:[],

        fillobject:{ 'id':'', 'titulo':'', 'historia':'' , 'tieneimagen':'1'},

        divNuevo:false,
        divEdit:false,

        id:'',
        tituloF : '',
        historia : '',
        tieneimagen  : '',

        divloaderNuevo:false,
        mostrarPalenIni:true,

        divprincipal:false,

        content1:'',

        // Gestionar imagenes de historia

        detalleImagenes: [],
        divNuevaImagen:false,
        divEditImagen:false,

        nombreImg: '',
        descripcionImg: '',
        urlImg: '',
        posicion:'',

        imagenDetalle : null,
        uploadReadyDetalle: true,

        divloaderNuevoImg:false,
        divloaderEditImg : false,

        imagenEDetalle : null,
        uploadReadyEDetalle: false,

        oldImgDetalle:'',

        content3:'',
        content4:'',

        fillobjectImg:{ 'id':'', 
                        'nombre':'', 
                        'descripcion':'', 
                        'url':'', 
                        'posicion':'', 
                        'oldImg':''},

        
        //seccion facultades
        nivel : 1,
        facultad:'',
        facultad_id: 0,
        tipo_vista: 1,


    },
    created:function () {
        //this.getDatos(this.thispage);

        
    },
    mounted: function () {
        $("#divtitulo").show('slow');
        this.divloader0=false;
        this.divprincipal=true;
    },
    computed:{
        isActived: function(){
            return this.pagination.current_page;
        },
        pagesNumber: function () {
            if(!this.pagination.to){
                return [];
            }

            var from=this.pagination.current_page - this.offset 
            var from2=this.pagination.current_page - this.offset 
            if(from<1){
                from=1;
            }

            var to= from2 + (this.offset*2); 
            if(to>=this.pagination.last_page){
                to=this.pagination.last_page;
            }

            var pagesArray = [];
            while(from<=to){
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        }
    },

    filters:{
    mostrarNumero(value){
      
      if(value != null && value != undefined){
        value=parseFloat(value).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      }

      return value;
    },
    pasfechaVista:function(date){
        if(date!=null && date.length==10){
            date=date.slice(-2)+'/'+date.slice(-5,-3)+'/'+date.slice(0,4);            
        }else{
          return '';
        }

        return date;
    },
    leftpad:function(n, length) {
        var  n = n.toString();
        while(n.length < length)
            n = "0" + n;
        return n;
    }

  },

    methods: {


        getDatos: function (page) {
            var busca=this.buscar;
            var v1 = this.nivel;
            var v2 = this.facultad_id;
            var v3 = 0;
            var url = '/intranet/historiare'+'?v1='+v1+'&v2='+v2+'&v3='+v3;

            axios.get(url).then(response=>{

                let historia= response.data.historia;
                //console.log(historia);
               // console.log(historia.length);

                if(historia!= undefined && historia != null){
                    this.fillobject.id = historia.id;
                    this.fillobject.titulo = historia.titulo;
                    this.fillobject.historia = historia.historia;
                    this.fillobject.tieneimagen = historia.tieneimagen;
                    this.detalleImagenes = historia.imagenhistoria;

                    //this.verImg();
                }
            })
        },

       /*  verImg:function () {

        let image=this.fillobject.url;
        if(this.fillobject.tieneimagen!= null && this.fillobject.tieneimagen == 1){
            $("#imgInformacion").attr("src","{{ asset('/web/historiafec/')}}"+"/"+image);
        }
        
        }, */

        nuevo:function () {
            this.divNuevo=true;
            this.divloaderEdit=false;
            this.$nextTick(function () {
                this.cancelForm();
            })
        },
        cerrarForm: function () {
            this.divNuevo=false;
            this.cancelForm();
        },
        cancelForm: function () {
            this.id = this.fillobject.id;
            this.tituloF = this.fillobject.titulo;
            this.historia = this.fillobject.historia;
            this.tieneimagen = this.fillobject.tieneimagen;

            this.$nextTick(() => {
                $('#txttitulo').focus();
                if(CKEDITOR.instances['editor1'] != undefined && CKEDITOR.instances['editor1'] != null){
                    CKEDITOR.instances['editor1'].setData(this.historia);
                }
                
            })

            this.divEdit=false;
        },

        create:function () {
            var url='/intranet/historiare';

            $("#btnGuardar").attr('disabled', true);
            $("#btnCancel").attr('disabled', true);
            $("#btnClose").attr('disabled', true);

            this.divloaderNuevo=true;

            var v1 = this.nivel;
            var v2 = this.facultad_id;
            var v3 = 0;

            this.historia=CKEDITOR.instances['editor1'].getData();


            var data = new  FormData();

            data.append('id', this.id);
            data.append('titulo', this.tituloF);
            data.append('historia', this.historia);
            data.append('tieneimagen', this.tieneimagen);
            data.append('v1', v1);
            data.append('v2', v2);
            data.append('v3', v3);
            
            const config = { headers: { 'Content-Type': 'multipart/form-data' } };

            axios.post(url,data,config).then(response=>{

                $("#btnGuardar").removeAttr("disabled");
                $("#btnCancel").removeAttr("disabled");
                $("#btnClose").removeAttr("disabled");
                this.divloaderNuevo=false;

                if(response.data.result=='1'){
                    this.getDatos(this.thispage);
                    this.errors=[];
                    this.cerrarForm();
                    toastr.success(response.data.msj);
                }else{
                    $('#'+response.data.selector).focus();
                    toastr.error(response.data.msj);
                }
            }).catch(error=>{
                this.errors=error.response.data
            })
        },  


        //Seccion Imagenes de detalle Historia


      gestionarImages:function (){

        this.divNuevaImagen=false;
        this.divEditImagen=false;
        this.divloaderNuevoImg=false;
        this.divloaderEditImg=false;


        $("#modalDetalles").modal('show');

      },

      nuevaImg:function () {
          this.divNuevaImagen=true;
          this.divloaderEditImg=false;
          this.$nextTick(function () {
              this.cancelFormImg();
          })
      },
      cerrarFormImg: function () {
          this.divNuevaImagen=false;
          this.cancelFormImg();
      },
      cancelFormImg: function () {


          this.nombreImg = '';
          this.descripcionImg = '';
          this.urlImg = '';
          this.posicion ='';

          this.imagenDetalle=null;
          this.uploadReadyDetalle = false
          this.$nextTick(() => {
              this.uploadReadyDetalle = true;
              $('#txtnombreImg').focus();
              if(CKEDITOR.instances['editor3'] != undefined && CKEDITOR.instances['editor3'] != null){
                  CKEDITOR.instances['editor3'].setData("");
              }
          })

          this.divEditImagen=false;
      },
      getImageDetalle(event){
          //Asignamos la imagen a  nuestra data

          if (!event.target.files.length)
          {
              this.imagenDetalle=null;
          }
          else{
          this.imagenDetalle = event.target.files[0];
          }
      },
      createImg:function () {
          var url='/intranet/imagenhistoriare';

          $("#btnGuardarImg").attr('disabled', true);
          $("#btnCancelImg").attr('disabled', true);
          $("#btnCloseImg").attr('disabled', true);

          this.descripcionImg=CKEDITOR.instances['editor3'].getData();
          this.divloaderNuevoImg=true;

          var data = new  FormData();

          var v1 = this.nivel;
          var v2 = this.facultad_id;
          var v3 = 0;


          data.append('nombre', this.nombreImg);
          data.append('descripcion', this.descripcionImg);
          data.append('posicion', this.posicion);
          data.append('url', this.url);
          data.append('imagen', this.imagenDetalle);
          data.append('historia_id', this.fillobject.id);
          data.append('v1', v1);
          data.append('v2', v2);
          data.append('v3', v3);


          const config = { headers: { 'Content-Type': 'multipart/form-data' } };

          axios.post(url,data,config).then(response=>{

              $("#btnGuardarImg").removeAttr("disabled");
              $("#btnCancelImg").removeAttr("disabled");
              $("#btnCloseImg").removeAttr("disabled");
              this.divloaderNuevoImg=false;

              if(response.data.result=='1'){
                  this.getDatosImagenes();
                  this.errors=[];
                  this.cerrarFormImg();
                  toastr.success(response.data.msj);
              }else{
                  $('#'+response.data.selector).focus();
                  toastr.error(response.data.msj);
              }
          }).catch(error=>{
              this.errors=error.response.data
          })
      },
      getDatosImagenes: function () {

          var url = '/intranet/imagenhistoriare?historia_id='+this.fillobject.id;
          axios.get(url).then(response=>{
              this.detalleImagenes= response.data.imagenhistoria;
          })
      },
      borrarImg:function (dato) {
        swal.fire({
            title: '¿Estás seguro?',
            text: "¿Desea eliminar la Imagen seleccionada? -- Nota: Este proceso no se podrá revertir",
            type: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar'
        }).then((result) => {


          if (result.value) {
              var url = '/intranet/imagenhistoriare/'+dato.id;
              axios.delete(url).then(response=>{//eliminamos

                  if(response.data.result=='1'){
                      app.getDatosImagenes();//listamos
                      toastr.success(response.data.msj);//mostramos mensaje
                  }else{
                      // $('#'+response.data.selector).focus();
                      toastr.error(response.data.msj);
                  }
              });
          }

          }).catch(swal.noop);
      },

      getImageDetalleE(event){
          //Asignamos la imagen a  nuestra data

          if (!event.target.files.length)
          {
              this.imagenEDetalle=null;
          }
          else{
          this.imagenEDetalle = event.target.files[0];
          }
      },

      editImg:function (dato) {

        this.uploadReadyEDetalle=false;

            this.fillobjectImg.id=dato.id;
            this.fillobjectImg.nombre=dato.nombre;
            this.fillobjectImg.descripcion=dato.descripcion;
            this.fillobjectImg.url=dato.url;
            this.fillobjectImg.posicion=dato.posicion;

            this.oldImgDetalle=dato.url;


            this.divNuevaImagen=false;
            this.divEditImagen=true;
            this.divloaderEditImg=false;

            this.$nextTick(() => {
                CKEDITOR.instances['editor4'].setData(dato.descripcion);
                this.imagenEDetalle=null;
                this.uploadReadyEDetalle=true;
                $('#txtnombreImgE').focus();
            });

        },

        cerrarFormEImg: function(){

          this.divEditImagen=false;

          this.$nextTick(function () {
              this.fillobjectImg ={ 'id':'', 
                                    'nombre':'', 
                                    'descripcion':'', 
                                    'url':'', 
                                    'posicion':'', 
                                    'oldImg':''};

          })

        },

        updateImg: function (id) {

          var url="/intranet/imagenhistoriare/"+id;
          $("#btnSaveEImg").attr('disabled', true);
          $("#btnCloseEImg").attr('disabled', true);
          this.divloaderEdit=true;

          this.fillobjectImg.oldImg= this.oldImgDetalle;
          this.fillobjectImg.descripcion=CKEDITOR.instances['editor4'].getData();

          var data = new  FormData();

          var v1 = this.nivel;
          var v2 = this.facultad_id;

          data.append('id', this.fillobjectImg.id);
          data.append('nombre', this.fillobjectImg.nombre);
          data.append('descripcion', this.fillobjectImg.descripcion);
          data.append('url', this.fillobjectImg.url);
          data.append('posicion', this.fillobjectImg.posicion);

          data.append('imagen', this.imagenEDetalle);
          data.append('oldimg', this.fillobjectImg.oldImg);
          data.append('v1', v1);

          data.append('_method', 'PUT');

          const config = { headers: { 'Content-Type': 'multipart/form-data' } };


          axios.post(url, data, config).then(response=>{


              $("#btnSaveEImg").removeAttr("disabled");
              $("#btnCloseEImg").removeAttr("disabled");
              this.divloaderEdit=false;
              
              if(response.data.result=='1'){   
                  this.getDatosImagenes();
                  this.cerrarFormEImg();
                  toastr.success(response.data.msj);

              }else{
                  $('#'+response.data.selector).focus();
                  toastr.error(response.data.msj);
              }

          }).catch(error=>{
              this.errors=error.response.data
          })
          },

          //Modificaciones Facultades
      irAtras:function(){
            this.facultad_id = 0;
            this.facultad = '';
            this.divNuevo = false;
            this.divNuevoLogo = false;
        },
        cambioFacultad:function(){
            this.facultad = $('#cbufacultad_id option:selected').html();
            this.getDatos(this.thispage);
        },

}
});
</script>