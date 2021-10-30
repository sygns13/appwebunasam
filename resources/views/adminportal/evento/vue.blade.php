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

Vue.component('ckeditor2', {
  template: `<div class="ckeditor"><textarea :id="id" :value="value"></textarea></div>`,
  props: {
      value: {
        type: String
      },
      id: {
        type: String,
        default: 'editor2'
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
        titulo:"Portal Web UNASAM",
        subtitulo: "Gestión de Eventos y Comunicados",
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
        classMenu2:'',
        classMenu3:'',
        classMenu4:'',
        classMenu5:'',
        classMenu6:'',
        classMenu7:'',
        classMenu8:'',
        classMenu9:'',
        classMenu10:'active',
        classMenu11:'',
        classMenu12:'',


        eventos: [],
        errors:[],

        fillobject:{ 'id':'', 
                    'fecha':'', 
                    'hora':'', 
                    'titular':'', 
                    'desarrollo':'', 
                    'tieneimagen':'', 
                    'url':'',
                    'activo':'',
                    'oldImg':''},

        pagination: {
            'total': 0,
            'current_page': 0,
            'per_page': 0,
            'last_page': 0,
            'from': 0,
            'to': 0
        },
        offset: 9,

        buscar:'',
        divNuevo:false,
        divEdit:false,

        fecha : '{{ $fecha }}',
        hora : '00:00:00',
        titular : '',
        desarrollo : '',
        tieneimagen : 1,
        url : '',
        activo : 1,


        divloaderNuevo:false,
        divloaderEdit:false,

        mostrarPalenIni:true,

        thispage:'1',
        divprincipal:false,

        imagen : null,
        uploadReady: true,

        imagenE : null,
        uploadReadyE: false,

        oldImg:'',
        image:'',

        content1:'',
        content2:'',

        // Gestionar imagenes de eventos

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



    },
    created:function () {
        this.getDatos(this.thispage);
    },
    mounted: function () {
       $("#divtitulo").show('slow');
        this.divloader0=false;
        this.divprincipal=true;
        //console.log("aqui");
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
            var v1 = 0;
            var v2 = 0;
            var v3 = 0;
            var url = '/intranet/eventosre?page='+page+'&busca='+busca+'&v1='+v1+'&v2='+v2+'&v3='+v3;

            axios.get(url).then(response=>{

                this.eventos= response.data.eventos.data;
                this.pagination= response.data.pagination;

                //this.mostrarPalenIni=true;

                if(this.eventos.length==0 && this.thispage!='1'){
                    var a = parseInt(this.thispage) ;
                    a--;
                    this.thispage=a.toString();
                    this.changePage(this.thispage);
                }
            })
        },
        changePage:function (page) {
            this.pagination.current_page=page;
            this.getDatos(page);
            this.thispage=page;
        },
        buscarBtn: function () {
            this.getDatos();
            this.thispage='1';
        },
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
            this.fecha = '{{ $fecha }}',
            this.hora = '00:00:00',
            this.titular = '',
            this.desarrollo = '',
            this.tieneimagen = 1,
            this.url = '',
            this.activo = 1,

            this.imagen=null;
            this.uploadReady = false
            this.$nextTick(() => {
                this.uploadReady = true;
                $('#txttitular').focus();
                if(CKEDITOR.instances['editor1'] != undefined && CKEDITOR.instances['editor1'] != null){
                    CKEDITOR.instances['editor1'].setData("");
                }
            })

            this.divEdit=false;
        },
        getImage(event){
            //Asignamos la imagen a  nuestra data

            if (!event.target.files.length)
            {
                this.imagen=null;
            }
            else{
            this.imagen = event.target.files[0];
            }
        },

        create:function () {
            var url='/intranet/eventosre';

            $("#btnGuardar").attr('disabled', true);
            $("#btnCancel").attr('disabled', true);
            $("#btnClose").attr('disabled', true);

            this.desarrollo=CKEDITOR.instances['editor1'].getData();
            this.divloaderNuevo=true;

            var v1 = 0;
            var v2 = 0;
            var v3 = 0;

            var data = new  FormData();

            data.append('fecha', this.fecha);
            data.append('hora', this.hora);
            data.append('titulo', this.titular);
            data.append('desarrollo', this.desarrollo);
            data.append('tieneimagen', this.tieneimagen);
            data.append('url', this.url);
            data.append('activo', this.activo);
            data.append('imagen', this.imagen);
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
        borrar:function (dato) {
          swal.fire({
              title: '¿Estás seguro?',
              text: "¿Desea eliminar el Evento seleccionado? -- Nota: Este proceso no se podrá revertir",
              type: 'info',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, eliminar'
          }).then((result) => {


            if (result.value) {
                var url = '/intranet/eventosre/'+dato.id;
                axios.delete(url).then(response=>{//eliminamos

                    if(response.data.result=='1'){
                        app.getDatos(app.thispage);//listamos
                        toastr.success(response.data.msj);//mostramos mensaje
                    }else{
                        // $('#'+response.data.selector).focus();
                        toastr.error(response.data.msj);
                    }
                });
            }

            }).catch(swal.noop);
        },
        edit:function (dato) {

        this.uploadReadyE=false;

            this.fillobject.id=dato.id;
            this.fillobject.fecha=dato.fecha;
            this.fillobject.hora=dato.hora;
            this.fillobject.titular=dato.titulo;
            this.fillobject.desarrollo=dato.desarrollo;
            this.fillobject.tieneimagen=dato.tieneimagen;
            this.fillobject.activo=dato.activo;

            if(this.fillobject.tieneimagen == 1){
              dato.imagenevento.forEach( function(valor, indice, array) {
                if(valor.posicion == 0){
                  console.log(valor.url);
                  app.fillobject.url = valor.url;
                  app.oldImg = valor.url;
                }
               });
            }

            this.divNuevo=false;
            this.divEdit=true;
            this.divloaderEdit=false;

            this.$nextTick(() => {
                CKEDITOR.instances['editor2'].setData(dato.desarrollo);
                this.imagenE=null;
                this.uploadReadyE=true;
            });

        },
        cerrarFormE: function(){

            this.divEdit=false;

            this.$nextTick(function () {
                this.fillobject={ 'id':'', 
                                'fecha':'', 
                                'hora':'', 
                                'titular':'', 
                                'desarrollo':'', 
                                'tieneimagen':'', 
                                'url':'',
                                'activo':'',
                                'oldImg':''};
    
            })

        },

        getImageE(event){
            if (!event.target.files.length)
            {
                this.imagenE=null;
            }
            else{
            this.imagenE = event.target.files[0];
            }
        },

        update: function (id) {

            var url="/intranet/eventosre/"+id;
            $("#btnSaveE").attr('disabled', true);
            $("#btnCloseE").attr('disabled', true);
            this.divloaderEdit=true;

            this.fillobject.oldImg= this.oldImg;
            this.fillobject.desarrollo=CKEDITOR.instances['editor2'].getData();

            var data = new  FormData();

            var v1 = 0;

            data.append('id', this.fillobject.id);
            data.append('fecha', this.fillobject.fecha);
            data.append('hora', this.fillobject.hora);
            data.append('titulo', this.fillobject.titular);
            data.append('desarrollo', this.fillobject.desarrollo);
            data.append('tieneimagen', this.fillobject.tieneimagen);
            data.append('url', this.fillobject.url);
            data.append('activo', this.fillobject.activo);

            data.append('imagen', this.imagenE);
            data.append('oldimg', this.fillobject.oldImg);
            data.append('v1', v1);

            data.append('_method', 'PUT');

            const config = { headers: { 'Content-Type': 'multipart/form-data' } };


            axios.post(url, data, config).then(response=>{


                $("#btnSaveE").removeAttr("disabled");
                $("#btnCloseE").removeAttr("disabled");
                this.divloaderEdit=false;
                
                if(response.data.result=='1'){   
                    this.getDatos(this.thispage);
                    this.cerrarFormE();
                    toastr.success(response.data.msj);

                }else{
                    $('#'+response.data.selector).focus();
                    toastr.error(response.data.msj);
                }

            }).catch(error=>{
                this.errors=error.response.data
            })
        },
        baja:function (dato) {
          swal.fire({
              title: '¿Estás seguro?',
              text: "Nota: Si se desactiva el Evento, No se mostrará en el Portal Web, hasta que sea activado nuevamente",
              type: 'info',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, desactivar'
          }).then((result) => {

            if (result.value) {
                var url = '/intranet/eventosre/altabaja/'+dato.id+'/0';
                axios.get(url).then(response=>{//eliminamos

                    if(response.data.result=='1'){
                        app.getDatos(app.thispage);//listamos
                        toastr.success(response.data.msj);//mostramos mensaje
                    }else{
                        // $('#'+response.data.selector).focus();
                        toastr.error(response.data.msj);
                    }
                });
            }

        }).catch(swal.noop);
      },
      alta:function (dato) {
          swal.fire({
              title: '¿Estás seguro?',
              text: "Nota: Si activa el Evento, se mostrará en el Portal Web",
              type: 'info',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, Activar'
          }).then((result) => {

            if (result.value) {
                var url = '/intranet/eventosre/altabaja/'+dato.id+'/1';
                axios.get(url).then(response=>{//eliminamos

                if(response.data.result=='1'){
                    app.getDatos(app.thispage);//listamos
                    toastr.success(response.data.msj);//mostramos mensaje
                }else{
                    // $('#'+response.data.selector).focus();
                    toastr.error(response.data.msj);
                }
                });
            }
        }).catch(swal.noop);
      },

      //Seccion Imagenes de detalle Evento


      gestionarImages:function (dato){

          this.fillobject.id=dato.id;
          this.fillobject.fecha=dato.fecha;
          this.fillobject.hora=dato.hora;
          this.fillobject.titular=dato.titulo;
          this.fillobject.desarrollo=dato.desarrollo;
          this.fillobject.tieneimagen=dato.tieneimagen;
          this.fillobject.activo=dato.activo;


          this.detalleImagenes = dato.imagenevento;

          this.divNuevaImagen=false;
          this.divEditImagen=false;
          this.divloaderNuevoImg=false;
          this.divloaderEditImg=false;

          /*
          this.formuModal=false;

          this.$nextTick(() => {
            this.formuModal=true;
              });*/

          $("#boxTituloModalDetalles").text("Evento: "+dato.titulo);
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
          var url='/intranet/imageneventosre';

          $("#btnGuardarImg").attr('disabled', true);
          $("#btnCancelImg").attr('disabled', true);
          $("#btnCloseImg").attr('disabled', true);

          this.descripcionImg=CKEDITOR.instances['editor3'].getData();
          this.divloaderNuevoImg=true;

          var data = new  FormData();

          var v1 = 0;
          var v2 = 0;
          var v3 = 0;

          data.append('nombre', this.nombreImg);
          data.append('descripcion', this.descripcionImg);
          data.append('posicion', this.posicion);
          data.append('url', this.url);
          data.append('imagen', this.imagenDetalle);
          data.append('evento_id', this.fillobject.id);
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

          var url = '/intranet/imageneventosre?evento_id='+this.fillobject.id;
          axios.get(url).then(response=>{

              this.detalleImagenes= response.data.imagenevento;

              this.eventos.forEach( function(valor, indice, array) {
                if(valor.id == app.fillobject.id){
                  app.eventos[indice].imagenevento = app.detalleImagenes;
                }
            });


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
              var url = '/intranet/imageneventosre/'+dato.id;
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

          var url="/intranet/imageneventosre/"+id;
          $("#btnSaveEImg").attr('disabled', true);
          $("#btnCloseEImg").attr('disabled', true);
          this.divloaderEdit=true;

          this.fillobjectImg.oldImg= this.oldImgDetalle;
          this.fillobjectImg.descripcion=CKEDITOR.instances['editor4'].getData();

          var v1 = 0;

          var data = new  FormData();

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

}
});
</script>