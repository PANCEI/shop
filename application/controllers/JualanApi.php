<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class JualanApi extends RestController
{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
    }

    function index_get()
    {
        $id = $this->get('id');
        if ($id === null) {
            $jualan = $this->Api_m->getjualan();
        } else {
            $jualan = $this->Api_m->getjual($id);
        }
        if ($jualan) {
            // Set the response and exit
            $this->response([
                'status' => true,
                'data' => $jualan
            ], 404);
        } else {
            // Set the response and exit
            $this->response([
                'status' => false,
                'message' => 'tidak ada jualan'
            ], 404);
        }
    }
}
