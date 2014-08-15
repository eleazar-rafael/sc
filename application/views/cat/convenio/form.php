<script>
$(function() {
    $( "#tabs" ).tabs();
    $( ".calendario" ).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd'
     });
     
     $(".spinner" ).spinner({min:0});
     $(".spinner_porcen" ).spinner({min:0, max:100});
});
</script>
<div class="panel panel-primary">
    <div class="panel-heading"><span class="glyphicon glyphicon-pencil"></span>&nbsp; <?php echo $heading_title?></div>
    <?php /*<div class="panel-body">      */?>
        <?php echo form_open($action,"id='form_convenio' class='form-horizontal' role='form'" );?>
        
        <?php if((int)$convenio['id'] > 0 ):?>
        <input type="hidden" name="convenio[id]" value="<?php echo $convenio['id'];?>" >
        <?php endif;?>
            
        <div id="tabs">
            <ul>
              <li><a href="#tabs-1">Datos Generales</a></li>
              <li><a href="#tabs-2">Direcci&oacute;n</a></li>
              <li><a href="#tabs-3">Contacto</a></li>
            </ul>
            <div id="tabs-1">
                <div class="form-group">
                  <label for="nombre" class="col-md-3 control-label">Nombre del convenio</label>
                  <div class="col-md-5">
                      <?php echo form_input("convenio[nombre]", $convenio['nombre']," id='nombre' class='form-control'" )?>            
                  </div>
                </div>
                <div class="form-group">
                    <label for="titular" class="col-md-3 control-label">Titular del convenio</label>
                  <div class="col-md-5">
                      <?php echo form_input("convenio[titular]", $convenio['titular']," id='titular' class='form-control' " )?>            
                  </div>
                </div>
                <div class="form-group">
                  <label for="contacto" class="col-md-3 control-label">Nombre del Contacto</label>
                  <div class="col-md-5">
                      <?php echo form_input("convenio[contacto]", $convenio['contacto']," id='contacto' class='form-control' " ) //maxlength='100'?>   
                  </div>
                </div>
                <div class="form-group">
                    <label for="fecha_firma_del_convenio" class="col-md-3 control-label">Fecha de firma del convenio</label>
                    <div class="col-md-2">
                        <?php echo form_input("convenio[fecha_firma_del_convenio]", $convenio['fecha_firma_del_convenio']," id='fecha_firma_del_convenio' class='form-control calendario' " )//maxlength='10' ?>
                    </div>
                    <div class="col-md-3">
                        aaaa-mm-dd
                    </div>
                    
                </div>
                <div class="form-group">
                    <label for="fecha_vencimiento" class="col-md-3 control-label">Fecha de vencimiento</label>
                    <div class="col-md-2">
                        <?php echo form_input("convenio[fecha_vencimiento]", $convenio['fecha_vencimiento']," id='fecha_vencimiento' class='form-control calendario' " ) //maxlength='10'?> 
                    </div>
                    <div class="col-md-3">
                        aaaa-mm-dd
                    </div>
                </div>
                <div class="form-group">
                    <label for="fecha_limite_originacion" class="col-md-3 control-label">Fecha l&iacute;mite de originaci&oacute;n</label>
                    <div class="col-md-2">
                        <?php echo form_input("convenio[fecha_limite_originacion]", $convenio['fecha_limite_originacion']," id='fecha_limite_originacion' class='form-control calendario' " ) //maxlength='10'?>
                    </div>
                    <div class="col-md-3">
                        aaaa-mm-dd
                    </div>
                </div>
                <div class="form-group">
                    <label for="universo_empleados" class="col-md-3 control-label">Universo de empleados</label>
                    <div class="col-md-1">
                        <?php echo form_input("convenio[universo_empleados]", $convenio['universo_empleados']," id='universo_empleados' class='form-control spinner' " ); //?>
                    </div>                    
                </div>
                <div class="form-group">
                    <label for="frecuencia_pagos" class="col-md-3 control-label">Frecuencia de pagos</label>
                    <div class="col-md-5">
                        <?php echo form_dropdown("convenio[frecuencia_pagos]", $cbo_frecuencia_pago,$convenio['frecuencia_pagos']," id='frecuencia_pagos' class='form-control' " )?>            
                    </div>
                </div>
                <div class="form-group">
                    <label for="clave_asignada" class="col-md-3 control-label">Clave asignada</label>
                    <div class="col-md-5">
                        <?php echo form_input("convenio[clave_asignada]", $convenio['clave_asignada']," id='clave_asignada' class='form-control' " )?>            
                    </div>
                </div>
                <div class="form-group">
                    <label for="edad_minima" class="col-md-3 control-label" >Edad m&iacute;nima <i style="font-weight:normal">(En A&ntilde;os)</i></label>
                    <div class="col-md-1" >
                        <?php echo form_input("convenio[edad_minima]", $convenio['edad_minima']," id='edad_minima' class='form-control spinner' " ); //?>
                    </div>                    
                    
                    <label for="edad_maxima" class="col-md-2 control-label" >Edad m&aacute;xima</label>
                    <div class="col-md-1" >
                        <?php echo form_input("convenio[edad_maxima]", $convenio['edad_maxima']," id='edad_maxima' class='form-control spinner' " ); //?>
                    </div>
                </div>                
                
                <div class="form-group">
                    <label for="antiguedad_minima" class="col-md-3 control-label">Antiguedad m&iacute;nima <i style="font-weight:normal">(En A&ntilde;os)</i></label>
                    <div class="col-md-1">
                        <?php echo form_input("convenio[antiguedad_minima]", $convenio['antiguedad_minima']," id='antiguedad_minima' class='form-control spinner' " ); //?>
                    </div>
                    <label for="porcen_capacidad_pago" class="col-md-2 control-label">% Capacidad de pago</label>
                    <div class="col-md-1">
                        <?php echo form_input("convenio[porcen_capacidad_pago]", $convenio['porcen_capacidad_pago']," id='porcen_capacidad_pago' class='form-control spinner_porcen' " ); //?>
                    </div>
                </div>
                
                
                <?php /* TIPO DE EMPLEADOS */?>
                <div class="form-group">
                    <label for="tipo_empleado" class="col-md-3 control-label">Tipos de empleados</label>
                    <div class="col-md-5">                        
                    <?php foreach($tipo_empleado as $pid => $empleado):
                            $checked = ($chk_tipo_empleado[$pid] == $pid)? "checked":"";
                        ?>
                        <input type="checkbox" name="tipo_empleado[]"  value="<?php echo $pid?>" <?php echo $checked;?> > <?php echo $empleado?>&nbsp;&nbsp;
                    <?php endforeach;?>                        
                    </div>
                </div> 
                
                
                
                
                <div class="form-group">
                    <label for="cuenta_asignada_para_pago" class="col-md-3 control-label">Cuenta asignada para pago</label>
                    <div class="col-md-5">
                        <?php echo form_input("convenio[cuenta_asignada_para_pago]", $convenio['cuenta_asignada_para_pago']," id='cuenta_asignada_para_pago' class='form-control' " ); //?>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="intermediario_id" class="col-md-3 control-label">Canal de Referencia</label>
                    <div class="col-md-5">
                        <?php echo form_dropdown("convenio[canal_id]", $cbo_canal,$convenio['canal_id']," id='canal_id' class='form-control'" )?>            
                    </div>
                </div>
            </div>
            <div id="tabs-2">
                <?php $this->load->view("cat/form_direccion")?>                
            </div>
            <div id="tabs-3">
                <?php $this->load->view("cat/form_contacto")?>                
            </div>
        </div>            
        
        <div class="form-group" style="margin-top: 15px;">
            <div class="col-md-offset-2 col-md-9">     
              <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Guardar</button>                                        
              <button type="button" onclick="btn_cancelar()" class="btn btn-warning"><span class="glyphicon glyphicon-ban-circle"></span> Cancel</button>
            </div>
        </div>
    <?php echo form_close()?>  




<script>
    
 <?php echo app_js_acento();?>
        
$(document).ready(function() {
    $('#form_convenio').bootstrapValidator({
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
                        message: 'El nombre es requerido, no puede estar vacio'
                    },
                    stringLength: {
                        min: 3,                        
                        message: 'El nombre debe de contener al menos 3 caracteres'
                    }                    
                }
            },  
            titular: {
                selector: '#titular',
                validators: {
                    notEmpty: {
                        message: 'El titular es requerido, no puede estar vacio'
                    },
                    stringLength: {
                        min: 3,                        
                        message: 'El responsable debe de contener al menos 3 caracteres'
                    }                    
                }
            },             
            'contacto_email[]': {             
                validators: {                   
                    emailAddress: {
                        message: 'El email no contiene una direcci'+acento_o+'n valida'
                    }
                }
            }
            
            
        }
    })        
    // AGREGAR TELEFONO
    .on('click', '.addTelefono', function() {
        var $template = $('#templateTelefono'),
            $clone    = $template.clone().removeClass('hide').removeAttr('id').insertBefore($template),
            $option   = $clone.find('[name="contacto_telefono[]"]');                
        // Add new field
        $('#form_convenio').bootstrapValidator('addField', $option);
    })
    // REMOVER TELEFONO
    .on('click', '.removeTelefono', function() {
        var $row    = $(this).parents('.form-group'), $option = $row.find('[name="contacto_telefono[]"]');
        $row.remove();
        // Remove field
        $('#form_convenio').bootstrapValidator('removeField', $option);
    })   
    // AGREGAR CELULAR
    .on('click', '.addCelular', function() {
        var $template = $('#templateCelular'),
            $clone    = $template.clone().removeClass('hide').removeAttr('id').insertBefore($template),
            $option   = $clone.find('[name="contacto_celular[]"]');                
        // Add new field
        $('#form_convenio').bootstrapValidator('addField', $option);
    })
    // REMOVER CELULAR
    .on('click', '.removeCelular', function() {
        var $row    = $(this).parents('.form-group'), $option = $row.find('[name="contacto_celular[]"]');
        $row.remove();
        // Remove field
        $('#form_convenio').bootstrapValidator('removeField', $option);
    })
    // AGREGAR EMAIL
    .on('click', '.addEmail', function() {
        var $template = $('#templateEmail'),
            $clone    = $template.clone().removeClass('hide').removeAttr('id').insertBefore($template),
            $option   = $clone.find('[name="contacto_email[]"]');                
        // Add new field
        $('#form_convenio').bootstrapValidator('addField', $option);
    })
    // REMOVER EMAIL
    .on('click', '.removeEmail', function() {
        var $row    = $(this).parents('.form-group'), $option = $row.find('[name="contacto_email[]"]');
        $row.remove();
        // Remove field
        $('#form_convenio').bootstrapValidator('removeField', $option);
    })
    
    .on('success.form.bv', function(e) {
        if(!confirm('Guardar los cambios?')){
            e.preventDefault();
            $("#btn_save").prop( "disabled", false );            
        }
    }).on('error.form.bv', function(e, data) {
        alert('Por favor revise que los campos esten correctos\nVerifique todas las pesta'+acento_n+'as');        
    });
    
});

</script>
<script>    

    function btn_cancelar(){
        if(confirm('Desea abandonar el formulario?')){
            location = '<?php echo site_url("cat/convenio/index")?>';
        }
    }
    
</script>