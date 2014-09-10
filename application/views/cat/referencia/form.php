<div class="panel panel-primary">
    <div class="panel-heading"><span class="glyphicon glyphicon-pencil"></span>&nbsp; <?php echo $heading_title?></div> 
    <div class="panel-body">
        <?php echo form_open_multipart($action,"id='form_referencia' class='form-horizontal' role='form'" );?>        
        <?php if((int)$referencia['id'] > 0 ):?>
        <input type="hidden" name="referencia[id]" value="<?php echo $referencia['id'];?>" >
        <?php else:?>
            <input type="hidden" name="referencia[cliente_id]" value="<?php echo $cliente_id;?>" >
        <?php endif;?>
        
        
        <div class="form-group">
          <label for="nombre" class="col-md-3 control-label">Nombre completo</label>
          <div class="col-md-5">
              <?php echo form_input("referencia[nombre]", $referencia['nombre']," id='nombre' class='form-control'" )?>            
          </div>
        </div>
            
        <div class="form-group">
            <label for="relacion_id" class="col-md-3 control-label">Relaci&oacute;n</label>
          <div class="col-md-5">
              <?php echo form_dropdown("referencia[relacion_id]",$cbo_relacion, $referencia['relacion_id']," id='relacion_id' class='form-control' " )?>            
          </div>
        </div>
        <div class="form-group">
          <label for="telefono" class="col-md-3 control-label">Telefono</label>
          <div class="col-md-5">
              <?php echo form_input("referencia[telefono]", $referencia['telefono']," data-mask='999-999-9999' id='telefono' class='form-control' " ) //maxlength='100'?>   
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
    
    $('#form_referencia').bootstrapValidator({
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
            telefono: {
                selector: '#telefono',
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
            location = '<?php echo site_url("cat/cliente/view/?tb=6")?>';
        }
    }

</script>
