<div class="page-header">
        <div class="pull-left">
                <h1><?php echo $titulo?></h1>
        </div>
        
        <div class="pull-right">
            
            <?php //if($success):?>
            
            <?php //endif;?>
            <img src="<?php echo base_url()?>public/images/logo_supplycredit_original.png" width="145" />            
        </div>
</div>
<div class="breadcrumbs">
        <ul>
                <li>
                        <a href="">Home</a>
                        <i class="icon-angle-right"></i>
                </li>
                <li>
                        <a href="">Modulo</a>
                        <i class="icon-angle-right"></i>
                </li>
                <li>
                        <a href=""><?php echo $titulo?></a>
                </li>
        </ul>
        <div class="close-bread">
                <a href="#">
                        <i class="icon-remove"></i>
                </a>
        </div>
</div>

<?php if($success):?>
    <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Correcto!!</strong>&nbsp; <?php echo $success?>
    </div>
<?php endif;?>

<?php if($error_warning):?>
    <div class="alert alert-error">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Cuidado!!</strong>&nbsp; <?php echo $error_warning?>
    </div>
<?php endif;?>