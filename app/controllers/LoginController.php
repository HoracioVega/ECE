<?php

/**
 * @author	  Horacio Vega Castillo
 * @filename	LoginController.php
 * @rid		 ECE
 */


use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;

class LoginController extends BaseController{
	
	public function getIndex(){
		
		return View::make('login.index');
	}
	
	public function postLogin(){
		
		$credentials = array(
				'usu_usuario' => Input::get('usu_usuario'),
				'password' =>  Input::get('password')
		);
		
		$rules = array(
				'usu_usuario' => 'required|max:60|exists:usuarios,usu_usuario',
				'password' => 'required|max:50'
		);
		$labels = array(
				'usu_usuario' => 'Usuario',
				'password' => 'Contraseña'
		);
		
		$validation = Validator::make($credentials, $rules, array(), $labels);
		
		if ($validation->fails())
		{	
			$msj = "Datos de acceso incorrectos";
			$flag = false;
			$array=array("activo"=>$flag,"msj"=>$msj);
			return Response::json($array);
		}
		else
		{
			
			if (Auth::attempt($credentials))
			{
				$flag = true;
				$usuario = User::find(Auth::user()->usu_id)->toArray();
				
				
				$asignaUnidad_Model= new Asigna_Unidad();
				$unidades_Asignadas = $asignaUnidad_Model->unidades ($usuario['usu_id']);
				$formacion = Formacion::find($usuario['formacion_id']);
				//ALMACENAMOS LOS DATOS DE AUTH EN UNA VARIABLE DE SESSION
				Session::put($usuario);
				Session::put('formacion_nombre',$formacion['formacion_nombre']);
				
				//var_dump($formacion['formacion_nombre']);
				//var_dump(Session::get('formacion_nombre'));
				
				//ESTA LIGA ESTA POR DEFAULT, UNA VEZ QUE TENGAMOS EL ACL SE CAMBIARA POR EL TIPO DE ROL QUE ESTEMOS INICIANDO 
				
				$uri = Request::root();
				$url = $uri."/lista/";
				$msj="Acceso concedido.";
				
				$array=array("id"=>$usuario['usu_id'],"activo"=>$flag,"url"=>$url,"msj"=>$msj,"total_unidades"=>count($unidades_Asignadas),"unidades"=>$unidades_Asignadas);
				
				return Response::json($array);
				/*
				$modulo = Acl_modulo::find($usuario['usr_amo_id'])->toArray();
				Session::put($usuario);
				Session::put($modulo);
				*/
				
			}else{
				$uri = Request::root();
				$url = $uri."/lista/";
				$msj = "Datos de acceso incorrectos";
				$flag = false;
				$array=array("activo"=>$flag,"msj"=>$msj , "url" => $url);
				return Response::json($array);
			}
			
			
		}
		
	}
	
	public function postAsignar(){
		
		if(Request::ajax())
		{
			$clue_id = array(
					'clue_id' => Input::get('unidad'),
			);
			
			$clueAsignada = Clues::find($clue_id);
			
			//AGREGAMOS A LA SESSION LOS DATOS DEL MENU PARA MOSTRAR UNIDAD EN LA CUAL HA SIDO LOGUEADO
			Session::put($clue_id);Session::put('clue_nombre_unidad',$clueAsignada[0]['clue_nombre_unidad']);
			
			$uri = Request::root();
			$url = $uri."/lista";
			//var_dump(url);die;
			$msj = "Unidad asignada correctamente";
			$flag = true;
			$array=array("proceso"=>$flag,"msj"=>$msj, "url" => $url);
			return Response::json($array);
			//return Redirect::intended('listaespera');
		}
		
	}
	
	public function getLogout()
	{
		Auth::logout();
		Session::flush();
		return Redirect::to('login')->with('url_previous', '');
	}
	
}