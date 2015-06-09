@extends(Config::get('ECE.layout')) 

@section('head')
{{-- Libreria para Select2 --}} {{

HTML::script('js/datetimepicker/jquery.datetimepicker.min.js'); }} {{
HTML::script('js/jquery.validate.min.js'); }} {{
HTML::script('js/sweet-alert.min.js'); }} {{
HTML::script('js/utilities.js'); }} {{
HTML::style('css/datetimepicker/datetimepicker.min.css'); }} {{
HTML::style('css/sweetalert.min.css'); }}

<script>

var url = "";
//EN ESTE APARTADO REVISAMOS SI SE LOGUEA COMO ENFERMERA O COMO MEDICO GENERAL Y LO REDIRECCIONAMOS,
//CUANDO SE LOGUEE COMO ROOT , O AUDITOR , O COMO ALGUN ROL REFERENTE A REPORTES , 
//LA COMPARACION SERA EN LISTA. VIEW.INDEX

@if(Session::get('usu_nivel') == 2)
url = 'historia/datosgenerales'
@else
url = 'enfermeria/generales'
@endif

$.ajax({
	type: "get",
	cache: true,
	url: urlRoot+"/"+url,
	data: "exp_id="+{{$_GET['exp_id']}},
	dataType: 'HTML'
})
.done(function(data){
	$("#paginaAjax").html(data);
})
.fail(function(data){
	showAlert("error", "Error desconocido: "+data);
});	
</script>
@stop