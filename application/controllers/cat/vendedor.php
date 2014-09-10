<?php
/**
 * Catalogo de Vendedores
 *
 * @author Eleazar Rafael 
 */
class vendedor extends Admin_Controller{
    var $lista = "vendedor";
    var $opmenu = 1; //Administracion
    public function __construct()
    {
        parent::__construct();  
        //$this->load->library('Datatables');
        $this->load->model("vendedor_model");
        $this->load->model("direccion_model");
        $this->load->model("contacto_model");
        $this->load->model("sucursal_model");
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
            $id = $this->vendedor_model->insert( $this->input->post('vendedor') );
            if( (int)$id > 0 ){ 
                $this->check_direccion($id);
                $this->check_contacto("cat_vendedor",$id);
                $_SESSION['success'] = "Vendedor Agregado";
            }else
                $_SESSION['error'] = "Error al Crear Vendedor";
          
            redirect("cat/vendedor/index");
        }
        $this->getform();
    }
    
    public function update(){
        //set_page($this->list,$page);
        if (($this->input->server('REQUEST_METHOD') == 'POST') && $this->validateForm() ) {
            $vendedor = $this->input->post('vendedor');
            $this->vendedor_model->update( $vendedor );
            $this->check_direccion($vendedor['id']);
            $this->check_contacto("cat_vendedor", $vendedor['id']);
            
            $_SESSION['success'] = "Vendedor Editado";
            //$page = get_page($this->lista);            
            redirect("cat/vendedor/index/");//$page/
        }
        $this->getform();
    }
    
    private function check_direccion($vendedor_id=0){
        $direccion = $this->input->post('direccion');
        if($vendedor_id > 0 ){
            if( (int)$direccion['id'] == 0 and ($direccion['calle'] or $direccion['numero'] or $direccion['codigo_postal'] or $direccion['colonia'] or 
                $direccion['ciudad_delegacion'] or $direccion['estado'] or $direccion['pais'])){ //NUEVA DIRECCION
                $direccion['tabla'] = "cat_vendedor";
                $direccion['tabla_id'] = $vendedor_id;
                $direccion_id = $this->direccion_model->insert($direccion);
            }else if((int)$direccion['id'] > 0){ //EDITAR DIRECCION
                $this->direccion_model->update($direccion);
                $direccion_id = (int)$direccion['id'];
            } 
            
            $vendedor['id'] = (int)$vendedor_id;
            $vendedor['direccion_id'] = $direccion_id; 
            $this->vendedor_model->update($vendedor);            
        }
    }

    
    public function delete($page=0){        
        $resp = $this->vendedor_model->delete( $this->input->get('id') );
        if((int)$resp >0)
            $_SESSION['success'] = "Se borr&oacute; el registro solicitado";
        else
            $_SESSION['error'] = "Cuidado: el registro no existe o se gener&oacute; un error";   
        redirect("cat/vendedor/index/$page");   
    }
    
    private function getform(){
        
        $page = get_page($this->lista);             
        $this->data['heading_title'] ="Vendedor / ";
        $this->data['vendedor'] = $this->vendedor_model->get_data( $this->input->get('id') );    
        $this->data['direccion'] = $this->direccion_model->get_data( (int)$this->data['vendedor']['direccion_id'] );
        $this->data['contacto'] =  $this->contacto_model->get_data_por_tipo("cat_vendedor", (int)$this->data['vendedor']['id']);
        
        $tipo_direccion = 1; $tipo_vivienda = 2; $tipo_contacto = 3;
        $this->data['tipo_contacto'] = $this->catalogo_model->get_cbo_catalogo($tipo_contacto);
        $this->data['cbo_tipo_direccion'] = $this->catalogo_model->get_cbo_catalogo($tipo_direccion, "--Seleccione--");
        $this->data['cbo_tipo_vivienda'] = $this->catalogo_model->get_cbo_catalogo($tipo_vivienda, "--Seleccione--");
        $this->data['cbo_sucursal'] = $this->sucursal_model->get_cbo_sucursal("--Seleccione--");
        
        $id = isset($this->data['vendedor']['id'])? (int)$this->data['vendedor']['id'] : 0;        
        if($id == 0){
            $this->data['action'] = "cat/vendedor/insert/";
            $this->data['heading_title'] .= "Nuevo Registro ";
        }else{
            $this->data['action'] = "cat/vendedor/update/?id=$id"; 
            $this->data['heading_title'] .= "Editar Registro";
        }                    
        $this->data['cancel'] = site_url("admin/vendedor/index/".$page);
        
        $this->layout->view('cat/vendedor/form', $this->data);
        
    }
    
    private function getlist(){
        $this->data['heading_title'] = "Vendedores ";
        //PAGE, SORT Y ORDER        
        $this->data['list'] =  $this->lista;
        $this->data['page'] =  get_page($this->lista);
        $_sort= get_sort($this->lista);
        
        $this->data['sort'] = ( $_sort['sort'] )? $_sort['sort'] : 'id';
        $this->data['order'] = ($_sort['order'])? $_sort['order'] : 'ASC';
                
        //LINK PARA COLUMNAS
        $url_order = ( $this->data['order'] == 'ASC')? '&order=DESC': '&order=ASC';
        $pre_url = "cat/vendedor/index?";
        $this->data['sort_id']   = site_url($pre_url."sort=id").$url_order;
        $this->data['sort_nombre']  = site_url($pre_url."sort=nombre").$url_order;
        $this->data['sort_rfc']  = site_url($pre_url."sort=rfc").$url_order;
        $this->data['sort_porcen_ventas']  = site_url($pre_url."sort=porcen_ventas").$url_order;
        $this->data['sort_cobranza_realizada']  = site_url($pre_url."sort=cobranza_realizada").$url_order;
        $this->data['sort_porcen_comision']  = site_url($pre_url."sort=porcen_comision").$url_order;
        $this->data['sort_comision_a_pagar']  = site_url($pre_url."sort=comision_a_pagar").$url_order;
                    
        //PAGINACION
        $this->data['total'] = $total = $this->vendedor_model->get_total();
        $config = paginator_config($total,site_url("admin/vendedor/index"), 30);
        $this->pagination->initialize( $config );
        $this->data['links'] = "<div class='pagination'>".$this->pagination->create_links()."</div>";
        $data = array('limit' => $config['per_page'],'start'=> (int)$this->data['page']);
        
        //DATOS A DESPLEGAR
        $this->data['arrInfo'] = $this->vendedor_model->get_data_list($data);
        
        $this->layout->view('cat/vendedor/index', $this->data);
    }
    
    
    private function validateForm(){
        return true;
    }
    
}
