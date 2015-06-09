<?php
class ExamenSol extends Eloquent {
	
	protected $table= 'expediente_laboratorio';
	public $primary_key='lab_id';
	public $timestamps=false;
	
	protected $fillable=array('expediente_id', 'serv_id', 'lab_fecha', 'lab_urgente', 'lab_diagnostico',
			'lab_estudio','lab_impresion', 'lab_tipo' );
	
	public function busca_estudios($id,$page,$byPage){
		
		$estudios_pasados = DB::table('expediente_laboratorio')
		->select('lab_fecha', 'lab_urgente', 'lab_estudio', 'lab_id')
		->where('expediente_id', $id)
		->join('cat_laboratorioServicios', 'expediente_laboratorio.serv_id', '=', 'cat_laboratorioServicios.serv_id')
		->skip($byPage*($page-1))->take($byPage)
		->orderBy('lab_fecha', 'desc')
		->get();
		
		$total= DB::table('expediente_laboratorio')
		->where('expediente_id', $id)
		->count();
		
		return array('estudios'=>$estudios_pasados, 'total'=> $total);
	}
	
	public function obtenEstudioEspecifico($id_estudio){
		
		$estudio_especifico= DB::table($this->table)
		->where('lab_id', $id_estudio)
		->join('cat_laboratorioServicios', 'expediente_laboratorio.serv_id', '=', 'cat_laboratorioServicios.serv_id')
		->get();
		
		return $estudio_especifico;
	}
	
	
	public function catalogoServicio(){
		
		return DB::table('cat_laboratorioServicios')->select()->get();
		
	}
	
	public function estudiosLaboratorio($id,$page,$byPage){
		
		$estudios_pasados = DB::table('expediente_laboratorio')
		->select('lab_fecha', 'lab_urgente', 'lab_estudio', 'lab_id')
		->where('expediente_id', $id)
		->where('lab_tipo', 1)
		->join('cat_laboratorioServicios', 'expediente_laboratorio.serv_id', '=', 'cat_laboratorioServicios.serv_id')
		->skip($byPage*($page-1))->take($byPage)
		->orderBy('lab_fecha', 'desc')
		->get();
		
		$total= DB::table('expediente_laboratorio')
		->where('expediente_id', $id)
		->where('lab_tipo', 1)
		->count();
		
		
		return array('estudios'=>$estudios_pasados, 'total'=> $total);
	}
	
	public function buscaGabinete($id,$page, $byPage){
	
		$estudios_pasados = DB::table('expediente_laboratorio')
		->select('lab_fecha', 'lab_diagnostico', 'lab_estudio', 'lab_id')
		->where('expediente_id', $id)
		->where('lab_tipo', 0)
		->join('cat_laboratorioServicios', 'expediente_laboratorio.serv_id', '=', 'cat_laboratorioServicios.serv_id')
		->skip($byPage*($page-1))->take($byPage)
		->orderBy('lab_fecha', 'desc')
		->get();
	
		$total= DB::table('expediente_laboratorio')
		->where('expediente_id', $id)
		->where('lab_tipo', 1)
		->count();
	
	
		return array('estudios'=>$estudios_pasados, 'total'=> $total);
	}
	
}