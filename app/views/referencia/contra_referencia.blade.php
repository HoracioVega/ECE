<div class="alert-box-container">
	<div id="alert-box" class="">
		<p>Mensaje</p>
	</div>
</div>
<!-- Container -->
<div class="container-fluid">
	<div class="row"></div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="page-header nomargintop">
						<h4>Referencia</h4>
						<a href="#" class="btn btn-primary btn-sm save-contrareferencia"><span
							class="glyphicon glyphicon-floppy-disk"></span><span
							class="pageh-text-btn">Guardar</span></a> <a onclick="imprimirContraReferencia();" id="print-cref-sup" href="#"
							class="btn btn-success btn-sm"><span
							class="glyphicon glyphicon-print"></span><span
							class="pageh-text-btn">Imprimir</span></a> <a href=""
							class="btn btn-danger btn-sm"><span
							class="glyphicon glyphicon-warning-sign"></span><span
							class="pageh-text-btn">Llenar Línea de vida</span></a>
					</div>


					<form id="contraref-form">
						<div class="row">
							<div class="col-xs-6 col-sm-3 col-md-2 col-lg-2">
								<div class="form-group">
									<label>Fecha:</label> <input type="text" class="form-control"
										value="{{date('d-m-Y')}}" disabled>
									<input type="hidden" name="contraref_fecha" id="contraref_fecha" value="{{date('Y-m-d')}}">
									<input type="hidden" name="usu_id" value="{{Session::get('usu_id')}}">
									<input type="hidden" id="expediente_id" name="expediente_id" value="{{Input::get('exp_id')}}">
									<input id="evolucion_id" name="evolucion_id" type="hidden" value="{{$evolucion['evolucion_id']}}">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

								<div class="row form-group">
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
										<label>Unidad que remite:</label>
										<div class="input-group">
											<select class="form-control" name="contraref_origen_clue_id" id="contraref_origen_clue_id">
												<option>Seleccione una unidad</option>
												@foreach ($clues as $clue)
												<option value="{{$clue->clue_id}}">{{$clue->clue_nombre_unidad}}</option>
												@endforeach
											</select>
											<input type="hidden" name="contraref_unidad_origen" id="contraref_unidad_origen">
										</div>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
										<label>Domicilio:</label>
										<input type="text" id="contraref_dom" name="contraref_dom" class="form-control" readOnly>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
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
										<label>Motivo de la contrareferencia:</label>
										<textarea id="contraref_motivo" name="contraref_motivo" class="form-control" rows="2"></textarea>
									</div>
								</div>

								<div class="row form-group">
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<label>Diagnótico ingreso:</label>
										<textarea name="contraref_diganostico_ing" id="contraref_diganostico_ing" class="form-control" rows="2"></textarea>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<label>Diagnótico egreso:</label>
										<textarea name="contraref_diagnostico_egr" id="contraref_diagnostico_egr" class="form-control" rows="2"></textarea>
									</div>
								</div>

								<div class="row form-group">
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">
										<label>Tratamiento concluido:</label>
										<select name="contraref_tratamiento_estatus" id="contraref_tratamiento_estatus" class="form-control">
											<option value="SI">Si</option>
											<option value="NO">No</option>
										</select>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">
										<label>Continuar tratamiento:</label>
										<select id="contraref_cont_trata" name="contraref_cont_trata" class="form-control">
											<option value="SI">Si</option>
											<option value="NO">No</option>
										</select>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">
										<label>Consulta subsecuente a:</label>
										<input type="text" class="form-control" name="contraref_subsecuente" id="contraref_subsecuente">
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<label>Instrucciones y recomendaciones:</label>
										<textarea id="contraref_instrucciones" name="contraref_instrucciones" class="form-control" rows="1"></textarea>
									</div>
								</div>
							</div>
						</div>
					</form>

					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="panel-group nomarginbot" id="accordion"
								role="tablist" aria-multiselectable="true">
								<div class="panel panel-info">
									<div class="panel-heading" role="tab" id="headingOne">
										<h4 class="panel-title">
											<a id="cargar-contrareferencias" data-toggle="collapse" data-parent="#accordion"
												href="#collapseOne" aria-expanded="true"
												aria-controls="collapseOne">Contrareferencia <small>Consultas
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
															<tbody id="tbody-contrareferencia">
															</tbody>
														</table>
													</div>

													<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 nopad">
														<div id="paginator-contrareferencia" class="left"></div>
													</div>
												</div>

												<div class="col-xs-12 col-sm-6 col-md-6 col-lg-8">
													<div id="detalle-contrareferencia-view" class="well">
														<h4 class="nomargintop">Detalles</h4>
														<br>

														<form class="form-horizontal" role="form">
															<div class="form-group">
																<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2">Consulta:</label>
																<div class="col-xs-12 col-sm-8 col-md-9 col-lg-10">
																	<p id="cr_consulta"></p>
																</div>
															</div>


															<div class="form-group">
																<label class="col-xs-12 col-sm-4 col-md-2 col-lg-2">Unidad
																	origen:</label>
																<div class="col-xs-12 col-sm-8 col-md-10 col-lg-10">
																	<p id="cr_uorigen"></p>
																</div>
																<label class="col-xs-12 col-sm-4 col-md-4 col-lg-2">Domicilio:</label>
																<div class="col-xs-12 col-sm-8 col-md-8 col-lg-10">
																	<p id="cr_dom"></p>
																</div>
																<label class="col-xs-12 col-sm-4 col-md-4 col-lg-2">Servicio:</label>
																<div class="col-xs-12 col-sm-8 col-md-8 col-lg-10">
																	<p id="cr_serv"></p>
																</div>
																<label class="col-xs-12 col-sm-4 col-md-4 col-lg-3">Motivo
																	de la referencia:</label>
																<div class="col-xs-12 col-sm-8 col-md-8 col-lg-9">
																	<p id="cr_motivo"></p>
																</div>
																<label class="col-xs-12 col-sm-4 col-md-4 col-lg-3">Resúmen Clínico:</label>
																<div class="col-xs-12 col-sm-8 col-md-8 col-lg-9">
																	<p id="cr_resumen"></p>
																</div>
																<label class="col-xs-12 col-sm-4 col-md-4 col-lg-3">Diagnóstico de ingreso:</label>
																<div class="col-xs-12 col-sm-8 col-md-8 col-lg-9">
																	<p id="cr_ingreso"></p>
																</div>
																<label class="col-xs-12 col-sm-4 col-md-4 col-lg-3">Diagnóstico de egreso:</label>
																<div class="col-xs-12 col-sm-8 col-md-8 col-lg-9">
																	<p id="cr_egreso"></p>
																</div>
																<label class="col-xs-12 col-sm-4 col-md-4 col-lg-3">Recomendaciones:</label>
																<div class="col-xs-12 col-sm-8 col-md-8 col-lg-9">
																	<p id="cr_recomendacion"></p>
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
					<input id="contrareferencia_id" type="hidden">
					<div class="btns-form-ad">
						<a onclick="imprimirContraReferencia();" id="print-cref-inf" href="#" class="btn btn-success btn-sm"><span
							class="glyphicon glyphicon-print"></span><span
							class="pageh-text-btn">Imprimir</span></a>
						<a href="#" type="submit" class="btn btn-primary btn-sm save-contrareferencia">
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

function imprimirContraReferencia() {
	window.open(urlRoot+'/contrareferencia/imprimircontrareferencia?exp_id='+$('#expediente_id').val()+'&contrareferencia_id='+$('#contrareferencia_id').val(), '_blank');
}

//INICIO PAGINACION REFERENCIAS
var pageActual = 1;
var totalPages = 1;
function getContraReferencias(page) {
	pageActual = page;
	var expediente_id = $('#expediente_id').val();
	var tableHTML = "";
	var data = 'expediente_id='+expediente_id+"&page="+pageActual+"&byPage=5";
	
	$.ajax({
		type: 'get',
		url: urlRoot+'/contrareferencia/obtenercontrareferencias',
		data: data,
		dataType: 'json',
		success: function(data) {
 			if(data!=null){
 	 			//console.log(data.request);
 				$.each(data.request, function(i, obj) {
 					tableHTML += "<tr>";
 					tableHTML += "<td><a>"+obj.contraref_fecha+"</a></td>";
 					tableHTML += "<td class='text-center'><a onclick='showContraReferencia("+obj.contraref_id+")' class='btn btn-info btn-xs'><span class='glyphicon glyphicon-eye-open'></span></a></td>";
 					tableHTML += "</tr>";
				});
 				$('#tbody-contrareferencia').html(tableHTML);
				
 				if(data.paginacion != null){
 					paginador_contrareferencia(data.paginacion.page,data.paginacion.total);
 				}else{
 					$('#paginator-contrareferencia').html("");}
 			}
		},
		error: function() {showAlert("error", "Error desconocido");}
	});
	
}
function paginador_contrareferencia(page,total){
	pageActual = page;
	totalPages = total;
	if(pageActual==1) first = "disabled"; else first = "";
	if(pageActual==totalPages) last = "disabled"; else last = "";
	html = '<button type="button" class="btn first '+first+'" onclick="firstPage_contrareferencia();"><span class = "glyphicon glyphicon-step-backward"></span></a></button> ';
	html += '<button type="button" class="btn prev '+first+'" onclick="prevPage_contrareferencia();"><span class = "glyphicon glyphicon-fast-backward"></span></button> ';
	html += '<span class="pagedisplay"> '
	html += 'Página <input type="text" id="page_contrareferencia" name="page_contrareferencia" style="width: 20px;" value="'+ page +'" /> ';
	html += 'de <input type="text" id="totalpage_contrareferencia" name="totalpage_contrareferencia" style="width: 20px;" value="'+total+'" /> ';
	html += '</span> <!-- this can be any element, including an input -->';
	html += '<button type="button" class="btn next '+last+'" onclick="nextPage_contrareferencia();"><span class = " glyphicon glyphicon-fast-forward"></span></button> ';
	html += '<button type="button" class="btn last '+last+'" onclick="lastPage_contrareferencia;"><span class = "glyphicon glyphicon-step-forward"></span></button>';
	$('#paginator-contrareferencia').html(html);
}
function firstPage_contrareferencia(){
	if(pageActual!=1){
		page = $('#page_contrareferencia');
		page.val(1);
		getContraReferencias(1);
	}
}
function lastPage_contrareferencia(){
	if(pageActual!=totalPages){
		page = $('#page_contrareferencia');
		page.val(totalPages);
		getContraReferencias(totalPages);
	}
}
function nextPage_contrareferencia(){
	page = $('#page_contrareferencia');
	if(page.val()<totalPages){
		page.val(parseInt(page.val())+1);
		getContraReferencias(page.val());	
	}
}
function prevPage_contrareferencia(){
	page = $('#page_contrareferencia');
	if(page.val()>1){
		page.val(parseInt(page.val())-1);
		getContraReferencias(page.val());	
	}				
} //FIN PAGINACION REFERENCIAS

function showContraReferencia(idContraReferencia) {
	var table ="";
	$.ajax({
		type: 'post',
		url: urlRoot+'/contrareferencia/detallecontrareferencia',
		data: "contrareferencia_id="+idContraReferencia,
		dataType: 'json',
		success: function (data){
			$("#cr_consulta").html(data.contrareferencia[0].contraref_fecha);
			$("#cr_uorigen").html(data.contrareferencia[0].contraref_unidad_origen);
			$("#cr_dom").html(data.contrareferencia[0].contraref_dom);
			$("#cr_serv").html(data.contrareferencia[0].serv_nombre);
			$("#cr_motivo").html(data.contrareferencia[0].contraref_motivo);
			$("#cr_egreso").html(data.contrareferencia[0].contraref_diagnostico_egr);
			$("#cr_ingreso").html(data.contrareferencia[0].contraref_diganostico_ing);
			$("#cr_recomendacion").html(data.contrareferencia[0].contraref_diganostico_ing);
			$("#cr_resumen").html(data.contrareferencia[0].evolucion_clinicos);
			$('#detalle-contrareferencia-view').show();
		},
		error: function () {}
	});
	
}
											
$(document).ready(function() {

	$('#detalle-contrareferencia-view').hide();
	$('#print-cref-sup').addClass("disabled");
	$('#print-cref-inf').addClass("disabled");
	
	$('#contraref_origen_clue_id').change(function() {
		var id = $('#contraref_origen_clue_id').val();
		
		$.ajax({
			url: urlRoot+'/referencia/direccionclue',
			type: 'get',
			data: 'id='+id,
			dataType: 'json',
			success: function(data) {
				$('#contraref_dom').val(data.direccion);
				$('#contraref_unidad_origen').val(data.nombre);
			},
			error: function() {}
		});
	});

	$('.save-contrareferencia').click(function() {
		var dataFormDatos = $('#contraref-form').serialize();
		$.ajax({
			type: 'post',
			url: urlRoot+'/contrareferencia/savecontrareferencia',
			data: dataFormDatos,
			dataType: 'json',
			success: function(data) {
				console.log(data);
				if (data.guardado == 1) {
					showAlert("success", "Registro de contrareferencia guardado correctamente<br>Listo para imprimir el formato de referencia.");
					$('#contrareferencia_id').val(data.contrareferencia_id);
					$('#print-cref-sup').removeClass("disabled");
					$('#print-cref-inf').removeClass("disabled");
				} else {
					showAlert("error", data);
				}
			},
			error: function() {

			}
		});
	});

	$('#cargar-contrareferencias').click(function(){
		pageActual = 1;
		getContraReferencias(pageActual);});
});
</script>
<!-- /Container -->

