<?php
class Medico extends Eloquent {
	
	public $prefix 		= 'usu_';
	public $table 		= 'usuarios';
	public $primaryKey 	= 'usu_id';
	public $_table_usuariosAsignados = 'usuario_Unidades';
	public $_table_cat_formacion = 'cat_formacion';
	
	public function obtenerListadoMedicos(){
		
		return DB::table($this->_table_usuariosAsignados)
		->join($this->table, $this->table.'.'.$this->primaryKey , '=' , $this->_table_usuariosAsignados.'.'.$this->primaryKey)
		->join($this->_table_cat_formacion, $this->_table_cat_formacion.'.formacion_id','=',$this->table.'.formacion_id')
		->where($this->_table_usuariosAsignados.'.clue_id',Session::get('clue_id'))
		->select($this->_table_usuariosAsignados.'.'.'usu_id' , $this->table.'.'.'usu_nombreUsuario' , $this->_table_cat_formacion.'.formacion_nombre')
		->get();
		
	}
	
	public function getSelectListaMedico(){
		
		$arrayMedicos = DB::table($this->_table_usuariosAsignados)
		->join($this->table, $this->table.'.'.$this->primaryKey , '=' , $this->_table_usuariosAsignados.'.'.$this->primaryKey)
		->join($this->_table_cat_formacion, $this->_table_cat_formacion.'.formacion_id','=',$this->table.'.formacion_id')
		->where($this->_table_usuariosAsignados.'.clue_id',Session::get('clue_id'))
		->where($this->table.'.usu_nivel', '<>' ,1)
		->where($this->table.'.usu_activo', '=' ,1)
		->select($this->_table_usuariosAsignados.'.'.'usu_id' , $this->table.'.'.'usu_nombreUsuario' , $this->_table_cat_formacion.'.formacion_nombre')
		->get();
		
		$html = '';
		
		$html = '<select name="medico" id="medico" class="form-control" required="required">
				';
		foreach ($arrayMedicos as $value):
			if($value->usu_id == Session::get('usu_id'))
			$html.='<option value = "'.$value->usu_id.'" selected>'.$value->usu_nombreUsuario.'</option>';
			else{
			$html.='<option value = "'.$value->usu_id.'">'.$value->usu_nombreUsuario.'</option>';
			}
		endforeach;
		
		$html .= '</select>';
		return $html;
		
	}
	
}