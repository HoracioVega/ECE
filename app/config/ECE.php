<?php

return array(

	'proyecto' => 'EXPEDIENTE CLÍNICO ELECTRÓNICO',

	/*
	|--------------------------------------------------------------------------
	| CSS Directorio
	|--------------------------------------------------------------------------
	|
	|
	*/
	'css' => '/css',

	/*
	|--------------------------------------------------------------------------
	| JS Directorio
	|--------------------------------------------------------------------------
	|
	|
	*/
	'js' => '/js',

	/*
	|--------------------------------------------------------------------------
	| JS Directorio
	|--------------------------------------------------------------------------
	|
	|
	*/
	'images' => '/images',
		
		
	/*
	|--------------------------------------------------------------------------
	| Layout Directorio
	|--------------------------------------------------------------------------
	|
	|
	*/
	'layout' => 'layouts.default',

	/*
	|--------------------------------------------------------------------------
	| Mensajes
	|--------------------------------------------------------------------------
	|
	|
	*/
	'msg_error1' => '<div class="alert alert-danger alert-dismissable"> <strong>¡Error!</strong> Ha ocurrido un problema en alguno de los campos. </div>',
	'msg_guardando' => '<div class="alert alert-info" role="alert"><img src="'.Request::root().'/img/preloader/loader.gif" /> Guardando...</div>',
	'msg_cargando' => '<div class="alert" role="alert"><img src="'.Request::root().'/img/preloader/loader.gif" /> Cargando...</div>',
	/*
	|--------------------------------------------------------------------------
	| Etiquetas SESA
	|--------------------------------------------------------------------------
	|
	|*/
	'telefono_sesa'=>'',
	'rfc_sesa'=>array('RCO1403058Y3','SIG110407PD4'),

	/*
	|--------------------------------------------------------------------------
	| URIS SIN PRIVILEGIOS
	|--------------------------------------------------------------------------
	|
	|
	*/
	'uris_permitidas' => array(array('nombre'=>'ajax', 'tipo'=>'contiene'), array('nombre'=>'dashboard', 'tipo'=>'igual')),
);
