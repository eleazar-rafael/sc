<?php
class Admin_Controller extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
                
        //$this->layout->setLayout("app/layout_default");
        $this->layout->setLayout("app/layout_fastcredit");
        
        $this->data['arrUser'] =  $this->session->userdata("arrUser");
        if(!$this->data['arrUser']) redirect("app/index");
        
        $this->load->model("catalogo_model");
        
        //WARNING Y SUCCESS
        $this->data['error_warning'] = "";        
        $this->data['success'] = "";

        if (isset($_SESSION['success'])) {
            $this->data['success'] = $_SESSION['success'];
            unset($_SESSION['success']);
        }        
        if (isset($_SESSION['error'])) {
            $this->data['error_warning'] = $_SESSION['error'];
            unset($_SESSION['error']);
        }
        
    }
    
    
    
    function set_permisos(){       
    }
    
    
    function check_contacto($tabla="", $tabla_id=0){
        
        $this->contacto_guardar($tabla, $tabla_id, 106, $this->input->post('contacto_telefono_id'),$this->input->post('contacto_telefono'), $this->input->post('contacto_telefono_borrar'));        
        $this->contacto_guardar($tabla, $tabla_id, 107, $this->input->post('contacto_celular_id'), $this->input->post('contacto_celular'), $this->input->post('contacto_celular_borrar'));        
        $this->contacto_guardar($tabla, $tabla_id, 108, $this->input->post('contacto_email_id'), $this->input->post('contacto_email'), $this->input->post('contacto_email_borrar'));        
    }
    
    function contacto_guardar($tabla, $tabla_id, $tipo_contacto, $arr_contacto_id, $arr_contacto, $arr_contacto_borrar){
                
        if($tabla_id > 0 and $arr_contacto_id){
            foreach($arr_contacto_id as $pos =>$id){
                $id = (int)$id;
                $info = null;
                $info['tabla'] = $tabla;
                $info['descripcion'] = $arr_contacto[$pos];

                if( $id == 0 and $info['descripcion']){
                    $info['tabla_id'] = $tabla_id;
                    $info['tipo_contacto'] = $tipo_contacto;                    
                    $this->contacto_model->insert($info);
                }else if( $id > 0 and  (int)$arr_contacto_borrar[$id] == $id){                    
                    $this->contacto_model->delete($id);
                }else if( $id > 0){
                    $info['id'] = $id;                    
                    $this->contacto_model->update($info);
                }                
            }
        }        
    }
    
}
