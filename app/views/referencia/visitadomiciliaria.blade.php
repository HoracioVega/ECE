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
						<h4>Visita Domiciliaria</h4>
						<a href="#" class="btn btn-primary btn-sm save-visita"><span
							class="glyphicon glyphicon-floppy-disk"></span><span
							class="pageh-text-btn">Guardar</span></a><a href="#"
							class="btn btn-danger btn-sm"><span
							class="glyphicon glyphicon-warning-sign"></span><span
							class="pageh-text-btn">Llenar Línea de vida</span></a>
					</div>


					<form id="visita-form">
						<div class="row">
							<div class="col-xs-6 col-sm-3 col-md-3 col-lg-2">
								<div class="form-group">
									<label>Fecha visita:</label> <input id="visita_fecha" name="visita_fecha" type="text"
										class="form-control fecha" value="{{date('d-m-Y')}}" readOnly>
									<input id="expediente_id" name="expediente_id" type="hidden" value="{{Input::get('exp_id');}}">
									<input id="usu_id" name="usu_id" type="hidden" value="{{Session::get('usu_id')}}">
								</div>
							</div>
							<div class="col-xs-6 col-sm-3 col-md-3 col-lg-2">
								<div class="form-group">
									<label>Fecha de alta:</label> <input id="visita_alta" name="visita_alta" type="text"
										class="form-control fecha" value="{{date('d-m-Y')}}" readOnly>
								</div>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
								<label>¿Asistió a la unidad referida?:</label>
								<select id="visita_asistio" name="visita_asistio" class="form-control">
									<option value="SI">Si</option>
									<option value="NO">No</option>
								</select>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
								<label>¿Se le atendió?:</label> <select id="visita_atendido" name="visita_atendido" class="form-control">
									<option value="SI">Si</option>
									<option value="NO">No</option>
								</select>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
								<label>¿Continua bajo tratamiento médico?:</label>
								<select id="visita_continua" name="visita_continua" class="form-control">
									<option value="SI">Si</option>
									<option value="NO">No</option>
								</select>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
								<label>¿Por qué?:</label>
								<textarea id="visita_asistio_motivo" name="visita_asistio_motivo" class="form-control" rows="2"></textarea>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
								<label>¿Por qué?:</label>
								<textarea id="visita_atendido_motivo" name="visita_atendido_motivo" class="form-control" rows="2"></textarea>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
								<label>¿Por qué?:</label>
								<textarea id="visita_continua_motivo" name="visita_continua_motivo" class="form-control" rows="2"></textarea>
							</div>
						</div>
						
						<div class="row form-group">
							<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
								<label>Observaciones:</label>
								<textarea id="visita_observaciones" name="visita_observaciones" class="form-control" rows="2"></textarea>
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
											<a id="list-visitas" data-toggle="collapse" data-parent="#accordion"
												href="#collapseOne" aria-expanded="true"
												aria-controls="collapseOne">Visita domiciliaria <small>Consultas
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
																	<th>Fecha de visita</th>
																	<th width="80px" class="text-center">Acciones</th>
																</tr>
															</thead>
															<tbody id="tbody-visita">
																<tr>
																	<td>10-10-2015</td>
																	<td class="text-center"><a href=""
																		class="btn btn-info btn-xs active"><span
																			class="glyphicon glyphicon-eye-open"></span></a></td>
																</tr>
															</tbody>
														</table>
													</div>
													<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 nopad">
														<div id="paginator-visita" class="left"></div>
													</div>
												</div>

												<div id="detalle-visita-view" class="col-xs-12 col-sm-6 col-md-6 col-lg-8">
													<div class="well">
														<h4 class="nomargintop">Detalles</h4>
														<br>

														<form class="form-horizontal" role="form">
															<div class="form-group">
																<label class="col-xs-12 col-sm-4 col-md-2 col-lg-2">Fecha de visita:</label>
																<div class="col-xs-12 col-sm-8 col-md-10 col-lg-10">
																	<p id="vis_fecha"></p>
																</div>
																<label class="col-xs-12 col-sm-4 col-md-2 col-lg-2">Fecha de alta:</label>
																<div class="col-xs-12 col-sm-8 col-md-10 col-lg-9">
																	<p id="vis_alta"></p>
																</div>
															</div>

															<div class="form-group">
																<label class="col-xs-12 col-sm-4 col-md-3 col-lg-3">Médico:</label>
																<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
																	<p id="vis_medico"></p>
																</div>
															</div>

															<div class="form-group">
																<label class="col-xs-12 col-sm-4 col-md-4 col-lg-3">¿Asistió a la unidad referida?:</label>
																<div class="col-xs-12 col-sm-8 col-md-8 col-lg-9">
																	<p id="vis_asistio"></p>
																</div>
																<label class="col-xs-12 col-sm-4 col-md-4 col-lg-3">¿Por qué?:</label>
																<div class="col-xs-12 col-sm-8 col-md-8 col-lg-9">
																	<p id="vis_asistio_motivo"></p>
																</div>
																<label class="col-xs-12 col-sm-4 col-md-4 col-lg-3">¿Se le atendió?:</label>
																<div class="col-xs-12 col-sm-8 col-md-8 col-lg-9">
																	<p id="vis_atendido"></p>
																</div>
																<label class="col-xs-12 col-sm-4 col-md-4 col-lg-3">¿Por qué?:</label>
																<div class="col-xs-12 col-sm-8 col-md-8 col-lg-9">
																	<p id="vis_atendido_motivo"></p>
																</div>
																<label class="col-xs-12 col-sm-4 col-md-4 col-lg-3">¿Continua bajo tratamiento?:</label>
																<div class="col-xs-12 col-sm-8 col-md-8 col-lg-9">
																	<p id="vis_continua"></p>
																</div>
																<label class="col-xs-12 col-sm-4 col-md-4 col-lg-3">¿Por qué?:</label>
																<div class="col-xs-12 col-sm-8 col-md-8 col-lg-9">
																	<p id="vis_continua_motivo"></p>
																</div>
																<label class="col-xs-12 col-sm-4 col-md-4 col-lg-3">Observaciones:</label>
																<div class="col-xs-12 col-sm-8 col-md-8 col-lg-9">
																	<p id="vis_observaciones"></p>
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
						<a href="#" type="submit" class="btn btn-primary btn-sm save-visita">
							<span class="glyphicon glyphicon-floppy-disk"></span><span
								class="pageh-text-btn">Guardar</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Container -->


<script>

//INICIO PAGINACION REFERENCIAS
var pageActual = 1;
var totalPages = 1;
function getVisitas(page) {
	pageActual = page;
	var expediente_id = $('#expediente_id').val();
	var tableHTML = "";
	var data = 'expediente_id='+expediente_id+"&page="+pageActual+"&byPage=5";
	
	$.ajax({
		type: 'get',
		url: urlRoot+'/visita/obtenervisitas',
		data: data,
		dataType: 'json',
		success: function(data) {
 			if(data!=null){
 				$.each(data.request, function(i, obj) {
 					tableHTML += "<tr>";
 					tableHTML += "<td><a>"+obj.visita_fecha+"</a></td>";
 					tableHTML += "<td class='text-center'><a onclick='showVisita("+obj.visita_id+")' class='btn btn-info btn-xs'><span class='glyphicon glyphicon-eye-open'></span></a></td>";
 					tableHTML += "</tr>";
				});
 				$('#tbody-visita').html(tableHTML);
				
 				if(data.paginacion != null){
 					paginador_visita(data.paginacion.page,data.paginacion.total);
 				}else{
 					$('#paginator-visita').html("");}
 			}
		},
		error: function() {showAlert("error", "Error desconocido");}
	});
	
}
function paginador_visita(page,total){
	pageActual = page;
	totalPages = total;
	if(pageActual==1) first = "disabled"; else first = "";
	if(pageActual==totalPages) last = "disabled"; else last = "";
	html = '<button type="button" class="btn first '+first+'" onclick="firstPage_visita();"><span class = "glyphicon glyphicon-step-backward"></span></a></button> ';
	html += '<button type="button" class="btn prev '+first+'" onclick="prevPage_visita();"><span class = "glyphicon glyphicon-fast-backward"></span></button> ';
	html += '<span class="pagedisplay"> '
	html += 'Página <input type="text" id="page_visita" name="page_visita" style="width: 20px;" value="'+ page +'" /> ';
	html += 'de <input type="text" id="totalpage_visita" name="totalpage_visita" style="width: 20px;" value="'+total+'" /> ';
	html += '</span> <!-- this can be any element, including an input -->';
	html += '<button type="button" class="btn next '+last+'" onclick="nextPage_visita();"><span class = " glyphicon glyphicon-fast-forward"></span></button> ';
	html += '<button type="button" class="btn last '+last+'" onclick="lastPage_visita;"><span class = "glyphicon glyphicon-step-forward"></span></button>';
	$('#paginator-visita').html(html);
}
function firstPage_visita(){
	if(pageActual!=1){
		page = $('#page_visita');
		page.val(1);
		getvisitas(1);
	}
}
function lastPage_visita(){
	if(pageActual!=totalPages){
		page = $('#page_visita');
		page.val(totalPages);
		getVisitas(totalPages);
	}
}
function nextPage_visita(){
	page = $('#page_visita');
	if(page.val()<totalPages){
		page.val(parseInt(page.val())+1);
		getVisitas(page.val());	
	}
}
function prevPage_visita(){
	page = $('#page_visita');
	if(page.val()>1){
		page.val(parseInt(page.val())-1);
		getVisitas(page.val());	
	}				
} //FIN PAGINACION REFERENCIAS

function showVisita(idVisita) {
	var table ="";
	$.ajax({
		type: 'post',
		url: urlRoot+'/visita/detallevisita',
		data: "visita_id="+idVisita,
		dataType: 'json',
		success: function (data){

			$("#vis_medico").html(data.visita[0].usu_nombreUsuario);
			$("#vis_fecha").html(data.visita[0].visita_fecha);
			$("#vis_alta").html(data.visita[0].visita_alta);
			$("#vis_asistio").html(data.visita[0].visita_asistio);
			$("#vis_asistio_motivo").html(data.visita[0].visita_asistio_motivo);
			$("#vis_atendido").html(data.visita[0].visita_atendido);
			$("#vis_atendido_motivo").html(data.visita[0].visita_atendido_motivo);
			$("#vis_continua").html(data.visita[0].visita_continua);
			$("#vis_continua_motivo").html(data.visita[0].visita_continua_motivo);
			$("#vis_observaciones").html(data.visita[0].visita_observaciones);
			$('#detalle-visita-view').show();
		},
		error: function () {}
	});
	
}

$(document).ready(function() {

	$('.fecha').datetimepicker({
		timepicker:false,
		format:'d-m-Y'
	});
	$('#detalle-visita-view').hide();

	$('.save-visita').click(function() {
		var dataForm = $('#visita-form').serialize();
		
		$.ajax({
			type: 'post',
			url: urlRoot+'/visita/savevisita',
			data: dataForm,
			dataType: 'json',
			success: function(data) {
				if (data.guardado == 1) {
					showAlert("success", "Registro de visita domiciliaria guardado correctamente.");
				} else {
					showAlert("error", data);
				}
			},
			error: function() {

			}
		});
	});

	$('#list-visitas').click(function(){
		pageActual = 1;
		getVisitas(pageActual);});
});
</script>