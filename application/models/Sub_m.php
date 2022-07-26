<?php

class Sub_m extends CI_Model
{
    function all()
    {
        return $this->db->get('menu_user')->result_array();
    }
    function add()
    {
        $data = [
            "nama" => $this->input->post('sub'),
            "urutan" => $this->input->post("urutan")
        ];
        $this->db->insert('menu_user', $data);
        return $this->db->affected_rows();
    }
    function delete()
    {
        $delete = $_GET['idM'];
        $this->db->where('id', $delete);
        $this->db->delete('menu_user');
        return $this->db->affected_rows();
    }
}
