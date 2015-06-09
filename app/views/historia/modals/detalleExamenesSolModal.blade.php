<div class="panel-body">
	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
		<div class="well">
			<h4 class="nomargintop">Detalles</h4><br>
			<form class="form-horizontal" role="form">										
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-3 col-lg-2">Consulta:</label>
					<div class="col-xs-12 col-sm-9 col-md-9 col-lg-10">
						<p>{{$examen_espe[0]->lab_fecha}}</p>
						<input class="hide" value="{{$examen_espe[0]->lab_id}}" id="examen_impresion">
					</div>
				</div>
				@if($examen_espe[0]->lab_tipo == 1)
				<div class="form-group">
					<label class="col-xs-6 col-sm-4 col-md-3 col-lg-2">¿Urgente?:</label>
					<div class="col-xs-6 col-sm-8 col-md-9 col-lg-4">
						<p>{{$examen_espe[0]->lab_urgente}}</p>
					</div>
					</div>
				@endif
				<div class="form-group">
					<label class="col-xs-6 col-sm-4 col-md-3 col-lg-2">Servicio:</label>
					<div class="col-xs-6 col-sm-8 col-md-9 col-lg-4">
						<p>{{$examen_espe[0]->serv_nombre}}</p>
					</div>
				</div>	
				<div class="form-group">
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2">Diagnóstico:</label>
					<div class="col-xs-12 col-sm-8 col-md-9 col-lg-10">
						<p>{{$examen_espe[0]->lab_diagnostico}}</p>
					</div>
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2">Estudio:</label>
					<div class="col-xs-12 col-sm-8 col-md-9 col-lg-10">
						<p>{{$examen_espe[0]->lab_estudio}}</p>
					</div>
				</div>										
				<div class="form-group">
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
					@if($examen_espe[0]->lab_tipo == 0) Obs:
					@else Impresión diagnóstica
					@endif</label>
					<div class="col-xs-12 col-sm-8 col-md-9 col-lg-10">
						<p>{{$examen_espe[0]->lab_impresion}}</p>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>