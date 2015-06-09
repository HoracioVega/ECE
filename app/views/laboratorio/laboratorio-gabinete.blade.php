<div class="alert-box-container"><div id="alert-box" class=""><p>Mensaje</p></div></div>
<!-- Container -->
		<div class="container-fluid">
			<div class="row">
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="page-header nomargintop">
								<h4>Exámenes de Gabinete</h4>
								<a href="" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-floppy-disk"></span><span class="pageh-text-btn">Guardar</span></a>
								<a href="" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-warning-sign"></span><span class="pageh-text-btn">Llenar Línea de vida</span></a>
							</div>

							<div class="row">
								<form id="gabinete_solicitado">
									<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">

									
										<div class="row">
											<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
												<div class="form-group">
												<input id="exp_id" type="hidden" value="{{$expediente_id}}" name="expediente_id">
												<input id="" type="hidden" value="0" name="lab_tipo">
												<input id="" type="hidden" value="no" name="lab_urgente">
												<input type="hidden" value="<?php echo date("Y/m/d H:i:s");?>" name="lab_fecha">
													<label>Fecha:</label>
													<input type="text" class="form-control" value="<?php echo date("Y/m/d");?>"  disabled>
												</div>
											</div>
										
											<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
												<div class="form-group">
													<label>Diagnóstico:</label>
													<input type="text" class="form-control" value="" name="lab_diagnostico">
												</div>

												<div class="form-group">
													<label>Estudio a solicitar:</label>
													<input type="text" class="form-control"  name="lab_estudio" value="">
												</div>
												
												<div class="form-group">
													<label>Servicio:</label>
													<select name="serv_id" id="" class="form-control"  required="required">
														<option value="">Seleccione una opción</option>
														@foreach($catalogo_serv as $serv)
														<option>{{$serv}}</option>
														@endforeach
													</select>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-8 col-lg-8">
										<label>Observaciones:</label>
										<textarea name="lab_impresion" class="form-control marginbot20" rows="13"></textarea>
									</div>
								</form>
								

								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<div class="panel-group nomarginbot" id="accordion" role="tablist" aria-multiselectable="true">
										<div class="panel panel-info">
											<div class="panel-heading" role="tab" id="headingOne">
												<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Exámenes de Gabinete <small>Consultas previas</small></a></h4>									
											</div>

											<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
												<div class="panel-body">

													<div class="row">
														<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
															<div class="table-responsive">
																<table id="estudios" class="table table-striped table-hover table-condensed">
																	<thead>
																		<tr>
																			<th width="30px">Consulta</th>
																			<th width="30px">Diagnóstico</th>
																			<th width="30px">Estudio</th>
																			<th width="30px" class="text-center">Ver detalles</th>
																		</tr>
																	</thead>
																	<tbody>
																	</tbody>
																</table>
															</div>
															<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 nopad">
																<div id="paginator" class="right"></div>
															</div> 
														<!--  	<div class="table-responsive">
																<table class="table table-striped table-condensed">
																	<thead>
																		<tr>
																			<th>Año</th>
																			<th>Mes</th>
																			<th>Día</th>
																			<th>Hora</th>
																			<th width="80px" class="text-center">Acciones</th>
																		</tr>
																		<tr>
																			<th><input class="form-control input-sm" type="text"></th>
																			<th><input class="form-control input-sm" type="text"></th>
																			<th><input class="form-control input-sm" type="text"></th>
																			<th><input class="form-control input-sm" type="text"></th>
																			<th><input class="form-control input-sm" type="text" disabled></th>
																		</tr>
																	</thead>
																	<tbody>
																		<tr class="success">
																			<td>2015</td>
																			<td>Septiembre</td>
																			<td>22</td>
																			<td>13:22:11</td>
																			<td class="text-center"><a href="" class="btn btn-info btn-xs active"><span class="glyphicon glyphicon-eye-open"></span></a></td>
																		</tr>
																		<tr>
																			<td>2015</td>
																			<td>Agosto</td>
																			<td>28</td>
																			<td>14:12:58</td>
																			<td class="text-center"><a href="" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-eye-open"></span></a></td>
																		</tr>
																		<tr>
																			<td>2015</td>
																			<td>Julio</td>
																			<td>30</td>
																			<td>14:22:11</td>
																			<td class="text-center"><a href="" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-eye-open"></span></a></td>
																		</tr>
																		<tr>
																			<td>2015</td>
																			<td>Junio</td>
																			<td>18</td>
																			<td>14:01:13</td>
																			<td class="text-center"><a href="" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-eye-open"></span></a></td>
																		</tr>
																		<tr>
																			<td>2015</td>
																			<td>Mayo</td>
																			<td>22</td>
																			<td>14:07:11</td>
																			<td class="text-center"><a href="" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-eye-open"></span></a></td>
																		</tr>
																		<tr>
																			<td>2015</td>
																			<td>Abril</td>
																			<td>18</td>
																			<td>14:01:13</td>
																			<td class="text-center"><a href="" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-eye-open"></span></a></td>
																		</tr>
																		<tr>
																			<td>2015</td>
																			<td>Marzo</td>
																			<td>22</td>
																			<td>14:07:11</td>
																			<td class="text-center"><a href="" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-eye-open"></span></a></td>
																		</tr>
																		<tr>
																			<td>2015</td>
																			<td>Febrero</td>
																			<td>22</td>
																			<td>14:07:11</td>
																			<td class="text-center"><a href="" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-eye-open"></span></a></td>
																		</tr>
																	</tbody>
																</table>
															</div>-->

															<!--  <nav>
																<ul class="pagination pagination-sm">
																	<li><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
																	<li class="active"><a href="#">1</a></li>
																	<li><a href="#">2</a></li>
																	<li><a href="#">3</a></li>
																	<li><a href="#">4</a></li>
																	<li><a href="#">5</a></li>
																	<li><a href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
																</ul>
															</nav>-->
														</div>
														<div id="modal-container" class="modal-contenido">
																
														</div>
														
													</div>
												</div>						
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="btns-form-ad">
								<button id="guarda_gab"type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-floppy-disk"></span><span class="pageh-text-btn">Guardar</span></button>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div><!-- /Container -->
		
		{{ HTML::script('js/underscore-min.js'); }}


<script id="lista-estudios-paciente-template" type="text/html">
	<% _.each(estudios, function(e) { %>
		<tr valor-id="<%=e.lab_id%>" class="click">
			<td style="min-width: 60px;"><%= e.lab_fecha %></td>
			<td style="min-width: 30px;"><%=e.lab_diagnostico%></td>
			<td style="min-width: 70px;"><%=e.lab_estudio%></td>
			<td class="text-center"><a onclick="obtenId()" valor-id="<%=e.lab_id%>" href="" class="btn btn-info btn-xs"><span
			class="glyphicon glyphicon-eye-open"></span></a></td>
		</tr>
	<% }); %>
</script>
	
	<script>

	var pageActual = 1;
	var totalPages = 1;
	
		$(document).ready(function() {

			obtenerExamenesPasados(pageActual);
		
		
					$('#guarda_gab').click(function() {
				        var datos = $('#gabinete_solicitado').serialize();

				        $.ajax({
				            url: 'examen/guardalab',
				            type: 'POST',
				            data: datos,
				            success: function(respuesta) {
					            if(respuesta.proceso == true){
					            	showAlert("success", "Guardado correctamente");
					            	obtenerExamenesPasados(pageActual);
						        }
					            else{
					            	showAlert("error", "Fallo al guardar los datos");
						        }     	
				            }
				        });
				    });
		});

		function obtenerExamenesPasados(page){

			var expediente_id = $("#exp_id").val();
			var urlRoot = '<?php echo Request::root();?>';
		
			$.ajax({
				type: "POST",
				cache: true,
				url: urlRoot+"/laboratorio/gabinete/gabinetepasados",
				data: {page:page,byPage:5,expediente_id:expediente_id},
				dataType: 'JSON'
			})
			.done(function(data){
				var template = $('#lista-estudios-paciente-template').html();
				if(data !=null){
					$('#estudios tbody').html(_.template(template)({'estudios': data.estudios}));
					paginador(data.paginacion.page,data.paginacion.total);
				}else{
					$('#estudios tbody').html("<tr><td class='no-data-table' colspan='8'>No hay examenes anteriores.</td></tr>");
				}
			})
			.fail(function(data){
				showAlert("error", "Error desconocido: "+data);
			});
		
		
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
				obtenerExamenesPasados(1);
			}
		}
		function lastPage(){
			if(pageActual!=totalPages){
				page = $('#page');
				page.val(totalPages);
				obtenerExamenesPasados(totalPages);
			}
		}
		function nextPage(){
			page = $('#page');
			if(page.val()<totalPages){
				page.val(parseInt(page.val())+1);
				obtenerExamenesPasados(page.val());	
			}
		}
		function prevPage(){
			page = $('#page');
			if(page.val()>1){
				page.val(parseInt(page.val())-1);
				obtenerExamenesPasados(page.val());	
			}				
		}

		function obtenId(){
		    
		    $(".click").click(function(e) {
		        e.preventDefault();
		       //var id_detalle = $(this).attr("valor-id");

		        $.ajax({

		        	type: "POST",
					cache: true,
					url: "examen/examenespecifico",
					data: {id_detalle:$(this).attr("valor-id")},
					dataType: 'HTML'
				 })
				 .done(function(data){
						
							$('.modal-contenido').html(data);
							$('#modal-container').fadeIn();
							//$('#print-down,#print-down2').removeClass('disabled');
					
				 })
					.fail(function(data){
						showAlert("error", "Error desconocido: "+data);
					});
		    	});
			}

		function imprimirEstudio() {
			var expediente_id = $("#exp_id").val();

			window.open('examen/imprimirexamen?lab_id='+$("#examen_impresion").val()+'&exp_id='+expediente_id);
			//$(location).attr('href', 'examen/imprimirexamen?lab_id='+$("#examen_impresion").val()+'&exp_id='+expediente_id);
		}
	</script>
