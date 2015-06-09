<div class="alert-box-container"><div id="alert-box" class=""><p>Mensaje</p></div></div>
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="page-header nomargintop">
						<h4>Antecendentes Ginecobstétricos</h4>
						<a href="#" class="btn btn-primary btn-sm save-gineco" data="0"><span class="glyphicon glyphicon-floppy-disk"></span><span class="pageh-text-btn">Guardar</span></a>
						<a href="#" class="btn btn-primary btn-sm save-gineco" data="3"><span class="glyphicon glyphicon-arrow-right"></span><span class="pageh-text-btn">Siguiente</span></a>
						<a href="#" class="btn btn-primary btn-sm save-gineco" data="2"><span class="glyphicon glyphicon-arrow-left"></span><span class="pageh-text-btn">Anterior</span></a>
						<a href="#" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-warning-sign"></span><span class="pageh-text-btn">Llenar Línea de vida</span></a>
					</div>

					<form id="gineco-form">
						<div class="row">
							<div class="col-xs-6 col-sm-3 col-md-2 col-lg-2 form-group">
								<label>Menarca:</label>
								<input type="text" class="form-control fecha" id="gineco_menarcaFecha" name="gineco_menarcaFecha"
									value="{{date('d-m-Y', strtotime($gineco[0]->gineco_menarcaFecha))}}">
							</div>	
							<div class="col-xs-6 col-sm-3 col-md-2 col-lg-2 form-group">
								<label>Tipo de menarca:</label>
								<select id="gineco_tipoMenarca" name="gineco_tipoMenarca" class="form-control">
									<option value="99">Seleccionar una opción</option>
									<option @if ($gineco[0]->gineco_tipoMenarca=='Regular') selected="selected" @endif value="Regular">Regular</option>
									<option @if ($gineco[0]->gineco_tipoMenarca=='Irregular') selected="selected" @endif value="Irregular">Irregular</option>
								</select>
							</div>
							<div class="col-xs-6 col-sm-3 col-md-2 col-lg-2 form-group">
								<label>Ritmo:</label>
								<input id="gineco_ritmo" name="gineco_ritmo" type="text" class="form-control" value="{{$gineco[0]->gineco_ritmo}}">
							</div>
							<div class="col-xs-6 col-sm-3 col-md-2 col-lg-2 form-group">
								<label>Edad de inicio vida sexual:</label>
								<div class="input-group">
									<input id="gineco_inicioSexual" name="gineco_inicioSexual" type="text" class="form-control" value="{{$gineco[0]->gineco_inicioSexual}}">
									<span class="input-group-addon">años</span>
								</div>
							</div>
							<div class="col-xs-6 col-sm-3 col-md-2 col-lg-2 form-group">
								<label>Multiples parejas sexuales:</label>
								<select name="gineco_multiplePareja" id="gineco_multiplePareja" class="form-control">
									<option>Seleccionar una opción</option>
									<option @if ($gineco[0]->gineco_multiplePareja=='NO') selected="selected" @endif value="NO">No</option>
									<option @if ($gineco[0]->gineco_multiplePareja=='SI') selected="selected" @endif value="SI">Si</option>
								</select>										
							</div>									
						</div>
							
						<div class="row">
							<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 form-group">
								<label>Examen de mamas:</label>
								<input id="gineco_examenMamas" name="gineco_examenMamas" type="text" class="form-control fecha"
									value="{{date('d-m-Y', strtotime($gineco[0]->gineco_examenMamas))}}">
							</div>
							<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 form-group">
								<label>Fecha último papanicolaou:</label>
								<input id="gineco_papanicoFecha" name="gineco_papanicoFecha" type="text" class="form-control fecha"
									value="{{date('d-m-Y', strtotime($gineco[0]->gineco_papanicoFecha))}}">
							</div>
							<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 form-group">
								<label>Fecha última menstruación:</label>
								<input id="gineco_mestruacionFecha" name="gineco_mestruacionFecha" type="text" class="form-control fecha"
									value="{{date('d-m-Y', strtotime($gineco[0]->gineco_mestruacionFecha))}}">
							</div>
							<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 form-group">
								<label>Fecha uso anti-conceptivo:</label>
								<input id="gineco_anticoncepFecha" name="gineco_anticoncepFecha" type="text" class="form-control fecha"
									value="{{date('d-m-Y', strtotime($gineco[0]->gineco_anticoncepFecha))}}">
							</div>
						</div>

						<div class="row">
							<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 form-group">
								<label>Gestas:</label>
								<input id="gineco_gesta" name="gineco_gesta" type="text" class="form-control" value="{{$gineco[0]->gineco_gesta}}">
							</div>
							<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 form-group">
								<label>Cesareas:</label>
								<input id="gineco_cesarea" name="gineco_cesarea" type="text" class="form-control" value="{{$gineco[0]->gineco_cesarea}}">
							</div>
							<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 form-group">
								<label>Para:</label>
								<input id="gineco_para" name="gineco_para" type="text" class="form-control" value="{{$gineco[0]->gineco_para}}">
							</div>
							<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 form-group">
								<label>Aborto:</label>
								<input id="gineco_aborto" name="gineco_aborto" type="text" class="form-control" value="{{$gineco[0]->gineco_aborto}}">
							</div>
						</div>

						<div class="row">
							<div class="col-xs-6 col-sm-3 col-md-2 col-lg-2 form-group">
								<label>Metodo anticonceptivo:</label>
								<select id="metodo_id" name="metodo_id" class="form-control">
									<option>Seleccionar una opción</option>
									@foreach ($metodos as $metodo)
									<option @if ($gineco[0]->metodo_id==$metodo->metodo_id) selected="selected" @endif value="{{$metodo->metodo_id}}">{{$metodo->metodo_nomMetodo}}</option>
									@endforeach
								</select>
							</div>
							<div class="col-xs-6 col-sm-3 col-md-2 col-lg-2 form-group">
								<label>Toxemia Gravídica:</label>
								<input id="gineco_toxemia" name="gineco_toxemia" type="text" class="form-control" value="{{$gineco[0]->gineco_toxemia}}">
							</div>
							<div class="col-xs-6 col-sm-3 col-md-2 col-lg-2 form-group">
								<label>Fecha del último evento obstétrico:</label>
								<input id="gineco_eventoObsFecha" name="gineco_eventoObsFecha" type="text" class="form-control fecha"
									value="{{date('d-m-Y', strtotime($gineco[0]->gineco_eventoObsFecha))}}">
							</div>
							<input type="hidden" value="{{Input::get('exp_id')}}" name="expediente_id" id="expediente_id">
						</div>
					</form>

					<div class="btns-form-ad">
						<a href="#" class="btn btn-primary btn-sm save-gineco" data="2"><span class="glyphicon glyphicon-arrow-left"></span><span class="pageh-text-btn">Anterior</span></a>
						<a href="#" class="btn btn-primary btn-sm save-gineco" data="3"><span class="glyphicon glyphicon-arrow-right"></span><span class="pageh-text-btn">Siguiente</span></a>
						<button type="submit" class="btn btn-primary btn-sm save-gineco" data="0"><span class="glyphicon glyphicon-floppy-disk"></span><span class="pageh-text-btn">Guardar</span></button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><!-- /Container -->
<script>
$(document).ready(function() {

	if ($('#gineco_tipoMenarca').val() == '99') {
		$('.fecha').val("");
	}
	
	$('.fecha').datetimepicker({
		timepicker:false,
		format:'d-m-Y'
	});

	$('.save-gineco').click(function() {
		var dataForm = $('#gineco-form').serialize();
		var option = $(this).attr('data');
		
		$.ajax({
			type: 'post',
			url: urlRoot+'/ginecobstetricos/savegineco',
			data: dataForm,
			dataType: 'json',
			success: function(data) {
				if (data.guardado == 1) {
					if(option == 0){showAlert("success", "Se ha guardado la información correctamente");}
					else{getView(option);}
				} else {
					showAlert("error", data);
				}
			},
			error: function() {
			}
		});
	});
});
</script>