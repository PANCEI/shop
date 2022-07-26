<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Config extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Toko_m");
        cek();
    }
    function index()
    {
        $this->load->model("Jenis_m");
        $data = [
            'title' => "E-commerce Toko",
            'user' => $this->User_m->user(),
            "toko" => $this->Toko_m->toko(),
            "jualan" => $this->Jenis_m->all()
        ];
        $this->form_validation->set_rules('nama', 'nama', 'trim');
        $this->form_validation->set_rules('email', 'email', 'trim|is_unique[user.email]|valid_email', [
            "is_unique" => "Email Ini Telah Terdaftar",
            "valid_email" => "Email Yang Anda Masukan Tidak Valid Silahkan Cek Kembali"
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('toko/index');
            $this->load->view('templates/footer');
        } else {
            $cek = $this->Toko_m->tambahtoko();
            if ($cek) {
                $this->session->set_flashdata('message', "Toko Baru Berhasil Di Tambahkan");
                redirect('config' . "?id=" . $_GET['id']);
            } else {
                $this->session->set_flashdata('warn', "Toko Baru Gagal Di Tambahkan");
                redirect('config' . "?id=" . $_GET['id']);
            }
        }
    }
    function deleteToko()
    {
        $cek = $this->Toko_m->deleteToko();
        if ($cek) {
            $this->session->set_flashdata('message', "Toko Berhasil Di hapus");
        } else {
            $this->session->set_flashdata('message', "Toko Gagal Di Hapus");
        }
    }
    function barang()
    {
        $data = [
            'title' => "Daftar Jualan",
            "user" => $this->User_m->user(),


        ];
        if ($this->session->userdata('hak') == 3) {
            $data += [
                'barang' => $this->Toko_m->barangtoko($data['user']['id'])
            ];
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('toko/barangtoko');
            $this->load->view('templates/footer');
        } else {
            $data += [
                "barang" => $this->Toko_m->barang()
            ];
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('toko/barang');
            $this->load->view('templates/footer');
        }
    }
    function editjualan()
    {
        $data = [
            "title" => "Daftar Jualan",
            "judul" => "Edit Jualan",
            "user" => $this->User_m->user(),
            "jualan" => $this->Toko_m->singlebarang($_GET['idb'])
        ];
        $this->form_validation->set_rules('nama_barang', 'nama_barang', 'trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('toko/editbarang');
            $this->load->view('templates/footer');
        } else {
            $cek = $this->Toko_m->editjualan();
            $ceksub = $this->Toko_m->editsubgamabr();
            if ($cek && $ceksub || $cek && !$ceksub || !$cek && $ceksub) {
                $this->session->set_flashdata('message', 'Data Barang Jualan Berhasil Di Ubah');
                redirect("config/editjualan" . "?id=" . $_GET['id'] . "&idb=" . $_GET['idb']);
            } else {
                $this->session->set_flashdata('message', 'Data Barang Jualan Gagal Di Ubah');
                redirect("config/editjualan" . "?id=" . $_GET['id'] . "&idb=" . $_GET['idb']);
            }
        }
    }
    function deletejualan()
    {
        $id = $this->Toko_m->deletejualan();
        if ($id) {
            $this->session->set_flashdata('message', "Jualan Telah Di Hapus $id");
        } else {
            $this->session->set_flashdata('message', 'jualan gagal Di Hapus');
        }
    }
    function addp()
    {
        $data = [
            "title" => "Daftar Jualan",
            "judul" => "Tambah Jualan",
            "user" => $this->User_m->user(),
            'toko' => $this->Toko_m->singletoko()
        ];
        $this->form_validation->set_rules('nama_barang', 'nama_barang', 'trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('toko/tambahbarang');
            $this->load->view('templates/footer');
        } else {
            $cek = $this->Toko_m->tambahjualan();
            if ($cek) {
                $this->session->set_flashdata('message', "jualan Baru Berhasil DI Tambahkan");
                redirect("config/barang" . "?id=" . $_GET['id']);
            }
        }
    }
    function diskon()
    {
        $data = [
            "title" => "Daftar Jualan Diskon",
            "user" => $this->User_m->user(),
        ];
        if ($this->session->userdata('hak') == 3) {
            $data += [
                'diskon' => $this->Toko_m->diskontoko($data['user']['id'])
            ];
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('toko/diskontoko');
            $this->load->view('templates/footer');
        } else {
            $data += [
                "diskon" => $this->Toko_m->diskon()
            ];
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('toko/diskon');
            $this->load->view('templates/footer');
        }
    }
    function setdiskonbarang()
    {
        $data = [
            "title" => "Daftar Jualan",
            "judul" => "Edit Diskon",
            "user" => $this->User_m->user(),
            'jualan' => $this->Toko_m->singlebarang($_GET['idj'])
        ];
        $this->form_validation->set_rules('diskon', 'diskon', 'trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('toko/setdiskon');
            $this->load->view('templates/footer');
        } else {
            $cek = $this->Toko_m->setdiskon();
            if ($cek) {
                $this->session->set_flashdata('message', "Diskon Berhasil Di Set");
                redirect('config/barang' . "?id=" . $_GET['id']);
            }
        }
    }
    function editdiskon()
    {
        $data = [
            'title' => "Daftar Jualan Diskon",
            "judul" => "Ubah Diskon",
            "user" => $this->User_m->user(),
            "diskon" => $this->Toko_m->ubahdiskon($_GET['idd'])
        ];
        $this->form_validation->set_rules('diskon', 'diskon', 'trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('toko/ubahdiskon');
            $this->load->view('templates/footer');
        } else {
            $cek = $this->Toko_m->changediskon();
            if ($cek == 0) {
                $this->session->set_flashdata('message', 'Tidak Di Lakukan Perubahan Apapun Pada diskon');
                redirect('config/editdiskon' . "?id=" . $_GET['id'] . "&idd=" . $_GET['idd']);
            } else if ($cek > 0) {
                $this->session->set_flashdata('message', 'Diskon Berhasil Di Rubah');
                redirect('config/editdiskon' . "?id=" . $_GET["id"] . "&idd=" . $_GET['idd']);
            } else {
                $this->session->set_flashdata('warn', 'Diskon Gagal Di Lakukan Perubahan');
                redirect('config/editdiskon' . "?id=" . $_GET['id'] . "&idd=" . $_GET['idd']);
            }
        }
    }
    function deletediskon()
    {
        $cek = $this->Toko_m->deletediskon();
        if ($cek) {
            $this->session->set_flashdata('message', "Diskon Telah Di Ubah");
        } else {
            $this->session->set_flashdata('message', "Diskon Gagal Di Ubah");
        }
    }
    function pesanan()
    {
        $data = [
            "title" => "Pesanan",
            "user" => $this->User_m->user()

        ];
        if ($this->session->userdata('hak') == 3) {
            $data += [
                "pesanan" => $this->Toko_m->pesanantoko($data['user']['id'])
            ];
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('toko/pesanantoko');
            $this->load->view('templates/footer');
        } else {
            $data += [
                "pesanan" => $this->Toko_m->gettoko()
            ];
            $this->load->view("templates/header", $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('toko/pesanan');
            $this->load->view('templates/footer');
        }
    }
    function deletepesanan()
    {
        $cek = $this->Toko_m->pesanandelete();
        if ($cek) {
            $this->session->set_flashdata('message', "Pesanan Berhasil Di hapus");
        } else {
            $this->session->set_flashdata('message', "Pesanan Gagal Di Hapus");
        }
    }
    function iklan()
    {
        $data = [
            "title" => "Iklan",
            "user" => $this->User_m->user(),
            "iklan" => $this->Toko_m->iklan()
        ];
        $this->form_validation->set_rules('gambar', 'gambar', 'trim');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required', [
            "required" => "Deskripsi Tidak Boleh Kosong"
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('toko/iklan');
            $this->load->view('templates/footer');
        } else {
            $result = $this->Toko_m->addIklan();
            if ($result == 1) {
                $this->session->set_flashdata('message', 'Iklan Berhasil di Tambahkan');
                redirect('config/iklan' . "?id=" . $_GET['id']);
            } else {
                $this->session->set_flashdata('message', 'Iklan Gagal Di Tambahkan Silahkan Cek Ukuran Gambar Tidak Melebihi 2mb Dan Ekstensi Gambar Jpg|Jpeg|Png');
                redirect('config/iklan' . "?id=" . $_GET['id']);
            }
        }
    }
    // function iklanedit()
    // {
    //     $data = [
    //         "title" => "Iklan",
    //         "user" => $this->User_m->user()
    //     ];
    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/navbar');
    //     $this->load->view('templates/sidebar');
    //     $this->load->view('toko/iklanedit');
    //     $this->load->view('templates/footer');
    // }
    function deleteiklan()
    {
        $id = $this->input->post("id");
        $gambar = $this->input->post("gambar");
        $result = $this->Toko_m->iklanDelete($id, $gambar);
        if ($result) {
            $this->session->set_flashdata('message', 'Iklan Telah Berhasil Di Hapus');
        } else {
            $this->sssion->set_flashdata("Err", "iklan tidak berhasil di hapus");
        }
    }
    function mail()
    {
        $data = [
            "title" => "Mailbox",
            "user" => $this->User_m->user(),
            "pesan" => $this->Toko_m->allemail()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('toko/mail');
        $this->load->view('templates/footer');
    }
    function readmail()
    {
        $data = [
            "title" => "Mailbox",
            "user" => $this->User_m->user(),
            "judul" => "Baca Email",
            "pesan" => $this->Toko_m->getemail()
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('toko/reademail');
        $this->load->view('templates/footer');
    }
    function mailkirim()
    {
        $data = [
            "title" => "Mailbox",
            "user" => $this->User_m->user(),
            "judul" => "Kirim Email",
            "email" => $this->Toko_m->emailToko()
        ];
        $this->form_validation->set_rules('subject', 'subject', "trim");
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('toko/mailkirim');
            $this->load->view('templates/footer');
        } else {
            $kirim = $this->__send();
            if ($kirim) {
                $pesan = $this->Toko_m->tambahemail();
                $this->session->set_flashdata('message', "Email Berhasil DI Kirim");
                redirect("config/mail" . "?id=" . $_GET['id']);
            } else {
                $this->session->set_flashdata('warn', "Email Tidak Terkirim Silahkan Cek Koneksi Anda");
                redirect("config/mail" . "?id=" . $_GET['id']);
            }
        }
    }
    private function  __send()
    {
        $email = $this->input->post('email');
        $subject = $this->input->post('subject');
        $pesan = $this->input->post('pesan');

        $this->load->library('PHPMailer_load'); //Load Library PHPMailer
        $mail = $this->phpmailer_load->load(); // Mendefinisikan Variabel Mail
        $mail->isSMTP();  // Mengirim menggunakan protokol SMTP
        $mail->Host = 'smtp.gmail.com'; // Host dari server SMTP
        $mail->SMTPAuth = true; // Autentikasi SMTP
        $mail->Username = 'aswarhamid12@gmail.com';
        $mail->Password = 'rgvflnafjgqtxmyw ';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom('panceshop@gmail.com', 'Pance Shop'); // Sumber email
        $mail->addAddress("$email", 'Kompi Kaleng'); // Masukk
        $mail->Subject = "$subject"; // Subjek Email
        $mail->msgHtml("$pesan"); // Isi email dengan format HTML


        if (!$mail->send()) {
            return false;
        } else {
            return true;
        } // Kirim email dengan cek kondisi

    }
    function emaildelete()
    {
        $id = $this->Toko_m->emaildelete();
        if ($id) {
            $this->session->set_flashdata('message', "Pesan Telah Terhapus");
        } else {
            $this->session->set_flashdata('message');
        }
    }
    function area()
    {
        $data = [
            "title" => "Shipping Area",
            "user" => $this->User_m->user(),
            "area" => $this->Toko_m->area(),
            "available" => $this->Toko_m->area_available()

        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('menu/area');
        $this->load->view('templates/footer');
    }
    function areatambah()
    {
        $data = $this->Toko_m->addArea();
        if ($data == -1) {
            $this->session->set_flashdata('warn', 'Inputan Tidak Boelh Kosong');
        } else if ($data == 1) {
            $this->session->set_flashdata('message', 'Area Baru Berhasil Di Tambahkan');
        } else {
            $this->session->set_flashdata('warn', 'Data Gagal Di Tambahkan');
        }
    }
    function areadelete()
    {
        $data = $this->Toko_m->areaDelete();
        if ($data) {
            $this->session->set_flashdata('message', "Area Telah DI Hapus");
        } else {
            $this->session->set_flashdata('message', 'Area Gagal Di Hapus');
        }
    }
    function areaToko()
    {
        $data = [
            "title" => "Toko Area Shipping",
            "user" => $this->User_m->user(),
            "menu" => $this->Toko_m->allToko()
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('menu/areaToko');
        $this->load->view('templates/footer');
    }
    function areaSet()
    {
        $data = [
            "title" => "Toko Area Shipping",
            "user" => $this->User_m->user(),
            "judul" => "Set Area Shipping Toko",
            "menu" => $this->Toko_m->area()
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('menu/setArea');
        $this->load->view('templates/footer');
    }
    function setArea()
    {

        $id_area = $this->Toko_m->checkToko();
        if ($id_area) {
            $this->session->set_flashdata('message', "$id_area");
        } else {
            $this->session->set_flashdata('message', 'Area Toko Gagal Di Ubah');
        }
    }
}
