<?php

 class Asigna_Unidad extends Eloquent {
	
	public $prefix 		= 'usun';
	protected $table 		= 'usuario_Unidades';
	protected $_table_clue 	= 'cat_clues';
	public $primaryKey 	= 'usun_id';
	
	public function unidades($id_usuario)
	{
		return DB::table($this->table)
		->join($this->_table_clue, $this->table.'.clue_id', '=', $this->_table_clue.'.clue_id')
		->where($this->table.'.usu_id','=',$id_usuario)
		->select($this->_table_clue.'.clue_id', $this->_table_clue.'.clue_nombre_unidad')
		->get();
		
	}
	
	
}