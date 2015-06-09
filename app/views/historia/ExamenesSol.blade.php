<div class="alert-box-container"><div id="alert-box" class=""><p>Mensaje</p></div></div>
	<!-- Container -->
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="page-header nomargintop">
								<h4>Exámenes solicitados</h4>
								<a href="" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-floppy-disk"></span><span class="pageh-text-btn">Guardar</span></a>
								<?php if($botones==3){// si se llego a esta vista por medio de <<historia clínica->examenes solicitados>> se muestran los botones  anterior, siguiente y linea de vida
									echo '<a href="" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-arrow-right"></span><span class="pageh-text-btn">Siguiente</span></a>
										<a href="" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-arrow-left"></span><span class="pageh-text-btn">Anterior</span></a>
										<a href="" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-warning-sign"></span><span class="pageh-text-btn">Llenar Línea de vida</span></a>'; 
									}else echo '<a id="print-down" onclick="imprimirEstudio();" class="btn btn-success btn-sm disabled"><span class="glyphicon glyphicon-print"></span><span class="pageh-text-btn">Imprimir</span></a>';
									//sino, se llego desde laboratorio por lo que es necesario mostrar boton para imprimir la informacion del examen y omitir los anteriores botones 
									?>
							</div>
							<form id="Examen_Solicitado" >
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										
										<div class="row form-group">
											<div class="col-xs-12 col-sm-4 col-md-6 col-lg-2">
												<label>Fecha:</label>
												<input type="text" class="form-control" value="<?php echo date("Y/m/d");?>" name="lab_fecha" disabled>
											</div>
										</div>
										<div class="row form-group">
										<?php if($botones)echo '<input id="" type="hidden" value="1" name="lab_tipo">' //si se llego desde Laboratorio->examenes
											//de laboratorio es necesario establecer que el tipo de examen es de laboratorio para diferenciarlo del tipo "Gabinete"?>
											<input id="exp_id" type="hidden" value="{{$expediente_id}}" name="expediente_id">
											<input type="hidden" value="<?php echo date("Y/m/d H:i:s");?>" name="lab_fecha">
										</div>
										<div class="row form-group">
											<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
												<label>Servicio:</label>
												<select class="form-control" name="serv_id">
													<option>Elija una opción</option>
													@foreach($catalogo_serv as $serv)
													<option>{{$serv}}</option>
													@endforeach
												</select>
											</div>
											<div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">
												<label>¿Urgente?:</label>
												<select class="form-control" name="lab_urgente">
													<option>Elija una opción</option>
													<option>Sí</option>
													<option>No</option>
												</select>
											</div>
											<div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
												<label>Diagnóstico:</label>
												<input type="text" class="form-control" name="lab_diagnostico" 	>
											</div>
										</div>

										<div class="row form-group">
											<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
												<label>Estudio solicitado:</label>
												<input type="text" class="form-control" name=lab_estudio >
											</div>
										</div>

									</div>

									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<label>Impresión diagnóstica:</label>
										<textarea class="form-control" rows="4" name="lab_impresion"></textarea><br><br>
									</div>
								</div>
							</form>

							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
										<div class="panel panel-info">
											<div class="panel-heading" role="tab" id="headingOne">
												<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Estudios solicitados <small>Consultas previas</small></a></h4>									
											</div>

											<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
												<div class="panel-body">

													<div class="row">
														<div class="col-xs-12 col-sm-12 col-md-4 col-lg-6">
															<div class="table-responsive">
																<table id="estudios" class="table table-striped table-hover table-condensed">
																	<thead>
																		<tr>
																			<th width="30px">Consulta</th>
																			<th width="30px">¿Urgente?</th>
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
													  	</div>
													  	<!--  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">-->
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
								<?php if($botones==3){
									echo '<a href="" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-arrow-left"></span><span class="pageh-text-btn">Anterior</span></a>
										<a href="" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-arrow-right"></span><span class="pageh-text-btn">Siguiente</span></a>
										<a href="" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-warning-sign"></span><span class="pageh-text-btn">Llenar Línea de vida</span></a>									';
								}else echo '<a id="print-down2" onclick="imprimirEstudio();" class="btn btn-success btn-sm disabled"><span class="glyphicon glyphicon-print"></span><span class="pageh-text-btn">Imprimir</span></a>';
								?>
								<button type="submit" class="btn btn-primary btn-sm" id="guarda_lab"><span class="glyphicon glyphicon-floppy-disk"></span><span class="pageh-text-btn">Guardar</span></button>
							</div>	
						</div>
					</div>
				</div>
		</div>
</div><!-- /Container -->
		<!-- Adaptar toda esta seccion a los estudios de gabinete. Falta crear las acciones necesarias del controlador. 
		Quiza se pueda reutilizar el modelo de examenes solicitados.-->
		{{ HTML::script('js/underscore-min.js'); }}


<script id="lista-estudios-paciente-template" type="text/html">
	<% _.each(estudios, function(e) { %>
		<tr valor-id="<%=e.lab_id%>" class="click">
			<td style="min-width: 60px;"><%= e.lab_fecha %></td>
			<td style="min-width: 30px;"><%=e.lab_urgente%></td>
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
			var proveniencia=<?php echo $botones?>;
			obtenerExamenesPasados(pageActual, proveniencia);
		
		
					$('#guarda_lab').click(function() {
				        var datos = $('#Examen_Solicitado').serialize();

				        $.ajax({
				            url: 'examen/guardalab',
				            type: 'POST',
				            data: datos,
				            success: function(respuesta) {
					            if(respuesta.proceso == true){
					            	showAlert("success", "Guardado correctamente");
					            	obtenerExamenesPasados(pageActual,proveniencia);
						        }
					            else{
					            	showAlert("error", "Fallo al guardar los datos");
						        }     	
				            }
				        });
				    });
		});

		function obtenerExamenesPasados(page, proveniencia){

			var expediente_id = $("#exp_id").val();
			//var proveniencia=
				
			$.ajax({
				type: "POST",
				cache: true,
				url: "examen/examenespasados",
				data: {page:page,byPage:5,expediente_id:expediente_id, caso:proveniencia},
				dataType: 'JSON'
			})
			.done(function(data){
				var template = $('#lista-estudios-paciente-template').html();
				if(data.estudios != null){
					$('#estudios tbody').html(_.template(template)({'estudios': data.estudios}));
					paginador(data.paginacion.page,data.paginacion.total);
					
				}else {
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
							$('#print-down,#print-down2').removeClass('disabled');
					
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