<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends MAX_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('Users_model');
        $this->load->library('form_validation');

        if(!$this->session->userdata('email_verified') || $this->session->userdata('email_verified') != true)
        {
            redirect('/');
        }
            }

    public function index()
            {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'users?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'users?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'users';
            $config['first_url'] = base_url() . 'users';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Users_model->total_rows($q);
        $users = $this->Users_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'users_data' => $users,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        
		$data['title_name'] = 'users';
		$data['view_file'] = 'Users_list';
		$data['module'] = 'users';
		$data['meta_description'] = 'users/Users_list';
		
		echo Modules::run('templates/backend', $data);
        //$this->load->view('users/Users_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Users_model->get_by_id($id);
        if ($row) {
            $data = array(
		'accnt_create_time' => $row->accnt_create_time,
		'account_type' => $row->account_type,
		'email' => $row->email,
		'email_ver_time' => $row->email_ver_time,
		'email_verification_link' => $row->email_verification_link,
		'email_verified' => $row->email_verified,
		'first_name' => $row->first_name,
		'id' => $row->id,
		'passwd_reset_str' => $row->passwd_reset_str,
		'passwd_reset_time' => $row->passwd_reset_time,
		'password_hash' => $row->password_hash,
		'surname' => $row->surname,
		'username' => $row->username,
	    );
        
		$data['title_name'] = 'users';
		$data['view_file'] = 'Users_read';
		$data['module'] = 'users';
		$data['meta_description'] = 'users/Users_read';
		
		echo Modules::run('templates/backend', $data);
            // $this->load->view('users/Users_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('users/create_action'),
	    'accnt_create_time' => set_value('accnt_create_time'),
	    'account_type' => set_value('account_type'),
	    'email' => set_value('email'),
	    'email_ver_time' => set_value('email_ver_time'),
	    'email_verification_link' => set_value('email_verification_link'),
	    'email_verified' => set_value('email_verified'),
	    'first_name' => set_value('first_name'),
	    'id' => set_value('id'),
	    'passwd_reset_str' => set_value('passwd_reset_str'),
	    'passwd_reset_time' => set_value('passwd_reset_time'),
	    'password_hash' => set_value('password_hash'),
	    'surname' => set_value('surname'),
	    'username' => set_value('username'),
	);

		$data['title_name'] = 'users';
		$data['view_file'] = 'Users_form';
		$data['module'] = 'users';
		$data['meta_description'] = $data['view_file'];
		
		echo Modules::run('templates/backend', $data);
        // $this->load->view('users/Users_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'accnt_create_time' => $this->input->post('accnt_create_time',TRUE),
		'account_type' => $this->input->post('account_type',TRUE),
		'email' => $this->input->post('email',TRUE),
		'email_ver_time' => $this->input->post('email_ver_time',TRUE),
		'email_verification_link' => $this->input->post('email_verification_link',TRUE),
		'email_verified' => $this->input->post('email_verified',TRUE),
		'first_name' => $this->input->post('first_name',TRUE),
		'passwd_reset_str' => $this->input->post('passwd_reset_str',TRUE),
		'passwd_reset_time' => $this->input->post('passwd_reset_time',TRUE),
		'password_hash' => $this->input->post('password_hash',TRUE),
		'surname' => $this->input->post('surname',TRUE),
		'username' => $this->input->post('username',TRUE),
	    );

            $this->Users_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('users'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Users_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('users/update_action'),
		'accnt_create_time' => set_value('accnt_create_time', $row->accnt_create_time),
		'account_type' => set_value('account_type', $row->account_type),
		'email' => set_value('email', $row->email),
		'email_ver_time' => set_value('email_ver_time', $row->email_ver_time),
		'email_verification_link' => set_value('email_verification_link', $row->email_verification_link),
		'email_verified' => set_value('email_verified', $row->email_verified),
		'first_name' => set_value('first_name', $row->first_name),
		'id' => set_value('id', $row->id),
		'passwd_reset_str' => set_value('passwd_reset_str', $row->passwd_reset_str),
		'passwd_reset_time' => set_value('passwd_reset_time', $row->passwd_reset_time),
		'password_hash' => set_value('password_hash', $row->password_hash),
		'surname' => set_value('surname', $row->surname),
		'username' => set_value('username', $row->username),
	    );

		$data['title_name'] = 'users';
		$data['view_file'] = 'Users_form';
		$data['module'] = 'users';
		$data['meta_description'] = $data['view_file'];
		
		echo Modules::run('templates/backend', $data);
            // $this->load->view('users/Users_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'accnt_create_time' => $this->input->post('accnt_create_time',TRUE),
		'account_type' => $this->input->post('account_type',TRUE),
		'email' => $this->input->post('email',TRUE),
		'email_ver_time' => $this->input->post('email_ver_time',TRUE),
		'email_verification_link' => $this->input->post('email_verification_link',TRUE),
		'email_verified' => $this->input->post('email_verified',TRUE),
		'first_name' => $this->input->post('first_name',TRUE),
		'passwd_reset_str' => $this->input->post('passwd_reset_str',TRUE),
		'passwd_reset_time' => $this->input->post('passwd_reset_time',TRUE),
		'password_hash' => $this->input->post('password_hash',TRUE),
		'surname' => $this->input->post('surname',TRUE),
		'username' => $this->input->post('username',TRUE),
	    );

            $this->Users_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('users'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Users_model->get_by_id($id);

        if ($row) {
            $this->Users_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('users'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('accnt_create_time', 'accnt create time', 'trim|required');
	$this->form_validation->set_rules('account_type', 'account type', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('email_ver_time', 'email ver time', 'trim|required');
	$this->form_validation->set_rules('email_verification_link', 'email verification link', 'trim|required');
	$this->form_validation->set_rules('email_verified', 'email verified', 'trim|required');
	$this->form_validation->set_rules('first_name', 'first name', 'trim|required');
	$this->form_validation->set_rules('passwd_reset_str', 'passwd reset str', 'trim|required');
	$this->form_validation->set_rules('passwd_reset_time', 'passwd reset time', 'trim|required');
	$this->form_validation->set_rules('password_hash', 'password hash', 'trim|required');
	$this->form_validation->set_rules('surname', 'surname', 'trim|required');
	$this->form_validation->set_rules('username', 'username', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        }

    public function excel(){
            $this->load->helper('exportexcel');
            $namaFile = "auth_login.xls";
            $judul = "auth_login";
            $tablehead = 0;
            $tablebody = 1;
            $nourut = 1;
            //penulisan header
            header("Pragma: public");
            header("Expires: 0");
            header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
            header("Content-Type: application/force-download");
            header("Content-Type: application/octet-stream");
            header("Content-Type: application/download");
            header("Content-Disposition: attachment;filename=" . $namaFile . "");
            header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Accnt Create Time");
	xlsWriteLabel($tablehead, $kolomhead++, "Account Type");
	xlsWriteLabel($tablehead, $kolomhead++, "Email");
	xlsWriteLabel($tablehead, $kolomhead++, "Email Ver Time");
	xlsWriteLabel($tablehead, $kolomhead++, "Email Verification Link");
	xlsWriteLabel($tablehead, $kolomhead++, "Email Verified");
	xlsWriteLabel($tablehead, $kolomhead++, "First Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Passwd Reset Str");
	xlsWriteLabel($tablehead, $kolomhead++, "Passwd Reset Time");
	xlsWriteLabel($tablehead, $kolomhead++, "Password Hash");
	xlsWriteLabel($tablehead, $kolomhead++, "Surname");
	xlsWriteLabel($tablehead, $kolomhead++, "Username");

	foreach ($this->Users_model->get_all() as $data) {
                $kolombody = 0;

                //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
                xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->accnt_create_time);
	    xlsWriteLabel($tablebody, $kolombody++, $data->account_type);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email_ver_time);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email_verification_link);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email_verified);
	    xlsWriteLabel($tablebody, $kolombody++, $data->first_name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->passwd_reset_str);
	    xlsWriteLabel($tablebody, $kolombody++, $data->passwd_reset_time);
	    xlsWriteLabel($tablebody, $kolombody++, $data->password_hash);
	    xlsWriteLabel($tablebody, $kolombody++, $data->surname);
	    xlsWriteLabel($tablebody, $kolombody++, $data->username);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
        {
            header("Content-type: application/vnd.ms-word");
            header("Content-Disposition: attachment;Filename=auth_login.doc");

            $data = array(
                'auth_login_data' => $this->Users_model->get_all(),
                'start' => 0
            );

           $this->load->view('users/Users_doc',$data);
        }

}

/* End of file Users.php */
    /* Location: ./application/controllers/Users.php */
    /* Please DO NOT modify this information : */
    /* Generated by Cangsalak Codeigniter CRUD Generator 2023-03-21 01:22:24 */