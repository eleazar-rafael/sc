<?php

class Home extends Admin_Controller {
    
    public function __construct()
    {
       parent::__construct();
       
    }
	
    function index()
    {
        $this->data['titulo'] = "Inicio";
        $this->layout->view('admin/home', $this->data);		
        
    }
    
    function buscar_cliente($cliente_id){
        
    }
    
}    
