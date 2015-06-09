<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8" >
		<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo Config::get('ECE.proyecto'); ?></title>

		<!-- Bootstrap CSS -->
		<link type="text/css" href="<?php echo Request::root().Config::get('ECE.css'); ?>/bootstrap.min.css" rel="stylesheet">
		<link type="text/css" href="<?php echo Request::root().Config::get('ECE.css'); ?>/bc2-style.css" rel="stylesheet">
		
	</head>
	<body>
	@include('layouts.top-menu')
	
	@if(isset($data['data']))
		@include('layouts.menu-dash')
	@elseif(isset($expediente_id))
		@if(Session::get('usu_nivel') != 1) 	
			@include('layouts.menu-dash')
		@endif
	@else 
		
	@endif
	<div class="container-fluid paginaAjax" id = "paginaAjax">
	
		@section('content')
	
	</div>
	
	@show
	@include('layouts.footer')
		<!-- jQuery -->
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script type="text/javascript">!window.jQuery && document.write('<script src="<?php echo Request::root().Config::get('ECE.js'); ?>/jquery-1.11.2.min.js"><\/script>');</script>
		<!-- Bootstrap JavaScript -->
		<script type="text/javascript" src="<?php echo Request::root().Config::get('ECE.js'); ?>/bootstrap.min.js"></script>
		<script type="text/javascript">

			var urlRoot = '<?php echo Request::root();?>';	
						
		 	$(function() {
			    $( "[title]" ).tooltip();
			});
		</script>
		@yield('head')
		
		@if(isset($_GET['exp_id']))
			
			<script type="text/javascript">

			$(document).ready(OnCreate);
			
			function OnCreate(){
				
				$('#datosGeneView').click(function(event){getView($(this).attr('data'));});
				$('#perfilView').click(function(event){getView($(this).attr('data'));});
				$('#antHeredoView').click(function(event){getView($(this).attr('data'));});
				$('#perPatoView').click(function(event){getView($(this).attr('data'));});
				$('#noPatoView').click(function(event){getView($(this).attr('data'));});
				$('#expFisicaView').click(function(event){getView($(this).attr('data'));});
				$('#impDiagView').click(function(event){getView($(this).attr('data'));});
				$('#terapeuticaView').click(function(event){getView($(this).attr('data'));});
				$('#examenesView').click(function(event){getView($(this).attr('data'));});
				$('#hojaevolucionView').click(function(event){getView($(this).attr('data'));});
				$('#recetarioView').click(function(event){getView($(this).attr('data'));});
				$("#dashboardView").click(function(event){getView($(this).attr('data'));});
				$('#exaLabView').click(function(event){getView($(this).attr('data'));});
				$("#referenciaView").click(function(event){getView($(this).attr('data'));});
				$('#LabGabineteView').click(function(event){getView($(this).attr('data'));});
				$("#contrareferenciaView").click(function(event){getView($(this).attr('data'));});
				$("#visitaView").click(function(event){getView($(this).attr('data'));});
				$("#programDeteccionView").click(function(event){getView($(this).attr('data'));});
				$("#programOdonView").click(function(event){getView($(this).attr('data'));});
				$("#programEmbaView").click(function(event){getView($(this).attr('data'));});
				$("#programNsanoView").click(function(event){getView($(this).attr('data'));});
				$("#programaCronicasView").click(function(event){getView($(this).attr('data'));});
			}
			
			function getView(e){
					switch(e) {
				    case "1":
					    view("datosgenerales",{{$_GET['exp_id']}});
				        break;
				    case "2":
				    	view("perfil",{{$_GET['exp_id']}});
				        break;
				    case "3":
				    	view("heredofamiliar",{{$_GET['exp_id']}});
				        break;
				    case "4":
				    	view("patologicos",{{$_GET['exp_id']}});
				        break;
				    case "5":
				    	view("nopatologicos",{{$_GET['exp_id']}});
				        break;
				    case "6":
				    	view("exploracion",{{$_GET['exp_id']}});
				        break;
				    case "7":
				    	view("impresion",{{$_GET['exp_id']}});
				        break;
				    case "8":
				    	view("terapeutica",{{$_GET['exp_id']}});
				        break;
				    case "9":
				    	view("examen",{{$_GET['exp_id']}});
				        break;   
				    case "11":
				    	view(urlRoot+"/hojaevolucion/evolucion",{{$_GET['exp_id']}});
				        break; 
				    case "12":
					    view2("examen",{{$_GET['exp_id']}}, 1);//el tercer parametro sirve para saber de donde se esta direccionando(examenes solicitados o examenes laboratorio)
					    break;
				    case "13":
					    view(urlRoot+"/historia/terapeutica?v=1",{{$_GET['exp_id']}}); 
					    break;
				    case "14":
				    	view(urlRoot+"/referencia", {{$_GET['exp_id']}});
			        	break;
				    case "15":
					    view2(urlRoot+"/laboratorio/gabinete",{{$_GET['exp_id']}});
					    break;
				    case "16":
				    	view(urlRoot+"/contrareferencia", {{$_GET['exp_id']}});
		        		break;
				    case "17":
				    	view(urlRoot+"/visita", {{$_GET['exp_id']}});
		        		break;
				    case "18":
				    	view(urlRoot+"/programa/deteccion", {{$_GET['exp_id']}});
		        		break;
				    case "19":
				    	view(urlRoot+"/programa/odontologia", {{$_GET['exp_id']}});
		        		break;
				    case "20":
				    	view(urlRoot+"/programa/embarazo", {{$_GET['exp_id']}});
		        		break;
				    case "21":
				    	view(urlRoot+"/programa/ninosano", {{$_GET['exp_id']}});
		        		break;
				    case "22":
				    	view(urlRoot+"/programa/enfcronicas", {{$_GET['exp_id']}});
		        		break;
				    case "99":
				    	view(urlRoot+"/dashboard/dashboard",{{$_GET['exp_id']}});
				        break;      
				    default:
				        showAlert("error", "No existe ese Dato");
				} 
			}

			function view(url,exp_id){

				$.ajax({
					type: "get",
					cache: true,
					url: url,
					data: "exp_id="+exp_id,
					dataType: 'HTML'
				})
				.done(function(data){
					$("#paginaAjax").html(data);//AQUI SE CREA LA VIEW DE CADA FORMULARIO
				})
				.fail(function(data){
					showAlert("error", "Error desconocido: "+data);
				});	

			}

			function view2(url,exp_id, botonlvida){

				$.ajax({
					type: "get",
					cache: true,
					url: url,
					data: "exp_id="+exp_id+"&botonlvida="+botonlvida,
					dataType: 'HTML'
				})
				.done(function(data){
					$("#paginaAjax").html(data);
				})
				.fail(function(data){
					showAlert("error", "Error desconocido: "+data);
				});	
			}
			
		</script>
					
		@else 
			
		@endif
		
	</body>
</html>