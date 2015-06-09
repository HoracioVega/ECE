<?php
class Paciente extends Eloquent {
	protected $table = 'paciente';
	public $primaryKey = 'paciente_id';
	public $prefix = "paciente_";
	public $timestamps = false;
	protected $fillable = array (
			'expediente_id',
			'paciente_nombre',
			'paciente_app',
			'paciente_apm',
			'paciente_fecNac',
			'paciente_nacOrigen',
			'paciente_sexo',
			'paciente_rfc',
			'paciente_calle',
			'paciente_numDom',
			'paciente_edoNac',
			'paciente_colonia',
			'paciente_edo',
			'paciente_mun',
			'paciente_localidad',
			'paciente_ocupacion',
			'paciente_edoCivil',
			'paciente_religion',
			'paciente_casoLegal',
			'paciente_tipoInterroga',
			'paciente_minisPublic',
			'paciente_informante',
			'paciente_nombreTutor',
			'paciente_parentesco',
			'paciente_fechaEstudio',
			'paciente_prospera',
			'paciente_segSocial',
			'paciente_segSocialNumero',
			'paciente_fechaVigenciaSeg',
			'paciente_discapacidad',
			'paciente_discapacidadCual',
			'paciente_indigena',
			'paciente_numTelefono',
			'paciente_finado',
			'paciente_lee_escribe',
			'escolaridad_id' 
	);
	
	public $_utilsModel;
	
	public function buscarPaciente($expedienteID,$nombre){
		
		$nombre = $nombre."%";
		
		if($expedienteID!="" || $expedienteID!=0){
			$filtro = "expediente_id";
			$params = array($expedienteID);
			$like = '=';
		}else{
			$like = 'LIKE';
			$filtro = DB::raw("CONCAT(paciente_app,' ',paciente_apm,' ',paciente_nombre)");
			$params = array($nombre);
		}
		
		return DB::table($this->table)
				->where($filtro,$like,$params)
				->select("expediente_id",DB::raw("CONCAT(paciente_app,' ',paciente_apm,' ',paciente_nombre) as nombrePaciente"),DB::raw("DATE_FORMAT(paciente_fecNac, '%d/%m/%Y') as fecha_nacimiento"))
				->get()			
		;
	}
	
	public function agregarConExpediente($data){
		
		$fecha = Date("Y-m-j");
		$pOnList  = $this->verificarPacienteLista($data['id'],$fecha);
		
		if($pOnList==0){

			try {
				
				$this->_utilsModel = new Utils();
				$p = Paciente::where('expediente_id',$data['id'])->get();
				
				//REVISAR SI EL PACIENTE QUE VAMOS A AGREGAR CUENTA CON UNA CONSULTA EN EL AÑO,
				//SI TIENE ALMENOS UNA CONSULTA EN ESTE AÑO SE VUELVE SUBSECUENTE , EN CASO CONTRARIO ES CONSULTA DE PRIMERA VEZ.
				$retrievePacienteConsulta = ExpedienteConsulta::where('expediente_id' ,'=' , $data['id'])
											->where('consulta_fecha' , 'LIKE' ,'%'.date("Y").'%')
											->get()->count();
				
				if($retrievePacienteConsulta > 0)
					$subsecuente = 1;
				else 
					$subsecuente = 0;
				
				$array = array('usu_id' => $data['usu_id'] ,'expediente_id' => $data['id'],'clue_id' => $data['clue_id'] , 'consulta_medicoId' => $data['m'], 'consulta_hentrada' => date('h:i:s') , 'consulta_fecha' => date('Y-m-d'),'consulta_estatus' => 1 ,'consulta_subsecuente' => $subsecuente , 'consulta_edad' => $this->_utilsModel->calculaEdadFechas($p[0]->paciente_fecNac, date('Y-m-d')));
					
				ExpedienteConsulta::create($array);
				
				return 1;
				
			} catch (Exception $e) {
				
				var_dump($e->getMessage());
				return 0;
				
			}
			
			
			
		} else return 0;
	}
	
	function verificarPacienteLista($expedienteID,$fecha){
		
		return ExpedienteConsulta::
					where('expediente_id',$expedienteID)
					->where('consulta_fecha',$fecha)
					->count();
	}
	
	public static function generateRFC($name, $app, $apm, $date)
	{
		list($year, $month, $day)=explode("/", $date);
		$rfc = substr($app,0,2).substr($apm,0,1).substr($name,0,1).substr($year,2).$month.$day;
		return strtoupper($rfc);
	}

    /**********************************************************************************************
     * CONJUNTO DE MÉTODOS QUE CARGAN LOS CATÁLOGOS RELACIONADOS DIRECTAMENTE CON EL PACIENTE.
     **********************************************************************************************/
    public static function getAllProgramasSS()
    {
        return DB::table('cat_seguridad_social')->get();
    }

    public static function getNameProgramaSS($idPrograma)
    {
    	return DB::table('cat_seguridad_social')->select('seg_nombre')->where('seg_id', $idPrograma)->get();
    }
    
    public static function getAllEntidades()
    {
        return DB::table('cat_entidades')->get();
    }

    public static function getAllMunicipiosForEntidad($cve_ent)
    {
        return DB::table('cat_municipios')->where('cve_ent', $cve_ent)->get();
    }

    public static function getAllLocalidadesForEntAndMun($cve_ent, $cve_mun)
    {
        return DB::table('cat_localidades')->where('cve_ent', $cve_ent)->where('cve_mun', $cve_mun)->get();
    }

    public static function getAllOcupaciones()
    {
        return DB::table('cat_ocupacion')->get();
    }

    public static function getAllEdoCivil()
    {
        return DB::table('cat_estado_civil')->get();
    }

    public static function getAllReligiones()
    {
        return DB::table('cat_religion')->get();
    }

    public static function getAllEscolaridades()
    {
        return DB::table('cat_escolaridad')->orderBy('escolaridad_indice')->get();
    }
}