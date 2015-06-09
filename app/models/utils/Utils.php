<?php
class Utils extends Eloquent {
	
	public static function changeDate($fecha){
		
		$array_fecha = explode("/", $fecha);
		return $array_fecha[2].'-'.$array_fecha[1].'-'.$array_fecha[0];
	}
	
	public static function _fechaMesDia($fecha_nacimiento){
		
		$mes = explode('-',$fecha_nacimiento);
		
		$array_prob = array (
				0 => 12,
				1 => 11,
				2 => 10,
				3 => 9,
				4 => 8,
				5 => 7,
				6 => 6,
				7 => 5,
				8 => 4,
				9 => 3,
				10 => 2,
				11 => 1,
				12 => 0
		);
		
		if ($fecha_nacimiento > date ( "Y-m-d" )) {
		
		} else {
			$mes_actual = date ( 'm' );
			$dia_actual = date ( 'd' );
		
			$fecha['dia'] =$dia_cumplido = ( int ) $dia_actual - $mes [2];
			$fecha['mes'] = $mes_cumplido = ( int ) $mes_actual - $mes [1];
		
			$total_meses = 12;
		
			if ($mes_cumplido < 0) {
				$fecha['mes'] = $mes_cumplido = $total_meses + $mes_cumplido;
			}
		
			if ($dia_cumplido < 0) {
				$fecha['dia'] = $dia_cumplido = $dia_cumplido * (- 1);
			}
		}
		return $fecha;
	}
	
	public static function calculaEdadFechas($fechaNacimiento,$fechaSeleccionada){
		
		if($fechaNacimiento == '' || $fechaNacimiento == '0000-00-00'){
			return '';
		}
		list($y, $m, $d) = explode('-', $fechaNacimiento);
		list($y2, $m2, $d2) = explode('-', $fechaSeleccionada);
		$diferencia = mktime(0,0,0,$m2,$d2,$y2) - mktime(0,0,0,$m,$d,$y);
		$edad = intval($diferencia / 31536000); // 60 segundos * 60 minutos * 24 hrs * 365 dias para convertir a años
		
		return $edad;
		
	}
}