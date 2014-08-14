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