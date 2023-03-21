<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* dev : cangsalak*/
/* fb : https://facebook.com/maxcangsalak*/
/* fanspage : https://web.facebook.com/maxcangsalak*/
/* Generate By Max-CRUD Generator 05/10/2022 19:49:48*/
/**
	 * โปรแกรมนี้จัดทำโดย นายเยาวรัตน์  ช่างสลัก
	 * ติดต่อสอบถามรายละเอียด โทร.0890167912 โทร.ทบ. 65207 Email: max_kai@hotmail.com
	 * บริจาคได้ที่ KKP Start Saving
	 * เลขที่บัญชี 2003219197
	 * ชื่อบัญชี นาย เยาวรัตน์ ช่างสลัก
	 * สาขา อโศก
*/
/* Location: ./application/modules/backend/controllers/Rank.php*/
/* Please DO NOT modify this information */


//************************************ประกาศ Class************************************\\ \\
class Rank extends Backend{

  private $title = "ยศ";  //ประกาศตัวแปล title (เป็นภาษาไทย หรือ อังกฤษ ก็ได้)

  public function __construct() // ประกาศฟังชั่น __construct ให้ทำงานอัตโนมัติ เมื่อเรียกใช้งาน Module
  {
    $config = array(
      'title' => $this->title,
     );
    parent::__construct($config);
    $this->load->model("Rank_model","model");
  }

  //************************************ประกาศ Table************************************\\ \\
  function _rules()
  {
    
		$this->form_validation->set_rules('r_sname', cclang('R Sname'), 'trim|xss_clean|required');
		$this->form_validation->set_rules('r_fname', cclang('R Fname'), 'trim|xss_clean|required');
		$this->form_validation->set_error_delimiters('<i class="text-danger" style="font-size:11px">', '</i>');
  }

  function index()
  {
    $this->is_allowed('rank_list'); //เรียกการเข้าถึงของข้อมูล
    $this->template->set_title("$this->title"); // ประกาศ Title Page
    $this->template->view("content/rank/index"); //เรียกการทำงานของ view
  }

  //************************************การแสดงข้อมูล************************************\\ \\
  function json()
  {
    if ($this->input->is_ajax_request()) {
      if (!is_allowed('rank_list')) {
        show_error("Access Permission", 403,'403::Access Not Permission');
        exit();
      }

      $rows = $this->model->get_datatables();
      $data = array();
      foreach ($rows as $get) {
          $row = array();
					$row[] = $get->r_id;
					$row[] = $get->r_sname;
					$row[] = $get->r_fname;
          $row[] = '
                      <div class="btn-group" role="group" aria-label="Basic">
                          <a href="'.url("rank/detail/".enc_url($get->r_id)).'" id="detail" class="btn btn-primary" title="'.cclang("detail").'">
                            <i class="ti-file"></i>'.cclang("detail").'
                          </a>
                          <a href="'.url("rank/update/".enc_url($get->r_id)).'" id="update" class="btn btn-warning" title="'.cclang("update").'">
                            <i class="ti-pencil"></i>'.cclang("update").'
                          </a>
                          <a href="'.url("rank/delete/".enc_url($get->r_id)).'" id="delete" class="btn btn-danger" title="'.cclang("delete").'">
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
    $this->template->view("content/rank/filter",[],false);
  }

  //************************************การโชว์ข้อมูล************************************\\ \\
  function detail($id = null)
  {
    $this->is_allowed('rank_detail');
    if ($row = $this->model->find(dec_url($id))) {
      $this->template->set_title(cclang("detail")." $this->title");
      $data = array(
										'r_sname' => $row->r_sname,
										'r_fname' => $row->r_fname,
                    );
      $this->template->view("content/rank/detail",$data);
    }else {
      $this->error404();
    }
  }


  //************************************หน้าเพิ่มข้อมูล************************************\\ \\
  function add()
  {
    $this->is_allowed('rank_add');
    $this->template->set_title(cclang("add")." $this->title");
    $data = array('action' => url("rank/add_action"),
                  'params' => "add",
									'r_sname' => set_value('r_sname'),
									'r_fname' => set_value('r_fname'),
                  );
    $this->template->view("content/rank/form",$data);
  }


  //************************************การเพิ่มข้อมูล************************************\\ \\
  function add_action()
  {
    if($this->input->is_ajax_request()){
      if (!is_allowed('rank_add')) {
        show_error("Access Permission", 403,'403::Access Not Permission');
        exit();
      }

      $json = array('success' => false, "alert" => array());
      $this->_rules();
      if ($this->form_validation->run()) {
				$save_data['r_sname'] = $this->input->post('r_sname',true);
				$save_data['r_fname'] = $this->input->post('r_fname',true);

        $this->model->insert($save_data);
        set_message("success",cclang("notif_save"));

        $json['redirect'] = url("rank");
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
    $this->is_allowed('rank_update');
    if ($row = $this->model->find(dec_url($id))) {
      $this->template->set_title(cclang("update")." $this->title");
      $data = array('action' => url("rank/update_action/$id"),
                    'params' => "update",
										'r_sname' => set_value('r_sname',$row->r_sname),
										'r_fname' => set_value('r_fname',$row->r_fname),
                    );
      $this->template->view("content/rank/form",$data);
    }else {
      $this->error404();
    }
  }

  //************************************แก้ไขข้อมูล************************************\\ \\
  function update_action($id = null)
  {
    if($this->input->is_ajax_request()){
      if (!is_allowed('rank_update')) {
        show_error("Access Permission", 403,'403::Access Not Permission');
        exit();
      }

      $json = array('success' => false, "alert" => array());
      $this->_rules();
      if ($this->form_validation->run()) {
				$save_data['r_sname'] = $this->input->post('r_sname',true);
				$save_data['r_fname'] = $this->input->post('r_fname',true);

        $this->model->change(dec_url($id), $save_data);
        set_message("success",cclang("notif_update"));

        $json['redirect'] = url("rank");
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

        if (!is_allowed('rank_delete')) {
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
    $this->is_allowed('rank_api');
    if ($row = $this->model->find(dec_url($id))) {
      $this->template->set_title(cclang("api")." $this->title");
      $data = array(
										'r_sname' => $row->r_sname,
										'r_fname' => $row->r_fname,
                    );
      $this->template->view("content/rank/api",$data);
    }else {
      $this->error404();
    }
  }


}
/* Generate By Max-CRUD Generator สร้างเมื่อ 05/10/2022 19:49:48*/