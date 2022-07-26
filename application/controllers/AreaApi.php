<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class AreaApi extends RestController
{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
    }
    function index_get()
    {
        $id = $this->get('id');
        $cek = $this->Api_m->areaToko($id);
        var_dump($cek);
    }
}
