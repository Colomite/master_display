<?php 

class Data extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	//tipe parameter yang digunakan
	//1 param: nama tabel
	//2 param: nama table, field yang diselect
	//3 param: nama table, field yang diselect, where clause
	//4 param: nama table, field yang diselect, limit, start
	//5 param: nama table, field yang diselect, where clause, limit, start
	public function detail($param = null)
	{
		$result;
		
		$var = func_get_args();
		if(sizeof($var) == 1)
		{
			$result = $this->db->get($var[0])->result_array();
		}
		else if(sizeof($var) == 2)
		{
			$this->db->select($var[1]);
			$result = $this->db->get($var[0])->result_array();
		}
		else if(sizeof($var) == 3)
		{
			$this->db->select($var[1]);
			$this->db->where($var[2]);
			$result = $this->db->get($var[0])->result_array();
		}
		else if (sizeof($var) == 4)
		{
			$this->db->select($var[1]);
			$this->db->limit($var[2], $var[3]);
			$result = $this->db->get($var[0])->result_array();
		}
		else if (sizeof($var) == 5)
		{
			$this->db->select($var[1]);
			$this->db->where($var[2]);
			$this->db->limit($var[3], $var[4]);
			$result = $this->db->get($var[0])->result_array();
		}
		
		$this->db->reset_where_cache();
		
		return $result;
		/*
		-----how to use-----
		$table = array(0 => 'pelanggan pe', 1 => 'paket pa', 2 => 'pelanggan_paket pp');
		
		$field = array(0 => 'pa.nama as nama', 1 => 'pa.harga as harga', 2 => 'pa.id as id');
		
		$where = "`pp`.`username` = `pe`.`username` and `pa`.`id` = `pp`.`id` and  `pe`.`username` =  '" . $nama[$i]['username'] . "'";
		
		if every variable consist only 1 clause, no need to use an array
		*/
	}
	
	public function setDistinct()
	{
		$this->db->distinct();
		return $this;
	}
	
	public function order($field, $order)
	{
		$this->db->order_by($field, $order);
		return $this;
	}
	
	public function group($fields)
	{
		$this->db->group_by($fields);
		return $this;
	}
	
	public function where($field, $value)
	{
		$this->db->where($field, $value);
		return $this;
	}
	
	public function or_where($field, $value)
	{
		$this->db->or_where($field, $value);
		return $this;
	}
	
	//$value is an array
	public function where_in($field, $value)
	{
		$this->db->where_in($field, $value);
		return $this;
	}
	
	//$value is an array
	public function or_where_in($field, $value)
	{
		$this->db->or_where_in($field, $value);
		return $this;
	}
	
	//$value is an array
	public function where_not_in($field, $value)
	{
		$this->db->where_not_in($field, $value);
		return $this;
	}
	
	//$value is an array
	public function or_where_not_in($field, $value)
	{
		$this->db->or_where_not_in($field, $value);
		return $this;
	}
	
	//$location is 'before', 'after', 'both', 'none'
	public function like($field, $value, $location)
	{
		$this->db->like($field, $value, $location);
		return $this;
	}
	
	//$location is 'before', 'after', 'both', 'none'
	public function or_like($field, $value, $location)
	{
		$this->db->or_like($field, $value, $location);
		return $this;
	}
	
	//$location is 'before', 'after', 'both', 'none'
	public function not_like($field, $value, $location)
	{
		$this->db->not_like($field, $value, $location);
		return $this;
	}
	
	//$location is 'before', 'after', 'both', 'none'
	public function or_not_like($field, $value, $location)
	{
		$this->db->or_not_like($field, $value, $location);
		return $this;
	}
	
	public function limit($limit, $start = false)
	{
		$this->db->limit($limit, !$start ? 0 : $start);
		return $this;
	}
	
	public function change_db($name)
	{
		$this->db = $this->load->database($name, TRUE);
	}
}
?>