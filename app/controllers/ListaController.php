<?php

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
/**
 * @author	  Horacio Vega Castillo
 * @filename	ListaController.php
 * @rid		 ECE
 */


class ListaController extends BaseController{

	public $_medicoModel;
	public $_listaModel;
	public $_pacienteModel;
	
	public function __construct(){
		
		$this->_medicoModel = new Medico();
		$this->_pacienteModel = new Paciente();
		$this->_listaModel = new Lista_Espera();
	}
	
	public function getIndex(){

		//$data['data'] = "test";
		return View::make('lista.index');//->with('data', $data);;
	}
	
	public function postObtenerlista(){
		
		if(Input::get('page') !== null)
			$page = Input::get('page');
		else
			$page = 1;
		
		$byPage = Input::get('byPage');
		
		$lista_esperaModel = new Lista_Espera();
		$total = $this->_listaModel->obtenerTotal(Session::get('clue_id'),Session::get('usu_id'),Session::get('usu_nivel'),$byPage);
		$total = ($total==0)?1:$total;
		
		if($page>$total) $page = $page - 1;
		$paginacion = array("page"=>$page,"total"=>$total,"bypage"=>$byPage);
		
		$estadisticas = $this->_listaModel->obtenerEstadisticas(Session::get('clue_id'),Session::get('usu_id'),Session::get('usu_nivel'));
		
		$cat_estatus = array("En consulta","En espera","Atendidos");
		$tam = count($estadisticas);
		for($i=0;$i<$tam;$i++){
			$estadisticas[$i]->estatusNombre = $cat_estatus[($estadisticas[$i]->consulta_estatus)-1];
		}
		$lista = $this->_listaModel->obtenerLista(Session::get('clue_id'),Session::get('usu_id'),Session::get('usu_nivel'),$page,$byPage);
		$tam = count($lista);
		for($i=0;$i<$tam;$i++){
			$lista[$i]->estatusNombre = $cat_estatus[($lista[$i]->consulta_estatus)-1];
			if($lista[$i]->expediente_id=="")
				$lista[$i]->expediente_id = "---";
		}
		$lista_espera = array("estadisticas"=>$estadisticas,"lista_pacientes"=>$lista,"paginacion"=>$paginacion);
		return Response::json($lista_espera);
	}
	
	public function getAddpacientemodal(){
		return View::make('lista.addPaciente');
	}
	
	public function getSearchpacientemodal(){
		return View::make('lista.searchPaciente');
	}
	
	public function getMedicoslista(){
		
		//$this->_medicoModel = new Medico();
		
		$lista = $this->_medicoModel->obtenerListadoMedicos();
		$array=array("lista"=>$lista,"nivel"=>Session::get('usu_nivel'));
		return Response::json($array);
	}
	
	public function postAddpaciente(){
		
		//$this->_listaModel = new Lista_Espera();
		$data = Input::all();
		
		$request['proceso'] = $this->_listaModel->agregarPaciente($data);
		return Response::json($request);
	}
	
	public function getBuscarpaciente(){
		//$this->_pacienteModel = new Paciente();
		$data = Input::all();
		
		if($data['exp']!="" || $data['s']!=""){
			$request_pacientes = $this->_pacienteModel->buscarPaciente($data['exp'],$data['s']);
		}
		return Response::json($request_pacientes);
	}
	
	public function getElegirpaciente(){
		
		$data = Input::all();
		
		$data['usu_id'] = Session::get('usu_id');
		$data['clue_id'] = Session::get('clue_id');
		//var_dump($data);die;
		$rows = $this->_pacienteModel->agregarConExpediente($data);
		
		if($rows==0)
			$proceso = false;
		else
			$proceso = true;
		
		return Response::json(array("proceso"=>$proceso));
	}
	
	public function getEliminarpaciente(){
		
		$data = Input::all();
		
		$request = ExpedienteConsulta::find($data['consulta_id']);
		$process = $request->delete();
		
		return Response::json(array("proceso"=>$process));
		
		
	}
	
}	