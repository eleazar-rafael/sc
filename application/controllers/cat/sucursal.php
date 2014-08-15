<?php
/**
 * Catalogo de Sucursales
 *
 * @author Eleazar Rafael 
 */
class sucursal extends Admin_Controller{
    var $lista = "sucursal";
    public function __construct()
    {
        parent::__construct();  
        //$this->load->library('Datatables');
        $this->load->model("sucursal_model");
        $this->load->model("direccion_model");
        $this->load->model("contacto_model");
        $this->load->model("intermediario_model");
    }
    
    public function index(){
        if($_POST['filter']) set_filter ($this->lista, $_POST['filter']);
        if($_GET['sort']) set_sort($this->lista, $_GET['sort'], $_GET['order']);
        //set_page($this->lista,$page);
        
        $this->getlist();
    }
    
    
    public function insert(){        
        //set_page($this->lista,$page);
        if (($this->input->server('REQUEST_METHOD') == 'POST') && $this->validateForm() ) {
            $id = $this->sucursal_model->insert( $this->input->post('sucursal') );
            if( (int)$id > 0 ){ 
                $this->check_direccion($id);
                $this->check_contacto("cat_sucursal",$id);
                $_SESSION['success'] = "Sucursal Agregada";
            }else
                $_SESSION['error'] = "Error al Crear Sucursal";
          
            redirect("cat/sucursal/index");
        }
        $this->getform();
    }
    
    public function update(){
        //set_page($this->list,$page);
        if (($this->input->server('REQUEST_METHOD') == 'POST') && $this->validateForm() ) {
            $sucursal = $this->input->post('sucursal');
            $this->sucursal_model->update($this->input->post('sucursal'));
            $this->check_direccion($sucursal['id']);
            $this->check_contacto("cat_sucursal",$sucursal['id']);
            $_SESSION['success'] = "Sucursal Editada";
            //$page = get_page($this->lista);
            redirect("cat/sucursal/index/");//$page/
        }
        $this->getform();
    }
    
    private function check_direccion($sucursal_id=0){
        $direccion = $this->input->post('direccion');
        if($sucursal_id > 0 ){
            if( (int)$direccion['id'] == 0 and ($direccion['calle'] or $direccion['numero'] or $direccion['codigo_postal'] or $direccion['colonia'] or 
                $direccion['ciudad_delegacion'] or $direccion['estado'] or $direccion['pais'])){ //NUEVA DIRECCION
                $direccion['tabla'] = "cat_sucursal";
                $direccion['tabla_id'] = $sucursal_id;
                $direccion_id = $this->direccion_model->insert($direccion);
            }else if((int)$direccion['id'] > 0){ //EDITAR DIRECCION
                $this->direccion_model->update($direccion);
                $direccion_id = (int)$direccion['id'];
            } 
            
            $sucursal['id'] = (int)$sucursal_id;
            $sucursal['direccion_id'] = $direccion_id; 
            $this->sucursal_model->update($sucursal);
            
        }
    }
    
    
    public function delete($page=0){        
        $resp = $this->sucursal_model->delete( $this->input->get('id') );
        if((int)$resp >0)
            $_SESSION['success'] = "Se borr&oacute; el registro solicitado";
        else
            $_SESSION['error'] = "Cuidado: el registro no existe o se gener&oacute; un error";   
        redirect("cat/sucursal/index/$page");   
    }
    
    private function getform(){
        
        $page = get_page($this->lista);             
        $this->data['heading_title'] ="Sucursal / ";
        $this->data['sucursal'] = $this->sucursal_model->get_data( $this->input->get('id') );     
        $this->data['direccion'] = $this->direccion_model->get_data( (int)$this->data['sucursal']['direccion_id'] );
        $this->data['contacto'] =  $this->contacto_model->get_data_por_tipo("cat_sucursal", (int)$this->data['sucursal']['id']);
        $this->data['cbo_intermediario'] = $this->intermediario_model->get_cbo_intermediario("--Seleccione--");
        
                
        $tipo_contacto = 3;
        $this->data['tipo_contacto'] = $this->catalogo_model->get_cbo_catalogo($tipo_contacto);
        $id = isset($this->data['sucursal']['id'])? (int)$this->data['sucursal']['id'] : 0;        
        if($id == 0){
            $this->data['action'] = "cat/sucursal/insert/";
            $this->data['heading_title'] .= "Nuevo Registro ";
        }else{
            $this->data['action'] = "cat/sucursal/update/?id=$id"; 
            $this->data['heading_title'] .= "Editar Registro";
        }                    
        $this->data['cancel'] = site_url("admin/sucursal/index/".$page);
        
        $this->layout->view('cat/sucursal/form', $this->data);
        
    }
    
    private function getlist(){
        $this->data['heading_title'] = "Sucursales ";
        //PAGE, SORT Y ORDER        
        $this->data['list'] =  $this->lista;
        $this->data['page'] =  get_page($this->lista);
        $_sort= get_sort($this->lista);
        
        $this->data['sort'] = ( $_sort['sort'] )? $_sort['sort'] : 'id';
        $this->data['order'] = ($_sort['order'])? $_sort['order'] : 'ASC';
                
        //LINK PARA COLUMNAS
        $url_order = ( $this->data['order'] == 'ASC')? '&order=DESC': '&order=ASC';
        $pre_url = "cat/sucursal/index?";
        $this->data['sort_id']   = site_url($pre_url."sort=id").$url_order;
        $this->data['sort_nombre']  = site_url($pre_url."sort=nombre").$url_order;
        $this->data['sort_responsable']  = site_url($pre_url."sort=responsable").$url_order;
        $this->data['sort_reponsable_mesa_control']  = site_url($pre_url."sort=reponsable_mesa_control").$url_order;
        $this->data['sort_intermediario']  = site_url($pre_url."sort=intermediario").$url_order;
        
            
        //PAGINACION
        $this->data['total'] = $total = $this->sucursal_model->get_total();
        $config = paginator_config($total,site_url("admin/sucursal/index"), 30);
        $this->pagination->initialize( $config );
        $this->data['links'] = "<div class='pagination'>".$this->pagination->create_links()."</div>";
        $data = array('limit' => $config['per_page'],'start'=> (int)$this->data['page']);
        
        //DATOS A DESPLEGAR
        $this->data['arrInfo'] = $this->sucursal_model->get_data_list($data);
        
        $this->layout->view('cat/sucursal/index', $this->data);
    }
    
    
    private function validateForm(){
        return true;
    }
    
}