<div class="alert-box-container"><div id="alert-box" class=""><p>Mensaje</p></div></div>
<div class="container-fluid">
	<div class="row"></div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="page-header nomargintop">
						<h4>Referencia</h4>
						<input type="hidden" id="referencia_id">
						<a href="" class="btn btn-primary btn-sm"><span
							class="glyphicon glyphicon-floppy-disk"></span><span
							class="pageh-text-btn">Guardar</span></a> <a id="print-ref-sup" onclick="imprimirReferencia();" href=""
							class="btn btn-success btn-sm"><span
							class="glyphicon glyphicon-print"></span><span
							class="pageh-text-btn">Imprimir</span></a> <a href=""
							class="btn btn-danger btn-sm"><span
							class="glyphicon glyphicon-warning-sign"></span><span
							class="pageh-text-btn">Llenar Línea de vida</span></a>
					</div>


					<form id="form-datos-ref">
						<div class="row">
							<div class="col-xs-6 col-sm-3 col-md-2 col-lg-2">
								<div class="form-group">
									<label>Fecha:</label> <input type="text" class="form-control" name="referencia_fecha"
										value="{{date('d-m-Y')}}" readOnly>
									<input type="hidden" name="evolucion_id" value="{{$datosClinicos['evolucion_id']}}">
									<input type="hidden" name="exploracion_id" value="{{$datosClinicos['exploracion_id']}}">
									<input type="hidden" name="usu_id" value="{{Session::get('usu_id')}}">
									<input type="hidden" id="expediente_id" name="expediente_id" value="{{Input::get('exp_id')}}">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-6 col-sm-3 col-md-2 col-lg-2">
								<div class="form-group">
									<label>TA:</label>
									<div class="input-group">
										<input type="text" value="{{$datosClinicos['explo_ta']}}" class="form-control" readOnly> <span
											class="input-group-addon">mmHg</span>
									</div>
								</div>
							</div>
							<div class="col-xs-6 col-sm-3 col-md-2 col-lg-2">
								<div class="form-group">
									<label>Temperatura:</label>
									<div class="input-group">
										<input type="text" value="{{$datosClinicos['explo_temp']}}" class="form-control" readOnly> <span
											class="input-group-addon">°</span>
									</div>
								</div>
							</div>
							<div class="col-xs-6 col-sm-3 col-md-2 col-lg-2">
								<div class="form-group">
									<label>F.R.:</label>
									<div class="input-group">
										<input type="text" value="{{$datosClinicos['explo_resp']}}" class="form-control" readOnly> <span
											class="input-group-addon">x min</span>
									</div>
								</div>
							</div>
							<div class="col-xs-6 col-sm-3 col-md-2 col-lg-2">
								<div class="form-group">
									<label>Pulso:</label> <input type="text" value="{{$datosClinicos['explo_pulso']}}" class="form-control"
										disabled>
								</div>
							</div>
							<div class="col-xs-6 col-sm-3 col-md-2 col-lg-2">
								<div class="form-group">
									<label>Peso:</label>
									<div class="input-group">
										<input type="text" value="{{$datosClinicos['explo_peso']}}" class="form-control" readOnly> <span
											class="input-group-addon">kg</span>
									</div>
								</div>
							</div>
							<div class="col-xs-6 col-sm-3 col-md-2 col-lg-2">
								<div class="form-group">
									<label>Talla:</label>
									<div class="input-group">
										<input value="{{$datosClinicos['explo_talla']}}" type="text" class="form-control" readOnly> <span
											class="input-group-addon">mts</span>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="form-group">
									<label>Datos clínicos:</label>
									<textarea class="form-control" rows="2" readOnly>{{$datosClinicos['evolucion_clinicos']}}</textarea>
								</div>
							</div>
						</div>
					</form>

					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="page-header">
								<h4 class="nomargintop">Datos sobre la Unidad a referir</h4>
							</div>

							<form id="form-ref">
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

										<div class="row form-group">
											<div class="col-xs-12 col-sm-6 col-md-6 col-lg-1">
												<label>¿Urgente?:</label>
												<select class="form-control" name="referencia_urgencia">
													<option value="SI">Si</option>
													<option value="NO">No</option>
												</select>
											</div>
											<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
												<label>Unidad origen:</label> <input type="text" value="{{Session::get('clue_nombre_unidad')}}"
													class="form-control" name="referencia_nom_unidad" readOnly>
												<input type="hidden" name="referencia_clue_id" value="{{Session::get('clue_id')}}">
											</div>
											<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
												<label>Unidad destino:</label>
												<div class="input-group">
													<select class="form-control" name="referencia_referido_clue_id" id="referencia_referido_clue_id">
													<option>Seleccione una unidad</option>
													@foreach ($clues as $clue)
													<option value="{{$clue->clue_id}}">{{$clue->clue_nombre_unidad}}</option>
													@endforeach
													</select>
													<input type="hidden" name="referencia_nom_unidad_referido" id="referencia_nom_unidad_referido">
												</div>
											</div>
											<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
												<label>Domicilio:</label> <input type="text" id="referencia_dom_unidad_referido" name="referencia_dom_unidad_ref"
													class="form-control" readOnly>
											</div>
											<div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">
												<label>Servicio:</label>
													<select class="form-control" name="serv_id">
														<option>Elija una opción</option>
														@foreach ($servicios as $servicio)
														<option value="{{$servicio->serv_id}}">{{$servicio->serv_nombre}}</option>
														@endforeach
													</select>
											</div>
										</div>

										<div class="row form-group">

											<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
												<label>Motivo de la referencia:</label>
												<textarea name="referencia_motivo" class="form-control" rows="2"></textarea>
											</div>
										</div>

									</div>
								</div>
							</form>
						</div>

						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="panel-group nomarginbot" id="accordion"
								role="tablist" aria-multiselectable="true">
								<div class="panel panel-info">
									<div class="panel-heading" role="tab" id="headingOne">
										<h4 class="panel-title">
											<a id="cargar-referencias" data-toggle="collapse" data-parent="#accordion"
												href="#collapseOne" aria-expanded="true"
												aria-controls="collapseOne">Referencia <small>Consultas
													previas</small></a>
										</h4>
									</div>

									<div id="collapseOne" class="panel-collapse collapse"
										role="tabpanel" aria-labelledby="headingOne">
										<div class="panel-body">
											<div class="row">
												<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
													<div class="table-responsive">
														<table class="table table-striped table-condensed">
															<thead>
																<tr>
																	<th>Fecha y hora</th>
																	<th width="80px" class="text-center">Acciones</th>
																</tr>
															</thead>
															<tbody id="tbody-referencia">
															</tbody>
														</table>
													</div>
													<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 nopad">
														<div id="paginator-referencia" class="left"></div>
													</div>
												</div>

												<div class="col-xs-12 col-sm-6 col-md-6 col-lg-8">
													<div class="well" id="detalle-referencia-view">
														<h4 class="nomargintop">Detalles</h4>
														<br>

														<form class="form-horizontal" role="form">
															<div class="form-group">
																<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2">Consulta:</label>
																<div class="col-xs-12 col-sm-8 col-md-9 col-lg-10">
																	<p id="fechaRef"></p>
																</div>
															</div>

															<div class="form-group">
																<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2">Médico:</label>
																<div class="col-xs-12 col-sm-8 col-md-9 col-lg-10">
																	<p id="medicoRef"></p>
																</div>
																<label class="col-xs-6 col-sm-4 col-md-3 col-lg-2">TA:</label>
																<div class="col-xs-6 col-sm-8 col-md-9 col-lg-2">
																	<p><span id="taRef"></span> mmHg</p>
																</div>
																<label class="col-xs-6 col-sm-4 col-md-3 col-lg-2">Temperatura:</label>
																<div class="col-xs-6 col-sm-8 col-md-9 col-lg-2">
																	<p><span id="tempRef"></span> °</p>
																</div>
																<label class="col-xs-6 col-sm-4 col-md-3 col-lg-2">FR:</label>
																<div class="col-xs-6 col-sm-8 col-md-9 col-lg-2">
																	<p><span id="frRef"></span> xmin</p>
																</div>
																<label class="col-xs-6 col-sm-4 col-md-3 col-lg-2">Pulso:</label>
																<div class="col-xs-6 col-sm-8 col-md-9 col-lg-2">
																	<p id="pulsoRef"></p>
																</div>
																<label class="col-xs-6 col-sm-4 col-md-3 col-lg-2">Peso:</label>
																<div class="col-xs-6 col-sm-8 col-md-9 col-lg-2">
																	<p><span id="pesoRef"></span> kg</p>
																</div>
																<label class="col-xs-6 col-sm-4 col-md-3 col-lg-2">Talla:</label>
																<div class="col-xs-6 col-sm-8 col-md-9 col-lg-2">
																	<p><span id="tallaRef"></span> cm</p>
																</div>
																<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2">Datos
																	clínicos:</label>
																<div class="col-xs-12 col-sm-8 col-md-9 col-lg-10">
																	<p id="datosRef"></p>
																</div>
															</div>

															<div class="form-group">
																<label class="col-xs-6 col-sm-4 col-md-4 col-lg-2">¿Urgente?:</label>
																<div class="col-xs-6 col-sm-8 col-md-8 col-lg-2">
																	<p id="urgenteRef"></p>
																</div>
																<label class="col-xs-12 col-sm-4 col-md-4 col-lg-2">Unidad
																	origen:</label>
																<div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">
																	<p id="uorigenRef"></p>
																</div>
																<label class="col-xs-12 col-sm-4 col-md-4 col-lg-2">Unidad
																	destino:</label>
																<div class="col-xs-12 col-sm-8 col-md-8 col-lg-10">
																	<p id="udestinoRef"></p>
																</div>
																<label class="col-xs-12 col-sm-4 col-md-4 col-lg-2">Domicilio:</label>
																<div class="col-xs-12 col-sm-8 col-md-8 col-lg-10">
																	<p id="ddestinoRef"></p>
																</div>
																<label class="col-xs-12 col-sm-4 col-md-4 col-lg-2">Servicio:</label>
																<div class="col-xs-12 col-sm-8 col-md-8 col-lg-10">
																	<p id="servRef"></p>
																</div>
																<label class="col-xs-12 col-sm-4 col-md-4 col-lg-2">Motivo
																	de la referencia:</label>
																<div class="col-xs-12 col-sm-8 col-md-8 col-lg-10">
																	<p id="motivoRef"></p>
																</div>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="btns-form-ad">
						<a id="print-ref-inf" onclick="imprimirReferencia();" href="" class="btn btn-success btn-sm"><span
							class="glyphicon glyphicon-print"></span><span
							class="pageh-text-btn">Imprimir</span></a>
						<a href="#" id="save-referencia" class="btn btn-primary btn-sm">
							<span class="glyphicon glyphicon-floppy-disk"></span><span
								class="pageh-text-btn">Guardar</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>


</div>

<script>

function imprimirReferencia() {
	window.open(urlRoot+'/referencia/imprimirreferencia?exp_id='+$('#expediente_id').val()+'&referencia_id='+$('#referencia_id').val(), '_blank');
}
														
//INICIO PAGINACION REFERENCIAS
var pageActual = 1;
var totalPages = 1;
function getReferencias(page) {
	pageActual = page;
	var expediente_id = $('#expediente_id').val();
	var tableHTML = "";
	var data = 'expediente_id='+expediente_id+"&page="+pageActual+"&byPage=5";
	
	$.ajax({
		type: 'get',
		url: urlRoot+'/referencia/obtenerreferencias',
		data: data,
		dataType: 'json',
		success: function(data) {
 			if(data!=null){
 	 			console.log(data.request);
 				$.each(data.request, function(i, obj) {
 					tableHTML += "<tr>";
 					tableHTML += "<td><a>"+obj.referencia_fecha+"</a></td>";
 					tableHTML += "<td class='text-center'><a onclick='showReferencia("+obj.referencia_id+")' class='btn btn-info btn-xs'><span class='glyphicon glyphicon-eye-open'></span></a></td>";
 					tableHTML += "</tr>";
				});
 				$('#tbody-referencia').html(tableHTML);
				
 				if(data.paginacion != null){
 					paginador_referencia(data.paginacion.page,data.paginacion.total);
 				}else{
 					$('#paginator-referencia').html("");}
 			}
		},
		error: function() {showAlert("error", "Error desconocido");}
	});
	
}
function paginador_referencia(page,total){
	pageActual = page;
	totalPages = total;
	if(pageActual==1) first = "disabled"; else first = "";
	if(pageActual==totalPages) last = "disabled"; else last = "";
	html = '<button type="button" class="btn first '+first+'" onclick="firstPage_referencia();"><span class = "glyphicon glyphicon-step-backward"></span></a></button> ';
	html += '<button type="button" class="btn prev '+first+'" onclick="prevPage_referencia();"><span class = "glyphicon glyphicon-fast-backward"></span></button> ';
	html += '<span class="pagedisplay"> '
	html += 'Página <input type="text" id="page_referencia" name="page_referencia" style="width: 20px;" value="'+ page +'" /> ';
	html += 'de <input type="text" id="totalpage_referencia" name="totalpage_referencia" style="width: 20px;" value="'+total+'" /> ';
	html += '</span> <!-- this can be any element, including an input -->';
	html += '<button type="button" class="btn next '+last+'" onclick="nextPage_referencia();"><span class = " glyphicon glyphicon-fast-forward"></span></button> ';
	html += '<button type="button" class="btn last '+last+'" onclick="lastPage_referencia;"><span class = "glyphicon glyphicon-step-forward"></span></button>';
	$('#paginator-referencia').html(html);
}
function firstPage_referencia(){
	if(pageActual!=1){
		page = $('#page_referencia');
		page.val(1);
		getReferencias(1);
	}
}
function lastPage_referencia(){
	if(pageActual!=totalPages){
		page = $('#page_referencia');
		page.val(totalPages);
		getReferencias(totalPages);
	}
}
function nextPage_referencia(){
	page = $('#page_referencia');
	if(page.val()<totalPages){
		page.val(parseInt(page.val())+1);
		getReferencias(page.val());	
	}
}
function prevPage_referencia(){
	page = $('#page_referencia');
	if(page.val()>1){
		page.val(parseInt(page.val())-1);
		getReferencias(page.val());	
	}				
} //FIN PAGINACION REFERENCIAS

function showReferencia(idReferencia) {
	var table ="";
	$.ajax({
		type: 'post',
		url: urlRoot+'/referencia/detallereferencia',
		data: "referencia_id="+idReferencia,
		dataType: 'json',
		success: function (data){

			$("#fechaRef").html(data.referencia[0].referencia_fecha);
			$("#medicoRef").html(data.referencia[0].usu_nombreUsuario);
			$("#taRef").html(data.referencia[0].evolucion_ta);
			$("#tempRef").html(data.referencia[0].evolucion_temp);
			$("#frRef").html(data.referencia[0].evolucion_fr);
			$("#pulsoRef").html(data.referencia[0].evolucion_fc);
			$("#pesoRef").html(data.referencia[0].evolucion_peso);
			$("#tallaRef").html(data.referencia[0].evolucion_talla);
			$("#datosRef").html(data.referencia[0].evolucion_clinicos);
			$("#urgenteRef").html(data.referencia[0].referencia_urgencia);
			$("#uorigenRef").html(data.referencia[0].referencia_nom_unidad);
			$("#udestinoRef").html(data.referencia[0].referencia_nom_unidad_referido);
			$("#ddestinoRef").html(data.referencia[0].referencia_dom_unidad_ref);
			$("#servRef").html(data.referencia[0].serv_nombre);
			$("#motivoRef").html(data.referencia[0].referencia_motivo);
			$('#detalle-referencia-view').show();
		},
		error: function () {}
	});
	
}

$(document).ready(function() {

	$('#detalle-referencia-view').hide();
	$('#print-ref-sup').addClass("disabled");
	$('#print-ref-inf').addClass("disabled");
	
	$('#referencia_referido_clue_id').change(function() {
		var id = $('#referencia_referido_clue_id').val();
		
		$.ajax({
			url: urlRoot+'/referencia/direccionclue',
			type: 'get',
			data: 'id='+id,
			dataType: 'json',
			success: function(data) {
				$('#referencia_dom_unidad_referido').val(data.direccion);
				$('#referencia_nom_unidad_referido').val(data.nombre);
			},
			error: function() {}
		});
	});

	$('#save-referencia').click(function() {
		var dataFormDatos = $('#form-datos-ref').serialize();
		var dataFormRef = $('#form-ref').serialize();
		var data = dataFormDatos+"&"+dataFormRef;
		$.ajax({
			type: 'post',
			url: urlRoot+'/referencia/savereferencia',
			data: data,
			dataType: 'json',
			success: function(data) {
				if (data.guardado == 1) {
					showAlert("success", "Registro de referencia guardado correctamente<br>Listo para imprimir el formato de referencia.");
					$('#referencia_id').val(data.referencia_id);
					$('#print-ref-sup').removeClass("disabled");
					$('#print-ref-inf').removeClass("disabled");
				} else {
					showAlert("error", data);
				}
			},
			error: function() {

			}
		});
	});

	$('#cargar-referencias').click(function(){
		pageActual = 1;
		getReferencias(pageActual);});
});

</script>
<!-- /Container -->