<?php
class convenio_model extends MY_Model{
    var $lista= "convenio";
    var $tabla= "cat_convenio";
    
    function __construct(){
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_data($id=0){
        $query =  $this->db->where(array('ifnull(borrado,0)'=>0,'id'=>(int)$id ))->get($this->tabla) ;        
        return $query->row_array();
    }
            
    function get_data_list($data = array()){
                
        $sql = "SELECT c.*, fpagos.nombre as frecuencia_pagos_nombre, canal.nombre as canal_nombre
                FROM ".$this->tabla." c 
                LEFT JOIN catalogo as fpagos on fpagos.id = c.frecuencia_pagos and ifnull(fpagos.borrado,0)=0
                LEFT JOIN cat_canal as canal on canal.id = c.canal_id and ifnull(canal.borrado,0)=0
                WHERE ifnull(c.borrado,0)=0  ";
        $filter = get_filter($this->lista);
        $sort = get_sort($this->lista);
        
        if( $filter or $sort or $data ){
            if (!empty($filter['nombre'])) $sql .= " AND c.nombre LIKE '%" . $filter["nombre"] . "%'";            
            if (!empty($filter['titular'])) $sql .= " AND c.titular LIKE '%" . $filter["titular"] . "%'";
            if (!empty($filter['contacto'])) $sql .= " AND c.contacto LIKE '%" . $filter["contacto"] . "%'";
            
            if (!empty($filter['fecha_firma_del_convenio'])) $sql .= " AND c.fecha_firma_del_convenio LIKE '%" . $filter["fecha_firma_del_convenio"] . "%'";
            if (!empty($filter['fecha_vencimiento'])) $sql .= " AND c.fecha_vencimiento LIKE '%" . $filter["fecha_vencimiento"] . "%'";
            if (!empty($filter['fecha_limite_originacion'])) $sql .= " AND c.fecha_limite_originacion LIKE '%" . $filter["fecha_limite_originacion"] . "%'";
            if (!empty($filter['universo_empleados'])) $sql .= " AND c.universo_empleados LIKE '%" . $filter["universo_empleados"] . "%'";
            if (!empty($filter['frecuencia_pagos'])) $sql .= " AND fpagos.nombre LIKE '%" . $filter["frecuencia_pagos"] . "%'";
            if (!empty($filter['clave_asignada'])) $sql .= " AND c.clave_asignada LIKE '%" . $filter["clave_asignada"] . "%'";
            if (!empty($filter['canal'])) $sql .= " AND canal.nombre LIKE '%" . $filter["canal"] . "%'";
            //if (!empty($filter['contrato'])) $sql .= " AND c.contrato LIKE '%" . $filter["contrato"] . "%'";
                        
            $sort_data = array('nombre','titular', 'contacto', 'fecha_firma_del_convenio', 'fecha_vencimiento', 'fecha_limite_originacion', 
                               'universo_empleados', 'frecuencia_pagos','clave_asignada', 'canal'); //,'contrato'
            if (isset($sort['sort']) && in_array($sort['sort'], $sort_data)) {
                $tsort = "c.".$sort['sort'];
                if($sort['sort'] == "frecuencia_pagos") $tsort = "fpagos.nombre";
                if($sort['sort'] == "canal") $tsort = "canal.nombre";
                
                $sql .= " ORDER BY " . $tsort; 
            } else {
                $sql .= " ORDER BY c.id ";
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
            $sql .= "order by c.id asc";
        }
            
        $query = $this->db->query($sql);
        return $query->result_array();             
    }

    function get_total(){
       
        $sql = "SELECT COUNT(DISTINCT c.id) AS total              
                FROM ".$this->tabla." c
                LEFT JOIN catalogo as fpagos on fpagos.id = c.frecuencia_pagos and ifnull(fpagos.borrado,0)=0
                LEFT JOIN cat_canal as canal on canal.id = c.canal_id and ifnull(canal.borrado,0)=0
                WHERE ifnull(c.borrado,0)=0  ";
        
        $filter = get_filter($this->list);
        if (!empty($filter['nombre'])) $sql .= " AND c.nombre LIKE '%" . $filter["nombre"] . "%'";            
        if (!empty($filter['titular'])) $sql .= " AND c.titular LIKE '%" . $filter["titular"] . "%'";
        if (!empty($filter['contacto'])) $sql .= " AND c.contacto LIKE '%" . $filter["contacto"] . "%'";

        if (!empty($filter['fecha_firma_del_convenio'])) $sql .= " AND c.fecha_firma_del_convenio LIKE '%" . $filter["fecha_firma_del_convenio"] . "%'";
        if (!empty($filter['fecha_vencimiento'])) $sql .= " AND c.fecha_vencimiento LIKE '%" . $filter["fecha_vencimiento"] . "%'";
        if (!empty($filter['fecha_limite_originacion'])) $sql .= " AND c.fecha_limite_originacion LIKE '%" . $filter["fecha_limite_originacion"] . "%'";
        if (!empty($filter['universo_empleados'])) $sql .= " AND c.universo_empleados LIKE '%" . $filter["universo_empleados"] . "%'";
        if (!empty($filter['frecuencia_pagos'])) $sql .= " AND fpagos.nombre LIKE '%" . $filter["frecuencia_pagos"] . "%'";
        if (!empty($filter['clave_asignada'])) $sql .= " AND c.clave_asignada LIKE '%" . $filter["clave_asignada"] . "%'";
        if (!empty($filter['canal'])) $sql .= " AND canal.nombre LIKE '%" . $filter["canal"] . "%'";
        //if (!empty($filter['contrato'])) $sql .= " AND c.contrato LIKE '%" . $filter["contrato"] . "%'";

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
    
    function get_cbo_convenio($opInicial =""){
        return $this->get_cbo($this->tabla, "id,nombre", array('ifnull(borrado,0)'=>0), "nombre", $opInicial);
    }
        
}