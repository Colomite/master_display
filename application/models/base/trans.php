<?php 

class Trans extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function beginTrans()
	{
		$this->db->trans_begin();
	}

	public function finishTrans()
	{
		$this->getTransErrors() === FALSE ? 
			$this->rollbackTrans() : $this->commitTrans();
	}
	
	public function commitTrans()
	{
		$this->db->trans_commit();
	}
	
	public function rollbackTrans()
	{
		$this->db->trans_rollback();
	}
	
	public function getTransErrors()
	{
		//if ($this->db->trans_status() === FALSE) //transaction failed
		return $this->db->trans_status();
	}
}
?>