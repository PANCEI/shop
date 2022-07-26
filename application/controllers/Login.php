<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function index()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('');
        $this->form_validation->set_rules('name', 'name', 'trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('login');
        } else {
            $data = [
                "email" => htmlspecialchars($this->input->post('name'), true),
                "pass" => $this->input->post('pass')
            ];
            $this->load->model("Login_m");
            $cek = $this->Login_m->log($data['email']);
            if ($cek) {
                //   jika hasil cek ada maka
                //   cek apakah password sama dengan yang ada di email 
                if (password_verify($data['pass'], $cek['pass'])) {
                    // jika ada maka cek lagi apakah user masih aktive atau sudah tidak
                    if ($cek['active'] == 1) {
                        //   ini aktif 
                        $user = [
                            "Email" => $cek['email'],
                            "hak" => $cek['id_hak'],
                            "id" => $cek['id']
                        ];
                        $this->session->set_userdata($user);
                        redirect('dashboard' . "?id=1");
                    } else {
                        //   ini tidak aktif
                        $this->session->set_flashdata('message', 'Email Yang Anda Masukan Telash Non-Aktif Silahkan Hubungi Costumer Sevice Pance Shop');
                        redirect("login");
                    }
                } else {
                    // jika password maka alert
                    $this->session->set_flashdata('message', 'Password yang Anda Masukan Salah');
                    redirect('login');
                }
            } else {
                // jika tidak ada
                $this->session->set_flashdata('message', 'Email Yang Anda Masukan Tidak Terdaftar Silahkan  Hubungi Costumer Service pance Shop');

                redirect('Login');
            }
        }
    }
    function out()
    {
        $data = [
            "Email", 'hak', 'id'
        ];
        $this->session->unset_userdata($data);
        redirect("login");
    }
    function forgot()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
        if ($this->form_validation->run() == false) {
            $this->load->view('forgot');
        } else {
            $this->load->model('Login_m');
            $data = $this->Login_m->forgot();
            $cek = $this->input->post('email');
            if ($data) {
                $token = base64_encode(random_bytes(32));
                $data = [
                    "email" => $this->input->post('email'),
                    "token" => $token,
                    "created" => time()
                ];
                $cekk = $this->_sendemail($token);
                if ($cekk) {
                    $token = $this->Login_m->token($data);
                    if ($token) {
                        $this->session->set_flashdata('warn', "Email Telah Terikirim Seilahkan Cek Email Untuk Melakukan Aktivasi");
                        redirect('login/forgot');
                    } else {
                        $this->session->set_flashdata("message", "Data Tidak masuk");
                        redirect('login/forgot');
                    }
                } else {
                    $this->session->set_flashdata('message', "Email Tidak Terikirim Silahkan Cek Koneksi Anda");
                    redirect('login/forgot');
                }
            } else {
                //   ini tidak aktif
                $this->session->set_flashdata('message', 'Email Yang Anda Masuan Tidak Terdafar Harap Hubungi Admin Pance Shop Untuk Mendaftar');
                redirect("login/forgot");
            }
        }
    }
    private function _sendemail($token)
    {
        $email = $this->input->post('email');
        // $subject = $this->input->post('subject');
        // $pesan = $this->input->post('pesan');

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
        $mail->Subject = "Forgot Password"; // Subjek Email
        $mail->msgHtml('Click Di Sini Untuk Mereset Password <a href="' . base_url('login/reset') . '?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset</a>'); // Isi email dengan format HTML


        if (!$mail->send()) {
            return false;
        } else {
            return true;
        } // Kirim email dengan cek kondisi

    }
    function reset()
    {
        $this->load->model('Login_m');
        $this->form_validation->set_rules('pass', 'pass', 'trim');
        if ($this->form_validation->run() == false) {
            $this->load->view("reset");
        } else {
            $email = $_GET['email'];
            $token = $_GET['token'];
            $token = $this->Login_m->cekToken($email, $token);
            if ($token) {
                $this->session->set_flashdata('warn', "Password Telah Di Reset Silahkan Login");
                redirect('login');
            } else {
                $this->session->set_flashdata('message', "Password Gagal Di Reset");
                redirect('login');
            }
        }
    }
}
