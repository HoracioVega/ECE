@extends(Config::get('ECE.layout'))

@section('content')
		<!-- Container -->
		<div class="alert-box-container"><div id="alert-box" class=""><p>Mensaje</p></div></div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4>Lista de espera</h4>
							<button id="reload-data" class="btn btn-success" type="button" title="Actualizar Tabla"><span class="glyphicon glyphicon-refresh"></span></button>
							<a href="#modalAgrPaciente" data-toggle="modal" class="btn btn-default btn-sm" title="Acciones Paciente"><span class="glyphicon glyphicon-plus"></span></a>
						</div>

						<div class="panel-body">
							<div class="table-responsive">
								<table id="pacientes" class="table table-striped table-hover table-condensed">
									<thead>
										<tr>
											<th width="40px">Exp.</th>
											<th width="33%">Nombre</th>
											<th>H.Registro</th>
											<th>H.Consulta</th>
											<th>H.Salida</th>
											<th class="text-center" width="110px">Estatus</th>
											<th class="text-center" width="80px">Acciones</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>

								<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 nopad">
									<div id="paginator" class="left"></div>
								</div> 
							</div>
						</div>
					</div>
				</div>

				<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4>Sumario</h4>
							<a href="" class="btn btn-default btn-sm" title="Hoja diaria"><span class="glyphicon glyphicon-file"></span></a>
						</div>

						<ul class="list-group">
							<li class="list-group-item"><span id="stats-3" class="badge success">0</span>Atendidos</li>
							<li class="list-group-item"><span id="stats-2" class="badge primary">0</span>En Consulta</li>
							<li class="list-group-item"><span id="stats-1" class="badge warning">0</span>En Espera</li>
							<li class="list-group-item"><span id="stats-total"class="badge danger">0</span><b>Total</b></li>
						</ul>
					</div>

				</div>
			</div>

			<div class="modal fade" id="modalAgrPaciente">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">

						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Acciones Paciente</h4>
						</div>

						<div class="modal-body" >
							<div role="tabpanel">
								<ul class="nav nav-tabs" role="tablist">
									<li role="presentation" class="active"><a id = "add-paciente"  aria-controls="nuevo" role="tab" data-toggle="tab">Paciente Nuevo</a></li>
									<li role="presentation"><a id = "search-paciente" aria-controls="conExpediente" role="tab" data-toggle="tab">Paciente con Expediente Electrónico</a></li>
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

					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->

		</div><!-- /Container -->
@stop

@section('head')
	{{-- Libreria para Select2 --}}
	{{ HTML::script('js/underscore-min.js'); }}
	{{ HTML::script('js/datetimepicker/jquery.datetimepicker.min.js'); }}
	{{ HTML::script('js/jquery.validate.min.js'); }}
	{{ HTML::script('js/sweet-alert.min.js'); }}
	{{ HTML::script('js/utilities.js'); }}
	
	{{ HTML::style('css/datetimepicker/datetimepicker.min.css'); }}
	{{ HTML::style('css/sweetalert.min.css'); }}
		
	<script id="lista-template" type="text/html">
<% _.each(pacientes, function(p) { %>
		<% if(p.consulta_estatus != 3){ %>
			<tr>
				<td class="align-center"><%= p.expediente_id %></td>
				<td><a href="historia/principal?exp_id=<%= p.expediente_id %>" ><%= p.nombrePaciente %></a></td>
				<td class="align-center"><%= p.consulta_hentrada %></td>
				<td class="align-center"><%= p.consulta_hconsulta %></td>
				<td class="align-center"><%= p.consulta_hsalida %></td>
				<!--<td><%= p.nombreMedico %></td>-->
				<% if(p.consulta_estatus == 1){ %>
					<td class="align-left text-bold"><span class="icon icon-flag"></span> <span> En Espera</span></td>
				<% }else if(p.consulta_estatus ==2){ %>
					<td class="align-left"><span class="icon icon-time"></span> <span> En Consulta</span></td>
				<% } %>
				<td>
					<div class="btn-group">
						<button <% if(p.estatus==1){ %> class="btn btn-xs btn-info" onclick="actualizarEstatus('<%= p.id_registro %>')" <% }else{ %> class="btn btn-xs btn-info disabled" <%} %> title="Finalizar consulta"><span class="glyphicon glyphicon-refresh"></span></button>
						<button class="btn btn-xs btn-danger" onclick="eliminarPaciente('<%= p.consulta_id%>')" title="Eliminar" ><span class="glyphicon glyphicon-trash"></span></button>
					</div>
				</td>
			</tr>
		<% } %>
<% }); %>

	</script>
	
<script id="lista-search-template" type="text/html">
	<% _.each(pac, function(p) { %>
		<tr>
			<td style="min-width: 120px;"><%= p.expediente_id %></td>
			<td style="min-width: 300px;"><%= p.nombrePaciente %></td>
			<td style="min-width: 110px;"><%= p.fecha_nacimiento %></td>
			<td style="width: 30px;"><button class="btn btn-xs btn-primary" title="Agregar" onclick="elegirPaciente('<%= p.expediente_id  %>');"><span
						class="glyphicon glyphicon-plus"></span></button></td>
		</tr>
	<% }); %>
</script>
	
	<script type="text/javascript">
			var pageActual = 1;
			var totalPages = 1;
			function ir(url){
				$.get(url,function(data){$('.content').html(data);});
			}
			$(document).ready(fnReady);
			$('#reload-data').click(function(){obtenerLista(pageActual);});
			
			function fnReady(){
				var flag = false;
				obtenerLista(pageActual);
				$('#add-paciente').click(function(){addPaciente();});
				$('#search-paciente').click(function(){buscarPaciente();});
				resizeContent();
			}
			function addPaciente(){

				$.ajax({
					type: "GET",
					url: "lista/addpacientemodal",
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
			function buscarPaciente(){

				$.ajax({
					type: "GET",
					cache: true,
					url: "lista/searchpacientemodal",
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
			function obtenerLista(page){
				$.ajax({
					type: "POST",
					cache: true,
					url: "lista/obtenerlista",
					data: {page:page,byPage:5},
					dataType: 'JSON'
				})
				.done(function(data){
					var template = $('#lista-template').html();
					if(data.lista_pacientes!=null){
						$('#pacientes tbody').html(_.template(template)({'pacientes': data.lista_pacientes}));
						paginador(data.paginacion.page,data.paginacion.total);
					}else{
						$('#pacientes tbody').html("<tr><td class='no-data-table' colspan='8'>Sin pacientes en lista.</td></tr>");
					}
					resetStats();
					if(data.estadisticas!=null){
						totalPacientes=0;
						tam = data.estadisticas.length;
						for(i=0;i<tam;i++){
							$('#stats-'+data.estadisticas[i].consulta_estatus).html(data.estadisticas[i].total);
					           //if(data.estadisticas[i].estatus!=3)
					            totalPacientes += parseInt(data.estadisticas[i].total);
						}
						$('#stats-total').html(totalPacientes);
					}
				})
				.fail(function(data){
					showAlert("error", "Error desconocido: "+data);
				});
			}
			function resetStats(){
				$('#stats-total').html(0);
				$('#stats-1').html(0);
				$('#stats-2').html(0);
				$('#stats-3').html(0);
			}
			function paginador(page,total){
				pageActual = page;
				totalPages = total;
				if(pageActual==1) first = "disabled"; else first = "";
				if(pageActual==totalPages) last = "disabled"; else last = "";
				html = '<button type="button" class="btn first '+first+'" onclick="firstPage();"><span class = "glyphicon glyphicon-step-backward"></span></a></button> ';
				html += '<button type="button" class="btn prev '+first+'" onclick="prevPage();"><span class = "glyphicon glyphicon-fast-backward"></span></button> ';
				html += '<span class="pagedisplay"> '
				html += 'Página <input type="text" id="page" name="page" style="width: 20px;" value="'+ page +'" /> ';
				html += 'de <input type="text" id="totalpage" name="totalpage" style="width: 20px;" value="'+total+'" /> ';
				html += '</span> <!-- this can be any element, including an input -->';
				html += '<button type="button" class="btn next '+last+'" onclick="nextPage();"><span class = " glyphicon glyphicon-fast-forward"></span></button> ';
				html += '<button type="button" class="btn last '+last+'" onclick="lastPage();"><span class = "glyphicon glyphicon-step-forward"></span></button>';
				$('#paginator').html(html);
			}
			function firstPage(){
				if(pageActual!=1){
					page = $('#page');
					page.val(1);
					obtenerLista(1);
				}
			}
			function lastPage(){
				if(pageActual!=totalPages){
					page = $('#page');
					page.val(totalPages);
					obtenerLista(totalPages);
				}
			}
			function nextPage(){
				page = $('#page');
				if(page.val()<totalPages){
					page.val(parseInt(page.val())+1);
					obtenerLista(page.val());	
				}
			}
			function prevPage(){
				page = $('#page');
				if(page.val()>1){
					page.val(parseInt(page.val())-1);
					obtenerLista(page.val());	
				}				
			}
			function eliminarPaciente(id){
				swal({   
					title: "¿Estas Seguro?",   
					text: "Este proceso no podrá ser restaurado!",   
					type: "warning",   
					showCancelButton: true,   
					confirmButtonColor: "#DD6B55",   
					confirmButtonText: "Si, eliminar!",
					cancelButtonText: "No, cancelar!",   
					closeOnConfirm: false,
					allowEscapeKey: false
				}, function(){   
					$.getJSON('lista/eliminarpaciente?consulta_id='+id, function(data){
						if(data.proceso){
							swal("Eliminado!", "La lista de espera ha sido actualizada.", "success");
							obtenerLista(pageActual);
						}else{
							swal("Bloqueado!", "Paciente en consulta, solo el Médico puede eliminarlo.", "error");
						}
					},"html");
				});
			}
			function actualizarEstatus(id){
				swal({   
					title: "¿Deseas finalizar la consulta?",   
					text: "El paciente ya no aparecerá en la lista de espera",   
					type: "warning",   
					showCancelButton: true,   
					confirmButtonColor: "#DD6B55",   
					confirmButtonText: "Si, finalizar!",
					cancelButtonText: "No, cancelar!",   
					closeOnConfirm: false,
					allowEscapeKey: false
				}, function(){
					$.getJSON('../controller/actualizarEstatus.php?id='+id, function(data){
						if(data.proceso){
							swal("Consulta Finalizada!", "La lista de espera ha sido actualizada.", "success");
							obtenerLista(pageActual);
						}
					},"html");
				});
			}
		</script>
@stop		