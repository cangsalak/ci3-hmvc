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
/* Location: ./application/modules/backend/controllers/Army.php*/
/* Please DO NOT modify this information */


//************************************ประกาศ Class************************************\\ \\
class Army extends Backend{

  private $title = "ประวัติกำลังพล";  //ประกาศตัวแปล title (เป็นภาษาไทย หรือ อังกฤษ ก็ได้)

  public function __construct() // ประกาศฟังชั่น __construct ให้ทำงานอัตโนมัติ เมื่อเรียกใช้งาน Module
  {
    $config = array(
      'title' => $this->title,
     );
    parent::__construct($config);
    $this->load->model("Army_model","model");
  }

  //************************************ประกาศ Table************************************\\ \\
  function _rules()
  {
		$this->form_validation->set_rules('image', cclang('Image'), 'trim|xss_clean');
		$this->form_validation->set_rules('rank_r_id', cclang('Rank R Id'), 'trim|xss_clean|required');
		$this->form_validation->set_rules('status', cclang('Status'), 'trim|xss_clean');
		$this->form_validation->set_rules('birthday', cclang('Birthday'), 'trim|xss_clean|required');
		$this->form_validation->set_rules('detail', cclang('Detail'), 'trim|xss_clean');
		$this->form_validation->set_rules('a_fname', cclang('A Fname'), 'trim|xss_clean|required');
		$this->form_validation->set_rules('a_lname', cclang('A Lname'), 'trim|xss_clean|required');
		$this->form_validation->set_rules('a_nickname', cclang('A Nickname'), 'trim|xss_clean');
		$this->form_validation->set_rules('a_pid', cclang('A Pid'), 'trim|xss_clean|numeric|min_length[13]|max_length[13]');
		$this->form_validation->set_rules('a_armyid', cclang('A Armyid'), 'trim|xss_clean|numeric|min_length[10]|max_length[10]');
		$this->form_validation->set_rules('position_po_id', cclang('Position Po Id'), 'trim|xss_clean|required');
		$this->form_validation->set_rules('affiliation_af_id', cclang('Affiliation Af Id'), 'trim|xss_clean|required');
		$this->form_validation->set_rules('educational', cclang('Educational'), 'trim|xss_clean');
		$this->form_validation->set_rules('weight', cclang('Weight'), 'trim|xss_clean|numeric');
		$this->form_validation->set_rules('height', cclang('Height'), 'trim|xss_clean|numeric');
		$this->form_validation->set_rules('blood_group', cclang('Blood Group'), 'trim|xss_clean');
		$this->form_validation->set_rules('gender', cclang('Gender'), 'trim|xss_clean');
		$this->form_validation->set_rules('skin', cclang('Skin'), 'trim|xss_clean');
		$this->form_validation->set_rules('shape', cclang('Shape'), 'trim|xss_clean');
		$this->form_validation->set_rules('defect', cclang('Defect'), 'trim|xss_clean');
		$this->form_validation->set_rules('congenital_disease', cclang('Congenital Disease'), 'trim|xss_clean');
		$this->form_validation->set_rules('e_name', cclang('E Name'), 'trim|xss_clean');
		$this->form_validation->set_rules('e_surname', cclang('E Surname'), 'trim|xss_clean');
		$this->form_validation->set_rules('these', cclang('These'), 'trim|xss_clean');
		$this->form_validation->set_rules('registration_date', cclang('Registration Date'), 'trim|xss_clean');
		$this->form_validation->set_rules('ethnicity', cclang('Ethnicity'), 'trim|xss_clean');
		$this->form_validation->set_rules('nationality', cclang('Nationality'), 'trim|xss_clean');
		$this->form_validation->set_rules('religion', cclang('Religion'), 'trim|xss_clean');
		$this->form_validation->set_rules('address', cclang('Address'), 'trim|xss_clean');
		$this->form_validation->set_rules('district', cclang('District'), 'trim|xss_clean');
		$this->form_validation->set_rules('districts', cclang('Districts'), 'trim|xss_clean');
		$this->form_validation->set_rules('province', cclang('Province'), 'trim|xss_clean');
		$this->form_validation->set_rules('email', cclang('Email'), 'trim|xss_clean|valid_email');
		$this->form_validation->set_rules('father_name', cclang('Father Name'), 'trim|xss_clean');
		$this->form_validation->set_rules('father_surname', cclang('Father Surname'), 'trim|xss_clean');
		$this->form_validation->set_rules('father_age', cclang('Father Age'), 'trim|xss_clean');
		$this->form_validation->set_rules('father_occupation', cclang('Father Occupation'), 'trim|xss_clean');
		$this->form_validation->set_rules('father_status', cclang('Father Status'), 'trim|xss_clean');
		$this->form_validation->set_rules('mother_name', cclang('Mother Name'), 'trim|xss_clean');
		$this->form_validation->set_rules('mother_surname', cclang('Mother Surname'), 'trim|xss_clean');
		$this->form_validation->set_rules('mother_age', cclang('Mother Age'), 'trim|xss_clean');
		$this->form_validation->set_rules('mother_occupation', cclang('Mother Occupation'), 'trim|xss_clean');
		$this->form_validation->set_rules('mother_status', cclang('Mother Status'), 'trim|xss_clean');
		$this->form_validation->set_rules('wife_name', cclang('Wife Name'), 'trim|xss_clean');
		$this->form_validation->set_rules('wife_surname', cclang('Wife Surname'), 'trim|xss_clean');
		$this->form_validation->set_rules('wife_occupation', cclang('Wife Occupation'), 'trim|xss_clean');
		$this->form_validation->set_rules('wife_age', cclang('Wife Age'), 'trim|xss_clean');
		$this->form_validation->set_rules('a_created_at', cclang('A Created At'), 'trim|xss_clean');
		$this->form_validation->set_rules('a_updated_at', cclang('A Updated At'), 'trim|xss_clean');
		$this->form_validation->set_rules('stationed', cclang('Stationed'), 'trim|xss_clean');
		$this->form_validation->set_rules('model_year', cclang('Model Year'), 'trim|xss_clean');
		$this->form_validation->set_rules('turns', cclang('Turns'), 'trim|xss_clean');
		$this->form_validation->set_rules('army_type', cclang('Army Type'), 'trim|xss_clean|required');
		$this->form_validation->set_error_delimiters('<i class="text-danger" style="font-size:11px">', '</i>');
  }

  function index()
  {
    $this->is_allowed('army_list'); //เรียกการเข้าถึงของข้อมูล
    $this->template->set_title("$this->title"); // ประกาศ Title Page
    $this->template->view("content/army/index"); //เรียกการทำงานของ view
  }

//   function show(){
	
//     // $this->is_allowed('army_list'); //เรียกการเข้าถึงของข้อมูล
// 	$data['rows'] = $this->model->get_datatables();
//     $this->template->set_title("$this->title"); // ประกาศ Title Page
//     $this->template->view("content/army/show",$data); //เรียกการทำงานของ view
//   }

  //************************************การแสดงข้อมูล************************************\\ \\
  function json()
  {
    if ($this->input->is_ajax_request()) {
      if (!is_allowed('army_list')) {
        show_error("Access Permission", 403,'403::Access Not Permission');
        exit();
      }

      $rows = $this->model->get_datatables();
      $data = array();
	//   var_dump($rows);
      foreach ($rows as $get) {
          $row = array();
		  			$row[] = imgView($get->image);
		  			// $row[] = $get->a_id;
					$row[] = $get->r_fname.' '.$get->a_fname.'  '.$get->a_lname;
					// $row[] = $get->a_fname;
					// $row[] = $get->a_lname;
					$row[] = $get->po_name;
					$row[] = $get->af_fname;
          $row[] = '
                      <div class="btn-group" role="group" aria-label="Basic">
                          <a href="'.url("army/detail/".enc_url($get->a_id)).'" id="detail" class="btn btn-primary" title="'.cclang("detail").'">
                            <i class="ti-file"></i>'.cclang("detail").'
                          </a>
                          <a href="'.url("army/update/".enc_url($get->a_id)).'" id="update" class="btn btn-warning" title="'.cclang("update").'">
                            <i class="ti-pencil"></i>'.cclang("update").'
                          </a>
                          <a href="'.url("army/delete/".enc_url($get->a_id)).'" id="delete" class="btn btn-danger" title="'.cclang("delete").'">
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
    $this->template->view("content/army/filter",[],false);
  }

  //************************************การโชว์ข้อมูล************************************\\ \\
  function detail($id = null)
  {
    $this->is_allowed('army_detail');
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


  //************************************หน้าเพิ่มข้อมูล************************************\\ \\
  function add()
  {
    $this->is_allowed('army_add');
    $this->template->set_title(cclang("add")." $this->title");
    $data = array('action' => url("army/add_action"),
                  'params' => "add",
				  'file_name' => set_value('image'),
				  'army_type' => set_value('army_type'),
				  'status' => set_value('status'),
				  'birthday' => set_value('birthday'),
				  'detail' => set_value('detail'),
				  'rank_r_id' => set_value('rank_r_id'),
									'a_fname' => set_value('a_fname'),
									'a_lname' => set_value('a_lname'),
									'a_nickname' => set_value('a_nickname'),
									'a_pid' => set_value('a_pid'),
									'a_armyid' => set_value('a_armyid'),
									'position_po_id' => set_value('position_po_id'),
									'affiliation_af_id' => set_value('affiliation_af_id'),
									'educational' => set_value('educational'),
									'weight' => set_value('weight'),
									'height' => set_value('height'),
									'blood_group' => set_value('blood_group'),
									'gender' => set_value('gender'),
									'skin' => set_value('skin'),
									'shape' => set_value('shape'),
									'defect' => set_value('defect'),
									'congenital_disease' => set_value('congenital_disease'),
									'e_name' => set_value('e_name'),
									'e_surname' => set_value('e_surname'),
									'these' => set_value('these'),
									'registration_date' => set_value('registration_date'),
									'ethnicity' => set_value('ethnicity'),
									'nationality' => set_value('nationality'),
									'religion' => set_value('religion'),
									'address' => set_value('address'),
									'district' => set_value('district'),
									'districts' => set_value('districts'),
									'province' => set_value('province'),
									'email' => set_value('email'),
									'father_name' => set_value('father_name'),
									'father_surname' => set_value('father_surname'),
									'father_age' => set_value('father_age'),
									'father_occupation' => set_value('father_occupation'),
									'father_status' => set_value('father_status'),
									'mother_name' => set_value('mother_name'),
									'mother_surname' => set_value('mother_surname'),
									'mother_age' => set_value('mother_age'),
									'mother_occupation' => set_value('mother_occupation'),
									'mother_status' => set_value('mother_status'),
									'wife_name' => set_value('wife_name'),
									'wife_surname' => set_value('wife_surname'),
									'wife_occupation' => set_value('wife_occupation'),
									'wife_age' => set_value('wife_age'),
									'a_created_at' => set_value('a_created_at'),
									'a_updated_at' => set_value('a_updated_at'),

									
									'stationed' => set_value('stationed'),
									'model_year' => set_value('model_year'),
									'turns' => set_value('turns'),
                  );
    $this->template->view("content/army/form",$data);
  }


  //************************************การเพิ่มข้อมูล************************************\\ \\
  function add_action()
  {
    if($this->input->is_ajax_request()){
      if (!is_allowed('army_add')) {
        show_error("Access Permission", 403,'403::Access Not Permission');
        exit();
      }

      $json = array('success' => false, "alert" => array());
      $this->_rules();
      if ($this->form_validation->run()) {
		$save_data['image'] = $this->imageCopy($this->input->post('photo', true));
		$save_data['rank_r_id'] = $this->input->post('rank_r_id',true);
		$save_data['army_type'] = $this->input->post('army_type',true);
		$save_data['status'] = $this->input->post('status',true);
		$save_data['birthday'] = $this->input->post('birthday',true);
		$save_data['detail'] = $this->input->post('detail',true);
				$save_data['a_fname'] = $this->input->post('a_fname',true);
				$save_data['a_lname'] = $this->input->post('a_lname',true);
				$save_data['a_nickname'] = $this->input->post('a_nickname',true);
				$save_data['a_pid'] = $this->input->post('a_pid',true);
				$save_data['a_armyid'] = $this->input->post('a_armyid',true);
				$save_data['position_po_id'] = $this->input->post('position_po_id',true);
				$save_data['affiliation_af_id'] = $this->input->post('affiliation_af_id',true);
				$save_data['educational'] = $this->input->post('educational',true);
				$save_data['weight'] = $this->input->post('weight',true);
				$save_data['height'] = $this->input->post('height',true);
				$save_data['blood_group'] = $this->input->post('blood_group',true);
				$save_data['gender'] = $this->input->post('gender',true);
				$save_data['skin'] = $this->input->post('skin',true);
				$save_data['shape'] = $this->input->post('shape',true);
				$save_data['defect'] = $this->input->post('defect',true);
				$save_data['congenital_disease'] = $this->input->post('congenital_disease',true);
				$save_data['e_name'] = $this->input->post('e_name',true);
				$save_data['e_surname'] = $this->input->post('e_surname',true);
				$save_data['these'] = $this->input->post('these',true);
				$save_data['registration_date'] = date('Y-m-d',strtotime($this->input->post('registration_date',true)));
				$save_data['ethnicity'] = $this->input->post('ethnicity',true);
				$save_data['nationality'] = $this->input->post('nationality',true);
				$save_data['religion'] = $this->input->post('religion',true);
				$save_data['address'] = $this->input->post('address',true);
				$save_data['district'] = $this->input->post('district',true);
				$save_data['districts'] = $this->input->post('districts',true);
				$save_data['province'] = $this->input->post('province',true);
				$save_data['email'] = $this->input->post('email',true);
				$save_data['father_name'] = $this->input->post('father_name',true);
				$save_data['father_surname'] = $this->input->post('father_surname',true);
				$save_data['father_age'] = $this->input->post('father_age',true);
				$save_data['father_occupation'] = $this->input->post('father_occupation',true);
				$save_data['father_status'] = $this->input->post('father_status',true);
				$save_data['mother_name'] = $this->input->post('mother_name',true);
				$save_data['mother_surname'] = $this->input->post('mother_surname',true);
				$save_data['mother_age'] = $this->input->post('mother_age',true);
				$save_data['mother_occupation'] = $this->input->post('mother_occupation',true);
				$save_data['mother_status'] = $this->input->post('mother_status',true);
				$save_data['wife_name'] = $this->input->post('wife_name',true);
				$save_data['wife_surname'] = $this->input->post('wife_surname',true);
				$save_data['wife_occupation'] = $this->input->post('wife_occupation',true);
				$save_data['wife_age'] = $this->input->post('wife_age',true);
				// $save_data['a_created_at'] = $this->input->post('a_created_at',true);
				$save_data['a_updated_at'] = date('Y-m-d H:i:s');

				
				$save_data['stationed'] = $this->input->post('stationed',true);
				$save_data['model_year'] = $this->input->post('model_year',true);
				$save_data['turns'] = $this->input->post('turns',true);


				// echo '<pre></pre>';
				// var_dump($save_data);
				// echo '<pre></pre>';
				// die();
        $this->model->insert($save_data);
        set_message("success",cclang("notif_save"));

        $json['redirect'] = url("army");
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
    $this->is_allowed('army_update');
    if ($row = $this->model->find(dec_url($id))) {
      $this->template->set_title(cclang("update")." $this->title");
      $data = array('action' => url("army/update_action/$id"),
                    'params' => "update",
					'file_name' => set_value('image',$row->image),
					'army_type' => set_value('army_type',$row->army_type),
					'status' => set_value('status',$row->status),
					'birthday' => set_value('birthday',$row->birthday),
					'detail' => set_value('detail',$row->detail),
					'rank_r_id' => set_value('rank_r_id',$row->rank_r_id),
					'a_fname' => set_value('a_fname',$row->a_fname),
					'a_lname' => set_value('a_lname',$row->a_lname),
					'a_nickname' => set_value('a_nickname',$row->a_nickname),
					'a_pid' => set_value('a_pid',$row->a_pid),
					'a_armyid' => set_value('a_armyid',$row->a_armyid),
					'position_po_id' => set_value('position_po_id',$row->position_po_id),
					'affiliation_af_id' => set_value('affiliation_af_id',$row->affiliation_af_id),
					'educational' => set_value('educational',$row->educational),
					'weight' => set_value('weight',$row->weight),
					'height' => set_value('height',$row->height),
					'blood_group' => set_value('blood_group',$row->blood_group),
					'gender' => set_value('gender',$row->gender),
					'skin' => set_value('skin',$row->skin),
					'shape' => set_value('shape',$row->shape),
					'defect' => set_value('defect',$row->defect),
					'congenital_disease' => set_value('congenital_disease',$row->congenital_disease),
					'e_name' => set_value('e_name',$row->e_name),
					'e_surname' => set_value('e_surname',$row->e_surname),
					'these' => set_value('these',$row->these),
					'registration_date' => set_value('registration_date',date('Y-m-d',strtotime($row->registration_date))),
					'ethnicity' => set_value('ethnicity',$row->ethnicity),
					'nationality' => set_value('nationality',$row->nationality),
					'religion' => set_value('religion',$row->religion),
					'address' => set_value('address',$row->address),
					'district' => set_value('district',$row->district),
					'districts' => set_value('districts',$row->districts),
					'province' => set_value('province',$row->province),
					'email' => set_value('email',$row->email),
					'father_name' => set_value('father_name',$row->father_name),
					'father_surname' => set_value('father_surname',$row->father_surname),
					'father_age' => set_value('father_age',$row->father_age),
					'father_occupation' => set_value('father_occupation',$row->father_occupation),
					'father_status' => set_value('father_status',$row->father_status),
					'mother_name' => set_value('mother_name',$row->mother_name),
					'mother_surname' => set_value('mother_surname',$row->mother_surname),
					'mother_age' => set_value('mother_age',$row->mother_age),
					'mother_occupation' => set_value('mother_occupation',$row->mother_occupation),
					'mother_status' => set_value('mother_status',$row->mother_status),
					'wife_name' => set_value('wife_name',$row->wife_name),
					'wife_surname' => set_value('wife_surname',$row->wife_surname),
					'wife_occupation' => set_value('wife_occupation',$row->wife_occupation),
					'wife_age' => set_value('wife_age',$row->wife_age),
					// 'a_created_at' => set_value('a_created_at',$row->a_created_at),
					// 'a_updated_at' => set_value('a_updated_at',$row->a_updated_at),
									'stationed' => set_value('stationed',date('Y-m-d',strtotime($row->stationed))),
									'model_year' => set_value('model_year',$row->model_year),
									'turns' => set_value('turns',$row->turns),
                    );
      $this->template->view("content/army/form",$data);
    }else {
      $this->error404();
    }
  }

  //************************************แก้ไขข้อมูล************************************\\ \\
  function update_action($id = null)
  {
    if($this->input->is_ajax_request()){
      if (!is_allowed('army_update')) {
        show_error("Access Permission", 403,'403::Access Not Permission');
        exit();
      }

      $json = array('success' => false, "alert" => array());
      $this->_rules();
      if ($this->form_validation->run()) {
		$save_data['image'] = $this->imageCopy($this->input->post('photo', true));
		$save_data['rank_r_id'] = $this->input->post('rank_r_id',true);
		$save_data['army_type'] = $this->input->post('army_type',true);
		$save_data['status'] = $this->input->post('status',true);
		$save_data['birthday'] = $this->input->post('birthday',true);
		$save_data['detail'] = $this->input->post('detail',true);
		$save_data['a_fname'] = $this->input->post('a_fname',true);
				$save_data['a_lname'] = $this->input->post('a_lname',true);
				$save_data['a_nickname'] = $this->input->post('a_nickname',true);
				$save_data['a_pid'] = $this->input->post('a_pid',true);
				$save_data['a_armyid'] = $this->input->post('a_armyid',true);
				$save_data['position_po_id'] = $this->input->post('position_po_id',true);
				$save_data['affiliation_af_id'] = $this->input->post('affiliation_af_id',true);
				$save_data['educational'] = $this->input->post('educational',true);
				$save_data['weight'] = $this->input->post('weight',true);
				$save_data['height'] = $this->input->post('height',true);
				$save_data['blood_group'] = $this->input->post('blood_group',true);
				$save_data['gender'] = $this->input->post('gender',true);
				$save_data['skin'] = $this->input->post('skin',true);
				$save_data['shape'] = $this->input->post('shape',true);
				$save_data['defect'] = $this->input->post('defect',true);
				$save_data['congenital_disease'] = $this->input->post('congenital_disease',true);
				$save_data['e_name'] = $this->input->post('e_name',true);
				$save_data['e_surname'] = $this->input->post('e_surname',true);
				$save_data['these'] = $this->input->post('these',true);
				$save_data['registration_date'] = date('Y-m-d',strtotime($this->input->post('registration_date',true)));
				$save_data['ethnicity'] = $this->input->post('ethnicity',true);
				$save_data['nationality'] = $this->input->post('nationality',true);
				$save_data['religion'] = $this->input->post('religion',true);
				$save_data['address'] = $this->input->post('address',true);
				$save_data['district'] = $this->input->post('district',true);
				$save_data['districts'] = $this->input->post('districts',true);
				$save_data['province'] = $this->input->post('province',true);
				$save_data['email'] = $this->input->post('email',true);
				$save_data['father_name'] = $this->input->post('father_name',true);
				$save_data['father_surname'] = $this->input->post('father_surname',true);
				$save_data['father_age'] = $this->input->post('father_age',true);
				$save_data['father_occupation'] = $this->input->post('father_occupation',true);
				$save_data['father_status'] = $this->input->post('father_status',true);
				$save_data['mother_name'] = $this->input->post('mother_name',true);
				$save_data['mother_surname'] = $this->input->post('mother_surname',true);
				$save_data['mother_age'] = $this->input->post('mother_age',true);
				$save_data['mother_occupation'] = $this->input->post('mother_occupation',true);
				$save_data['mother_status'] = $this->input->post('mother_status',true);
				$save_data['wife_name'] = $this->input->post('wife_name',true);
				$save_data['wife_surname'] = $this->input->post('wife_surname',true);
				$save_data['wife_occupation'] = $this->input->post('wife_occupation',true);
				$save_data['wife_age'] = $this->input->post('wife_age',true);
				$save_data['a_updated_at'] = date('Y-m-d H:i:s');

				
				$save_data['stationed'] = $this->input->post('stationed',true);
				$save_data['model_year'] = $this->input->post('model_year',true);
				$save_data['turns'] = $this->input->post('turns',true);

        $this->model->change(dec_url($id), $save_data);
        set_message("success",cclang("notif_update"));

        $json['redirect'] = url("army");
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

			if (!is_allowed('army_delete')) {
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
}
/* Generate By Max-CRUD Generator สร้างเมื่อ 06/10/2022 09:07:19*/