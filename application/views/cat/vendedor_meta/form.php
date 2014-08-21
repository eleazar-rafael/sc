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
    <li><a href="<?php echo site_url("cat/vendedor/index")?>" title="Mostrar lista de vendedores">VENDEDORES</a></li>
  <li><a href="<?php echo site_url("cat/vendedor/update/?id=".$this->vendedor['id'])?>" title="Editar el vendedor"><?php echo $this->vendedor['nombre']?></a></li>
  <li class="active">Metas</li>
</ol>

<div class="panel panel-primary">
    <div class="panel-heading"><span class="glyphicon glyphicon-pencil"></span>&nbsp; <?php echo $heading_title?></div>
    <?php /*<div class="panel-body">      */?>
        <?php echo form_open($action,"id='frm' class='form-horizontal' role='form'" );?>
        
        
        <input type="hidden" name="anio" value="<?php echo $anio;?>" >        
        
            
        <div id="tabs">
            <ul>
              <li><a href="#tabs-1">Metas de <?php echo $anio?></a></li>              
            </ul>
            <div id="tabs-1">
                <?php $mes = cbo_mes(); $pos = 0;?>
                <?php for( $m = 1; $m <=6; $m++): $pos++; $meta = isset($info[$anio][$pos])? number_format($info[$anio][$pos],0) : "";?>
                <div class="form-group">
                    <label for="mes_<?php echo $pos?>" class="col-md-2 control-label"><?php echo $mes[$pos]?></label>
                    <div class="col-md-2">
                        <?php echo form_input("mes[".$pos."]", $meta," id='mes_".$pos."' class='form-control ' " )?>            
                    </div>       
                    <?php $pos++; $meta = isset($info[$anio][$pos])? number_format($info[$anio][$pos],0) : "";?>
                    <label for="mes_<?php echo $pos?>" class="col-md-1 control-label"><?php echo $mes[$pos]?></label>
                    <div class="col-md-2">
                        <?php echo form_input("mes[".$pos."]", $meta," id='mes_".$pos."' class='form-control ' " )?>            
                    </div>              
                </div>
                <?php endfor;?>
                
            </div>            
        </div>            
        
        <div class="form-group" style="margin-top: 15px;">
            <div class="col-md-offset-3 col-md-6">     
                <button type="button" onclick="btn_guardar()"class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Guardar</button>                                        
                <button type="button" onclick="btn_cancelar()" class="btn btn-warning"><span class="glyphicon glyphicon-ban-circle"></span> Cancel</button>
            </div>
        </div>
    <?php echo form_close()?>  




<script>
    
 <?php echo app_js_acento();?>
        
$(document).ready(function() {
    
    
});

function btn_guardar(){
    if(confirm('Guardar los cambios?')){
        $("#frm").submit();
    }
}

function btn_cancelar(){
    if(confirm('Desea abandonar el formulario?')){
        location = '<?php echo site_url("cat/vendedor_meta/index")?>';
    }
}
    
</script>