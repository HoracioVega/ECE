<?php
use Illuminate\Support\Facades\Input;

class AginecoController extends BaseController{


	public function getIndex()
	{
		$expediente = Input::get('exp_id');
		//$this->layout->content =  View::make('historia.perfil'); Esta es otra forma de mandar llamr al layout
		return  View::make('historia.Agineco')->with(array('expediente_id' => $expediente));
	}

}