<?php
    $contratos = $this->contrato_model->get_contrato_cliente($cliente['id']);

    //pre($contratos);
?>

<div class="panel-heading" style=" padding: 5px 10px; ">
    <div class="pull-left" style="font-size: 17px"><span class="glyphicon glyphicon-briefcase"></span>&nbsp; Prestamos del cliente</div>
    <div class="pull-right">            
        <?php //echo anchor("cat/contrato/insert",'<span class="glyphicon glyphicon-plus-sign"></span>  Agregar prestamo','class="btn btn-default "')?>
        <a href="javascript:alert('En construccion')" class="btn btn-default "><span class="glyphicon glyphicon-plus-sign"></span>  Agregar prestamo</a>
    </div>
    <div style="clear: both;"></div>
</div>


<table class="table table-bordered  table-striped table-hover">
    <thead>
        <tr >
            <th>Contrato</th>
            <th width="120">Fecha de firma de contrato</th>
            <th width="120">Fecha inicial de descuento</th>
            <th >Tipo</th>
            <th width="130">Prestamo</th>
            <th width="130">Pago quincenal / mensual</th>
            <th>Plazo</th>
            <th>Estado</th>
            <th>Sindicato</th>
        </tr>            
    </thead>
    <tbody>        
    <?php if($contratos):?>
        <?php foreach($contratos as $pos => $row):?>
            <tr>
                <td align="center"><?php echo $row['Id']?></td>
                <td align="center"><?php echo $row['MDate']?></td>
                <td align="center"><?php echo $row['PayInit']?></td>
                <td ><?php echo $row['ContractTypeName']?></td>
                <td align="center">$<?php echo number_format($row['Quantity'],2)?></td>
                <td align="center">$<?php echo number_format($row['MinMonthlyPayment'],2)?></td>
                <td nowrap><?php echo (int)$row['Duration']?> Meses</td>
                <td ><?php echo $row['CStatus']?></td>
                <td ><?php echo $row['Payroll']?></td>
            </tr>
        <?php endforeach;?>
    <?php else:?>
        <tr>
            <td colspan="9" style="text-align: center"> ** No se encontraron registros **</td>
        </tr>
    <?php endif;?>
    </tbody>
</table>