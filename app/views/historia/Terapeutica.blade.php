<div class="alert-box-container"><div id="alert-box" class=""><p>Mensaje</p></div></div>
<!-- Container -->
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="page-header nomargintop">
					<h4>Terapeútica</h4>
						<a href="" class="btn btn-primary btn-sm save-receta"><span class="glyphicon glyphicon-floppy-disk"></span><span class="pageh-text-btn">Guardar</span></a>
						<a id="print-up" onclick="imprimirReceta();" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-print"></span><span class="pageh-text-btn">Imprimir</span></a>
						@if (Input::get('v') != '1')
						<a href="" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-arrow-right"></span><span class="pageh-text-btn">Siguiente</span></a>
						<a href="" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-arrow-left"></span><span class="pageh-text-btn">Anterior</span></a>
						@endif
						<a href="" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-warning-sign"></span><span class="pageh-text-btn">Llenar Línea de vida</span></a>
					</div>

					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="page-header nomargintop">
								<h4>Selección de fármacos</h4>
							</div>
								
							<form id="form-med" role="form">
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
										<a id="buscar-farmaco" href="#modal-medicamento" data-toggle="modal" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-search"></span><span class="pageh-text-btn">Buscar fármaco</span></a>
									</div>
											
									<div class="col-xs-12 col-sm-6 col-md-3 col-lg-2">
										<label>Clave:</label>
										<input name="med_cve" id="med_cve" class="form-control input-sm" type="text" readOnly>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-3 col-lg-2">
									<label>Área:</label>
										<input name="med_area" id="med_area" class="form-control input-sm" type="text" readOnly>
									</div>
									<div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
										<label>Medicamento:</label>
										<input name="med_nom" id="med_nom" class="form-control input-sm" type="text" readOnly>
									</div>
									<div class="col-xs-12 col-sm-4 col-md-2 col-lg-3 form-group">
										<label>Presentación:</label>
										<select name="med_pres" class="form-control input-s"><option id="med_pres">Seleccione una opción</option></select>
									</div>

									<div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
										<label>Cantidad solicitada:</label>
										<input id="med_cant" name="med_cant" class="form-control input-sm" type="text">
									</div>
									<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
										<label>Indicaciones (Dosis):</label>
										<input id="med_indi" name="med_indi" class="form-control input-sm" type="text">
									</div>
									<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 form-group">
										<label>Duración del tratamiento:</label>
										<div class="input-group">
											<input id="med_dur" name="med_dur" type="text" class="form-control">
											<input id="med_fecha" name="med_fecha" type="hidden" value="{{date('Y-m-d')}}">
											<span class="input-group-btn">
												<a id="add-med-receta" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus"></span><span class="pageh-text-btn">Agregar a receta</span></a>
											</span>
										</div><!-- /input-group -->
									</div>
								</div>
							</form>
						</div>

						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="page-header">
								<h4 class="nomargintop">Receta médica</h4>
							</div>
							<input type="hidden" id="idReceta">
							<form class="form-horizontal" role="form">
								<div class="form-group">
									<label class="col-xs-6 col-sm-4 col-md-3 col-lg-1">Fecha:</label>
									<div class="col-xs-6 col-sm-2 col-md-9 col-lg-2">
										<input name="receta_fecha" id="receta_fecha" class="form-control" type="text" value="{{date('Y-m-d, H:i')}}" disabled>
									</div>
								</div>

								<div class="form-group">
									<label class="col-xs-12 col-sm-4 col-md-3 col-lg-1">Paciente:</label>
									<div class="col-xs-12 col-sm-8 col-md-9 col-lg-4">
										<input class="form-control" type="text" value="{{$paciente[0]->paciente_nombre}} {{$paciente[0]->paciente_app}} {{$paciente[0]->paciente_apm}}" disabled>
									</div>
									<label class="col-xs-6 col-sm-4 col-md-3 col-lg-1">Edad:</label>
									<div class="col-xs-6 col-sm-2 col-md-3 col-lg-1">
										<input class="form-control" type="text" value="{{$edad['edad']}}" disabled>
									</div>
									<label class="col-xs-6 col-sm-2 col-md-2 col-lg-1">Sexo:</label>
									<div class="col-xs-6 col-sm-4 col-md-4 col-lg-1">
										<input class="form-control" type="text" value="@if ($paciente[0]->paciente_sexo=='H') {{'MASCULINO'}} @else {{'FEMENINO'}} @endif" disabled>
									</div>
										<label class="col-xs-12 col-sm-4 col-md-3 col-lg-1">No. S.P.:</label>
									<div class="col-xs-12 col-sm-4 col-md-9 col-lg-1">
										<input class="form-control" type="text" value="{{$paciente[0]->paciente_segSocialNumero}}" disabled>
									</div>
								</div>
								<div class="form-group">
									<label class="col-xs-12 col-sm-4 col-md-3 col-lg-1">Diagnóstico:</label>
									<div class="col-xs-12 col-sm-8 col-md-9 col-lg-4">
										<input name="receta_diagnostico" id="receta_diagnostico" class="form-control" type="text">
									</div>
									<label class="col-xs-6 col-sm-4 col-md-3 col-lg-1">Referencia:</label>
									<div class="col-xs-6 col-sm-2 col-md-4 col-lg-1">
										<select name="receta_referencia" id="receta_referencia" class="form-control input-s">
											<option id="NO">No</option>
											<option id="SI">Si</option>
										</select>
									</div>
									<label class="col-xs-6 col-sm-3 col-md-2 col-lg-2">Servicio referido:</label>
									<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
										<select name="serv_id" id="serv_id" class="form-control input-s">
											@foreach ($servicios as $servicio)
	                                       	<option value="{{$servicio->serv_id}}">{{$servicio->serv_nombre}}</option>
	                                       	@endforeach
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-xs-12 col-sm-4 col-md-3 col-lg-1">Observaciones:</label>
									<div class="col-xs-12 col-sm-6 col-md-9 col-lg-6">
										<input name="receta_observa" id="receta_observa" class="form-control input-sm" type="text">
									</div>
									<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2">Firma de quien recibe receta:</label>
									<div class="col-xs-12 col-sm-6 col-md-9 col-lg-3">
										<input name="" id="" class="form-control input-sm" type="text" value="{{$medico['nombre']}}" readOnly>
									</div>
								</div>

								<div class="table-responsive">
									<table class="table table-hover table-condensed table-bordered table-striped">
										<thead>
											<tr>
												<th width="30px" class="text-center">#</th>
												<th>Fármaco</th>
												<th>Presentación</th>
												<th width="70px">Cantidad</th>
												<th>Indicaciones</th>
												<th width="70px" class="text-center">¿Surtido?</th>
												<th width="70px" class="text-center">Acciones</th>
											</tr>
										</thead>
										<tbody id="receta-body">
										</tbody>
									</table>
								</div>
							</form>
						</div>
					</div>	

					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
								<div class="panel panel-info">
									<div class="panel-heading" role="tab" id="headingOne">
										<h4 class="panel-title"><a id="vrecetas" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Receta médica <small>Consultas previas</small></a></h4>									
									</div>

									<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
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
															<tbody id="recetas-body">
																<!--<tr>
																	<td>2015</td>
																	<td>Abril</td>
																	<td>18</td>
																	<td>14:12:11</td>
																	<td class="text-center"><a href="" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-eye-open"></span></a></td>
																</tr>-->
															</tbody>
														</table>
													</div>
													<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 nopad">
														<div id="paginator-terapeutica" class="left"></div>
													</div>
												</div>
													
												<div class="col-xs-12 col-sm-6 col-md-6 col-lg-8">
													<div class="well" id="detalle-receta-view">
														<h4 class="nomargintop">Detalles</h4><br>
															<form class="form-horizontal" role="form">										
															<div class="form-group">
																<label class="col-xs-12 col-sm-3 col-md-3 col-lg-2">Consulta:</label>
																<div class="col-xs-12 col-sm-9 col-md-9 col-lg-10">
																	<p id="view-fecha"></p>
																</div>
															</div>

															<div class="form-group">
																<label class="col-xs-12 col-sm-3 col-md-3 col-lg-2">Médico:</label>
																<div class="col-xs-12 col-sm-9 col-md-9 col-lg-10">
																	<p id="view-medico"></p>
																</div>
																<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2">Observaciones:</label>
																<div class="col-xs-12 col-sm-8 col-md-9 col-lg-10">
																	<p id="view-obs"></p>
																</div>
															</div>
														</form>
														
														<div class="table-responsive">
															<table class="table table-striped table-condensed nomarginbot">
																<thead>
																	<tr>
																		<th width="30px" class="text-center">#</th>
																		<th>Fármaco</th>
																		<th>Presentación</th>
																		<th width="70px">Cantidad</th>
																		<th>Indicaciones</th>
																		<th width="70px" class="text-center">¿Surtido?</th>
																	</tr>
																</thead>
																<tbody id="detalle-body">
																</tbody>
															</table>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<form id="verificar-clave" class="form-horizontal" role="form">
								<div class="form-group">
									<label class="col-xs-12 col-sm-12 col-md-12 col-lg-2">Clave de usuario:</label>
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-2">
										<div class="input-group">
											<input id="pass-user" type="password" class="form-control">
											<span class="input-group-btn">
												<a id="verificar-pass" class="btn btn-success btn-sm">Aceptar</a>
											</span>
										</div><!-- /input-group -->
									</div>
								</div>
							</form>	
						</div>
					</div>				

					<input type="hidden" name="expediente_id" id="expediente_id" value="{{$paciente[0]->expediente_id}}">
					<input type="hidden" name="usu_id" id="usu_id" value="{{$medico['id']}}">
					<input type="hidden" name="clue_id" id="clue_id" value="{{Session::get('clue_id')}}">
					
					<div class="btns-form-ad">
						@if (Input::get('v') != '1')
						<a href="" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-arrow-right"></span><span class="pageh-text-btn">Siguiente</span></a>
						<a href="" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-arrow-left"></span><span class="pageh-text-btn">Anterior</span></a>
						@endif
						<a id="print-down" onclick="imprimirReceta();" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-print"></span><span class="pageh-text-btn">Imprimir</span></a>
						<button id="save-receta" type="submit" class="btn btn-primary btn-sm save-receta"><span class="glyphicon glyphicon-floppy-disk"></span><span class="pageh-text-btn">Guardar</span></button>
					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade bs-example-modal-lg" id="modal-medicamento" tabindex="-1" role="dialog" aria-labelledby="modal-medicamento" aria-hidden="true">
		  <div class="modal-dialog modal-lg">
		    <div class="modal-content">
		      	<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        	<h4 class="modal-title" id="myModalLabel">Medicamentos</h4>
		      	</div>
		      	<div class="modal-body">
			       	<div role="tabpanel">
						<ul class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active"><a id="search-medicamento"  aria-controls="nuevo" role="tab" data-toggle="tab">Buscar Medicamento</a></li>
						</ul>

						<div class="tab-content" >
							<div role="tabpanel" class="tab-pane active" id="nuevo">
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<div id="modal-container" class="background-modal-container">
											<div class="modal-container">
												<div class="modal-contenido"></div>
											</div>
										</div>
									</div>
								</div>		
							</div>
						</div>
					</div>
		      	</div>
		   	</div>
		  </div>
	</div>
</div><!-- /Container -->

<script>

var pageActual = 1;
var totalPages = 1;


//OBTENER LAS CON PAGINATOR
function getRecetas(page) {
	pageActual = page;
	var expediente_id = $('#expediente_id').val();
	var tableHTML = "";
	var data = 'expediente_id='+expediente_id+"&page="+pageActual+"&byPage=5";
	
	$.ajax({
		type: 'get',
		url: 'terapeutica/obtenerrecetas',
		data: data,
		dataType: 'json',
		success: function(data) {
 			if(data!=null){
 				$.each(data.request, function(i, obj) {
 					tableHTML += "<tr>";
 					tableHTML += "<td><a>"+obj.receta_fecha+"</a></td>";
 					tableHTML += "<td class='text-center'><a onclick='showReceta("+obj.receta_id+")' class='btn btn-info btn-xs'><span class='glyphicon glyphicon-eye-open'></span></a></td>";
 					tableHTML += "</tr>";
				});
 				$('#recetas-body').html(tableHTML);
				
 				if(data.paginacion != null){
 					paginador_terapeutica(data.paginacion.page,data.paginacion.total);
 				}else{
 					$('#paginator-terapeutica').html("");}
 			}
		},
		error: function() {showAlert("error", "Error desconocido");}
	});
	
}
function paginador_terapeutica(page,total){
	pageActual = page;
	totalPages = total;
	if(pageActual==1) first = "disabled"; else first = "";
	if(pageActual==totalPages) last = "disabled"; else last = "";
	html = '<button type="button" class="btn first '+first+'" onclick="firstPage_terapeutica();"><span class = "glyphicon glyphicon-step-backward"></span></a></button> ';
	html += '<button type="button" class="btn prev '+first+'" onclick="prevPage_terapeutica();"><span class = "glyphicon glyphicon-fast-backward"></span></button> ';
	html += '<span class="pagedisplay"> '
	html += 'Página <input type="text" id="page_terapeutica" name="page_terapeutica" style="width: 20px;" value="'+ page +'" /> ';
	html += 'de <input type="text" id="totalpage_terapeutica" name="totalpage_terapeutica" style="width: 20px;" value="'+total+'" /> ';
	html += '</span> <!-- this can be any element, including an input -->';
	html += '<button type="button" class="btn next '+last+'" onclick="nextPage_terapeutica();"><span class = " glyphicon glyphicon-fast-forward"></span></button> ';
	html += '<button type="button" class="btn last '+last+'" onclick="lastPage_terapeutica();"><span class = "glyphicon glyphicon-step-forward"></span></button>';
	$('#paginator-terapeutica').html(html);
}
function firstPage_terapeutica(){
	if(pageActual!=1){
		page = $('#page_terapeutica');
		page.val(1);
		getRecetas(1);
	}
}
function lastPage_terapeutica(){
	if(pageActual!=totalPages){
		page = $('#page_terapeutica');
		page.val(totalPages);
		getRecetas(totalPages);
	}
}
function nextPage_terapeutica(){
	page = $('#page_terapeutica');
	if(page.val()<totalPages){
		page.val(parseInt(page.val())+1);
		getRecetas(page.val());	
	}
}
function prevPage_terapeutica(){
	page = $('#page_terapeutica');
	if(page.val()>1){
		page.val(parseInt(page.val())-1);
		getRecetas(page.val());	
	}				
}


function imprimirReceta() {
	window.open('terapeutica/imprimirreceta?receta_id='+$("#idReceta").val()+'&exp_id={{$paciente[0]->expediente_id}}', '_blank');
}
																
function showReceta(idReceta) {

	var table ="";
	$.ajax({
		type: 'post',
		url: 'terapeutica/detallereceta',
		data: "receta_id="+idReceta,
		dataType: 'json',
		success: function (data){
			
			$("#view-fecha").html(data.receta[0].receta_fecha);
			$("#view-medico").html(data.receta[0].usu_nombreUsuario);
			$("#view-obs").html(data.receta[0].receta_observa);

			$.each(data.detalles, function(i, obj) {
				table += "<tr>";
				table += "<td>"+obj.recdetalle_clave+"</td>";
				table += "<td>"+obj.recdetalle_farmaco+"</td>";
				table += "<td>"+obj.recdetalle_presentacion+"</td>";
				table += "<td>"+obj.recdetalle_cantidad+"</td>";
				table += "<td>"+obj.recdetalle_indicaciones+"</td>";
				table += "<td class='text-center'><label class='label label-success'>SI</label></td>";
				table += "</tr>";
			});
			$('#detalle-body').html(table);
			$('#detalle-receta-view').show();
		},
		error: function () {}
	});
	
}
																
function putMedicamentoInForm2(cveMedicamento) {

	var cve = cveMedicamento.toString();
	if (cve.length == 1) {
		cve = "000"+cve;
	} else if (cve.length == 2) {
		cve = "00"+cve;
	} else if (cve.length == 3) {
		cve = "0"+cve;
	}
	
	swal({
		title: "¿Desea agregar este medicamento?",   
		text: "Se agregará a la lista de medicamentos del paciente",   
		type: "warning",   
		showCancelButton: true,   
		confirmButtonColor: "#DD6B55",   
		confirmButtonText: "Si, agregarlo!",
		cancelButtonText: "No, cancelar!",   
		closeOnConfirm: false,
		allowEscapeKey: false
	}, function(){   
		$.getJSON('terapeutica/searchmedicamentos?buscarpor=clave'+'&medicamento='+cve, function(data){
			if(data.clave != ""){
				swal("Agreago!", "El medicamento fue agregado a la receta del paciente.", "success");
				$('#med_cve').val(data[0].clave);
				$('#med_area').val(data[0].area);
				$('#med_nom').val(data[0].nombre_gen);
				$('#med_pres').html(data[0].presentacion);
				$('#med_pres').val(data[0].presentacion);
				$('#modal-medicamento').modal('hide');
			}else{
				swal("No permitido!", "El medicamento ya esta agregado.", "error");
			}
		},"html");
	});
}
											
function cleanMedicamento() {
	$("#med_cve").val("");
	$("#med_area").val("");
	$("#med_nom").val("");
	$("#med_pres").html("<option>-----</option>");
	$("#med_indi").val("");
	$("#med_cant").val("");
	$("#med_dur").val("");
	//$('#receta_diagnostico').val("");
	//$('#receta_observa').val("");
}
											
// Elimina un medicamento de la lista temporal
function deletemedtmp(id) {

	var table = "";
	$.ajax({
		type: 'post',
		url: 'terapeutica/deletemedicamentotmp',
		data: {"id":id, "receta_fecha":$('#med_fecha').val(), "usu_id":$('#usu_id').val(), "expediente_id":$('#expediente_id').val()},
		dataType: 'json',
		success: function(data) {
			$.each(data, function(i, obj) {
				table += "<tr>";
				table += "<td>"+obj.receta_tmp_cve+"</td>";
				table += "<td>"+obj.receta_tmp_nombre+"</td>";
				table += "<td>"+obj.receta_tmp_present+"</td>";
				table += "<td>"+obj.receta_tmp_cantidad+"</td>";
				table += "<td>"+obj.receta_tmp_indicacion+"</td>";
				table += "<td class='text-center'><label class='label label-success'>SI</label></td>";
				table += "<td class='text-center'><a onclick='deletemedtmp("+obj.receta_tmp_id+")' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span></a></td>";
				table += "</tr>";
			});
			$('#receta-body').html(table);
		},
		error: function() {}
	});
}

// Eventos
$(document).ready(function () {

	$('#detalle-receta-view').hide();
	$('#print-up').addClass("disabled");
	$('#print-down').addClass("disabled");
	$("#verificar-clave").hide();

	$('#vrecetas').click(function(){
		pageActual = 1;
		getRecetas(pageActual);});
	
	// Abre el modal para buscar un medicamento
	$('#search-medicamento').click(function() {
		$.ajax({
			type: "GET",
			url: "terapeutica/searchmedicamentomodal",
			dataType: 'HTML'
		})
		.done(function(data){
			$('.modal-contenido').html(data);
			$('#modal-container').fadeIn();
		})	
		.fail(function(data){
			showAlert("error", "Error desconocido: "+data);
		});
	});

	// Agrega un medicamento buscado anteriormente y lo agrega a la lista temporal
	$('#add-med-receta').click(function() {

		var data = {"receta_tmp_cve":$('#med_cve').val(), "receta_tmp_area":$('#med_area').val(), "receta_tmp_nombre":$('#med_nom').val(),
				"receta_tmp_present":$('#med_pres').val(), "receta_tmp_cantidad":$('#med_cant').val(), "receta_tmp_indicacion":$('#med_indi').val(),
				"receta_tmp_duracion":$('#med_dur').val(), "expediente_id":$('#expediente_id').val(), "usu_id":$('#usu_id').val(),
				"receta_fecha":$('#med_fecha').val()};
		var table = "";


		swal({
			title: "¿Desea agregar este medicamento?",   
			text: "Se agregará a la lista de medicamentos del paciente",   
			type: "warning",   
			showCancelButton: true,   
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Si, agregarlo!",
			cancelButtonText: "No, cancelar!",   
			closeOnConfirm: false,
			allowEscapeKey: false
		}, function() {
			$.ajax({
				type: 'post',
				url: 'terapeutica/savemedicamentotmp',
				data: data,
				dataType: 'json',
				success: function(data) {
					$.each(data, function(i, obj) {
						table += "<tr>";
						table += "<td>"+obj.receta_tmp_cve+"</td>";
						table += "<td>"+obj.receta_tmp_nombre+"</td>";
						table += "<td>"+obj.receta_tmp_present+"</td>";
						table += "<td>"+obj.receta_tmp_cantidad+"</td>";
						table += "<td>"+obj.receta_tmp_indicacion+"</td>";
						table += "<td class='text-center'><label class='label label-success'>SI</label></td>";
						table += "<td class='text-center'><a onclick='deletemedtmp("+obj.receta_tmp_id+")' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span></a></td>";
						table += "</tr>";
					});
					$('#receta-body').html(table);
					swal("Agreado!", "Se ha agregado el medicamento.", "success");
				},
				error: function() {}
			});
		});
	});

	// Guarda la receta y quita de la lista temporal los medicamentos
	$('.save-receta').click(function() {

		var data = {"expediente_id":$('#expediente_id').val(), "usu_id":$('#usu_id').val(), "clue_id":$('#clue_id').val(),
				"serv_id":$('#serv_id').val(), "receta_fecha":$('#receta_fecha').val(), "receta_referencia":$('#receta_referencia').val(),
				"receta_diagnostico":$('#receta_diagnostico').val(), "receta_observa":$('#receta_observa').val()}

		$.ajax({
			type: 'post',
			url: 'terapeutica/savereceta',
			data: data,
			dataType: 'json',
			success: function(data) {
				if (data.success == "true") {
					showAlert("success", data.msg);
					$("#receta-body").empty();
					cleanMedicamento();
					$("#verificar-clave").show();
					$("#idReceta").val(data.receta);
				} else { showAlert("error", data.msg); $("#receta-body").empty(); cleanMedicamento();}
			},
			error: function() {}
		});
	});

	$("#verificar-pass").click(function () {

		var pass = $("#pass-user").val();

		$.ajax({
			type: 'post',
			url: 'terapeutica/verificarpass',
			data: 'usu_password='+pass,
			dataType: 'json',
			success: function(data) {
				if (data.login == "true") {
					$('#print-up').removeClass("disabled");
					$('#print-down').removeClass("disabled");
					//$("#idReceta").val(data.receta);
					showAlert("success", data.msg);
				} else {
					showAlert("error", data.msg);
				}
			}
		});
	});
});
</script>