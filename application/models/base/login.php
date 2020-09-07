<?php 

class Login extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function logginIn($username, $password, $table)
	{
		$this->db->where('Username', $username);
		$query = $this->db->get($table);
		$result = $query->result_array();
		if(sizeof($result) == 0)return 'Username tidak ditemukan';
		else
		{
			if($result[0]['Password'] != $password) return 'Password salah';
			else return '';
		}
	}
}
?>