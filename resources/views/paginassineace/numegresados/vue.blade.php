<script type="text/javascript">


 let app = new Vue({
    el: '#app',
    data:{
        titulo:"Indicadores SINEACE Programas de Estudios",
        subtitulo: "Gestión del Número de Egresados",
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

        fillobject:{ 'id':'', 'anio':'', 'cantidad':''},

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

        anio : '',
        cantidad : '',
        

        divloaderNuevo:false,
        divloaderEdit:false,

        mostrarPalenIni:true,

        thispage:'1',
        divprincipal:false,



        tipo:2, //numero de egresados

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
            var url = '/intranet/numeroalumnore?page='+page+'&busca='+busca+'&v1='+v1+'&v2='+v2+'&v3='+v3+'&tipo='+this.tipo;

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

            this.anio = '';
            this.cantidad = '';

            this.$nextTick(() => {
                $('#txtanio').focus();
            })

            this.divEdit=false;
        },


        create:function () {
            var url='/intranet/numeroalumnore';

            $("#btnGuardar").attr('disabled', true);
            $("#btnCancel").attr('disabled', true);
            $("#btnClose").attr('disabled', true);

            
            this.divloaderNuevo=true;

            var v1 = this.nivel;
            var v2 = 0;
            var v3 = this.programa_id;


            var data = new  FormData();

            data.append('anio', this.anio);
            data.append('cantidad', this.cantidad);
            data.append('tipo', this.tipo);
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
              text: "¿Desea eliminar el Registro seleccionado? -- Nota: Este proceso no se podrá revertir",
              type: 'info',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, eliminar'
          }).then((result) => {


            if (result.value) {
                var url = '/intranet/numeroalumnore/'+dato.id;
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
            this.fillobject.anio=dato.anio;
            this.fillobject.cantidad=dato.cantidad;
           

            this.divNuevo=false;
            this.divEdit=true;
            this.divloaderEdit=false;

            this.$nextTick(() => {
            $('#txtanioE').focus();
        });

        },
        cerrarFormE: function(){

            this.divEdit=false;

            this.$nextTick(function () {
                this.fillobject={ 'id':'', 'anio':'', 'cantidad':''};
    
            })

        },


        update: function (id) {

            var url="/intranet/numeroalumnore/"+id;
            $("#btnSaveE").attr('disabled', true);
            $("#btnCloseE").attr('disabled', true);
            this.divloaderEdit=true;

            var v1 = this.nivel;
            var v2 = 0;
            var v3 = this.programa_id;

            var data = new  FormData();

            data.append('id', this.fillobject.id);
            data.append('anio', this.fillobject.anio);
            data.append('cantidad', this.fillobject.cantidad);
            data.append('tipo', this.tipo);

            data.append('v1', v1);
            data.append('v2', v2);
            data.append('v3', v3);

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