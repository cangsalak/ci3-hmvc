<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends MAX_Controller {

	public function index()
	{
		$ddata['pageTitle'] = 'cangsalak';
		$this->set_layout->_home(['pageContant' => 'index']);
	}
	public function change_theme()
	{
		$theme =  $this->input->get('theme');

		$this->session->set_userdata('theme', $theme);
	}

}
