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
    if ( ! function_exists('get_client_ip')) {

        function get_client_ip() {
            $ipaddress = '';
            if (isset($_SERVER['HTTP_CLIENT_IP']))
                $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
            else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
                $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
            else if(isset($_SERVER['HTTP_X_FORWARDED']))
                $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
            else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
                $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
            else if(isset($_SERVER['HTTP_FORWARDED']))
                $ipaddress = $_SERVER['HTTP_FORWARDED'];
            else if(isset($_SERVER['REMOTE_ADDR']))
                $ipaddress = $_SERVER['REMOTE_ADDR'];
            else
                $ipaddress = 'UNKNOWN';
            return $ipaddress;
        }
    }

    if ( ! function_exists('get_client_user_agent')) {

        function get_client_user_agent($state='full', $custom_agent=false) {
            $agent = $custom_agent===false ? $_SERVER['HTTP_USER_AGENT'] : $custom_agent;
            // Detect Device/Operating System
            if(preg_match('/Linux/i',$agent)) $os = 'Linux';
            elseif(preg_match('/Mac/i',$agent)) $os = 'Mac';
            elseif(preg_match('/iPhone/i',$agent)) $os = 'iPhone';
            elseif(preg_match('/iPad/i',$agent)) $os = 'iPad';
            elseif(preg_match('/Droid/i',$agent)) $os = 'Droid';
            elseif(preg_match('/Unix/i',$agent)) $os = 'Unix';
            elseif(preg_match('/Windows/i',$agent)) $os = 'Windows';
            else $os = 'Unknown';
            // Browser Detection
            if(preg_match('/Firefox/i',$agent)) $br = 'Firefox';
            elseif(preg_match('/Mac/i',$agent)) $br = 'Mac';
            elseif(preg_match('/Chrome/i',$agent)) $br = 'Chrome';
            elseif(preg_match('/Opera/i',$agent)) $br = 'Opera';
            elseif(preg_match('/MSIE/i',$agent)) $br = 'IE';
            else $br = 'Unknown';

            switch ($state){
                default:case 'full':$content = $agent;break;
                case 'os':$content = $os;break;
                case 'br':$content = $br;break;
                case 'array':$content = array('br'=>$br,'os'=>$os,'full'=>$agent);break;
            }
            return $content;
        }
    }

    if ( ! function_exists('get_client_user_ip_agent_identity')) {

        function get_client_user_info($state=null) {
            $user_ip = get_client_ip();
            $browser = get_client_user_agent();
            $user_cart_ident = compress_text($user_ip.$browser);
            switch ($state){
                default:
                case 'full':
                    $result = array('ip'=>$user_ip, 'browser'=>$browser, 'ident'=>$user_cart_ident);
                    break;
                case 'ip':
                    $result = $user_ip;
                    break;
                case 'browser':
                    $result = $browser;
                    break;
            }
            return $result;
        }
    }

    if ( ! function_exists('set_session')) {
        /** Display an error according to an error code */
        function set_session($session_name, $params) {
            $ci =& get_instance();
            return $ci->session->set_userdata($session_name, $params);
        }
    }

    if (!function_exists('get_file_time_modified')) {
        /**
         * @param $file
         * @param string $format
         * @return bool|false|string
         */
        function get_file_time_modified($file, $format = 'Y-m-d H:i:s')
        {
            clearstatcache();
            if (!file_exists($file))
                return false;

            $time = filemtime($file);
            return date($format, $time);
        }
    }

    if (!function_exists('get_dir_files_info')) {
        /**
         * @param null $add
         * @return array
         */
        function get_dir_files_info($add = null)
        {

            $dir_path = $_SERVER['DOCUMENT_ROOT'];
            $files = scan_dir($dir_path . $add);

            $dir_arr = array();

            foreach ($files as $file) {
                if (file_exists($dir_path . $add . '/' . $file) && $file != '.' && $file != '..' && substr($file, 0, 2) != '__') {

                    if (is_dir($dir_path . $add . '/' . $file)) {
                        $data_dirs = get_dir_files_info($add . '/' . $file);
                        if (is_array($data_dirs) && !empty($data_dirs)) {
                            $dir_arr = array_merge($dir_arr, $data_dirs);
                        }
                    } else {
                        $date_modified = get_file_time_modified($dir_path . $add . '/' . $file);
                        $file_data_info = get_file_info_pd($file, 'all');
                        $file_info = array(
                            'address' => $add . '/',
                            'full_address' => base_url() . $add . '/' . $file,
                            'date_modified' => $date_modified,
                            'content_type' => get_file_content_type($file_data_info['extension'])
                        );
                        $file_info = array_merge($file_info, $file_data_info);

                        $dir_arr[] = $file_info;
                    }
                }
            }

            return $dir_arr;
        }
    }

    if (!function_exists('scan_dir')) {

        /**
         * @param $dir
         * @param bool $just_dir
         * @return array|bool
         */
        function scan_dir($dir, $just_dir=FALSE){
            if( file_exists($dir) ) {
                $files = scandir($dir);
                natcasesort($files);
                $new_file = array();
                if($just_dir && sizeof($files)>2){
                    foreach($files as $key=> $file) {
                        clearstatcache();
                        if ($file != '.' && $file != '..' && is_dir($dir . '/' . $file))
                            $new_file[] = $file;
                    }
                    return $new_file;
                }
                return $files;
            }
            return false;

        }
    }
    if (!function_exists('checkdir')) {

        function checkdir($address){

            $full_address_dir = FCPATH;
            foreach (explode('/',trim($address,'/')) as $item) {
                $full_address_dir .= $item.'/';
                if (!is_dir($full_address_dir)) {
                    $oldmask = umask(0);
                    mkdir($full_address_dir, 0777);
                    umask($oldmask);
                }
            }
        }

    }
    if ( ! function_exists('link_tag'))
    {
        /**
         * Link
         *
         * Generates link to a CSS file
         *
         * @param	mixed	stylesheet hrefs or an array
         * @param	string	rel
         * @param	string	type
         * @param	string	title
         * @param	string	media
         * @param	bool	should index_page be added to the css path
         * @return	string
         */
        function link_tag($href = '', $rel = 'stylesheet', $type = 'text/css', $title = '', $media = '', $index_page = FALSE)
        {
            $CI =& get_instance();
            $link = '<link ';

            if (is_array($href))
            {
                foreach ($href as $k => $v)
                {
                    if ($k === 'href' && ! preg_match('#^([a-z]+:)?//#i', $v))
                    {
                        if ($index_page === TRUE)
                        {
                            $link .= 'href="'.$CI->config->site_url($v).'" ';
                        }
                        else
                        {
                            $link .= 'href="'.$CI->config->base_url($v).'" ';
                        }
                    }
                    else
                    {
                        $link .= $k.'="'.$v.'" ';
                    }
                }
            }
            else
            {
                if (preg_match('#^([a-z]+:)?//#i', $href))
                {
                    $link .= 'href="'.$href.'" ';
                }
                elseif ($index_page === TRUE)
                {
                    $link .= 'href="'.$CI->config->site_url($href).'" ';
                }
                else
                {
                    $link .= 'href="'.$CI->config->base_url($href).'" ';
                }

                $link .= 'rel="'.$rel.'" type="'.$type.'" ';

                if ($media !== '')
                {
                    $link .= 'media="'.$media.'" ';
                }

                if ($title !== '')
                {
                    $link .= 'title="'.$title.'" ';
                }
            }

            return $link."/>\n";
        }
    }
