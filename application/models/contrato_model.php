<?php
class Contrato_model extends MY_Model {
    var $lista= "contratos";
    var $tabla= "Contracts";
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_data($id=0){
        $query =  $this->db->where(array('Id'=>(int)$id ))->get($this->tabla) ;        
        return $query->row_array();
    }
        
    function get_contrato_cliente($cliente_id=0){
        $this->db->select("Contracts.*,LEFT(DateAdded,10) as MDate, ContractStatus.Name as CStatus, 
                           ContractNames.Name as ContractTypeName, Payroll.Name as Payroll", false);
        $this->db->from($this->tabla);
        $this->db->join('ContractStatus', 'ContractStatus.Id = Contracts.ContractStatus');   
        $this->db->join('ContractNames', 'ContractNames.Id=Contracts.TypeContract');
        $this->db->join('Payroll', 'Payroll.Id=Contracts.PayrollId');
        $this->db->where(array('Contracts.Entity'=>(int)$cliente_id ));  
        $query = $this->db->group_by("Id desc")->get() ;
        
        return $query->result_array();
    }
    
}    