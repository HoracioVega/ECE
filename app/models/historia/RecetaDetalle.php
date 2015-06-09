<?php
class RecetaDetalle extends Eloquent {
	
	protected $table='expediente_recetaDetalle';
	
	public $primary_key='recdetalle_id';
	public $timestamp=false;
	
	protected $fillable = array('receta_id','recdetalle_clave', 'recdetalle_farmaco','recdetalle_presentacion'
			,'recdetalle_cantidad', 'recdetalle_indicaciones','recdetalle_duracion'	);
	

}