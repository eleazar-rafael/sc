<style>
    .header{height: 45px;}
    .header .logo{ margin-left: 10px; } 
    .menu-user{margin-right: 15px; margin-top: 5px;}
    .menu-user a{ color:#000; text-decoration: underline}
    .menu {
            background-color: #24466C;color: #fff; height: 60px; padding: 5px 15px;
        
            -webkit-border-top-left-radius: 10px;-webkit-border-top-right-radius: 10px;
                -moz-border-radius-topleft: 10px;-moz-border-radius-topright: 10px;
                border-top-left-radius: 10px;border-top-right-radius: 10px;}
    .menu a{color:#fff;}
    a.btn_menu{ display:block; float:right; margin-right: 7px; width: 97px; height: 19px; 
                color:#fff; padding-top:2px;  text-decoration: none; font-family:arial; font-size: 0.89em;                
              text-align: center; background: url(<?php echo base_url("public/images/btn_menu.gif")?>)}
    a.btn_menu:hover {background: url(<?php echo base_url("public/images/btn_menu_active.gif")?>)}
    a.active_menu{background: url(<?php echo base_url("public/images/btn_menu_active.gif")?>)}
    .sp_opcion{color:#B3CEFF}
</style>

<div class="header " ><?php //navbar navbar-fixed-top?>
    <div class="pull-left">
        <img class="logo" src="<?php echo base_url()?>public/images/logo_supplycredit.png" width="200" height="56" />
    </div>    
    <div class="menu-user pull-right">
        <?php echo anchor("app/logout","Salir del sistema")?>
    </div>
    <div style="clear:both;"></div>
</div>


<div style="border:solid 0px #efefef;margin-right: 15px; " >
    
    <a id="opcion_5" class="btn_menu <?php if($this->opmenu == 5) echo "active_menu" ?>" href="javascript:btn_menu(5);">Cobranza</a>
    <a id="opcion_4" class="btn_menu <?php if($this->opmenu == 4) echo "active_menu" ?>" href="javascript:btn_menu(4);">Reportes</a>
    <a id="opcion_3" class="btn_menu <?php if($this->opmenu == 3) echo "active_menu" ?>" href="javascript:btn_menu(3);">Contratos</a>    
    <a id="opcion_2" class="btn_menu <?php if($this->opmenu == 2) echo "active_menu" ?>" href="javascript:btn_menu(2);">Clientes</a>
    <a id="opcion_1" class="btn_menu <?php if($this->opmenu == 1) echo "active_menu" ?>" href="javascript:btn_menu(1);">Administraci&oacute;n</a>
    <?php /*<a class="btn_menu" href="#">Sistema</a> */?>        
    <div style="clear:both;"></div>
</div> 

<div class="menu" id="menu_1" style="<?php if($this->opmenu <> 1) echo "display:none" ?>">
    <span class="sp_opcion">[Administraci&oacute;n]</span>&nbsp;
    <?php echo anchor("cat/fondeador/index", "Fondeador")?>&nbsp; | &nbsp;
    <?php echo anchor("cat/intermediario/index", "Intermediario")?>&nbsp; | &nbsp;
    <?php echo anchor("cat/sucursal/index", "Sucursal")?>&nbsp; | &nbsp;
    <?php echo anchor("cat/vendedor/index", "Vendedor")?>&nbsp; | &nbsp;
    <?php echo anchor("cat/canal/index", "Canal")?>&nbsp; | &nbsp;
    <?php echo anchor("cat/convenio/index", "Convenio")?>&nbsp; | &nbsp;
    <?php echo anchor("cat/producto/index", "Producto")?>
    
</div>
<div class="menu" id="menu_2" style="<?php if($this->opmenu <> 2) echo "display:none" ?>">
    <span class="sp_opcion">[Clientes]</span>&nbsp;
    <?php echo anchor("cat/cliente/search", "Buscar")?>&nbsp; | &nbsp;
    <?php echo anchor("cat/cliente/insert", "Agregar")?>&nbsp; | &nbsp;
    <?php echo anchor("cat/cliente/view", "Trabajar con cliente")?>&nbsp; | &nbsp;
    <?php //echo anchor("cat/cliente/update", "Editar")?>
</div>

<div class="menu" id="menu_3" style="<?php if($this->opmenu <> 3) echo "display:none" ?>">
    <span class="sp_opcion">[Contratos]</span>
</div>
<div class="menu" id="menu_4" style="<?php if($this->opmenu <> 4) echo "display:none" ?>">
    <span class="sp_opcion">[Reportes]</span>
</div>
<div class="menu" id="menu_5" style="<?php if($this->opmenu <> 5) echo "display:none" ?>">
    <span class="sp_opcion">[Cobranza]</span>
</div>

<?php if(!$this->opmenu or $this->opmenu >5 ):?>
<div class="menu" id="menu" >
   [ ]
</div>
<?php endif;?>

<script>
    function btn_menu(op){
        $(".menu").hide();
        $("#menu_"+op).show();
        $(".btn_menu").removeClass("active_menu");
        $("#opcion_"+op).addClass("active_menu");
    }
</script>