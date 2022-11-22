<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Diskonapi extends RestController
{
    function  index_get()
    {
        $diskon = $this->Api_m->diskon();
        if ($diskon) {
            // Set the response and exit
            $this->response([
                'status' => true,
                'data' => $diskon
            ], 200);
        } else {
            // Set the response and exit
            $this->response([
                'status' => false,
                'message' => 'tidak ada diskon'
            ], 404);
        }
    }
}
