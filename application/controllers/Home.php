<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('v_home');
	}

	public function futsal_json(){
		$data = $this->db->get('info_futsal')->result();
		echo json_encode($data);
		// print_r($data);
	}

	public function detail($id=null){
		$data['id'] = $id;

		// Get all the data from db
		$data['nama'] =  $this->db->get_where('info_futsal', array('Futsal_id'=>$id))->row()->Nama;
		$data['harga'] =  $this->db->get_where('info_futsal', array('Futsal_id'=>$id))->row()->Harga;
		$data['jlh_lapangan'] =  $this->db->get_where('info_futsal', array('Futsal_id'=>$id))->row()->Lapangan;
		$data['no_hp'] =  $this->db->get_where('info_futsal', array('Futsal_id'=>$id))->row()->No_hp;
		$data['foto'] =  $this->db->get_where('info_futsal', array('Futsal_id'=>$id))->row()->Foto;
		$data['alamat'] =  $this->db->get_where('info_futsal', array('Futsal_id'=>$id))->row()->alamat;
		//Polygon
		$data['g000'] =  $this->db->get_where('info_futsal', array('Futsal_id'=>$id))->row()->g000;
		$data['g001'] =  $this->db->get_where('info_futsal', array('Futsal_id'=>$id))->row()->g001;
		$data['g010'] =  $this->db->get_where('info_futsal', array('Futsal_id'=>$id))->row()->g010;
		$data['g011'] =  $this->db->get_where('info_futsal', array('Futsal_id'=>$id))->row()->g011;
		$data['g020'] =  $this->db->get_where('info_futsal', array('Futsal_id'=>$id))->row()->g020;
		$data['g021'] =  $this->db->get_where('info_futsal', array('Futsal_id'=>$id))->row()->g021;
		$data['g030'] =  $this->db->get_where('info_futsal', array('Futsal_id'=>$id))->row()->g030;
		$data['g031'] =  $this->db->get_where('info_futsal', array('Futsal_id'=>$id))->row()->g031;
		$data['g040'] =  $this->db->get_where('info_futsal', array('Futsal_id'=>$id))->row()->g040;
		$data['g041'] =  $this->db->get_where('info_futsal', array('Futsal_id'=>$id))->row()->g041;

		// $data = $this->db->get_where('info_futsal', array('Futsal_id'=>$id))->result();

		//Load into the detail view and send all the data
		$this->load->view('v_detail', $data);
	}

	public function search($nama = null){
		$data = $this->db->get_where('info_futsal', array('Nama'=>$nama))->result();
	}
}
//33:46