<?php
class sepomex_model extends MY_Model{
    var $lista= "sepomex";
    var $tabla= "cat_sepomex";
    
    function __construct(){
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_data($id=0){
        $query =  $this->db->where(array('ifnull(borrado,0)'=>0,'id'=>(int)$id ))->get($this->tabla) ;        
        return $query->row_array();
    }
            
    function get_data_list($data = array()){        
                
        $sql = "SELECT * FROM ".$this->tabla." WHERE 1=1 ";
        $filter = get_filter($this->lista);
        $sort = get_sort($this->lista);
        
        if( $filter or $sort or $data ){
            if (!empty($filter['id'])) $sql .= " AND id LIKE '%" . $filter["id"] . "%'";
            if (!empty($filter['d_codigo'])) $sql .= " AND d_codigo LIKE '%" . $filter["d_codigo"] . "%'";
            if (!empty($filter['d_asenta'])) $sql .= " AND d_asenta LIKE '%" . $filter["d_asenta"] . "%'";
            if (!empty($filter['d_tipo_asenta'])) $sql .= " AND d_tipo_asenta LIKE '%" . $filter["d_tipo_asenta"] . "%'";            
            if (!empty($filter['d_mnpio'])) $sql .= " AND d_mnpio LIKE '%" . $filter["d_mnpio"] . "%'";
            if (!empty($filter['d_estado'])) $sql .= " AND d_estado LIKE '%" . $filter["d_estado"] . "%'";
            if (!empty($filter['d_ciudad'])) $sql .= " AND d_ciudad LIKE '%" . $filter["d_ciudad"] . "%'";
            if (!empty($filter['d_cp'])) $sql .= " AND d_cp LIKE '%" . $filter["d_cp"] . "%'";
            if (!empty($filter['c_estado'])) $sql .= " AND c_estado LIKE '%" . $filter["c_estado"] . "%'";
            if (!empty($filter['c_oficina'])) $sql .= " AND c_oficina LIKE '%" . $filter["c_oficina"] . "%'";
            if (!empty($filter['c_cp'])) $sql .= " AND c_cp LIKE '%" . $filter["c_cp"] . "%'";
            if (!empty($filter['c_tipo_asenta'])) $sql .= " AND c_tipo_asenta LIKE '%" . $filter["c_tipo_asenta"] . "%'";
            if (!empty($filter['c_mnpio'])) $sql .= " AND c_mnpio LIKE '%" . $filter["c_mnpio"] . "%'";
            if (!empty($filter['id_asenta_cpcons'])) $sql .= " AND id_asenta_cpcons LIKE '%" . $filter["id_asenta_cpcons"] . "%'";
            if (!empty($filter['d_zona'])) $sql .= " AND d_zona LIKE '%" . $filter["d_zona"] . "%'";
            if (!empty($filter['c_cve_ciudad'])) $sql .= " AND c_cve_ciudad LIKE '%" . $filter["c_cve_ciudad"] . "%'";
            
                        
            $sort_data = array('d_codigo','d_asenta', 'd_tipo_asenta', 'd_mnpio', 'd_estado', 'd_cp', 'c_estado', 'c_oficina','c_cp',
                               'c_tipo_asenta','c_mnpio','id_asenta_cpcons','d_zona','c_cve_ciudad');
            if (isset($sort['sort']) && in_array($sort['sort'], $sort_data)) {                
                $sql .= " ORDER BY " . $sort['sort']; 
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
            $sql .= "order by id";
        }
        
        $query = $this->db->query($sql);
        return $query->result_array();             
    }

    function get_total(){
       
        $sql = "SELECT COUNT(d_codigo) AS total FROM ".$this->tabla." WHERE 1=1  ";
        
        $filter = get_filter($this->lista);
        if (!empty($filter['id'])) $sql .= " AND id LIKE '%" . $filter["id"] . "%'";
        if (!empty($filter['d_codigo'])) $sql .= " AND d_codigo LIKE '%" . $filter["d_codigo"] . "%'";            
        if (!empty($filter['d_asenta'])) $sql .= " AND d_asenta LIKE '%" . $filter["d_asenta"] . "%'";
        if (!empty($filter['d_tipo_asenta'])) $sql .= " AND d_tipo_asenta LIKE '%" . $filter["d_tipo_asenta"] . "%'";            
        if (!empty($filter['d_mnpio'])) $sql .= " AND d_mnpio LIKE '%" . $filter["d_mnpio"] . "%'";
        if (!empty($filter['d_estado'])) $sql .= " AND d_estado LIKE '%" . $filter["d_estado"] . "%'";
        if (!empty($filter['d_ciudad'])) $sql .= " AND d_ciudad LIKE '%" . $filter["d_ciudad"] . "%'";
        if (!empty($filter['d_cp'])) $sql .= " AND d_cp LIKE '%" . $filter["d_cp"] . "%'";
        if (!empty($filter['c_estado'])) $sql .= " AND c_estado LIKE '%" . $filter["c_estado"] . "%'";
        if (!empty($filter['c_oficina'])) $sql .= " AND c_oficina LIKE '%" . $filter["c_oficina"] . "%'";
        if (!empty($filter['c_cp'])) $sql .= " AND c_cp LIKE '%" . $filter["c_cp"] . "%'";
        if (!empty($filter['c_tipo_asenta'])) $sql .= " AND c_tipo_asenta LIKE '%" . $filter["c_tipo_asenta"] . "%'";
        if (!empty($filter['c_mnpio'])) $sql .= " AND c_mnpio LIKE '%" . $filter["c_mnpio"] . "%'";
        if (!empty($filter['id_asenta_cpcons'])) $sql .= " AND id_asenta_cpcons LIKE '%" . $filter["id_asenta_cpcons"] . "%'";
        if (!empty($filter['d_zona'])) $sql .= " AND d_zona LIKE '%" . $filter["d_zona"] . "%'";
        if (!empty($filter['c_cve_ciudad'])) $sql .= " AND c_cve_ciudad LIKE '%" . $filter["c_cve_ciudad"] . "%'";

        $query = $this->db->query($sql);
        $row = $query->row_array();
        
        
        return $row['total'];
    }
    /*
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
    }*/
        
}