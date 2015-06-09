<form role="form" class="form-horizontal">

	<span class="help-block">Búsqueda de Enfermedades CIE-10</span><br>
		
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 col-md-3 col-lg-3">Código
			<span
			title="Si utiliza este campo, no escriba el nombre de la enfermedad."
			class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
		</label>
		<div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
			<input class="form-control input-sm" type="text" pattern="[A-Za-z]"
				id="codigo_id" name="codigo_id" maxlength="10" datatype="Int">
		</div>
	</div>
	
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-3 col-md-3 col-lg-3">Nombre de la Enfermedad <span
			title="Si utiliza este campo, no escriba el codigo de enfermedad."
			class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
		</label>
		<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
			<input class="form-control input-sm" type="text" pattern="[A-Za-z]"
				id="enf_nombre" name="enf_nombre" datatype="Char">
		</div>
		<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
			<button id="btn-search" class="btn btn-primary" type="button" >Buscar</button>
		</div>
	</div>


</form>
<div class="table-responsive">
	<table id="enfermedades-search"
		class="table table-condensed table-hover table-striped">
		<thead>
			<tr>
				<th>Clave</th>
				<th>Nombre de la enfermedad</th>
				<th>Con estúdio epidemiologico </th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
</div>
<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 nopad">
	<div id="paginator" class="left"></div>
</div> 
<script>

var pageActual = 1;
var totalPages = 1;

$(document).ready(OnSearchPaciente);
function OnSearchPaciente(){

	$('input[datatype="Char"]').on("keypress",{params:''},letra);
	$('#btn-search').click(function(){
		pageActual = 1;
		searchEnfermedad(pageActual);});
	//$('#btn-search').on("click", searchEnfermedad;
}
function elegirPaciente(id){
	medID = $('#medico').val();
	if(medID!="" && medID!=0 && medID!=null){
		swal({   
			title: "¿Estas Seguro?",   
			text: "El paciente se agregará a la lista de espera!",   
			type: "warning",   
			showCancelButton: true,   
			confirmButtonColor: "#DD6B55",   
			confirmButtonText: "Si, elegir!",
			cancelButtonText: "No, cancelar!",   
			closeOnConfirm: false 
		}, function(){
			$.getJSON('lista/elegirpaciente?id='+id+'&m='+medID, function(data){
				if(data.proceso){
					swal("Agregado!", "La lista de espera ha sido actualizada.", "success");
					//cerrarModal();
					//buscarPaciente();
					obtenerLista(pageActual);
					$('#modalAgrPaciente').modal('toggle');
				}else{
					swal("No Agregado!", "El paciente ya se encuentra en lista de espera.", "error");
				}
			},"html");

		});
	}else{
		showAlert("error", "Por favor seleccione el médico para asignar el paciente");
		$('#medico').addClass('mark-up-error');
	}
}
function searchEnfermedad(page){
	pageActual = page;
	enf_nombre = $('#enf_nombre').val().trim();
	codigo_id = $('#codigo_id').val().trim();
	data = "enf_nombre="+enf_nombre+"&codigo_id="+codigo_id+"&page="+pageActual+"&byPage=5";
	if(enf_nombre.length>2 || (codigo_id!="" && codigo_id!=0)){
		$.ajax({
			type: "GET",
			url: "impresion/buscarenfermedad",
			dataType: "json",
			data : data
				
		})
		.done(function(data){
			if(data!=null){
				var template = $('#lista-enfermedad-search-template').html();
				$('#enfermedades-search tbody').html(_.template(template)({'enf': data.request}));
				if(data.paginacion != null){
					paginador(data.paginacion.page,data.paginacion.total);
				}else{
					$('#enfermedades-search tbody').html("No hay coincidencias.");
					$('#paginator').html("");}
				//$('#pacientes-lista-search').slideDown();//ESTE ES PARA MOSTRAR LA LISTA QUE SE ENCUENTRA OCULTA, EN ESTE CASO YO YA ESTOY MOSTRANDO LA TABLA
			}else showAlert("error", "No hay resultados con este nombre o número de expediente");
		})
		.fail(function(data){
			showAlert("error", "Error desconocido");
		});
	}else{
		showAlert("error", "Escriba el codigo de enfermedad o nombre de la enfermedad mayor a 2 caracteres");
		$('#enf_nombre').addClass('mark-up-error');
		$('#codigo_id').addClass('mark-up-error');
	}
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
		searchEnfermedad(1);
	}
}
function lastPage(){
	if(pageActual!=totalPages){
		page = $('#page');
		page.val(totalPages);
		searchEnfermedad(totalPages);
	}
}
function nextPage(){
	page = $('#page');
	if(page.val()<totalPages){
		page.val(parseInt(page.val())+1);
		searchEnfermedad(page.val());	
	}
}
function prevPage(){
	page = $('#page');
	if(page.val()>1){
		page.val(parseInt(page.val())-1);
		searchEnfermedad(page.val());	
	}				
}

function elegirEnfermedad(enf_id , enf_codigo){

	var expediente_id = $("#expediente_id").val();
		
	swal({   
		title: "¿Estas Seguro?",   
		text: "La enfermedad se agregara a su historial como posible caso!",   
		type: "warning",   
		showCancelButton: true,   
		confirmButtonColor: "#DD6B55",   
		confirmButtonText: "Si, elegir!",
		cancelButtonText: "No, cancelar!",   
		closeOnConfirm: false 
	}, function(){
		$.getJSON('impresion/elegirenfermedad?expediente_id='+expediente_id+'&enf_id='+enf_id+'&enf_codigo='+enf_codigo, function(data){
			if(data.proceso){
				swal("Agregado!", "La lista de enfermedades ha sido actualizada.", "success");
				//cerrarModal();
				obtenerListaEnfermedades(1);
				mostrarEnfermedad();
				//obtenerLista(pageActual);//falta agregar la lista de enfermedades, aun no se cuenta con ella
				$('#modalAgrEnfermedad').modal('toggle');
			}else{
				swal("No Agregado!", "La enfermedad ya se encuentra en lista al día de hoy.", "error");
			}
		},"html");

	});
	
}


</script>