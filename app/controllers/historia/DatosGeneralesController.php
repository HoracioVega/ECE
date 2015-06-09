<?php
/**
 * User: gtzrvera
 * Date: 5/05/15
 * Time: 10:22 AM
 */

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;

class DatosGeneralesController extends BaseController
{
    private $_pacienteModel;

    public function __construct()
    {
        $this->_pacienteModel = new Paciente();
    }

    public function getIndex()
    {
        // Conjunto de catálogos para los datos generales del paciente
        $seg_social  = Paciente::getAllProgramasSS();
        $entidades   = Paciente::getAllEntidades();
        $ocupaciones = Paciente::getAllOcupaciones();
        $religiones  = Paciente::getAllReligiones();
        $edo_civil   = Paciente::getAllEdoCivil();
        $escolaridad = Paciente::getAllEscolaridades();
        $paciente = Paciente::where('expediente_id', Input::get('exp_id'))->get();
        
        $municipios  = Paciente::getAllMunicipiosForEntidad($paciente[0]->paciente_edo);
        $localidades = Paciente::getAllLocalidadesForEntAndMun($paciente[0]->paciente_edo,
        		$paciente[0]->paciente_mun);

        return View::make('historia.datosgenerales')->with(compact('seg_social', 'entidades', 'ocupaciones',
            'religiones', 'edo_civil', 'escolaridad', 'paciente', 'municipios', 'localidades'));
    }

    public function postSavedatosgenerales()
    {
        if (Request::ajax()) {

            $data = Input::all();
            $infoPaciente = Paciente::where('expediente_id', Input::get('expediente_id'))->get();

            $data['paciente_fechaEstudio'] = date('Y/m/d', strtotime($data['paciente_fechaEstudio']));
            $data['paciente_fecNac'] = date('Y/m/d', strtotime($data['paciente_fecNac']));
            $data['paciente_fechaVigenciaSeg'] = date('Y/m/d', strtotime($data['paciente_fechaVigenciaSeg']));
            
            $messages = array(
            	'paciente_nombre.required' => ' El nombre del paciente es obligatorio',
            	'paciente_app.required' => ' El apellido paterno es obligatorio',
            	'paciente_apm.required' => ' El apellido materno es obligatorio',
            	'paciente_sexo.required' => ' El sexo del paciente es obligatorio',
            	'date' => ' Ingrese una fecha valida ',
            );
            
            $validator = Validator::make($data, array('paciente_nombre' => 'required', 'paciente_app' => 'required',
                'paciente_apm' => 'required', 'paciente_sexo' => 'required', 'paciente_fechaEstudio' => 'date',
            	'paciente_fecNac' => 'date', 'paciente_fechaVigenciaSeg' => 'date'), $messages);

            if ($validator->fails()) {
            	$errors = $validator->messages();
            	return Response::json($errors->all());
            } else {
            	
            	if ($data['paciente_rfc'] == "") {
            		$data['paciente_rfc'] = Paciente::generateRFC($data['paciente_nombre'], $data['paciente_app'],
            				$data['paciente_apm'], $data['paciente_fecNac']);
            	}
            	
                $paciente = Paciente::find($infoPaciente[0]['paciente_id']);
                $paciente->fill($data);
                $paciente->save();
                
                // Se cambia el estatus del paciente
                $expPaciente = Expediente::find($data['expediente_id']);
                if ($expPaciente->expediente_estatus == 'TEMPORAL') {
                	$expPaciente->expediente_estatus = 'CREADO';
                	$expPaciente->save();
                	DB::table('expediente_consulta')
                		->where('expediente_id', $data['expediente_id'])
                		->update(array('consulta_temporal' => 1));
                }
                
                return Response::json(array('guardado' => '1'));
            }
        }
    }
    
    public function postListmunicipios()
    {
    	if (Request::ajax()) {
    		
    		$data = Input::all();
    		$municipios = $this->_pacienteModel->getAllMunicipiosForEntidad($data['id']);
    		
    		$list = "";
    		foreach ($municipios as $municipio) {
    			$list .= "<option value='".$municipio->cve_mun."'>".$municipio->nom_mun."</option>";
    		}
    		echo $list; die;
    	}
    }
    
    public function postListlocalidades()
    {
    	if (Request::ajax()) {
    		
    		$data = Input::all();
    		$localidades = $this->_pacienteModel->getAllLocalidadesForEntAndMun($data['id_edo'], $data['id_mun']);
    		
    		$list = "";
    		foreach ($localidades as $localidad) {
    			$list .= "<option value='".$localidad->cve_loc."'>".$localidad->nom_loc."</option>";
    		}
    		echo $list; die;
    	}
    }
}