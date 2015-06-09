<?php
class VisitaController extends BaseController
{
	public function getIndex()
	{
		$expediente = Input::get('exp_id');
		return View::make('referencia.visitadomiciliaria');
	}
	
	public function postSavevisita()
	{
		if (Request::ajax()) {
			$data = Input::all();
				
			$data['visita_fecha'] = date('Y/m/d', strtotime($data['visita_fecha']));
			$data['visita_alta'] = date('Y/m/d', strtotime($data['visita_alta']));
			$messages = array(
					'visita_fecha.required' => 'La fecha es requerida<br>',
					'visita_fecha.date' => 'Ingrese un formato valido para la fecha<br>',
					'visita_alta.required' => 'La fecha es requerida<br>',
					'visita_alta.date' => 'Ingrese un formato valido para la fecha<br>'
			);
			$validator = Validator::make($data, array('visita_fecha'=>'required|date', 'visita_alta'=>'required|date'),$messages);
				
			if ($validator->fails()) {
				$errors = $validator->messages();
				return Response::json($errors->all());
			} else {
				$referencia = Visita::create($data);
				return Response::json(array('guardado' => '1'));
			}
		}
	}
	
	public function getObtenervisitas()
	{
		if (Request::ajax()) {
				
			if(Input::get('page') !== null) {
				$page = Input::get('page');
			} else {
				$page = 1;
			}
			$byPage = Input::get('byPage');
			$data = Input::all();
				
			$total = Visita::getAllVisitas(Input::get('expediente_id'), "total", $page, $byPage);
			$total = ceil($total / $byPage);
			$total = ($total==0)?1:$total;
				
			$request_pagination = array("page"=>$page,"total"=>$total,"bypage"=>$byPage);
				
			if($data['expediente_id']!="") {
				$request_visita['request'] = Visita::getAllVisitas($data['expediente_id'], "registros", $page, $byPage);
				if($request_visita['request'] != null){
					$request_visita['paginacion'] = $request_pagination;
				}else{
					$request_visita['paginacion'] = null;
				}
			}
			return Response::json($request_visita);
		}
	}
	
	public function postDetallevisita()
	{
		if (Request::ajax()) {
			$data = Input::all();
				
			// MODIFICAR METODO
			$visita = Visita::getVisita($data['visita_id']);
			return Response::json(array("visita"=>$visita));
		}
	}
}