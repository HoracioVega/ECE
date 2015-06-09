<?php
class AgendaController extends BaseController{
	
	public function getIndex(){
		
		$expediente = Input::get('exp_id');
		
		$medicoModel = new Medico();
		
		try {
				
			if(Session::get('usu_nivel') != 1){
				$flagProperty = 1;
				$optionField = '<input class="form-control" type="text" value="'.Session::get('usu_nombreUsuario').'" readonly>
						<input id="medico" class="form-control" type="hidden" value="'.Session::get('usu_id').'" name="medico">
						';
			}else{
				$optionField = $medicoModel->getSelectListaMedico();
			}
		} catch (Exception $e) {
			var_dump($e->getMessage());
		}
		
		
		
		
		
		return View::make('agenda.agenda')->with(array('expediente_id' => $expediente , 'field' => $optionField));
		
	}
	
	public function getListadoagenda(){
		
		  if(Request::ajax()){
		  	
		  	$dataListadoAgenda = null;
		  	$medico_id = Input::get('medico_id');
		  	
		  	if(Session::get('usu_nivel') != 1)// 1 ES EL ROL DE ENFERMERA
				$dataListadoAgenda = AgendaModel::where('usu_id',Session::get('usu_id'))->where('agenda_fecha_inicio','>=',date('Y-m-d'))->get()->toArray(); 
			else 
				$dataListadoAgenda = AgendaModel::where('usu_id',Input::get('medico_id'))->where('agenda_fecha_inicio','>=',date('Y-m-d'))->get()->toArray();
		  	
		  	//var_dump($dataListadoAgenda);
		  	//SE FORMA EL ARREGLO DE OBJETOS PARA EL LISTADOS
		  	//EJEMPLO
		  	//[{"allDay": false, "end": "Wed, 01 Jan 2014 23:59:00 -0500", "title": "Algo", "color": "#1E90FF", "start": "Tue, 31 Dec 2013 00:00:00 -0500", "id": 1}, 
		  	
		  	$arrayCalendar = null;
		  	
		  	if(isset($dataListadoAgenda)){
			  	foreach ($dataListadoAgenda as $value):
			  		
			  		if($value['agenda_todo_el_dia'] == 0)
			  			$value['agenda_todo_el_dia'] = false;
			  		else 
			  			$value['agenda_todo_el_dia'] = true;
			  		
			  		$arrayCalendar[] = array('allDay' => $value['agenda_todo_el_dia'],
			  						'end' => date('r',strtotime($value['agenda_fecha_fin'].$value['agenda_horafin'])),
			  						'title' => $value['agenda_asunto'],
			  						'color' => '#1E90FF',
			  						'start' => date('r',strtotime($value['agenda_fecha_inicio'].$value['agenda_horaInicio'])),
			  						'id' => $value['agenda_id']);
			  	
			  	endforeach;
		  	}
		  	//var_dump(date('r', strtotime('2015-05-26 00:00:00')));die;
		  	return Response::json($arrayCalendar);
		}
	}
	
	public function getSearchpacientemodal(){
		return View::make('agenda.modals.searchPacienteAgenda');
	}
	
	public function postCrearcita(){
		
		  if(Request::ajax()){
			
			$dataAgenda = Input::all();
			if(!isset($dataAgenda['agenda_todo_el_dia']))
				$dataAgenda['agenda_todo_el_dia'] = false;
				
			$allDay = $dataAgenda['agenda_todo_el_dia'];//ESTE VALOR LO ALMACENO APARTE PARA OBTENER EL VALOR ORIGINAL DADO POR EL FULL CALENDAR
			
			if($dataAgenda['agenda_hora_inicio'] == '00:00:00'){
				if($dataAgenda['agenda_todo_el_dia'] == true){$dataAgenda['agenda_todo_el_dia'] = 1;$dataAgenda['agenda_hora_fin'] = '23:59:59'; }else{$dataAgenda['agenda_todo_el_dia'] =0;}
			}else{
				$dataAgenda['agenda_todo_el_dia'] = 0;
			}
			
			
			
			$arrayAgenda = array(
		  		'clue_id' => Session::get('clue_id'),
		  		'usu_id' => $dataAgenda['medico_id'],
				'expediente_id' => $dataAgenda['expediente_id'],
				'agenda_asunto'	=> $dataAgenda['agenda_asunto'],
				'agenda_fecha_inicio' => $dataAgenda['agenda_fecha_inicio'],
				'agenda_fecha_fin' => $dataAgenda['agenda_fecha_fin'],  	
				'agenda_horaInicio' => $dataAgenda['agenda_hora_inicio'], 
				'agenda_horafin' => $dataAgenda['agenda_hora_fin'],
				'agenda_usuario_agenda' => 	Session::get('usu_id'),
				'agenda_coordinacion' => 1,
				'agenda_todo_el_dia' => $dataAgenda['agenda_todo_el_dia']			
			);
			
			
			
			//CONSULTAMOS SI YA EXISTE LA CITA EN EL MISMO DIA Y A LA MISMA HORA.
			/*$retrieveCitaExpediente = AgendaModel::where('expediente_id',$dataAgenda['expediente_id'])
			->where('agenda_fecha_inicio',$dataAgenda['agenda_fecha_inicio'])
			->where('agenda_horaInicio',$dataAgenda['agenda_hora_inicio'])
			->orWhere('agenda_horafin','>=',$dataAgenda['agenda_hora_inicio'])
			->count();
			*/
			
			$retrieveCitaExpediente = DB::select('SELECT * FROM expediente_agenda 
					WHERE agenda_fecha_inicio = "'.$dataAgenda['agenda_fecha_inicio'].'" 
					AND expediente_id = '.$dataAgenda['expediente_id'].' 
					AND 
					((agenda_horaInicio = "'.$dataAgenda['agenda_hora_inicio'].'"  
					   AND agenda_horaInicio <= "'.$dataAgenda['agenda_hora_inicio'].'" )  
					OR agenda_horafin >= "'.$dataAgenda['agenda_hora_inicio'].'")');
			
			$jsonDataCalendar = null;
			
			if(empty($retrieveCitaExpediente)){
				//NO EXISTE EL REGISTRO Y LO ALMACENO.
				//PRIMERO LO GENERAMOS EN LA TABLA DE EXPEDIENTE_AGENDA
				$response = AgendaModel::create($arrayAgenda);
				$agenda_id = $response->agenda_id;//ES EL ULTIMO ID DE REGISTRO DE LA AEGENDA
				//ARMO EL OBJETO JSON A REGRESAR PARA QUE HAGA EL RENDER EN EL CALENDARIO
				
				$jsonDataCalendar = array('allDay' => $allDay,
						'end' => date('r',strtotime($dataAgenda['agenda_fecha_fin'].$dataAgenda['agenda_hora_fin'])),
						'title' => $dataAgenda['agenda_asunto'],
						'color' => '#337ab7',
						'start' => date('r',strtotime($dataAgenda['agenda_fecha_inicio'].$dataAgenda['agenda_hora_inicio'])),
						'id' => $agenda_id);
				
				
				//INTENTO ELIMINAR EL REGISTRO SI EXISTE EN LA TABLA DE EXPEDIENTE_CONSULTA
				try {
					
					$pacienteInfo = Paciente::where('expediente_id' ,'=', $dataAgenda['expediente_id'])->get();
					$edad = Utils::calculaEdadFechas($pacienteInfo[0]->paciente_fecNac, date('Y-m-d'));
					
					//REVISAR SI EL PACIENTE QUE VAMOS A AGREGAR CUENTA CON UNA CONSULTA EN EL AÑO,
					//SI TIENE ALMENOS UNA CONSULTA EN ESTE AÑO SE VUELVE SUBSECUENTE , EN CASO CONTRARIO ES CONSULTA DE PRIMERA VEZ.
					$retrievePacienteConsulta = ExpedienteConsulta::where('expediente_id' ,'=' , $dataAgenda['expediente_id'])
					->where('consulta_fecha' , 'LIKE' ,'%'.date("Y").'%')
					->get()->count();
					
					if($retrievePacienteConsulta > 0)
						$subsecuente = 1;
					else
						$subsecuente = 0;
					
					
					$arrayRegistro = array(
							'usu_id' => Session::get('usu_id'),
							'expediente_id' => $dataAgenda['expediente_id'],
							'clue_id' => Session::get('clue_id'),
							'consulta_medicoId' => $dataAgenda['medico_id'],
							'consulta_fecha' => $dataAgenda['agenda_fecha_inicio'],
							'consulta_hentrada' => $dataAgenda['agenda_hora_inicio'],
							'consulta_estatus' => 1,
							'consulta_edad' => $edad,
							'consulta_subsecuente' => $subsecuente,
							'agenda_id' => $agenda_id
					);
					
					//ELIMINO EL REGISTRO DE LA TABLA DE EXPEDIENTE_CONSULTA
					ExpedienteConsulta::where('expediente_id',$dataAgenda['expediente_id'])->where('agenda_fecha_inicio',$dataAgenda['agenda_fecha_inicio'])->delete();
					//AGREGO EL NUEVO REGISTRO
					ExpedienteConsulta::create($arrayRegistro);
				
				} catch (Exception $e) {
					//SI MANDA ERROR QUIERE DECIR QUE NO EXISTE EL VALOR Y LO ALMACENO
					ExpedienteConsulta::create($arrayRegistro);
				}
				
				$flag = true;
				
				
			}else{
				//EXISTE EL REGISTRO MANDO MENSAJE, DE MODIFICACION
				$flag = false;
				
			}
			return Response::json(array('proceso' => $flag,'calendar' => $jsonDataCalendar));
		}
	}
	
	public function postActualizacita(){
		
		if(Request::ajax()){
			
			$dataActualiza = Input::all();
			$dataActualiza = Input::except('agenda_id');
			$agenda_id = Input::get('agenda_id');
			$flag = false;
			try {
				$requestAgenda = AgendaModel::where('agenda_id','=',$agenda_id)->update($dataActualiza);
				//SE CREA EL ARRAY PARA MODIFICAR LOS DATOS CORRESPONDIENTES EN LA TABLA DE EXPEDIENTE_CONSULTA
				$arrayConsulta = array(
						'consulta_fecha' => $dataActualiza['agenda_fecha_inicio'],
						'consulta_hentrada' => $dataActualiza['agenda_horaInicio'],
				);
				
				$requestAgenda = ExpedienteConsulta::where('agenda_id','=',$agenda_id)->update($arrayConsulta);
				$flag = true;
			} catch (Exception $e) {
				var_dump($e->getMessage());
				$flag = false;
			}
			return Response::json(array('proceso' => $flag));
		}
	}
	
	public function postDetallepacienteagenda(){
		
		if(Request::ajax()){
			
			$agenda_id = Input::get('id');
			$medico_id = Input::get('medico_id');
			
			$responseAgendaDatos = null;
			//SI MEDICO ES 0 QUIERE DECIR QUE ES LA ENFERMERA Y NECESITA SELECCIONAR CON EL SELECT OPTION		
			if($medico_id != 0){
				//AQUI COMPARO SI EL DETALLE ES SOLO POR EL PACIENTE SELECCIONADO O TODOS LOS DETALLES DEL DIA SELECCIONADO
				if($agenda_id != 0){
	
					$responseAgendaDatos = DB::table('expediente_agenda')
					->where('expediente_agenda.agenda_id',$agenda_id)
					->join('paciente','expediente_agenda.expediente_id' , '=' , 'paciente.expediente_id')
					->select(DB::raw('CONCAT(paciente.paciente_nombre," ",paciente.paciente_app," ",
					paciente.paciente_apm) AS nombrePaciente'),
					DB::raw('DATE_FORMAT(expediente_agenda.agenda_fecha_inicio, "%d/%m/%Y") AS agenda_fecha_inicio'),'expediente_agenda.agenda_asunto','expediente_agenda.agenda_horaInicio',
					'expediente_agenda.agenda_horafin')
					->orderBy('expediente_agenda.agenda_fecha_inicio' ,'ASC')
					->orderBy('expediente_agenda.agenda_fecha_inicio' ,'ASC')
					->get();
				}else{
				$agenda_fecha_inicio = Input::get('fecha_inicio');
				
				$responseAgendaDatos = DB::table('expediente_agenda')
				->where('expediente_agenda.agenda_fecha_inicio',$agenda_fecha_inicio)
				->join('paciente','expediente_agenda.expediente_id' , '=' , 'paciente.expediente_id')
				->select(DB::raw('CONCAT(paciente.paciente_nombre," ",paciente.paciente_app," ",
				paciente.paciente_apm) AS nombrePaciente'),
				DB::raw('DATE_FORMAT(expediente_agenda.agenda_fecha_inicio, "%d/%m/%Y") AS agenda_fecha_inicio'),'expediente_agenda.agenda_asunto','expediente_agenda.agenda_horaInicio',
				'expediente_agenda.agenda_horafin')
				->orderBy('expediente_agenda.agenda_fecha_inicio' ,'ASC')
				->orderBy('expediente_agenda.agenda_horaInicio' ,'ASC')
				->get();
				}
			}
			return View::make('agenda.modals.detalleCitaPaciente')->with(array('datosAgenda' => $responseAgendaDatos ));
		}
		
	}
	
}