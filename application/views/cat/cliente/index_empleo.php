<?php
    $empleos = $this->empleo_model->get_empleos_cliente($cliente['id']);
?>

<div class="panel-heading" style=" padding: 5px 10px; ">
    <div class="pull-left" style="font-size: 17px"><span class="glyphicon glyphicon-wrench"></span>&nbsp; Empleos del cliente</div>
    <div class="pull-right">            
        <?php //echo anchor("cat/contrato/insert",'<span class="glyphicon glyphicon-plus-sign"></span>  Agregar Empleo','class="btn btn-default "')?> 
        <a href="javascript:alert('En construccion')" class="btn btn-default "><span class="glyphicon glyphicon-plus-sign"></span>  Agregar Empleo</a>
    </div>
    <div style="clear: both;"></div>
</div>


<table class="table table-bordered  table-striped table-hover">
    <thead>
        <tr >
            <th width="15">No</th>
            <th width="49%">Empresa</th>
            <th width="49%">Ingreso Mensual</th>
            <th width="15">&nbsp;</th>
        </tr>            
    </thead>
    <tbody>        
    <?php if($empleos):?>
        <?php foreach($empleos as $pos => $row):?>
            <tr>
                <td><?php echo $row['Id']?></td>
		<td><?php echo $row['CompanyN']?></td>
                <td>$<?php echo number_format($row['MontlyPayment'],2)?></td>
		<td><a href="javascript:;" onclick="borrar_empleo('<?php echo $row['Id']?>');" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-trash" title="Borrar Registro" ></span></a></td>
            </tr>
        <?php endforeach;?>
    <?php else:?>
        <tr>
            <td colspan="4" style="text-align: center"> ** No se encontraron registros **</td>
        </tr>
    <?php endif;?>
    </tbody>
</table>

<script>
    function borrar_empleo(){
        
    }
</script>