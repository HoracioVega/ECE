

<?php $enf = 1;?>

@include('historia.datosgenerales' ,['seg_social' => $compact['seg_social'], 'entidades' => $compact['entidades'], 
'ocupaciones' => $compact['ocupaciones'],
'religiones' =>	$compact['religiones'], 'edo_civil' => $compact['edo_civil'], 
'escolaridad' => $compact['escolaridad'], 'paciente' => $compact['paciente'], 
'municipios' => $compact['municipios'], 'localidades' => $compact['localidades']])
<!-- Container -->
<div class="container-fluid">
	<div class="row"></div>
	<div class="row dashboard">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<form role="form" id = "form-enfermera">
					{{ Form::hidden('expediente_id',
					$expediente_id, array('class'=>'form-control'
					, 'id' => 'expediente_id')) }}
					
					{{ Form::hidden('evolucion_clinicos',
					'', array('class'=>'form-control'
					, 'id' => 'expediente_id')) }}
					
					{{ Form::hidden('evolucion_tratamiento',
					'', array('class'=>'form-control'
					, 'id' => 'expediente_id')) }}
					
					{{ Form::hidden('explo_fecha',
					date('d/m/Y'), array('class'=>'form-control'
					, 'id' => 'expediente_id')) }}
					
					{{ Form::hidden('explo_hora',
					date('h:i:s'), array('class'=>'form-control'
					, 'id' => 'expediente_id')) }}
					
					
						<div class="row label-warning">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="page-header nomargintop">
									<h4 class="nomarginbot">Signos vitales</h4>
								</div>
							</div>
							<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
								<div class="form-group">
									<label>Peso:</label>
									<div class="input-group">
										<input type = "text" dataType = "Int" class = "form-control" name = "explo_peso" id = "explo_peso"
										value ="@if(isset($current[0])){{$current[0]['explo_peso']}}@else{{''}}@endif" />
										<span class="input-group-addon">kg</span>
									</div>
								</div>
							</div>
							<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
								<div class="form-group">
									<label>Talla:</label>
									<div class="input-group">
										<input type = "text" dataType = "Int" class = "form-control" name = "explo_talla" id = "explo_talla"
										value ="@if(isset($current[0])){{$current[0]['explo_talla']}}@else{{''}}@endif" />
								 		<span class="input-group-addon">cms</span>
									</div>
								</div>
							</div>
							<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
								<div class="form-group">
									<label>IMC:</label> 
									<input type ="text" class = "form-control" name = "explo_imc" id = "explo_imc"
									value = "@if(isset($current[0])){{$current[0]['explo_imc']}}@else{{''}}@endif" readonly/>
								</div>
							</div>
							<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
								<div class="form-group">
									<label>Glicemia:</label>
									<div class="input-group">
										<input type = "text" dataType = "Int" class = "form-control" name = "explo_glicemia" id = "explo_glicemia"
										value ="@if(isset($current[0])){{$current[0]['explo_glicemia']}}@else{{''}}@endif" />
										<span class="input-group-addon">mg/dL</span>
									</div>
								</div>
							</div>
							<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
								<div class="form-group">
									<label>Pulso:</label> 
									<input type = "text" dataType = "Int" class = "form-control" name = "explo_pulso" id = "explo_pulso"
									value ="@if(isset($current[0])){{$current[0]['explo_pulso']}}@else{{''}}@endif" />
								</div>
							</div>
							<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
								<div class="form-group">
									<label>Frecuencia Respiratoria.:</label>
									<div class="input-group">
									<input type = "text" dataType = "Int" class = "form-control" name = "explo_resp" id = "explo_resp"
									value ="@if(isset($current[0])){{$current[0]['explo_resp']}}@else{{''}}@endif" />
									 <span class="input-group-addon">xmin</span>
									</div>
								</div>
							</div>
							<div class="col-xs-6 col-sm-3 col-md-2 col-lg-3">
								<div class="form-group">
									<label>Temperatura:</label>
									<div class="input-group">
										<input type = "text" dataType = "Int" class = "form-control" name = "explo_temp" id = "explo_temp"
										value ="@if(isset($current[0])){{$current[0]['explo_temp']}}@else{{''}}@endif" />
										<span class="input-group-addon">°</span>
									</div>
								</div>
							</div>
							<div class="col-xs-6 col-sm-3 col-md-2 col-lg-3">
								<div class="form-group">
									<label>Tension Arterial:</label>
									<div class="input-group">
									<input type = "text" dataType = "Int" class = "form-control" name = "explo_ta" id = "explo_ta"
									value ="@if(isset($current[0])){{$current[0]['explo_ta']}}@else{{''}}@endif" />
									<span class="input-group-addon">mmHg</span>
									</div>
								</div>
							</div>
						</div>

						<div class="btns-form-ad">
							<a href="#" class="btn btn-primary btn-sm save-enfermera" data = "0">
								<span class="glyphicon glyphicon-floppy-disk"></span><span
									class="pageh-text-btn">Guardar</span>
							</a>
						</div>
					</form>
				</div>
			</div>

		</div>
	</div>
</div>
<!-- /Container -->

<script type="text/javascript">


var pageActual = 1;
$(document).ready(OnCreate);

function OnCreate(){
	
	var now = new Date();
	var yr = now.getFullYear();
	$('input[datatype="Char"]').on("blur",{params:''},upperCase);
	$('input[datatype="Int"]').on("keypress",{params:''},decimal);
	$('#explo_talla').change(function(){calIMC()});
	$('#explo_talla').focusout(function(){calIMC()});
	$('#search-enfermedad').click(function(){mostrarEnfermedad();});
	
	formRules = {
			'explo_peso': {required:true},
			'explo_talla': {required:true}
		};
		formMessages = {
			'explo_peso': {required:'El peso es requerido.'},
			'explo_talla': {required:'La talla es requerida.'}
		};
	
    $('.fecha').datetimepicker({
		format: 'd/m/Y',lang: 'es',timepicker: false,
		yearStart: 1900,yearEnd: yr,mask:true,closeOnDateSelect:true
	});

    url = urlRoot+"/hojaevolucion/evolucion/savehojaevolucion";
	options = {
		'url':url,
		'type':'POST',
		'datatype':'json'
	};

	frm = $('#form-enfermera');
	validateForm(frm, formRules, formMessages);
	$('.save-enfermera').on("click", {params:options, form:frm}, saveHojaEvolucion);

}
function saveHojaEvolucion(event){

	console.log(event.currentTarget.attributes.data.nodeValue);
	var view = $(this).attr('data');
	if($('#explo_fecha').val()=="__/__/____"){
		 showAlert("error", "Proporcione la fecha de captura");
		 $('#explo_fecha').addClass('mark-up-error');
	}else{
		flag = true;
		//console.log(event.data.form);
		if ($(event.data.form).valid()){
			
			$.ajax({
				type: event.data.params.type,
				url: event.data.params.url,
				data: event.data.form.serialize(),
				dataType: event.data.params.datatype
			})
			.done(function(data){
				if (data.proceso == false){
					showAlert("error", "No se pudo guardar los sintomas del paciente");
				}else{
					if(view == 0){
					showAlert("success", "Los sintomas del paciente han sido guardados correctamente");
					}else{
					console.log(view);
					getView(view);//Me carga el siguiente formulario.
					}
				}
			})
			.fail(function(data){
				showAlert("error", "Error desconocido");
			});
		}
		flag = false;

	}	
}

calIMC = function(){
	
	p = parseInt($("#explo_peso").val());
	t = parseFloat($("#explo_talla").val() / 100);
	
	if(p != "" && t != "" && (!isNaN(p))){
		var imc = ""+p/(t*t);
		$("#explo_imc").val(imc.substring(0,5));
	}
}

</script>
