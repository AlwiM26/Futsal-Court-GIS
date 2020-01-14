<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('HomeModel');
	}

	public function index()
	{
		$this->load->view('v_home');
	}

	public function futsal_json(){
		$data = $this->HomeModel->getJson();
	}

	public function detail($id=null){
		$data = $this->HomeModel->getDetail($id);

		//Load into the detail view and send all the data
		$this->load->view('v_detail', $data);
	}
}