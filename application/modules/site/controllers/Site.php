<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends MAX_Controller {

	public function index()
	{
		$this->load->view('index');
	}
}
