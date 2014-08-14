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
    echo script_tag("public/jquery_ui_1.11/external/jquery/jquery.js");
    echo script_tag("public/jquery_ui_1.11/jquery-ui.js");
    
    //LIBRERIAS BOOTSTRAP    
    echo link_tag("public/theme/default/bootstrap/css/bootstrap.css");
    echo link_tag("public/theme/default/bootstrap/css/bootstrap-theme.css");
    echo script_tag("public/theme/default/bootstrap/js/bootstrap.js");
    
    //LIBRERIAS DATATABLE    
    //echo link_tag("public//datatables_1.10.1/media/css/jquery.dataTables.min.css");
    echo script_tag("public/datatables_1.10.1/media/js/jquery.dataTables.min.js");
    
    //OTRAS LIBREIRAS
    echo $css;
    echo $script;
?>
    
</head>
<body>        
    
    <div role="" class="navbar navbar-fixed-top" style="">
        <img style="padding: 5px; position: absolute" src="<?php echo base_url()?>public/images/logo_supplycredit_original.png" width="200"  /> 
        <div style="height: 45px; background: #fff;">
                
            
        </div>
      
      <div class="container-fluid">
          <?php /*
        <div class="navbar-header">
          <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="#" class="navbar-brand">Project name</a>
        </div> */?>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Inicio</a></li>
            <li class="active"><a href="#">Clientes</a></li>
            <li><a href="#">Administracion</a></li>
            <li><a href="#">Contratos</a></li>
            <li><a href="#">Reportes</a></li>
            <li><a href="#">Cobranza</a></li>
          </ul>          
        </div>
      </div> 
        
        <div class="menu" style="background-color: #24466C;color: #fff; height: 60px; ">
            AQUI VA EL MENU
        </div>
    </div> 
    
    <div class="container-fluid"  >
        <div class="row">        
            <div class="col-md-10  main" style="border: solid 0px red;margin-top:85px;">

              <?php echo $layout_content?>
            </div>
            <div class="col-md-2  sidebar" >

              LADO IZQUIERDO DE LA PANTALLA.. 
            </div>
        </div>
    </div>    
    
    <script>
        $(document).ready(function() {
               
                
        });
        
    </script>
    
    
    
    
    
    
    
</body>
</html>
