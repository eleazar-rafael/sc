<?php
    $contactos = $this->contacto_model->get_contactos_cliente($cliente['id']);
?>

<div class="panel-heading" style=" padding: 5px 10px; ">
    <div class="pull-left" style="font-size: 17px"><span class="glyphicon glyphicon-phone-alt"></span>&nbsp; Contactos del cliente</div>
    <div class="pull-right">            
        <?php echo anchor("cat/contacto_cliente/insert",'<span class="glyphicon glyphicon-plus-sign"></span>  Crear contacto','class="btn btn-default "')?> 
    </div>
    <div style="clear: both;"></div>
</div>


<table class="table table-bordered  table-striped table-hover">
    <thead>
        <tr >
            <th>No</th>
            <?php /*<th>Trabajo</th>*/?>
            <th>Tipo</td>
            <th>Numero / Email</th>	
            <th width="15">&nbsp;</th>
            <th width="15">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
    <?php if($contactos):?>
        <?php foreach($contactos as $pos => $row):?>
            <tr>
                <td><?php echo $row['Id']?></td>
		<?php /*<td><?php echo $row['trabajo']?></td> */?>
		<td><?php echo $row['tipo_contacto']?></td>
		<td><?php echo $row['TheValue']?></td>
		<td><?php echo anchor("cat/contacto_cliente/update/?id=".$row['Id'], '<span class="glyphicon glyphicon-edit" title="Editar Registro" ></span>', 'class="btn btn-default btn-xs"')?>
		<td><a href="javascript:;" onclick="btn_borrar_contacto('<?php echo $row['Id']?>');" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-trash" title="Borrar Registro" ></span></a></td>
            </tr>
        <?php endforeach;?>
    <?php else:?>
        <tr>
            <td colspan="5" style="text-align: center"> ** No se encontraron registros **</td>
        </tr>
    <?php endif;?>
    </tbody>
</table>

<script>
    
    function btn_borrar_contacto(id){
        if(confirm('borrar el contacto seleccionado?')){
            location = '<?php echo site_url("cat/contacto_cliente/delete/?id=")?>'+id;
        }
    }
</script>