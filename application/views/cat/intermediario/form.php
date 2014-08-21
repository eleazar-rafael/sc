<script>
    $(function() {
        $( "#tabs" ).tabs();
	/*$( ".calendario" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'yy-mm-dd'
        });*/
     
      $(".spinner" ).spinner({min:0});    
    });
</script>
<div class="panel panel-primary">
    <div class="panel-heading"><span class="glyphicon glyphicon-pencil"></span>&nbsp; <?php echo $heading_title?></div>
    
    <?php echo form_open_multipart($action,"id='form' class='form-horizontal' role='form'" );?>

    <?php if((int)$intermediario['id'] > 0 ):?>
        <input type="hidden" name="intermediario[id]" value="<?php echo $intermediario['id'];?>">
    <?php endif;?>
    <div id="tabs">
        <ul>
            <li><a href="#tabs-1">Datos Generales</a></li>
            <li><a href="#tabs-2">Cobranza</a></li>
            <li><a href="#tabs-3">Comisi&oacute;n</a></li>
            <li><a href="#tabs-4">Archivos</a></li>
        </ul>
        <div id="tabs-1">
            <div class="form-group">
              <label for="nombre" class="col-md-3 control-label">Nombre</label>
              <div class="col-md-5">
                  <?php echo form_input("intermediario[nombre]", $intermediario['nombre']," id='nombre' class='form-control'" )?>            
              </div>
            </div>
            <div class="form-group">
                <label for="num_escritura" class="col-md-3 control-label">N&uacute;mero de Escritura</label>
              <div class="col-md-3">
                  <?php echo form_input("intermediario[num_escritura]", $intermediario['num_escritura']," id='num_escritura' class='form-control'" )?>            
              </div>
            </div>
            <div class="form-group">
              <label for="apoderado_legal" class="col-md-3 control-label">Apoderado Legal</label>
              <div class="col-md-5">
                  <?php echo form_input("intermediario[apoderado_legal]", $intermediario['apoderado_legal']," id='apoderado_legal' class='form-control'" )?>            
              </div>
            </div>
            <div class="form-group">
              <label for="rfc" class="col-md-3 control-label">RFC</label>
              <div class="col-md-2">
                  <?php echo form_input("intermediario[rfc]", $intermediario['rfc']," id='rfc' data-mask='aaaa999999ww*' class='form-control'" )?>            
              </div>
            </div>
            <div class="form-group">
              <label for="contacto_canal" class="col-md-3 control-label">Contacto con el Canal</label>
              <div class="col-md-5">
                  <?php echo form_input("intermediario[contacto_canal]", $intermediario['contacto_canal']," id='rfc' class='form-control'" )?>            
              </div>
            </div>
            <div class="form-group">
                <label for="tiempo_entrega_expediente" class="col-md-3 control-label">Tiempo de entrega de expediente </label>
                <div class="col-md-1">
                    <?php echo form_input("intermediario[tiempo_entrega_expediente]", $intermediario['tiempo_entrega_expediente']," id='rfc' class='form-control spinner' ")?> 
                </div>
                <div class="col-md-1" style="padding-top: 8px;">
                    <i>en d&iacute;as</i>
                </div>
            </div>         
        </div>
        <div id="tabs-2">
            <div class="form-group">
                <label for="cobranza_esperada_mes" class="col-md-3 control-label">Cobranza esperada por mes</label>
                <div class="col-md-2">
                    <?php echo form_input("intermediario[cobranza_esperada_mes]", $intermediario['cobranza_esperada_mes']," id='cobranza_esperada_mes' class='form-control'" )?>            
                </div>
            </div>
            <div class="form-group">
                <label for="cobranza_realizada" class="col-md-3 control-label">Cobranza realizada</label>
                <div class="col-md-2">
                    <?php echo form_input("intermediario[cobranza_realizada]", $intermediario['cobranza_realizada']," id='cobranza_realizada' class='form-control'" )?>            
                </div>
            </div>
            <div class="form-group">
                <label for="porcen_cobranza_realizada" class="col-md-3 control-label">Porcentaje de cobranza realizada</label>
                <div class="col-md-1">
                    <?php echo form_input("intermediario[porcen_cobranza_realizada]", $intermediario['porcen_cobranza_realizada']," id='porcen_cobranza_realizada' class='form-control spinner_porcen'" )?>            
                </div>
                <div class="col-md-1" style="padding-top: 8px;"> % </div>
            </div> 
        </div>
        <div id="tabs-3">
            <div class="form-group">
                <label for="periodo_pago_comision" class="col-md-3 control-label">periodo pago de comisi&oacute;n</label>
                <div class="col-md-2">
                    <?php echo form_input("intermediario[periodo_pago_comision]", $intermediario['periodo_pago_comision']," id='periodo_pago_comision' class='form-control'" )?>            
                </div>
            </div>                
            <div class="form-group">
                <label for="porcen_comision" class="col-md-3 control-label">Porcentaje de comisi&oacute;n</label>
                <div class="col-md-1">
                    <?php echo form_input("intermediario[porcen_comision]", $intermediario['porcen_comision']," id='porcen_comision' class='form-control spinner_porcen'" )?>            
                </div>
                <div class="col-md-1" style="padding-top: 8px;"> % </div>
            </div>
            <div class="form-group">
                <label for="comision_a_pagar" class="col-md-3 control-label">Comision a pagar</label>
                <div class="col-md-2">
                    <?php echo form_input("intermediario[comision_a_pagar]", $intermediario['comision_a_pagar']," id='comision_a_pagar' class='form-control'" )?>            
                </div>
            </div>
        </div>
        <div id="tabs-4">
            <?php $this->load->view("cat/form_archivo")?>
        </div>
    </div>      
    <div class="form-group" style="margin-top: 15px;">
        <div class="col-md-offset-3 col-md-4"> 
          <button type="submit" id="btn_save" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Guardar</button>                                        
          <button type="button" onclick="btn_cancelar()" class="btn btn-warning"><span class="glyphicon glyphicon-ban-circle"></span> Cancel</button>
        </div>
    </div>
    <?php echo form_close()?>

</div>


<script>    
<?php echo app_js_acento();?>
    
$(document).ready(function() {
    $('#form').bootstrapValidator({        
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
            }/*,             
            emails: {
                selector: '.email',
                validators: {                   
                    emailAddress: {
                        message: 'El email no contiene una direcci'+acento_o+'n valida'
                    }
                }
            }*/
            
        }
    }).on('success.form.bv', function(e) {
        if(!confirm('Guardar los cambios?')){
            e.preventDefault();
            $("#btn_save").prop( "disabled", false );            
        }        
    }).on('error.form.bv', function(e, data) {
        //alert('Por favor revise que los campos esten correctos\nVerifique todas las pesta'+acento_n+'as');        
    });
});        
        
        
/*    function btn_guardar(){        
        if(confirm('Guardar los cambios?')){
            $('#form').submit();
        }        
    }*/
    function btn_cancelar(){
        if(confirm('Desea abandonar el formulario?')){
            location = '<?php echo site_url("cat/intermediario/index")?>';
        }
    }
    
</script>