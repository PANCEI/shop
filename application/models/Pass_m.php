<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pass_m extends CI_Model
{
    function change()
    {
        $oldpass = $this->input->post('old', true);
        $user = $this->User_m->user();
        if (password_verify($oldpass, $user['pass'])) {
            $this->db->where('id', $user['id']);
            $this->db->set('pass', password_hash($this->input->post('newpass'), PASSWORD_DEFAULT));
            $this->db->update('user');
            return $this->db->affected_rows();
        } else {
            return false;
        }
    }
}
