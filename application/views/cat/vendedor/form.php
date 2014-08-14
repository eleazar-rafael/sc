<script>
$(function() {
    $( "#tabs" ).tabs();
    $(".spinner" ).spinner({min:0});    
    $(".spinner_mes" ).spinner({min:0, max:12});    
    $(".spinner_porcen" ).spinner({min:0, max:100});
    
});
</script>
<div class="panel panel-primary" >
    <div class="panel-heading"><span class="glyphicon glyphicon-pencil"></span>&nbsp; <?php echo $heading_title?></div>
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
              <li><a href="#tabs-4">Ventas</a></li>
              <li><a href="#tabs-5">Cobranza</a></li>
              <li><a href="#tabs-6">Comisi&oacute;n</a></li>
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
                <?php $this->load->view("cat/vendedor/form_contacto")?>                
            </div>
            <div id="tabs-4">
                <div class="form-group">
                  <label for="metas_ventas_mensuales" class="col-md-3 control-label">Metas ventas mensuales</label>
                  <div class="col-md-2">
                      <?php echo form_input("vendedor[metas_ventas_mensuales]", $vendedor['metas_ventas_mensuales']," id='metas_ventas_mensuales' class='form-control'" )?>            
                  </div>
                </div>
                <div class="form-group">
                  <label for="porcen_ventas" class="col-md-3 control-label">Porcentaje de ventas</label>
                  <div class="col-md-1">
                      <?php echo form_input("vendedor[porcen_ventas]", $vendedor['porcen_ventas']," id='porcen_ventas' class='form-control spinner_porcen'" )?>            
                  </div>
                  <div class="col-md-1" style="padding-top: 8px;"> % </div>
                </div>
                <div class="form-group">
                  <label for="numero_operacion_ingresada" class="col-md-3 control-label">Numero de operacion ingresada</label>
                  <div class="col-md-2">
                      <?php echo form_input("vendedor[numero_operacion_ingresada]", $vendedor['numero_operacion_ingresada']," id='numero_operacion_ingresada' class='form-control'" )?>            
                  </div>
                </div>
                <div class="form-group">
                  <label for="porcen_ventas_autorizadas" class="col-md-3 control-label">Porcentaje de ventas autorizadas</label>
                  <div class="col-md-1">
                      <?php echo form_input("vendedor[porcen_ventas_autorizadas]", $vendedor['porcen_ventas_autorizadas']," id='porcen_ventas_autorizadas' class='form-control spinner_porcen'" )?>            
                  </div>
                  <div class="col-md-1" style="padding-top: 8px;"> % </div>
                </div>
                <div class="form-group">
                  <label for="porcen_ventas_rechazadas" class="col-md-3 control-label">Porcentaje de ventas rechazadas</label>
                  <div class="col-md-1">
                      <?php echo form_input("vendedor[porcen_ventas_rechazadas]", $vendedor['porcen_ventas_rechazadas']," id='porcen_ventas_rechazadas' class='form-control spinner_porcen'" )?>            
                  </div>
                  <div class="col-md-1" style="padding-top: 8px;"> % </div>
                </div>
            </div>
            <div id="tabs-5">
                <div class="form-group">
                  <label for="cobranza_esperada_enel_mes" class="col-md-3 control-label">Cobranza esperada por mes</label>
                  <div class="col-md-2">
                      <?php echo form_input("vendedor[cobranza_esperada_enel_mes]", $vendedor['cobranza_esperada_enel_mes']," id='cobranza_esperada_enel_mes' class='form-control'" )?>            
                  </div>
                </div>
                <div class="form-group">
                  <label for="cobranza_realizada" class="col-md-3 control-label">Cobranza realizada</label>
                  <div class="col-md-2">
                      <?php echo form_input("vendedor[cobranza_realizada]", $vendedor['cobranza_realizada']," id='cobranza_realizada' class='form-control'" )?>            
                  </div>
                </div>
                <div class="form-group">
                  <label for="porcen_cobranza_realizada" class="col-md-3 control-label">Porcentaje de cobranza realizada</label>
                  <div class="col-md-1">
                      <?php echo form_input("vendedor[porcen_cobranza_realizada]", $vendedor['porcen_cobranza_realizada']," id='porcen_cobranza_realizada' class='form-control spinner_porcen'" )?>            
                  </div>
                  <div class="col-md-1" style="padding-top: 8px;"> % </div>
                </div>
            </div>
            <div id="tabs-6">
                <div class="form-group">
                    <label for="periodo_pago_comision" class="col-md-3 control-label">periodo pago de comisi&oacute;n</label>
                    <div class="col-md-2">
                        <?php echo form_input("vendedor[periodo_pago_comision]", $vendedor['periodo_pago_comision']," id='periodo_pago_comision' class='form-control'" )?>            
                    </div>
                </div>                
                <div class="form-group">
                    <label for="porcen_comision" class="col-md-3 control-label">Porcentaje de comisi&oacute;n</label>
                    <div class="col-md-1">
                        <?php echo form_input("vendedor[porcen_comision]", $vendedor['porcen_comision']," id='porcen_comision' class='form-control spinner_porcen'" )?>            
                    </div>
                    <div class="col-md-1" style="padding-top: 8px;"> % </div>
                </div>
                <div class="form-group">
                    <label for="comision_a_pagar" class="col-md-3 control-label">Comision a pagar</label>
                    <div class="col-md-2">
                        <?php echo form_input("vendedor[comision_a_pagar]", $vendedor['comision_a_pagar']," id='comision_a_pagar' class='form-control'" )?>            
                    </div>
                </div>
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
            location = '<?php echo site_url("cat/vendedor/index")?>';
        }
    }
    
</script>