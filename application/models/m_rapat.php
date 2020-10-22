<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class m_rapat extends CI_Model
{

    public $table = 'tb_rapat';
    public $id = 'ID_RAPAT';
    public $order = 'DESC';
    public $pic = 'NIK_PIC';
    public $inv = 'NIK';
    public $tb_peserta = 'tb_peserta_rapat';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('ID_rapat,KODE_RAPAT,NAMA_RAPAT,NIK_PIC,TANGGAL,WAKTU_MULAI,WAKTU_SELESAI,TEMPAT,TIPE_RAPAT,PENGUNDANG,NOTA_DINAS,STATUS,PESERTA,NOTULEN,PENANDATANGAN');
        $this->datatables->from('tb_rapat');
        //add this line for join
        //$this->datatables->join('table2', 'tb_mobil.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('rapat/read/$1'),'Read')." | ".anchor(site_url('rapat/update/$1'),'Update')." | ".anchor(site_url('rapat/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'ID_RAPAT');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    //get rapat yg di pic in
    function get_by_pic($pic)
    {
        $this->db->where($this->pic, $pic);
        $this->db->where('STATUS', '0');
        $this->db->order_by('TANGGAL', 'ASC');
        return $this->db->get($this->table)->result();
    }

    //get rapat undangan
    function get_by_inv($inv)
    {
        $this->db->where($this->inv, $inv);
        $this->db->where('STATUS', '0');
        $this->db->select('*');
        $this->db->from('tb_rapat');
        $this->db->join('tb_peserta_rapat', 'tb_peserta_rapat.ID_RAPAT=tb_rapat.ID_RAPAT','inner');
        $this->db->order_by('TANGGAL', 'ASC');
        return $this->db->get()->result();
    }

    //cari agenda rapat pic
    function search_pic($keyword,$nik) 
    {
        $this->db->where('NIK_PIC',$nik);
        $this->db->where('STATUS', '0');
        $this->db->order_by('TANGGAL', 'ASC');
        $this->db->like('NAMA_RAPAT', $keyword);
	    
        return $this->db->get($this->table)->result();
    }

    //cari agenda rapat undangan 
    function search_inv($keyword,$inv) 
    {
        $this->db->where($this->inv, $inv);
        $this->db->where('STATUS', '0');
        $this->db->select('*');
        $this->db->from('tb_rapat');
        $this->db->join('tb_peserta_rapat', 'tb_peserta_rapat.ID_RAPAT=tb_rapat.ID_RAPAT','inner');
        $this->db->order_by('TANGGAL', 'ASC');

        $this->db->like('NAMA_RAPAT', $keyword);

        return $this->db->get()->result();
    }

    //get rapat dari kode
    function get_by_kode($kode)
    {
        $this->db->where('KODE_RAPAT',$kode);
        $this->db->where('STATUS','0');
        return $this->db->get($this->table)->row();
    }

    //presensi rapat
    function join_rapat($id,$inv,$bukti)
    {
        $data['data']=array(
            'ID_RAPAT' => $id,
            'NIK' => $inv,
            'WAKTU_PRESENSI' => date("Y-m-d H:i:s"),
            'BUKTI_KEHADIRAN' => $bukti,
        );

        $this->db->insert('tb_peserta_rapat', $data['data']);
    }

    //get data rapat dan peserta rapat dari nik dan id rapat
    function get_data_peserta_rapat($nik,$rapat)
    {
        $this->db->where($this->inv, $nik);
        $this->db->where('tb_rapat.ID_RAPAT',$rapat);
        $this->db->where('STATUS', '0');
        $this->db->select('*');
        $this->db->from('tb_peserta_rapat');
        $this->db->join('tb_rapat', 'tb_peserta_rapat.ID_RAPAT=tb_rapat.ID_RAPAT','inner');
        return $this->db->get()->row();
    }

    //get data user peserta rapat
    function get_peserta_rapat($rapat)
    {
        $this->db->where('tb_peserta_rapat.ID_RAPAT',$rapat);
        $this->db->select('tb_users.NAMA, tb_peserta_rapat.WAKTU_PRESENSI, tb_peserta_rapat.BUKTI_KEHADIRAN');
        $this->db->from('tb_users');
        $this->db->join('tb_peserta_rapat', 'tb_peserta_rapat.NIK=tb_users.NIK','inner');
        return $this->db->get()->result();
    }

     // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        $data=$this->db->get($this->table);
        return $data->row();
    }

    // insert data rapat
    function insert($data)
    {
        $this->db->insert($this->table, $data['data']);
        $this->db->insert_id();
    }

    //generate kode rapat
    function generate_code() { 

        $chars = "abcdefghijkmnopqrstuvwxyz023456789"; 
        srand((double)microtime()*1000000); 
        $i = 0; 
        $pass = '' ; 
    
        while ($i <= 7) { 
            $num = rand() % 33; 
            $tmp = substr($chars, $num, 1); 
            $pass = $pass . $tmp; 
            $i++; 
        } 
    
        if($this->db->where('EMAIL',$pass) ){
            return $pass;
        }
        else $this->generate_code();
    
    } 

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id)->update($this->table, $data['update']);           
    }

    // delete rapat (cuma ganti status)
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->set('STATUS','1');
        $this->db->update($this->table);
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('ID_RAPAT', $q);
        $this->db->or_like('KODE_RAPAT', $q);
        $this->db->or_like('NAMA_RAPAT', $q);
	    $this->db->or_like('NIK_PIC', $q);
	    $this->db->or_like('TANGGAL', $q);
        $this->db->or_like('WAKTU_MULAI', $q);
        $this->db->or_like('WAKTU_SELESAI',$q);
	    $this->db->or_like('TEMPAT', $q);
        $this->db->or_like('TIPE_RAPAT', $q);
        $this->db->or_like('PENGUNDANG', $q);
        $this->db->or_like('NOTA_DINAS', $q);
	    $this->db->or_like('STATUS', $q);
        $this->db->or_like('NOTULEN', $q);
        $this->db->or_like('PENANDATANGAN', $q);
	    $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('ID_RAPAT', $q);
        $this->db->or_like('KODE_RAPAT', $q);
	    $this->db->or_like('NAMA_RAPAT', $q);
	    $this->db->or_like('NIK_PIC', $q);
	    $this->db->or_like('TANGGAL', $q);
        $this->db->or_like('WAKTU_MULAI', $q);
        $this->db->or_like('WAKTU_SELESAI',$q);
	    $this->db->or_like('TEMPAT', $q);
        $this->db->or_like('TIPE_RAPAT', $q);
        $this->db->or_like('PENGUNDANG', $q);
        $this->db->or_like('NOTA_DINAS', $q);
	    $this->db->or_like('STATUS', $q);
        $this->db->or_like('NOTULEN', $q);
        $this->db->or_like('PENANDATANGAN', $q);
	    $this->db->from($this->table);
    	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

}
