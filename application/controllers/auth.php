<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_login');
        // $this->form_validation->set_error_delimiters('<p class="alert">', '</p>');
    }

	public function index()
	{
        $data['page_title'] = 'TelkomMeet';

        $this->load->view('templates/header', $data);
        $this->load->view('v_login');
        $this->load->view('templates/footer');
    }
    
    public function login_action(){
        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric',
            array('required'=>'Masukkan NIK', 'numeric'=>'Masukkan NIK valid')); //add exact length
        $this->form_validation->set_rules('password', 'Password', 'required',
            array('required'=>'Masukkan Password'));

        if($this->form_validation->run()==false){
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
                'ROLE' => 0
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
                echo "nik dan pass salah";
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
            'INSTANSI' => $user->INSTANSI,
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

    public function update_profil(){
        echo 'On Progress';
    }
}