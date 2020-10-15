<?php  

class m_user extends CI_Model
{
	function login($nik,$password){
		$this->db->where("NIK",$nik);
		$this->db->where("PASSWORD",$password);
		return $this->db->get("tb_users")->row();
	}

}

?>