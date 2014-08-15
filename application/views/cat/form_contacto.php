<?php $t_telelefono=106; $t_celular=107; $t_email= 108;?>
<?php if($contacto[$t_telelefono]):?>
    <?php foreach($contacto[$t_telelefono] as $pos=>$row):?>
    <div class="form-group">
        <label class="col-md-1 control-label"><?php if($pos == 0 ):?>Telefono<?php endif;?></label>
        <div class="col-md-4">
            <input type="hidden" name="contacto_telefono_id[]" value="<?php echo $row['id']?>">
            <input type="text" class="form-control" data-mask="999-999-9999" name="contacto_telefono[]" value="<?php echo $row['descripcion']?>"/>
        </div>
        <div class="col-md-2">
            <?php if($pos == 0 ):?>
                <button type="button" class="btn btn-success btn-xs addTelefono">
                    <i class="glyphicon glyphicon-plus"></i>           
                </button>
            <?php else:?>
                <input type="checkbox" name="contacto_telefono_borrar[<?php echo $row['id']?>]" value="<?php echo $row['id']?>"> Remover 
            <?php endif;?>
        </div>
    </div>

    <?php endforeach;?>
<?php else:?>
    <div class="form-group">
        <label class="col-md-1 control-label">Telefono</label>
        <div class="col-md-4">
            <input type="hidden" name="contacto_telefono_id[]">
            <input type="text" class="form-control" data-mask="999-999-9999" name="contacto_telefono[]" />
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-success btn-xs addTelefono">
                <i class="glyphicon glyphicon-plus"></i>           
            </button>
        </div>
    </div>
<?php endif;?>

<!-- The option field template containing an option field and a Remove button -->
<div class="form-group hide" id="templateTelefono">
    <div class="col-md-offset-1 col-md-4">
        <input type="hidden" name="contacto_telefono_id[]">
        <input type="text" class="form-control" data-mask="999-999-9999" name="contacto_telefono[]" />
    </div>
    <div class="col-md-2">
        <button type="button" class="btn btn-danger btn-xs removeTelefono">
            <i class="glyphicon glyphicon-minus"></i>
        </button>
    </div>
</div>





<?php if($contacto[$t_celular]):?>
    <?php foreach($contacto[$t_celular] as $pos=>$row):?>
    <div class="form-group">
        <label class="col-md-1 control-label"><?php if($pos == 0 ):?>Celular<?php endif;?></label>
        <div class="col-md-4">
            <input type="hidden" name="contacto_celular_id[]" value="<?php echo $row['id']?>">
            <input type="text" class="form-control" data-mask="999-999-9999" name="contacto_celular[]" value="<?php echo $row['descripcion']?>"/>
        </div>
        <div class="col-md-2">
            <?php if($pos == 0 ):?>
                <button type="button" class="btn btn-success btn-xs addCelular">
                    <i class="glyphicon glyphicon-plus"></i> 
                </button>
            <?php else:?>
                <input type="checkbox" name="contacto_celular_borrar[<?php echo $row['id']?>]" value="<?php echo $row['id']?>"> Remover 
            <?php endif;?>
        </div>
    </div>

    <?php endforeach;?>
<?php else:?>
    <div class="form-group">
        <label class="col-md-1 control-label">Celular</label>
        <div class="col-md-4">
            <input type="hidden" name="contacto_celular_id[]">
            <input type="text" class="form-control" data-mask="999-999-9999" name="contacto_celular[]" />
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-success btn-xs addCelular">
                <i class="glyphicon glyphicon-plus"></i>           
            </button>
        </div>
    </div>
<?php endif;?>

<!-- The option field template containing an option field and a Remove button -->
<div class="form-group hide" id="templateCelular">
    <div class="col-md-offset-1 col-md-4">
        <input type="hidden" name="contacto_celular_id[]">
        <input type="text" class="form-control" data-mask="999-999-9999" name="contacto_celular[]" />
    </div>
    <div class="col-md-2">
        <button type="button" class="btn btn-danger btn-xs removeCelular">
            <i class="glyphicon glyphicon-minus"></i>
        </button>
    </div>
</div>




<?php if($contacto[$t_email]):?>
    <?php foreach($contacto[$t_email] as $pos=>$row):?>
    <div class="form-group">
        <label class="col-md-1 control-label"><?php if($pos == 0 ):?>Email<?php endif;?></label>
        <div class="col-md-4">            
            <input type="hidden" name="contacto_email_id[]" value="<?php echo $row['id']?>" >
            <input type="text" class="form-control" name="contacto_email[]" value="<?php echo $row['descripcion']?>"/>
        </div>
        <div class="col-md-2">
            <?php if($pos == 0 ):?>
                <button type="button" class="btn btn-success btn-xs addEmail">
                    <i class="glyphicon glyphicon-plus"></i> 
                </button>
            <?php else:?>
                <input type="checkbox" name="contacto_email_borrar[<?php echo $row['id']?>]" value="<?php echo $row['id']?>"> Remover 
            <?php endif;?>
        </div>
    </div>

    <?php endforeach;?>
<?php else:?>
    <div class="form-group">
        <label class="col-md-1 control-label">Email</label>
        <div class="col-md-4">
            <input type="hidden" name="contacto_email_id[]">
            <input type="text" class="form-control" name="contacto_email[]" />
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-success btn-xs addEmail">
                <i class="glyphicon glyphicon-plus"></i>
            </button>
        </div>
    </div>
<?php endif;?>

<!-- The option field template containing an option field and a Remove button -->
<div class="form-group hide" id="templateEmail">
    <div class="col-md-offset-1 col-md-4">
        <input type="hidden" name="contacto_email_id[]">
        <input type="text" class="form-control" name="contacto_email[]" />
    </div>
    <div class="col-md-2">
        <button type="button" class="btn btn-danger btn-xs removeEmail">
            <i class="glyphicon glyphicon-minus"></i>
        </button>
    </div>
</div>



<?php /*<div style="padding-top:15px;">
    <?php foreach($tipo_contacto as $tipo => $nombre):?>
   
    <table class="table table-striped" id="tbl_form_contacto_<?php echo $tipo?>" style="width:96%!important; margin-bottom: 0px!important;" >        
        <thead>
            <tr>
                <th width="80"><?php echo $nombre ?></th>
                <th>
                    <?php $css = ""; if($tipo == 108) $css = "addEmail"; ?>
                    <button type="button" onclick="btn_add_contacto(<?php echo $tipo?>)" class="btn btn-success btn-xs <?php echo $css?>"><span class="glyphicon glyphicon-plus-sign"></span> </button>&nbsp;&nbsp;                    
                </th>                
            </tr>
        </thead>
        <tbody>       
        </tbody>
    </table>
    <?php endforeach;?> 
</div> */?>



<?php /*foreach($tipo_contacto as $tipo => $nombre):?>
    <?php if((int)$contacto[$tipo][0]['id']> 0):?>
        <input type="hidden" name="contacto[<?php echo $tipo?>][id]" value="<?php echo $contacto[$tipo][0]['id']?>">
    <?php endif?>
    <div class="form-group">
        <label for="telefono" class="col-md-2 control-label"><?php echo $nombre?></label>
        <div class="col-md-3">
            <?php $dataMask = ""; $class="";// data-mask='999-99-999-9999-9'
                switch ($tipo){ //
                    case '106': case '107': case '109':$dataMask = " data-mask='999-999-9999'"; $class="telefono";break;
                    case '108': $class="email";
                }    
            ?>
            <?php echo form_input("contacto[$tipo][descripcion]", $contacto[$tipo][0]['descripcion'],"  $dataMask  class='form-control $class'" )?>
        </div>
    </div>
<?php endforeach;*/?> 

<script>
    $(function(){
            
              
         
         //$(".remove").bind("click", remove_row);
    });
    
    
    function remove_row(n){        
        $("#tr_contacto_"+n).remove();        
    }


    
    
    function btn_add_contacto(tipo){
        max_contacto++;
        
        $.get("<?php echo site_url("cat/app/contacto_add")?>/"+tipo+"/"+max_contacto, function(data){
            $('#tbl_form_contacto_'+tipo+' > tbody:last').append( data );
        });
    }
</script>