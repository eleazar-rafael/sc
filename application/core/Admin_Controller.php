<?php
class Admin_Controller extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
                
        //$this->layout->setLayout("app/layout_default");
        $this->layout->setLayout("app/layout_fastcredit");
        
        $this->data['arrUser'] =  $this->session->userdata("arrUser");
        if(!$this->data['arrUser']) redirect("app/index");
        
        $this->load->model("catalogo_model");
        
        //WARNING Y SUCCESS
        $this->data['error_warning'] = "";        
        $this->data['success'] = "";

        if (isset($_SESSION['success'])) {
            $this->data['success'] = $_SESSION['success'];
            unset($_SESSION['success']);
        }        
        if (isset($_SESSION['error'])) {
            $this->data['error_warning'] = $_SESSION['error'];
            unset($_SESSION['error']);
        }
        
        //$this->admin_menu = $this->menu_model->get_menu_principal();        
        //$this->set_permisos();
    }
    
    
    
    function set_permisos(){
        
        $permiso = $_SESSION['permisos']['admin'][$this->controller];
        //$this->data['permiso'] = $_SESSION[$this->controller];
        $add = (!$permiso['insert'] and !$permiso['create'])? "display:none!important;":"";
        $edit = (!$permiso['update'])? "display:none!important;":"";
        $add_edit = (!$permiso['insert'] and !$permiso['update'])? "display:none!important;":"";
        $delete = (!$permiso['delete'])? "display:none!important;":"";
        $view = (!$permiso['view'])? "display:none!important;":"";
        $edit_view = (!$permiso['view'] and !$permiso['update'])? "display:none!important;":"";
        
        
        $this->data['permiso_css'] = "<style> .p-add{".$add."} .p-edit{".$edit."} .p-add-edit{".$add_edit."} .p-delete{".$delete."} .p-view{".$view."} .p-edit-view{".$edit_view."}</style>";
        
        
        //pre( $permiso,' ---'.$this->controller.'--- ');
    }
    
    

}
