<?php 

class Deleting extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function deleteData($table, $where = "")
	{
		if($where != "") $this->db->where($where);
		$this->db->delete($table);
	}

	public function where($field, $value)
	{
		$this->db->where($field, $value);
		return $this;
	}

	//$value is an array
	public function where_in($field, $value)
	{
		$this->db->where_in($field, $value);
		return $this;
	}
}
?>