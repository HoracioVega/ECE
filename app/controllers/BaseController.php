<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	
	public function __construct(){
		
		if(isset($_GET['exp_id'])){
			
			$paciente = Paciente::where('expediente_id', '=' , $_GET['exp_id'])
			->select(DB::raw("CONCAT(paciente_nombre, ' ', paciente_app ,' ',paciente_apm) AS nombrePaciente"), "paciente_sexo", "paciente_fecNac")
			->get();
			
			$arrayPaciente = array('nombrePaciente' => $paciente[0]['nombrePaciente'],
									'paciente_sexo' => $paciente[0]['paciente_sexo'],
									'paciente_fecNac' => $paciente[0]['paciente_fecNac'],);
			Session::put($arrayPaciente);
			//var_dump(Session::get('nombrePaciente'));
		}else{
			//echo "no se encuentra el exp id y no hago nada.";
		}
		
		
	}
	
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
