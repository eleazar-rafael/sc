<?php
class canal_intermediario_model extends MY_Model{
    var $lista= "cat_canal_intermediario";
    var $tabla= "cat_canal_intermediario";
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get_data($id)
    {        
        $query =  $this->db->where(array('ifnull(borrado,0)'=>0,'id'=>(int)$id ))->get($this->tabla) ;
        return $query->row_array();
    }      

    function get_list($canal_id = 0)
    {	
        $sql = "SELECT * FROM ".$this->tabla." WHERE canal_id = ".(int)$canal_id;
        $query = $this->db->query($sql);
        
        $arrInfo = array();
        if($query->num_rows > 0){
            foreach($query->result_array() as $row) $arrInfo[$row['intermediario_id']] = $row['intermediario_id'];
        }
        
        return $arrInfo;        
    }


    function insert($post)
    {
	if(isset($post['canal_id'])){
            $this->db->insert($this->tabla,$post);
            $id = $this->db->insert_id();
            
            return  $id;
        }
    }
    
    function clean($canal_id = 0){
        if($canal_id > 0){
            $sql ="delete from  ".$this->tabla." where canal_id = $canal_id";
            $this->db->query($sql);
        }        
    }

}
