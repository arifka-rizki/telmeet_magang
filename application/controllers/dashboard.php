<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if($this->session->userdata('status') != "login"){
            redirect(base_url("auth"));
        }
    }

    public function index(){
        $this->load->view('templates/header');
        $this->load->view('dashboardpic');
        $this->load->view('templates/footer');
    }
}