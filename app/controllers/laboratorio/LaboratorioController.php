<?php
use Illuminate\Support\Facades\Input;

class LaboratorioController extends BaseController{


	public function getIndex()
	{
		$expediente = Input::get('exp_id');
		
		$modelo_lab= new ExamenSol();
		
		$cat_servicio=$modelo_lab->catalogoServicio();
		
		$i=0;
		
		foreach ($cat_servicio as $servicio):
			
		$catalogo[$i]=$servicio->serv_nombre;
		//$servicio_id[$i]=$servicio->serv_id;
		$i++;
		endforeach;
		//$this->layout->content =  View::make('historia.perfil'); Esta es otra forma de mandar llamr al layout
		return  View::make('laboratorio.laboratorio-gabinete')->with(array('expediente_id' => $expediente,'catalogo_serv'=>$catalogo));
	}
	
	public function postGabinetepasados(){
		
			if(Input::get('page') !== null)
				$page = Input::get('page');
			else
				$page = 1;
		
			$byPage = Input::get('byPage');
		
			$exp_id=Input::get('expediente_id');
		
			$modelo= new ExamenSol();
		
		
			$estudios_pasados=  $modelo->buscaGabinete($exp_id,$page,$byPage);
		
			$total = ceil($estudios_pasados['total'] / $byPage);
		
		
			$total = ($total==0)?1:$total;
		
			if($page>$total) $page = $page - 1;
			$paginacion = array("page"=>$page,"total"=>$total,"bypage"=>$byPage);
		
		//var_dump($estudios_pasados);die();
			return Response::json(array('estudios' => $estudios_pasados['estudios'], 'paginacion'=>$paginacion ));
		
	}

}