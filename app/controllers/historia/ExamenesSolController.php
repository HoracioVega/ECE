<?php
use Illuminate\Support\Facades\Input;

class ExamenesSolController extends BaseController{

	private $exp_id;

	public function getIndex()
	{
		$expediente = Input::get('exp_id');
		$botonLvida = Input::get('botonlvida');
		$botonLvida=($botonLvida==1)?$botonLvida : 3;
		$this->exp_id=$expediente;
		
		$modelo_lab= new ExamenSol();
		
		$cat_servicio=$modelo_lab->catalogoServicio();
		
		$i=0;
		
		foreach ($cat_servicio as $servicio):
			
			$catalogo[$i]=$servicio->serv_nombre;
			//$servicio_id[$i]=$servicio->serv_id;
			$i++;
		endforeach;
			
		
		return  View::make('historia.ExamenesSol')->with(array('expediente_id' => $expediente, 'catalogo_serv'=>$catalogo ,'botones'=>$botonLvida));
	}
	
	public function postGuardalab(){
		
		$datos_lab= Input::All();
		$modelo_lab=new ExamenSol();
		
		$cat_servicio=$modelo_lab->catalogoServicio();
		
		foreach ($cat_servicio as $servicio):
			
			if($servicio->serv_nombre==$datos_lab['serv_id']){
				$datos_lab['serv_id']=$servicio->serv_id;
		}
		endforeach;
		
		try {
			
			ExamenSol::create($datos_lab);
			$flag=true;
			
		}catch(Exception $e){
			
			$flag=false;
			var_dump($e->getMessage());
		}
		
		return Response::json(array('proceso' => $flag ));
	}
	
	public function postExamenespasados(){
		
		if(Input::get('page') !== null)
			$page = Input::get('page');
		else
			$page = 1;
		
		$byPage = Input::get('byPage');
		
		$exp_id=Input::get('expediente_id');
		$caso=Input::get('caso');
		$modelo= new ExamenSol();
		
		
		//si $caso=3 quiere decir que viene de la vista de laboratorio, por lo que sólo mostrará los exámenes de lab.
		if($caso==1){
			$estudios_pasados=  $modelo->estudiosLaboratorio($exp_id,$page,$byPage);
		}else{//en caso diferente viene desde la vista "exámenes solicitados" y mostrará exámenes tanto de gabinete como de laboratorio
			$estudios_pasados=  $modelo->busca_estudios($exp_id,$page,$byPage);
		}
		
				
		$total = ceil($estudios_pasados['total'] / $byPage);
				
				
		$total = ($total==0)?1:$total;
		
		if($page>$total) $page = $page - 1;
		$paginacion = array("page"=>$page,"total"=>$total,"bypage"=>$byPage);
		
		return Response::json(array('estudios' => $estudios_pasados['estudios'], 'paginacion'=>$paginacion ));
	}
	
	public function postExamenespecifico(){
	//función para la obtencion y visualización de los datos de un examen especifico basandose por el id del registro
		$lab_id=Input::get('id_detalle');
		$modelo= new ExamenSol();
			
		try {
			$resultado= $modelo->obtenEstudioEspecifico($lab_id);
			
		}catch (Exception $e){
	
			var_dump($e->getMessage());
		}
			
		return View::make('historia.modals.detalleExamenesSolModal')->with(array('examen_espe'=> $resultado));
		
	}
	
	public function getImprimirexamen()
	{
		$data = Input::all();
	
		if(!empty($data['lab_id'])) {
			
			$id_estudio = $data['lab_id'];
			
		}
		
		$model=new ExamenSol();
		$detalles_estudio = $model->obtenEstudioEspecifico($id_estudio);
		$dataMedico = User::find(Auth::id());
		$dataPaciente = Paciente::where('expediente_id', $data['exp_id'])->get()[0];
		$dataUnidadMedica = Clues::find(Session::get('clue_id'));

		//configuracion de algunos parametros para el pdf
		$h = 5;
		$camposEncabezado = array
		(
				'Fecha' => $detalles_estudio[0]->lab_fecha,
				utf8_decode('Médico') => $dataMedico->usu_nombreUsuario,
				utf8_decode('Cédula Profesional') => $dataMedico->usu_cedula,
				'Paciente' => "{$dataPaciente->paciente_nombre} {$dataPaciente->paciente_app} {$dataPaciente->paciente_apm}",
				utf8_decode('Unidad Médica') => $dataUnidadMedica->clue_nombre_unidad,
		);
	
		//comienza realizacion de pdf
		$pdf = new PDF_lab();
		$pdf->AddPage('P', 'Letter');
		$pdf->SetFillColor('240','240','240');
		$pdf->SetDrawColor('240','240','240');
	
		//titulo
		$pdf->SetFont('Arial','B', 15);
		$pdf->Cell(0, $h, utf8_decode("Laboratorio"), 0, 1);
		$pdf->Ln();
	
		//datos generales 
		foreach($camposEncabezado as $indice => $valor)
		{
			$pdf->SetFont('Arial','B', 9);
			$pdf->Cell(35, $h, "{$indice}:", 0, 0, 'L', 1);
	
			$pdf->SetFont('Arial','', 9);
			$pdf->Cell(0, $h, $valor, 'B', 1, 'L', 0);
		}
		$pdf->Ln();
	
		$pdf->SetFont('Arial','', 9);
		//$pdf->MultiCell(100, $h, $data_estudio['observa']);
		$pdf->Ln(10);
	
		//datos detalle 
		$pdf->SetFont('Arial','B', 9);
		$pdf->Cell(25, $h, 'Urgente', 0, 0, 'L', 1);
		$pdf->Cell(60, $h, utf8_decode('Diagnóstico'), 0, 0, 'L', 1);
		$pdf->Cell(40, $h, utf8_decode('Servicio'), 0, 0, 'L', 1);
		$pdf->Cell(60, $h, 'Estudio solicitado: ', 0, 1, 'L', 1);
	
		if(!empty($detalles_estudio))
		{
			$pdf->SetFont('Arial', '', 9);
			foreach($detalles_estudio as $detalle)
			{
				$pdf->SetFont('Arial', '', 9);
				$pdf->Cell(25, $h, utf8_decode($detalles_estudio[0]->lab_urgente));
	
				$y1 = $pdf->GetY(); $x1 = $pdf->GetX() + 60;
				$pdf->MultiCell(60, $h, utf8_decode($detalles_estudio[0]->lab_diagnostico));
				$y2 = $pdf->GetY();
	
				$pdf->SetXY($x1, $y1);
				$x1 = $pdf->GetX() + 90;
				$pdf->MultiCell(90, $h, utf8_decode($detalles_estudio[0]->serv_nombre));
				$y3 = $pdf->GetY();
	
				$pdf->SetXY(($x1-50), $y1);
				$pdf->Cell(20, $h, utf8_decode($detalles_estudio[0]->lab_estudio), 0, 1);
	
				if($y2 > $y3)
					$pdf->SetY($y2);
				else
					$pdf->SetY($y3);
	
				$pdf->SetFont('Arial', 'I', 9);
				//$pdf->Cell(10, $h, '');
				$pdf->Ln(10);
				//$pdf->Ln(10);
				$pdf->SetFont('Arial','B', 9);
				$pdf->Write(5, utf8_decode('Impresion diagnóstica: '));
				$pdf->Ln(5);
				$pdf->SetFont('Arial', '', 9);
				$pdf->Write(5, utf8_decode($detalle->lab_impresion));
	
				$pdf->Ln();
			}
		}
		
		$pdf->Output();
		exit;
	}
	
}


// PDF 
class PDF_lab extends FPDF
{
	//Encabezado
	function Header()
	{
		$this->SetFillColor('240','240','240');
		$this->SetDrawColor('240','240','240');
		//Logo
		
		/*$this->Image('../public/images/logo_gobierno.jpg',70,10,80,0,'JPG');
		$this->Image('../public/images/Logo_federal.jpg',155,10,55,0,'JPG');*/
		
		$this->Image('../public/images/logo_gobierno.jpg',95,10,65,0,'JPG');
		$this->Image('../public/images/Logo_federal.jpg',165,10,40,0,'JPG');
		/*Dejamos esto comentado  en caso de que el tiempo de carga en produccion sea demasiado*/
		//Arial bold 15
		//$this->SetFont('Arial','B',14);
		//Title
		//$this->Cell(200,10,'Gobierno del Estado de Quintana Roo',1,1,'C');
		//$this->Ln(2);
		//SubTitle
		//$this->SetFont('Arial','B',13);
		//$this->Cell(200,10,'Secretaria de Salud',1,0,'C');
		//Line break
		$this->Ln(20);
	}
}

