

<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="pull-left"><h4 ><span class="glyphicon glyphicon-th"></span> <?php echo $heading_title?></h4></div>
        <div class="pull-right">            
            <?php //echo anchor("cat/canal/insert",'<span class="glyphicon glyphicon-plus-sign"></span>  Agregar','class="btn btn-primary "')?> 
        </div>
        <div style="clear: both;"></div>
    </div>
    <?php echo form_open("cat/canal/index","id='form'")?>
    <table class="table table-bordered  table-striped table-hover">
    <thead>
        <tr>
            <th colspan="11"style="text-align: center;background-color: #d6e9c6">DATOS GENERALES</th>
            <th colspan="4" style="text-align: center;">DATOS DEL CREDITO</th>
            <th colspan="5" style="text-align: center;background-color: #d6e9c6">PAGOS REALIZADOS</th>
            <th colspan="2" style="text-align: center;">PAGOS VENCIDOS</th>
            <th colspan="16"style="text-align: center;background-color: #d6e9c6">CUENTAS POR COBRAR</th>
        </tr>
        <tr >
            <th>Fecha de Contratacion</th>
            <th nowrap>Fecha del primer <br>pago esperado</th>            
            <th>Activo</th>
            <th>Estatus</th>
            <th>RFC</th>   
            <th>Nombre</th> 
            <th>Contrato</th> 
            <th>Fondeador</th>
            <th>Intermediario</th>
            <th>Canal</th>
            <th>Sucursal</th>
            
            <th>Plazo Contratado</th>
            <th nowrap>Monto del <br>Credito Inicial </th>
            <th nowrap>Monto Pago <br>Total Quincenal </th>
            <th nowrap>Monto Total <br>a Pagar</th>
            
            <th nowrap>Monto Total <br>Pagado</th>
            <th nowrap>Monto de <br>Capital Pagado</th>
            <th nowrap>Monto de <br>Interes Pagado</th>
            <th nowrap>Monto de <br>IVA Pagado</th>
            <th nowrap>Pagos<br>Realizados</th>
            
            <th nowrap>Monto de <br>Capital Vencido</th>
            <th nowrap>Numero de <br>pagos</th>
            
            <th nowrap>Monto de Capital<br> por Pagar</th>
            <th nowrap>Numero de <br>pagos pendientes</th>
            <th nowrap>Saldo Actual<br> de Capital</th>
            <th nowrap>Periodo de tiempo<br> en activo</th>
            <th>Mora</th>
            <th>% de contraprestaci&oacute;n</th>
            <th nowrap>Cobro para pago <br>de la  contraprestacion</th>
            <th>Capital</th>
            <th>Intereses</th>
            <th>IVA</th>
            <th>Seguro</th>
            <th nowrap>Total Cobrado<br> en el mes</th>
            <th nowrap>% de contraprestacion<br> - Reserva</th>
            <th>Contraprestacion</th>
            <th>Iva contraprestacion</th>
            <th>Total contraprestacion</th>
        </tr>            
    </thead>
    <tbody>
        <?php //$filter = get_filter($this->lista); ?>        
    <?php if($arrInfo):?>
        <?php foreach($arrInfo as $pos => $row):?>
            <tr>
                <td><?php echo $row['fecha_contratacion']?></td>
                <td><?php echo $row['fecha_primerpago_esperado']?></td>
                <td><?php echo $row['activo']?></td>
                <td><?php echo $row['estatus']?></td>
                <td><?php echo $row['rfc']?></td>   
                <td><?php echo $row['nombre']?></td> 
                <td><?php echo $row['contrato']?></td> 
                <td><?php echo separar_sindicato($row['payroll_nombre'],'FONDEADOR')?></td>
                <td><?php echo separar_sindicato($row['payroll_nombre'],'INTERMEDIARIO')?></td>
                <td><?php echo separar_sindicato($row['payroll_nombre'],'CANAL')?></td>
                <td><?php echo separar_sindicato($row['payroll_nombre'],'SUCURSAL')?></td>
                
                <td><?php echo $row['plazo_contratado']?></td>
                <td><?php echo number_format($row['monto_credito_inicial'],2)?></td>
                <td><?php echo $row['monto_pago_total_quincenal']?></td>
                <td></td>
                
                <td><?php echo $row['monto_total_pagado']?></td>
                <td><?php echo $row['monto_capital_pagado']?></td>
                <td><?php echo $row['monto_interes_pagado']?></td>
                <td><?php echo $row['monto_iva_pagado']?></td>
                <td><?php echo $row['pagos_realizados']?></td>
                <td><?php echo $row['monto_capital_vencido']?></td>
                <td><?php echo $row['numero_pagos']?></td>
                <td><?php echo $row['monto_capital_por_pagar']?></td>
                <td><?php echo $row['numero_pagos_pendientes']?></td>
                <td><?php echo $row['saldo_actual_de_capital']?></td>
                <td><?php echo $row['periodo_tiempo_en_activo']?></td>
                <td><?php echo $row['mora']?></td>
                <td><?php echo $row['porcen_contraprestacion']?></td>
                <td><?php echo $row['cobro_para_pago_dela_contraprestacion']?></td>
                <td><?php echo $row['capital']?></td>
                <td><?php echo $row['intereses']?></td>
                <td><?php echo $row['iva']?></td>
                <td><?php echo $row['seguro']?></td>
                <td><?php echo $row['total_cobrado_enel_mes']?></td>
                <td><?php echo $row['porcen_contraprestacion_reserva']?></td>
                <td><?php echo $row['contraprestacion']?></td>
                <td><?php echo $row['iva_contraprestacion']?></td>
                <td><?php echo $row['total_contraprestacion']?></td>
            </tr>
        <?php endforeach;?>
    <?php else:?>
        <tr>
            <td colspan="37" style="text-align: center"> ** No se encontraron registros **</td>
        </tr>
    <?php endif;?>
    </tbody>
    </table>
    <?php echo form_close();?>    
    
    <?php echo $links?>
</div>

<script type="text/javascript"><!--
    function filter() {
        $('#form').submit();        
    }
    $('#form input').keydown(function(e) {
        if (e.keyCode == 13) filter();            
    });
    function borrar(id){
        if(confirm('Desea borrar el registro seleccionado?')){
            location = '<?php echo site_url("cat/canal/delete/?id=")?>'+id;
        }
        
    }
//--></script>
