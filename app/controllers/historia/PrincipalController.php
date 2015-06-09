<?php
class PrincipalController extends BaseController{
	
	public function getIndex()
	{
		$expediente = Input::get('exp_id');
		
		if(ExpedienteConsulta::validaHoraEntrada($expediente)){}else{
			ExpedienteConsulta::where('expediente_id','=',$expediente)
							->where('usu_id' , '=' , Session::get('usu_id'))
							->where('consulta_fecha' , '=' , date('Y-m-d'))
							->update(array('consulta_hconsulta' => date('h:i:s')));
		}
		//AQUI SE LE CAMBIA EL STATUS AL PACIENTE QUE SE SELECCIONO.
		ExpedienteConsulta::where('expediente_id','=',$expediente)->where('consulta_fecha','=',date('Y-m-d'))->update(array('consulta_estatus'=> 2));
		return  View::make('historia.principal')->with(array('expediente_id' => $expediente));
	}
	
	
	
}