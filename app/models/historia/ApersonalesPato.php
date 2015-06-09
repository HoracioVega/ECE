<?php
class ApersonalesPato extends Eloquent {
	protected $table='expediente_patologicos';
	public $primary_key='pato_id';
	public $timestamps = false;
	protected $fillable = array('expediente_id', 'pato_sarampion', 'pato_rubeola', 'pato_tosferina','pato_varicela',
			'pato_escarlatina','pato_amigdalitis','pato_hepatitis','pato_parasitos','pato_convulciones',
			'pato_urospsis','pato_traumatismo','pato_cirugia','pato_hospital','pato_otros', 'pato_alergias',
			'pato_hta','pato_sobrepeso','pato_obesidad','pato_dm', 'pato_htadetail','pato_sobrepesodetail',
			'pato_obesidaddetail', 'pato_dmdetail', 'pato_sarampiondetail', 'pato_rubeoladetail','pato_tosferinadetail',
			'pato_variceladetail','pato_escarlatinadetail','pato_amigdalitisdetail','pato_hepatitisdetail',
			'pato_parasitosdetail','pato_convulcionesdetail', 'pato_urospsisdetail', 'pato_traumatismodetail',
			'pato_cirugiadetail','pato_hospitaldetail', 'pato_otrosdetail','pato_alergiasdetail');
}