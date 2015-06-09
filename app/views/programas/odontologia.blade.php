<div class="alert-box-container">
	<div id="alert-box" class="">
		<p>Mensaje</p>
	</div>
</div>

<!-- Container -->
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="panel panel-default">
						<div class="panel-body">
							<h2 class="nomargin text-primary">Odontología</h2>
							<h4 class="text-muted">Hoja de control de citas</h4>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="page-header nomargintop">
								<h4>Datos de identificación</h4>
							</div>

							<form class="form-horizontal">
								<div class="row">
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<div class="form-group">
											<label class="col-xs-12 col-sm-4 col-md-4 col-lg-4">No. Expediente:</label>
											<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
												<p>0015</p>
											</div>
										</div>
										<div class="form-group">
											<label class="col-xs-12 col-sm-4 col-md-4 col-lg-4">Nombres:</label>
											<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
												<p>Jose Cándido</p>
											</div>
											<label class="col-xs-12 col-sm-4 col-md-4 col-lg-4">Apellidos:</label>
											<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
												<p>Tan Nahuat</p>
											</div>
											<label class="col-xs-12 col-sm-4 col-md-4 col-lg-4">Nacimiento:</label>
											<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
												<p>01/01/1989</p>
											</div>
											<label class="col-xs-12 col-sm-4 col-md-4 col-lg-4">Edad:</label>
											<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
												<p>26 años</p><br>
											</div>
											<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
												<button type="button" class="btn btn-primary btn-sm">Generar registro visita</button>
											</div>
										</div>
									</div>

									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<div class="form-group">
											<label class="col-xs-12 col-sm-4 col-md-4 col-lg-4">Sexo:</label>
											<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
												<p>Masculino</p>
											</div>
											<label class="col-xs-12 col-sm-4 col-md-4 col-lg-4">Talla:</label>
											<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
												<p>1.75 mts</p>
											</div>
										</div>
										<div class="form-group">
											<label class="col-xs-12 col-sm-4 col-md-4 col-lg-4">Indigena:</label>
											<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
												<p>No</p>
											</div>
											<label class="col-xs-12 col-sm-4 col-md-4 col-lg-4">Domicilio:</label>
											<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
												<p>Avenida Inventada #1234 Col. Un nombre largo</p>
											</div>
											<label class="col-xs-12 col-sm-4 col-md-4 col-lg-4">Derechohabiencia:</label>
											<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
												<p>Seguro Popular</p>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>

					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
						<div class="panel panel-primary">
							<div class="panel-heading" role="tab" id="headingOne">
								<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#interrogatorio">Interrogatorio (Antecedentes patológicos y no patológicos)</a></h4>
							</div>
							<div id="interrogatorio" class="panel-collapse collapse" role="tabpanel">
								<div class="panel-body">
									<form class="form-horizontal" role="form">
										<div class="form-group">
											<label class="control-label col-xs-12 col-sm-3 col-md-3 col-lg-3">Padece alguna enfermedad:</label>
											<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
												<div class="checkbox"><label><input type="checkbox" value=""></label></div>
											</div>
											<label class="control-label col-xs-12 col-sm-1 col-md-1 col-lg-1">¿Cuál?:</label>
											<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
												<input type="text" name="" id="" class="form-control" placeholder="¿Cuál?">
											</div>
										</div>
									</form><br>
									
									<legend class="">Su médico le ha diagnosticado alguna de las siguientes enfermedades:</legend><br>

									<div class="row">
										<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
											<div class="table-responsive">
												<table class="table table-condensed radio-min">
													<thead>
														<tr>
															<th colspan="2">Enfermedades</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>Enfermedad del corazón</td>
															<td><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
														</tr>
														<tr>
															<td>Fiebre reumatica</td>
															<td><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
														</tr>
														<tr>
															<td>Hipertension Arterial</td>
															<td><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
														</tr>
														<tr>
															<td>Hepatitis</td>
															<td><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
														</tr>
														<tr>
															<td>Diabetes Mellitus</td>
															<td><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
														</tr>
														<tr>
															<td>Problemas de sangrado</td>
															<td><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
														</tr>
														<tr>
															<td>Familiares diabeticos</td>
															<td><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
														</tr>
														<tr>
															<td>Epilepsia</td>
															<td><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
														</tr>
														<tr>
															<td>Tuberculosis</td>
															<td><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
														</tr>
														<tr>
															<td>Anemia</td>
															<td><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
														</tr>
														<tr>
															<td>VIH</td>
															<td><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
														</tr>
														<tr>
															<td>SIDA</td>
															<td><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>

										<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
											<div class="table-responsive">
												<table class="table table-condensed radio-min textarea-min">
													<thead>
														<tr>
															<th colspan="2">Otros</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>Es alergico a la Penicilina</td>
															<td><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
														</tr>
														<tr>
															<td>Algún otro medicamento</td>
															<td><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
														</tr>
														<tr>
															<td>¿Cuales?</td>
															<td><textarea class="form-control" rows="1"></textarea></td>
														</tr>
														<tr>
															<td>¿Le han anesteciado?</td>
															<td><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
														</tr>
														<tr>
															<td>¿Algún problema?</td>
															<td><div class="checkbox"><label><input type="checkbox" value=""></label></div></td>
														</tr>
														<tr>
															<td>Diga cual</td>
															<td><textarea class="form-control" rows="1"></textarea></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<div class="col-xs-12">
											<button class="btn btn-primary btn-sm" type="submit">Guardar</button>
										</div>
									</div>
								</div>
							</div>						
						</div>

						<div class="panel panel-primary">
							<div class="panel-heading" role="tab" id="headingOne">
								<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#exploracion">Exploración Física</a></h4>
							</div>
							<div id="exploracion" class="panel-collapse collapse" role="tabpanel">
								<div class="panel-body">
									<div class="table-responsive">
										<table class="table table-condensed textarea-min">
											<thead>
												<tr>
													<th colspan="2">Cabeza, Cuello y Cavida Bucal</th>
												</tr>
												<tr>
													<th>Área</th>
													<th>Observaciones</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Cara</td>
													<td><textarea name="" id="" class="form-control" rows="1"></textarea></td>
												</tr>
												<tr>
													<td>Cuello</td>
													<td><textarea name="" id="" class="form-control" rows="1"></textarea></td>
												</tr>
												<tr>
													<td>A.T.M.</td>
													<td><textarea name="" id="" class="form-control" rows="1"></textarea></td>
												</tr>
												<tr>
													<td>Carrillos</td>
													<td><textarea name="" id="" class="form-control" rows="1"></textarea></td>
												</tr>
												<tr>
													<td>Paladar duro</td>
													<td><textarea name="" id="" class="form-control" rows="1"></textarea></td>
												</tr>
												<tr>
													<td>Paladar blando</td>
													<td><textarea name="" id="" class="form-control" rows="1"></textarea></td>
												</tr>
												<tr>
													<td>Lengua</td>
													<td><textarea name="" id="" class="form-control" rows="1"></textarea></td>
												</tr>
												<tr>
													<td>Piso de boca</td>
													<td><textarea name="" id="" class="form-control" rows="1"></textarea></td>
												</tr>
												<tr>
													<td>Amigdalas</td>
													<td><textarea name="" id="" class="form-control" rows="1"></textarea></td>
												</tr>
											</tbody>
										</table>
									</div>
									<button type="submit" class="btn btn-primary btn-sm">Guardar</button>
								</div>
							</div>
						</div>

						<div class="panel panel-primary">
							<div class="panel-heading" role="tab" id="headingOne">
								<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#odontrograma">Odontograma</a></h4>
							</div>
							<div id="odontrograma" class="panel-collapse collapse" role="tabpanel">
								<div class="panel-body">

									<div role="tabpanel">
									    <!-- Nav tabs -->
									    <ul class="nav nav-tabs" role="tablist">
									        <li role="presentation" class="active">
									            <a href="#inicial" aria-controls="inicial" role="tab" data-toggle="tab">Odontograma inicial</a>
									        </li>
									        <li role="presentation">
									            <a href="#final" aria-controls="final" role="tab" data-toggle="tab">Odontograma final</a>
									        </li>
									         <li role="presentation">
									            <a href="http://google.com" target="_blank" aria-controls="final" role="tab" data-toggle="tab">Descargar Formato de Consentimiento</a>
									        </li>
									    </ul>
									
									    <!-- Tab panes -->
									    <div class="tab-content">
									        <div role="tabpanel" class="tab-pane active" id="inicial">
									        	<div class="row">
													<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
														<div class="table-responsive">
															<table class="table table-condensed">
																<thead>
																	<tr>
																		<th>18</th>
																		<th>17</th>
																		<th>16</th>
																		<th>15</th>
																		<th>14</th>

																		<th>13</th>
																		<th>12</th>
																		<th>11</th>
																	</tr>
																</thead>
																<tbody>
																	<tr>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td><b>55</b></td>
																		<td><b>54</b></td>
																		<td><b>53</b></td>
																		<td><b>52</b></td>
																		<td><b>51</b></td>
																	</tr>
																	<tr>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td><b>85</b></td>
																		<td><b>84</b></td>
																		<td><b>83</b></td>
																		<td><b>82</b></td>
																		<td><b>81</b></td>
																	</tr>
																	<tr>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td><b>48</b></td>
																		<td><b>47</b></td>
																		<td><b>46</b></td>
																		<td><b>45</b></td>
																		<td><b>44</b></td>
																		<td><b>43</b></td>
																		<td><b>42</b></td>
																		<td><b>41</b></td>
																	</tr>
																	<tr>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																	</tr>
																</tbody>
															</table>
														</div>
													</div>

													<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
														<div class="table-responsive">
															<table class="table table-condensed">
																<thead>
																	<tr>
																		<th>21</th>
																		<th>22</th>
																		<th>23</th>
																		<th>24</th>
																		<th>25</th>

																		<th>26</th>
																		<th>27</th>
																		<th>28</th>
																	</tr>
																</thead>
																<tbody>
																	<tr>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>

																		<td></td>
																		<td></td>
																		<td></td>
																	</tr>
																	<tr>
																		<td><b>61</b></td>
																		<td><b>62</b></td>
																		<td><b>63</b></td>
																		<td><b>64</b></td>
																		<td><b>65</b></td>

																		<td></td>
																		<td></td>
																		<td></td>
																	</tr>
																	<tr>
																		<td><b>71</b></td>
																		<td><b>72</b></td>
																		<td><b>73</b></td>
																		<td><b>74</b></td>
																		<td><b>75</b></td>

																		<td></td>
																		<td></td>
																		<td></td>
																	</tr>
																	<tr>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td></td>
																		<td></td>
																		<td></td>
																	</tr>
																	<tr>
																		<td><b>31</b></td>
																		<td><b>32</b></td>
																		<td><b>33</b></td>
																		<td><b>34</b></td>
																		<td><b>35</b></td>

																		<td><b>36</b></td>
																		<td><b>37</b></td>
																		<td><b>38</b></td>
																	</tr>
																	<tr>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																	</tr>
																</tbody>
															</table>
														</div>
													</div>

													<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
														<div class="page-header">
															<h4>Información</h4>
														</div>
													</div>

													<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
														<div class="table-responsive">
															<table class="table">
																<thead>
																	<tr>
																		<th colspan="5">Dientes adulto:</th>
																	</tr>
																</thead>
																<tbody>
																	<tr>
																		<td>Caries</td>
																		<td>Perdido</td>
																		<td>Extracción</td>
																		<td>Obturado</td>
																		<td>Índice</td>
																	</tr>
																	<tr>
																		<td><input type="text" name="" id="" class="form-control" disabled></td>
																		<td><input type="text" name="" id="" class="form-control" disabled></td>
																		<td><input type="text" name="" id="" class="form-control" disabled></td>
																		<td><input type="text" name="" id="" class="form-control" disabled></td>
																		<td><input type="text" name="" id="" class="form-control" disabled></td>
																	</tr>
																	<tr>
																		<th colspan="5">Dientes niño:</th>
																	</tr>
																	<tr>
																		<td>Caries</td>
																		<td>Perdido</td>
																		<td>Extracción</td>
																		<td>Obturado</td>
																		<td>Índice</td>
																	</tr>
																	<tr>
																		<td><input type="text" name="" id="" class="form-control" disabled></td>
																		<td><input type="text" name="" id="" class="form-control" disabled></td>
																		<td><input type="text" name="" id="" class="form-control" disabled></td>
																		<td><input type="text" name="" id="" class="form-control" disabled></td>
																		<td><input type="text" name="" id="" class="form-control" disabled></td>
																	</tr>
																</tbody>
															</table>
														</div>

														<div class="table-responsive">
															<table class="table">
																<thead>
																	<tr>
																		<th colspan="9">Índice de Higiene Oral Simplificada:</th>
																	</tr>
																</thead>
																<tbody>
																	<tr>
																		<th>Diente</th>
																		<th>17/16</th>
																		<th>11/21</th>
																		<th>26/27</th>
																		<th>26/27</th>

																		<th>41/31</th>
																		<th>36/37</th>
																		<th>Total</th>
																		<th>Promedio</th>
																	</tr>
																	<tr>
																		<td>PDB</td>
																		<td><input type="text" name="" id="" class="form-control"></td>
																		<td><input type="text" name="" id="" class="form-control"></td>
																		<td><input type="text" name="" id="" class="form-control"></td>
																		<td><input type="text" name="" id="" class="form-control"></td>

																		<td><input type="text" name="" id="" class="form-control"></td>
																		<td><input type="text" name="" id="" class="form-control"></td>
																		<td><input type="text" name="" id="" class="form-control" disabled></td>
																		<td><input type="text" name="" id="" class="form-control" disabled></td>
																	</tr>
																	<tr>
																		<td>Cálculo</td>
																		<td><input type="text" name="" id="" class="form-control"></td>
																		<td><input type="text" name="" id="" class="form-control"></td>
																		<td><input type="text" name="" id="" class="form-control"></td>
																		<td><input type="text" name="" id="" class="form-control"></td>

																		<td><input type="text" name="" id="" class="form-control"></td>
																		<td><input type="text" name="" id="" class="form-control"></td>
																		<td><input type="text" name="" id="" class="form-control" disabled></td>
																		<td><input type="text" name="" id="" class="form-control" disabled></td>
																	</tr>
																</tbody>
															</table>
														</div>
													</div>
													
													<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
														<div class="table-responsive">
															<table class="table table-condensed radio-min">
																<thead>
																	<tr>
																		<th colspan="3">Código para odontograma:</th>
																	</tr>
																</thead>
																<tbody>
																	<tr>
																		<td width="40px"><div class="radio"><label><input type="radio" value=""></label></div></td>
																		<td width="40px"><div class="central-diente"></div></td>
																		<td>Caries</td>
																	</tr>
																	<tr>
																		<td><div class="radio"><label><input type="radio" value=""></label></div></td>
																		<td><div class="info central-diente"></div></td>
																		<td>Perdido</td>
																	</tr>
																	<tr>
																		<td><div class="radio"><label><input type="radio" value=""></label></div></td>
																		<td><div class="central-diente"></div></td>
																		<td>Bolsa Parodontal</td>
																	</tr>
																	<tr>
																		<td><div class="radio"><label><input type="radio" value=""></label></div></td>
																		<td><div class="warning central-diente"></div></td>
																		<td>Protesis Removible</td>
																	</tr>
																	<tr>
																		<td><div class="radio"><label><input type="radio" value=""></label></div></td>
																		<td><div class="central-diente"></div></td>
																		<td>Protesis Fija</td>
																	</tr>
																	<tr>
																		<td><div class="radio"><label><input type="radio" value=""></label></div></td>
																		<td><div class="primary central-diente"></div></td>
																		<td>Obturados</td>
																	</tr>
																	<tr>
																		<td><div class="radio"><label><input type="radio" value=""></label></div></td>
																		<td><div class="central-diente"></div></td>
																		<td>Extracción</td>
																	</tr>
																	<tr>
																		<td><div class="radio"><label><input type="radio" value=""></label></div></td>
																		<td><div class="success central-diente"></div></td>
																		<td>Diente Sano</td>
																	</tr>
																	<tr>
																		<td><div class="radio"><label><input type="radio" value=""></label></div></td>
																		<td><div class="danger central-diente"></div></td>
																		<td>Diente Ausente</td>
																	</tr>
																	<tr>
																		<td><div class="radio"><label><input type="radio" value=""></label></div></td>
																		<td><div class="central-diente"></div></td>
																		<td>Sellador</td>
																	</tr>
																	<tr>
																		<td><div class="radio"><label><input type="radio" value=""></label></div></td>
																		<td><div class="central-diente"></div></td>
																		<td>Perdida total</td>
																	</tr>
																</tbody>
															</table>
														</div>
														<div class="table-responsive">
															<table class="table table-condensed radio-min">
																<thead>
																	<tr>
																		<th colspan="2">Códigos:</th>
																	</tr>
																</thead>
																<tbody>
																	<tr>
																		<td>0</td>
																		<td>Ausencia</td>
																	</tr>
																	<tr>
																		<td>1</td>
																		<td>Hasta un tercio de superficie</td>
																	</tr>
																	<tr>
																		<td>2</td>
																		<td>Más de 2 tercios de superficie</td>
																	</tr>
																	<tr>
																		<td>3</td>
																		<td>Más de 2 tercios de superficie</td>
																	</tr>
																</tbody>
															</table>
														</div>
													</div>
												</div>
									        </div>
									        <div role="tabpanel" class="tab-pane" id="final">
									        	<div class="row">
													<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
														<div class="table-responsive">
															<table class="table table-condensed">
																<thead>
																	<tr>
																		<th>18</th>
																		<th>17</th>
																		<th>16</th>
																		<th>15</th>
																		<th>14</th>

																		<th>13</th>
																		<th>12</th>
																		<th>11</th>
																	</tr>
																</thead>
																<tbody>
																	<tr>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td><b>55</b></td>
																		<td><b>54</b></td>
																		<td><b>53</b></td>
																		<td><b>52</b></td>
																		<td><b>51</b></td>
																	</tr>
																	<tr>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td><b>85</b></td>
																		<td><b>84</b></td>
																		<td><b>83</b></td>
																		<td><b>82</b></td>
																		<td><b>81</b></td>
																	</tr>
																	<tr>
																		<td></td>
																		<td></td>
																		<td></td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td><b>48</b></td>
																		<td><b>47</b></td>
																		<td><b>46</b></td>
																		<td><b>45</b></td>
																		<td><b>44</b></td>
																		<td><b>43</b></td>
																		<td><b>42</b></td>
																		<td><b>41</b></td>
																	</tr>
																	<tr>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																	</tr>
																</tbody>
															</table>
														</div>
													</div>

													<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
														<div class="table-responsive">
															<table class="table table-condensed">
																<thead>
																	<tr>
																		<th>21</th>
																		<th>22</th>
																		<th>23</th>
																		<th>24</th>
																		<th>25</th>

																		<th>26</th>
																		<th>27</th>
																		<th>28</th>
																	</tr>
																</thead>
																<tbody>
																	<tr>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>

																		<td></td>
																		<td></td>
																		<td></td>
																	</tr>
																	<tr>
																		<td><b>61</b></td>
																		<td><b>62</b></td>
																		<td><b>63</b></td>
																		<td><b>64</b></td>
																		<td><b>65</b></td>

																		<td></td>
																		<td></td>
																		<td></td>
																	</tr>
																	<tr>
																		<td><b>71</b></td>
																		<td><b>72</b></td>
																		<td><b>73</b></td>
																		<td><b>74</b></td>
																		<td><b>75</b></td>

																		<td></td>
																		<td></td>
																		<td></td>
																	</tr>
																	<tr>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td></td>
																		<td></td>
																		<td></td>
																	</tr>
																	<tr>
																		<td><b>31</b></td>
																		<td><b>32</b></td>
																		<td><b>33</b></td>
																		<td><b>34</b></td>
																		<td><b>35</b></td>

																		<td><b>36</b></td>
																		<td><b>37</b></td>
																		<td><b>38</b></td>
																	</tr>
																	<tr>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																		<td>
																			<div class="diente-contenedor">
																				<div class="lateral-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="central-diente"></div>
																				<div class="lateral-diente"></div>
																			</div>
																		</td>
																	</tr>
																</tbody>
															</table>
														</div>
													</div>

													<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
														<div class="page-header">
															<h4>Información</h4>
														</div>
													
														<div class="table-responsive">
															<table class="table table-condensed radio-min">
																<thead>
																	<tr>
																		<th colspan="3">Código para odontograma:</th>
																	</tr>
																</thead>
																<tbody>
																	<tr>
																		<td width="40px"><div class="radio"><label><input type="radio" value=""></label></div></td>
																		<td width="40px"><div class="central-diente"></div></td>
																		<td>Caries</td>
																	</tr>
																	<tr>
																		<td><div class="radio"><label><input type="radio" value=""></label></div></td>
																		<td><div class="info central-diente"></div></td>
																		<td>Perdido</td>
																	</tr>
																	<tr>
																		<td><div class="radio"><label><input type="radio" value=""></label></div></td>
																		<td><div class="central-diente"></div></td>
																		<td>Bolsa Parodontal</td>
																	</tr>
																	<tr>
																		<td><div class="radio"><label><input type="radio" value=""></label></div></td>
																		<td><div class="warning central-diente"></div></td>
																		<td>Protesis Removible</td>
																	</tr>
																	<tr>
																		<td><div class="radio"><label><input type="radio" value=""></label></div></td>
																		<td><div class="central-diente"></div></td>
																		<td>Protesis Fija</td>
																	</tr>
																	<tr>
																		<td><div class="radio"><label><input type="radio" value=""></label></div></td>
																		<td><div class="primary central-diente"></div></td>
																		<td>Obturados</td>
																	</tr>
																	<tr>
																		<td><div class="radio"><label><input type="radio" value=""></label></div></td>
																		<td><div class="central-diente"></div></td>
																		<td>Extracción</td>
																	</tr>
																	<tr>
																		<td><div class="radio"><label><input type="radio" value=""></label></div></td>
																		<td><div class="success central-diente"></div></td>
																		<td>Diente Sano</td>
																	</tr>
																	<tr>
																		<td><div class="radio"><label><input type="radio" value=""></label></div></td>
																		<td><div class="danger central-diente"></div></td>
																		<td>Diente Ausente</td>
																	</tr>
																	<tr>
																		<td><div class="radio"><label><input type="radio" value=""></label></div></td>
																		<td><div class="central-diente"></div></td>
																		<td>Sellador</td>
																	</tr>
																	<tr>
																		<td><div class="radio"><label><input type="radio" value=""></label></div></td>
																		<td><div class="central-diente"></div></td>
																		<td>Perdida total</td>
																	</tr>
																</tbody>
															</table>
														</div>
													</div>
												</div>
									        </div>
									    </div>
									</div>
									
								</div>
							</div>
						</div>

						<div class="panel panel-primary">
							<div class="panel-heading" role="tab" id="headingOne">
								<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#tratamiento">Diagnóstico, Pronóstico, y Plan de Tratamiento</a></h4>
							</div>
							<div id="tratamiento" class="panel-collapse collapse" role="tabpanel">
								<div class="panel-body">

									<form class="form-horizontal" role="form">
										<div class="form-group">
											<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2">Diagnóstico:</label>
											<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
												<textarea name="" id="" class="form-control" rows="2"></textarea>
											</div>
										</div>
										<div class="form-group">
											<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2">Pronóstico:</label>
											<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
												<textarea name="" id="" class="form-control" rows="2"></textarea>
											</div>
										</div>
										<div class="form-group">
											<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2">Plan de Tratamiento:</label>
											<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
												<textarea name="" id="" class="form-control" rows="2"></textarea>
											</div>
										</div>
									</form>

								</div>
							</div>
						</div>

						<div class="panel panel-primary">
							<div class="panel-heading" role="tab" id="headingOne">
								<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#actividades">Registro de Actividades de Atención Odontológicas</a></h4>
							</div>
							<div id="actividades" class="panel-collapse collapse" role="tabpanel">
								<div class="panel-body">
									<div class="table-responsive">
										<table class="table table-condensed">
											<tbody>
												<tr>
													<td><input type="text" name="" id="" class="form-control" placeholder="Radiografias"></td>
													<td width="120px"><input type="text" name="" id="" class="form-control" placeholder="Fecha estudio"></td>
													<td><input type="text" name="" id="" class="form-control" placeholder="Nombre del responsable"></td>
													<td width="180px"><button type="submit" class="btn btn-primary btn-sm">Guardar</button>&nbsp;&nbsp;<a href="#" class="btn btn-info btn-sm">Ver Histórico</a></td>
												</tr>
												<tr>
													<td><input type="text" name="" id="" class="form-control" placeholder="Laboratorio"></td>
													<td width="120px"><input type="text" name="" id="" class="form-control" placeholder="Fecha estudio"></td>
													<td><input type="text" name="" id="" class="form-control" placeholder="Nombre del responsable"></td>
													<td width="180px"><button type="submit" class="btn btn-primary btn-sm">Guardar</button>&nbsp;&nbsp;<a href="#" class="btn btn-info btn-sm">Ver Histórico</a></td>
												</tr>
											</tbody>
										</table>
									</div><br>

									<div class="table-responsive">
										<table class="table table-condensed">
											<tbody>
												<tr>
													<td>Limpieza dental</td>
													<td width="120px"><input type="text" name="" id="" class="form-control" placeholder="Fecha"></td>
													<td width="180px"><button type="submit" class="btn btn-primary btn-sm">Guardar</button>&nbsp;&nbsp;<a href="#" class="btn btn-info btn-sm">Ver Histórico</a></td>
												</tr>
												<tr>
													<td>Odontotexis</td>
													<td width="120px"><input type="text" name="" id="" class="form-control" placeholder="Fecha"></td>
													<td width="180px"><button type="submit" class="btn btn-primary btn-sm">Guardar</button>&nbsp;&nbsp;<a href="#" class="btn btn-info btn-sm">Ver Histórico</a></td>
												</tr>
												<tr>
													<td>Aplic.top de fluor</td>
													<td width="120px"><input type="text" name="" id="" class="form-control" placeholder="Fecha"></td>
													<td width="180px"><button type="submit" class="btn btn-primary btn-sm">Guardar</button>&nbsp;&nbsp;<a href="#" class="btn btn-info btn-sm">Ver Histórico</a></td>
												</tr>
												<tr>
													<td>Detec. Alteraciones De Tejidos Blandos</td>
													<td width="120px"><input type="text" name="" id="" class="form-control" placeholder="Fecha"></td>
													<td width="180px"><button type="submit" class="btn btn-primary btn-sm">Guardar</button>&nbsp;&nbsp;<a href="#" class="btn btn-info btn-sm">Ver Histórico</a></td>
												</tr>
												<tr>
													<td>Aplicación de Selladores de Fosetas y Fisuras</td>
													<td width="120px"><input type="text" name="" id="" class="form-control" placeholder="Fecha"></td>
													<td width="180px"><button type="submit" class="btn btn-primary btn-sm">Guardar</button>&nbsp;&nbsp;<a href="#" class="btn btn-info btn-sm">Ver Histórico</a></td>
												</tr>
											</tbody>
										</table>
									</div>

									<div class="table-responsive">
										<table class="table table-condensed">
											<thead>
												<tr>
													<th colspan="9">Actividades de Operatoria Dental</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<th>Organo Dentario</th>
													<th>Fecha Inicial</th>
													<th>Obturación Provisional</th>
													<th colspan="4">Material de Obturación</th>
													<th>Fecha final</th>
													<th>Responsable</th>
												</tr>
												<tr>
													<th></th>
													<th></th>
													<th></th>
													<th>Amalgama</th>
													<th>Resina</th>
													<th>SemiPerm</th>
													<th>Ionomero</th>
													<th></th>
													<th></th>
												</tr>
												<tr>
													<td>1</td>
													<td>2</td>
													<td>3</td>
													<td>4</td>
													<td>5</td>

													<td>6</td>
													<td>7</td>
													<td>8</td>
													<td>9</td>
												</tr>
												<tr>
													<td><input type="text" name="" id="" class="form-control" placeholder="Organo Dentario"></td>
													<td><input type="text" name="" id="" class="form-control" placeholder="Fecha inicial" disabled></td>
													<td><input type="text" name="" id="" class="form-control" placeholder="Obturación provisional" disabled></td>
													<td><input type="text" name="" id="" class="form-control" placeholder="Amalgama" disabled></td>
													<td><input type="text" name="" id="" class="form-control" placeholder="Resina" disabled></td>

													<td><input type="text" name="" id="" class="form-control" placeholder="SemiPerm" disabled></td>
													<td><input type="text" name="" id="" class="form-control" placeholder="Ionomero" disabled></td>
													<td><input type="text" name="" id="" class="form-control" placeholder="Fecha inicial" disabled></td>
													<td><input type="text" name="" id="" class="form-control" placeholder="Responsable"></td>
												</tr>
											</tbody>
										</table>
									</div>
									<button type="submit" class="btn btn-primary btn-sm">Guardar</button><br><br>

									<div class="table-responsive">
										<table class="table table-condensed">
											<thead>
												<tr>
													<th colspan="6">Extracciones dentarias</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<th>Organo Dentario</th>
													<th>Fecha Intervención</th>
													<th>Técnica de Anestesia</th>
													<th>Responsable</th>
													<th>Tipo de Diente</th>
													<th>Fecha Final</th>
												</tr>
												<tr>
													<td>1</td>
													<td>2</td>
													<td>3</td>
													<td>4</td>
													<td>5</td>
													<td>6</td>
												</tr>
												<tr>
													<td><input type="text" name="" id="" class="form-control" placeholder="Organo Dentario"></td>
													<td><input type="text" name="" id="" class="form-control" placeholder="Fecha Intervención"></td>
													<td><input type="text" name="" id="" class="form-control" placeholder="Técnica de Anestesia"></td>
													<td><input type="text" name="" id="" class="form-control" placeholder="Responsable"></td>
													<td><select name="" id="" class="form-control"><option>Temporal</option></select></td>
													<td><input type="text" name="" id="" class="form-control" placeholder="Fecha Final"></td>
												</tr>
											</tbody>
										</table>
									</div>
									<button type="submit" class="btn btn-primary btn-sm">Guardar</button><br><br>

									<div class="table-responsive">
										<table class="table table-condensed textarea-min">
											<thead>
												<tr>
													<th colspan="6">Sesión Terapia Pulpar</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<th>Organo Dentario</th>
													<th>Fecha Inicial</th>
													<th>Diagnóstico</th>
													<th>Tratamiento empleado</th>
													<th>Fecha Final</th>
													<th>Responsable</th>
												</tr>
												<tr>
													<td>1</td>
													<td>2</td>
													<td>3</td>
													<td>4</td>
													<td>5</td>
													<td>6</td>
												</tr>
												<tr>
													<td><input type="text" name="" id="" class="form-control" placeholder="Organo Dentario"></td>
													<td><input type="text" name="" id="" class="form-control" placeholder="Fecha Inicial"></td>
													<td><textarea name="" id="" class="form-control" rows="1"></textarea></td>
													<td><select name="" id="" class="form-control"><option>Pulpotomia</option></select></td>
													<td><input type="text" name="" id="" class="form-control" placeholder="Fecha Final"></td>
													<td><input type="text" name="" id="" class="form-control" placeholder="Reponsable"></td>
												</tr>
											</tbody>
										</table>
									</div>
									<button type="submit" class="btn btn-primary btn-sm">Guardar</button>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div><!-- /Container -->