<?php 

class Register extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function input($table, $values)
	{
		if(count($values) != count($values, 1)) $this->db->insert_batch($table, $values); //batch insert
		else $this->db->insert($table, $values); //single insert
		
		//return $this->db->affected_rows();
		/*
		-------how to use-----
		$data = array(
					'username' => $this->input->post('username'),
					'password' => $this->input->post('password'),
					'tanggal' => $this->input->post('date'),
					'email' => $this->input->post('email'),
					'alamat' => $this->input->post('alamat'),
					'pos' => $this->input->post('pos')
				);
		$table = 'pelanggan'
		
		$this->register->input($table, $data);
		*/

		return $this;
	}
	
	public function get_id()
	{
		return $this->db->insert_id();
	}
}
?>