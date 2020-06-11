<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class BudgetInstituteOut extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('BudgetInstituteOut_model', 'budgetinstituteout');
    }
    public function index_get()
    {
        $param = [
            'tbl_instansi_id' => $this->get('tbl_instansi_id'),
            'DATE_FORMAT(datetrx, "%Y") =' => $this->get('datetrx'),
            //'status' => $this->get('status')
        ];
        
        $amount = $this->get('amount');
        
        $jid = $this->get('tbl_barang_id');
        $thn = $this->get('datetrx');
        //$st = $this->get('status');
        
        if ($jid === null || $thn === null) {
            $BudgetInstituteOut = $this->budgetinstituteout->getBudgetInstituteOut(null, $amount);
        } else {

            $BudgetInstituteOut = $this->budgetinstituteout->getBudgetInstituteOut($param, $amount);
        }

        if ($BudgetInstituteOut) {

            $this->response([
                'status' => true,
                'data' => $BudgetInstituteOut
            ], REST_Controller::HTTP_OK);
        } else {

            $this->response([
                'status' => false,
                'message' => 'id not found!'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}
