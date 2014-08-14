<?php
class contacto_model extends MY_Model{
    var $lista= "contacto";
    var $tabla= "cat_contacto";
    
    function __construct(){
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_data($id=0){
        $query =  $this->db->where(array('ifnull(borrado,0)'=>0,'id'=>(int)$id ))->get($this->tabla) ;        
        return $query->row_array();
    }
    
    function get_data_list($tabla="", $tabla_id = 0){
        $sql = "SELECT * FROM ".$this->tabla." WHERE ifnull(borrado,0)=0  and tabla = '".$tabla."' and tabla_id = ".(int)$tabla_id;                    
        $query = $this->db->query($sql);
        return $query->result_array();             
    }
    
    function get_data_por_tipo($tabla="", $tabla_id = 0){
        $arrContacto = $this->get_data_list($tabla, $tabla_id);
        $arrInfo = null;
        if($arrContacto){
            foreach($arrContacto as $row){
                $arrInfo[$row['tipo_contacto']][] = $row;
            }
        }
        return $arrInfo;
    }
    
    function insert($post)
    {        
        if($post){            
            $post['fecha_alta'] = date("Y-m-d H:i:s"); 
            $this->db->insert($this->tabla,$post);
            return  $this->db->insert_id();
        }        
    }
    
    function update($post)
    {
        if(is_array($post)){           
            $this->db->where("id",(int)$post['id']);
            $this->db->update($this->tabla,$post);
            return true;            
        }
    }
    
    function delete($id){
        $id = (int)$id;
        if($id >0 ){
            $post['borrado'] = 1;
            $this->db->where("id",(int)$id);
            $this->db->update($this->tabla,$post);
            $affected = $this->db->affected_rows();

            return $affected;
        }
    }
        
}