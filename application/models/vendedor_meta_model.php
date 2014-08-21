<?php
class vendedor_meta_model extends MY_Model{     
    var $tabla= "cat_vendedor_metas";
    
    function __construct(){
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_data($id=0){
        $query =  $this->db->where(array('id'=>(int)$id ))->get($this->tabla) ;        
        return $query->row_array();
    }
            
    function get_data_list($vendedor_id=0, $anio = ""){
                
        $sql = "SELECT * FROM ".$this->tabla." WHERE vendedor_id = ".(int)$vendedor_id." ";
        if( (int)$anio > 0 and strlen($anio)==4) $sql .= " and anio = $anio ";
        $sql .= "ORDER BY anio desc, mes asc";
        $query = $this->db->query($sql);
        $arrInfo = array();
        if($query->num_rows > 0)
            foreach($query->result_array() as $row){
                $arrInfo[$row['anio']][$row['mes']] =  $row['meta'];
            }
        
        return $arrInfo;
    }
    
    function clean($vendedor_id, $anio ){
        $this->db->where(array("vendedor_id" =>(int)$vendedor_id, "anio"=>(int)$anio) );
        $this->db->delete($this->tabla);
    }

    function insert($post)
    {        
        if($post){            
            $this->db->insert($this->tabla,$post);
            //return  $this->db->insert_id();
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
      
    }
        
}