<?php
class GinecobstetricoController extends BaseController
{

	public function getIndex()
	{
		$expediente = Input::get('exp_id');
		$metodos = Ginecobstetrico::getAllMetodosAnticonceptivos();
		$gineco = Ginecobstetrico::where('expediente_id', '=', $expediente)->get();
		if ($gineco->isEmpty()) {
			$gineco[0] = new Ginecobstetrico();
		}
		return View::make('historia.antecedentesgineco')->with(compact('metodos', 'gineco'));
	}
	
	public function postSavegineco()
	{
		if (Request::ajax()) {
			$data = Input::all();
			
			$data['gineco_menarcaFecha'] = date('Y/m/d', strtotime($data['gineco_menarcaFecha']));
			$data['gineco_examenMamas'] = date('Y/m/d', strtotime($data['gineco_examenMamas']));
			$data['gineco_papanicoFecha'] = date('Y/m/d', strtotime($data['gineco_papanicoFecha']));
			$data['gineco_mestruacionFecha'] = date('Y/m/d', strtotime($data['gineco_mestruacionFecha']));
			$data['gineco_anticoncepFecha'] = date('Y/m/d', strtotime($data['gineco_anticoncepFecha']));
			$data['gineco_eventoObsFecha'] = date('Y/m/d', strtotime($data['gineco_eventoObsFecha']));
			$messages = array(
					'date' => 'Ingrese una fecha correcta<br>',
					'gineco_tipoMenarca.alpha' => 'Ingrese una respuesta valida para el tipo de menarca<br>',
					'gineco_multiplePareja.alpha' => 'Ingrese una respuesta valida para la opción de multiple pareja<br>',
					'metodo_id.numeric' => 'Ingrese una opción correcta para métodos anticonceptivos<br>'
			);
			$validator = Validator::make($data, array('gineco_menarcaFecha' => 'date', 'gineco_examenMamas' => 'date',
					'gineco_papanicoFecha' => 'date', 'gineco_mestruacionFecha' => 'date', 'gineco_anticoncepFecha' => 'date',
					'gineco_eventoObsFecha' => 'date', 'gineco_tipoMenarca' => 'alpha', 'gineco_multiplePareja' => 'alpha',
					'metodo_id' => 'numeric'), $messages);
			if ($validator->fails()) {
				$errors = $validator->messages();
				return Response::json($errors->all());
			} else {
				if (Ginecobstetrico::where('expediente_id', '=', $data['expediente_id'])->get()->isEmpty()) {
					$gineco = Ginecobstetrico::create($data);
				} else {
					DB::table('expediente_gineco')->where('expediente_id', '=', $data['expediente_id'])->update($data);
				}
				return Response::json(array('guardado' => '1'));
			}
		}
	}
}