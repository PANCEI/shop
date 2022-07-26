<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Api_m extends CI_Model
{
    // data jualan 
    function getjualan()
    {
        $jualan = $this->db->get('jualan')->result_array();
        $data = count($jualan);
        for ($i = 0; $i < $data; $i++) {
            if ($jualan[$i]['gambar']) {
                $jualan[$i]["gambar"] = base_url('asset/dist/img/jualan/' . $jualan[$i]['gambar']);
            }
        }
        return $jualan;
    }
    function getjual($id)
    {
        return $this->db->get_where('jualan', ['id' => $id])->result_array();
    }
    function addpembeli($data)
    {
        $this->db->insert('user', $data);
        return $this->db->affected_rows();
    }
    function areaToko($id)
    {
        return "oke";
    }
}
