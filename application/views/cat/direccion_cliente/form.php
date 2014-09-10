<script>
$(function() {    
    $(".spinner" ).spinner({min:0});    
    $(".spinner_mes" ).spinner({min:0, max:11});    
    
});
</script>

<div class="panel panel-primary">
    <div class="panel-heading"><span class="glyphicon glyphicon-pencil"></span>&nbsp; <?php echo $heading_title?></div> 
    <div class="panel-body">
        <?php echo form_open_multipart($action,"id='form_direccion' class='form-horizontal' role='form'" );?>        
        <?php if((int)$direccion['Id'] > 0 ):?>
        <input type="hidden" name="direccion[Id]" value="<?php echo $direccion['Id'];?>" >        
        <?php else:?>
            <input type="hidden" name="direccion[Entity]" value="<?php echo $cliente_id;?>" >
            <input type="hidden" name="direccion[Active]" value="1" >
        <?php endif;?>        
       
        <div class="form-group">
          <label for="calle" class="col-md-2 control-label">Calle</label>
          <div class="col-md-4">
              <?php echo form_input("direccion[Street]", $direccion['Street']," id='calle' class='form-control'" )?>            
          </div>
          <label for="numero" class="col-md-1 control-label">N&uacute;mero</label>
          <div class="col-md-1">
              <?php echo form_input("direccion[Number]", $direccion['Number']," id='numero' class='form-control'" )?>            
          </div>
        </div>
        <div class="form-group">
          <label for="entre" class="col-md-2 control-label">Entre calle</label>
          <div class="col-md-3">
              <?php echo form_input("direccion[SBetween]", $direccion['SBetween']," id='entre1' class='form-control'" )?>            
          </div>
          <label for="yentre" class="col-md-1 control-label">y calle</label>
          <div class="col-md-2">
              <?php echo form_input("direccion[AndBetween]", $direccion['AndBetween']," id='numero' class='form-control'" )?>            
          </div>
        </div>
            
        <div class="form-group">
            <label for="TypeAddress" class="col-md-2 control-label">Tipo de direcci&oacute;n</label>
            <div class="col-md-3">
                <?php echo form_dropdown("direccion[TypeAddress]", $cbo_tipo_direccion, $direccion['TypeAddress']," id='TypeAddress' class='form-control'" )?>            
            </div>
        </div>    
        <div class="form-group">
            <label for="TypeHouse" class="col-md-2 control-label">Tipo de vivienda</label>
            <div class="col-md-3">
                <?php echo form_dropdown("direccion[TypeHouse]", $cbo_tipo_vivienda, $direccion['TypeHouse']," id='TypeHouse' class='form-control'" )?>            
            </div>
        </div>    
            
        <div class="form-group">
             <label for="country" class="col-md-2 control-label">Pais</label>
             <div class="col-md-3">
                 <?php echo form_dropdown("pais_id", $cbo_pais, $pais_id," id='pais_id' onchange='btn_cbo_estado(this.value)'  class='form-control'" )?>            
             </div>
         </div> 
        
        <div class="form-group">
             <label for="State" class="col-md-2 control-label">Estado</label>
             <div class="col-md-3" id ="div_estado">
                 <?php echo form_dropdown("direccion[State]", $cbo_estado, $direccion['State']," id='State' class='form-control'" )?>
             </div>
        </div> 
          
            
        <div class="form-group">
          <label for="City" class="col-md-2 control-label">Ciudad</label>
          <div class="col-md-4">
              <?php echo form_input("direccion[City]", $direccion['City']," id='City' class='form-control'" )?>            
          </div>
        </div>     
        
        <div class="form-group">
            <label for="municipio_delegacion" class="col-md-2 control-label">Municipio / Delegacion</label>
            <div class="col-md-4">
                <?php echo form_input("direccion[municipio_delegacion]", $direccion['municipio_delegacion']," id='municipio_delegacion' class='form-control'" )?>            
            </div>
        </div> 
        
        <div class="form-group">
            <label for="neighbourhoodname" class="col-md-2 control-label">Colonia</label>
            <div class="col-md-3">
                <?php echo form_input("direccion[NeighbourhoodName]", $direccion['NeighbourhoodName']," id='NeighbourhoodName' class='form-control'" )?>            
            </div>
            <label for="neighbourhoodname" class="col-md-1 control-label">CP</label>
            <div class="col-md-1">
              <?php echo form_input("direccion[CP]", $direccion['CP']," data-mask='99999' placeholder='' id='CP' class='form-control'" )?>            
            </div>
        </div>
            
        <div class="form-group">
            <label for="tiempo_en_direccion" class="col-md-2 control-label">Tiempo en direcci&oacute;n</label>    
            <div class="col-md-1">          
                <?php echo form_input("tiempo_en_direccion_anios", $tiempo_en_direccion_anios," id='anios' readonly class='form-control spinner'" )?>
            </div>
            <div class="col-md-1" style="padding-top: 8px;"> <i>a&ntilde;os</i> </div>
            <div class="col-md-1">    
                  <?php echo form_input("tiempo_en_direccion_meses", $tiempo_en_direccion_meses," id='anios' readonly class='form-control spinner_mes'" )?>
            </div>
            <div class="col-md-1" style="padding-top: 8px;"> <i>meses</i> </div>
        </div>    
        
        <div class="form-group">
            <label for="municipio_delegacion" class="col-md-2 control-label">Costo Mensual</label>
            <div class="col-md-2">
                <?php echo form_input("direccion[MonthlyCost]", $direccion['MonthlyCost']," id='MonthlyCost' class='form-control'" )?>            
            </div>
            <div class="col-md-2" style="padding-top:6px">
                <i>Renta/Hipoteca</i>
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
    
    $('#form_direccion').bootstrapValidator({
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

function btn_cbo_estado(pais){    
    $("#div_estado").html("<select class='form-control' disabled='true'><option>Buscando...</option></select>");
    $.get( "<?php echo site_url("cat/direccion_cliente/ajax_estado")?>"+"/"+pais, function( data ) {
        $("#div_estado").html(data); 
    });
}

function btn_cancelar(){
    if(confirm('Desea abandonar el formulario?')){
        location = '<?php echo site_url("cat/cliente/view/?tb=2")?>';
    }
}

</script>
