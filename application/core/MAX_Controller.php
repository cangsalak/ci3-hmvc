<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* load the MX_Loader class */
require APPPATH."third_party/MX/Controller.php";

class MAX_Controller extends MX_Controller {
    
    public    $ci;
    function __construct($db_group='default')
    {
        parent::__construct();

        $this->ci =& get_instance();
        $this->db = $this->ci->load->database($db_group, TRUE);
        $this->ci->load->helper(['form','app_helper','language','url']);
        $this->ci->load->library(['form_validation','javascript']);
        $this->ci->load->library(['security','session']);

        
        set_default_language();
        $language  = $this->session->userdata('languages');
        if($language == 'th'){
            $languages = $this->lang->load('app', 'th');
        }else{ 
            $languages = $this->lang->load('app', 'en');         
        }

        
    }
}