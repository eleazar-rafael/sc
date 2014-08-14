<!doctype html>
<html lang="es">
<head> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!-- Apple devices fullscreen -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <!-- Apple devices fullscreen -->
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />	
    <title>Supply Credit - Administrador</title>

<?php 
    echo link_tag("public/theme/default/css/default.css");
    
    //LIBRERIAS JQUERY-UI
    echo link_tag("public/jquery_ui_1.11/jquery-ui.min.css");
    //echo script_tag("public/jquery_ui_1.11/external/jquery/jquery.js");
    echo script_tag("public/js/jquery-1.11.1.min.js");
    echo script_tag("public/jquery_ui_1.11/jquery-ui.js");
    
    //LIBRERIAS BOOTSTRAP    
    echo link_tag("public/theme/default/bootstrap/css/bootstrap.css");
    echo link_tag("public/theme/default/bootstrap/css/bootstrap-theme.css");
    echo script_tag("public/theme/default/bootstrap/js/bootstrap.js");
    
    //LIBRERIAS BOOTSTRAP VALIDATOR
    echo link_tag("public/theme/default/bootstrapvalidator_0.5.0/dist/css/bootstrapValidator.css");
    echo script_tag("public/theme/default/bootstrapvalidator_0.5.0/dist/js/bootstrapValidator.js");
    
    //LIBRERIAS BOOTSTRAP MASK INPUT
    echo link_tag("public/theme/default/jasny-bootstrap/css/jasny-bootstrap.min.css");
    echo script_tag("public/theme/default/jasny-bootstrap/js/jasny-bootstrap.js");
    
    //LIBRERIAS DATATABLE    
    //echo link_tag("public//datatables_1.10.1/media/css/jquery.dataTables.min.css");
    //echo script_tag("public/datatables_1.10.1/media/js/jquery.dataTables.min.js");
    
    //OTRAS LIBREIRAS
    echo $css;
    echo $script;
?>
    
    <style>
        
        
    </style>    
    
</head>
<body>
    <div class="body">
        
        <?php $this->load->view("app/menu")?>

        <table class="contenido">
        <tr>
            <?php  //CONTENIDO PRINCIPAL?>
            <td class="principal">
            <?php if ($error_warning): ?>
                <p class="well-sm bg-danger text-warning" ><span class="glyphicon glyphicon-warning-sign"></span>&nbsp; <?php echo $error_warning; ?>
                    <button type="button" class="close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                </p>                
            <?php endif ?>
            <?php if ($success): ?>
                <p class="well-sm bg-success text-success"><span class="glyphicon glyphicon-ok"></span>&nbsp; <?php echo $success; ?>
                    <button type="button" class="close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                </p>
            <?php endif; ?>
                
                <?php echo $layout_content?>            
                
            </td>
            <?php //BARRA LATERAL?>
            <td class="lateral"><?php $this->load->view("app/lateral")?></td>
        </tr>
        </table>
        <div class="footer">
            <?php $this->load->view("app/footer")?>
        </div>
    </div>    
    <script>
    $(document).ready(function() {
        
        $(".close ").on('click', function(event) {            
            $(this).parent().remove();
        });
    });
        
    </script>
     
</body>
</html>
