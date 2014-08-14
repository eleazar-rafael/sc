<?php
/**
 * Catalogo de Convenio_calendario
 *
 * @author Eleazar Rafael 
 */
class convenio_calendario extends Admin_Controller{
    var $lista = "convenio_calendario";
    var $convenio_id = 0;
    var $convenio = null;
    public function __construct()
    {
        parent::__construct();
        $this->load->model("convenio_calendario_model");
        $this->load->model("convenio_model");
        
        if(isset($_GET['convenio_id'])) $_SESSION['calendario_convenio_id'] = (int)$_GET['convenio_id'];
        
        $this->convenio_id = (int)$_SESSION['calendario_convenio_id'];
        if($this->convenio_id ==0 ) redirect ("cat/convenio/index");
        
        $this->convenio = $this->convenio_model->get_data( $this->convenio_id );
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
            $calendario = $this->input->post('calendario');
            $calendario['convenio_id'] = $this->convenio_id;
            $id = $this->convenio_calendario_model->insert($calendario);
            if( (int)$id > 0 ){                 
                $_SESSION['success'] = "Fecha agregada al calendario";
            }else
                $_SESSION['error'] = "Error al Crear Calendario";
          
            redirect("cat/convenio_calendario/index");
        }
        $this->getform();
    }
    
    public function update(){
        //set_page($this->list,$page);
        if (($this->input->server('REQUEST_METHOD') == 'POST') && $this->validateForm() ) {            
            $this->convenio_calendario_model->update($this->input->post('calendario'));            
            $_SESSION['success'] = "Fecha del calendario editada";
            //$page = get_page($this->lista);
            redirect("cat/convenio_calendario/index/");//$page/
        }
        $this->getform();
    }
    
    public function delete($page=0){        
        $resp = $this->convenio_calendario_model->delete( $this->input->get('id') );
        if((int)$resp >0)
            $_SESSION['success'] = "Se borr&oacute; el registro solicitado";
        else
            $_SESSION['error'] = "Cuidado: el registro no existe o se gener&oacute; un error";   
        redirect("cat/convenio_calendario/index/$page");   
    }
    
    private function getform(){
        
        $page = get_page($this->lista);             
        $this->data['heading_title'] ="Calendario ".$this->convenio['nombre']." / ";
        $this->data['calendario'] = $this->convenio_calendario_model->get_data( $this->input->get('id') );     
                
        $id = isset($this->data['calendario']['id'])? (int)$this->data['calendario']['id'] : 0;        
        if($id == 0){
            $this->data['action'] = "cat/convenio_calendario/insert/";
            $this->data['heading_title'] .= "Nuevo Registro ";
        }else{
            $this->data['action'] = "cat/convenio_calendario/update/?id=$id"; 
            $this->data['heading_title'] .= "Editar Registro";
        }                    
        $this->data['cancel'] = site_url("cat/convenio_calendario/index/".$page);
        
        $this->layout->view('cat/convenio_calendario/form', $this->data);
        
    }
    
    private function getlist(){
        $this->data['heading_title'] = "Calendario "; //.$this->convenio['nombre']
        //PAGE, SORT Y ORDER        
        $this->data['list'] =  $this->lista;
        $this->data['page'] =  get_page($this->lista);
        $_sort= get_sort($this->lista);
        
        $this->data['sort'] = ( $_sort['sort'] )? $_sort['sort'] : 'id';
        $this->data['order'] = ($_sort['order'])? $_sort['order'] : 'ASC';
                
        //LINK PARA COLUMNAS
        $url_order = ( $this->data['order'] == 'ASC')? '&order=DESC': '&order=ASC';
        $pre_url = "cat/convenio_calendario/index?";
        $this->data['sort_id']   = site_url($pre_url."sort=id").$url_order;
        $this->data['sort_nombre']  = site_url($pre_url."sort=nombre").$url_order;
        $this->data['sort_fecha_contratacion']  = site_url($pre_url."sort=fecha_contratacion").$url_order;
        $this->data['sort_fecha_entrega_al_canal']  = site_url($pre_url."sort=fecha_entrega_al_canal").$url_order;
        $this->data['sort_fecha_descuento_al_acreditado']  = site_url($pre_url."sort=fecha_descuento_al_acreditado").$url_order;
        
            
        //PAGINACION
        $this->data['total'] = $total = $this->convenio_calendario_model->get_total($this->convenio_id);
        $config = paginator_config($total,site_url("cat/convenio_calendario/index"), 30);
        $this->pagination->initialize( $config );
        $this->data['links'] = "<div class='pagination'>".$this->pagination->create_links()."</div>";
        $data = array('limit' => $config['per_page'],'start'=> (int)$this->data['page']);
        
        //DATOS A DESPLEGAR
        $this->data['arrInfo'] = $this->convenio_calendario_model->get_data_list($this->convenio_id, $data);
        
        $this->layout->view('cat/convenio_calendario/index', $this->data);
    }
    
    
    private function validateForm(){
        return true;
    }
    
}