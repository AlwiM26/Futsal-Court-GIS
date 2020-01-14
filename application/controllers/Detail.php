<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends CI_Controller{

    public function __construct(){
        parent::__construct();

        $this->load->model('DetailModel');
    }

    public function back_home(){
        $this->load->view('v_home');
    }
}

?>