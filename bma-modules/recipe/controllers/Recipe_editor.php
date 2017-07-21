<?php

class Recipe_editor extends BMA_Controller {

    function __construct() {
        $config = array('modules' => 'recipe', 'jsfiles' => array('dataTables.cellEdit', 'recipe_editor'));
        parent::__construct($config);
        $this->bmamdl->table = 'recipe_detail';
    }

    /**
     * Akses Halaman
     */
    function index() {
//        $this->libauth->check(__METHOD__);
        $this->template->title('Recipe Editor');
        $this->template->set('tsmall', 'Manage Recipe');
        $this->template->set('icon', 'fa fa-file-text');
        $this->template->build('recipe/recipe_editor_v');
    }

    /**
     * Simpan Data
     */
    function insert() {
        checkIfNotAjax();
//        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $postData['need_secondchecker'] = isset($postData['need_secondchecker']) ? '1' : '0';
        $arr = array('turbin_dataset_id', 'impeller_dataset_id', 'scrapper_dataset_id', 'pressure_dataset_id', 'temperature_dataset_id', 'introhopper_dataset_id', 'intropowder_dataset_id', 'introliquid_dataset_id', 'transferin_dataset_id', 'transferout_dataset_id', 'time_dataset_id');
        $postData = cekSelect2($arr, $postData);
        $rid = $postData['recipe_id'];
        $tid = $postData['tankprocess_id'];
        $max = $this->db->select_max('orderaction', 'maxorder')->get_where('recipe_detail', array('recipe_id' => $rid, 'tankprocess_id' => $tid))->row();
        $postData['orderaction'] = ++$max->maxorder;
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
        $postData['need_secondchecker'] = isset($postData['need_secondchecker']) ? '1' : '0';
        $arr = array('turbin_dataset_id', 'impeller_dataset_id', 'scrapper_dataset_id', 'pressure_dataset_id', 'temperature_dataset_id', 'introhopper_dataset_id', 'intropowder_dataset_id', 'introliquid_dataset_id', 'transferin_dataset_id', 'transferout_dataset_id', 'time_dataset_id');
        $postData = cekSelect2($arr, $postData);
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
        $this->db->trans_begin();
        $orderm = $this->db->select("orderaction,recipe_id,tankprocess_id")->get_where('recipe_detail', array('id' => $id))->row();
        $awal = '>' . $orderm->orderaction;
        $setorder = '`orderaction` - 1';
        $this->db->set('`orderaction`', $setorder, FALSE);
        $this->db->where('`orderaction` ' . $awal);
        $this->db->where('recipe_id ', $orderm->recipe_id);
        $this->db->where('tankprocess_id ', $orderm->tankprocess_id);
        $this->db->update('recipe_detail');
        $status = $this->bmamdl->delete('id', $id);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $err = $this->db->error();
            $json['msg'] = $err['code'] . '<br>' . $err['message'];
            echo json_encode($json);
        } else {
            $this->db->trans_commit();
            $json['msg'] = '1';
            echo json_encode($json);
        }
    }

    /**
     * Ambil Data Table
     */
    function getData() {
        checkIfNotAjax();
//        $this->libauth->check(__METHOD__);
        $this->bmamdl->table = 'v_recipe_detail';
        $postData = $this->input->post();
        $where[0]['field'] = 'recipe_id';
        $where[0]['data'] = isset($postData['rid']) ? $postData['rid'] : NULL;
        $where[0]['sql'] = 'where';
        $where[1]['field'] = 'tankprocess_id';
        $where[1]['data'] = isset($postData['tid']) ? $postData['tid'] : NULL;
        $where[1]['sql'] = 'where';
        $cpData = $this->bmamdl->getDataTable($where);
        $this->bmamdl->outputToJson($cpData);
    }

    /**
     * Ambil Data Recipe
     */
    function getRecipe() {
        checkIfNotAjax();
//        $this->libauth->check(__METHOD__);
        $this->bmamdl->table = 'v_recipe';
        $this->bmamdl->searchable = array('recipename', 'product_type');
        $this->bmamdl->select2fields = array('id' => 'id', 'text' => "concat(recipename,' [', product_type,']',' ver : ', version)");
        $result['results'] = $this->bmamdl->getSelect2(array('status' => '1'));
        $result['more'] = true;
        echo json_encode($result);
    }

    /**
     * Ambil Data Tank Process
     */
    function getTankprocess() {
        checkIfNotAjax();
//        $this->libauth->check(__METHOD__);
        $this->bmamdl->table = 'tank_process';
        $this->bmamdl->searchable = array('tankname');
        $this->bmamdl->select2fields = array('id' => 'id', 'text' => "concat(tankname,' [', tankcapacity,']')");
        $result['results'] = $this->bmamdl->getSelect2(array('status' => '1'));
        $result['more'] = true;
        echo json_encode($result);
    }

    /**
     * Ambil Data Set Turbin
     */
    function getDataset_turbin() {
        checkIfNotAjax();
//        $this->libauth->check(__METHOD__);
        $this->bmamdl->table = 'dataset_turbin';
        $this->bmamdl->searchable = array('dataset');
        $this->bmamdl->select2fields = array('id' => 'id', 'text' => "concat(dataset,' [', plcset,']')");
        $result['results'] = $this->bmamdl->getSelect2(array('status' => '1'));
        $result['more'] = true;
        echo json_encode($result);
    }

    /**
     * Ambil Data Set Impeller
     */
    function getDataset_impeller() {
        checkIfNotAjax();
//        $this->libauth->check(__METHOD__);
        $this->bmamdl->table = 'dataset_impeller';
        $this->bmamdl->searchable = array('dataset');
        $this->bmamdl->select2fields = array('id' => 'id', 'text' => "concat(dataset,' [', plcset,']')");
        $result['results'] = $this->bmamdl->getSelect2(array('status' => '1'));
        $result['more'] = true;
        echo json_encode($result);
    }

    /**
     * Ambil Data Set Scrapper
     */
    function getDataset_scrapper() {
        checkIfNotAjax();
//        $this->libauth->check(__METHOD__);
        $this->bmamdl->table = 'dataset_scrapper';
        $this->bmamdl->searchable = array('dataset');
        $this->bmamdl->select2fields = array('id' => 'id', 'text' => "concat(dataset,' [', plcset,']')");
        $result['results'] = $this->bmamdl->getSelect2(array('status' => '1'));
        $result['more'] = true;
        echo json_encode($result);
    }

    /**
     * Ambil Data Set Pressure
     */
    function getDataset_pressure() {
        checkIfNotAjax();
//        $this->libauth->check(__METHOD__);
        $this->bmamdl->table = 'dataset_pressure';
        $this->bmamdl->searchable = array('dataset');
        $this->bmamdl->select2fields = array('id' => 'id', 'text' => "concat(dataset,' [', plcset,']')");
        $result['results'] = $this->bmamdl->getSelect2(array('status' => '1'));
        $result['more'] = true;
        echo json_encode($result);
    }

    /**
     * Ambil Data Set Temperature
     */
    function getDataset_temperature() {
        checkIfNotAjax();
//        $this->libauth->check(__METHOD__);
        $this->bmamdl->table = 'dataset_temperature';
        $this->bmamdl->searchable = array('dataset');
        $this->bmamdl->select2fields = array('id' => 'id', 'text' => "concat(dataset,' [', plcset,']')");
        $result['results'] = $this->bmamdl->getSelect2(array('status' => '1'));
        $result['more'] = true;
        echo json_encode($result);
    }

    /**
     * Ambil Data Set Weight
     */
    function getDataset_weight() {
        checkIfNotAjax();
//        $this->libauth->check(__METHOD__);
        $this->bmamdl->table = 'dataset_weight';
        $this->bmamdl->searchable = array('dataset');
        $this->bmamdl->select2fields = array('id' => 'id', 'text' => "concat(dataset,' [', plcset,']')");
        $result['results'] = $this->bmamdl->getSelect2(array('status' => '1'));
        $result['more'] = true;
        echo json_encode($result);
    }

    /**
     * Ambil Data Set Intro Hopper
     */
    function getDataset_introhopper() {
        checkIfNotAjax();
//        $this->libauth->check(__METHOD__);
        $this->bmamdl->table = 'dataset_introhopper';
        $this->bmamdl->searchable = array('dataset');
        $this->bmamdl->select2fields = array('id' => 'id', 'text' => "concat(dataset,' [', plcset,']')");
        $result['results'] = $this->bmamdl->getSelect2(array('status' => '1'));
        $result['more'] = true;
        echo json_encode($result);
    }

    /**
     * Ambil Data Set Intro Powder
     */
    function getDataset_intropowder() {
        checkIfNotAjax();
//        $this->libauth->check(__METHOD__);
        $this->bmamdl->table = 'dataset_intropowder';
        $this->bmamdl->searchable = array('dataset');
        $this->bmamdl->select2fields = array('id' => 'id', 'text' => "concat(dataset,' [', plcset,']')");
        $result['results'] = $this->bmamdl->getSelect2(array('status' => '1'));
        $result['more'] = true;
        echo json_encode($result);
    }

    /**
     * Ambil Data Set Intro Liquid
     */
    function getDataset_introliquid() {
        checkIfNotAjax();
//        $this->libauth->check(__METHOD__);
        $this->bmamdl->table = 'dataset_introliquid';
        $this->bmamdl->searchable = array('dataset');
        $this->bmamdl->select2fields = array('id' => 'id', 'text' => "concat(dataset,' [', plcset,']')");
        $result['results'] = $this->bmamdl->getSelect2(array('status' => '1'));
        $result['more'] = true;
        echo json_encode($result);
    }

    /**
     * Ambil Data Set Transfer In
     */
    function getDataset_transferin() {
        checkIfNotAjax();
//        $this->libauth->check(__METHOD__);
        $this->bmamdl->table = 'dataset_transferin';
        $this->bmamdl->searchable = array('dataset');
        $this->bmamdl->select2fields = array('id' => 'id', 'text' => "concat(dataset,' [', plcset,']')");
        $result['results'] = $this->bmamdl->getSelect2(array('status' => '1'));
        $result['more'] = true;
        echo json_encode($result);
    }

    /**
     * Ambil Data Set Transfer Out
     */
    function getDataset_transferout() {
        checkIfNotAjax();
//        $this->libauth->check(__METHOD__);
        $this->bmamdl->table = 'dataset_transferout';
        $this->bmamdl->searchable = array('dataset');
        $this->bmamdl->select2fields = array('id' => 'id', 'text' => "concat(dataset,' [', plcset,']')");
        $result['results'] = $this->bmamdl->getSelect2(array('status' => '1'));
        $result['more'] = true;
        echo json_encode($result);
    }

    /**
     * Ambil Data Set Time
     */
    function getDataset_time() {
        checkIfNotAjax();
//        $this->libauth->check(__METHOD__);
        $this->bmamdl->table = 'dataset_time';
        $this->bmamdl->searchable = array('dataset');
        $this->bmamdl->select2fields = array('id' => 'id', 'text' => "concat(dataset,' [', plcset,']')");
        $result['results'] = $this->bmamdl->getSelect2(array('status' => '1'));
        $result['more'] = true;
        echo json_encode($result);
    }

}
