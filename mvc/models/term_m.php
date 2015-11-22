<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Term_m extends MY_Model {

	protected $_table_name = 'term';
	protected $_primary_key = 'termID';
	protected $_primary_filter = 'intval';
	protected $_order_by = "term asc";

	function __construct() {
		parent::__construct();
	}

	function get_term($array=NULL, $signal=FALSE) {
		$query = parent::get($array, $signal);
		return $query;
	}

	function get_order_by_term($array=NULL) {
		$query = parent::get_order_by($array);
		return $query;
	}

	function insert_term($array) {
		$error = parent::insert($array);
		return TRUE;
	}

	function update_term($data, $id = NULL) {
		parent::update($data, $id);
		return $id;
	}

	public function delete_term($id){
		parent::delete($id);
	}
}

/* End of file term_m.php */
/* Location: .//D/xampp/htdocs/school/mvc/models/term_m.php */