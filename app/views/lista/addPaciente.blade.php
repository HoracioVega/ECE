<form role="form" class="form-horizontal" id="form-add-paciente"
	name="form-add-paciente" action="" enctype="multipart/form-data">
	<span class="help-block">Registro de pacientes sin Expediente
		Electrónico</span><br>
	<div class="form-group">
		<label for="nombre"
			class="control-label col-xs-12 col-sm-3 col-md-3 col-lg-3">Nombre</label>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<input class="form-control input-sm" type="text" id="nombre"
				name="nombre" datatype="Char">
		</div>
	</div>
	<div class="form-group">
		<label for="primer_apellido"
			class="control-label col-xs-12 col-sm-3 col-md-3 col-lg-3">Ap.
			Paterno</label>
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<input class="form-control input-sm" type="text" id="primer_apellido"
				name="primer_apellido" datatype="Char">
		</div>
	</div>

	<div class="form-group">
		<label for="segundo_apellido"
			class="control-label col-xs-12 col-sm-3 col-md-3 col-lg-3">Ap.
			Materno</label>
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<input class="form-control input-sm" type="text"
				id="segundo_apellido" name="segundo_apellido" datatype="Char">
		</div>
	</div>

	<div class="form-group">
		<label for="fecha_nacimiento"
			class="control-label col-xs-12 col-sm-3 col-md-3 col-lg-3">Fecha de
			Nacimiento</label>
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<input class="form-control input-sm fecha_nacimiento" type="text"
				id="fecha_nacimiento" name="fecha_nacimiento">
		</div>
	</div>

	<div class="form-group">
		<label for="medico"
			class="control-label col-xs-12 col-sm-3 col-md-3 col-lg-3">Médico que
			le atenderá</label>
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
			<select id="medico" name="medico"></select>
		</div>
	</div>

	<div class="text-right">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		<button id="btn-save" class="btn btn-primary" type="button">Guardar</button>
	</div>
</form>
<script>

$(document).ready(OnCreateCliente);

function OnCreateCliente(){
	var now = new Date();
	var yr = now.getFullYear();
	$('input[datatype="Char"]').on("keypress",{params:''},letra);
	$('input[datatype="Char"]').on("blur",{params:''},upperCase);
    $('.fecha_nacimiento').datetimepicker({
		format: 'd/m/Y',lang: 'es',timepicker: false,
		yearStart: 1900,yearEnd: yr,mask:true,closeOnDateSelect:true
	});
	formRules = {
		'nombre': {required:true, accept: "[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ\\s]*"},
		'primer_apellido': {required:true, accept: "[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ\\s]*"},
		'segundo_apellido': {required:true, accept: "[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ\\s]*"},
		'fecha_nacimiento': {required:true},
		'medico': {required:true,medico:true}
	};
	formMessages = {
		'nombre': {required:'El nombre es requerido', accept: "El campo nombre solo acepta letras"},
		'primer_apellido': {required:'El primer apellido es requerido', accept: "El campo primer apellido solo acepta letras"},
		'segundo_apellido': {required:'El segundo apellido es requerido', accept: "El campo segundo apellido solo acepta letras"},
		'fecha_nacimiento': {required:'La fecha de nacimiento es requerida'},
		'medico': {required:'Seleccione el médico para asignar paciente',medico:'Seleccione el medico para asignar paciente'},
	};
	url = "lista/addpaciente";
	options = {
		'url':url,
		'type':'POST',
		'datatype':'json'
	};
	
	$.getJSON("lista/medicoslista",function(data){
		tam = data.lista.length;
		if(data.nivel==3)
			$('#medico').append(new Option("[-- Seleccionar --]",0,true,false));
		for(i=0;i<tam;i++){
			if(data.lista[i].especialidad==null)especialidad=""; else especialidad = " "+data.lista[i].especialidad+"  |  ";
        	$('#medico').append(new Option(especialidad+data.lista[i].usu_nombreUsuario,data.lista[i].usu_id,true,false));
    	}
	});
	frm = $('#form-add-paciente');
	validateForm(frm, formRules, formMessages);
	$('#btn-save').on("click", {params:options, form:frm}, savePaciente);
}

function savePaciente(event){
	
	if($('#fecha_nacimiento').val()=="__/__/____"){
		 showAlert("error", "Proporcione la fecha de nacimiento");
		 $('#fecha_nacimiento').addClass('mark-up-error');
	}else{
		flag = true;
		console.log(event.data.form);
		if ($(event.data.form).valid()){
			$.ajax({
				type: event.data.params.type,
				url: event.data.params.url,
				data: event.data.form.serialize(),
				dataType: event.data.params.datatype
			})
			.done(function(data){
				if (data.proceso == false){
					showAlert("error", "No se pudo agregar paciente");
				}else{
					showAlert("success", "Paciente agregado correctamente");
					//cerrarModal();
					addPaciente();// Se agrega para limpiar los campos
             		obtenerLista(pageActual);
             		$('#modalAgrPaciente').modal('toggle');
				}
			})
			.fail(function(data){
				showAlert("error", "Error desconocido");
			});
		}
		flag = false;
	}
}	

</script>