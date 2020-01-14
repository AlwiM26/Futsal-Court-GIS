<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Info_futsal extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('Info_futsal_model');
        $this->load->library('form_validation');

        if(!$this->session->userdata('logined') || $this->session->userdata('logined') != true)
        {
            redirect('/');
        }        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('info_futsal/info_futsal_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Info_futsal_model->json();
    }

    public function read($id) 
    {
        $row = $this->Info_futsal_model->get_by_id($id);
        if ($row) {
            $data = array(
		'Futsal_id' => $row->Futsal_id,
		'Nama' => $row->Nama,
		'Harga' => $row->Harga,
		'Lapangan' => $row->Lapangan,
		'No_hp' => $row->No_hp,
		'Foto' => $row->Foto,
		'alamat' => $row->alamat,
		'g000' => $row->g000,
		'g001' => $row->g001,
		'g010' => $row->g010,
		'g011' => $row->g011,
		'g020' => $row->g020,
		'g021' => $row->g021,
		'g030' => $row->g030,
		'g031' => $row->g031,
		'g040' => $row->g040,
		'g041' => $row->g041,
	    );
            $this->load->view('info_futsal/info_futsal_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('info_futsal'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('index.php/info_futsal/create_action'),
	    'Futsal_id' => set_value('Futsal_id'),
	    'Nama' => set_value('Nama'),
	    'Harga' => set_value('Harga'),
	    'Lapangan' => set_value('Lapangan'),
	    'No_hp' => set_value('No_hp'),
	    'Foto' => set_value('Foto'),
	    'alamat' => set_value('alamat'),
	    'g000' => set_value('g000'),
	    'g001' => set_value('g001'),
	    'g010' => set_value('g010'),
	    'g011' => set_value('g011'),
	    'g020' => set_value('g020'),
	    'g021' => set_value('g021'),
	    'g030' => set_value('g030'),
	    'g031' => set_value('g031'),
	    'g040' => set_value('g040'),
	    'g041' => set_value('g041'),
	);
        $this->load->view('info_futsal/info_futsal_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'Nama' => $this->input->post('Nama',TRUE),
		'Harga' => $this->input->post('Harga',TRUE),
		'Lapangan' => $this->input->post('Lapangan',TRUE),
		'No_hp' => $this->input->post('No_hp',TRUE),
		'Foto' => $this->input->post('Foto',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'g000' => $this->input->post('g000',TRUE),
		'g001' => $this->input->post('g001',TRUE),
		'g010' => $this->input->post('g010',TRUE),
		'g011' => $this->input->post('g011',TRUE),
		'g020' => $this->input->post('g020',TRUE),
		'g021' => $this->input->post('g021',TRUE),
		'g030' => $this->input->post('g030',TRUE),
		'g031' => $this->input->post('g031',TRUE),
		'g040' => $this->input->post('g040',TRUE),
		'g041' => $this->input->post('g041',TRUE),
	    );

            $this->Info_futsal_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('index.php/Info_futsal'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Info_futsal_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('index.php/info_futsal/update_action'),
		'Futsal_id' => set_value('Futsal_id', $row->Futsal_id),
		'Nama' => set_value('Nama', $row->Nama),
		'Harga' => set_value('Harga', $row->Harga),
		'Lapangan' => set_value('Lapangan', $row->Lapangan),
		'No_hp' => set_value('No_hp', $row->No_hp),
		'Foto' => set_value('Foto', $row->Foto),
		'alamat' => set_value('alamat', $row->alamat),
		'g000' => set_value('g000', $row->g000),
		'g001' => set_value('g001', $row->g001),
		'g010' => set_value('g010', $row->g010),
		'g011' => set_value('g011', $row->g011),
		'g020' => set_value('g020', $row->g020),
		'g021' => set_value('g021', $row->g021),
		'g030' => set_value('g030', $row->g030),
		'g031' => set_value('g031', $row->g031),
		'g040' => set_value('g040', $row->g040),
		'g041' => set_value('g041', $row->g041),
	    );
            $this->load->view('info_futsal/info_futsal_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('index.php/info_futsal'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('Futsal_id', TRUE));
        } else {
            $data = array(
		'Nama' => $this->input->post('Nama',TRUE),
		'Harga' => $this->input->post('Harga',TRUE),
		'Lapangan' => $this->input->post('Lapangan',TRUE),
		'No_hp' => $this->input->post('No_hp',TRUE),
		'Foto' => $this->input->post('Foto',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'g000' => $this->input->post('g000',TRUE),
		'g001' => $this->input->post('g001',TRUE),
		'g010' => $this->input->post('g010',TRUE),
		'g011' => $this->input->post('g011',TRUE),
		'g020' => $this->input->post('g020',TRUE),
		'g021' => $this->input->post('g021',TRUE),
		'g030' => $this->input->post('g030',TRUE),
		'g031' => $this->input->post('g031',TRUE),
		'g040' => $this->input->post('g040',TRUE),
		'g041' => $this->input->post('g041',TRUE),
	    );

            $this->Info_futsal_model->update($this->input->post('Futsal_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('index.php/info_futsal'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Info_futsal_model->get_by_id($id);

        if ($row) {
            $this->Info_futsal_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('index.php/info_futsal'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('index.php/info_futsal'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('Nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('Harga', 'harga', 'trim|required');
	$this->form_validation->set_rules('Lapangan', 'lapangan', 'trim|required');
	$this->form_validation->set_rules('No_hp', 'no hp', 'trim|required');
	$this->form_validation->set_rules('Foto', 'foto', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('g000', 'g000', 'trim|required');
	$this->form_validation->set_rules('g001', 'g001', 'trim|required');
	$this->form_validation->set_rules('g010', 'g010', 'trim|required');
	$this->form_validation->set_rules('g011', 'g011', 'trim|required');
	$this->form_validation->set_rules('g020', 'g020', 'trim|required');
	$this->form_validation->set_rules('g021', 'g021', 'trim|required');
	$this->form_validation->set_rules('g030', 'g030', 'trim|required');
	$this->form_validation->set_rules('g031', 'g031', 'trim|required');
	$this->form_validation->set_rules('g040', 'g040', 'trim|required');
	$this->form_validation->set_rules('g041', 'g041', 'trim|required');

	$this->form_validation->set_rules('Futsal_id', 'Futsal_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Info_futsal.php */
/* Location: ./application/controllers/Info_futsal.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-01-14 09:07:28 */
/* http://harviacode.com */