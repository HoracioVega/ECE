<?php
class ExpedienteConsulta extends Eloquent {
	protected $table = 'expediente_consulta';
	public $primaryKey = 'consulta_id';
	public $timestamps = false;
	protected $fillable = array (
			'usu_id',
			'expediente_id',
			'clue_id',
			'consulta_medicoId',
			'consulta_hentrada',
			'consulta_hconsulta',
			'consulta_hsalida',
			'consulta_fecha',
			'consulta_estatus',
			'consulta_edad',
			'consulta_temporal',
			'consulta_subsecuente',
			'agenda_id' 
	);
	public static function validaHoraEntrada($expediente) {
		try {
			if (Session::get ( 'usu_nivel' ) != 1) {
				$retrieveInformationRecord = ExpedienteConsulta::where ( 'expediente_id', '=', $expediente )->where ( 'consulta_fecha', '=', date ( 'Y-m-d' ) )->where ( 'consulta_medicoId', '=', Session::get ( 'usu_id' ) )->select ( 'consulta_hconsulta' )->get ()->toArray ();
			} else {
				$retrieveInformationRecord = ExpedienteConsulta::where ( 'expediente_id', '=', $expediente )->where ( 'consulta_fecha', '=', date ( 'Y-m-d' ) )
				//->where('usu_id' , '=' , Session::get('usu_id'))//EN ESTE CASO COMO EL MEDICO PUEDE AGENDAR ES POSIBLE QUE LA ENFERMERA NO TENGA REGISTRO DE ESTE PACIENTE,
				//PERO PODEMOS QUITARLE LA VALIDACION PARA QUE SOLO HAGA EL MATCH CON LA FECHA Y EL EXPEDIENTE QUE SE GENERO.
				->select( 'consulta_hconsulta' )->get ()->toArray ();
			}
			if ($retrieveInformationRecord [0] ['consulta_hconsulta'] == 0 || $retrieveInformationRecord [0] ['consulta_hconsulta'] == '' || $retrieveInformationRecord [0] ['consulta_hconsulta'] == null || $retrieveInformationRecord [0] ['consulta_hconsulta'] == 'NULL') {
				return false;
			} else {
				return true;
			}
		} catch ( Exception $e ) {
			var_dump($e->getMessage());
		}
	}
}