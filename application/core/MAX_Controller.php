<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* load the MX_Loader class */
require APPPATH."third_party/MX/Controller.php";
// require APPPATH."modules/auth/libraries/check_user_login.php";

class MAX_Controller extends MX_Controller {
    
    public    $ci;
    function __construct($db_group='default')
    {
        parent::__construct();

        $ci =& get_instance();
        $this->db = $ci->load->database($db_group, TRUE);
        $ci->load->helper(['form','app_helper','language','url','my_helper']);
        $ci->load->library(['form_validation','javascript','session','security','dynamic_menu']);

        set_default_language();
        $language  = $this->session->userdata('languages');
        if($language == 'th'){
            $languages = $this->lang->load('app', 'th');
        }else{ 
            $languages = $this->lang->load('app', 'en');         
        }

        
    }
}