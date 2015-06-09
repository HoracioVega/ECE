<?php
class EnfermedadDetalle extends Eloquent {

	public $table='expediente_imp_diag_enfermedad';
	public $primary_key='temp_id';
	public $timestamps=false;
	public $_table_cat_enfermedades = "cat_enfermedades_cie10_new";

	protected $fillable = array('diagnostico_id','enf_id','temp_fecha',
			'temp_opcion_formulario','temp_formulario_llenado',
			'temp_formulario_guardado','temp_tipo_formulario'
			,'temp_status');

	
	
	
	
}	
