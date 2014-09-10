<div class="panel panel-primary">
    <div class="panel-heading"><span class="glyphicon glyphicon-pencil"></span>&nbsp; <?php echo $heading_title?></div> 
    <div class="panel-body">
        <?php echo form_open_multipart($action,"id='form_tarjeta_debito' class='form-horizontal' role='form'" );?>        
        <?php if((int)$tarjeta_debito['id'] > 0 ):?>
        <input type="hidden" name="tarjeta_debito[id]" value="<?php echo $tarjeta_debito['id'];?>" >
        <?php else:?>
            <input type="hidden" name="tarjeta_debito[cliente_id]" value="<?php echo $cliente_id;?>" >
        <?php endif;?>
        
        <div class="form-group">
            <label for="banco_id" class="col-md-3 control-label">Banco</label>
          <div class="col-md-5">
              <?php echo form_dropdown("tarjeta_debito[banco_id]",$cbo_banco, $tarjeta_debito['banco_id']," id='banco_id' class='form-control' " )?>            
          </div>
        </div>
        
        <div class="form-group">
            <label for="cuenta" class="col-md-3 control-label">N&uacute;mero de cuenta</label>
          <div class="col-md-5">
              <?php echo form_input("tarjeta_debito[cuenta]", $tarjeta_debito['cuenta']," id='cuenta' class='form-control'" )?>            
          </div>
        </div>
            
        
        <div class="form-group">
          <label for="clabe" class="col-md-3 control-label">Clabe</label>
          <div class="col-md-5">
              <?php echo form_input("tarjeta_debito[clabe]", $tarjeta_debito['clabe']," id='clabe' class='form-control' " ) //maxlength='100'?>   
          </div>
        </div>
        
        <div class="form-group" style="margin-top: 15px;">
            <div class="col-md-offset-3 col-md-5">     
              <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Guardar</button>                                        
              <button type="button" onclick="btn_cancelar()" class="btn btn-warning"><span class="glyphicon glyphicon-chevron-left"></span> Regresar</button>
            </div>
        </div>
    <?php echo form_close()?>
    </div>
</div>

<script>    
 <?php echo app_js_acento();?>
        
$(document).ready(function() {
    
    $('#form_tarjeta_debito').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            /*banco:{                
                selector: '#banco_id',
                validators: {
                    integer: {
                        min: 1,
                        message: 'campo requerido'
                    }
                }
            },*/
            cuenta: {
                selector: '#cuenta',
                validators: {
                    notEmpty: {
                        message: 'campo requerido'
                    }                
                }
            },  
            clabe: {
                selector: '#clabe',
                validators: {
                    notEmpty: {
                        message: 'campo requerido'
                    }
                    
                }
            }       
                       
                    
        }
    })
    .on('success.form.bv', function(e) {
        if(!confirm('Guardar los cambios?')){
            e.preventDefault();
            $("#btn_save").prop( "disabled", false );            
        }        
        
    }).on('error.form.bv', function(e, data) {
        alert('Por favor revise que los campos esten correctos');        
    });

});

function btn_cancelar(){
        if(confirm('Desea abandonar el formulario?')){
            location = '<?php echo site_url("cat/cliente/view/?tb=5")?>';
        }
    }

</script>
