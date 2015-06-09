<?php
class ViolenciaPsicologica extends Eloquent{
	protected $table='programa_det_violencia_psicologica';
	public $primary_key='det_psico_id';
	public $timestamps=false;

	protected $fillable=array('det_psico_id', 'det_psico_fecha_registro', 'expediente_id', 'usu_id',
			'det_psico_edad','det_psico_culpa', 'det_psico_culpa_detail1', 'det_psico_culpa_detail2',
			'det_psico_controla','det_psico_controla_detail1','det_psico_controla_detail2','det_psico_humilla',
			'det_psico_humilla_detail1','det_psico_humilla_detail2', 'det_psico_amenaza', 'det_psico_amenaza_detail1',
			'det_psico_amenaza_detail2','det_psico_hijos', 'det_psico_hijos_detail1', 'det_psico_hijos_detail2',
			'det_psico_sospecha');
    
       public static function ultimoCuestionarioPsico($id_paciente)
    {
        return DB::table('programa_det_violencia_psicologica')
            ->select()
            ->where('expediente_id','=',$id_paciente)
            ->orderBy('det_psico_fecha_registro', 'desc')
            ->first();
    }
    
}