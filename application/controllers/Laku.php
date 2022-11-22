<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class laku extends RestController
{
    function index_get()
    {
        $data = $this->Api_m->laku();
        if ($data) {
            // Set the response and exit
            $this->response([
                'status' => true,
                'data' => $data
            ], 404);
        } else {
            // Set the response and exit
            $this->response([
                'status' => false,
                'message' => 'tidak ada data'
            ], 404);
        }
    }
}
