<?php

class OdontologiaController extends BaseController{


	public function getIndex()
	{
		$expediente = Input::get('exp_id');
		//$this->layout->content =  View::make('historia.perfil'); Esta es otra forma de mandar llamr al layout
		return  View::make('programas.odontologia')->with(array('expediente_id' => $expediente));
	}

}