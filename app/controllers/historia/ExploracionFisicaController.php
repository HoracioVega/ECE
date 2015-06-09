<?php
use Illuminate\Support\Facades\Input;

class ExploracionFisicaController extends BaseController{

	public $utilModel;
	
	public function getIndex()
	{
		
		$expediente = Input::get('exp_id');
		$retrieveCurrentData = ExploracionFisica::where('expediente_id' , '=' , $expediente)->where(DB::raw("DATE(explo_fecha)"),'=',date('Y-m-d'))->get();
		//var_dump($retrieveCurrentData);
		return  View::make('historia.ExploracionFis')->with(array('expediente_id' => $expediente , 'current' => $retrieveCurrentData));
	}
	
	public function postSaveexploracion(){
		
		$this->utilModel = new Utils();
		$data = Input::all();
		$data = Input::except('_token');
		$data['explo_fecha'] = $this->utilModel->changeDate($data['explo_fecha']) . ' ' . $data['explo_hora'];
		$hora = $data['explo_hora'];
		unset($data['explo_hora']);
		
		try {
			$checkDataExists = ExploracionFisica::where('expediente_id' , '=' , $data['expediente_id'])->where(DB::raw("DATE(explo_fecha)"),'=',date("Y-m-d"))->get()->count();
			if($checkDataExists == 0){
					
				ExploracionFisica::create($data);
					
			}else{
				$retrieveData = ExploracionFisica::where('expediente_id' , '=' , $data['expediente_id'])->where(DB::raw("DATE(explo_fecha)"),'=',date("Y-m-d"))->get();
				ExploracionFisica::where('explo_id' , '=' , $retrieveData[0]->explo_id)->update($data);
			}
			
			$flag = true;
			
			//ELEMENTOS QUE PERTENECEN AL MODELO DE HOJAEVOLUCION.
			$dataHojaEvolucion = array('expediente_id' => $data['expediente_id'],
					'evolucion_clinicos' => '','evolucion_tratamiento' => '',
					'evolucion_fecha' => $data['explo_fecha'],'evolucion_hora' => $hora,
					'evolucion_peso' => $data['explo_peso'],'evolucion_talla' => $data['explo_talla'],
					'evolucion_ta' => $data['explo_ta'],'evolucion_fc' => $data['explo_pulso'],
					'evolucion_fr' => $data['explo_resp'],'evolucion_temp' => $data['explo_temp'],
					'evolucion_glicemia' => $data['explo_glicemia'],'evolucion_imc' => $data['explo_imc']
			);
			
			//GUARDA Y ALMACENA LOS DATOS EN HOJA DE EVOLUCION , Y SI YA EXISTE LOS MODIFICA
			try {
				$checkDataExists = HojaEvolucion::where('expediente_id' , '=' , $data['expediente_id'])->where(DB::raw("DATE(evolucion_fecha)"),'=',date("Y-m-d"))->get()->count();
				if($checkDataExists == 0){
						
					HojaEvolucion::create($dataHojaEvolucion);
						
				}else{
					$retrieveData = HojaEvolucion::where('expediente_id' , '=' , $data['expediente_id'])->where(DB::raw("DATE(evolucion_fecha)"),'=',date("Y-m-d"))->get();
					HojaEvolucion::where('evolucion_id' , '=' , $retrieveData[0]->evolucion_id)->update($dataHojaEvolucion);
				}
					
				$flag = true;
					
			} catch (Exception $e) {
				$flag = false;
				var_dump($e->getMessage());
			}
			
			
		} catch (Exception $e) {
			$flag = false;
			var_dump($e->getMessage());
		}
		
		return Response::json(array('proceso' => $flag ));
		
		
	}
	

}