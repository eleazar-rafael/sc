<?php if((int)$direccion['id'] > 0 ):?>
    <input type="hidden" name="direccion[id]" value="<?php echo $direccion['id'];?>">
<?php endif;?>
<div class="form-group">
    <label for="calle" class="col-md-2 control-label">Calle</label>
    <div class="col-md-5">
        <?php echo form_input("direccion[calle]", $direccion['calle']," id='calle' class='form-control'" )?>            
    </div>
</div>
<div class="form-group">
    <label for="numero" class="col-md-2 control-label">Numero</label>
    <div class="col-md-2">
        <?php echo form_input("direccion[numero]", $direccion['numero']," id='numero' class='form-control'" )?>            
    </div>
</div>
<div class="form-group">
    <label for="estado" class="col-md-2 control-label">Estado</label>
    <div class="col-md-3">
        <?php //echo form_input("direccion[estado]", $direccion['estado']," id='estado' class='form-control'" )?>            
        <?php echo form_dropdown("direccion[estado]",$cbo_estado,$direccion['estado'], " id='estado' class='form-control' onchange='btn_cbo_municipio(this.value)'") ?>
    </div>
</div>
<div class="form-group">
    <label for="ciudad_deleg" class="col-md-2 control-label">Municipio / Delegaci&oacute;n</label>
    <div class="col-md-3" id="div_municipio">
        <?php //echo form_input("direccion[ciudad_delegacion]", $direccion['ciudad_delegacion']," id='ciudad_delegacion' class='form-control'" )?>
        <?php echo form_dropdown("direccion[ciudad_delegacion]",$cbo_municipio,$direccion['ciudad_delegacion'], " id='ciudad_delegacion' class='form-control' onchange='btn_cbo_colonia(this.value)'") ?>
    </div>
</div>
<div class="form-group">
    <label for="colonia" class="col-md-2 control-label">Colonia</label>
    <div class="col-md-3" id="div_colonia">
        <?php //echo form_input("direccion[colonia]", $direccion['colonia']," id='colonia' class='form-control'" )?>            
        <?php echo form_dropdown("direccion[colonia]",$cbo_colonia,$direccion['colonia'], " id='colonia' class='form-control' onchange='btn_cbo_cp(this.value)'") ?>
    </div>
</div>    
<div class="form-group">
    <label for="3" class="col-md-2 control-label">Codigo Postal</label>
    <div class="col-md-2">
        <?php echo form_input("direccion[codigo_postal]", $direccion['codigo_postal']," data-mask='99999' placeholder='' id='codigo_postal' class='form-control'" )?>            
    </div>
</div>
<div id="cp_test">
    
</div>    
    
<script>
function btn_cbo_municipio(estado){    
    $("#div_municipio").html("<select class='form-control' disabled='true'><option>Buscando...</option></select>");
    $.get( "<?php echo site_url("cat/direccion_cliente/ajax_sepomex_municipio")?>"+"/"+estado, function( data ) {
        $("#div_municipio").html(data); 
    });
}
function btn_cbo_colonia(municipio){ 
    var estado = $("#estado").val();
    if(!estado) estado = 0;
    $("#div_colonia").html("<select class='form-control' disabled='true'><option>Buscando...</option></select>");
    $.get( "<?php echo site_url("cat/direccion_cliente/ajax_sepomex_colonia")?>"+"/"+estado+"/"+municipio, function( data ) {
        $("#div_colonia").html(data); 
    });
}

function btn_cbo_cp(colonia){ 
    var estado = $("#estado").val();
    var municipio = $("#ciudad_delegacion").val();
    if(!estado) estado = 0;
    if(!municipio) municipio = 0;
    //$("#div_colonia").html("<select class='form-control' disabled='true'><option>Buscando...</option></select>");
    $.get( "<?php echo site_url("cat/direccion_cliente/ajax_sepomex_cp")?>"+"/"+estado+"/"+municipio+"/"+colonia, function( data ) {
        $("#codigo_postal").val(data); 
    });
}
</script>
