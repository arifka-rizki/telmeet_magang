<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_external extends CI_Model {

    function check_meet($where){
        $this->db->select('*');
        $this->db->from('tb_rapat');
        $this->db->where('KODE_RAPAT', $where);
        return $this->db->get()->row();
    }

    function check_user($where){
        $this->db->select('*');
        $this->db->from('tb_users');
        $this->db->where('EMAIL', $where);
        return $this->db->get()->row();
    }

    function add_user($userData){
        return $this->db->insert('tb_users', $userData);
    }

    // function get_id_rapat($kodeRapat){
    //     $this->db->select('ID_RAPAT');
    //     $this->db->from('tb_rapat');
    //     $this->db->where('KODE_RAPAT', $kodeRapat);
    //     return $this->db->get()->row()->ID_RAPAT;
    // }

    function input_attendance($idRapat, $nik, $buktiKehadiran){
        $data = array(
            'ID_RAPAT' => $idRapat,
            'NIK' => $nik,
            'BUKTI_KEHADIRAN' => $buktiKehadiran
        );
        return $this->db->insert('tb_peserta_rapat', $data);
    }

    function insert_external($data){
        return $this->db->insert('tb_users', $data);
    }
}