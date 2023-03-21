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
/* Location: ./application/modules/backend/models/Army_model.php*/
/* Please DO NOT modify this information */

class Warrant_model extends MY_Model{
//*******************************************************ชื่อฐานข้อมูล*******************************************************\\
  private $table = "army";

  private $primary_key = "a_id";
  private $column_order = ["rank_r_id","a_fname","a_lname","position_po_id","affiliation_af_id"];
  private $order = ["a_id"=>"DESC"];
  private $select = " a_id,
                              image,
                              rank_r_id,
                              a_fname,
                              a_lname,
                              position_po_id,
                              affiliation_af_id,
                              rank.*,
                              position.*,
                              affiliation.*";
//*******************************************************การเรียกใช้งานเริ่มต้น*******************************************************\\
  public function __construct()
  {
    $config = array(
      'table' => $this->table,
      'primary_key' => $this->primary_key,
      'select' => $this->select,
      'column_order' => $this->column_order,
      'order' => $this->order,
    );

    parent::__construct($config);
  }

//************************************การกรองข้อมูล************************************\\ \\
  private function _get_datatables_query()
  {
    $agency = $this->session->userdata('agency');
    $this->db->select($this->select);
    $this->db->from($this->table);
    
    $this->db->join("rank","rank.r_id = army.rank_r_id","left");
    $this->db->join("position","position.po_id = army.position_po_id","left");
    $this->db->join("affiliation","affiliation.af_id = army.affiliation_af_id","left");

    $this->db->where("".$this->table.'.army_type',3);
    $this->db->where("".$this->table.'.affiliation_af_id',$agency);

    //filter
			if($this->input->post('rank_r_id')){
				$this->db->like('rank_r_id', $this->input->post('rank_r_id'));
			}
			if($this->input->post('a_fname')){
				$this->db->like('a_fname', $this->input->post('a_fname'));
			}
			if($this->input->post('a_lname')){
				$this->db->like('a_lname', $this->input->post('a_lname'));
			}
			if($this->input->post('position_po_id')){
				$this->db->like('position_po_id', $this->input->post('position_po_id'));
			}
			if($this->input->post('affiliation_af_id')){
				$this->db->like('affiliation_af_id', $this->input->post('affiliation_af_id'));
			}
      if(isset($_POST['order'])){
        $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
      } else if(isset($this->order)){
        $order = $this->order;
        $this->db->order_by(key($order), $order[key($order)]);
      }
  }
// //************************************ดึงข้อมูลจากฐานข้อมูล************************************\\ \\
  public function get_datatables()
  {
    $this->_get_datatables_query();

    if($_POST['length'] != -1)
    $this->db->limit($_POST['length'], $_POST['start']);
    $query = $this->db->get();
    return $query->result();
  }
// //************************************นับตัวกรอง************************************\\ \\
  public function count_filtered()
  {
    $this->_get_datatables_query();
    $query = $this->db->get();
    return $query->num_rows();
  }
// //************************************นับฐานข้อมูลทั้งหมด************************************\\ \\
  public function count_all()
  {
    $this->db->select($this->select);
    $this->db->from($this->table);
    return $this->db->count_all_results();
  }

  public function find($id = NULL, $select_field = [])
  { 
      if (is_array($select_field) AND count($select_field)) {
          $this->db->select($select_field);
      }
  
      $this->db->where("".$this->table.'.'.$this->primary_key,$id);
      $this->db->join("rank","rank.r_id = army.rank_r_id","left");
      $this->db->join("position","position.po_id = army.position_po_id","left");
      $this->db->join("affiliation","affiliation.af_id = army.affiliation_af_id","left");
      $query = $this->db->get($this->table);
  
      if($query->num_rows()>0)
      {
          return $query->row();
      }
      else
      {
          return FALSE;
      }
  }
}
/* Generate By Max-CRUD Generator สร้างเมื่อ 06/10/2022 09:07:19*/