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
/* Location: ./application/modules/backend/models/Rank_model.php*/
/* Please DO NOT modify this information */

class Rank_model extends MY_Model{
//*******************************************************ชื่อฐานข้อมูล*******************************************************\\
  private $table = "rank";

  private $primary_key = "r_id";
  private $column_order = ["r_id","r_sname","r_fname"];
  private $order = ["r_id"=>"DESC"];
  private $select = "r_id,r_id,r_sname,r_fname";
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
    $this->db->select($this->select);
    $this->db->from($this->table);

    //filter
			if($this->input->post('r_id')){
				$this->db->like('r_id', $this->input->post('r_id'));
			}
			if($this->input->post('r_sname')){
				$this->db->like('r_sname', $this->input->post('r_sname'));
			}
			if($this->input->post('r_fname')){
				$this->db->like('r_fname', $this->input->post('r_fname'));
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
}
/* Generate By Max-CRUD Generator สร้างเมื่อ 05/10/2022 19:49:48*/