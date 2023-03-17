<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends MAX_Controller {

	function __construct()
    {
        parent::__construct();
    }
	public function index()
	{
		$data['title_name'] = 'หน้าหลัก ';
		$data['view_file'] = 'index';
		$data['module'] = 'site';

		
		echo Modules::run('templates/frontend', $data);
	}
}
