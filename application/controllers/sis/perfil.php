<?php

class perfil extends Admin_Controller{
    var $list= "sis_perfil";
    public function __construct()
    {
        parent::__construct();        
        $this->load->model("sis_perfil_model");
        $this->load->model("sis_accion_model");
        $this->load->model("sis_recurso_model");
        $this->load->model("sis_recurso_accion_model");
        $this->data['titulo'] = "Perfil";
    }
    
    public function index()
    {   
        $this->load->library('grocery_CRUD');
        $crud = new grocery_CRUD();
        
        $crud->where('ifnull(borrado,0)',0);
        $crud->set_table($this->list);                
        $crud->columns('pos','nombre');
        $crud->unset_print()->unset_export()->unset_read();
        
        $crud->set_subject('Perfil')->set_title('Perfiles del Sistema'); 
        $output = $crud->render();        
        $this->data['gcrud'] = $output;
                
        $this->layout->view('sis/perfil/index',$this->data);  
    }
    /*public function index($page=0)
    {        
        if($_POST['filter']) set_filter ($this->list, $_POST['filter']);
        if($_GET['sort']) set_sort($this->list, $_GET['sort'], $_GET['order']);
        set_page($this->list,$page);
                
        $this->getlist();
    }*/
    
    
    public function insert(){     
        
        if (($this->input->server('REQUEST_METHOD') == 'POST') && $this->validateForm() ) { 
            $perfil = $this->input->post('perfil');            
            $id = $this->sis_perfil_model->insert( $perfil );            
            $this->sis_perfil_model->save_perfil_recurso($id);
            
            if( (int)$id > 0 )
                $_SESSION['success'] = "Perfil Agregado";                
            else
                $_SESSION['error'] = "Error al Crear Perfil";          
            redirect("sis/perfil/index/$page");
        }
        $this->getform();        
    }
    
    public function update($id=0)
    {   
        if (($this->input->server('REQUEST_METHOD') == 'POST') && $this->validateForm() ) {  
            $perfil = $this->input->post('perfil');            
            $this->sis_perfil_model->update($perfil);
            $this->sis_perfil_model->save_perfil_recurso($perfil['id']);
            $_SESSION['success'] = "Perfil Editado";
            
            redirect("sis/perfil/index/");
        }
        $this->getform($id);        
    }
   
    
    public function delete($id=0)
    {        
        $id = (int)$id;
        $resp = $this->sis_perfil_model->delete( $id );
        if((int)$resp >0)
            $_SESSION['success'] = "Se borr&oacute; el registro solicitado";
        else
            $_SESSION['error'] = "Cuidado: el registro no existe o se gener&oacute; un error";   
        redirect("sis/perfil/index/$page");   
    }
    /*
    function getlist(){
        $this->data['heading_title'] = "Listado de Perfiles ";
        //PAGE, SORT Y ORDER        
        $this->data['list'] =  $this->list;
        $this->data['page'] =  get_page($this->list);        
        $_sort= get_sort($this->list);   
        
        $this->data['sort'] = ( $_sort['sort'] )? $_sort['sort'] : 'id';
        $this->data['order'] = ($_sort['order'])? $_sort['order'] : 'ASC';
                
        //LINK PARA COLUMNAS
        $url_order = ( $this->data['order'] == 'ASC')? '&order=DESC': '&order=ASC';
        $pre_url = "sis/perfil/index?";
        $this->data['sort_id']   = site_url($pre_url."sort=id").$url_order;
        $this->data['sort_nombre']   = site_url($pre_url."sort=nombre").$url_order;
                
        //DATOS PARA SELECCION DE FILTROS
            
        //PAGINACION
        $this->data['total'] = $total = $this->sis_perfil_model->get_total();
        $config = paginator_config($total,site_url("sis/perfil/index"));
        $this->pagination->initialize( $config );
        $this->data['links'] = "<div class='pagination'>".$this->pagination->create_links()."</div>";
        $data = array('limit' => $config['per_page'],'start'=> (int)$this->data['page']);
        
        //DATOS A DESPLEGAR
        $this->data['arrInfo'] = $this->sis_perfil_model->get_data_list($data);
        
        $this->layout->view('sis/perfil/index', $this->data);
    }
    */
    function getform($id=0){
        
        $this->data['heading_title'] ="Formulario de Perfil / ";
        $this->data['perfil'] = $this->sis_perfil_model->get_data( $id );        
        $this->data['sis_perfil_recurso'] =null;        
        
        $id = isset($this->data['perfil']['id'])? (int)$this->data['perfil']['id'] : 0;
        if($id == 0){
            $this->data['action'] = "sis/perfil/insert/";
            $this->data['heading_title'] .= "Nuevo Registro";
        }else{
            $this->data['sis_perfil_recurso'] = $this->sis_perfil_model->get_recursos( $id );
            $this->data['action'] = "sis/perfil/update/$id"; 
            $this->data['heading_title'] .= "Editar Registro";
        }
        $this->data['cancel'] = site_url("sis/perfil/index/");
        
        
        $this->data['opciones'] = $this->sis_recurso_model->get_opciones();
        $this->data['sis_acciones'] = $this->sis_accion_model->get_list();
        
        $this->layout->view('sis/perfil/form', $this->data);
    }
    
    function validateForm(){
        return true;
    }
    
    
    function test_menu(){
        //$this->load->model('menu_model');
        
        echo $this->menu_model->get_menu_principal(true);
    }
    
}