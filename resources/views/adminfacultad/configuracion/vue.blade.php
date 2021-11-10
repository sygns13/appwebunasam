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
        default: '150px',
      },
      toolbar: {
        type: Array,
        default: () => [
          [ 'Styles', 'Format', 'Font', 'FontSize' ],
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
        subtitulo: "Configuraciones Principales",
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


        errors:[],

        fillobject:{ 'id':'', 'tipo_vista':'','logourl':''},

        divNuevo:false,
        divEdit:false,
        divNuevoLogo:false,

        id:'',
        tituloF : '',
        subtitulo : '',
        descripcion : '',
        tieneimagen : 1,
        url : '',

        divloaderNuevo:false,

        divloaderNuevoLogo: false,

        mostrarPalenIni:true,

        divprincipal:false,

        imagen : null,
        uploadReady: true,

        oldImg:'',
        image:'',

        content1:'',


    },
    created:function () {
        this.getDatos(this.thispage);

        
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

            var url = '/intranet/datosportalre';

            axios.get(url).then(response=>{

                let unasam= response.data.unasam;
                //console.log(unasam);
               // console.log(unasam.length);

                if(unasam!= undefined && unasam != null){
                    this.fillobject.id = unasam.id;
                    this.fillobject.tipo_vista = unasam.tipo_vista;
                    this.fillobject.logourl = unasam.logourl;
                    this.cancelForm();
                    this.$nextTick(() => {
                      this.verImg();
                    })
                }
            })
        },

        verImg:function () {

        let image=this.fillobject.logourl;
        if(this.fillobject.logourl!= null && this.fillobject.logourl.trim() != ''){
            $("#imgInformacion").attr("src","{{ asset('/web/logounasam/')}}"+"/"+image);
        }

        },


        nuevo:function () {
            this.divNuevo=true;
            this.divNuevoLogo=false;
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
            this.tipo_vista = this.fillobject.tipo_vista;
        },

        create:function () {
            var url='/intranet/datosportalre/configuracion';

            $("#btnGuardar").attr('disabled', true);
            $("#btnCancel").attr('disabled', true);
            $("#btnClose").attr('disabled', true);

            this.divloaderNuevo=true;

            var data = new  FormData();

            var v1 = 0;
            var v2 = 0;
            var v3 = 0;

            data.append('id', this.id);
            data.append('tipo_vista', this.tipo_vista);
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


        nuevoLogo:function () {
          this.divNuevoLogo=true;
            this.divNuevo=false;
            this.$nextTick(function () {
                this.cancelFormLogo();
            })
        },
        cerrarFormLogo: function () {
            this.divNuevoLogo=false;
            this.cancelFormLogo();
        },
        cancelFormLogo: function () {
            this.id = this.fillobject.id;
            this.oldImg = this.fillobject.logourl;
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


        createLogo:function () {
            var url='/intranet/datosportalre/logo';

            $("#btnGuardarLogo").attr('disabled', true);
            $("#btnCloseLogo").attr('disabled', true);

            this.divloaderNuevoLogo=true;

            var data = new  FormData();

            var v1 = 0;
            var v2 = 0;
            var v3 = 0;

            data.append('id', this.id);
            data.append('imagen', this.imagen);
            data.append('oldimg', this.oldImg);
            data.append('v1', v1);
            data.append('v2', v2);
            data.append('v3', v3);

            const config = { headers: { 'Content-Type': 'multipart/form-data' } };

            axios.post(url,data,config).then(response=>{

                $("#btnGuardarLogo").removeAttr("disabled");
                $("#btnCloseLogo").removeAttr("disabled");
                this.divloaderNuevoLogo=false;

                if(response.data.result=='1'){
                    this.getDatos(this.thispage);
                    this.errors=[];
                    this.cancelFormLogo();
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