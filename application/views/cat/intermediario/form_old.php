
<div class="row-fluid" >
    <div class="span12">
        <div class="box box-bordered ">            
            <div class="box-title">
                <h3><i class="icon-th-list"></i> <?php echo $heading_title?></h3>
            </div>
            
            <div class="box-content nopadding">
                <?php echo form_open($action,"id='form' class='form-horizontal form-bordered'" );?>
                
                <?php if((int)$intermediario['id'] > 0 ):?>
                    <input type="hidden" name="intermediario[id]" value="<?php echo $intermediario['id'];?>">
                <?php endif;?>
                    
                <div class="control-group">
                    <label for="nombre" class="control-label">Nombre*</label>
                    <div class="controls">                        
                        <?php echo form_input("intermediario[nombre]", $intermediario['nombre']," id='nombre' class='input-large' " )?>                        
                    </div> 
                </div> 
                    
                <div class="control-group" >
                    <label for="link" class="control-label">No. de Escritura*</label>
                    <div class="controls">                        
                        <?php echo form_input("intermediario[num_escritura]",$intermediario['num_escritura'], " class='input-large'  ") ?>
                    </div> 
                </div>
                <div class="control-group" >
                    <label for="link" class="control-label">Apoderado Legal*</label>
                    <div class="controls">                        
                        <?php echo form_input("intermediario[apoderado_legal]",$intermediario['apoderado_legal'], " class='input-large'  ") ?>
                    </div> 
                </div>    
                <div class="control-group" >
                    <label for="link" class="control-label">RFC*</label>
                    <div class="controls">                        
                        <?php echo form_input("intermediario[rfc]",$intermediario['rfc'], " class='input-large'  ") ?>
                    </div> 
                </div>    
                <div class="control-group" >
                    <label for="link" class="control-label">Tiempo de entrega*</label>
                    <div class="controls">                        
                        <?php echo form_input("intermediario[tiempo_entrega]",$intermediario['tiempo_entrega'], " class='input-small'") ?>
                        <span>(de expedientes f&iacute;sicos en dias)</span>
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
            alert('Por favor, teclee el nombre del intermediario');
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
        
        /*if(confirm('Guargar los cambios del directorio?')){
            $('#form').submit();
        }*/
        
    }
    function btn_cancelar(){
        /*if(confirm('Desea abandonar el formulario?')){
            location = '<?php //echo site_url("sis/intermediario/index")?>';
        }*/
    }
    
</script>

