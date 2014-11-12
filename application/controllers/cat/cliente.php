<?php
/**
 * Catalogo de Cliente
 *
 * @author Eleazar Rafael 
 */
class cliente extends Admin_Controller{
    var $lista = "cliente";
    var $opmenu = 2; //Cliente
    public function __construct()
    {
        parent::__construct();
        $this->load->model("cliente_model");
        $this->load->model("contrato_model");
        $this->load->model("direccion_model");
        $this->load->model("contacto_model");
        $this->load->model("empleo_model");
        $this->load->model("tarjeta_debito_model");
        $this->load->model("referencia_model");
        /*$this->load->model("cliente_tipo_empleado_model");
        
        
        */
        
    }
    
    public function index($page=0){
         set_page($this->lista,$page);
        if($_POST['filter']) set_filter ($this->lista, $_POST['filter']);
        if($_GET['sort']) set_sort($this->lista, $_GET['sort'], $_GET['order']);
        
        $this->layout->view('cat/cliente/index', $this->data);        
    }
    
    
    public function search($page=0){
        set_page($this->lista,$page);
        if($_POST['filter']) set_filter ($this->lista, $_POST['filter']);
        if($_GET['sort']) set_sort($this->lista, $_GET['sort'], $_GET['order']);
        
        //pre($_POST);
        
        
        //$this->layout->view('cat/cliente/search', $this->data);
        $this->getlist();
    }
    
    public function insert(){
        if (($this->input->server('REQUEST_METHOD') == 'POST') && $this->validateForm() ) {
            $btn = $this->input->post('btn_cliente');
            $cliente = $this->input->post('cliente');            
            $cliente['fecha_nacimiento'] = agrupar_fecha( $this->input->post('fnac') );            
            $id = $this->cliente_model->insert( $cliente );
            if( (int)$id > 0 ){ 
                if($btn == "btn_cliente") $this->cliente_model->insert_pool_cliente( $id );
                $_SESSION['success'] = "Cliente Agregado";
            }else
                $_SESSION['error'] = "Error al Crear Cliente";
          
            redirect("cat/cliente/index");
        }
        $this->getform();
    }
    
    public function update(){        
        if (($this->input->server('REQUEST_METHOD') == 'POST') && $this->validateForm() ) {
            $cliente = $this->input->post('cliente');            
            $cliente['fecha_nacimiento'] = agrupar_fecha( $this->input->post('fnac') );
            $this->cliente_model->update($this->input->post('cliente'));
            
            $_SESSION['success'] = "Cliente Editado";            
            redirect("cat/cliente/index/");
        }
        $this->getform();
    }
           
    public function delete($page=0){        
        $resp = $this->cliente_model->delete( $this->input->get('id') );
        if((int)$resp >0)
            $_SESSION['success'] = "Se borr&oacute; el registro solicitado";
        else
            $_SESSION['error'] = "Cuidado: el registro no existe o se gener&oacute; un error";   
        redirect("cat/cliente/index/$page");   
    }
    public function view(){
        //$id = $this->input->get('id');
        if( $id = $this->input->get('id') ){
            $_SESSION[$this->lista]['id'] = $id;            
        }
        
        if(!$_SESSION[$this->lista]['id']){
            redirect("cat/cliente/search");
        }
        
        $this->data['cliente'] = $this->cliente_model->get_data( $_SESSION[$this->lista]['id'] );
        $_SESSION[$this->lista]['nombre'] = $this->data['cliente']['nombre']." ".$this->data['cliente']['apellido_paterno']." ".$this->data['cliente']['apellido_materno'];
        //pre($this->data['cliente']);
        $this->data['cbo_nacionalidad'] = $this->catalogo_model->get_cbo_nacionalidad();
        $this->data['cbo_pais'] = $this->catalogo_model->get_cbo_pais();        
        $this->data['cbo_estadocivil'] = $this->catalogo_model->get_cbo_estadocivil();
        $this->data['cbo_regimenpatrimonial'] = $this->catalogo_model->get_cbo_regimenpatrimonial();
        $this->data['cbo_maximo_gradoestudio'] = $this->catalogo_model->get_cbo_gradoestudio();
        $this->data['cbo_regimenfiscal'] = $this->cliente_model->get_cbo_regimenfiscal();
        
        $tipo_identificacion = 9;
        $this->data['cbo_tipo_identificacion'] = $this->catalogo_model->get_cbo_catalogo($tipo_identificacion);    
        
        $this->layout->view('cat/cliente/view', $this->data);  
    }
    private function getform(){
        
        $page = get_page($this->lista);             
        $this->data['heading_title'] ="Cliente / ";
        $this->data['cliente'] = $this->cliente_model->get_data( $this->input->get('id') );     
        //pre($this->data['cliente'],'--CLIENTE --');
        $this->data['cbo_fnac_anio'] = cbo_anio("[A&Ntilde;O]",date("Y")-100, date("Y")-15);
        $this->data['cbo_fnac_mes'] = cbo_mes("[MES]");
        $this->data['cbo_fnac_dia'] = cbo_dia("[DIA]");
        
        $this->data['cbo_nacionalidad'] = $this->catalogo_model->get_cbo_nacionalidad("--Seleccione--");
        $this->data['cbo_pais'] = $this->catalogo_model->get_cbo_pais("--Seleccione--");        
        $this->data['cbo_estadocivil'] = $this->catalogo_model->get_cbo_estadocivil("--Seleccione--");
        $this->data['cbo_regimenpatrimonial'] = $this->catalogo_model->get_cbo_regimenpatrimonial("--Seleccione--");
        $this->data['cbo_maximo_gradoestudio'] = $this->catalogo_model->get_cbo_gradoestudio("--Seleccione--");
        $this->data['cbo_regimenfiscal'] = $this->cliente_model->get_cbo_regimenfiscal();
        
        $tipo_identificacion = 9;
        $this->data['cbo_tipo_identificacion'] = $this->catalogo_model->get_cbo_catalogo($tipo_identificacion, "-- Seleccione--");        
        
        $id = isset($this->data['cliente']['id'])? (int)$this->data['cliente']['id'] : 0;        
        if($id == 0){
            $this->data['action'] = "cat/cliente/insert/";
            $this->data['heading_title'] .= "Nuevo Registro ";
        }else{
            $this->data['action'] = "cat/cliente/update/?id=$id"; 
            $this->data['heading_title'] .= "Editar Registro";
        }
        $this->data['cancel'] = site_url("admin/cliente/index/".$page);
        
        $this->layout->view('cat/cliente/form', $this->data);
        
    }
    
    
    
    private function getlist(){
        $this->data['heading_title'] = "BUSCAR CLIENTES ";
        //PAGE, SORT Y ORDER        
        $this->data['list'] =  $this->lista;
        $this->data['page'] =  get_page($this->lista);
        $_sort= get_sort($this->lista);
        
        $this->data['sort'] = ( $_sort['sort'] )? $_sort['sort'] : 'id';
        $this->data['order'] = ($_sort['order'])? $_sort['order'] : 'ASC';
                
        //LINK PARA COLUMNAS
        $url_order = ( $this->data['order'] == 'ASC')? '&order=DESC': '&order=ASC';
        $pre_url = "cat/cliente/index?";
        $this->data['sort_id']   = site_url($pre_url."sort=id").$url_order;
        $this->data['sort_nombre']  = site_url($pre_url."sort=nombre").$url_order;
        $this->data['sort_apellido_paterno']  = site_url($pre_url."sort=apellido_paterno").$url_order;
        $this->data['sort_apellido_materno']  = site_url($pre_url."sort=apellido_materno").$url_order;
        $this->data['sort_rfc']  = site_url($pre_url."sort=rfc").$url_order;
        $this->data['sort_curp']  = site_url($pre_url."sort=curp").$url_order;
                    
                
        //PAGINACION
        $this->data['total'] = $total = $this->cliente_model->get_total();
        $config = paginator_config($total,site_url("cat/cliente/search"), 30);
        $this->pagination->initialize( $config );
        $this->data['links'] = "<div class='pagination'>".$this->pagination->create_links()."</div>";
        $data = array('limit' => $config['per_page'],'start'=> (int)$this->data['page']);
        
        //DATOS A DESPLEGAR
        $this->data['arrInfo'] = $this->cliente_model->get_data_list($data);
        
        $this->layout->view('cat/cliente/search', $this->data);
    }
    
    
    function ajax_fnac_dia($anio, $mes, $dia){
        echo form_dropdown("fnac[dia]", cbo_dia("[DIA]",$anio, $mes), $dia," id='fnac_dia' class='form-control' " ); 
    }
    
    function ajax_estado($pais){
        echo form_dropdown("cliente[estado_nacimiento]", $this->catalogo_model->get_cbo_estado("--Seleccione--",$pais),  0," id='estado_nacimiento' class='form-control ' " );
    }
    
    function ajax_ciudad($estado){
        echo form_dropdown("cliente[ciudad_nacimiento]", $this->catalogo_model->get_cbo_ciudad("--Seleccione--",$estado), 0," id='estado_nacimiento' class='form-control '");
    }
    
    private function validateForm(){
        return true;
    }
    
}