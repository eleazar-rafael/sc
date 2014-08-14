<?php
class sis_recurso_accion_model extends MY_Model{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get_list($recurso_id){
        $query = $this->db->query("SELECT * FROM sis_recurso_accion WHERE recurso_id = ".(int)$recurso_id);
        $accion = array();
        foreach($query->result_array() as $row){
            $accion[$row['accion']] = $row['accion'];
        }
        return $accion;
    }

    /*SE GUARDAN LAS ACCIONES DEL RECURSO
     */
    function chek_acciones($recurso_id, $arr_accion=array())
    {
        $recurso_id  = (int)$recurso_id;
	if($recurso_id > 0){
            $this->db->query("DELETE FROM sis_recurso_accion WHERE recurso_id = $recurso_id ");
            $post['recurso_id'] = $recurso_id;
            if($arr_accion)
                foreach($arr_accion as $kpos => $accion){
                    $post['accion'] = $accion;
                    $this->db->insert("sis_recurso_accion",$post);                    
                }
        }
    }    
}
