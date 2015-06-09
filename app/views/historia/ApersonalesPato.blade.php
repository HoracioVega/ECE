<div class="alert-box-container"><div id="alert-box" class=""><p>Mensaje</p></div></div>
		<!-- Container -->
		<div class="container-fluid">

			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="page-header nomargintop">
								<h4>Antecedentes Personales Patológicos</h4>
								<a href = "#" class="btn btn-primary btn-sm btn-savePatologico" data = "0"><span class="glyphicon glyphicon-floppy-disk"></span><span class="pageh-text-btn">Guardar</span></a>
								<a href = "#" class="btn btn-primary btn-sm btn-savePatologico" data = "5"><span class="glyphicon glyphicon-arrow-right"></span><span class="pageh-text-btn">Siguiente</span></a>
								<a href = "#" class="btn btn-primary btn-sm btn-savePatologico" data = "3"><span class="glyphicon glyphicon-arrow-left"></span><span class="pageh-text-btn">Anterior</span></a>
								<a href = "#" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-warning-sign"></span><span class="pageh-text-btn">Llenar Línea de vida</span></a>
							</div>
							{{ Form::open(array( 'id' => 'formPatologico', 'role' => 'form',
							'class' => 'text-center')) }}
					
							{{ Form::hidden('expediente_id',
							$expediente_id, array('class'=>'form-control'
							,'id' => 'expediente_id')) }}
								<div class="row">
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<div class="table-responsive">
											<table class="table table-hover table-striped textarea-min radio-min">
												<thead>
													<tr>
														<th>Concepto</th>
														<th>¿Aplica?</th>
														<th width="50%">Observaciones</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Hepatitis</td>
														<td>
															<div class="radio">
																<label><input type="radio" name="pato_hepatitis" value="No" @if(isset($current[0]))@if($current[0]->pato_hepatitis == 'No'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif>No</label>
																<label><input type="radio" name="pato_hepatitis" value="Si" @if(isset($current[0]))@if($current[0]->pato_hepatitis == 'Si'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif>Si</label>
															</div>
														</td>
														<td><textarea name = "pato_hepatitisdetail" class="form-control" rows="1">@if(isset($current[0])){{$current[0]->pato_hepatitisdetail}}@else{{''}}@endif</textarea></td>
													</tr>
													<tr>
														<td>Sarampión</td>
														<td><div class="radio">
																<label><input type="radio" name="pato_sarampion"  value="No" @if(isset($current[0]))@if($current[0]->pato_sarampion == 'No'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif>No</label>
																<label><input type="radio" name="pato_sarampion"  value="Si" @if(isset($current[0]))@if($current[0]->pato_sarampion == 'Si'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif>Si</label>
															</div>
														</td>
														<td><textarea name = "pato_sarampiondetail" class="form-control" rows="1" >@if(isset($current[0])){{$current[0]->pato_sarampiondetail}}@else{{''}}@endif</textarea></td>
													</tr>
													<tr>
														<td>Rubeola</td>
														<td><div class="radio">
																<label><input type="radio" name="pato_rubeola"  value="No" @if(isset($current[0]))@if($current[0]->pato_rubeola == 'No'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif>No</label>
																<label><input type="radio" name="pato_rubeola"  value="Si" @if(isset($current[0]))@if($current[0]->pato_rubeola == 'Si'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif>Si</label>
															</div>
														</td>
														<td><textarea name = "pato_rubeoladetail" class="form-control" rows="1" >@if(isset($current[0])){{$current[0]->pato_rubeoladetail}}@else{{''}}@endif</textarea></td>
													</tr>
													<tr>
														<td>Tosferina</td>
														<td><div class="radio">
																<label><input type="radio" name="pato_tosferina"  value="No" @if(isset($current[0]))@if($current[0]->pato_tosferina == 'No'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif>No</label>
																<label><input type="radio" name="pato_tosferina"  value="Si" @if(isset($current[0]))@if($current[0]->pato_tosferina == 'Si'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif>Si</label>
															</div>
														</td>
														<td><textarea name = "pato_tosferinadetail" class="form-control" rows="1" >@if(isset($current[0])){{$current[0]->pato_tosferinadetail}}@else{{''}}@endif</textarea></td>
													</tr>
													<tr>
														<td>Varicela</td>
														<td><div class="radio">
																<label><input type="radio" name="pato_varicela"  value="No" @if(isset($current[0]))@if($current[0]->pato_varicela == 'No'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif>No</label>
																<label><input type="radio" name="pato_varicela"  value="Si" @if(isset($current[0]))@if($current[0]->pato_varicela == 'Si'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif>Si</label>
															</div>
														</td>
														<td><textarea name = "pato_variceladetail" class="form-control" rows="1" >@if(isset($current[0])){{$current[0]->pato_variceladetail}}@else{{''}}@endif</textarea></td>
													</tr>
													<tr>
														<td>Escarlatina</td>
														<td><div class="radio">
																<label><input type="radio" name="pato_escarlatina"  value="No" @if(isset($current[0]))@if($current[0]->pato_escarlatina == 'No'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif>No</label>
																<label><input type="radio" name="pato_escarlatina"  value="Si" @if(isset($current[0]))@if($current[0]->pato_escarlatina == 'Si'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif>Si</label>
															</div>
														</td>
														<td><textarea name = "pato_escarlatinadetail" class="form-control" rows="1" >@if(isset($current[0])){{$current[0]->pato_escarlatinadetail}}@else{{''}}@endif</textarea></td>
													</tr>
													<tr>
														<td>Amigdalitis</td>
														<td><div class="radio">
																<label><input type="radio" name="pato_amigdalitis"  value="No" @if(isset($current[0]))@if($current[0]->pato_amigdalitis == 'No'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif>No</label>
																<label><input type="radio" name="pato_amigdalitis"  value="Si" @if(isset($current[0]))@if($current[0]->pato_amigdalitis == 'Si'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif>Si</label>
															</div>
														</td>
														<td><textarea name = "pato_amigdalitisdetail" class="form-control" rows="1" >@if(isset($current[0])){{$current[0]->pato_amigdalitisdetail}}@else{{''}}@endif</textarea></td>
													</tr>
													<tr>
														<td>Alergias</td>
														<td><div class="radio">
																<label><input type="radio" name="pato_alergias"  value="No" @if(isset($current[0]))@if($current[0]->pato_alergias == 'No'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif>No</label>
																<label><input type="radio" name="pato_alergias"  value="Si" @if(isset($current[0]))@if($current[0]->pato_alergias == 'Si'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif>Si</label>
															</div>
														</td>
														<td><textarea name = "pato_alergiasdetail" class="form-control" rows="1" >@if(isset($current[0])){{$current[0]->pato_alergiasdetail}}@else{{''}}@endif</textarea></td>
													</tr>
													<tr>
														<td>Sobrepeso</td>
														<td><div class="radio">
																<label><input type="radio" name="pato_sobrepeso"  value="No" @if(isset($current[0]))@if($current[0]->pato_sobrepeso == 'No'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif>No</label>
																<label><input type="radio" name="pato_sobrepeso"  value="Si" @if(isset($current[0]))@if($current[0]->pato_sobrepeso == 'Si'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif>Si</label>
															</div>
														</td>
														<td><textarea name = "pato_sobrepesodetail" class="form-control" rows="1" >@if(isset($current[0])){{$current[0]->pato_sobrepesodetail}}@else{{''}}@endif</textarea></td>
													</tr>
													<tr>
														<td>Diabetes Mellitus</td>
														<td><div class="radio">
																<label><input type="radio" name="pato_dm"  value="No" @if(isset($current[0]))@if($current[0]->pato_dm == 'No'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif>No</label>
																<label><input type="radio" name="pato_dm"  value="Si" @if(isset($current[0]))@if($current[0]->pato_dm == 'Si'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif>Si</label>
															</div>
														</td>
														<td><textarea name = "pato_dmdetail" class="form-control" rows="1" >@if(isset($current[0])){{$current[0]->pato_dmdetail}}@else{{''}}@endif</textarea></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>

									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-offset-1 col-lg-5">
										<div class="table-responsive">
											<table class="table table-hover table-striped textarea-min radio-min">
												<thead>
													<tr>
														<th>Concepto</th>
														<th>¿Aplica?</th>
														<th width="50%">Observaciones</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Parasitosis intestinal</td>
														<td>
															<div class="radio">
																<label><input type="radio" name="pato_parasitos" value="No" @if(isset($current[0]))@if($current[0]->pato_parasitos == 'No'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif>No</label>
																<label><input type="radio" name="pato_parasitos" value="Si" @if(isset($current[0]))@if($current[0]->pato_parasitos == 'Si'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif>Si</label>
															</div>
														</td>
														<td><textarea name = "pato_parasitosdetail" class="form-control" rows="1">@if(isset($current[0])){{$current[0]->pato_parasitosdetail}}@else{{''}}@endif</textarea></td>
													</tr>
													<tr>
														<td>Convulsiones</td>
														<td><div class="radio">
																<label><input type="radio" name="pato_convulciones"  value="No" @if(isset($current[0]))@if($current[0]->pato_convulciones == 'No'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif>No</label>
																<label><input type="radio" name="pato_convulciones"  value="Si" @if(isset($current[0]))@if($current[0]->pato_convulciones == 'Si'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif>Si</label>
															</div>
														</td>
														<td><textarea name = "pato_convulcionesdetail" class="form-control" rows="1" >@if(isset($current[0])){{$current[0]->pato_convulcionesdetail}}@else{{''}}@endif</textarea></td>
													</tr>
													<tr>
														<td>Urosepsis</td>
														<td><div class="radio">
																<label><input type="radio" name="pato_urospsis"  value="No" @if(isset($current[0]))@if($current[0]->pato_urospsis == 'No'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif>No</label>
																<label><input type="radio" name="pato_urospsis"  value="Si" @if(isset($current[0]))@if($current[0]->pato_urospsis == 'Si'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif>Si</label>
															</div>
														</td>
														<td><textarea name = "pato_urospsisdetail" class="form-control" rows="1" >@if(isset($current[0])){{$current[0]->pato_urospsisdetail}}@else{{''}}@endif</textarea></td>
													</tr>
													<tr>
														<td>Traumatismos</td>
														<td><div class="radio">
																<label><input type="radio" name="pato_traumatismo"  value="No" @if(isset($current[0]))@if($current[0]->pato_traumatismo == 'No'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif>No</label>
																<label><input type="radio" name="pato_traumatismo"  value="Si" @if(isset($current[0]))@if($current[0]->pato_traumatismo == 'Si'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif>Si</label>
															</div>
														</td>
														<td><textarea name = "pato_traumatismodetail" class="form-control" rows="1" >@if(isset($current[0])){{$current[0]->pato_traumatismodetail}}@else{{''}}@endif</textarea></td>
													</tr>
													<tr>
														<td>Quirurgico</td>
														<td><div class="radio">
																<label><input type="radio" name="pato_cirugia"  value="No" @if(isset($current[0]))@if($current[0]->pato_cirugia == 'No'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif>No</label>
																<label><input type="radio" name="pato_cirugia"  value="Si" @if(isset($current[0]))@if($current[0]->pato_cirugia == 'Si'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif>Si</label>
															</div>
														</td>
														<td><textarea name = "pato_cirugiadetail" class="form-control" rows="1" >@if(isset($current[0])){{$current[0]->pato_cirugiadetail}}@else{{''}}@endif</textarea></td>
													</tr>
													<tr>
														<td>Ingreso a Hospital</td>
														<td><div class="radio">
																<label><input type="radio" name="pato_hospital"  value="No" @if(isset($current[0]))@if($current[0]->pato_hospital == 'No'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif>No</label>
																<label><input type="radio" name="pato_hospital"  value="Si" @if(isset($current[0]))@if($current[0]->pato_hospital == 'Si'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif>Si</label>
															</div>
														</td>
														<td><textarea name = "pato_hospitaldetail" class="form-control" rows="1" >@if(isset($current[0])){{$current[0]->pato_hospitaldetail}}@else{{''}}@endif</textarea></td>
													</tr>
													<tr>
														<td>HTA</td>
														<td><div class="radio">
																<label><input type="radio" name="pato_hta"  value="No" @if(isset($current[0]))@if($current[0]->pato_hta == 'No'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif>No</label>
																<label><input type="radio" name="pato_hta"  value="Si" @if(isset($current[0]))@if($current[0]->pato_hta == 'Si'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif>Si</label>
															</div>
														</td>
														<td><textarea name = "pato_htadetail" class="form-control" rows="1">@if(isset($current[0])){{$current[0]->pato_htadetail}}@else{{''}}@endif</textarea></td>
													</tr>
													<tr>
														<td>Obesidad</td>
														<td><div class="radio">
																<label><input type="radio" name="pato_obesidad"  value="No" @if(isset($current[0]))@if($current[0]->pato_obesidad == 'No'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif>No</label>
																<label><input type="radio" name="pato_obesidad"  value="Si" @if(isset($current[0]))@if($current[0]->pato_obesidad == 'Si'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif>Si</label>
															</div>
														</td>
														<td><textarea name = "pato_obesidaddetail" class="form-control" rows="1" >@if(isset($current[0])){{$current[0]->pato_obesidaddetail}}@else{{''}}@endif</textarea></td>
													</tr>
													<tr>
														<td>Otros</td>
														<td><div class="radio">
																<label><input type="radio" name="pato_otros"  value="No" @if(isset($current[0]))@if($current[0]->pato_otros == 'No'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif>No</label>
																<label><input type="radio" name="pato_otros"  value="Si" @if(isset($current[0]))@if($current[0]->pato_otros == 'Si'){{'checked'}}@else {{''}} @endif @else {{'checked'}} @endif>Si</label>
															</div>
														</td>
														<td><textarea name = "pato_otrosdetail" class="form-control" rows="1" >@if(isset($current[0])){{$current[0]->pato_otrosdetail}}@else{{''}}@endif</textarea></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								{{ Form::close() }}
								<div class="btns-form-ad">
									<a href = "#" class="btn btn-primary btn-sm btn-savePatologico" data = "3"><span class="glyphicon glyphicon-arrow-left"></span><span class="pageh-text-btn">Anterior</span></a>
									<a href = "#" class="btn btn-primary btn-sm btn-savePatologico" data = "5"><span class="glyphicon glyphicon-arrow-right"></span><span class="pageh-text-btn">Siguiente</span></a>
									<a href = "#" class="btn btn-primary btn-sm btn-savePatologico" data = "0"><span class="glyphicon glyphicon-floppy-disk"></span><span class="pageh-text-btn">Guardar</span></a>
								</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		
<script>

$(document).ready(OnCreateCliente);

function OnCreateCliente(){
	var now = new Date();

    url = "patologicos/savepatologico";
	options = {
		'url':url,
		'type':'POST',
		'datatype':'json'
	};

	frm = $('#formPatologico');
	$('.btn-savePatologico').on("click", {params:options, form:frm}, savePatologico);

}

function savePatologico(event){

	var view = $(this).attr('data');

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
					showAlert("error", "No se pudo guardar la informacion del paciente");
				}else{
					if(view == 0){showAlert("success", "La informacion ha sido guardada correctamente");}
					else{getView(view);}//CARGA EL SIGUIENTE FORMULARIO
				}
			})
			.fail(function(data){
				showAlert("error", "Error desconocido");
			});
		}
		flag = false;
}


</script>		