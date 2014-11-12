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
        div.pagination{padding:0 0 10px 10px;}
        .pagination{margin:0px;}
    </style>    
    
</head>
<body>
    <div class="body">
        
        <?php $this->load->view("app/menu")?>

        
        <div class="principal">
            <?php echo $layout_content?>
        </div>
        
        
        
        <?php /*
        <table class="contenido">
        <tr>
            <?php  //CONTENIDO PRINCIPAL?>
            <td class="principal">
            
                
                <?php echo $layout_content?>
                
            </td>
            <?php  //BARRA LATERAL?>
            <td class="lateral"><?php $this->load->view("app/lateral")?></td>
            
        </tr>
        </table>*/?>
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
