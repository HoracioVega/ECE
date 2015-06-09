<?php
class Perfil extends Eloquent{
	
	protected $table 		= 'expediente_perfil';
	public $primaryKey 	= 'perfil_id';
	public $timestamps = false;
	protected $fillable = array('expediente_id','perfil_signos', 'perfil_sintomas', 'perfil_timevol'
							,'perfil_timevol2', 'perfil_timevol3', 'perfil_timevol4'
							,'perfil_descripcion', 'perfil_fecha' );
}