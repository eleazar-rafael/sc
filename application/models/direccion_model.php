<?php
class direccion_model extends MY_Model{
    var $lista= "direccion";
    var $tabla= "cat_direccion";
    
    function __construct(){
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_data($id=0){
        $query =  $this->db->where(array('ifnull(borrado,0)'=>0,'id'=>(int)$id ))->get($this->tabla) ;        
        return $query->row_array();
    }
            
    function get_data_list($tabla="", $tabla_id = 0){
                
        $sql = "SELECT * FROM ".$this->tabla." WHERE ifnull(borrado,0)=0  and tabla = '".$tabla."', tabla_id = ".(int)$tabla_id;                    
        $query = $this->db->query($sql);
        return $query->result_array();             
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
    
    //--------------------------------------------------------------------------
    //  DIRECCIONES DEL CLIENTE  - TABLA: Addresses
    //--------------------------------------------------------------------------
    function get_data_cliente($id=0){
        $query =  $this->db->where(array('ifnull(Active,0)'=>1,'Id'=>(int)$id ))->get("Addresses");
        return $query->row_array();
    }
    
    function get_direcciones_cliente($cliente_id = 0){
        $sql = "SELECT Addresses.Id, AddressTypes.Name as Type, Street,Number,
                       Addresses.NeighbourhoodName as Neighbourhood,
                       Addresses.City as City, States.Name as State,
                       Countries.Name as Country, CP, Duration, MonthlyCost
                FROM Addresses 
                LEFT JOIN AddressTypes ON AddressTypes.Id = Addresses.TypeAddress 
                LEFT JOIN States ON Addresses.State = States.Id
                LEFT JOIN Countries ON States.Country = Countries.Id
                WHERE Addresses.Active = 1 and Entity = ". (int)$cliente_id;
        
        $query = $this->db->query($sql);
        return $query->result_array();  
        
    }
    
    function insert_cliente($post)
    {        
        if($post){            
            
            $this->db->insert("Addresses",$post);
            return  $this->db->insert_id();
        }        
    }

    function update_cliente($post)
    {
        if(is_array($post)){           
            $this->db->where("Id",(int)$post['Id']);
            $this->db->update("Addresses",$post);
            return true;            
        }
    }
    
    function delete_cliente($id){
        $id = (int)$id;
        if($id >0 ){
            $post['Active'] = 0;
            $this->db->where("Id",(int)$id);
            $this->db->update("Addresses",$post);
            $affected = $this->db->affected_rows();

            return $affected;
        }
    }
    
    
    //--------------------------------------------------------------------------
    //  CODIGOS POSTALES  - TABLA: cat_sepomex
    //--------------------------------------------------------------------------
        
    function cbo_sepomex_estado($opInicial=""){
        $query = $this->db->query("select distinct c_estado, d_estado from cat_sepomex order by d_estado asc ");
        if(trim($opInicial)) $info[] = $opInicial;
        if($query->num_rows > 0){
            foreach($query->result_array() as $row){
                $info[$row['c_estado']] = $row['d_estado'];
            }
        }
        return $info;
    }
    
    function cbo_sepomex_municipio($estado=0, $opInicial=""){
        $query = $this->db->query("select distinct c_mnpio, d_mnpio from cat_sepomex  where c_estado =".(int)$estado." order by d_mnpio asc ");
        if(trim($opInicial)) $info[] = $opInicial;
        if($query->num_rows > 0){
            foreach($query->result_array() as $row){
                $info[$row['c_mnpio']] = $row['d_mnpio'];
            }
        }
        return $info;
    }
    
    function cbo_sepomex_asentamiento($estado=0, $municipio=0, $opInicial=""){
        $query = $this->db->query("select distinct id_asenta_cpcons, d_asenta from cat_sepomex 
                                   where c_estado =".(int)$estado." and c_mnpio = ".(int)$municipio." 
                                   order by d_asenta asc ");
        if(trim($opInicial)) $info[] = $opInicial;
        if($query->num_rows > 0){
            foreach($query->result_array() as $row){
                $info[$row['id_asenta_cpcons']] = $row['d_asenta'];
            }
        }
        return $info;
    }
    
    function get_sepomex_cp($estado="", $municipio="", $colonia=""){
        $query = $this->db->query("select * from cat_sepomex 
                                   where c_estado =".(int)$estado." and c_mnpio = ".(int)$municipio." 
                                   and id_asenta_cpcons= ".(int)$colonia);
        
        return $query->row_array();
        
    }
    
    
}