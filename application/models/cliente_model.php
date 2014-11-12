<?php
class cliente_model extends MY_Model{
    var $lista= "cliente";
    var $tabla= "Entity";    
    var $t_campo = null;
    var $campo = null;
    
    function __construct(){
        // Call the Model constructor
        parent::__construct();
        $this->t_campo = traduccion_tabla_cliente();
        $this->campo = tabla_cliente();
    }
    
    function get_data($id=0){       
        $query =  $this->db->where(array('Id'=>(int)$id ))->get($this->tabla);          
        return $this->tabla_campos($query->row_array());        
    }
            
    function get_data_list($data = array()){
                
        $sql = "SELECT *  
                FROM ".$this->tabla." 
                WHERE 1=1  ";
        $filter = get_filter($this->lista);
        $sort = get_sort($this->lista);
        
        if(!$filter) return false;
            
        if( $filter or $sort or $data ){
            if (!empty($filter['id'])) $sql .= " AND Id LIKE '%" . $filter["id"] . "%'";            
            if (!empty($filter['nombre'])) $sql .= " AND FirstName LIKE '%" . $filter["nombre"] . "%'";            
            if (!empty($filter['apellido_paterno'])) $sql .= " AND LastName LIKE '%" . $filter["apellido_paterno"] . "%'";
            if (!empty($filter['apellido_materno'])) $sql .= " AND LastNameTwo LIKE '%" . $filter["apellido_materno"] . "%'";            
            if (!empty($filter['rfc'])) $sql .= " AND RFC LIKE '%" . $filter["rfc"] . "%'";
            if (!empty($filter['curp'])) $sql .= " AND CURP LIKE '%" . $filter["curp"] . "%'";            
                        
            $sort_data = array('id','nombre','apellido_paterno', 'apellido_materno', 'rfc','curp' ); //,'contrato'
            if (isset($sort['sort']) && in_array($sort['sort'], $sort_data)) {
                $tsort = $this->t_campo[$sort['sort']];
                
                $sql .= " ORDER BY " . $tsort; 
            } else {
                $sql .= " ORDER BY LastName, LastNameTwo, FirstName, Id ";
            }
            
            if ( isset($sort['order']) && ($sort['order'] == 'ASC')) {
                $sql .= " DESC";
            } else {
                $sql .= " ASC";
            }
            //$sql .= "order by LastName, LastNameTwo, FirstName, Id desc";
            if (isset($data['start']) || isset($data['limit'])) {
                if ($data['start'] < 0) {
                        $data['start'] = 0;
                }
                if ($data['limit'] < 1) {
                        $data['limit'] = 20;
                }
                $sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
            }
        }else{
            $sql .= "order by ORDER BY LastName, LastNameTwo, FirstName, Id asc  ";
        }
            
        //echo $sql."<br>";
        $query = $this->db->query($sql);
        return $query->result_array();             
    }

    function get_total(){
       
        $sql = "SELECT COUNT(DISTINCT Id) AS total              
                FROM ".$this->tabla."                
                WHERE 1=1  ";
        
        $filter = get_filter($this->lista);
        if (!$filter) return 0;
        if (!empty($filter['id'])) $sql .= " AND Id LIKE '%" . $filter["id"] . "%'";            
        if (!empty($filter['nombre'])) $sql .= " AND FirstName LIKE '%" . $filter["nombre"] . "%'";            
        if (!empty($filter['apellido_paterno'])) $sql .= " AND LastName LIKE '%" . $filter["apellido_paterno"] . "%'";
        if (!empty($filter['apellido_materno'])) $sql .= " AND LastNameTwo LIKE '%" . $filter["apellido_materno"] . "%'";            
        if (!empty($filter['rfc'])) $sql .= " AND RFC LIKE '%" . $filter["rfc"] . "%'";
        if (!empty($filter['curp'])) $sql .= " AND CURP LIKE '%" . $filter["curp"] . "%'";      
        //if (!empty($filter['contrato'])) $sql .= " AND c.contrato LIKE '%" . $filter["contrato"] . "%'";
        //echo $sql."<br>";
        $query = $this->db->query($sql);
        $row = $query->row_array();

        return $row['total'];
    }

    function insert($post)
    {       
        $post = $this->traduccion($post);
        if($post){ 
            $post[$this->t_campo['fecha_alta']] = date("Y-m-d H:i:s"); 
            $this->db->insert($this->tabla,$post);
            return  $this->db->insert_id();
        }
        
    }

    function update($post){
        $id = (int)$post['id'];
    
        $post = $this->traduccion($post);
        if(is_array($post) and $id > 0){           
            $this->db->where( $this->t_campo['id'], $id );
            $this->db->update($this->tabla,$post);
            return true;            
        }
    }
    
    function traduccion($post){        
        if(is_array($post)){
            foreach($post as $key=> $valor){
                $info[$this->t_campo[$key]] = $valor;
            }
        }        
        return $info;
    }
    
    function tabla_campos($post){
        if(is_array($post)){
            foreach($post as $key=> $valor){
                $info[$this->campo[$key]] = $valor;
            }
        }        
        return $info;
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
    
    function insert_pool_cliente($entity) {
        if ($entity) {
                $sql = "INSERT INTO PoolClients(Entity,DateStart) VALUES($entity,now())";
                $this->db->query($sql);
                
        } 
    }
    
    
    function get_cbo_convenio($opInicial =""){
        return $this->get_cbo($this->tabla, "id,nombre", array('ifnull(borrado,0)'=>0), "nombre", $opInicial);
    }
    
    function get_cbo_regimenfiscal(){
        return array('PF'=>'Persona Fisica', 'PM'=>'Persona Moral');
    }
    
    
    
}