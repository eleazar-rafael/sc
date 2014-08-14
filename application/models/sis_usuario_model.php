<?php
class sis_usuario_model extends MY_Model{
    
    public function __construct() {
        parent::__construct();
        
    }  
    
    function get_data($id)
    {
        $query = $this->db->query("SELECT * FROM sis_usuario WHERE id = '".(int)$id."' and ifnull(borrado,0) = 0 ");
        return $query->row_array();
    }
        
    function insert($post)
    {
	if(isset($post['nombre'])){
            $this->db->insert("sis_usuario",$post);
            $id = $this->db->insert_id();

            if(!$this->db->_error_message()) $this->add_track("sis_usuario", $id, $post, "insert" );
            return  $id;
        }
    }

    function update($post)
    {
        if(is_array($post)){
            $this->db->where("id",(int)$post['id']);
            $this->db->update("sis_usuario",$post);

            if($this->db->affected_rows() > 0 ){
                $this->add_track("sis_usuario", $post['id'], $post, "update");
                return true;
            }
        }
    }
    
    function delete($id)
    {
        $post['borrado'] = 1;
        $this->db->where("id",(int)$id);
	$this->db->update("sis_usuario", $post );
        $affected = $this->db->affected_rows();

        if($affected) $this->add_track("sis_usuario", $id, $post, "delete");

	return $affected;
    }
    
    public function get_user($username="",$password=""){
        $sql ="SELECT id, nombre, username, email, perfil_id FROM sis_usuario WHERE username='".$username."' AND password='".$password."'";
       
        $query = $this->db->query($sql);
        return $query->row_array(); 
    }
    
    function get_exist_new($username){
						
        $sql ="SELECT id  FROM sis_usuario WHERE username='".$username."' AND  ifnull(borrado,0)=0 ";
        //echo $sql; 

        $query = $this->db->query($sql);
        if($query->num_rows() > 0){
                return true;
        }

        return false;	
    }

    function get_exist_update($id, $username){

        $sql ="SELECT id FROM sis_usuario WHERE username = '$username' AND id NOT IN('".$id."') AND  ifnull(borrado,0)=0 ";

        $query = $this->db->query($sql);
        if($query->num_rows() > 0 ){
                return true;
        }
        return false;
    }
    
}
