<?php
class Expediente extends Eloquent {

	protected $table 		= 'expediente';
	public $primaryKey 	= 'expediente_id';
	public $timestamps = false;
	protected $fillable = array('expediente_id','expediente_asignado', 'expediente_fecha', 'expediente_hora' , 'usu_id', 'clue_id');
	
}