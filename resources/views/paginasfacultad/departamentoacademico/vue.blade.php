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
        titulo:"Portal Web Facultades",
        subtitulo: "Gestión de Departamentos Académicos",
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


        departamentos: [],
        errors:[],

        fillobject:{ 'id':'', 
                    'nombre':'', 
                    'descripcion':'', 
                    'direccion':'', 
                    'telefono':'', 
                    'email':'', 
                    'tieneimagen':0, 
                    'url':'',
                    'director':'',
                    'descripcion_director':'',
                    'descripcion_corta_director':'',
                    'tieneimagen_director': 0,
                    'url_director':'',
                    'activo':'',
                    'facultad_id':0,
                    'oldImg':'', 'oldImg2':''},

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
        descripcion : '',
        direccion : '',
        telefono : '',
        email : '',
        tieneimagen : 1,
        url : '',
        director : '',
        descripcion_director : '',
        descripcion_corta_director : '',
        tieneimagen_director : 1,
        url_director : '',
        activo : 1,
        
        divloaderNuevo:false,
        divloaderEdit:false,

        mostrarPalenIni:true,

        thispage:'1',
        divprincipal:false,

        imagen : null,
        uploadReady: true,

        imagen2 : null,
        uploadReady2: true,

        imagenE : null,
        uploadReadyE: false,

        imagen2E : null,
        uploadReady2E: false,

        oldImg:'',
        oldImg2:'',
        image:'',
        image2:'',

        content1:'',
        content2:'',
        content3:'',
        content4:'',


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
            var v1 = this.nivel;
            var v2 = this.facultad_id;
            var v3 = 0;
            var url = '/intranet/departamentosre?page='+page+'&busca='+busca+'&v1='+v1+'&v2='+v2+'&v3='+v3;

            axios.get(url).then(response=>{

                this.departamentos= response.data.departamentos.data;
                this.pagination= response.data.pagination;

                //this.mostrarPalenIni=true;

                if(this.departamentos.length==0 && this.thispage!='1'){
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
          this.descripcion = '';
          this.direccion = '';
          this.telefono = '';
          this.email = '';
          this.tieneimagen = 1;
          this.url = '';
          this.director = '';
          this.descripcion_director = '';
          this.descripcion_corta_director = '';
          this.tieneimagen_director = 1;
          this.url_director = '';
          this.activo = 1;

            this.imagen=null;
            this.imagen2=null;
            this.uploadReady = false
            this.uploadReady2 = false
            this.$nextTick(() => {
                this.uploadReady = true;
                this.uploadReady2 = true;
                $('#txtnombre').focus();
                if(CKEDITOR.instances['editor1'] != undefined && CKEDITOR.instances['editor1'] != null){
                    CKEDITOR.instances['editor1'].setData("");
                }
                if(CKEDITOR.instances['editor2'] != undefined && CKEDITOR.instances['editor2'] != null){
                    CKEDITOR.instances['editor2'].setData("");
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

        getImage2(event){
            //Asignamos la imagen a  nuestra data

            if (!event.target.files.length)
            {
                this.imagen2=null;
            }
            else{
            this.imagen2 = event.target.files[0];
            }
        },

        create:function () {
            var url='/intranet/departamentosre';

            $("#btnGuardar").attr('disabled', true);
            $("#btnCancel").attr('disabled', true);
            $("#btnClose").attr('disabled', true);

            this.descripcion=CKEDITOR.instances['editor1'].getData();
            this.descripcion_director=CKEDITOR.instances['editor1'].getData();
            this.divloaderNuevo=true;

            var v1 = this.nivel;
            var v2 = this.facultad_id;
            var v3 = 0;

            var data = new  FormData();

            data.append('nombre', this.nombre);
            data.append('descripcion', this.descripcion);
            data.append('direccion', this.direccion);
            data.append('telefono', this.telefono);
            data.append('email', this.email);
            data.append('tieneimagen', this.tieneimagen);
            data.append('url', this.url);
            data.append('director', this.director);
            data.append('descripcion_director', this.descripcion_director);
            data.append('descripcion_corta_director', this.descripcion_corta_director);
            data.append('tieneimagen_director', this.tieneimagen_director);
            data.append('url_director', this.url_director);
            data.append('activo', this.activo);
            data.append('imagen', this.imagen);
            data.append('imagen2', this.imagen2);
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
              text: "¿Desea eliminar el Departamento Académico seleccionado? -- Nota: Este proceso no se podrá revertir",
              type: 'info',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, eliminar'
          }).then((result) => {


            if (result.value) {
                var url = '/intranet/departamentosre/'+dato.id;
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
            this.fillobject.descripcion=dato.descripcion;
            this.fillobject.direccion=dato.direccion;
            this.fillobject.telefono=dato.telefono;
            this.fillobject.email=dato.email;
            this.fillobject.tieneimagen=dato.tieneimagen;
            this.fillobject.url=dato.url;
            this.fillobject.director=dato.director;
            this.fillobject.descripcion_director=dato.descripcion_director;
            this.fillobject.descripcion_corta_director=dato.descripcion_corta_director;
            this.fillobject.tieneimagen_director=dato.tieneimagen_director;
            this.fillobject.url_director=dato.url_director;
            this.fillobject.activo=dato.activo;


            this.fillobject.oldImg=dato.url;
            this.fillobject.oldImg2=dato.url_director;
            this.fillobject.facultad_id=dato.facultad_id;

            this.oldImg=dato.url;
            this.oldImg2=dato.url_director;


            this.divNuevo=false;
            this.divEdit=true;
            this.divloaderEdit=false;

            this.$nextTick(() => {
                CKEDITOR.instances['editor3'].setData(dato.descripcion);
                CKEDITOR.instances['editor4'].setData(dato.descripcion_director);
                this.imagenE=null;
                this.uploadReadyE=true;
                this.imagen2E=null;
                this.uploadReady2E=true;
                $("#txtnombreE").focus();
            });

        },
        cerrarFormE: function(){

            this.divEdit=false;

            this.$nextTick(function () {
                this.fillobject={ 'id':'', 
                                'nombre':'', 
                                'descripcion':'', 
                                'direccion':'', 
                                'telefono':'', 
                                'email':'', 
                                'tieneimagen':0, 
                                'url':'',
                                'director':'',
                                'descripcion_director':'',
                                'descripcion_corta_director':'',
                                'tieneimagen_director': 0,
                                'url_director':'',
                                'activo':'',
                                'facultad_id':0,
                                'oldImg':'', 'oldImg2':''};
    
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

        getImage2E(event){
            if (!event.target.files.length)
            {
                this.imagen2E=null;
            }
            else{
            this.imagen2E = event.target.files[0];
            }
        },

        update: function (id) {

            var url="/intranet/departamentosre/"+id;
            $("#btnSaveE").attr('disabled', true);
            $("#btnCloseE").attr('disabled', true);
            this.divloaderEdit=true;

            this.fillobject.oldImg= this.oldImg;
            this.fillobject.oldImg2= this.oldImg2;
            this.fillobject.descripcion=CKEDITOR.instances['editor3'].getData();
            this.fillobject.descripcion_director=CKEDITOR.instances['editor4'].getData();

            var v1 = this.nivel;
            var v2 = this.facultad_id;

            var data = new  FormData();

            data.append('id', this.fillobject.id);
            data.append('nombre', this.fillobject.nombre);
            data.append('descripcion', this.fillobject.descripcion);
            data.append('direccion', this.fillobject.direccion);
            data.append('telefono', this.fillobject.telefono);
            data.append('email', this.fillobject.email);
            data.append('tieneimagen', this.fillobject.tieneimagen);
            data.append('url', this.fillobject.url);
            data.append('director', this.fillobject.director);
            data.append('descripcion_director', this.fillobject.descripcion_director);
            data.append('descripcion_corta_director', this.fillobject.descripcion_corta_director);
            data.append('tieneimagen_director', this.fillobject.tieneimagen_director);
            data.append('url_director', this.fillobject.url_director);
            data.append('activo', this.fillobject.activo);

            data.append('imagen', this.imagenE);
            data.append('imagen2', this.imagen2E);
            data.append('oldimg', this.fillobject.oldImg);
            data.append('oldimg2', this.fillobject.oldImg2);
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
              text: "Nota: Si se desactiva el Departamento Académico, No se mostrará en el Portal Web, hasta que sea activada nuevamente",
              type: 'info',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, desactivar'
          }).then((result) => {

            if (result.value) {
                var url = '/intranet/departamentosre/altabaja/'+dato.id+'/0';
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
              text: "Nota: Si activa el Departamento Académico, se mostrará en el Portal Web",
              type: 'info',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, Activar'
          }).then((result) => {

            if (result.value) {
                var url = '/intranet/departamentosre/altabaja/'+dato.id+'/1';
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