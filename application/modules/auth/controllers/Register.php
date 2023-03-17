<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends MAX_Controller {

	function __construct()
    {
        parent::__construct();
    }
	public function index()
	{
		$data['title_name'] = lang('register');
		$data['view_file'] = 'index';
		$data['module'] = 'auth/register';

		
		echo Modules::run('templates/login', $data);
	}
}
