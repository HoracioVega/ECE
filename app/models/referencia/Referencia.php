<?php
class Referencia extends Eloquent{
	
	public $primaryKey = "referencia_id";
	public $table = "expediente_referencia";
	public $timestamps = false;
	protected $fillable = array (
			'referencia_id',
			'usu_id',
			'expediente_id',
			'referencia_fecha',
			'referencia_urgencia',
			'referencia_clue_id',
			'referencia_nom_unidad',
			'referencia_referido_clue_id',
			'referencia_nom_unidad_referido',
			'referencia_dom_unidad_ref',
			'serv_id',
			'referencia_motivo',
			'evolucion_id',
			'exploracion_id',
			'diagnostico_id'
	);
	
	public static function getAllReferencias($expediente_id, $tipo, $page, $byPage)
	{
		if ($tipo == "total") {
			return DB::table('expediente_referencia')->where('expediente_id', $expediente_id)->count();
		} else {
			return DB::table('expediente_referencia')->where('expediente_id', $expediente_id)
			->skip($byPage*($page-1))->take($byPage)->orderBy('referencia_fecha', 'desc')->get();
		}
	}
	
	public static function getReferencia($idReferencia)
	{
		return DB::table('expediente_referencia')
			->join('expediente_hoja_evolucion', 'expediente_referencia.evolucion_id', '=', 'expediente_hoja_evolucion.evolucion_id')
			->join('usuarios', 'usuarios.usu_id', '=', 'expediente_referencia.usu_id')
			->join('cat_laboratorioServicios', 'expediente_referencia.serv_id', '=', 'cat_laboratorioServicios.serv_id')
			->select('referencia_fecha', 'referencia_urgencia', 'referencia_nom_unidad', 'referencia_nom_unidad_referido',
					'referencia_dom_unidad_ref', 'referencia_motivo', 'serv_nombre', 'usu_nombreUsuario', 'evolucion_ta',
					'evolucion_temp', 'evolucion_fr', 'evolucion_peso', 'evolucion_talla', 'evolucion_clinicos', 'evolucion_fc')
			->where('referencia_id', '=', $idReferencia)->get();
	}
}