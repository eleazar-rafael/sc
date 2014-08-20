<?php
class Archivo_model extends MY_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_data($id=""){
        $this->db->where("id",(int)$id);
        $this->db->where("ifnull(borrado, 0) = ",0);
        $query = $this->db->get("cat_archivo");
        return $query->row_array();
    }
        
    function get_data_list($tabla="", $tabla_id =0){
        $tabla_id = (int)$tabla_id;
        if($tabla and $tabla_id >0){
            $sql = "SELECT * FROM cat_archivo WHERE tabla = '".$tabla."' and tabla_id = $tabla_id and ifnull(borrado, 0)=0 order by id asc ";
            //echo $sql; 
            $query = $this->db->query($sql);
            return $query->result_array();
        }        
        return false;
    }
    

    function insert($post)
    {        
        if($post){
            $post['fecha_registro'] = date("Y-m-d H:i:s");            
            $this->db->insert("cat_archivo",$post);
            return  $this->db->insert_id();
        }        
    }
    
    function update($post){
        if(is_array($post)){
            $this->db->where("id",(int)$post['id']);
            $this->db->update("cat_archivo",$post);
            return true;            
        }
    }
    
    function delete($id){        
        $id = (int)$id;
        if($id >0 ){
            $post['borrado'] = 1;
            $this->db->where("id",$id);
            $this->db->update("cat_archivo",$post);
            return  $this->db->affected_rows();
        }        
    }
    
}