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

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo $flat_dir?>css/bootstrap.css">
    <!-- Bootstrap responsive -->
    <link rel="stylesheet" href="<?php echo $flat_dir?>css/bootstrap-responsive.css">
    <!-- jQuery UI -->
    <?php /*<link rel="stylesheet" href="<?php echo $flat_dir?>css/plugins/jquery-ui/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo $flat_dir?>css/plugins/jquery-ui/smoothness/jquery.ui.theme.css"> */?>
    
    <?php foreach($gcrud->css_files as $file): ?>
        <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />   
    <?php endforeach; ?>
    
    
    <?php /*
    <!-- dataTables -->
	<link rel="stylesheet" href="<?php echo $flat_dir?>css/plugins/datatable/TableTools.css">
    <!-- PageGuide -->
    <link rel="stylesheet" href="<?php echo $flat_dir?>css/plugins/pageguide/pageguide.css">
    <!-- Fullcalendar -->
    <link rel="stylesheet" href="<?php echo $flat_dir?>css/plugins/fullcalendar/fullcalendar.css">
    <link rel="stylesheet" href="<?php echo $flat_dir?>css/plugins/fullcalendar/fullcalendar.print.css" media="print">
    <!-- chosen -->
    <link rel="stylesheet" href="<?php echo $flat_dir?>css/plugins/chosen/chosen.css">
        
    <!-- Tagsinput -->
    <link rel="stylesheet" href="<?php echo $flat_dir?>css/plugins/tagsinput/jquery.tagsinput.css">
    <!-- multi select -->
    <link rel="stylesheet" href="<?php echo $flat_dir?>css/plugins/multiselect/multi-select.css">
    <!-- timepicker -->
    <link rel="stylesheet" href="<?php echo $flat_dir?>css/plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- colorpicker -->
    <link rel="stylesheet" href="<?php echo $flat_dir?>css/plugins/colorpicker/colorpicker.css">
    <!-- Datepicker -->
    <link rel="stylesheet" href="<?php echo $flat_dir?>css/plugins/datepicker/datepicker.css">
    <!-- Daterangepicker -->
    <link rel="stylesheet" href="<?php echo $flat_dir?>css/plugins/daterangepicker/daterangepicker.css">
    <!-- Plupload -->
    <link rel="stylesheet" href="<?php echo $flat_dir?>css/plugins/plupload/jquery.plupload.queue.css"> 
    
    <!-- select2 -->
    <link rel="stylesheet" href="<?php echo $flat_dir?>css/plugins/select2/select2.css">
    <!-- icheck -->
    <link rel="stylesheet" href="<?php echo $flat_dir?>css/plugins/icheck/all.css">*/?>
    <!-- Theme CSS -->
    <link rel="stylesheet" href="<?php echo $flat_dir?>css/style.css">
    <!-- Color CSS -->
    <link rel="stylesheet" href="<?php echo $flat_dir?>css/themes.css"> 
       
    <?php echo $css;?>
    
    <!-- jQuery -->
    <?php if(!$gcrud->js_files):?>
        <?php /*<script src="<?php echo $flat_dir?>js/jquery.min.js"></script>*/?>
        <?php echo script_tag("public/js/jquery-1.8.2.min.js") ?>
    <?php else: ?>
        <?php foreach($gcrud->js_files as $file): ?> 
            <script src="<?php echo $file; ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>    

    <!-- Nice Scroll -->
    <script src="<?php echo $flat_dir?>js/plugins/nicescroll/jquery.nicescroll.min.js"></script>
    <!-- imagesLoaded -->
	<?php /*<script src="<?php echo $flat_dir?>js/plugins/imagesLoaded/jquery.imagesloaded.min.js"></script> */?>
    <!-- jQuery UI -->
    <script src="<?php echo $flat_dir?>js/plugins/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="<?php echo $flat_dir?>js/plugins/jquery-ui/jquery.ui.widget.min.js"></script>
    <script src="<?php echo $flat_dir?>js/plugins/jquery-ui/jquery.ui.mouse.min.js"></script>
    <script src="<?php echo $flat_dir?>js/plugins/jquery-ui/jquery.ui.draggable.min.js"></script>
    <script src="<?php echo $flat_dir?>js/plugins/jquery-ui/jquery.ui.resizable.min.js"></script>
    <script src="<?php echo $flat_dir?>js/plugins/jquery-ui/jquery.ui.sortable.min.js"></script>
    <script src="<?php echo $flat_dir?>js/plugins/jquery-ui/jquery.ui.spinner.js"></script>
    <script src="<?php echo $flat_dir?>js/plugins/jquery-ui/jquery.ui.slider.js"></script> <?php /**/?>
    
    
    <!-- Touch enable for jquery UI -->
    <script src="<?php echo $flat_dir?>js/plugins/touch-punch/jquery.touch-punch.min.js"></script>
    <!-- slimScroll -->
    <script src="<?php echo $flat_dir?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo $flat_dir?>js/bootstrap.min.js"></script>
    <!-- vmap -->
    <?php /*
    <script src="<?php echo $flat_dir?>js/plugins/vmap/jquery.vmap.min.js"></script>
    <script src="<?php echo $flat_dir?>js/plugins/vmap/jquery.vmap.world.js"></script>
    <script src="<?php echo $flat_dir?>js/plugins/vmap/jquery.vmap.sampledata.js"></script> */?>
    <!-- Bootbox -->
    <?php /*<script src="<?php echo $flat_dir?>js/plugins/bootbox/jquery.bootbox.js"></script> */?>
    <!-- Flot -->
    <?php /*
    <script src="<?php echo $flat_dir?>js/plugins/flot/jquery.flot.min.js"></script>
    <script src="<?php echo $flat_dir?>js/plugins/flot/jquery.flot.bar.order.min.js"></script>
    <script src="<?php echo $flat_dir?>js/plugins/flot/jquery.flot.pie.min.js"></script>
    <script src="<?php echo $flat_dir?>js/plugins/flot/jquery.flot.resize.min.js"></script>
    */?>
    <?php /*
    <!-- imagesLoaded -->
    <script src="<?php echo $flat_dir?>js/plugins/imagesLoaded/jquery.imagesloaded.min.js"></script>
    <script src="<?php echo $flat_dir?>js/plugins/maskedinput/jquery.maskedinput.min.js"></script>
    <!-- TagsInput -->
    <script src="<?php echo $flat_dir?>js/plugins/tagsinput/jquery.tagsinput.min.js"></script>
    <!-- Datepicker -->
    <script src="<?php echo $flat_dir?>js/plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Daterangepicker -->
    <script src="<?php echo $flat_dir?>js/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="<?php echo $flat_dir?>js/plugins/daterangepicker/moment.min.js"></script>
    <!-- Timepicker -->
    <script src="<?php echo $flat_dir?>js/plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <!-- Colorpicker -->
    <script src="<?php echo $flat_dir?>js/plugins/colorpicker/bootstrap-colorpicker.js"></script>
    <!-- PageGuide -->
    <script src="<?php echo $flat_dir?>js/plugins/pageguide/jquery.pageguide.js"></script>
    <!-- FullCalendar -->
    <script src="<?php echo $flat_dir?>js/plugins/fullcalendar/fullcalendar.min.js"></script>
    <!-- Chosen -->
    <script src="<?php echo $flat_dir?>js/plugins/chosen/chosen.jquery.min.js"></script>
    <!-- select2 -->
    <script src="<?php echo $flat_dir?>js/plugins/select2/select2.min.js"></script>
    <!-- icheck -->
    <script src="<?php echo $flat_dir?>js/plugins/icheck/jquery.icheck.min.js"></script> */?>

    <?php /*
    <!-- MultiSelect -->
    <script src="<?php echo $flat_dir?>js/plugins/multiselect/jquery.multi-select.js"></script>
    <!-- CKEditor -->
    <script src="<?php echo $flat_dir?>js/plugins/ckeditor/ckeditor.js"></script>
    <!-- PLUpload -->
    <script src="<?php echo $flat_dir?>js/plugins/plupload/plupload.full.js"></script>
    <script src="<?php echo $flat_dir?>js/plugins/plupload/jquery.plupload.queue.js"></script>
    <!-- Custom file upload -->
    <script src="<?php echo $flat_dir?>js/plugins/fileupload/bootstrap-fileupload.min.js"></script>
    <script src="<?php echo $flat_dir?>js/plugins/mockjax/jquery.mockjax.js"></script>
    <!-- complexify -->
    <script src="<?php echo $flat_dir?>js/plugins/complexify/jquery.complexify-banlist.min.js"></script>
    <script src="<?php echo $flat_dir?>js/plugins/complexify/jquery.complexify.min.js"></script>
    <!-- Mockjax -->
    <script src="<?php echo $flat_dir?>js/plugins/mockjax/jquery.mockjax.js"></script>  */?>
    
    <!-- dataTables -->
   <?php /* <script src="<?php echo $flat_dir?>js/plugins/datatable/jquery.dataTables.min.js"></script>
    <script src="<?php echo $flat_dir?>js/plugins/datatable/TableTools.min.js"></script>
    <script src="<?php echo $flat_dir?>js/plugins/datatable/ColReorderWithResize.js"></script>
    <script src="<?php echo $flat_dir?>js/plugins/datatable/ColVis.min.js"></script>
    <script src="<?php echo $flat_dir?>js/plugins/datatable/jquery.dataTables.columnFilter.js"></script>
    <script src="<?php echo $flat_dir?>js/plugins/datatable/jquery.dataTables.grouping.js"></script>
    */?>
    <!-- Theme framework -->
    <script src="<?php echo $flat_dir?>js/eakroko.min.js"></script>
    <!-- Theme scripts -->
    <script src="<?php echo $flat_dir?>js/application.min.js"></script>
    <!-- Just for demonstration -->
    <script src="<?php echo $flat_dir?>js/demonstration.min.js"></script>

    <!--[if lte IE 9]>
            <script src="<?php echo $flat_dir?>js/plugins/placeholder/jquery.placeholder.min.js"></script>
            <script>
                    $(document).ready(function() {
                            $('input, textarea').placeholder();
                    });
            </script>
    <![endif]-->
    <?php echo $script;?>
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url()?>public/images/favicon.ico" /> 
    <!-- Apple devices Homescreen icon -->
    <link rel="apple-touch-icon-precomposed" href="<?php echo $flat_dir?>img/apple-touch-icon-precomposed.png" />
    
    <style>
        .alert{margin-bottom:0px!important}
        #navigation #brand { /*float: left; color: #fff; font-size: 20px; margin-top: 9px; padding-right: 69px; padding-left: 35px;
                            padding-bottom: 2px;*/
                            padding-left: 5px; 
                            padding-right: 25px;
                            /*margin-top: 5px; padding-left: 14px;*/
                            background:none; /*#FFF;*/
                           
        }
    </style>
</head>
<body class="theme-darkblue" data-theme="theme-darkblue">
    
    <?php $this->load->view("admin/menu");?>
    <div class="container-fluid" id="content">
        <?php $this->load->view("admin/submenu")?>
        <div id="main">
            <div class="container-fluid">
                <?php $this->load->view("admin/titulo")?>
                <?php //pre($gcrud->js_files,'---js_files---')?>
                <?php echo $layout_content?>
                
            </div>    
        </div>    
    </div>
    <script>
        $(document).ready(function() {
               
                //hideNav();
        });
        
    </script>
</body>
</html>
