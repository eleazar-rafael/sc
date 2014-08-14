

<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="pull-left"><h4 ><span class="glyphicon glyphicon-th"></span> <?php echo $heading_title?></h4></div>
        <div class="pull-right">            
            <?php echo anchor("cat/vendedor/insert",'<span class="glyphicon glyphicon-plus-sign"></span>  Agregar','class="btn btn-primary "')?> 
        </div>
        <div style="clear: both;"></div>
    </div>
    <?php echo form_open("cat/vendedor/index","id='form'")?>
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
                <?php $class_order = ($sort == 'rfc')? strtolower($order): ""?>
                <a href="<?php echo $sort_rfc; ?>" class="<?php echo $class_order?>">Responsable </a>
            </th>
            <th >
                <?php $class_order = ($sort == 'porcen_ventas')? strtolower($order): ""?>
                <a href="<?php echo $sort_porcen_ventas; ?>" class="<?php echo $class_order?>">% Ventas</a>
            </th>            
            <th >
                <?php $class_order = ($sort == 'porcen_comision')? strtolower($order): ""?>
                <a href="<?php echo $sort_porcen_comision; ?>" class="<?php echo $class_order?>">% Comisi&oacute;n</a>
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
            <td align="center"><input type="text" name="filter[rfc]" value="<?php echo $filter['rfc']?>" style="width:95%"></td>                
            <td align="center"><input type="text" name="filter[porcen_ventas]" value="<?php echo $filter['porcen_ventas']?>" style="width:95%"></td>
            <td align="center"><input type="text" name="filter[porcen_comision]" value="<?php echo $filter['porcen_comision']?>" style="width:95%"></td>
            <td colspan="2" align="center">
                <button type="button"  class="btn btn-default btn-xs" onclick="filter()">
                    <span class="glyphicon glyphicon-search" title="Buscar" ></span>
                </button>

            </td>                
        </tr>
    <?php if($arrInfo):?>
        <?php foreach($arrInfo as $pos => $row):?>
            <tr>
                <td class="cen"><?php echo $row['id']?></td>
                <td ><?php echo $row['nombre']?></td>
                <td ><?php echo $row['rfc']?></td>
                <td ><?php echo $row['porcen_ventas']?></td>
                <td ><?php echo $row['porcen_comision']?></td>                
                <td><?php echo anchor("cat/vendedor/update/?id=".$row['id'], '<span class="glyphicon glyphicon-edit"></span>','title="Editar Registro" class="btn btn-primary btn-xs"') ?></td>
                <td><a href="javascript:;" onclick="borrar('<?php echo $row['id']?>');" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove" title="Borrar Registro" ></span></a></td>
            </tr>
        <?php endforeach;?>
    <?php else:?>
        <tr>
            <td colspan="7" style="text-align: center"> ** No se encontraron registros **</td>
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
            location = '<?php echo site_url("cat/vendedor/delete/?id=")?>'+id;
        }
        
    }
//--></script>
