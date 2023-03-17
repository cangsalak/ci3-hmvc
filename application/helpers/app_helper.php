<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

    function default_language()
    {
        $ci =& get_instance();
        $config_languages = $ci->config->item('language'); 
        $language  = $ci->session->userdata('languages');

        if($language == $config_languages || $language == ''){
            $languages = $ci->lang->load('app', 'th');
        }else{ 
            $languages = $ci->lang->load('app', 'en');         
        }
        return $languages;
    } 
    
    function default_theme()
    {
        $ci =& get_instance();
        $theme = $ci->session->userdata('theme');
        if($theme == "bootstrap5"){
           $ci->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        }else if($theme == "bootstrap3"){
           $ci->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        }else if( $theme == 'semantic2'){
            $ci->form_validation->set_error_delimiters('<div class="ui pointing red basic label">', '</div>');
        }else{
           $ci->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        }
    }