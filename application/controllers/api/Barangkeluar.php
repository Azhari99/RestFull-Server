<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Barangkeluar extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barangkeluar_model', 'barangkeluar');
    }
    public function index_get()
    {
        $param = [
            'tbl_barang_id' => $this->get('tbl_barang_id'),
            'DATE_FORMAT(datetrx, "%Y") =' => $this->get('datetrx'),
            'status' => $this->get('status')
        ];
        
        $amount = $this->get('amount');
        
        $jid = $this->get('tbl_barang_id');
        $thn = $this->get('datetrx');
        $st = $this->get('status');
        
        if ($jid === null || $thn === null || $st === null) {
            $Barangkeluar = $this->barangkeluar->getBarangkeluar(null, $amount);
        } else {

            $Barangkeluar = $this->barangkeluar->getBarangkeluar($param, $amount);
        }

        if ($Barangkeluar) {

            $this->response([
                'status' => true,
                'data' => $Barangkeluar
            ], REST_Controller::HTTP_OK);
        } else {

            $this->response([
                'status' => false,
                'message' => 'id not found!'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}
