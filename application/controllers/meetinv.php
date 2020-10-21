<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class meetinv extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if($this->session->userdata('status') != "login"){
            redirect(base_url("auth"));
        }

        $this->load->model('m_rapat');
        $this->load->model('m_users');
        $this->load->library('form_validation');        
        $this->load->library('upload');
    	//$this->load->library('datatables');
    }

    public function index(){
        $data['data']=$this->m_rapat->get_by_inv($this->session->userdata("nik"));
        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('v_dashboardundangan',$data);
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
    
    public function detail($id){
        $row = $this->m_rapat->get_by_id($id);
        $data_pic = $this->m_users->get_by_id($row->NIK_PIC);
        
        if ($row) {
            if($this->m_rapat->get_data_peserta_rapat($this->session->userdata("nik"),$row->ID_RAPAT))
            {
                $button = FALSE;
            }
            else $button = TRUE;

            $data = array(
                'show_button' => $button,
                'ID_RAPAT' => $row->ID_RAPAT,
                'NIK_PIC' => $row->NIK_PIC,
                'NAMA_PIC' => $data_pic->NAMA,
                'KODE_RAPAT' => $row->KODE_RAPAT,
                'NAMA_RAPAT' => $row->NAMA_RAPAT,
                'TANGGAL' => $row->TANGGAL,
                'WAKTU_MULAI' => $row->WAKTU_MULAI,
                'WAKTU_SELESAI' => $row->WAKTU_SELESAI,
                'TEMPAT' => $row->TEMPAT,
                'TIPE_RAPAT' => $row->TIPE_RAPAT,
                'NOTULEN' => $row->NOTULEN,
                'STATUS' => $row->STATUS,
                'PENANDATANGAN' => $row->PENANDATANGAN,
                'PENGUNDANG' => $row->PENGUNDANG,
                'NOTA_DINAS' => $row->NOTA_DINAS,
	        );
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('v_detailRapatUndangan',$data);
            $this->load->view('templates/copyright');
            $this->load->view('templates/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('meetinv'));
        }
    }

    public function search_keyword()
    {
        $keyword = $this->input->post('keyword',TRUE);
        $data['data']    =   $this->m_rapat->search_inv($keyword,$this->session->userdata("nik"));

        $this->load->view('templates/header');
        $this->load->view('templates/navbar');
        $this->load->view('v_dashboardUndangan',$data);
        $this->load->view('templates/copyright');
        $this->load->view('templates/footer');
    }

    public function preview_rapat()
    {
        $kode = $this->input->post('kodeRapat', TRUE);
        $row = $this->m_rapat->get_by_kode($kode);
        
        if($row)
        {
            $data_pic = $this->m_users->get_by_id($row->NIK_PIC);

            if($this->m_rapat->get_data_peserta_rapat($this->session->userdata("nik"),$row->ID_RAPAT))
            {
                $button = FALSE;
            }
            else $button = TRUE;

            $data = array(
                'show_button' => $button,
                'ID_RAPAT' => $row->ID_RAPAT,
                'NIK_PIC' => $row->NIK_PIC,
                'NAMA_PIC' => $data_pic->NAMA,
                'NAMA_RAPAT' => $row->NAMA_RAPAT,
                'TANGGAL' => $row->TANGGAL,
                'WAKTU_MULAI' => $row->WAKTU_MULAI,
                'WAKTU_SELESAI' => $row->WAKTU_SELESAI,
                'TEMPAT' => $row->TEMPAT,
                'TIPE_RAPAT' => $row->TIPE_RAPAT,
                'NOTULEN' => $row->NOTULEN,
                'STATUS' => $row->STATUS,
                'PENANDATANGAN' => $row->PENANDATANGAN,
                'PENGUNDANG' => $row->PENGUNDANG,
                'NOTA_DINAS' => $row->NOTA_DINAS,
                'KODE_RAPAT' => $row->KODE_RAPAT,
            );
            
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('v_detailRapatUndangan',$data);
            $this->load->view('templates/copyright');
            $this->load->view('templates/footer');
        }

        else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('meetinv'));
        }
    }

    public function presensi_rapat($id)
    {
        $this->m_rapat->join_rapat($id,$this->session->userdata("nik"));
        redirect(site_url('meetinv'));
    }
}