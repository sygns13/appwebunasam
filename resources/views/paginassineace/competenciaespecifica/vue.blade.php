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



 let app = new Vue({
    el: '#app',
    data:{
        titulo:"Indicadores SINEACE Programas de Estudios",
        subtitulo: "Gestión de Competencias Específicas",
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
        classMenu4:'active',
        classMenu5:'',
        classMenu6:'',
        classMenu7:'',
        classMenu8:'',
        classMenu9:'',
        classMenu10:'',
        classMenu11:'',
        classMenu12:'',


        registros: [],
        errors:[],

        fillobject:{ 'id':'', 'titulo':'', 'descripcion':'','nombrefile':'','url':'', 'urlfile':'','activo':'','oldImg':'', 'oldFile':'', 'tieneimagen':'','tienearchivo':''},

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

        tituloO : '',
        descripcion : '',
        url : '',
        urlfile : '',
        activo : 1,


        divloaderNuevo:false,
        divloaderEdit:false,

        mostrarPalenIni:true,

        thispage:'1',
        divprincipal:false,

        imagen : null,
        archivo : null,
        nombrefile : '',
        uploadReady: true,

        imagenE : null,
        archivoE : null,
        uploadReadyE: false,

        oldImg:'',
        oldFile:'',
        image:'',
        file:'',

        content1:'',
        content2:'',

        nameAdjunto:'',
        urlAdjunto:'',
        iflink:false,
        nameAdjuntoE:'',


        tipo:3, //competencias especificas

        //seccion programas
        nivel : 2,
        programa:'',
        programa_id: 0,


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
            var v2 = 0;
            var v3 = this.programa_id;
            var url = '/intranet/indicadorsineacere?page='+page+'&busca='+busca+'&v1='+v1+'&v2='+v2+'&v3='+v3+'&tipo='+this.tipo;

            axios.get(url).then(response=>{

                this.registros= response.data.registros.data;
                this.pagination= response.data.pagination;

                //this.mostrarPalenIni=true;

                if(this.registros.length==0 && this.thispage!='1'){
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

            this.tituloO = '';
            this.descripcion = '';
            this.url = '';
            this.urlfile = '';
            this.nombrefile = '';
            this.activo = 1;
            this.tieneimagen = 1;
            this.tienearchivo = 1;
            this.tipo = 3;

            this.imagen=null;
            this.archivo=null;
            this.uploadReady = false
            this.$nextTick(() => {
            this.uploadReady = true;
                $('#txttitulo').focus();
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

        getArchivo(event){
            //Asignamos la imagen a  nuestra data

            if (!event.target.files.length)
            {
              this.archivo=null;
            }
            else{
            this.archivo = event.target.files[0];
            }
        },

        create:function () {
            var url='/intranet/indicadorsineacere';

            $("#btnGuardar").attr('disabled', true);
            $("#btnCancel").attr('disabled', true);
            $("#btnClose").attr('disabled', true);

            this.descripcion=CKEDITOR.instances['editor1'].getData();
            this.divloaderNuevo=true;

            var v1 = this.nivel;
            var v2 = 0;
            var v3 = this.programa_id;


            var data = new  FormData();

            data.append('titulo', this.tituloO);
            data.append('descripcion', this.descripcion);
            data.append('tieneimagen', this.tieneimagen);
            data.append('tienearchivo', this.tienearchivo);
            data.append('url', this.url);
            data.append('urlfile', this.urlfile);
            data.append('tipo', this.tipo);
            data.append('nombrefile', this.nombrefile);
            data.append('activo', this.activo);
            data.append('imagen', this.imagen);
            data.append('archivo', this.archivo);
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
              text: "¿Desea eliminar el Contenido seleccionado? -- Nota: Este proceso no se podrá revertir",
              type: 'info',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, eliminar'
          }).then((result) => {


            if (result.value) {
                var url = '/intranet/indicadorsineacere/'+dato.id;
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
        borrarImage:function (dato) {
          swal.fire({
              title: '¿Estás seguro?',
              text: "¿Desea eliminar la Imagen seleccionado? -- Nota: Este proceso no se podrá revertir",
              type: 'info',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, eliminar'
          }).then((result) => {


            if (result.value) {
                var url = '/intranet/indicadorsineacere/deleteimg/'+dato.id;
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
        borrarFile:function (dato) {
          swal.fire({
              title: '¿Estás seguro?',
              text: "¿Desea eliminar el Archivo seleccionado? -- Nota: Este proceso no se podrá revertir",
              type: 'info',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, eliminar'
          }).then((result) => {


            if (result.value) {
                var url = '/intranet/indicadorsineacere/deletefile/'+dato.id;
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
            this.fillobject.titulo=dato.titulo;
            this.fillobject.descripcion=dato.descripcion;
            this.fillobject.tieneimagen=dato.tieneimagen;
            this.fillobject.tienearchivo=dato.tienearchivo;
            this.fillobject.url=dato.url;
            this.fillobject.urlfile=dato.urlfile;
            this.fillobject.nombrefile=dato.nombrefile;
            this.fillobject.activo=dato.activo;

            this.oldImg=dato.url;
            this.oldFile=dato.urlfile;
           

            this.divNuevo=false;
            this.divEdit=true;
            this.divloaderEdit=false;

            this.$nextTick(() => {
            this.imagenE=null;
            this.archivoE=null;
            this.uploadReadyE=true;
            CKEDITOR.instances['editor2'].setData(dato.descripcion);
            $('#txttituloE').focus();
        });

        },
        cerrarFormE: function(){

            this.divEdit=false;

            this.$nextTick(function () {
                this.fillobject={ 'id':'', 'titulo':'', 'descripcion':'','nombrefile':'','url':'', 'urlfile':'','activo':'','oldImg':'', 'oldFile':'', 'tieneimagen':'','tienearchivo':''};
    
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

        getArchivoE(event){
                //Asignamos la imagen a  nuestra data

                if (!event.target.files.length)
                {
                  this.archivoE=null;
                }
                else{
                this.archivoE = event.target.files[0];
                }
            },

        update: function (id) {

            var url="/intranet/indicadorsineacere/"+id;
            $("#btnSaveE").attr('disabled', true);
            $("#btnCloseE").attr('disabled', true);
            this.divloaderEdit=true;

            this.fillobject.oldImg= this.oldImg;
            this.fillobject.oldFile= this.oldFile;

            this.fillobject.descripcion=CKEDITOR.instances['editor2'].getData();
            var v1 = this.nivel;
            var v2 = 0;
            var v3 = this.programa_id;

            var data = new  FormData();

            data.append('id', this.fillobject.id);
            data.append('titulo', this.fillobject.titulo);
            data.append('descripcion', this.fillobject.descripcion);
            data.append('nombrefile', this.fillobject.nombrefile);
            data.append('url', this.fillobject.url);
            data.append('urlfile', this.fillobject.urlfile);
            data.append('activo', this.fillobject.activo);
            data.append('tieneimagen', this.fillobject.tieneimagen);
            data.append('tienearchivo', this.fillobject.tienearchivo);

            data.append('imagen', this.imagenE);
            data.append('archivo', this.archivoE);
            data.append('oldimg', this.fillobject.oldImg);
            data.append('oldfile', this.fillobject.oldFile);

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
              text: "Nota: Si se desactiva el Contenido, No se mostrará en el Portal del Programa de Estudio, hasta que sea activado nuevamente",
              type: 'info',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, desactivar'
          }).then((result) => {

            if (result.value) {
                var url = '/intranet/indicadorsineacere/altabaja/'+dato.id+'/0';
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
              text: "Nota: Si activa el Contenido, se mostrará en el Portal del Programa de Estudio en el número de su posición",
              type: 'info',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, Activar'
          }).then((result) => {

            if (result.value) {
                var url = '/intranet/indicadorsineacere/altabaja/'+dato.id+'/1';
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

      //Modificaciones Programas
     irAtras:function(){
            this.programa_id = 0;
            this.programa = '';
            this.divNuevo = false;
            this.divNuevoLogo = false;
        },
        cambioPrograma:function(){
            this.programa = $('#cbuprograma_id option:selected').html();
            this.getDatos(this.thispage);
        },
    

}
});
</script>