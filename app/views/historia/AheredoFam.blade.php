<?php 
if(!isset($current)){
	$datos = null;
}
else{
	$columns = $current;
	foreach ($columns as $valor):
	$datos[$valor['heredo_parte']][$valor['heredo_fam']] = $valor;
	endforeach;
}

$sel = 'checked';
$familiares = array (
		'Materno' => array (
				'abuela',
				'abuelo',
				'madre',
				'otro'
		),
		'Paterno' => array (
				'abuela',
				'abuelo',
				'padre',
				'otro'
		)
);

$columnas = array (
		'heredo_hta',
		'heredo_dm',
		'heredo_cancer',
		'heredo_tb',
		'heredo_alergias',
		'heredo_finado',
		'heredo_sano',
		'heredo_otro'
);
?>

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
					<div class="page-header nomargintop">
						<h4>Antecedentes Heredofamiliares</h4>
						<a href="#" class="btn btn-primary btn-sm save-heredo" data="0"><span
							class="glyphicon glyphicon-floppy-disk"></span><span
							class="pageh-text-btn">Guardar</span></a> 
						<a href="#" class="btn btn-primary btn-sm save-heredo" data="4"><span
							class="glyphicon glyphicon-arrow-right"></span><span
							class="pageh-text-btn">Siguiente</span></a> 
						<a href="#" class="btn btn-primary btn-sm save-heredo" @if (Session::get('paciente_sexo') == 'M') data="18" @else data="2" @endif><span
							class="glyphicon glyphicon-arrow-left"></span><span
							class="pageh-text-btn">Anterior</span></a> 
						<a href="#" class="btn btn-danger btn-sm"><span
							class="glyphicon glyphicon-warning-sign"></span><span
							class="pageh-text-btn">Llenar Línea de vida</span></a>
					</div>

					<div class="row">
					{{ Form::open(array( 'id' => 'formAHeredo', 'role' => 'form')) }}

					{{ Form::hidden('expediente_id', $expediente_id,
					array('class'=>'form-control' , 'id' => 'expediente_id')) }}
					<?php foreach($familiares as $lado => $parientes){?>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="page-header nomargintop">
									<h4 class="nomarginbot">Familia <?php echo ucfirst($lado); ?></h4>
								</div>
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<div class="table-responsive">
											<table class="table table-hover table-striped textarea-min radio-min">
												<thead>
													<tr>
														<th></th>
														<?php foreach($columnas as $columna){?>
														    <th><?php echo strtoupper(substr($columna,7)); ?></th>
														<?php }?>
													</tr>
												</thead>
												<tbody>
												
												 <?php foreach($parientes as $pariente){ $prt=strtolower($pariente); $ld=strtolower($lado);?>
										        	<?php if ($lado == "Paterno" && $pariente == "Madre") {
													        			$pariente = "Padre";
													        		} ?>
												    <tr>
													<td><strong><?php echo ucfirst($pariente)?></strong></td>
													
													<!-- dems columnas dinamicas -->
												        <?php foreach($columnas as $columna){ $col=strtolower($columna); //echo $col."|";?>
												        	
												        	<?php
													        		if ($ld == "paterno" && $prt == "madre") {
													        			$prt = "padre";
													        		}
													        		
													        		/*if ($lado == "Paterno" && $pariente == "Madre") {
													        			$pariente = "Padre";
													        		}*/
													        	?>
												        	
												            <td>
												            <div class="radio inline">
												            	<label class="radio "> 
													            	<input type="radio" name="<?php echo $pariente?><?php echo $columna?><?php echo $lado?>"
																	id="<?php echo $pariente?><?php echo $columna?><?php echo $lado?>1" value="No"
																	<?php echo (!$datos[$ld][$prt][$col] || $datos[$ld][$prt][$col] == "No")?$sel:'';?>
																	onclick="javascript:showDetail('<?php echo $pariente?><?php echo $columna?><?php echo $lado?>', this.value)" />
																	{{'No'}}
																</label>
																<label class="radio "><input type="radio" name="<?php echo $pariente?><?php echo $columna?><?php echo $lado?>"
																		id="<?php echo $pariente?><?php echo $columna?><?php echo $lado?>2" value="Si"
																		<?php echo ($datos[$ld][$prt][$col] == "Si")?$sel:'';?>
																		onclick="javascript:showDetail('<?php echo $pariente?><?php echo $columna?><?php echo $lado?>', this.value)" />
																		{{'Si'}}
																</label>
															</div>	
															<div class="inline">
																	<textarea
																	 id="<?php echo $pariente?><?php echo $columna?><?php echo $lado?>detail"
																		name="<?php echo $pariente?><?php echo $columna?><?php echo $lado?>detail"
																		style='display:<?php echo ($datos[$ld][$prt][$col] == 'No')?"none":""; ?>'><?php echo $datos[$ld][$prt]["{$col}detail"]?></textarea>
															</div>
															</td>
												        <?php }?>
												    </tr>
											    <?php } ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php }?>	
					{{ Form::close() }}
					</div>

					<div class="btns-form-ad">
						<a href="#" class="btn btn-primary btn-sm save-heredo" data="2"><span
							class="glyphicon glyphicon-arrow-left"></span><span
							class="pageh-text-btn">Anterior</span></a> 
						<a href="#"
							class="btn btn-primary btn-sm save-heredo" data="4"><span
							class="glyphicon glyphicon-arrow-right"></span><span
							class="pageh-text-btn">Siguiente</span></a> 
						<a href="#"
							class="btn btn-primary btn-sm save-heredo" data="0"> <span
							class="glyphicon glyphicon-floppy-disk"></span><span
							class="pageh-text-btn">Guardar</span>
						</a>
					</div>
				</div>
			</div>

		</div>
	</div>


</div>
<!-- /Container -->
<script>

function showDetail(campo, tipo)
{
	if(tipo == 'Si'){
	    $("#"+campo+'detail').css('display','inline');
	}else{
		$("#"+campo+'detail').val('');
		$("#"+campo+'detail').hide();
	}
}
																		
$(document).ready(OnCreate);

function OnCreate(){

    url = "heredofamiliar/saveheredofamiliar";
	options = {
		'url':url,
		'type':'POST',
		'datatype':'json'
	};

	frm = $('#formAHeredo');

	$('.save-heredo').on("click", {params:options, form:frm}, saveHeredo);

}
function saveHeredo(event){

	console.log(event.currentTarget.attributes.data.nodeValue);
	var view = $(this).attr('data');
	if($('#explo_fecha').val()=="__/__/____"){
		 showAlert("error", "Proporcione la fecha de captura");
		 $('#explo_fecha').addClass('mark-up-error');
	}else{
		flag = true;
		//console.log(event.data.form);
		if ($(event.data.form).valid()){
			
			$.ajax({
				type: event.data.params.type,
				url: event.data.params.url,
				data: event.data.form.serialize(),
				dataType: event.data.params.datatype
			})
			.done(function(data){
				if (data.proceso == false){
					showAlert("error", "No se pudo modificar el registro del paciente");
				}else{
					if(view == 0){
					showAlert("success", "Los antecedentes heredofamiliares han sido modificado correctamente");
					}else{
					console.log(view);
					getView(view);//Me carga el siguiente formulario.
					}
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