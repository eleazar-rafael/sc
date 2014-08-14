<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<!-- Apple devices fullscreen -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<!-- Apple devices fullscreen -->
	<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />
	
	<title>SupplyCredit - Login</title>
        <?php $path = base_url()."public/theme/flat/"?>
	<!-- Bootstrap -->
        <link rel="stylesheet" href="<?php echo $path?>css/bootstrap.css">
	<!-- Bootstrap responsive -->
	<link rel="stylesheet" href="<?php echo $path?>css/bootstrap-responsive.css">
	<!-- icheck -->
	<link rel="stylesheet" href="<?php echo $path?>css/plugins/icheck/all.css">
	<!-- Theme CSS -->
	<link rel="stylesheet" href="<?php echo $path?>css/style.css">
	<!-- Color CSS -->
	<link rel="stylesheet" href="<?php echo $path?>css/themes.css">


	<!-- jQuery -->
	<script src="<?php echo $path?>js/jquery.min.js"></script>
	
	<!-- Nice Scroll -->
	<script src="<?php echo $path?>js/plugins/nicescroll/jquery.nicescroll.min.js"></script>
	<!-- Validation -->
	<script src="<?php echo $path?>js/plugins/validation/jquery.validate.min.js"></script>
	<script src="<?php echo $path?>js/plugins/validation/additional-methods.min.js"></script>
	<!-- icheck -->
	<script src="<?php echo $path?>js/plugins/icheck/jquery.icheck.min.js"></script>
	<!-- Bootstrap -->
	<script src="<?php echo $path?>js/bootstrap.min.js"></script>
	<script src="<?php echo $path?>js/eakroko.js"></script>

	<!--[if lte IE 9]>
		<script src="<?php echo $path?>js/plugins/placeholder/jquery.placeholder.min.js"></script>
		<script>
			$(document).ready(function() {
				$('input, textarea').placeholder();
			});
		</script>
	<![endif]-->	

	<!-- Favicon -->	
        <link rel="shortcut icon" href="<?php echo base_url()?>public/images/favicon.ico" /> 
	<!-- Apple devices Homescreen icon -->
	<link rel="apple-touch-icon-precomposed" href="<?php echo $path?>img/apple-touch-icon-precomposed.png" />

</head>

<body class='login  theme-darkblue'>
	<div class="wrapper">
		<?php /*<h1><a href="index.html"><img src="<?php echo $path?>img/logo-big.png" alt="" class='retina-ready' width="59" height="49">FLAT</a></h1> */?>
		<div class="login-body">                        
			<h2 title="demo / supply2014"><img src="<?php echo base_url()?>public/images/logo_supplycredit_original.png" width="145"  style=""/> <br>Entrar al Sistema  </h2>
                        
			<?php /*<form action="index.html" method='get' class='form-validate' id="test"> */?>
                        <?php echo form_open("app/login","class='form-validate' id='frm-login'")?>    
				<div class="control-group">
					<div class="email controls">
						<input type="text" name='login[usuario]' placeholder="Nombre de Usuario" class='input-block-level' data-rule-required="true" data-rule-required="true">
					</div>
				</div>
				<div class="control-group">
					<div class="pw controls">
                                            <input type="password" name="login[contrasena]" placeholder="Contrase&ntilde;a" class='input-block-level' data-rule-required="true">
					</div>
				</div>
                               
				<div class="submit">
					<div class="remember">
						<input type="checkbox" name="remember" class='icheck-me' data-skin="square" data-color="blue" id="remember"> <label for="remember">Remember me</label>
					</div>
					<input type="submit" value="Entrar" class='btn btn-primary'>
                                        
				</div>
                                
			<?php echo form_close();?>
			<div class="forget">
                            <div style="margin-top: -20px; text-align: center; color: #9f9f9f; ">Cuenta: demo / supply2014</div>
                            <a href="#"><span>Olvid&oacute; su contrase&ntilde;a?</span></a>
			</div>
		</div>
	</div>
</body>

</html>
