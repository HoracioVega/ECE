<div class="alert-box-container">
	<div id="alert-box" class="">
		<p>Mensaje</p>
	</div>
</div>

<?php //var_dump($current);?>

<div class="container-fluid">
	{{ Form::open(array( 'id' => 'formExploracion', 'role' => 'form',
	'class' => 'text-center')) }}
	{{ Form::hidden('expediente_id',
					$_GET['exp_id'], array('class'=>'form-control'
					, 'id' => 'expediente_id')) }}
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="page-header nomargintop">
						<h4>Exploración física</h4>
						<a href="#" class="btn btn-primary btn-sm save-exploracion" data = "0"><span
							class="glyphicon glyphicon-floppy-disk"></span><span
							class="pageh-text-btn">Guardar</span></a> 
						<a href="#"
							class="btn btn-primary btn-sm save-exploracion" data = "7"><span
							class="glyphicon glyphicon-arrow-right"></span><span
							class="pageh-text-btn">Siguiente</span></a> 
						<a href="#"
							class="btn btn-primary btn-sm save-exploracion" data = "5"><span
							class="glyphicon glyphicon-arrow-left"></span><span
							class="pageh-text-btn">Anterior</span></a> 
						<a href="#"
							class="btn btn-danger btn-sm"><span
							class="glyphicon glyphicon-warning-sign"></span><span
							class="pageh-text-btn">Llenar Línea de vida</span></a>
					</div>

					<div class="row">
							<div class="col-xs-6 col-sm-3 col-md-2 col-lg-2">
								<label>Fecha:</label> 
								{{ Form::text('explo_fecha',
								date("d/m/Y"), array('class'=>'form-control fecha'
								, 'id' => 'explo_fecha')) }}
							</div>
							<div class="col-xs-6 col-sm-3 col-md-2 col-lg-2">
								<label>Hora:</label>
								{{ Form::text('explo_hora',
								date("h:i:s"), array('class'=>'form-control'
								, 'id' => 'explo_hora')) }} 
							</div>
							<div class="col-xs-6 col-sm-3 col-md-2 col-lg-2">
								<label>Peso:</label>
								<div class="input-group">
								<input type = "text" dataType = "Int" class = "form-control" name = "explo_peso" id = "explo_peso"
								value ="@if(isset($current[0])){{$current[0]->explo_peso}}@else{{''}}@endif" />
								<span class="input-group-addon">kg</span>
								</div>
							</div>
							<div class="col-xs-6 col-sm-3 col-md-2 col-lg-2">
								<label>Talla:</label>
								<div class="input-group">
								<input type = "text" dataType = "Int" class = "form-control" name = "explo_talla" id = "explo_talla"
								value ="@if(isset($current[0])){{$current[0]->explo_talla}}@else{{''}}@endif" />
								 <span class="input-group-addon">cms</span>
								</div>
							</div>
							<div class="col-xs-6 col-sm-3 col-md-2 col-lg-2">
								<label>IMC:</label> 
								<input type ="text" class = "form-control" name = "explo_imc" id = "explo_imc"
								value = "@if(isset($current[0])){{$current[0]->explo_imc}}@else{{''}}@endif" readonly/>
							</div>
							<div class="col-xs-6 col-sm-3 col-md-2 col-lg-2">
								<label>Glicemia:</label>
								<div class="input-group">
								<input type = "text" dataType = "Int" class = "form-control" name = "explo_glicemia" id = "explo_glicemia"
								value ="@if(isset($current[0])){{$current[0]->explo_glicemia}}@else{{''}}@endif" />
								<span class="input-group-addon">mg/dL</span>
								</div>
								<br>
							</div>

							<div class="col-xs-6 col-sm-3 col-md-2 col-lg-3">
								<label>Pulso:</label> 
								<input type = "text" dataType = "Int" class = "form-control" name = "explo_pulso" id = "explo_pulso"
								value ="@if(isset($current[0])){{$current[0]->explo_pulso}}@else{{''}}@endif" />
							</div>
							<div class="col-xs-6 col-sm-3 col-md-2 col-lg-3">
								<label>Frecuencia Respiratoria.:</label>
								<div class="input-group">
								<input type = "text" dataType = "Int" class = "form-control" name = "explo_resp" id = "explo_resp"
								value ="@if(isset($current[0])){{$current[0]->explo_resp}}@else{{''}}@endif" />
								 <span class="input-group-addon">xmin</span>
								</div>
							</div>
							<div class="col-xs-6 col-sm-3 col-md-2 col-lg-3">
								<label>Temperatura:</label>
								<div class="input-group">
								<input type = "text" dataType = "Int" class = "form-control" name = "explo_temp" id = "explo_temp"
								value ="@if(isset($current[0])){{$current[0]->explo_temp}}@else{{''}}@endif" />
								<span class="input-group-addon">°</span>
								</div>
							</div>
							<div class="col-xs-6 col-sm-3 col-md-2 col-lg-3">
								<label>Tension Arterial:</label>
								<div class="input-group">
								<input type = "text" dataType = "Int" class = "form-control" name = "explo_ta" id = "explo_ta"
								value ="@if(isset($current[0])){{$current[0]->explo_ta}}@else{{''}}@endif" />
								<span class="input-group-addon">mmHg</span>
								</div>
								<br>
							</div>
					</div>

					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="table-responsive">
								<table
									class="table table-hover table-striped textarea-min radio-min">
									<thead>
										<tr>
											<th>Parte del cuerpo</th>
											<th>Estado</th>
											<th width="50%">Detalle</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Cráneo</td>
											<td>
												<div class="radio">
													<label><input type = "radio" name = "explo_sitcraneo" value = "normal" @if(isset($current[0]))@if($current[0]->explo_sitcraneo == 'normal'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif/>Normal</label>
													<label><input type = "radio" name = "explo_sitcraneo" value = "anormal" @if(isset($current[0]))@if($current[0]->explo_sitcraneo == 'anormal'){{'checked'}}@else {{''}} @endif @else {{''}} @endif/>Anormal</label>
												</div>
											</td>
											<td>
											<textarea name = "explo_craneo" rows="2" cols="160">@if(isset($current[0])){{$current[0]->explo_craneo}}@else {{''}} @endif</textarea>
											</td>
										</tr>
										<tr>
											<td>Cara</td>
											<td>
												<div class="radio">
													<label><input type = "radio" name = "explo_sitcara" value = "normal" @if(isset($current[0]))@if($current[0]->explo_sitcara == 'normal'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif/>Normal</label>
													<label><input type = "radio" name = "explo_sitcara" value = "anormal" @if(isset($current[0]))@if($current[0]->explo_sitcara == 'anormal'){{'checked'}}@else {{''}} @endif @else {{''}} @endif/>Anormal</label>
												</div>
											</td>
											<td>
											<textarea name = "explo_cara" rows="2" cols="160">@if(isset($current[0])){{$current[0]->explo_cara}}@else {{''}} @endif</textarea>
											</td>
										</tr>
										<tr>
											<td>Ojos</td>
											<td>
												<div class="radio">
													<label><input type = "radio" name = "explo_sitojo" value = "normal" @if(isset($current[0]))@if($current[0]->explo_sitojo == 'normal'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif/>Normal</label>
													<label><input type = "radio" name = "explo_sitojo" value = "anormal" @if(isset($current[0]))@if($current[0]->explo_sitojo == 'anormal'){{'checked'}}@else {{''}} @endif @else {{''}} @endif/>Anormal</label>
												</div>
											</td>
											<td>
											<textarea name = "explo_ojo" rows="2" cols="160">@if(isset($current[0])){{$current[0]->explo_ojo}}@else {{''}} @endif</textarea>
											</td>
										</tr>
										<tr>
											<td>Nariz</td>
											<td>
												<div class="radio">
													<label><input type = "radio" name = "explo_sitnariz" value = "normal" @if(isset($current[0]))@if($current[0]->explo_sitnariz == 'normal'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif/>Normal</label>
													<label><input type = "radio" name = "explo_sitnariz" value = "anormal" @if(isset($current[0]))@if($current[0]->explo_sitnariz == 'anormal'){{'checked'}}@else {{''}} @endif @else {{''}} @endif/>Anormal</label>
												</div>
											</td>
											<td>
											<textarea name = "explo_nariz" rows="2" cols="160">@if(isset($current[0])){{$current[0]->explo_nariz}}@else {{''}} @endif</textarea>
											</td>
										</tr>
										<tr>
											<td>Boca y orofaringe</td>
											<td>
												<div class="radio">
													<label><input type = "radio" name = "explo_sitboca" value = "normal" @if(isset($current[0]))@if($current[0]->explo_sitboca == 'normal'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif/>Normal</label>
													<label><input type = "radio" name = "explo_sitboca" value = "anormal" @if(isset($current[0]))@if($current[0]->explo_sitboca == 'anormal'){{'checked'}}@else {{''}} @endif @else {{''}} @endif/>Anormal</label>
												</div>
											</td>
											<td>
											<textarea name = "explo_boca" rows="2" cols="160">@if(isset($current[0])){{$current[0]->explo_boca}}@else {{''}} @endif</textarea>
											</td>
										</tr>
										<tr>
											<td>Cuello</td>
											<td>
												<div class="radio">
													<label><input type = "radio" name = "explo_sitcuello" value = "normal" @if(isset($current[0]))@if($current[0]->explo_sitcuello == 'normal'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif/>Normal</label>
													<label><input type = "radio" name = "explo_sitcuello" value = "anormal" @if(isset($current[0]))@if($current[0]->explo_sitcuello == 'anormal'){{'checked'}}@else {{''}} @endif @else {{''}} @endif/>Anormal</label>
												</div>
											</td>
											<td>
											<textarea name = "explo_cuello" rows="2" cols="160">@if(isset($current[0])){{$current[0]->explo_cuello}}@else {{''}} @endif</textarea>
											</td>
										</tr>
										<tr>
											<td>Tórax Ant. y Post</td>
											<td>
												<div class="radio">
													<label><input type = "radio" name = "explo_sittorax" value = "normal" @if(isset($current[0]))@if($current[0]->explo_sittorax == 'normal'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif/>Normal</label>
													<label><input type = "radio" name = "explo_sittorax" value = "anormal" @if(isset($current[0]))@if($current[0]->explo_sittorax == 'anormal'){{'checked'}}@else {{''}} @endif @else {{''}} @endif/>Anormal</label>
												</div>
											</td>
											<td>
											<textarea name = "explo_torax" rows="2" cols="160">@if(isset($current[0])){{$current[0]->explo_torax}}@else {{''}} @endif</textarea>
											</td>
										</tr>
										<tr>
											<td>Ap. Respiratorio</td>
											<td>
												<div class="radio">
													<label><input type = "radio" name = "explo_sitrespira" value = "normal" @if(isset($current[0]))@if($current[0]->explo_sitrespira == 'normal'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif/>Normal</label>
													<label><input type = "radio" name = "explo_sitrespira" value = "anormal" @if(isset($current[0]))@if($current[0]->explo_sitrespira == 'anormal'){{'checked'}}@else {{''}} @endif @else {{''}} @endif/>Anormal</label>
												</div>
											</td>
											<td>
											<textarea name = "explo_respira" rows="2" cols="160">@if(isset($current[0])){{$current[0]->explo_respira}}@else {{''}} @endif</textarea>
											</td>
										</tr>
										<tr>
											<td>Ap. Digestivo</td>
											<td>
												<div class="radio">
													<label><input type = "radio" name = "explo_sitdigestivo" value = "normal" @if(isset($current[0]))@if($current[0]->explo_sitdigestivo == 'normal'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif/>Normal</label>
													<label><input type = "radio" name = "explo_sitdigestivo" value = "anormal" @if(isset($current[0]))@if($current[0]->explo_sitdigestivo == 'anormal'){{'checked'}}@else {{''}} @endif @else {{''}} @endif/>Anormal</label>
												</div>
											</td>
											<td>
											<textarea name = "explo_digestivo" rows="2" cols="160">@if(isset($current[0])){{$current[0]->explo_digestivo}}@else {{''}} @endif</textarea>
											</td>
										</tr>
										<tr>
											<td>Ap. Cardiovascular</td>
											<td>
												<div class="radio">
													<label><input type = "radio" name = "explo_sitcardio" value = "normal" @if(isset($current[0]))@if($current[0]->explo_sitcardio == 'normal'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif/>Normal</label>
													<label><input type = "radio" name = "explo_sitcardio" value = "anormal" @if(isset($current[0]))@if($current[0]->explo_sitcardio == 'anormal'){{'checked'}}@else {{''}} @endif @else {{''}} @endif/>Anormal</label>
												</div>
											</td>
											<td>
											<textarea name = "explo_cardio" rows="2" cols="160">@if(isset($current[0])){{$current[0]->explo_cardio}}@else {{''}} @endif</textarea>
											</td>
										</tr>
										<tr>
											<td>Abdomen</td>
											<td>
												<div class="radio">
													<label><input type = "radio" name = "explo_sitabdomen" value = "normal" @if(isset($current[0]))@if($current[0]->explo_sitabdomen == 'normal'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif/>Normal</label>
													<label><input type = "radio" name = "explo_sitabdomen" value = "anormal" @if(isset($current[0]))@if($current[0]->explo_sitabdomen == 'anormal'){{'checked'}}@else {{''}} @endif @else {{''}} @endif/>Anormal</label>
												</div>
											</td>
											<td>
											<textarea name = "explo_abdomen" rows="2" cols="160">@if(isset($current[0])){{$current[0]->explo_abdomen}}@else {{''}} @endif</textarea>
											</td>
										</tr>
										<tr>
											<td>Genitourinario</td>
											<td>
												<div class="radio">
													<label><input type = "radio" name = "explo_sitgenituario" value = "normal" @if(isset($current[0]))@if($current[0]->explo_sitgenituario == 'normal'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif/>Normal</label>
													<label><input type = "radio" name = "explo_sitgenituario" value = "anormal" @if(isset($current[0]))@if($current[0]->explo_sitgenituario == 'anormal'){{'checked'}}@else {{''}} @endif @else {{''}} @endif/>Anormal</label>
												</div>
											</td>
											<td>
											<textarea name = "explo_genituario" rows="2" cols="160">@if(isset($current[0])){{$current[0]->explo_genituario}}@else {{''}} @endif</textarea>
											</td>
										</tr>
										<tr>
											<td>Extremidades</td>
											<td>
												<div class="radio">
													<label><input type = "radio" name = "explo_sitextremidades" value = "normal" @if(isset($current[0]))@if($current[0]->explo_sitextremidades == 'normal'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif/>Normal</label>
													<label><input type = "radio" name = "explo_sitextremidades" value = "anormal" @if(isset($current[0]))@if($current[0]->explo_sitextremidades == 'anormal'){{'checked'}}@else {{''}} @endif @else {{''}} @endif/>Anormal</label>
												</div>
											</td>
											<td>
											<textarea name = "explo_extremidades" rows="2" cols="160">@if(isset($current[0])){{$current[0]->explo_extremidades}}@else {{''}} @endif</textarea>
											</td>
										</tr>
										<tr>
											<td>Ap. Musculo esquelético</td>
											<td>
												<div class="radio">
													<label><input type = "radio" name = "explo_sitesqueletico" value = "normal" @if(isset($current[0]))@if($current[0]->explo_sitesqueletico == 'normal'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif/>Normal</label>
													<label><input type = "radio" name = "explo_sitesqueletico" value = "anormal" @if(isset($current[0]))@if($current[0]->explo_sitesqueletico == 'anormal'){{'checked'}}@else {{''}} @endif @else {{''}} @endif/>Anormal</label>
												</div>
											</td>
											<td>
											<textarea name = "explo_esqueletico" rows="2" cols="160">@if(isset($current[0])){{$current[0]->explo_esqueletico}}@else {{''}} @endif</textarea>
											</td>
										</tr>
										<tr>
											<td>S.N.C.</td>
											<td>
												<div class="radio">
													<label><input type = "radio" name = "explo_sitsnc" value = "normal" @if(isset($current[0]))@if($current[0]->explo_sitsnc == 'normal'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif/>Normal</label>
													<label><input type = "radio" name = "explo_sitsnc" value = "anormal" @if(isset($current[0]))@if($current[0]->explo_sitsnc == 'anormal'){{'checked'}}@else {{''}} @endif @else {{''}} @endif/>Anormal</label>
												</div>
											</td>
											<td>
											<textarea name = "explo_snc" rows="2" cols="160">@if(isset($current[0])){{$current[0]->explo_snc}}@else {{''}} @endif</textarea>
											</td>
										</tr>
										<tr>
											<td>Otras especificaciones</td>
											<td>
												<div class="radio">
													<label><input type = "radio" name = "explo_sitotras" value = "normal" @if(isset($current[0]))@if($current[0]->explo_sitotras == 'normal'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif/>Normal</label>
													<label><input type = "radio" name = "explo_sitotras" value = "anormal" @if(isset($current[0]))@if($current[0]->explo_sitotras == 'anormal'){{'checked'}}@else {{''}} @endif @else {{''}} @endif/>Anormal</label>
												</div>
											</td>
											<td>
											<textarea name = "explo_otras" rows="2" cols="160">@if(isset($current[0])){{$current[0]->explo_otras}}@else {{''}} @endif</textarea>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					
					<div class="btns-form-ad">
						<a href="#" class="btn btn-primary btn-sm save-exploracion" data = "5"><span
							class="glyphicon glyphicon-arrow-left"></span><span
							class="pageh-text-btn">Anterior</span></a> 
						<a href="#"
							class="btn btn-primary btn-sm save-exploracion" data = "7"><span
							class="glyphicon glyphicon-arrow-right"></span><span
							class="pageh-text-btn">Siguiente</span></a>
						<a href ="#" class="btn btn-primary btn-sm save-exploracion" data = "0">
							<span class="glyphicon glyphicon-floppy-disk"></span><span
								class="pageh-text-btn">Guardar</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

{{ Form::close() }}
</div>
<!-- /Container -->

<script>

$(document).ready(OnCreateCliente);

function OnCreateCliente(){
	var now = new Date();
	var yr = now.getFullYear();
	$('input[datatype="Char"]').on("blur",{params:''},upperCase);
	$('input[datatype="Int"]').on("keypress",{params:''},decimal);
	$('#explo_talla').change(function(){calIMC()});
	$('#explo_talla').focusout(function(){calIMC()});
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

    url = "exploracion/saveexploracion";
	options = {
		'url':url,
		'type':'POST',
		'datatype':'json'
	};

	frm = $('#formExploracion');
	validateForm(frm, formRules, formMessages);
	$('.save-exploracion').on("click", {params:options, form:frm}, saveExploracion);

}
function saveExploracion(event){

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
					showAlert("error", "No se pudo guardar el perfil del paciente");
				}else{
					if(view == 0){
					showAlert("success", "Exploracion Fisica del paciente agregado correctamente");
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

