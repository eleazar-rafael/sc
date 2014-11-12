<?php
/**
 * Catalogo de Canales
 *
 * @author Eleazar Rafael 
 */
class sepomex extends Admin_Controller{
    var $lista = "sepomex";
    var $opmenu = 1; //Administracion
    public function __construct()
    {
        parent::__construct();
        $this->load->model("sepomex_model");
    }
    
    
    public function index($page=0){
        set_page($this->lista,$page);
        if($_POST['filter']) set_filter ($this->lista, $_POST['filter']);
        if($_GET['sort']) set_sort($this->lista, $_GET['sort'], $_GET['order']);
                
        $this->getlist();
    }
    /*function index(){
        //$this->importar_cp();
    }*/
    
    private function getlist(){
        $this->data['heading_title'] = "CODIGOS POSTALES SEPOMEX";
        //PAGE, SORT Y ORDER        
        $this->data['list'] =  $this->lista;
        $this->data['page'] =  get_page($this->lista);
        $_sort= get_sort($this->lista);
        
        $this->data['sort'] = ( $_sort['sort'] )? $_sort['sort'] : 'id';
        $this->data['order'] = ($_sort['order'])? $_sort['order'] : 'ASC';
                
        //LINK PARA COLUMNAS
        $url_order = ( $this->data['order'] == 'ASC')? '&order=DESC': '&order=ASC';
        $pre_url = "cat/sepomex/index?";
        $this->data['sort_id']   = site_url($pre_url."sort=id").$url_order;
        $this->data['sort_d_codigo']   = site_url($pre_url."sort=d_codigo").$url_order;
        $this->data['sort_d_asenta']  = site_url($pre_url."sort=d_asenta").$url_order;
        $this->data['sort_d_tipo_asenta']  = site_url($pre_url."sort=d_tipo_asenta").$url_order;
        $this->data['sort_d_mnpio']  = site_url($pre_url."sort=d_mnpio").$url_order;
        $this->data['sort_d_estado']  = site_url($pre_url."sort=d_estado").$url_order;
        $this->data['sort_d_ciudad']  = site_url($pre_url."sort=d_ciudad").$url_order;
        $this->data['sort_c_estado']  = site_url($pre_url."sort=c_estado").$url_order;
        $this->data['sort_c_tipo_asenta']  = site_url($pre_url."sort=c_tipo_asenta").$url_order;
        $this->data['sort_c_mnpio']  = site_url($pre_url."sort=c_mnpio").$url_order;
        $this->data['sort_id_asenta_cpcons']  = site_url($pre_url."sort=id_asenta_cpcons").$url_order;
        $this->data['sort_d_zona']  = site_url($pre_url."sort=d_zona").$url_order;
        $this->data['sort_id_asenta_cpcons']  = site_url($pre_url."sort=id_asenta_cpcons").$url_order;
                    
        //PAGINACION
        $this->data['total'] = $total = $this->sepomex_model->get_total();
        $config = paginator_config($total,site_url("cat/sepomex/index"), 30);
        $this->pagination->initialize( $config );
        $this->data['links'] = "<div class='pagination'>".$this->pagination->create_links()."</div>";
        $data = array('limit' => $config['per_page'],'start'=> (int)$this->data['page']);
        
        //DATOS A DESPLEGAR
        $this->data['arrInfo'] = $this->sepomex_model->get_data_list($data);
        
        $this->layout->view('cat/index_sepomex', $this->data);
    }
    
    function importar_cp(){
        $filePath = realpath("./public")."/";        
        for($i=31; $i<=32; $i++){
            $file_estado = $filePath."cp_$i.csv";
            $this->leer_importar($file_estado);
        }
        
    }
    
    function leer_importar($file_estado=""){        
        
        $csv = null; $importados = 0;
        if(file_exists($file_estado)){ 
            $file = fopen($file_estado,"r");          
            $campo = null; $linea= 0;
            while (!feof($file) ) {
                $renglon = null; $row = fgetcsv($file, 1024); 
                if($linea == 0){
                    $campo = $row;
                }else{                    
                    foreach($campo as $pos=>$nombre){
                        $renglon[strtolower($nombre)] = utf8_encode($row[$pos]);
                    }                    
                    if($renglon['d_codigo']){                        
                        $id = $this->insert_catalogo_id("cat_sepomex",$renglon);
                        $renglon['id'] = $id;
                        $csv[] = $renglon;
                        if($id > 0) $importados++;
                    }                    
                }
                $linea++;
            }                     
            fclose($file);                    
        }
          
        echo "[$file_estado]  importados[$importados]<br>";
        //pre($csv, "---TOTAL DEL MUNICIPIO --".count($csv)."--");
        //pre($csv,'----ARCHIVO CSV----');
    }
    
    
    function insert_catalogo_id($tabla="", $post=""){
        //$post['fecha_alta'] = date("Y-m-d H:i:s");
        $this->db->insert($tabla, $post);
        return $this->db->insert_id();
    }
    
}
