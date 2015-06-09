<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo Config::get('ECE.proyecto'); ?></title>

		<!-- Bootstrap CSS -->
		<link href="<?php echo Request::root().Config::get('ECE.css'); ?>/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo Request::root().Config::get('ECE.css'); ?>/login-bc2.css" rel="stylesheet">

	</head>
	<body>
		<div class="wrapper">
			<div class="container">
				<div class="col-md-12 text-center marginTop100">
					<h1 class="text-inverse fntlgt font40">BlueCare</h1>
					<h4></h4><br>
				</div>
				<div id="msg" class="msg"></div>
				<div id="stbar" class="stbar"><img src='<?php echo Request::root().Config::get('ECE.images'); ?>/loading_icon.gif'></div>
				<div id="shadow-white"></div>
				<div id="shadow-black"></div>
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-body padding">
							{{ Form::open(array( 'id' => 'formLogin', 'role' => 'form', 'class' => 'text-center')) }}
								<h1 class="text-muted fntlgt"><span class="glyphicon glyphicon-user"></span>&nbsp;Login</h1><br>
								@if (Session::get('message') != NULL)
										<p class="text-danger">{{ Session::get('message') }}</p>
								@endif
								<div class="form-group has-feedback">
									{{ Form::text('usu_usuario', Input::old('usu_usuario'), array('class'=>'form-control input-lg', 'placeholder' => 'Usuario' , 'id' => 'usuario')) }}
									
									@if ($errors->has('usu_usuario'))
										<p class="text-danger">{{ $errors->first('usu_usuario') }}</p>
									@endif
								</div>
								<div class="form-group">
									{{ Form::password('password', array('class'=>'form-control input-lg', 'placeholder' => 'Contraseña' , 'id' => 'clave')) }}

									@if ($errors->has('password'))
										<p class="text-danger">{{ $errors->first('usu_password') }}</p>
									@endif
								</div>
								<input id= "acceso" type="button" class="btn btn-primary form-control" value="Iniciar sesión">
							{{ Form::close() }}
						</div>
					</div>
				</div>
				<div id="data-unidad" class="box-unidad fondo">
				    <form id="formUnidad" name="formUnidad" action="" method="post"><br /><br />
					    <div class="login-data">Selecciona el centro de salud</div>
					    <div class="login-data">
					        <input id="unidad_nombre" name="unidad_nombre" type="hidden" value="" />
					        <select name="unidad" id="unidad" style="width: 90%;"></select>
					    </div>
					    <div class="login-data">
					        <input type="button" id="cancelar" name="cancelar" class="btn btn-primary" value="Cancelar" />
					        <input type="button" id="seleccionar" name="seleccionar" class="btn btn-primary" value="Seleccionar" />
					    </div>
				    </form>
				</div>
				<div class="col-md-4"></div>
			</div>
		</div>
		<footer>
			<div class="container">
				<p class="text-inverse text-center">® General Datacomm de México | 2015</p>
			</div>
		</footer>

		<!-- jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script>!window.jQuery && document.write('<script src="<?php echo Request::root().Config::get('ECE.js'); ?>/jquery-1.11.2.min.js"><\/script>');</script>
		<!-- Bootstrap JavaScript -->
		<script src="<?php echo Request::root().Config::get('ECE.js'); ?>/bootstrap.min.js"></script>
		<script language="javascript">
		var url="";
		$(document).ready(function(){
		    $('#acceso').click(function(){login();});
		    $('#seleccionar').click(function(){asignarUnidad();});
		    $('#cancelar').click(function(){location.href = "";});
		    $('#usuario').keypress(function(e){if(e.which==13){ $('#clave').focus();}});
		    $('#clave').keypress(function(e){if(e.which==13){ login();}});
		    function login(){
		        if($('#usuario').val().trim()=="" || $('#clave').val().trim()==""){
		            alert("Porporcione el nombre de usuario y clave");
		        }else{
		            $.ajax({
		                type: 'POST',
		                url: "login/login",
		                data: $('#formLogin').serialize(),
		                dataType: "json"
		            })
		            .done(function(data,textStatus,jqHXR){
		                validar(data);
		            });
		        }
		    }
		    function asignarUnidad(){
		        var txt = $('#unidad option:selected').text();
		        $('#unidad_nombre').val(txt);
		        $.ajax({
		            type: 'POST',
		            url: "login/asignar",
		            data: $('#formUnidad').serialize(),
		            dataType: "json"
		        })
		        .done(function(data,textStatus,jqHXR){
		            if(data.proceso){
		                $("#data-unidad").hide();
		                location.href = data.url;
		            }
		            else $('#msg').html(data.msj).fadeIn(500).delay(1500).fadeOut(500);
		        });
		    }
		    console.log("Ready");
		});
		$(document).ajaxStart(function(){mostrarStatus();});
		$(document).ajaxStop(function(){ocultarStatus();});
		function mostrarStatus(){$("#shadow-white").show();$("#stbar").show();}
		function ocultarStatus(){$("#stbar").hide();$("#shadow-white").hide();}
		function validar(datos){
		    if(datos.id!=0 && datos.activo==true){
		        url = datos.url;
		        tam = datos.unidades.length;
		        for(i=0;i<tam;i++){
		            $('#unidad').append(new Option(datos.unidades[i].clue_nombre_unidad,datos.unidades[i].clue_id,true,false));
		        }
		        $("#data-unidad").show();
		        $("#shadow-black").show();
		    }else{
		        $('#msg').html(datos.msj).fadeIn(500).delay(1500).fadeOut(500);
		    }
		    console.log(datos.msj);
		}

		</script>
	</body>
</html>