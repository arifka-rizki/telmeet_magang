<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class m_rapat extends CI_Model
{

    public $table = 'tb_rapat';
    public $id = 'ID_RAPAT';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('ID_rapat,KODE_RAPAT,NAMA_RAPAT,ID_PIC,TANGGAL,WAKTU_MULAI,WAKTU_SELESAI,TEMPAT,TIPE_RAPAT,PENGUNDANG,NOTA_DINAS,STATUS,PESERTA,NOTULEN');
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

    /* get data avalilable car
    function get_available()
    {
        $this->db->where("STATUS_SEWA", 0);
        return $this->db->get($this->table)->result();
    }*/

     // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        $data=$this->db->get($this->table);
        return $data->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('ID_RAPAT', $q);
        $this->db->or_like('KODE_RAPAT', $q);
        $this->db->or_like('NAMA_RAPAT', $q);
	    $this->db->or_like('ID_PIC', $q);
	    $this->db->or_like('TANGGAL', $q);
        $this->db->or_like('WAKTU_MULAI', $q);
        $this->db->or_like('WAKTU_SELESAI',$q);
	    $this->db->or_like('TEMPAT', $q);
        $this->db->or_like('TIPE_RAPAT', $q);
        $this->db->or_like('PENGUNDANG', $q);
        $this->db->or_like('NOTA_DINAS', $q);
	    $this->db->or_like('STATUS', $q);
        $this->db->or_like('PESERTA', $q);
        $this->db->or_like('NOTULEN', $q);
	    $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('ID_RAPAT', $q);
        $this->db->or_like('KODE_RAPAT', $q);
	    $this->db->or_like('NAMA_RAPAT', $q);
	    $this->db->or_like('ID_PIC', $q);
	    $this->db->or_like('TANGGAL', $q);
        $this->db->or_like('WAKTU_MULAI', $q);
        $this->db->or_like('WAKTU_SELESAI',$q);
	    $this->db->or_like('TEMPAT', $q);
        $this->db->or_like('TIPE_RAPAT', $q);
        $this->db->or_like('PENGUNDANG', $q);
        $this->db->or_like('NOTA_DINAS', $q);
	    $this->db->or_like('STATUS', $q);
        $this->db->or_like('PESERTA', $q);
        $this->db->or_like('NOTULEN', $q);
	    $this->db->from($this->table);
    	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    /*function insert($data)
    {
        $this->db->insert($this->table, $data['data']);
        $id=$this->db->insert_id();

        foreach ($data["fasilitas"] as $key => $value) {
            $data["fasilitas"][$key]["ID_MOBIL"]=$id;
        }
        
        $data["photo"]["ID_MOBIL"]=$id;
        
        $this->db->insert_batch($this->table_fasilitas, $data["fasilitas"]);
        $this->db->insert($this->table_gallery, $data['photo']);
    }

    // update data
    function update($id, $data)
    {

        $this->db->where($this->id, $id)->update($this->table, $data['data']);

        $this->db->where($this->id, $id)->delete($this->table_fasilitas);
        foreach ($data["fasilitas"] as $key => $value) {
            $data["fasilitas"][$key]["ID_MOBIL"]=$id;
        }
        
        if ($data["fasilitas"]) {
            $this->db->insert_batch($this->table_fasilitas, $data["fasilitas"]);
        }

        if ($data["photo"]) {
            $this->db->where($this->id, $id)->delete($this->table_gallery);
            // $this->db->delete($this->table_gallery);
            $data["photo"]["ID_MOBIL"]=$id;
            $this->db->insert($this->table_gallery, $data['photo']);
        }
        
    


    }*/

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}
