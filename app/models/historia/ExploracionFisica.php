<?php
class ExploracionFisica extends Eloquent {
	
	protected $table='expediente_exploracion_fisica';
	public $primary_key='explo_id';
	public $timestamps=false;
	
	protected $fillable = array('expediente_id','explo_fecha','explo_peso','explo_talla','explo_pulso',
			'explo_resp','explo_temp','explo_ta','explo_imc','explo_glicemia','explo_sitcraneo','explo_craneo',
			'explo_sitcara','explo_cara','explo_refrojo','explo_sitojo','explo_ojo','explo_sitnariz','explo_nariz',
			'explo_sitboca','explo_boca','explo_sitcuello','explo_cuello','explo_sittorax','explo_torax',
			'explo_sitrespira','explo_respira','explo_sitdigestivo','explo_digestivo','explo_sitcardio',
			'explo_cardio','explo_sitabdomen','explo_abdomen','explo_sitgenituario','explo_genituario',
			'explo_sitextremidades','explo_extremidades','explo_sitesqueletico','explo_esqueletico',
			'explo_sitsnc','explo_snc', 'explo_sitotras', 'explo_otras'	);
	
}

