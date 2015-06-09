<?php
class Clues extends Eloquent{
	
	public $prefix 		= 'clue';
	protected $table 	= 'cat_clues';
	public $primaryKey 	= 'clue_id';
	
	public static function getAllNamesClues()
	{
		return DB::table('cat_clues')->select('clue_nombre_unidad', 'clue_id')->get();
	}
	
	public static function getDireccionClue($id_clue)
	{
		return DB::table('cat_clues')->select('clue_domicilio', 'clue_nombre_unidad')->where('clue_id', $id_clue)->get();
	}
}