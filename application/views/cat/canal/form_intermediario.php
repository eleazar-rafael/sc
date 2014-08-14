<style>
    .seleccionado td{background: yellowgreen !important;}
</style>
<?php //pre($cbo_intermediario)?>

<div style="height: 250px; overflow: auto; border: solid 1px #d0d0d0;width:420px;">
    <table class="table table-bordered table-hover" style="width:400px;" >
    <thead>
        <tr >
            <th width="30">                
                <input type="checkbox" class="select-all" >
            </th>
            <th>Intermediario</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($cbo_intermediario as $int_id=> $nombre):
                $checked = ($chk_intermediario[$int_id] == $int_id) ? "checked": "";
                $class = "";
                if($checked) $class = "seleccionado";
            ?>
        <tr id="tr_<?php echo $int_id?>" class="<?php echo $class?>">
            <td>
                <input type="checkbox" class="chk_intermediario" name="intermediario[]" value="<?php echo $int_id?>" <?php echo $checked?>>
            </td>
            <td><?php echo $nombre?></td>
        </tr>
        <?php endforeach;?>
    </tbody>
    </table>
</div>


<script>
    $(function() {
        $(".select-all").on("click", function() {
            $(".chk_intermediario").prop("checked", $(this).prop("checked")); //SELECCIONA TODOS LOS CHECK BOX
            $('.chk_intermediario').each(function () { // ASIGNA LA CLASE AL TR, PARA PINTAR EL SELECCIONADO
                trCheckbox( $(this).val(), $(this).is(':checked') );
             });
        });
        
        $(".chk_intermediario").on("click", function(){            
            trCheckbox( $(this).val(), $(this).is(':checked') );
        })
    });
    
    function trCheckbox(id, ischecked){
        if( ischecked ){
            $("#tr_"+id ).addClass('seleccionado');                
        }else{
            $("#tr_"+id ).removeClass('seleccionado');                
        }
    }
    

</script>