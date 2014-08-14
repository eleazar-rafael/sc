<div class="toolwindow" id="toolwindow">
    <div class="tooltext" id="tooltext">
        <table style="border:0;" class="main">
        <tbody>
            <tr class="title">
                <td>Buscar Cliente</td>
            </tr>
        <tr>
            <td>
                <div align="left" style="margin-top: 10px;">
                    <form name="formab" method="POST" action="?">
                    Nombre(s):<br>
                    <?php //onblur="this.className = 'textenabled';" onfocus="this.className = 'textactive';" class="textenabled" onkeydown="cambiobusca();" onchange="cambiobusca();" ?>
                    <input type="text" id="enameb" name="enameb[]" style="width:200px;">

                    Primer Apellido:<br>
                    <?php //onblur="this.className = 'textenabled';" onfocus="this.className = 'textactive';" class="textenabled" onkeydown="cambiobusca();" onchange="cambiobusca();" ?>
                    <input type="text" size="30" id="efirstab" name="efirstab[]" style="width:200px;">

                    Segundo Apellido:<br>
                    <?php //onblur="this.className = 'textenabled';" onfocus="this.className = 'textactive';" class="textenabled" onkeydown="cambiobusca();" onchange="cambiobusca();" ?>
                    <input type="text" size="30" id="esecondab" name="esecondab[]" style="width:200px;">

                    RFC:<br>
                    <?php //onblur="this.className = 'textenabled';" onfocus="this.className = 'textactive';" class="textenabled" onkeydown="cambiobusca();" onchange="cambiobusca();" ?>
                    <input type="text" size="30" id="erfc" name="erfc[]" style="width:200px;">
                    </form>

                    <form onsubmit="return false;" method="POST" action="?">
                    <table class="t" style="margin-top: 20px;">
                        <tbody>
                        <tr>
                            <td><div class="title izq">Contrato No:</div></td>
                            <td>
                                <input type="text" onkeypress="if(event.keyCode==13)$('btn_buscar_contrato').click();" onblur="this.className = 'textenabled';" onfocus="this.className = 'textactive';" class="textenabled" size="5" id="contractId" name="contractId[]"> 
                                <input type="button" style="width:30px;" id="btn_buscar_contrato" onclick="cambiobuscacontract();" value="Ir">
                            </td>		
                        </tr>
                        <tr>
                            <td style="height: 5px;"></td>
                        </tr>
                        <tr>
                            <td><div class="title izq">Cliente No:</div></td>
                            <td>			
                                <input type="text" onkeypress="if(event.keyCode==13)$('btn_buscar_cliente').click();" onblur="this.className = 'textenabled';" onfocus="this.className = 'textactive';" class="textenabled" size="5" id="clienteId" name="clienteId[]"> 
                                <input type="button" style="width:30px;" id="btn_buscar_cliente" onclick="" value="Ir"><?php //cambiobuscaclient();?>
                            </td>		
                        </tr>
                        </tbody>
                    </table>
                    </form>
                </div>

                <div class="title" style="margin-top: 15px;">Ir al &Uacute;ltimo:</div>
                <span>
                    <center>[<a href="###">Cliente</a>] <?php /*?>[<a href="it_menu.php">Bien</a>]<? */?>
                    
                    </center>
                </span>        
                <div class="resultbar" id="results2">

                </div>
            </td>
        </tr>
        </tbody>
        </table> 
    </div>    
</div>