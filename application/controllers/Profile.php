<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek();
        $this->load->model("Toko_m");
        $this->load->model('Profile_m');;
    }
    function index()
    {

        $data = [
            "title" => "My Profile",
            "user" => $this->User_m->user()
        ];

        if ($this->session->userdata('hak') == 3) {
            $data += [

                "info" => $this->User_m->infoTOko($data['user']['id']),
                "toko" => $this->Toko_m->area(),
            ];
            $this->form_validation->set_rules('nama', 'nama', 'trim');
            if ($this->form_validation->run() == false) {
                $this->load->view('templates/header', $data);
                $this->load->view("templates/navbar");
                $this->load->view("templates/sidebar");
                $this->load->view("profile/toko");
                $this->load->view("templates/footer");
            } else {
                $cek = $this->Profile_m->edittoko();
                if ($cek) {
                    $this->session->set_flashdata('message', "Profile Berhasil Di ubah");
                    redirect('profile' . "?id=" . $_GET['id']);
                } else {
                    $this->session->set_flashdata('warn', "Profile Gagal Di Ubah Silahkan Cek Gambar Apakah Ekstesi Jpg|PNG atau JPEG dan Ukuran 2mb");
                    redirect('profile' . "?id=" . $_GET['id']);
                }
            }
        } else {
            $data += ["hak_akses" => $this->db->get('hak_akses')->result_array()];
            $this->form_validation->set_rules('nama', 'nama', 'trim');
            $this->form_validation->set_rules('numberPhone', 'numberPhone', 'numeric', [
                "numeric" => "Nomor Telefon Harus Di isi dengan Angka"
            ]);

            if ($this->form_validation->run() == false) {
                $this->load->view('templates/header', $data);
                $this->load->view("templates/navbar");
                $this->load->view("templates/sidebar");
                $this->load->view("profile/index");
                $this->load->view("templates/footer");
            } else {
                $cek = $this->Profile_m->editprofile();

                if ($cek == 1 || $cek == 0) {
                    $this->session->set_flashdata('message', "Profile Berhasil Di Ubah");
                    redirect('Profile' . "?id=" . $_GET['id']);
                } else {
                    $this->session->set_flashdata('warn', 'Profile Gagal Di Upload Silahkan Cek Ekstensi Gambar Apakah JPEG JPG PNG Dan Ukuran Gambar 2mb ');
                    redirect('Profile' . "?id=" . $_GET['id']);
                }
            }
        }
    }
    function area()
    {
        $cek = $this->User_m->check();
        if ($cek) {
            $this->session->set_flashdata('message', " $cek");
        } else {
            $this->session->set_flashdata('message', 'data tidak ada');
        }
    }
}
