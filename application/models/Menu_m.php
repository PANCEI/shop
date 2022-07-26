<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Menu_m extends CI_Model
{
    function all()
    {
        $query = "SELECT u.id,m.id as sub,menu,url,icon,nama,active from sub_menu_user u JOIN menu_user m on m.id=u.id_sub";
        return $this->db->query($query)->result_array();
    }
    function addSubmenu()
    {
        $data = [
            "menu" => htmlspecialchars($this->input->post('menu')),
            "url" => htmlspecialchars($this->input->post('url')),
            "icon" => htmlspecialchars($this->input->post('icon')),
            "id_sub" => htmlspecialchars($this->input->post('sub')),
            "active" => htmlspecialchars($this->input->post('active'))
        ];
        $this->db->insert('sub_menu_user', $data);
        return $this->db->affected_rows();
    }
    function editsubmenu()
    {
        $data = [
            'menu' => $this->input->post('menu'),
            'icon' => $this->input->post('icon'),
            'id_sub' => $this->input->post('sub')
        ];
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $this->db->set($data);
        $this->db->update('sub_menu_user');
        return $this->db->affected_rows();
    }
    function deleteSubMenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('sub_menu_user');
        return $this->db->affected_rows();
    }
    function userAkses()
    {
        $data = [
            'hak' => $this->input->post('akses')
        ];
        $this->db->insert('hak_akses', $data);
        return $this->db->affected_rows();
    }
    function userAksesDelete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('hak_akses');
        return $this->db->affected_rows();
    }
    function userAksesEdit()
    {
        $id = $this->input->post('id');
        $hak = $this->input->post('akses');
        $this->db->where('id', $id);
        $this->db->set('hak', $hak);
        $this->db->update('hak_akses');
        return $this->db->affected_rows();
    }
    function allAdmin()
    {
        return $this->db->get_where('user', ['id_hak' => 2])->result_array();
    }
    function addAdmin()
    {
        $data = [
            "nama" => $this->input->post('nama'),
            "email" => $this->input->post('email'),
            "pass" => password_hash('123', PASSWORD_DEFAULT),
            "alamat" => $this->input->post('alamat'),
            "numberPhone" => $this->input->post('numberPhone'),
            "active" => $this->input->post('active'),
            "created" => time(),
            "gambar" => "deafult.png",
            "id_hak" => 2
        ];
        $this->db->insert('user', $data);
        return $this->db->affected_rows();
    }
    function activasiadmin()
    {
        $id = $this->input->post('id');
        $active = $this->input->post('active');
        // cek apakah active sama dengan 1
        if ($active == 1) {
            // set aktif sama dengan 0
            $this->db->where('id', $id);
            $this->db->set('active', 0);
            $this->db->update('user');
            return $this->db->affected_rows();
        } else {
            // jika tidak maka set aktif sama dengan satu 
            $this->db->where('id', $id);
            $this->db->set('active', 1);
            $this->db->update('user');
            return $this->db->affected_rows();
        }
    }
    function deleteadmin()
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $this->db->delete('user');
        return $this->db->affected_rows();
    }
    function allpembeli()
    {
        $query = "SELECT * FROM user WHERE id_hak != 2 AND id_hak !=3";
        return $this->db->query($query)->result_array();
    }
    function activasipembeli()
    {
        $id = $this->input->post('id');
        $active = $this->input->post('active');
        if ($active == 1) {
            $this->db->where('id', $id);
            $this->db->set('active', 0);
            $this->db->update('user');
            return $this->db->affected_rows();
        } else {
            $this->db->where('id', $id);
            $this->db->set('active', 1);
            $this->db->update('user');
            return $this->db->affected_rows();
        }
    }
    function deletepembeli()
    {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $this->db->delete('user');
        return $this->db->affected_rows();
    }
}
