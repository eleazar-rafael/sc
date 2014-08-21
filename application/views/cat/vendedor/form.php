<script>
$(function() {
    $( "#tabs" ).tabs();
    $(".spinner" ).spinner({min:0});    
    $(".spinner_mes" ).spinner({min:0, max:12});    
    $(".spinner_porcen" ).spinner({min:0, max:100});
    
});
</script>
<div class="panel panel-primary" >
    
    <div class="panel-heading">
        <div class="pull-left">
        <span class="glyphicon glyphicon-pencil"></span>&nbsp; <?php echo $heading_title?>
        </div>
        <div class="pull-right">
        <?php 
            if((int)$vendedor['id'] > 0 )
                echo anchor("cat/vendedor_meta/index/?vendedor_id=".$vendedor['id'],'<span class="glyphicon glyphicon-screenshot"></span>  Agregar Metas ','class="btn btn-primary title="Agregar Metas"')
                    
        ?> 
        </div>
        <div style="clear: both;"></div>
    </div>
    <?php /*<div class="panel-body">      */?>
        <?php echo form_open($action,"id='form' class='form-horizontal' role='form'" );?>
        
        <?php if((int)$vendedor['id'] > 0 ):?>
            <input type="hidden" name="vendedor[id]" value="<?php echo $vendedor['id'];?>">
        <?php endif;?>
            
        <div id="tabs">
            <ul>
              <li><a href="#tabs-1">Datos Generales</a></li>
              <li><a href="#tabs-2">Direccion</a></li>
              <li><a href="#tabs-3">Contacto</a></li>
              <?php /*<li><a href="#tabs-4">Ventas</a></li>*/?>
            </ul>
            <div id="tabs-1">
                <div class="form-group">
                  <label for="nombre" class="col-md-2 control-label">Nombre</label>
                  <div class="col-md-5">
                      <?php echo form_input("vendedor[nombre]", $vendedor['nombre']," id='nombre' class='form-control'" )?>            
                  </div>
                </div>
                <div class="form-group">
                    <label for="rfc" class="col-md-2 control-label">RFC</label>
                  <div class="col-md-5">
                      <?php echo form_input("vendedor[rfc]", $vendedor['rfc']," id='rfc' data-mask='aaaa999999ww*'  class='form-control'" )?>            
                  </div>
                </div>
                                
                <div class="form-group">
                  <label for="sucursal_id" class="col-md-2 control-label">Sucursal</label>
                  <div class="col-md-5">
                      <?php echo form_dropdown("vendedor[sucursal_id]", $cbo_sucursal,$vendedor['sucursal_id']," id='sucursal_id' class='form-control'" )?>            
                  </div>
                </div>
            </div>
            <div id="tabs-2">
                <?php $this->load->view("cat/vendedor/form_direccion")?>                
            </div>
            <div id="tabs-3">
                <?php $this->load->view("cat/form_contacto")?>                
            </div>
            <?php /*
            <div id="tabs-4">
                <div class="form-group">
                  <label for="metas_ventas_mensuales" class="col-md-3 control-label">Metas ventas mensuales</label>
                  <div class="col-md-2">
                      <?php echo form_input("vendedor[metas_ventas_mensuales]", $vendedor['metas_ventas_mensuales']," id='metas_ventas_mensuales' class='form-control'" )?>            
                  </div>
                </div>
             </div> */?>
            
        </div>            
        
        <div class="form-group" style="margin-top: 15px;">
            <div class="col-md-offset-2 col-md-9">     
              <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Guardar</button>                                        
              <button type="button" onclick="btn_cancelar()" class="btn btn-warning"><span class="glyphicon glyphicon-ban-circle"></span> Cancel</button>
            </div>
        </div>
    <?php echo form_close()?>
  <?php /*</div> */?>
</div>



<script>
    
 <?php echo app_js_acento();?>
        
$(document).ready(function() {
    $('#form').bootstrapValidator({
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
        $('#form').bootstrapValidator('addField', $option);
    })
    // REMOVER TELEFONO
    .on('click', '.removeTelefono', function() {
        var $row    = $(this).parents('.form-group'), $option = $row.find('[name="contacto_telefono[]"]');
        $row.remove();
        // Remove field
        $('#form').bootstrapValidator('removeField', $option);
    })   
    // AGREGAR CELULAR
    .on('click', '.addCelular', function() {
        var $template = $('#templateCelular'),
            $clone    = $template.clone().removeClass('hide').removeAttr('id').insertBefore($template),
            $option   = $clone.find('[name="contacto_celular[]"]');                
        // Add new field
        $('#form').bootstrapValidator('addField', $option);
    })
    // REMOVER CELULAR
    .on('click', '.removeCelular', function() {
        var $row    = $(this).parents('.form-group'), $option = $row.find('[name="contacto_celular[]"]');
        $row.remove();
        // Remove field
        $('#form').bootstrapValidator('removeField', $option);
    })
    // AGREGAR EMAIL
    .on('click', '.addEmail', function() {
        var $template = $('#templateEmail'),
            $clone    = $template.clone().removeClass('hide').removeAttr('id').insertBefore($template),
            $option   = $clone.find('[name="contacto_email[]"]');                
        // Add new field
        $('#form').bootstrapValidator('addField', $option);
    })
    // REMOVER EMAIL
    .on('click', '.removeEmail', function() {
        var $row    = $(this).parents('.form-group'), $option = $row.find('[name="contacto_email[]"]');
        $row.remove();
        // Remove field
        $('#form').bootstrapValidator('removeField', $option);
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
            location = '<?php echo site_url("cat/vendedor/index")?>';
        }
    }
    
</script>