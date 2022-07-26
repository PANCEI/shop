<?php
defined('BASEPATH') or exit('No direct script access allowed');

class configurationToko extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek();
    }
    function index()
    {
        $data = [
            'title' => "Toko",
            'user' => $this->User_m->user()
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('toko/index');
        $this->load->view('templates/footer');
    }
}
