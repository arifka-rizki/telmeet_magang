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
        $this->load->library('upload');
    }

    public function index(){
        $data['data'] = $this->m_rapat->get_by_pic($this->session->userdata("nik"));
        $data['page_title'] = 'Dashboard PIC';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('v_dashboardpic',$data);
        $this->load->view('templates/copyright');
        $this->load->view('templates/footer');
    }

    public function add_meet(){

        $data = array(
            'page_title' => 'Tambah Rapat',
            'action' => site_url('meetpic/add_meet_action'),
            'ID_RAPAT' => set_value('ID_RAPAT'),
            // 'NIK_PIC' => set_value('NIK_PIC'),
    	    // 'KODE_RAPAT' => set_value('KODE_RAPAT'),
    	    // 'TANGGAL' => set_value('TANGGAL'),
    	    // 'WAKTU_MULAI' => set_value('WAKTU_MULAI'),
    	    // 'WAKTU_SELESAI' => set_value('WAKTU_SELESAI'),
    	    // 'TEMPAT' => set_value('TEMPAT'),
            // 'TIPE_RAPAT' => set_value('TIPE_RAPAT'),
            // 'NOTULEN' => set_value('NOTULEN'),
            // 'STATUS' => set_value('STATUS'),
            // 'PENANDATANGAN' => set_value('PENANDATANGAN'),
    	    // 'PENGUNDANG' => set_value('PENGUNDANG'),
	        // 'NOTA_DINAS' => set_value('NOTA_DINAS'),
        );
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('v_addmeet', $data);
        $this->load->view('templates/copyright');
        $this->load->view('templates/footer');
    }
    
    public function add_meet_action() 
    {
        if($this->form_validation->run('tambah_rapat_PIC') == false)
        {
            $data = array(
                'page_title' => 'Tambah Rapat',
                'button' => 'Tambah Rapat',
                'action' => site_url('meetpic/add_meet_action'),    
                'ID_RAPAT' => set_value('ID_RAPAT'),
                'TIPE_RAPAT' => set_value('TIPE_RAPAT'),
            );

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('v_addmeet', $data);
            $this->load->view('templates/copyright');
            $this->load->view('templates/footer');
        } else{
            $data["data"] = array(
                'NIK_PIC' => $this->session->userdata("nik"),
                'KODE_RAPAT' => $this->m_rapat->generate_code(),
                'NAMA_RAPAT' => $this->input->post('NAMA_RAPAT',TRUE),
                'TANGGAL' => $this->input->post('TANGGAL',TRUE),
                'WAKTU_MULAI' => $this->input->post('WAKTU_MULAI',TRUE),
                'WAKTU_SELESAI' => $this->input->post('WAKTU_SELESAI',TRUE),
                'TEMPAT' => $this->input->post('TEMPAT',TRUE),
                'TIPE_RAPAT' => implode(", ",$this->input->post('TIPE_RAPAT',TRUE)),
                'NOTULEN' => $this->input->post('NOTULEN',TRUE),
                'STATUS' => "0",
                'PENANDATANGAN' => $this->input->post('PENANDATANGAN',TRUE),
                'PENGUNDANG' => $this->input->post('PENGUNDANG',TRUE),
                'NOTA_DINAS' => $this->input->post('NOTA_DINAS',TRUE),
            );

            $this->m_rapat->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil Menambahkan Rapat Baru! Kode Rapat: <b>'. $data["data"]["KODE_RAPAT"] .'</b></div>');
            redirect(site_url('meetpic'));
        }
    }

    public function add_hasilmeet($id){
        $row = $this->m_rapat->get_by_id($id);

        if ($row) {
            $data = array(
                'page_title' => 'Tambah Hasil Rapat '. $row->NAMA_RAPAT,
                'button' => 'Edit Rapat',
                'action' => site_url('meetpic/add_hasilmeet_action'),
                'NAMA_RAPAT' => $row->NAMA_RAPAT,
                'ID_RAPAT' => $row->ID_RAPAT,
        		
                'BACKGROUND' => $row->BACKGROUND,
                'ACTION_PLAN' => $row->ACTION_PLAN,
                'RESULT' => $row->RESULT,
            );
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('v_addHasilRapat', $data);
            $this->load->view('templates/copyright');
            $this->load->view('templates/footer');
        }  
        else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Rapat Tidak Ditemukan</div>');
            redirect(site_url('meetpic'));
        }
    }
    
    public function add_hasilmeet_action() 
    {
        if($this->form_validation->run('hasil_rapat') == false){
            $row = $this->m_rapat->get_by_id($this->input->post('ID_RAPAT', TRUE));
            $data = array(
                'page_title' => 'Tambah Hasil Rapat '. $row->NAMA_RAPAT,
                'button' => 'Edit Rapat',
                'action' => site_url('meetpic/add_hasilmeet_action'),
                'NAMA_RAPAT' => $row->NAMA_RAPAT,
                'ID_RAPAT' => $row->ID_RAPAT,
        		
                'BACKGROUND' => $row->BACKGROUND,
                'ACTION_PLAN' => $row->ACTION_PLAN,
                'RESULT' => $row->RESULT,
            );
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('v_addHasilRapat', $data);
            $this->load->view('templates/copyright');
            $this->load->view('templates/footer');
        } 
        else{
            $data['update'] = array(
       
                'BACKGROUND' => $this->input->post('BACKGROUND',TRUE),
                'ACTION_PLAN' => $this->input->post('ACTION_PLAN',TRUE),
                'RESULT' => $this->input->post('RESULT',TRUE),
            );
    
            $this->m_rapat->update($this->input->post('ID_RAPAT', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil Menambahkan Hasil Rapat</div>');
            redirect(site_url('meetpic'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->m_rapat->get_by_id($id);

        if ($row) {
            $data = array(
                'page_title' => 'Edit Rapat',
                'action' => site_url('meetpic/update_action'),
        		'ID_RAPAT' => $row->ID_RAPAT,
        		'NIK_PIC' => $row->NIK_PIC,
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
            $this->load->view('v_addmeet', $data);
            $this->load->view('templates/copyright');
            $this->load->view('templates/footer');
        } 
        
        else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Rapat Tidak Ditemukan</div>');
            redirect(site_url('meetpic'));
        }
    }
    
    public function update_action() 
    {
        $id = $this->input->post('ID_RAPAT', TRUE);
        if ($this->form_validation->run('tambah_rapat_PIC') == FALSE) {
            $this->update($id);
        } else {
            $data['update'] = array(
        		'NIK_PIC' => $this->session->userdata("nik"),
        		'NAMA_RAPAT' => $this->input->post('NAMA_RAPAT',TRUE),
        		'TANGGAL' => $this->input->post('TANGGAL',TRUE),
        		'WAKTU_MULAI' => $this->input->post('WAKTU_MULAI',TRUE),
        		'WAKTU_SELESAI' => $this->input->post('WAKTU_SELESAI',TRUE),
        		'TEMPAT' => $this->input->post('TEMPAT',TRUE),
                'TIPE_RAPAT' => implode(", ",$this->input->post('TIPE_RAPAT',TRUE)),
                'NOTULEN' => $this->input->post('NOTULEN',TRUE),
                'STATUS' => "0",
                'PENANDATANGAN' => $this->input->post('PENANDATANGAN',TRUE),
        		'PENGUNDANG' => $this->input->post('PENGUNDANG',TRUE),
        		'NOTA_DINAS' => $this->input->post('NOTA_DINAS',TRUE),
            );

            $this->m_rapat->update($id, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Detail Rapat Berhasil Diperbarui</div>');
            redirect(site_url('meetpic'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->m_rapat->get_by_id($id);

        if ($row) {
            $this->m_rapat->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Menghapus Rapat</div>');
            redirect(site_url('meetpic'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Menghapus Rapat</div>');
            redirect(site_url('meetpic'));
        }
    }

    public function detail($id){
        $row = $this->m_rapat->get_by_id($id);
        
        if ($row) {
            $data = array(
                'page_title' => 'Detail Rapat ' . $row->NAMA_RAPAT,
                'ID_RAPAT' => set_value('ID_RAPAT', $row->ID_RAPAT),
        		'NIK_PIC' => set_value('NIK_PIC', $row->NIK_PIC),
                'KODE_RAPAT' => set_value('KODE_RAPAT', $row->KODE_RAPAT),
                'NAMA_RAPAT' => set_value('NAMA_RAPAT', $row->NAMA_RAPAT),
                'TANGGAL' => set_value('TANGGAL', $row->TANGGAL),
                'WAKTU_MULAI' => set_value('WAKTU_MULAI', $row->WAKTU_MULAI),
                'WAKTU_SELESAI' => set_value('WAKTU_SELESAI', $row->WAKTU_SELESAI),
                'TEMPAT' => set_value('TEMPAT', $row->TEMPAT),
                'TIPE_RAPAT' => set_value('TIPE_RAPAT', $row->TIPE_RAPAT),
                'NOTULEN' => set_value('NOTULEN', $row->NOTULEN),
                'STATUS' => set_value('STATUS', $row->STATUS),
                'PENANDATANGAN' => set_value('PENANDATANGAN', $row->PENANDATANGAN),
                'PENGUNDANG' => set_value('PENGUNDANG', $row->PENGUNDANG),
                'NOTA_DINAS' => set_value('NOTA_DINAS', $row->NOTA_DINAS),
	        );
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('v_detailRapatPIC',$data);
            $this->load->view('templates/copyright');
            $this->load->view('templates/footer');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Rapat Tidak Ditemukan</div>');
            redirect(site_url('meetpic'));
        }
        
    }

    public function search_keyword()
    {
        $keyword = $this->input->post('keyword',TRUE);
        $data['data'] = $this->m_rapat->search_pic($keyword,$this->session->userdata("nik"));
        $data['page_title'] = 'Dashboard PIC';
        $data['keyword'] = $keyword;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('v_dashboardpic',$data);
        $this->load->view('templates/copyright');
        $this->load->view('templates/footer');
    }

    public function daftar_peserta($id)
    {
        $row = $this->m_rapat->get_by_id($id);
        $peserta = $this->m_rapat->get_peserta_rapat($id);
        
        if ($row) {
            $data = array(   
                'page_title' => 'Daftar Peserta Rapat ' . $row->NAMA_RAPAT,                                 
                'NAMA_RAPAT'=> $row->NAMA_RAPAT,
                'TANGGAL' => $row->TANGGAL,
                'WAKTU_MULAI' => $row->WAKTU_MULAI,
            );
            $data['data'] = $peserta;            
            /*$data['data'] = array(
                'NAMA' => set_value('NAMA', $peserta->NAMA),
        		'WAKTU_PRESENSI' => set_value('WAKTU_PRESENSI', $peserta->WAKTU_PRESENSI),
                'BUKTI_KEHADIRAN' => set_value('BUKTI_KEHADIRAN', $peserta->FOTO),
                'NAMA_UNIT' => set_value('NAMA_UNIT', $peserta->NAMA_UNIT),
                'JABATAN' => set_value('JABATAN', $peserta->JABATAN),
            );*/

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('v_daftarPeserta', $data);
            $this->load->view('templates/copyright');
            $this->load->view('templates/footer');
        }
        else redirect('meetpic');
    }
    public function download_rapat($id)
    {   
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4']);

        $peserta = $this->m_rapat->get_peserta_rapat($id);

        $row = $this->m_rapat->get_by_id($id);
        
        $pic = $this->m_rapat->get_data_pic($row->NIK_PIC);
        
        if ($row) {
            $data = array(
                'ID_RAPAT' => set_value('ID_RAPAT', $row->ID_RAPAT),
        		'NIK_PIC' => set_value('NIK_PIC', $row->NIK_PIC),
                'KODE_RAPAT' => set_value('KODE_RAPAT', $row->KODE_RAPAT),
                'NAMA_RAPAT' => set_value('NAMA_RAPAT', $row->NAMA_RAPAT),
                'TANGGAL' => set_value('TANGGAL', $row->TANGGAL),
                'WAKTU_MULAI' => set_value('WAKTU_MULAI', $row->WAKTU_MULAI),
                'WAKTU_SELESAI' => set_value('WAKTU_SELESAI', $row->WAKTU_SELESAI),
                'TEMPAT' => set_value('TEMPAT', $row->TEMPAT),
                'TIPE_RAPAT' => set_value('TIPE_RAPAT', $row->TIPE_RAPAT),
                'NOTULEN' => set_value('NOTULEN', $row->NOTULEN),
                'STATUS' => set_value('STATUS', $row->STATUS),
                'PENANDATANGAN' => set_value('PENANDATANGAN', $row->PENANDATANGAN),
                'PENGUNDANG' => set_value('PENGUNDANG', $row->PENGUNDANG),
                'NOTA_DINAS' => set_value('NOTA_DINAS', $row->NOTA_DINAS),
                'BACKGROUND' => set_value('BACKGROUND', $row->BACKGROUND),
                'RESULT' => set_value('RESULT', $row->RESULT),
                'ACTION_PLAN' => set_value('ACTION_PLAN', $row->ACTION_PLAN),
                'NAMA' => set_value('NAMA', $pic->NAMA),
            );
            
            $data['data'] = $peserta;
            //$this->load->view('v_detailRapatPIC',$data);
            $mpdf->showImageErrors = true;
            $solo = $this->load->view('v_laporan', $data, TRUE);
            $mpdf->WriteHTML($solo);
            $mpdf->AddPage();
            $soli = $this->load->view('v_laporanDua', $data, TRUE);
            $mpdf->WriteHTML($soli);
            $mpdf->AddPage();
            $sola = $this->load->view('v_laporanPeserta', $data, TRUE);
            $mpdf->WriteHTML($sola);
            $mpdf->Output('','D');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Mengunduh MoM Rapat</div>');
            redirect(site_url('meetpic'));
        }     
    }
    
}