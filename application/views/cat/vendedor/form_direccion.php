<?php if((int)$direccion['id'] > 0 ):?>
    <input type="hidden" name="direccion[id]" value="<?php echo $direccion['id'];?>">
<?php endif;?>
<div class="form-group">
    <label for="tipo_direccion" class="col-md-2 control-label">Tipo de direcci&oacute;n</label>
    <div class="col-md-5">
        <?php echo form_dropdown("direccion[tipo_direccion]", $cbo_tipo_direccion,$direccion['tipo_direccion']," id='tipo_direccion' class='form-control'" )?>            
    </div>
</div>
<div class="form-group">
    <label for="tipo_vivienda" class="col-md-2 control-label">Tipo de vivienda</label>
    <div class="col-md-5">
        <?php echo form_dropdown("direccion[tipo_vivienda]", $cbo_tipo_vivienda,$direccion['tipo_vivienda']," id='tipo_vivienda' class='form-control'" )?>            
    </div>
</div>    
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
  <label for="3" class="col-md-2 control-label">Codigo Postal</label>
  <div class="col-md-2">
      <?php echo form_input("direccion[codigo_postal]", $direccion['codigo_postal']," data-mask='99999' placeholder='' id='codigo_postal' class='form-control'" )?>            
  </div>
</div>
<div class="form-group">
  <label for="colonia" class="col-md-2 control-label">Colonia</label>
  <div class="col-md-5">
      <?php echo form_input("direccion[colonia]", $direccion['colonia']," id='colonia' class='form-control'" )?>            
  </div>
</div>
<div class="form-group">
  <label for="ciudad_deleg" class="col-md-2 control-label">Ciudad o Delegacion</label>
  <div class="col-md-5">
      <?php echo form_input("direccion[ciudad_delegacion]", $direccion['ciudad_delegacion']," id='ciudad_delegacion' class='form-control'" )?>            
  </div>
</div>
<div class="form-group">
  <label for="estado" class="col-md-2 control-label">Estado</label>
  <div class="col-md-5">
      <?php echo form_input("direccion[estado]", $direccion['estado']," id='estado' class='form-control'" )?>            
  </div>
</div>
    
<div class="form-group">
    <label for="tiempo_en_direccion" class="col-md-2 control-label">Tiempo en direcci&oacute;n</label>    
    <div class="col-md-1">          
        <?php echo form_input("direccion[tiempo_en_direccion_anios]", $direccion['tiempo_en_direccion_anios']," id='anios' class='form-control spinner'" )?>
    </div>
    <div class="col-md-1" style="padding-top: 8px;"> a&ntilde;os </div>
    <div class="col-md-1">    
          <?php echo form_input("direccion[tiempo_en_direccion_meses]", $direccion['tiempo_en_direccion_meses']," id='anios' class='form-control spinner_mes'" )?>
    </div>
    <div class="col-md-1" style="padding-top: 8px;"> meses </div>
</div>