<?php
class Terapeutica extends Eloquent {
	
	protected $table='expediente_receta';
	public $primary_key='receta_id';
	public $timestamp=false;
	
	protected $fillable=array('expediente_id','usu_id','clue_id','serv_id','receta_fecha','receta_referencia',
			'receta_diagnostico','receta_observa');
	
	
	// MÉTODOS CON PAGINATOR
	public static function getAllRecetas($expediente_id, $tipo, $page, $byPage)
	{
		if ($tipo == "total") {
			return DB::table('expediente_receta')->where('expediente_id', $expediente_id)->count(); 
		} else {
			return DB::table('expediente_receta')->where('expediente_id', $expediente_id)
				->skip($byPage*($page-1))->take($byPage)->orderBy('receta_fecha', 'desc')->get();
		}
	}
	
	public static function searchMedicamentoByNamePg($enf_nombre, $tipo, $page, $byPage)
	{
		if ($tipo == "total") {
			return DB::table('cat_medicamentos')->join('cat_Areas_Medicamentos', 'cat_medicamentos.id_area', '=', 'cat_Areas_Medicamentos.id_area')
				->where('nombre_gen', 'LIKE', '%'.$enf_nombre.'%')->count();
		} else {
			return DB::table('cat_medicamentos')->join('cat_Areas_Medicamentos', 'cat_medicamentos.id_area', '=', 'cat_Areas_Medicamentos.id_area')
				->where('nombre_gen', 'LIKE', '%'.$enf_nombre.'%')->skip($byPage*($page-1))->take($byPage)->get();
		}
	}
	public static function searchMedicamentoByCvePg($cve, $tipo, $page, $byPage)
	{
		if ($tipo == "total") {
			return DB::table('cat_medicamentos')->join('cat_Areas_Medicamentos', 'cat_medicamentos.id_area', '=', 'cat_Areas_Medicamentos.id_area')
			->where('nombre_gen', 'LIKE', '%'.$cve.'%')->count();
		} else {
			return DB::table('cat_medicamentos')->join('cat_Areas_Medicamentos', 'cat_medicamentos.id_area', '=', 'cat_Areas_Medicamentos.id_area')
			->where('clave', 'LIKE', '%'.$cve.'%')->skip($byPage*($page-1))->take($byPage)->get();
		}
	} // FIN MÉTODOS CON PAGINATOR
	
	
	// Busca un medicamento por nombre
	public static function searchMedicamentoByName($name, $page=1)
	{
		return DB::table('cat_medicamentos')->join('cat_Areas_Medicamentos', 'cat_medicamentos.id_area', '=', 'cat_Areas_Medicamentos.id_area')
			->where('nombre_gen', 'LIKE', '%'.$name.'%')->get();
	}
	
	
	// Buscua un medicamento por clave
	public static function searchMedicamentoByCve($cve, $page=1)
	{
		return DB::table('cat_medicamentos')->join('cat_Areas_Medicamentos', 'cat_medicamentos.id_area', '=', 'cat_Areas_Medicamentos.id_area')
			->where('clave', 'LIKE', '%'.$cve.'%')->get();
	}
	
	
	// Regresa la lista de los servicios
	public static function getAllServicios()
	{
		return DB::table('cat_laboratorioServicios')->get();
	}
	
	
	// Guarda un medicamento en la tabla temporal
	public function saveMedicamentoTmp($data)
	{
		if (DB::table('expediente_receta_tmp')->where('receta_tmp_cve', $data['receta_tmp_cve'])->where('usu_id', $data['usu_id'])->get()) {
			return false;
		} else {
			DB::table('expediente_receta_tmp')->insert($data);
		}
				
		return DB::table('expediente_receta_tmp')->where('expediente_id', $data['expediente_id'])->where('receta_fecha', $data['receta_fecha'])->get();
	}
	
	
	// Elimina un medicamento de la lista de temporales
	public function deleteMedicamentoTmp($data)
	{
		DB::table('expediente_receta_tmp')->where('receta_tmp_id', $data['id'])->delete();

		return DB::table('expediente_receta_tmp')->where('expediente_id', $data['expediente_id'])->where('receta_fecha', $data['receta_fecha'])
			->where('usu_id', $data['usu_id'])->get();
	}
	
	
	// Guarda la receta
	public function saveReceta($data)
	{
		// Guardamos los datos generales de la receta y obtenemos el ID
		$idReceta = DB::table('expediente_receta')->insertGetId($data);
		
		// Obtenemos la lista de medicamentos temporal del paciente
		$tmpMedicamentos = DB::table('expediente_receta_tmp')->where('expediente_id', $data['expediente_id'])->where('usu_id', $data['usu_id'])->get();
		
		// Los adecuamos al formato de la tabla de detalles de receta
		$medicamentos = array();
		$med = array();
		foreach ($tmpMedicamentos as $medicamento) {
			$medicamentos['receta_id'] = $idReceta;
			$medicamentos['recdetalle_clave'] = $medicamento->receta_tmp_cve;
			$medicamentos['recdetalle_farmaco'] = $medicamento->receta_tmp_nombre;
			$medicamentos['recdetalle_presentacion'] = $medicamento->receta_tmp_present;
			$medicamentos['recdetalle_cantidad'] = $medicamento->receta_tmp_cantidad;
			$medicamentos['recdetalle_indicaciones'] = $medicamento->receta_tmp_indicacion;
			$medicamentos['recdetalle_duracion'] = $medicamento->receta_tmp_duracion;
			$med[] = $medicamentos;
		}
		
		// Insertamos los detalles de la receta
		DB::table('expediente_recetaDetalle')->insert($med);
		
		// Eliminamos lo temporal
		DB::table('expediente_receta_tmp')->where('usu_id', $data['usu_id'])->where('expediente_id', $data['expediente_id'])->delete();
		
		// Cambiamos de estatus al paciente
		DB::table('expediente_consulta')
			->where('expediente_id', $data['expediente_id'])
			->where('consulta_estatus', 2)
			->where('consulta_fecha', date('Y-m-d'))
			->update(array('consulta_estatus' => 3));
		
		return $idReceta;
	}
	
	
	public function getDetalleReceta($idReceta)
	{
		return DB::table('expediente_recetaDetalle')->where('receta_id', $idReceta)->get();
	}
	
	public function getReceta($idReceta)
	{
		return DB::table('expediente_receta')->join('usuarios', 'usuarios.usu_id', '=', 'expediente_receta.usu_id')
			->where('receta_id', $idReceta)->get();
	}
	
	public function getLastReceta($paciente)
	{
		return DB::table('expediente_receta')->where('expediente_id', $paciente)->orderBy('receta_id', 'desc')->first();
	}
}