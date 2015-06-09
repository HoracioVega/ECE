<?php

/**
 *
 * @author Horacio Vega Castillo
 *         date 2015/05/12
 *         @filename HojaEvolucionController.php
 */
class HojaEvolucionController extends BaseController {
	public function getIndex() {
		$expediente = Input::get ( 'exp_id' );
		
		// OBTENGO LOS DATOS DE HOJA DE EVOLUCION Y LOS MANDO , EN CASO CONTRARIO SI SE ENCUENTRA VACIO , OBTENGO LOS DE EXPLORACION FISICA
		// Y LOS ENVIO A LA VISTA
		
		$checkDataEvolucion = HojaEvolucion::where ( 'expediente_id', '=', $expediente )->where ( DB::raw ( "DATE(evolucion_fecha)" ), '=', date ( "Y-m-d" ) )->get ()->count ();
		if ($checkDataEvolucion != 0) {
			$retrieveCurrentData = HojaEvolucion::where ( 'expediente_id', '=', $expediente )->where ( DB::raw ( "DATE(evolucion_fecha)" ), '=', date ( "Y-m-d" ) )->get ();
			
			$retrieveCurrentData [0] = array (
					'evolucion_clinicos' => $retrieveCurrentData [0]->evolucion_clinicos,
					'evolucion_tratamiento' => $retrieveCurrentData [0]->evolucion_tratamiento,
					'explo_fecha' => $retrieveCurrentData [0]->evolucion_fecha,
					'explo_hora' => $retrieveCurrentData [0]->evolucion_hora,
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
						'evolucion_clinicos' => '',
						'evolucion_tratamiento' => '',
						'explo_fecha' => $retrieveCurrentData [0]->explo_fecha,
						'explo_hora' => $retrieveCurrentData [0]->explo_hora,
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
		
		// $retrieveCurrentData = "";
		return View::make ( 'hojaevolucion.hojaevolucion' )->with ( array (
				'expediente_id' => $expediente,
				'current' => $retrieveCurrentData 
		) );
	}
	public function postSavehojaevolucion() {
		if (Request::isMethod ( 'post' )) {
			
			$dataExploracion = Input::all ();
			// ESTE ARRAY SE FORMA APARTIR DE QUE LOS DATOS QUE SE INGRESAN EN EXPLORACION FISICA SON LOS MISMO QUE EN HOJA DE EVOLUCION
			// SE ALMACENAN EN DIFERENTES TABLAS.
			
			// var_dump($dataExploracion);die;
			
			$dataHojaEvolucion = array (
					'expediente_id' => $dataExploracion ['expediente_id'],
					'evolucion_clinicos' => $dataExploracion ['evolucion_clinicos'],
					'evolucion_tratamiento' => $dataExploracion ['evolucion_tratamiento'],
					'evolucion_fecha' => Utils::changeDate ( $dataExploracion ['explo_fecha'] ),
					'evolucion_hora' => $dataExploracion ['explo_hora'],
					'evolucion_peso' => $dataExploracion ['explo_peso'],
					'evolucion_talla' => $dataExploracion ['explo_talla'],
					'evolucion_ta' => $dataExploracion ['explo_ta'],
					'evolucion_fc' => $dataExploracion ['explo_pulso'],
					'evolucion_fr' => $dataExploracion ['explo_resp'],
					'evolucion_temp' => $dataExploracion ['explo_temp'],
					'evolucion_glicemia' => $dataExploracion ['explo_glicemia'],
					'evolucion_imc' => $dataExploracion ['explo_imc'] 
			);
			
			$dataExploracion = Input::except ( '_token' );
			$dataExploracion ['explo_fecha'] = Utils::changeDate ( $dataExploracion ['explo_fecha'] ) . ' ' . $dataExploracion ['explo_hora'];
			unset ( $dataExploracion ['explo_hora'] );
			unset ( $dataExploracion ['evolucion_clinicos'] );
			unset ( $dataExploracion ['evolucion_tratamiento'] );
			
			// GUARDA O ALMACENA LOS DATOS EN EXPLORACION FISICA
			try {
				$checkDataExists = ExploracionFisica::where ( 'expediente_id', '=', $dataExploracion ['expediente_id'] )->where ( DB::raw ( "DATE(explo_fecha)" ), '=', date ( "Y-m-d" ) )->get ()->count ();
				if ($checkDataExists == 0) {
					
					ExploracionFisica::create ( $dataExploracion );
				} else {
					$retrieveData = ExploracionFisica::where ( 'expediente_id', '=', $dataExploracion ['expediente_id'] )->where ( DB::raw ( "DATE(explo_fecha)" ), '=', date ( "Y-m-d" ) )->get ();
					ExploracionFisica::where ( 'explo_id', '=', $retrieveData [0]->explo_id )->update ( $dataExploracion );
				}
				
				$flag = true;
			} catch ( Exception $e ) {
				$flag = false;
				var_dump ( $e->getMessage () );
			}
			// GUARDA Y ALMACENA LOS DATOS EN HOJA DE EVOLUCION , Y SI YA EXISTE LOS MODIFICA
			
			try {
				$checkDataExists = HojaEvolucion::where ( 'expediente_id', '=', $dataHojaEvolucion ['expediente_id'] )->where ( DB::raw ( "DATE(evolucion_fecha)" ), '=', date ( "Y-m-d" ) )->get ()->count ();
				if ($checkDataExists == 0) {
					
					HojaEvolucion::create ( $dataHojaEvolucion );
				} else {
					$retrieveData = HojaEvolucion::where ( 'expediente_id', '=', $dataHojaEvolucion ['expediente_id'] )->where ( DB::raw ( "DATE(evolucion_fecha)" ), '=', date ( "Y-m-d" ) )->get ();
					HojaEvolucion::where ( 'evolucion_id', '=', $retrieveData [0]->evolucion_id )->update ( $dataHojaEvolucion );
				}
				
				$flag = true;
			} catch ( Exception $e ) {
				$flag = false;
				var_dump ( $e->getMessage () );
			}
			
			return Response::json ( array (
					'proceso' => $flag 
			) );
		}
	}
	public function postObtenerhistorialevolucion() {
		
		if (Input::get ( 'page' ) !== null)
			$page = Input::get ( 'page' );
		else
			$page = 1;
		
		$byPage = Input::get ( 'byPage' );
		
		$data = Input::all ();
		
		$total = HojaEvolucion::where ( 'expediente_id', '=', $data ['expediente_id'] )->count ();
		$total = ceil ( $total / $byPage );
		$total = ($total == 0) ? 1 : $total;
		
		$request_pagination = array (
				"page" => $page,
				"total" => $total,
				"bypage" => $byPage 
		);
		$request_evolucion ['request'] = HojaEvolucion::where ( 'expediente_id', '=', $data ['expediente_id'] )->select ( "evolucion_id", "evolucion_fecha" )->skip ( $byPage * ($page - 1) )->take ( $byPage )->orderBy('evolucion_fecha' , 'DESC')->get ();
		if ($request_evolucion ['request'] != null) {
			$request_evolucion ['paginacion'] = $request_pagination;
		} else {
			$request_evolucion ['paginacion'] = null;
		}
		
		return Response::json ( $request_evolucion );
	}
	public function getDetalleevolucionmodal() {
		if (Request::ajax ()) {
			
			$evolucion_id = Input::get ( 'evolucion_id' );
			$retrieveHojaEvolucionData = HojaEvolucion::where ( 'evolucion_id', "=", $evolucion_id )->get ();
		}
		
		return View::make ( 'historia.modals.DetalleHojaEvolucionModal' )->with ( array (
				'current' => $retrieveHojaEvolucionData 
		) );
	}
}