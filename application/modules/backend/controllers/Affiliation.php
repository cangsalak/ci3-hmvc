<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* dev : cangsalak*/
/* fb : https://facebook.com/maxcangsalak*/
/* fanspage : https://web.facebook.com/maxcangsalak*/
/* Generate By Max-CRUD Generator 05/10/2022 20:02:32*/
/**
	 * โปรแกรมนี้จัดทำโดย นายเยาวรัตน์  ช่างสลัก
	 * ติดต่อสอบถามรายละเอียด โทร.0890167912 โทร.ทบ. 65207 Email: max_kai@hotmail.com
	 * บริจาคได้ที่ KKP Start Saving
	 * เลขที่บัญชี 2003219197
	 * ชื่อบัญชี นาย เยาวรัตน์ ช่างสลัก
	 * สาขา อโศก
*/
/* Location: ./application/modules/backend/controllers/Affiliation.php*/
/* Please DO NOT modify this information */


//************************************ประกาศ Class************************************\\ \\
class Affiliation extends Backend{
  private $title = "สังกัด/หน่วยงาน";  //ประกาศตัวแปล title (เป็นภาษาไทย หรือ อังกฤษ ก็ได้)

  public function __construct() // ประกาศฟังชั่น __construct ให้ทำงานอัตโนมัติ เมื่อเรียกใช้งาน Module
  {
    date_default_timezone_set("Asia/Bangkok");
    $time = date("d-m-Y_H-i-s");

    $config = array(
      'title' => $this->title,
      'time'=>$time,
     );
    parent::__construct($config);
    $this->load->model("Affiliation_model","model");
  }

  //************************************ประกาศ Table************************************\\ \\
  function _rules()
  {
    
		$this->form_validation->set_rules('af_sname', cclang('Af Sname'), 'trim|xss_clean|required');
		$this->form_validation->set_rules('af_fname', cclang('Af Fname'), 'trim|xss_clean|required');
		$this->form_validation->set_rules('af_address', cclang('Af Address'), 'trim|xss_clean');
		$this->form_validation->set_rules('af_web', cclang('Af Web'), 'trim|xss_clean');
		$this->form_validation->set_rules('af_social', cclang('Af Social'), 'trim|xss_clean');
		$this->form_validation->set_rules('af_tel', cclang('Af Tel'), 'trim|xss_clean|numeric');
		$this->form_validation->set_rules('af_created_at', cclang('Af Created At'), 'trim|xss_clean');
		$this->form_validation->set_rules('af_update_at', cclang('Af Update At'), 'trim|xss_clean');
		$this->form_validation->set_error_delimiters('<i class="text-danger" style="font-size:11px">', '</i>');
  }

  function index()
  {
    $this->is_allowed('affiliation_list'); //เรียกการเข้าถึงของข้อมูล
    $this->template->set_title("$this->title"); // ประกาศ Title Page
    $this->template->view("content/affiliation/index"); //เรียกการทำงานของ view
  }

  //************************************การแสดงข้อมูล************************************\\ \\
  function json()
  {
    if ($this->input->is_ajax_request()) {
      if (!is_allowed('affiliation_list')) {
        show_error("Access Permission", 403,'403::Access Not Permission');
        exit();
      }

      $rows = $this->model->get_datatables();
      $data = array();
      foreach ($rows as $get) {
          $row = array();
					$row[] = $get->af_sname;
					$row[] = $get->af_fname;
					$row[] = $get->af_social;
					$row[] = $get->af_tel;
          $row[] = '
                      <div class="btn-group" role="group" aria-label="Basic">
                          <a href="'.url("affiliation/detail/".enc_url($get->af_id)).'" id="detail" class="btn btn-primary" title="'.cclang("detail").'">
                            <i class="ti-file"></i>'.cclang("detail").'
                          </a>
                          <a href="'.url("affiliation/update/".enc_url($get->af_id)).'" id="update" class="btn btn-warning" title="'.cclang("update").'">
                            <i class="ti-pencil"></i>'.cclang("update").'
                          </a>
                          <a href="'.url("affiliation/delete/".enc_url($get->af_id)).'" id="delete" class="btn btn-danger" title="'.cclang("delete").'">
                            <i class="ti-trash"></i>'.cclang("delete").'
                          </a>
                        </div>
                   ';

          $data[] = $row;
      }

      $output = array(
                      "draw" => $_POST['draw'],
                      "recordsTotal" => $this->model->count_all(),
                      "recordsFiltered" => $this->model->count_filtered(),
                      "data" => $data,
              );
      //output to json format
      return $this->response($output);
    }
  }


  //************************************การกรอง************************************\\ \\
  function filter()
  {
    $this->template->view("content/affiliation/filter",[],false);
  }

  //************************************การโชว์ข้อมูล************************************\\ \\
  function detail($id = null)
  {
    $this->is_allowed('affiliation_detail');
    if ($row = $this->model->find(dec_url($id))) {
      $this->template->set_title(cclang("detail")." $this->title");
      $data = array(
										'af_sname' => $row->af_sname,
										'af_fname' => $row->af_fname,
										'af_address' => $row->af_address,
										'af_web' => $row->af_web,
										'af_social' => $row->af_social,
										'af_tel' => $row->af_tel,
										'af_created_at' => dateTimeFormat($row->af_created_at),
										'af_update_at' => dateTimeFormat($row->af_update_at),
                    );
      $this->template->view("content/affiliation/detail",$data);
    }else {
      $this->error404();
    }
  }


  //************************************หน้าเพิ่มข้อมูล************************************\\ \\
  function add()
  {
    $this->is_allowed('affiliation_add');
    $this->template->set_title(cclang("add")." $this->title");
    $data = array('action' => url("affiliation/add_action"),
                  'params' => "add",
									'af_sname' => set_value('af_sname'),
									'af_fname' => set_value('af_fname'),
									'af_address' => set_value('af_address'),
									'af_web' => set_value('af_web'),
									'af_social' => set_value('af_social'),
									'af_tel' => set_value('af_tel'),
									'af_created_at' => set_value('af_created_at'),
									'af_update_at' => set_value('af_update_at'),
                  );
    $this->template->view("content/affiliation/form",$data);
  }


  //************************************การเพิ่มข้อมูล************************************\\ \\
  function add_action()
  {
    if($this->input->is_ajax_request()){
      if (!is_allowed('affiliation_add')) {
        show_error("Access Permission", 403,'403::Access Not Permission');
        exit();
      }

      $json = array('success' => false, "alert" => array());
      $this->_rules();
      if ($this->form_validation->run()) {
				$save_data['af_sname'] = $this->input->post('af_sname',true);
				$save_data['af_fname'] = $this->input->post('af_fname',true);
				$save_data['af_address'] = $this->input->post('af_address',true);
				$save_data['af_web'] = $this->input->post('af_web',true);
				$save_data['af_social'] = $this->input->post('af_social',true);
				$save_data['af_tel'] = $this->input->post('af_tel',true);

        $this->model->insert($save_data);
        set_message("success",cclang("notif_save"));

        $json['redirect'] = url("affiliation");
        $json['success'] = true;
      }else {
        foreach ($_POST as $key => $value) {
          $json['alert'][$key] = form_error($key);
        }
      }
      return $this->response($json);
    }
  }

  //************************************หน้าแก้ไขข้อมูล************************************\\ \\
  function update($id = null)
  {
    $this->is_allowed('affiliation_update');
    
    if ($row = $this->model->find(dec_url($id))) {
      $this->template->set_title(cclang("update")." $this->title");
      $data = array('action' => url("affiliation/update_action/$id"),
                    'params' => "update",
										'af_sname' => set_value('af_sname',$row->af_sname),
										'af_fname' => set_value('af_fname',$row->af_fname),
										'af_address' => set_value('af_address',$row->af_address),
										'af_web' => set_value('af_web',$row->af_web),
										'af_social' => set_value('af_social',$row->af_social),
										'af_tel' => set_value('af_tel',$row->af_tel),
										'af_created_at' => set_value('af_created_at',dateTimeFormat($row->af_created_at)),
										'af_update_at' => set_value('af_update_at',dateTimeFormat($row->af_update_at)),
                    );
      $this->template->view("content/affiliation/form",$data);
    }else {
      $this->error404();
    }
  }

  //************************************แก้ไขข้อมูล************************************\\ \\
  function update_action($id = null)
  {
    if($this->input->is_ajax_request()){
      if (!is_allowed('affiliation_update')) {
        show_error("Access Permission", 403,'403::Access Not Permission');
        exit();
      }

      $json = array('success' => false, "alert" => array());
      $this->_rules();
      if ($this->form_validation->run()) {
				$save_data['af_sname'] = $this->input->post('af_sname',true);
				$save_data['af_fname'] = $this->input->post('af_fname',true);
				$save_data['af_address'] = $this->input->post('af_address',true);
				$save_data['af_web'] = $this->input->post('af_web',true);
				$save_data['af_social'] = $this->input->post('af_social',true);
				$save_data['af_tel'] = $this->input->post('af_tel',true);
				// $save_data['af_created_at'] = date('Y-m-d H:i',strtotime($this->input->post('af_created_at',true)));
				$save_data['af_update_at'] = date('Y-m-d H:i',strtotime($this->time));

        $this->model->change(dec_url($id), $save_data);
        set_message("success",cclang("notif_update"));

        $json['redirect'] = url("affiliation");
        $json['success'] = true;
      }else {
        foreach ($_POST as $key => $value) {
          $json['alert'][$key] = form_error($key);
        }
      }
      return $this->response($json);
    }
  }


  //************************************ลบข้อมูล************************************\\ \\
  function delete($id = null)
  {
    if ($this->input->is_ajax_request()) {

        if (!is_allowed('affiliation_delete')) {
          return $this->response([
            'type_msg' => "error",
            'msg' => "คุณไม่ได้รับอนุญาตในการเข้าถึง"
  				]);
        }

        $remove = $this->model->remove(dec_url($id));
        if ($remove) {
          $json['type_msg'] = "success";
          $json['msg'] = cclang("notif_delete");
        }else {
          $json['type_msg'] = "error";
          $json['msg'] = cclang("notif_delete_failed");
        }
        return $this->response($json);
    }
  }
  
//************************************API************************************\\ \\
  function api($id = null)
  {
    $this->is_allowed('affiliation_api');
    if ($row = $this->model->find(dec_url($id))) {
      $this->template->set_title(cclang("api")." $this->title");
      $data = array(
										'af_sname' => $row->af_sname,
										'af_fname' => $row->af_fname,
										'af_address' => $row->af_address,
										'af_web' => $row->af_web,
										'af_social' => $row->af_social,
										'af_tel' => $row->af_tel,
										'af_created_at' => dateTimeFormat($row->af_created_at),
										'af_update_at' => dateTimeFormat($row->af_update_at),
                    );
      $this->template->view("content/affiliation/api",$data);
    }else {
      $this->error404();
    }
  }


}
/* Generate By Max-CRUD Generator สร้างเมื่อ 05/10/2022 20:02:32*/