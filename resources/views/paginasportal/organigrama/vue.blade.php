<script type="text/javascript">

 let app = new Vue({
    el: '#app',
    data:{
        titulo:"Páginas UNASAM",
        subtitulo: "Organigrama",
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
        classMenu10:'',
        classMenu11:'active',
        classMenu12:'',


        errors:[],

        fillobject:{ 'id':'', 'nombre_organigrama':'','url_organigrama':'', 'oldFile':''},

        divNuevo:false,
        divEdit:false,
        

        id:'',
        nombre_organigrama : '',
        url_organigrama : '',

        divloaderNuevo:false,

        

        mostrarPalenIni:true,

        divprincipal:false,

        archivo : null,
        uploadReady: true,

        oldFile:'',
        file:'',


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
                    this.fillobject.nombre_organigrama = unasam.nombre_organigrama;
                    this.fillobject.url_organigrama = unasam.url_organigrama;
                    this.oldFile=unasam.url_organigrama;
                    this.cancelForm();
                    this.$nextTick(() => {
                      this.verImg();
                    })
                }
            })
        },

        verImg:function () {

        let file=this.fillobject.url_organigrama;
        if(this.fillobject.url_organigrama!= null && this.fillobject.url_organigrama.trim() != ''){
            $("#fileinformacion").attr("src","{{ asset('/web/organigramaunasam/')}}"+"/"+file);
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
            this.nombre_organigrama = this.fillobject.nombre_organigrama;
            this.url_organigrama = this.fillobject.url_organigrama;
            $("#txtnombre_organigrama").focus();
        },

        create:function () {
            var url='/intranet/datosportalre/organigrama';

            $("#btnGuardar").attr('disabled', true);
            $("#btnCancel").attr('disabled', true);
            $("#btnClose").attr('disabled', true);

            this.divloaderNuevo=true;

            var data = new  FormData();

            var v1 = 0;
            var v2 = 0;
            var v3 = 0;

            data.append('id', this.id);
            data.append('nombre_organigrama', this.nombre_organigrama);
            data.append('url_organigrama', this.url_organigrama);
            data.append('oldfile', this.fillobject.oldFile);
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

}
});
</script>