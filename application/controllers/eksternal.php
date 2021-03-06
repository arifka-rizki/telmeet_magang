<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class eksternal extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_eksternal');
    }

    public function index(){
        $data['page_title'] = 'Presensi Eksternal';

        $this->load->view('templates/header', $data);
        $this->load->view('v_eksternal');
        $this->load->view('templates/copyright');
        $this->load->view('templates/footer');
    }

    public function meet_check(){
        if($this->form_validation->run('kode_rapat') == false){
            $data['page_title'] = 'Presensi Eksternal';

            $this->load->view('templates/header', $data);
            $this->load->view('v_eksternal');
            $this->load->view('templates/copyright');
            $this->load->view('templates/footer');
        } else{
            $kodeRapat = $this->input->post('kodeRapat');
            $email = $this->input->post('email');

            $data['page_title'] = 'Presensi Eksternal';
            $data['meet'] = $this->m_eksternal->check_meet($kodeRapat);
            $data['user'] = $this->m_eksternal->check_user($email);

            $this->load->view('templates/header', $data);
            $this->load->view('v_eksternal', $data);
            $this->load->view('templates/copyright');
            $this->load->view('templates/footer');
        }
    }

    public function presensi(){

        if($this->form_validation->run('eksternal') == false){
            $kodeRapat = $this->input->post('kodeRapat');
            $email = $this->input->post('email');

            $data['page_title'] = 'Presensi Eksternal';
            $data['meet'] = $this->m_eksternal->check_meet($kodeRapat);
            $data['user'] = $this->m_eksternal->check_user($email);
            
            $this->load->view('templates/header', $data);
            $this->load->view('v_eksternal', $data);
            $this->load->view('templates/copyright');
            $this->load->view('templates/footer');
        } else{
            $nama = $this->input->post('nama');
            $nik = $this->input->post('nik');
            $jenisKelamin = $this->input->post('jenisKelamin');
            $instansi = $this->input->post('instansi');
            $jabatan = $this->input->post('jabatan');
            $telefon = $this->input->post('telefon');
            $email = $this->input->post('email');
            $kodeRapat = $this->input->post('kodeRapat');
            $buktiKehadiran = $this->input->post('buktiKehadiran');

            $user_data = array(
                'NAMA' => $nama,
                'NIK' => $nik,
                'EMAIL' => $email,
                'JENIS_KELAMIN' => $jenisKelamin,
                'INSTANSI' => $instansi,
                'JABATAN' => $jabatan,
                'NO_TELEPON' => $telefon,
                'ROLE' => 1 //Role 1 peserta eksternal
            );

            $meet = $this->m_eksternal->check_meet($kodeRapat);
           
    
            $this->m_eksternal->input_attendance($meet->ID_RAPAT, $nik, $buktiKehadiran);
            $email_registered = $this->m_eksternal->check_user($email);
            if(!isset($email_registered)){
                $this->m_eksternal->insert_external($user_data);
            }

            $data['page_title'] = 'Presensi Berhasil';

            $this->load->view('templates/header', $data);
            $this->load->view('v_konfirmEksternal', $data);
            $this->load->view('templates/copyright');
            $this->load->view('templates/footer');
        }
    }
}