<?php

class CronicasController extends BaseController
{
	public function getIndex()
	{
		$expediente = Input::get('exp_id');
		$paciente = Paciente::where('expediente_id', Input::get('exp_id'))->get()[0];
		$segSocial = array(
				'nombre' => Paciente::getNameProgramaSS($paciente->paciente_segSocial)[0]->seg_nombre
		);
        $dataAnte = EnfCronicas::getAntecedentes($expediente);
        $dataMicro = EnfCronicas::getMicro($expediente);
		$dataDiag = EnfCronicas::getDiagnosticoEnfCronicas($expediente);
		
		if (!empty($dataDiag)) {
			$dataDiag = $dataDiag[0];
		}
        if (!empty($dataAnte)) {
            $dataAnte = $dataAnte[0];
        }
		
		return View::make('programas.enfermedades-cronicas')->with(compact("paciente", "segSocial", "dataDiag", "dataAnte",
            "dataMicro"));
	}
	
	public function postSavediagnostic()
	{
		if (Request::ajax()) {
			$diagnosticData = Input::all();
			$diagnosticData['cron_diag_ingfecha'] = date('Y-m-d', strtotime($diagnosticData['cron_diag_ingfecha']));
			
			$messages = array(
				"date"	=>	"Ingrese una fecha valida.<br>",
				"cron_diag_ing.alpha"			=>	"Verifique que el tipo no encuentre en blanco.<br>",
				"cron_diag_DM.alpha"			=>	"Verifique que el campo de diabetes no se encuentre en blanco.<br>",
				"cron_diag_OB.alpha"			=>	"Verifique que el campo de obesidad se encuentre en blanco.<br>",
				"cron_diag_HART.alpha"			=>	"Verifique que el campo de hipertensión no se encuentre en blanco.<br>",
				"cron_diag_DISL.alpha"			=>	"Verifique que el campo de dislipedias no se encuentre en blanco.<br>",
				"cron_diag_deteccion.alpha"		=>	"Verifique que el campo de deteccion no se encuentre en blanco.<br>",
				"cron_diag_tratamiento.alpha"	=>	"Verifique que el campo de tratamiento no se encuentre en blanco.<br>",
			);
			$validator = Validator::make($diagnosticData, array(
				"cron_diag_ingfecha"	=>	"date",
				"cron_diag_ing"			=>	"alpha",
				"cron_diag_DM"			=>	"alpha",
				"cron_diag_OB"			=>	"alpha",
				"cron_diag_HART"		=>	"alpha",
				"cron_diag_DISL"		=>	"alpha",
				"cron_diag_deteccion"	=>	"alpha",
				"cron_diag_tratamiento"	=>	"alpha"
			), $messages);
			
			if ($validator->fails()) {
				$errors = $validator->messages();
				return Response::json($errors->all());
			} else {
				$result = EnfCronicas::saveDiagnosticoEnfCronicas($diagnosticData);
				
				return Response::json(array(
					"result" => $result	
				));
			}
		}
	}

    public function postSaveantecedent()
    {
        if (Request::ajax()) {
            $allDataForm = Input::all();

            EnfCronicas::saveAntecedentes($allDataForm);

            return Response::json(array(
                "result" => 1
            ));
        }
    }

    public function postObtenermicroanio()
    {
        if (Request::ajax()) {
            $anio = Input::get("anio");
            $expediente_id = Input::get("expediente_id");

            $microalbum = EnfCronicas::getMicroAnio($expediente_id, $anio);

            if (!empty($microalbum)) {
                return Response::json(array(
                    "result" => $microalbum[0]
                ));
            } else {
                return Response::json(array(
                    "result" => 0
                ));
            }
        }
    }
}