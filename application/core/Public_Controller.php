<?php
    class Public_Controller extends MY_Controller
    {
        function __construct()
        {
            parent::__construct();
                        
            $this->layout->setLayout("admin/layout_flat");
            $this->data['flat_dir'] = base_url()."public/theme/flat/";
            
            
        }
    }