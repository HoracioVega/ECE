<!-- Container -->
<div class="container-fluid">
	<div class="row"></div>


	<div class="row dashboard">
		<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
			<div class="panel panel-default">
				<div class="panel-body">
					<h4>
						<span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;<span>{{Session::get('nombrePaciente')}}</span>
					</h4>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-body">
					<form class="form-horizontal minuspadleft" role="form">
						<label class="control-label col-xs-12 col-sm-12 col-md-5 col-lg-5">Expediente:</label>
						<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
							<p class="form-control-static">@if(isset($_GET['exp_id'])){{'000'.$_GET['exp_id']}}@endif</p>
						</div>

						<label class="control-label col-xs-12 col-sm-12 col-md-5 col-lg-5">Edad:</label>
						<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
							<p class="form-control-static">67 años</p>
						</div>

						<label class="control-label col-xs-12 col-sm-12 col-md-5 col-lg-5">Sexo:</label>
						<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
							<p class="form-control-static">Hombre</p>
						</div>

						<label class="control-label col-xs-12 col-sm-12 col-md-5 col-lg-5">Tipo
							de sangre:</label>
						<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
							<p class="form-control-static">O+</p>
						</div>

						<label class="control-label col-xs-12 col-sm-12 col-md-5 col-lg-5">Religión:</label>
						<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
							<p class="form-control-static">Católica</p>
						</div>
					</form>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-body">
					<div class="panel-heading-btns">
						<h4>Antecedentes Patológicos</h4>
						<a href="" class="btn btn-default btn-sm"><span
							class="glyphicon glyphicon-pencil"></span></a>
					</div>
				</div>

				<ul class="list-group">
					<li class="list-group-item"><span
						class="glyphicon glyphicon-asterisk"></span> Tosferina</li>
					<li class="list-group-item"><span
						class="glyphicon glyphicon-asterisk"></span> Escarlatina</li>
					<li class="list-group-item"><span
						class="glyphicon glyphicon-asterisk"></span> Hepatitis</li>
				</ul>
			</div>

			<div class="panel panel-default">
				<div class="panel-body">
					<div class="panel-heading-btns">
						<h4>Antecedentes Heredofamiliares</h4>
						<a href="" class="btn btn-default btn-sm"><span
							class="glyphicon glyphicon-pencil"></span></a>
					</div>
				</div>

				<ul class="list-group heredofam">
					<li class="list-group-item"><span class="label label-danger">HTA</span>
						Abuela Materna, Abuelo Paterno, Abuela Paterna</li>
					<li class="list-group-item"><span class="label label-danger">DM</span>
						Madre</li>
					<li class="list-group-item"><span class="label label-danger">CANCER</span>
						Padre</li>
					<li class="list-group-item"><span class="label label-danger">TB</span>
						Abuelo Paterno</li>
					<li class="list-group-item"><span class="label label-danger">ALERGIAS</span>
						Abuela Materna, Abuela Paterna</li>
					<li class="list-group-item"><span class="label label-danger">OTRAS</span></li>
				</ul>
			</div>
		</div>

		<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="panel-heading-btns">
						<h4>Hoja de evolución</h4>
						<a href="" class="btn btn-default btn-sm"><span
							class="glyphicon glyphicon-pencil"></span></a>
					</div>
				</div>

				<ul class="list-group list-responsive">
					<li class="list-group-item">
						<div class="data-box data-box-lg info marginright30">
							<p class="data-box-info">11:35</p>
							<p class="data-box-unit">16-02-2015</p>
						</div>


						<div class="data-box primary">
							<p class="data-box-info">80</p>
							<p class="data-box-unit">kg</p>
						</div>

						<div class="data-box primary">
							<p class="data-box-info">1.56</p>
							<p class="data-box-unit">mts</p>
						</div>

						<div class="data-box primary">
							<p class="data-box-info">32.87</p>
							<p class="data-box-unit">kg/m2</p>
						</div>

						<div class="data-box primary">
							<p class="data-box-info">60</p>
							<p class="data-box-unit">x min</p>
						</div>

						<div class="data-box primary">
							<p class="data-box-info">38°</p>
							<p class="data-box-unit">temp</p>
						</div>

						<div class="data-box primary">
							<p class="data-box-info">100/180</p>
							<p class="data-box-unit">mmHg</p>
						</div>

						<div class="data-box primary">
							<p class="data-box-info">125</p>
							<p class="data-box-unit">mg/dL</p>
						</div>
					</li>
					<li class="list-group-item">
						<div class="data-box data-box-lg info marginright30">
							<p class="data-box-info">11:35</p>
							<p class="data-box-unit">16-02-2015</p>
						</div>


						<div class="data-box primary">
							<p class="data-box-info">80</p>
							<p class="data-box-unit">kg</p>
						</div>

						<div class="data-box primary">
							<p class="data-box-info">1.56</p>
							<p class="data-box-unit">mts</p>
						</div>

						<div class="data-box primary">
							<p class="data-box-info">32.87</p>
							<p class="data-box-unit">kg/m2</p>
						</div>

						<div class="data-box primary">
							<p class="data-box-info">60</p>
							<p class="data-box-unit">x min</p>
						</div>

						<div class="data-box primary">
							<p class="data-box-info">38°</p>
							<p class="data-box-unit">temp</p>
						</div>

						<div class="data-box primary">
							<p class="data-box-info">100/180</p>
							<p class="data-box-unit">mmHg</p>
						</div>

						<div class="data-box primary">
							<p class="data-box-info">125</p>
							<p class="data-box-unit">mg/dL</p>
						</div>
					</li>
				</ul>
			</div>

			<div class="panel panel-default">
				<div class="panel-body">
					<div class="panel-heading-btns">
						<h4>Historial de consultas</h4>
						<a href="" class="btn btn-default btn-sm"><span
							class="glyphicon glyphicon-pencil"></span></a>
					</div>
				</div>

				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Fecha</th>
								<th>Signos</th>
								<th>Síntomas</th>
								<th>Evolución</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>11:35 16-02-2015</td>
								<td>Fiebre</td>
								<td>Cefalea, Mialgias, artralgias, dolor ocular...</td>
								<td>7 días</td>
							</tr>
							<tr>
								<td>13:20 14-02-2015</td>
								<td>Catarro</td>
								<td>Cefalea, Escurrimiento nasal, cuerpo cortado...</td>
								<td>5 días</td>
							</tr>
							<tr>
								<td>12:20 10-02-2015</td>
								<td>Fiebre</td>
								<td>Cefalea, Mialgias, artralgias, dolor ocular...</td>
								<td>3 días</td>
							</tr>
							<tr>
								<td>10:35 01-02-2015</td>
								<td>Fiebre</td>
								<td>Cefalea, Mialgias, artralgias, dolor ocular...</td>
								<td>2 días</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-body">
					<div class="panel-heading-btns">
						<h4>Historial de recetas</h4>
						<a href="" class="btn btn-default btn-sm"><span
							class="glyphicon glyphicon-pencil"></span></a>
					</div>
				</div>

				<ul class="list-group">
					<li class="list-group-item"><span class="label label-primary">11:35
							16-02-2015</span> Dr. Jose Arturo Ledezma Guitiérrez <br> <br>
						<div class="table-responsive">
							<table class="table table-condensed">
								<thead>
									<tr>
										<th>Clave</th>
										<th>Cant.</th>
										<th>Fármaco</th>
										<th>Presentación</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1929</td>
										<td>2</td>
										<td>Ampicilina</td>
										<td>20 tabletas</td>
									</tr>
									<tr>
										<td>0104</td>
										<td>1</td>
										<td>Paracetamol</td>
										<td>10 tabletas</td>
									</tr>
								</tbody>
							</table>
						</div></li>

					<li class="list-group-item"><span class="label label-primary">11:35
							16-02-2015</span> Dr. Jose Arturo Ledezma Guitiérrez <br> <br>
						<div class="table-responsive">
							<table class="table table-condensed">
								<thead>
									<tr>
										<th>Clave</th>
										<th>Cant.</th>
										<th>Fármaco</th>
										<th>Presentación</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1929</td>
										<td>2</td>
										<td>Ampicilina</td>
										<td>20 tabletas</td>
									</tr>
									<tr>
										<td>0104</td>
										<td>1</td>
										<td>Paracetamol</td>
										<td>10 tabletas</td>
									</tr>
								</tbody>
							</table>
						</div></li>

					<li class="list-group-item"><span class="label label-primary">11:35
							16-02-2015</span> Dr. Jose Arturo Ledezma Guitiérrez <br> <br>
						<div class="table-responsive">
							<table class="table table-condensed">
								<thead>
									<tr>
										<th>Clave</th>
										<th>Cant.</th>
										<th>Fármaco</th>
										<th>Presentación</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1929</td>
										<td>2</td>
										<td>Ampicilina</td>
										<td>20 tabletas</td>
									</tr>
									<tr>
										<td>0104</td>
										<td>1</td>
										<td>Paracetamol</td>
										<td>10 tabletas</td>
									</tr>
								</tbody>
							</table>
						</div></li>
				</ul>
			</div>
		</div>

		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="panel-heading-btns">
						<h4>Antecedentes No Patológicos</h4>
						<a href="" class="btn btn-default btn-sm"><span
							class="glyphicon glyphicon-pencil"></span></a>
					</div>
				</div>

				<ul class="list-group heredofam">
					<li class="list-group-item"><span class="label label-primary">Dieta</span></li>
					<li class="list-group-item"><span class="label label-primary">Tabaco</span></li>
					<li class="list-group-item"><span class="label label-primary">Alcohol</span></li>
					<li class="list-group-item"><span class="label label-primary">Drogas</span></li>
					<li class="list-group-item"><span class="label label-primary">Servicios</span></li>
					<li class="list-group-item"><span class="label label-primary">Fauna</span></li>
					<li class="list-group-item"><span class="label label-primary">Promiscuidad</span></li>
					<li class="list-group-item"><span class="label label-primary">Hacinamiento</span></li>
					<li class="list-group-item"><span class="label label-primary">Vivienda</span></li>
				</ul>
			</div>

			<div class="panel panel-default">
				<div class="panel-body">
					<div class="panel-heading-btns">
						<h4>Antecedentes No Patológicos Biológicos</h4>
						<a href="" class="btn btn-default btn-sm"><span
							class="glyphicon glyphicon-pencil"></span></a>
					</div>
				</div>

				<div class="table-responsive">
					<table class="table table-condensed">
						<thead>
							<tr>
								<th>Vacuna</th>
								<th>I</th>
								<th>II</th>
								<th>III</th>
								<th>R1</th>
								<th>R2</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Sabin</td>
								<td>X</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>DPT</td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>BCG</td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>Doble viral</td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>Triple viral</td>
								<td></td>
								<td>X</td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-body">
					<div class="panel-heading-btns">
						<h4>Historial de enfermedades</h4>
						<a href="" class="btn btn-default btn-sm"><span
							class="glyphicon glyphicon-pencil"></span></a>
					</div>
				</div>

				<div class="list-group">
					<a href="" class="list-group-item"><span
						class="label label-primary">11:35 16-02-2015</span> Necesidad de
						inmunización contra la influenza [gripe]</a> <a href=""
						class="list-group-item"><span class="label label-primary">11:35
							13-02-2015</span> Diarrea y gastroenteritis de presunto origen
						infeccioso</a> <a href="" class="list-group-item"><span
						class="label label-primary">11:35 02-02-2015</span> Diarrea
						funcional</a> <a href="" class="list-group-item"><span
						class="label label-primary">11:35 18-01-2015</span> Colitis
						amebiana no disentérica</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Container -->