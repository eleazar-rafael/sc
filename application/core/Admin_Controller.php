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
    
    function check_archivo($tabla="", $tabla_id=0){
        $archivo_id =  $this->input->post("archivo_id"); 
        $archivo_titulo =  $this->input->post("archivo_titulo");
        $archivo_borrado =  $this->input->post("archivo_borrado");
        $archivo_nombre =  $_FILES['archivo_nombre'];
        
        $server_path = realpath( "./uploads/");
        //pre($arr_archivo, "arr_archivo");
        if($tabla and $tabla_id > 0 and $archivo_id){
            foreach($archivo_id as $pos => $id){
                //pre($nombre," pos[$pos] ");
                //SE NUEVO ARCHIVO
                if($archivo_nombre['error'][$pos] ==0 and $id ==0){
                    $info['tabla']   = $tabla;
                    $info['tabla_id']= $tabla_id;
                    $info['nombre_original']= $archivo_nombre['name'][$pos];
                    $info['titulo']= $archivo_titulo[$pos];
                    $info['carpeta']= $tabla;
                    
                    $this->db->trans_begin();
                    $id = $this->archivo_model->insert($info);                    
                    $ext  = app_file_extension($info['nombre_original']);
                    $filename = md5($id).".$ext";
                    $target_path = $server_path."/".$info['carpeta']."/$filename"; 
                    
                    if($id > 0 and move_uploaded_file($archivo_nombre['tmp_name'][$pos], $target_path)){                                           
                        //ASIGNA TODOS LOS PERMISOS A LA IMAGEN - ACTUALIZA EL REGISTRO CON LOS DATOS DE LA IMAGEN
                        $this->db->trans_commit();
                        
                        chmod($target_path,0777);
                        
                        $_file = array('id'=>$id,'nombre'=>$filename);
                        $this->archivo_model->update($_file);
                    }else{
                         $this->db->trans_rollback();
                    }
                  //BORRAR ARCHIVO  
                }elseif($id > 0 and (int)$archivo_borrado[$id] == (int)$id){
                    $this->archivo_model->delete($id);
                  //EDITAR TITULO
                }elseif($id > 0 ){
                    $_file = array('id'=>$id,'titulo'=>$archivo_titulo[$pos]);
                    $this->archivo_model->update($_file);
                }
            }
        }        
    }
    
}
