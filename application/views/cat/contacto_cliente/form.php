<script>
$(function() {    
    $(".spinner" ).spinner({min:0});    
    $(".spinner_mes" ).spinner({min:0, max:11});    
    
});
</script>

<div class="panel panel-primary">
    <div class="panel-heading"><span class="glyphicon glyphicon-pencil"></span>&nbsp; <?php echo $heading_title?></div> 
    <div class="panel-body">
        <?php echo form_open_multipart($action,"id='form_contacto' class='form-horizontal' role='form'" );?>        
        <?php if((int)$contacto['Id'] > 0 ):?>
            <input type="hidden" name="contacto[Id]" value="<?php echo $contacto['Id'];?>" >        
        <?php else:?>
            <input type="hidden" name="contacto[Entity]" value="<?php echo $cliente_id;?>" >            
        <?php endif;?>        
       
        <div class="form-group">
            <label for="TypeContact" class="col-md-2 control-label">Tipo de Contacto</label>
            <div class="col-md-3">
                <?php echo form_dropdown("contacto[TypeContact]", $cbo_tipo_contacto, $contacto['TypeContact']," id='TypeContact' class='form-control'" )?>            
            </div>
        </div>    
            
        <div class="form-group">
            <label for="TypeContact" class="col-md-2 control-label">Numero / Email</label>
            <div class="col-md-4">
                <?php echo form_input("contacto[TheValue]", $contacto['TheValue']," id='valor' class='form-control'" )?>            
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
    
    $('#form_contacto').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            
            valor: {
                selector: '#valor',
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
        location = '<?php echo site_url("cat/cliente/view/?tb=3")?>';
    }
}

</script>
