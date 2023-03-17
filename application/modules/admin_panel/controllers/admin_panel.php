<?php

// If access is requested from anywhere other than index.php then exit
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH."libraries/check_user_login.php";
/*
 |--------------------------------------------------------------------------
 |	CONTROLLER SUMMARY AND DATABASE TABLES
 |--------------------------------------------------------------------------
 | 
 |	This is where you can start your admin/manage/password protected stuff.
 |
 |	Database table structure
 |
 |	Table name(s) - no tables
 |
 |
 */
 
 
class Admin_Panel extends MAX_Controller {

	function __construct() {
		parent::__construct();
		
		// Check login and make sure email has been verified
		var_dump($this->session->userdata());
		check_user_login();
	}

    function index() {
		$data['user_id'] = $this->session->userdata['user_id'];
		$data['username'] = $this->session->userdata['username'];
		$data['account_type'] = $this->session->userdata['account_type'];
		$data['logged_in_since'] = $this->session->userdata['logged_in_since'];
		
		
		$data['title_name'] = lang('admin');
		$data['view_file'] = 'admin_panel_default';
		$data['module'] = 'admin_panel';
		$data['meta_description'] = "Welcome to the admin panel";
		echo Modules::run('templates/login', $data);
    }
}
