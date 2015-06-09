<?php
use Illuminate\Support\Facades\Input;
require_once public_path()."/fpdf/fpdf.php";

class TerapeuticaController extends BaseController {

	private $_pacienteModel;
	private $_terapeuticaModel;
	
	public function __construct()
	{
		$this->_pacienteModel = new Paciente();
		$this->_terapeuticaModel = new Terapeutica();
	}
	
	public function getIndex()
	{
		//var_dump(Input::get('d'));
		$paciente = Paciente::where('expediente_id', Input::get('exp_id'))->get();
		$edad = array(
			'edad' => Utils::calculaEdadFechas(date('d-m-Y'), date('d-m-Y', strtotime($paciente[0]->paciente_fecNac))),
		);
		$medico = array('id' => Auth::id(), 'nombre' => Auth::user()->usu_nombreUsuario);
		$servicios = Terapeutica::getAllServicios();
		$recetas = Terapeutica::where('expediente_id', Input::get('exp_id'))->where('usu_id', Auth::id())->get();
		
		return  View::make('historia.Terapeutica')->with(compact('paciente', 'edad', 'medico', 'servicios', 'recetas'));
	}
	
	public function getSearchmedicamentomodal()
	{
		return View::make('historia.modals.searchMedicamentoModal');
	}
	
	public function postSearchmedicamentos()
	{
		if (Request::ajax()) {
			$data = Input::all();
			
			if ($data['buscarpor'] == 'clave') {
				$medicamentos = Terapeutica::searchMedicamentoByCve($data['medicamento']);
			} else {
				$medicamentos = Terapeutica::searchMedicamentoByName($data['medicamento']);
			}
			
			return Response::json($medicamentos);
		}
	}
	
	public function getSearchmedicamentos()
	{
		if (Request::ajax()) {
			
			if(Input::get('page') !== null) {
				$page = Input::get('page');
			} else {
				$page = 1;
			}
			$byPage = Input::get('byPage');
			$data = Input::all();
			
			if ($data['buscarpor'] == 'clave') {
				$total = Terapeutica::searchMedicamentoByNamePg($data['medicamento'], "total", $page, $byPage);
			} else {
				$total = Terapeutica::searchMedicamentoByCvePg($data['medicamento'], "total", $page, $byPage);
			}
			$total = ceil($total / $byPage);
			$total = ($total==0)?1:$total;

			$request_pagination = array("page"=>$page,"total"=>$total,"bypage"=>$byPage);
			
			if($data['medicamento']!="") {
				
				if ($data['buscarpor'] == 'clave') {
					$request_medicamentos['request'] = Terapeutica::searchMedicamentoByCvePg($data['medicamento'], 'registros', $page, $byPage);
				} else {
					$request_medicamentos['request'] = Terapeutica::searchMedicamentoByNamePg($data['medicamento'], 'registros', $page, $byPage);
				}
				
				if($request_medicamentos['request'] != null){
					$request_medicamentos['paginacion'] = $request_pagination;
				}else{
					$request_medicamentos['paginacion'] = null;
				}
			}
			return Response::json($request_medicamentos);
		}
	}
	
	public function getObtenerrecetas()
	{
		if (Request::ajax()) {
			
			if(Input::get('page') !== null) {
				$page = Input::get('page');
			} else {
				$page = 1;
			}
			$byPage = Input::get('byPage');
			$data = Input::all();
			
			$total = Terapeutica::getAllRecetas(Input::get('expediente_id'), "total", $page, $byPage);
			$total = ceil($total / $byPage);
			$total = ($total==0)?1:$total;
			
			$request_pagination = array("page"=>$page,"total"=>$total,"bypage"=>$byPage);
			
			if($data['expediente_id']!="") {
				$request_recetas['request'] = Terapeutica::getAllRecetas($data['expediente_id'], "registros", $page, $byPage);

				if($request_recetas['request'] != null){
					$request_recetas['paginacion'] = $request_pagination;
				}else{
					$request_recetas['paginacion'] = null;
				}
			}
			return Response::json($request_recetas);
		}
	}
	
	public function postSavemedicamentotmp()
	{
		if (Request::ajax()) {
			$data = Input::all();
			$result = $this->_terapeuticaModel->saveMedicamentoTmp($data);
						
			if ($result != false) {
				return Response::json($result);
			}
		}
	}
	
	public function postDeletemedicamentotmp()
	{
		if (Request::ajax()) {
			$data = Input::all();
 			$result = $this->_terapeuticaModel->deleteMedicamentoTmp($data);

 			return Response::json($result);
		}
	}
	
	public function postSavereceta()
	{
		if (Request::ajax()) {
			$data = Input::all();
			$result = $this->_terapeuticaModel->saveReceta($data);
			
			if ($result > 0) {
				return Response::json(array("success"=>"true", "msg"=>"Se guardo la receta correctamente. Confirme sus credenciales para imprimir la receta", "receta"=>$result));
			} else {
				return Response::json(array("success"=>"false", "msg"=>"Verifique que la información este correcta", "receta"=>0));
			}
		}
	}
	
	public function postDetallereceta()
	{
		if (Request::ajax()) {
			$data = Input::all();
			//var_dump($data['receta_id']); die;
			$detalleReceta = $this->_terapeuticaModel->getDetalleReceta($data['receta_id']);
			$receta = $this->_terapeuticaModel->getReceta($data['receta_id']);
			
			return Response::json(array("receta"=>$receta, "detalles"=>$detalleReceta));
		}
	}
	
	public function postVerificarpass()
	{
		if (Request::ajax()) {
			$data = Input::all();
			$password = Hash::make($data['usu_password']);

			$credentials = array(
					'usu_usuario' => Auth::user()->usu_usuario,
					'password' =>  $data['usu_password']
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

 			if ($validation->fails()) {
 				return Response::json(array("login"=>"false", "msg"=>"Verifique su password"));
 			} else {
 				return Response::json(array("login"=>"true", "msg"=>"Receta lista para ser impresa"));
 			}
 			die;
		}
	}

	public function getImprimirreceta()
	{
		$data = Input::all();

		if(!empty($data['receta_id'])) {
			$idReceta = $data['receta_id'];
			$dataReceta = Terapeutica::where('receta_id', $idReceta)->get()[0];
		}
		//$oReceta->saveLogRecetaImp($idReceta);
		$detallesReceta = $this->_terapeuticaModel->getDetalleReceta($idReceta);
		$dataMedico = User::find(Auth::id());
		$dataPaciente = Paciente::where('expediente_id', Input::get('exp_id'))->get()[0];
		$dataUnidadMedica = Clues::find(Session::get('clue_id'));
		
		//configuracion de algunos parametros para el pdf
		$h = 5;

		$camposEncabezado = array
		(
				'Fecha' => $dataReceta->receta_fecha,
				utf8_decode('Médico') => $dataMedico->usu_nombreUsuario,
				utf8_decode('Cédula Profesional') => $dataMedico->usu_cedula,
				'Paciente' => $dataPaciente->paciente_nombre." ".$dataPaciente->paciente_app." ".$dataPaciente->paciente_apm,
				utf8_decode('Unidad Médica') => $dataUnidadMedica->clue_nombre_unidad,
		);
		
		//comienza realizacion de pdf
		$pdf = new PDF();
		$pdf->AddPage('P', 'Letter');
		$pdf->SetFillColor('240','240','240');
		$pdf->SetDrawColor('240','240','240');
		
		//titulo
		$pdf->SetFont('Arial','B', 15);
		$pdf->Cell(0, $h, utf8_decode("Receta Médica"), 0, 1);
		$pdf->Ln();
		
		//datos generales receta
		foreach($camposEncabezado as $indice => $valor)
		{
			$pdf->SetFont('Arial','B', 9);
			$pdf->Cell(35, $h, "{$indice}:", 0, 0, 'L', 1);
		
			$pdf->SetFont('Arial','', 9);
			$pdf->Cell(0, $h, $valor, 'B', 1, 'L', 0);
		}
		$pdf->Ln();
		$pdf->SetFont('Arial','B', 9);
		$pdf->Cell(30, $h, "Observaciones:", 0, 0, 'L', 0);
		
		$pdf->SetFont('Arial','', 9);
		$pdf->MultiCell(100, $h, $dataReceta['observa']);
		$pdf->Ln(10);
		
		//datos detalle receta
		$pdf->SetFont('Arial','B', 9);
		$pdf->Cell(25, $h, 'Clave', 0, 0, 'L', 1);
		$pdf->Cell(60, $h, utf8_decode('Fármaco'), 0, 0, 'L', 1);
		$pdf->Cell(90, $h, utf8_decode('Presentación'), 0, 0, 'L', 1);
		$pdf->Cell(20, $h, 'Cantidad', 0, 1, 'L', 1);
		
		if(!empty($detallesReceta))
		{
			$pdf->SetFont('Arial', '', 9);
			foreach($detallesReceta as $detalle)
			{
				$pdf->SetFont('Arial', '', 9);
				$pdf->Cell(25, $h, utf8_decode($detalle->recdetalle_clave));
		
				$y1 = $pdf->GetY(); $x1 = $pdf->GetX() + 60;
				$pdf->MultiCell(60, $h, utf8_decode($detalle->recdetalle_farmaco));
				$y2 = $pdf->GetY();
		
				$pdf->SetXY($x1, $y1);
				$x1 = $pdf->GetX() + 90;
				$pdf->MultiCell(90, $h, utf8_decode($detalle->recdetalle_presentacion));
				$y3 = $pdf->GetY();
		
				$pdf->SetXY($x1, $y1);
				$pdf->Cell(20, $h, utf8_decode($detalle->recdetalle_cantidad), 0, 1);
		
				if($y2 > $y3)
					$pdf->SetY($y2);
				else
					$pdf->SetY($y3);
		
				$pdf->SetFont('Arial', 'I', 9);
				$pdf->Cell(10, $h, '');
				$pdf->Cell(0, $h, 'indicaciones: '.utf8_decode($detalle->recdetalle_indicaciones).' '.utf8_decode($detalle->recdetalle_duracion), 'B', 1);
		
				$pdf->Ln();
			}
		}
		$pdf->Output();
		exit;
	}
}


// PDF PARA RECETAS
class PDF extends FPDF
{
	//Page header
	function Header()
	{
		$this->SetFillColor('240','240','240');
		$this->SetDrawColor('240','240','240');
		//Logo
		/*
		$this->Image('../pdf/image/logo_gobierno.jpg',70,10,80,0,'JPG');
		$this->Image('../pdf/image/Logo_federal.jpg',155,10,55,0,'JPG');
		*/
		//$this->Image('../pdf/image/logo_gobierno.jpg',95,10,65,0,'JPG');
		//$this->Image('../pdf/image/Logo_federal.jpg',165,10,40,0,'JPG');
		//Arial bold 15
		$this->SetFont('Arial','B',14);
				//Title
		$this->Cell(200,10,'Gobierno del Estado de Quintana Roo',1,1,'C');
		$this->Ln(2);
		//SubTitle
		$this->SetFont('Arial','B',13);
		$this->Cell(200,10,'Secretaria de Salud',1,0,'C');
					//Line break
					$this->Ln(20);
	}
}
	