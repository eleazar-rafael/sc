<?php
class catalogo_model extends MY_Model{
    var $lista= "catalogo";
    var $tabla= "catalogo";
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        
    }

    function get_data($id)
    {        
        $query =  $this->db->where(array('ifnull(borrado,0)'=>0,'id'=>(int)$id ))->get($this->tabla) ;
        $row = $query->row_array();
        
        return $row;
    }

    /*function get_id($tipo_id=0, $nombre="")
    {
        $tipo_id = (int)$tipo_id;
        if($tipo_id ==0 or $nombre =='') return 0;
            
        $sql = "SELECT * FROM ".$this->tabla." WHERE catalogo_tipo_id = $tipo_id and nombre='".trim($nombre)."' and ifnull(borrado,0) = 0  order by id desc limit 1";
        $query = $this->db->query($sql);
        if($row = $query->row_array()){
            return $row['id'];
        }else{
            $cat = null;
            $cat['catalogo_tipo_id'] = $tipo_id;
            $cat['nombre'] = trim($nombre);
            $id = $this->add($cat);
            return $id;
        }        
    }*/
    
        
    function get_data_list($tipo_id=0, $data = array())
    {	
        $sql = "SELECT * FROM catalogo 
                WHERE catalogo_tipo_id = ".(int)$tipo_id." and ifnull(borrado,0) = 0  ";
                
        $filter = get_filter($data['list']);
        $sort = get_sort($data['list']); 
        
        if($filter or $sort or $data ){
            if (!empty($filter['id'])) $sql .= " AND id LIKE '%" . $filter["id"] . "%'";
            if (!empty($filter['nombre'])) $sql .= " AND nombre LIKE '%" . $filter["nombre"] . "%'";            
            if (!empty($filter['descripcion'])) $sql .= " AND descripcion LIKE '%" . $filter["descripcion"] . "%'";
            

            $sort_data = array('nombre','id', 'descripcion');
            if (isset($sort['sort']) && in_array($sort['sort'], $sort_data)) {                
                $sql .= " ORDER BY " . $sort['sort'];
            } else {
                $sql .= " ORDER BY  nombre ";
            }
            if (isset($sort['order']) && ($sort['order'] == 'DESC')) {
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
            $sql .= "ORDER BY pos, nombre asc";
        }
        //echo $sql;
        $query = $this->db->query($sql);
        return $query->result_array();
    }
        
    function get_total($tipo_id=0, $data = array())
    {
        $sql ="SELECT COUNT(id) AS total FROM ".$this->tabla."
                WHERE catalogo_tipo_id = ".(int)$tipo_id." and ifnull(borrado,0) = 0 ";
        
        $filter = get_filter($data['list']);        
        if (!empty($filter['id'])) $sql .= " AND id LIKE '%" . $filter["id"] . "%'";
        if (!empty($filter['nombre'])) $sql .= " AND nombre LIKE '%" . $filter["nombre"] . "%'";            
        if (!empty($filter['descripcion'])) $sql .= " AND descripcion LIKE '%" . $filter["descripcion"] . "%'";
        
        $query = $this->db->query($sql);
        $row = $query->row_array();
        return $row['total'];
    }
        
    function get_tree_node($tipo_id=0)
    {
        if($arrNode = $this->get_data_list($tipo_id))
            foreach($arrNode as $node)
            {
                $node = $node;
                $parent_id = (int)$node['padre_id'];  
                $nombre = $node['nombre'];
                if($node['pos'] > 0) $nombre = $node['pos']." - ".$node['nombre'];
                $js_nodes .= "d.add(".$node['id'].",".$parent_id.",'".addslashes($nombre)."','javascript:btn_form(".$node['id'].",false);',
                                               '".addslashes($node['nombre'])."','','');";
            }
        return $js_nodes;
    }

    function add($post)
    {
	if(is_array($post)){            
            if((int)$post['padre_id'] == 0) $post['padre_id'] = 0;

            $this->db->insert($this->tabla,$post);
            $id = $this->db->insert_id();

            if(!$this->db->_error_message()) $this->add_track("catalogo", $id, $post, "insert" );
            return  $id;
        }
    }

    function edit($post)
    {
        if(is_array($post)){            
            
            $this->db->where("id",$post['id']);
            $this->db->update($this->tabla,$post);
            
            //echo $this->db->last_query();
            
            if($this->db->affected_rows() > 0 ){
                //$this->add_track($this->tabla, $post['id'], $post, "update");                
            }
            if(!$this->db->_error_message()) return true;
        }
    }

    function drop($id)
    {
        $db_cat = $this->get_data( $id );
        $this->db->where("id",$id)->update($this->tabla,array('borrado'=> 1));        
        $affected = $this->db->affected_rows();
        /*if($db_cat['id']){
            $sql= "UPDATE catalogo SET borrado = 1 where padre_path like '".$like."%' ";
            $rs = $this->db->query($sql);
        }*/

        if($affected){
            //$this->add_track("catalogo", $id, $post, "delete");
        }
		return $affected;
    }

    function get_cbo_catalogo($tipo_id=0, $op_inicial=""){        
        $tipo_id = (int)$tipo_id;
        $sql="select id, nombre from catalogo where catalogo_tipo_id = $tipo_id and ifnull(borrado,0)=0 order by pos, nombre asc";
        $rs = $this->db->query($sql);
        $cbo = array();
        if($op_inicial) $cbo[]=$op_inicial;
        if($rs->num_rows >0){
            foreach($rs->result_array() as $row)
                $cbo[$row['id']] = $row['nombre'];
        }
        return $cbo;
    }
    
}
