<div class="container-fluid">

	<nav class="navbar navbar-default" role="navigation">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	    	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-menu">
		        <span class="sr-only">Mostrar Menú</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
	        </button>
	        <a class="navbar-brand" href="#"><strong>Blue</strong>Care</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="top-menu">
	       
	        <ul class="nav navbar-nav">
	        	<li><a href="{{Request::root()}}/lista"><span class="glyphicon glyphicon-list"></span><span class="menu-item-text">Lista de espera</span></a></li>

	        	<li class="dropdown active">
	        		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
	        			<span class="glyphicon glyphicon-user"></span><span class="menu-item-text">Pacientes</span> <span class="caret"></span>
	        		</a>
	        		<ul class="dropdown-menu" role="menu">
	        			<li><a href=""><span class="glyphicon glyphicon-plus"></span> Nuevo Paciente</a></li>
	        			<li><a href=""><span class="glyphicon glyphicon-search"></span> Buscar Paciente</a></li>
	        			<li><a href="{{Request::root()}}/agenda/"><span class="glyphicon glyphicon-search"></span> Agendar Paciente</a></li>
	        		</ul>
	        	</li>
	        	<li class="dropdown">
	        		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
	        			<span class="glyphicon glyphicon-stats"></span><span class="menu-item-text">Reportes</span> <span class="caret">
	        		</a>
	        		<ul class="dropdown-menu" role="menu">
	        			<li><a href=""><span class="glyphicon glyphicon-file"></span> Hoja diaria</a></li>
	        			<li><a href=""><span class="glyphicon glyphicon-file"></span> Reporte de Enfermedades</a></li>
	        		</ul>
	        	</li>
	        	
	        </ul>

	        <ul class="nav navbar-nav navbar-right">
	        	<li class="dropdown">

	        		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
	        			<span class="glyphicon glyphicon-user"></span><span class="menu-item-text">@if (Session::get('clue_nombre_unidad') !== null )&nbsp;{{Session::get('usu_nombreUsuario')}}@else error desconocido, favor de logearse de nuevo. @endif</span> <span class="caret"></span>
	        		</a>

	    			<ul class="dropdown-menu" role="menu">
	    				<li class="dropdown-header"><span class="glyphicon glyphicon-map-marker"></span> @if (Session::get('clue_nombre_unidad') !== null )&nbsp;{{Session::get('clue_nombre_unidad')}}@else No se ha asignado ninguna Unidad Medica, favor de logearse otra vez. @endif</li>
	    				<li class="dropdown-header"><span class="glyphicon glyphicon-record"></span> @if (Session::get('formacion_nombre') !== null )&nbsp;{{Session::get('formacion_nombre')}}@else Error desconocido, favor de logearse de nuevo. @endif</li>
	    				<li class="divider"></li>
	    				<li><a href="{{Request::root()}}/login/logout">Cerrar sesión</a></li>
	    			</ul>
	        	</li>
	        	<li class="dropdown">
	        		<a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
	        			<span class="glyphicon glyphicon-comment"></span> <span class="caret"></span>
	        		</a>
	        		<ul class="dropdown-menu" role="menu">
	    				<li><a href="" onclick="ventanaChat()">Chat</a></li>
	    				<li><a href="">Foro</a></li>
	    			</ul>
	        	</li>
	        	<li><a href="" class="icono-ayuda">?</a></li>
	        </ul>

	    </div><!-- /.navbar-collapse -->
	</nav>

</div><!-- /.container-fluid -->

<script>
function ventanaChat() {
    var ventanaChat = window.open("chat.php", "", "width=700, height=500");
}
</script>