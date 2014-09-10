<?php
class empleo_model extends MY_Model{
    var $lista= "empleo";
    var $tabla= "Works";
    
    function __construct(){
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_data($id=0){
        $query =  $this->db->where(array('ifnull(Active,0)'=>1,'Id'=>(int)$id ))->get($this->tabla) ;        
        return $query->row_array();
    }
    
    function get_empleos_cliente($cliente_id = 0) {
		
        $sql = "SELECT Works.*, Companies.Name as CompanyN
                FROM Works, Companies
                WHERE Entity = ".(int)$cliente_id." AND Works.Company = Companies.Id
                  AND Works.Active = 1
                ORDER BY Works.Id DESC";
        $query = $this->db->query($sql);
        return $query->result_array(); 
        
    }
    
}    
