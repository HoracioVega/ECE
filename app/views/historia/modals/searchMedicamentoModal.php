<form role="form" class="form-horizontal">
	<span class="help-block">Búsqueda de Medicamentos por nombre o clave</span><br>
	
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-2 col-md-2 col-lg-2">Buscar por:</label>
		<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
			<select name="buscar_por" class="form-control" id="buscar_por">
				<option value="nombre">Nombre</option>
				<option value="clave">Clave</option>
			</select>
		</div>
	</div>
	
	<div class="form-group">
		<label class="control-label col-xs-12 col-sm-4 col-md-4 col-lg-4">Nombre/Clave del medicamento <span
			title="Ingrese el nombre del medicamento o la clave del mismo si la conoce."
			class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
		</label>
		<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
			<input class="form-control input-sm" type="text" id="med_nombre" name="med_nombre" onkeypress="return event.keyCode!=13">
		</div>
		<div class="col-xs-12 col-sm-1 col-md-1 col-lg-1"></div>
		<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
			<a id="btn-search" class="btn btn-primary">Buscar</a>
		</div>
	</div>
</form>

<div class="table-responsive">
	<table id="medicamentos-search"
		class="table table-condensed table-hover table-striped">
		<thead>
			<tr>
				<th>Clave</th>
				<th>Nombre</th>
				<th>Descripción</th>
				<th>Cantidad</th>
				<th>Presentación</th>
			</tr>
		</thead>
		<tbody id="body-table">
		</tbody>
	</table>
</div>
<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 nopad">
	<div id="paginator-modal-med" class="left"></div>
</div>

<script>

var pageActual = 1;
var totalPages = 1;

// OBTENER LOS MEDICAMENTOS CON PAGINATOR
function getMedicamentos(page) {
	pageActual = page;
	var buscarPor = $('#buscar_por').val();
	var medicamento = $('#med_nombre').val();
	var tableHTML = "";
	var data = 'buscarpor='+buscarPor+'&medicamento='+medicamento+"&page="+pageActual+"&byPage=5";

	$.ajax({
		type: 'get',
		url: 'terapeutica/searchmedicamentos',
		data: data,
		dataType: 'json',
		success: function(data) {
			if(data!=null){				
				$.each(data.request, function(i, obj) {
					tableHTML += "<tr>";
					tableHTML += "<td><a onclick='putMedicamentoInForm("+parseInt(obj.clave, 10)+");'>"+obj.clave+"</a></td>";
					tableHTML += "<td>"+obj.nombre_gen+"</td>";
					tableHTML += "<td>"+obj.descripcion_m+"</td>";
					tableHTML += "<td>"+obj.cantidad_m+"</td>";
					tableHTML += "<td>"+obj.presentacion+"</td>";
					tableHTML += "</tr>";
				});
				$('#body-table').html(tableHTML);
				
				if(data.paginacion != null){
					paginador_modal_med(data.paginacion.page,data.paginacion.total);
				}else{
					$('#paginator-modal-med').html("");}
			}else showAlert("error", "No hay resultados con ese nombre o clave");
		},
		error: function() {showAlert("error", "Error desconocido");}
	});
	
}
function paginador_modal_med(page,total){
	pageActual = page;
	totalPages = total;
	if(pageActual==1) first = "disabled"; else first = "";
	if(pageActual==totalPages) last = "disabled"; else last = "";
	html = '<button type="button" class="btn first '+first+'" onclick="firstPage_modal_med();"><span class = "glyphicon glyphicon-step-backward"></span></a></button> ';
	html += '<button type="button" class="btn prev '+first+'" onclick="prevPage_modal_med();"><span class = "glyphicon glyphicon-fast-backward"></span></button> ';
	html += '<span class="pagedisplay"> '
	html += 'Página <input type="text" id="page_modal_med" name="page_modal_med" style="width: 20px;" value="'+ page +'" /> ';
	html += 'de <input type="text" id="totalpage_modal_med" name="totalpage_modal_med" style="width: 20px;" value="'+total+'" /> ';
	html += '</span> <!-- this can be any element, including an input -->';
	html += '<button type="button" class="btn next '+last+'" onclick="nextPage_modal_med();"><span class = " glyphicon glyphicon-fast-forward"></span></button> ';
	html += '<button type="button" class="btn last '+last+'" onclick="lastPage_modal_med();"><span class = "glyphicon glyphicon-step-forward"></span></button>';
	$('#paginator-modal-med').html(html);
}
function firstPage_modal_med(){
	if(pageActual!=1){
		page = $('#page_modal_med');
		page.val(1);
		getMedicamentos(1);
	}
}
function lastPage_modal_med(){
	if(pageActual!=totalPages){
		page = $('#page_modal_med');
		page.val(totalPages);
		getMedicamentos(totalPages);
	}
}
function nextPage_modal_med(){
	page = $('#page_modal_med');
	if(page.val()<totalPages){
		page.val(parseInt(page.val())+1);
		getMedicamentos(page.val());	
	}
}
function prevPage_modal_med(){
	page = $('#page_modal_med');
	if(page.val()>1){
		page.val(parseInt(page.val())-1);
		getMedicamentos(page.val());	
	}				
}

function putMedicamentoInForm(cveMedicamento) {

	var cve = cveMedicamento.toString();
	if (cve.length == 1) {
		cve = "000"+cve;
	} else if (cve.length == 2) {
		cve = "00"+cve;
	} else if (cve.length == 3) {
		cve = "0"+cve;
	}
	var data = 'buscarpor=clave'+'&medicamento='+cve;
	
	$.ajax({
		type: 'post',
		url: 'terapeutica/searchmedicamentos',
		data: data,
		dataType: 'json',
		success: function(data) {
			$('#med_cve').val(data[0].clave);
			$('#med_area').val(data[0].area);
			$('#med_nom').val(data[0].nombre_gen);
			$('#med_pres').html(data[0].presentacion);
			$('#med_pres').val(data[0].presentacion);
			$('#modal-medicamento').modal('hide');
		},
		error: function() {}
	});
}

$(document).ready(function() {
	// PAGINADOR
	$('#btn-search').click(function(){
		pageActual = 1;
		getMedicamentos(pageActual);});
	// FIN PAGINADOR
});
</script>