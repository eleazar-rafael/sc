<?php

//class App extends CI_Controller {
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
}    
