<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class meetpic extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if($this->session->userdata('status') != "login"){
            redirect(base_url("auth"));
        }

        $this->load->model('m_rapat');
        $this->load->library('form_validation');        
        $this->load->library('upload');
    	//$this->load->library('datatables');
    }

    public function index(){
        $data['data']=$this->m_rapat->get_all();
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('v_dashboardpic',$data);
        $this->load->view('templates/copyright');
        $this->load->view('templates/footer');
    }

    /*public function json() {
        header('Content-Type: application/json');
        echo $this->m_rapat->json();
    }*/

    public function add_meet(){
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('v_addmeet');
        $this->load->view('templates/copyright');
        $this->load->view('templates/footer');
    }
    
    public function detail($id){
        $row = $this->m_rapat->get_by_id($id);
        
        if ($row) {
            $data = array(
                'ID_RAPAT' => $row->ID_RAPAT,
                'KODE_RAPAT' => $row->KODE_RAPAT,
        		'NAMA_RAPAT' => $row->NAMA_RAPAT,
        		'ID_PIC' => $row->ID_PIC,
        		'TANGGAL' => $row->TANGGAL,
        		'WAKTU_MULAI' => $row->WAKTU_MULAI,
        		'WAKTU_SELESAI' => $row->WAKTU_SELESAI,
        		'TEMPAT' => $row->TEMPAT,
        		'TIPE_RAPAT' => $row->TIPE_RAPAT,
        		'PENGUNDANG' => $row->PENGUNDANG,
        		'NOTA_DINAS' => $row->NOTA_DINAS,
        		'STATUS' => $row->STATUS,
        		'PESERTA' => $row->PESERTA,
                'NOTULEN' => $row->NOTULEN,
                'PENANDATANGAN' => $row->PENANDATANGAN,
	        );
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('v_detailRapatPIC',$data);
            $this->load->view('templates/copyright');
            $this->load->view('templates/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('meetpic'));
        }
        
    }
}