<?php
/**
 * Catalogo de Convenio
 *
 * @author Eleazar Rafael 
 */
class convenio extends Admin_Controller{
    var $lista = "convenio";
    public function __construct()
    {
        parent::__construct();
        $this->load->model("convenio_model");
        $this->load->model("convenio_tipo_empleado_model");
        $this->load->model("direccion_model");
        $this->load->model("canal_model");
        $this->load->model("contacto_model");
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
            $id = $this->convenio_model->insert( $this->input->post('convenio') );
            if( (int)$id > 0 ){ 
                $this->check_tipo_empleado($id);
                $this->check_direccion($id);
                $this->check_contacto("cat_convenio",$id);                
                $_SESSION['success'] = "Canal Agregado";
            }else
                $_SESSION['error'] = "Error al Crear Canal";
          
            redirect("cat/convenio/index");
        }
        $this->getform();
    }
    
    public function update(){
        //set_page($this->list,$page);
        if (($this->input->server('REQUEST_METHOD') == 'POST') && $this->validateForm() ) {
            $convenio = $this->input->post('convenio');
            $this->convenio_model->update($this->input->post('convenio'));
            $this->check_tipo_empleado( $convenio['id'] );
            $this->check_direccion($convenio['id']);
            $this->check_contacto("cat_convenio", $convenio['id']);
            $_SESSION['success'] = "Canal Editado";
            //$page = get_page($this->lista);
            redirect("cat/convenio/index/");//$page/
        }
        $this->getform();
    }
    
    private function check_tipo_empleado($convenio_id=0){
        $tipo_empleado = $this->input->post('tipo_empleado');
        //pre($tipo_empleado, '--tipo_empleado--' ); die();        
        if($convenio_id > 0){
            $this->convenio_tipo_empleado_model->clean($convenio_id);
            if($tipo_empleado)
                foreach ($tipo_empleado as $pos=> $tipo_id){                    
                    $info['convenio_id'] = $convenio_id;
                    $info['tipo_empleado'] = $tipo_id;
                    //pre($info," $pos - $tipo_id  ");
                    $this->convenio_tipo_empleado_model->insert($info);
                    
                }
        }
        
        
    }
    
    private function check_direccion($convenio_id=0){
        $direccion = $this->input->post('direccion');
        if($convenio_id > 0 ){
            if( (int)$direccion['id'] == 0 and ($direccion['calle'] or $direccion['numero'] or $direccion['codigo_postal'] or $direccion['colonia'] or 
                $direccion['ciudad_delegacion'] or $direccion['estado'] or $direccion['pais'])){ //NUEVA DIRECCION
                $direccion['tabla'] = "cat_convenio";
                $direccion['tabla_id'] = $convenio_id;
                $direccion_id = $this->direccion_model->insert($direccion);
            }else if((int)$direccion['id'] > 0){ //EDITAR DIRECCION
                $this->direccion_model->update($direccion);
                $direccion_id = (int)$direccion['id'];
            } 
            
            $convenio['id'] = (int)$convenio_id;
            $convenio['direccion_id'] = $direccion_id; 
            $this->convenio_model->update($convenio);            
        }
    }
    
    private function check_contacto($tabla="", $tabla_id=0){
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
    }
    
    public function delete($page=0){        
        $resp = $this->convenio_model->delete( $this->input->get('id') );
        if((int)$resp >0)
            $_SESSION['success'] = "Se borr&oacute; el registro solicitado";
        else
            $_SESSION['error'] = "Cuidado: el registro no existe o se gener&oacute; un error";   
        redirect("cat/convenio/index/$page");   
    }
    
    private function getform(){
        
        $page = get_page($this->lista);             
        $this->data['heading_title'] ="Convenio / ";
        $this->data['convenio'] = $this->convenio_model->get_data( $this->input->get('id') );     
        $this->data['direccion'] = $this->direccion_model->get_data( (int)$this->data['convenio']['direccion_id'] ); 
        $this->data['contacto'] =  $this->contacto_model->get_data_por_tipo("cat_convenio", (int)$this->data['convenio']['id']);
        $this->data['chk_tipo_empleado'] =  $this->convenio_tipo_empleado_model->get_list( (int)$this->data['convenio']['id'] );
        $this->data['cbo_canal'] = $this->canal_model->get_cbo_canal("--Seleccione--");
        
        
        $tipo_contacto = 3; $frecuencia_pago = 4; $tipo_empleado = 5;
        $this->data['cbo_frecuencia_pago'] = $this->catalogo_model->get_cbo_catalogo($frecuencia_pago, "-- Seleccione--");        
        $this->data['tipo_contacto'] = $this->catalogo_model->get_cbo_catalogo($tipo_contacto);
        $this->data['tipo_empleado'] = $this->catalogo_model->get_cbo_catalogo($tipo_empleado);
        
        $id = isset($this->data['convenio']['id'])? (int)$this->data['convenio']['id'] : 0;        
        if($id == 0){
            $this->data['action'] = "cat/convenio/insert/";
            $this->data['heading_title'] .= "Nuevo Registro ";
        }else{
            $this->data['action'] = "cat/convenio/update/?id=$id"; 
            $this->data['heading_title'] .= "Editar Registro";
        }                    
        $this->data['cancel'] = site_url("admin/convenio/index/".$page);
        
        $this->layout->view('cat/convenio/form', $this->data);
        
    }
    
    private function getlist(){
        $this->data['heading_title'] = "Convenios ";
        //PAGE, SORT Y ORDER        
        $this->data['list'] =  $this->lista;
        $this->data['page'] =  get_page($this->lista);
        $_sort= get_sort($this->lista);
        
        $this->data['sort'] = ( $_sort['sort'] )? $_sort['sort'] : 'id';
        $this->data['order'] = ($_sort['order'])? $_sort['order'] : 'ASC';
                
        //LINK PARA COLUMNAS
        $url_order = ( $this->data['order'] == 'ASC')? '&order=DESC': '&order=ASC';
        $pre_url = "cat/convenio/index?";
        $this->data['sort_id']   = site_url($pre_url."sort=id").$url_order;
        $this->data['sort_nombre']  = site_url($pre_url."sort=nombre").$url_order;
        $this->data['sort_titular']  = site_url($pre_url."sort=titular").$url_order;
        $this->data['sort_contacto']  = site_url($pre_url."sort=contacto").$url_order;
        $this->data['sort_fecha_firma_del_convenio']  = site_url($pre_url."sort=fecha_firma_del_convenio").$url_order;
        $this->data['sort_fecha_vencimiento']  = site_url($pre_url."sort=fecha_vencimiento").$url_order;
        $this->data['sort_fecha_limite_originacion']  = site_url($pre_url."sort=fecha_limite_originacion").$url_order;
        $this->data['sort_frecuencia_pagos']  = site_url($pre_url."sort=frecuencia_pagos").$url_order;
        $this->data['sort_contrato']  = site_url($pre_url."sort=contrato").$url_order;
        $this->data['sort_canal']  = site_url($pre_url."sort=canal").$url_order;
                    
        //PAGINACION
        $this->data['total'] = $total = $this->convenio_model->get_total();
        $config = paginator_config($total,site_url("admin/convenio/index"), 30);
        $this->pagination->initialize( $config );
        $this->data['links'] = "<div class='pagination'>".$this->pagination->create_links()."</div>";
        $data = array('limit' => $config['per_page'],'start'=> (int)$this->data['page']);
        
        //DATOS A DESPLEGAR
        $this->data['arrInfo'] = $this->convenio_model->get_data_list($data);
        
        $this->layout->view('cat/convenio/index', $this->data);
    }
    
    
    private function validateForm(){
        return true;
    }
    
}