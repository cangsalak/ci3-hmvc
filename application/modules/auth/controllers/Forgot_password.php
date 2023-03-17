<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot_password extends MAX_Controller {

	function __construct()
    {
        parent::__construct();
    }
	public function index()
	{
		$data['title_name'] = 'หน้าหลัก ';
		$data['view_file'] = 'index';
		$data['module'] = 'auth/Forgot_password';

		
		echo Modules::run('templates/login', $data);
	}
}
