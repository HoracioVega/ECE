<?php
require_once public_path()."/fpdf/fpdf.php";

class ReferenciaController extends BaseController{
	
	public function getIndex()
	{
		$expediente = Input::get('exp_id');
		
		$checkDataEvolucion = HojaEvolucion::where('expediente_id', '=', $expediente)
			->where(DB::raw("DATE(evolucion_fecha)"), '=', date ("Y-m-d"))->get()->count();
		if ($checkDataEvolucion != 0) {
			$datosClinicos = HojaEvolucion::where('expediente_id', '=', $expediente)
				->where(DB::raw("DATE(evolucion_fecha)"), '=', date("Y-m-d"))->get();
				
			$datosClinicos = array (
					'evolucion_clinicos' => $datosClinicos[0]->evolucion_clinicos,
					'evolucion_tratamiento' => $datosClinicos[0]->evolucion_tratamiento,
					'explo_fecha' => $datosClinicos[0]->evolucion_fecha,
					'explo_hora' => $datosClinicos[0]->evolucion_hora,
					'explo_peso' => $datosClinicos[0]->evolucion_peso,
					'explo_talla' => $datosClinicos[0]->evolucion_talla,
					'explo_ta' => $datosClinicos[0]->evolucion_ta,
					'explo_pulso' => $datosClinicos[0]->evolucion_fc,
					'explo_resp' => $datosClinicos[0]->evolucion_fr,
					'explo_temp' => $datosClinicos[0]->evolucion_temp,
					'explo_glicemia' => $datosClinicos[0]->evolucion_glicemia,
					'explo_imc' => $datosClinicos[0]->evolucion_imc,
					'evolucion_id' => $datosClinicos[0]->evolucion_id,
					'exploracion_id' => ""
			);
		} else {
			$checkDataExists = ExploracionFisica::where('expediente_id', '=', $expediente )
				->where(DB::raw("DATE(explo_fecha)"), '=', date("Y-m-d"))->get()->count();
			if ($checkDataExists == 0) {
				$datosClinicos = null;
			} else {
				$datosClinicos = ExploracionFisica::where('expediente_id', '=', $expediente)
					->where(DB::raw("DATE(explo_fecha)"), '=', date("Y-m-d"))
					->select('explo_peso', 'explo_talla', 'explo_ta', 'explo_pulso', 'explo_resp', 'explo_temp', 'explo_glicemia', 'explo_imc')->get();
		
				$datosClinicos = array (
						'evolucion_clinicos' => '',
						'evolucion_tratamiento' => '',
						'explo_fecha' => $datosClinicos[0]->explo_fecha,
						'explo_hora' => $datosClinicos[0]->explo_hora,
						'explo_peso' => $datosClinicos[0]->explo_peso,
						'explo_talla' => $datosClinicos[0]->explo_talla,
						'explo_ta' => $datosClinicos[0]->explo_ta,
						'explo_pulso' => $datosClinicos[0]->explo_pulso,
						'explo_resp' => $datosClinicos[0]->explo_resp,
						'explo_temp' => $datosClinicos[0]->explo_temp,
						'explo_glicemia' => $datosClinicos[0]->explo_glicemia,
						'explo_imc' => $datosClinicos[0]->explo_imc,
						'exploracion_id' => $datosClinicos[0]->explo_id,
						'evolucion_id' => "",
				);
			}
		}
		
		$clues = Clues::getAllNamesClues();
		$servicios = Terapeutica::getAllServicios();
		
		
		return View::make('referencia.referencia')->with(compact('datosClinicos', 'clues', 'servicios'));
	}
	
	public function getDireccionclue()
	{
		if (Request::ajax()) {
			$id_clue = Input::get('id');
			$direccion = Clues::getDireccionClue($id_clue);
			return Response::json(array('direccion' => $direccion[0]->clue_domicilio, 'nombre' => $direccion[0]->clue_nombre_unidad));
		}
	}
	
	public function postSavereferencia()
	{
		if (Request::ajax()) {
			$data = Input::all();
			
			$data['referencia_fecha'] = date('Y/m/d', strtotime($data['referencia_fecha']));
			$messages = array(
				'referencia_fecha.required' => 'La fecha es requerida<br>',
				'referencia_nom_unidad.required' => 'El nombre de la unidad de origen es requerido<br>',
				'referencia_nom_unidad_referido.required' => 'El nombre de la unidad de destino es requerido<br>',
				'referencia_dom_unidad_ref.required' => 'El domicilio de la unidad de destino es requerido<br>',
				'serv_id.numeric' => ' Ingrese un servicio valido<br>', 'referencia_motivo.required' => 'Ingrese el motivo de la referencia<br>'
			);
			$validator = Validator::make($data, array('referencia_fecha' => 'required', 'referencia_nom_unidad' => 'required',
				'referencia_nom_unidad_referido' => 'required', 'referencia_dom_unidad_ref' => 'required', 'serv_id' => 'numeric',
				'referencia_motivo' => 'required'), $messages);
			
			if ($validator->fails()) {
				$errors = $validator->messages();
				return Response::json($errors->all());
			} else {
				$referencia = Referencia::create($data);
				return Response::json(array('guardado' => '1', 'referencia_id' => $referencia->referencia_id));
			}
		}
	}
	
	public function getObtenerreferencias()
	{
		if (Request::ajax()) {
			
			if(Input::get('page') !== null) {
				$page = Input::get('page');
			} else {
				$page = 1;
			}
			$byPage = Input::get('byPage');
			$data = Input::all();
			
			$total = Referencia::getAllReferencias(Input::get('expediente_id'), "total", $page, $byPage);
			$total = ceil($total / $byPage);
			$total = ($total==0)?1:$total;
			
			$request_pagination = array("page"=>$page,"total"=>$total,"bypage"=>$byPage);
			
			if($data['expediente_id']!="") {
				$request_referencias['request'] = Referencia::getAllReferencias($data['expediente_id'], "registros", $page, $byPage);
				//var_dump($request_referencias['request']); die;
				if($request_referencias['request'] != null){
					$request_referencias['paginacion'] = $request_pagination;
				}else{
					$request_referencias['paginacion'] = null;
				}
			}
			return Response::json($request_referencias);
		}
	}
	
	public function postDetallereferencia()
	{
		if (Request::ajax()) {
			$data = Input::all();
			
			$referencia = Referencia::getReferencia($data['referencia_id']);
			return Response::json(array("referencia"=>$referencia));
		}
	}
	
	public function getImprimirreferencia()
	{
		$data = Input::all();
		$infoPDF = Referencia::getReferencia($data['referencia_id']);
		
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
		$pdf->Cell(0, $h, utf8_decode("Hoja de Referencia"), 0, 1);
		$pdf->Ln();
		$pdf->SetFont('Arial','B', 10);
		$pdf->Cell(15,7,"Fecha:",1);
		$pdf->SetFont('Arial','', 10);
		$pdf->Cell(40,7,$infoPDF[0]->referencia_fecha,1);
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
		$pdf->Cell(40,7,utf8_decode($infoPDF[0]->referencia_nom_unidad),1);
		$pdf->Ln(); $pdf->Ln();
		
		$pdf->SetFont('Arial','B', 10);
		$pdf->Cell(17,7,"Urgencia:",1);
		$pdf->SetFont('Arial','', 10);
		$pdf->Cell(42,7,$infoPDF[0]->referencia_urgencia,1);
		$pdf->Ln();
		
		$pdf->SetFont('Arial','B', 10);
		$pdf->Cell(35,7,"Unidad que refiere:",1);
		$pdf->SetFont('Arial','', 10);
		$pdf->Cell(42,7,utf8_decode($infoPDF[0]->referencia_nom_unidad),1);
		$pdf->Ln();
		
		$pdf->SetFont('Arial','B', 10);
		$pdf->Cell(42,7,"Unidad a la que refiere:",1);
		$pdf->SetFont('Arial','', 10);
		$pdf->Cell(42,7,utf8_decode($infoPDF[0]->referencia_nom_unidad_referido),1);
		$pdf->Ln();
		
		$pdf->SetFont('Arial','B', 10);
		$pdf->Cell(42,7,"Domicilio:",0,1);
		$pdf->SetFont('Arial','', 10);
		$pdf->Cell(42,7,utf8_decode($infoPDF[0]->referencia_dom_unidad_ref),1);
		$pdf->SetFont('Arial','B', 10);
		$pdf->Ln();
		$pdf->Cell(37,7,"Servicio al que envia:",1);
		$pdf->SetFont('Arial','', 10);
		$pdf->Cell(42,7,utf8_decode($infoPDF[0]->serv_nombre),1);
		$pdf->Ln();
		$pdf->SetFont('Arial','B', 10);
		$pdf->Cell(42,7,"Motivo de la referencia:",1);
		$pdf->SetFont('Arial','', 10);
		$pdf->MultiCell(42,7,utf8_decode($infoPDF[0]->referencia_motivo),1);
		$pdf->Ln();
		
		$y = $pdf->GetY();
		$pdf->SetDrawColor('0','0','0');
		$pdf->Line(10, $y-1, 205, $y-1);
		$pdf->Line(10, $y+43, 205, $y+43);
		$pdf->SetDrawColor('255','255','255');
		$pdf->SetFont('Arial','B', 12);
		
		$pdf->Cell(35,7,utf8_decode("Signos vitales"),1);
		$pdf->Ln();
		$pdf->SetFont('Arial','B', 10);
		$pdf->Cell(35,7,utf8_decode("Tensión arterial"),1);
		$pdf->SetFont('Arial','B', 10);
		$pdf->Cell(35,7,utf8_decode("Temperatura"),1);
		$pdf->SetFont('Arial','B', 10);
		$pdf->Cell(45,7,utf8_decode("Frecuencia Respiratoria"),1);
		$pdf->SetFont('Arial','B', 10);
		$pdf->Cell(35,7,utf8_decode("Frecuencia Cardiáca"),1);
		$pdf->Ln();
		$pdf->SetFont('Arial','', 10);
		$pdf->Cell(35,7,utf8_decode($infoPDF[0]->evolucion_ta),1);
		$pdf->SetFont('Arial','', 10);
		$pdf->Cell(35,7,utf8_decode($infoPDF[0]->evolucion_temp),1);
		$pdf->SetFont('Arial','', 10);
		$pdf->Cell(45,7,utf8_decode($infoPDF[0]->evolucion_fr),1);
		$pdf->SetFont('Arial','', 10);
		$pdf->Cell(35,7,utf8_decode($infoPDF[0]->evolucion_fc),1);
		$pdf->Ln();
		
		$pdf->SetFont('Arial','B', 12);
		$pdf->Cell(35,7,utf8_decode("Samometría"),1);
		$pdf->Ln();
		$pdf->SetFont('Arial','B', 10);
		$pdf->Cell(35,7,utf8_decode("Talla"),1);
		$pdf->SetFont('Arial','B', 10);
		$pdf->Cell(35,7,utf8_decode("Peso"),1);
		$pdf->Ln();
		$pdf->SetFont('Arial','', 10);
		$pdf->Cell(35,7,utf8_decode($infoPDF[0]->evolucion_peso),1);
		$pdf->SetFont('Arial','', 10);
		$pdf->Cell(35,7,utf8_decode($infoPDF[0]->evolucion_talla),1);
		$pdf->Output();
		exit;
	}
}

class PDFReferencia extends FPDF
{
	function Header()
	{
		$this->SetFillColor('255','255','255');
		$this->SetDrawColor('255','255','255');
		$this->SetFont('Arial','B',14);
		$this->Cell(200,10,'',1,1,'C');
		$this->Ln(2);
		$this->SetFont('Arial','B',13);
		$this->Cell(200,10,'',1,0,'C');
		$this->Ln(20);
	}
}