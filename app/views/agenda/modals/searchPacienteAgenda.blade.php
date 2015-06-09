<form id = "form-agenda" role="form" class="form-horizontal">

	<span class="help-block">Agendar paciente con Expediente
		Electrónico</span><br>
		
    <div class="form-group hide">
		<label for="medico"
			class="control-label col-xs-12 col-sm-3 col-md-3 col-lg-3">Médico que
			le atenderá</label>
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<input type = "hidden" id="medico_id" name="medico_id" class = "medico_id"/>
		</div>
	</div>	
	
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 col-md-3 col-lg-3">Expediente
			<span
			title="Si utiliza este campo, no escriba el nombre ni apellidos."
			class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
		</label>
		<div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
			<input class="form-control input-sm" type="text" pattern="[A-Za-z]"
				id="nexpediente" name="nexpediente" maxlength="10" datatype="Int">
		</div>
	</div>
	
	<div class="form-group">
		<label class="control-label col-xs-6 col-sm-4 col-md-4 col-lg-4">Apellido
			P. | Apellido M. | Nombres <span
			title="Si utiliza este campo, no escriba el expediente."
			class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
		</label>
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<input class="form-control input-sm" type="text" pattern="[A-Za-z]"
				id="nombre" name="nombre" datatype="Char">
		</div>
	</div>
	
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 col-md-3 col-lg-2">Fecha Inicio</label>
		<div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
			<input class="form-control input-sm agenda_fecha_inicio" type="text" 
				id="agenda_fecha_inicio" name="agenda_fecha_inicio" maxlength="10"  readonly>
		</div>
		<label class="control-label col-xs-12 col-sm-3 col-md-3 col-lg-2">Fecha Fin</label>
		<div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
			<input class="form-control input-sm agenda_fecha_fin" type="text" pattern="[A-Za-z]"
				id="agenda_fecha_fin" name="agenda_fecha_fin" maxlength="10"  readonly>
		</div>
	</div>
	<div class="form-group all-day-option">
		<label class="control-label col-xs-12 col-sm-3 col-md-3 col-lg-2">Todo el día</label>
		<div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
			<input class="form-control input-sm agenda_todo_el_dia" type="checkbox" 
				id="agenda_todo_el_dia" name="agenda_todo_el_dia" maxlength="10" checked>
		</div>
		
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 col-md-3 col-lg-2">Hora Inicio</label>
		<div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
			<input class="form-control input-sm agenda_hora_inicio" type="text" 
				id="agenda_hora_inicio" name="agenda_hora_inicio" maxlength="10" datatype="Int" readonly>
		</div>
		<label class="control-label col-xs-12 col-sm-3 col-md-3 col-lg-2">Hora Fin</label>
		<div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
			<input class="form-control input-sm agenda_hora_fin" type="text"
				id="agenda_hora_fin" name="agenda_hora_fin" maxlength="10" readonly>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 col-md-3 col-lg-2">Asunto de la Cita</label>
		<div class="col-xs-12 col-sm-6 col-md-2 col-lg-8">
			<textarea class="form-control input-sm agenda_asunto" type="text" id="agenda_asunto" name="agenda_asunto" rows = "3" cols = "15"></textarea>	
		</div>
	</div>

	<div class="form-group">
		<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
			<button id="btn-search" class="btn btn-primary" type="button" >Buscar Paciente</button>
		</div>
	</div>
</form>
<div class="table-responsive">
	<table id="pacientes-search"
		class="table table-condensed table-hover table-striped">
		<thead>
			<tr>
				<th>Exp.</th>
				<th>Nombre</th>
				<th>Nacimiento</th>
				<th>Seleccionar</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
</div>
<script>
$(document).ready(OnSearchPaciente);
function OnSearchPaciente(){
	/*$.getJSON(urlRoot+'/lista/medicoslista',function(data){
		tam = data.lista.length;
		if(data.nivel==3)
			$('#medico').append(new Option("[-- Seleccionar --]",0,true,false));
		for(i=0;i<tam;i++){
			if(data.lista[i].especialidad==null)especialidad=""; else especialidad = " "+data.lista[i].especialidad+"  |  ";
        	$('#medico').append(new Option(especialidad+data.lista[i].usu_nombreUsuario,data.lista[i].usu_id,true,false));
    	}
	});*/
	$('input[datatype="Int"]').on("keypress",{params:''},numero);
	$('input[datatype="Char"]').on("keypress",{params:''},letra);
	$('#btn-search').on("click", searchPaciente);
}

function searchPaciente(event){
	nombre = $('#nombre').val().trim();
	exp = $('#nexpediente').val().trim();
	data = "exp="+exp+"&s="+nombre;
	if(nombre.length>3 || (exp!="" && exp!=0)){
		$.ajax({
			type: "GET",
			url: urlRoot+'/lista/buscarpaciente',
			dataType: "json",
			data : data
				
		})
		.done(function(data){
			if(data!=null){
				var template = $('#lista-search-template').html();
				$('#pacientes-search tbody').html(_.template(template)({'pac': data}));
				$('#pacientes-lista-search').slideDown();
			}else showAlert("error", "No hay resultados con este nombre o número de expediente");
		})
		.fail(function(data){
			showAlert("error", "Error desconocido");
		});
	}else{
		showAlert("error", "Escriba el número de expediente o nombre empezando por el Apellido Paterno mayor a 2 caracteres");
		$('#nombre').addClass('mark-up-error');
		$('#nexpediente').addClass('mark-up-error');
	}
}
</script>