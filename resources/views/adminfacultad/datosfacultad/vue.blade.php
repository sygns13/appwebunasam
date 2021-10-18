<script type="text/javascript">

 let app = new Vue({
    el: '#app',
    data:{
        titulo:"Portal Web FEC",
        subtitulo: "Datos de Contacto",
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

        fillobject:{ 'id':'', 'nombre':'', 'descripcion':'' , 'direccion':'', 'telefono':'','email':''},

        divNuevo:false,
        divEdit:false,

        id:'',
        nombre : '',
        descripcion : '',
        direccion : '',
        telefono : '',
        email : '',

        divloaderNuevo:false,
        mostrarPalenIni:true,

        divprincipal:false,

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
            var url = '/intranet/datosfecre';

            axios.get(url).then(response=>{

                let facultad= response.data.facultad;
                //console.log(facultad);
               // console.log(facultad.length);

                if(facultad!= undefined && facultad != null){
                    this.fillobject.id = facultad.id;
                    this.fillobject.nombre = facultad.nombre;
                    this.fillobject.descripcion = facultad.descripcion;
                    this.fillobject.direccion = facultad.direccion;
                    this.fillobject.telefono = facultad.telefono;
                    this.fillobject.email = facultad.email;
                    this.cancelForm();
                }
            })
        },

       /*  nuevo:function () {
            this.divNuevo=true;
            this.divloaderEdit=false;
            this.$nextTick(function () {
                this.cancelForm();
            })
        },
        cerrarForm: function () {
            this.divNuevo=false;
            this.cancelForm();
        }, */
        cancelForm: function () {
            this.id = this.fillobject.id;
            this.nombre = this.fillobject.nombre;
            this.descripcion = this.fillobject.descripcion;
            this.direccion = this.fillobject.direccion;
            this.telefono = this.fillobject.telefono;
            this.email = this.fillobject.email;

            this.divEdit=false;
        },

        grabar:function (tipo) {
            var url='/intranet/datosfecre';

            $("#btnGuardar1").attr('disabled', true);
            $("#btnGuardar2").attr('disabled', true);
            $("#btnGuardar3").attr('disabled', true);

            this.divloaderNuevo=true;

             var data = new  FormData();

            data.append('id', this.id);
            data.append('nombre', this.nombre);
            data.append('descripcion', this.descripcion);
            data.append('direccion', this.direccion);
            data.append('telefono', this.telefono);
            data.append('email', this.email);
            data.append('tipo', tipo);


            const config = { headers: { 'Content-Type': 'multipart/form-data' } };

            axios.post(url,data,config).then(response=>{

                $("#btnGuardar1").removeAttr("disabled");
                $("#btnGuardar2").removeAttr("disabled");
                $("#btnGuardar3").removeAttr("disabled");
                this.divloaderNuevo=false;

                if(response.data.result=='1'){
                    this.getDatos(this.thispage);
                    this.errors=[];
                    //this.cerrarForm();
                    toastr.success(response.data.msj);
                }else{
                    $('#'+response.data.selector).focus();
                    toastr.error(response.data.msj);
                    this.getDatos(this.thispage);
                }
            }).catch(error=>{
                this.errors=error.response.data
            })
        },  

}
});
</script>