<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<nav class="navbar" id="SecMenu">
		<ul class="nav navbar-nav">
			<li class="titulo-secmenu">
				<span class="titulo">{{Session::get('nombrePaciente')}}</span>
				<span class="subtitulo">Expediente: 000 @if(isset($_GET['exp_id'])){{$_GET['exp_id']}} @endif</span>
			</li>
			<li><a id = "dashboardView" href="#" data = "99" title="Principal"><span class="glyphicon glyphicon-th-large"></span><span class="menusec-item-text">Principal</span></a></li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" title="Historia Clínica"><span class="glyphicon glyphicon-list-alt"></span><span class="menusec-item-text">Historia Clínica</span> <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<li><a id = "datosGeneView" href="#" data = "1">Datos generales</a></li>
					<li class="divider"></li>
					<li><a id = "perfilView" href="#" data = "2">Perfil</a></li>
					@if (Session::get('paciente_sexo') == 'M')
					<li><a id = "antginecoView" href="#" data = "18">A. Ginecobstétricos</a></li>
					@endif
					<li><a id = "antHeredoView" href="#" data = "3">A. Heredofamiliares</a></li>
					<li><a id = "perPatoView" href="#" data = "4">A. Personales patológicos</a></li>
					<li><a id = "noPatoView" href="#" data = "5">A. Personales no patológicos</a></li>
					<li><a id = "expFisicaView" href="#" data = "6">Exploración física</a></li>
					<li><a id = "impDiagView" href="#" data = "7">Impresión diagnóstica (IDX)</a></li>
					<li><a id = "terapeuticaView" href="#" data = "8">Terapéutica</a></li>
					<li><a id = "examenesView" href="#" data = "9">Exámenes solicitados</a></li>
				</ul>
			</li>
			<li><a id = "hojaevolucionView" data = "11" href="#" title="Hoja de evolución"><span class="glyphicon glyphicon-file"></span><span class="menusec-item-text">Hoja de evolución</span></a></li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" title="Laboratorio"><span class="glyphicon glyphicon-tint"></span><span class="menusec-item-text">Laboratorio</span> <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<li><a id="exaLabView" href="#" data="12" href="">Exámenes de laboratorio</a></li>
					<li><a id="LabGabineteView" data="15" href="#">Exámenes de gabinete</a></li>
				</ul>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" title="Ref y Contraref"><span class="glyphicon glyphicon-transfer"></span><span class="menusec-item-text">Ref y Contraref</span> <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<li><a id="referenciaView" data="14" href="#">Referencia</a></li>
					<li><a id="contrareferenciaView" data="16" href="#">Contrareferencia</a></li>
					<li><a id="visitaView" data="17" href="#">Visita domiciliaria</a></li>
				</ul>
			</li>
			<li><a id="recetarioView" data="13" href="#" title="Recetario"><span class="glyphicon glyphicon-book"></span><span class="menusec-item-text">Recetario</span></a></li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" title="Programas"><span class="glyphicon glyphicon-th"></span><span class="menusec-item-text">Programas</span> <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<li><a id="programDeteccionView" href="#" data="18">Detección</a></li>
					<li><a id="programOdonView" href="#" data="19">Odontología</a></li>
					<li><a id="programEmbaView"href="#" data="20">Embarazo</a></li>
					<li><a id="programNsanoView"href="#" data="21">Niño Sano</a></li>
					<li><a id="programaCronicasView"href="#" data="22">Enfermedades crónicas</a></li>
					<li><a href="" onclick="ventanaPsicologia()">Psicología</a></li>
				</ul>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" title="Línea de vida"><span class="glyphicon glyphicon-menu-hamburger"></span><span class="menusec-item-text">Línea de vida</span> <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="">Item 1</a></li>
					<li><a href="">Item 2</a></li>
					<li><a href="">Item 3</a></li>
				</ul>
			</li>
		</ul>

	</nav>
</div>
