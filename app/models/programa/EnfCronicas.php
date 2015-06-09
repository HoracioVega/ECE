<?php

class EnfCronicas extends Eloquent
{
	public $primary_key = "";
	public $timestamps = false;

	protected $table = "";
	protected $fillable = array();
	
	
	/**
	 * Guarda los datos del diagnóstico en la tabla "programa_cron_diagnostico".
	 * @param array $data
	 */
	public static function saveDiagnosticoEnfCronicas($data)
	{
		$record = DB::table("programa_cron_diagnostico")->where("expediente_id", $data['expediente_id'])->get();

		if (empty($record)) {
			return DB::table("programa_cron_diagnostico")->insert($data);
		} else {
			return DB::table("programa_cron_diagnostico")->where("expediente_id", $data['expediente_id'])
				->update($data);
		}
	}
	
	public static function getDiagnosticoEnfCronicas($expediente_id)
	{
		return DB::table("programa_cron_diagnostico")->where("expediente_id", $expediente_id)->get();
	}

    public static function saveAntecedentes($dataAllForm)
    {
        // Se separan los datos de las dos tablas
        $dataMicro = array(
            "expediente_id"     =>  $dataAllForm['expediente_id'],
            "cron_micro_year"   =>  $dataAllForm['cron_micro_year'],
            "cron_micro_1"      =>  $dataAllForm['cron_micro_1'],
            "cron_micro_2"      =>  $dataAllForm['cron_micro_2'],
            "cron_micro_3"      =>  $dataAllForm['cron_micro_3']
        );
        $dataAnte = array(
            "expediente_id"         =>  $dataAllForm['expediente_id'],
            "cron_ante_prosta"      =>  isset($dataAllForm['cron_ante_prosta'])?$dataAllForm['cron_ante_prosta']:"NO",
            "cron_ante_cardio"      =>  isset($dataAllForm['cron_ante_cardio'])?$dataAllForm['cron_ante_cardio']:"NO",
            "cron_ante_hta"         =>  isset($dataAllForm['cron_ante_hta'])?$dataAllForm['cron_ante_hta']:"NO",
            "cron_ante_cereb"       =>  isset($dataAllForm['cron_ante_cereb'])?$dataAllForm['cron_ante_cereb']:"NO",
            "cron_ante_diabetes"    =>  isset($dataAllForm['cron_ante_diabetes'])?$dataAllForm['cron_ante_diabetes']:"NO",
            "cron_ante_inrenal"     =>  isset($dataAllForm['cron_ante_inrenal'])?$dataAllForm['cron_ante_inrenal']:"NO",
            "cron_ante_disli"       =>  isset($dataAllForm['cron_ante_disli'])?$dataAllForm['cron_ante_disli']:"NO",
            "cron_ante_sp"          =>  isset($dataAllForm['cron_ante_sp'])?$dataAllForm['cron_ante_sp']:"NO",
            "cron_ante_ob"          =>  isset($dataAllForm['cron_ante_ob'])?$dataAllForm['cron_ante_ob']:"NO",
        );

        $antecedente = DB::table("programa_cron_antecedentes")->where("expediente_id", $dataAnte['expediente_id'])->get();
        if (empty($antecedente)) {
            DB::table("programa_cron_antecedentes")->insert($dataAnte);
        } else {
            DB::table("programa_cron_antecedentes")->where("expediente_id", $dataAnte['expediente_id'])
                ->update($dataAnte);
        }

        $micro = DB::table("programa_cron_microalbum")->where("expediente_id", $dataMicro['expediente_id'])
            ->where("cron_micro_year", $dataMicro['cron_micro_year'])->get();
        if (empty($micro)) {
            DB::table("programa_cron_microalbum")->insert($dataMicro);
        } else {
            DB::table("programa_cron_microalbum")->where("expediente_id", $dataMicro['expediente_id'])
                ->where("cron_micro_year", $dataMicro['cron_micro_year'])->update($dataMicro);
        }
    }

    public static function getAntecedentes($expediente_id)
    {
        return DB::table("programa_cron_antecedentes")->where("expediente_id", $expediente_id)->get();
    }

    public static function getMicro($expediente_id)
    {
        return DB::table("programa_cron_microalbum")->where("expediente_id", $expediente_id)->orderBy("cron_micro_year")
            ->get();
    }

    public static function getMicroAnio($expediente_id, $anio)
    {
        return DB::table("programa_cron_microalbum")->where("expediente_id", $expediente_id)->where("cron_micro_year", $anio)
            ->get();
    }
}