<script>
    $(function() {
        $( "#tabs" ).tabs();
    });
</script>

<div class="panel panel-primary">
    <div class="panel-heading"><span class="glyphicon glyphicon-pencil"></span>&nbsp; <?php echo $heading_title?></div>
        
        <?php echo form_open($action,"id='formFondeador' class='form-horizontal' role='form'" );?>
        
        <?php if((int)$fondeador['id'] > 0 ):?>
            <input type="hidden" name="fondeador[id]" value="<?php echo $fondeador['id'];?>">
        <?php endif;?>
        <div id="tabs">
            <ul>
              <li><a href="#tabs-1">Datos Generales</a></li>
              <li><a href="#tabs-2">Direccion</a></li>
              <li><a href="#tabs-3">Contacto</a></li>              
            </ul>
            <div id="tabs-1">
                <div class="form-group">
                  <label for="nombre" class="col-md-2 control-label">Nombre</label>
                  <div class="col-md-5">
                      <?php echo form_input("fondeador[nombre]", $fondeador['nombre']," id='nombre' class='form-control'" )?>            
                  </div>
                </div>
                <div class="form-group">
                  <label for="descripcion" class="col-md-2 control-label">Descripci&oacute;n</label>
                  <div class="col-md-9">
                      <?php echo form_input("fondeador[descripcion]",$fondeador['descripcion'], " id='descripcion'  class='form-control' ") ?>
                  </div>
                </div>
            </div>
            <div id="tabs-2">
                <?php $this->load->view("cat/fondeador/form_direccion")?>
                
            </div>        
            <div id="tabs-3">
                <?php $this->load->view("cat/fondeador/form_contacto")?>
            </div>
        </div>
        <?php /*
        <div class="form-group" style="margin-top: 15px;display:none;" id="msg_error" >
            <div class="col-md-offset-1 col-md-9 text-danger" >
                ** Por favor revise los errores en todas las pesta&ntilde;as ** 
            </div>
        </div> */?>
        <div class="form-group" style="margin-top: 15px;">
            <div class="col-md-offset-2 col-md-9">     <?php //onclick="btn_guardar();"?>
              <button type="submit" id="btn_save" class="btn btn-primary" ><span class="glyphicon glyphicon-save"></span> Guardar</button>                                        
              <button type="button" onclick="btn_cancelar()" class="btn btn-warning"><span class="glyphicon glyphicon-ban-circle"></span> Cancel</button>
            </div>
        </div>
    <?php echo form_close()?>
  
</div>



<script>
<?php echo app_js_acento();?>
        
$(document).ready(function() {
    $('#formFondeador').bootstrapValidator({
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
        //$("#msg_error").show();
    });
    
});



</script>
<script>    
    function btn_guardar(){
        
        if(confirm('Guardar los cambios?')){
            $('#form').submit();
        }
        
    }
    function btn_cancelar(){
        if(confirm('Desea abandonar el formulario?')){
            location = '<?php echo site_url("cat/fondeador/index")?>';
        }
    }
    
</script>

