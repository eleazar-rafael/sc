<script>
$(function() {
    $( "#tabs" ).tabs();
    $( ".calendario" ).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd'
     });
});
</script>

<ol class="breadcrumb" style="margin-bottom: 5px;">
    <li><a href="<?php echo site_url("cat/convenio/index")?>" title="Mostrar lista de convenios">CONVENIOS</a></li>
    <li><a href="<?php echo site_url("cat/convenio/update/?id=".$this->convenio['id'])?>" title="Editar el convenio"><?php echo $this->convenio['nombre']?></a></li>
    <li class="active">Calendario</li>
</ol>

<div class="panel panel-primary">
    <div class="panel-heading"><span class="glyphicon glyphicon-pencil"></span>&nbsp; <?php echo $heading_title?></div>
    <?php /*<div class="panel-body">      */?>
        <?php echo form_open($action,"id='form_calendario' class='form-horizontal' role='form'" );?>
        
        <?php if((int)$calendario['id'] > 0 ):?>
            <input type="hidden" name="calendario[id]" value="<?php echo $calendario['id'];?>" >        
        <?php endif;?>
            
        <div id="tabs">
            <ul>
              <li><a href="#tabs-1">Datos Generales</a></li>              
            </ul>
            <div id="tabs-1">
                <div class="form-group">
                    <label for="nombre" class="col-md-4 control-label">Descripci&oacute;n de la fecha</label>
                    <div class="col-md-4">
                        <?php echo form_input("calendario[nombre]", $calendario['nombre']," id='nombre' class='form-control'" )?>            
                    </div>
                </div>
                <div class="form-group">
                    <label for="fecha_contratacion" class="col-md-4 control-label">Fecha de contrataci&oacute;n del credito</label>
                    <div class="col-md-2">
                        <?php echo form_input("calendario[fecha_contratacion]", $calendario['fecha_contratacion']," id='fecha_contratacion' class='form-control calendario' " )?>            
                    </div>
                    <div class="col-md-2">
                        aaaa-mm-dd
                    </div>
                </div>
                <div class="form-group">
                    <label for="fecha_entrega_al_canal" class="col-md-4 control-label">Fecha de entrega del cr&eacute;dito al canal</label>
                    <div class="col-md-2">
                        <?php echo form_input("calendario[fecha_entrega_al_canal]", $calendario['fecha_entrega_al_canal']," id='fecha_entrega_al_canal' class='form-control calendario' " )?>   
                    </div>
                    <div class="col-md-2">
                        aaaa-mm-dd
                    </div>
                </div>
                <div class="form-group">
                    <label for="fecha_descuento_al_acreditado" class="col-md-4 control-label">Fecha programa del descuento al acreditado</label>
                    <div class="col-md-2">
                        <?php echo form_input("calendario[fecha_descuento_al_acreditado]", $calendario['fecha_descuento_al_acreditado']," id='fecha_descuento_al_acreditado' class='form-control calendario' " )?>
                    </div>
                    <div class="col-md-2">
                        aaaa-mm-dd
                    </div>
                </div>
                
            </div>            
        </div>            
        
        <div class="form-group" style="margin-top: 15px;">
            <div class="col-md-offset-4 col-md-6">     
              <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Guardar</button>                                        
              <button type="button" onclick="btn_cancelar()" class="btn btn-warning"><span class="glyphicon glyphicon-ban-circle"></span> Cancel</button>
            </div>
        </div>
    <?php echo form_close()?>  




<script>
    
 <?php echo app_js_acento();?>
        
$(document).ready(function() {
    $('#form_calendario').bootstrapValidator({
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
            }     
            
            
        }
    }).on('success.form.bv', function(e) {
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
            location = '<?php echo site_url("cat/convenio_calendario/index")?>';
        }
    }
    
</script>