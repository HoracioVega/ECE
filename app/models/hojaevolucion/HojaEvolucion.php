<?php
class HojaEvolucion extends Eloquent{
	
	protected $table= 'expediente_hoja_evolucion';
	public $primary_key='evolucion_id';
	public $timestamps=false;
	
	protected $fillable=array('evolucion_id', 'expediente_id', 'evolucion_clinicos', 
			'evolucion_tratamiento', 'evolucion_fecha',
			'evolucion_hora','evolucion_peso',
			'evolucion_talla','evolucion_ta',
			'evolucion_fc','evolucion_fr',
			'evolucion_temp','evolucion_glicemia',
			'evolucion_imc','epidemia_id' );
	
}