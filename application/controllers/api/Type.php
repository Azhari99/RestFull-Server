<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Type extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Type_model', 'type');
    }
    public function index_get()
    {
        $id = $this->get('id');

        if ($id === null) {

            $Type = $this->type->getType();
        } else {

            $Type = $this->type->getType($id);
        }

        if ($Type) {

            $this->response([
                'status' => true,
                'data' => $Type
            ], REST_Controller::HTTP_OK);
        } else {

            $this->response([
                'status' => false,
                'message' => 'id not found!'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}
