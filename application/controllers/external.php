<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class external extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_external');
    }

    public function index(){
        $data['page_title'] = 'Presensi Eksternal';

        $this->load->view('templates/header', $data);
        $this->load->view('v_external');
        $this->load->view('templates/footer');
    }

    public function meet_check(){
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email',
            array('required'=>'Masukkan E-mail Anda', 'valid_email'=>'Masukkan E-mail Yang Valid'));
        $this->form_validation->set_rules('kodeRapat', 'Kode Rapat', 'required|alpha_numeric',
            array('required'=>'Masukkan Kode Rapat', 'alpha_numeric'=>'Masukkan Kode Rapat Yang Valid'));

        if($this->form_validation->run() == false){
            $data['page_title'] = 'Presensi Eksternal';

            $this->load->view('templates/header', $data);
            $this->load->view('v_external');
            $this->load->view('templates/footer');
        } else{
            $kodeRapat = $this->input->post('kodeRapat');
            $email = $this->input->post('email');

            $data['page_title'] = 'Presensi Eksternal';
            $data['meet'] = $this->m_external->check_meet($kodeRapat);
            $data['user'] = $this->m_external->check_user($email);

            $this->load->view('templates/header', $data);
            $this->load->view('v_external', $data);
            $this->load->view('templates/footer');
        }
    }

    public function presensi(){

        if($this->form_validation->run('eksternal') == false){
            $kodeRapat = $this->input->post('kodeRapat');
            $email = $this->input->post('email');

            $data['page_title'] = 'Presensi Eksternal';
            $data['meet'] = $this->m_external->check_meet($kodeRapat);
            $data['user'] = $this->m_external->check_user($email);
            
            $this->load->view('templates/header', $data);
            $this->load->view('v_external', $data);
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
                'ROLE' => 1
            );

            $meet = $this->m_external->check_meet($kodeRapat);
    
            $this->m_external->input_attendance($meet->ID_RAPAT, $nik, $buktiKehadiran);
            $email_registered = $this->m_external->check_user($email);
            if(!isset($email_registered)){
                $this->m_external->add_user($user_data);
                echo 'berhasil nambah user';   
            } else{
                echo 'tidak nambah user';
            }
        }
    }
}