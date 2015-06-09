<?php
use Illuminate\Support\Facades\Input;

class ApersonalesNoPatoController extends BaseController{


	public function getIndex()
	{
		$expediente = Input::get('exp_id');
		//$this->layout->content =  View::make('historia.perfil'); Esta es otra forma de mandar llamr al layout
		return  View::make('historia.ApersonalesNoP')->with(array('expediente_id' => $expediente));
	}

}