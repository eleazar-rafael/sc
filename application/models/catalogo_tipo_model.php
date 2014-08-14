<?php
class catalogo_tipo_model extends MY_Model{
    var $lista= "catalogo_tipo";
    var $tabla= "catalogo_tipo";
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
       

    function get_list()
    {	
        $sql = "SELECT * FROM catalogo_tipo WHERE ifnull(borrado,0) = 0 order by id asc ";        
        $query = $this->db->query($sql);
        return $query->result_array();
    }


    function insert($post)
    {
	if(isset($post['nombre'])){
            $this->db->insert($this->tabla,$post);
            $id = $this->db->insert_id();

            //if(!$this->db->_error_message()) $this->add_track("catalogo_tipo", $id, $post, "insert" );
            return  $id;
        }
    }

    function update($post)
    {
        if(is_array($post)){
            $this->db->where("id",(int)$post['id']);
            $this->db->update($this->tabla,$post);

            if(!$this->db->_error_message()){
                //$this->add_track("catalogo_tipo", $post['id'], $post, "update");
                return true;
            }
        }
    }


}
