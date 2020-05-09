<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Budget extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Budget_model', 'budget');
    }
    public function index_get()
    {
        $param = [
            'jenis_id' => $this->get('jenis_id'),
            'tahun' => $this->get('tahun')
        ];
        
        $jid = $this->get('jenis_id');
        $thn = $this->get('tahun');
        
        if ($jid === null || $thn === null) {
            $Budget = $this->budget->getBudget();
        } else {

            $Budget = $this->budget->getBudget($param);
        }

        if ($Budget) {

            $this->response([
                'status' => true,
                'data' => $Budget
            ], REST_Controller::HTTP_OK);
        } else {

            $this->response([
                'status' => false,
                'message' => 'id not found!'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}
