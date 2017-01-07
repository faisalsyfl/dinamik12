<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * class khusus tabel tb_account
*/
class PaymentModel extends CI_Model {
	public $tableName;

	public function __construct(){
		parent::__construct();
		$this->tableName = "tb_payment";
	}

	public function selectAll($from=0,$offset=0){
		
		$this->db->select('*');
		$this->db->from($this->tableName);
		$this->db->limit($from,$offset);

		return $this->db->get();
	}
	
	public function selectByAccID($accid){
		$this->db->select('*');
		$this->db->from($this->tableName);
		$this->db->where('acc_id', $accid);
		return $this->db->get()->row_array();
	}

	public function insert($data){
		$this->db->insert($this->tableName,$data);

		return $this->db->insert_id();
	}	

	public function generate(){
		$data = [
		'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','0','1','2','3','4','5','6','7','8','9'
		];
		$coupon = array();
		for($i=0;$i<6;$i++){
			$temp = random_int(0,35);
			$coupon[$i] = $data[$temp];
		}

		return $coupon;

	}
	public function delete($id){
		$this->db->where('payment_id',$id);
		$this->db->delete($this->tableName);
	}		
}

/* End of file tb_account_model.php */
/* Location: ./application/models/tb_account_model.php */