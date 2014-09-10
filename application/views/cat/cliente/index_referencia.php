<?php
    $referencias = $this->referencia_model->get_data_list($cliente['id']);
    $cbo_relacion = $this->referencia_model->get_cbo_relacion();
?>

<div class="panel-heading" style=" padding: 5px 10px; ">
    <div class="pull-left" style="font-size: 17px"><span class="glyphicon glyphicon-link"></span>&nbsp; Referencias del cliente</div>
    <div class="pull-right">            
        <?php echo anchor("cat/referencia/insert",'<span class="glyphicon glyphicon-plus-sign"></span>  Agregar Referencia','class="btn btn-default "')?> 
    </div>
    <div style="clear: both;"></div>
</div>


<table class="table table-bordered  table-striped table-hover">
    <thead>
        <tr>
            <th width="60">Id</th>
            <th>Nombre referencia</th>
            <th>Relaci&oacute;n o parentesco</th>
            <th>Telefono</th>
            <th width="15">&nbsp;</th>
            <th width="15">&nbsp;</th>
        </tr>            
    </thead>
    <tbody>        
    <?php if($referencias):?>
        <?php foreach($referencias as $pos => $row):?>
            <tr>
                <td><?php echo $row['id']?></td>
		<td><?php echo $row['nombre']?></td>
                <td><?php echo $cbo_relacion[$row['relacion_id']]?></td>
                <td><?php echo $row['telefono']?></td>
                <td><?php echo anchor("cat/referencia/update/?id=".$row['id'], '<span class="glyphicon glyphicon-edit" title="Editar Registro" ></span>', 'class="btn btn-default btn-xs"')?>
		<td><a href="javascript:;" onclick="btn_borrar_referencia('<?php echo $row['id']?>');" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-trash" title="Borrar Registro" ></span></a></td>
            </tr>
        <?php endforeach;?>
    <?php else:?>
        <tr>
            <td colspan="6" style="text-align: center"> ** No se encontraron registros **</td>
        </tr>
    <?php endif;?>
    </tbody>
</table>

<script>
    
    function btn_borrar_referencia(id){
        if(confirm('borrar la referencia seleccionada?')){
            location = '<?php echo site_url("cat/referencia/delete/?id=")?>'+id;
        }
    }
</script>