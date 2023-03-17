<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Templates extends MAX_Controller {

	/**
	 * โปรแกรมนี้จัดทำโดย นายเยาวรัตน์  ช่างสลัก
	 * ติดต่อสอบถามรายละเอียด โทร.0890167912 โทร.ทบ. 65207 Email: max_kai@hotmail.com
	 * บริจาคได้ที่ KKP Start Saving
	 * เลขที่บัญชี 2003219197
	 * ชื่อบัญชี นาย เยาวรัตน์ ช่างสลัก
	 * สาขา อโศก
	 */
	public function __construct()
	{
		parent::__construct();
	}
	function frontend($data)
	{
		$data['site_title'] = $this->config->item('app');
		$data['description'] = 'โปรแกรมงานสารบรรณ ออนไลน์ ศูนย์ฝึกทางยุทธวิธีกองทัพบก , ศฝยว.ทบ., ลพบุรี, ThaiArmy, ทหารลพบุรี, ทหารสารบรรณ, คอสารบรรณ ';
		$data['author'] = $this->config->item('author');
		$data['generator'] = $this->config->item('version');

		$data['breadcrumb'] = [
			'main' => 'หน้าหลัก',
			'sub_main' => $data['title_name'],
			'link' => base_url(''),
		];
		$theme = $this->config->item('theme_frontend');
		$path_theme = FCPATH.'themes/'.$theme;
		
		if (!is_dir($path_theme)) {
			mkdir($path_theme, 0777, true);
		}

		$data['theme'] = base_url('themes/'.$theme);


		$this->load->view('frontend', $data);
	}
}
