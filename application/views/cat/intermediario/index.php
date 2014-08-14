

<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="pull-left"><h4 ><span class="glyphicon glyphicon-th"></span> <?php echo $heading_title?></h4></div>
        <div class="pull-right">            
            <?php echo anchor("cat/intermediario/insert",'<span class="glyphicon glyphicon-plus-sign"></span>  Agregar','class="btn btn-primary "')?> 
        </div>
        <div style="clear: both;"></div>
    </div>
    <?php echo form_open("cat/intermediario/index","id='form'")?>
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
                <?php $class_order = ($sort == 'num_escritura')? strtolower($order): ""?>
                <a href="<?php echo $sort_num_escritura; ?>" class="<?php echo $class_order?>">Escritura </a>
            </th>
            <th >
                <?php $class_order = ($sort == 'apoderado_legal')? strtolower($order): ""?>
                <a href="<?php echo $sort_apoderado_legal; ?>" class="<?php echo $class_order?>">Apoderado Legal</a>
            </th>
            <th >
                <?php $class_order = ($sort == 'rfc')? strtolower($order): ""?>
                <a href="<?php echo $sort_rfc; ?>" class="<?php echo $class_order?>">RFC</a>
            </th>
            <th>
                <?php $class_order = ($sort == 'contacto_canal')? strtolower($order): ""?>
                <a href="<?php echo $sort_contacto_canal; ?>" class="<?php echo $class_order?>">Contacto Canal</a>
            </th>
            <th>
                <?php $class_order = ($sort == 'tiempo_entrega_expediente')? strtolower($order): ""?>
                <a href="<?php echo $sort_tiempo_entrega_expediente; ?>" class="<?php echo $class_order?>">Entrega de expediente</a>
            </th>
            <th>
                <?php $class_order = ($sort == 'contrato')? strtolower($order): ""?>
                <a href="<?php echo $sort_tiempo_entrega_contrato; ?>" class="<?php echo $class_order?>">Contrato</a>
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
            <td align="center"><input type="text" name="filter[num_escritura]" value="<?php echo $filter['num_escritura']?>" style="width:95%"></td>                
            <td align="center"><input type="text" name="filter[apoderado_legal]" value="<?php echo $filter['apoderado_legal']?>" style="width:95%"></td>
            <td align="center"><input type="text" name="filter[rfc]" value="<?php echo $filter['rfc']?>" style="width:95%"></td>
            <td align="center"><input type="text" name="filter[contacto_canal]" value="<?php echo $filter['contacto_canal']?>" style="width:95%"></td>
            <td align="center"><input type="text" name="filter[tiempo_entrega_expediente]" value="<?php echo $filter['tiempo_entrega_expediente']?>" style="width:95%"></td>
            <td align="center"><input type="text" name="filter[contrato]" value="<?php echo $filter['contrato']?>" style="width:95%"></td>
            
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
                <td ><?php echo $row['num_escritura']?></td>
                <td ><?php echo $row['apoderado_legal']?></td>
                <td ><?php echo $row['rfc']?></td>
                <td ><?php echo $row['contacto_canal']?></td>
                <td ><?php echo $row['tiempo_entrega_expediente']?></td>
                <td ><?php echo $row['contrato']?></td>
                <td><?php echo anchor("cat/intermediario/update/?id=".$row['id'], '<span class="glyphicon glyphicon-edit"></span>','title="Editar Registro" class="btn btn-primary btn-xs"') ?></td>
                <td><a href="javascript:;" onclick="borrar('<?php echo $row['id']?>');" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove" title="Borrar Registro" ></span></a></td>
            </tr>
        <?php endforeach;?>
    <?php else:?>
        <tr>
            <td colspan="10" style="text-align: center"> ** No se encontraron registros **</td>
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
            location = '<?php echo site_url("cat/intermediario/delete/?id=")?>'+id;
        }
        
    }
//--></script>
