<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Instansi extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Instansi_model', 'instansi');
    }
    public function index_get()
    {
        $id = $this->get('id');

        if ($id === null) {

            $Instansi = $this->instansi->getInstansi();
        } else {

            $Instansi = $this->instansi->getInstansi($id);
        }

        if ($Instansi) {

            $this->response([
                'status' => true,
                'data' => $Instansi
            ], REST_Controller::HTTP_OK);
        } else {

            $this->response([
                'status' => false,
                'message' => 'id not found!'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}
