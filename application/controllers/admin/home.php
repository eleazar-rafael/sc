<?php

class Home extends Admin_Controller {
    var $opmenu = 1;
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
    
    
    
    function rfc_list(){     
        $codigo = date("Ymd_his");
        $filePath = realpath("./public")."/contrato_rfc.csv";
        $csv = null; $clientes;
        if(file_exists($filePath)){ 
            $file = fopen($filePath,"r");          
            $campo = null; $linea= 0;
            while (!feof($file) ) {
                $renglon = null; $row = fgetcsv($file, 1024); 
                if($linea == 0){
                    $campo = $row;
                }else{                    
                    foreach($campo as $pos=>$nombre){
                        $renglon[$nombre] = $row[$pos];                        
                    }
                    if($contrato_id = $renglon['contrato']){
                        $cte = $this->get_cliente($contrato_id);
                        if(!$clientes[$cte['Id']]){
                            $clientes[$cte['Id']] = array('codigo_actualizacion'=>$codigo,'entity_id'=>$cte['Id'], 
                                                          'rfc_actual'=>$cte['RFC'], 'rfc_nuevo'=>trim($renglon['rfc_correcto']));
                        }
                    }
                }
                //if($renglon) $csv[] = $renglon;                
                $linea++;
            }                     
            fclose($file);                    
        }
        
        
        if($clientes){
            /*foreach($clientes as $info){
                $this->actualizar_rfc($info);
                echo "cliente[".$info['entity_id']."]  rfc_actual[".$info['rfc_actual']."] rfc_nuevo[".$info['rfc_nuevo']."] <br>";                
            }*/
        }
        pre($clientes, "---TOTAL DE CONTRATOS--".count($clientes)."--");
        //pre($csv,'----ARCHIVO CSV----');
    }
    
    
    function get_cliente($contrato_id){        
        $q = $this->db->query("select e.Id,RFC from Contracts c, Entity e where  c.Id = ".(int)$contrato_id." and e.Id = c.Entity ");
        return $q->row_array();        
    }
    
    function actualizar_rfc($info=array()){
        if($info['entity_id'] and $info['rfc_nuevo']){
            $this->db->where('Id',(int)$info['entity_id']);
            $this->db->update("Entity", array('RFC'=>$info['rfc_nuevo']) );
            
            $this->db->insert("xtmp_rfc", $info);            
        }
        
        
    }
    
    
    
    
}    


