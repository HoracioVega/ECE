<?php

class AheredoFamiliaresController extends BaseController{


	public function getIndex()
	{
		$expediente = Input::get('exp_id');
		$existenRegistros = $retrieveCurrentData = AheredoFamiliares::where('expediente_id' , '=' , $expediente)->count();
		
		//COMPARO SI EXISTEN REGISTROS DE ESTE PACIENTE , EN CASO CONTRARIO LOS SETEO DE FORMA DEFAULT
		if($existenRegistros == 0){
			
			AheredoFamiliares::setDafaultValues($expediente);
			$retrieveCurrentData = AheredoFamiliares::where('expediente_id' , '=' , $expediente)->get();
		}else{
			$retrieveCurrentData = AheredoFamiliares::where('expediente_id' , '=' , $expediente)->get()->toArray();
		}
		
		return  View::make('historia.AheredoFam')->with(array('expediente_id' => $expediente, 'current' => $retrieveCurrentData));
	}

	public function postSaveheredofamiliar(){

		if(Request::ajax())
		{
			$data = Input::all();
			$data = Input::except('_token');
			
			$parientes = array (
					'Materno' => array (
							'abuela',
							'abuelo',
							'madre',
							'otro' 
					),
					'Paterno' => array (
							'abuela',
							'abuelo',
							'padre',
							'otro' 
					) 
			);
			foreach ( $parientes as $parte => $familiares ) { // ej campo: abuelacancerpaterno
				foreach ( $familiares as $familia ) {
					
					if(($familia == 'padre' && $parte == 'Materno') || ($familia == 'materno' && $parte == 'Paterno')){}else{
					
					$arrayTable = array(
					'heredo_hta' => $data[$familia.'heredo_hta'.$parte],
					'heredo_htadetail' => $data[$familia.'heredo_hta'.$parte.'detail'],
					'heredo_dm' => $data[$familia.'heredo_dm'.$parte],
					'heredo_dmdetail' => $data[$familia.'heredo_dm'.$parte.'detail'],
					'heredo_cancer' => $data[$familia.'heredo_cancer'.$parte],
					'heredo_cancerdetail' => $data[$familia.'heredo_cancer'.$parte.'detail'],
					'heredo_tb' => $data[$familia.'heredo_tb'.$parte],
					'heredo_tbdetail' => $data[$familia.'heredo_tb'.$parte.'detail'],
					'heredo_alergias' => $data[$familia.'heredo_alergias'.$parte],
					'heredo_alergiasdetail' => $data[$familia.'heredo_alergias'.$parte.'detail'],
					'heredo_finado' => $data[$familia.'heredo_finado'.$parte],
					'heredo_finadodetail' => $data[$familia.'heredo_finado'.$parte.'detail'],
					'heredo_sano' => $data[$familia.'heredo_sano'.$parte],
					'heredo_sanodetail' => $data[$familia.'heredo_sano'.$parte.'detail'],
					'heredo_otro' => $data[$familia.'heredo_otro'.$parte],
					'heredo_otrodetail' => $data[$familia.'heredo_otro'.$parte.'detail']);
					}
					AheredoFamiliares::where('heredo_fam' , '=' , $familia)->where('heredo_parte','=',strtolower($parte))->where('expediente_id','=',$data['expediente_id'])->update($arrayTable);
				}
			}
			$flag = true;
			return Response::json(array('proceso' => $flag ));
		}	
		
	}
}