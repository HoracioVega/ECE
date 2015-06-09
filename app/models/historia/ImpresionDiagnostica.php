<?php
class ImpresionDiagnostica extends Eloquent {

	public $table='expediente_impresion_diagnostica';
	public $primary_key='diagnostico_id';
	public $timestamps=false;
	public $_table_cat_enfermedades = "cat_enfermedades_cie10_new";

	protected $fillable = array('expediente_id','diagnostico_conclusion','diagnostico_fecha');
	
	
	public static function getEnfermedades($enf_nombre , $codigo_id , $tipo , $page, $byPage ){

		if($codigo_id!="" || $codigo_id!=0){
			$filtro = "enf_codigo";
			$params = $codigo_id;
			$like = 'LIKE';
		}else{
			$like = 'LIKE';
			$filtro = "enf_nombre";
			$params = $enf_nombre;
		}
		
		if ($tipo == "total") {
			return DB::table ( 'cat_enfermedades_cie10_new' )->where ( $filtro, $like, '%'.$params.'%' )->count();
		} else {
			return DB::table ( 'cat_enfermedades_cie10_new' )->where ( $filtro, $like, '%'.$params.'%' )->select ("enf_id", "enf_codigo", "enf_nombre", "formulario" )->skip($byPage * ($page - 1))->take($byPage)->get ();
		}
	}
}