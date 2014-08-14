<?php
class convenio_tipo_empleado_model extends MY_Model{
    var $lista= "cat_convenio_tipo_empleado";
    var $tabla= "cat_convenio_tipo_empleado";
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
       

    function get_list($convenio_id = 0)
    {	
        $sql = "SELECT * FROM ".$this->tabla." WHERE convenio_id = ".(int)$convenio_id;
        $query = $this->db->query($sql);
        
        $arrInfo = array();
        if($query->num_rows > 0){
            foreach($query->result_array() as $row) $arrInfo[$row['tipo_empleado']] = $row['tipo_empleado'];
        }
        
        return $arrInfo;
        //return $query->result_array();
    }


    function insert($post)
    {
	if(isset($post['convenio_id'])){
            $this->db->insert($this->tabla,$post);
            $id = $this->db->insert_id();
            
            return  $id;
        }
    }
    
    function clean($convenio_id = 0){
        if($convenio_id > 0){
            $sql ="delete from  ".$this->tabla." where convenio_id = $convenio_id";
            $this->db->query($sql);
        }        
    }

}
