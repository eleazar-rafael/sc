
<?php echo $gcrud->output?>


<script>
    function btn_borrar(id){
        if(confirm('Desea borrar el registo seleccionado?')){
            location = '<?php echo site_url("sis/recurso/delete")?>/'+id;
        }
    }
</script>