<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek();
    }
    function index()
    {
        $this->load->model('Toko_m');
        $this->load->model("User_m");
        $data = [
            "title" => "Dashboard",
            "user" => $this->User_m->user(),
            "area" => $this->Toko_m->area()
        ];
        if ($this->session->userdata('hak') == 3) {
            $data += [
                "jualan" => $this->Toko_m->jumlahjualantoko(),
                "diskon" => $this->Toko_m->jumlahdiskontoko(),
                "pesanan" => $this->Toko_m->jumlahpesanan(),
                "diskontayang" => $this->Toko_m->diskontayang()
            ];
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('dashboard/toko');
            $this->load->view('templates/footer');
        } else {
            $data += [
                "toko" => $this->Toko_m->jumlahtoko(),
                "pembeli" => $this->Toko_m->jumlahpembeli(),
                "jualan" => $this->Toko_m->jumlahjualan(),
                "diskon" => $this->Toko_m->jumlahdiskon(),
                "daerah" => $this->Toko_m->jumlaharea(),
                "coba" => $this->Api_m->getjualan()
            ];
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('dashboard/dasboard');
            $this->load->view('templates/footer');
        }
    }
}
