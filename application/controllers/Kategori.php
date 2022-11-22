<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Kategori extends RestController
{
    function index_get()
    {
        $kategori = $this->Api_m->kategori();
        if ($kategori) {
            // Set the response and exit
            $this->response([
                'status' => true,
                'data' => $kategori
            ], 200);
        } else {
            // Set the response and exit
            $this->response([
                'status' => false,
                'message' => 'tidak ada kategori'
            ], 404);
        }
    }
}
