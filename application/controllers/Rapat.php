<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rapat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_rapat');
        $this->load->library('form_validation');        
        $this->load->library('upload');
    	$this->load->library('datatables');
    }

    public function index()
    {
        $data['data']=$this->m_rapat->get_all();
        $this->load->view('template/header');
        $this->load->view('mobil/tb_mobil_list',$data);
        $this->load->view('template/footer');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->m_rapat->json();
    }

    public function read($id) 
    {
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
        		'ID_NOTULEN' => $row->ID_NOTULEN,
        		'STATUS' => $row->STATUS,
        		'PESERTA' => $row->PESERTA,
        	);
            $this->load->view('template/header');
            $this->load->view('mobil/tb_mobil_read', $data);
            $this->load->view('template/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mobil'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('rapat/create_action'),
    	    'ID_RAPAT' => set_value('ID_RAPAT'),
    	    'KODE_RAPAT' => set_value('KODE_RAPAT'),
    	    'NAMA_RAPAT' => set_value('NAMA_RAPAT'),
    	    'ID_PIC' => set_value('ID_PIC'),
    	    'TANGGAL' => set_value('TANGGAL'),
            'WAKTU_MULAI' => set_value('WAKTU_MULAI'),
            'WAKTU_SELESAI' => set_value('WAKTU_SELESAI'),
    	    'TEMPAT' => set_value('TEMPAT'),
    	    'TIPE_RAPAT' => set_value('TIPE_RAPAT'),
    	    'ID_NOTULEN' => set_value('ID_NOTULEN'),
	        'STATUS' => set_value('STATUS'),
	        'PESERTA' => set_value('PESERTA'),
    	);
            
        // $data['fasilitas_mobil']=$this->M_fasilitas_mobil_admin->get_by_id(0);
        $this->load->view('template/header');
        $this->load->view('mobil/tb_mobil_form', $data);
        $this->load->view('template/footer');        
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

            $data["data"] = array(
        		'KODE_RAPAT' => $this->input->post('KODE_RAPAT',TRUE),
        		'NAMA_RAPAT' => $this->input->post('NAMA_RAPAT',TRUE),
        		'ID_PIC' => $this->input->post('ID_PIC',TRUE),
        		'TANGGAL' => $this->input->post('TANGGAL',TRUE),
                'WAKTU_MULAI' => $this->input->post('WAKTU_MULAI',TRUE),
                'WAKTU_SELESAI' => $this->input->post('WAKTU_SELESAI',TRUE),
        		'TEMPAT' => $this->input->post('TEMPAT',TRUE),
        		'TIPE_RAPAT' => $this->input->post('TIPE_RAPAT',TRUE),
        		'ID_NOTULEN' => $this->input->post('ID_NOTULEN',TRUE),
        		'STATUS' => $this->input->post('STATUS',TRUE),
        		'PESERTA' => $this->input->post('PESERTA',TRUE),
    	    );
            $data["fasilitas"]=array();
            $data["photo"]=array();
            $fasilitas=$this->input->post('FASILITAS',TRUE);

            foreach ($fasilitas as $row) {
                $data["fasilitas"][]=array('ID_FASILITAS'=> $row);
            }

                $nama_photo=date("YmdHis").".jpg";
                $config=$this->config_image($nama_photo,"./upload/mobil");
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('PHOTO')){
                    $data["photo"]=array('IMAGE'=> $nama_photo);
                }


            $this->m_rapat->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('mobil'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->m_rapat->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('mobil/update_action'),
        		'ID_RAPAT' => set_value('ID_RAPAT', $row->ID_RAPAT),
        		'KODE_RAPAT' => set_value('KODE_RAPAT', $row->KODE_RAPAT),
        		'NAMA_RAPAT' => set_value('NAMA_RAPAT', $row->NAMA_RAPAT),
        		'ID_PIC' => set_value('ID_PIC', $row->ID_PIC),
        		'TANGGAL' => set_value('TANGGAL', $row->TANGGAL),
                'WAKTU_MULAI' => set_value('WAKTU', $row->WAKTU_MULAI),
                'WAKTU_SELESAI' => set_value('WAKTU', $row->WAKTU_SELESAI),
        		'TEMPAT' => set_value('TEMPAT', $row->TEMPAT),
        		'TIPE_RAPAT' => set_value('TIPE_RAPAT', $row->TIPE_RAPAT),
        		'ID_NOTULEN' => set_value('ID_NOTULEN', $row->ID_NOTULEN),
        		'STATUS' => set_value('STATUS', $row->STATUS),
        		'PESERTA' => set_value('PESERTA', $row->PESERTA),
	        );

            $this->load->view('template/header');
            $this->load->view('mobil/tb_mobil_form', $data);
            $this->load->view('template/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mobil'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('ID_RAPAT', TRUE));
        } else {
            $data['data'] = array(
        		'KODE_RAPAT' => $this->input->post('KODE_RAPAT',TRUE),
        		'NAMA_RAPAT' => $this->input->post('NAMA_RAPAT',TRUE),
        		'ID_PIC' => $this->input->post('ID_PIC',TRUE),
        		'TANGGAL' => $this->input->post('TANGGAL',TRUE),
                'WAKTU_MULAI' => $this->input->post('WAKTU_MULAI',TRUE),
                'WAKTU_SELESAI' => $this->input->post('WAKTU_SELESAI',TRUE),
        		'TEMPAT' => $this->input->post('TEMPAT',TRUE),
        		'TIPE_RAPAT' => $this->input->post('TIPE_RAPAT',TRUE),
        		'ID_NOTULEN' => $this->input->post('ID_NOTULEN',TRUE),
        		'STATUS' => $this->input->post('STATUS',TRUE),
        		'PESERTA' => $this->input->post('PESERTA',TRUE),
    	    );

            $this->m_rapat->update($this->input->post('ID_RAPAT', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('mobil'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->m_rapat->get_by_id($id);

        if ($row) {
            $this->m_rapat->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('mobil'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mobil'));
        }
    }

    public function _rules() 
    {
        $this->form_validation->set_rules('KODE_RAPAT', 'kode rapat', 'trim|required');
        $this->form_validation->set_rules('NAMA_RAPAT', 'nama rapat', 'trim|required');
        $this->form_validation->set_rules('ID_PIC', 'id pic', 'trim|required');
        $this->form_validation->set_rules('TANGGAL', 'tanggal', 'trim|required');
        $this->form_validation->set_rules('WAKTU', 'waktu', 'trim|required');
        $this->form_validation->set_rules('TEMPAT', 'tempat', 'trim|required');
        $this->form_validation->set_rules('TIPE_RAPAT', 'tipe rapat', 'trim|required');
        $this->form_validation->set_rules('ID_NOTULEN', 'id notulen', 'trim|required');
        $this->form_validation->set_rules('STATUS', 'status', 'trim|required');
        $this->form_validation->set_rules('PESERTA', 'peserta', 'trim|required');
        // $this->form_validation->set_rules('CREATED_MOBIL', 'created mobil', 'trim|required');

        $this->form_validation->set_rules('ID_RAPAT', 'ID_RAPAT', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function config_image($file_name,$path){
        $config['image_library'] = 'gd2';
        $config['file_name']=$file_name;
        $config['upload_path']=$path;
        $config['allowed_types']='png|jpg|gif';
        $config['max_size']=50000;
        $config['max_height']=50000;
        $config['max_width']=50000;
        $config['overwrite']=TRUE;
        return $config;
    }

}