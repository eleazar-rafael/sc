<?php
/**
 * Catalogo de Intermediarioes
 *
 * @author Eleazar Rafael 
 */
class intermediario extends Admin_Controller{
    var $lista = "intermediario";
    public function __construct()
    {
        parent::__construct();  
        $this->load->model("intermediario_model");
        $this->load->model("archivo_model");
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
            $id = $this->intermediario_model->insert( $this->input->post('intermediario') );
            if( (int)$id > 0 ){ 
                $this->check_archivo("cat_intermediario", $id );
                $_SESSION['success'] = "Intermediario Agregado";
            }else
                $_SESSION['error'] = "Error al Crear Intermediario";
          
            redirect("cat/intermediario/index");
        }
        $this->getform();
    }
           
    public function update(){
        //set_page($this->list,$page);
        if (($this->input->server('REQUEST_METHOD') == 'POST') && $this->validateForm() ) {
            $intermediario = $this->input->post('intermediario');
            $this->intermediario_model->update($intermediario);
            $this->check_archivo("cat_intermediario", $intermediario['id']);
            $_SESSION['success'] = "Intermediario Editado";
            //$page = get_page($this->lista);
            redirect("cat/intermediario/index/");//$page/
        }
        $this->getform();
    }
    
    public function delete($page=0){        
        $resp = $this->intermediario_model->delete( $this->input->get('id') );
        if((int)$resp >0)
            $_SESSION['success'] = "Se borr&oacute; el registro solicitado";
        else
            $_SESSION['error'] = "Cuidado: el registro no existe o se gener&oacute; un error";   
        redirect("cat/intermediario/index/$page");   
    }
    
    private function getform(){
        
        $page = get_page($this->lista);             
        $this->data['heading_title'] ="Intermediario / ";
        $this->data['intermediario'] = $this->intermediario_model->get_data( $this->input->get('id') );   
        $this->data['arr_archivo'] = $this->archivo_model->get_data_list("cat_intermediario", $this->input->get('id') );   
        
        $id = isset($this->data['intermediario']['id'])? (int)$this->data['intermediario']['id'] : 0;        
        if($id == 0){
            $this->data['action'] = "cat/intermediario/insert/";
            $this->data['heading_title'] .= "Nuevo Registro ";
        }else{
            $this->data['action'] = "cat/intermediario/update/?id=$id"; 
            $this->data['heading_title'] .= "Editar Registro";
        }                    
        $this->data['cancel'] = site_url("admin/intermediario/index/".$page);
        
        $this->layout->view('cat/intermediario/form', $this->data);
        
    }
    
    private function getlist(){
        $this->data['heading_title'] = "Intermediarios ";
        //PAGE, SORT Y ORDER        
        $this->data['list'] =  $this->lista;
        $this->data['page'] =  get_page($this->lista);
        $_sort= get_sort($this->lista);
        
        $this->data['sort'] = ( $_sort['sort'] )? $_sort['sort'] : 'id';
        $this->data['order'] = ($_sort['order'])? $_sort['order'] : 'ASC';
                
        //LINK PARA COLUMNAS
        $url_order = ( $this->data['order'] == 'ASC')? '&order=DESC': '&order=ASC';
        $pre_url = "cat/intermediario/index?";
        $this->data['sort_id']   = site_url($pre_url."sort=id").$url_order;
        $this->data['sort_nombre']  = site_url($pre_url."sort=nombre").$url_order;
        $this->data['sort_num_escritura']  = site_url($pre_url."sort=num_escritura").$url_order;
        $this->data['sort_apoderado_legal']  = site_url($pre_url."sort=apoderado_legal").$url_order;
        $this->data['sort_rfc']  = site_url($pre_url."sort=rfc").$url_order;
        $this->data['sort_contacto_canal']  = site_url($pre_url."sort=contacto_canal").$url_order;
        $this->data['sort_tiempo_entrega_expediente']  = site_url($pre_url."sort=tiempo_entrega_expediente").$url_order;
        $this->data['sort_contrato']  = site_url($pre_url."sort=contrato").$url_order;
        
            
        //PAGINACION
        $this->data['total'] = $total = $this->intermediario_model->get_total();
        $config = paginator_config($total,site_url("admin/intermediario/index"), 30);
        $this->pagination->initialize( $config );
        $this->data['links'] = "<div class='pagination'>".$this->pagination->create_links()."</div>";
        $data = array('limit' => $config['per_page'],'start'=> (int)$this->data['page']);
        
        //DATOS A DESPLEGAR
        $this->data['arrInfo'] = $this->intermediario_model->get_data_list($data);
        
        $this->layout->view('cat/intermediario/index', $this->data);
    }
    
    
    private function validateForm(){
        return true;
    }
    
}
