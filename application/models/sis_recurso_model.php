<?php
class sis_recurso_model extends MY_Model{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get_data($id)
    {
        $query = $this->db->query("SELECT * FROM sis_recurso WHERE id = '".(int)$id."' and ifnull(borrado,0) = 0 ");
        return $query->row_array();
    }
    
    function insert($post)
    {
	if(isset($post['nombre'])){
            $this->db->insert("sis_recurso",$post);
            $id = $this->db->insert_id();

            //if(!$this->db->_error_message()) $this->add_track("sis_recurso", $id, $post, "insert" );
            return  $id;
        }
    }

    function update($post)
    {
        if(is_array($post)){
            $this->db->where("id",(int)$post['id']);
            $this->db->update("sis_recurso",$post);

            if($this->db->affected_rows() > 0 ){
                //$this->add_track("sis_recurso", $post['id'], $post, "update");
                return true;
            }
        }
    }

    function delete($id)
    {
        $post['borrado'] = 1;
        $this->db->where("id",(int)$id);
	$this->db->update("sis_recurso", $post );        
        //echo "QUERY: ".$this->db->last_query();
        $affected = $this->db->affected_rows();

        //if($affected) $this->add_track("sis_recurso", $id, $post, "delete");

	return $affected;
    }
    
    function cbo_recurso($op_ini="",$omitir=""){
        $swhere = ($omitir)? " and id not in($omitir) " :"";        
        $query = $this->db->query("SELECT id, nombre, orden FROM sis_recurso WHERE ifnull(borrado,0) = 0 $swhere ORDER BY orden, nombre asc");
        $cbo = array();
        if($op_ini) $cbo[0] = $op_ini;
        if($query->num_rows)
            foreach($query->result_array() as $pos => $row){
                $cbo[$row['id']] = $row['orden']." - ".$row['nombre'];
            }
        
        return $cbo;        
    }
    
    function cbo_recurso_padre(){
        
    }
    
    function get_opciones(){
        $sql="SELECT * FROM sis_recurso WHERE ifnull(borrado,0) = 0 order by orden ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    function json_arr_acciones($acciones=""){
        $json_accion = array();
        if($acciones) $json_accion = (array)json_decode($acciones);
        $arr_accion = array();
        if($json_accion) foreach($json_accion as $val) $arr_accion[$val] = $val;
        return $arr_accion;
    }
}
