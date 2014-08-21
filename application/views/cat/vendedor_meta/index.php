<script>
    $(function() {
        $(".spinner" ).spinner({min:0}); 
    })
    function agregar(){
        location = '<?php echo site_url("cat/vendedor_meta/insert/?anio=")?>'+$("#anio").val();
    }
</script>
<ol class="breadcrumb" style="margin-bottom: 5px;">
    <li><a href="<?php echo site_url("cat/vendedor/index")?>" title="Mostrar lista de vendedores">VENDEDORES</a></li>
  <li><a href="<?php echo site_url("cat/vendedor/update/?id=".$this->vendedor['id'])?>" title="Editar el vendedor"><?php echo $this->vendedor['nombre']?></a></li>
  <li class="active">Metas</li>
</ol>

<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="pull-left"><h4 ><span class="glyphicon glyphicon-th"></span> <?php echo $heading_title?></h4></div>
        <div class="pull-right">            
            <?php //echo anchor("cat/vendedor_meta/insert",'<span class="glyphicon glyphicon-plus-sign"></span>  Agregar','class="btn btn-primary "')?> 
        </div>
        <div style="clear: both;"></div>
    </div>
    <div style="padding: 15px 0px;border-bottom: solid 1px #d0d0d0; text-align: center">
        <strong>A&ntilde;o: </strong>&nbsp;
        <input type="text" name="anio" value="<?php echo date("Y")?>" id="anio" size="2" class="spinner">
        
        <button type="button" class="btn btn-info btn-sm " onclick="agregar()">
            <span class="glyphicon glyphicon-pencil"></span> Agregar / Editar
        </button>
        
    </div>
    <table class="table table-bordered  table-striped table-hover">
    <thead>
        <tr >
            <th width="30"></th>
            <th width="60">
                A&ntilde;o
            </th>
            <th>
                Metas
            </th>
        </tr>            
    </thead>
    <tbody>        
    <?php if($arrInfo):?>
        <?php foreach($arrInfo as $anio => $row):?>
        <tr>
            <td> 
            <?php echo anchor("cat/vendedor_meta/update/?anio=".$anio, '<span class="glyphicon glyphicon-edit"></span>','title="Editar metas del a&ntilde;o" class="btn btn-primary btn-xs"') ?>
            </td>
            <td><a href="<?php echo site_url("cat/vendedor_meta/update/?anio=".$anio)?>" title="Editar metas del a&ntilde;o"><?php echo $anio;?></a></td>
            <td>
            <?php foreach(cbo_mes_abreviado() as $mes_id => $mes): $meta= isset($row[$mes_id])? number_format((double)$row[$mes_id],0) : ""; ?>
                <?php if($meta):?>
                <span class="label label-default"><?php echo $mes.": ".$meta; ?></span>                
                <?php endif;?>
            <?php endforeach;?>
            </td>
        </tr>
        <?php endforeach; ?>
    <?php else:?>
        <tr>
            <td colspan="3" style="text-align: center"> ** No se encontraron registros **</td>
        </tr>
    <?php endif;?>
    </tbody>
    </table>
    
</div>

<?php //pre($arrInfo)?>