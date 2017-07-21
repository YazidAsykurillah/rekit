<?php

class Recipe extends BMA_Controller {

    function __construct() {
        $config = array('modules' => 'recipe', 'jsfiles' => array('recipe'));
        parent::__construct($config);
        $this->bmamdl->table = 'recipe';
    }

    /**
     * Akses Halaman
     */
    function index() {
//        $this->libauth->check(__METHOD__);
        $this->template->title('Recipe');
        $this->template->set('tsmall', 'Manage Recipe');
        $this->template->set('icon', 'fa fa-bookmark');
        $this->template->build('recipe/recipe_v');
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
        $this->bmamdl->table = 'v_recipe';
        $cpData = $this->bmamdl->getDataTable();
        $this->bmamdl->outputToJson($cpData);
    }

    /**
     * Ambil Data Product Type
     */
    function getProducttype($id = '') {
        checkIfNotAjax();
//        $this->libauth->check(__METHOD__);
        $this->bmamdl->table = 'product_type';
        $this->bmamdl->searchable = array('product_type');
        $this->bmamdl->select2fields = array('id' => 'id', 'text' => "product_type");
        $result['results'] = $this->bmamdl->getSelect2(array('status' => '1'));
        $result['more'] = true;
        echo json_encode($result);
    }
    
    /**
     * Ambil Data Group Validator
     */
    function getGroupvalidator() {
        checkIfNotAjax();
//        $this->libauth->check(__METHOD__);
        $this->bmamdl->table = 'group_validator';
        $this->bmamdl->searchable = array('groupvalidatorname');
        $this->bmamdl->select2fields = array('id' => 'id', 'text' => "groupvalidatorname");
        $result['results'] = $this->bmamdl->getSelect2(array('status' => '1'));
        $result['more'] = true;
        echo json_encode($result);
    }
    
    /**
     * Set Validate
     */
    function setValidate() {
        checkIfNotAjax();
//        $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $id = $postData['id'];
        $gvid = $postData['gvid'];
        // Update Version
        $datax['version'] = $postData['ver'] + 1;

        //update validation value to 2 -> on going
        $datax['validation'] = '2';
        $status = $this->bmamdl->update($datax, 'id=' . $id);
        if ($status == 'true') {
            $set_recipe_validation = $this->set_recipe_validation($id, $gvid);
            if($set_recipe_validation == TRUE){
                $json['msg'] = '1';
            }else{
                $json['msg'] = $set_recipe_validation;
            }
            
            echo json_encode($json);
        } else {
            $json['msg'] = $status;
            echo json_encode($json);
        }
    }

    protected function set_recipe_validation($recipe_id, $gvid)
    {
        $query = $this->db->select('user_id, orderuser')
                                ->from('group_validator_users')
                                ->where('groupvalidator_id', $gvid)
                                ->order_by('orderuser','ASC')
                                ->get();

        if(count($query->result())){
            $data_recipe_validation = array();
            $next_validator_id = $query->first_row()->user_id;
            foreach($query->result() as $gvu){
                array_push($data_recipe_validation,array(
                    'recipe_id'=>$recipe_id,
                    'user_id'=>$gvu->user_id,
                    'orderuser'=>$gvu->orderuser,
                    'created'=>date('Y-m-d H:i:s'),
                    'next_validator_id'=>$next_validator_id
                ));
            }

           $save_recipe_validation = $this->db->insert_batch('recipe_validation', $data_recipe_validation);
           if($save_recipe_validation){
            return TRUE;
           }else{
            return $save_recipe_validation;
           }
        }   
    }

}
