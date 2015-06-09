<?php
class AgendaModel extends Eloquent {
	
	protected $table 		= 'expediente_agenda';
	public $primaryKey 	= 'agenda_id';
	public $timestamps = false;
	protected $fillable = array('clue_id','usu_id', 'expediente_id', 
			'agenda_asunto' , 'agenda_fecha_inicio','agenda_fecha_fin','agenda_horaInicio',
			'agenda_horafin', 'agenda_usuario_agenda', 'agenda_coordinacion','agenda_todo_el_dia');
	
	
	
}