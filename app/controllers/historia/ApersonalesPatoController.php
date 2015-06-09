<?php
use Illuminate\Support\Facades\Input;

class ApersonalesPatoController extends BaseController{


	public function getIndex()
	{
		$expediente = Input::get('exp_id');
		$retrieveCurrentData = ApersonalesPato::where('expediente_id' , '=' , $expediente)->get();
		//$this->layout->content =  View::make('historia.perfil'); Esta es otra forma de mandar llamr al layout
		return  View::make('historia.ApersonalesPato')->with(array('expediente_id' => $expediente, 'current' => $retrieveCurrentData));
	}
	
	public function postSavepatologico(){
		
		if(Request::ajax())
			{	
				$data = Input::all();
				
				$data = Input::except('_token');
				
				try {
					$checkDataExists = ApersonalesPato::where('expediente_id' , '=' , $data['expediente_id'])->get()->count();
					if($checkDataExists == 0){
						ApersonalesPato::create($data);
					}else{
						$retrieveData = ApersonalesPato::where('expediente_id' , '=' , $data['expediente_id'])->get();
						ApersonalesPato::where('pato_id' , '=' , $retrieveData[0]->pato_id)->update($data);
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