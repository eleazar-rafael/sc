<ol class="breadcrumb" style="margin-bottom: 5px;">
    <li><a href="<?php echo site_url("cat/convenio/index")?>" title="Mostrar lista de convenios">CONVENIOS</a></li>
  <li><a href="<?php echo site_url("cat/convenio/update/?id=".$this->convenio['id'])?>" title="Editar el convenio"><?php echo $this->convenio['nombre']?></a></li>
  <li class="active">Calendario</li>
</ol>


<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="pull-left"><h4 ><span class="glyphicon glyphicon-th"></span> <?php echo $heading_title?></h4></div>
        <div class="pull-right">            
            <?php echo anchor("cat/convenio_calendario/insert",'<span class="glyphicon glyphicon-plus-sign"></span>  Agregar fecha','class="btn btn-primary title="Agregar fechas al calendario"')?> 
            <?php //echo anchor("cat/convenio/edit?id=".$this->convenio['id'],'<span class="glyphicon glyphicon-edit"></span>  Editar convenio','class="btn btn-primary " title="Editar el convenio"')?> 
            <?php //echo anchor("cat/convenio/index",'<span class="glyphicon glyphicon-chevron-left"></span>  Regresar','class="btn btn-primary " title="Regresar a la lista de convenios"' )?> 
        </div>
        <div style="clear: both;"></div>
    </div>
    <?php echo form_open("cat/convenio_calendario/index","id='form'")?>
    <table class="table table-bordered  table-striped table-hover">
    <thead>
        <tr >
            <th width="30">
                <?php $class_order = ($sort == 'id')? strtolower($order): ""?>
                <a href="<?php echo $sort_id; ?>" class="<?php echo $class_order?>">Id</a>
            </th>
            <th>
                <?php $class_order = ($sort == 'nombre')? strtolower($order): ""?>
                <a href="<?php echo $sort_nombre; ?>" class="<?php echo $class_order?>">Descripci&oacute;n</a>
            </th>            
            <th>
                <?php $class_order = ($sort == 'fecha_contratacion')? strtolower($order): ""?>
                <a href="<?php echo $sort_fecha_contratacion; ?>" class="<?php echo $class_order?>">Fecha contrataci&oacute;n del cr&eacute;dito</a>
            </th>
            <th>
                <?php $class_order = ($sort == 'fecha_entrega_al_convenio')? strtolower($order): ""?>
                <a href="<?php echo $sort_fecha_entrega_al_convenio; ?>" class="<?php echo $class_order?>">Fecha de entrega del <br>cr&eacute;dito al canal </a>
            </th>
            <th>
                <?php $class_order = ($sort == 'fecha_descuento_al_acreditado')? strtolower($order): ""?>
                <a href="<?php echo $sort_fecha_descuento_al_acreditado; ?>" class="<?php echo $class_order?>">Fecha programa del <br>descuento al acreditado</a>
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
            <td align="center"><input type="text" name="filter[fecha_contratacion]" value="<?php echo $filter['fecha_contratacion']?>" style="width:95%"></td>                
            <td align="center"><input type="text" name="filter[fecha_entrega_al_convenio]" value="<?php echo $filter['fecha_entrega_al_convenio']?>" style="width:95%"></td>
            <td align="center"><input type="text" name="filter[fecha_descuento_al_acreditado]" value="<?php echo $filter['fecha_descuento_al_acreditado']?>" style="width:95%"></td>            
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
                <td ><?php echo $row['fecha_contratacion']?></td>
                <td ><?php echo $row['fecha_entrega_al_canal']?></td>
                <td ><?php echo $row['fecha_descuento_al_acreditado']?></td>                
                <td><?php echo anchor("cat/convenio_calendario/update/?id=".$row['id'], '<span class="glyphicon glyphicon-edit"></span>','title="Editar Registro" class="btn btn-primary btn-xs"') ?></td>
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
            location = '<?php echo site_url("cat/convenio_calendario/delete/?id=")?>'+id;
        }
        
    }
//--></script>
