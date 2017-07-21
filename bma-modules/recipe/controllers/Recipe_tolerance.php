<?php

class Recipe_tolerance extends BMA_Controller {

    function __construct() {
        $config = array('modules' => 'recipe', 'jsfiles' => array('dataTables.cellEdit', 'recipe_tolerance'));
        parent::__construct($config);
        $this->bmamdl->table = 'recipe_tolerance';
    }

    /**
     * Akses Halaman
     */
    function index() {
//        $this->libauth->check(__METHOD__);
        $this->template->title('Recipe Tolerance');
        $this->template->set('tsmall', 'Manage Recipe Tolerance');
        $this->template->set('icon', 'fa fa-file-text');
        $this->template->build('recipe/recipe_tolerance_v');
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
        $this->bmamdl->table = 'v_recipe_tolerance';
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


    public function saveDefaultRecipeTolerance()
    {
        $value_data = array(
            'turbin'=>12,
            'impeller'=>5,
            'scrapper'=>10,
            'pressure'=>10,
            'temperature'=>10,
            'weight'=>10,
            'introhopper'=>10,
            'intropowder'=>10,
            'introliquid'=>10,
            'transferin'=>10,
            'transferout'=>10,
            'time'=>10,
            'description'=>"description test",
        );
        $data = array('opvalue'=>
           json_encode($value_data)
        );
        $this->db->where('opkey', 'recipetolerance');
        $this->db->update('options', $data);
    }


    public function getRecipeTolerancedetail()
    {
        checkIfNotAjax();
        $postData = $this->input->post();
        $rid = $postData['rid'];
        $result = $this->db->select('*')->from('recipe_tolerance')->where('recipe_id', $rid)->get()->result();
        echo json_encode($result);
    }

    public function getDefaultRecipeTolerance()
    {
        checkIfNotAjax();
        $result = $this->db->select('opvalue')->from('options')->where('opkey', 'recipetolerance')->get()->row()->opvalue;
        echo $result;
    }

    

}
