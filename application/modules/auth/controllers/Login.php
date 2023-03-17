<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MAX_Controller {

	function __construct()
    {
        parent::__construct();
    }
	public function index()
	{
		$data['title_name'] = lang('login');
		$data['view_file'] = 'index';
		$data['module'] = 'auth/login';

		
		echo Modules::run('templates/login', $data);
	}
}
