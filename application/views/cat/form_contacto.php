Medios de comunicaci&oacute;n con el contacto
&nbsp;&nbsp;&nbsp;
<button type="button" onclick="btn_add_contacto()" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> Agregar </button>
<hr>
<?php foreach($tipo_contacto as $tipo => $nombre):?>
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
<?php endforeach;?> 

<script>
    function btn_add_contacto(){
        alert('agregar')
    }
</script>