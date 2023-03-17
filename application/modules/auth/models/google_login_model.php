<?php
defined('BASEPATH') or exit('No direct script access allowed');

class google_login_model extends MAX_Model
{

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
        $this->table = 'user';
    }
    function Is_already_register($id)
    {
        $this->db->where('login_oauth_uid', $id);
        $query = $this->db->get($this->table);
        if($query->num_rows() > 0)
        {
            return true;
        }else{
            return false;
        }
    }

    function Update_user_data($data, $id)
    {
    $this->db->where('login_oauth_uid', $id);
    $this->db->update($this->table, $data);
    }

    function Insert_user_data($data)
    {
    $this->db->insert($this->table, $data);
    }
}