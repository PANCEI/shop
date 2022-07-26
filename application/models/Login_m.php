<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login_m extends CI_Model
{
    public function log($email)
    {
        return $this->db->get_where('user', ['email' => $email])->row_array();
    }
    function forgot()
    {
        $email = $this->input->post('email');
        $cek = $this->db->get_where('user', ['email' => $email])->row_array();;
        return $cek;
    }
    function token($data)
    {
        $this->db->insert('user_token', $data);
        return $this->db->affected_rows();
    }
    function cekToken($email, $token)
    {
        $user = $this->db->get_where('user_token', ['email' => $email])->row_array();
        if ($user) {
            if ($user['token'] == $token) {
                $pass = password_hash($this->input->post('pass'), PASSWORD_DEFAULT);
                $this->db->where('email', $email);
                $this->db->set('pass', $pass);
                $this->db->update('user');
                $update = $this->db->affected_rows();
                if ($update) {
                    $this->db->where('email', $email);
                    $this->db->delete('user_token');
                    return $this->db->affected_rows();
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
