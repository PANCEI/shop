<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Password extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pass_m');
        cek();
    }
    function index()
    {
        $data = [
            'title' => 'Ubah Password',
            "user" => $this->User_m->user()
        ];
        $this->form_validation->set_rules('newpass', 'newpass', 'trim');
        $this->form_validation->set_rules('repeatpass', 'repeatpass', 'trim');
        $this->form_validation->set_rules('old', 'old', 'trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('password/pass');
            $this->load->view('templates/footer');
        } else {
            $cek = $this->Pass_m->change();
            if ($cek) {
                $this->session->set_flashdata('message', 'Password Baru Berhasil Di Pasang');
                redirect('password' . "?id=" . $_GET['id']);
            } else {
                $this->session->set_flashdata('warning', "Password Gagal Di Perbarui  Silahkan Cek Password lama Anda Dengan Baik");
                redirect('password' . "?id=" . $_GET['id']);
            }
        }
    }
}
