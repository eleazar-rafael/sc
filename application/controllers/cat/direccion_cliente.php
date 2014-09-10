<?php
/**
 * direcciones del cliente
 *
 * @author Eleazar Rafael 
 */
class direccion_cliente extends Admin_Controller{
    var $lista = "direccion_cliente";
    var $opmenu = 2; //Cliente
    public function __construct()
    {
        parent::__construct();
        $this->load->model("direccion_model");        
    }
    
    public function index(){
        redirect("cat/cliente/view?tb=2");
    }
    
    
    public function insert(){        
        if (($this->input->server('REQUEST_METHOD') == 'POST') && $this->validateForm() ) {
            
            $direccion = $this->input->post('direccion');            
            $direccion['Duration'] = ((int)$this->input->post('tiempo_en_direccion_anios') * 12) + (int)$this->input->post('tiempo_en_direccion_meses');
            
            $id = $this->direccion_model->insert_cliente( $direccion );
            if( (int)$id > 0 ){                 
                $_SESSION['success'] = "Direccion Agregada";
            }else
                $_SESSION['error'] = "Error al Crear Direccion";
          
            redirect("cat/cliente/view/?tb=2");
        }
        $this->getform();
    }
    
    public function update(){        
        if (($this->input->server('REQUEST_METHOD') == 'POST') && $this->validateForm() ) { 
            $direccion = $this->input->post('direccion');            
            $direccion['Duration'] = ((int)$this->input->post('tiempo_en_direccion_anios') * 12) + (int)$this->input->post('tiempo_en_direccion_meses');
                        
            $this->direccion_model->update_cliente($direccion );
            $_SESSION['success'] = "Direccion Editada";
            redirect("cat/cliente/view/?tb=2");
        }
        $this->getform();
    }
    
    


    public function delete(){        
        $resp = $this->direccion_model->delete_cliente( $this->input->get('id') );
        if((int)$resp >0)
            $_SESSION['success'] = "Se borr&oacute; la direcci&oacute;n solicitada";
        else
            $_SESSION['error'] = "Cuidado: el registro no existe o se gener&oacute; un error";   
        redirect("cat/cliente/view/?tb=2");
    }
    
    private function getform(){        
        $this->data['direccion'] = $this->direccion_model->get_data_cliente( $this->input->get('id') );                     
        
        $this->data['cbo_tipo_direccion'] = $this->catalogo_model->get_cbo_tipo_direccion("--Seleccione--");
        $this->data['cbo_tipo_vivienda'] = $this->catalogo_model->get_cbo_tipo_vivienda("--Seleccione--");
        $this->data['cbo_pais'] = $this->catalogo_model->get_cbo_pais("--Seleccione--");
        $this->data['pais_id'] = $this->pais_mexico;
        $this->data['tiempo_en_direccion_anios'] = 0;
        $this->data['tiempo_en_direccion_meses'] = 0;
        
        $cliente_nombre = $_SESSION['cliente']['nombre'];
        $this->data['cliente_id'] = $_SESSION['cliente']['id'];
                
        $id = isset($this->data['direccion']['Id'])? (int)$this->data['direccion']['Id'] : 0;
        if($id == 0){
            $this->data['action'] = "cat/direccion_cliente/insert/";
            $this->data['heading_title'] .= "Agregar Direccion / $cliente_nombre ";            
            
        }else{
            $this->data['action'] = "cat/direccion_cliente/update/?id=$id"; 
            $this->data['heading_title'] .= "Editar Direccion / $cliente_nombre ";
            $this->data['pais_id'] = $this->catalogo_model->get_pais_de_estado($this->data['direccion']['State']);            
            $this->data['tiempo_en_direccion_anios'] = (int)((int)$this->data['direccion']['Duration'] / 12);            
            $this->data['tiempo_en_direccion_meses'] = (int)$this->data['direccion']['Duration'] - ($this->data['tiempo_en_direccion_anios'] *12 );
        }                    
        $this->data['cancel'] = site_url("admin/cliente/view/?tb=2");
        
        $this->data['cbo_estado'] = $this->catalogo_model->get_cbo_estado("--Seleccione--", $this->data['pais_id']);
        
        
        $this->layout->view('cat/direccion_cliente/form', $this->data);
        
    }
    
    private function validateForm(){
        return true;
    }
  
    function ajax_estado($pais){
        echo form_dropdown("direccion[State]", $this->catalogo_model->get_cbo_estado("--Seleccione--",$pais), 0," id='State' class='form-control'" );
    }
}