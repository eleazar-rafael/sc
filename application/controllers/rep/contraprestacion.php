<?php
/**
 * Catalogo de Canales
 *
 * @author Eleazar Rafael 
 */
      
class contraprestacion extends Admin_Controller{
    var $lista = "contraprestacion";
    var $opmenu = 4; //Administracion
    
    public function __construct(){
        parent::__construct();
        $this->load->model("rep_contraprestacion_model");
    }
    
    public function index(){
        if($_POST['filter']) set_filter ($this->lista, $_POST['filter']);
        if($_GET['sort']) set_sort($this->lista, $_GET['sort'], $_GET['order']);
                
        $this->getlist();
    }
    
    
    private function getlist(){
        $this->data['heading_title'] = "Reporte de Contrataprestaciones ";
        //PAGE, SORT Y ORDER        
        $this->data['list'] =  $this->lista;
        $this->data['page'] =  get_page($this->lista);
        $_sort= get_sort($this->lista);
        
        $this->data['sort'] = ( $_sort['sort'] )? $_sort['sort'] : 'Id';
        $this->data['order'] = ($_sort['order'])? $_sort['order'] : 'ASC';
                
        //LINK PARA COLUMNAS
        $url_order = ( $this->data['order'] == 'ASC')? '&order=DESC': '&order=ASC';
        $pre_url = "rep/contraprestacion/index?";
        $this->data['sort_id']   = site_url($pre_url."sort=Id").$url_order;
        $this->data['sort_nombre']  = site_url($pre_url."sort=Nombre").$url_order;
        
                    
        //PAGINACION
        $this->data['total'] = $total = $this->rep_contraprestacion_model->get_total();
        $config = paginator_config($total,site_url("rep/contraprestacion/index"), 50);
        $this->pagination->initialize( $config );
        $this->data['links'] = "<div class='pagination'>".$this->pagination->create_links()."</div>";
        $data = array('limit' => $config['per_page'],'start'=> (int)$this->data['page']);
        
        //DATOS A DESPLEGAR
        $this->data['arrInfo'] = $this->rep_contraprestacion_model->get_data_list($data);
        
        $this->layout->view('rep/contraprestacion_index', $this->data);
    }
    
    
    
    
    
}    