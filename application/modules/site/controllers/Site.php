<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends MAX_Controller {

	public function index()
	{
		$data['title_name'] = 'หน้าหลัก ';
		$data['view_file'] = 'index';
		$data['module'] = 'site';

		
		echo Modules::run('templates/frontend', $data);
	}
	public function change_theme()
	{
		$theme =  $this->input->get('theme');

		$this->session->set_userdata('theme', $theme);
	}

	public function change_languages()
	{
		$language =  $this->input->get('language');

		$this->session->set_userdata('languages', $language);
	}

}
