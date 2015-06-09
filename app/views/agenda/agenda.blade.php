@extends(Config::get('ECE.layout')) 

@section('content')
<!-- Container -->
<div class="alert-box-container"><div id="alert-box" class=""><p>Mensaje</p></div></div>
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="page-header nomargintop">
						<h4>Agenda médica</h4>
						<a href="" class="btn btn-primary btn-sm"><span
							class="glyphicon glyphicon-plus"></span><span
							class="pageh-text-btn">Agregar compromiso</span></a>
					</div>

					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
							<div class="page-header nomargintop">
								<h3 class="nomargintop">
									<small>Calendario</small>
								</h3>
							</div>

							<form class="form-horizontal" role="form">
								<div class="form-group">
									<label class="col-xs-12 col-sm-6 col-md-3 col-lg-2">Médico:</label>
									<div class="col-xs-12 col-sm-6 col-md-9 col-lg-10" id = "medico-action">
									@if(Session::get('usu_nivel') != 1)
									<input class="form-control" type="text" value="{{Session::get('usu_nombreUsuario')}}" readonly>
									<input id="medico" class="form-control" type="hidden" value="{{Session::get('usu_id')}}" name="medico">
									@else
									{{$field}}
									@endif
									</div>
								</div>
							</form>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<div id='calendar' style="width: 100%;"></div>
								</div>
							</div>
						</div>
						<!-- Inicia el modal de la captura de la cita -->
						<div class="modal fade" id="modalAgrPacienteCita">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
			
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="modal-title">Acciones Paciente</h4>
									</div>
			
									<div class="modal-body" >
										<div class="tab-content" >
											<div role="tabpanel" class="tab-pane active" id="nuevo">
												<div class="row">
													<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
														<div id="modal-container" class="background-modal-container">
															<div class="modal-container">
																<div class="modal-contenido">
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
						
						<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
							<div class="page-header nomargintop">
								<h3 class="nomargintop">
									<small>Detalles por día</small>
								</h3>
							</div>
							<div id = "detalleSeleccionado" >
								<div class="list-group">
									<a href="#" class="list-group-item active">14 de mayo de 2015</a>
									<a href="#" class="list-group-item"> <label>Paciente:</label> <span>Jose
											Candido Tun Nahuat</span><br> <label>Pendiente:</label> <span>Cita
											para revisión de pulmones</span><br> <label>Horario:</label> <span>10:30am</span>
									</a> <a href="#" class="list-group-item"> <label>Paciente:</label>
										<span>Armando Cisnero Campos</span><br> <label>Pendiente:</label>
										<span>Consulta de seguimiento para operación de rodilla</span><br>
										<label>Horario:</label> <span>12:00pm</span>
									</a> <a href="#" class="list-group-item"> <label>Paciente:</label>
										<span>Alejandra Aurora Esparza Iñiguez</span><br> <label>Pendiente:</label>
										<span>Consulta subsecuente de embarazo</span><br> <label>Horario:</label>
										<span>1:00pm</span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
<!-- /Container -->

@section('head') {{-- Libreria para
Select2 --}} 
{{ HTML::script('js/underscore-min.js'); }}
{{HTML::script('js/jquery.validate.min.js'); }} 
{{HTML::script('js/sweet-alert.min.js'); }} 
{{HTML::script('js/utilities.js'); }} 
{{HTML::style('css/sweetalert.min.css'); }} 

{{-- Libreria para Agenda --}}

{{HTML::script('js/jquery-ui.min.js'); }} 
{{HTML::script('js/fullcalendar/fullcalendar.min.js'); }}
{{HTML::style('css/fullcalendar/fullcalendar.min.css'); }}


<script id="lista-search-template" type="text/html">
	<% _.each(pac, function(p) { %>
		<tr>
			<td style="min-width: 120px;"><%= p.expediente_id %></td>
			<td style="min-width: 300px;"><%= p.nombrePaciente %></td>
			<td style="min-width: 110px;"><%= p.fecha_nacimiento %></td>
			<td style="width: 30px;"><button class="btn btn-xs btn-primary" title="Agregar" onclick="agendarPaciente('<%= p.expediente_id  %>');"><span
						class="glyphicon glyphicon-plus"></span></button></td>
		</tr>
	<% }); %>
</script>

<script type="text/javascript">
		$(document).on("click", closeDialog);
		$(document).on("keydown", closeDialogKey);
		$(document).ajaxStart(function() {
		        $('#stloading').show();
		});
		$(document).ajaxStop(function() {
		        $('#stloading').hide();
		});
		function closeDialog(event){
			var dialogBackground = $('.dialog-background');
		    var formDialog = $('.form-dialog');
		    var idClick = event.target.id;
		    if (dialogBackground.is(':visible') && (idClick == 'div-dialog-background' || idClick == 'btn-close-dialog')) {
		        dialogBackground.hide();
		        formDialog.hide();
		    }
		}
		function closeDialogKey(event){
			if(event.keyCode==27){
				var dialogBackground = $('.dialog-background');
		        var formDialog = $('.form-dialog');
		        var idClick = event.target.id;
		        if (dialogBackground.is(':visible') && (idClick == 'div-dialog-background' || idClick == 'btn-close-dialog')) {
		            dialogBackground.hide();
		            formDialog.hide();
		        }
			}
		}
		function closeDialogAfterDelete()
		{
			$('.dialog-background, .form-dialog').hide();
		}
</script>

<script>
		var calendar;
		$(document).ready(function() {

		var medico_id = $("#medico").val();	
			
		$('#item-agenda-selected').addClass("box-item-menu-selected");
		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();

		var mes = (((m<9)?'0':'')+(m+1));
		
		var hoy =  y+"-"+ mes +"-"+d;
		selecionCita(0, hoy,medico_id);



		//CUANDO SEA SELECT OPTION TENDRA ESTE EVENT LISTENER
		$("#medico").change(function(){

			$('#calendar').html('');
			medico_id = $("#medico").val();	
			mostrarCalendario();
			selecionCita(0, hoy,medico_id);

		});

		
		mostrarCalendario();


		
		function mostrarCalendario(){
		
			calendar = $('#calendar').fullCalendar({
				header: {
					left: 'prev,next today',
					center: 'title',
					right: 'month,agendaWeek,agendaDay'
				},
				allDayDefault: false,
				selectable: true,
				selectHelper: true,
				select: function(start,end, allDay) {
					nuevaCita(start,end,allDay,medico_id);
				},
				editable: true,
				events: urlRoot+'/agenda/listadoagenda?medico_id='+medico_id,//Hace falta agregar que el filtro sea cuando seleccionen al doctor en el select option
				eventDrop: function(event, dayDelta, minuteDelta, allDay, revertFunc) {
					//alert(event.title + ' was moved ' + dayDelta + ' days\n' + '(should probably update your database)');
	
					swal({   
						title: "¿Desea cambiar la fecha de la cita del paciente?",   
						text: "Se cambiara la cita del paciente",   
						type: "warning",   
						showCancelButton: true,   
						confirmButtonColor: "#DD6B55",   
						confirmButtonText: "Si, Realizar el cambio!",
						cancelButtonText: "No, cancelar!",   
						closeOnConfirm: true,
						allowEscapeKey: false
					}, function(response){
							
						 	if(response == true){
							 	id = event.id;
								inicio = event.start;
								fin = event.end;
								url = urlRoot+'/agenda/actualizacita'
								dia = ((inicio.getDate()<10)?'0':'')+inicio.getDate();
								mes = (((inicio.getMonth()<9)?'0':'')+(inicio.getMonth()+1));
								aa = inicio.getFullYear();
								fechaInicio = aa+"-"+mes+"-"+dia;
								dia = ((fin.getDate()<10)?'0':'')+fin.getDate();
								mes = (((fin.getMonth()<9)?'0':'')+(fin.getMonth()+1));
								aa = fin.getFullYear();
								fechaFin = aa+"-"+mes+"-"+dia;
		
								horaInicio = ((inicio.getHours()<10)?'0':'')+inicio.getHours()+":"+((inicio.getMinutes()<10)?'0':'')+inicio.getMinutes()+":00";
								horaFin = ((fin.getHours()<10)?'0':'')+fin.getHours()+":"+((fin.getMinutes()<10)?'0':'')+fin.getMinutes()+":00";
								$.ajax({
									type: 'POST',
									url: url,
									dataType: 'json',
									data: {agenda_id : id, agenda_fecha_inicio:fechaInicio,agenda_fecha_fin:fechaFin,agenda_horaInicio:horaInicio,agenda_horafin:horaFin},
									success: function(response){
										if (response.IsValid == 'false'){
											showAlert("error", "Error al actualizar la cita del paciente.");
										}
										else{
											showAlert("success", "Se ha actualizado la cita.");
											closeDialogAfterDelete();
											addCita(response.data,false,response.title,response.start,response.end);
										}
									},
									error: function(data){
										showAlert("error", "Hubo un error, favor de contactar al administrador del sistema.");
									}
								});
						 }else{
							 revertFunc();
						 }
					});
				},
				eventResize: function(event, dayDelta, minuteDelta, revertFunc) {
	
					//alert(event.title + ' was moved ' + dayDelta + ' days\n' + '(should probably update your database)'+ event.start + " - "+ event.end);
					swal({   
						title: "¿Desea cambiar la fecha de la cita del paciente?",   
						text: "Se cambiara la cita del paciente",   
						type: "warning",   
						showCancelButton: true,   
						confirmButtonColor: "#DD6B55",   
						confirmButtonText: "Si, Realizar el cambio!",
						cancelButtonText: "No, cancelar!",   
						closeOnConfirm: true,
						allowEscapeKey: false
					}, function(response){
							
						 	if(response == true){
							 	id = event.id;
								inicio = event.start;
								fin = event.end;
								url = urlRoot+'/agenda/actualizacita'
								dia = ((inicio.getDate()<10)?'0':'')+inicio.getDate();
								mes = (((inicio.getMonth()<9)?'0':'')+(inicio.getMonth()+1));
								aa = inicio.getFullYear();
								fechaInicio = aa+"-"+mes+"-"+dia;
								dia = ((fin.getDate()<10)?'0':'')+fin.getDate();
								mes = (((fin.getMonth()<9)?'0':'')+(fin.getMonth()+1));
								aa = fin.getFullYear();
								fechaFin = aa+"-"+mes+"-"+dia;
		
								horaInicio = ((inicio.getHours()<10)?'0':'')+inicio.getHours()+":"+((inicio.getMinutes()<10)?'0':'')+inicio.getMinutes()+":00";
								horaFin = ((fin.getHours()<10)?'0':'')+fin.getHours()+":"+((fin.getMinutes()<10)?'0':'')+fin.getMinutes()+":00";
								$.ajax({
									type: 'POST',
									url: url,
									dataType: 'json',
									data: {agenda_id : id, agenda_fecha_inicio:fechaInicio,agenda_fecha_fin:fechaFin,agenda_horaInicio:horaInicio,agenda_horafin:horaFin},
									success: function(response){
										if (response.IsValid == 'false'){
											showAlert("error", "Error al actualizar la cita del paciente.");
										}
										else{
											showAlert("success", "Se ha actualizado la cita.");
											closeDialogAfterDelete();
											addCita(response.data,false,response.title,response.start,response.end);
										}
									},
									error: function(data){
										showAlert("error", "Hubo un error, favor de contactar al administrador del sistema.");
									}
								});
						 }else{
							 revertFunc();
						 }
					});
				},
				eventClick: function(event, element) {
	
					inicio = event.start;
					dia = ((inicio.getDate()<10)?'0':'')+inicio.getDate();
					mes = (((inicio.getMonth()<9)?'0':'')+(inicio.getMonth()+1));
					aa = inicio.getFullYear();
					fechaInicio = aa+"-"+mes+"-"+dia;
					
					selecionCita(event.id,fechaInicio,medico_id);
					//editarCita(event.id,event.start,event.end);
			    },
				loading: function(bool) {
					if (bool) $('#stloading').show();
					else $('#stloading').hide();
				}
			});
		}
		});
		function nuevaCita(inicio,fin,allDay,medico_id)
		{
		dia = ((inicio.getDate()<10)?'0':'')+inicio.getDate();
		mes = (((inicio.getMonth()<9)?'0':'')+(inicio.getMonth()+1));
		aa = inicio.getFullYear();
		fechaInicio = aa+"-"+mes+"-"+dia;
		dia = ((fin.getDate()<10)?'0':'')+fin.getDate();
		mes = (((fin.getMonth()<9)?'0':'')+(fin.getMonth()+1));
		aa = fin.getFullYear();
		fechaFin = aa+"-"+mes+"-"+dia;

		$("#modalAgrPacienteCita").modal('toggle');
		
		//$('#myModal').modal('toggle');
		//$('#myModal').modal('show');
		//$('#myModal').modal('hide');
		
		horaInicio = ((inicio.getHours()<10)?'0':'')+inicio.getHours()+":"+((inicio.getMinutes()<10)?'0':'')+inicio.getMinutes()+":00";
		horaFin = ((fin.getHours()<10)?'0':'')+fin.getHours()+":"+((fin.getMinutes()<10)?'0':'')+fin.getMinutes()+":00";
		if(horaFin=="00:00:00"){ horaFin = "23:59:59";allDay = true;}else{allDay = false;}
		var data = {
				fechaInicio : fechaInicio,
				fechaFin :fechaFin,
				horaInicio :horaInicio,
				horaFin : horaFin,
				allDay :allDay,
				medico_id : medico_id
				};
		buscarPaciente(data);//ABRE EL MODAL PARA SELECCIONAR AL PACIENTE PARA AGENDAR CITA
		selecionCita(0, fechaInicio,medico_id);//ABRE EL DETALLE DE CITAS GENERAL.
		//SE LE ENVIA COMO PARAMETRO 0 PARA PODER OBTENER EL DETALLE LA FECHA EN ESPECIFICO.

		
		}

		function selecionCita(id,fechainicio,medico_id){
		
		$.ajax({
			type: "POST",
			cache: true,
			url: urlRoot+'/agenda/detallepacienteagenda',
			data : {id:id,fecha_inicio : fechainicio , medico_id : medico_id},
			dataType: 'HTML'
		})
		.done(function(data){
			$('#detalleSeleccionado').html(data);
		})
		.fail(function(data){
			showAlert("error", "Error desconocido: "+data);
		});
		}

		function addCita(id,allDay,title,start,end,color){
		calendar.fullCalendar('renderEvent',{
				id: id,
				title: title,
				allDay: allDay,
				start: start,
				end: end,
				color: color
			},
			true // make the event "stick"
		);
		calendar.fullCalendar('unselect');
		}
		function updateCita(evento){
		calendar.fullCalendar('removeEvents', evento.id);
		calendar.fullCalendar('renderEvent', evento);
		calendar.fullCalendar('unselect');
		}

		function rezise(layer, container, data){
		container.empty().hide().html(data);
		ancho = (container.outerWidth()/2)*-1;
		alto = (container.outerHeight()/2)*-1;
		css = {'margin-left': ancho, 'margin-top':alto};
		layer.show();
		container.css(css).fadeIn();
		return css;
		}

		function buscarPaciente(arrayAgenda){

			$.ajax({
				type: "GET",
				cache: true,
				url: urlRoot+'/agenda/searchpacientemodal',
				dataType: 'HTML'
			})
			.done(function(data){

				$('.modal-contenido').html(data);
				$('#modal-container').fadeIn();

				$('.agenda_fecha_inicio').val(arrayAgenda.fechaInicio);
				$('.agenda_fecha_fin').val(arrayAgenda.fechaFin);
				$('.agenda_hora_inicio').val(arrayAgenda.horaInicio);
				$('.agenda_hora_fin').val(arrayAgenda.horaFin);
				$('#medico_id').val(arrayAgenda.medico_id);
				//$('.agenda_todo_el_dia').val(arrayAgenda.allDay);
				//$('.all-day-option').hide();

				$('.agenda_todo_el_dia').click(function(){

					var allDate = $('.agenda_todo_el_dia').is(':checked');
						if(allDate ){
							$('.agenda_todo_el_dia').val(true);
							
							$('.agenda_hora_inicio').attr('readonly',true);
							$('.agenda_hora_fin').attr('readonly',true);
						}else{
							$('.agenda_todo_el_dia').val(false);
							
							$('.agenda_hora_inicio').attr('readonly',false);
							$('.agenda_hora_fin').attr('readonly',false);
						}		
				});
				
			})
			.fail(function(data){
				showAlert("error", "Error desconocido: "+data);
			});
		}

		function agendarPaciente(expediente_id){

			frm = $('#form-agenda').serialize();
			$.ajax({
				type: "POST",
				cache: true,
				url: urlRoot+'/agenda/crearcita',
				dataType: 'json',
				data : frm +'&expediente_id='+expediente_id
			})
			.done(function(data){

				if(data.proceso == true){
				showAlert("success", "Se ha creado la cita.");
				$('#modalAgrPacienteCita').modal('toggle');
				//addCita(id,allDay,title,start,end,color)
					addCita(data.calendar.id,data.calendar.allDay,data.calendar.title,data.calendar.start,data.calendar.end);
				}else{
				showAlert("success", "El paciente ya tiene cita en la fecha y hora seleccionada.");
				}
			})
			.fail(function(data){
				showAlert("error", "Error desconocido: "+data);
			});
		}
			
		
</script>
@stop