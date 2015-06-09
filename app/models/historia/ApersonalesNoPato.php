<?php
class ApersonalesNoPato extends Eloquent{
	protected $table='expediente_no_patologicos';
	public $primary_key='no_pato_id';
	public $timestamps=false;
	
	protected $fillable = array('no_pato_dieta', 'no_pato_tabaco','no_pato_alcohol', 'no_pato_drogas',
			'no_pato_tabacoDetail','no_pato_alcoholDetail', 'no_pato_drogasdetail', 'no_pato_servicios',
			'no_pato_fauna', 'no_pato_faunadetail', 'no_pato_promiscuidad', 'no_pato_hacinamto','expediente_id',
			'no_pato_vivienda');
}