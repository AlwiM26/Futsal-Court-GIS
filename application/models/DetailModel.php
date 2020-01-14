<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DetailModel extends CI_Model{
    
    public $table = 'info_futsal';
    public $id = 'Futsal_id';
    public $order = 'DESC';

    function __construct(){
        parent::__construct();
    }    

}

?>