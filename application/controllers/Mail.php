<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mail extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Menu_m");
        cek();
    }
    function index()
    {
    }
}
