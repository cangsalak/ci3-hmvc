<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* dev : cangsalak*/
/* fb : https://facebook.com/maxcangsalak*/
/* fanspage : https://web.facebook.com/maxcangsalak*/
/* Generate By Max-CRUD Generator 06/10/2022 09:07:19*/
/**
	 * โปรแกรมนี้จัดทำโดย นายเยาวรัตน์  ช่างสลัก
	 * ติดต่อสอบถามรายละเอียด โทร.0890167912 โทร.ทบ. 65207 Email: max_kai@hotmail.com
	 * บริจาคได้ที่ KKP Start Saving
	 * เลขที่บัญชี 2003219197
	 * ชื่อบัญชี นาย เยาวรัตน์ ช่างสลัก
	 * สาขา อโศก
*/
/* Location: ./application/modules/backend/controllers/Commission.php*/
/* Please DO NOT modify this information */


//************************************ประกาศ Class************************************\\ \\
class Commission extends Backend{

  private $title = "นายทหารสัญญาบัตร";  //ประกาศตัวแปล title (เป็นภาษาไทย หรือ อังกฤษ ก็ได้)

  public function __construct() // ประกาศฟังชั่น __construct ให้ทำงานอัตโนมัติ เมื่อเรียกใช้งาน Module
  {
    $config = array(
      'title' => $this->title,
     );
    parent::__construct($config);
    $this->load->model("Com_model","model");
  }

  function index()
  {
    $this->is_allowed('commission_list'); //เรียกการเข้าถึงของข้อมูล
    $this->template->set_title("$this->title"); // ประกาศ Title Page
    $this->template->view("content/com/index"); //เรียกการทำงานของ view
  }

  //************************************การแสดงข้อมูล************************************\\ \\
  function json()
  {
    if ($this->input->is_ajax_request()) {
      if (!is_allowed('commission_list')) {
        show_error("Access Permission", 403,'403::Access Not Permission');
        exit();
      }

      $rows = $this->model->get_datatables();
      $data = array();
      foreach ($rows as $get) {
          $row = array();
		  		$row[] = imgView($get->image);
					$row[] = $get->r_fname.' '.$get->a_fname.'  '.$get->a_lname;
					$row[] = $get->po_name;
					$row[] = $get->af_fname;
          $row[] = '
                      <div class="btn-group" role="group" aria-label="Basic">
                          <a href="'.url("commission/detail/".enc_url($get->a_id)).'" id="detail" class="btn btn-primary" title="'.cclang("detail").'">
                            <i class="ti-file"></i>'.cclang("detail").'
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
    $this->template->view("content/army/filter",[],false);
  }

  //************************************การโชว์ข้อมูล************************************\\ \\
  function detail($id = null)
  {
    $this->is_allowed('commission_detail');
    if ($row = $this->model->find(dec_url($id))) {
      $this->template->set_title(cclang("detail")." $this->title");
	  $data = array(
		'row' => $row,
		'army_type' => $row->army_type,
		'status' => $row->status,
		'detail' => $row->detail,
		'birthday' => DateThai($row->birthday),
		'age' => getAge($row->birthday),
		'image' => $row->image,
		'rank_r_id' => $row->r_sname,
		'a_fname' => $row->a_fname,
		'a_lname' => $row->a_lname,
		'a_nickname' => $row->a_nickname,
		'a_pid' => $row->a_pid,
		'a_armyid' => $row->a_armyid,
		'position_po_id' => $row->po_name,
		'affiliation_af_id' => $row->af_fname,
		'educational' => $row->educational,
		'weight' => $row->weight,
		'height' => $row->height,
		'blood_group' => $row->blood_group,
		'gender' => $row->gender == "m" ? 'ชาย' :  'หญิง' ,
		'skin' => $row->skin,
		'shape' => $row->shape,
		'defect' => $row->defect,
		'congenital_disease' => $row->congenital_disease,
		'e_name' => $row->e_name,
		'e_surname' => $row->e_surname,
		'these' => $row->these,
		'registration_date' => date('d-m-Y',strtotime($row->registration_date)),
		'ethnicity' => $row->ethnicity,
		'nationality' => $row->nationality,
		'religion' => $row->religion,
		'address' => $row->address,
		'district' => $row->district,
		'districts' => $row->districts,
		'province' => $row->province,
		'email' => $row->email,
		'father_name' => $row->father_name,
		'father_surname' => $row->father_surname,
		'father_age' => $row->father_age,
		'father_occupation' => $row->father_occupation,
		'father_status' => $row->father_status,
		'mother_name' => $row->mother_name,
		'mother_surname' => $row->mother_surname,
		'mother_age' => $row->mother_age,
		'mother_occupation' => $row->mother_occupation,
		'mother_status' => $row->mother_status,
		'wife_name' => $row->wife_name,
		'wife_surname' => $row->wife_surname,
		'wife_occupation' => $row->wife_occupation,
		'wife_age' => $row->wife_age,
		'a_created_at' => $row->a_created_at,
		'a_updated_at' => $row->a_updated_at,
		
		'stationed' => $row->stationed,
		'model_year' => $row->model_year,
		'turns' => $row->turns,
	);
      $this->template->view("content/army/detail",$data);
    }else {
      $this->error404();
    }
  }
}
/* Generate By Max-CRUD Generator สร้างเมื่อ 06/10/2022 09:07:19*/