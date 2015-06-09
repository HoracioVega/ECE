<div class="alert-box-container">
	<div id="alert-box" class="">
		<p>Mensaje</p>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="page-header nomargintop">
						<h4>Hoja de evolución</h4>
						<a href="#" class="btn btn-primary btn-sm save-hojaevolucion" data = "0"><span
							class="glyphicon glyphicon-floppy-disk"></span><span
							class="pageh-text-btn">Guardar</span></a>
					</div>
				{{ Form::open(array( 'id' => 'formHojaevolucion', 'role' => 'form'))}}
				{{ Form::hidden('expediente_id',
								$_GET['exp_id'], array('class'=>'form-control'
								, 'id' => 'expediente_id')) }}
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
								value ="@if(isset($current[0])){{$current[0]['explo_peso']}}@else{{''}}@endif" />
								<span class="input-group-addon">kg</span>
								</div>
							</div>
							<div class="col-xs-6 col-sm-3 col-md-2 col-lg-2">
								<label>Talla:</label>
								<div class="input-group">
								<input type = "text" dataType = "Int" class = "form-control" name = "explo_talla" id = "explo_talla"
								value ="@if(isset($current[0])){{$current[0]['explo_talla']}}@else{{''}}@endif" />
								 <span class="input-group-addon">cms</span>
								</div>
							</div>
							<div class="col-xs-6 col-sm-3 col-md-2 col-lg-2">
								<label>IMC:</label> 
								<input type ="text" class = "form-control" name = "explo_imc" id = "explo_imc"
								value = "@if(isset($current[0])){{$current[0]['explo_imc']}}@else{{''}}@endif" readonly/>
							</div>
							<div class="col-xs-6 col-sm-3 col-md-2 col-lg-2">
								<label>Glicemia:</label>
								<div class="input-group">
								<input type = "text" dataType = "Int" class = "form-control" name = "explo_glicemia" id = "explo_glicemia"
								value ="@if(isset($current[0])){{$current[0]['explo_glicemia']}}@else{{''}}@endif" />
								<span class="input-group-addon">mg/dL</span>
								</div>
								<br>
							</div>

							<div class="col-xs-6 col-sm-3 col-md-2 col-lg-3">
								<label>Pulso:</label> 
								<input type = "text" dataType = "Int" class = "form-control" name = "explo_pulso" id = "explo_pulso"
								value ="@if(isset($current[0])){{$current[0]['explo_pulso']}}@else{{''}}@endif" />
							</div>
							<div class="col-xs-6 col-sm-3 col-md-2 col-lg-3">
								<label>Frecuencia Respiratoria.:</label>
								<div class="input-group">
								<input type = "text" dataType = "Int" class = "form-control" name = "explo_resp" id = "explo_resp"
								value ="@if(isset($current[0])){{$current[0]['explo_resp']}}@else{{''}}@endif" />
								 <span class="input-group-addon">xmin</span>
								</div>
							</div>
							<div class="col-xs-6 col-sm-3 col-md-2 col-lg-3">
								<label>Temperatura:</label>
								<div class="input-group">
								<input type = "text" dataType = "Int" class = "form-control" name = "explo_temp" id = "explo_temp"
								value ="@if(isset($current[0])){{$current[0]['explo_temp']}}@else{{''}}@endif" />
								<span class="input-group-addon">°</span>
								</div>
							</div>
							<div class="col-xs-6 col-sm-3 col-md-2 col-lg-3">
								<label>Tension Arterial:</label>
								<div class="input-group">
								<input type = "text" dataType = "Int" class = "form-control" name = "explo_ta" id = "explo_ta"
								value ="@if(isset($current[0])){{$current[0]['explo_ta']}}@else{{''}}@endif" />
								<span class="input-group-addon">mmHg</span>
								</div>
								<br>
							</div>
					</div>
					
					<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
								<label>Datos Clinicos:</label> 
								<textarea name = "evolucion_clinicos" rows="3" class = "form-control">@if(isset($current[0])){{$current[0]['evolucion_clinicos']}}@else{{''}}@endif</textarea>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
								<label>Tratamiento:</label>
								<textarea name = "evolucion_tratamiento" rows="3" class = "form-control">@if(isset($current[0])){{$current[0]['evolucion_tratamiento']}}@else{{''}}@endif</textarea>
							</div>		
					</div>	
				{{ Form::close() }}		
					<br>
					<br>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="btns-sobre-tabla">
								<label>Enfermedades:</label> <a href="#modalAgrEnfermedad"
									data-toggle="modal"
									class="btn btn-warning btn-sm"><span
									class="glyphicon glyphicon-plus"></span><span
									class="pageh-text-btn">Agregar Enfermedad</span></a>
							</div>
							<br>
							<div class="table-responsive">
								<table id="enfermedades-paciente-search" class="table table-hover table-bordered" >
									<thead>
										<tr>
											<th width="70px">Código</th>
											<th>Enfermedad</th>
											<th width="170px">¿Estudio Epidemiológico?</th>
											<th width="120px">Estatus</th>
											<th width="70px">Acciones</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
						
						<!-- cOMIENZA ENFERMEDAD DE ENFERMEDADES -->
						
						<div class="modal fade" id="modalAgrEnfermedad">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
	
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal"
											aria-hidden="true">&times;</button>
										<h4 class="modal-title">Acciones Enfermedad</h4>
									</div>
	
									<div class="modal-body">
										<div role="tabpanel">
											<ul class="nav nav-tabs" role="tablist">
												<li role="presentation"><a id="search-enfermedad"
													aria-controls="Enfermedad" role="tab" data-toggle="tab">Mostrar
														catalogo</a></li>
											</ul>
	
											<div class="tab-content">
												<div role="tabpanel" class="tab-pane active" id="nuevo">
													<div class="row">
														<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
															<div id="modal-container"
																class="background-modal-container">
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
								<!-- /.modal-content -->
							</div>
							<!-- /.modal-dialog -->
						</div>
						<!-- /.modal -->
						
						
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="panel-group nomarginbot" id="accordion"
								role="tablist" aria-multiselectable="true">
								<div class="panel panel-info">
									<div class="panel-heading" role="tab" id="headingOne">
										<h4 class="panel-title">
											<a id = "historialHojaEvolucion" data-toggle="collapse" data-parent="#accordion"
												href="#collapseOne" aria-expanded="true"
												aria-controls="collapseOne">Hoja de evolución <small>Consultas
													previas</small></a>
										</h4>
									</div>

									<div id="collapseOne" class="panel-collapse collapse"
										role="tabpanel" aria-labelledby="headingOne">
										<div class="panel-body">
											<div class="row">
												<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
													<div class="table-responsive">
														<table id = "historia-hoja-evolucion" class="table table-striped table-condensed">
															<thead>
																<tr>
																	<th>Fecha</th>
																	<th width="30px" class="text-center">Acciones</th>
																</tr>
															</thead>
															<tbody>
															</tbody>
														</table>
													</div>
													<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 nopad">
														<div id="paginatorHojaEvo" class="left"></div>
													</div> 
												</div>

												<div id = "detalleHojaEvolacion" class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
													
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="btns-form-ad">
						<a href="#" class="btn btn-primary btn-sm save-hojaevolucion" data = "0">
							<span class="glyphicon glyphicon-floppy-disk"></span><span
								class="pageh-text-btn">Guardar</span>
						</a>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
{{ HTML::script('js/underscore-min.js'); }}
<!-- /Container -->

<script id="lista-enfermedad-paciente-template" type="text/html">
	<% _.each(enfermedades, function(e) { %>
		<tr>
			<td style="min-width: 120px;"><%= e.enf_codigo %></td>
			<td style="min-width: 300px;"><%= e.enf_nombre %></td>
			<td style="min-width: 110px;"><% if(e.enf_form == 1){ %>Si <% }else{ %> No <% } %></td>
			<td style="min-width: 110px;"><% if(e.temp_formulario_llenado == 1){ %>Si <% }else{ %> Estudio Pendiente <% } %></td>
			<td style="min-width: 110px;"><a class="btn btn-danger btn-xs" href="#" title = "Eliminar enfermedad" onClick = "eliminarEnfermedad('<%= e.temp_id  %>')"><span class="glyphicon glyphicon-remove"></span></a></td>
		</tr>
	<% }); %>
</script>


<script id="lista-enfermedad-search-template" type="text/html">
	<% _.each(enf, function(e) { %>
		<tr>
			<td style="min-width: 120px;"><a href="#" title="Agregar" onclick="elegirEnfermedad('<%= e.enf_id  %>','<%= e.enf_codigo  %>');"><%= e.enf_codigo %></a></td>
			<td style="min-width: 300px;"><a href="#" title="Agregar" onclick="elegirEnfermedad('<%= e.enf_id  %>','<%= e.enf_codigo  %>');"><%= e.enf_nombre %></a></td>
			<td style="min-width: 110px;"><% if(e.formulario == 1){ %>Si <% }else{ %> No <% } %></td>
		</tr>
	<% }); %>
</script>

<script id="hoja-evolucion-template" type="text/html">
	<% _.each(evo, function(e) { %>
		<tr>
			<td style="min-width: 120px;"><%= e.evolucion_fecha  %></td>
			<td style="min-width: 110px;"><button class="btn btn-info btn-xs active" href="" onclick="mostrarModalDetalle('<%= e.evolucion_id  %>');" ><span class="glyphicon glyphicon-eye-open"></span></button></td>
		</tr>
	<% }); %>
</script>

<script>

var pageActual = 1;
$(document).ready(OnCreate);

function OnCreate(){
	
	obtenerListaEnfermedades(pageActual);
	
	var now = new Date();
	var yr = now.getFullYear();
	$('input[datatype="Char"]').on("blur",{params:''},upperCase);
	$('input[datatype="Int"]').on("keypress",{params:''},decimal);
	$('#explo_talla').change(function(){calIMC()});
	$('#explo_talla').focusout(function(){calIMC()});
	$('#search-enfermedad').click(function(){mostrarEnfermedad();});
	$("#historialHojaEvolucion").click(function(){obtenerHistorialEvolucion();});
	
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

	frm = $('#formHojaevolucion');
	validateForm(frm, formRules, formMessages);
	$('.save-hojaevolucion').on("click", {params:options, form:frm}, saveHojaEvolucion);

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
					showAlert("error", "No se pudo guardar el perfil del paciente");
				}else{
					if(view == 0){
					showAlert("success", "La hoja de evolucion del paciente guardada correctamente");
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

function mostrarEnfermedad(){
	$.ajax({
		type: "GET",
		cache: true,
		url: "impresion/searchenfermedadmodal",
		dataType: 'HTML'
	})
	.done(function(data){

		$('.modal-contenido').html(data);
		$('#modal-container').fadeIn();
	})
	.fail(function(data){
		showAlert("error", "Error desconocido: "+data);
	});
}


function eliminarEnfermedad(temp_id){

	var temp_id = temp_id;
	
	swal({   
		title: "¿Estas Seguro?",   
		text: "Quieres eliminar el registro!",   
		type: "warning",   
		showCancelButton: true,   
		confirmButtonColor: "#DD6B55",   
		confirmButtonText: "Si, elegir!",
		cancelButtonText: "No, cancelar!",   
		closeOnConfirm: false 
	}, function(){
		$.getJSON('impresion/eliminarenfermedad?temp_id='+temp_id, function(data){
			if(data.proceso){
				swal("Eliminado!", "La enfermedad seleccionada ha sido eliminada.", "success");
				obtenerListaEnfermedades(1);
			}else{
				swal("No eliminado!", "La enfermedad no se ha podido eliminar.", "error");
			}
		},"html");

	});
}

function obtenerListaEnfermedades(page){

	var expediente_id = $("#expediente_id").val();

	$.ajax({
		type: "POST",
		cache: true,
		url: "impresion/obtenerlistaenfermedad",
		data: {page:page,byPage:5,expediente_id:expediente_id},
		dataType: 'JSON'
	})
	.done(function(data){
		var template = $('#lista-enfermedad-paciente-template').html();
		if(data.request!=null){
			$('#enfermedades-paciente-search tbody').html(_.template(template)({'enfermedades': data.request}));
			//paginador(data.paginacion.page,data.paginacion.total);
		}else{
			$('#enfermedades-paciente-search tbody').html("<tr><td class='no-data-table' colspan='8'>Sin enfermedades en lista.</td></tr>");
		}
	})
	.fail(function(data){
		showAlert("error", "Error desconocido: "+data);
	});
}

function paginadorEvo(page,total){
	pageActual = page;
	totalPages = total;
	if(pageActual==1) first = "disabled"; else first = "";
	if(pageActual==totalPages) last = "disabled"; else last = "";
	html = '<button type="button" class="btn first '+first+'" onclick="firstPageEvo();"><span class = "glyphicon glyphicon-step-backward"></span></a></button> ';
	html += '<button type="button" class="btn prev '+first+'" onclick="prevPageEvo();"><span class = "glyphicon glyphicon-fast-backward"></span></button> ';
	html += '<span class="pagedisplay"> '
	html += 'Página <input type="text" id="page-hoja-evo" name="page-hoja-evo" style="width: 20px;" value="'+ pageActual +'" /> ';
	html += 'de <input type="text" id="totalpage-hoja-evo" name="total" style="width: 20px;" value="'+totalPages+'" /> ';
	html += '</span> <!-- this can be any element, including an input -->';
	html += '<button type="button" class="btn next '+last+'" onclick="nextPageEvo();"><span class = " glyphicon glyphicon-fast-forward"></span></button> ';
	html += '<button type="button" class="btn last '+last+'" onclick="lastPageEvo();"><span class = "glyphicon glyphicon-step-forward"></span></button>';
	$('#paginatorHojaEvo').html(html);
}
function firstPageEvo(){
	if(pageActual!=1){
		page = $('#page-hoja-evo');
		page.val(1);
		obtenerHistorialEvolucion(1);
	}
}
function lastPageEvo(){
	if(pageActual!=totalPages){
		page = $('#page-hoja-evo');
		page.val(totalPages);
		obtenerHistorialEvolucion(totalPages);
	}
}
function nextPageEvo(){
	page = $('#page-hoja-evo');
	if(page.val()<totalPages){
		page.val(parseInt(page.val())+1);
		obtenerHistorialEvolucion(page.val());	
	}
}
function prevPageEvo(){
	page = $('#page-hoja-evo');
	if(page.val()>1){
		page.val(parseInt(page.val())-1);
		obtenerHistorialEvolucion(page.val());	
	}				
}

//SE TERMINARA HASTA QUE SE COMPLETE EL MODULO DE HOJA DE EVOLUCION ESTA EN FASE DE DISEÑO
function obtenerHistorialEvolucion(page){

	var expediente_id = $("#expediente_id").val();
	
	$.ajax({
		type: "POST",
		cache: true,
		url: urlRoot+"/hojaevolucion/evolucion/obtenerhistorialevolucion",
		data: {page:page,byPage:10,expediente_id:expediente_id},
		dataType: 'JSON'
	})
	.done(function(data){
		var template = $('#hoja-evolucion-template').html();
		if(data.request!=null){
			$('#historia-hoja-evolucion tbody').html(_.template(template)({'evo': data.request}));
			paginadorEvo(data.paginacion.page,data.paginacion.total);
		}else{
			$('#historia-hoja-evolucion tbody').html("<tr><td class='no-data-table' colspan='8'>Sin enfermedades en lista.</td></tr>");
		}
	})
	.fail(function(data){
		showAlert("error", "Error desconocido: "+data);
	});
	
}

function mostrarModalDetalle(evolucion_id){

	$.ajax({
		type: "GET",
		cache: true,
		url: urlRoot+"/hojaevolucion/evolucion/detalleevolucionmodal",
		data : {evolucion_id:evolucion_id},
		dataType: 'HTML'
	})
	.done(function(data){

		$('#detalleHojaEvolacion').html(data);
		//$('#modal-container').fadeIn();
	})
	.fail(function(data){
		showAlert("error", "Error desconocido: "+data);
	});
	
}

</script>