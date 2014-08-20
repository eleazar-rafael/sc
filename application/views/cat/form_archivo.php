<style>
    td a{ text-decoration: underline; }
    td input[type=file]{ border: solid 1px #c0c0c0;  background: #fff; padding: 0px 5px;  width: 100%; display: inline;}
    td input[type=text]{ width: 100%}
</style>
<?php $max_archivo = 0;?>
<div style="padding-bottom: 10px;">
    Archivo de Expedientes &nbsp;&nbsp;&nbsp; 
    <button  type="button" class="btn btn-success" id="btn_archivo">
        <i class="glyphicon glyphicon-plus"></i> Agregar Archivo
    </button>
</div>

<table class="table table-striped" id="tbl_archivo" style="width:100%!important" border="0" >
<thead>
    <tr>
        <th></th>
        <th width="30%">Archivo</th>
        <th>Descripci&oacute;n</th>
    </tr>
</thead>
<tbody>
<?php $max_archivo = 0;?>
<?php if($arr_archivo):
        foreach($arr_archivo as $pos=> $row):
            $max_archivo++;
            //$row['max_imagen'] = $max_imagen;
            //$this->load->view("admin/serie/form_serie_image", $row);        
?>
    <tr>
        <td width="100">
            <input type="hidden" name="archivo_id[]" value="<?php echo $row['id']?>">
            <input type="checkbox" name ="archivo_borrado[<?php echo $row['id']?>]" value="<?php echo $row['id']?>"> Borrar
        </td>
        <td>
            <input type="file" name="archivo_nombre[]"  style="display: none;">
            <a href="<?php echo base_url("uploads/".$row['carpeta']."/".$row['nombre'])?>" target="_blank" ><?php echo $row['nombre_original']?></a>
        </td> 
        <td>
            <input type="text" name="archivo_titulo[]" value="<?php echo $row['titulo']?>"/> 
        </td>
    </tr>
    <?php endforeach;?>
<?php endif;?>
</tbody>
</table>
<script>
    max_archivo= parseInt("<?php echo (int)$max_archivo;?>")
    $("#btn_archivo").on("click", function(){        
        $('#tbl_archivo > tbody:last').append( tbl_row_archivo() );
    });
    
    function remover_archivo(row){
        $("#tr_archivo_"+row).remove();
    }
    
    function tbl_row_archivo(){        
        max_archivo++;
        var row = '<tr id="tr_archivo_'+max_archivo+'">'
                    +'<td width="100"><input type="hidden" name="archivo_id[]" value="">'
                       +'[<a href="javascript:remover_archivo('+max_archivo+');" class="remover">Remover</a>]'
                    +'</td>'   
                    +'<td>'
                       +'<input type="file" name="archivo_nombre[]"  >'                       
                    +'</td>'
                    +'<td>'
                        +'<input type="text" name="archivo_titulo[]" >'
                    +'</td>'
                  +'</tr>';              
       return row;
    }    

</script>




