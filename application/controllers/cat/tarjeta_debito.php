<?php
/**
 * Catalogo de Canales
 *
 * @author Eleazar Rafael 
 */
class tarjeta_debito extends Admin_Controller{
    var $lista = "tarjeta_debito";
    var $opmenu = 2; //Cliente
    public function __construct()
    {
        parent::__construct();
        $this->load->model("tarjeta_debito_model");
    }
    
    public function index(){        
        redirect("cat/cliente/view");
    }
    
    public function insert(){        
        if (($this->input->server('REQUEST_METHOD') == 'POST') && $this->validateForm() ) {
            $id = $this->tarjeta_debito_model->insert( $this->input->post('tarjeta_debito') );
            if( (int)$id > 0 ){                 
                $_SESSION['success'] = "Tarjeta Debito Agregada";
            }else
                $_SESSION['error'] = "Error al Crear Tarjeta Debito";
          
            redirect("cat/cliente/view/?tb=5");
        }
        $this->getform();
    }
    
    public function update(){        
        if (($this->input->server('REQUEST_METHOD') == 'POST') && $this->validateForm() ) {            
            $this->tarjeta_debito_model->update($this->input->post('tarjeta_debito'));                        
            $_SESSION['success'] = "Tarjeta Debito Editada";
            redirect("cat/cliente/view/?tb=5");
        }
        $this->getform();
    }
    
        
    public function delete(){        
        $resp = $this->tarjeta_debito_model->delete( $this->input->get('id') );
        if((int)$resp >0)
            $_SESSION['success'] = "Se borr&oacute; la tarjeta debito solicitada";
        else
            $_SESSION['error'] = "Cuidado: el registro no existe o se gener&oacute; un error";   
        redirect("cat/cliente/view/?tb=5");
    }
    
    private function getform(){        
        $this->data['tarjeta_debito'] = $this->tarjeta_debito_model->get_data( $this->input->get('id') );
        $this->data['cbo_banco'] = $this->tarjeta_debito_model->get_cbo_banco();
        
        $cliente_nombre = $_SESSION['cliente']['nombre'];
        $this->data['cliente_id'] = $_SESSION['cliente']['id'];
                
        $id = isset($this->data['tarjeta_debito']['id'])? (int)$this->data['tarjeta_debito']['id'] : 0;        
        if($id == 0){
            $this->data['action'] = "cat/tarjeta_debito/insert/";
            $this->data['heading_title'] .= "Agregar Tarjeta Debito / $cliente_nombre ";
        }else{
            $this->data['action'] = "cat/tarjeta_debito/update/?id=$id"; 
            $this->data['heading_title'] .= "Editar Tarjeta Debito / $cliente_nombre ";
        }                    
        $this->data['cancel'] = site_url("admin/cliente/view/?tb=5");
        
        $this->layout->view('cat/tarjeta_debito/form', $this->data);
        
    }    
    
    private function validateForm(){
        return true;
    }
    
    
  
}