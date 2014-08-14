<?php
class intermediario_model extends MY_Model{
    var $lista= "intermediario";
    var $tabla= "cat_intermediario";
    
    function __construct(){
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_data($id=0){
        $query =  $this->db->where(array('ifnull(borrado,0)'=>0,'id'=>(int)$id ))->get($this->tabla) ;        
        return $query->row_array();
    }
            
    function get_data_list($data = array()){        
                
        $sql = "SELECT *
                FROM ".$this->tabla."
                WHERE ifnull(borrado,0)=0  ";
        $filter = get_filter($this->lista);
        $sort = get_sort($this->lista);
        
        if( $filter or $sort or $data ){
            if (!empty($filter['nombre'])) $sql .= " AND nombre LIKE '%" . $filter["nombre"] . "%'";            
            if (!empty($filter['num_escritura'])) $sql .= " AND num_escritura LIKE '%" . $filter["num_escritura"] . "%'";
            if (!empty($filter['apoderado_legal'])) $sql .= " AND apoderado_legal LIKE '%" . $filter["apoderado_legal"] . "%'";
            if (!empty($filter['rfc'])) $sql .= " AND rfc LIKE '%" . $filter["rfc"] . "%'";
            if (!empty($filter['contacto_canal'])) $sql .= " AND contacto_canal LIKE '%" . $filter["contacto_canal"] . "%'";
            if (!empty($filter['tiempo_entrega_expediente'])) $sql .= " AND tiempo_entrega_expediente LIKE '%" . $filter["tiempo_entrega_expediente"] . "%'";
            if (!empty($filter['contrato'])) $sql .= " AND contrato LIKE '%" . $filter["contrato"] . "%'";
            
            $sort_data = array('nombre','num_escritura', 'apoderado_legal', 'rfc', 'contacto_canal', 'tiempo_entrega_expediente', 'contrato');
            if (isset($sort['sort']) && in_array($sort['sort'], $sort_data)) {
                $tsort = $sort['sort'];
                $sql .= " ORDER BY " . $tsort; 
            } else {
                $sql .= " ORDER BY id ";
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
                        $data['limit'] = 20;
                }
                $sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
            }
        }else{
            $sql .= "order by id asc";
        }
            
        $query = $this->db->query($sql);
        return $query->result_array();             
    }

    function get_total(){
       
        $sql = "SELECT COUNT(DISTINCT id) AS total              
                FROM ".$this->tabla." 
                WHERE ifnull(borrado,0)=0  ";
        
        $filter = get_filter($this->list);
        if (!empty($filter['nombre'])) $sql .= " AND nombre LIKE '%" . $filter["nombre"] . "%'";            
        if (!empty($filter['num_escritura'])) $sql .= " AND num_escritura LIKE '%" . $filter["num_escritura"] . "%'";
        if (!empty($filter['apoderado_legal'])) $sql .= " AND apoderado_legal LIKE '%" . $filter["apoderado_legal"] . "%'";
        if (!empty($filter['rfc'])) $sql .= " AND rfc LIKE '%" . $filter["rfc"] . "%'";
        if (!empty($filter['contacto_canal'])) $sql .= " AND contacto_canal LIKE '%" . $filter["contacto_canal"] . "%'";
        if (!empty($filter['tiempo_entrega_expediente'])) $sql .= " AND tiempo_entrega_expediente LIKE '%" . $filter["tiempo_entrega_expediente"] . "%'";
        if (!empty($filter['contrato'])) $sql .= " AND contrato LIKE '%" . $filter["contrato"] . "%'";       

        $query = $this->db->query($sql);
        $row = $query->row_array();

        return $row['total'];
    }

    function insert($post)
    {        
        if($post){            
            $post['fecha_alta'] = date("Y-m-d H:i:s"); 
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
    
    function get_cbo_intermediario($opInicial =""){
        return $this->get_cbo($this->tabla, "id,nombre", array('ifnull(borrado,0)'=>0), "nombre", $opInicial);
    }
        
}