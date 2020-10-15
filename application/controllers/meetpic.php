<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class meetpic extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if($this->session->userdata('status') != "login"){
            redirect(base_url("auth"));
        }
    }

    public function index(){
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('v_dashboardpic');
        $this->load->view('templates/copyright');
        $this->load->view('templates/footer');
    }

    public function add_meet(){
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('v_addmeet');
        $this->load->view('templates/copyright');
        $this->load->view('templates/footer');
    }
    
    public function detail(){
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('v_detailRapatPIC');
        $this->load->view('templates/copyright');
        $this->load->view('templates/footer');
    }
}