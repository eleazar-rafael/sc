<?php $tb = (int)$_GET['tb'];?>
<script>
    $(function() {
        $( "#tabs" ).tabs({           
            active: <?php echo ($tb > 0)? $tb-1 : 0; ?>
        });
    });
    
</script>
<style>
    #tbl_view td{ font-size: 12px;}
    #tbl_view th{text-align: right; font-size: 12px; padding: 4px}
    
</style>
<?php $heading_title = "Informaci&oacute;n del cliente"?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="pull-left">
            <h4><span class="glyphicon glyphicon-pencil"></span>&nbsp; <?php echo $heading_title?></h4>
        </div>
        <div class="pull-right">            
            <?php //echo anchor("cat/cliente/update?id=".$cliente['id'],'<span class="glyphicon glyphicon-edit"></span>  Editar cliente','class="btn btn-default "')?> 
            
            
            <div class="btn-group">
                <a href="<?php echo site_url("cat/cliente/update?id=".$cliente['id'])?>" class="btn btn-default"><span class="glyphicon glyphicon-edit"></span>  Editar</a>            
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="###<?php //echo site_url("cat/contrato/insert")?>"><span class="glyphicon glyphicon-briefcase"></span>&nbsp; Agregar Prestamo</a></li>
                    <li><a href="<?php echo site_url("cat/direccion_cliente/insert")?>"><span class="glyphicon glyphicon-home"></span>&nbsp; Agregar Direcci&oacute;n</a></li>
                    <li><a href="<?php echo site_url("cat/contacto_cliente/insert")?>"><span class="glyphicon glyphicon-phone-alt"></span>&nbsp; Agregar Contacto</a></li>
                    <li><a href="###<?php //echo site_url("cat/empleo/insert")?>"><span class="glyphicon glyphicon-wrench"></span>&nbsp; Agregar Empleo</a></li>
                    <li><a href="<?php echo site_url("cat/tarjeta_debito/insert")?>"><span class="glyphicon glyphicon-credit-card"></span>&nbsp; Agregar Tarjeta Debito</a></li>
                    <li><a href="<?php echo site_url("cat/referencia/insert")?>"><span class="glyphicon glyphicon-link"></span>&nbsp; Agregar referencia</a></li>                    
              </ul>
          </div>
            
            
            
            
        </div>
        <div style="clear: both;"></div>
    </div>
    <?php /*<div class="panel-body"> */?>
        <table class="table" id="tbl_view">
            <tr>
                <th width="140">Numero del cliente</th>
                <td >
                    <?php echo $cliente['id']?>
                </td>
                <th width="160">Nacionalidad</th>
                <td>
                    <?php echo $cbo_nacionalidad[$cliente['nacionalidad']]?>
                </td>
            </tr>
            <tr>
                <th>Nombre de cliente</th>
                <td>
                    <?php echo $cliente['apellido_paterno']." ".$cliente['apellido_materno'].", ".$cliente['nombre']?>
                </td>
                <th >Fecha Nacimiento</th>
                <td>
                    <?php echo $cliente['fecha_nacimiento']?>
                </td>
            </tr>
            <tr>
                <th>Sexo</th>
                <td >
                    <?php switch ($cliente['sexo']){
                        case 'H': echo "Hombre"; break;
                        case 'M': echo "Mujer"; break;
                    } ?>
                </td>
                <th >Estado Civil</th>
                <td>
                    <?php echo $cbo_estadocivil[$cliente['estado_civil']]?>
                </td>
            </tr>
            <tr>
                <th>Regimen Fiscal</th>
                <td ><?php echo $cbo_regimenfiscal[$cliente['regimen_fiscal']]?></td>
                <th>Regimen Patrimonial</th>
                <td>
                    <?php echo $cbo_regimenpatrimonial[$cliente['regimen_patrimonial']]?>
                </td>
            </tr>
            <tr>
                <th>RFC</th>
                <td ><?php echo $cliente['rfc']?></td>
                <th>Idenficacion</th>
                <td>
                    <?php echo $cbo_tipo_identificacion[$cliente['tipo_identificacion']]." "?>
                    <?php if($cliente['numero_identificacion']) echo " Numero: ".$cliente['numero_identificacion']?>
                </td>
            </tr>
            <tr>
                <th>CURP</th>
                <td ><?php echo $cliente['curp']?></td>
                <th>Max grado de estudio</th>
                <td><?php echo $cbo_maximo_gradoestudio[$cliente['maximo_grado_estudio']]?></td>
            </tr>
        </table>
    
        <?php //echo form_open($action,"id='form_cliente' class='form-horizontal' role='form'" );?>        
        <?php //echo form_close()?>

    <?php /*</div>*/?>
    
    
    <div id="tabs">
            <ul>
              <li><a href="#tab-1">Prestamos</a></li>              
              <li><a href="#tab-2">Direcciones</a></li>
              <li><a href="#tab-3">Contactos</a></li>
              <li><a href="#tab-4">Empleos</a></li>
              <li><a href="#tab-5">Tarjeta Debito</a></li>
              <li><a href="#tab-6">Referencias</a></li>
              
              
            </ul>
            <div id="tab-1">
                <?php $this->load->view("cat/cliente/index_contrato")?>
            </div>            
            <div id="tab-2">
                <?php $this->load->view("cat/cliente/index_direccion")?>
            </div>
            <div id="tab-3">
                <?php $this->load->view("cat/cliente/index_contacto")?>
            </div>
            <div id="tab-4">
                <?php $this->load->view("cat/cliente/index_empleo")?>                
            </div>
            <div id="tab-5">
                <?php $this->load->view("cat/cliente/index_tarjeta_debito")?>                
            </div>
            <div id="tab-6">
                <?php $this->load->view("cat/cliente/index_referencia")?>                
            </div>
    </div>  
    
    
</div> 

<?php //pre($cliente)?>