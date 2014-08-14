<?php

//class App extends CI_Controller {
class App extends Admin_Controller {
    
    public function __construct()
    {
       parent::__construct();
       //$this->layout->setLayout("layout/admin_dever");
       //$this->load->model("persona_model","Usuario");
       $this->load->library('grocery_CRUD'); 
    }
	
    function index()
    {
        $this->data['titulo'] = "Dashsboard";
        $this->layout->view('admin/app/home', $this->data);		
        
    }
    
    function cliente(){
        $crud = new grocery_CRUD();
        
        
        
        $crud->set_table('entity');
        $crud->set_subject('Cliente');
        $crud->set_title('Listado de Clientes');
        //$crud->display_as('periodo_estatus_tipo_id','Estatus')->set_relation('periodo_estatus_tipo_id','periodo_estatus_tipo','nombre', array('borrado'=>0));
        $crud->columns('FirstName','LastName','LastNameTwo','Sex','Nationality','Dependent','BirthDate','BirthPlace','CivilState','RFC','LicenseNumber');
        //$crud->unset_delete();
        $crud->unset_print();
        $crud->unset_export();
        $crud->unset_read();        
        //$crud->unset_edit(); 
        //$crud->add_action('Detalles del a&ntilde;o', base_url().'public/images/icons/folder_table.png', 'admin/periodo_mensual/index','btn-detalle');
        //$crud->add_action("Editar", array('text'=>'<i class="icon-edit"></i>'), 'admin/app/cliente/edit','btn btn-small btn-info');
        
        $output = $crud->render();        
        $this->data['gcrud'] = $output;
        
        $this->layout->view('admin/app/cliente',$this->data);  
    }
    
  
	
    function flexigrid(){
        $this->data['css'] .= link_tag("public/theme/flat/js/plugins/flexigrid/css/flexigrid.css");
        $this->data['script'] .= script_tag("public/theme/flat/js/plugins/flexigrid/js/flexigrid.js");
        
        $this->layout->view('admin/app/flexigrid',$this->data);  
    }
    
    /*function login()
    {		
        if($_POST['username'] and $_POST['password']){
            $arrUser =  $this->Usuario->get_user($_POST['username'],$_POST['password']);
            if($arrUser){
                $this->session->set_userdata("arrUser",$arrUser);
                redirect("admin/app/home");
            }
        }
        
        $this->index();
    }*/
		
    function home()
    {
        $this->data['arrUser'] = $this->session->userdata("arrUser");		 
        if($this->data['arrUser']){
            //$vista = strtolower($this->data['arrUser']['tipo_usuario']);
            $this->layout->view('admin/app/home',$this->data);
        }else{
            $this->index();
        }
    }
	
	
    function datosPrincipales()
    {

    }
	
    function filebrowser()
    {   
        $this->load->helper('directory');
        $map = directory_map('./public/upload/images');

        echo "busqueda de imagenes";
        pre($map);
    }

    function logout(){
        $this->session->set_userdata("arrUser",null);		
        $this->index();
    }
	
}
