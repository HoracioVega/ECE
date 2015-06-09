<?php
use Illuminate\Support\Facades\Input;

class DeteccionController extends BaseController{


	public function getIndex()
	{
		$expediente = Input::get('exp_id');
		$infoPaciente=Paciente::where('expediente_id',$expediente)
		->join('cat_seguridad_social', 'paciente.paciente_segSocial', '=', 'cat_seguridad_social.seg_id')
		->join('cat_escolaridad', 'paciente.escolaridad_id', '=', 'cat_escolaridad.escolaridad_id')
		->get();
        
        //regresa unicamente la fecha del ultimo cuestionario aplicado
        $ultimo_cuestionario=ViolenciaSexual::ultimoCuestionario($expediente);
        
        //si la fecha es igual a la actual se enviarán los datos del registro completo para "setearlos"
        if(date('Y-m-d')== $ultimo_cuestionario)
        {            
            $valoresCuestionario=array('valoresSex'=>ViolenciaSexual::ultimoCuestionarioSexual($expediente), 
                                       'valoresFis'=>ViolenciaFisica::ultimoCuestionarioFis($expediente),
                                       'valoresPsico'=>ViolenciaPsicologica::ultimoCuestionarioPsico($expediente));
            
            $edad=Utils::calculaEdadFechas( date('Y-m-d', strtotime($infoPaciente[0]->paciente_fecNac)),date('Y-m-d'));
        
            return  View::make('programas.deteccion-violencia')->with(array('expediente_id' => $expediente,         'infoPaciente'=>$infoPaciente[0], 'edad_paciente'=>$edad, 'fecha_ult_c'=>$ultimo_cuestionario,'valores_cuestionario'=>$valoresCuestionario));
        }
        else
        {
            $edad=Utils::calculaEdadFechas( date('Y-m-d', strtotime($infoPaciente[0]->paciente_fecNac)),date('Y-m-d'));
		
		  return  View::make('programas.deteccion-violencia')->with(array('expediente_id' => $expediente,  'infoPaciente'=>$infoPaciente[0], 'edad_paciente'=>$edad, 'fecha_ult_c'=>$ultimo_cuestionario));
        
        }
        
      //var_dump($valoresCuestionario);die();		
		
	}
	
	public function postGuardaviosexual()
	{
		//$exp_id=Input::get('expediente_id');
		 
		$dataVioSex=Input::all();
		
		$dataVioSex['usu_id']= Auth::id();
		$dataVioSex['det_sex_fecha_registro']=date("Y/m/d H:i:s");
		
		
		try {
			ViolenciaSexual::create($dataVioSex);
			$correcto=true;
			
		}
		catch(Exceptio $e){
			
			var_dump($e->getMessage());
			$correcto=false;
			
		}
		return Response::json(array('correcto' => $correcto ));
	}
	
	public function postGuardaviopsico()
	{
		//$exp_id=Input::get('expediente_id');
			
		$dataVioSex=Input::all();
	
		$dataVioSex['usu_id']= Auth::id();
		$dataVioSex['det_psico_fecha_registro']=date("Y/m/d H:i:s");
	
	
		try {
			ViolenciaPsicologica::create($dataVioSex);
			$correcto=true;
				
		}
		catch(Exceptio $e){
				
			var_dump($e->getMessage());
			$correcto=false;
				
		}
		return Response::json(array('correcto' => $correcto ));
	}
	
	public function postGuardaviofisica()
	{
		//$exp_id=Input::get('expediente_id');
			
		$dataVioSex=Input::all();
	
		$dataVioSex['usu_id']= Auth::id();
		$dataVioSex['det_fis_fecha_registro']=date("Y/m/d H:i:s");
	
		try {
			ViolenciaFisica::create($dataVioSex);
			$correcto=true;
				
		}
		catch(Exceptio $e){
				
			var_dump($e->getMessage());
			$correcto=false;
				
		}
        
		return Response::json(array('correcto' => $correcto ));
	}

}