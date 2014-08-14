<?php

class App extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("sis_usuario_model");
        $this->load->model("sis_perfil_model");
        
    }
    
    public function index()
    {     
        $this->data['arrUser'] =  $this->session->userdata("arrUser");
        if(!$this->data['arrUser']){            
            $this->login();
        }else{
            redirect("admin/home/index",$this->data); //rect $this->layout->view('admin/app/index', $this->data);            
        }         
    }
    
    /*function login(){
        $post = $this->input->post('login');
        if($post['username'] and $post['password'])
        {  
            
            $arrUser =  $this->sis_usuario_model->get_user($post['username'],$post['password']);
           
            if($arrUser){
                $this->session->set_userdata("arrUser",$arrUser);                
                redirect("admin/app/index");				
            }
        }        
        $this->load->view('login', $this->data);
    }*/    
    public function login()
    {        
        $post = $this->input->post('login');
        if($post){
            //pre($post,'--POST'); die();
            if( $post['usuario'] =="demo" and $post['contrasena'] =="supply2014" ){
                $usuario = array('user'=>'1');
                $this->session->set_userdata("arrUser", $usuario);
                redirect("admin/home/index");
            }
            
            $this->data['error_warning'] = 'Nombre de usuario o password incorrecto ';
        }        
        $this->load->view('login', $this->data);        
    }
    
    
    public function logout()
    {   
        $this->session->set_userdata("arrUser", null);
        $this->load->view('login');
    }
    
}    
