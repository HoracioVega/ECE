<?php
use Illuminate\Support\Facades\Input;
/**
 * @author      Horacio Vega
 * @filename    PerfilController.php
 * 
 */
class PerfilController extends BaseController{
	
	protected $layout = 'layouts.default';
	protected $_util_model;
	
	public function getIndex()
	{
		$expediente = Input::get('exp_id');
		$retrieveCurrentData = Perfil::where('expediente_id' , '=' , $expediente)->where(DB::raw("DATE(perfil_fecha)"),'=',date('Y-m-d'))->get();
		return  View::make('historia.perfil')->with(array('expediente_id' => $expediente, 'current' => $retrieveCurrentData));
	}
	
	public function postAddperfil(){
		
		if(Request::ajax())
		{	
			//$this->_util_model = new Utils();
			$data = Input::all();
			$data = Input::except('_token');
			$data['perfil_fecha'] = Utils::changeDate($data['perfil_fecha']);
			try {
				$checkDataExists = Perfil::where('expediente_id' , '=' , $data['expediente_id'])->where(DB::raw("DATE(perfil_fecha)"),'=',date("Y-m-d"))->get()->count();
				if($checkDataExists == 0){
					Perfil::create($data);
				}else{
					$retrieveData = Perfil::where('expediente_id' , '=' , $data['expediente_id'])->where(DB::raw("DATE(perfil_fecha)"),'=',date("Y-m-d"))->get();
					Perfil::where('perfil_id' , '=' , $retrieveData[0]->perfil_id)->update($data);
				}
				$flag = true;
			} catch (Exception $e) {
				$flag = false;
				var_dump($e->getMessage());
			}
			return Response::json(array('proceso' => $flag ));
		}
	}
}