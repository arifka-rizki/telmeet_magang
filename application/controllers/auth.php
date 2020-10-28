<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_login');
    }

	public function index()
	{
        $data['page_title'] = 'TelkomMeet';

        $this->load->view('templates/header', $data);
        $this->load->view('v_login');
        $this->load->view('templates/footer');
    }
    
    public function login_action(){
        if($this->form_validation->run('internal')==false){
            $data['page_title'] = 'TelkomMeet';

            $this->load->view('templates/header', $data);
            $this->load->view('v_login');
            $this->load->view('templates/footer');
        } else{
            $nik = $this->input->post('nik');
            $password = $this->input->post('password');
            $where = array(
                'NIK' => $nik,
                'PASSWORD' => $password,
                'ROLE' => 0 //Role 0 peserta internal
            );
            $check = $this -> m_login->check_login("tb_users", $where)->num_rows();
            if($check > 0){
                $data_session=array(
                    'nik' => $nik,
                    'status' => "login",
                    'nama' => $this->m_login->get_name($nik)->NAMA
                );

                $this->session->set_userdata($data_session);

                redirect(base_url("meetpic"));
            } else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> NIK atau Password Salah! </div>');
                redirect('auth');
            }
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url("auth"));
    }

    public function view_profil(){
        $this->load->model('m_users');
        $nik = $this->session->userdata('nik');
        $user = $this->m_users->get_by_nik_email($nik);
        $data = array(
            'page_title' => 'Profil',
            'NAMA' => $user->NAMA,
            'NIK' => $user->NIK,
            'JENIS_KELAMIN' => $user->JENIS_KELAMIN,
            'NAMA_UNIT' => $user->NAMA_UNIT,
            'JABATAN' => $user->JABATAN,
            'NO_TELEPON' => $user->NO_TELEPON,
            'EMAIL' => $user->EMAIL,
        );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('v_profil', $data);
        $this->load->view('templates/copyright');
        $this->load->view('templates/footer');
    }

    public function perbarui_profil(){
        $this->load->model('m_users');
        if($this->form_validation->run('perbarui_profil') == false){
            $this->view_profil();
        } else{
            $nik = $this->input->post('NIK');
            $data = array(
                'NO_TELEPON' => $this->input->post('NO_TELEPON')
            );
            $update = $this->m_users->update($nik, $data);
            if($update){
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil Memperbarui Profil </div>');
            } else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Gagal Memperbarui Profil </div>');
            }
            redirect(base_url('auth/view_profil'));
        }
    }
}