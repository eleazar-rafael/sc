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
    
    <style>
        .navbar{ margin-bottom: 0;   min-height: 0!important; background: #24466C}
    </style>
    
</head>
<body>        
    
    
    <div role="" class="" style="height: 120px;">
        <img style="padding: 5px; position: absolute" src="<?php echo base_url()?>public/images/logo_supplycredit.png" width="200"  /> 
        
    </div> 
    <div role="navigation" class="navbar navbar-inverse ">
      
        <div class="navbar-header">
          <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="#" class="navbar-brand">Bootstrap theme</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li class="dropdown">
              <a data-toggle="dropdown" class="dropdown-toggle" href="#">Dropdown <span class="caret"></span></a>
              <ul role="menu" class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      
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
