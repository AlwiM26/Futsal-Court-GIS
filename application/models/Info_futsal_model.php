<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Info_futsal_model extends CI_Model
{

    public $table = 'info_futsal';
    public $id = 'Futsal_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('Futsal_id,Nama,Harga,Lapangan,No_hp,Foto,alamat,g000,g001,g010,g011,g020,g021,g030,g031,g040,g041');
        $this->datatables->from('info_futsal');
        //add this line for join
        //$this->datatables->join('table2', 'info_futsal.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('index.php/info_futsal/read/$1'),'Read')." | ".anchor(site_url('index.php/info_futsal/update/$1'),'Update')." | ".anchor(site_url('index.php/info_futsal/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'Futsal_id');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('Futsal_id', $q);
	$this->db->or_like('Nama', $q);
	$this->db->or_like('Harga', $q);
	$this->db->or_like('Lapangan', $q);
	$this->db->or_like('No_hp', $q);
	$this->db->or_like('Foto', $q);
	$this->db->or_like('alamat', $q);
	$this->db->or_like('g000', $q);
	$this->db->or_like('g001', $q);
	$this->db->or_like('g010', $q);
	$this->db->or_like('g011', $q);
	$this->db->or_like('g020', $q);
	$this->db->or_like('g021', $q);
	$this->db->or_like('g030', $q);
	$this->db->or_like('g031', $q);
	$this->db->or_like('g040', $q);
	$this->db->or_like('g041', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('Futsal_id', $q);
	$this->db->or_like('Nama', $q);
	$this->db->or_like('Harga', $q);
	$this->db->or_like('Lapangan', $q);
	$this->db->or_like('No_hp', $q);
	$this->db->or_like('Foto', $q);
	$this->db->or_like('alamat', $q);
	$this->db->or_like('g000', $q);
	$this->db->or_like('g001', $q);
	$this->db->or_like('g010', $q);
	$this->db->or_like('g011', $q);
	$this->db->or_like('g020', $q);
	$this->db->or_like('g021', $q);
	$this->db->or_like('g030', $q);
	$this->db->or_like('g031', $q);
	$this->db->or_like('g040', $q);
	$this->db->or_like('g041', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Info_futsal_model.php */
/* Location: ./application/models/Info_futsal_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-01-14 09:07:28 */
/* http://harviacode.com */