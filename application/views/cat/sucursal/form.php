<script>
$(function() {
    $( "#tabs" ).tabs();
});
</script>
<div class="panel panel-primary">
    <div class="panel-heading"><span class="glyphicon glyphicon-pencil"></span>&nbsp; <?php echo $heading_title?></div>
    <?php /*<div class="panel-body">      */?>
        <?php echo form_open($action,"id='form' class='form-horizontal' role='form'" );?>
        
        <?php if((int)$sucursal['id'] > 0 ):?>
            <input type="hidden" name="sucursal[id]" value="<?php echo $sucursal['id'];?>">
        <?php endif;?>
            
        <div id="tabs">
            <ul>
              <li><a href="#tabs-1">Datos Generales</a></li>
              <li><a href="#tabs-2">Direccion</a></li>
              <li><a href="#tabs-3">Contacto</a></li>
            </ul>
            <div id="tabs-1">
                <div class="form-group">
                  <label for="nombre" class="col-md-3 control-label">Nombre</label>
                  <div class="col-md-5">
                      <?php echo form_input("sucursal[nombre]", $sucursal['nombre']," id='nombre' class='form-control'" )?>            
                  </div>
                </div>
                <div class="form-group">
                    <label for="responsable" class="col-md-3 control-label">Responsable</label>
                  <div class="col-md-5">
                      <?php echo form_input("sucursal[responsable]", $sucursal['responsable']," id='responsable' class='form-control'" )?>            
                  </div>
                </div>
                <div class="form-group">
                  <label for="reponsable_mesa_control" class="col-md-3 control-label">Reponsable mesa de control</label>
                  <div class="col-md-5">
                      <?php echo form_input("sucursal[reponsable_mesa_control]", $sucursal['reponsable_mesa_control']," id='reponsable_mesa_control' class='form-control'" )?>            
                  </div>
                </div>
                <div class="form-group">
                  <label for="intermediario_id" class="col-md-3 control-label">Intermediario Asociado</label>
                  <div class="col-md-5">
                      <?php echo form_dropdown("sucursal[intermediario_id]", $cbo_intermediario,$sucursal['intermediario_id']," id='intermediario_id' class='form-control'" )?>            
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
            responsable: {
                selector: '#responsable',
                validators: {
                    notEmpty: {
                        message: 'El responsable es requerido, no puede estar vacio'
                    },
                    stringLength: {
                        min: 3,                        
                        message: 'El responsable debe de contener al menos 3 caracteres'
                    }                    
                }
            },  
            reponsable_mesa_control: {
                selector: '#reponsable_mesa_control',
                validators: {
                    notEmpty: {
                        message: 'El responsable de mesa de control es requerido, no puede estar vacio'
                    },
                    stringLength: {
                        min: 3,                        
                        message: 'El responsable de mesa de control debe contener al menos 3 caracteres'
                    }                    
                }
            },
        emails: {
                selector: '.email',
                validators: {                   
                    emailAddress: {
                        message: 'El email no contiene una direcci'+acento_o+'n valida'
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
            location = '<?php echo site_url("cat/sucursal/index")?>';
        }
    }
    
</script>