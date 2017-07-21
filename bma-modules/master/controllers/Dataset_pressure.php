<?php

class Dataset_pressure extends BMA_Controller {

    function __construct() {
        $config = array('modules' => 'master', 'jsfiles' => array('dataset_pressure'));
        parent::__construct($config);
        $this->bmamdl->table = 'dataset_pressure';
    }

    /**
     * Akses Halaman
     */
    function index() {
//        $this->libauth->check(__METHOD__);
        $this->template->title('Data Set Pressure');
        $this->template->set('tsmall', 'Master Data');
        $this->template->set('icon', 'fa fa-microchip');
        $this->template->build('master/dataset_pressure_v');
    }

    /**
     * Simpan Data
     */
    function insert() {
        checkIfNotAjax();
//        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $postData['status'] = cekStatus($postData);
        $status = $this->bmamdl->insert($postData);
        if ($status == 'true') {
            $json['msg'] = '1';
            echo json_encode($json);
        } else {
            $json['msg'] = $status;
            echo json_encode($json);
        }
    }

    /**
     * Update Data
     */
    function update() {
        checkIfNotAjax();
//        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $postData['status'] = cekStatus($postData);
        $id = $postData['id'];
        unset($postData['id']);
        $status = $this->bmamdl->update($postData, 'id=' . $id);
        if ($status == 'true') {
            $json['msg'] = '1';
            echo json_encode($json);
        } else {
            $json['msg'] = $status;
            echo json_encode($json);
        }
    }

    /**
     * Hapus Data
     */
    function delete() {
        checkIfNotAjax();
//        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $id = json_decode($postData['id']);
        $status = $this->bmamdl->delete('id', $id);
        if ($status == 'true') {
            $json['msg'] = '1';
            echo json_encode($json);
        } else {
            $json['msg'] = $status;
            echo json_encode($json);
        }
    }

    /**
     * Ambil Data Table
     */
    function getData() {
        checkIfNotAjax();
//        $this->libauth->check(__METHOD__);
        $cpData = $this->bmamdl->getDataTable();
        $this->bmamdl->outputToJson($cpData);
    }

}
