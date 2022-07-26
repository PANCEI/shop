<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Jenis_m extends CI_Model
{
    function all()
    {
        return $this->db->get('jenis')->result_array();
    }
    function jenisEdit($id)
    {

        $jenis = $this->input->post('jenis');
        $this->db->where('id', $id);
        $this->db->set('jenis', $jenis);
        $this->db->update('jenis');
        return $this->db->affected_rows();
    }
    function jenisAdd($jenis)
    {
        $this->db->insert('jenis', ['jenis' => $jenis]);
        return $this->db->affected_rows();
    }
    function jenisDelete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('jenis');
        return $this->db->affected_rows();
    }
}
