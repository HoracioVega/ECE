<?php
class ViolenciaSexual extends Eloquent{
	
	protected $table='programa_det_violencia_sexual';
	public $primary_key='det_sex_id';
	public $timestamps=false;

	protected $fillable=array('det_sex_id','det_sex_fecha_registro', 'expediente_id', 'usu_id', 'det_sex_edad', 
			'det_sex_tocamientos','det_sex_tocamientos_detail1','det_sex_tocamientos_detail2','det_sex_relaciones_violencia',
			'det_sex_rel_violencia_detail1', 'det_sex_rel_violencia_detail2', 'det_sex_rel_embarazo','det_sex_rel_embarazo_detail1',
			'det_sex_rel_embarazo_detail1', 'det_sex_rel_embarazo_detail2', 'det_sex_sospecha');
    
    public static function ultimoCuestionario($id_paciente)
    {
        
       $fecha= DB::table('programa_det_violencia_sexual')
           ->select('det_sex_fecha_registro')
           ->where('expediente_id','=',$id_paciente)
           ->orderBy('det_sex_fecha_registro', 'desc')
           ->first();
        
        return $fecha->det_sex_fecha_registro;
    }
    
    public static function ultimoCuestionarioSexual($id_paciente)
    {
        return DB::table('programa_det_violencia_sexual')
            ->select()
            ->where('expediente_id','=',$id_paciente)
            ->orderBy('det_sex_fecha_registro', 'desc')
            ->first();
    }
    
    
}