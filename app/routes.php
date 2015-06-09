<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(array('before'=> 'auth'),function(){
	
	Route::controller('lista', 'ListaController');
	
	Route::controller('dashboard/dashboard', 'DashboardController');
	
	Route::controller('historia/principal', 'PrincipalController');
	
	Route::controller('historia/perfil', 'PerfilController');
	
	Route::controller('historia/datosgenerales', 'DatosGeneralesController');
	
	//Route::controller('historia/Ant_gineco', 'AginecoController'); Falta template
	
	Route::controller('historia/heredofamiliar', 'AheredoFamiliaresController');
	
	Route::controller('historia/nopatologicos', 'ApersonalesNoPatoController');
	
	Route::controller('historia/patologicos', 'ApersonalesPatoController');
	
	Route::controller('historia/impresion', 'ImpresionController');
	
	Route::controller('historia/exploracion' , 'ExploracionFisicaController');
	
	Route::controller('historia/terapeutica' , 'TerapeuticaController');
	
	Route::controller('historia/examen' , 'ExamenesSolController');
	
	Route::controller('laboratorio/gabinete' , 'LaboratorioController');
	
	Route::controller('hojaevolucion/evolucion' , 'HojaEvolucionController');
	
	Route::controller('referencia', 'ReferenciaController');
	
	Route::controller('contrareferencia', 'ContraReferenciaController');
	
	Route::controller('visita', 'VisitaController');
	
	Route::controller('ginecobstetricos', 'GinecobstetricoController');
	//
	
	//***************** RUTAS DEL APARTADO DE PROGRAMAS **************/	
	Route::controller('programa/deteccion', 'DeteccionController');
	
	Route::controller('programa/enfcronicas', 'CronicasController');
	
	Route::controller('programa/embarazo', 'EmbarazoController');
	
	Route::controller('programa/odontologia', 'OdontologiaController');
	
	Route::controller('programa/ninosano', 'NinosanoController');
	
	//CONTROLLERS ENFERMERIA
	
	Route::controller('enfermeria/generales' , 'DatosGeneralesEnfController');
	
	Route::controller('agenda' , 'AgendaController');
	
	
	
	
});

Route::controller('login', 'LoginController');




Route::get('/', function()
{
	return View::make('login.index');
});