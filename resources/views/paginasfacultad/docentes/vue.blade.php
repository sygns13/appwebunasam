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



Vue.component('ckeditor5', {
  template: `<div class="ckeditor"><textarea :id="id" :value="value"></textarea></div>`,
  props: {
      value: {
        type: String
      },
      id: {
        type: String,
        default: 'editor5'
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




Vue.component('ckeditor6', {
  template: `<div class="ckeditor"><textarea :id="id" :value="value"></textarea></div>`,
  props: {
      value: {
        type: String
      },
      id: {
        type: String,
        default: 'editor6'
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



Vue.component('ckeditor7', {
  template: `<div class="ckeditor"><textarea :id="id" :value="value"></textarea></div>`,
  props: {
      value: {
        type: String
      },
      id: {
        type: String,
        default: 'editor7'
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



Vue.component('ckeditor8', {
  template: `<div class="ckeditor"><textarea :id="id" :value="value"></textarea></div>`,
  props: {
      value: {
        type: String
      },
      id: {
        type: String,
        default: 'editor8'
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


        docentes: [],
        errors:[],

        fillobject:{ 'id':'', 
                    'nombre':'', 
                    'grados':'', 
                    'tieneimagen':0, 
                    'urlimagen':'',
                    'tienelink':0, 
                    'urllink':'',
                    'fecha':'', 
                    'activo':'',
                    'nivel':'',
                    'facultad_id':0,
                    'programaestudio_id':0,
                    'departamentoacademico_id':0,
                    'categoria':'', 
                    'regimen':'', 
                    'condicion':'',
                    'experiencia':'',
                    'publicaciones':'',
                    'investigaciones':'',
                    'especialidad':'',
                    'telefono':'',
                    'email':'',
                    'tipo_documento': 0,
                    'documento':'',
                    'oldImg':'', 'oldFile':''},

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
        grados : '',
        tieneimagen : 1,
        urlimagen : '',
        tienelink : 0,
        urllink : '',
        fecha : '',
        activo : 1,
        departamentoacademico_id : 0,
        categoria : '',
        regimen : '',
        condicion : '',
        experiencia : '',
        publicaciones : '',
        investigaciones : '',
        especialidad : '',
        telefono : '',
        email : '',
        tipo_documento : 0,
        documento : '',
        
        divloaderNuevo:false,
        divloaderEdit:false,

        mostrarPalenIni:true,

        thispage:'1',
        divprincipal:false,

        imagen : null,
        archivo : null,
        nombrefile : '',
        uploadReady: true,
        uploadReadyFile: true,

        imagenE : null,
        archivoE : null,
        uploadReadyE: false,
        uploadReadyEFile: false,

        oldImg:'',
        oldFile:'',
        image:'',
        file:'',

        content1:'',
        content2:'',
        content3:'',
        content4:'',
        content5:'',
        content6:'',
        content7:'',
        content8:'',


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
            var url = '/intranet/docentesfacre?page='+page+'&busca='+busca+'&v1='+v1+'&v2='+v2+'&v3='+v3;

            axios.get(url).then(response=>{

                this.docentes= response.data.docentes.data;
                this.pagination= response.data.pagination;

                //this.mostrarPalenIni=true;

                if(this.docentes.length==0 && this.thispage!='1'){
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
          this.grados = '';
          this.tieneimagen = 1;
          this.urlimagen = '';
          this.tienelink = 0;
          this.urllink = '';
          this.fecha = '';
          this.activo = 1;
          this.departamentoacademico_id = 0;
          this.categoria = '';
          this.regimen = '';
          this.condicion = '';
          this.experiencia = '';
          this.publicaciones = '';
          this.investigaciones = '';
          this.especialidad = '';
          this.telefono = '';
          this.email = '';
          this.tipo_documento = 0;
          this.documento = '';

            this.imagen=null;
            this.uploadReady = false
            this.archivo=null;
            this.uploadReady = false
            
            this.$nextTick(() => {
                this.uploadReady = true;
                this.uploadReadyFile = true;
                $('#txtnombre').focus();
                if(CKEDITOR.instances['editor1'] != undefined && CKEDITOR.instances['editor1'] != null){
                    CKEDITOR.instances['editor1'].setData("");
                }
                if(CKEDITOR.instances['editor2'] != undefined && CKEDITOR.instances['editor2'] != null){
                    CKEDITOR.instances['editor2'].setData("");
                }
                if(CKEDITOR.instances['editor3'] != undefined && CKEDITOR.instances['editor3'] != null){
                    CKEDITOR.instances['editor3'].setData("");
                }
                if(CKEDITOR.instances['editor4'] != undefined && CKEDITOR.instances['editor4'] != null){
                    CKEDITOR.instances['editor4'].setData("");
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
            var url='/intranet/docentesfacre';

            $("#btnGuardar").attr('disabled', true);
            $("#btnCancel").attr('disabled', true);
            $("#btnClose").attr('disabled', true);

            this.grados=CKEDITOR.instances['editor1'].getData();
            this.experiencia=CKEDITOR.instances['editor2'].getData();
            this.publicaciones=CKEDITOR.instances['editor3'].getData();
            this.investigaciones=CKEDITOR.instances['editor4'].getData();

            this.divloaderNuevo=true;

            var v1 = this.nivel;
            var v2 = this.facultad_id;
            var v3 = 0;

            var data = new  FormData();

            data.append('nombre', this.nombre);
            data.append('grados', this.grados);
            data.append('tieneimagen', this.tieneimagen);
            data.append('urlimagen', this.urlimagen);
            data.append('tienelink', this.tienelink);
            data.append('urllink', this.urllink);
            data.append('fecha', this.fecha);
            data.append('activo', this.activo);
            data.append('departamentoacademico_id', this.departamentoacademico_id);
            data.append('categoria', this.categoria);
            data.append('regimen', this.regimen);
            data.append('condicion', this.condicion);
            data.append('experiencia', this.experiencia);
            data.append('publicaciones', this.publicaciones);
            data.append('investigaciones', this.investigaciones);
            data.append('especialidad', this.especialidad);
            data.append('telefono', this.telefono);
            data.append('email', this.email);
            data.append('tipo_documento', this.tipo_documento);
            data.append('documento', this.documento);
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
              text: "¿Desea eliminar el Docente seleccionado? -- Nota: Este proceso no se podrá revertir",
              type: 'info',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, eliminar'
          }).then((result) => {


            if (result.value) {
                var url = '/intranet/docentesfacre/'+dato.id;
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
        this.uploadReadyEFile=false;

            this.fillobject.id=dato.id;
            this.fillobject.nombre=dato.nombre;
            this.fillobject.grados=dato.grados;
            this.fillobject.tieneimagen=dato.tieneimagen;
            this.fillobject.urlimagen=dato.urlimagen;
            this.fillobject.tienelink=dato.tienelink;
            this.fillobject.urllink=dato.urllink;
            this.fillobject.fecha=dato.fecha;
            this.fillobject.activo=dato.activo;
            this.fillobject.nivel=dato.nivel;
            this.fillobject.facultad_id=dato.facultad_id;
            this.fillobject.programaestudio_id=dato.programaestudio_id;
            this.fillobject.departamentoacademico_id=dato.departamentoacademico_id;
            this.fillobject.categoria=dato.categoria;
            this.fillobject.regimen=dato.regimen;
            this.fillobject.condicion=dato.condicion;
            this.fillobject.experiencia=dato.experiencia;
            this.fillobject.publicaciones=dato.publicaciones;
            this.fillobject.investigaciones=dato.investigaciones;
            this.fillobject.especialidad=dato.especialidad;
            this.fillobject.telefono=dato.telefono;
            this.fillobject.email=dato.email;
            this.fillobject.tipo_documento=dato.tipo_documento;
            this.fillobject.documento=dato.documento;



            this.fillobject.oldImg=dato.url;
            this.fillobject.oldImg2=dato.url_director;

            this.oldImg=dato.url;
            this.oldFile=dato.urllink;


            this.divNuevo=false;
            this.divEdit=true;
            this.divloaderEdit=false;

            this.$nextTick(() => {
                CKEDITOR.instances['editor5'].setData(dato.grados);
                CKEDITOR.instances['editor6'].setData(dato.experiencia);
                CKEDITOR.instances['editor7'].setData(dato.publicaciones);
                CKEDITOR.instances['editor8'].setData(dato.investigaciones);
                this.imagenE=null;
                this.uploadReadyE=true;
                this.archivoE=null;
                this.uploadReadyEFile=true;
                $("#txtnombreE").focus();
            });

        },
        cerrarFormE: function(){

            this.divEdit=false;

            this.$nextTick(function () {
                this.fillobject={ 'id':'', 
                                  'nombre':'', 
                                  'grados':'', 
                                  'tieneimagen':0, 
                                  'urlimagen':'',
                                  'tienelink':0, 
                                  'urllink':'',
                                  'fecha':'', 
                                  'activo':'',
                                  'nivel':'',
                                  'facultad_id':0,
                                  'programaestudio_id':0,
                                  'departamentoacademico_id':0,
                                  'categoria':'', 
                                  'regimen':'', 
                                  'condicion':'',
                                  'experiencia':'',
                                  'publicaciones':'',
                                  'investigaciones':'',
                                  'especialidad':'',
                                  'telefono':'',
                                  'email':'',
                                  'tipo_documento': 0,
                                  'documento':'',
                                  'oldImg':'', 'oldFile':''};
    
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

            var url="/intranet/docentesfacre/"+id;
            $("#btnSaveE").attr('disabled', true);
            $("#btnCloseE").attr('disabled', true);
            this.divloaderEdit=true;

            this.fillobject.oldImg= this.oldImg;
            this.fillobject.oldFile= this.oldFile;
            
            this.fillobject.grados=CKEDITOR.instances['editor5'].getData();
            this.fillobject.experiencia=CKEDITOR.instances['editor6'].getData();
            this.fillobject.publicaciones=CKEDITOR.instances['editor7'].getData();
            this.fillobject.investigaciones=CKEDITOR.instances['editor8'].getData();

            var v1 = this.nivel;
            var v2 = this.facultad_id;

            var data = new  FormData();

            data.append('id', this.fillobject.id);
            data.append('nombre', this.fillobject.nombre);
            data.append('grados', this.fillobject.grados);
            data.append('tieneimagen', this.fillobject.tieneimagen);
            data.append('urlimagen', this.fillobject.urlimagen);
            data.append('tienelink', this.fillobject.tienelink);
            data.append('urllink', this.fillobject.urllink);
            data.append('fecha', this.fillobject.fecha);
            data.append('activo', this.fillobject.activo);
            data.append('departamentoacademico_id', this.fillobject.departamentoacademico_id);
            data.append('categoria', this.fillobject.categoria);
            data.append('regimen', this.fillobject.regimen);
            data.append('condicion', this.fillobject.condicion);
            data.append('experiencia', this.fillobject.experiencia);
            data.append('publicaciones', this.fillobject.publicaciones);
            data.append('investigaciones', this.fillobject.investigaciones);
            data.append('especialidad', this.fillobject.especialidad);
            data.append('telefono', this.fillobject.telefono);
            data.append('email', this.fillobject.email);
            data.append('tipo_documento', this.fillobject.tipo_documento);
            data.append('documento', this.fillobject.documento);
            data.append('imagen', this.fillobject.imagen);
            data.append('archivo', this.fillobject.archivo);

            data.append('imagen', this.imagenE);
            data.append('oldimg', this.fillobject.oldImg);
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
              text: "Nota: Si se desactiva el Docente, No se mostrará en el Portal Web, hasta que sea activada nuevamente",
              type: 'info',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, desactivar'
          }).then((result) => {

            if (result.value) {
                var url = '/intranet/docentesfacre/altabaja/'+dato.id+'/0';
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
              text: "Nota: Si activa el Docente, se mostrará en el Portal Web",
              type: 'info',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, Activar'
          }).then((result) => {

            if (result.value) {
                var url = '/intranet/docentesfacre/altabaja/'+dato.id+'/1';
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