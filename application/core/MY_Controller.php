<?php
class MY_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        
        $this->db->query("SET NAMES 'utf8'");
        $this->admin_controller = $this->uri->segment(2); //controller - directorio
        $this->admin_method = $this->uri->segment(3); //metodo        
        
        $this->web_controller = ($this->uri->segment(1))? $this->uri->segment(1) : "app" ;
        $this->web_method = ($this->uri->segment(2))? $this->uri->segment(2) : "index";
                
        
        /*if($seg1 == "admin" and $seg2==""){
            redirect("admin/index");
        }*/
        
    }
}