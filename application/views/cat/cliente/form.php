<script>
$(function() {
    $( "#tabs" ).tabs();
    $( ".calendario" ).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd'
     });
     
     $(".spinner" ).spinner({min:0});
     $(".spinner_dependiente" ).spinner({min:0, max:25});
});
</script>
<div class="panel panel-primary">
    <div class="panel-heading"><span class="glyphicon glyphicon-pencil"></span>&nbsp; <?php echo $heading_title?></div>
    <div class="panel-body">     <?php /* */?>
        <?php echo form_open($action,"id='form_cliente' class='form-horizontal' role='form'" );?>
        
        <?php if((int)$cliente['id'] > 0 ):?>
        <input type="hidden" name="cliente[id]" value="<?php echo $cliente['id'];?>" >
        <?php endif;?>
        <?php /*    
        <div id="tabs">
            <ul>
              <li><a href="#tabs-1">Datos Generales</a></li>
              <li><a href="#tabs-2">Direcci&oacute;n</a></li>
              <li><a href="#tabs-3">Contacto</a></li>
            </ul>
            <div id="tabs-1">*/?>
                <div class="form-group">
                  <label for="nombre" class="col-md-3 control-label">Nombre del cliente</label>
                  <div class="col-md-5">
                      <?php echo form_input("cliente[nombre]", $cliente['nombre']," id='nombre' class='form-control'" )?>            
                  </div>
                </div>
                <div class="form-group">
                    <label for="apellido_paterno" class="col-md-3 control-label">Apellido paterno</label>
                  <div class="col-md-5">
                      <?php echo form_input("cliente[apellido_paterno]", $cliente['apellido_paterno']," id='apellido_paterno' class='form-control' " )?>            
                  </div>
                </div>
                <div class="form-group">
                  <label for="apellido_materno" class="col-md-3 control-label">Apellido materno</label>
                  <div class="col-md-5">
                      <?php echo form_input("cliente[apellido_materno]", $cliente['apellido_materno']," id='apellido_materno' class='form-control' " )?>   
                  </div>
                </div>
                <?php if($cliente['sexo']) $sexo = $cliente['sexo']; else $sexo = "H";?>
                <div class="form-group">
                    <label for="sexo" class="col-md-3 control-label">Sexo</label>
                    <div class="col-md-5">
                        <label class="checkbox-inline">
                            <input type="radio" name="cliente[sexo]" id="sexo_m" value="M" <?php if($sexo=="M") echo "checked"?> > Mujer 
                          </label>
                        <label class="checkbox-inline">
                            <input type="radio" name="cliente[sexo]" id="sexo_h" value="H" <?php if($sexo=="H") echo "checked"?> > Hombre
                          </label>                        
                    </div>
                </div>
                
                <?php if($cliente['regimen_fiscal']) $regimen_fiscal = $cliente['regimen_fiscal']; else $regimen_fiscal = "PF";?>
                
                <div class="form-group">
                    <label for="regimen_fiscal" class="col-md-3 control-label">Regimen fiscal</label>
                    <div class="col-md-2">
                        <?php echo form_dropdown("cliente[regimen_fiscal]", $cbo_regimenfiscal, $cliente['regimen_fiscal']," id='regimen_fiscal' class='form-control ' onchange='rfc_inputmask(this.value)'" )?>                        
                    </div>
                </div>
                <?php if($regimen_fiscal=="PF") $rfc_mask = "aaaa999999***"; //FISCA 13 digitos 4-6-3
                      if($regimen_fiscal=="PM") $rfc_mask = "aaa999999***";  //MORAL 12 digitos 3-6-3 data-mask='".$rfc_mask."'
                ?>
                <div class="form-group">
                    <label for="rfc" class="col-md-3 control-label">RFC</label>
                    <div class="col-md-2">
                        <?php echo form_input("cliente[rfc]", $cliente['rfc']," id='rfc'  class='form-control' " ) ?>
                    </div>
                    <div class="col-md-3">
                       
                    </div>
                </div>
                <div class="form-group">
                    <label for="curp" class="col-md-3 control-label">CURP</label>
                    <div class="col-md-2">
                        <?php echo form_input("cliente[curp]", $cliente['curp']," id='curp' class='form-control' " ) ?>
                    </div>
                    <div class="col-md-3">
                       
                    </div>
                </div>
                <div class="form-group">
                    <label for="tipo_identificacion" class="col-md-3 control-label">Tipo identificaci&oacute;n</label>
                    <div class="col-md-3">
                        <?php echo form_dropdown("cliente[tipo_identificacion]", $cbo_tipo_identificacion,  $cliente['tipo_identificacion']," id='tipo_identificacion' class='form-control ' " ) //maxlength='10'?> 
                    </div>                 
                </div>                
                <div class="form-group">
                    <label for="numero_identificacion" class="col-md-3 control-label">Numero de identificaci&oacute;n</label>
                    <div class="col-md-3">
                        <?php echo form_input("cliente[numero_identificacion]", $cliente['numero_identificacion']," id='numero_identificacion' class='form-control ' " ) ?> 
                    </div>
                </div>     
                <?php if(!$cliente['nacionalidad']) $cliente['nacionalidad'] = 1; ?>
                <div class="form-group">
                    <label for="nacionalidad" class="col-md-3 control-label">Nacionalidad</label>
                    <div class="col-md-3">
                        <?php echo form_dropdown("cliente[nacionalidad]", $cbo_nacionalidad,  $cliente['nacionalidad']," id='nacionalidad' class='form-control ' " ) //maxlength='10'?> 
                    </div>                 
                </div>
                <?php $fnac = separar_fecha($cliente['fecha_nacimiento'])?>
                <div class="form-group">
                    <label for="fecha_nacimiento" class="col-md-3 control-label">Fecha de nacimiento</label>
                    <div class="col-md-1">
                        <?php echo form_dropdown("fnac[anio]", $cbo_fnac_anio, $fnac['anio']," id='fnac_anio' onchange='btn_fnac_dia()' class='form-control' " ) ?> 
                    </div>
                    <div class="col-md-2">
                        <?php echo form_dropdown("fnac[mes]", $cbo_fnac_mes, $fnac['mes']," id='fnac_mes' onchange='btn_fnac_dia()' class='form-control' " ) ?> 
                    </div>
                    <div class="col-md-1" id="div_fnac_dia">
                        <?php echo form_dropdown("fnac[dia]", $cbo_fnac_dia, $fnac['dia']," id='fnac_dia' class='form-control' " ) ?>
                    </div>
                </div>                
                <?php if(!$cliente['pais_nacimiento']) $cliente['pais_nacimiento'] = 135; ?>
                <div class="form-group">
                    <label for="pais_nacimiento" class="col-md-3 control-label">Pais de nacimiento</label>
                    <div class="col-md-3">
                        <?php echo form_dropdown("cliente[pais_nacimiento]", $cbo_pais,  $cliente['pais_nacimiento']," id='pais_nacimiento' onchange='btn_cbo_estado(this.value)' class='form-control ' " )?> 
                    </div>                 
                </div>
                <?php $cbo_estado_nacimiento = $this->catalogo_model->get_cbo_estado("--Seleccione--",$cliente['pais_nacimiento'])?>
                <div class="form-group">
                    <label for="estado_nacimiento" class="col-md-3 control-label">Estado de nacimiento</label>
                    <div class="col-md-3" id ="div_estado">
                        <?php echo form_dropdown("cliente[estado_nacimiento]", $cbo_estado_nacimiento,  $cliente['estado_nacimiento']," id='estado_nacimiento' onchange='btn_cbo_ciudad(this.value)'  class='form-control ' " )?> 
                    </div>                 
                </div>
                
                <?php $cbo_ciudad_nacimiento = $this->catalogo_model->get_cbo_ciudad("--Seleccione--",$cliente['estado_nacimiento'])?>
                <div class="form-group">
                    <label for="ciudad_nacimiento" class="col-md-3 control-label">Ciudad de nacimiento</label>
                    <div class="col-md-3" id ="div_ciudad">
                        <?php echo form_dropdown("cliente[ciudad_nacimiento]", $cbo_ciudad_nacimiento,  $cliente['ciudad_nacimiento']," id='estado_nacimiento' class='form-control '")?>
                    </div>                 
                </div>
                
                
                <div class="form-group">
                    <label for="delegacion_municipio" class="col-md-3 control-label">Delegaci&oacute;n o municipio</label>
                    <div class="col-md-3">
                        <?php echo form_input("cliente[delegacion_municipio]", $cliente['delegacion_municipio']," id='delegacion_municipio' class='form-control ' " ) ?> 
                    </div>
                </div> 
                <div class="form-group">
                    <label for="estado_civil" class="col-md-3 control-label">Estado civil</label>
                    <div class="col-md-3">
                        <?php echo form_dropdown("cliente[estado_civil]", $cbo_estadocivil,  $cliente['estado_civil']," id='estado_civil' class='form-control '")?>
                    </div>                 
                </div>
                <div class="form-group">
                    <label for="regimen_patrimonial" class="col-md-3 control-label">Regimen patrimonial</label>
                    <div class="col-md-3">
                        <?php echo form_dropdown("cliente[regimen_patrimonial]", $cbo_regimenpatrimonial,  $cliente['regimen_patrimonial']," id='regimen_patrimonial' class='form-control '")?>
                    </div> 
                </div>
                <div class="form-group">
                    <label for="maximo_grado_estudio" class="col-md-3 control-label">M&aacute;ximo grado de estudios</label>
                    <div class="col-md-3">
                        <?php echo form_dropdown("cliente[maximo_grado_estudio]", $cbo_maximo_gradoestudio,  $cliente['maximo_grado_estudio']," id='maximo_grado_estudio' class='form-control '")?>
                    </div> 
                </div>
                <?php if(!$cliente['dependendientes_economicos']) $cliente['dependendientes_economicos'] = 0?>
                <div class="form-group">
                    <label for="dependendientes_economicos" class="col-md-3 control-label">Dependendientes economicos</label>
                    <div class="col-md-1">
                        <?php echo form_input("cliente[dependendientes_economicos]", $cliente['dependendientes_economicos']," id='dependendientes_economicos' class='form-control spinner_dependiente'")?>
                    </div> 
                </div>
                <div class="form-group">
                    <label for="ocupacion_profesion" class="col-md-3 control-label">Ocupaci&oacute;n o profesi&oacute;n</label>
                    <div class="col-md-3">
                        <?php echo form_input("cliente[ocupacion_profesion]", $cliente['ocupacion_profesion']," id='ocupacion_profesion' class='form-control '")?>
                    </div> 
                </div>
                <div class="form-group">
                    <label for="actividad_giro_del_negocio" class="col-md-3 control-label">Actividad o giro del negocio</label>
                    <div class="col-md-3">
                        <?php echo form_input("cliente[actividad_giro_del_negocio]", $cliente['actividad_giro_del_negocio']," id='actividad_giro_del_negocio' class='form-control '")?>
                    </div> 
                </div>
             <?php /*   
            </div>
            <div id="tabs-2">
                <?php //$this->load->view("cat/form_direccion")?>                
            </div>
            <div id="tabs-3">
                <?php //$this->load->view("cat/form_apellido_materno")?>                
            </div>
        </div> */?>
        
        <div class="form-group" style="margin-top: 15px;">
            <div class="col-md-offset-2 col-md-9">     
              <button type="submit" name="btn_cliente" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Agregar como cliente</button>
              <button type="submit" name="btn_persona" class="btn btn-primary"><span class="glyphicon glyphicon-user"></span> Agregar solo como persona</button>
              <button type="button" onclick="btn_cancelar()" class="btn btn-warning"><span class="glyphicon glyphicon-chevron-left"></span> Regresar</button>
              
            </div>
        </div>
    <?php echo form_close()?>  
    </div>    
</div>



<script>
    
 <?php echo app_js_acento();?>
        
        
$(document).ready(function() {
    $('#form_cliente').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nombre: {
                selector: '#nombre',
                validators: {
                    notEmpty: {
                        message: 'El campo nombre es requerido'
                    }                 
                }
            },  
            apellido_paterno: {
                selector: '#apellido_paterno',
                validators: {
                    notEmpty: {
                        message: 'El campo apellido paterno es requerido'
                    }                    
                }
            }
            
            
        }
    })        
    // AGREGAR TELEFONO
    .on('click', '.addTelefono', function() {
        var $template = $('#templateTelefono'),
            $clone    = $template.clone().removeClass('hide').removeAttr('id').insertBefore($template),
            $option   = $clone.find('[name="apellido_materno_telefono[]"]');                
        // Add new field
        $('#form_cliente').bootstrapValidator('addField', $option);
    })
    // REMOVER TELEFONO
    .on('click', '.removeTelefono', function() {
        var $row    = $(this).parents('.form-group'), $option = $row.find('[name="apellido_materno_telefono[]"]');
        $row.remove();
        // Remove field
        $('#form_cliente').bootstrapValidator('removeField', $option);
    })   
    // AGREGAR CELULAR
    .on('click', '.addCelular', function() {
        var $template = $('#templateCelular'),
            $clone    = $template.clone().removeClass('hide').removeAttr('id').insertBefore($template),
            $option   = $clone.find('[name="apellido_materno_celular[]"]');                
        // Add new field
        $('#form_cliente').bootstrapValidator('addField', $option);
    })
    // REMOVER CELULAR
    .on('click', '.removeCelular', function() {
        var $row    = $(this).parents('.form-group'), $option = $row.find('[name="apellido_materno_celular[]"]');
        $row.remove();
        // Remove field
        $('#form_cliente').bootstrapValidator('removeField', $option);
    })
    // AGREGAR EMAIL
    .on('click', '.addEmail', function() {
        var $template = $('#templateEmail'),
            $clone    = $template.clone().removeClass('hide').removeAttr('id').insertBefore($template),
            $option   = $clone.find('[name="apellido_materno_email[]"]');                
        // Add new field
        $('#form_cliente').bootstrapValidator('addField', $option);
    })
    // REMOVER EMAIL
    .on('click', '.removeEmail', function() {
        var $row    = $(this).parents('.form-group'), $option = $row.find('[name="apellido_materno_email[]"]');
        $row.remove();
        // Remove field
        $('#form_cliente').bootstrapValidator('removeField', $option);
    })
    
    .on('success.form.bv', function(e) {
        if(!confirm('Guardar los cambios?')){
            e.preventDefault();
            $("#btn_save").prop( "disabled", false );            
        }
    }).on('error.form.bv', function(e, data) {
        alert('Por favor revise que los campos esten correctos\nVerifique todas las pesta'+acento_n+'as');        
    });
   
   
   
   rfc_inputmask('<?php echo $regimen_fiscal?>');
   
});



function btn_fnac_dia(){
    var anio = parseInt($("#fnac_anio").val());
    var mes =parseInt($("#fnac_mes").val());
    var dia =parseInt($("#fnac_dia").val());    
    //alert(" anio["+anio+"] mes["+mes+"] dia["+dia+"] ");
    if(anio > 0 && mes >0){
        $("#div_fnac_dia").html("<select class='form-control' disabled='true'><option>Buscando...</option></select>");
        $.get( "<?php echo site_url("cat/cliente/ajax_fnac_dia")?>"+"/"+anio+"/"+mes+"/"+dia, function( data ) {
            $("#div_fnac_dia").html(data); 
        });
    }
}

function btn_cbo_estado(pais){    
    $("#div_estado").html("<select class='form-control' disabled='true'><option>Buscando...</option></select>");
    $.get( "<?php echo site_url("cat/cliente/ajax_estado")?>"+"/"+pais, function( data ) {
        $("#div_estado").html(data); 
    });
    btn_cbo_estado(0);
}

function btn_cbo_ciudad(estado){    
    $("#div_ciudad").html("<select class='form-control' disabled='true'><option>Buscando...</option></select>");
    $.get( "<?php echo site_url("cat/cliente/ajax_ciudad")?>"+"/"+estado, function( data ) {
        $("#div_ciudad").html(data); 
    });
}

function rfc_inputmask(regimen){
    var rfc_mask  = "";
    if(regimen=="PF") rfc_mask = "aaaa999999***"; //FISCA 13 digitos 4-6-3
    if(regimen=="PM") rfc_mask = "aaa999999***";  //MORAL 12 digitos 3-6-3
    //alert('regimen ['+regimen+']');
    //$("#rfc").attr("data-mask", mask);
    
    $('#rfc').inputmask({ mask: rfc_mask })
}

function btn_cancelar(){
    if(confirm('Desea abandonar el formulario?')){
        location = '<?php echo site_url("cat/cliente/view")?>';
    }
}
    
    
    
</script>