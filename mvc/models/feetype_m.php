<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -----------------------------------------------------
| PRODUCT NAME: 	INILABS SCHOOL MANAGEMENT SYSTEM
| -----------------------------------------------------
| AUTHOR:			INILABS TEAM
| -----------------------------------------------------
| EMAIL:			info@inilabs.net
| -----------------------------------------------------
| COPYRIGHT:		RESERVED BY INILABS IT
| -----------------------------------------------------
| WEBSITE:			http://inilabs.net
| -----------------------------------------------------
| MODIFIED BY:      Babajide Ibiayo (babajideibiayo@yahoo.com)
| -----------------------------------------------------
*/
class feetype_m extends MY_Model {

	protected $_table_name = 'feetype';
	protected $_primary_key = 'feetypeID';
	protected $_primary_filter = 'intval';
	protected $_order_by = "feetypeID asc";

	function __construct() {
		parent::__construct();
	}

	function get_feetype($array=NULL, $signal=FALSE) {
		$query = parent::get($array, $signal);
		return $query;
	}

	function get_order_by_feetype($array=NULL) {
		$query = parent::get_order_by($array);
		return $query;
	}

	function insert_feetype($array) {
		$error = parent::insert($array);
		return TRUE;
	}

	function update_feetype($data, $id = NULL) {
		parent::update($data, $id);
		return $id;
	}

	public function delete_feetype($id){
		parent::delete($id);
	}

	function allfeetype($feetype) {
		$query = $this->db->query("SELECT * FROM feetype WHERE feetype LIKE '$feetype%'");
		return $query->result();
	}

	function get_feetype_by_id($id){
		$query = $this->db->query("SELECT feetype FROM feetype WHERE feetypeID LIKE '$id%'");
		$result = $query->row();
		return $result->feetype;

	}
}

/* End of file feetype_m.php */
/* Location: .//D/xampp/htdocs/school/mvc/models/feetype_m.php */