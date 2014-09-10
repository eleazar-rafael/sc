<?php
    $direcciones = $this->direccion_model->get_direcciones_cliente($cliente['id']);
?>

<div class="panel-heading" style="border: solid 0px #c0c0c0; padding: 5px 10px; ">
    <div class="pull-left" style="font-size: 17px"><span class="glyphicon glyphicon-home"></span>&nbsp; Direcciones del cliente</div>
    <div class="pull-right">            
        <?php echo anchor("cat/direccion_cliente/insert",'<span class="glyphicon glyphicon-plus-sign"></span>  Agregar direcci&oacute;n','class="btn btn-default "')?> 
    </div>
    <div style="clear: both;"></div>
</div>

<table class="table table-bordered  table-striped table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Tipo</th>
            <th>Calle</th>
            <th>N&uacute;mero</th>
            <th>Colonia</th>
            <th>CP</th>
            <th>Duraci&oacute;n</th>
            <th>Costo Mensual</th>
            <th width="15"></th>
            <th width="15"></th>            
        </tr>            
    </thead>
    <tbody>        
    <?php if($direcciones):?>
        <?php foreach($direcciones as $pos => $row):?>
            <tr>
                <td><?php echo $row['Id']?></td>
		<td><?php echo $row['Type']?></td>
		<td><?php echo $row['Street']?></td>
		<td><?php echo $row['Number']?></td>
		<td><?php echo $row['Neighbourhood']?></td>
		<td><?php echo $row['CP']?></td>
		<td><?php echo $row['Duration']?></td>
		<td><?php echo $row['MonthlyCost']?></td>
                <td><?php echo anchor("cat/direccion_cliente/update/?id=".$row['Id'], '<span class="glyphicon glyphicon-edit" title="Editar Registro" ></span>', 'class="btn btn-default btn-xs"')?>
		<td><a href="javascript:;" onclick="btn_borrar_direccion('<?php echo $row['Id']?>');" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-trash" title="Borrar Registro" ></span></a></td>
            </tr>
        <?php endforeach;?>
    <?php else:?>
        <tr>
            <td colspan="8" style="text-align: center"> ** No se encontraron registros **</td>
        </tr>
    <?php endif;?>
    </tbody>
</table>

<script>    
    function btn_borrar_direccion(id){
        if(confirm('borrar la referencia seleccionada?')){
            location = '<?php echo site_url("cat/direccion_cliente/delete/?id=")?>'+id;
        }
    }
</script>