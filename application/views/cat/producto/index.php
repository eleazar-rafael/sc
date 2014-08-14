
<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="pull-left"><h4 ><span class="glyphicon glyphicon-th"></span> <?php echo $heading_title?></h4></div>
        <div class="pull-right">            
            <?php echo anchor("cat/producto/insert",'<span class="glyphicon glyphicon-plus-sign"></span>  Agregar','class="btn btn-primary "')?> 
        </div>
        <div style="clear: both;"></div>
    </div>
    <?php echo form_open("cat/producto/index","id='form'")?>
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
                <?php $class_order = ($sort == 'monto_minimo_prestamo')? strtolower($order): ""?>
                <a href="<?php echo $sort_monto_minimo_prestamo; ?>" class="<?php echo $class_order?>">Monto m&iacute;nimo del prestamo </a>
            </th>
            <th >
                <?php $class_order = ($sort == 'monto_maximo_prestamo')? strtolower($order): ""?>
                <a href="<?php echo $sort_monto_maximo_prestamo; ?>" class="<?php echo $class_order?>">Monto m&aacute;ximo del prestamo</a>
            </th>   
            <th >
                <?php $class_order = ($sort == 'tipo_comision')? strtolower($order): ""?>
                <a href="<?php echo $sort_tipo_comision; ?>" class="<?php echo $class_order?>">Tipo de comisi&oacute;n</a>
            </th> 
            <th >
                <?php $class_order = ($sort == 'comision_apertura')? strtolower($order): ""?>
                <a href="<?php echo $sort_comision_apertura; ?>" class="<?php echo $class_order?>">Comisi&oacute;n apertura fija</a>
            </th> 
            <th>
                <?php $class_order = ($sort == 'porcen_comision_apertura')? strtolower($order): ""?>
                <a href="<?php echo $sort_porcen_comision_apertura; ?>" class="<?php echo $class_order?>">Comision apertura %</a>
            </th>
            <th>
                <?php $class_order = ($sort == 'financiamiento_comision')? strtolower($order): ""?>
                <a href="<?php echo $sort_financiamiento_comision; ?>" class="<?php echo $class_order?>">Financiamiento Comisi&oacute;n</a>
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
            <td align="center"><input type="text" name="filter[monto_minimo_prestamo]" value="<?php echo $filter['monto_minimo_prestamo']?>" style="width:95%"></td>                
            <td align="center"><input type="text" name="filter[monto_maximo_prestamo]" value="<?php echo $filter['monto_maximo_prestamo']?>" style="width:95%"></td>
            <td align="center"><input type="text" name="filter[tipo_comision]" value="<?php echo $filter['tipo_comision']?>" style="width:95%"></td>
            <td align="center"><input type="text" name="filter[comision_apertura]" value="<?php echo $filter['comision_apertura']?>" style="width:95%"></td>
            <td align="center"><input type="text" name="filter[porcen_comision_apertura]" value="<?php echo $filter['porcen_comision_apertura']?>" style="width:95%"></td>
            <td align="center"><input type="text" name="filter[financiamiento_comision]" value="<?php echo $filter['financiamiento_comision']?>" style="width:95%"></td>
            <td colspan="2" align="center">
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
                <td ><?php echo $row['monto_minimo_prestamo']?></td>
                <td ><?php echo $row['monto_maximo_prestamo']?></td>
                <td align="center"><?php echo $row['tipo_comision_nombre']?></td>
                <td align="center"><?php echo $row['comision_apertura']?></td>
                <td align="center"><?php echo $row['porcen_comision_apertura']?></td>
                <td ><?php echo $row['financiamiento_comision']?></td>
                <td><?php echo anchor("cat/producto/update/?id=".$row['id'], '<span class="glyphicon glyphicon-edit"></span>','title="Editar Registro" class="btn btn-primary btn-xs"') ?></td>                
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
            location = '<?php echo site_url("cat/producto/delete/?id=")?>'+id;
        }
        
    }
//--></script>
