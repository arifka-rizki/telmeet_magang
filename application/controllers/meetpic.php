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
    	//$this->load->library('datatables');
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
            'button' => 'Tambah Rapat',
            'action' => site_url('meetpic/add_meet_action'),
            'ID_RAPAT' => set_value('ID_RAPAT'),
            // 'NIK_PIC' => set_value('NIK_PIC'),
    	    // 'KODE_RAPAT' => set_value('KODE_RAPAT'),
    	    // 'TANGGAL' => set_value('TANGGAL'),
    	    // 'WAKTU_MULAI' => set_value('WAKTU_MULAI'),
    	    // 'WAKTU_SELESAI' => set_value('WAKTU_SELESAI'),
    	    // 'TEMPAT' => set_value('TEMPAT'),
            'TIPE_RAPAT' => set_value('TIPE_RAPAT'),
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

            // $data['page_title'] = 'Tambah Rapat';
            // $data['button'] = 'Tambah Rapat';
            // $data['action'] = site_url('meetpic/add_meet_action');

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
                'TIPE_RAPAT' => $this->input->post('TIPE_RAPAT',TRUE),
                'NOTULEN' => $this->input->post('NOTULEN',TRUE),
                'STATUS' => "0",
                'PENANDATANGAN' => $this->input->post('PENANDATANGAN',TRUE),
                'PENGUNDANG' => $this->input->post('PENGUNDANG',TRUE),
                'NOTA_DINAS' => $this->input->post('NOTA_DINAS',TRUE),
            );
            
            $this->m_rapat->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('meetpic'));
        }
    }

    public function add_hasilmeet($id){
        $row = $this->m_rapat->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Edit Rapat',
                'action' => site_url('meetpic/add_hasilmeet_action'),
                
                'ID_RAPAT' => $row->ID_RAPAT,
        		
                'BACKGROUND' => $row->BACKGROUND,
                'ACTION_PLAN' => $row->ACTION_PLAN,
                'RESULT' => $row->RESULT,
            );
            
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('v_addHasilRapat', $data);
            $this->load->view('templates/copyright');
            $this->load->view('templates/footer');
        } 
        
        else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('meetpic'));
        }
    }
    
    public function add_hasilmeet_action() 
    {
        $data['update'] = array(
       
            'BACKGROUND' => $this->input->post('BACKGROUND',TRUE),
            'ACTION_PLAN' => $this->input->post('ACTION_PLAN',TRUE),
            'RESULT' => $this->input->post('RESULT',TRUE),
        );

        $this->m_rapat->update($this->input->post('ID_RAPAT', TRUE), $data);
        $this->session->set_flashdata('message', 'Update Record Success');
        redirect(site_url('meetpic'));
        
    }
    
    public function update($id) 
    {
        $row = $this->m_rapat->get_by_id($id);

        if ($row) {
            $data = array(
                'page_title' => 'Tambah Rapat',
                'button' => 'Edit Rapat',
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
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('meetpic'));
        }
    }
    
    public function update_action() 
    {
        //$this->_rules();

        //if ($this->form_validation->run() == FALSE) {
        //    $this->update($this->input->post('ID_RAPAT', TRUE));
        //} else {
            $data['update'] = array(
        		'NIK_PIC' => $this->session->userdata("nik"),
        		'NAMA_RAPAT' => $this->input->post('NAMA_RAPAT',TRUE),
        		'TANGGAL' => $this->input->post('TANGGAL',TRUE),
        		'WAKTU_MULAI' => $this->input->post('WAKTU_MULAI',TRUE),
        		'WAKTU_SELESAI' => $this->input->post('WAKTU_SELESAI',TRUE),
        		'TEMPAT' => $this->input->post('TEMPAT',TRUE),
                'TIPE_RAPAT' => $this->input->post('TIPE_RAPAT',TRUE),
                'NOTULEN' => $this->input->post('NOTULEN',TRUE),
                'STATUS' => "0",
                'PENANDATANGAN' => $this->input->post('PENANDATANGAN',TRUE),
        		'PENGUNDANG' => $this->input->post('PENGUNDANG',TRUE),
        		'NOTA_DINAS' => $this->input->post('NOTA_DINAS',TRUE),
            );

            $this->m_rapat->update($this->input->post('ID_RAPAT', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('meetpic'));
        //}
    }
    
    public function delete($id) 
    {
        $row = $this->m_rapat->get_by_id($id);

        if ($row) {
            $this->m_rapat->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('meetpic'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('meetpic'));
        }
    }

    public function _rules() 
    {
        $this->form_validation->set_rules('NAMA_RAPAT', 'nama rapat', 'trim|required');
        $this->form_validation->set_rules('TANGGAL', 'tanggal', 'trim|required');
        $this->form_validation->set_rules('WAKTU_MULAI', 'waktu mulai', 'trim|required');
        $this->form_validation->set_rules('WAKTU_SELESAI', 'waktu selesai', 'trim|required');
        $this->form_validation->set_rules('TEMPAT', 'tempat', 'trim|required');
        $this->form_validation->set_rules('TIPE_RAPAT', 'tipe rapat', 'trim|required');
        $this->form_validation->set_rules('PENGUNDANG', 'pengundang', 'trim|required');
        $this->form_validation->set_rules('NOTA_DINAS', 'nota dinas', 'trim');
        $this->form_validation->set_rules('STATUS', 'status', 'trim');
        $this->form_validation->set_rules('PENANDATANGAN', 'penandatangan', 'trim|required');
        $this->form_validation->set_rules('NOTULEN', 'notulen', 'trim|required');
        $this->form_validation->set_rules('PESERTA', 'peserta', 'trim');

        $this->form_validation->set_rules('KODE_RAPAT', 'KODE RAPAT', 'trim');
        $this->form_validation->set_rules('ID_RAPAT', 'ID_RAPAT', 'trim');
        $this->form_validation->set_rules('NIK_PIC', 'NIK_PIC', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    
    public function detail($id){
        $row = $this->m_rapat->get_by_id($id);
        
        if ($row) {
            $data = array(
                'Page_title' => 'Detail Rapat ' . $row->NAMA_RAPAT,
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
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('meetpic'));
        }
        
    }

    public function search_keyword()
    {
        $keyword = $this->input->post('keyword',TRUE);
        $data['data'] = $this->m_rapat->search_pic($keyword,$this->session->userdata("nik"));
        $data['page_title'] = 'Dashboard PIC';

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
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('meetpic'));
        }     
    }
    
}