<?php
class DashboardController extends BaseController{
	
	public function getIndex(){
		
		$expediente = Input::get('exp_id');
		return View::make('dashboard.dashboard')->with(array('expediente_id' => $expediente));
		
	}
	
}