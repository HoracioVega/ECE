	
<?php if(isset($datosAgenda)){?>
<?php foreach ($datosAgenda as $value):?>	
	<div class="list-group">
		<a class="list-group-item active" href="#">{{$value->agenda_fecha_inicio}}</a> 
		<a class="list-group-item" href="#"> 
			<label>Paciente:</label> 
			<span>{{$value->nombrePaciente}}</span><br> 
			<label>Pendiente Asunto:</label> 
			<span>{{$value->agenda_asunto}}</span><br> 
			<label>Horario:</label> <span>{{$value->agenda_horaInicio}} a {{$value->agenda_horafin}}</span>
		</a> 
	</div>
<?php endforeach;?>
<?php }?>
