<?php
use Illuminate\Support\Facades\Input;

class ImpresionController extends BaseController{


	public function getIndex()
	{
		$expediente = Input::get('exp_id');
		$retrieveCurrentData = ImpresionDiagnostica::where('expediente_id' , '=' , $expediente)->where(DB::raw("DATE(diagnostico_fecha)"),'=',date('Y-m-d'))->get();
		return  View::make('historia.ImpresionDiag')->with(array('expediente_id' => $expediente , 'current' => $retrieveCurrentData));
	}
	
	public function postSaveimpresion(){
		
		if(Request::ajax())
		{
			$data = Input::all();
			$data = Input::except('_token');
			unset($data['page']);unset($data['totalpage']);
			$data['diagnostico_fecha'] = Utils::changeDate($data['diagnostico_fecha']).' '.date('h:i:s');
			
			try {
				$checkDataExists = ImpresionDiagnostica::where('expediente_id' , '=' , $data['expediente_id'])->where(DB::raw("DATE(diagnostico_fecha)"),'=',date("Y-m-d"))->get()->count();
				if($checkDataExists == 0){
						
					ImpresionDiagnostica::create($data);
						
				}else{
					$retrieveData = ImpresionDiagnostica::where('expediente_id' , '=' , $data['expediente_id'])->where(DB::raw("DATE(diagnostico_fecha)"),'=',date("Y-m-d"))->get();
					ImpresionDiagnostica::where('diagnostico_id' , '=' , $retrieveData[0]->diagnostico_id)->update($data);
				}
					
				$flag = true;
					
			} catch (Exception $e) {
				$flag = false;
				var_dump($e->getMessage());
			}
			
			return Response::json(array('proceso' => $flag ));
		}
	}
	
	public function getEliminarenfermedad(){
		
		if(Request::ajax())
		{
		$data = Input::all();
		
		try {
			
			$affectedRows = EnfermedadDetalle::where('temp_id', '=', $data['temp_id'])->delete();
			if($affectedRows > 0)
				$flag = true;
			else
				$flag = false;
			
		} catch (Exception $e) {
			var_dump($e->getMessage());
			$flag = false;
		}
		return Response::json(array('proceso' => $flag ));
		}
	}
	
	public function getSearchenfermedadmodal(){
		return View::make('historia.modals.searchEnfermedadModal');
	}
	
	public function getBuscarenfermedad(){
		
		if(Input::get('page') !== null)
			$page = Input::get('page');
		else
			$page = 1;
		
		$byPage = Input::get('byPage');
		
		$data = Input::all();
		
		$total = ImpresionDiagnostica::getEnfermedades($data['enf_nombre'],$data['codigo_id'], "total" , $page, $byPage);
		$total = ceil($total / $byPage);
		$total = ($total==0)?1:$total;
		
		$request_pagination = array("page"=>$page,"total"=>$total,"bypage"=>$byPage);
		
		if($data['enf_nombre']!="" || $data['codigo_id']!=""){
			$request_enfermedades['request'] = ImpresionDiagnostica::getEnfermedades($data['enf_nombre'],$data['codigo_id'] , "registros" , $page, $byPage);
			if($request_enfermedades['request'] != null){
				$request_enfermedades['paginacion'] = $request_pagination;
			}else{
				$request_enfermedades['paginacion'] = null;
			} 
		}
		
		return Response::json($request_enfermedades);
	}
	
	public function getElegirenfermedad(){
		
		$data = Input::all();
		unset($data['enf_codigo']);
		//var_dump($data);die;
		
		try {
			//ESTO ES EN CASO DE QUE SELECCIONEN UNA ENFERMEDAD Y NO HAYA GUARDADO PRIMERO EL FORMULARIO GUARDO DATOS POR DEFAULT PARA OBTENER la clave diagnostico_id.
			
			$checkDataExists = ImpresionDiagnostica::where('expediente_id' , '=' , $data['expediente_id'])->where(DB::raw("DATE(diagnostico_fecha)"),'=',date("Y-m-d"))->get()->count();
			
			if($checkDataExists == 0){
				
				$defaultData = array('expediente_id' => $data['expediente_id'],'diagnostico_fecha' => date('Y-m-d h:i:s'));
				
				ImpresionDiagnostica::create($defaultData);
				
				$retrieveData = ImpresionDiagnostica::where('expediente_id' , '=' , $data['expediente_id'])->where(DB::raw("DATE(diagnostico_fecha)"),'=',date("Y-m-d"))->get();
				//AGREGO ESTOS CAMPOS QUE SON NECESARIOS EN MI MODEL
				$data['diagnostico_id'] = $retrieveData[0]->diagnostico_id;
				$data['temp_fecha'] = date('Y-m-d h:i:s');
				
				//INSERTO LA ENFERMEDAD SELECCIONADA CON LOS PARAMETROS OBTENIDOS
				EnfermedadDetalle::create($data);
				$flag = true;
				
			}else{
				
				$retrieveData = ImpresionDiagnostica::where('expediente_id' , '=' , $data['expediente_id'])->where(DB::raw("DATE(diagnostico_fecha)"),'=',date("Y-m-d"))->get();
				//AGREGO ESTOS CAMPOS QUE SON NECESARIOS EN MI MODEL
				$data['diagnostico_id'] = $retrieveData[0]->diagnostico_id;
				$data['temp_fecha'] = date('Y-m-d h:i:s');
				
				//VALIDO SI YA EXISTEN LOS DATOS INSERTADOS EL MISMO DIA EN CASO CONTRARIO MANDO UN ALERT QUE YA ESTA SETEADO EL VALOR.
				$checkEnferExists = EnfermedadDetalle::where('diagnostico_id' , '=' , $data['diagnostico_id'])
														->where("enf_id",'=',$data['enf_id'])
														->where(DB::raw("DATE(temp_fecha)"),'=',date("Y-m-d"))
														->get()->count();
				if($checkEnferExists == 0){
				
					EnfermedadDetalle::create($data);
					$flag = true;
				}else{
				
					$flag = false;
				}
			}
				
		} catch (Exception $e) {
			$flag = false;
			var_dump($e->getMessage());
		}
		return Response::json(array('proceso' => $flag ));
	}
	
	public function postObtenerlistaenfermedad(){

		if(Input::get('page') !== null)
			$page = Input::get('page');
		else
			$page = 1;
		
		$byPage = Input::get('byPage');
		
		$data = Input::all();
		
		$total =  DB::table('expediente_impresion_diagnostica')
            		->join('expediente_imp_diag_enfermedad', 'expediente_impresion_diagnostica.diagnostico_id', '=', 'expediente_imp_diag_enfermedad.diagnostico_id')
           	 		->count();
		
		$total = ceil($total / $byPage);
		$total = ($total==0)?1:$total;
		
		$request_pagination = array("page"=>$page,"total"=>$total,"bypage"=>$byPage);
		
		$request_enfermedades['request'] = DB::table('expediente_impresion_diagnostica')
            		->join('expediente_imp_diag_enfermedad', 'expediente_impresion_diagnostica.diagnostico_id', '=', 'expediente_imp_diag_enfermedad.diagnostico_id')
           	 		->join('cat_enfermedades_cie10_new', 'expediente_imp_diag_enfermedad.enf_id', '=', 'cat_enfermedades_cie10_new.enf_id')
           	 		->select('expediente_imp_diag_enfermedad.temp_id','cat_enfermedades_cie10_new.enf_codigo','cat_enfermedades_cie10_new.enf_nombre','cat_enfermedades_cie10_new.enf_form','expediente_imp_diag_enfermedad.temp_formulario_llenado')
					->get();
		if($request_enfermedades['request'] != null){
			$request_enfermedades['paginacion'] = $request_pagination;
		}else{
			$request_enfermedades['paginacion'] = null;
		}
		
		return Response::json($request_enfermedades);
	}
	
	

}