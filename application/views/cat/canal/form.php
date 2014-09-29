<script>
$(function() {
    $( "#tabs" ).tabs();
    $( ".calendario" ).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd'
     });
     
     $(".spinner" ).spinner({
         min: 0
     });
});
</script>
<?php  ?>
<div class="panel panel-primary">
    <div class="panel-heading"><span class="glyphicon glyphicon-pencil"></span>&nbsp; <?php echo $heading_title?></div>
    <?php /*<div class="panel-body">      */?>
        <?php echo form_open_multipart($action,"id='form_canal' class='form-horizontal' role='form'" );?>
        
        <?php if((int)$canal['id'] > 0 ):?>
        <input type="hidden" name="canal[id]" value="<?php echo $canal['id'];?>" >
        <?php endif;?>
            
        <div id="tabs">
            <ul>
              <li><a href="#tabs-1">Datos Generales</a></li>              
              <li><a href="#tabs-2">Direcci&oacute;n</a></li>
              <li><a href="#tabs-3">Contacto</a></li>
              <li><a href="#tabs-4">Intermediarios</a></li>
              <li><a href="#tabs-5">Archivos</a></li>
              
            </ul>
            <div id="tabs-1">
                <div class="form-group">
                  <label for="nombre" class="col-md-3 control-label">Nombre del Canal</label>
                  <div class="col-md-5">
                      <?php echo form_input("canal[nombre]", $canal['nombre']," id='nombre' class='form-control'" )?>            
                  </div>
                </div>
                <div class="form-group">
                    <label for="descripcion" class="col-md-3 control-label">Descripci&oacute;n del canal</label>
                    <div class="col-md-8">
                        <?php echo form_input("canal[descripcion]",$canal['descripcion'], " id='descripcion'  class='form-control' ") ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="titular" class="col-md-3 control-label">Titular del canal</label>
                  <div class="col-md-5">
                      <?php echo form_input("canal[titular]", $canal['titular']," id='titular' class='form-control' " )?>            
                  </div>
                </div>
                <div class="form-group">
                  <label for="contacto" class="col-md-3 control-label">Nombre del Contacto</label>
                  <div class="col-md-5">
                      <?php echo form_input("canal[contacto]", $canal['contacto']," id='contacto' class='form-control' " ) //maxlength='100'?>   
                  </div>
                </div>
                <div class="form-group">
                    <label for="fecha_firma_del_canal" class="col-md-3 control-label">Fecha de firma del canal</label>
                    <div class="col-md-2">
                        <?php echo form_input("canal[fecha_firma_del_canal]", $canal['fecha_firma_del_canal']," id='fecha_firma_del_canal' class='form-control calendario' " )//maxlength='10' ?>
                    </div>
                    <div class="col-md-3">
                        aaaa-mm-dd
                    </div>
                    
                </div>
                <div class="form-group">
                    <label for="fecha_vencimiento" class="col-md-3 control-label">Fecha de vencimiento</label>
                    <div class="col-md-2">
                        <?php echo form_input("canal[fecha_vencimiento]", $canal['fecha_vencimiento']," id='fecha_vencimiento' class='form-control calendario' " ) //maxlength='10'?> 
                    </div>
                    <div class="col-md-3">
                        aaaa-mm-dd
                    </div>
                </div>
                <div class="form-group">
                    <label for="fecha_limite_originacion" class="col-md-3 control-label">Fecha l&iacute;mite de originaci&oacute;n</label>
                    <div class="col-md-2">
                        <?php echo form_input("canal[fecha_limite_originacion]", $canal['fecha_limite_originacion']," id='fecha_limite_originacion' class='form-control calendario' " ) //maxlength='10'?>
                    </div>
                    <div class="col-md-3">
                        aaaa-mm-dd
                    </div>
                </div>
                <div class="form-group">
                    <label for="universo_empleados" class="col-md-3 control-label">Universo de empleados</label>
                    <div class="col-md-1">
                        <?php echo form_input("canal[universo_empleados]", $canal['universo_empleados']," id='universo_empleados' class='form-control spinner' " ); //?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="frecuencia_pagos" class="col-md-3 control-label">Frecuencia de pagos</label>
                    <div class="col-md-3">
                        <?php echo form_dropdown("canal[frecuencia_pagos]", $cbo_frecuencia_pago,$canal['frecuencia_pagos']," id='frecuencia_pagos' class='form-control' " )?>            
                    </div>
                </div>
                <?php /*
                <div class="form-group">
                    <label for="contrato" class="col-md-3 control-label">Subir archivo del contrato</label>
                    <div class="col-md-5">                        
                        <?php echo form_upload("archivo_contrato","asda" ," id='contrato' class='form-control' " )?>
                    </div>
                </div>                
                <?php if($canal['contrato']): 
                        $contrato = (array)json_decode($canal['contrato']);
                ?>
                <div class="form-group">
                    <label for="contrato" class="col-md-3 control-label"></label>
                    <div class="col-md-5">
                        <?php //pre($contrato,'--CONTRATO--')?>
                        <a class="btn btn-default" title="Mostrar contrato" href="<?php echo base_url($contrato['path'])?>" target="_blank" >
                            <span class="glyphicon glyphicon-file"></span> &nbsp;Mostrar Archivo
                        </a>
                        <a class="btn btn-default" title="" href="<?php echo site_url("cat/canal/download_file/".$canal['id'])?>" >
                            <span class="glyphicon glyphicon-download"></span> &nbsp;Bajar archivo
                        </a>
                        
                    </div>
                </div>  
                <?php endif; */?>
            </div>            
            <div id="tabs-2">
                <?php $this->load->view("cat/form_direccion")?>                
            </div>
            <div id="tabs-3">
                <?php $this->load->view("cat/form_contacto")?>                
            </div>
            <div id="tabs-4">
                <?php $this->load->view("cat/canal/form_intermediario")?>                
            </div>
            <div id="tabs-5">
                <?php $this->load->view("cat/form_archivo")?>                
            </div>
        </div>            
        
        <div class="form-group" style="margin-top: 15px;">
            <div class="col-md-offset-2 col-md-9">     
              <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Guardar</button>                                        
              <button type="button" onclick="btn_cancelar()" class="btn btn-warning"><span class="glyphicon glyphicon-ban-circle"></span> Cancel</button>
            </div>
        </div>
    <?php echo form_close()?>
</div>

<script>    
 <?php echo app_js_acento();?>
        
$(document).ready(function() {
    
    $('#form_canal').bootstrapValidator({
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
        $('#form_canal').bootstrapValidator('addField', $option);
    })
    // REMOVER TELEFONO
    .on('click', '.removeTelefono', function() {
        var $row    = $(this).parents('.form-group'), $option = $row.find('[name="contacto_telefono[]"]');
        $row.remove();
        // Remove field
        $('#form_canal').bootstrapValidator('removeField', $option);
    })   
    // AGREGAR CELULAR
    .on('click', '.addCelular', function() {
        var $template = $('#templateCelular'),
            $clone    = $template.clone().removeClass('hide').removeAttr('id').insertBefore($template),
            $option   = $clone.find('[name="contacto_celular[]"]');                
        // Add new field
        $('#form_canal').bootstrapValidator('addField', $option);
    })
    // REMOVER CELULAR
    .on('click', '.removeCelular', function() {
        var $row    = $(this).parents('.form-group'), $option = $row.find('[name="contacto_celular[]"]');
        $row.remove();
        // Remove field
        $('#form_canal').bootstrapValidator('removeField', $option);
    })
    // AGREGAR EMAIL
    .on('click', '.addEmail', function() {
        var $template = $('#templateEmail'),
            $clone    = $template.clone().removeClass('hide').removeAttr('id').insertBefore($template),
            $option   = $clone.find('[name="contacto_email[]"]');                
        // Add new field
        $('#form_canal').bootstrapValidator('addField', $option);
    })
    // REMOVER EMAIL
    .on('click', '.removeEmail', function() {
        var $row    = $(this).parents('.form-group'), $option = $row.find('[name="contacto_email[]"]');
        $row.remove();
        // Remove field
        $('#form_canal').bootstrapValidator('removeField', $option);
    })
    
    .on('success.form.bv', function(e) {
        if(!confirm('Guardar los cambios?')){
            e.preventDefault();
            $("#btn_save").prop( "disabled", false );            
        }        
        
    }).on('error.form.bv', function(e, data) {
        alert('Por favor revise que los campos esten correctos\nVerifique todas las pesta'+acento_n+'as');        
    });
    
    
    /*function notify() {
    alert( "clicked" );
    }
    $("button" ).on( "click", notify );*/
    
    function myremover(){
        alert('entro a la funcion.. ')
    }
    
    $(".a-remove" ).on( "click", myremover );
    
    
     /*$(".remove").on('click', function() {
            //$(this).parent().parent().remove();
            //$(this).parent().parent().remove();
            alert('entro a la funcion.. ')
    }); */
});

</script>
<script>    

    function btn_cancelar(){
        if(confirm('Desea abandonar el formulario?')){
            location = '<?php echo site_url("cat/canal/index")?>';
        }
    }
    
</script>