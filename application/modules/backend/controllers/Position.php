<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* dev : cangsalak*/
/* fb : https://facebook.com/maxcangsalak*/
/* fanspage : https://web.facebook.com/maxcangsalak*/
/* Generate By Max-CRUD Generator 05/10/2022 20:05:08*/
/**
	 * โปรแกรมนี้จัดทำโดย นายเยาวรัตน์  ช่างสลัก
	 * ติดต่อสอบถามรายละเอียด โทร.0890167912 โทร.ทบ. 65207 Email: max_kai@hotmail.com
	 * บริจาคได้ที่ KKP Start Saving
	 * เลขที่บัญชี 2003219197
	 * ชื่อบัญชี นาย เยาวรัตน์ ช่างสลัก
	 * สาขา อโศก
*/
/* Location: ./application/modules/backend/controllers/Position.php*/
/* Please DO NOT modify this information */


//************************************ประกาศ Class************************************\\ \\
class Position extends Backend{

  private $title = "ตำแหน่ง";  //ประกาศตัวแปล title (เป็นภาษาไทย หรือ อังกฤษ ก็ได้)

  public function __construct() // ประกาศฟังชั่น __construct ให้ทำงานอัตโนมัติ เมื่อเรียกใช้งาน Module
  {
    $config = array(
      'title' => $this->title,
     );
    parent::__construct($config);
    $this->load->model("Position_model","model");
  }

  //************************************ประกาศ Table************************************\\ \\
  function _rules()
  {
    
		$this->form_validation->set_rules('po_num', cclang('Po Num'), 'trim|xss_clean');
		$this->form_validation->set_rules('po_name', cclang('Po Name'), 'trim|xss_clean');
		$this->form_validation->set_rules('po_details', cclang('Po Details'), 'trim|xss_clean');
		$this->form_validation->set_rules('po_created_at', cclang('Po Created At'), 'trim|xss_clean');
		$this->form_validation->set_rules('po_update_at', cclang('Po Update At'), 'trim|xss_clean');
		$this->form_validation->set_error_delimiters('<i class="text-danger" style="font-size:11px">', '</i>');
  }

  function index()
  {
    $this->is_allowed('position_list'); //เรียกการเข้าถึงของข้อมูล
    $this->template->set_title("$this->title"); // ประกาศ Title Page
    $this->template->view("content/position/index"); //เรียกการทำงานของ view
  }

  //************************************การแสดงข้อมูล************************************\\ \\
  function json()
  {
    if ($this->input->is_ajax_request()) {
      if (!is_allowed('position_list')) {
        show_error("Access Permission", 403,'403::Access Not Permission');
        exit();
      }

      $rows = $this->model->get_datatables();
      $data = array();
      foreach ($rows as $get) {
          $row = array();
					$row[] = $get->po_id;
					$row[] = $get->po_num;
					$row[] = $get->po_name;
          $row[] = '
                      <div class="btn-group" role="group" aria-label="Basic">
                          <a href="'.url("position/detail/".enc_url($get->po_id)).'" id="detail" class="btn btn-primary" title="'.cclang("detail").'">
                            <i class="ti-file"></i>'.cclang("detail").'
                          </a>
                          <a href="'.url("position/update/".enc_url($get->po_id)).'" id="update" class="btn btn-warning" title="'.cclang("update").'">
                            <i class="ti-pencil"></i>'.cclang("update").'
                          </a>
                          <a href="'.url("position/delete/".enc_url($get->po_id)).'" id="delete" class="btn btn-danger" title="'.cclang("delete").'">
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
    $this->template->view("content/position/filter",[],false);
  }

  //************************************การโชว์ข้อมูล************************************\\ \\
  function detail($id = null)
  {
    $this->is_allowed('position_detail');
    if ($row = $this->model->find(dec_url($id))) {
      $this->template->set_title(cclang("detail")." $this->title");
      $data = array(
										'po_num' => $row->po_num,
										'po_name' => $row->po_name,
										'po_details' => $row->po_details,
										'po_created_at' => dateTimeFormat($row->po_created_at),
										'po_update_at' => dateTimeFormat($row->po_update_at),
                    );
      $this->template->view("content/position/detail",$data);
    }else {
      $this->error404();
    }
  }


  //************************************หน้าเพิ่มข้อมูล************************************\\ \\
  function add()
  {
    $this->is_allowed('position_add');
    $this->template->set_title(cclang("add")." $this->title");
    $data = array('action' => url("position/add_action"),
                  'params' => "add",
									'po_num' => set_value('po_num'),
									'po_name' => set_value('po_name'),
									'po_details' => set_value('po_details'),
									'po_created_at' => set_value('po_created_at'),
									'po_update_at' => set_value('po_update_at'),
                  );
    $this->template->view("content/position/form",$data);
  }


  //************************************การเพิ่มข้อมูล************************************\\ \\
  function add_action()
  {
    if($this->input->is_ajax_request()){
      if (!is_allowed('position_add')) {
        show_error("Access Permission", 403,'403::Access Not Permission');
        exit();
      }

      $json = array('success' => false, "alert" => array());
      $this->_rules();
      if ($this->form_validation->run()) {
				$save_data['po_num'] = $this->input->post('po_num',true);
				$save_data['po_name'] = $this->input->post('po_name',true);
				$save_data['po_details'] = $this->input->post('po_details',true);
				$save_data['po_created_at'] = date('Y-m-d H:i',strtotime($this->input->post('po_created_at',true)));
				$save_data['po_update_at'] = date('Y-m-d H:i',strtotime($this->input->post('po_update_at',true)));

        $this->model->insert($save_data);
        set_message("success",cclang("notif_save"));

        $json['redirect'] = url("position");
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
    $this->is_allowed('position_update');
    if ($row = $this->model->find(dec_url($id))) {
      $this->template->set_title(cclang("update")." $this->title");
      $data = array('action' => url("position/update_action/$id"),
                    'params' => "update",
										'po_num' => set_value('po_num',$row->po_num),
										'po_name' => set_value('po_name',$row->po_name),
										'po_details' => set_value('po_details',$row->po_details),
										'po_created_at' => set_value('po_created_at',dateTimeFormat($row->po_created_at)),
										'po_update_at' => set_value('po_update_at',dateTimeFormat($row->po_update_at)),
                    );
      $this->template->view("content/position/form",$data);
    }else {
      $this->error404();
    }
  }

  //************************************แก้ไขข้อมูล************************************\\ \\
  function update_action($id = null)
  {
    if($this->input->is_ajax_request()){
      if (!is_allowed('position_update')) {
        show_error("Access Permission", 403,'403::Access Not Permission');
        exit();
      }

      $json = array('success' => false, "alert" => array());
      $this->_rules();
      if ($this->form_validation->run()) {
				$save_data['po_num'] = $this->input->post('po_num',true);
				$save_data['po_name'] = $this->input->post('po_name',true);
				$save_data['po_details'] = $this->input->post('po_details',true);
				$save_data['po_created_at'] = date('Y-m-d H:i',strtotime($this->input->post('po_created_at',true)));
				$save_data['po_update_at'] = date('Y-m-d H:i',strtotime($this->input->post('po_update_at',true)));

        $this->model->change(dec_url($id), $save_data);
        set_message("success",cclang("notif_update"));

        $json['redirect'] = url("position");
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

        if (!is_allowed('position_delete')) {
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
    $this->is_allowed('position_api');
    if ($row = $this->model->find(dec_url($id))) {
      $this->template->set_title(cclang("api")." $this->title");
      $data = array(
										'po_num' => $row->po_num,
										'po_name' => $row->po_name,
										'po_details' => $row->po_details,
										'po_created_at' => dateTimeFormat($row->po_created_at),
										'po_update_at' => dateTimeFormat($row->po_update_at),
                    );
      $this->template->view("content/position/api",$data);
    }else {
      $this->error404();
    }
  }


}
/* Generate By Max-CRUD Generator สร้างเมื่อ 05/10/2022 20:05:08*/