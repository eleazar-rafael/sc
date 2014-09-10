<?php 

function traduccion_tabla_cliente(){
    return array('id'=>'Id', 
                'nombre'=>'FirstName', //[ok]c1
                'apellido_paterno'=>'LastName', //[ok]c2
                'apellido_materno'=>'LastNameTwo',//[ok]c3
                'sexo'=>'Sex',
                'nacionalidad'=>'Nationality',
                'dependendientes_economicos'=>'Dependent',
                'fecha_nacimiento'=>'BirthDate',
                'pais_nacimiento'=>'pais_nacimiento',
                'estado_nacimiento'=>'estado_nacimiento',
                'ciudad_nacimiento'=>'BirthPlace',
                'delegacion_municipio'=>'delegacion_municipio',
                'estado_civil'=>'CivilState',
                'email'=>'Email',
                'maximo_grado_estudio'=>'MaxDegreeStudy',
                'regimen_patrimonial'=>'PatrimonialRegime',
                'tiene_vehiculo'=>'OwnVehicle',
                'tiempo_viviendo_enla_ciudad'=>'MonthsOnCurrentCity',
                'tipo_identificacion'=>'IdType',
                'numero_identificacion'=>'numero_identificacion',
                'licencia_numero'=>'LicenseNumber',
                'licencia_ciudad'=>'LicenseCity',
                'licencia_estado'=>'LicenseState',
                'licencia_vencimiento'=>'LicenseExpiration',
                'licencia_fecha'=>'LicenseDate',
                'rfc'=>'RFC',//[ok]c4
                'curp'=>'CURP',//[ok]c5
                'firma_digital'=>'DigitalFirm',
                'regimen_fiscal'=>'FiscalRegime',
                'empresa_nombre'=>'TradeName',
                'usuario_id'=>'UserId',
                'fecha_alta'=>'DateAdded',
                'fecha_modificacion'=>'DateModified',
                'modificado_por'=>'ModifiedLastBy',
                'sucursal'=>'Branch',
                'empresa'=>'TradeNamesId',
                'numero_empleado'=>'NoEmployee',
                'numero_departamento'=>'NoDepartment',
                'ins_pagadera'=>'InsPagadera',
                'fraude'=>'fraud',
                'tiene_firma_digital'=>'hasDigFirm',
                'telefono_casa'=>'homephone',
                'ocupacion_profesion' => 'ocupacion_profesion',
                'actividad_giro_del_negocio' => 'actividad_giro_del_negocio',
                
            );
}

function tabla_cliente(){
    $entity = traduccion_tabla_cliente();
    foreach($entity as $key=>$val){
        $tbl[$val] = $key;
    }
    return $tbl;
}    

