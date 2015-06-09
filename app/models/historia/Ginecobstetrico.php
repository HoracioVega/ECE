<?php
class Ginecobstetrico extends Eloquent {
	
	protected $table='expediente_gineco';
	public $primaryKey='gineco_id';
	public $timestamps = false;
	protected $fillable = array(
			'gineco_id',
			'expediente_id',
			'metodo_id',
			'gineco_menarcaFecha',
			'gineco_tipoMenarca',
			'gineco_ritmo',
			'gineco_inicioSexual',
			'gineco_mestruacionFecha',
			'gineco_anticoncepFecha',
			'gineco_gesta',
			'gineco_cesarea',
			'gineco_para',
			'gineco_aborto','gineco_toxemia',
			'gineco_eventoObsFecha',
			'gineco_multiplePareja',
			'gineco_examenMamas',
			'gineco_papanicoFecha');
	
	public static function getAllMetodosAnticonceptivos()
	{
		return DB::table('cat_metodoAnticonceptivo')->get();
	}
}