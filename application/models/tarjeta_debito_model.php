<?php
class tarjeta_debito_model extends MY_Model{
    var $lista= "tarjeta_debito";
    var $tabla= "cat_tarjeta_debito";
    
    function __construct(){
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_data($id=0){
        $query =  $this->db->where(array('ifnull(borrado,0)'=>0,'id'=>(int)$id ))->get($this->tabla);
        return $query->row_array();
    }
            
    function get_data_list($cliente_id = 0){        
        $query =  $this->db->where(array('ifnull(borrado,0)'=>0,'cliente_id'=>(int)$cliente_id ))->get($this->tabla);        
        return $query->result_array(); 
    }

    function insert($post)
    {        
        if($post){            
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
            
    function get_cbo_banco($opInicial =""){
        return $this->get_cbo("Banks", "Id as id, Name as nombre", array('Name!='=>'""','ifnull(Active,0)'=>1), "Name", $opInicial);
    }
}