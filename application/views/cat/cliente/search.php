<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="panel panel-primary">
    <div class="panel-heading"><span class="glyphicon glyphicon-search"></span>&nbsp; <?php echo $heading_title?></div>
    <div class="panel-body"> 

<?php echo form_open("cat/cliente/search","id='form_filter' class='form-horizontal' role='form'" );?>
        <?php $filter = get_filter($this->lista); //class="odd"?>
        
        <div class="form-group">
            <label for="nombre" class="col-md-2 control-label">Numero Cliente</label>
            <div class="col-md-1">
                <?php echo form_input("filter[id]", $filter['id']," id='id' class='form-control'" )?>            
            </div>
        </div>
        <div class="form-group">
            <label for="nombre" class="col-md-2 control-label">Nombre</label>
            <div class="col-md-4">
                <?php echo form_input("filter[nombre]", $filter['nombre']," id='nombre' class='form-control'" )?>            
            </div>
        </div>
        <div class="form-group">
            <label for="apellido_paterno" class="col-md-2 control-label">Apellido paterno</label>
            <div class="col-md-4">
                <?php echo form_input("filter[apellido_paterno]", $filter['apellido_paterno']," id='apellido_paterno' class='form-control' " )?>            
            </div>
        </div>
        <div class="form-group">
            <label for="apellido_materno" class="col-md-2 control-label">Apellido materno</label>
            <div class="col-md-4">
                <?php echo form_input("filter[apellido_materno]", $filter['apellido_materno']," id='apellido_materno' class='form-control' " )?>   
            </div>
        </div>
        
        <div class="form-group">
            <label for="rfc" class="col-md-2 control-label">RFC</label>
            <div class="col-md-2">
                <?php echo form_input("filter[rfc]", $filter['rfc']," id='rfc'  class='form-control' " ) ?>
            </div>
            
        </div>
        <div class="form-group">
            <label for="curp" class="col-md-2 control-label">CURP</label>
            <div class="col-md-2">
                <?php echo form_input("filter[curp]", $filter['curp']," id='curp' class='form-control' " ) ?>
            </div>
            <div class="col-md-2" style="text-align: right">
                <button type="submit" name="btn_filter" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> &nbsp;Buscar</button>
            </div>
        </div>                    
    <?php echo form_close()?>
        
    </div>    
    
    
    
    
    
    <table class="table table-bordered  table-striped table-hover">
    <thead>
        <tr >
            <th width="70">
                <?php $class_order = ($sort == 'id')? strtolower($order): ""?>
                <a href="<?php echo $sort_id; ?>" class="<?php echo $class_order?>">Cliente</a>
            </th>
            <th>
                <?php $class_order = ($sort == 'apellido_paterno')? strtolower($order): ""?>
                <a href="<?php echo $sort_apellido_paterno; ?>" class="<?php echo $class_order?>">Apellido paterno </a>
            </th>
            <th>
                <?php $class_order = ($sort == 'apellido_materno')? strtolower($order): ""?>
                <a href="<?php echo $sort_apellido_materno; ?>" class="<?php echo $class_order?>">Apellido materno </a>
            </th>
            <th>
                <?php $class_order = ($sort == 'nombre')? strtolower($order): ""?>
                <a href="<?php echo $sort_nombre; ?>" class="<?php echo $class_order?>">Nombre</a>
            </th>
            <th>
                <?php $class_order = ($sort == 'rfc')? strtolower($order): ""?>
                <a href="<?php echo $sort_rfc; ?>" class="<?php echo $class_order?>">RFC</a>
            </th>
            <th>
                <?php $class_order = ($sort == 'curp')? strtolower($order): ""?>
                <a href="<?php echo $sort_curp; ?>" class="<?php echo $class_order?>">CURP</a>
            </th>            
            <th width="16" ></th> 
        </tr>            
    </thead>
    <tbody>        
    <?php if($arrInfo):?>
        <?php foreach($arrInfo as $pos => $row):?>
            <tr>
                <td class="cen"><?php echo $row['Id']?></td>
                <td ><?php echo $row['LastName']?></td>
                <td ><?php echo $row['LastNameTwo']?></td>
                <td ><?php echo $row['FirstName']?></td>
                <td ><?php echo $row['RFC']?></td>
                <td ><?php echo $row['CURP']?></td>
                <td><?php echo anchor("cat/cliente/view/?id=".$row['Id'], '<span class="glyphicon glyphicon-zoom-in"></span>','title="Detalles del Cliente" class="btn btn-primary btn-xs"') ?></td>                
            </tr>
        <?php endforeach;?>
    <?php else:?>
        <tr>
            <td colspan="7" style="text-align: center"> ** No se encontraron registros **</td>
        </tr>
    <?php endif;?>
    </tbody>
    </table>
    
    <?php echo $links?>
    
</div>        