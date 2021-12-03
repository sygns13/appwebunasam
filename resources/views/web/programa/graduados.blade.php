<!DOCTYPE html>
@if($escuela != null && $escuela->tipo_vista != null)
	@if($escuela->tipo_vista =='1')
		<html lang="es">
	@elseif($escuela->tipo_vista =='2')
		<html lang="es">
	@elseif($escuela->tipo_vista =='3')
		<html lang="es" class="boxed">
	@else
	<html lang="es">
	@endif
@else
	<html lang="es">
@endif
	
	@include('web/programa/partials/head')

	<body>
		<div class="body">
			
			@include('web/programa/partials/header')

			<div role="main" class="main">


                <section class="page-header page-header-modern bg-color-light-scale-2 page-header-md" style="background: #2d529f!important;">
					<div class="container">
						<div class="row">
							<div class="col-md-12 align-self-center p-static order-2 text-center">
								<h1 class="text-light font-weight-bold text-8">Número de Graduados del</h1>
								<span class="sub-title text-light">Programa de Estudio de {{$escuela->nombre}}</span>
							</div>
						</div>
					</div>
				</section>



            <div id="examples" class="container py-2">
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <div class="col pb-3">
                                
                                <div class="table-responsive">
                <table class="table  table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10%;">
                                #
                            </th>
                            <th style="width: 40%;"><center>
                                Año</center>
                            </th>
                            <th style="width: 50%;"><center>
                                Número de Graduados</center>
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($graduados as  $key => $dato)
                            <tr>
                                <td>
                                    {{$key+1}}
                                </td>
                                <td><center>
                                    <h5>{{$dato->anio}}</h5></center>
                                </td>
                                <td><center>
                                    <h5>{{$dato->cantidad}}</h5></center>
                                </td>
                               
                            </tr>
                        @endforeach
                    </tbody>
                </table> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
				


            <section class="page-header page-header-modern bg-color-light-scale-2 page-header-md">
                <div class="container">

            <div class="col-sm-12">
                <div id="containerchar" style="height: 380px;  margin: 0 auto;"></div>
            </div>

                </div>
            </section>



			</div>

			@include('web/programa/partials/footer')
		</div>

		@include('web/programa/partials/scripts')

        <script src="{{ asset('/webvendor/vendor/highcharts/code/highcharts.js') }}"></script>
        <script src="{{ asset('/webvendor/vendor/highcharts/code/modules/data.js') }}"></script>
        <script src="{{ asset('/webvendor/vendor/highcharts/code/modules/drilldown.js') }}"></script>


        <script type="text/javascript">

        var dataArr2=[];


        @foreach($graduados as  $key => $dato)
            var rmes2={ "name": "{{$dato->anio}}", "y": {{$dato->cantidad}}};
            dataArr2.push(rmes2);
        @endforeach


            $(document).ready(function() {
                
                Highcharts.chart('containerchar', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: ''
                    },
                    subtitle: {
                        text: 'N° de Graduados'
                    },
                    xAxis: {
                        type: 'category'
                    },
                    yAxis: {
                        title: {
                            text: 'Cantidad'
                        }

                    },
                    legend: {
                        enabled: false
                    },
                    plotOptions: {
                        series: {
                            borderWidth: 0,
                            dataLabels: {
                                enabled: true,
                                format: '{point.y}'
                            }
                        }
                    },

                    tooltip: {
                        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> graduados<br/>'
                    },

                    "series": [
                        {
                            "name": "Alumnos",
                            "colorByPoint": true,
                            "data": dataArr2
                        }
                    ],
                });

                $(".highcharts-credits").hide();

            } );
        </script>

	</body>
</html>