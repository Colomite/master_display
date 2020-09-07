<?php 

class Updating extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	//tipe parameter yang digunakan
	public function update($table, $values, $where = "", $streamField = null)
	{
		if($where != "") $this->db->where($where);
		
		if(count($values) != count($values, 1)) //the $values would be array of array
		{
			if($streamField != null)
			$this->db->update_batch($table, $values, $streamField); //batch update
		}
		else $this->db->update($table, $values); //single update
		
		$this->db->reset_where_cache();
	}

	public function where($field, $value)
	{
		$this->db->where($field, $value);
		return $this;
	}
}
?>