
<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="pull-left"><h4 ><span class="glyphicon glyphicon-th"></span> <?php echo $heading_title?></h4></div>
        <div class="pull-right">            
            <?php //echo anchor("cat/canal/insert",'<span class="glyphicon glyphicon-plus-sign"></span>  Agregar','class="btn btn-primary "')?> 
        </div>
        <div style="clear: both;"></div>
    </div>
    <?php echo form_open("cat/sepomex/index","id='form'")?>
    <table class="table table-bordered  table-striped table-hover">
    <thead>
        <tr >
            <th width="30" title="C&oacute;digo Postal asentamiento">
                <?php $class_order = ($sort == 'd_codigo')? strtolower($order): ""?>
                <a href="<?php echo $sort_d_codigo; ?>" class="<?php echo $class_order?>">d_codigo</a>
            </th>
            <th title="Nombre asentamiento">
                <?php $class_order = ($sort == 'd_asenta')? strtolower($order): ""?>
                <a href="<?php echo $sort_d_asenta; ?>" class="<?php echo $class_order?>">d_asenta</a>
            </th>     
            <th title="Tipo de asentamiento (Cat&aacute;logo SEPOMEX)">
                <?php $class_order = ($sort == 'd_tipo_asenta')? strtolower($order): ""?>
                <a href="<?php echo $sort_d_tipo_asenta; ?>" class="<?php echo $class_order?>">d_tipo_asenta</a>
            </th>
            <th title="Nombre Municipio">
                <?php $class_order = ($sort == 'd_mnpio')? strtolower($order): ""?>
                <a href="<?php echo $sort_d_mnpio; ?>" class="<?php echo $class_order?>">d_mnpio </a>
            </th>
            <th title="Nombre Entidad">
                <?php $class_order = ($sort == 'd_estado')? strtolower($order): ""?>
                <a href="<?php echo $sort_d_estado; ?>" class="<?php echo $class_order?>">d_estado</a>
            </th>   
            <th title="Nombre Ciudad">
                <?php $class_order = ($sort == 'd_ciudad')? strtolower($order): ""?>
                <a href="<?php echo $sort_d_ciudad; ?>" class="<?php echo $class_order?>">d_ciudad</a>
            </th> 
            <th title="Clave Entidad">
                <?php $class_order = ($sort == 'c_estado')? strtolower($order): ""?>
                <a href="<?php echo $sort_c_estado; ?>" class="<?php echo $class_order?>">c_estado</a>
            </th> 
            
            <th title="Clave Tipo de asentamiento">
                <?php $class_order = ($sort == 'c_tipo_asenta')? strtolower($order): ""?>
                <a href="<?php echo $sort_c_estado; ?>" class="<?php echo $class_order?>">c_tipo_asenta</a>
            </th>
            <th title="Clave Municipio">
                <?php $class_order = ($sort == 'c_mnpio')? strtolower($order): ""?>
                <a href="<?php echo $sort_c_mnpio; ?>" class="<?php echo $class_order?>">c_mnpio</a>
            </th>
            <th title="Identificador &uacute;nico del asentamiento">
                <?php $class_order = ($sort == 'id_asenta_cpcons')? strtolower($order): ""?>
                <a href="<?php echo $sort_id_asenta_cpcons; ?>" class="<?php echo $class_order?>">id_asenta_cpcons</a>
            </th>
            <th title="Zona en la que se ubica el asentamiento">
                <?php $class_order = ($sort == 'd_zona')? strtolower($order): ""?>
                <a href="<?php echo $sort_d_zona; ?>" class="<?php echo $class_order?>">d_zona</a>
            </th>            
        </tr>            
    </thead>
    <tbody>
        <?php $filter = get_filter($this->lista); //class="odd"?>
        <tr >            
            <td align="center"><input type="text" name="filter[d_codigo]" value="<?php echo $filter['d_codigo']?>" style="width:95%"></td>
            <td align="center"><input type="text" name="filter[d_asenta]" value="<?php echo $filter['d_asenta']?>" style="width:95%"></td>                
            <td align="center"><input type="text" name="filter[d_tipo_asenta]" value="<?php echo $filter['d_tipo_asenta']?>" style="width:95%"></td>                
            <td align="center"><input type="text" name="filter[d_mnpio]" value="<?php echo $filter['d_mnpio']?>" style="width:95%"></td>
            <td align="center"><input type="text" name="filter[d_estado]" value="<?php echo $filter['d_estado']?>" style="width:95%"></td>
            <td align="center"><input type="text" name="filter[d_ciudad]" value="<?php echo $filter['d_ciudad']?>" style="width:95%"></td>
            <td align="center"><input type="text" name="filter[c_estado]" value="<?php echo $filter['c_estado']?>" style="width:95%"></td>
            <td align="center"><input type="text" name="filter[c_tipo_asenta]" value="<?php echo $filter['c_tipo_asenta']?>" style="width:95%"></td>
            <td align="center"><input type="text" name="filter[c_mnpio]" value="<?php echo $filter['c_mnpio']?>" style="width:95%"></td>
            <td align="center"><input type="text" name="filter[id_asenta_cpcons]" value="<?php echo $filter['id_asenta_cpcons']?>" style="width:95%"></td>
            <td align="center"><input type="text" name="filter[d_zona]" value="<?php echo $filter['d_zona']?>" style="width:95%"></td>            
        </tr>
    <?php if($arrInfo):?>
        <?php foreach($arrInfo as $pos => $row):?>
            <tr>                
                <td ><?php echo $row['d_codigo']?></td>
                <td ><?php echo $row['d_asenta']?></td>
                <td ><?php echo $row['d_tipo_asenta']?></td>
                <td ><?php echo $row['d_mnpio']?></td>
                <td ><?php echo $row['d_estado']?></td>
                <td ><?php echo $row['d_ciudad']?></td>
                <td ><?php echo $row['c_estado']?></td>
                <td ><?php echo $row['c_tipo_asenta']?></td>
                <td ><?php echo $row['c_mnpio']?></td>
                <td ><?php echo $row['id_asenta_cpcons']?></td>
                <td ><?php echo $row['d_zona']?></td>
                
            </tr>
        <?php endforeach;?>
    <?php else:?>
        <tr>
            <td colspan="11" style="text-align: center"> ** No se encontraron registros **</td>
        </tr>
    <?php endif;?>
    </tbody>
    </table>
        
    <?php echo $links?>
    <?php echo form_close();?>    
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
