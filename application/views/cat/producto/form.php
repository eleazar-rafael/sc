<script>
$(function() {
    $( "#tabs" ).tabs();
    $( ".calendario" ).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd'
     });
     
     $(".spinner" ).spinner({ min: 0 });
     $(".spinner_porcen" ).spinner({ min: 0, max:100});
     $(".spinner_moneda" ).spinner({ 
        min: 0,step:10, numberFormat: "C"
      });
});
</script>
<div class="panel panel-primary">
    <div class="panel-heading"><span class="glyphicon glyphicon-pencil"></span>&nbsp; <?php echo $heading_title?></div>
    <?php /*<div class="panel-body">      */?>
        <?php echo form_open($action,"id='form_producto' class='form-horizontal' role='form'" );?>
        
        <?php if((int)$producto['id'] > 0 ):?>
        <input type="hidden" name="producto[id]" value="<?php echo $producto['id'];?>" >
        <?php endif;?>
                          
        <div id="tabs">
            <ul>
              <li><a href="#tabs-1">Datos Generales</a></li>              
            </ul>
            <div id="tabs-1">
                <div class="form-group">
                  <label for="nombre" class="col-md-3 control-label">Nombre del producto*</label>
                  <div class="col-md-5">
                      <?php echo form_input("producto[nombre]", $producto['nombre']," id='nombre' class='form-control'" )?>            
                  </div>
                </div>
                <div class="form-group">
                    <label for="monto_minimo_prestamo" class="col-md-3 control-label">Monto m&iacute;nimo del pr&eacute;stamo*</label>
                  <div class="col-md-2">
                      <?php echo form_input("producto[monto_minimo_prestamo]", $producto['monto_minimo_prestamo']," id='monto_minimo_prestamo' class='form-control spinner_moneda' " )?>            
                  </div>
                </div>
                <div class="form-group">
                    <label for="monto_maximo_prestamo" class="col-md-3 control-label">Monto m&aacute;ximo del pr&eacute;stamo*</label>
                  <div class="col-md-2">
                      <?php echo form_input("producto[monto_maximo_prestamo]", $producto['monto_maximo_prestamo']," id='monto_maximo_prestamo' class='form-control spinner_moneda' " ) //maxlength='100'?>   
                  </div>
                </div>
                <div class="form-group">
                    <label for="tipo_comision" class="col-md-3 control-label">Tipo Comisi&oacute;n*</label>
                    <div class="col-md-2">
                        <?php echo form_dropdown("producto[tipo_comision]", $cbo_tipo_comision,$producto['tipo_comision']," id='tipo_comision' class='form-control' " )?>
                        <?php //echo form_input("producto[tipo_comision]", $producto['tipo_comision']," id='tipo_comision' class='form-control' " )//maxlength='10' ?>
                    </div>
                </div>
                <?php $stfijo = ($producto['tipo_comision'] <> 116)? "style='display:none;'" : ""?>
                <div class="form-group tipo_comision" <?php echo $stfijo?> id="tr_116">
                    <label for="comision_apertura" class="col-md-3 control-label">Comisi&oacute;n de apertura fija*</label>
                    <div class="col-md-2">
                        <?php echo form_input("producto[comision_apertura]", $producto['comision_apertura']," id='comision_apertura' class='form-control spinner_moneda' " ) //maxlength='10'?> 
                    </div>                   
                </div>                
                <?php $stporcen = ($producto['tipo_comision'] <> 117)? "style='display:none;'" : ""?>
                <div class="form-group tipo_comision" <?php echo $stporcen?> id="tr_117">
                    <label for="porcen_comision_apertura" class="col-md-3 control-label">Porcentaje de comisi&oacute;n de apertura* </label>
                    <div class="col-md-1">
                        <?php echo form_input("producto[porcen_comision_apertura]", $producto['porcen_comision_apertura']," id='porcen_comision_apertura' class='form-control spinner_porcen' " ) //maxlength='10'?>
                    </div>              
                    <div class="col-md-1" style="padding-top: 8px">
                        %
                    </div>
                </div>
                <div class="form-group">
                    <label for="financiamiento_comision" class="col-md-3 control-label">Financiamiento de la comisi&oacute;n*</label>
                    <div class="col-md-2">
                        <?php echo form_input("producto[financiamiento_comision]", $producto['financiamiento_comision']," id='financiamiento_comision' class='form-control' " ); //?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tasa" class="col-md-3 control-label">Tasa*</label>
                    <div class="col-md-1">
                        <?php echo form_input("producto[tasa]", $producto['tasa']," id='tasa' class='form-control spinner_porcen' " ); //?>
                    </div>
                    <div class="col-md-1" style="padding-top:8px;">%</div>
                </div>
                
                <div class="form-group">
                    <label for="plazos_mensuales" class="col-md-3 control-label">Plazos mensuales*</label>
                    <div class="col-md-1">
                        <?php //echo form_dropdown("producto[plazos_mensuales]", $cbo_plazos_mensuales,$producto['plazos_mensuales']," id='plazos_mensuales' class='form-control' " )?>
                        <?php echo form_input("producto[plazos_mensuales]", $producto['plazos_mensuales']," id='plazos_mensuales' class='form-control spinner' " )?>
                    </div>
                    <div class="col-md-1" style="padding-top:8px;">
                        <i>Meses</i>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tasa_moratoria" class="col-md-3 control-label">Tasa moratoria*</label>
                    <div class="col-md-1">
                        <?php echo form_input("producto[tasa_moratoria]", $producto['tasa_moratoria']," id='tasa_moratoria' class='form-control spinner_porcen' " )?>
                    </div>
                    <div class="col-md-1" style="padding-top:8px;">%</div>
                </div>
                <div class="form-group">
                    <label for="seguro" class="col-md-3 control-label">Seguro *</label>
                    <div class="col-md-1">
                        <?php echo form_input("producto[seguro]", $producto['seguro']," id='seguro' class='form-control spinner_porcen' " )?>
                    </div>
                    <div class="col-md-1" style="padding-top:8px;">%</div>
                </div>
                <div class="form-group">
                    <label for="otros_gastos" class="col-md-3 control-label">Otros Gastos *</label>
                    <div class="col-md-1">
                        <?php echo form_input("producto[otros_gastos]", $producto['otros_gastos']," id='otros_gastos' class='form-control spinner_porcen' " )?>
                    </div>
                    <div class="col-md-1" style="padding-top:8px;" >%</div>
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




<script>
    
 <?php echo app_js_acento();?>
        
$(document).ready(function() {
    
    $("#tipo_comision").on("change", function(){
        $(".tipo_comision").hide();        
        $("#tr_"+$(this).val()).show();
    });
    
    $('#form_producto').bootstrapValidator({
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
            monto_minimo_prestamo:{
                selector: '#monto_minimo_prestamo',
                validators:{
                    notEmpty: {
                        message: 'Campo requerido'
                    },
                    numeric:{
                        message:'Campos numerico'
                    }
                }
            },
            monto_minimo_prestamo:{
                selector: '#monto_minimo_prestamo',
                validators:{
                    notEmpty: {
                        message: 'Campo requerido'
                    },
                    numeric:{
                        message:'Campos numerico'
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
        alert('Por favor revise que los campos esten correctos');        
    });
    
});

</script>
<script>    

    function btn_cancelar(){
        if(confirm('Desea abandonar el formulario?')){
            location = '<?php echo site_url("cat/producto/index")?>';
        }
    }
    
</script>