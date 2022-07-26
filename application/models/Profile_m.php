<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Profile_m extends CI_Model
{
    function edittoko()
    {
        $id_user = $this->input->post('id_user');
        $data = [
            'nama' => $this->input->post('nama', true),
            'alamat' => $this->input->post('alamat', true),
            'numberPhone' => $this->input->post('numberPhone')
        ];
        if ($_FILES['gambar']['name']) {

            $cek = $this->Upload_m->upl('profile');
            if ($cek['result'] == 1) {
                if ($this->input->post('oldgambar') != 'deafult.png') {
                    unlink(FCPATH . "/asset/dist/img/profile/" . $this->input->post('oldgambar'));
                }
                $data += [
                    'gambar' => $cek['file']['file_name']
                ];
            } else {
                return false;
            }
        }
        $this->db->where('id', $id_user);
        $this->db->set($data);
        $this->db->update('user');
        $result = $this->db->affected_rows();
        if ($result == 0 || $result == 1) {
            $info = [
                "fb" => $this->input->post('fb'),
                "instagram" => $this->input->post('instagram'),
                "describe_toko" => $this->input->post('deskripsi')
            ];
            $result = $this->db->get_where('info_toko', ['id_toko' => $this->input->post('id_toko')]);
            if ($result->num_rows() < 1) {
                $info += [
                    'id_toko' => $this->input->post('id_toko')
                ];
                $this->db->insert('info_toko', $info);
                return $this->db->affected_rows();
            } else {
                $this->db->where('id_toko', $this->input->post('id_toko'));
                $this->db->set($info);
                $this->db->update('info_toko');
                return $this->db->affected_rows();
            }
        }
    }
    function editprofile()
    {
        $id = $this->input->post('id');
        $data = [
            "nama" => $this->input->post('nama'),
            "numberPhone" => $this->input->post('numberPhone')
        ];
        if ($_FILES['gambar']['name']) {
            $cek = $this->Upload_m->upl('profile');
            if ($cek['result'] == 1) {
                if ($this->input->post('oldgambar') != 'deafult.png') {
                    unlink(FCPATH . "/asset/dist/img/profile/" . $this->input->post('oldgambar'));
                }
                $data += [
                    "gambar" => $cek['file']['file_name']
                ];
            } else {
                return -1;
            }
            $this->db->where("id", $id);
            $this->db->set($data);
            $this->db->update('user');
            return $this->db->affected_rows();
        }
    }
}
