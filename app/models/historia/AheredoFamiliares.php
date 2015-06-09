<?php

class AheredoFamiliares extends Eloquent{
	
	protected $table ='expediente_enfermedad_heredo';
	public $primary_key='heredo_id';
	public $prefix = 'heredo_';
	public $timestamps = false;
	protected $fillable = array('heredo_hta', 'heredo_dm', 'heredo_cancer', 'heredo_tb', 
			'heredo_alergias', 'heredo_finado', 'heredo_sano', 'heredo_ignora', 'heredo_fam', 'heredo_parte',
			'expediente_id', 'heredo_htadetail', 'heredo_dmdetail', 'heredo_cancerdetail','heredo_tbdetail',
			'heredo_alergiasdetail', 'heredo_finadodetail', 'heredo_sanodetail', 'heredo_ignoradetail','heredo_otro',
			'heredo_otrodetail');
	
	public static function setDafaultValues($expediente_id){
		
		$familiares = array (
				'materno' => array (
						'abuela',
						'abuelo',
						'madre',
						'otro' 
				),
				'paterno' => array (
						'abuela',
						'abuelo',
						'padre',
						'otro' 
				) 
		);
		$data =  array('expediente_id' => $expediente_id,'heredo_hta' => 'No','heredo_dm' => 'No','heredo_cancer' => 'No','heredo_tb' => 'No','heredo_alergias' => 'No','heredo_finado' => 'No','heredo_sano' => 'No','heredo_otro' => 'No');
		
		foreach ( $familiares as $tipo => $parientes ) {
			$data['heredo_parte'] = $tipo;
			foreach ( $parientes as $pariente ) {
				$data['heredo_fam'] = $pariente;
				AheredoFamiliares::create($data);
			}
		}
	}
	
	
}