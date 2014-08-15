<?php
/**
 * Catalogo de Canales
 *
 * @author Eleazar Rafael 
 */
class canal extends Admin_Controller{
    var $lista = "canal";
    public function __construct()
    {
        parent::__construct();
        $this->load->model("canal_model");
        $this->load->model("canal_intermediario_model");
        $this->load->model("direccion_model");
        $this->load->model("intermediario_model");
        $this->load->model("contacto_model");
        $this->load->helper('file');
    }
    
    public function index(){
        if($_POST['filter']) set_filter ($this->lista, $_POST['filter']);
        if($_GET['sort']) set_sort($this->lista, $_GET['sort'], $_GET['order']);
                
        $this->getlist();
    }
    
    
    public function insert(){        
        //set_page($this->lista,$page);
        if (($this->input->server('REQUEST_METHOD') == 'POST') && $this->validateForm() ) {
            $id = $this->canal_model->insert( $this->input->post('canal') );
            if( (int)$id > 0 ){ 
                $this->check_direccion($id);
                $this->check_contacto("cat_canal",$id);
                $this->check_intermediario($id);
                $this->upload_file($id); 
                $_SESSION['success'] = "Canal Agregado";
            }else
                $_SESSION['error'] = "Error al Crear Canal";
          
            redirect("cat/canal/index");
        }
        $this->getform();
    }
    
    public function update(){
        //set_page($this->list,$page);
        if (($this->input->server('REQUEST_METHOD') == 'POST') && $this->validateForm() ) {
            $canal = $this->input->post('canal');
            $this->canal_model->update($this->input->post('canal'));            
            $this->check_direccion($canal['id']);
            $this->check_contacto("cat_canal", $canal['id']);
            $this->check_intermediario( $canal['id'] );
            $this->upload_file($canal['id']);
            $_SESSION['success'] = "Canal Editado";
            //$page = get_page($this->lista);
            redirect("cat/canal/index/");//$page/
        }
        $this->getform();
    }
    
    private function upload_file( $canal_id = 0){
        if( $canal_id > 0 and $_FILES['archivo_contrato']['error']==0){            
        
            $server_path = realpath( "./uploads/canal_contrato/");
            $file_name = md5($canal_id)."." .  app_file_extension($_FILES['archivo_contrato']['name']); //"importador_".date("Ymd_His");
            
            $arrArchivo = array('path'=>'uploads/canal_contrato/'.$file_name,'nombre_original'=>$_FILES['archivo_contrato']['name'],'nombre' => $file_name );
            $target_path = $server_path."/".$file_name;
            //if( $this->upload->do_upload('archivo_contrato') ){  
            if(move_uploaded_file($_FILES['archivo_contrato']['tmp_name'], $target_path)){
                
                chmod($target_path, 0777); 
                $info['id'] = $canal_id;
                $info['contrato'] = json_encode($arrArchivo);
                $this->canal_model->update( $info );
            }
        }
    }
    
    private function check_intermediario($canal_id=0){
        $intermediario = $this->input->post('intermediario');        
        if($canal_id > 0){
            $this->canal_intermediario_model->clean($canal_id);
            if($intermediario)
                foreach ($intermediario as $pos=> $id){
                    $info['canal_id'] = $canal_id;
                    $info['intermediario_id'] = $id;                    
                    $this->canal_intermediario_model->insert($info);                    
                }
        }
    }
    
    private function check_direccion($canal_id=0){
        $direccion = $this->input->post('direccion');
        if($canal_id > 0 ){
            if( (int)$direccion['id'] == 0 and ($direccion['calle'] or $direccion['numero'] or $direccion['codigo_postal'] or $direccion['colonia'] or 
                $direccion['ciudad_delegacion'] or $direccion['estado'] or $direccion['pais'])){ //NUEVA DIRECCION
                $direccion['tabla'] = "cat_canal";
                $direccion['tabla_id'] = $canal_id;
                $direccion_id = $this->direccion_model->insert($direccion);
            }else if((int)$direccion['id'] > 0){ //EDITAR DIRECCION
                $this->direccion_model->update($direccion);
                $direccion_id = (int)$direccion['id'];
            } 
            
            $canal['id'] = (int)$canal_id;
            $canal['direccion_id'] = $direccion_id; 
            $this->canal_model->update($canal);            
        }
    }
    
    /*private function check_contacto($tabla="", $tabla_id=0){
        $contacto = $this->input->post('contacto');        
        if($tabla_id > 0){
            foreach($contacto as $tipo_contacto =>$dato){
                $info = null;
                $info['tabla'] = $tabla;
                $info['descripcion'] = $dato['descripcion'];
                if( (int)$dato['id'] == 0 and $dato['descripcion']){
                    $info['tabla_id'] = $tabla_id;
                    $info['tipo_contacto'] = $tipo_contacto;
                    $this->contacto_model->insert($info);
                }else if( (int)$dato['id'] > 0){
                    $info['id'] = $dato['id'];
                    $this->contacto_model->update($info);
                }                
            }
        }
    }*/
    
    public function delete($page=0){        
        $resp = $this->canal_model->delete( $this->input->get('id') );
        if((int)$resp >0)
            $_SESSION['success'] = "Se borr&oacute; el registro solicitado";
        else
            $_SESSION['error'] = "Cuidado: el registro no existe o se gener&oacute; un error";   
        redirect("cat/canal/index/$page");   
    }
    
    private function getform(){
        
        $page = get_page($this->lista);             
        $this->data['heading_title'] ="Canal / ";
        $this->data['canal'] = $this->canal_model->get_data( $this->input->get('id') );     
        $this->data['direccion'] = $this->direccion_model->get_data( (int)$this->data['canal']['direccion_id'] ); 
        $this->data['contacto'] =  $this->contacto_model->get_data_por_tipo("cat_canal", (int)$this->data['canal']['id']);
        $this->data['cbo_intermediario'] = $this->intermediario_model->get_cbo_intermediario();
        $this->data['chk_intermediario'] =  $this->canal_intermediario_model->get_list( (int)$this->data['canal']['id'] );
        
        $tipo_contacto = 3; $frecuencia_pago = 4;
        $this->data['cbo_frecuencia_pago'] = $this->catalogo_model->get_cbo_catalogo($frecuencia_pago, "-- Seleccione--");        
        $this->data['tipo_contacto'] = $this->catalogo_model->get_cbo_catalogo($tipo_contacto);
        
        $id = isset($this->data['canal']['id'])? (int)$this->data['canal']['id'] : 0;        
        if($id == 0){
            $this->data['action'] = "cat/canal/insert/";
            $this->data['heading_title'] .= "Nuevo Registro ";
        }else{
            $this->data['action'] = "cat/canal/update/?id=$id"; 
            $this->data['heading_title'] .= "Editar Registro";
        }                    
        $this->data['cancel'] = site_url("admin/canal/index/".$page);
        
        $this->layout->view('cat/canal/form', $this->data);
        
    }
    
    private function getlist(){
        $this->data['heading_title'] = "Canales ";
        //PAGE, SORT Y ORDER        
        $this->data['list'] =  $this->lista;
        $this->data['page'] =  get_page($this->lista);
        $_sort= get_sort($this->lista);
        
        $this->data['sort'] = ( $_sort['sort'] )? $_sort['sort'] : 'id';
        $this->data['order'] = ($_sort['order'])? $_sort['order'] : 'ASC';
                
        //LINK PARA COLUMNAS
        $url_order = ( $this->data['order'] == 'ASC')? '&order=DESC': '&order=ASC';
        $pre_url = "cat/canal/index?";
        $this->data['sort_id']   = site_url($pre_url."sort=id").$url_order;
        $this->data['sort_nombre']  = site_url($pre_url."sort=nombre").$url_order;
        $this->data['sort_titular']  = site_url($pre_url."sort=titular").$url_order;
        $this->data['sort_contacto']  = site_url($pre_url."sort=contacto").$url_order;
        $this->data['sort_fecha_firma_del_canal']  = site_url($pre_url."sort=fecha_firma_del_canal").$url_order;
        $this->data['sort_fecha_vencimiento']  = site_url($pre_url."sort=fecha_vencimiento").$url_order;
        $this->data['sort_fecha_limite_originacion']  = site_url($pre_url."sort=fecha_limite_originacion").$url_order;
        $this->data['sort_frecuencia_pagos']  = site_url($pre_url."sort=frecuencia_pagos").$url_order;
        $this->data['sort_contrato']  = site_url($pre_url."sort=contrato").$url_order;
                    
        //PAGINACION
        $this->data['total'] = $total = $this->canal_model->get_total();
        $config = paginator_config($total,site_url("admin/canal/index"), 30);
        $this->pagination->initialize( $config );
        $this->data['links'] = "<div class='pagination'>".$this->pagination->create_links()."</div>";
        $data = array('limit' => $config['per_page'],'start'=> (int)$this->data['page']);
        
        //DATOS A DESPLEGAR
        $this->data['arrInfo'] = $this->canal_model->get_data_list($data);
        
        $this->layout->view('cat/canal/index', $this->data);
    }
    
    
    private function validateForm(){
        return true;
    }
    
    
    function download_file($canal_id = 0){
        
        $canal = $this->canal_model->get_data($canal_id);
        $contrato = (array)json_decode($canal['contrato']);        
        $file_url = base_url($contrato['path']); 
        header('Content-Type: '.get_mime_by_extension($contrato['nombre_original']));
        header("Content-Transfer-Encoding: Binary");
        header("Content-disposition: attachment; filename=".$contrato['nombre_original']);
        readfile($file_url);
    }
}