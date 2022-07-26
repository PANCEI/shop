<?php

class User_m extends CI_Model
{
    function user()
    {
        $email = $this->session->userdata('Email');
        $query = "SELECT u.*,h.id as id_hak,h.hak FROM user u JOIN hak_akses h ON h.id=u.id_hak WHERE u.email='$email'";
        return $this->db->query($query)->row_array();
    }
    function single($id)
    {
        return   $this->db->get_where('hak_akses', ['id' => $id])->row_array();
    }
    function infoTOko($id_user)
    {
        $query = "SELECT toko.*,fb,instagram,describe_toko FROM toko LEFT JOIN info_toko ON toko.id=info_toko.id_toko WHERE toko.id_user=$id_user";
        return $this->db->query($query)->row_array();
    }
    function check()
    {
        $data = [
            'id_toko' => $this->input->post('idToko'),
            'id_area' => $this->input->post('idArea')
        ];
        $result = $this->db->get_where('toko_shipping_area', $data);
        if ($result->num_rows() < 1) {
            $this->db->insert('toko_shipping_area', $data);
            return "Area Baru Telah DI Set";
        } else {
            $this->db->delete('toko_shipping_area', $data);
            return "Area Telah Di Hapus";
        }
    }
}
