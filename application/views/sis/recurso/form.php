
<div class="row-fluid" >
    <div class="span12">
        <div class="box box-bordered ">            
            <div class="box-title">
                <h3><i class="icon-th-list"></i> <?php echo $heading_title?></h3>
            </div>
            
            <div class="box-content nopadding">
                <?php echo form_open($action,"id='form' class='form-horizontal form-bordered'" );?>
                
                <?php if((int)$recurso['id'] > 0 ):?>
                    <input type="hidden" name="recurso[id]" value="<?php echo $recurso['id'];?>">
                <?php endif;?>
                    
                <div class="control-group">
                    <label for="nombre" class="control-label">Nombre</label>
                    <div class="controls">                        
                        <?php echo form_input("recurso[nombre]", $recurso['nombre']," id='nombre' size ='65' " )?>
                    </div> 
                </div> 
                    
                <div class="control-group" >
                    <label for="link" class="control-label">Controlador</label>
                    <div class="controls">                        
                        <?php echo form_input("recurso[controller]",$recurso['link'], " size='65' ") ?>
                    </div> 
                </div>
                <div class="control-group" >
                    <label for="link" class="control-label">Par&aacute;metros</label>
                    <div class="controls">                        
                        <?php echo form_input("recurso[parametros]",$recurso['parametros'], " size='65' ") ?>
                    </div> 
                </div>    
                <div class="control-group">
                    <label for="padre_id" class="control-label">Depende de</label>
                    <div class="controls">                        
                        <?php echo form_dropdown("recurso[padre_id]",$cbo_padre, $recurso['padre_id'], " id='padre_id' ") ?>
                    </div> 
                </div>     
                <div class="control-group">
                    <label for="orden" class="control-label">Orden</label>
                    <div class="controls">                        
                        <?php echo form_input("recurso[orden]",$recurso['orden'], " size='15' ") ?>
                    </div> 
                </div>
                <?php /*
                <div class="control-group">
                    <label for="seleccion" class="control-label">Orden</label>
                    <div class="controls">                        
                        <?php echo form_input("recurso[seleccion]",$recurso['seleccion'], " size='15' ") ?>
                    </div> 
                </div> */?>
                <div class="control-group">
                    <label for="acciones" class="control-label">Acciones</label>
                    <div class="controls">                        
                        <div style="border:solid 0px #c0c0c0; padding: 10px; width: 450px">
                        <?php foreach($sis_acciones as $accion):
                                $checked = ($recurso_acciones[$accion['codigo']])? true: false;
                            ?>
                            <div style="padding:0px 10px; float:left;width: 130px"> 
                                <?php echo form_checkbox("acciones[".$accion['codigo']."]",$accion['codigo'],$checked)?>&nbsp;<?php echo $accion['nombre']?>                    
                            </div>                
                        <?php endforeach;?>
                            
                            <?php //pre($recurso_acciones,'---recurso_acciones---')?>
                            <div style="clear:both"></div>
                        </div>
                    </div> 
                </div>     
                 
                <div class="form-actions">
                    <button type="button" class="btn btn-primary" onclick="btn_guardar();"><i class='icon-hdd'></i> Guardar</button>                                        
                    <button type="button" onclick="btn_cancelar()" class="btn btn-primary"> <i class='icon-reply'></i> Cancel</button>
                </div>
                   
                <?php echo form_close();?> 
            </div>
        </div>
    </div>
</div>            

<script>
    
    /*function btn_guardar(){
        if($("#nombre").val() == "" ){
            alert('Por favor, teclee el nombre del recurso');
            $("#nombre").focus()
        }else{
            if(confirm('Guargar los cambios del Recurso?')){
                $('#form').submit();
            }
        }
    }*/

</script>
<script>    
    function btn_guardar(){
        
        if(confirm('Guargar los cambios del directorio?')){
            $('#form').submit();
        }
        
    }
    function btn_cancelar(){
        if(confirm('Desea abandonar el formulario?')){
            location = '<?php echo site_url("sis/recurso/index")?>';
        }
    }
    
</script>
