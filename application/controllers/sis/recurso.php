<?php
/* 
 */
class recurso extends Admin_Controller{
    var $list= "sis_recurso";
    public function __construct()
    {
        parent::__construct();        
        $this->load->model("sis_recurso_model");
        $this->load->model("sis_recurso_accion_model");
        $this->load->model("sis_accion_model");
        $this->data['titulo'] = "Recursos";
    }
    
    public function index()
    {   
        $this->load->library('grocery_CRUD');
        $crud = new grocery_CRUD();
        
        $crud->where('ifnull(sis_recurso.borrado,0)',0);
        $crud->set_table($this->list);
        $crud->set_subject('Opci&oacute;n')->set_title('Listado de Recursos del Sistema');        
        $crud->display_as('padre_id','Depende de')->set_relation('padre_id','sis_recurso','nombre', 'padre_id');
        $crud->columns('orden','nombre','padre_id','controller','parametros');
        $crud->unset_print()->unset_export()->unset_read();
        
        $output = $crud->render();
        
        $this->data['gcrud'] = $output;
                
        $this->layout->view('sis/recurso/index',$this->data);  
    }
    
    public function insert()
    {   
        if (($this->input->server('REQUEST_METHOD') == 'POST') && $this->validateForm() ) { 
                        
            $id = $this->sis_recurso_model->insert( $this->input->post('recurso') );  
            $this->sis_recurso_accion_model->chek_acciones($id,$this->input->post('acciones'));
            
            if( (int)$id > 0 ) 
                $_SESSION['success'] = "Recurso Agregado";
            else
                $_SESSION['error'] = "Error al Crear Recurso";
          
            redirect("sis/recurso/index");
        }

        $this->getform(0);
        
    }
    
    public function update($id=0)
    {        
        
        if (($this->input->server('REQUEST_METHOD') == 'POST') && $this->validateForm() ) {  
            $recursos = $this->input->post('recurso');            
            $this->sis_recurso_model->update($recursos);    
            $this->sis_recurso_accion_model->chek_acciones($recursos['id'],$this->input->post('acciones'));
            
            $_SESSION['success'] = "Recurso Editado";        
            redirect("sis/recurso/index/");
        }
        $this->getform($id);        
    }

    
    public function delete( $id=0 )
    {
        $resp = $this->sis_recurso_model->delete( $id );
        
        if((int)$resp >0)
            $_SESSION['success'] = "Se borr&oacute; el registro solicitado";
        else
            $_SESSION['error'] = "El registro no existe o se gener&oacute; un error";
        //die();
        redirect("sis/recurso/index/");   
    }
    
    function getform($id = 0){
        
        $this->data['heading_title'] ="Formulario / ";
        $this->data['recurso'] = $this->sis_recurso_model->get_data( $id );        
        $this->data['cbo_padre'] = $this->sis_recurso_model->cbo_recurso("-- Seleccione --",$this->data['recurso']['id']);
        
        $id = isset($this->data['recurso']['id'])? (int)$this->data['recurso']['id'] : 0;
        if($id == 0){
            $this->data['action'] = "sis/recurso/insert/";
            $this->data['heading_title'] .= "Nuevo Registro";
        }else{
            $this->data['action'] = "sis/recurso/update/?id=$id"; 
            $this->data['heading_title'] .= "Editar Registro";
        }                
        $this->data['cancel'] = site_url("sis/recurso/index/");        
        $this->data['sis_acciones'] = $this->sis_accion_model->get_list();
        $this->data['recurso_acciones'] = $this->sis_recurso_accion_model->get_list($id);
        
        $this->layout->view('sis/recurso/form', $this->data);
    }
    
    function validateForm(){
        return true;
    }
    
}