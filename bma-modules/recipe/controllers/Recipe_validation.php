<?php

class Recipe_validation extends BMA_Controller {

    function __construct() {
        $config = array('modules' => 'recipe', 'jsfiles' => array('recipe_validation'));
        parent::__construct($config);
        $this->bmamdl->table = 'recipe';
        $this->auth = $this->session->userdata('auth');
    }

    /**
     * Akses Halaman
     */
    function index() {
//        $this->libauth->check(__METHOD__);
        $this->template->title('Recipe Validation');
        $this->template->set('tsmall', 'Recipe Validation');
        $this->template->set('icon', 'fa fa-certificate');
        $this->template->build('recipe/recipe_validation_v');
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
        $this->bmamdl->table = 'v_recipe_validation';
        $cpData = $this->bmamdl->getDataTable();
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
        $groupvalidator_ids = $this->db->select('groupvalidator_id')->from('group_validator_users')->where('user_id', $this->auth['id'])->get()->result();
        if(count($groupvalidator_ids)){
            $groupvalidator_id_arr = array();
            foreach($groupvalidator_ids as $gvs){
                array_push($groupvalidator_id_arr, $gvs->groupvalidator_id);
            }
        }
        else{
            $groupvalidator_id_arr = array();
        }
        $this->db->where_in('groupvalidator_id', $groupvalidator_id_arr);
        $this->db->or_where('validation', '0');
        $result['results'] = $this->bmamdl->getSelect2(array('status' => '1', 'validation'=>'2'));
        $result['more'] = true;
        echo json_encode($result);
    }

    public function getRecipeValidation($id = '')
    {
        checkIfNotAjax();
//      $this->libauth->check(__METHOD__);
        $postData = $this->input->post();
        $this->bmamdl->table = 'v_recipe_validation';
        $where[0]['field'] = 'recipe_id';
        $where[0]['data'] = isset($postData['r_id']) ? $postData['r_id'] : NULL;
        $where[0]['sql'] = 'where';
        /*$where[1]['field'] = 'flag';
        $where[1]['data'] = 0;
        $where[1]['sql'] = 'where';*/
        $cpData = $this->bmamdl->getDataTable($where);
        $this->bmamdl->outputToJson($cpData);
    }


    public function run_validation()
    {
        $postData = $this->input->post();
        $recipe_validation_id = $postData['r_id'];
        $data = array('flag'=>1);
        
        
        $update_flag = $this->db->update('recipe_validation', $data, "id=".$recipe_validation_id);
        if($update_flag){
            $check_all_flags = $this->check_all_flags($recipe_validation_id);
            if($check_all_flags == FALSE){
                $set_next_validator_id = $this->set_next_validator_id($recipe_validation_id);
            }
            $json['msg'] = '1';
            echo json_encode($json);
        }
        else{
            $json['msg'] = $update_flag;
            echo json_encode($json);
        }

    }


    protected function check_all_flags($recipe_validation_id)
    {
        //get the recipe_id first
        $recipe_id = $this->db->select('recipe_id')->from('recipe_validation')->where('id', $recipe_validation_id)->get()->row()->recipe_id;
        //count recipe_validation item
        $recipe_validation_items = $this->db->select('id')->from('recipe_validation')->where('recipe_id', $recipe_id)->get()->result();
        //now count how many flagged recipe validation items
        $flagged_items = $this->db->select('id')->from('recipe_validation')->where(array('recipe_id'=>$recipe_id, 'flag'=>1))->get()->result();
        //update recipe's validation to 1 if all recipe_validation_items are already flagged
        if(count($recipe_validation_items) == count($flagged_items)){
            $this->db->update('recipe', array('validation'=>'1'),"id=".$recipe_id);
            return TRUE;
        }
        else{
           return FALSE;
        }
    }

    protected function set_next_validator_id($recipe_validation_id)
    {
        $current_recipe_validation = $this->db->select('recipe_id, orderuser')->from('recipe_validation')->where('id', $recipe_validation_id)->get()->row();
        $recipe_id = $current_recipe_validation->recipe_id;
        $current_order = $current_recipe_validation->orderuser;
        $next_order = $current_order+1;
        //now get the next user id to validate
        $next_validator_id = $this->db->select('user_id')->from('recipe_validation')->where('orderuser', $next_order)->get()->row()->user_id;
        //now set the next validator_id, with the condition where the recipe id is this recipe id and flag is zero
        $this->db->where(array('recipe_id'=>$recipe_id, 'flag'=>0));
        $set_next_validator_id = $this->db->update('recipe_validation', array('next_validator_id'=>$next_validator_id));


    }

}
