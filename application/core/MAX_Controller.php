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
        $this->ci->load->helper('form','app_helper');
        $this->ci->load->library('form_validation');
        $this->ci->load->library(['security','session','Set_layout']);


         $theme = $this->session->userdata('theme');
        if($theme == "bootstrap5"){
           $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        }else if($theme == "bootstrap3"){
           $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        }else if( $theme == 'semantic2'){
            $this->form_validation->set_error_delimiters('<div class="ui pointing red basic label">', '</div>');
        }else{
           $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        }
    }

}