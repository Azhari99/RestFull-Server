<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Permintaan extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Permintaan_model', 'permintaan');
    }
    public function index_get()
    {
        $id = $this->get('id');

        if ($id === null) {

            $permintaan = $this->permintaan->getPermintaan();
        } else {

            $permintaan = $this->permintaan->getPermintaan($id);
        }

        if ($permintaan) {

            $this->response([
                'status' => true,
                'data' => $permintaan
            ], REST_Controller::HTTP_OK);
        } else {

            $this->response([
                'status' => false,
                'message' => 'id not found!'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_delete()
    {
        $id = $this->delete('id');

        if ($id === null) {
            $this->response([
                'status' => true,
                'message' => 'provide an id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {

            if ($this->permintaan->deletePermintaan($id) > 0) {

                $this->response([
                    'status' => false,
                    'id' => $id,
                    'message' => 'deleted!'
                ], REST_Controller::HTTP_PARTIAL_CONTENT);
            } else {

                $this->response([
                    'status' => false,
                    'message' => 'id not found!'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    public function index_post()
    {
        $data = [
            'documentno' => $this->post('documentno'),
            'tbl_barang_id' => $this->post('tbl_barang_id'),
            'tbl_instansi_id' => $this->post('tbl_instansi_id'),
            'datetrx' => $this->post('datetrx'),
            'unitprice' => $this->post('unitprice'),
            'amount' => $this->post('amount'),
            'status' => $this->post('status'),
            'qtyentered' => $this->post('qtyentered'),
            'keterangan' => $this->post('keterangan'),
            'pathDownload' => $this->post('pathDownload')
        ];

        if ($this->permintaan->createPermintaan($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'new permintaan barang has been created.'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed to created new data!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function index_put()
    {
        $id = $this->put('id');

        $data = [
            'documentno' => $this->post('documentno'),
            'tbl_barang_id' => $this->post('tbl_barang_id'),
            'tbl_instansi_id' => $this->post('tbl_instansi_id'),
            'datetrx' => $this->post('datetrx'),
            'status' => $this->post('status'),
            'qtyentered' => $this->post('qtyentered'),
            'keterangan' => $this->post('keterangan'),
            'pathDownload' => $this->post('pathDownload')
        ];
        
        if ($this->permintaan->UpdatePermintaan($data, $id) > 0) {
            $this->response([
                'status' => true,
                'message' => 'new permintaan barang has been Updated.'
            ], REST_Controller::HTTP_PARTIAL_CONTENT);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed to update data!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
        
    }
}
