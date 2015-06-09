<?php
class Lista_Espera extends Eloquent {

	public $prefix 		= 'consulta_';
	protected $table 		= 'expediente_consulta';
	protected $_table_clue 	= 'cat_clues';
	public $primaryKey 	= 'consulta_id';
	protected $_prefix_table_paciente = "paciente_";
	public $_utilsModel;
	
	public function obtenerLista($unidadID=null,$usrID=null,$usrNivel,$page,$byPage){
		$fecha = Date("Y-m-d");
		$filtro = $this->filtrosNivel($usrNivel,$unidadID,$usrID);
		$params = $this->paramsNivel($usrNivel,$unidadID,$usrID,$fecha);
		
		$resultSet = DB::select("SELECT R.consulta_id,R.expediente_id,
		CONCAT(P.{$this->_prefix_table_paciente}app,' ',P.{$this->_prefix_table_paciente}apm,' ',P.{$this->_prefix_table_paciente}nombre) AS nombrePaciente,
		R.consulta_hentrada,R.consulta_hconsulta,R.consulta_hsalida,R.consulta_estatus,U.usu_id,U.usu_nombreUsuario as nombreMedico
		FROM expediente_consulta AS R
		INNER JOIN paciente AS P ON	P.expediente_id = R.expediente_id	
		INNER JOIN usuarios AS U ON U.usu_id = R.consulta_medicoId
		WHERE R.consulta_fecha = ? AND R.consulta_estatus != ? {$filtro} ", $params);
		
		
		return $resultSet;
		
	}
	
	public function obtenerTotal($unidadID=null,$usrID=null,$usrNivel,$byPage){
		$fecha = Date("Y-m-d");
		$filtro = $this->filtrosNivel($usrNivel,$unidadID,$usrID);
		$params = $this->paramsNivel($usrNivel,$unidadID,$usrID,$fecha);
		
		$resultSet = DB::select("SELECT COUNT(R.consulta_id) as total FROM {$this->table} as R
		INNER JOIN usuarios as U on U.usu_id = R.consulta_medicoId
		WHERE R.consulta_fecha = ? AND R.consulta_estatus != ? {$filtro} ", $params);
		
		if($resultSet[0]->total!=null)
			$total = ceil($resultSet[0]->total/$byPage);
		else
			$total = 0;
		return $total;
	}
	
	public function obtenerEstadisticas($unidadID=null,$usrID=null,$usrNivel){
		$fecha = Date("Y-m-d");
		$filtro = $this->filtrosNivel($usrNivel,$unidadID,$usrID);
		$params = $this->paramsNivel($usrNivel,$unidadID,$usrID,$fecha);
		
		$resultSet = DB::select("SELECT R.consulta_estatus,count(*) as total FROM {$this->table} as R
		WHERE R.consulta_fecha = ? and R.consulta_estatus != ? {$filtro} GROUP BY R.consulta_estatus", $params);
		
		return $resultSet;
	}
	
	private function filtrosNivel($usrNivel,$unidadID,$usrID){
		switch($usrNivel){
			case 2: $filter = " AND R.clue_id = ? AND R.consulta_medicoId = ? "; break;
			case 8: $filter = " AND R.clue_id = ? AND R.consulta_medicoId = ? "; break;
			case 3: $filter = " AND R.clue_id = ? "; break;
			default: $filter = ""; break;
		}
		return $filter;
	}

	private function paramsNivel($usrNivel,$unidadID,$usrID,$fecha,$estatus=4){
		switch($usrNivel){
			case 2: $params = array($fecha,$estatus,$unidadID,$usrID); break;
			case 8: $params = array($fecha,$estatus,$unidadID,$usrID); break;
			case 3: $params = array($fecha,$estatus,$unidadID); break;
			default: $params = array($fecha,$estatus); break;
		}
		return $params;
	}
	
	
	public function agregarPaciente($data){
		
		//OBTENGO EL ULTIMOEXPEDIENTE GENERADO
		//$ultimo_expediente =  Expediente::find(1);
		
		$ultimo_expediente = DB::select('select MAX(expediente_id) as expediente_id from expediente');
		$util_model = new Utils();
		
		if($ultimo_expediente === null){
			$ue = 1;
		}else{
			$ue = $ultimo_expediente[0]->expediente_id + 1;
		}
		$array = array('expediente_id' => ($ue),'expediente_asignado' => ($ue), 'expediente_fecha' => date('Y-m-d') , 'expediente_hora' => date('h:i:s'), 'usu_id' => Session::get('usu_id') , 'clue_id' => Session::get('clue_id') );
		
		try {
			$this->_utilsModel = new Utils();
			$expediente = Expediente::create($array);
			$paciente = Paciente::create(array('expediente_id' => $ue , 'paciente_nombre' => $data['nombre'] , 'paciente_app' => $data['primer_apellido'] , 'paciente_apm' => $data['segundo_apellido'] , 'paciente_fecNac' => $util_model->changeDate($data['fecha_nacimiento'])));
			
			ExpedienteConsulta::create(array('usu_id' => Session::get('usu_id') ,'expediente_id' => $ue,'clue_id' => Session::get('clue_id') , 'consulta_medicoId' => $data['medico'], 'consulta_hentrada' => date('h:i:s') , 'consulta_fecha' => date('Y-m-d'),'consulta_estatus' => 1 , 'consulta_edad' => $this->_utilsModel->calculaEdadFechas($this->_utilsModel->changeDate($data['fecha_nacimiento']), date('Y-m-d'))));
			
			$flag = true;
		} catch (Exception $e) {
			var_dump($e->getMessage());
			$flag =false;
		}
		
		return $flag;
	}
	
}