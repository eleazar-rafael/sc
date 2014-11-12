<?php

class Sindicato extends Admin_Controller {
    
    public function __construct()
    {
       parent::__construct();
       
    }
	
    function index(){
        $this->data['titulo'] = "Inicio";
        $this->layout->view('admin/home', $this->data);		
        
    }
       
    function leer_importar(){     
        $codigo = date("Ymd_his");
        $filePath = realpath("./public")."/fondeador_20141111.csv"; //fondeador_intermediario_canal_sucursal
        $csv = null; $no_encontro = 0;
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
                    if($renglon['payroll']){
                        $renglon['payroll_id'] = $this->get_payroll_id($renglon['payroll']);
                        echo $renglon['payroll']." - ID[".$renglon['payroll_id']."]<br>";
                        if((int)$renglon['payroll_id'] > 0){
                            
                            $fondeador_id = $this->get_catalogo_id("cat_fondeador", $renglon['fondeador']);
                            if($fondeador_id ==0 ) $fondeador_id = $this->insert_catalogo_id ("cat_fondeador", array('nombre'=>$renglon['fondeador']));
                            
                            $intermediario_id = $this->get_catalogo_id("cat_intermediario", $renglon['intermediario']);
                            if($intermediario_id ==0 ) $intermediario_id = $this->insert_catalogo_id ("cat_intermediario", array('nombre'=>$renglon['intermediario']));
                            
                            $canal_id = $this->get_catalogo_id("cat_canal", $renglon['canal']);
                            if($canal_id ==0 ) $canal_id = $this->insert_catalogo_id ("cat_canal", array('nombre'=>$renglon['canal']));
                            
                            $sucursal_id = $this->get_catalogo_id("cat_sucursal", $renglon['sucursal']);
                            if($sucursal_id ==0 ) $sucursal_id = $this->insert_catalogo_id ("cat_sucursal", array('nombre'=>$renglon['sucursal']));
                            
                            if($fondeador_id > 0 and $intermediario_id > 0 and $canal_id > 0 and $sucursal_id >0 ){
                                $this->update_payroll(array('id'=>$renglon['payroll_id'], 'fondeador_id'=>$fondeador_id, 
                                    'intermediario_id'=>$intermediario_id, 'canal_id'=>$canal_id, 'sucursal_id'=>$sucursal_id));
                            }
                            
                            $renglon['fondeador_id'] = $fondeador_id;
                            $renglon['intermediario_id'] = $intermediario_id;
                            $renglon['canal_id'] = $canal_id;
                            $renglon['sucursal_id'] = $sucursal_id;
                            
                            //update_payroll
                            
                        }else{
                            $no_encontro++;
                        }
                        
                        
                        
                        $csv[] = $renglon;
                    }
                    
                }                
                $linea++;
            }                     
            fclose($file);                    
        }
        
        
      
        echo "No se encontraron: $no_encontro ";
        pre($csv, "---TOTAL DE SINDICATOS--".count($csv)."--");
        //pre($csv,'----ARCHIVO CSV----');
    }
    
    
    function get_payroll_id($payroll){        
        $q = $this->db->query("select Id from Payroll where  Name = '".$payroll."' and Active = 1 ");
        $row = $q->row_array();
        
        return $row['Id'];        
    }
    
    function update_payroll($info){
        $this->db->where("Id",(int)$info['id']);
        $this->db->update("Payroll",$info);
    }
    
    function get_catalogo_id($catalogo="",$nombre=""){        
        $query = $this->db->query("select id from $catalogo where ifnull(borrado,0)=0 and nombre = '".$nombre."'");
        $row = $query->row_array();        
        return $row['id'];
    }
    
    function insert_catalogo_id($tabla="", $post=""){
        $post['fecha_alta'] = date("Y-m-d H:i:s");
        $this->db->insert($tabla, $post);
        return $this->db->insert_id();
    }
    
    
}    


