<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class external extends CI_Controller {

    public function presensi(){
        $this->form_validation->set_rules('nama', 'Nama', 'required|alpha');
        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric');
        $this->form_validation->set_rules('jenisKelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('instansi', 'Instansi', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('telefon', 'Nomor Telefon', 'required|numeric');
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
        $this->form_validation->set_rules('buktiKehadiran', 'Bukti Kehadiran', 'required');

        if($this->form_validation->run() == false){
            $this->load->view('templates/header');
            $this->load->view('v_external');
            $this->load->view('templates/footer');
        } else{
            $nama = $this->input->post('nama');
            $nik = $this->input->post('nik');
            $jenisKelamin = $this->input->post('jenisKelamin');
            $instansi = $this->input->post('instansi');
            $jabatan = $this->input->post('jabatan');
            $telefon = $this->input->post('telefon');
            $email = $this->input->post('email');
            $buktiKehadiran = $this->input->post('buktiKehadiran');
        }
    }
}