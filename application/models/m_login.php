<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_login extends CI_Model {
    function check_login($table, $where){
        return $this->db->get_where($table, $where);
    }

    function get_name($nik){
        $this->db->select('NAMA');
        $this->db->from('tb_users');
        $this->db->where('NIK', $nik);
        return $this->db->get()->row();
    }
}