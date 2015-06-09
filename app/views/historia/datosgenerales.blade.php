<!-- Container -->
    <div class="alert-box-container"><div id="alert-box" class=""><p>Mensaje</p></div></div>
    <div class="container-fluid">
        <div class="row dashboard">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="page-header nomargintop">
                            <h4>Datos Generales</h4>
                            <a class="btn btn-primary btn-sm save-datos" data="0"><span class="glyphicon glyphicon-floppy-disk"></span><span class="pageh-text-btn">Guardar</span></a>
                            @if(!isset($enf))
                            <a class="btn btn-primary btn-sm save-datos" data="2"><span class="glyphicon glyphicon-arrow-right"></span><span class="pageh-text-btn">Siguiente</span></a>
                            @endif
                        </div>

                        <form id="datos-grales-form" role="form">
                            <div class="row">
                                <div class="col-xs-6 col-sm-3 col-md-2 col-lg-2">
                                    <div class="form-group">
                                        <label for="paciente_fechaEstudio">Fecha estudio:</label>
                                        <input name="paciente_fechaEstudio" type="text" class="form-control fecha" id="paciente_fechaEstudio" value="{{date('d/m/Y', strtotime($paciente[0]->paciente_fechaEstudio))}}">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-3 col-md-2 col-lg-1">
                                    <div class="form-group">
                                        <label for="paciente_finado">Finado:</label>
                                        <select name="paciente_finado" class="form-control" id="paciente_finado">
                                            <option @if ($paciente[0]->paciente_finado=='NO') selected="selected" @endif value="NO">No</option>
                                            <option @if ($paciente[0]->paciente_finado=='SI') selected="selected" @endif value="SI">Si</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="paciente_nombre">Nombre:</label>
                                        <input name="paciente_nombre" type="text" class="form-control" id="paciente_nombre" value="{{$paciente[0]->paciente_nombre}}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="paciente_app">Apellido Paterno:</label>
                                        <input name="paciente_app" type="text" class="form-control" id="paciente_app" value="{{$paciente[0]->paciente_app}}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="paciente_apm">Apellido Materno:</label>
                                        <input name="paciente_apm" type="text" class="form-control" id="paciente_apm" value="{{$paciente[0]->paciente_apm}}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                                    <div class="form-group">
                                        <label for="paciente_fecNac">Fecha de nacimiento:</label>
                                        <input name="paciente_fecNac" type="text" class="form-control fecha" id="paciente_fecNac" value="{{date('d/m/Y', strtotime($paciente[0]->paciente_fecNac))}}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-3 col-lg-4">
                                    <div class="form-group">
                                        <!-- TODO - Listar todas las entidades -->
                                        <label for="paciente_edoNac">Entidad de nacimiento:</label>
                                        <select name="paciente_edoNac" class="form-control" id="paciente_edoNac">
                                            <option>Seleccione una entidad</option>
                                            @foreach ($entidades as $entidad)
                                                <option @if ($paciente[0]->paciente_edoNac==$entidad->cve_ent) selected="selected" @endif value="{{$entidad->cve_ent}}">{{$entidad->nom_ent}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-4 col-md-2 col-lg-2">
                                    <div class="form-group">
                                        <label for="paciente_sexo">Sexo:</label>
                                        <select name="paciente_sexo" class="form-control" id="paciente_sexo">
                                            <option>Seleccione el sexo</option>
                                            <option @if ($paciente[0]->paciente_sexo=='H') selected="selected" @endif value="H">Masculino</option>
                                            <option @if ($paciente[0]->paciente_sexo=='M') selected="selected" @endif value="M">Femenino</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-4 col-md-2 col-lg-2">
                                    <div class="form-group">
                                        <label for="paciente_rfc">RFC:</label>
                                        <input name="paciente_rfc" type="text" class="form-control" id="paciente_rfc" value="{{$paciente[0]->paciente_rfc}}" readOnly>
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                                    <div class="form-group">
                                        <!-- TODO - Listar las diferentes ocupaciones -->
                                        <label for="paciente_ocupacion">Ocupación:</label>
                                        <select name="paciente_ocupacion" class="form-control" id="paciente_ocupacion">
                                            <option>Seleccione una ocupación</option>
                                            @foreach ($ocupaciones as $ocupacion)
                                                <option @if ($paciente[0]->paciente_ocupacion==$ocupacion->oc_id) selected="selected" @endif value="{{$ocupacion->oc_id}}">{{$ocupacion->oc_nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-2 col-md-2 col-lg-2">
                                    <div class="form-group">
                                        <!-- TODO - Listar los estados civiles -->
                                        <label for="paciente_edoCivil">Estado civil:</label>
                                        <select name="paciente_edoCivil" class="form-control" id="paciente_edoCivil">
                                            <option>Seleccione un estado civil</option>
                                            @foreach ($edo_civil as $civil)
                                                <option @if ($paciente[0]->paciente_edoCivil==$civil->id_ecivil) selected="selected" @endif value="{{$civil->id_ecivil}}">{{$civil->ecivildescri}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-3 col-md-2 col-lg-2">
                                    <div class="form-group">
                                        <label for="paciente_prospera">Prospera:</label>
                                        <select name="paciente_prospera" class="form-control" id="paciente_prospera">
                                            <option>Elija una opción</option>
                                            <option @if ($paciente[0]->paciente_prospera=='SI') selected="selected" @endif value="SI">Si</option>
                                            <option @if ($paciente[0]->paciente_prospera=='NO') selected="selected" @endif value="NO">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-2">
                                    <div class="form-group">
                                        <!-- TODO - Listar programas de seguridad social -->
                                        <label for="paciente_segSocial">Seguridad Social:</label>
                                        <select name="paciente_segSocial" class="form-control" id="paciente_segSocial">
                                            <option>Elija un programa</option>
                                            @foreach ($seg_social as $programa)
                                                <option @if ($paciente[0]->paciente_segSocial==$programa->seg_id) selected="selected" @endif value="{{$programa->seg_id}}">{{$programa->seg_nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2">
                                    <div class="form-group">
                                        <label for="paciente_segSocialNumero">No.Seguridad Social:</label>
                                        <input name="paciente_segSocialNumero" type="text" class="form-control" id="paciente_segSocialNumero" value="{{$paciente[0]->paciente_segSocialNumero}}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                                    <div class="form-group">
                                        <label for="paciente_fechaVigenciaSeg">Vigencia:</label>
                                        <input name="paciente_fechaVigenciaSeg" type="text" class="form-control fecha" id="paciente_fechaVigenciaSeg" value="{{date('d/m/Y', strtotime($paciente[0]->paciente_fechaVigenciaSeg))}}">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="page-header">
                                        <h4 class="nomarginbot">Domicilio</h4>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-5 col-md-5 col-lg-2">
                                    <div class="form-group">
                                        <label for="paciente_calle">Calle:</label>
                                        <input name="paciente_calle" type="text" class="form-control" id="paciente_calle" value="{{$paciente[0]->paciente_calle}}">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-2">
                                    <div class="form-group">
                                        <label for="paciente_numDom">Número:</label>
                                        <input name="paciente_numDom" type="text" class="form-control" id="paciente_numDom" value="{{$paciente[0]->paciente_numDom}}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-2">
                                    <div class="form-group">
                                        <label for="paciente_colonia">Colonia:</label>
                                        <input name="paciente_colonia" type="text" class="form-control" id="paciente_colonia" value="{{$paciente[0]->paciente_colonia}}">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-2">
                                    <div class="form-group">
                                        <!-- TODO - Listar estados -->
                                        <label for="paciente_edo">Entidad de residencia:</label>
                                        <select name="paciente_edo" class="form-control" id="paciente_edo">
                                            <option>Seleccione una Entidad</option>
                                            @foreach ($entidades as $entidad)
                                                <option @if ($paciente[0]->paciente_edo==$entidad->cve_ent) selected="selected" @endif value="{{$entidad->cve_ent}}">{{$entidad->nom_ent}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-4 col-md-4 col-lg-2">
                                    <div class="form-group">
                                        <!-- TODO - Según el estado, listar municipios -->
                                        <label for="paciente_mun">Municipio:</label>
                                        <select name="paciente_mun" class="form-control" id="paciente_mun">
                                            <option>Seleccione una Municipio</option>
                                            @foreach ($municipios as $municipio)
                                                <option @if ($paciente[0]->paciente_mun==$municipio->cve_mun) selected="selected" @endif value="{{$municipio->cve_mun}}">{{$municipio->nom_mun}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-4 col-md-4 col-lg-2">
                                    <div class="form-group">
                                        <!-- TODO - Según municipio y estado, listar localidades -->
                                        <label for="paciente_localidad">Localidad:</label>
                                        <select name="paciente_localidad" class="form-control" id="paciente_localidad">
                                            <option>Seleccione una Localidad</option>
                                            @foreach ($localidades as $localidad)
                                                <option @if ($paciente[0]->paciente_localidad==$localidad->cve_loc) selected="selected" @endif value="{{$localidad->cve_loc}}">{{$localidad->nom_loc}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="page-header">
                                        <h4 class="nomarginbot">Otros datos</h4>
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-3 col-md-2 col-lg-2">
                                    <div class="form-group">
                                        <label for="paciente_discapacidad">¿Discapacidad?:</label>
                                        <select name="paciente_discapacidad" class="form-control" id="paciente_discapacidad">
                                            <option>Elija una opción</option>
                                            <option @if ($paciente[0]->paciente_discapacidad=='SI') selected="selected" @endif value="SI">Si</option>
                                            <option @if ($paciente[0]->paciente_discapacidad=='NO') selected="selected" @endif value="NO">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label for="paciente_discapacidadCual">¿Qué discapacidad?:</label>
                                        <input name="paciente_discapacidadCual" type="text" class="form-control" id="paciente_discapacidadCual" value="{{$paciente[0]->paciente_discapacidadCual}}">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-3 col-md-2 col-lg-2">
                                    <div class="form-group">
                                        <label for="paciente_indigena">¿Indigena?:</label>
                                        <select name="paciente_indigena" class="form-control" id="paciente_indigena">
                                            <option>Elija una opción</option>
                                            <option @if ($paciente[0]->paciente_indigena=='SI') selected="selected" @endif value="SI">Si</option>
                                            <option @if ($paciente[0]->paciente_indigena=='NO') selected="selected" @endif value="NO">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-3 col-md-2 col-lg-2">
                                    <div class="form-group">
                                        <!-- TODO - Listar religiones -->
                                        <label for="paciente_religion">Religión:</label>
                                        <select name="paciente_religion" class="form-control" id="paciente_religion">
                                            <option>Seleccione una</option>
                                            @foreach ($religiones as $religion)
                                                <option @if ($paciente[0]->paciente_religion==$religion->cve_religion) selected="selected" @endif value="{{$religion->cve_religion}}">{{$religion->nom_religion}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <!-- TODO - Listar grados escolares -->
                                        <label for="escolaridad_id">Grado Escolar:</label>
                                        <select name="escolaridad_id" class="form-control" id="escolaridad_id">
                                            <option>Seleccione un grado</option>
                                            @foreach ($escolaridad as $nivel)
                                                <option @if ($paciente[0]->escolaridad_id==$nivel->escolaridad_id) selected="selected" @endif value="{{$nivel->escolaridad_id}}">{{$nivel->escolaridad_nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label for="paciente_lee_escribe">¿Sabe Leer/Escribir?:</label>
                                        <select name="paciente_lee_escribe" class="form-control" id="paciente_lee_escribe">
                                            <option>Seleccione una opción</option>
                                            <option @if ($paciente[0]->paciente_lee_escribe=='SI') selected="selected" @endif value="SI">Si</option>
                                            <option @if ($paciente[0]->paciente_lee_escribe=='NO') selected="selected" @endif value="NO">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-5 col-lg-4">
                                    <div class="form-group">
                                        <label for="paciente_nombreTutor">Nombre del padre o tutor:</label>
                                        <input name="paciente_nombreTutor" type="text" class="form-control" id="paciente_nombreTutor" value="{{$paciente[0]->paciente_nombreTutor}}">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-2 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label for="paciente_parentesco">Parentesco:</label>
                                        <input name="paciente_parentesco" type="text" class="form-control" id="paciente_parentesco" value="{{$paciente[0]->paciente_parentesco}}">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-3 col-md-2 col-lg-2">
                                    <div class="form-group">
                                        <label for="paciente_numTelefono">No. de teléfono:</label>
                                        <input name="paciente_numTelefono" type="text" class="form-control" id="paciente_numTelefono" value="{{$paciente[0]->paciente_numTelefono}}">
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-3 col-md-2 col-lg-2">
                                    <div class="form-group">
                                        <label for="paciente_casoLegal">Caso legal:</label>
                                        <select name="paciente_casoLegal" class="form-control" id="paciente_casoLegal">
                                            <option>Elija una opción</option>
                                            <option @if ($paciente[0]->paciente_casoLegal=='SI') selected="selected" @endif value="SI">Si</option>
                                            <option @if ($paciente[0]->paciente_casoLegal=='NO') selected="selected" @endif value="NO">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-3 col-md-2 col-lg-2">
                                    <div class="form-group">
                                        <label for="paciente_tipoInterroga">Interrogatorio:</label>
                                        <select name="paciente_tipoInterroga" class="form-control" id="paciente_tipoInterroga">
                                            <option>Elija una opción</option>
                                            <option @if ($paciente[0]->paciente_tipoInterroga=='DIRECTO') selected="selected" @endif value="DIRECTO">Directo</option>
                                            <option @if ($paciente[0]->paciente_tipoInterroga=='INDIRECTO') selected="selected" @endif value="INDIRECTO">Indirecto</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3 col-md-4 col-lg-2">
                                    <div class="form-group">
                                        <label for="paciente_minisPublic">¿Se aviso al Ministerio?:</label>
                                        <select name="paciente_minisPublic" class="form-control" id="paciente_minisPublic">
                                            <option>Elija una opción</option>
                                            <option @if ($paciente[0]->paciente_minisPublic=='SI') selected="selected" @endif value="SI">Si</option>
                                            <option @if ($paciente[0]->paciente_minisPublic=='NO') selected="selected" @endif value="NO">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="paciente_informante">¿Quién informó?:</label>
                                        <input name="paciente_informante" type="text" class="form-control" id="paciente_informante" value="{{$paciente[0]->paciente_informante}}">
                                    </div>
                                </div>
                            </div>
                            <div class="btns-form-ad">
                                <input type="hidden" name="expediente_id" id="expediente_id" value="{{$paciente[0]->expediente_id}}">
                                @if(!isset($enf))
	                            <a class="btn btn-primary btn-sm save-datos" data="2"><span class="glyphicon glyphicon-arrow-right"></span><span class="pageh-text-btn">Siguiente</span></a>
	                            @endif
                                <a class="btn btn-primary btn-sm save-datos" data="0"><span class="glyphicon glyphicon-floppy-disk"></span><span class="pageh-text-btn">Guardar</span></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /Container -->

    <script>
        $(document).ready(function() {

            var now = new Date();
            var yr = now.getFullYear();
            $('.fecha').datetimepicker({
                format: 'd/m/Y',lang: 'es',timepicker: false,
                yearStart: 1900,yearEnd: yr,mask:true,closeOnDateSelect:true
            });

            $('.save-datos').click(function() {
                var dataForm = $('#datos-grales-form').serialize();
                var option = $(this).attr('data');
                
                $.ajax({
                    url: 'datosgenerales/savedatosgenerales',
                    type: 'POST',
                    data: dataForm,
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
						if (data.guardado == 1) {
							if(option == 0){showAlert("success", "Perfil del paciente agregado correctamente");}
							else{getView(option);}
						} else {
							showAlert("error", data);
						}
                    },
                    statusCode: {
                        401:function() { window.location.href = urlRoot+'/login'; }
                    }
                    
                });
            });

            $('#paciente_edo').change(function() {
            	var id = $("#paciente_edo").find(':selected').val();
				$.ajax({
					url: 'datosgenerales/listmunicipios',
					type: 'POST',
					data: {'id':id},
					dataType: 'html',
					success: function(data) {
						$('#paciente_mun').html(data);
					}
				});
            });

            $('#paciente_mun').change(function() {
            	var id_edo = $("#paciente_edo").find(':selected').val();
            	var id_mun = $("#paciente_mun").find(':selected').val();
            	$.ajax({
					url: 'datosgenerales/listlocalidades',
					type: 'POST',
					data: {'id_edo':id_edo, 'id_mun':id_mun},
					dataType: 'html',
					success: function(data) {
						$('#paciente_localidad').html(data);
					}
				});
            });
        });
    </script>
