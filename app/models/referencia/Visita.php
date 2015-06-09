<?php
class Visita extends Eloquent {
	
	public $primaryKey = "visita_id";
	public $table = "expediente_visita";
	public $timestamps = false;
	protected $fillable = array (
			'visita_id',
			'visita_fecha',
			'visita_alta',
			'visita_asistio',
			'visita_asistio_motivo',
			'visita_atendido',
			'visita_atendido_motivo',
			'visita_continua',
			'visita_continua_motivo',
			'visita_observaciones',
			'expediente_id',
			'usu_id'
	);
	
	public static function getAllVisitas($expediente_id, $tipo, $page, $byPage)
	{
		if ($tipo == "total") {
			return DB::table('expediente_visita')->where('expediente_id', $expediente_id)->count();
		} else {
			return DB::table('expediente_visita')->where('expediente_id', $expediente_id)
			->skip($byPage*($page-1))->take($byPage)->orderBy('visita_Fecha', 'desc')->get();
		}
	}
	
public static function getVisita($idVisita)
	{
		return DB::table('expediente_visita')
			->join('usuarios', 'usuarios.usu_id', '=', 'expediente_visita.usu_id')
			->select('visita_id', 'visita_fecha', 'visita_alta', 'visita_asistio',
					'visita_asistio_motivo', 'visita_atendido', 'visita_atendido_motivo', 'visita_continua', 'visita_continua_motivo',
					'visita_observaciones', 'usu_nombreUsuario')
			->where('visita_id', '=', $idVisita)->get();
	}

}