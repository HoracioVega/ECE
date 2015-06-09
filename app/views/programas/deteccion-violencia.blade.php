<div class="alert-box-container">
	<div id="alert-box" class="">
		<p>Mensaje</p>
	</div>
</div>
<!-- Container -->
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="panel panel-default">
						<div class="panel-body">
							<h2 class="nomargin text-primary">Detección de violencia</h2>
							<h4 class="text-muted">Entrevista de detección</h4>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="page-header nomargintop">
								<h4>Datos de identificación</h4>
							</div>

							<form class="form-horizontal">
								<div class="row">
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<div class="form-group">
											<label class="col-xs-12 col-sm-4 col-md-4 col-lg-4">No. Expediente:</label>
											<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
												<p>{{$infoPaciente->expediente_id}}</p>
											</div>
										</div>
										<div class="form-group">
											<label class="col-xs-12 col-sm-4 col-md-4 col-lg-4">Nombres:</label>
											<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
												<p>{{$infoPaciente->paciente_nombre}}</p>
											</div>
											<label class="col-xs-12 col-sm-4 col-md-4 col-lg-4">Apellidos:</label>
											<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
												<p>{{$infoPaciente->paciente_app}} {{$infoPaciente->paciente_apm}}</p>
											</div>
											<label class="col-xs-12 col-sm-4 col-md-4 col-lg-4">Nacimiento:</label>
											<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
												<p>{{$infoPaciente->paciente_fecNac}}</p>
											</div>
											<label class="col-xs-12 col-sm-4 col-md-4 col-lg-4"></label><!-- edad -->
											<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
												<p></p>
											</div>
											<label class="col-xs-12 col-sm-4 col-md-4 col-lg-4">Sexo:</label>
											<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
												<p>{{$infoPaciente->paciente_sexo}}</p>
											</div>
										</div>
									</div>
									<!-- talla?? -->
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<div class="form-group">
											<label class="col-xs-12 col-sm-4 col-md-4 col-lg-4"></label><!-- talla -->
											<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
												<p></p>
											</div>
											<label class="col-xs-12 col-sm-4 col-md-4 col-lg-4">Estudios:</label>
											<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
												<p>{{$infoPaciente->escolaridad_nombre}}</p>
											</div>
										</div>
										<div class="form-group">
											<label class="col-xs-12 col-sm-4 col-md-4 col-lg-4">Indigena:</label>
											<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
												<p>{{$infoPaciente->paciente_indigena}}</p>
											</div>
											<label class="col-xs-12 col-sm-4 col-md-4 col-lg-4">Domicilio:</label>
											<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
												<p>{{$infoPaciente->paciente_calle}} #{{$infoPaciente->paciente_numDom}} Col. {{$infoPaciente->paciente_colonia}}</p>
											</div>
											<label class="col-xs-12 col-sm-4 col-md-4 col-lg-4">Derechohabiencia:</label>
											<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
												<p>{{$infoPaciente->seg_nombre}}</p>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>

					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
						<div class="panel panel-primary">
							<div class="panel-heading" role="tab" id="headingOne">
								<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#cuestionario">Cuestionario</a></h4>
							</div>
							<div id="cuestionario" class="panel-collapse collapse" role="tabpanel">
								<div class="panel-body">
									<div class="row">
										<div class="col-xs-12">
											<form role="form" id="formVioPsico">
												<legend><small>Violencia psicológica</small></legend>
												<div class="row">
													<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 form-group">
														<label for="">¿La culpa de todo lo malo que pasa?</label>
														<select name="det_psico_culpa" id="" class="form-control">
															<option>No</option>
															<option>Sí</option>
														</select>
														<input type="hidden" value={{$edad_paciente}} name="det_psico_edad">
														<input type="hidden" value={{$expediente_id}} name="expediente_id">
													</div>
													<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 form-group">
														<label for="">¿Quién lo hizo?</label>
														
                                                        <input name="det_psico_culpa_detail1" type="text" class="form-control" id="" placeholder="@if(isset($valores_cuestionario)){{$valores_cuestionario['valoresPsico']->det_psico_culpa_detail1}}@endif">
													</div>
													<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 form-group">
														<label for="">¿Por cuánto tiempo?</label>
														<input name="det_psico_culpa_detail2" type="text" class="form-control" id="" placeholder="@if(isset($valores_cuestionario)){{$valores_cuestionario['valoresPsico']->det_psico_culpa_detail2}}@endif">
													</div>

													<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 form-group">
														<label for="">¿Le controla en la mayoria de las ocasiones?</label>
														<select name="det_psico_controla" id="" class="form-control">
															<option>No</option>
															<option>Sí</option>
														</select>
													</div>
													<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 form-group">
														<label for="">¿Quién lo hizo?</label>
														<input name="det_psico_controla_detail1" type="text" class="form-control" id="" placeholder="@if(isset($valores_cuestionario)){{$valores_cuestionario['valoresPsico']->det_psico_controla_detail1}}@endif">
													</div>
													<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 form-group">
														<label for="">¿Por cuánto tiempo?</label>
														<input name="det_psico_controla_detail2" type="text" class="form-control" id="" placeholder="@if(isset($valores_cuestionario)){{$valores_cuestionario['valoresPsico']->det_psico_controla_detail2}}@endif">
													</div>

													<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 form-group">
														<label for="">¿Le ha menos preciado o humillado?</label>
														<select name="det_psico_humilla" name="" id="" class="form-control">
															<option>No</option>
															<option>Sí</option>
														</select>
													</div>
													<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 form-group">
														<label for="">¿Quién lo hizo?</label>
														<input name="det_psico_humilla_detail1" type="text" class="form-control" id="" placeholder="@if(isset($valores_cuestionario)){{$valores_cuestionario['valoresPsico']->det_psico_humilla_detail1}}@endif">
													</div>
													<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 form-group">
														<label for="">¿Por cuánto tiempo?</label>
														<input name="det_psico_humilla_detail2" type="text" class="form-control" id="" placeholder="@if(isset($valores_cuestionario)){{$valores_cuestionario['valoresPsico']->det_psico_humilla_detail2}}@endif">
													</div>

													<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 form-group">
														<label for="">¿Le ha amenazado con golpearla?</label>
														<select name="det_psico_amenaza" id="" class="form-control">
															<option>No</option>
															<option>Sí</option>
														</select>
													</div>
													<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 form-group">
														<label for="">¿Quién lo hizo?</label>
														<input name="det_psico_amenaza_detail1" type="text" class="form-control" id="" placeholder="@if(isset($valores_cuestionario)){{$valores_cuestionario['valoresPsico']->det_psico_amenaza_detail1}}@endif">
													</div>
													<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 form-group">
														<label for="">¿Por cuánto tiempo?</label>
														<input name="det_psico_amenaza_detail2" type="text" class="form-control" id="" placeholder="@if(isset($valores_cuestionario)){{$valores_cuestionario['valoresPsico']->det_psico_amenaza_detail2}}@endif">
													</div>

													<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 form-group">
														<label for="">¿Le ha amenazado con quitarle a sus hijos?</label>
														<select name="det_psico_hijos" id="" class="form-control">
															<option>No</option>
															<option>Sí</option>
														</select>
													</div>
													<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 form-group">
														<label for="">¿Quién lo hizo?</label>
														<input name="det_psico_hijos_detail1" type="text" class="form-control" id="" placeholder="@if(isset($valores_cuestionario)){{$valores_cuestionario['valoresPsico']->det_psico_hijos_detail1}}@endif">
													</div>
													<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 form-group">
														<label for="">¿Por cuánto tiempo?</label>
														<input name="det_psico_hijos_detail2" type="text" class="form-control" id="" placeholder="@if(isset($valores_cuestionario)){{$valores_cuestionario['valoresPsico']->det_psico_hijos_detail2}}@endif">
													</div>

													<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
														<label for="">Anote indicaciones de sospecha</label>
														<textarea name="det_psico_sospecha" class="form-control" rows="2">
                                                        </textarea>
													</div>
												</div>											
											</form>

											<form id="formVioFis" >
												<legend><small>Violencia física</small></legend>
												<div class="row">
													<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 form-group">
														<label for="">¿Le ha golpeado dejándole heridas?</label>
														<select name="det_fis_golpea" id="" class="form-control">
															<option>No</option>
															<option>Sí</option>
														</select>
														<input type="hidden" value={{$edad_paciente}} name="det_fis_edad">
														<input type="hidden" value={{$expediente_id}} name="expediente_id">
													</div>
													<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 form-group">
														<label for="">¿Quién lo hizo?</label>
														<input name="det_fis_golpea_detail1" type="text" class="form-control" id="" placeholder="">
													</div>
													<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 form-group">
														<label for="">¿Por cuánto tiempo?</label>
														<input name="det_fis_golpea_detail2"type="text" class="form-control" id="" placeholder="">
													</div>

													<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 form-group">
														<label for="">¿Le ha tratado de ahorcar?</label>
														<select name="det_fis_ahorcar" id="" class="form-control">
															<option>No</option>
															<option>Sí</option>
														</select>
													</div>
													<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 form-group">
														<label for="">¿Quién lo hizo?</label>
														<input name="det_fis_ahorcar_detail1" type="text" class="form-control" id="" placeholder="">
													</div>
													<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 form-group">
														<label for="">¿Por cuánto tiempo?</label>
														<input name="det_fis_ahorcar_detail2" type="text" class="form-control" id="" placeholder="">
													</div>

													<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 form-group">
														<label for="">¿Le ha agredido con algún objeto?</label>
														<select name="det_fis_agredir" id="" class="form-control">
															<option>No</option>
															<option>Sí</option>
														</select>
													</div>
													<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 form-group">
														<label for="">¿Quién lo hizo?</label>
														<input name="det_fis_agredir_detail1" type="text" class="form-control" id="" placeholder="">
													</div>
													<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 form-group">
														<label for="">¿Por cuánto tiempo?</label>
														<input name="det_fis_agredir_detail2" type="text" class="form-control" id="" placeholder="">
													</div>

													<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
														<label for="">Anote indicaciones de sospecha</label>
														<textarea name="det_fis_sospecha" class="form-control" rows="2"></textarea>
													</div>
												</div>
											</form>

											<form id="formVioSexual">
												<legend><small>Violencia sexual</small></legend>
												<div class="row">
													<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 form-group">
														<label for="">¿Le ha forzado a manoseos?</label>
														<select name="det_sex_tocamientos"  class="form-control">
															<option>No</option>
															<option>Sí</option>
														</select>
														<input type="hidden" value={{$edad_paciente}} name="det_sex_edad">
														<input type="hidden" value={{$expediente_id}} name="expediente_id">
													</div>
													<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 form-group">
														<label for="">¿Quién lo hizo?</label>
														<input name="det_sex_tocamientos_detail1" type="text" class="form-control" id="" placeholder="">
													</div>
													<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 form-group">
														<label for="">¿Por cuánto tiempo?</label>
														<input name="det_sex_tocamientos_detail2" type="text" class="form-control" id="" placeholder="">
													</div>

													<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 form-group">
														<label for="">¿Le ha forzado a tener relaciones con violencia física?</label>
														<select name="det_sex_relaciones_violencia" id="" class="form-control">
															<option>No</option>
															<option>Sí</option>
														</select>
													</div>
													<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 form-group">
														<label for="">¿Quién lo hizo?</label>
														<input name="det_sex_rel_violencia_detail1" type="text" class="form-control" id="" placeholder="">
													</div>
													<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 form-group">
														<label for="">¿Por cuánto tiempo?</label>
														<input name="det_sex_rel_violencia_detail2" type="text" class="form-control" id="" placeholder="">
													</div>

													<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 form-group">
														<label for="">¿Le ha forzado a tener relaciones y resulto embarazada?</label>
														<select name="det_sex_rel_embarazo" id="" class="form-control">
															<option>No</option>
															<option>Sí</option>
														</select>
													</div>
													<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 form-group">
														<label for="">¿Quién lo hizo?</label>
														<input name="det_sex_rel_embarazo_detail1" type="text" class="form-control" id="" placeholder="">
													</div>
													<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 form-group">
														<label for="">¿Por cuánto tiempo?</label>
														<input name="det_sex_rel_embarazo_detail2" type="text" class="form-control" id="" placeholder="">
													</div>

													<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
														<label for="">Anote indicaciones de sospecha</label>
														<textarea name="det_sex_sospecha" class="form-control" rows="2"></textarea>
													</div>
												</div>
											</form>
										</div>
										<div class="col-xs-12 text-right">
											<button id="guarda_violencia" class="btn btn-primary btn-sm" type="submit">Guardar</button>
										</div>
									</div>
								</div>
							</div>		
						</div>
					</div>
                     <br>
                        <p><mark>Fecha ultimo cuestionario aplicado: {{$fecha_ult_c}}</mark></p>
				</div>
			</div>
		</div><!-- /Container -->
		<script>

		$(document).ready(function(){

			$("#guarda_violencia").click(function() {

				guardaViolenciaSexual(); 
                
			});	
					
		});
			function centrar() {
			    iz=(screen.width-document.body.clientWidth) / 2;
			    de=(screen.height-document.body.clientHeight) / 2;
			    moveTo(iz,de);
			}    

			function guardaViolenciaSexual()
			{
				var dataForm=$("#formVioSexual").serialize();
				var urlRoot = '<?php echo Request::root();?>';

				//dataForm;
				var envio=$.ajax({
						type: "POST",
						url: urlRoot+"/programa/deteccion/guardaviosexual",
						data: dataForm,
						dataType: 'JSON'
					});

				envio.done(function(data){

					if(data.correcto==true)
						guardaViolenciaFis();//showAlert("success", "Cuestionario Violencia sexual correctamente guardado");
					else
						showAlert("error", "No fue posible guardar el cuestionario de Violencia sexual");	
					
				});
				
				envio.fail(function(data,textStatus){
					showAlert("error", "Error desconocido: "+data, textStatus);
				});

			}

			function guardaViolenciaFis()
			{
				var dataForm=$("#formVioFis").serialize();
				var urlRoot = '<?php echo Request::root();?>';

				//dataForm;
				var envio=$.ajax({
						type: "POST",
						url: urlRoot+"/programa/deteccion/guardaviofisica",
						data: dataForm,
						dataType: 'JSON'
					});

				envio.done(function(data){

					if(data.correcto==true)
						guardaViolenciaPsico();//showAlert("success", "Cuestionarios correctamente guardados");
					else
						showAlert("error", "No fue posible guardar los cuestinarios");	
					
				});
				
				envio.fail(function(data,textStatus){
					showAlert("error", "Error desconocido: "+data, textStatus);
				});
			}

			function guardaViolenciaPsico()
			{
				var dataForm=$("#formVioPsico").serialize();
				var urlRoot = '<?php echo Request::root();?>';

				//dataForm;
				var envio=$.ajax({
						type: "POST",
						url: urlRoot+"/programa/deteccion/guardaviopsico",
						data: dataForm,
						dataType: 'JSON'
					});

				 envio.done(function(data){

					if(data.correcto==true)
						showAlert("success", "Cuestionarios correctamente guardados");
					else
						showAlert("error", "No fue posible guardar los cuestinarios");	
					
				});
				
				envio.fail(function(data,textStatus){
					showAlert("error", "Error desconocido: "+data, textStatus);
				});

			}
		</script>