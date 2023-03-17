<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

    function set_default_language()
    {
        $ci =& get_instance();
        
        if(empty($ci->session->userdata('languages'))){
            $language = $ci->session->set_userdata(['languages'  => $ci->config->item('language')]);
        }else{
            $language = $ci->session->userdata('languages');
        }
        // var_dump($ci->session->userdata('languages'));
        return $language;
    }
