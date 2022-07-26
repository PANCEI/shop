<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class PembeliApi extends RestController
{
    function index_post()
    {
        $data = [
            'nama' => $this->post('nama'),
            'email' => $this->post('email'),
            'pass' => $this->post('pass'),
            'alamat' => $this->post('alamat'),
            'gambar' => $this->post('gambar'),
            'id_hak' => $this->post('id_hak'),
            'active' => $this->post('active'),
            'created' => $this->post('created'),
            'numberPhone' => $this->post('numberPhone'),
        ];
        if ($this->Api_m->addpembeli($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'user telah bertambah'
            ], 201);
        } else {
            $this->response([
                'status' => false,
                'message' => 'User Gagal Di Tambah'
            ], 500);
        }
    }
}
