<?php
/**
 * contactos del cliente
 *
 * @author Eleazar Rafael 
 */
class contacto_cliente extends Admin_Controller{
    var $lista = "contacto_cliente";
    var $opmenu = 2; //Cliente
    public function __construct()
    {
        parent::__construct();
        $this->load->model("contacto_model");        
    }
    
    public function index(){
        redirect("cat/cliente/view?tb=3");
    }
    
    
    public function insert(){        
        if (($this->input->server('REQUEST_METHOD') == 'POST') && $this->validateForm() ) {
            
            $contacto = $this->input->post('contacto');
            $id = $this->contacto_model->insert_cliente( $contacto );
            if( (int)$id > 0 ){                 
                $_SESSION['success'] = "Contacto Agregada";
            }else
                $_SESSION['error'] = "Error al Crear Contacto";
          
            redirect("cat/cliente/view/?tb=3");
        }
        $this->getform();
    }
    
    public function update(){        
        if (($this->input->server('REQUEST_METHOD') == 'POST') && $this->validateForm() ) { 
            $contacto = $this->input->post('contacto');
            $this->contacto_model->update_cliente($contacto );
            $_SESSION['success'] = "Contacto Editado";
            redirect("cat/cliente/view/?tb=3");
        }
        $this->getform();
    }
    
    


    public function delete(){        
        $resp = $this->contacto_model->delete_cliente( $this->input->get('id') );
        if((int)$resp >0)
            $_SESSION['success'] = "Se borr&oacute; contacto solicitado";
        else
            $_SESSION['error'] = "Cuidado: el registro no existe o se gener&oacute; un error";   
        redirect("cat/cliente/view/?tb=3");
    }
    
    private function getform(){        
        $this->data['contacto'] = $this->contacto_model->get_data_cliente( $this->input->get('id') );        
        $this->data['cbo_tipo_contacto'] = $this->catalogo_model->get_cbo_tipo_contacto("--Seleccione--");
        
        $cliente_nombre = $_SESSION['cliente']['nombre'];
        $this->data['cliente_id'] = $_SESSION['cliente']['id'];
                
        $id = isset($this->data['contacto']['Id'])? (int)$this->data['contacto']['Id'] : 0;
        if($id == 0){
            $this->data['action'] = "cat/contacto_cliente/insert/";
            $this->data['heading_title'] .= "Agregar Contacto / $cliente_nombre ";            
            
        }else{
            $this->data['action'] = "cat/contacto_cliente/update/?id=$id"; 
            $this->data['heading_title'] .= "Editar Contacto / $cliente_nombre ";
            $this->data['pais_id'] = $this->catalogo_model->get_pais_de_estado($this->data['contacto']['State']);            
            
        }                    
        $this->data['cancel'] = site_url("admin/cliente/view/?tb=3");
        
        
        
        
        $this->layout->view('cat/contacto_cliente/form', $this->data);
        
    }
    
    private function validateForm(){
        return true;
    }
  
    function ajax_estado($pais){
        echo form_dropdown("contacto[State]", $this->catalogo_model->get_cbo_estado("--Seleccione--",$pais), 0," id='State' class='form-control'" );
    }
}