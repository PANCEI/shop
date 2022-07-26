<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Block extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // cek();
    }
    function index()
    {
        $this->load->view("templates/header");
        $this->load->view("blok/index");
        $this->load->view("templates/footer");
    }
}
