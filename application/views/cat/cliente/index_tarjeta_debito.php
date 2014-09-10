<?php
    $tarjetas = $this->tarjeta_debito_model->get_data_list($cliente['id']);
    $cbo_banco = $this->tarjeta_debito_model->get_cbo_banco();
?>

<div class="panel-heading" style=" padding: 5px 10px; ">
    <div class="pull-left" style="font-size: 17px"><span class="glyphicon glyphicon-credit-card"></span>&nbsp; Tarjetas debito del cliente</div>
    <div class="pull-right">            
        <?php echo anchor("cat/tarjeta_debito/insert",'<span class="glyphicon glyphicon-plus-sign"></span>  Agregar tarjeta','class="btn btn-default "')?> 
    </div>
    <div style="clear: both;"></div>
</div>


<table class="table table-bordered  table-striped table-hover">
    <thead>
        <tr >
            <th width="60">No</th>
            <th >Banco</th>
            <th >Cuenta</th>
            <th >Clabe</th>
            <th width="15">&nbsp;</th>
            <th width="15">&nbsp;</th>
        </tr>            
    </thead>
    <tbody>        
    <?php if($tarjetas):?>
        <?php foreach($tarjetas as $pos => $row):?>
            <tr>
                <td><?php echo $row['id']?></td>
		<td><?php echo $cbo_banco[$row['banco_id']]?></td>
                <td><?php echo $row['cuenta']?></td>
                <td><?php echo $row['clabe']?></td>
                <td><?php echo anchor("cat/tarjeta_debito/update/?id=".$row['id'], '<span class="glyphicon glyphicon-edit" title="Borrar Registro" ></span>', 'class="btn btn-default btn-xs"')?>
		<td><a href="javascript:;" onclick="btn_borrar_debito('<?php echo $row['id']?>');" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-trash" title="Borrar Registro" ></span></a></td>
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
    function btn_borrar_debito(id){
        if(confirm('borrar la tarjeta de debito seleccionada?')){
            location = '<?php echo site_url("cat/tarjeta_debito/delete/?id=")?>'+id;
        }
    }
</script>