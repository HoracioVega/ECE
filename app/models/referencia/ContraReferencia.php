<?php
class ContraReferencia extends Eloquent {

	public $primaryKey = "contraref_id";
	public $table = "expediente_contrareferencia";
	public $timestamps = false;
	protected $fillable = array (
			'contraref_id',
			'contraref_origen_clue_id',
			'contraref_unidad_origen',
			'contraref_dom',
			'serv_id',
			'contraref_motivo',
			'contraref_diganostico_ing',
			'contraref_diagnostico_egr',
			'contraref_instrucciones',
			'contraref_tratamiento_estatus',
			'contraref_cont_trata',
			'expediente_id',
			'contraref_fecha',
			'contraref_subsecuente',
			'usu_id',
			'evolucion_id'
	);
	
	public static function getAllContraReferencias($expediente_id, $tipo, $page, $byPage)
	{
		if ($tipo == "total") {
			return DB::table('expediente_contrareferencia')->where('expediente_id', $expediente_id)->count();
		} else {
			return DB::table('expediente_contrareferencia')->where('expediente_id', $expediente_id)
			->skip($byPage*($page-1))->take($byPage)->orderBy('contraref_fecha', 'desc')->get();
		}
	}
	
	public static function getContraReferencia($contraferencia_id)
	{
		return DB::table('expediente_contrareferencia')
			->join('cat_laboratorioServicios', 'expediente_contrareferencia.serv_id', '=', 'cat_laboratorioServicios.serv_id')
			->join('usuarios', 'usuarios.usu_id', '=', 'expediente_contrareferencia.usu_id')
			->join('expediente_hoja_evolucion', 'expediente_hoja_evolucion.evolucion_id', '=', 'expediente_contrareferencia.evolucion_id')
			->where('contraref_id', '=', $contraferencia_id)->get();
	}
}