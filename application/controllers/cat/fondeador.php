<?php
/**
 * Catalogo de Fondeadores
 *
 * @author Eleazar Rafael 
 */
class fondeador extends Admin_Controller{
    var $lista = "fondeador";
    var $opmenu = 1; //Administracion
    public function __construct()
    {
        parent::__construct();  
        //$this->load->library('Datatables');
        $this->load->model("fondeador_model");
        $this->load->model("direccion_model");
        $this->load->model("contacto_model");
    }
    
    public function index($page=0){
        if($_POST['filter']) set_filter ($this->lista, $_POST['filter']);
        if($_GET['sort']) set_sort($this->lista, $_GET['sort'], $_GET['order']);
        set_page($this->lista,$page);
        
        $this->getlist();
    }
        
    public function insert(){        
        //set_page($this->lista,$page);
        if (($this->input->server('REQUEST_METHOD') == 'POST') && $this->validateForm() ) {
            $id = $this->fondeador_model->insert( $this->input->post('fondeador') );
            if( (int)$id > 0 ){
                $this->check_direccion($id);
                $this->check_contacto("cat_fondeador",$id);
                $_SESSION['success'] = "Fondeador Agregado";
            }else
                $_SESSION['error'] = "Error al Crear Fondeador";
          
            redirect("cat/fondeador/index");
        }
        $this->getform();
    }
    
    public function update(){
        //set_page($this->list,$page);
        if (($this->input->server('REQUEST_METHOD') == 'POST') && $this->validateForm() ) {
            $fondeador = $this->input->post('fondeador');
            $this->fondeador_model->update($fondeador);
            $this->check_direccion($fondeador['id']);
            $this->check_contacto("cat_fondeador",$fondeador['id']);
            $_SESSION['success'] = "Fondeador Editado";
            //$page = get_page($this->lista);            
            redirect("cat/fondeador/index/");//$page/            
        }
        $this->getform();
    }
        
    private function check_direccion($fondeador_id=0){
        $direccion = $this->input->post('direccion');
        if($fondeador_id > 0 ){
            if( (int)$direccion['id'] == 0 and ($direccion['calle'] or $direccion['numero'] or $direccion['codigo_postal'] or $direccion['colonia'] or 
                $direccion['ciudad_delegacion'] or $direccion['estado'] or $direccion['pais'])){ //NUEVA DIRECCION
                $direccion['tabla'] = "cat_fondeador";
                $direccion['tabla_id'] = $fondeador_id;
                $direccion_id = $this->direccion_model->insert($direccion);
            }else if((int)$direccion['id'] > 0){ //EDITAR DIRECCION
                $this->direccion_model->update($direccion);
                $direccion_id = (int)$direccion['id'];
            } 
            
            $fondeador['id'] = (int)$fondeador_id;
            $fondeador['direccion_id'] = $direccion_id; 
            $this->fondeador_model->update($fondeador);            
        }
    }
    
    public function delete($page=0){        
        $resp = $this->fondeador_model->delete( $this->input->get('id') );
        if((int)$resp >0)
            $_SESSION['success'] = "Se borr&oacute; el registro solicitado";
        else
            $_SESSION['error'] = "Cuidado: el registro no existe o se gener&oacute; un error";   
        redirect("cat/fondeador/index/$page");   
    }
    
    private function getform(){
        
        $page = get_page($this->lista);             
        $this->data['heading_title'] ="Fondeador / ";
        $this->data['fondeador'] = $this->fondeador_model->get_data( $this->input->get('id') );
        $this->data['direccion'] = $this->direccion_model->get_data( (int)$this->data['fondeador']['direccion_id'] );
        $this->data['contacto'] =  $this->contacto_model->get_data_por_tipo("cat_fondeador", (int)$this->data['fondeador']['id']);
                
        $tipo_contacto = 3;
        $this->data['tipo_contacto'] = $this->catalogo_model->get_cbo_catalogo($tipo_contacto);
        
        $id = isset($this->data['fondeador']['id'])? (int)$this->data['fondeador']['id'] : 0;        
        if($id == 0){
            $this->data['action'] = "cat/fondeador/insert/";
            $this->data['heading_title'] .= "Nuevo Registro ";            
        }else{
            $this->data['action'] = "cat/fondeador/update/?id=$id"; 
            $this->data['heading_title'] .= "Editar Registro";            
        }                    
        
        $this->data['cancel'] = site_url("admin/fondeador/index/".$page);
        
        $this->layout->view('cat/fondeador/form', $this->data);
        
    }
    
    private function getlist(){
        $this->data['heading_title'] = "Fondeadores ";
        //PAGE, SORT Y ORDER        
        $this->data['list'] =  $this->lista;
        $this->data['page'] =  get_page($this->lista);
        $_sort= get_sort($this->lista);
        
        $this->data['sort'] = ( $_sort['sort'] )? $_sort['sort'] : 'id';
        $this->data['order'] = ($_sort['order'])? $_sort['order'] : 'ASC';
                
        //LINK PARA COLUMNAS
        $url_order = ( $this->data['order'] == 'ASC')? '&order=DESC': '&order=ASC';
        $pre_url = "cat/fondeador/index?";
        $this->data['sort_id']   = site_url($pre_url."sort=id").$url_order;
        $this->data['sort_nombre']  = site_url($pre_url."sort=nombre").$url_order;
        $this->data['sort_descripcion']  = site_url($pre_url."sort=descripcion").$url_order;
        
                
        //DATOS PARA SELECCION DE FILTROS
            
        //PAGINACION
        $this->data['total'] = $total = $this->fondeador_model->get_total();
        $config = paginator_config($total,site_url("admin/fondeador/index"), 30);
        $this->pagination->initialize( $config );
        $this->data['links'] = "<div class='pagination'>".$this->pagination->create_links()."</div>";
        $data = array('limit' => $config['per_page'],'start'=> (int)$this->data['page']);
        
        //DATOS A DESPLEGAR
        $this->data['arrInfo'] = $this->fondeador_model->get_data_list($data);
        
        $this->layout->view('cat/fondeador/index', $this->data);
    }
    
    
    private function validateForm(){
        return true;
    }
    
}
