<?php
class DatosGeneralesEnfController extends BaseController{
	
	public function getIndex(){
		
		$expediente = Input::get('exp_id');
		
		// Conjunto de catálogos para los datos generales del paciente
		$seg_social  = Paciente::getAllProgramasSS();
		$entidades   = Paciente::getAllEntidades();
		$ocupaciones = Paciente::getAllOcupaciones();
		$religiones  = Paciente::getAllReligiones();
		$edo_civil   = Paciente::getAllEdoCivil();
		$escolaridad = Paciente::getAllEscolaridades();
		$paciente = Paciente::where('expediente_id', Input::get('exp_id'))->get();
		
		$municipios  = Paciente::getAllMunicipiosForEntidad($paciente[0]->paciente_edo);
		$localidades = Paciente::getAllLocalidadesForEntAndMun($paciente[0]->paciente_edo,
				$paciente[0]->paciente_mun);
		
		// OBTENGO LOS DATOS DE HOJA DE EVOLUCION Y LOS MANDO , EN CASO CONTRARIO SI SE ENCUENTRA VACIO , OBTENGO LOS DE EXPLORACION FISICA
		// Y LOS ENVIO A LA VISTA
		
		$checkDataEvolucion = HojaEvolucion::where ( 'expediente_id', '=', $expediente )->where ( DB::raw ( "DATE(evolucion_fecha)" ), '=', date ( "Y-m-d" ) )->get ()->count ();
		if ($checkDataEvolucion != 0) {
			$retrieveCurrentData = HojaEvolucion::where ( 'expediente_id', '=', $expediente )->where ( DB::raw ( "DATE(evolucion_fecha)" ), '=', date ( "Y-m-d" ) )->get ();
				
			$retrieveCurrentData [0] = array (
					'explo_peso' => $retrieveCurrentData [0]->evolucion_peso,
					'explo_talla' => $retrieveCurrentData [0]->evolucion_talla,
					'explo_ta' => $retrieveCurrentData [0]->evolucion_ta,
					'explo_pulso' => $retrieveCurrentData [0]->evolucion_fc,
					'explo_resp' => $retrieveCurrentData [0]->evolucion_fr,
					'explo_temp' => $retrieveCurrentData [0]->evolucion_temp,
					'explo_glicemia' => $retrieveCurrentData [0]->evolucion_glicemia,
					'explo_imc' => $retrieveCurrentData [0]->evolucion_imc
			);
		} else {
			// EN ESTE CASO OBTENGO LOS REGISTROS DE EXPLORACION FISICA Y LOS SETEO EN MI ARREGLO
			$checkDataExists = ExploracionFisica::where ( 'expediente_id', '=', $expediente )->where ( DB::raw ( "DATE(explo_fecha)" ), '=', date ( "Y-m-d" ) )->get ()->count ();
			if ($checkDataExists == 0) {
				$retrieveCurrentData [0] = null;
			} else {
				$retrieveCurrentData = ExploracionFisica::where ( 'expediente_id', '=', $expediente )->where ( DB::raw ( "DATE(explo_fecha)" ), '=', date ( "Y-m-d" ) )->select ( 'explo_peso', 'explo_talla', 'explo_ta', 'explo_pulso', 'explo_resp', 'explo_temp', 'explo_glicemia', 'explo_imc' )->get ();
		
				$retrieveCurrentData [0] = array (
						'explo_peso' => $retrieveCurrentData [0]->explo_peso,
						'explo_talla' => $retrieveCurrentData [0]->explo_talla,
						'explo_ta' => $retrieveCurrentData [0]->explo_ta,
						'explo_pulso' => $retrieveCurrentData [0]->explo_pulso,
						'explo_resp' => $retrieveCurrentData [0]->explo_resp,
						'explo_temp' => $retrieveCurrentData [0]->explo_temp,
						'explo_glicemia' => $retrieveCurrentData [0]->explo_glicemia,
						'explo_imc' => $retrieveCurrentData [0]->explo_imc
				);
			}
		}
		
		return View::make('enfermeria.generales')->with(array('expediente_id' => $expediente,
				'current' => $retrieveCurrentData 
				, 'compact' => compact('seg_social', 'entidades', 'ocupaciones',
				'religiones', 'edo_civil', 'escolaridad', 'paciente', 
				'municipios', 'localidades')));
	}
	
}