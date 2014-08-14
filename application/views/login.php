<style>
    body{font-family: arial;  }
    body, td{ font-size: 13px;}
    #menu{display:none;}
    .login { width: 600px;   margin: 0 auto; margin-top:6%;  }
    .error {color:red;}
    .login-title {padding: 10px; background-color: #24466C; color:#fff;border-bottom: none; font-size:115%; 
                 text-align: center; }
    .login-content {padding: 10px 25px; border: 1px solid #c0c0c0;}
</style>
<html>
    <head>
        
    </head>
    <body>
        
    

    <div class="login">
        <div class="login-title">
            Supply Credit
        </div>
        <div class="login-content">

            <?php if($error_warning) echo "<div class='error'>$error_warning</div>"; ?>
            <?php echo form_open("app/login")?>
            <table border="0" width="100%">
                <tr>
                    <td width="150">Usuario</td>
                    <td>
                        <?php echo form_input("login[usuario]",null, 'style="width:80%;"')?>
                    </td>
                </tr>
                <tr>
                    <td>Contrase&ntilde;a</td>
                    <td>
                        <?php echo form_password("login[contrasena]",null, 'style="width:80%;"')?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>                
                        <button type="submit" class="button gray" >Entrar</button>&nbsp;                

                    </td>
                </tr>        
            </table>
            <?php form_close();?>
        </div>
    </div>
</body>
</html>        