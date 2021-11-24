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
        default: '200px',
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
        default: '200px',
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
        subtitulo: "Gestión de Documentos Normativos",
        subtitulo2: "Principal",

        subtitle2:false,
        subtitulo2:"",

        tipouserPerfil:'{{ $tipouser->tituloO }}',
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


        documentos: [],
        errors:[],

        fillobject:{ 'id':'', 'nombre':'','url':'','numero':'', 'fecha':'', 'descripcion':'','activo':'', 'oldFile':''},

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

        nombre : '',
        url : '',
        numero : '',
        fecha : '',
        descripcion : '',
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


        tipo:1,

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
            var url = '/intranet/documentore?page='+page+'&busca='+busca+'&v1='+v1+'&v2='+v2+'&v3='+v3+'&tipo='+this.tipo;

            axios.get(url).then(response=>{

                this.documentos= response.data.documentos.data;
                this.pagination= response.data.pagination;

                //this.mostrarPalenIni=true;

                if(this.documentos.length==0 && this.thispage!='1'){
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

            this.nombre = '';
            this.url = '';
            this.numero = '';
            this.fecha = '';
            this.descripcion = '';
            this.activo = 1;

            this.tipo = 1;

            this.archivo=null;
            this.uploadReady = false
            this.$nextTick(() => {
            this.uploadReady = true;
                $('#txtnombre').focus();
                if(CKEDITOR.instances['editor1'] != undefined && CKEDITOR.instances['editor1'] != null){
                    CKEDITOR.instances['editor1'].setData("");
                }
            })

            this.divEdit=false;
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
            var url='/intranet/documentore';

            $("#btnGuardar").attr('disabled', true);
            $("#btnCancel").attr('disabled', true);
            $("#btnClose").attr('disabled', true);

            this.descripcion=CKEDITOR.instances['editor1'].getData();
            this.divloaderNuevo=true;

            var v1 = this.nivel;
            var v2 = this.facultad_id;
            var v3 = 0;


            var data = new  FormData();

            data.append('nombre', this.nombre);
            data.append('url', this.url);
            data.append('numero', this.numero);
            data.append('fecha', this.fecha);
            data.append('descripcion', this.descripcion);
            data.append('tipo', this.tipo);
            data.append('activo', this.activo);
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
              text: "¿Desea eliminar el Documento seleccionado? -- Nota: Este proceso no se podrá revertir",
              type: 'info',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, eliminar'
          }).then((result) => {


            if (result.value) {
                var url = '/intranet/documentore/'+dato.id;
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
            this.fillobject.nombre=dato.nombre;
            this.fillobject.url=dato.url;
            this.fillobject.numero=dato.numero;
            this.fillobject.fecha=dato.fecha;
            this.fillobject.descripcion=dato.descripcion;
            this.fillobject.activo=dato.activo;

            this.oldFile=dato.url;
           

            this.divNuevo=false;
            this.divEdit=true;
            this.divloaderEdit=false;

            this.$nextTick(() => {
            this.archivoE=null;
            this.uploadReadyE=true;
            CKEDITOR.instances['editor2'].setData(dato.descripcion);
            $('#txtnombreE').focus();
        });

        },
        cerrarFormE: function(){

            this.divEdit=false;

            this.$nextTick(function () {
                this.fillobject = { 'id':'', 'nombre':'','url':'','numero':'', 'fecha':'', 'descripcion':'','activo':'', 'oldFile':''};
    
            })

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

            var url="/intranet/documentore/"+id;
            $("#btnSaveE").attr('disabled', true);
            $("#btnCloseE").attr('disabled', true);
            this.divloaderEdit=true;

            this.fillobject.oldImg= this.oldImg;
            this.fillobject.oldFile= this.oldFile;

            this.fillobject.descripcion=CKEDITOR.instances['editor2'].getData();
            var v1 = this.nivel;
            var v2 = this.facultad_id;

            var data = new  FormData();

            data.append('id', this.fillobject.id);
            data.append('nombre', this.fillobject.nombre);
            data.append('url', this.fillobject.url);
            data.append('numero', this.fillobject.numero);
            data.append('fecha', this.fillobject.fecha);
            data.append('descripcion', this.fillobject.descripcion);
            data.append('activo', this.fillobject.activo);
            data.append('tipo', this.tipo);

            data.append('archivo', this.archivoE);
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
              text: "Nota: Si se desactiva el Documento, No se mostrará en el Portal Web UNASAM, hasta que sea activado nuevamente",
              type: 'info',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, desactivar'
          }).then((result) => {

            if (result.value) {
                var url = '/intranet/documentore/altabaja/'+dato.id+'/0';
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
              text: "Nota: Si activa el Documento, se mostrará en el Portal Web UNASAM en el número de su posición",
              type: 'info',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, Activar'
          }).then((result) => {

            if (result.value) {
                var url = '/intranet/documentore/altabaja/'+dato.id+'/1';
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