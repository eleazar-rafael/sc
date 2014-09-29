<?php

class Home extends Admin_Controller {
    
    public function __construct()
    {
       parent::__construct();
       
    }
	
    function index()
    {
        $this->data['titulo'] = "Inicio";
        $this->layout->view('admin/home', $this->data);		
        
    }
    
    function buscar_cliente($cliente_id){
        
    }
    
    function payrolls(){
        $query = $this->db->query("select Id, Name from Payroll where Active = 1 and Name <> '' order by Name asc ");   
        $arr_info=null;        
        foreach($query->result_array() as $row){
            $tmp =  explode("-",$row['Name']);
            if(count($tmp)==4){
                $fond = trim($tmp[0]); $inter = trim($tmp[1]);
                $canal = trim($tmp[2]); $suc = trim($tmp[3]);
                $arr_info['fondeador'][$fond] = $fond;
                $arr_info['intermediario'][$inter] = $inter;
                $arr_info['canal'][$canal] = $canal;
                $arr_info['sucursal'][$suc] = $suc;
            }
            //print_r($tmp)."<br>";
        }
        
        $payrolls = array('fondeador','intermediario','canal','sucursal');
        
        foreach($payrolls as $opcion){
            if($arr_info[$opcion]){
                foreach($arr_info[$opcion] as $fondeador){
                    $id  = (int)$this->get_id_catalogo("cat_".$opcion, $fondeador);
                    if($id ==0 ){
                        $post['nombre'] = $fondeador;
                        $post['fecha_alta'] = date("Y-m-d H:i:s"); 
                        $this->db->insert("cat_".$opcion,$post);

                    }    
                }
            }
            //echo $opcion."<br>";
            pre($arr_info[$opcion], $opcion);
        }
        
        
    }
    
    function get_id_catalogo($catalogo,$nombre=""){
        $query = $this->db->query("select id from $catalogo where ifnull(borrado,0)=0 and nombre = '".$nombre."'");
        $row = $query->row_array();
        return (int)$row['id'];
    }
    
}    
