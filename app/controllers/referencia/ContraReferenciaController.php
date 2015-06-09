<?php
require_once public_path()."/fpdf/fpdf.php";

class ContraReferenciaController extends BaseController {
	
	public function getIndex()
	{
		$expediente = Input::get('exp_id');
		$clues = Clues::getAllNamesClues();
		$servicios = Terapeutica::getAllServicios();
		$evolucion = array('evolucion_id' => HojaEvolucion::where('expediente_id', '=', Input::get('exp_id'))->orderBy('evolucion_id', 'desc')->get()[0]['evolucion_id']);
		
		
		return View::make('referencia.contra_referencia')->with(compact('clues', 'servicios', 'evolucion'));
	}
	
	public function postSavecontrareferencia()
	{
		if (Request::ajax()) {
			$data = Input::all();
			$messages = array(
					'contraref_fecha.required' => 'La fecha es requerida<br>',
					'contraref_origen_clue_id.required' => 'El nombre de la unidad de origen es requerido<br>',
					'contraref_dom.required' => 'El domicilio de la unidad es requerido<br>',
					'contraref_motivo.required' => 'El motivo de la contrareferencia es requerido<br>',
					'serv_id.numeric' => ' Ingrese un servicio valido<br>',
					'contraref_diganostico_ing.required' => 'Es requerido un diagnóstico de ingreso<br>',
					'contraref_diagnostico_egr.required' => 'Es requerido un diagnóstico de egreso<br>',
			);
			$validator = Validator::make($data, array('contraref_fecha' => 'required', 'contraref_origen_clue_id' => 'required',
					'contraref_dom' => 'required', 'contraref_motivo' => 'required', 'serv_id' => 'numeric',
					'contraref_diganostico_ing' => 'required', 'contraref_diagnostico_egr' => 'required'), $messages);
				
			if ($validator->fails()) {
				$errors = $validator->messages();
				return Response::json($errors->all());
			} else {
				$contrareferencia = ContraReferencia::create($data);
				return Response::json(array('guardado' => '1', 'contrareferencia_id' => $contrareferencia->contraref_id));
			}
		}
	}
	
	public function getObtenercontrareferencias()
	{
		if (Request::ajax()) {
				
			if(Input::get('page') !== null) {
				$page = Input::get('page');
			} else {
				$page = 1;
			}
			$byPage = Input::get('byPage');
			$data = Input::all();
				
			$total = ContraReferencia::getAllContraReferencias(Input::get('expediente_id'), "total", $page, $byPage);
			$total = ceil($total / $byPage);
			$total = ($total==0)?1:$total;
				
			$request_pagination = array("page"=>$page,"total"=>$total,"bypage"=>$byPage);
				
			if($data['expediente_id']!="") {
				$request_contrareferencias['request'] = ContraReferencia::getAllContraReferencias($data['expediente_id'], "registros", $page, $byPage);
				//var_dump($request_referencias['request']); die;
				if($request_contrareferencias['request'] != null){
					$request_contrareferencias['paginacion'] = $request_pagination;
				}else{
					$request_contrareferencias['paginacion'] = null;
				}
			}
			return Response::json($request_contrareferencias);
		}
	}
	
	public function postDetallecontrareferencia()
	{
		if (Request::ajax()) {
			$data = Input::all();

			$contrareferencia = ContraReferencia::getContraReferencia($data['contrareferencia_id']);
			return Response::json(array("contrareferencia"=>$contrareferencia));
		}
	}
	
	public function getImprimircontrareferencia()
	{
		$data = Input::all();
		$infoPDF = ContraReferencia::getContraReferencia($data['contrareferencia_id']);
	
		$h = 5;
		$pdf = new PDFReferencia();
		$pdf->AddPage('P', 'Letter');
	
		$pdf->Image(public_path()."/images/logo_gobierno.jpg",50,10,90,0,'JPG');
		$pdf->Image(public_path()."/images/Logo_federal.jpg",139,10,70,0,'JPG');
	
		$pdf->SetFillColor('240','240','240');
		$pdf->SetDrawColor('0','0','0');
		$pdf->SetLineWidth(0.5);
		$pdf->Line(10, 50, 205, 50);
		$pdf->Line(10, 75, 205, 75);
		$pdf->SetDrawColor('255','255','255');
		$pdf->SetFont('Arial','B', 15);
		$pdf->Cell(0, $h, utf8_decode("Hoja de ContraReferencia"), 0, 1);
		$pdf->Ln();
		$pdf->SetFont('Arial','B', 10);
		$pdf->Cell(15,7,"Fecha:",1);
		$pdf->SetFont('Arial','', 10);
 		$pdf->Cell(40,7,$infoPDF[0]->contraref_fecha,1);
		$pdf->Ln();
		$pdf->SetFont('Arial','B', 10);
		$pdf->Cell(15,7,utf8_decode("Médico:"),1);
		$pdf->SetFont('Arial','', 10);
		$pdf->Cell(40,7,utf8_decode(Session::get('usu_nombreUsuario')),1);
		$pdf->SetFont('Arial','B', 10);
		$pdf->Cell(35,7,utf8_decode("Cédula Profesional:"),1);
		$pdf->SetFont('Arial','', 10);
		$pdf->Cell(40,7,utf8_decode(Session::get('usu_cedula')),1);
		$pdf->SetFont('Arial','B', 10);
		$pdf->Ln();
		$pdf->SetFont('Arial','B', 10);
		$pdf->Cell(28,7,utf8_decode("Unidad Médica:"),1);
		$pdf->SetFont('Arial','', 10);
		$pdf->Cell(40,7,utf8_decode(Session::get('clue_nombre_unidad')),1);
		$pdf->Ln(); $pdf->Ln();
	
		$pdf->SetFont('Arial','B', 10);
		$pdf->Cell(35,7,"Unidad que remite:",1);
		$pdf->SetFont('Arial','', 10);
		$pdf->Cell(42,7,$infoPDF[0]->contraref_unidad_origen,1);
		$pdf->Ln();
	
		$pdf->SetFont('Arial','B', 10);
		$pdf->Cell(42,7,"Domicilio:",0,1);
		$pdf->SetFont('Arial','', 10);
		$pdf->Cell(42,7,utf8_decode($infoPDF[0]->contraref_dom),1);
		$pdf->SetFont('Arial','B', 10);
		$pdf->Ln();
		$pdf->Cell(37,7,"Servicio al que envia:",1);
		$pdf->SetFont('Arial','', 10);
		$pdf->Cell(42,7,utf8_decode($infoPDF[0]->serv_nombre),1);
		$pdf->Ln();
		$pdf->SetFont('Arial','B', 10);
		$pdf->Cell(42,7,utf8_decode("Resúmen Clínico:"),1);
		$pdf->SetFont('Arial','', 10);
		$pdf->MultiCell(42,7,utf8_decode($infoPDF[0]->evolucion_clinicos),1);
		$pdf->SetFont('Arial','B', 10);
		$pdf->Cell(42,7,utf8_decode("Diagnóstico de ingreso:"),1);
		$pdf->SetFont('Arial','', 10);
		$pdf->MultiCell(42,7,utf8_decode($infoPDF[0]->contraref_diganostico_ing),1);
		$pdf->SetFont('Arial','B', 10);
		$pdf->Cell(42,7,utf8_decode("Diagnóstico de egreso:"),1);
		$pdf->SetFont('Arial','', 10);
		$pdf->MultiCell(42,7,utf8_decode($infoPDF[0]->contraref_diagnostico_egr),1);
		$pdf->Ln();
	
		$y = $pdf->GetY();
		$pdf->SetDrawColor('0','0','0');
		$pdf->Line(10, $y-1, 205, $y-1);
		$pdf->Line(10, $y+43, 205, $y+43);
		$pdf->SetDrawColor('255','255','255');
		$pdf->SetFont('Arial','B', 12);
	
		$pdf->SetFont('Arial','B', 10);
		$pdf->Cell(50,7,utf8_decode("Tratamiento concluido"),1);
		$pdf->SetFont('Arial','B', 10);
		$pdf->Cell(50,7,utf8_decode("Continuar tratamiento"),1);
		$pdf->SetFont('Arial','B', 10);
		$pdf->Cell(50,7,utf8_decode("Subsecuente"),1);
		$pdf->SetFont('Arial','B', 10);
		$pdf->Ln();
		$pdf->SetFont('Arial','', 10);
		$pdf->Cell(50,7,utf8_decode($infoPDF[0]->contraref_tratamiento_estatus),1);
		$pdf->SetFont('Arial','', 10);
		$pdf->Cell(50,7,utf8_decode($infoPDF[0]->contraref_cont_trata),1);
		$pdf->SetFont('Arial','', 10);
		$pdf->Cell(50,7,utf8_decode($infoPDF[0]->contraref_subsecuente),1);
		$pdf->Ln();
	
		$pdf->SetFont('Arial','B', 10);
		$pdf->Cell(35,7,utf8_decode("Instrucciones y recomendaciones"),1);
		$pdf->Ln();
		$pdf->SetFont('Arial','', 10);
		$pdf->Cell(35,7,utf8_decode($infoPDF[0]->contraref_instrucciones),1);
		$pdf->Output();
		exit;
	}
}