<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Menu_m");
        cek();
    }
    function index()
    {
        $this->load->model("Sub_m");
        $data = [
            "title" => "Menu Management",
            "menu" => $this->Sub_m->all(),
            "user" => $this->User_m->user()
        ];
        $this->form_validation->set_rules('sub', 'sub', 'trim');
        if ($this->form_validation->run() == false) {
            $this->load->view("templates/header", $data);
            $this->load->view("templates/navbar");
            $this->load->view("templates/sidebar");
            $this->load->view("menu/menu");
            $this->load->view("templates/footer");
        } else {
            $cek = $this->Sub_m->add();
            if ($cek) {
                $this->session->set_flashdata("message", "Menu Baru Berhasil Di Tambahkan");
                $url = "menu?id=$_GET[id]";

                redirect($url);
            }
        }
    }
    function menudelete()
    {
        $this->load->model("Sub_m");
        $dlt = $this->Sub_m->delete();
        if ($dlt) {
            $this->session->set_flashdata('message', "Menu Berhasil DI Hapus");
            $url = "menu?id=$_GET[id]";

            redirect($url);
        }
    }
    function sub()
    {
        $this->load->model("Sub_m");
        $data = [
            "title" => "Sub Menu Management",
            "user" => $this->User_m->user(),
            "menu" => $this->Menu_m->all(),
            "sub" => $this->Sub_m->all()
        ];
        $this->form_validation->set_rules("menu", "menu", "trim");
        $this->form_validation->set_rules('url', 'url', 'trim');
        $this->form_validation->set_rules('icon', 'icon', 'trim');
        if ($this->form_validation->run() == false) {

            $this->load->view("templates/header", $data);
            $this->load->view("templates/navbar");
            $this->load->view("templates/sidebar");
            $this->load->view("menu/sub");
            $this->load->view("templates/footer");
        } else {
            $result = $this->Menu_m->addSubmenu();
            if ($result) {
                $this->session->set_flashdata('message', "Sub Menu Baru Berhasil Di Tambahkan");

                redirect('menu/sub' . "?id=" . $_GET['id']);
            }
        }
    }
    function editsub()
    {
        $result = $this->Menu_m->editsubmenu();
        if ($result == 0) {
            $this->session->set_flashdata('message', 'Anda Tidak Merubah Apapun Dalam Sub Menu');
            redirect('menu/sub' . "?id=" . $_GET['id']);
        } else if ($result == 1) {
            $this->session->set_flashdata('message', 'Sub Menu Berhasil Di Ubah');
            redirect('menu/sub' . '?id=' . $_GET['id']);
        } else {
            $this->session->set_flashdata('message', 'Sub Menu Gagal Di Ubah');
            redirect('menu/sub', '?id=' . $_GET['id']);
        }
    }
    function Subdelete($id)
    {
        $result = $this->Menu_m->deleteSubMenu($id);
        if ($result) {
            $this->session->set_flashdata("message", "Sub Menu Berhasil Di Hapus");
            redirect("menu/sub" . "?id=" . $_GET['id']);
        }
    }
    function access()
    {
        $data = [
            'title' => "Menu Access",
            'user' => $this->User_m->user(),
            "menu" => $this->db->get('hak_akses')->result_array()
        ];
        $this->form_validation->set_rules('akses', 'akses', 'trim');
        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('menu/akses');
            $this->load->view('templates/footer');
        } else {
            $result = $this->Menu_m->userAkses();
            if ($result) {
                $this->session->set_flashdata('message', 'Akses Baru Berhasil Di Tambahkan');
                redirect('menu/access' . "?id=" . $_GET['id']);
            }
        }
    }
    function accessDelete($id)
    {
        $result = $this->Menu_m->userAksesDelete($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Akses Berhasil Di Hapus');
            redirect('menu/access' . "?id=" . $_GET['id']);
        }
    }
    function accessEdit()
    {
        $result = $this->Menu_m->userAksesEdit();

        if ($result == 0) {
            $this->session->set_flashdata('message', 'Anda Tidak Melakukan Perubahan Apapun Pada Akses');
            redirect('menu/access' . "?id=" . $_GET['id']);
        } else if ($result > 0) {
            $this->session->set_flashdata('message', 'Berhasil Merubah Akses');
            redirect('menu/access' . "?id=" . $_GET['id']);
        } else {
            $this->session->set_flashdata('message', 'Gagal Merubah Akses');
            redirect('menu/access' . "?id=" . $_GET['id']);
        }
    }
    function userRole($id)
    {
        $this->load->model('Sub_m');
        $data = [
            'title' => "Menu Access",
            "user" => $this->User_m->user(),
            'single' => $this->User_m->single($id),
            'menu' => $this->Sub_m->all()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('menu/role');
        $this->load->view('templates/footer');
    }
    function checkRole()
    {
        $data = [
            'id_hak' => $this->input->post('role'),
            'id_sub' => $this->input->post('sub')
        ];
        $r = $this->db->get_where('akses_menu_user', $data);
        if ($r->num_rows() < 1) {
            $this->db->insert('akses_menu_user', $data);
            $this->session->set_flashdata('message', 'Akses Berhasil Di Tambahkan');
        } else {
            $this->db->delete('akses_menu_user', $data);
            $this->session->set_flashdata('message', 'Akses Berhasil Di Hapus');
        }
    }
    function subMenuActive()
    {
        $id = $this->input->post('id');
        $cek = $this->input->post("active");
        if ($cek == 1) {
            $this->db->where('id', $id);
            $this->db->set('active', 0);
        } else {
            $this->db->where('id', $id);
            $this->db->set('active', 1);
        }
        $this->db->update('sub_menu_user');
        $this->session->set_flashdata('message', 'Activation Menu Berhasil Di Ubah');
    }
    function jenis()
    {
        $this->load->model("Jenis_m");
        $data = [
            "title" => "Jenis Jualan",
            "user" => $this->User_m->user(),
            "menu" => $this->Jenis_m->all()
        ];
        $this->form_validation->set_rules('jenis', 'jenis', 'trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view("templates/navbar");
            $this->load->view("templates/sidebar");
            $this->load->view('menu/jenis_jualan');
            $this->load->view("templates/footer");
        } else {
            $jenis = htmlspecialchars($this->input->post('jenis'));
            $result = $this->Jenis_m->jenisAdd($jenis);
            if ($result > 0) {
                $this->session->set_flashdata('message', 'Jenis Jualan Berhasil Di Tambahkan');
                redirect('menu/jenis' . "?id=" . $_GET['id']);
            } else {
                $this->session->set_flashdata('message', 'Jenis Jualan gagal Di Tambahkan');
                redirect('menu/jenis' . "?id=" . $_GET['id']);
            }
        }
    }
    function editJenis($id)
    {
        $this->load->model("Jenis_m");
        $result = $this->Jenis_m->jenisEdit($id);
        if ($result == 0) {
            $this->session->set_flashdata("message", "Anda Tidak melakukan Perubahan Pada jenis Jualan");
            redirect('menu/jenis' . "?id=" . $_GET['id']);
        } else if ($result > 0) {
            $this->session->set_flashdata("message", "Anda Berhasil Melakukan Perubahan Pada Jenis Jualan");
            redirect('menu/jenis' . "?id=" . $_GET['id']);
        } else {
            $this->session->set_flashdata("message", "Anda Gagal Melakukan Perubahan Pada Jenis Jualan");
            redirect('menu/jenis' . "?id=" . $_GET['id']);
        }
    }
    function jenisDelete()
    {
        $this->load->model("Jenis_m");
        $id = $this->input->post('id');
        $result = $this->Jenis_m->jenisDelete($id);
        if ($result > 0) {
            $this->session->set_flashdata('message', 'Jenis Jualan Berhasil Di Hapus');
        } else {
            $this->session->flashdata('message', 'Jenis Jualan Gagal Di Hapus');
        }
    }
    function admin()
    {
        $data = [
            "user" => $this->User_m->user(),
            "title" => "Manajemen Admin",
            "admin" => $this->Menu_m->allAdmin()
        ];
        $this->form_validation->set_rules('nama', 'nama', 'trim');
        $this->form_validation->set_rules('email', 'email', 'trim|valid_email|is_unique[user.email]', [
            "is_unique" => "Email Yang Anda Masukan Telah Terdaftar",
            "valid_email" => "Email Yang Anda Masukan Harus Valid"
        ]);
        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('menu/manajemenAdmin');
            $this->load->view('templates/footer');
        } else {
            $cek = $this->Menu_m->addAdmin();
            if ($cek) {
                $this->session->set_flashdata('message', "Admin Baru BerhasilDi Tambahkan");
                redirect('menu/admin' . "?id=" . $_GET['id']);
            } else {
                $this->session->set_flashdata('warn', "Admin Baru Gagal Di Tambahkan");
                redirect('menu/admin' . "?id=" . $_GET['id']);
            }
        }
    }
    function setaktifadmin()
    {
        $cek = $this->Menu_m->activasiadmin();
        $nama = $this->input->post('nama');
        if ($cek) {
            $this->session->set_flashdata('message', "Activasi Pada $nama Telah Di ubah");
        } else {
            $this->session->set_flashdata('message', "Gagal Melakukan Perubahan Activasi Pada User");
        }
    }
    function deleteadmin()
    {
        $cek = $this->Menu_m->deleteadmin();
        $nama = $this->input->post('nama');
        if ($cek) {
            $this->session->set_flashdata('message', $nama . " Telah Di Hapus ");
        } else {
            $this->sessio->set_flashdata('message', "Gagal mengapus");
        }
    }
    function pembeli()
    {
        $data = [
            "user" => $this->User_m->user(),
            "title" => "Manajemen Pembeli",
            "pembeli" => $this->Menu_m->allpembeli()
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('menu/manajemenPembeli');
        $this->load->view('templates/footer');
    }
    function pembeliactive()
    {
        $cek = $this->Menu_m->activasipembeli();
        $nama = $this->input->post('nama');
        if ($cek) {
            $this->session->set_flashdata('message', "Activasi $nama Telah Di Ubah");
        } else {
            $this->session->set_flashdata('message', "Activasi Gagal Di Lakukan");
        }
    }
    function deletepembeli()
    {
        $cek = $this->Menu_m->deletepembeli();
        $nama = $this->input->post('nama');
        if ($cek) {
            $this->session->set_flashdata('message', "$nama Berhasil DI Hapus ");
        } else {
            $this->session->set_flashdata('message', "$nama Gagal Di Hapus");
        }
    }
}
