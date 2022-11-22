<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Ikln extends RestController
{
    function index_get()
    {
        $iklan = $this->Api_m->iklan();
        if ($iklan) {
            // Set the response and exit
            $this->response([
                'status' => true,
                'data' => $iklan
            ], 200);
        } else {
            // Set the response and exit
            $this->response([
                'status' => false,
                'message' => 'tidak ada iklan'
            ], 404);
        }
    }
}
