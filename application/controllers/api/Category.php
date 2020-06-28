<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Category extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Category_model', 'category');
    }
    public function index_get()
    {
        $id = $this->get('id');

        if ($id === null) {

            $Category = $this->category->getCategory();
        } else {

            $Category = $this->category->getCategory($id);
        }

        if ($Category) {

            $this->response([
                'status' => true,
                'data' => $Category
            ], REST_Controller::HTTP_OK);
        } else {

            $this->response([
                'status' => false,
                'message' => 'id not found!'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}
