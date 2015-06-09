<?php

class ViolenciaFisica extends Eloquent{
	protected $table='programa_det_violencia_fisica';
	public $primary_key='det_fis_id';
	public $timestamps=false;

	protected $fillable=array('det_fis_id','det_fis_fecha_registro','expediente_id','usu_id','det_fis_edad',
			'det_fis_golpea','det_fis_golpea_detail1', 'det_fis_golpea_detail2', 'det_fis_ahorcar', 
			'det_fis_ahorcar_detail1', 'det_fis_ahorcar_detail2', 'det_fis_agredir', 'det_fis_agredir_detail1',
			'det_fis_agredir_detail2','det_fis_sospecha');
    
       public static function ultimoCuestionarioFisica($id_paciente)
    {
        return DB::table('programa_det_violencia_fisica')
            ->select()
            ->where('expediente_id','=',$id_paciente)
            ->orderBy('det_fis_fecha_registro', 'desc')
            ->first();
    }
    
}