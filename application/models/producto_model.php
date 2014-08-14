<?php
class producto_model extends MY_Model{
    var $lista= "producto";
    var $tabla= "cat_producto";
    
    function __construct(){
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_data($id=0){
        $query =  $this->db->where(array('ifnull(borrado,0)'=>0,'id'=>(int)$id ))->get($this->tabla) ;        
        return $query->row_array();
    }
            
    function get_data_list($data = array()){        
                
        $sql = "SELECT p.*, tc.nombre  as tipo_comision_nombre 
                FROM ".$this->tabla." p 
                LEFT JOIN catalogo tc ON tc.id = p.tipo_comision and ifnull(tc.borrado,0)=0   
                WHERE ifnull(p.borrado,0)=0  ";
        $filter = get_filter($this->lista);
        $sort = get_sort($this->lista);
        
        if( $filter or $sort or $data ){
            if (!empty($filter['nombre'])) $sql .= " AND p.nombre LIKE '%" . $filter["nombre"] . "%'";            
            if (!empty($filter['monto_minimo_prestamo'])) $sql .= " AND p.monto_minimo_prestamo LIKE '%" . $filter["monto_minimo_prestamo"] . "%'";
            if (!empty($filter['monto_maximo_prestamo'])) $sql .= " AND p.monto_maximo_prestamo LIKE '%" . $filter["monto_maximo_prestamo"] . "%'";
            if (!empty($filter['tipo_comision'])) $sql .= " AND tc.nombre LIKE '%" . $filter["tipo_comision"] . "%'";
            if (!empty($filter['comision_apertura'])) $sql .= " AND p.comision_apertura LIKE '%" . $filter["comision_apertura"] . "%'";
            if (!empty($filter['porcen_comision_apertura'])) $sql .= " AND p.porcen_comision_apertura LIKE '%" . $filter["porcen_comision_apertura"] . "%'";
            if (!empty($filter['financiamiento_comision'])) $sql .= " AND p.financiamiento_comision LIKE '%" . $filter["financiamiento_comision"] . "%'";
            if (!empty($filter['tasa'])) $sql .= " AND p.tasa LIKE '%" . $filter["tasa"] . "%'";
            if (!empty($filter['plazos_mensuales'])) $sql .= " AND p.plazos_mensuales LIKE '%" . $filter["plazos_mensuales"] . "%'";
            if (!empty($filter['tasa_moratoria'])) $sql .= " AND p.tasa_moratoria LIKE '%" . $filter["tasa_moratoria"] . "%'";
            if (!empty($filter['seguro'])) $sql .= " AND p.seguro LIKE '%" . $filter["seguro"] . "%'";
            if (!empty($filter['otros_gastos'])) $sql .= " AND p.otros_gastos LIKE '%" . $filter["otros_gastos"] . "%'";
            
                        
            $sort_data = array('nombre','monto_minimo_prestamo', 'monto_maximo_prestamo', 'tipo_comision', 'comision_apertura', 'porcen_comision_apertura', 
                               'financiamiento_comision', 'tasa','plazos_mensuales','tasa_moratoria','otros_gastos');
            if (isset($sort['sort']) && in_array($sort['sort'], $sort_data)) {                
                $tsort = "p.".$sort['sort']; 
                if($sort['sort'] == "tipo_comision") $tsort = "tc.nombre";
                $sql .= " ORDER BY " . $tsort; 
            } else {
                $sql .= " ORDER BY p.id ";
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
            $sql .= "order by p.id asc";
        }
            
        $query = $this->db->query($sql);
        return $query->result_array();             
    }

    function get_total(){
       
        $sql = "SELECT COUNT(DISTINCT p.id) AS total              
                FROM ".$this->tabla." p 
                LEFT JOIN catalogo tc ON tc.id = p.tipo_comision and ifnull(tc.borrado,0)=0       
                WHERE ifnull(p.borrado,0)=0  ";
        
        $filter = get_filter($this->list);
        if (!empty($filter['nombre'])) $sql .= " AND p.nombre LIKE '%" . $filter["nombre"] . "%'";            
        if (!empty($filter['monto_minimo_prestamo'])) $sql .= " AND p.monto_minimo_prestamo LIKE '%" . $filter["monto_minimo_prestamo"] . "%'";
        if (!empty($filter['monto_maximo_prestamo'])) $sql .= " AND p.monto_maximo_prestamo LIKE '%" . $filter["monto_maximo_prestamo"] . "%'";
        if (!empty($filter['tipo_comision'])) $sql .= " AND tc.tipo_comision LIKE '%" . $filter["tipo_comision"] . "%'";
        if (!empty($filter['comision_apertura'])) $sql .= " AND p.comision_apertura LIKE '%" . $filter["comision_apertura"] . "%'";
        if (!empty($filter['porcen_comision_apertura'])) $sql .= " AND p.porcen_comision_apertura LIKE '%" . $filter["porcen_comision_apertura"] . "%'";
        if (!empty($filter['financiamiento_comision'])) $sql .= " AND p.financiamiento_comision LIKE '%" . $filter["financiamiento_comision"] . "%'";
        if (!empty($filter['tasa'])) $sql .= " AND p.tasa LIKE '%" . $filter["tasa"] . "%'";
        if (!empty($filter['plazos_mensuales'])) $sql .= " AND p.plazos_mensuales LIKE '%" . $filter["plazos_mensuales"] . "%'";
        if (!empty($filter['tasa_moratoria'])) $sql .= " AND p.tasa_moratoria LIKE '%" . $filter["tasa_moratoria"] . "%'";
        if (!empty($filter['seguro'])) $sql .= " AND p.seguro LIKE '%" . $filter["seguro"] . "%'";
        if (!empty($filter['otros_gastos'])) $sql .= " AND p.otros_gastos LIKE '%" . $filter["otros_gastos"] . "%'";

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
    
    function get_cbo_producto($opInicial =""){
        return $this->get_cbo($this->tabla, "id,nombre", array('ifnull(borrado,0)'=>0), "nombre", $opInicial);
    }
        
}