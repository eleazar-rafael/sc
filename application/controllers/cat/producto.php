<?php
/**
 * Catalogo de Productos
 *
 * @author Eleazar Rafael 
 */
class producto extends Admin_Controller{
    var $lista = "producto";
    public function __construct()
    {
        parent::__construct();
        $this->load->model("producto_model");     
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
            $id = $this->producto_model->insert( $this->input->post('producto') );
            if( (int)$id > 0 ){                 
                $_SESSION['success'] = "Producto Agregado";
            }else
                $_SESSION['error'] = "Error al Crear Producto";          
            redirect("cat/producto/index");
        }
        $this->getform();
    }
    
    public function update(){
        //set_page($this->list,$page);
        if (($this->input->server('REQUEST_METHOD') == 'POST') && $this->validateForm() ) {
            $producto = $this->input->post('producto');
            $this->producto_model->update($this->input->post('producto'));            
            $_SESSION['success'] = "Producto Editado";
            //$page = get_page($this->lista);
            redirect("cat/producto/index/");//$page/
        }
        $this->getform();
    }
        
    public function delete($page=0){        
        $resp = $this->producto_model->delete( $this->input->get('id') );
        if((int)$resp >0)
            $_SESSION['success'] = "Se borr&oacute; el registro solicitado";
        else
            $_SESSION['error'] = "Cuidado: el registro no existe o se gener&oacute; un error";   
        redirect("cat/producto/index/$page");   
    }
    
    private function getform(){
        
        $page = get_page($this->lista);             
        $this->data['heading_title'] ="Producto / ";
        $this->data['producto'] = $this->producto_model->get_data( $this->input->get('id') );         
        
        $tipo_comision = 6;
        $this->data['cbo_tipo_comision'] = $this->catalogo_model->get_cbo_catalogo($tipo_comision, "-- Ninguna--");        
        
        $id = isset($this->data['producto']['id'])? (int)$this->data['producto']['id'] : 0;        
        if($id == 0){
            $this->data['action'] = "cat/producto/insert/";
            $this->data['heading_title'] .= "Nuevo Registro ";
        }else{
            $this->data['action'] = "cat/producto/update/?id=$id"; 
            $this->data['heading_title'] .= "Editar Registro";
        }                    
        $this->data['cancel'] = site_url("admin/producto/index/".$page);
        
        $this->layout->view('cat/producto/form', $this->data);
        
    }
    
    private function getlist(){
        $this->data['heading_title'] = "Productos ";
        //PAGE, SORT Y ORDER        
        $this->data['list'] =  $this->lista;
        $this->data['page'] =  get_page($this->lista);
        $_sort= get_sort($this->lista);
        
        $this->data['sort'] = ( $_sort['sort'] )? $_sort['sort'] : 'id';
        $this->data['order'] = ($_sort['order'])? $_sort['order'] : 'ASC';
                
        //LINK PARA COLUMNAS
        $url_order = ( $this->data['order'] == 'ASC')? '&order=DESC': '&order=ASC';
        $pre_url = "cat/producto/index?";
        $this->data['sort_id']   = site_url($pre_url."sort=id").$url_order;
        $this->data['sort_nombre']  = site_url($pre_url."sort=nombre").$url_order;
        $this->data['sort_monto_minimo_prestamo']  = site_url($pre_url."sort=monto_minimo_prestamo").$url_order;
        $this->data['sort_monto_maximo_prestamo']  = site_url($pre_url."sort=monto_maximo_prestamo").$url_order;
        $this->data['sort_tipo_comision']  = site_url($pre_url."sort=tipo_comision").$url_order;
        $this->data['sort_comision_apertura']  = site_url($pre_url."sort=comision_apertura").$url_order;
        $this->data['sort_porcen_comision_apertura']  = site_url($pre_url."sort=porcen_comision_apertura").$url_order;
        $this->data['sort_financiamiento_comision']  = site_url($pre_url."sort=financiamiento_comision").$url_order;
        $this->data['sort_plazos_mensuales']  = site_url($pre_url."sort=plazos_mensuales").$url_order;
        $this->data['sort_tasa']  = site_url($pre_url."sort=tasa").$url_order;
        $this->data['sort_tasa_moratoria']  = site_url($pre_url."sort=tasa_moratoria").$url_order;
        $this->data['sort_seguro otros_gastos']  = site_url($pre_url."sort=seguro otros_gastos").$url_order;
                            
        /*monto_minimo_prestamo, monto_maximo_prestamo, tipo_comision, comision_apertura, porcen_comision_apertura, financiamiento_comision
        tasa, plazos_mensuales, tasa_moratoria, seguro, otros_gastos  */                
                
        //PAGINACION
        $this->data['total'] = $total = $this->producto_model->get_total();
        $config = paginator_config($total,site_url("admin/producto/index"), 30);
        $this->pagination->initialize( $config );
        $this->data['links'] = "<div class='pagination'>".$this->pagination->create_links()."</div>";
        $data = array('limit' => $config['per_page'],'start'=> (int)$this->data['page']);
        
        //DATOS A DESPLEGAR
        $this->data['arrInfo'] = $this->producto_model->get_data_list($data);
        
        $this->layout->view('cat/producto/index', $this->data);
    }
    
    
    private function validateForm(){
        return true;
    }
    
}