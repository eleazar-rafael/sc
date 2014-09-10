<?php
/**
 * Catalogo de Vendedores
 *
 * @author Eleazar Rafael 
 */
class vendedor_meta extends Admin_Controller{
    var $opmenu = 1; //Administracion
    var $vendedor_id = 0;
    var $vendedor = null;
    
    public function __construct()
    {
        parent::__construct();          
        $this->load->model("vendedor_model");
        $this->load->model("vendedor_meta_model");
        
        if(isset($_GET['vendedor_id'])) $_SESSION['meta_vendedor_id'] = (int)$_GET['vendedor_id'];
        
        $this->vendedor_id = (int)$_SESSION['meta_vendedor_id'];
        if($this->vendedor_id ==0 ) redirect ("cat/vendedor/index");
        
        $this->vendedor = $this->vendedor_model->get_data( $this->vendedor_id );
    }
    
    public function index(){        
        $this->getlist();
    }
    
    public function insert(){
        if (($this->input->server('REQUEST_METHOD') == 'POST') && $this->validateForm() ) {
            $this->check_meses();                        
            $_SESSION['success'] = "Metas del vendedor actualizadas";            
            redirect("cat/vendedor_meta/index/");
        }
        $this->getform();
    }
    
    public function update(){        
        if (($this->input->server('REQUEST_METHOD') == 'POST') && $this->validateForm() ) {
            $this->check_meses();                        
            $_SESSION['success'] = "Metas del vendedor actualizadas";            
            redirect("cat/vendedor_meta/index/");
        }
        $this->getform();
    }
    
    
    private function check_meses(){
        $anio = $this->input->post("anio");
        $arrMes = $this->input->post("mes");   
        
        if( (int)$this->vendedor_id > 0 and (int)$anio >0 and strlen($anio) == 4 ){
            $this->vendedor_meta_model->clean($this->vendedor_id, $anio);
            foreach ($arrMes as $mes_id =>$meta){
                $meta = str_replace(",", "", $meta);
                if($meta >0 ){
                    $post['vendedor_id'] = $this->vendedor_id;
                    $post['anio'] = $anio;
                    $post['mes'] = $mes_id;
                    $post['meta'] = $meta;
                    $this->vendedor_meta_model->insert($post);
                }
            }
        }
    }


    private function getform(){
        
        $page = get_page($this->lista);             
        $this->data['heading_title'] ="Metas del vendedor / ";        
        $this->data['info'] = $this->vendedor_meta_model->get_data_list($this->vendedor_id, $this->input->get('anio'));
        $this->data['anio'] = $this->input->get('anio');
        
        //$id = isset($this->data['vendedor_meta']['id'])? (int)$this->data['vendedor']['id'] : 0;        
        if( !$this->data['info'] ){
            $this->data['action'] = "cat/vendedor_meta/insert/";
            $this->data['heading_title'] .= "Nuevo Registro ";
        }else{
            $this->data['action'] = "cat/vendedor_meta/update/"; 
            $this->data['heading_title'] .= "Editar Registro";
        }                    
        $this->data['cancel'] = site_url("admin/vendedor_meta/index/".$page);
        
        $this->layout->view('cat/vendedor_meta/form', $this->data);
        
    }
    
    private function getlist(){
        $this->data['heading_title'] = "Metas del Vendedor ";        
        //DATOS A DESPLEGAR
        $this->data['arrInfo'] = $this->vendedor_meta_model->get_data_list($this->vendedor_id);
        
        $this->layout->view('cat/vendedor_meta/index', $this->data);
    }
    
    
    private function validateForm(){
        return true;
    }
    
}
