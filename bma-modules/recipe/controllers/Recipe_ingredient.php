<?php

class Recipe_ingredient extends BMA_Controller {

    function __construct() {
        $config = array('modules' => 'recipe', 'jsfiles' => array('recipe_ingredient'));
        parent::__construct($config);
        $this->bmamdl->table = 'recipe_ingredient';
    }

    /**
     * Akses Halaman
     */
    function index() {
//        $this->libauth->check(__METHOD__);
        $this->template->title('Recipe Ingredient Editor');
        $this->template->set('tsmall', 'Manage Recipe');
        $this->template->set('icon', 'fa fa-file-text');
        $this->template->build('recipe/recipe_ingredient_v');
    }

    /**
     * Simpan Data
     */
    function insert() {
        checkIfNotAjax();
//        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
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
        $postData = $this->input->post();
        $this->bmamdl->table = 'v_recipe_ingredient';
        $where[0]['field'] = 'recipe_id';
        $where[0]['data'] = isset($postData['rid']) ? $postData['rid'] : NULL;
        $where[0]['sql'] = 'where';
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
        $this->bmamdl->select2fields = array('id' => 'id', 'text' => "concat(recipename,' [', product_type,']  ver : ', version)");
        $addwhere[0]['field'] = 'validation';
        $addwhere[0]['data'] = '0';
        $addwhere[0]['sql'] = 'or_where';
        $addwhere[1]['field'] = 'validation';
        $addwhere[1]['data'] = '3';
        $addwhere[1]['sql'] = 'or_where';
        $result['results'] = $this->bmamdl->getSelect2(array('status' => '1'), $addwhere);
        $result['more'] = true;
        echo json_encode($result);
    }

    /**
     * Ambil Data Raw Material
     */
    function getRawmaterial() {
        checkIfNotAjax();
//        $this->libauth->check(__METHOD__);
        $this->bmamdl->table = 'raw_material';
        $this->bmamdl->searchable = array('materialname', 'materialcode');
        $this->bmamdl->select2fields = array('id' => 'id', 'text' => "concat(materialname,' [',materialcode,']')");
        $result['results'] = $this->bmamdl->getSelect2(array('status' => '1'));
        $result['more'] = true;
        echo json_encode($result);
    }

    /**
     * Ambil Data Unit Material
     */
    function getUnitmaterial() {
        checkIfNotAjax();
//        $this->libauth->check(__METHOD__);
        $this->bmamdl->table = 'unit_material';
        $this->bmamdl->searchable = array('unitname', 'shortname');
        $this->bmamdl->select2fields = array('id' => 'id', 'text' => "concat(unitname,' [',shortname,']')");
        $result['results'] = $this->bmamdl->getSelect2(array('status' => '1'));
        $result['more'] = true;
        echo json_encode($result);
    }

}
