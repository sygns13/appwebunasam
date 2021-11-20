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
        default: '350px',
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
        subtitulo: "Gestión de la Presentación",
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
        classMenu1:'active',
        classMenu2:'',
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

        fillobject:{ 'id':'', 'titulo':'','subtitulo':'', 'descripcion':'' , 'tieneimagen':'0', 'url':'','oldImg':''},

        divNuevo:false,
        divEdit:false,

        id:'',
        tituloF : '',
        subtitulo : '',
        descripcion : '',
        tieneimagen : 1,
        url : '',

        divloaderNuevo:false,

        mostrarPalenIni:true,

        divprincipal:false,

        imagen : null,
        uploadReady: true,

        oldImg:'',
        image:'',

        content1:'',

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
            var url = '/intranet/presentacionre'+'?v1='+v1+'&v2='+v2+'&v3='+v3;;

            axios.get(url).then(response=>{

                let presentacion= response.data.presentacion;
                //console.log(presentacion);
               // console.log(presentacion.length);

                if(presentacion!= undefined && presentacion != null){
                    this.fillobject.id = presentacion.id;
                    this.fillobject.titulo = presentacion.titulo;
                    this.fillobject.subtitulo = presentacion.subtitulo;
                    this.fillobject.descripcion = presentacion.descripcion;
                    this.fillobject.tieneimagen = presentacion.tieneimagen;
                    this.fillobject.url = presentacion.url;
                    this.fillobject.oldImg = presentacion.url;
                    this.$nextTick(() => {
                      this.verImg();
                    })
                }
            })
        },

        verImg:function () {

        let image=this.fillobject.url;
        if(this.fillobject.tieneimagen!= null && this.fillobject.tieneimagen == 1){
            $("#imgInformacion").attr("src","{{ asset('/web/presentacionfacultad/')}}"+"/"+image);
        }
        
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
            this.id = this.fillobject.id;
            this.tituloF = this.fillobject.titulo;
            this.subtitulo = this.fillobject.subtitulo;
            this.descripcion = this.fillobject.descripcion;
            this.tieneimagen = this.fillobject.tieneimagen;
            this.url = this.fillobject.url;

            this.imagen=null;
            this.uploadReady = false
            this.$nextTick(() => {
                this.uploadReady = true;
                $('#txttitulo').focus();
                if(CKEDITOR.instances['editor1'] != undefined && CKEDITOR.instances['editor1'] != null){
                    CKEDITOR.instances['editor1'].setData(this.descripcion);
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
            var url='/intranet/presentacionre';

            $("#btnGuardar").attr('disabled', true);
            $("#btnCancel").attr('disabled', true);
            $("#btnClose").attr('disabled', true);

            this.divloaderNuevo=true;

            this.descripcion=CKEDITOR.instances['editor1'].getData();

            var v1 = this.nivel;
            var v2 = this.facultad_id;
            var v3 = 0;


            var data = new  FormData();

            data.append('id', this.id);
            data.append('titulo', this.tituloF);
            data.append('subtitulo', this.subtitulo);
            data.append('descripcion', this.descripcion);
            data.append('tieneimagen', this.tieneimagen);
            data.append('url', this.url);
            data.append('activo', this.activo);
            data.append('imagen', this.imagen);
            data.append('v1', v1);
            data.append('v2', v2);
            data.append('v3', v3);

            data.append('oldimg', this.fillobject.oldImg);


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