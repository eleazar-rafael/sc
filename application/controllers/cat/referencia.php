<?php
/**
 * Referencias del cliente
 *
 * @author Eleazar Rafael 
 */
class referencia extends Admin_Controller{
    var $lista = "referencia";
    var $opmenu = 2; //Cliente
    public function __construct()
    {
        parent::__construct();
        $this->load->model("referencia_model");
    }
    
    public function index(){
        redirect("cat/cliente/view");
    }
    
    
    public function insert(){        
        //set_page($this->lista,$page);
        if (($this->input->server('REQUEST_METHOD') == 'POST') && $this->validateForm() ) {
            $id = $this->referencia_model->insert( $this->input->post('referencia') );
            if( (int)$id > 0 ){                 
                $_SESSION['success'] = "Referencia Agregada";
            }else
                $_SESSION['error'] = "Error al Crear Referencia";
          
            redirect("cat/cliente/view/?tb=6");
        }
        $this->getform();
    }
    
    public function update(){
        //set_page($this->list,$page);
        if (($this->input->server('REQUEST_METHOD') == 'POST') && $this->validateForm() ) {
            $referencia = $this->input->post('referencia');
            $this->referencia_model->update($this->input->post('referencia'));                        
            $_SESSION['success'] = "Referencia Editado";            
            redirect("cat/cliente/view/?tb=6");
        }
        $this->getform();
    }
    
        
    public function delete(){        
        $resp = $this->referencia_model->delete( $this->input->get('id') );
        if((int)$resp >0)
            $_SESSION['success'] = "Se borr&oacute; la referencia solicitada";
        else
            $_SESSION['error'] = "Cuidado: el registro no existe o se gener&oacute; un error";   
        redirect("cat/cliente/view/?tb=6");
    }
    
    private function getform(){        
        $this->data['referencia'] = $this->referencia_model->get_data( $this->input->get('id') );                     
        $this->data['cbo_relacion'] = $this->referencia_model->get_cbo_relacion();
        $cliente_nombre = $_SESSION['cliente']['nombre'];
        $this->data['cliente_id'] = $_SESSION['cliente']['id'];
                
        $id = isset($this->data['referencia']['id'])? (int)$this->data['referencia']['id'] : 0;        
        if($id == 0){
            $this->data['action'] = "cat/referencia/insert/";
            $this->data['heading_title'] .= "Agregar Referencia - Cliente: $cliente_nombre ";
        }else{
            $this->data['action'] = "cat/referencia/update/?id=$id"; 
            $this->data['heading_title'] .= "Editar Referencia - Cliente: $cliente_nombre ";
        }                    
        $this->data['cancel'] = site_url("admin/cliente/view/?tb=6");
        
        $this->layout->view('cat/referencia/form', $this->data);
        
    }
    
    private function validateForm(){
        return true;
    }
    
  
}