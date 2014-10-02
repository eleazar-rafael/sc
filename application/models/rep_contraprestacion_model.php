<?php
class rep_contraprestacion_model extends MY_Model{
    var $lista= "contraprestacion";    
    function __construct(){        
        parent::__construct();
    }
    
    function get_data($id=0){
        $sql = "SELECT 
                    DATE_FORMAT(Contracts.ContractSignature,'%d-%m-%Y') AS fecha_contratacion
                    ,DATE_FORMAT(Contracts.PayInit,'%d-%m-%Y') AS fecha_primerpago_esperado
                    ,ContractStatus.Name AS estatus
                    ,Entity.RFC as rfc
                    ,UPPER(CONCAT(FirstName,' ',LastName,' ',LastNameTwo)) as nombre
                    ,Contracts.Id as contrato
                    ,Payroll.Name AS payroll_nombre
                    ,(Contracts.InterestPeriod * Contracts.Duration) as plazo_contratado
                    ,Contracts.Quantity as monto_credito_inicial
                FROM Contracts 
                LEFT JOIN ContractStatus ON Contracts.ContractStatus = ContractStatus.Id
                LEFT JOIN Entity ON Contracts.Entity = Entity.Id
                LEFT JOIN Payroll ON Contracts.PayrollId = Payroll.Id 
                WHERE ContractStatus in (1,7,9,10) 
                

                limit 500";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    function get_data_list($data = array()){        
                
        $sql = "SELECT 
                    DATE_FORMAT(Contracts.ContractSignature,'%d-%m-%Y') AS fecha_contratacion
                    ,DATE_FORMAT(Contracts.PayInit,'%d-%m-%Y') AS fecha_primerpago_esperado
                    ,ContractStatus.Name AS estatus
                    ,Entity.RFC as rfc 
                    ,UPPER(CONCAT(FirstName,' ',LastName,' ',LastNameTwo)) as nombre
                    ,Contracts.Id as contrato
                    ,Payroll.Name AS payroll_nombre
                    ,(Contracts.InterestPeriod * Contracts.Duration) as plazo_contratado
                    ,Contracts.Quantity as monto_credito_inicial
                FROM Contracts 
                LEFT JOIN ContractStatus ON Contracts.ContractStatus = ContractStatus.Id
                LEFT JOIN Entity ON Contracts.Entity = Entity.Id
                LEFT JOIN Payroll ON Contracts.PayrollId = Payroll.Id 
                WHERE ContractStatus in (1,7,9,10) ";
        $filter = get_filter($this->lista);
        $sort = get_sort($this->lista);
        
        if( $filter or $sort or $data ){
            if (!empty($filter['nombre'])) $sql .= " AND c.nombre LIKE '%" . $filter["nombre"] . "%'";            
            if (!empty($filter['titular'])) $sql .= " AND c.titular LIKE '%" . $filter["titular"] . "%'";
            if (!empty($filter['contacto'])) $sql .= " AND c.contacto LIKE '%" . $filter["contacto"] . "%'";
                                    
            $sort_data = array('nombre','titular', 'contacto', 'fecha_firma_del_canal');
            if (isset($sort['sort']) && in_array($sort['sort'], $sort_data)) {    
                $tsort = "Contracts.".$sort['sort'];                
                $sql .= " ORDER BY " . $tsort; 
            } else {
                $sql .= " ORDER BY Contracts.Id ";
            }
            
            if ( isset($sort['order']) && ($sort['order'] == 'DESC')) {
                $sql .= " DESC";
            } else {
                $sql .= " ASC";
            }

            if (isset($data['start']) || isset($data['limit'])) {
                if ($data['start'] < 0) {
                        $data['start'] = 0;
                }
                if ($data['limit'] < 1) {
                        $data['limit'] = 50;
                }
                $sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
            }
        }else{
            $sql .= "order by Contracts.Id asc";
        }
            
        $query = $this->db->query($sql);
        
        
        return $query->result_array();             
    }
    
    function get_total(){
       
        $sql = "SELECT COUNT(DISTINCT Contracts.Id) AS total                 
                FROM Contracts 
                LEFT JOIN ContractStatus ON Contracts.ContractStatus = ContractStatus.Id
                LEFT JOIN Entity ON Contracts.Entity = Entity.Id
                LEFT JOIN Payroll ON Contracts.PayrollId = Payroll.Id 
                WHERE ContractStatus in (1,7,9,10)  
        ";
        
        $filter = get_filter($this->list);
        if (!empty($filter['nombre'])) $sql .= " AND c.nombre LIKE '%" . $filter["nombre"] . "%'";            
        if (!empty($filter['titular'])) $sql .= " AND c.titular LIKE '%" . $filter["titular"] . "%'";
        if (!empty($filter['contacto'])) $sql .= " AND c.contacto LIKE '%" . $filter["contacto"] . "%'";

        $query = $this->db->query($sql);
        $row = $query->row_array();

        return $row['total'];
    }
    
    
    
}    