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
        titulo:"Portal Web FEC",
        subtitulo: "Gestión de la Misión y Visión",
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

        fillobjectM:{ 'id':'', 'tipo':'1', 'descripcion':'' , 'tieneimagen':'0', 'url':'','oldImg':''},
        fillobjectV:{ 'id':'', 'tipo':'2', 'descripcion':'' , 'tieneimagen':'0', 'url':'','oldImg':''},

        divNuevoM:false,
        divEditM:false,

        divNuevoV:false,
        divEditV:false,

        idM:'',
        tipoM : 1,
        descripcionM : '',
        tieneimagenM : 1,
        urlM : '',

        idV:'',
        tipoV : 2,
        descripcionV : '',
        tieneimagenV : 1,
        urlV : '',

        divloaderNuevoM:false,
        divloaderNuevoV:false,

        mostrarPalenIni:true,

        divprincipal:false,

        imagenM : null,
        uploadReadyM: true,
        imagenV : null,
        uploadReadyV: true,

        oldImgM:'',
        imageM:'',

        oldImgV:'',
        imageV:'',

        content1:'',
        content2:'',


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
            var busca=this.buscar;
            var url = '/intranet/misionvisionre';

            axios.get(url).then(response=>{

                let mision= response.data.mision;
                let vision= response.data.vision;
                //console.log(presentacion);
               // console.log(presentacion.length);

                if(mision!= undefined && mision != null){
                    this.fillobjectM.id = mision.id;
                    this.fillobjectM.titulo = mision.titulo;
                    this.fillobjectM.descripcion = mision.descripcion;
                    this.fillobjectM.tipo = mision.tipo;
                    this.fillobjectM.tieneimagen = mision.tieneimagen;
                    this.fillobjectM.url = mision.url;
                    this.fillobjectM.oldImg = mision.url;
                    this.$nextTick(() => {
                      this.verImgM();
                    })
                }
                if(vision!= undefined && vision != null){
                    this.fillobjectV.id = vision.id;
                    this.fillobjectV.titulo = vision.titulo;
                    this.fillobjectV.descripcion = vision.descripcion;
                    this.fillobjectV.tipo = vision.tipo;
                    this.fillobjectV.tieneimagen = vision.tieneimagen;
                    this.fillobjectV.url = vision.url;
                    this.fillobjectV.oldImg = vision.url;
                    this.$nextTick(() => {
                      this.verImgV();
                    })
                }
            })
        },

        verImgM:function () {

        let image=this.fillobjectM.url;
        
        if(this.fillobjectM.tieneimagen!= null && this.fillobjectM.tieneimagen == 1){
          console.log("aca");
            $("#imgInformacionM").attr("src","{{ asset('/web/misionvisionfec/')}}"+"/"+image);
        }
        
        },
        verImgV:function () {

        let image=this.fillobjectV.url;
        if(this.fillobjectV.tieneimagen!= null && this.fillobjectV.tieneimagen == 1){
            $("#imgInformacionV").attr("src","{{ asset('/web/misionvisionfec/')}}"+"/"+image);
        }

        },

        nuevoM:function () {
            this.divNuevoM=true;
            this.divloaderEditM=false;
            this.cerrarFormV();
            this.$nextTick(function () {
                this.cancelFormM();
            })
        },
        nuevoV:function () {
            this.divNuevoV=true;
            this.divloaderEditV=false;
            this.cerrarFormM();
            this.$nextTick(function () {
                this.cancelFormV();
            })
        },
        cerrarFormM: function () {
            this.divNuevoM=false;
            this.cancelFormM();
        },
        cerrarFormV: function () {
            this.divNuevoV=false;
            this.cancelFormV();
        },

        cancelFormM: function () {
            this.idM = this.fillobjectM.id;
            this.tipoM = this.fillobjectM.tipo;
            this.descripcionM = this.fillobjectM.descripcion;
            this.tieneimagenM = this.fillobjectM.tieneimagen;
            this.urlM = this.fillobjectM.url;

            this.imagenM=null;
            this.uploadReadyM = false
            this.$nextTick(() => {
                this.uploadReadyM = true;
                $('#txttituloM').focus();
                if(CKEDITOR.instances['editor1'] != undefined && CKEDITOR.instances['editor1'] != null){
                    CKEDITOR.instances['editor1'].setData(this.descripcionM);
                }
                
            })

            this.divEdit=false;
        },
        cancelFormV: function () {
            this.idV = this.fillobjectV.id;
            this.tipoV = this.fillobjectV.tipo;
            this.descripcionV = this.fillobjectV.descripcion;
            this.tieneimagenV = this.fillobjectV.tieneimagen;
            this.urlV = this.fillobjectV.url;

            this.imagenV=null;
            this.uploadReadyV = false
            this.$nextTick(() => {
                this.uploadReadyV = true;
                $('#txttituloV').focus();
                if(CKEDITOR.instances['editor2'] != undefined && CKEDITOR.instances['editor2'] != null){
                    CKEDITOR.instances['editor2'].setData(this.descripcionV);
                }
                
            })

            this.divEdit=false;
        },

        getImageM(event){
            //Asignamos la imagen a  nuestra data

            if (!event.target.files.length)
            {
                this.imagenM=null;
            }
            else{
            this.imagenM = event.target.files[0];
            }
        },
        getImageV(event){
            //Asignamos la imagen a  nuestra data

            if (!event.target.files.length)
            {
                this.imagenV=null;
            }
            else{
            this.imagenV = event.target.files[0];
            }
        },

        createM:function () {
            var url='/intranet/misionvisionre';

            $("#btnGuardarM").attr('disabled', true);
            $("#btnCancelM").attr('disabled', true);
            $("#btnCloseM").attr('disabled', true);

            this.divloaderNuevoM=true;

            this.descripcionM=CKEDITOR.instances['editor1'].getData();


            var data = new  FormData();

            data.append('id', this.idM);
            data.append('tipo', this.tipoM);
            data.append('descripcion', this.descripcionM);
            data.append('tieneimagen', this.tieneimagenM);
            data.append('url', this.urlM);
            data.append('imagen', this.imagenM);

            data.append('oldimg', this.fillobjectM.oldImg);


            const config = { headers: { 'Content-Type': 'multipart/form-data' } };

            axios.post(url,data,config).then(response=>{

                $("#btnGuardarM").removeAttr("disabled");
                $("#btnCancelM").removeAttr("disabled");
                $("#btnCloseM").removeAttr("disabled");
                this.divloaderNuevoM=false;

                if(response.data.result=='1'){
                    this.getDatos(this.thispage);
                    this.errors=[];
                    this.cerrarFormM();
                    toastr.success(response.data.msj);
                }else{
                    $('#'+response.data.selector).focus();
                    toastr.error(response.data.msj);
                }
            }).catch(error=>{
                this.errors=error.response.data
            })
        },  

        createV:function () {
            var url='/intranet/misionvisionre';

            $("#btnGuardarV").attr('disabled', true);
            $("#btnCancelV").attr('disabled', true);
            $("#btnCloseV").attr('disabled', true);

            this.divloaderNuevoV=true;

            this.descripcionV=CKEDITOR.instances['editor2'].getData();


            var data = new  FormData();

            data.append('id', this.idV);
            data.append('tipo', this.tipoV);
            data.append('descripcion', this.descripcionV);
            data.append('tieneimagen', this.tieneimagenV);
            data.append('url', this.urlV);
            data.append('imagen', this.imagenV);

            data.append('oldimg', this.fillobjectV.oldImg);


            const config = { headers: { 'Content-Type': 'multipart/form-data' } };

            axios.post(url,data,config).then(response=>{

                $("#btnGuardarV").removeAttr("disabled");
                $("#btnCancelV").removeAttr("disabled");
                $("#btnCloseV").removeAttr("disabled");
                this.divloaderNuevoV=false;

                if(response.data.result=='1'){
                    this.getDatos(this.thispage);
                    this.errors=[];
                    this.cerrarFormV();
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