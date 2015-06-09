<?php 
//TIEMPOS DE EVOLUCION ARRAY , LOS CARGO AQUI PARA NO GASTAR TIEMPO EN CARGAR LOS 4 CATALOGOS DEL SERVIDOR.
$tiempoEvo = array(0 => 'Ninguno', 1 => 'de 1 a 23 Hrs' , 2 => 'de 1 a 31 dias' , 3 => 'de 1 a 12 meses');
$hora = array(0 => 'Ninguno', 1 => 'de 0 a 6 Hrs' , 2 => 'de 7 a 12 Hrs' , 3 => 'de 13 a 18 Hrs' , 4 => 'de 19 a 24 Hrs');
$dia = array(0 => 'Ninguno', 1 => '1 D&iacute;a' , 2 => 'de 3 a 7 Dias' , 3 => 'de 8 a 15 Dias' , 4 => 'de 16 a 31 Dias');
$mes = array(0 => 'Ninguno', 1 => '1 a 3 meses' , 2 => '4 a 6 meses' , 3 => '7 a 12 meses');
$year = array(0 => 'Ninguno', 1 => '1 a 3 a&ntilde;os' , 2 => '4 a 8 a&ntilde;os' , 3 => '18 a&ntilde;os o mas');
?>
<div class="alert-box-container"><div id="alert-box" class=""><p>Mensaje</p></div></div>
<div class="container-fluid">
	<div class="row dashboard">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="page-header nomargintop">
						<h4>Perfil</h4>
						<a href="#" class="btn btn-primary btn-sm btn-savePerfil" data = "0"><span
							class="glyphicon glyphicon-floppy-disk"></span><span
							class="pageh-text-btn">Guardar</span>
						</a> 
						<a href="#"
							class="btn btn-primary btn-sm btn-savePerfil" @if (Session::get('paciente_sexo') == 'M') data = "18" @else data = "3" @endif><span
							class="glyphicon glyphicon-arrow-right"></span><span
							class="pageh-text-btn">Siguiente</span>
						</a> 
						<a href="#"
							class="btn btn-primary btn-sm btn-savePerfil" data = "1"><span
							class="glyphicon glyphicon-arrow-left"></span><span
							class="pageh-text-btn">Anterior</span>
						</a>
					</div>

					{{ Form::open(array( 'id' => 'formPerfil', 'role' => 'form',
					'class' => 'text-center')) }}
					
					{{ Form::hidden('expediente_id',
					$expediente_id, array('class'=>'form-control'
					, 'id' => 'expediente_id')) }}
					
					<div class="row">
						<div class="col-xs-6 col-sm-3 col-md-2 col-lg-2">
							<div class="form-group">
								<label for="">Fecha:</label>
								{{ Form::text('perfil_fecha',
								date('d/m/Y'), array('class'=>'form-control fecha'
								, 'id' => 'perfil_fecha')) }}
							</div>
						</div>
					</div>

					<div class="row">
						<!-- 
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<div class="form-group">
								<label for="">Signos:</label> 
								<textarea name="perfil_signos" dataType = "Char"
								id="perfil_signos" class="form-control" rows="3">@if(isset($current[0])){{$current[0]->perfil_signos}}@else{{''}}@endif</textarea>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<div class="form-group">
								<label for="">Sintomas:</label>
								<textarea name="perfil_sintomas" dataType = "Char"
								id="perfil_sintomas" class="form-control" rows="3">@if(isset($current[0])){{$current[0]->perfil_sintomas}}@else{{''}}@endif</textarea>
							</div>
						</div>
						 -->
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="form-group">
								<label for="">Descripción del padecimiento:</label>
								<textarea name="perfil_descripcion" dataType = "Char"
								id="perfil_descripcion" class="form-control" rows="3">@if(isset($current[0])){{$current[0]->perfil_descripcion}}@else{{''}}@endif</textarea>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="page-header">
								<h4 class="nomarginbot">Tiempos de evolución</h4>
							</div>
						</div>
						
						<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
							<div class="form-group">
								<label for="">Tiempo de Evolucion:</label> 
								<select name = "perfil_timevolgeneral" id = "perfil_timevolgeneral" class = "form-control">
									<?php foreach ($tiempoEvo as $val => $key):?>
									@if(isset($current[0]))
										@if($current[0]->perfil_timevolgeneral == $val)
										<option value = "{{$val}}" selected = "selected">{{$key}}</option>
										@else
										<option value = "{{$val}}">{{$key}}</option>
										@endif 
									@else
										<option value = "{{$val}}">{{$key}}</option>
									@endif
								    <?php endforeach;?>
								</select>
							</div>
						</div>
						<!-- 
						<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
							<div class="form-group">
								<label for="">Horas:</label> 
								<select name = "perfil_timevol" id = "perfil_timevol" class = "form-control">
									<?php foreach ($hora as $val => $key):?>
									@if(isset($current[0]))
										@if($current[0]->perfil_timevol == $val)
										<option value = "{{$val}}" selected = "selected">{{$key}}</option>
										@else
										<option value = "{{$val}}">{{$key}}</option>
										@endif 
									@else
										<option value = "{{$val}}">{{$key}}</option>
									@endif
								    <?php endforeach;?>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
							<div class="form-group">
								<label for="">Días:</label> 
								<select name = "perfil_timevol2" id = "perfil_timevol2" class = "form-control">
									<?php foreach ($dia as $val => $key):?>
									@if(isset($current[0]))
										@if($current[0]->perfil_timevol2 == $val)
										<option value = "{{$val}}" selected = "selected">{{$key}}</option>
										@else
										<option value = "{{$val}}">{{$key}}</option>
										@endif 
									@else
										<option value = "{{$val}}">{{$key}}</option>
									@endif
								    <?php endforeach;?>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
							<div class="form-group">
								<label for="">Meses:</label> 
								<select name = "perfil_timevol3" id = "perfil_timevol3" class = "form-control">
									<?php foreach ($mes as $val => $key):?>
									@if(isset($current[0]))
										@if($current[0]->perfil_timevol3 == $val)
										<option value = "{{$val}}" selected = "selected">{{$key}}</option>
										@else
										<option value = "{{$val}}">{{$key}}</option>
										@endif 
									@else
										<option value = "{{$val}}">{{$key}}</option>
									@endif
								    <?php endforeach;?>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
							<div class="form-group">
								<label for="">Años:</label> 
								<select name = "perfil_timevol4" id = "perfil_timevol4" class = "form-control">
									<?php foreach ($year as $val => $key):?>
									@if(isset($current[0]))
										@if($current[0]->perfil_timevol4 == $val)
										<option value = "{{$val}}" selected = "selected">{{$key}}</option>
										@else
										<option value = "{{$val}}">{{$key}}</option>
										@endif 
									@else
										<option value = "{{$val}}">{{$key}}</option>
									@endif
								    <?php endforeach;?>
								</select>
							</div>
						</div>
					</div>
					 -->
					 <div class="row">
						<div class="col-xs-6 col-sm-3 col-md-2 col-lg-2">
							<div class="form-group">
								<label for="">Años:</label>
								<input name = "perfil_year" id = "perfil_year" class = "form-control" value = "@if(isset($current[0])){{$current[0]->perfil_year}}@else{{''}}@endif">
							</div>
						</div>
					</div>
					<div class="btns-form-ad">
						<a href="#" 
							class="btn btn-primary btn-sm btn-savePerfil" data = "1"><span
							class="glyphicon glyphicon-arrow-left"></span><span
							class="pageh-text-btn">Anterior</span>
						</a> 
						<a href="#"
							class="btn btn-primary btn-sm btn-savePerfil" data = "3"><span
							class="glyphicon glyphicon-arrow-right"></span><span
							class="pageh-text-btn">Siguiente</span>
						</a>
						<a href="#" 
							class="btn btn-primary btn-sm btn-savePerfil" data = "0">
							<span class="glyphicon glyphicon-floppy-disk"></span>
							<span class="pageh-text-btn">Guardar</span>
						</a>
					</div>
					{{ Form::close() }}
				</div>
			</div>

		</div>
	</div>
</div>

<script>

$(document).ready(OnCreateCliente);

function OnCreateCliente(){
	var now = new Date();
	var yr = now.getFullYear();
	$('input[datatype="Char"]').on("blur",{params:''},upperCase);

	formRules = {
			'perfil_sintomas': {required:true},
			'perfil_signos': {required:true},
			'perfil_descripcion': {required:true},
			'perfil_fecha': {required:true}
			
		};
		formMessages = {
			'perfil_sintomas': {required:'El sintoma es requerido.'},
			'perfil_signos': {required:'Los signos son requeridos.'},
			'perfil_descripcion': {required:'La descripcion es requerida.'},
			'perfil_fecha': {required:'La fecha es requerida.'}

		};
	
    $('.fecha').datetimepicker({
		format: 'd/m/Y',lang: 'es',timepicker: false,
		yearStart: 1900,yearEnd: yr,mask:true,closeOnDateSelect:true
	});

    url = "perfil/addperfil";
	options = {
		'url':url,
		'type':'POST',
		'datatype':'json'
	};

	frm = $('#formPerfil');
	validateForm(frm, formRules, formMessages);
	$('.btn-savePerfil').on("click", {params:options, form:frm}, savePerfil);

}

function savePerfil(event){

	var view = $(this).attr('data');
	if($('#perfil_fecha').val()=="__/__/____"){
		 showAlert("error", "Proporcione la fecha de captura");
		 $('#perfil_fecha').addClass('mark-up-error');
	}else{
		flag = true;
		console.log(event.data.form);
		if ($(event.data.form).valid()){
			
			$.ajax({
				type: event.data.params.type,
				url: event.data.params.url,
				data: event.data.form.serialize(),
				dataType: event.data.params.datatype
			})
			.done(function(data){
				if (data.proceso == false){
					showAlert("error", "No se pudo gurdar el perfil del paciente");
				}else{
					if(view == 0){showAlert("success", "Perfil del paciente agregado correctamente");}
					else{getView(view);}//CARGA EL SIGUIENTE FORMULARIO
				}
			})
			.fail(function(data){
				showAlert("error", "Error desconocido");
			});
		}
		flag = false;

	}	
}


</script>

