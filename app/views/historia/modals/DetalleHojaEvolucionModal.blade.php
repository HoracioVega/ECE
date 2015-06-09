<div class="well">
	<h4 class="nomargintop">Detalles</h4>
	<br>

	<form class="form-horizontal" role="form">
		<div class="form-group">
			<label class="col-xs-12 col-sm-6 col-md-2 col-lg-2">Consulta:</label>
			<div class="col-xs-12 col-sm-6 col-md-10 col-lg-10">
				<p>@if(isset($current[0])){{$current[0]->evolucion_fecha.' '.$current[0]->evolucion_hora}}@else{{''}}@endif</p>
			</div>
		</div>

		<div class="form-group">
			<label class="col-xs-6 col-sm-6 col-md-2 col-lg-2">Peso:</label>
			<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
				<p>@if(isset($current[0])){{$current[0]->evolucion_peso}}@else{{''}}@endif Kg</p>
			</div>
			<label class="col-xs-6 col-sm-6 col-md-2 col-lg-2">Talla:</label>
			<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
				<p>@if(isset($current[0])){{$current[0]->evolucion_talla}}@else{{''}}@endif mts</p>
			</div>
			<label class="col-xs-6 col-sm-6 col-md-2 col-lg-2">IMC:</label>
			<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
				<p>@if(isset($current[0])){{$current[0]->evolucion_imc}}@else{{''}}@endif</p>
			</div>
			<label class="col-xs-6 col-sm-6 col-md-2 col-lg-2">Pulso:</label>
			<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
				<p>@if(isset($current[0])){{$current[0]->evolucion_fc}}@else{{''}}@endif xmin</p>
			</div>
			<label class="col-xs-6 col-sm-6 col-md-2 col-lg-2">F.R.:</label>
			<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
				<p>@if(isset($current[0])){{$current[0]->evolucion_fr}}@else{{''}}@endif xmin</p>
			</div>
			<label class="col-xs-6 col-sm-6 col-md-2 col-lg-2">Temperatura:</label>
			<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
				<p>@if(isset($current[0])){{$current[0]->evolucion_temp}}@else{{''}}@endif °</p>
			</div>
			<label class="col-xs-6 col-sm-6 col-md-2 col-lg-2">T.A.:</label>
			<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
				<p>@if(isset($current[0])){{$current[0]->evolucion_ta}}@else{{''}}@endif mmHg</p>
			</div>
			<label class="col-xs-6 col-sm-6 col-md-2 col-lg-2">Glicemia:</label>
			<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
				<p>@if(isset($current[0])){{$current[0]->evolucion_glicemia}}@else{{''}}@endif</p>
			</div>
		</div>

		<div class="form-group">
			<label class="col-xs-12 col-sm-12 col-md-2 col-lg-2">Datos clínicos:</label>
			<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
				<p>@if(isset($current[0])){{$current[0]->evolucion_clinicos}}@else{{''}}@endif</p>
			</div>
		</div>

		<div class="form-group nomarginbot">
			<label class="col-xs-12 col-sm-6 col-md-3 col-lg-2">Tratamiento:</label>
			<div class="col-xs-12 col-sm-6 col-md-9 col-lg-10">
				<p class="nomarginbot">@if(isset($current[0])){{$current[0]->evolucion_tratamiento}}@else{{''}}@endif</p>
			</div>
		</div>
	</form>
</div>





