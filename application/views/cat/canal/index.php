

<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="pull-left"><h4 ><span class="glyphicon glyphicon-th"></span> <?php echo $heading_title?></h4></div>
        <div class="pull-right">            
            <?php echo anchor("cat/canal/insert",'<span class="glyphicon glyphicon-plus-sign"></span>  Agregar','class="btn btn-primary "')?> 
        </div>
        <div style="clear: both;"></div>
    </div>
    <?php echo form_open("cat/canal/index","id='form'")?>
    <table class="table table-bordered  table-striped table-hover">
    <thead>
        <tr >
            <th width="30">
                <?php $class_order = ($sort == 'id')? strtolower($order): ""?>
                <a href="<?php echo $sort_id; ?>" class="<?php echo $class_order?>">Id</a>
            </th>
            <th>
                <?php $class_order = ($sort == 'nombre')? strtolower($order): ""?>
                <a href="<?php echo $sort_nombre; ?>" class="<?php echo $class_order?>">Nombre</a>
            </th>            
            <th>
                <?php $class_order = ($sort == 'titular')? strtolower($order): ""?>
                <a href="<?php echo $sort_titular; ?>" class="<?php echo $class_order?>">Titular</a>
            </th>
            <th>
                <?php $class_order = ($sort == 'contacto')? strtolower($order): ""?>
                <a href="<?php echo $sort_contacto; ?>" class="<?php echo $class_order?>">Contacto </a>
            </th>
            <th width="110">
                <?php $class_order = ($sort == 'fecha_firma_del_canal')? strtolower($order): ""?>
                <a href="<?php echo $sort_fecha_firma_del_canal; ?>" class="<?php echo $class_order?>">Fecha firma<br> del canal</a>
            </th>   
            <th width="110">
                <?php $class_order = ($sort == 'fecha_vencimiento')? strtolower($order): ""?>
                <a href="<?php echo $sort_fecha_vencimiento; ?>" class="<?php echo $class_order?>">Fecha de vencimiento</a>
            </th> 
            <th width="120">
                <?php $class_order = ($sort == 'fecha_limite_originacion')? strtolower($order): ""?>
                <a href="<?php echo $sort_fecha_limite_originacion; ?>" class="<?php echo $class_order?>">Fecha limite de originaci&oacute;n</a>
            </th> 
            <th>
                <?php $class_order = ($sort == 'frecuencia_pagos')? strtolower($order): ""?>
                <a href="<?php echo $sort_fecha_limite_originacion; ?>" class="<?php echo $class_order?>">Frecuencia<br>de pagos</a>
            </th>
            <th width="16" ></th>            
            <th width="16" ></th>
        </tr>            
    </thead>
    <tbody>
        <?php $filter = get_filter($this->lista); //class="odd"?>
        <tr >
            <td></td>
            <td align="center"><input type="text" name="filter[nombre]" value="<?php echo $filter['nombre']?>" style="width:95%"></td>
            <td align="center"><input type="text" name="filter[titular]" value="<?php echo $filter['titular']?>" style="width:95%"></td>                
            <td align="center"><input type="text" name="filter[contacto]" value="<?php echo $filter['contacto']?>" style="width:95%"></td>
            <td align="center"><input type="text" name="filter[fecha_firma_del_canal]" value="<?php echo $filter['fecha_firma_del_canal']?>" style="width:95%"></td>
            <td align="center"><input type="text" name="filter[fecha_vencimiento]" value="<?php echo $filter['fecha_vencimiento']?>" style="width:95%"></td>
            <td align="center"><input type="text" name="filter[fecha_limite_originacion]" value="<?php echo $filter['fecha_limite_originacion']?>" style="width:95%"></td>
            <td align="center"><input type="text" name="filter[frecuencia_pagos]" value="<?php echo $filter['frecuencia_pagos']?>" style="width:95%"></td>
            <td colspan="3" align="center">
                <button type="button"  class="btn btn-default btn-xs" onclick="filter()">
                    <span class="glyphicon glyphicon-search" title="Borrar Registro" ></span>
                </button>

            </td>                
        </tr>
    <?php if($arrInfo):?>
        <?php foreach($arrInfo as $pos => $row):?>
            <tr>
                <td class="cen"><?php echo $row['id']?></td>
                <td ><?php echo $row['nombre']?></td>
                <td ><?php echo $row['titular']?></td>
                <td ><?php echo $row['contacto']?></td>
                <td align="center"><?php echo $row['fecha_firma_del_canal']?></td>
                <td align="center"><?php echo $row['fecha_vencimiento']?></td>
                <td align="center"><?php echo $row['fecha_limite_originacion']?></td>
                <td ><?php echo $row['frecuencia_pagos_nombre']?></td>
                <td><?php echo anchor("cat/canal/update/?id=".$row['id'], '<span class="glyphicon glyphicon-edit"></span>','title="Editar Registro" class="btn btn-primary btn-xs"') ?></td>                
                <td><a href="javascript:;" onclick="borrar('<?php echo $row['id']?>');" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove" title="Borrar Registro" ></span></a></td>
            </tr>
        <?php endforeach;?>
    <?php else:?>
        <tr>
            <td colspan="11" style="text-align: center"> ** No se encontraron registros **</td>
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
