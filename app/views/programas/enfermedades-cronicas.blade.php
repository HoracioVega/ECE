<div class="alert-box-container">
    <div id="alert-box" class="">
        <p>Mensaje</p>
    </div>
</div>
<!-- Container -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h2 class="nomargin text-primary">Enfermedades Crónicas</h2>
                    <h4 class="text-muted">Tarjeta de registro y control</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="page-header nomargintop">
                        <h4>Datos de identificación</h4>
                    </div>

                    <form class="form-horizontal">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-4 col-md-4 col-lg-4">No. Expediente:</label>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <p>{{$paciente->expediente_id}}</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-4 col-md-4 col-lg-4">Nombres:</label>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <p>{{$paciente->paciente_nombre}}</p>
                                    </div>
                                    <label class="col-xs-12 col-sm-4 col-md-4 col-lg-4">Apellidos:</label>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <p>{{$paciente->paciente_app}} {{$paciente->paciente_apm}}</p>
                                    </div>
                                    <label class="col-xs-12 col-sm-4 col-md-4 col-lg-4">Nacimiento:</label>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <p>{{date('d-m-Y', strtotime($paciente->paciente_fecNac))}}</p>
                                    </div>
                                    <label class="col-xs-12 col-sm-4 col-md-4 col-lg-4">Edad:</label>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <p>{{Utils::calculaEdadFechas($paciente->paciente_fecNac, date('m-d-Y'))}} años</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-4 col-md-4 col-lg-4">Sexo:</label>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <p>@if ($paciente->paciente_sexo == 'H') Masculino @else Femenino @endif</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-4 col-md-4 col-lg-4">Indigena:</label>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <p>{{$paciente->paciente_indigena}}</p>
                                    </div>
                                    <label class="col-xs-12 col-sm-4 col-md-4 col-lg-4">Domicilio:</label>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <p>{{$paciente->paciente_calle}} {{$paciente->paciente_numDom}}, Col. {{$paciente->paciente_colonia}}</p>
                                    </div>
                                    <label class="col-xs-12 col-sm-4 col-md-4 col-lg-4">Derechohabiencia:</label>
                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                        <p>{{$segSocial['nombre']}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-primary">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#antecedentes">Antecedentes</a></h4>
                    </div>
                    <div id="antecedentes" class="panel-collapse collapse" role="tabpanel">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <form id="form-ante-cron">
                                        <table class="table table-striped table-condensed radio-min">
                                            <thead>
                                            <tr>
                                                <th><b>Enfermedad</b></th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>Cáncer prostático</td>
                                                <td>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input @if (isset($dataAnte->cron_ante_prosta) && $dataAnte->cron_ante_prosta == "SI") {{"checked"}} @endif type="checkbox" name="cron_ante_prosta" id="cron_ante_prosta" value="SI">
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Enf. Cardiovascular</td>
                                                <td>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input @if (isset($dataAnte->cron_ante_cardio) && $dataAnte->cron_ante_cardio == "SI") {{"checked"}} @endif type="checkbox" name="cron_ante_cardio" id=cron_ante_cardio"" value="SI">
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Enf. Cereb. Vascular</td>
                                                <td>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input @if (isset($dataAnte->cron_ante_cereb) && $dataAnte->cron_ante_cereb == "SI") {{"checked"}} @endif type="checkbox" name="cron_ante_cereb" id="cron_ante_cereb" value="SI">
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Insuficiencia Renal</td>
                                                <td>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input @if (isset($dataAnte->cron_ante_inrenal) && $dataAnte->cron_ante_inrenal == "SI") {{"checked"}} @endif type="checkbox" name="cron_ante_inrenal" id="cron_ante_inrenal" value="SI">
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Hipertensión Arterial</td>
                                                <td>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input @if (isset($dataAnte->cron_ante_hta) && $dataAnte->cron_ante_hta == "SI") {{"checked"}} @endif type="checkbox" name="cron_ante_hta" id="cron_ante_hta" value="SI">
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Diabetes Mellitus</td>
                                                <td>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input @if (isset($dataAnte->cron_ante_diabetes) && $dataAnte->cron_ante_diabetes == "SI") {{"checked"}} @endif type="checkbox" name="cron_ante_diabetes" id="cron_ante_diabetes" value="SI">
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Dislipidemias</td>
                                                <td>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input @if (isset($dataAnte->cron_ante_disli) && $dataAnte->cron_ante_disli == "SI") {{"checked"}} @endif type="checkbox" name="cron_ante_disli" id="cron_ante_disli" value="SI">
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Sobrepeso</td>
                                                <td>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input @if (isset($dataAnte->cron_ante_sp) && $dataAnte->cron_ante_sp == "SI") {{"checked"}} @endif type="checkbox" name="cron_ante_sp" id="cron_ante_sp" value="SI">
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Obesidad</td>
                                                <td>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input @if (isset($dataAnte->cron_ante_ob) && $dataAnte->cron_ante_ob == "SI") {{"checked"}} @endif type="checkbox" name="cron_ante_ob" id="cron_ante_ob" value="SI">
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                    <table class="table table-condensed">
                                        <thead>
                                        <tr>
                                            <th><b>Microalbuminuria</b></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <form id="form-micro-cron" class="form-horizontal">
                                                    <div class="form-group">
                                                        <label class="control-label col-xs-3 col-sm-1 col-md-1 col-lg-1">Año:</label>
                                                        <div class="col-xs-3 col-sm-2 col-md-2 col-lg-2">
                                                            <select name="cron_micro_year" id="cron_micro_year" class="form-control">
                                                                <option>Seleccione un año</option>
                                                                @for ($i = 2014; $i <= 2020; $i++)
                                                                <option value="{{$i}}">{{$i}}</option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                        <label class="control-label col-xs-3 col-sm-1 col-md-1 col-lg-1">1:</label>
                                                        <div class="col-xs-3 col-sm-2 col-md-2 col-lg-2">
                                                            <input type="text" name="cron_micro_1" id="cron_micro_1" class="form-control" value="" required="required" pattern="" title="">
                                                        </div>
                                                        <label class="control-label col-xs-3 col-sm-1 col-md-1 col-lg-1">2:</label>
                                                        <div class="col-xs-3 col-sm-2 col-md-2 col-lg-2">
                                                            <input type="text" name="cron_micro_2" id="cron_micro_2" class="form-control" value="" required="required" pattern="" title="">
                                                        </div>
                                                        <label class="control-label col-xs-3 col-sm-1 col-md-1 col-lg-1">3:</label>
                                                        <div class="col-xs-3 col-sm-2 col-md-2 col-lg-2">
                                                            <input type="text" name="cron_micro_3" id="cron_micro_3" class="form-control" value="" required="required" pattern="" title="">
                                                            <input type="hidden" name="expediente_id" id="expediente_id" value="{{Input::get("exp_id")}}">
                                                        </div>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <!-- HISTORIAL DE CONSULTAS PREVIAS -->
                                    <table class="table table-condensed table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th><b>Consultas previas</b></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                            <tr>
                                                <th>Año</th>
                                                <th>1</th>
                                                <th>2</th>
                                                <th>3</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($dataMicro as $record)
                                                <tr>
                                                    <td>{{$record->cron_micro_year}}</td>
                                                    <td>{{$record->cron_micro_1}}</td>
                                                    <td>{{$record->cron_micro_2}}</td>
                                                    <td>{{$record->cron_micro_3}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <!--
                                    <ul class="pagination pagination-sm">
                                        <li><a href="#">&laquo;</a></li>
                                        <li><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                        <li><a href="#">&raquo;</a></li>
                                    </ul>
                                    -->
                                    <!-- FIN HISTORIAL DE CONSULTAS PREVIAS -->
                                </div>
                                <div class="col-xs-12 text-right">
                                    <a href="#" id="save-ante-cron" class="btn btn-primary btn-sm" type="submit">Guardar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title"><a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#diagnostico">Datos del diagnóstico</a></h4>
                    </div>
                    <div id="diagnostico" class="panel-collapse collapse" role="tabpanel">
                        <div class="panel-body">
                            <form id="form-diag-cron">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-3 form-group">
                                        <label>Tipo:</label>
                                        <select name="cron_diag_ing" id="cron_diag_ing" class="form-control">
                                            <option>Seleccione una opción</option>
                                            <option @if (isset($dataDiag->cron_diag_ing) && $dataDiag->cron_diag_ing=="INGRESO") selected="selected" @endif value="INGRESO">Ingreso</option>
                                            <option @if (isset($dataDiag->cron_diag_ing) && $dataDiag->cron_diag_ing=="REINGRESO") selected="selected" @endif value="REINGRESO">Reingreso</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 form-group">
                                        <label>Fecha:</label>
                                        <input type="text" name="cron_diag_ingfecha" id="cron_diag_ingfecha" class="form-control" value="@if (isset($dataDiag->cron_diag_ingfecha)) {{date('d-m-Y', strtotime($dataDiag->cron_diag_ingfecha))}} @endif">
                                    </div>
                                    <div class="col-xs-12 col-sm-3 form-group">
                                        <label>Diabetes Mellitus:</label>
                                        <select name="cron_diag_DM" id="cron_diag_DM" class="form-control disl">
                                            <option>Seleccione una opción</option>
                                            <option @if (isset($dataDiag->cron_diag_DM) && $dataDiag->cron_diag_DM=="SI") selected="selected" @endif value="SI">SI</option>
                                            <option @if (isset($dataDiag->cron_diag_DM) && $dataDiag->cron_diag_DM=="NO") selected="selected" @endif value="NO">NO</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 form-group">
                                        <label>Obesidad:</label>
                                        <select name="cron_diag_OB" id="cron_diag_OB" class="form-control disl">
                                            <option>Seleccione una opción</option>
                                            <option @if (isset($dataDiag->cron_diag_OB) && $dataDiag->cron_diag_OB=="SI") selected="selected" @endif value="SI">SI</option>
                                            <option @if (isset($dataDiag->cron_diag_OB) && $dataDiag->cron_diag_OB=="NO") selected="selected" @endif value="NO">NO</option>
                                        </select>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 form-group">
                                        <label>Hipertensión arterial:</label>
                                        <select name="cron_diag_HART" id="cron_diag_HART" class="form-control disl">
                                            <option>Seleccione una opción</option>
                                            <option @if (isset($dataDiag->cron_diag_HART) && $dataDiag->cron_diag_HART=="SI") selected="selected" @endif value="SI">SI</option>
                                            <option @if (isset($dataDiag->cron_diag_HART) && $dataDiag->cron_diag_HART=="NO") selected="selected" @endif value="NO">NO</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 form-group">
                                        <label>Dislipedias:</label>
                                        <select name="cron_diag_DISL" id="cron_diag_DISL" class="form-control">
                                            <option>Seleccione una opción</option>
                                            <option @if (isset($dataDiag->cron_diag_DISL) && $dataDiag->cron_diag_DISL=="SI") selected="selected" @endif value="SI">SI</option>
                                            <option @if (isset($dataDiag->cron_diag_DISL) && $dataDiag->cron_diag_DISL=="NO") selected="selected" @endif value="NO">NO</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 form-group">
                                        <label>Síndrome metabólico:</label>
                                        <input type="text" name="cron_diag_SMETA" id="cron_diag_SMETA" class="form-control" value="@if (isset($dataDiag->cron_diag_SMETA)) {{$dataDiag->cron_diag_SMETA}} @endif" readonly>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 form-group">
                                        <label>Detección por:</label>
                                        <select name="cron_diag_deteccion" id="" class="form-control">
                                            <option>Seleccione una opción</option>
                                            <option @if (isset($dataDiag->cron_diag_deteccion) && $dataDiag->cron_diag_deteccion=="PESQUISA") selected="selected" @endif value="PESQUISA">Pesquisa</option>
                                            <option @if (isset($dataDiag->cron_diag_deteccion) && $dataDiag->cron_diag_deteccion=="SINTOMA") selected="selected" @endif value="SINTOMA">Sintoma</option>
                                        </select>
                                    </div>

                                    <div class="col-xs-12 col-sm-3 form-group">
                                        <label>Tratamiento previo:</label>
                                        <select name="cron_diag_tratamiento" id="cron_diag_tratamiento" class="form-control">
                                            <option>Seleccione una opción</option>
                                            <option @if (isset($dataDiag->cron_diag_tratamiento) && $dataDiag->cron_diag_tratamiento=="SI") selected="selected" @endif value="SI">SI</option>
                                            <option @if (isset($dataDiag->cron_diag_tratamiento) && $dataDiag->cron_diag_tratamiento=="NO") selected="selected" @endif value="NO">NO</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-12 text-right">
                                        <input type="hidden" name="expediente_id" id="expediente_id" value="{{Input::get('exp_id')}}">
                                        <a id="save-diag-cron" class="btn btn-primary btn-sm" href="#">Guardar</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading" role="tab" id="headingThree"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#consultas">Historial de consultas</a></h4></div>
                    <div id="consultas" class="panel-collapse collapse" role="tabpanel">
                        <div class="panel-body">
                            <!--
                            <div class="table-responsive">
                                <table class="table table-condensed table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Peso</th>
                                        <th>IMC</th>
                                        <th>Circ. Cintura</th>
                                        <th>T.A.</th>

                                        <th></th>
                                        <th>Glucemia</th>
                                        <th>HbA1C%</th>
                                        <th>Revisión pies</th>
                                        <th>Colesterol</th>

                                        <th></th>
                                        <th></th>
                                        <th>Trigliceridos</th>
                                        <th>Tratamiento</th>
                                        <th></th>

                                        <th>¿Controlado?</th>
                                        <th>Gpo. Ayuda M.</th>
                                        <th>Compli.</th>
                                        <th>Refs</th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th>Sistólica</th>

                                        <th>Diastólica</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th>Total</th>

                                        <th>LDL</th>
                                        <th>HDL</th>
                                        <th></th>
                                        <th>No.</th>
                                        <th>Farmaco</th>

                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>06/05/2015</td>
                                        <td>68kg</td>
                                        <td>32.15</td>
                                        <td>48cms</td>
                                        <td>128</td>

                                        <td>110</td>
                                        <td>158</td>
                                        <td>0000</td>
                                        <td>Si</td>
                                        <td>120</td>

                                        <td>120</td>
                                        <td>130</td>
                                        <td>005</td>
                                        <td>012</td>
                                        <td>Captopril</td>

                                        <td>Si</td>
                                        <td>No</td>
                                        <td>Sensible a los antibioticos</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>06/05/2015</td>
                                        <td>68kg</td>
                                        <td>32.15</td>
                                        <td>48cms</td>
                                        <td>128</td>

                                        <td>110</td>
                                        <td>158</td>
                                        <td>0000</td>
                                        <td>Si</td>
                                        <td>120</td>

                                        <td>120</td>
                                        <td>130</td>
                                        <td>005</td>
                                        <td>012</td>
                                        <td>Captopril</td>

                                        <td>Si</td>
                                        <td>No</td>
                                        <td>Sensible a los antibioticos</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>06/05/2015</td>
                                        <td>68kg</td>
                                        <td>32.15</td>
                                        <td>48cms</td>
                                        <td>128</td>

                                        <td>110</td>
                                        <td>158</td>
                                        <td>0000</td>
                                        <td>Si</td>
                                        <td>120</td>

                                        <td>120</td>
                                        <td>130</td>
                                        <td>005</td>
                                        <td>012</td>
                                        <td>Captopril</td>

                                        <td>Si</td>
                                        <td>No</td>
                                        <td>Sensible a los antibioticos</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>06/05/2015</td>
                                        <td>68kg</td>
                                        <td>32.15</td>
                                        <td>48cms</td>
                                        <td>128</td>

                                        <td>110</td>
                                        <td>158</td>
                                        <td>0000</td>
                                        <td>Si</td>
                                        <td>120</td>

                                        <td>120</td>
                                        <td>130</td>
                                        <td>005</td>
                                        <td>012</td>
                                        <td>Captopril</td>
                                        <td>Si</td>
                                        <td>No</td>
                                        <td>Sensible a los antibioticos</td>
                                        <td></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div><br>-->

                            <form>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-2 form-group">
                                        <label>Fecha:</label>
                                        <input type="text" name="" id="" class="form-control" value="">
                                    </div>
                                    <div class="col-xs-12 col-sm-2 form-group">
                                        <label>Peso:</label>
                                        <input type="text" name="" id="" class="form-control" value="">
                                    </div>
                                    <div class="col-xs-12 col-sm-2 form-group">
                                        <label>IMC:</label>
                                        <input type="text" name="" id="" class="form-control" value="">
                                    </div>
                                    <div class="col-xs-12 col-sm-2 form-group">
                                        <label>Circ. cintura:</label>
                                        <input type="text" name="" id="" class="form-control" value="">
                                    </div>
                                    <div class="col-xs-12 col-sm-2 form-group">
                                        <label>T.A. Sistólica:</label>
                                        <input type="text" name="" id="" class="form-control" value="">
                                    </div>

                                    <div class="col-xs-12 col-sm-2 form-group">
                                        <label>T.A. Diastólica:</label>
                                        <input type="text" name="" id="" class="form-control" value="">
                                    </div>
                                    <div class="col-xs-12 col-sm-2 form-group">
                                        <label>Glicemia <small>(mg/dl)</small>:</label>
                                        <input type="text" name="" id="" class="form-control" value="">
                                    </div>
                                    <div class="col-xs-12 col-sm-2 form-group">
                                        <label>HbA1C%:</label>
                                        <input type="text" name="" id="" class="form-control" value="">
                                    </div>
                                    <div class="col-xs-12 col-sm-2 form-group">
                                        <label>Revisión pies:</label>
                                        <input type="text" name="" id="" class="form-control" value="">
                                    </div>
                                    <div class="col-xs-12 col-sm-2 form-group">
                                        <label>Colesterol</label>
                                        <input type="text" name="" id="" class="form-control" placeholder="Total (mg/dl)">
                                    </div>
                                    <div class="col-xs-12 col-sm-1 form-group">
                                        <label>&nbsp;</label>
                                        <input type="text" name="" id="" class="form-control" placeholder="LDL (mg/dl)">
                                    </div>
                                    <div class="col-xs-12 col-sm-1 form-group">
                                        <label>&nbsp;</label>
                                        <input type="text" name="" id="" class="form-control" placeholder="HDL (mg/dl)">
                                    </div>
                                    <div class="col-xs-12 col-sm-2 form-group">
                                        <label>Trigliceridos</label>
                                        <input type="text" name="" id="" class="form-control" value="">
                                    </div>
                                    <div class="col-xs-12 col-sm-2 form-group">
                                        <label>Tratamiento</label>
                                        <select name="" id="" class="form-control">
                                            <option value="">No de fármaco</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-12 col-sm-2 form-group">
                                        <label>&nbsp;</label>
                                        <select name="" id="" class="form-control">
                                            <option value="">Fármaco</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-12 col-sm-2 form-group">
                                        <label>Gpo. de ayuda mutua</label>
                                        <select name="" id="" class="form-control">
                                            <option value="">No</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 form-group">
                                        <label>Complicaciones</label>
                                        <input type="text" name="" id="" class="form-control" value="">
                                    </div>
                                    <div class="col-xs-12 col-sm-3 form-group">
                                        <label>Referencia</label>
                                        <input type="text" name="" id="" class="form-control" value="">
                                    </div>

                                    <div class="col-xs-12 col-sm-2 form-group">
                                        <label>¿Controlado?</label>
                                        <select name="" id="" class="form-control">
                                            <option value="">No</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 form-group">
                                        <label>Hiperplasia próstatica benigna:</label>
                                        <select name="" id="" class="form-control">
                                            <option value="">No</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 form-group">
                                        <label>Retinopatia diabética:</label>
                                        <select name="" id="" class="form-control">
                                            <option value="">No</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 form-group">
                                        <label>Baja</label>
                                        <input type="text" name="" id="" class="form-control" value="">
                                    </div>

                                    <div class="col-xs-12 col-sm-12 form-group">
                                        <label>Observaciones</label>
                                        <textarea rows="2" name="" id="" class="form-control" value=""></textarea>
                                    </div>
                                    <div class="col-xs-12 text-right">
                                        <button class="btn btn-primary btn-sm" type="submit">Guardar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- /Container -->
<script>
    $(document).ready(function() {

        $(".disl").change(function() {
            var db = $("#cron_diag_DM").val();
            var ob = $("#cron_diag_OB").val();
            var ha = $("#cron_diag_HART").val();

            if (db == "SI" && ob == "SI" && ha == "SI") {
                $("#cron_diag_SMETA").val("SI");
            } else {
                $("#cron_diag_SMETA").val("NO");
            }
        });

        $("#save-diag-cron").click(function() {
            var dataForm = $("#form-diag-cron").serialize();

            $.ajax({
                type: "post",
                data: dataForm,
                url:  urlRoot+"/programa/enfcronicas/savediagnostic",
                dataType: "json",
                success: function(response) {
                    if (response.result == 1) {
                        showAlert("success", "Datos del diagnóstico guardados correctamente.");
                    } else {
                        showAlert("error", response);
                    }
                },
                error: function() {},
                statusCode: { 401:function() { window.location.href = urlRoot+'/login'; } }
            });
        });

        $("#save-ante-cron").click(function() {
            var dataAnte = $("#form-ante-cron").serialize();
            var dataMicro = $("#form-micro-cron").serialize();

            $.ajax({
                type: "post",
                data: dataAnte+"&"+dataMicro,
                url: urlRoot+"/programa/enfcronicas/saveantecedent",
                dataType: "json",
                success: function(response) {
                    if (response.result == 1) {
                        showAlert("success", "Antecedentes guardados correctamente.");
                    } else {
                        showAlert("error", "Ha ocurrido un problema.");
                    }
                },
                error: function() {},
                statusCode: { 401:function() { window.location.href = urlRoot+'/login'; } }
            });
        });

        $("#cron_micro_year").change(function() {
            var anio = $(this).val();
            var expediente_id = $("#expediente_id").val();

            $.ajax({
                type: "post",
                data: "anio="+anio+"&expediente_id="+expediente_id,
                url: urlRoot+"/programa/enfcronicas/obtenermicroanio",
                dataType: "json",
                success: function(response) {
                    if (response.result != 0) {
                        $("#cron_micro_1").val(response.result.cron_micro_1);
                        $("#cron_micro_2").val(response.result.cron_micro_2);
                        $("#cron_micro_3").val(response.result.cron_micro_3);
                    }
                },
                error: function() {},
                statusCode: { 401:function() { window.location.href = urlRoot+'/login'; } }
            });
        });

    });
</script>