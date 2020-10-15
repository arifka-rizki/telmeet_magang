<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('m_login');
    }

	public function index()
	{
        $this->load->view('templates/header');
        $this->load->view('v_login');
        $this->load->view('templates/footer');
    }
    
    public function login_action(){
        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run()==false){
            $this->load->view('templates/header');
            $this->load->view('v_login');
            $this->load->view('templates/footer');
        } else{
            $nik = $this->input->post('nik');
            $password = $this->input->post('password');
            $where = array(
                'nik' => $nik,
                'password' => $password
            );
            $check = $this -> m_login->check_login("user", $where)->num_rows();
            if($check > 0){
                $data_session=array(
                    'nik' => $nik,
                    'status' => "login"
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

    public function external(){
        $this->load->view('templates/header');
        $this->load->view('v_external');
        $this->load->view('templates/footer');
    }
}