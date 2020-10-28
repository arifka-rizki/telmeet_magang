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
        $this->load->library('upload');
    }

    public function index(){
        $data['data']=$this->m_rapat->get_by_inv($this->session->userdata("nik"));
        $data['page_title'] = 'Dashboard Undangan';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('v_dashboardundangan',$data);
        $this->load->view('templates/copyright');
        $this->load->view('templates/footer');
    }

    // public function add_meet(){
    //     $data['page_title'] = 'Tambah Rapat';

    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/navbar');
    //     $this->load->view('v_addmeet');
    //     $this->load->view('templates/copyright');
    //     $this->load->view('templates/footer');
    // }
    
    public function detail($id){
        $row = $this->m_rapat->get_by_id($id);
        $data_pic = $this->m_users->get_by_nik($row->NIK_PIC);
        
        if ($row) {
            if($this->m_rapat->get_data_peserta_rapat($this->session->userdata("nik"),$row->ID_RAPAT))
            {
                $button = FALSE;
            }
            else $button = TRUE;

            $data = array(
                'page_title' => 'Detail Rapat ' . $row->NAMA_RAPAT,
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
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('v_detailRapatUndangan',$data);
            $this->load->view('templates/copyright');
            $this->load->view('templates/footer');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Rapat Tidak Ditemukan</div>');
            redirect(site_url('meetinv'));
        }
    }

    public function search_keyword()
    {
        $keyword = $this->input->post('keyword',TRUE);
        $data['data']    =   $this->m_rapat->search_inv($keyword,$this->session->userdata("nik"));
        $data['page_title'] ='Dashboard Undangan';
        $data['keyword'] = $keyword;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('v_dashboardUndangan',$data);
        $this->load->view('templates/copyright');
        $this->load->view('templates/footer');
    }

    public function preview_rapat()
    {
        if($this->form_validation->run('tambah_rapat') == false){
            $data['page_title'] = 'Dashboard Undangan';
            $data['data']=$this->m_rapat->get_by_inv($this->session->userdata("nik"));

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('v_dashboardUndangan', $data);
            $this->load->view('templates/copyright');
            $this->load->view('templates/footer');
        } else{
            $kode = $this->input->post('kodeRapat', TRUE);
            $row = $this->m_rapat->get_by_kode($kode);
            $user = $this->session->userdata("nik");
            
            if($row)
            {
                $data_pic = $this->m_users->get_by_nik($row->NIK_PIC);
    
                if($this->m_rapat->get_data_peserta_rapat($this->session->userdata("nik"),$row->ID_RAPAT)||$user == $row->NIK_PIC)
                {
                    $button = FALSE;
                }
                else $button = TRUE;
    
                $data = array(
                    'page_title' => 'Detail Rapat ' . $row->NAMA_RAPAT,
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
                
                $this->load->view('templates/header', $data);
                $this->load->view('templates/navbar');
                $this->load->view('v_detailRapatUndangan',$data);
                $this->load->view('templates/copyright');
                $this->load->view('templates/footer');
            }else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Rapat Tidak Ditemukan</div>');
                redirect(site_url('meetinv'));
            }
        }
    }

    public function presensi_rapat_action()
    {
        //$bukti_kehadiran = $this->input->post('BUKTI_KEHADIRAN');
        $id = $this->input->post('ID_RAPAT');
        $nik = $this->session->userdata("nik");
        $ext = pathinfo($_FILES['PHOTO']['name'],PATHINFO_EXTENSION);

        //$namafoto = date('YmdHis').'.jpg';
        $namafoto = $id.'_'.$nik.".".$ext;
        $config = $this->config_image($namafoto,"./upload/presensi/");
        $this->load->library('upload',$config);
        $this->upload->initialize($config);
        $a=$this->upload->do_upload('PHOTO');

        if($a){
            $bukti = $namafoto;
            $data['data']=array(
                'ID_RAPAT' => $id,
                'NIK' => $nik,
                'WAKTU_PRESENSI' => date("Y-m-d H:i:s"),
                'FOTO' => $bukti
            );
                    
            $this->m_rapat->join_rapat($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Presensi Berhasil</div>');
            redirect(site_url('meetinv'));
        }
        else 
        {
            echo $this->upload->display_errors(), "\n";
            echo $ext;
        }//redirect((site_url('meetinv')));
    }

    public function config_image($file_name,$path){
        $config['image_library'] = 'gd2';
        $config['file_name']=$file_name;
        $config['upload_path']=$path;
        $config['allowed_types']='png|jpg|gif|jpeg|PNG|JPG|JPEG';
        $config['max_size']=50000;
        $config['max_height']=50000;
        $config['max_width']=50000;
        $config['overwrite']=TRUE;
        return $config;
    }
}